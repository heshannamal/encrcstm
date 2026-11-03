@php
    $pageTitle = trim($__env->yieldContent('title', config('site.title')));
    $pageDescription = trim($__env->yieldContent('description', config('site.description')));
    $canonical = trim($__env->yieldContent('canonical', url()->current()));
    $socialImage = asset(config('site.social_image'));
@endphp
<title>{{ $pageTitle }}</title>
<meta name="description" content="{{ $pageDescription }}">
<meta name="robots" content="index, follow, max-image-preview:large">
<meta name="theme-color" content="{{ config('site.theme_color') }}">
<link rel="canonical" href="{{ $canonical }}">
<link rel="icon" type="image/png" href="{{ asset(config('site.favicon')) }}">
<meta property="og:type" content="website">
<meta property="og:site_name" content="{{ config('site.name') }}">
<meta property="og:title" content="{{ $pageTitle }}">
<meta property="og:description" content="{{ $pageDescription }}">
<meta property="og:url" content="{{ $canonical }}">
<meta property="og:image" content="{{ $socialImage }}">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $pageTitle }}">
<meta name="twitter:description" content="{{ $pageDescription }}">
<meta name="twitter:image" content="{{ $socialImage }}">
<script type="application/ld+json">{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'Organization',
    'name' => config('site.name'),
    'url' => route('home'),
    'logo' => asset(config('site.logo')),
    'email' => config('site.email'),
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) !!}</script>
