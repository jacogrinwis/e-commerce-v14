<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * Factory voor het genereren van test kleuren
 * 
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Color>
 */
class ColorFactory extends Factory
{
    /**
     * Lijst met voorgedefinieerde kleurnamen
     */
    protected $colors = [
        'Ruby Red',
        'Sapphire Blue',
        'Emerald Green',
        'Royal Purple',
        'Golden Yellow',
        'Coral Pink',
        'Turquoise',
        'Crimson',
        'Navy Blue',
        'Forest Green',
        'Lavender',
        'Burnt Orange',
        'Teal',
        'Maroon',
        'Sky Blue',
        'Olive Green',
        'Magenta',
        'Bronze',
        'Indigo',
        'Slate Gray'
    ];

    /**
     * Definieert de standaard waarden voor een nieuwe kleur
     * Kiest een willekeurige kleurnaam en genereert bijbehorende slug en hex-code
     * 
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->unique()->randomElement($this->colors);

        return [
            'name' => $name,                // Naam van de kleur
            'slug' => Str::slug($name),     // URL-vriendelijke versie van de naam
            'hex' => $this->faker->hexColor(), // Willekeurige hex kleurcode
        ];
    }
}
