<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('1234567'),
            'image' => 'images/user_default.png',
            'phone' => '1234567890',
            'address' => '123 Main St',
            'role' => 'admin',
        ]);
        User::factory()->create([
            'name' => 'client',
            'email' => 'client@gmail.com',
            'password' => bcrypt('1234567'),
            'image' => 'images/user_default.png',
            'phone' => '1234567890',
            'address' => '123 Main St',
            'role' => 'customer',
        ]);
        User::factory()->create([
            'name' => 'vendeur',
            'email' => 'vendeur@gmail.com',
            'password' => bcrypt('1234567'),
            'image' => 'images/user_default.png',
            'phone' => '1234567890',
            'address' => '123 Main St',
            'role' => 'vendor',
        ]);
    }
}
