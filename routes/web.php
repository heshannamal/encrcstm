<?php

declare(strict_types=1);

use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WebsiteController::class, 'index'])->name('home');
Route::get('/sports/volleyball', [WebsiteController::class, 'volleyball'])->name('sports.volleyball');
Route::get('/volleyball', [WebsiteController::class, 'legacyVolleyball'])->name('volleyball.legacy');
