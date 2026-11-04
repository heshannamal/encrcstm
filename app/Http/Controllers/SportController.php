<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\EncoreCatalogService;
use App\Services\SportClubDirectory;
use Illuminate\Contracts\View\View;

final class SportController
{
    public function show(
        string $sport,
        EncoreCatalogService $catalog,
        SportClubDirectory $clubs
    ): View {
        $sports = config('sports', []);
        abort_unless(array_key_exists($sport, $sports), 404);

        $info = $sports[$sport];
        $content = array_replace_recursive(
            config('sport_pages.defaults', []),
            config("sport_pages.overrides.{$sport}", [])
        );

        if ($sport !== 'volleyball') {
            $content['kits'][0]['title'] = 'Game Jersey';
            $content['kits'][0]['tag'] = 'Home and away options';
            $content['kits'][0]['description'] = 'Made for your team with flexible cuts, durable fabric and coordinated colors.';
        }

        $name = $info['name'];
        $id = (int) $info['id'];

        $page = array_merge($content, [
            'slug' => $sport,
            'name' => $name,
            'id' => $id,
            'sports' => $sports,
            'hero' => array_merge($content['hero'], [
                'accent' => $content['hero']['accent'] ?? strtolower($name).'.',
            ]),
            'seo' => [
                'title' => $sport === 'volleyball' ? config('site.volleyball_title') : "{$name} | Encore Custom",
                'description' => $sport === 'volleyball' ? config('site.volleyball_description') : "Custom {$name} uniforms and teamwear from Encore Custom.",
                'canonical' => route('sports.show', ['sport' => $sport]),
            ],
            'catalog' => [
                'groups' => $catalog->groups($id),
            ],
            'full_catalog_url' => 'https://encr.co/product_filter?'.http_build_query([
                'selectedGender' => 'All',
                'selectedCategory' => 5,
                'selectedSport' => $id,
                'selectedStyle' => 0,
            ]),
            'clubs' => $clubs->forSport($sport),
        ]);

        return view('website.sports.show', ['page' => $page]);
    }
}
