<?php

declare(strict_types=1);

namespace App\Services;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Throwable;

final class EncoreProductService
{
    public function products(int $sportId, array $filters = []): array
    {
        $query = [
            'selectedCategory' => $filters['category'] ?? 5,
            'selectedGender' => $filters['gender'] ?? 'All',
            'selectedSport' => $sportId,
            'selectedStyle' => $filters['style'] ?? 0,
        ];

        if (filled($filters['search'] ?? null)) {
            $query['search'] = $filters['search'];
        }

        $key = 'encore:products:v1:'.sha1(json_encode($query));

        return Cache::remember($key, (int) config('services.encore.cache_seconds', 300), function () use ($query): array {
            if (!filled(config('services.encore.api_key')) || !filled(config('services.encore.api_token'))) {
                Log::warning('Encore API credentials are not configured');
                return [];
            }

            $primary = $this->request('v1/get_products', $query);

            if ($primary instanceof Response && $primary->successful()) {
                $decoded = $primary->json();

                if (is_array($decoded) && ($decoded['success'] ?? true) !== false) {
                    return $this->items($decoded);
                }

                Log::warning('Encore product endpoint returned an unsuccessful response', [
                    'endpoint' => 'v1/get_products',
                    'status' => $primary->status(),
                ]);
                return [];
            }

            $status = $primary instanceof Response ? $primary->status() : 0;

            if ($status > 0 && $status < 500) {
                Log::warning('Encore product endpoint rejected request', [
                    'endpoint' => 'v1/get_products',
                    'status' => $status,
                ]);
                return [];
            }

            $fallback = $this->request('v1/products', [
                'per_page' => 500,
            ]);

            if (!$fallback instanceof Response || !$fallback->successful()) {
                Log::warning('Encore fallback product endpoint failed', [
                    'endpoint' => 'v1/products',
                    'status' => $fallback instanceof Response ? $fallback->status() : null,
                ]);
                return [];
            }

            $decoded = $fallback->json();

            if (!is_array($decoded) || ($decoded['success'] ?? true) === false) {
                return [];
            }

            return array_values(array_filter(
                $this->items($decoded),
                fn (array $item): bool => $this->matchesSport($item, (int) $query['selectedSport'])
                    && $this->matchesStyle($item, (int) $query['selectedStyle'])
                    && $this->matchesGender($item, (string) $query['selectedGender'])
            ));
        });
    }

    private function request(string $endpoint, array $query): ?Response
    {
        try {
            return Http::acceptJson()
                ->asJson()
                ->withHeaders([
                    'X-Requested-With' => 'XMLHttpRequest',
                    'API-Key' => (string) config('services.encore.api_key'),
                    'API-Token' => (string) config('services.encore.api_token'),
                    'Sales-Channel-Id' => (string) config('services.encore.sales_channel_id', 1),
                    'Inventory-Type-Id' => (string) config('services.encore.inventory_type_id', 2),
                ])
                ->connectTimeout(min(10, (int) config('services.encore.timeout', 15)))
                ->timeout((int) config('services.encore.timeout', 15))
                ->get(rtrim((string) config('services.encore.base_url'), '/').'/'.$endpoint, $query);
        } catch (Throwable $exception) {
            Log::warning('Encore API connection failed', [
                'endpoint' => $endpoint,
                'error' => $exception->getMessage(),
            ]);
            return null;
        }
    }

    private function items(array $decoded): array
    {
        $items = data_get($decoded, 'data.data')
            ?? data_get($decoded, 'data.products')
            ?? data_get($decoded, 'data')
            ?? data_get($decoded, 'products')
            ?? [];

        return is_array($items)
            ? array_values(array_filter($items, 'is_array'))
            : [];
    }

    private function matchesSport(array $item, int $sportId): bool
    {
        $sports = data_get($item, 'product_details.product_sport')
            ?? data_get($item, 'productDetails.productSport')
            ?? data_get($item, 'product_details.product_sports')
            ?? data_get($item, 'productDetails.productSports')
            ?? [];

        if (!is_array($sports) || $sports === []) {
            return true;
        }

        if (!array_is_list($sports)) {
            $sports = [$sports];
        }

        $ids = [];

        foreach ($sports as $sport) {
            if (is_numeric($sport)) {
                $ids[] = (int) $sport;
            } elseif (is_array($sport)) {
                $id = data_get($sport, 'sport_id') ?? data_get($sport, 'sport.id') ?? data_get($sport, 'id');
                if (is_numeric($id)) {
                    $ids[] = (int) $id;
                }
            }
        }

        return $ids === [] || in_array($sportId, $ids, true) || in_array(18, $ids, true);
    }

