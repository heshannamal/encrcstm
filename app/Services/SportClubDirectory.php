<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\SportClub;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Throwable;

final class SportClubDirectory
{
    /** @return array<int, array{name:string,logo:?string}> */
    public function forSport(string $slug): array
    {
        if (config('encore.club_source', 'config') !== 'database') {
            return $this->defaults($slug);
        }

        try {
            $records = Cache::remember(
                'encore:clubs:'. $slug,
                (int) config('encore.cache_seconds', 300),
                static fn () => SportClub::query()
                    ->where('is_active', true)
                    ->whereIn('sport_slug', [$slug, 'all'])
                    ->orderBy('sort_order')
                    ->orderBy('id')
                    ->get(['name', 'logo_url'])
                    ->map(static fn (SportClub $club) => [
                        'name' => $club->name,
                        'logo' => $club->logo_url,
                    ])
                    ->all()
            );

            return $records ?: $this->defaults($slug);
        } catch (Throwable $error) {
            Log::warning('Sport clubs could not be loaded', ['error' => $error->getMessage()]);
            return $this->defaults($slug);
        }
    }

    private function defaults(string $slug): array
    {
        return array_map(
            static fn ($club) => [
                'name' => (string) ($club['name'] ?? ''),
                'logo' => $club['logo'] ?? null,
            ],
            config('clubs.'.$slug, config('clubs.default', []))
        );
    }
}
