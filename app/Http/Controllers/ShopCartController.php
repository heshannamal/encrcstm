<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\EncoreCartApiService;
use App\Services\EncoreCartMergeService;
use App\Services\EncoreProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Throwable;

final class ShopCartController extends Controller
{
    public function __construct(
        private EncoreCartApiService $cart,
        private EncoreProductService $products,
        private EncoreCartMergeService $merge
    ) {}

    private function tempId(): string
    {
        if (!session()->has('encore_cart_temp_id')) {
            session(['encore_cart_temp_id' => (string) Str::uuid()]);
        }
        return (string) session('encore_cart_temp_id');
    }

    public function items(): array
    {
        $response = $this->cart->items($this->tempId());
        if (!($response['success'] ?? false)) {
            throw new \RuntimeException($response['message'] ?? 'Unable to load your cart.');
        }
        return collect($response['cart_items'] ?? [])
            ->map(fn ($row) => $this->products->normalizeCartItem($row))
            ->filter(fn ($row) => (int) $row['cart_id'] > 0)
            ->values()->all();
    }

    public function index()
    {
        $error = null;
        $items = [];
        try {
            $this->merge->retryIfPending();
            $items = $this->items();
        } catch (Throwable $exception) {
            $error = 'Unable to load the cart. Please try again.';
        }
        $subtotal = collect($items)->sum('line_total');
        return view('shop.cart', compact('items', 'subtotal', 'error'));
    }

    public function add(Request $request)
    {
        $data = $request->validate([
            'product_id' => ['required', 'integer', 'min:1'],
            'size_id' => ['required', 'integer', 'min:1'],
            'color_id' => ['nullable', 'integer', 'min:1'],
            'quantity' => ['required', 'integer', 'min:1', 'max:99'],
        ]);

        try {
            $stock = $this->products->stockForCombination((int) $data['product_id'], (int) $data['size_id'], isset($data['color_id']) ? (int) $data['color_id'] : null);
            $existing = collect($this->items())->filter(fn ($item) =>
                (int) $item['id'] === (int) $data['product_id']
                && (int) $item['size_id'] === (int) $data['size_id']
                && $item['color_id'] === (isset($data['color_id']) ? (int) $data['color_id'] : null)
            )->sum('quantity');

            if ($stock < 1 || $existing + (int) $data['quantity'] > $stock) {
                return back()->with('error', 'Not enough inventory for that size/color combination. Please choose another.');
            }

            $response = $this->cart->add($data + ['temp_id' => $this->tempId()]);
            if (!($response['success'] ?? false)) {
                return back()->with('error', $response['message'] ?? 'Unable to add this product.');
            }
            return redirect()->route('shop.cart')->with('success', 'Added to your cart.');
        } catch (Throwable $exception) {
            return back()->with('error', 'Could not add this product. Please try again.');
        }
    }

    public function update(Request $request, int $cartId)
    {
        $data = $request->validate(['quantity' => ['required', 'integer', 'min:1', 'max:99']]);

        try {
            $item = collect($this->items())->first(fn ($item) => (int) $item['cart_id'] === $cartId);
            abort_unless($item, 404);
            $available = $this->products->stockForCombination((int) $item['id'], (int) $item['size_id'], $item['color_id']);
            if ($available < (int) $data['quantity']) {
                return back()->with('error', 'Requested quantity exceeds current stock.');
            }

            $response = $this->cart->update($cartId, (int) $data['quantity']);
            return (($response['success'] ?? false) || ($response['status'] ?? false))
                ? back()->with('success', 'Cart updated.')
                : back()->with('error', $response['message'] ?? 'Could not update the cart.');
        } catch (Throwable $exception) {
            return back()->with('error', 'Could not update the cart.');
        }
    }

    public function remove(int $cartId)
    {
        try {
            abort_unless(collect($this->items())->contains(fn ($item) => (int) $item['cart_id'] === $cartId), 404);
            $response = $this->cart->remove($cartId);
            return ($response['success'] ?? false)
                ? back()->with('success', 'Item removed.')
                : back()->with('error', $response['message'] ?? 'Could not remove item.');
        } catch (Throwable $exception) {
            return back()->with('error', 'Could not remove item.');
        }
    }
}
