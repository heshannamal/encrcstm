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

    public function catalog(Request $request, \App\Services\EncoreCatalogService $catalog)
    {
        $filters = [
            'selectedCategory' => $request->integer('selectedCategory', 1),
            'selectedGender' => (string) $request->query('selectedGender', 'All'),
            'selectedSport' => $request->integer('selectedSport', 18),
            'selectedStyle' => $request->integer('selectedStyle', 0),
        ];

        $items = collect();
        $grouped = collect();
        $error = null;

        $categories = [];
        $styles = [
            ['id' => 20, 'product_category_name' => 'Game Uniforms'],
            ['id' => 8, 'product_category_name' => 'Shorts & Skirts'],
            ['id' => 11, 'product_category_name' => 'Tops'],
            ['id' => 9, 'product_category_name' => 'Socks'],
            ['id' => 2, 'product_category_name' => 'Pants & Sweats'],
            ['id' => 7, 'product_category_name' => 'Hoodies & Fleece'],
            ['id' => 1, 'product_category_name' => 'Bags'],
            ['id' => 17, 'product_category_name' => 'Hats'],
            ['id' => 5, 'product_category_name' => 'Outerwear'],
            ['id' => 3, 'product_category_name' => 'Underwear & Bras'],
            ['id' => 23, 'product_category_name' => 'Compression Bottoms'],
            ['id' => 22, 'product_category_name' => 'Compression Tops'],
            ['id' => 21, 'product_category_name' => 'Compression & Leggings'],
        ];

        try {
            $sportGroups = $catalog->groups((int) $filters['selectedSport'], [
                'category' => $filters['selectedCategory'],
                'gender' => $filters['selectedGender'],
                'style' => $filters['selectedStyle'],
            ]);

            $search = mb_strtolower(trim((string) $request->query('search', '')));
            foreach ($sportGroups as $group) {
                $category = trim((string) ($group['cat'] ?? 'Other Products'));
                foreach ($group['items'] ?? [] as $card) {
                    $id = (int) ($card['id'] ?? 0);
                    $name = (string) ($card['n'] ?? 'Product');
                    if ($id <= 0 || ($search !== '' && !str_contains(mb_strtolower($name), $search))) {
                        continue;
                    }

                    $items->push([
                        'id' => $id,
                        'name' => $name,
                        'price' => (float) ($card['price'] ?? 0),
                        'price_formatted' => (string) ($card['p'] ?? ''),
                        'images' => [($card['img'] ?? null) ?: asset('images/product-placeholder.svg')],
                        'colors' => $card['colors'] ?? [],
                        'category' => $category,
                    ]);
                }
            }

            $sort = $request->query('sort');
            if ($sort === 'price_asc') {
                $items = $items->sortBy('price')->values();
            } elseif ($sort === 'price_desc') {
                $items = $items->sortByDesc('price')->values();
            } elseif ($sort === 'name') {
                $items = $items->sortBy('name', SORT_NATURAL | SORT_FLAG_CASE)->values();
            }

            $grouped = $items->groupBy('category');
        } catch (Throwable $exception) {
            Log::error('Shop catalog failed while using sport catalog service', [
                'exception' => get_class($exception),
                'message' => $exception->getMessage(),
                'file' => $exception->getFile(),
                'line' => $exception->getLine(),
                'filters' => $filters,
            ]);
            $error = 'Products are temporarily unavailable. Please try again.';
        }

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
