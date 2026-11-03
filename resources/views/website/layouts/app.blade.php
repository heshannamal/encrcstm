<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('website.partials.meta')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@400;500;600;700;800;900&family=Hanken+Grotesk:wght@400;500;600;700&family=Space+Mono:wght@400;700&family=Allura&display=swap" rel="stylesheet">
    <style>
    @yield('page-styles')
    </style>
</head>
<body>
    @yield('content')
    @stack('scripts')
</body>
</html>
