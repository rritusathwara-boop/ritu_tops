<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PlaylistFactory extends Factory
{
    public function definition(): array
    {
		//session-7 Task-3
		//session-8 Task-5
        return [
		
            'title' => fake()->sentence(3),
            'description' => fake()->paragraph(),
            'cover_image' => fake()->imageUrl() . '.jpg',
            'genre' => fake()->word(), //session-7 Task-4
			
		
		// session-8 Task-1,2,3
			 'title' => fake()->sentence(3),
            'description' => fake()->paragraph(),
            'cover_image' => fake()->imageUrl() . '.jpg',
        ];
    }
	//session-7 Task-4
	//session-8 Task-5
    public function bollywood(): static
	{
		return $this->state(fn (array $attributes) => [
			'genre' => 'Bollywood',
		]);

	}
}