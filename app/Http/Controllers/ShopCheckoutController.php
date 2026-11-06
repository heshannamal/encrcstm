<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\Encore\CartApiService;
use App\Services\Encore\CartMergeService;
use App\Services\Encore\EncoreSessionGuard;
use App\Services\Encore\OrderApiService;
use App\Services\Encore\PaymentApiService;
use App\Services\Encore\ProfileApiService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Throwable;

final class ShopCheckoutController extends Controller
{
    public function __construct(
        private CartApiService $cart,
        private CartMergeService $merge,
        private EncoreSessionGuard $guard,
        private OrderApiService $orders,
        private PaymentApiService $payment,
        private ProfileApiService $profile
    ) {}

    private function requireAuth()
    {
        if (!session('encore_user_token')) {
            return redirect()->guest(route('shop.login'));
        }
        try {
            if ($this->guard->valid()) {
                return null;
            }
        } catch (Throwable $exception) {
        }
        return redirect()->guest(route('shop.login'))->with('error', 'Please sign in before checkout.');
    }

    private function ownedCartIds(): array
    {
        $response = $this->cart->authenticatedCartIds();
        if (!($response['success'] ?? false)) {
            throw new \RuntimeException($response['message'] ?? 'Could not verify your cart.');
        }
        return collect($response['cart_item_ids'] ?? [])
            ->map(fn ($id) => (int) $id)->filter(fn ($id) => $id > 0)->unique()->values()->all();
    }

    public function checkout()
    {
        if ($redirect = $this->requireAuth()) {
            return $redirect;
        }
        $merged = $this->merge->claimGuestCart();
        if (!($merged['success'] ?? false)) {
            return redirect()->route('shop.cart')->with('error', implode(' ', $merged['warnings'] ?? ['Unable to merge your cart.']));
        }
        try {
            $ids = $this->ownedCartIds();
            if (!$ids) {
                return redirect()->route('shop.cart')->with('error', 'Your cart is empty.');
            }
            $countriesResponse = $this->profile->countries();
            $customerResponse = $this->profile->customerDetails();
            return view('shop.checkout', [
                'countries' => $countriesResponse['data'] ?? [],
                'customer' => $customerResponse['data'] ?? [],
                'billing' => session('encore_checkout_billing', []),
            ]);
        } catch (Throwable $exception) {
            return redirect()->route('shop.cart')->with('error', 'Unable to prepare checkout.');
        }
    }

    public function saveBilling(Request $request)
    {
        if ($redirect = $this->requireAuth()) {
            return $redirect;
        }
        $data = $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email'],
            'phone' => ['required', 'string', 'max:50'],
            'address' => ['required', 'string', 'max:255'],
            'street' => ['nullable', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'state' => ['required', 'string', 'max:255'],
            'postal_code' => ['required', 'string', 'max:30'],
            'country_id' => ['required', 'integer', 'min:1'],
            'use_same_as_billing_address' => ['nullable', 'boolean'],
            'shipping_first_name' => ['required_unless:use_same_as_billing_address,1', 'nullable', 'string', 'max:255'],
            'shipping_last_name' => ['required_unless:use_same_as_billing_address,1', 'nullable', 'string', 'max:255'],
            'shipping_address' => ['required_unless:use_same_as_billing_address,1', 'nullable', 'string', 'max:255'],
            'shipping_city' => ['required_unless:use_same_as_billing_address,1', 'nullable', 'string', 'max:255'],
            'shipping_state' => ['required_unless:use_same_as_billing_address,1', 'nullable', 'string', 'max:255'],
            'shipping_postal_code' => ['required_unless:use_same_as_billing_address,1', 'nullable', 'string', 'max:30'],
            'shipping_country_id' => ['required_unless:use_same_as_billing_address,1', 'nullable', 'integer'],
            'shipping_phone' => ['required_unless:use_same_as_billing_address,1', 'nullable', 'string', 'max:50'],
            'shipping_email' => ['required_unless:use_same_as_billing_address,1', 'nullable', 'email'],
        ]);

