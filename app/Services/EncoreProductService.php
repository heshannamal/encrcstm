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
            'sales_channel_id' => config('services.encore.sales_channel_id'),
        ];
        if (isset($filters['page'])) {
            $query['page'] = $filters['page'];
        }

        return Cache::remember('encore:products:'.sha1(json_encode($query)), config('services.encore.cache_seconds'), function () use ($query): array {
            if (!config('services.encore.api_key') || !config('services.encore.api_token')) {
                Log::warning('Encore API credentials are not configured');
                return [];
            }

            try {
                $response = Http::withHeaders([
                    'API-Key' => config('services.encore.api_key'),
                    'API-Token' => config('services.encore.api_token'),
                    'Inventory-Type-Id' => (string) config('services.encore.inventory_type_id'),
                    'Sales-Channel-Id' => (string) config('services.encore.sales_channel_id'),
                ])->acceptJson()
                  ->timeout(config('services.encore.timeout'))
                  ->retry(2, 300, throw: false)
                  ->get(rtrim(config('services.encore.base_url'), '/').'/get_products', $query);

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
            $image = rtrim(config('services.encore.asset_url'), '/').'/'.ltrim($image, '/');
        }

        $price = data_get($item,'price') ?? data_get($item,'selling_price')
            ?? data_get($item,'product_price');

        $url = null;
        if (is_scalar($id) && (string) $id !== '') {
            $base = config('services.encore.product_detail_url');
            $type = data_get($item,'type')
                ?? data_get($item,'product_type')
                ?? (data_get($item,'sub_product_id') ? 'sub_product' : 'product');
            $type = in_array($type,['product','sub_product'],true) ? $type : 'product';
            $url = rtrim($base,'/').'/'.rawurlencode((string) $id).'?'.http_build_query([
                'type' => $type,
                'selectedGender' => 'All',
                'selectedCategory' => 5,
                'selectedSport' => $item['_sport_id'] ?? 11,
                'selectedStyle' => 0,
            ]);
        }

        return [
            'name' => (string) (data_get($item,'name') ?? data_get($item,'product_name') ?? data_get($item,'product.name') ?? 'Product'),
            'image' => $image,
            'price' => is_numeric($price) ? number_format((float) $price,2) : null,
            'url' => $url,
        ];
    }
}
