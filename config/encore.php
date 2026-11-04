<?php

declare(strict_types=1);

return [
 'base_url' => env('ENCORE_API_URL','https://inventory.encr.co/api'),
 'asset_url' => env('ENCORE_ASSET_URL','https://encr.co/assets'),
 'api_key' => env('ENCORE_API_KEY',''),
 'api_token' => env('ENCORE_API_TOKEN',''),
 'sales_channel_id' => (int) env('ENCORE_SALES_CHANNEL_ID',1),
 'inventory_type_id' => (int) env('ENCORE_INVENTORY_TYPE_ID',2),
 'timeout' => min(30,max(3,(int) env('ENCORE_API_TIMEOUT',15))),
 'cache_seconds' => (int) env('ENCORE_API_CACHE_SECONDS',300),
 'currency_symbol' => env('ENCORE_CURRENCY_SYMBOL','$'),
 'product_detail_url' => env('ENCORE_PRODUCT_DETAIL_URL','https://encr.co/productDetails'),
 'product_detail_parameter' => env('ENCORE_PRODUCT_DETAIL_PARAMETER','id'),
];
