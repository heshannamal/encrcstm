<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * Serve the untouched original reference design.
 *
 * Adapt only local asset URLs for either root-domain hosting or
 * an Apache/WAMP subdirectory such as /encrcstm/public/.
 */
final class WebsiteController
{
    public function index(Request $request): Response
    {
        $html = file_get_contents(resource_path('site/encore.html'));
        abort_if($html === false, 500, 'Website template missing.');

        // The imported reference used root-absolute image URLs. Those URLs
        // resolve outside this app when running under a WAMP subdirectory.
        $basePath = rtrim($request->getBaseUrl(), '/');
        $html = str_replace(
            '/assets/reference/',
            $basePath.'/assets/reference/',
            $html
        );

        return response($html)
            ->header('Content-Type', 'text/html; charset=UTF-8');
    }

    public function volleyball(): RedirectResponse
    {
        return redirect()->to(url('/').'#/volleyball');
    }
}
