<?php

declare(strict_types=1);

namespace Tests\Feature;

use Tests\TestCase;

/**
 * Protect the original site's fonts, styling, images and embedded sport page.
 * This is a source/route regression test, not a screenshot comparison.
 */
final class EncoreWebsiteTest extends TestCase
{
    public function test_main_website_renders_with_original_design_dependencies(): void
    {
        $response = $this->get('/');

        $response->assertOk()
            ->assertSee('Encore Custom, Made to order. Made to win.', false)
            ->assertSee('font-family:"Piedmont"', false)
            ->assertSee('family=Archivo', false)
            ->assertSee('Hanken+Grotesk', false)
            ->assertSee('Space+Mono', false)
            ->assertSee('family=Allura', false)
            ->assertSee('id="vbdoc"', false)
            ->assertSee('id="vbFrame"', false)
            ->assertSee('id="sportsGrid"', false);
    }

    public function test_reference_assets_used_by_both_pages_are_present(): void
    {
        $html = file_get_contents(resource_path('site/encore.html'));

        $this->assertNotFalse($html);
        preg_match_all(
            '~(?<![\\w/-])/assets/reference/([a-z0-9]+\\.(?:png|jpg|jpeg|webp))~i',
            $html,
            $matches
        );

        $assets = array_unique($matches[1]);
        $this->assertCount(28, $assets, 'An imported image reference was removed or added.');

        foreach ($assets as $asset) {
            $this->assertFileExists(public_path('assets/reference/'.$asset));
        }
    }

    public function test_volleyball_page_link_keeps_original_hash_navigation(): void
    {
        $response = $this->get('/volleyball');

        $response->assertRedirect(url('/').'#/volleyball');
    }
}
