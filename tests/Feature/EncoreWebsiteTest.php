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

    public function test_site_cta_links_point_to_configured_external_services(): void
    {
        $this->assertSame('https://dev.encr.co/', config('site.builder_url'));
        $this->assertSame('https://encr.co/customer_catalog', config('site.team_url'));
        $this->assertStringContainsString('selectedCategory=3', config('site.lifestyle_url'));
        $this->assertStringNotContainsString('_token=', config('site.lifestyle_url'));

        $home = $this->get(route('home'))->assertOk();
        $home->assertSee('href="'.config('site.builder_url').'"', false);
        $home->assertSee('href="'.config('site.team_url').'"', false);
        $home->assertSee('href="'.e(config('site.lifestyle_url')).'"', false);

        $this->get(route('sports.show', ['sport' => 'volleyball']))
            ->assertOk()
            ->assertSee('href="'.config('site.builder_url').'"', false)
            ->assertSee('href="'.config('site.team_url').'"', false);
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

    public function test_sport_functions_contain_complete_hardcoded_page_arrays(): void
    {
        $controller = new \ReflectionClass(\App\Http\Controllers\SportController::class);
        $instance = $controller->newInstance();

        $methods = [
            'baseball', 'basketball', 'bmx', 'crossCountry', 'discGolf',
            'fieldHockey', 'flagFootball', 'football', 'golf', 'hockey',
            'lacrosse', 'mma', 'rugby', 'running', 'soccer', 'softball',
            'swim', 'tennis', 'trackAndField', 'volleyball', 'yoga',
        ];

        foreach ($methods as $method) {
            $page = $controller->getMethod($method)->invoke($instance);

            foreach (['slug', 'name', 'id', 'hero', 'kit_heading', 'kits', 'contrast', 'proof', 'clubs', 'catalog', 'contact', 'seo'] as $key) {
                $this->assertArrayHasKey($key, $page, "{$method} missing {$key}");
            }

            $this->assertNotEmpty($page['hero']['slides']);
            $this->assertNotEmpty($page['kits']);
            $this->assertNotEmpty($page['contrast']['team_image']);
            $this->assertArrayHasKey('quote', $page['proof']);
            $this->assertArrayHasKey('title', $page['seo']);
            $this->assertArrayHasKey('description', $page['seo']);
        }

        $this->assertFalse($controller->hasMethod('volleyballSlides'));
        $this->assertFalse($controller->hasMethod('volleyballKits'));
        $this->assertFalse($controller->hasMethod('heroFacts'));
        $this->assertFalse($controller->hasMethod('contrast'));
        $this->assertFalse($controller->hasMethod('proof'));
        $this->assertFalse($controller->hasMethod('contact'));
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

        config()->set('services.encore.api_key', 'test-api-key');
        config()->set('services.encore.api_token', 'test-api-token');
        config()->set('services.encore.base_url', 'https://example.invalid/api');
        config()->set('services.encore.asset_url', 'https://encr.co/assets');
        config()->set('services.encore.product_detail_url', 'https://encr.co/productDetails');

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

    public function test_api_falls_back_to_v1_products_and_uses_inventory_display_fields(): void
    {
        \Illuminate\Support\Facades\Cache::flush();

        config()->set('services.encore.api_key', 'test-api-key');
        config()->set('services.encore.api_token', 'test-api-token');
        config()->set('services.encore.base_url', 'https://example.invalid/api');
        config()->set('services.encore.asset_url', 'https://encr.co/assets');

        \Illuminate\Support\Facades\Http::fake([
            'example.invalid/api/v1/get_products*' => \Illuminate\Support\Facades\Http::response([
                'success' => false,
            ], 500),
            'example.invalid/api/v1/products*' => \Illuminate\Support\Facades\Http::response([
                'success' => true,
                'data' => [
                    'data' => [
                        [
                            'id' => 987,
                            'display_product_name' => 'Custom Lacrosse Uniform',
                            'display_product_price' => 69.5,
                            'display_main_image' => 'assets/products/lacrosse-uniform.jpg',
                            'product_details' => [
                                'product_sport' => [['sport_id' => 1]],
                                'product_categories' => [
                                    ['product_category_id' => 20, 'category' => ['name' => 'Game Uniforms']],
                                ],
                            ],
                        ],
                        [
                            'id' => 988,
                            'display_product_name' => 'Other Sport Product',
                            'product_details' => [
                                'product_sport' => [['sport_id' => 14]],
                            ],
                        ],
                    ],
                ],
            ], 200),
        ]);

        $groups = app(\App\Services\EncoreCatalogService::class)->groups(1);

        $this->assertCount(1, $groups);
        $this->assertSame('Game Uniforms', $groups[0]['cat']);
        $this->assertCount(1, $groups[0]['items']);
        $this->assertSame('Custom Lacrosse Uniform', $groups[0]['items'][0]['n']);
        $this->assertSame('$69.50', $groups[0]['items'][0]['p']);
        $this->assertSame('https://encr.co/assets/products/lacrosse-uniform.jpg', $groups[0]['items'][0]['img']);
        $this->assertStringContainsString('/productDetails/987?', $groups[0]['items'][0]['u']);

        \Illuminate\Support\Facades\Http::assertSent(fn ($request) =>
            str_contains($request->url(), '/api/v1/get_products')
            && (int) $request['selectedSport'] === 1
            && $request->hasHeader('API-Key', 'test-api-key')
            && $request->hasHeader('API-Token', 'test-api-token')
        );

        \Illuminate\Support\Facades\Http::assertSent(fn ($request) =>
            str_contains($request->url(), '/api/v1/products')
        );
    }

    public function test_catalog_subproducts_open_the_correct_external_product_detail_page(): void
    {
        $service = app(\App\Services\EncoreProductService::class);

        $subProduct = $service->card([
            'id' => 2,
            'parent_product_id' => 2,
            'sub_product_no' => 'PRO-2.1',
            'product_name' => 'Original Product Name',
            'display_product_name' => "Men's DezTek Lite Collegiate Performance Tee",
            'display_product_price' => 30,
            'display_main_image' => 'https://inventory.encr.co/public/storage/product_display_settings/example.jpg',
            '_sport_id' => 1,
        ]);

        $this->assertSame("Men's DezTek Lite Collegiate Performance Tee", $subProduct['name']);
        $this->assertSame('30.00', $subProduct['price']);
        $this->assertSame(
            'https://inventory.encr.co/public/storage/product_display_settings/example.jpg',
            $subProduct['image']
        );

        $this->assertSame(
            'https://encr.co/productDetails/2?type=sub_product&selectedGender=All&selectedCategory=5&selectedSport=1&selectedStyle=0',
            $subProduct['url']
        );

        $parent = $service->card([
            'id' => 13,
            'product_name' => 'Parent Product',
            '_sport_id' => 1,
        ]);
        $this->assertStringContainsString('/productDetails/13?type=product&', $parent['url']);

        $explicit = $service->card([
            'id' => 22,
            'type' => 'product',
            'sub_product_no' => 'PRO-22',
            '_sport_id' => 3,
        ]);
        $this->assertStringContainsString('/productDetails/22?type=product&', $explicit['url']);
    }

    public function test_inventory_nested_category_label_is_read_correctly(): void
    {
        \Illuminate\Support\Facades\Cache::flush();

        config()->set('services.encore.api_key', 'test-api-key');
        config()->set('services.encore.api_token', 'test-api-token');
        config()->set('services.encore.base_url', 'https://example.invalid/api');

        \Illuminate\Support\Facades\Http::fake([
            'example.invalid/*' => \Illuminate\Support\Facades\Http::response([
                'success' => true,
                'data' => [
                    [
                        'id' => 2,
                        'sub_product_no' => 'PRO-2.1',
                        'display_product_name' => 'Demo Lacrosse Product',
                        'display_product_price' => 30,
                        'product_details' => [
                            'product_categories' => [[
                                'product_category_id' => 11,
                                'categories' => [
                                    'id' => 11,
                                    'product_category_name' => 'Tops',
                                ],
                            ]],
                        ],
                    ],
                ],
            ], 200),
        ]);

        $groups = app(\App\Services\EncoreCatalogService::class)->groups(1);
        $this->assertCount(1, $groups);
        $this->assertSame('Tops', $groups[0]['cat']);
        $this->assertStringContainsString(
            '/productDetails/2?type=sub_product&',
            $groups[0]['items'][0]['u']
        );
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
