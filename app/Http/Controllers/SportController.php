<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\EncoreCatalogService;
use App\Services\SportClubDirectory;
use Illuminate\Contracts\View\View;

final class SportController
{
    /**
     * Single public route. Every sport has a dedicated data function below
     * but renders the same website.sports.show Blade layout.
     */
    public function show(
        string $sport,
        EncoreCatalogService $catalog,
        SportClubDirectory $clubs
    ): View {
        abort_unless(array_key_exists($sport, config('sports', [])), 404);

        $page = match ($sport) {
            'baseball' => $this->baseball($catalog, $clubs),
            'basketball' => $this->basketball($catalog, $clubs),
            'bmx' => $this->bmx($catalog, $clubs),
            'cross-country' => $this->crossCountry($catalog, $clubs),
            'disc-golf' => $this->discGolf($catalog, $clubs),
            'field-hockey' => $this->fieldHockey($catalog, $clubs),
            'flag-football' => $this->flagFootball($catalog, $clubs),
            'football' => $this->football($catalog, $clubs),
            'golf' => $this->golf($catalog, $clubs),
            'hockey' => $this->hockey($catalog, $clubs),
            'lacrosse' => $this->lacrosse($catalog, $clubs),
            'mma' => $this->mma($catalog, $clubs),
            'rugby' => $this->rugby($catalog, $clubs),
            'running' => $this->running($catalog, $clubs),
            'soccer' => $this->soccer($catalog, $clubs),
            'softball' => $this->softball($catalog, $clubs),
            'swim' => $this->swim($catalog, $clubs),
            'tennis' => $this->tennis($catalog, $clubs),
            'track-and-field' => $this->trackAndField($catalog, $clubs),
            'volleyball' => $this->volleyball($catalog, $clubs),
            'yoga' => $this->yoga($catalog, $clubs),
            default => abort(404),
        };

        return view('website.sports.show', ['page' => $page]);
    }

    /**
     * Customize baseball page content here without editing shared Blade views.
     *
     * Supported overrides: hero, kit_heading, kits, contrast, proof,
     * contact, seo, catalog, clubs, and full_catalog_url.
     * Missing keys inherit config/sport_pages.php and backend services.
     *
     * @return array<string, mixed>
     */
    private function baseball(
        EncoreCatalogService $catalog,
        SportClubDirectory $clubs
    ): array {
        return $this->buildSportPage('baseball', $catalog, $clubs, [
            // 'hero' => [
            //     'subtitle' => 'Your baseball headline',
            //     'slides' => [
            //         ['image' => 'assets/sports/baseball/hero.jpg', 'position' => 'center'],
            //     ],
            // ],
            // 'proof' => [
            //     'quote' => 'A verified customer testimonial.',
            //     'attribution' => 'Customer name / organization',
            // ],
            // 'kits' => [/* Your own slide cards */],
        ]);
    }

    /**
     * Customize basketball page content here without editing shared Blade views.
     *
     * Supported overrides: hero, kit_heading, kits, contrast, proof,
     * contact, seo, catalog, clubs, and full_catalog_url.
     * Missing keys inherit config/sport_pages.php and backend services.
     *
     * @return array<string, mixed>
     */
    private function basketball(
        EncoreCatalogService $catalog,
        SportClubDirectory $clubs
    ): array {
        return $this->buildSportPage('basketball', $catalog, $clubs, [
            // 'hero' => [
            //     'subtitle' => 'Your basketball headline',
            //     'slides' => [
            //         ['image' => 'assets/sports/basketball/hero.jpg', 'position' => 'center'],
            //     ],
            // ],
            // 'proof' => [
            //     'quote' => 'A verified customer testimonial.',
            //     'attribution' => 'Customer name / organization',
            // ],
            // 'kits' => [/* Your own slide cards */],
        ]);
    }

