<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\EncoreCatalogService;
use Illuminate\Contracts\View\View;

final class SportController
{
    public function show(string $sport, EncoreCatalogService $catalog): View
    {
        $sports = config('sports', []);
        abort_unless(isset($sports[$sport]), 404);

        $details = match ($sport) {
            'baseball' => $this->baseball(),
            'basketball' => $this->basketball(),
            'bmx' => $this->bmx(),
            'cross-country' => $this->crossCountry(),
            'disc-golf' => $this->discGolf(),
            'field-hockey' => $this->fieldHockey(),
            'flag-football' => $this->flagFootball(),
            'football' => $this->football(),
            'golf' => $this->golf(),
            'hockey' => $this->hockey(),
            'lacrosse' => $this->lacrosse(),
            'mma' => $this->mma(),
            'rugby' => $this->rugby(),
            'running' => $this->running(),
            'soccer' => $this->soccer(),
            'softball' => $this->softball(),
            'swim' => $this->swim(),
            'tennis' => $this->tennis(),
            'track-and-field' => $this->trackAndField(),
            'volleyball' => $this->volleyball(),
            'yoga' => $this->yoga(),
            default => abort(404),
        };

        $id = (int) $sports[$sport]['id'];
        $page = array_replace_recursive($details, [
            'slug' => $sport,
            'name' => $sports[$sport]['name'],
            'id' => $id,
            'sports' => $sports,
            'seo' => ['canonical' => route('sports.show', ['sport' => $sport])],
            'catalog' => ['groups' => $catalog->groups($id)],
            'full_catalog_url' => 'https://encr.co/product_filter?'.http_build_query([
                'selectedGender' => 'All',
                'selectedCategory' => 5,
                'selectedSport' => $id,
                'selectedStyle' => 0,
            ]),
        ]);

        return view('website.sports.show', ['page' => $page]);
    }

    private function baseball(): array
    {
        return [
            'hero' => [
                'lead' => 'Own the',
                'accent' => 'diamond.',
                'subtitle' => 'Custom baseball uniforms and teamwear designed for your program.',
                'slides' => $this->volleyballSlides(),
                'facts' => $this->heroFacts(),
            ],
            'kit_heading' => ['before' => 'Build the', 'accent' => 'whole', 'after' => 'kit'],
            'kits' => $this->volleyballKits(false),
            'contrast' => $this->contrast(false),
            'proof' => $this->proof(),
            'clubs' => [],
            'contact' => $this->contact(),
            'seo' => [
                'title' => config('sports.baseball.name').' | Encore Custom',
                'description' => 'Custom '.config('sports.baseball.name').' uniforms and teamwear from Encore Custom.',
            ],
        ];
    }

    private function basketball(): array
    {
        return [
            'hero' => [
                'lead' => 'Own the',
                'accent' => 'court.',
                'subtitle' => 'Custom basketball uniforms and teamwear designed for your program.',
                'slides' => $this->volleyballSlides(),
                'facts' => $this->heroFacts(),
            ],
            'kit_heading' => ['before' => 'Build the', 'accent' => 'whole', 'after' => 'kit'],
            'kits' => $this->volleyballKits(false),
            'contrast' => $this->contrast(false),
            'proof' => $this->proof(),
            'clubs' => [],
            'contact' => $this->contact(),
            'seo' => [
                'title' => config('sports.basketball.name').' | Encore Custom',
                'description' => 'Custom '.config('sports.basketball.name').' uniforms and teamwear from Encore Custom.',
            ],
        ];
    }

    private function bmx(): array
    {
        return [
            'hero' => [
                'lead' => 'Own the',
                'accent' => 'track.',
                'subtitle' => 'Custom BMX apparel designed for your team.',
                'slides' => $this->volleyballSlides(),
                'facts' => $this->heroFacts(),
            ],
            'kit_heading' => ['before' => 'Build the', 'accent' => 'whole', 'after' => 'kit'],
            'kits' => $this->volleyballKits(false),
            'contrast' => $this->contrast(false),
            'proof' => $this->proof(),
            'clubs' => [],
            'contact' => $this->contact(),
            'seo' => [
                'title' => config('sports.bmx.name').' | Encore Custom',
                'description' => 'Custom '.config('sports.bmx.name').' uniforms and teamwear from Encore Custom.',
            ],
        ];
    }

