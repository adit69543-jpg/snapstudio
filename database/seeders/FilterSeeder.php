<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Filter;

class FilterSeeder extends Seeder
{
    public function run(): void
    {
        $filters = [
            [
                'name' => 'Original',
                'slug' => 'original',
                'description' => 'Warna asli tanpa tambahan efek.',
                'css_filter' => 'none',
            ],
            [
                'name' => 'Mono',
                'slug' => 'mono',
                'description' => 'Efek hitam putih klasik.',
                'css_filter' => 'grayscale(100%)',
            ],
            [
                'name' => 'Sepia',
                'slug' => 'sepia',
                'description' => 'Nuansa cokelat vintage.',
                'css_filter' => 'sepia(100%)',
            ],
            [
                'name' => 'Vintage',
                'slug' => 'vintage',
                'description' => 'Warna film retro dengan kesan pudar.',
                'css_filter' => 'sepia(30%) contrast(90%) saturate(80%)',
            ],
            [
                'name' => 'Warm',
                'slug' => 'warm',
                'description' => 'Warna hangat keemasan.',
                'css_filter' => 'sepia(20%) saturate(130%)',
            ],
            [
                'name' => 'Cool',
                'slug' => 'cool',
                'description' => 'Warna dingin dengan nuansa kebiruan.',
                'css_filter' => 'saturate(90%) hue-rotate(10deg)',
            ],
            [
                'name' => 'Soft',
                'slug' => 'soft',
                'description' => 'Warna lembut dan cerah.',
                'css_filter' => 'brightness(110%) contrast(90%) saturate(85%)',
            ],
            [
                'name' => 'Vivid',
                'slug' => 'vivid',
                'description' => 'Warna lebih tajam dan cerah.',
                'css_filter' => 'saturate(180%) contrast(110%)',
            ],
        ];

        foreach ($filters as $filter) {
            Filter::updateOrCreate(
                ['slug' => $filter['slug']],
                array_merge($filter, [
                    'status' => 'active'
                ])
            );
        }
    }
}
