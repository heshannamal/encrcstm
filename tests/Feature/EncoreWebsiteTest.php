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

    public function test_volleyball_uses_shared_sport_route_and_original_style(): void
    {
        $this->get(route('sports.show', ['sport' => 'volleyball']))
            ->assertOk()
            ->assertSee('Volleyball, Encore Custom', false)
            ->assertSee('font-family:"Piedmont"', false)
            ->assertSee('id="kitRail"', false)
            ->assertSee('id="heroSlides"', false)
            ->assertSee('property="og:description"', false);
    }

    public function test_sport_content_is_provided_by_individual_controller_arrays(): void
    {
        $controller = new \ReflectionClass(\App\Http\Controllers\SportController::class);

        foreach ([
            'baseball' => 'diamond.',
            'basketball' => 'court.',
            'lacrosse' => 'field.',
            'volleyball' => 'net.',
        ] as $methodName => $accent) {
            $method = $controller->getMethod($methodName);
            $data = $method->invoke($controller->newInstance());

            $this->assertSame($accent, $data['hero']['accent']);
            $this->assertNotEmpty($data['hero']['slides']);
            $this->assertNotEmpty($data['kits']);
            $this->assertArrayHasKey('contrast', $data);
            $this->assertArrayHasKey('proof', $data);
            $this->assertArrayHasKey('clubs', $data);
            $this->assertArrayHasKey('contact', $data);
            $this->assertArrayHasKey('seo', $data);
        }

        $this->assertSame([], $controller->getMethod('baseball')->invoke($controller->newInstance())['clubs']);

        $this->get(route('sports.show', ['sport' => 'baseball']))
            ->assertOk()
            ->assertSee('diamond.', false)
            ->assertSee('Custom baseball uniforms and teamwear designed for your program.', false)
            ->assertSee('id="kitRail"', false)
            ->assertSee('id="catCats"', false);
    }

    public function test_every_sport_has_a_dedicated_controller_data_function(): void
    {
        $controller = new \ReflectionClass(\App\Http\Controllers\SportController::class);
        $methodNames = [
            'baseball', 'basketball', 'bmx', 'crossCountry', 'discGolf',
            'fieldHockey', 'flagFootball', 'football', 'golf', 'hockey',
            'lacrosse', 'mma', 'rugby', 'running', 'soccer',
            'softball', 'swim', 'tennis', 'trackAndField', 'volleyball', 'yoga',
        ];

        $this->assertCount(count(config('sports')), $methodNames);

        foreach ($methodNames as $method) {
            $this->assertTrue($controller->hasMethod($method), "Missing sport method: {$method}");
            $this->assertTrue($controller->getMethod($method)->isPrivate());
        }
    }

    public function test_all_sports_have_valid_routes_and_metadata(): void
    {
        foreach (config('sports') as $slug => $sport) {
            $route = route('sports.show', ['sport' => $slug]);

            $this->get($route)
                ->assertOk()
                ->assertSee($sport['name'], false)
                ->assertSee('property="og:title"', false);
        }

        $this->get('/sports/not-a-real-sport')->assertNotFound();
        $this->assertFileDoesNotExist(resource_path('views/website/volleyball/index.blade.php'));
        $this->assertFileExists(resource_path('views/website/sports/show.blade.php'));
        $this->assertFalse(\Illuminate\Support\Facades\Route::has('sports.volleyball'));
        $this->assertFalse(\Illuminate\Support\Facades\Route::has('volleyball.legacy'));
        $this->get('/volleyball')->assertNotFound();
    }

    public function test_all_reference_assets_exist_and_rendered_pages_have_usable_urls(): void
    {
        $paths = [
            resource_path('views/website/styles/home.blade.php'),
            resource_path('views/website/styles/sport.blade.php'),
            resource_path('views/website/sports/sections/hero.blade.php'),
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

        foreach ([route('home'), route('sports.show', ['sport' => 'volleyball']), route('sports.show', ['sport' => 'baseball'])] as $url) {
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

        \Illuminate\Support\Facades\Http::fake([
            'example.invalid/*' => \Illuminate\Support\Facades\Http::response([
                'data' => ['data' => [
                    ['id' => 123, 'name' => 'Demo Baseball Jersey', 'image' => 'jerseys/demo.jpg', 'price' => 45, 'style_id' => 20],
                    ['id' => 124, 'name' => 'Demo Training Tee', 'image' => 'tees/demo.jpg', 'price' => 25, 'style_id' => 11],
                ]],
            ], 200),
        ]);

        $this->get(route('sports.show', ['sport' => 'baseball']))
            ->assertOk()
            ->assertSee('Demo Baseball Jersey', false)
            ->assertSee('id="catCats"', false)
            ->assertDontSee('class="sport-filters"', false);

        $groups = app(\App\Services\EncoreCatalogService::class)->groups(2);
        $this->assertSame('Game Uniforms', $groups[0]['cat']);
        $this->assertSame('Tops', $groups[1]['cat']);
        $this->assertSame('Demo Baseball Jersey', $groups[0]['items'][0]['n']);
        $this->assertSame('https://encr.co/assets/jerseys/demo.jpg', $groups[0]['items'][0]['img']);
        $this->assertStringContainsString(
            '/productDetails/123?type=product',
            $groups[0]['items'][0]['u']
        );

        \Illuminate\Support\Facades\Http::assertSent(function ($request) {
            return (int) $request['selectedSport'] === 2
                && $request->hasHeader('API-Key', 'test-api-key')
                && $request->hasHeader('API-Token', 'test-api-token');
        });
    }

    public function test_clubs_are_temporary_arrays_in_each_sport_method(): void
    {
        $controller = new \ReflectionClass(\App\Http\Controllers\SportController::class);
        $instance = $controller->newInstance();
        $clubs = $controller->getMethod('volleyball')->invoke($instance)['clubs'];

        $this->assertNotEmpty($clubs);
        $this->assertSame('Marin Volleyball', $clubs[0]['name']);

        $this->get(route('sports.show', ['sport' => 'volleyball']))
            ->assertOk()
            ->assertSee('Marin Volleyball', false)
            ->assertSee('id="logoTrack"', false)
            ->assertSee('id="catCats"', false)
            ->assertDontSee('class="sport-filters"', false);

        $this->get(route('sports.show', ['sport' => 'baseball']))
            ->assertOk()
            ->assertSee('var clubs=[]', false);
    }

}
