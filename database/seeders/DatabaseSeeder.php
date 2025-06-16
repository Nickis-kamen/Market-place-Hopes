<?php

namespace Database\Seeders;

use App\Models\Categorie;
use App\Models\Product;
use App\Models\Shop;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            'is_verified' => true,
            'phone' => '0330683879',
            'address' => '123 Main St',
            'role' => 'admin',
        ]);

        Categorie::factory(1)->create();

    }
}
