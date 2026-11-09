<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\EncoreAuthApiService;
use App\Services\EncoreCartMergeService;
use App\Services\EncoreSessionGuard;
use App\Services\EncoreOrderApiService;
use App\Services\EncoreProfileApiService;
use Illuminate\Http\Request;
use Throwable;

final class ShopAccountController extends Controller
{
    public function __construct(
        private EncoreAuthApiService $auth,
        private EncoreSessionGuard $guard,
        private EncoreCartMergeService $merge,
        private EncoreProfileApiService $profileApi,
        private EncoreOrderApiService $orders
    ) {}

    public function loginForm()
    {
        return view('shop.auth', ['mode' => 'login']);
    }

    public function registerForm()
    {
        return view('shop.auth', ['mode' => 'register']);
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        try {
            $response = $this->auth->login($data['email'], $data['password']);
            if (!($response['success'] ?? false) || !filled(data_get($response, 'data.token'))) {
                return back()->withInput($request->only('email'))
                    ->withErrors(['email' => $response['message'] ?? 'Invalid login credentials.']);
            }

            $this->setAuthSession($request, $response['data']);
            if (!$this->guard->valid()) {
                return redirect()->route('shop.login')->withErrors(['email' => 'Unable to verify this account.']);
            }

            $merge = $this->merge->claimGuestCart();
            return redirect()->intended(route('shop.profile'))
                ->with(($merge['success'] ?? false) ? 'success' : 'warning',
                    ($merge['success'] ?? false) ? 'Signed in successfully.' : 'Signed in. Please review your cart before checkout.');
        } catch (Throwable $exception) {
            return back()->withErrors(['email' => 'Unable to sign in. Please try again.']);
        }
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'f_name' => ['required', 'string', 'max:255'],
            'l_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        try {
            $response = $this->auth->register($data + [
                'inventory_id' => (int) config('services.encore.inventory_type_id', 2),
            ]);
            if (!($response['success'] ?? false) || !filled(data_get($response, 'data.token'))) {
                return back()->withInput($request->except('password', 'password_confirmation'))
                    ->withErrors(['email' => $response['message'] ?? 'Unable to create account.']);
            }

            $this->setAuthSession($request, $response['data']);
            $merge = $this->merge->claimGuestCart();
            return redirect()->intended(route('shop.profile'))
                ->with(($merge['success'] ?? false) ? 'success' : 'warning',
                    ($merge['success'] ?? false) ? 'Your account is ready.' : 'Account created. Please review your cart.');
        } catch (Throwable $exception) {
            return back()->withErrors(['email' => 'Unable to register right now.']);
        }
    }

    private function setAuthSession(Request $request, array $data): void
    {
        $temp = $request->session()->get('encore_cart_temp_id');
        $request->session()->regenerate();
        $request->session()->put([
            'encore_cart_temp_id' => $temp,
            'encore_user_token' => $data['token'],
            'auth_api_token' => $data['token'],
            'encore_user_token_type' => $data['token_type'] ?? 'Bearer',
            'encore_user' => $data['user'] ?? [],
            'auth_user_id' => data_get($data, 'user.id'),
        ]);
    }

    public function logout(Request $request)
    {
        try {
            $this->auth->logout();
        } catch (Throwable $exception) {
        }
        $this->guard->clear();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('shop.catalog')->with('success', 'You are signed out.');
    }

    private function requireLogin(Request $request): ?\Illuminate\Http\RedirectResponse
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
        return redirect()->guest(route('shop.login'))->with('error', 'Please sign in again.');
    }

    public function profile(Request $request)
    {
        if ($redirect = $this->requireLogin($request)) {
            return $redirect;
        }
        $user = session('encore_user', []);
        $customer = [];
        $summary = [];
        try {
            $a = $this->profileApi->customerDetails();
            $b = $this->profileApi->orderSummary();
            $customer = is_array($a['data'] ?? null) ? $a['data'] : [];
            $customer['email'] = data_get($customer, 'email', data_get($customer, 'user_detail.email', data_get($user, 'email', '')));
            $customer['f_name'] = data_get($customer, 'first_name', data_get($customer, 'f_name', data_get($user, 'f_name', '')));
            $customer['l_name'] = data_get($customer, 'last_name', data_get($customer, 'l_name', data_get($user, 'l_name', '')));
            $summary = is_array($b['data'] ?? null) ? $b['data'] : [];
        } catch (Throwable $exception) {
        }
        return view('shop.profile', compact('user', 'customer', 'summary'));
    }

    public function updateProfile(Request $request)
    {
        if ($redirect = $this->requireLogin($request)) {
            return $redirect;
        }
        $data = $request->validate([
            'f_name' => ['required', 'string', 'max:255'],
            'l_name' => ['required', 'string', 'max:255'],
            'phone_number' => ['nullable', 'string', 'max:50'],
        ]);
        try {
            $response = $this->profileApi->updateProfile($data);
            if ($response['success'] ?? false) {
                $user = $request->session()->get('encore_user', []);
                if (is_array($user)) {
                    $user['f_name'] = $data['f_name'];
                    $user['l_name'] = $data['l_name'];
                    $user['phone_number'] = $data['phone_number'] ?? '';
                    $request->session()->put('encore_user', $user);
                }
                return back()->with('success', 'Profile updated.');
            }
            return back()->with('error', $response['message'] ?? 'Unable to update profile.');
        } catch (Throwable $exception) {
            return back()->with('error', 'Profile service is temporarily unavailable. Please try again.');
        }
    }

    public function orderHistory(Request $request)
    {
        if ($redirect = $this->requireLogin($request)) {
            return $redirect;
        }
        try {
            $response = $this->profileApi->orderHistory();
            return view('shop.orders', [
                'orders' => $response['data'] ?? [],
                'error' => ($response['success'] ?? false) ? null : ($response['message'] ?? 'Unable to load your orders.'),
            ]);
        } catch (Throwable $exception) {
            return view('shop.orders', [
                'orders' => [],
                'error' => 'Order history is temporarily unavailable. Please try again.',
            ]);
        }
    }

    public function order(Request $request, int $id)
    {
        if ($redirect = $this->requireLogin($request)) {
            return $redirect;
        }
        $response = $this->orders->order($id);
        abort_unless(($response['success'] ?? false) && !empty($response['data']), 404);
        return view('shop.order', ['order' => $response['data']]);
    }
}
