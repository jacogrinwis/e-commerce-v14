<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Color>
 */
class ColorFactory extends Factory
{
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
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->unique()->randomElement($this->colors);

        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'hex' => $this->faker->hexColor(),
        ];
    }
}
