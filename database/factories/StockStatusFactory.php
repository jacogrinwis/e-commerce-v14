<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * Factory voor het genereren van test voorraadstatussen
 * 
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StockStatus>
 */
class StockStatusFactory extends Factory
{
    /**
     * Definieert de standaard waarden voor een nieuwe voorraadstatus
     * 
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $statuses = [
            'in_stock' => 'Op voorraad',
            'low_stock' => 'Bijna uitverkocht',
            'out_of_stock' => 'Uitverkocht',
            'coming_soon' => 'Binnenkort leverbaar'
        ];

        $code = $this->faker->unique()->randomElement(array_keys($statuses));

        return [
            'code' => $code,
            'name' => $statuses[$code]
        ];
    }
}
