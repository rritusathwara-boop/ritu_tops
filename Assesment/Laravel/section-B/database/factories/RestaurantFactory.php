<?php

namespace Database\Factories;

use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Factories\Factory;

class RestaurantFactory extends Factory
{
    protected $model = Restaurant::class;

    public function definition(): array
    {
        return [
            'name' => fake()->company() . ' Eatery',
            'description' => fake()->sentence(10),
            'address' => fake()->address(),
        ];
    }
}