    private function crossCountry(): array
    {
        return [
            'hero' => [
                'lead' => 'Own the',
                'accent' => 'course.',
                'subtitle' => 'Custom cross-country teamwear designed for your runners.',
                'slides' => $this->volleyballSlides(),
                'facts' => $this->heroFacts(),
            ],
            'kit_heading' => ['before' => 'Build the', 'accent' => 'whole', 'after' => 'kit'],
            'kits' => $this->volleyballKits(false),
            'contrast' => $this->contrast(false),
            'proof' => $this->proof(),
            'clubs' => [],
            'contact' => $this->contact(),
            'seo' => [
                'title' => config('sports.cross-country.name').' | Encore Custom',
                'description' => 'Custom '.config('sports.cross-country.name').' uniforms and teamwear from Encore Custom.',
            ],
        ];
    }

    private function discGolf(): array
    {
        return [
            'hero' => [
                'lead' => 'Own the',
                'accent' => 'course.',
                'subtitle' => 'Custom disc golf apparel designed for your club.',
                'slides' => $this->volleyballSlides(),
                'facts' => $this->heroFacts(),
            ],
            'kit_heading' => ['before' => 'Build the', 'accent' => 'whole', 'after' => 'kit'],
            'kits' => $this->volleyballKits(false),
            'contrast' => $this->contrast(false),
            'proof' => $this->proof(),
            'clubs' => [],
            'contact' => $this->contact(),
            'seo' => [
                'title' => config('sports.disc-golf.name').' | Encore Custom',
                'description' => 'Custom '.config('sports.disc-golf.name').' uniforms and teamwear from Encore Custom.',
            ],
        ];
    }

    private function fieldHockey(): array
    {
        return [
            'hero' => [
                'lead' => 'Own the',
                'accent' => 'field.',
                'subtitle' => 'Custom field hockey teamwear designed for your program.',
                'slides' => $this->volleyballSlides(),
                'facts' => $this->heroFacts(),
            ],
            'kit_heading' => ['before' => 'Build the', 'accent' => 'whole', 'after' => 'kit'],
            'kits' => $this->volleyballKits(false),
            'contrast' => $this->contrast(false),
            'proof' => $this->proof(),
            'clubs' => [],
            'contact' => $this->contact(),
            'seo' => [
                'title' => config('sports.field-hockey.name').' | Encore Custom',
                'description' => 'Custom '.config('sports.field-hockey.name').' uniforms and teamwear from Encore Custom.',
            ],
        ];
    }

    private function flagFootball(): array
    {
        return [
            'hero' => [
                'lead' => 'Own the',
                'accent' => 'field.',
                'subtitle' => 'Custom flag football uniforms designed for your program.',
                'slides' => $this->volleyballSlides(),
                'facts' => $this->heroFacts(),
            ],
            'kit_heading' => ['before' => 'Build the', 'accent' => 'whole', 'after' => 'kit'],
            'kits' => $this->volleyballKits(false),
            'contrast' => $this->contrast(false),
            'proof' => $this->proof(),
            'clubs' => [],
            'contact' => $this->contact(),
            'seo' => [
                'title' => config('sports.flag-football.name').' | Encore Custom',
                'description' => 'Custom '.config('sports.flag-football.name').' uniforms and teamwear from Encore Custom.',
            ],
        ];
    }

    private function football(): array
    {
        return [
            'hero' => [
                'lead' => 'Own the',
                'accent' => 'field.',
                'subtitle' => 'Custom football teamwear designed for your program.',
                'slides' => $this->volleyballSlides(),
                'facts' => $this->heroFacts(),
            ],
            'kit_heading' => ['before' => 'Build the', 'accent' => 'whole', 'after' => 'kit'],
            'kits' => $this->volleyballKits(false),
            'contrast' => $this->contrast(false),
            'proof' => $this->proof(),
            'clubs' => [],
            'contact' => $this->contact(),
            'seo' => [
                'title' => config('sports.football.name').' | Encore Custom',
                'description' => 'Custom '.config('sports.football.name').' uniforms and teamwear from Encore Custom.',
            ],
        ];
    }

