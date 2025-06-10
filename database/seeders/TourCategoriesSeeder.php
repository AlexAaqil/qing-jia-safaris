<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tours\TourCategory;
use Illuminate\Support\Str;

class TourCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'kenya safaris',
            'tanzania safaris',
            'kenya-tanzania safaris',
        ];

        foreach($categories as $title) {
            TourCategory::updateOrCreate([
                'uuid' => Str::ulid(),
                'title' => $title,
                'slug' => Str::slug($title),
            ]);
        }
    }
}
