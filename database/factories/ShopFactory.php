<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Shop>
 */
class ShopFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->company();
        return [
            //
            'user_id' => 3,
            'name' => $name,
            'adresse' => fake()->address(),
            'slug' => \Illuminate\Support\Str::slug($name),
            'description' => fake()->paragraph(),
            'image' => 'uploads/shops/JwwfbLuQj3qYR5N5AmOqW1tQkrBwKwWyes3h7x9r.jpg',
        ];
    }
}
