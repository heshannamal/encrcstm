<?php

declare(strict_types=1);

namespace App\Services;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Services\EncoreApiClient;
use Throwable;

final class EncoreProductService
{
    public function __construct(private EncoreApiClient $api) {}

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
        if ($sportId === 18) {
            return true;
        }

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

    public function mainCategories(): array
    {
        return $this->api->get('v1/get_main_categories');
    }

    public function sports(): array
    {
        return $this->api->get('v1/get_sports');
    }

    public function productCategories(): array
    {
        return $this->api->get('v1/get_product_categories');
    }


    public function product(int $id): array
    {
        $response = $this->api->get('v1/products/'.$id);
        $detail = ($response['success'] ?? false) ? $this->asArray($response['data'] ?? []) : [];

        if (!$detail || !$this->hasCustomDisplayFields($detail)) {
            try {
                $catalogue = $this->products(18, ['category' => 5]);
                $displayProduct = collect($catalogue)->first(function ($item) use ($id): bool {
                    return (int) $this->first($this->asArray($item), [
                        'id', 'sub_product_id', 'product_id',
                    ], 0) === $id;
                });

                if ($displayProduct) {
                    $detail = $detail
                        ? $this->mergeCustomDisplayFields($detail, $this->asArray($displayProduct))
                        : $this->asArray($displayProduct);
                }
            } catch (Throwable $exception) {
                Log::warning('Unable to enrich Encore product detail with catalog fields', [
                    'product_id' => $id,
                    'error' => $exception->getMessage(),
                ]);
            }
        }

        if (!$detail) {
            return ['success' => false, 'data' => null, 'message' => 'Product unavailable'];
        }

        return ['success' => true, 'data' => $detail];
    }

    public function options(int $id): array
    {
        return $this->api->get('v1/get_product_options/' . $id);
    }

    public function stockForCombination(int $productId, int $sizeId, ?int $colorId): int
    {
        $response = $this->options($productId);
        $combinations = collect($response['combinations'] ?? data_get($response, 'data.combinations', []));

        $match = $combinations->first(function ($item) use ($sizeId, $colorId) {
            $itemSize = (int) data_get($item, 'size_id');
            $itemColor = data_get($item, 'color_id');
            $itemColor = ($itemColor === null || $itemColor === '') ? null : (int) $itemColor;

            return $itemSize === $sizeId && $itemColor === $colorId;
        });

        return max(0, (int) data_get($match, 'stock_qty', 0));
    }

    public function catalogCard(array $item): array
    {
        $card = $this->card($item);
        $id = (int) (data_get($item, 'id') ?? data_get($item, 'sub_product_id') ?? 0);
        $price = $card['price'] === null ? 0.0 : (float) $card['price'];
        $image = $card['image'] ?: asset('images/product-placeholder.svg');

        return [
            'id' => $id,
            'name' => $card['name'],
            'price' => $price,
            'price_formatted' => (string) config('services.encore.currency_symbol', '$').number_format($price, 2),
            'images' => [$image],
            'raw' => $item,
        ];
    }

