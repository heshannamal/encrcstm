<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

/**
 * Deliver original reference DOM, CSS, fonts and scripts unmodified.
 */
final class WebsiteController
{
    public function index(): Response
    {
        $html = file_get_contents(resource_path('site/encore.html'));
        abort_if($html === false, 500, 'Website template missing.');

        return response($html)->header('Content-Type', 'text/html; charset=UTF-8');
    }

    public function volleyball(): RedirectResponse
    {
        return redirect('/#/volleyball');
    }
}
