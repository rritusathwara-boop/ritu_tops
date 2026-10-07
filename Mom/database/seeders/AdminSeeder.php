<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        Admin::updateOrCreate(
            ['email' => 'admin@momandme.com'],
            [
                'name'     => 'Admin User',
                'password' => Hash::make('password'),
                'phone'    => '9999999999',
            ]
        );
    }
}
