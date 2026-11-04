# Encore Custom — Laravel website

Production-oriented Blade implementation of the [Encore Custom reference](https://ec-web-final.netlify.app/). The original site CSS, custom typography, responsive breakpoints, images and animations are preserved, while navigation, metadata, controllers and templates use Laravel conventions.

## Requirements

- PHP 8.4.1+ for the committed Composer lockfile (or re-resolve dependencies locally for PHP 8.3 using a compatible Laravel 12 release)
- Composer 2
- No database connection is required to display the public site

## Setup

```powershell
git clone https://github.com/heshannamal/encrcstm.git
cd encrcstm
composer install
Copy-Item .env.example .env
php artisan key:generate
php artisan serve
```

Visit `http://127.0.0.1:8000`. For WAMP, serving from `http://localhost/encrcstm/public/` also works because URLs are generated with Laravel's `route()` and `asset()` helpers.

## Source structure

| Path | Purpose |
| --- | --- |
| `routes/web.php` | Named homepage and volleyball routes |
| `app/Http/Controllers/WebsiteController.php` | Thin controller returning Blade views |
| `resources/views/website/layouts/app.blade.php` | Shared HTML, font imports, scripts and content slots |
| `resources/views/website/partials/meta.blade.php` | Title, description, canonical, Open Graph, Twitter and structured data |
| `resources/views/website/home/sections/` | Homepage content by section |
| `resources/views/website/volleyball/sections/` | Volleyball content by section |
| `resources/views/website/styles/` | Original page-specific CSS and font declarations |
| `resources/views/website/scripts/` | Original animations and event logic |
| `config/site.php` | Centralized brand, SEO and image configuration |
| `public/assets/reference/` | Exact original extracted local assets |
| `resources/site/encore.html` | Unmodified design reference retained for parity audits |

### URL conventions

- Homepage: `route('home')`
- Volleyball page: `route('sports.show', ['sport' => 'volleyball'])`
- No separate volleyball route is registered; `/sports/volleyball` is handled by the shared sport route.
- Same-page navigation uses route URLs plus fragment identifiers.
- Local images use `asset('assets/reference/...')`.
- Placeholder catalog/shop links are retained from the original prototype until destination routes are provided.

### Volleyball overlay

The homepage opens the volleyball route inside the existing full-screen iframe overlay and keeps the `#/volleyball` hash navigation intact. The sport also has a first-class standalone URL for direct navigation, metadata, and sharing.

## Tests

```powershell
php artisan optimize:clear
php artisan test --filter=EncoreWebsiteTest
```

GitHub Actions runs these checks for page templates, controllers, routes, metadata, and public assets. They verify rendering and structure; pixel-level screenshot review is still recommended before production deployment.

## Metadata

Adjust descriptions, social image, logo, favicon, and theme color in `config/site.php`. Page-specific titles, descriptions, and canonical URLs are defined in their Blade page files. Set `APP_URL` to your public HTTPS domain in production.

## cPanel deployment

1. Use a PHP version compatible with the project's lockfile.
2. Set the domain document root to this Laravel application's `public/` directory.
3. Run `composer install --no-dev --optimize-autoloader`.
4. Set production `.env` values including `APP_ENV=production`, `APP_DEBUG=false`, and `APP_URL=https://your-domain`.
5. Run `php artisan key:generate` on initial setup, then `php artisan optimize`.
6. Serve the website over HTTPS and confirm image responses and animation behavior.

Avoid running `migrate:fresh` on production databases. Public pages do not require database migrations unless you enable the optional database-managed club directory.

## Sport pages and inventory API

All 21 sports use the **original volleyball page structure and styling**, including the same hero slider, kit rail, catalog category rows with horizontal carousel arrows, testimonials, animated club marquee, and footer. No second catalog/filter section is injected. The other sport pages are rendered from `resources/views/website/volleyball/index.blade.php` and its existing section partials; only sport-specific text, catalog data and clubs change.

Sport IDs are defined in `config/sports.php`; the API service is `app/Services/EncoreProductService.php`; grouped category products are prepared in `app/Services/EncoreCatalogService.php`. Product links follow Encore's actual `/productDetails/{id}?type=product|sub_product&selectedSport=...` URL pattern shown in the supplied reference. When the API yields no matching products, the existing catalog area says **No matching products available.**

API credentials must be stored **only in .env**. Copy keys from `.env.encore.example`, provide authorized `ENCORE_API_KEY` and `ENCORE_API_TOKEN`, and run:

```powershell
git pull origin main
php artisan optimize:clear
php artisan cache:clear
php artisan route:list --path=sports
php artisan test --filter=EncoreWebsiteTest
```

The API response examples do not document every production field; verify live product images, style mappings and detail links with your configured credentials before deployment. The existing volleyball imagery remains a visual placeholder on other sports until approved sport-specific images are supplied.

## Sliding club logos

Club names and optional logos come from the Laravel backend, while the original infinite marquee animation remains unchanged. By default edit `config/clubs.php` (use `name` and an optional `logo` URL). To manage club records in MySQL, run `php artisan migrate`, set `ENCORE_CLUBS_SOURCE=database`, and maintain rows in the `sport_clubs` table (`sport_slug`, `name`, optional `logo_url`, `is_active`, `sort_order`). The database mode falls back to configured defaults when it contains no matching active entries. Clear cache after edits with `php artisan cache:clear`. This adds backend data support without any new frontend section.

The original volleyball catalog layout, category carousel arrows, and expansion interaction are unchanged. Its data now comes from `EncoreCatalogService` and the configured product API. Ensure `ENCORE_API_TOKEN` is set only in your local environment.