    /**
     * Customize bmx page content here without editing shared Blade views.
     *
     * Supported overrides: hero, kit_heading, kits, contrast, proof,
     * contact, seo, catalog, clubs, and full_catalog_url.
     * Missing keys inherit config/sport_pages.php and backend services.
     *
     * @return array<string, mixed>
     */
    private function bmx(
        EncoreCatalogService $catalog,
        SportClubDirectory $clubs
    ): array {
        return $this->buildSportPage('bmx', $catalog, $clubs, [
            // 'hero' => [
            //     'subtitle' => 'Your bmx headline',
            //     'slides' => [
            //         ['image' => 'assets/sports/bmx/hero.jpg', 'position' => 'center'],
            //     ],
            // ],
            // 'proof' => [
            //     'quote' => 'A verified customer testimonial.',
            //     'attribution' => 'Customer name / organization',
            // ],
            // 'kits' => [/* Your own slide cards */],
        ]);
    }

    /**
     * Customize cross-country page content here without editing shared Blade views.
     *
     * Supported overrides: hero, kit_heading, kits, contrast, proof,
     * contact, seo, catalog, clubs, and full_catalog_url.
     * Missing keys inherit config/sport_pages.php and backend services.
     *
     * @return array<string, mixed>
     */
    private function crossCountry(
        EncoreCatalogService $catalog,
        SportClubDirectory $clubs
    ): array {
        return $this->buildSportPage('cross-country', $catalog, $clubs, [
            // 'hero' => [
            //     'subtitle' => 'Your cross-country headline',
            //     'slides' => [
            //         ['image' => 'assets/sports/cross-country/hero.jpg', 'position' => 'center'],
            //     ],
            // ],
            // 'proof' => [
            //     'quote' => 'A verified customer testimonial.',
            //     'attribution' => 'Customer name / organization',
            // ],
            // 'kits' => [/* Your own slide cards */],
        ]);
    }

    /**
     * Customize disc-golf page content here without editing shared Blade views.
     *
     * Supported overrides: hero, kit_heading, kits, contrast, proof,
     * contact, seo, catalog, clubs, and full_catalog_url.
     * Missing keys inherit config/sport_pages.php and backend services.
     *
     * @return array<string, mixed>
     */
    private function discGolf(
        EncoreCatalogService $catalog,
        SportClubDirectory $clubs
    ): array {
        return $this->buildSportPage('disc-golf', $catalog, $clubs, [
            // 'hero' => [
            //     'subtitle' => 'Your disc-golf headline',
            //     'slides' => [
            //         ['image' => 'assets/sports/disc-golf/hero.jpg', 'position' => 'center'],
            //     ],
            // ],
            // 'proof' => [
            //     'quote' => 'A verified customer testimonial.',
            //     'attribution' => 'Customer name / organization',
            // ],
            // 'kits' => [/* Your own slide cards */],
        ]);
    }

    /**
     * Customize field-hockey page content here without editing shared Blade views.
     *
     * Supported overrides: hero, kit_heading, kits, contrast, proof,
     * contact, seo, catalog, clubs, and full_catalog_url.
     * Missing keys inherit config/sport_pages.php and backend services.
     *
     * @return array<string, mixed>
     */
    private function fieldHockey(
        EncoreCatalogService $catalog,
        SportClubDirectory $clubs
    ): array {
        return $this->buildSportPage('field-hockey', $catalog, $clubs, [
            // 'hero' => [
            //     'subtitle' => 'Your field-hockey headline',
            //     'slides' => [
            //         ['image' => 'assets/sports/field-hockey/hero.jpg', 'position' => 'center'],
            //     ],
            // ],
            // 'proof' => [
            //     'quote' => 'A verified customer testimonial.',
            //     'attribution' => 'Customer name / organization',
            // ],
            // 'kits' => [/* Your own slide cards */],
        ]);
    }

