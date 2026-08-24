<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Playlist;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Playlist::factory(10)->create();
		Playlist::factory()->bollywood()->count(5)->create(); //session-7 Task-4	//session-8 Task-5
    }
}