    public function normalizeProduct($item): array
    {
        $item = $this->asArray($item);

        $id = (int) $this->first($item, [
            'id',
            'sub_product_id',
            'product_id',
        ], 0);

        /*
         * Encore can return inventory-specific storefront overrides. Each
         * custom display value is preferred independently; when it is empty we
         * fall back to the same raw fields the storefront already used.
         */
        $name = (string) $this->first($item, [
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

        $price = (float) $this->first($item, [
            'display_product_price',
            'product_display_detail.product_price',
            'display_price',
            'retail_price.price',
            'retailPrice.price',
            'price',
            'default_price',
            'product_details.default_price',
        ], 0);

        $currencySymbol = (string) config('services.encore.currency_symbol', '$');

        $priceFormatted = (string) $this->first($item, [
            'display_price_formatted',
            'product_display_detail.price_formatted',
        ], $currencySymbol . number_format($price, 2));

        $description = (string) $this->first($item, [
            'display_product_description',
            'description',
            'product_details.description',
            'short_description',
        ], '');

        /*
         * Build the legacy gallery first, then allow each custom display image
         * slot to override the equivalent position. This gives the expected
         * behavior when, for example, only display_main_image and
         * display_sub_image_1 are configured: the remaining thumbnails keep
         * using the existing product images.
         */
        $legacyImages = collect([
            $this->first($item, ['display_product_image', 'display_image', 'catalog_image']),
            $this->first($item, ['mockup_img', 'product_details.mockup_img']),
            $this->first($item, ['mockup_img_1', 'product_details.mockup_img_1']),
            $this->first($item, ['mockup_img_2', 'product_details.mockup_img_2']),
            $this->first($item, ['mockup_img_3', 'product_details.mockup_img_3']),
            $this->first($item, ['mockup_img_4', 'product_details.mockup_img_4']),
            $this->first($item, ['image', 'image_url', 'product_image']),
        ])->filter(fn ($path) => filled($path))->values();

        foreach (['display_product_images', 'images', 'product_images'] as $path) {
            $value = data_get($item, $path);
            if (is_array($value)) {
                foreach ($value as $image) {
                    if (is_string($image)) {
                        $legacyImages->push($image);
                    } elseif (is_array($image)) {
                        $legacyImages->push($this->first($image, ['url', 'path', 'image', 'image_url']));
                    }
                }
            }
        }

        $legacyImages = $legacyImages
            ->filter(fn ($path) => filled($path))
            ->unique()
            ->values();

        $customImageSlots = [
            $this->first($item, [
                'display_main_image',
                'product_display_detail.product_main_image',
            ]),
            $this->first($item, [
                'display_sub_image_1',
                'product_display_detail.product_sub_image_1',
            ]),
            $this->first($item, [
                'display_sub_image_2',
                'product_display_detail.product_sub_image_2',
            ]),
            $this->first($item, [
                'display_sub_image_3',
                'product_display_detail.product_sub_image_3',
            ]),
        ];

        $gallerySlots = [];
        $slotCount = max(4, $legacyImages->count());

        for ($index = 0; $index < $slotCount; $index++) {
            $custom = $customImageSlots[$index] ?? null;
            $legacy = $legacyImages->get($index);
            $chosen = filled($custom) ? $custom : $legacy;

            if (filled($chosen)) {
                $gallerySlots[] = $chosen;
            }
        }

        $images = collect($gallerySlots)
            ->filter(fn ($path) => filled($path))
            ->unique()
            ->map(fn ($path) => $this->api->asset($path))
            ->values();

        if ($images->isEmpty()) {
            $images->push(asset('images/product-placeholder.svg'));
        }

        return [
            'id' => $id,
            'name' => $name,
            'description' => $description,
            'price' => $price,
            'price_formatted' => $priceFormatted,
            'currency_symbol' => $currencySymbol,
            'images' => $images->all(),
            'has_custom_display' => (bool) $this->first($item, [
                'has_custom_display',
                'product_display_detail.has_custom_display',
            ], false),
            'raw' => $item,
        ];
    }

    public function normalizeCartItem($item): array
    {
        $item = $this->asArray($item);
        $product = $this->normalizeProduct($item);
        $qty = max(1, (int) $this->first($item, ['cart_qty', 'quantity', 'qty'], 1));

        $product['cart_id'] = (int) $this->first($item, ['cart_id', 'cart.id'], 0);
        $product['quantity'] = $qty;
        $product['stock_qty'] = max(0, (int) $this->first($item, ['stock_qty', 'selected_stock.stock_qty'], 0));
        $product['size_id'] = $this->nullableInt($this->first($item, ['size_id', 'selected_size.id', 'size.id']));
        $product['size_name'] = $this->first($item, ['size_name', 'selected_size.size_name', 'size.size_name'], '—');
        $product['color_id'] = $this->nullableInt($this->first($item, ['color_id', 'selected_color.id', 'color.id']));
        $product['color_hex'] = $this->normalizeHex($this->first($item, ['color_hex', 'selected_color.hex', 'color.hex']));
        $product['color_name'] = $this->first($item, ['color_name', 'selected_color.pantone_code', 'selected_color.color_name']);
        $product['line_total'] = round($product['price'] * $qty, 2);

        return $product;
    }

    protected function matchesFallbackFilters($item, array $filters): bool
    {
        $item = $this->asArray($item);

        $selectedGender = $filters['selectedGender'] ?? null;
        if ($selectedGender && $selectedGender !== 'All') {
            $gender = (string) $this->first($item, [
                'product_details.gender',
                'productDetails.gender',
                'gender',
            ], '');

            if ($gender !== '' && !in_array($gender, [$selectedGender, 'Uni'], true)) {
                return false;
            }
        }

        $selectedSport = $filters['selectedSport'] ?? null;
        if ($selectedSport && (string) $selectedSport !== '18') {
            $sportIds = $this->relatedIds($item, [
                'product_details.product_sport',
                'productDetails.productSport',
                'product_details.product_sports',
                'productDetails.productSports',
            ], ['sport_id', 'sport.id', 'id']);

            // Encore treats sport 18 as "All" and includes it for every sport.
            if ($sportIds && !in_array((int) $selectedSport, $sportIds, true) && !in_array(18, $sportIds, true)) {
                return false;
            }
        }

        $selectedStyle = $filters['selectedStyle'] ?? null;
        if ($selectedStyle && !in_array((string) $selectedStyle, ['0', 'All'], true)) {
            $styleIds = $this->relatedIds($item, [
                'product_details.product_categories',
                'productDetails.productCategories',
            ], ['product_category_id', 'categories.id', 'category.id', 'id']);

            if ($styleIds && !in_array((int) $selectedStyle, $styleIds, true)) {
                return false;
            }
        }

        return true;
    }

    protected function hasCustomDisplayFields(array $item): bool
    {
        foreach ([
            'display_product_name',
            'display_product_price',
            'display_price_formatted',
            'display_main_image',
            'display_sub_image_1',
            'display_sub_image_2',
            'display_sub_image_3',
            'product_display_detail',
        ] as $key) {
            $value = data_get($item, $key);

            if ($value !== null && $value !== '' && $value !== []) {
                return true;
            }
        }

        return false;
    }

    protected function mergeCustomDisplayFields(array $detail, array $catalogue): array
    {
        foreach ([
            'display_product_name',
            'display_product_price',
            'display_price_formatted',
            'display_main_image',
            'display_sub_image_1',
            'display_sub_image_2',
            'display_sub_image_3',
            'has_custom_display',
            'product_display_detail',
        ] as $key) {
            $value = data_get($catalogue, $key);

            if ($value !== null && $value !== '' && $value !== []) {
                $detail[$key] = $value;
            }
        }

        return $detail;
    }

    protected function relatedIds(array $item, array $relationPaths, array $idPaths): array
    {
        $ids = collect();

        foreach ($relationPaths as $relationPath) {
            $relations = data_get($item, $relationPath, []);

            if (!is_array($relations)) {
                continue;
            }

            if (!array_is_list($relations)) {
                $relations = [$relations];
            }

            foreach ($relations as $relation) {
                if (!is_array($relation)) {
                    continue;
                }

                foreach ($idPaths as $idPath) {
                    $value = data_get($relation, $idPath);
                    if ($value !== null && $value !== '') {
                        $ids->push((int) $value);
                    }
                }
            }
        }

        return $ids->filter(fn ($id) => $id > 0)->unique()->values()->all();
    }

    protected function normalizeHex($hex): ?string
    {
        if (!$hex) {
            return null;
        }

        $hex = trim((string) $hex);
        return str_starts_with($hex, '#') ? $hex : '#' . $hex;
    }

    protected function asArray($value): array
    {
        if (is_array($value)) {
            return $value;
        }

        return (array) json_decode(json_encode($value), true);
    }

    protected function first(array $data, array $paths, $default = null)
    {
        foreach ($paths as $path) {
            $value = data_get($data, $path);
            if ($value !== null && $value !== '') {
                return $value;
            }
        }

        return $default;
    }

    protected function nullableInt($value): ?int
    {
        return ($value === null || $value === '') ? null : (int) $value;
    }
}