    /**
     * Customize flag-football page content here without editing shared Blade views.
     *
     * Supported overrides: hero, kit_heading, kits, contrast, proof,
     * contact, seo, catalog, clubs, and full_catalog_url.
     * Missing keys inherit config/sport_pages.php and backend services.
     *
     * @return array<string, mixed>
     */
    private function flagFootball(
        EncoreCatalogService $catalog,
        SportClubDirectory $clubs
    ): array {
        return $this->buildSportPage('flag-football', $catalog, $clubs, [
            // 'hero' => [
            //     'subtitle' => 'Your flag-football headline',
            //     'slides' => [
            //         ['image' => 'assets/sports/flag-football/hero.jpg', 'position' => 'center'],
            //     ],
            // ],
            // 'proof' => [
            //     'quote' => 'A verified customer testimonial.',
            //     'attribution' => 'Customer name / organization',
            // ],
            // 'kits' => [/* Your own slide cards */],
        ]);
    }

    /**
     * Customize football page content here without editing shared Blade views.
     *
     * Supported overrides: hero, kit_heading, kits, contrast, proof,
     * contact, seo, catalog, clubs, and full_catalog_url.
     * Missing keys inherit config/sport_pages.php and backend services.
     *
     * @return array<string, mixed>
     */
    private function football(
        EncoreCatalogService $catalog,
        SportClubDirectory $clubs
    ): array {
        return $this->buildSportPage('football', $catalog, $clubs, [
            // 'hero' => [
            //     'subtitle' => 'Your football headline',
            //     'slides' => [
            //         ['image' => 'assets/sports/football/hero.jpg', 'position' => 'center'],
            //     ],
            // ],
            // 'proof' => [
            //     'quote' => 'A verified customer testimonial.',
            //     'attribution' => 'Customer name / organization',
            // ],
            // 'kits' => [/* Your own slide cards */],
        ]);
    }

    /**
     * Customize golf page content here without editing shared Blade views.
     *
     * Supported overrides: hero, kit_heading, kits, contrast, proof,
     * contact, seo, catalog, clubs, and full_catalog_url.
     * Missing keys inherit config/sport_pages.php and backend services.
     *
     * @return array<string, mixed>
     */
    private function golf(
        EncoreCatalogService $catalog,
        SportClubDirectory $clubs
    ): array {
        return $this->buildSportPage('golf', $catalog, $clubs, [
            // 'hero' => [
            //     'subtitle' => 'Your golf headline',
            //     'slides' => [
            //         ['image' => 'assets/sports/golf/hero.jpg', 'position' => 'center'],
            //     ],
            // ],
            // 'proof' => [
            //     'quote' => 'A verified customer testimonial.',
            //     'attribution' => 'Customer name / organization',
            // ],
            // 'kits' => [/* Your own slide cards */],
        ]);
    }

    /**
     * Customize hockey page content here without editing shared Blade views.
     *
     * Supported overrides: hero, kit_heading, kits, contrast, proof,
     * contact, seo, catalog, clubs, and full_catalog_url.
     * Missing keys inherit config/sport_pages.php and backend services.
     *
     * @return array<string, mixed>
     */
    private function hockey(
        EncoreCatalogService $catalog,
        SportClubDirectory $clubs
    ): array {
        return $this->buildSportPage('hockey', $catalog, $clubs, [
            // 'hero' => [
            //     'subtitle' => 'Your hockey headline',
            //     'slides' => [
            //         ['image' => 'assets/sports/hockey/hero.jpg', 'position' => 'center'],
            //     ],
            // ],
            // 'proof' => [
            //     'quote' => 'A verified customer testimonial.',
            //     'attribution' => 'Customer name / organization',
            // ],
            // 'kits' => [/* Your own slide cards */],
        ]);
    }

    /**
     * Customize lacrosse page content here without editing shared Blade views.
     *
     * Supported overrides: hero, kit_heading, kits, contrast, proof,
     * contact, seo, catalog, clubs, and full_catalog_url.
     * Missing keys inherit config/sport_pages.php and backend services.
     *
     * @return array<string, mixed>
     */
    private function lacrosse(
        EncoreCatalogService $catalog,
        SportClubDirectory $clubs
    ): array {
        return $this->buildSportPage('lacrosse', $catalog, $clubs, [
            // 'hero' => [
            //     'subtitle' => 'Your lacrosse headline',
            //     'slides' => [
            //         ['image' => 'assets/sports/lacrosse/hero.jpg', 'position' => 'center'],
            //     ],
            // ],
            // 'proof' => [
            //     'quote' => 'A verified customer testimonial.',
            //     'attribution' => 'Customer name / organization',
            // ],
            // 'kits' => [/* Your own slide cards */],
        ]);
    }