    private function matchesStyle(array $item, int $styleId): bool
    {
        if ($styleId === 0) {
            return true;
        }

        $styles = data_get($item, 'product_details.product_categories')
            ?? data_get($item, 'productDetails.productCategories')
            ?? [];

        if (!is_array($styles) || $styles === []) {
            return true;
        }

        if (!array_is_list($styles)) {
            $styles = [$styles];
        }

        $ids = [];
        foreach ($styles as $style) {
            if (is_numeric($style)) {
                $ids[] = (int) $style;
            } elseif (is_array($style)) {
                $id = data_get($style, 'product_category_id')
                    ?? data_get($style, 'categories.id')
                    ?? data_get($style, 'category.id')
                    ?? data_get($style, 'id');
                if (is_numeric($id)) {
                    $ids[] = (int) $id;
                }
            }
        }

        return $ids === [] || in_array($styleId, $ids, true);
    }

    private function matchesGender(array $item, string $selectedGender): bool
    {
        if ($selectedGender === 'All') {
            return true;
        }

        $gender = data_get($item, 'product_details.gender')
            ?? data_get($item, 'productDetails.gender')
            ?? data_get($item, 'gender');

        return !filled($gender) || in_array((string) $gender, [$selectedGender, 'Uni'], true);
    }

    public function card(array $item): array
    {
        $id = $this->first($item, ['id', 'sub_product_id', 'product_id', 'product.id']);
        $type = $this->first($item, ['type', 'product_type']);

        if (!in_array($type, ['product', 'sub_product'], true)) {
            $type = filled($this->first($item, [
                'sub_product_no',
                'sub_product_id',
                'product_display_detail.sub_product_id',
            ])) ? 'sub_product' : 'product';
        }

        $name = $this->first($item, [
            'display_product_name',
            'product_display_detail.product_name',
            'display_name',
            'show_in_catalog_name',
            'product_name',
            'sub_product_name',
            'name',
            'product_details.show_in_catalog_name',
            'product_details.product_name',
        ], 'Product');

        $price = $this->first($item, [
            'display_product_price',
            'product_display_detail.product_price',
            'display_price',
            'retail_price.price',
            'retailPrice.price',
            'price',
            'default_price',
            'product_details.default_price',
        ]);

        $image = $this->first($item, [
            'display_main_image',
            'product_display_detail.product_main_image',
            'display_product_image',
            'display_image',
            'catalog_image',
            'mockup_img',
            'product_details.mockup_img',
            'image_url',
            'image',
            'product_image',
            'product.image',
            'images.0.image',
            'images.0.url',
            'images.0.path',
            'display_product_images.0',
        ]);

        if (is_array($image)) {
            $image = $image['url'] ?? $image['path'] ?? $image['image'] ?? null;
        }

        if (!is_string($image) || $image === '') {
            $image = null;
        } elseif (!preg_match('~^(https?:)?//~i', $image)) {
            $path = ltrim(str_replace('\\', '/', $image), '/');
            $base = rtrim((string) config('services.encore.asset_url'), '/');

            if (str_ends_with(strtolower($base), '/assets') && str_starts_with(strtolower($path), 'assets/')) {
                $path = substr($path, 7);
            }

            $image = $base.'/'.implode('/', array_map(
                fn (string $segment): string => rawurlencode(rawurldecode($segment)),
                explode('/', $path)
            ));
        }

        $url = null;
        if (is_scalar($id) && (string) $id !== '') {
            $url = rtrim((string) config('services.encore.product_detail_url'), '/')
                .'/'.rawurlencode((string) $id).'?'.http_build_query([
                    'type' => $type,
                    'selectedGender' => 'All',
                    'selectedCategory' => 5,
                    'selectedSport' => $item['_sport_id'] ?? 11,
                    'selectedStyle' => 0,
                ]);
        }

        return [
            'name' => (string) $name,
            'image' => $image,
            'price' => is_numeric($price) ? number_format((float) $price, 2) : null,
            'url' => $url,
        ];
    }

    private function first(array $item, array $paths, mixed $default = null): mixed
    {
        foreach ($paths as $path) {
            $value = data_get($item, $path);

            if ($value !== null && $value !== '' && $value !== []) {
                return $value;
            }
        }

        return $default;
    }
}
