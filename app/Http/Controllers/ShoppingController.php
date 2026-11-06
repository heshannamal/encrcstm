<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\EncoreProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Throwable;

final class ShoppingController extends Controller
{
    public function __construct(private EncoreProductService $products) {}

    public function catalog(Request $request)
    {
        $filters = [
            'selectedCategory' => $request->integer('selectedCategory', 1),
            'selectedGender' => $request->query('selectedGender', 'All'),
            'selectedSport' => $request->integer('selectedSport', 18),
            'selectedStyle' => $request->integer('selectedStyle', 0),
        ];
        $items = collect();
        $error = null;
        $categories = [];
        $styles = [];

        try {
            $rawItems = $this->products->products((int) $filters['selectedSport'], [
                'category' => $filters['selectedCategory'],
                'gender' => $filters['selectedGender'],
                'style' => $filters['selectedStyle'],
            ]);

            $items = collect($rawItems)
                ->filter('is_array')
                ->map(fn (array $raw): array => $this->products->catalogCard($raw))
                ->filter(fn (array $product): bool => (int) ($product['id'] ?? 0) > 0);

            $search = trim((string) $request->query('search', ''));
            if ($search !== '') {
                $items = $items->filter(function (array $product) use ($search): bool {
                    $raw = $product['raw'];
                    $terms = [
                        $product['name'],
                        data_get($raw, 'sub_product_no'),
                        data_get($raw, 'product_details.product_no'),
                        data_get($raw, 'display_product_name'),
                    ];
                    return str_contains(mb_strtolower(implode(' ', array_filter($terms))), mb_strtolower($search));
                });
            }

            $items = $items->values();
            $order = $request->query('sort');
            if ($order === 'price_asc') {
                $items = $items->sortBy('price')->values();
            } elseif ($order === 'price_desc') {
                $items = $items->sortByDesc('price')->values();
            } elseif ($order === 'name') {
                $items = $items->sortBy('name', SORT_NATURAL | SORT_FLAG_CASE)->values();
            }

            try {
                $stylesResponse = $this->products->productCategories();
                $styles = data_get($stylesResponse, 'data.data', $stylesResponse['data'] ?? []);
                $styles = is_array($styles) ? array_values(array_filter($styles, 'is_array')) : [];
            } catch (Throwable $exception) {
                Log::notice('Product category metadata unavailable', ['message' => $exception->getMessage()]);
            }

            try {
                $categoriesResponse = $this->products->mainCategories();
                $categories = data_get($categoriesResponse, 'data.data', $categoriesResponse['data'] ?? []);
                $categories = is_array($categories) ? array_values(array_filter($categories, 'is_array')) : [];
            } catch (Throwable $exception) {
                Log::notice('Main category metadata unavailable', ['message' => $exception->getMessage()]);
            }
        } catch (Throwable $exception) {
            Log::error('Catalog product loading failed', [
                'exception' => get_class($exception),
                'message' => $exception->getMessage(),
                'file' => $exception->getFile(),
                'line' => $exception->getLine(),
                'filters' => $filters,
            ]);
            $error = 'Products are temporarily unavailable. Please try again.';
        }

        $grouped = $items->groupBy(function ($item): string {
            $rel = data_get($item, 'raw.style_name')
                ?? data_get($item, 'raw.product_style_name')
                ?? data_get($item, 'raw.product_details.product_categories.0.categories.product_category_name')
                ?? data_get($item, 'raw.product_details.product_categories.0.category.name')
                ?? data_get($item, 'raw.product_details.product_categories.0.product_category_name')
                ?? data_get($item, 'raw.category_name')
                ?? 'Other Products';
            return (string) $rel;
        });

        return view('shop.catalog', compact('items', 'grouped', 'filters', 'categories', 'styles', 'error'));
    }

    public function product(int $id)
    {
        $response = $this->products->product($id);
        abort_unless(($response['success'] ?? false) && is_array($response['data'] ?? null), 404, 'Product not found.');

        $product = $this->products->normalizeProduct($response['data']);
        $optionsResponse = $this->products->options($id);
        $options = [
            'sizes' => $optionsResponse['sizes'] ?? data_get($optionsResponse, 'data.sizes', []),
            'colors' => $optionsResponse['colors'] ?? data_get($optionsResponse, 'data.colors', []),
            'combinations' => $optionsResponse['combinations'] ?? data_get($optionsResponse, 'data.combinations', []),
        ];

        foreach (['sizes', 'colors', 'combinations'] as $key) {
            $options[$key] = is_array($options[$key]) ? array_values($options[$key]) : [];
        }

        return view('shop.product', compact('product', 'options'));
    }
}
