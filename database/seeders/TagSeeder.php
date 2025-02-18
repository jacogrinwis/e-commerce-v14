<?php

namespace Database\Seeders;

use Spatie\Tags\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

/**
 * Seeder voor product tags
 * Vult de database met voorgedefinieerde tags voor productcategorisatie
 */
class TagSeeder extends Seeder
{
    /**
     * Voert de database seeding uit
     * Maakt standaard tags aan voor de webshop
     */
    public function run(): void
    {
        $tags = [
            'Bloemen',
            'Decoratie',
            'Handgemaakt',
            'Sieraden',
            'Mode',
            'Tuin',
            'Keramiek',
            'Glas',
            'Textiel',
            'Comfort',
            'Geuren',
            'Ontspanning',
            'Kunst',
            'Uniek',
            'Foto',
            'Herinneringen',
            'Creatief',
            'Eettafel',
            'Feestelijk',
        ];

        foreach ($tags as $tagName) {
            Tag::create(['name' => $tagName]); // Maak tag aan met Nederlandse naam
        }
    }
}
