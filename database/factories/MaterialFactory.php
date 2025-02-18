<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * Factory voor het genereren van test materialen
 * 
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Material>
 */
class MaterialFactory extends Factory
{
    /**
     * Definieert de standaard waarden voor een nieuw materiaal
     * Genereert een willekeurige materiaalnaam en bijbehorende slug
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
