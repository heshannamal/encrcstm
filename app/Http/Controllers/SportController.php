<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\EncoreProductService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

final class SportController
{
    public function show(Request $request, string $sport, EncoreProductService $inventory): View
    {
        $sports = config('sports', []);
        abort_unless(array_key_exists($sport, $sports), 404);
        $filters = $request->validate([
            'category' => ['nullable','integer','in:1,2,3,5'],
            'style' => ['nullable','integer','min:0'],
            'gender' => ['nullable','string','max:25'],
            'search' => ['nullable','string','max:100'],
            'page' => ['nullable','integer','min:1'],
        ]);

        return view('website.sports.show', [
            'sport' => $sports[$sport] + ['slug' => $sport],
            'sports' => $sports,
            'filters' => $filters,
            'products' => array_map([$inventory,'card'], $inventory->products((int) $sports[$sport]['id'], $filters)),
        ]);
    }
}
