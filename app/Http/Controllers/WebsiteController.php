<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

final class WebsiteController
{
    public function index(): View
    {
        return view('website.home.index');
    }

    public function volleyball(\Illuminate\Http\Request $request, \App\Services\EncoreProductService $inventory): View
    {
        $filters = $request->validate([
            'category' => ['nullable','integer','in:1,2,3,5'],
            'style' => ['nullable','integer','min:0'],
            'gender' => ['nullable','string','max:25'],
            'search' => ['nullable','string','max:100'],
            'page' => ['nullable','integer','min:1'],
        ]);
        $products = array_map([$inventory,'card'], $inventory->products(11, $filters));
        return view('website.volleyball.index', compact('products', 'filters'));
    }

    public function legacyVolleyball(): RedirectResponse
    {
        return redirect()->route('sports.volleyball', status: 301);
    }
}