    private function golf(): array
    {
        return [
            'hero' => [
                'lead' => 'Own the',
                'accent' => 'course.',
                'subtitle' => 'Custom golf apparel designed for your club.',
                'slides' => $this->volleyballSlides(),
                'facts' => $this->heroFacts(),
            ],
            'kit_heading' => ['before' => 'Build the', 'accent' => 'whole', 'after' => 'kit'],
            'kits' => $this->volleyballKits(false),
            'contrast' => $this->contrast(false),
            'proof' => $this->proof(),
            'clubs' => [],
            'contact' => $this->contact(),
            'seo' => [
                'title' => config('sports.golf.name').' | Encore Custom',
                'description' => 'Custom '.config('sports.golf.name').' uniforms and teamwear from Encore Custom.',
            ],
        ];
    }

    private function hockey(): array
    {
        return [
            'hero' => [
                'lead' => 'Own the',
                'accent' => 'ice.',
                'subtitle' => 'Custom hockey teamwear designed for your program.',
                'slides' => $this->volleyballSlides(),
                'facts' => $this->heroFacts(),
            ],
            'kit_heading' => ['before' => 'Build the', 'accent' => 'whole', 'after' => 'kit'],
            'kits' => $this->volleyballKits(false),
            'contrast' => $this->contrast(false),
            'proof' => $this->proof(),
            'clubs' => [],
            'contact' => $this->contact(),
            'seo' => [
                'title' => config('sports.hockey.name').' | Encore Custom',
                'description' => 'Custom '.config('sports.hockey.name').' uniforms and teamwear from Encore Custom.',
            ],
        ];
    }

    private function lacrosse(): array
    {
        return [
            'hero' => [
                'lead' => 'Own the',
                'accent' => 'field.',
                'subtitle' => 'Custom lacrosse uniforms and teamwear designed for your program.',
                'slides' => $this->volleyballSlides(),
                'facts' => $this->heroFacts(),
            ],
            'kit_heading' => ['before' => 'Build the', 'accent' => 'whole', 'after' => 'kit'],
            'kits' => $this->volleyballKits(false),
            'contrast' => $this->contrast(false),
            'proof' => $this->proof(),
            'clubs' => [],
            'contact' => $this->contact(),
            'seo' => [
                'title' => config('sports.lacrosse.name').' | Encore Custom',
                'description' => 'Custom '.config('sports.lacrosse.name').' uniforms and teamwear from Encore Custom.',
            ],
        ];
    }

    private function mma(): array
    {
        return [
            'hero' => [
                'lead' => 'Own the',
                'accent' => 'ring.',
                'subtitle' => 'Custom MMA training apparel designed for your team.',
                'slides' => $this->volleyballSlides(),
                'facts' => $this->heroFacts(),
            ],
            'kit_heading' => ['before' => 'Build the', 'accent' => 'whole', 'after' => 'kit'],
            'kits' => $this->volleyballKits(false),
            'contrast' => $this->contrast(false),
            'proof' => $this->proof(),
            'clubs' => [],
            'contact' => $this->contact(),
            'seo' => [
                'title' => config('sports.mma.name').' | Encore Custom',
                'description' => 'Custom '.config('sports.mma.name').' uniforms and teamwear from Encore Custom.',
            ],
        ];
    }

    private function rugby(): array
    {
        return [
            'hero' => [
                'lead' => 'Own the',
                'accent' => 'pitch.',
                'subtitle' => 'Custom rugby uniforms and teamwear designed for your club.',
                'slides' => $this->volleyballSlides(),
                'facts' => $this->heroFacts(),
            ],
            'kit_heading' => ['before' => 'Build the', 'accent' => 'whole', 'after' => 'kit'],
            'kits' => $this->volleyballKits(false),
            'contrast' => $this->contrast(false),
            'proof' => $this->proof(),
            'clubs' => [],
            'contact' => $this->contact(),
            'seo' => [
                'title' => config('sports.rugby.name').' | Encore Custom',
                'description' => 'Custom '.config('sports.rugby.name').' uniforms and teamwear from Encore Custom.',
            ],
        ];
    }

