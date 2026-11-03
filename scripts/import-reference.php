<?php

declare(strict_types=1);

/**
 * One-time reference importer.
 *
 * Usage: php scripts/import-reference.php
 * Downloads the exact published HTML (including all original CSS, animation JS,
 * nested volleyball page and embedded typeface), extracts image payloads into
 * versionable public files, and removes only the Netlify editor overlay.
 */
$url = $argv[1] ?? 'https://ec-web-final.netlify.app/';
$context = stream_context_create([
    'http' => [
        'timeout' => 60,
        'header' => "User-Agent: Mozilla/5.0 (Encore Custom Laravel importer)\r\n",
        'follow_location' => 1,
    ],
]);
$html = @file_get_contents($url, false, $context);
if ($html === false || !str_contains($html, 'id="vbdoc"') || !str_contains($html, '<style>')) {
    fwrite(STDERR, "Unable to fetch the complete reference site: {$url}\n");
    exit(1);
}

$assetsPath = dirname(__DIR__).'/public/assets/reference';
if (!is_dir($assetsPath) && !mkdir($assetsPath, 0755, true) && !is_dir($assetsPath)) {
    throw new RuntimeException('Cannot create asset directory.');
}

$count = 0;
$html = preg_replace_callback(
    '~data:([\w.+-]+/[\w.+-]+);base64,([A-Za-z0-9+/=]+)~',
    static function (array $match) use ($assetsPath, &$count): string {
        $mime = $match[1];

        // Preserve inline typography byte-for-byte.
        if (str_starts_with($mime, 'font/')) {
            return $match[0];
        }

        $extensions = [
            'image/jpeg' => 'jpg',
            'image/png' => 'png',
            'image/webp' => 'webp',
        ];
        if (!isset($extensions[$mime])) {
            return $match[0];
        }

        $bytes = base64_decode($match[2], true);
        if ($bytes === false) {
            throw new RuntimeException('The reference contains a corrupted embedded image.');
        }

        $filename = substr(hash('sha256', $match[2]), 0, 20).'.'.$extensions[$mime];
        $path = $assetsPath.'/'.$filename;
        if (!file_exists($path)) {
            file_put_contents($path, $bytes, LOCK_EX);
            $count++;
        }

        return '/assets/reference/'.$filename;
    },
    $html
);
if ($html === null) {
    throw new RuntimeException('Could not parse embedded reference assets.');
}
$html = preg_replace('~<script async src="/\.netlify/scripts/hud[^>]*></script>~', '', $html);
$destination = dirname(__DIR__).'/resources/site/encore.html';
if (!is_dir(dirname($destination))) {
    mkdir(dirname($destination), 0755, true);
}
file_put_contents($destination, $html, LOCK_EX);
fwrite(STDOUT, "Imported Encore Custom site: {$destination}; extracted {$count} images.\n");
