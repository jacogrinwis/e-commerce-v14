<?php

namespace Database\Seeders;

use App\Models\StockStatus;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

/**
 * Seeder voor voorraadstatussen
 * Vult de database met de standaard voorraadstatussen
 */
class StockStatusSeeder extends Seeder
{
    /**
     * Voert de database seeding uit
     * Maakt de basis voorraadstatussen aan voor producten
     */
    public function run(): void
    {
        StockStatus::create([
            'name' => 'Op voorraad',
            'code' => 'in_stock'
        ]);

        StockStatus::create([
            'name' => 'Bijna uitverkocht',
            'code' => 'low_stock'
        ]);

        StockStatus::create([
            'name' => 'Uitverkocht',
            'code' => 'out_of_stock'
        ]);

        StockStatus::create([
            'name' => 'Binnenkort leverbaar',
            'code' => 'coming_soon'
        ]);
    }
}