    private function running(): array
    {
        return [
            'hero' => [
                'lead' => 'Own the',
                'accent' => 'road.',
                'subtitle' => 'Custom running apparel designed for your group.',
                'slides' => $this->volleyballSlides(),
                'facts' => $this->heroFacts(),
            ],
            'kit_heading' => ['before' => 'Build the', 'accent' => 'whole', 'after' => 'kit'],
            'kits' => $this->volleyballKits(false),
            'contrast' => $this->contrast(false),
            'proof' => $this->proof(),
            'clubs' => [],
            'contact' => $this->contact(),
            'seo' => [
                'title' => config('sports.running.name').' | Encore Custom',
                'description' => 'Custom '.config('sports.running.name').' uniforms and teamwear from Encore Custom.',
            ],
        ];
    }

    private function soccer(): array
    {
        return [
            'hero' => [
                'lead' => 'Own the',
                'accent' => 'pitch.',
                'subtitle' => 'Custom soccer uniforms and teamwear designed for your club.',
                'slides' => $this->volleyballSlides(),
                'facts' => $this->heroFacts(),
            ],
            'kit_heading' => ['before' => 'Build the', 'accent' => 'whole', 'after' => 'kit'],
            'kits' => $this->volleyballKits(false),
            'contrast' => $this->contrast(false),
            'proof' => $this->proof(),
            'clubs' => [],
            'contact' => $this->contact(),
            'seo' => [
                'title' => config('sports.soccer.name').' | Encore Custom',
                'description' => 'Custom '.config('sports.soccer.name').' uniforms and teamwear from Encore Custom.',
            ],
        ];
    }

    private function softball(): array
    {
        return [
            'hero' => [
                'lead' => 'Own the',
                'accent' => 'diamond.',
                'subtitle' => 'Custom softball uniforms and teamwear designed for your team.',
                'slides' => $this->volleyballSlides(),
                'facts' => $this->heroFacts(),
            ],
            'kit_heading' => ['before' => 'Build the', 'accent' => 'whole', 'after' => 'kit'],
            'kits' => $this->volleyballKits(false),
            'contrast' => $this->contrast(false),
            'proof' => $this->proof(),
            'clubs' => [],
            'contact' => $this->contact(),
            'seo' => [
                'title' => config('sports.softball.name').' | Encore Custom',
                'description' => 'Custom '.config('sports.softball.name').' uniforms and teamwear from Encore Custom.',
            ],
        ];
    }

    private function swim(): array
    {
        return [
            'hero' => [
                'lead' => 'Own the',
                'accent' => 'pool.',
                'subtitle' => 'Custom swim team apparel designed for your program.',
                'slides' => $this->volleyballSlides(),
                'facts' => $this->heroFacts(),
            ],
            'kit_heading' => ['before' => 'Build the', 'accent' => 'whole', 'after' => 'kit'],
            'kits' => $this->volleyballKits(false),
            'contrast' => $this->contrast(false),
            'proof' => $this->proof(),
            'clubs' => [],
            'contact' => $this->contact(),
            'seo' => [
                'title' => config('sports.swim.name').' | Encore Custom',
                'description' => 'Custom '.config('sports.swim.name').' uniforms and teamwear from Encore Custom.',
            ],
        ];
    }

    private function tennis(): array
    {
        return [
            'hero' => [
                'lead' => 'Own the',
                'accent' => 'court.',
                'subtitle' => 'Custom tennis apparel designed for your club.',
                'slides' => $this->volleyballSlides(),
                'facts' => $this->heroFacts(),
            ],
            'kit_heading' => ['before' => 'Build the', 'accent' => 'whole', 'after' => 'kit'],
            'kits' => $this->volleyballKits(false),
            'contrast' => $this->contrast(false),
            'proof' => $this->proof(),
            'clubs' => [],
            'contact' => $this->contact(),
            'seo' => [
                'title' => config('sports.tennis.name').' | Encore Custom',
                'description' => 'Custom '.config('sports.tennis.name').' uniforms and teamwear from Encore Custom.',
            ],
        ];
    }

