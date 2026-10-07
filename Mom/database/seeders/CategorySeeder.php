<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Party Wear', 'slug' => 'party-wear', 'image' => 'assets/images/partyware.jpeg', 'status' => 1],
            ['name' => 'Dresses & Frocks', 'slug' => 'dresses', 'image' => 'assets/images/light_pink_frock.jpeg', 'status' => 1],
            ['name' => 'Evening Gowns', 'slug' => 'evening-gowns', 'image' => 'assets/images/black_partyware.jpeg', 'status' => 1],
            ['name' => 'Skirts & Tops', 'slug' => 'skirts-tops', 'image' => 'assets/images/skitus.jpeg', 'status' => 1],
            ['name' => 'Co-ord Sets', 'slug' => 'co-ord-sets', 'image' => 'assets/images/yellow_frock.jpeg', 'status' => 1],
            ['name' => 'Summer Wear', 'slug' => 'summer-wear', 'image' => 'assets/images/pink_partyware.jpeg', 'status' => 1],
        ];

        foreach ($categories as $category) {
            Category::updateOrCreate(['slug' => $category['slug']], $category);
        }
    }
}
