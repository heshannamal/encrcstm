<?php

declare(strict_types=1);

use App\Http\Controllers\SportController;
use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WebsiteController::class, 'index'])->name('home');
Route::get('/sports/{sport}', [SportController::class, 'show'])->name('sports.show');