        try {
            $countriesResponse = $this->profile->countries();
            if (!($countriesResponse['success'] ?? false)) {
                throw new \RuntimeException('Unable to verify country.');
            }
            $countries = collect($countriesResponse['data'] ?? []);
            $country = $countries->first(fn ($row) => (int) data_get($row, 'id') === (int) $data['country_id']);
            if (!$country) {
                return back()->withInput()->with('error', 'Select a valid billing country.');
            }

            $same = (bool) ($data['use_same_as_billing_address'] ?? false);
            $payload = $data;
            $payload['country'] = (string) data_get($country, 'name');
            $payload['country_code'] = (string) data_get($country, 'code');
            $payload['user_id'] = (int) data_get(session('encore_user'), 'id', session('auth_user_id'));
            $payload['is_shipping_address_available'] = $same ? 0 : 1;
            $payload['use_same_as_billing_address'] = $same ? 1 : 0;
            $payload['cart_ids'] = json_encode($this->ownedCartIds());

            if (!$same) {
                $shippingCountry = $countries->first(fn ($row) => (int) data_get($row, 'id') === (int) $data['shipping_country_id']);
                if (!$shippingCountry) {
                    return back()->withInput()->with('error', 'Select a valid shipping country.');
                }
                $payload['shipping_country'] = (string) data_get($shippingCountry, 'name');
                $payload['shipping_country_code'] = (string) data_get($shippingCountry, 'code');
            }

            $apiPayload = $payload;
            unset($apiPayload['country_id'], $apiPayload['country_code'], $apiPayload['shipping_country_id'], $apiPayload['shipping_country_code']);
            $response = $this->payment->updateBillingDetails($apiPayload);
            if (!($response['success'] ?? false)) {
                return back()->withInput()->with('error', $response['message'] ?? 'Unable to save checkout details.');
            }

            $request->session()->put('encore_checkout_billing', array_merge($payload, is_array($response['data'] ?? null) ? $response['data'] : []));
            $request->session()->put('encore_temp_billing_detail_id', data_get($response, 'data.id'));
            $request->session()->put('encore_billing_saved', true);
            return redirect()->route('shop.payment');
        } catch (Throwable $exception) {
            return back()->withInput()->with('error', 'Unable to save your billing details. Please retry.');
        }
    }

    public function paymentPage()
    {
        if ($redirect = $this->requireAuth()) {
            return $redirect;
        }
        if (!session('encore_billing_saved')) {
            return redirect()->route('shop.checkout')->with('error', 'Complete billing details first.');
        }
        try {
            $ids = $this->ownedCartIds();
            if (!$ids) {
                return redirect()->route('shop.cart')->with('error', 'Your cart is empty.');
            }
            $response = $this->payment->paymentDetails();
            if (!($response['success'] ?? false)) {
                throw new \RuntimeException('Unable to calculate the payment amount.');
            }
            return view('shop.payment', [
                'payment' => data_get($response, 'data.payment', []),
                'subPayment' => data_get($response, 'data.sub_payment', []),
            ]);
        } catch (Throwable $exception) {
            return redirect()->route('shop.checkout')->with('error', 'Payment totals could not be loaded.');
        }
    }

    public function placeOrder(Request $request)
    {
        if ($redirect = $this->requireAuth()) {
            return $redirect;
        }
        if (!session('encore_billing_saved')) {
            return redirect()->route('shop.checkout')->with('error', 'Complete your billing details first.');
        }

        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'card_type' => ['required', 'integer', 'in:1,2,3'],
            'card_holder_name' => ['required', 'string', 'max:100'],
            'card_number' => ['required', 'string', 'regex:/^[0-9 ]{12,25}$/'],
            'card_expiry_month' => ['required', 'integer', 'between:1,12'],
            'card_expiry_year' => ['required', 'integer', 'between:'.date('Y').','.((int) date('Y') + 20)],
            'card_csv' => ['required', 'digits_between:3,4'],
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        }
        $card = $validator->validated();

        $lock = \Illuminate\Support\Facades\Cache::lock('encore:payment:'.hash('sha256', session()->getId()), 60);
        if (!$lock->get()) {
            return back()->with('error', 'A payment request is already processing. Check your orders before trying again.');
        }
        try {
            $ids = $this->ownedCartIds();
            if (!$ids) {
                return redirect()->route('shop.cart')->with('error', 'Your cart is empty.');
            }
            $response = $this->payment->paymentDetails();
            if (!($response['success'] ?? false)) {
                return back()->with('error', 'Could not verify current payment totals.');
            }
            $totals = data_get($response, 'data.payment', []);
            $fees = data_get($response, 'data.sub_payment', []);

            $payload = [
                'cart_ids' => json_encode($ids),
                'total_item_qty' => data_get($totals, 'total_item_qty', 0),
                'sub_total' => data_get($totals, 'sub_total', '0.00'),
                'shipping_fee' => data_get($fees, 'shipping_fee', '0.00'),
                'sales_tax' => data_get($fees, 'sales_tax', '0.00'),
                'invoice_total' => data_get($totals, 'invoice_total', '0.00'),
                'other_fee' => data_get($fees, 'other_fee', '0.00'),
                'balance_invoice' => data_get($totals, 'balance_invoice', data_get($totals, 'invoice_total', '0.00')),
                'processing_fee' => data_get($totals, 'processing_fee', '0.00'),
                'amount_to_pay' => data_get($totals, 'amount_to_pay', '0.00'),
                'temp_billing_detail_id' => session('encore_temp_billing_detail_id'),
                'card_type' => $card['card_type'],
                'card_holder_name' => $card['card_holder_name'],
                'card_number' => preg_replace('/\D+/', '', $card['card_number']),
                'card_expiry_month' => str_pad((string) $card['card_expiry_month'], 2, '0', STR_PAD_LEFT),
                'card_expiry_year' => (string) $card['card_expiry_year'],
                'card_csv' => $card['card_csv'],
            ];

            $orderResponse = $this->orders->store($payload);
            unset($payload, $card);
            if (!($orderResponse['success'] ?? false)) {
                return back()->with('error', $orderResponse['message'] ?? 'Payment was not successful. No order confirmation has been issued.');
            }

            $request->session()->forget(['encore_checkout_billing', 'encore_billing_saved', 'encore_temp_billing_detail_id', 'encore_cart_merge_pending']);
            $request->session()->put('encore_cart_temp_id', (string) Str::uuid());
            $request->session()->put('encore_order_success', true);
            return redirect()->route('shop.success');
        } catch (Throwable $exception) {
            Log::error('Order submission failed', ['message' => $exception->getMessage()]);
            return back()->with('error', 'Unable to confirm payment. Check your order history before attempting another payment.');
        } finally {
            $lock->release();
        }
    }

    public function success(Request $request)
    {
        abort_unless($request->session()->pull('encore_order_success', false), 404);
        return view('shop.success');
    }
}