    private function trackAndField(): array
    {
        return [
            'hero' => [
                'lead' => 'Own the',
                'accent' => 'track.',
                'subtitle' => 'Custom track and field teamwear designed for your program.',
                'slides' => $this->volleyballSlides(),
                'facts' => $this->heroFacts(),
            ],
            'kit_heading' => ['before' => 'Build the', 'accent' => 'whole', 'after' => 'kit'],
            'kits' => $this->volleyballKits(false),
            'contrast' => $this->contrast(false),
            'proof' => $this->proof(),
            'clubs' => [],
            'contact' => $this->contact(),
            'seo' => [
                'title' => config('sports.track-and-field.name').' | Encore Custom',
                'description' => 'Custom '.config('sports.track-and-field.name').' uniforms and teamwear from Encore Custom.',
            ],
        ];
    }

    private function volleyball(): array
    {
        return [
            'hero' => [
                'lead' => 'Own the',
                'accent' => 'net.',
                'subtitle' => 'Match kits engineered for the jump, the dig and the long season. Designed and made in our own factory, built to your program\'s identity.',
                'slides' => $this->volleyballSlides(),
                'facts' => $this->heroFacts(),
            ],
            'kit_heading' => ['before' => 'Build the', 'accent' => 'whole', 'after' => 'kit'],
            'kits' => $this->volleyballKits(true),
            'contrast' => $this->contrast(true),
            'proof' => $this->proof(),
            'clubs' => [
                ['name' => 'Marin Volleyball', 'logo' => null],
                ['name' => 'Woodcreek High School', 'logo' => null],
                ['name' => 'Infinite Training Volleyball Club', 'logo' => null],
                ['name' => 'Endless Beach Volleyball', 'logo' => null],
                ['name' => 'High Impact Volleyball', 'logo' => null],
                ['name' => 'Kingtide Volleyball Club', 'logo' => null],
                ['name' => 'Evolve Volleyball Club', 'logo' => null],
                ['name' => 'Amplify Volleyball', 'logo' => null],
                ['name' => 'Holy Angels School', 'logo' => null],
                ['name' => 'Antelope Volleyball Club', 'logo' => null],
            ],
            'contact' => $this->contact(),
            'seo' => [
                'title' => config('site.volleyball_title'),
                'description' => config('site.volleyball_description'),
            ],
        ];
    }

    private function yoga(): array
    {
        return [
            'hero' => [
                'lead' => 'Own the',
                'accent' => 'practice.',
                'subtitle' => 'Custom yoga apparel designed for your group.',
                'slides' => $this->volleyballSlides(),
                'facts' => $this->heroFacts(),
            ],
            'kit_heading' => ['before' => 'Build the', 'accent' => 'whole', 'after' => 'kit'],
            'kits' => $this->volleyballKits(false),
            'contrast' => $this->contrast(false),
            'proof' => $this->proof(),
            'clubs' => [],
            'contact' => $this->contact(),
            'seo' => [
                'title' => config('sports.yoga.name').' | Encore Custom',
                'description' => 'Custom '.config('sports.yoga.name').' uniforms and teamwear from Encore Custom.',
            ],
        ];
    }

    private function volleyballSlides(): array
    {
        return [
            ['image' => 'assets/reference/365bcdb4cf25362cede1.jpg', 'position' => '65% 26%'],
            ['image' => 'assets/reference/12daedb12373442da7b1.jpg', 'position' => '50% 22%'],
            ['image' => 'assets/reference/604ea706bcbbe0613bba.jpg', 'position' => '58% 34%'],
            ['image' => 'assets/reference/0ca88fee07db45bfe5f9.jpg', 'position' => '64% 26%'],
            ['image' => 'assets/reference/f6ef076940e21e82eec3.jpg', 'position' => '60% 24%'],
            ['image' => 'assets/reference/cbaf4191f979982d6c84.jpg', 'position' => '50% 42%'],
        ];
    }

    private function heroFacts(): array
    {
        return [
            ['value' => '12', 'label' => 'kit minimum'],
            ['value' => '3-4', 'label' => 'week turnaround'],
            ['value' => '24h', 'label' => 'free design mock up'],
            ['value' => 'Team store', 'label' => 'available'],
            ['value' => 'Designed & made', 'label' => 'in house'],
        ];
    }

