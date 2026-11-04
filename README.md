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
- Volleyball page: `route('sports.volleyball')`
- Legacy `/volleyball` is redirected permanently to `/sports/volleyball`.
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

Avoid running `migrate:fresh` on production databases. The public pages do not require database migrations.

## Sports pages and Encore Inventory API

The homepage links to all 21 sports configured in `config/sports.php`. Each sport uses its original Encore inventory filter ID and a named route such as `route('sports.show', ['sport' => 'baseball'])`. Volleyball keeps the original custom design at `route('sports.volleyball')` and shares the new API product catalog component.

Reusable sport-page Blade components:

- `resources/views/website/sports/components/navigation.blade.php`
- `resources/views/website/sports/components/slides.blade.php`
- `resources/views/website/sports/components/kit.blade.php`
- `resources/views/website/sports/components/catalog.blade.php`
- `resources/views/website/sports/components/product-card.blade.php`
- `resources/views/website/sports/components/footer.blade.php`

Product requests are handled only on the server by `app/Services/EncoreProductService.php`, with response caching and safe empty states. **Never embed Encore's API token in Blade, client-side JavaScript or Git.**

Copy the configuration keys from `.env.encore.example` into your existing local `.env`, and set `ENCORE_API_KEY` and `ENCORE_API_TOKEN` to your authorized credentials. Then run:

```powershell
php artisan config:clear
php artisan cache:clear
php artisan route:list --path=sports
php artisan test --filter=EncoreWebsiteTest
```

The sample data describes `get_products` filtering, but does not specify the live `productDetails` URL query parameter or every product-response field. `ENCORE_PRODUCT_DETAIL_PARAMETER` defaults to `id`; confirm this matches your actual `encr.co` product-details controller and adjust as needed. `ENCORE_PRODUCT_DETAIL_URL` is also configurable.

For a complete rollout, replace generic sport photography with approved sport-specific hero and kit imagery. The volleyball page retains its original visuals and animations.