    /**
     * Customize mma page content here without editing shared Blade views.
     *
     * Supported overrides: hero, kit_heading, kits, contrast, proof,
     * contact, seo, catalog, clubs, and full_catalog_url.
     * Missing keys inherit config/sport_pages.php and backend services.
     *
     * @return array<string, mixed>
     */
    private function mma(
        EncoreCatalogService $catalog,
        SportClubDirectory $clubs
    ): array {
        return $this->buildSportPage('mma', $catalog, $clubs, [
            // 'hero' => [
            //     'subtitle' => 'Your mma headline',
            //     'slides' => [
            //         ['image' => 'assets/sports/mma/hero.jpg', 'position' => 'center'],
            //     ],
            // ],
            // 'proof' => [
            //     'quote' => 'A verified customer testimonial.',
            //     'attribution' => 'Customer name / organization',
            // ],
            // 'kits' => [/* Your own slide cards */],
        ]);
    }

    /**
     * Customize rugby page content here without editing shared Blade views.
     *
     * Supported overrides: hero, kit_heading, kits, contrast, proof,
     * contact, seo, catalog, clubs, and full_catalog_url.
     * Missing keys inherit config/sport_pages.php and backend services.
     *
     * @return array<string, mixed>
     */
    private function rugby(
        EncoreCatalogService $catalog,
        SportClubDirectory $clubs
    ): array {
        return $this->buildSportPage('rugby', $catalog, $clubs, [
            // 'hero' => [
            //     'subtitle' => 'Your rugby headline',
            //     'slides' => [
            //         ['image' => 'assets/sports/rugby/hero.jpg', 'position' => 'center'],
            //     ],
            // ],
            // 'proof' => [
            //     'quote' => 'A verified customer testimonial.',
            //     'attribution' => 'Customer name / organization',
            // ],
            // 'kits' => [/* Your own slide cards */],
        ]);
    }

    /**
     * Customize running page content here without editing shared Blade views.
     *
     * Supported overrides: hero, kit_heading, kits, contrast, proof,
     * contact, seo, catalog, clubs, and full_catalog_url.
     * Missing keys inherit config/sport_pages.php and backend services.
     *
     * @return array<string, mixed>
     */
    private function running(
        EncoreCatalogService $catalog,
        SportClubDirectory $clubs
    ): array {
        return $this->buildSportPage('running', $catalog, $clubs, [
            // 'hero' => [
            //     'subtitle' => 'Your running headline',
            //     'slides' => [
            //         ['image' => 'assets/sports/running/hero.jpg', 'position' => 'center'],
            //     ],
            // ],
            // 'proof' => [
            //     'quote' => 'A verified customer testimonial.',
            //     'attribution' => 'Customer name / organization',
            // ],
            // 'kits' => [/* Your own slide cards */],
        ]);
    }

    /**
     * Customize soccer page content here without editing shared Blade views.
     *
     * Supported overrides: hero, kit_heading, kits, contrast, proof,
     * contact, seo, catalog, clubs, and full_catalog_url.
     * Missing keys inherit config/sport_pages.php and backend services.
     *
     * @return array<string, mixed>
     */
    private function soccer(
        EncoreCatalogService $catalog,
        SportClubDirectory $clubs
    ): array {
        return $this->buildSportPage('soccer', $catalog, $clubs, [
            // 'hero' => [
            //     'subtitle' => 'Your soccer headline',
            //     'slides' => [
            //         ['image' => 'assets/sports/soccer/hero.jpg', 'position' => 'center'],
            //     ],
            // ],
            // 'proof' => [
            //     'quote' => 'A verified customer testimonial.',
            //     'attribution' => 'Customer name / organization',
            // ],
            // 'kits' => [/* Your own slide cards */],
        ]);
    }