    private function volleyballKits(bool $volleyball): array
    {
        return [
            [
                'title' => $volleyball ? 'Game Jersey + Libero' : 'Game Jersey',
                'tag' => $volleyball ? 'Home, away & libero' : 'Home and away options',
                'description' => $volleyball
                    ? 'Athletic through the shoulder with room to jump, and nothing that rides up on a dig. The libero contrast colorway is built right in.'
                    : 'Made for your team with flexible cuts, durable fabric and coordinated colors.',
                'slides' => [
                    ['image' => 'assets/reference/c3c3d9ff661c2900a6b7.jpg', 'alt' => 'Game Jersey'],
                    ['label' => 'Cap sleeve'],
                    ['label' => 'Long sleeve'],
                    ['image' => 'assets/reference/b46204161d649c9f879a.jpg', 'alt' => 'Team colorway'],
                ],
            ],
            [
                'title' => 'Spandex',
                'tag' => 'Three inseams',
                'description' => '4-way stretch with a stay-put waistband, knee-pad friendly and cut so it never rides up on a dig.',
                'slides' => [
                    ['image' => 'assets/reference/18527a17548738ecb029.jpg', 'alt' => 'Spandex'],
                    ['label' => '5 inch'],
                    ['label' => '8 inch'],
                    ['label' => 'Back'],
                ],
            ],
            [
                'title' => 'Compression',
                'tag' => 'Layer under or wear alone',
                'description' => 'Compression pieces to wear under the kit or on their own, all in your team colors.',
                'slides' => [
                    ['label' => 'Sleeves'],
                    ['label' => 'Sleeveless top'],
                    ['label' => 'Leggings'],
                ],
            ],
            [
                'title' => 'Warmup / Shooter',
                'tag' => 'The layer you walk in wearing',
                'description' => 'Pre-game and sideline layers in your identity, sublimated or embroidered.',
                'slides' => [
                    ['image' => 'assets/reference/8ed60b6e0202b1ea2907.jpg', 'alt' => 'Warmup / Shooter', 'position' => 'center 42%'],
                    ['label' => 'Quarter-zip'],
                    ['label' => 'Full warmup'],
                    ['label' => 'Hoodie'],
                ],
            ],
            [
                'title' => 'Socks',
                'tag' => 'Finish the set',
                'description' => 'Custom socks in your team colors, from crew to knee-high.',
                'slides' => [
                    ['image' => 'assets/reference/a8edf9dd4a880691ab9d.jpg', 'alt' => 'Socks', 'position' => 'center 60%'],
                    ['label' => 'Mid-calf'],
                    ['label' => 'Knee-high'],
                    ['label' => 'Detail'],
                ],
            ],
            [
                'title' => 'Bag',
                'tag' => 'Carry it all',
                'description' => 'Team bags to carry the whole kit, all brandable with your logo.',
                'slides' => [
                    ['label' => 'Backpack'],
                    ['label' => 'Duffel'],
                    ['label' => 'Drawstring'],
                ],
            ],
        ];
    }

    private function contrast(bool $volleyball): array
    {
        return [
            'heading' => $volleyball ? 'Your libero,' : 'Your team,',
            'accent' => 'contrast.',
            'description' => $volleyball
                ? 'The libero has to wear a contrasting jersey, so we build it into your colorway automatically. Same design, opposite palette, no extra order.'
                : 'Give your team a coordinated home and away look. Same design, a distinctive second colorway and a unified identity.',
            'team_image' => 'assets/reference/b12ba7b66d2f31fb52e5.png',
            'alternate_image' => 'assets/reference/d27a3742fecbfd36ee09.webp',
        ];
    }

    private function proof(): array
    {
        return [
            'quote' => 'They dialed in the materials for exactly how we play, worked to our budget, and the product is superb.',
            'attribution' => 'A club director on their Encore kit',
        ];
    }

    private function contact(): array
    {
        return [
            'phone_display' => '+1 888 501 4999',
            'phone_link' => '+18885014999',
            'email' => 'info@encorecustom.com',
            'instagram' => 'https://instagram.com/encrcstm',
            'instagram_label' => '@encrcstm',
            'address' => '891 4th St, San Rafael, CA',
        ];
    }
}
