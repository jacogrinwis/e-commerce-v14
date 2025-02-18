<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * Factory voor het genereren van test categorieën
 * 
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Definieert de standaard waarden voor een nieuwe categorie
     * Genereert een willekeurige naam en bijbehorende slug
     * 
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->words(3, true);

        return [
            'name' => ucfirst($name), // Naam met hoofdletter
            'slug' => Str::slug($name), // URL-vriendelijke versie van de naam
        ];
    }
}
