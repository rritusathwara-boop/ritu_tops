<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create or update admin user
        Admin::updateOrCreate(
            ['email' => 'admin@momandme.com'],
            [
                'name' => 'Admin User',
                'password' => bcrypt('password'),
                'phone' => '9783074387',
            ]
        );

        // Create or update test customer
        User::updateOrCreate(
            ['email' => 'customer@momandme.com'],
            [
                'name' => 'Ritu Sharma',
                'password' => bcrypt('password'),
                'phone' => '9876543210',
                'role' => 'customer',
                'address' => 'Shop No. 24, Milan Park Society, Maninagar',
                'city' => 'Ahmedabad',
                'state' => 'Gujarat',
                'pincode' => '380008',
            ]
        );

        $this->call([
            CategorySeeder::class,
            ProductSeeder::class,
        ]);
    }
}
