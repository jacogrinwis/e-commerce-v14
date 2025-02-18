<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Color;
use App\Models\Category;
use App\Models\Material;
use Illuminate\Database\Seeder;

/**
 * Hoofdseeder voor de database
 * Verantwoordelijk voor het coördineren en uitvoeren van alle seeders
 * Zorgt voor de juiste volgorde van data-invoer
 */
class DatabaseSeeder extends Seeder
{
    /**
     * Voert alle database seeders uit in de juiste volgorde
     * Elke seeder is verantwoordelijk voor een specifiek onderdeel van de applicatie
     * 
     * Volgorde is belangrijk vanwege onderlinge afhankelijkheden:
     * - Eerst gebruikers en hun adressen
     * - Dan de basis productgegevens (categorieën, kleuren, materialen, tags)
     * - Vervolgens de voorraadstatussen
     * - Dan de producten zelf
     * - Tot slot de productafbeeldingen en favorieten
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,           // Maakt basis gebruikersaccounts aan (admin, editor, gebruiker)
            AddressSeeder::class,        // Genereert adressen voor de aangemaakte gebruikers
            CategorySeeder::class,       // Vult de productcategorieën voor de webshop
            ColorSeeder::class,          // Voegt beschikbare kleuren toe voor producten
            MaterialSeeder::class,       // Voegt beschikbare materialen toe voor producten
            TagSeeder::class,            // Maakt tags aan voor productcategorisatie
            StockStatusSeeder::class,    // Definieert mogelijke voorraadstatussen
            ProductSeeder::class,        // Genereert de productcatalogus
            ProductImageSeeder::class,   // Voegt productafbeeldingen toe
            FavoriteSeeder::class,       // Maakt voorbeeld favorieten aan voor gebruikers
        ]);
    }
}
