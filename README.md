# Encore Custom Laravel

Faithful Laravel conversion of [the original Encore Custom site](https://ec-web-final.netlify.app/), including its embedded volleyball showcase, all original visual styles and animations. Images have been extracted into `public/assets/reference` for caching; the original HTML/CSS/JavaScript and inline custom typography remain in `resources/site/encore.html`.

## Local

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan serve
```

## cPanel production

Install PHP 8.2+, run `composer install --no-dev --optimize-autoloader`, configure `.env` for production and run `php artisan optimize`. Set the domain document root to the Laravel `public/` directory. The reference includes a few original placeholder links that are intentionally unchanged.
