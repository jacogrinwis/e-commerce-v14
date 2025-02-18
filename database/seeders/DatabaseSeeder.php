<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Color;
use App\Models\Category;
use App\Models\Material;
use Illuminate\Database\Seeder;

/**
 * Hoofdseeder voor de database
 * Coördineert het uitvoeren van alle seeders in de juiste volgorde
 */
class DatabaseSeeder extends Seeder
{
    /**
     * Voert alle database seeders uit
     * Zorgt voor een complete initiële dataset
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,           // Gebruikers
            CategorySeeder::class,       // Productcategorieën
            ColorSeeder::class,          // Kleuren
            MaterialSeeder::class,       // Materialen
            TagSeeder::class,            // Tags
            StockStatusSeeder::class,    // Voorraadstatussen
            ProductSeeder::class,        // Producten
            ProductImageSeeder::class,   // Productafbeeldingen
            FavoriteSeeder::class,       // Favorieten
        ]);
    }
}
