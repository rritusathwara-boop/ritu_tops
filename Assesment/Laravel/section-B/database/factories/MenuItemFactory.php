<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\MenuItem;
use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Factories\Factory;

class MenuItemFactory extends Factory
{
    protected $model = MenuItem::class;

    public function definition(): array
    {
        return [
            'restaurant_id' => Restaurant::factory(),
            'category_id' => Category::factory(),
            'name' => fake()->words(2, true),
            'description' => fake()->sentence(8),
            'price' => fake()->randomFloat(2, 5, 45),
            'is_available' => fake()->boolean(80),
        ];
    }
}
