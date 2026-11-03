<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap application services.
     */
    public function boot(): void
    {
        // Compatible with MySQL/MariaDB instances with a 1000-byte index
        // limit and utf8mb4 encoding (191 characters × 4 bytes = 764).
        Schema::defaultStringLength(191);
    }
}
