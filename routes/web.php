<?php

declare(strict_types=1);

use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\SportController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WebsiteController::class, 'index'])->name('home');
Route::get('/sports/volleyball', [WebsiteController::class, 'volleyball'])->name('sports.volleyball');
Route::get('/sports/{sport}', [SportController::class, 'show'])->name('sports.show');
Route::get('/volleyball', [WebsiteController::class, 'legacyVolleyball'])->name('volleyball.legacy');
