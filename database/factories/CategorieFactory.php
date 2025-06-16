<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Categorie>
 */
class CategorieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = "Autre";
        return [
            //
            'title' => $title,
            'slug' => \Illuminate\Support\Str::slug($title),
            'description' => 'Catégorie des produits par defaut',
        ];
    }
}
