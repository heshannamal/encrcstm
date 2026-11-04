<?php

declare(strict_types=1);

namespace Tests\Feature;

use Tests\TestCase;

final class EncoreWebsiteTest extends TestCase
{
    public function test_homepage_renders_original_visual_system_and_seo(): void
    {
        $response = $this->get(route('home'));

        $response->assertOk()
            ->assertSee('Encore Custom, Made to order. Made to win.', false)
            ->assertSee('font-family:"Piedmont"', false)
            ->assertSee('family=Archivo', false)
            ->assertSee('Hanken+Grotesk', false)
            ->assertSee('Space+Mono', false)
            ->assertSee('family=Allura', false)
            ->assertSee('id="sportsGrid"', false)
            ->assertSee('id="vbFrame"', false)
            ->assertSee('property="og:title"', false)
            ->assertSee('name="twitter:card"', false)
            ->assertSee('application/ld+json', false)
            ->assertDontSee('id="vbdoc"', false);
    }

    public function test_volleyball_has_own_page_with_original_style_and_metadata(): void
    {
        $this->get(route('sports.volleyball'))
            ->assertOk()
            ->assertSee('Volleyball, Encore Custom', false)
            ->assertSee('font-family:"Piedmont"', false)
            ->assertSee('id="kitRail"', false)
            ->assertSee('id="heroSlides"', false)
            ->assertSee('property="og:description"', false);
    }

    public function test_all_sports_have_valid_routes_and_metadata(): void
    {
        foreach (config('sports') as $slug => $sport) {
            $route = $slug === 'volleyball'
                ? route('sports.volleyball')
                : route('sports.show', ['sport' => $slug]);

            $this->get($route)
                ->assertOk()
                ->assertSee($sport['name'], false)
                ->assertSee('property="og:title"', false);
        }

        $this->get('/sports/not-a-real-sport')->assertNotFound();
    }

    public function test_all_reference_assets_exist_and_rendered_pages_have_usable_urls(): void
    {
        $paths = [
            resource_path('views/website/styles/home.blade.php'),
            resource_path('views/website/styles/volleyball.blade.php'),
            resource_path('views/website/volleyball/sections/hero.blade.php'),
            resource_path('views/website/home/sections/hero.blade.php'),
        ];

        $count = 0;

        foreach ($paths as $path) {
            $this->assertFileExists($path);
            $html = file_get_contents($path);

            preg_match_all('~assets/reference/([a-z0-9]+\\.(?:png|jpg|jpeg|webp))~i', $html, $matches);

            foreach (array_unique($matches[1]) as $asset) {
                $this->assertFileExists(public_path('assets/reference/'.$asset));
                $count++;
            }
        }

        $this->assertGreaterThan(0, $count);

        foreach ([route('home'), route('sports.volleyball'), route('sports.show', ['sport' => 'baseball'])] as $url) {
            $html = $this->get($url)->assertOk()->getContent();
            $this->assertStringNotContainsString('src="/assets/reference/', $html);
            $this->assertStringNotContainsString('url(/assets/reference/', $html);
        }
    }

    public function test_inventory_response_builds_product_cards_and_detail_links(): void
    {
        \Illuminate\Support\Facades\Cache::flush();

        config()->set('encore.api_key', 'test-api-key');
        config()->set('encore.api_token', 'test-api-token');
        config()->set('encore.base_url', 'https://example.invalid/api');
        config()->set('encore.asset_url', 'https://encr.co/assets');
        config()->set('encore.product_detail_url', 'https://encr.co/productDetails');
        config()->set('encore.product_detail_parameter', 'id');

        \Illuminate\Support\Facades\Http::fake([
            'example.invalid/*' => \Illuminate\Support\Facades\Http::response([
                'data' => ['data' => [
                    ['id' => 123, 'name' => 'Demo Baseball Jersey', 'image' => 'jerseys/demo.jpg', 'price' => 45],
                ]],
            ], 200),
        ]);

        $this->get(route('sports.show', ['sport' => 'baseball']))
            ->assertOk()
            ->assertSee('Demo Baseball Jersey', false)
            ->assertSee('https://encr.co/assets/jerseys/demo.jpg', false)
            ->assertSee('https://encr.co/productDetails?id=123', false);

        \Illuminate\Support\Facades\Http::assertSent(function ($request) {
            return (int) $request['selectedSport'] === 2
                && $request->hasHeader('API-Key', 'test-api-key')
                && $request->hasHeader('API-Token', 'test-api-token');
        });
    }

    public function test_legacy_volleyball_url_redirects_to_named_sport_route(): void
    {
        $this->get('/volleyball')
            ->assertRedirect(route('sports.volleyball'));
    }
}
