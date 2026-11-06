# Encore Custom — Laravel website

Laravel implementation of the original Encore Custom design with a single shared sport page for all 21 sports.

## Local setup

```powershell
git pull origin main
composer install
php artisan optimize:clear
php artisan serve
```

Set up the application's `.env` and `APP_KEY` on first installation. Keep your authorized inventory API credentials in `.env`; use `.env.encore.example` for the available key names. The public sport pages do not require club database migrations.

## Sport page editing

The controller `app/Http/Controllers/SportController.php` has 21 dedicated sport methods. **Every sport method contains its complete hard-coded data array**; no shared data helpers or sport-specific configuration files are required. Edit only the method for the sport you want to change.

The editable keys are `slug`, `name`, `id`, `hero` (heading, slides and facts), `kit_heading`, `kits` (all kit cards, image paths, descriptions), `contrast` (text and images), `proof` (quote and attribution), `clubs` (temporary name/logo list), `catalog`, `contact` and `seo`.

The original volleyball images are included directly in each sport's array as temporary placeholders. Replace asset paths individually with a path relative to Laravel's `public/` folder, for example `assets/sports/baseball/hero-1.jpg`. The shared Blade view uses `asset()` to generate the URL.

Clubs are temporary hard-coded arrays inside each sport function. No club model, service or migration is needed. An empty club array hides the marquee.

For `'catalog' => []` or `'catalog' => ['groups' => null]`, product groups load automatically from the Encore inventory API for that sport ID. To supply your own catalog, set `'catalog' => ['groups' => [...]]` using the existing carousel format. The same shared Blade design is used for all sports.

The controller's `show()` method only dispatches to the sport function, supplies the sports navigation list, canonical URL, API product groups when necessary, and the full catalog URL. Sport-specific presentation content resides entirely inside each sport function.

## Routes and deployment

`route('home')` renders the homepage and `route('sports.show', ['sport' => 'volleyball'])` renders any sport through the single dynamic route. For cPanel, use a PHP version compatible with your `composer.lock`, install dependencies, configure `.env`, and point your site's document root to Laravel's `public/` directory.

## Inventory API settings

Encore API configuration is in `config/services.php`, under the `encore` key. Supply credentials via `.env` using `ENCORE_API_KEY` and `ENCORE_API_TOKEN`; never commit credentials. The inventory services read configuration through `config('services.encore.api_key')` and related keys. After updating the environment run `php artisan optimize:clear`.

## Shopping and ordering module

All new shop pages are separate from the original approved homepage and 21 sport designs. Their routes are:

- `/catalog`: API-driven products, categories, sports, search and sort
- `/catalog/products/{id}`: product gallery, size/color variants, stock, add to cart
- `/cart`: view, update quantities, remove items and continue to checkout
- `/login`, `/register`, `/profile`: Encore customer account
- `/my-orders` and `/my-orders/{id}`: order history and detail
- `/checkout`: billing and shipping address collection
- `/checkout/payment`: API-calculated totals and card form
- `/checkout/success`: only accessible after the order API confirms success

The Catalog navigation and Shop Lifestyle hero/footer links point to local `/catalog`, with lifestyle filters selected by default on the latter. Product cards within sport catalog carousels also open the local product view.

The module uses Encore's existing `v1/get_products`, `v1/products`, `v1/get_product_options`, cart, login, profile, billing, and `v1/orders/store` APIs. Customer bearer tokens are stored in the Laravel server-side session, not in browser JavaScript. Cart quantities are checked against the real size/color stock combinations. Checkout totals are sourced from the payment API, never trusted from browser input.

**Before accepting real payments:** The reference ordering API requires raw card details. This integration passes card fields only to that API during the HTTPS request and does not intentionally store the fields in the Laravel session or database. It is **not a PCI DSS certification**, nor a substitute for a hosted/tokenized payment gateway. Configure and assess card-data handling, application logs, HTTPS, web server access logs, gateway status handling, payment idempotency, webhook verification (if available), and legal/compliance requirements before enabling production payments. Verify a complete test transaction against the configured payment backend. No charge has been attempted while authoring these files.

For a local Apache install under `/encrcstm/public`, use `http://localhost/encrcstm/public/catalog`. For `php artisan serve`, use `http://127.0.0.1:8000/catalog`. Ensure `APP_URL`, `SESSION_DRIVER`, `ENCORE_API_URL`, `ENCORE_ASSET_URL`, `ENCORE_API_KEY`, and `ENCORE_API_TOKEN` are set correctly, then run `php artisan optimize:clear`.

The separate `heshannamal/encorecustom` repository was accessible when this feature was built but its `main` tree contained only `.editorconfig`. Working API patterns were therefore taken from the user's accessible `heshannamal/alcatrazoutlaws` project and catalog/product layout from the provided screenshots.
