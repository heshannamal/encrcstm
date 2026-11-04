<?php

declare(strict_types=1);

/**
 * Sport editorial content. Sport IDs are in config/sports.php.
 * The controller merges defaults and per-sport overrides.
 * Existing volleyball imagery is used until approved sport assets are provided.
 */
return [
    'defaults' => [
        'hero' => [
            'lead' => 'Own the',
            'subtitle' => 'Custom team kits made for your program. Designed and made in our own factory, built to your identity.',
            'slides' => [
                ['image'=>'assets/reference/365bcdb4cf25362cede1.jpg', 'position'=>'65% 26%'],
                ['image'=>'assets/reference/12daedb12373442da7b1.jpg', 'position'=>'50% 22%'],
                ['image'=>'assets/reference/604ea706bcbbe0613bba.jpg', 'position'=>'58% 34%'],
                ['image'=>'assets/reference/0ca88fee07db45bfe5f9.jpg', 'position'=>'64% 26%'],
                ['image'=>'assets/reference/f6ef076940e21e82eec3.jpg', 'position'=>'60% 24%'],
                ['image'=>'assets/reference/cbaf4191f979982d6c84.jpg', 'position'=>'50% 42%'],
            ],
            'facts' => [
                ['value'=>'12','label'=>'kit minimum'],
                ['value'=>'3-4','label'=>'week turnaround'],
                ['value'=>'24h','label'=>'free design mock up'],
                ['value'=>'Team store','label'=>'available'],
                ['value'=>'Designed & made','label'=>'in house'],
            ],
        ],
        'kit_heading' => ['before'=>'Build the','accent'=>'whole','after'=>'kit'],
        'kits' => [
            [
                'title' => 'Game Jersey + Libero',
                'tag' => 'Home, away & libero',
                'description' => 'Athletic through the shoulder with room to jump, and nothing that rides up on a dig. The libero contrast colorway is built right in.',
                'slides' => [
                    ['image' => 'assets/reference/c3c3d9ff661c2900a6b7.jpg', 'alt' => 'Game Jersey + Libero'],
                    ['label' => 'Cap sleeve'],
                    ['label' => 'Long sleeve'],
                    ['image' => 'assets/reference/b46204161d649c9f879a.jpg', 'alt' => 'Game Jersey + Libero'],
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
                    ['image' => 'assets/reference/8ed60b6e0202b1ea2907.jpg', 'alt' => 'Warmup / Shooter', 'position'=>'center 42%'],
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
                    ['image' => 'assets/reference/a8edf9dd4a880691ab9d.jpg', 'alt' => 'Socks', 'position'=>'center 60%'],
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
        ],
        'contrast' => [
            'heading' => 'Your team,',
            'accent' => 'contrast.',
            'description' => 'Give your team a coordinated home and away look. Same design, a distinctive second colorway and a unified identity.',
            'team_image' => 'assets/reference/b12ba7b66d2f31fb52e5.png',
            'alternate_image' => 'assets/reference/d27a3742fecbfd36ee09.webp',
        ],
        'proof' => [
            'quote' => 'They dialed in the materials for exactly how we play, worked to our budget, and the product is superb.',
            'attribution' => 'A club director on their Encore kit',
        ],
        'contact' => [
            'phone_display' => '+1 888 501 4999',
            'phone_link' => '+18885014999',
            'email' => 'info@encorecustom.com',
            'instagram' => 'https://instagram.com/encrcstm',
            'instagram_label' => '@encrcstm',
            'address' => '891 4th St, San Rafael, CA',
        ],
    ],
    'overrides' => [
        'volleyball' => [
            'hero' => [
                'accent' => 'net.',
                'subtitle' => "Match kits engineered for the jump, the dig and the long season. Designed and made in our own factory, built to your program's identity.",
            ],
            'contrast' => [
                'heading' => 'Your libero,',
                'description' => 'The libero has to wear a contrasting jersey, so we build it into your colorway automatically. Same design, opposite palette, no extra order.',
            ],
        ],
    ],
];
