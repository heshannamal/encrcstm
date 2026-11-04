<?php

declare(strict_types=1);

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Throwable;

final class EncoreProductService
{
    public function products(int $sportId, array $filters = []): array
    {
        $query = [
            'selectedSport' => $sportId,
            'selectedCategory' => $filters['category'] ?? 5,
            'selectedGender' => $filters['gender'] ?? 'All',
            'selectedStyle' => $filters['style'] ?? 0,
            'search' => $filters['search'] ?? '',
            'sales_channel_id' => config('encore.sales_channel_id'),
        ];
        if (isset($filters['page'])) {
            $query['page'] = $filters['page'];
        }

        return Cache::remember('encore:products:'.sha1(json_encode($query)), config('encore.cache_seconds'), function () use ($query): array {
            if (!config('encore.api_key') || !config('encore.api_token')) {
                Log::warning('Encore API credentials are not configured');
                return [];
            }

            try {
                $response = Http::withHeaders([
                    'API-Key' => config('encore.api_key'),
                    'API-Token' => config('encore.api_token'),
                    'Inventory-Type-Id' => (string) config('encore.inventory_type_id'),
                    'Sales-Channel-Id' => (string) config('encore.sales_channel_id'),
                ])->acceptJson()
                  ->timeout(config('encore.timeout'))
                  ->retry(2, 300, throw: false)
                  ->get(rtrim(config('encore.base_url'), '/').'/get_products', $query);

                if (!$response->successful()) {
                    Log::warning('Encore products API failed', ['status' => $response->status()]);
                    return [];
                }

                $json = $response->json();
                if (!is_array($json)) {
                    return [];
                }

                $items = data_get($json, 'data.data') ?? data_get($json, 'data') ?? data_get($json, 'products') ?? [];
                return is_array($items) ? array_values(array_filter($items, 'is_array')) : [];
            } catch (Throwable $exception) {
                Log::warning('Encore products API unavailable', ['error' => $exception->getMessage()]);
                return [];
            }
        });
    }

    public function card(array $item): array
    {
        $id = data_get($item,'id') ?? data_get($item,'product_id')
            ?? data_get($item,'sub_product_id') ?? data_get($item,'product.id');
        $image = data_get($item,'image_url') ?? data_get($item,'image')
            ?? data_get($item,'product_image') ?? data_get($item,'product.image')
            ?? data_get($item,'images.0.image');
        if (!is_string($image)) {
            $image = null;
        } elseif ($image !== '' && !preg_match('~^https?://~i', $image)) {
            $image = rtrim(config('encore.asset_url'), '/').'/'.ltrim($image, '/');
        }

        $price = data_get($item,'price') ?? data_get($item,'selling_price')
            ?? data_get($item,'product_price');

        $url = null;
        if (is_scalar($id) && (string) $id !== '') {
            $base = config('encore.product_detail_url');
            $url = $base.(str_contains($base, '?') ? '&' : '?')
                .http_build_query([config('encore.product_detail_parameter') => (string) $id]);
        }

        return [
            'name' => (string) (data_get($item,'name') ?? data_get($item,'product_name') ?? data_get($item,'product.name') ?? 'Product'),
            'image' => $image,
            'price' => is_numeric($price) ? number_format((float) $price,2) : null,
            'url' => $url,
        ];
    }
}