    /**
     * Customize softball page content here without editing shared Blade views.
     *
     * Supported overrides: hero, kit_heading, kits, contrast, proof,
     * contact, seo, catalog, clubs, and full_catalog_url.
     * Missing keys inherit config/sport_pages.php and backend services.
     *
     * @return array<string, mixed>
     */
    private function softball(
        EncoreCatalogService $catalog,
        SportClubDirectory $clubs
    ): array {
        return $this->buildSportPage('softball', $catalog, $clubs, [
            // 'hero' => [
            //     'subtitle' => 'Your softball headline',
            //     'slides' => [
            //         ['image' => 'assets/sports/softball/hero.jpg', 'position' => 'center'],
            //     ],
            // ],
            // 'proof' => [
            //     'quote' => 'A verified customer testimonial.',
            //     'attribution' => 'Customer name / organization',
            // ],
            // 'kits' => [/* Your own slide cards */],
        ]);
    }

    /**
     * Customize swim page content here without editing shared Blade views.
     *
     * Supported overrides: hero, kit_heading, kits, contrast, proof,
     * contact, seo, catalog, clubs, and full_catalog_url.
     * Missing keys inherit config/sport_pages.php and backend services.
     *
     * @return array<string, mixed>
     */
    private function swim(
        EncoreCatalogService $catalog,
        SportClubDirectory $clubs
    ): array {
        return $this->buildSportPage('swim', $catalog, $clubs, [
            // 'hero' => [
            //     'subtitle' => 'Your swim headline',
            //     'slides' => [
            //         ['image' => 'assets/sports/swim/hero.jpg', 'position' => 'center'],
            //     ],
            // ],
            // 'proof' => [
            //     'quote' => 'A verified customer testimonial.',
            //     'attribution' => 'Customer name / organization',
            // ],
            // 'kits' => [/* Your own slide cards */],
        ]);
    }

    /**
     * Customize tennis page content here without editing shared Blade views.
     *
     * Supported overrides: hero, kit_heading, kits, contrast, proof,
     * contact, seo, catalog, clubs, and full_catalog_url.
     * Missing keys inherit config/sport_pages.php and backend services.
     *
     * @return array<string, mixed>
     */
    private function tennis(
        EncoreCatalogService $catalog,
        SportClubDirectory $clubs
    ): array {
        return $this->buildSportPage('tennis', $catalog, $clubs, [
            // 'hero' => [
            //     'subtitle' => 'Your tennis headline',
            //     'slides' => [
            //         ['image' => 'assets/sports/tennis/hero.jpg', 'position' => 'center'],
            //     ],
            // ],
            // 'proof' => [
            //     'quote' => 'A verified customer testimonial.',
            //     'attribution' => 'Customer name / organization',
            // ],
            // 'kits' => [/* Your own slide cards */],
        ]);
    }

    /**
     * Customize track-and-field page content here without editing shared Blade views.
     *
     * Supported overrides: hero, kit_heading, kits, contrast, proof,
     * contact, seo, catalog, clubs, and full_catalog_url.
     * Missing keys inherit config/sport_pages.php and backend services.
     *
     * @return array<string, mixed>
     */
    private function trackAndField(
        EncoreCatalogService $catalog,
        SportClubDirectory $clubs
    ): array {
        return $this->buildSportPage('track-and-field', $catalog, $clubs, [
            // 'hero' => [
            //     'subtitle' => 'Your track-and-field headline',
            //     'slides' => [
            //         ['image' => 'assets/sports/track-and-field/hero.jpg', 'position' => 'center'],
            //     ],
            // ],
            // 'proof' => [
            //     'quote' => 'A verified customer testimonial.',
            //     'attribution' => 'Customer name / organization',
            // ],
            // 'kits' => [/* Your own slide cards */],
        ]);
    }

