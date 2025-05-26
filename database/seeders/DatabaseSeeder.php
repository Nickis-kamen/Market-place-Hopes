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
            'is_verified' => true,
            'address' => '123 Main St',
            'role' => 'customer',
        ]);
        User::factory()->create([
            'name' => 'vendeur',
            'email' => 'vendeur@gmail.com',
            'password' => bcrypt('1234567'),
            'image' => 'images/user_default.png',
            'is_verified' => true,
            'phone' => '1234567890',
            'address' => '123 Main St',
            'role' => 'vendor',
        ]);
        Categorie::factory(10)->create();
        Shop::factory(1)->create();
        Product::factory(50)->create();

        $products = Product::all();
        $categories = Categorie::all();

        foreach ($products as $product) {
            # code...
            $categRandom = $categories->random(8);

            foreach ($categRandom as $categorie) {
                # code...
                DB::table('category_product')->insert([
                    'product_id' => $product->id,
                    'categorie_id' => $categorie->id
                ]);
            }
        }
    }
}
