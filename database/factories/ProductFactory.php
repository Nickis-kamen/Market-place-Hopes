<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->unique()->word();
        return [
            //
            'shop_id' => 1,
            'title' => $title,
            'slug' => \illuminate\Support\Str::slug($title),
            'price' => fake()->randomFloat(2, 10, 1000),
            'quantity' => mt_rand(1, 100),
            'description' => fake()->paragraph(),
            'image' => 'uploads/products/tBx2wMY06ISlB8Xo0cH5WNG5Mhm65NDVkcfmsghn.webp'
        ];
    }
}