    /**
     * Customize volleyball page content here without editing shared Blade views.
     *
     * Supported overrides: hero, kit_heading, kits, contrast, proof,
     * contact, seo, catalog, clubs, and full_catalog_url.
     * Missing keys inherit config/sport_pages.php and backend services.
     *
     * @return array<string, mixed>
     */
    private function volleyball(
        EncoreCatalogService $catalog,
        SportClubDirectory $clubs
    ): array {
        return $this->buildSportPage('volleyball', $catalog, $clubs, [
            // 'hero' => [
            //     'subtitle' => 'Your volleyball headline',
            //     'slides' => [
            //         ['image' => 'assets/sports/volleyball/hero.jpg', 'position' => 'center'],
            //     ],
            // ],
            // 'proof' => [
            //     'quote' => 'A verified customer testimonial.',
            //     'attribution' => 'Customer name / organization',
            // ],
            // 'kits' => [/* Your own slide cards */],
        ]);
    }

    /**
     * Customize yoga page content here without editing shared Blade views.
     *
     * Supported overrides: hero, kit_heading, kits, contrast, proof,
     * contact, seo, catalog, clubs, and full_catalog_url.
     * Missing keys inherit config/sport_pages.php and backend services.
     *
     * @return array<string, mixed>
     */
    private function yoga(
        EncoreCatalogService $catalog,
        SportClubDirectory $clubs
    ): array {
        return $this->buildSportPage('yoga', $catalog, $clubs, [
            // 'hero' => [
            //     'subtitle' => 'Your yoga headline',
            //     'slides' => [
            //         ['image' => 'assets/sports/yoga/hero.jpg', 'position' => 'center'],
            //     ],
            // ],
            // 'proof' => [
            //     'quote' => 'A verified customer testimonial.',
            //     'attribution' => 'Customer name / organization',
            // ],
            // 'kits' => [/* Your own slide cards */],
        ]);
    }

    /**
     * Common backend assembly: defaults -> configured sport values ->
     * per-sport controller customization -> live products and club records.
     *
     * Each individual sport method can override any field without affecting
     * the other 20 sports. No edits to the shared view are necessary.
     *
     * @param array<string, mixed> $custom
     * @return array<string, mixed>
     */
    private function buildSportPage(
        string $slug,
        EncoreCatalogService $catalog,
        SportClubDirectory $clubs,
        array $custom = []
    ): array {
        $sports = config('sports', []);
        $info = $sports[$slug];

        $configured = config("sport_pages.overrides.{$slug}", []);
        $content = array_replace_recursive(
            config('sport_pages.defaults', []),
            $configured,
            $custom
        );

        // Do not override a sport's own kit content.
        if (
            $slug !== 'volleyball'
            && !array_key_exists(0, $configured['kits'] ?? [])
            && !array_key_exists(0, $custom['kits'] ?? [])
        ) {
            $content['kits'][0]['title'] = 'Game Jersey';
            $content['kits'][0]['tag'] = 'Home and away options';
            $content['kits'][0]['description'] = 'Made for your team with flexible cuts, durable fabric and coordinated colors.';
        }

        $name = $info['name'];
        $id = (int) $info['id'];

        $page = array_merge($content, [
            'slug' => $slug,
            'name' => $name,
            'id' => $id,
            'sports' => $sports,
            'hero' => array_merge($content['hero'], [
                'accent' => $content['hero']['accent'] ?? strtolower($name).'.',
            ]),
            'seo' => [
                'title' => $slug === 'volleyball'
                    ? config('site.volleyball_title')
                    : "{$name} | Encore Custom",
                'description' => $slug === 'volleyball'
                    ? config('site.volleyball_description')
                    : "Custom {$name} uniforms and teamwear from Encore Custom.",
                'canonical' => route('sports.show', ['sport' => $slug]),
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
            'clubs' => $clubs->forSport($slug),
        ]);

        // Explicit controller overrides for backend-loaded values can also
        // replace the computed catalog, clubs or SEO for one sport only.
        foreach (['seo', 'catalog', 'clubs', 'full_catalog_url'] as $key) {
            if (array_key_exists($key, $custom)) {
                $page[$key] = is_array($custom[$key]) && is_array($page[$key] ?? null)
                    ? array_replace_recursive($page[$key], $custom[$key])
                    : $custom[$key];
            }
        }

        return $page;
    }
}
