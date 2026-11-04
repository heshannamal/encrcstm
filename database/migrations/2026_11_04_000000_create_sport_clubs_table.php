<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sport_clubs', function (Blueprint $table): void {
            $table->id();
            $table->string('sport_slug', 60)->index();
            $table->string('name', 140);
            $table->string('logo_url')->nullable();
            $table->string('website_url')->nullable();
            $table->boolean('is_active')->default(true);
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
            $table->index(['sport_slug', 'is_active', 'sort_order'], 'sport_clubs_visible_index');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sport_clubs');
    }
};
