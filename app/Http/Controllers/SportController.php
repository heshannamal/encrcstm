<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\EncoreCatalogService;
use Illuminate\Contracts\View\View;

final class SportController
{
    public function show(string $sport, EncoreCatalogService $catalog): View
    {
        $sports = config('sports', []);
        abort_unless(isset($sports[$sport]), 404);

        return view('website.sports.show', [
            'sport' => $sports[$sport] + ['slug'=>$sport],
            'sports' => $sports,
            'catalogGroups' => $catalog->groups((int) $sports[$sport]['id']),
            'clubList' => config('clubs.'.$sport, config('clubs.default', [])),
        ]);
    }
}
