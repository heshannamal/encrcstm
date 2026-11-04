# Encore Custom — Laravel website

Laravel implementation of the original Encore Custom design with a single shared sport page for all 21 sports.

## Local setup

```powershell
git pull origin main
composer install
php artisan optimize:clear
php artisan test --filter=EncoreWebsiteTest
php artisan serve
```

Set up the application's `.env` and `APP_KEY` on first installation. Keep your authorized inventory API credentials in `.env`; use `.env.encore.example` for the available key names. The public sport pages do not require club database migrations.

## Sport page editing

All sport-specific content now lives in `app/Http/Controllers/SportController.php`. Each sport has its own private array-producing method: `baseball()`, `basketball()`, `bmx()`, `crossCountry()`, `discGolf()`, `fieldHockey()`, `flagFootball()`, `football()`, `golf()`, `hockey()`, `lacrosse()`, `mma()`, `rugby()`, `running()`, `soccer()`, `softball()`, `swim()`, `tennis()`, `trackAndField()`, `volleyball()`, and `yoga()`.

Each method returns editable arrays for `hero` (lead, accent, subtitle, slide images and positions, facts), `kit_heading`, `kits` (cards, descriptions, slides), `contrast` (text, images), `proof`, `clubs` (name and optional logo), `contact`, `seo` and optional `catalog`.

The controller creates the rest of the page data: sport name/ID, all sport links, canonical URL, Encore catalog API products grouped by style, and the external full-catalog URL. To customize a particular sport's products/categories without calling the API, set `'catalog' => ['groups' => [...]]` inside that sport function. Otherwise leave `'catalog' => []` to fetch products through the API. You may also specify `'full_catalog_url' => 'https://...'` in a sport's returned array.

The temporary club list is now a plain `'clubs' => [...]` array inside each sport's function. Non-volleyball lists are empty by default and their original scrolling marquee is automatically hidden until you add entries. Volleyball's existing club names are included as temporary arrays. There is no club model, migration, service, or club-specific database requirement.

The original volleyball slides and kit images are shared as placeholders by `volleyballSlides()` and `volleyballKits()`. For unique imagery, replace a sport's `'slides' => $this->volleyballSlides()` or `'kits' => $this->volleyballKits(false)` with your own image arrays using paths relative to `public/`, such as `assets/sports/baseball/hero.jpg`. Do not use `asset()` inside the controller: shared Blade views resolve local asset paths using Laravel's `asset()` helper.

Example:

```php
'hero' => [
    'lead' => 'Own the',
    'accent' => 'field.',
    'subtitle' => 'Custom lacrosse uniforms and teamwear.',
    'slides' => [
        ['image' => 'assets/sports/lacrosse/hero.jpg', 'position' => 'center'],
    ],
    'facts' => $this->heroFacts(),
],
'clubs' => [
    ['name' => 'Your club name', 'logo' => null],
],
```

All sports render `resources/views/website/sports/show.blade.php` and the original reusable section partials in `resources/views/website/sports/sections/`. The original fonts, animations and category carousels are preserved in `resources/views/website/styles/sport.blade.php` and `resources/views/website/scripts/sport.blade.php`. The product catalog shows `No matching products available.` when there are no API results.

## Routes and deployment

`route('home')` renders the homepage and `route('sports.show', ['sport' => 'volleyball'])` renders any sport through the single dynamic route. For cPanel, use a PHP version compatible with your `composer.lock`, install dependencies, configure `.env`, and point your site's document root to Laravel's `public/` directory.
