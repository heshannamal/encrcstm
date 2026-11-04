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

    public function volleyball(\App\Services\EncoreCatalogService $catalog): View
    {
        return view('website.volleyball.index', [
            'sport' => config('sports.volleyball') + ['slug'=>'volleyball'],
            'sports' => config('sports'),
            'catalogGroups' => $catalog->groups(11),
            'clubList' => config('clubs.volleyball', []),
        ]);
    }

    public function legacyVolleyball(): RedirectResponse
    {
        return redirect()->route('sports.volleyball', status: 301);
    }
}
