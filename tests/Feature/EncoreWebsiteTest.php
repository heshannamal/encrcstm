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

    public function test_both_pages_reference_existing_assets(): void
    {
        $source = file_get_contents(resource_path('site/encore.html'));

        $this->assertNotFalse($source);

        preg_match_all(
            '~(?<![\\w/-])/assets/reference/([a-z0-9]+\\.(?:png|jpg|jpeg|webp))~i',
            $source,
            $matches
        );

        $assets = array_unique($matches[1]);
        $this->assertCount(28, $assets);

        foreach ($assets as $asset) {
            $this->assertFileExists(public_path('assets/reference/'.$asset));
        }

        foreach ([route('home'), route('sports.volleyball')] as $url) {
            $html = $this->get($url)->assertOk()->getContent();

            $this->assertStringNotContainsString('src="/assets/reference/', $html);
            $this->assertStringNotContainsString('url(/assets/reference/', $html);
        }
    }

    public function test_legacy_volleyball_url_redirects_to_named_sport_route(): void
    {
        $this->get('/volleyball')
            ->assertRedirect(route('sports.volleyball'));
    }
}
