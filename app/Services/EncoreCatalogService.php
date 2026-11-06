<?php

declare(strict_types=1);

namespace App\Services;

final class EncoreCatalogService
{
    private const STYLES = [
        20 => 'Game Uniforms', 8 => 'Shorts & Skirts', 11 => 'Tops',
        9 => 'Socks', 2 => 'Pants & Sweats', 7 => 'Hoodies & Fleece',
        1 => 'Bags', 17 => 'Hats', 5 => 'Outerwear',
        3 => 'Underwear & Bras', 23 => 'Compression Bottoms',
        22 => 'Compression Tops', 21 => 'Compression & Leggings',
    ];

    public function __construct(private readonly EncoreProductService $products) {}

    /** @return array<int, array{cat:string,items:array}> */
    public function groups(int $sportId, array $filters = []): array
    {
        $groups = [];
        foreach ($this->products->products($sportId, $filters) as $raw) {
            $raw['_sport_id'] = $sportId;
            $card = $this->products->card($raw);

            $id = data_get($raw, 'id') ?? data_get($raw, 'sub_product_id');
            if (!is_numeric($id) || (int) $id < 1) {
                continue;
            }

            $relations = data_get($raw, 'product_details.product_categories')
                ?? data_get($raw, 'productDetails.productCategories')
                ?? [];

            if (is_array($relations) && !array_is_list($relations)) {
                $relations = [$relations];
            }

            $relatedCategory = null;
            $relatedId = null;

            foreach (is_array($relations) ? $relations : [] as $relation) {
                if (!is_array($relation)) {
                    continue;
                }

                $id = data_get($relation, 'product_category_id')
                    ?? data_get($relation, 'categories.id')
                    ?? data_get($relation, 'category.id')
                    ?? data_get($relation, 'id');

                $name = data_get($relation, 'category_name')
                    ?? data_get($relation, 'product_category_name')
                    ?? data_get($relation, 'categories.product_category_name')
                    ?? data_get($relation, 'categories.name')
                    ?? data_get($relation, 'category.name')
                    ?? data_get($relation, 'name');

                if ($id !== null || filled($name)) {
                    $relatedId = $id;
                    $relatedCategory = $name;
                    break;
                }
            }

            $styleId = data_get($raw, 'product_style_id')
                ?? data_get($raw, 'style_id')
                ?? data_get($raw, 'style.id')
                ?? data_get($raw, 'product_style.id')
                ?? $relatedId;

            $category = data_get($raw, 'style_name')
                ?? data_get($raw, 'product_style_name')
                ?? data_get($raw, 'style.name')
                ?? data_get($raw, 'product_style.name')
                ?? $relatedCategory
                ?? data_get($raw, 'category_name')
                ?? (self::STYLES[(int) $styleId] ?? 'Other Products');

            $category = trim((string) $category);
            if ($category === '') $category = 'Other Products';

            $groups[$category][] = [
                'id' => (int) (data_get($raw, 'id') ?? data_get($raw, 'sub_product_id')),
                'price' => $card['price'] === null ? 0.0 : (float) $card['price'],
                'n' => $card['name'],
                'p' => $card['price'] === null ? '' : config('services.encore.currency_symbol').$card['price'],
                'img' => $card['image'],
                'u' => route('shop.product', ['id' => (int) $id]),
            ];
        }

        // Preserve stable, meaningful grouping order.
        $result = [];
        $seen = [];
        foreach (self::STYLES as $name) {
            foreach ($groups as $category => $items) {
                if (strcasecmp($category, $name) === 0 && !isset($seen[$category])) {
                    $result[] = ['cat'=>$category,'items'=>$items];
                    $seen[$category] = true;
                }
            }
        }
        foreach ($groups as $category => $items) {
            if (!isset($seen[$category])) {
                $result[] = ['cat'=>$category,'items'=>$items];
            }
        }
        return $result;
    }
}
