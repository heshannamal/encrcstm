<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Resend, Postmark, AWS, and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'postmark' => [
        'key' => env('POSTMARK_API_KEY'),
    ],

    'resend' => [
        'key' => env('RESEND_API_KEY'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'encore' => [
        'base_url' => env('ENCORE_API_URL', 'https://inventory.encr.co/api'),
        'asset_url' => env('ENCORE_ASSET_URL', 'https://encr.co/assets'),
        'api_key' => env('ENCORE_API_KEY', ''),
        'api_token' => env('ENCORE_API_TOKEN', ''),
        'sales_channel_id' => (int) env('ENCORE_SALES_CHANNEL_ID', 1),
        'inventory_type_id' => (int) env('ENCORE_INVENTORY_TYPE_ID', 2),
        'timeout' => min(30, max(3, (int) env('ENCORE_API_TIMEOUT', 15))),
        'cache_seconds' => (int) env('ENCORE_API_CACHE_SECONDS', 300),
        'currency_symbol' => env('ENCORE_CURRENCY_SYMBOL', '
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],

];
),
        'product_detail_url' => env('ENCORE_PRODUCT_DETAIL_URL', 'https://encr.co/productDetails'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],

];
