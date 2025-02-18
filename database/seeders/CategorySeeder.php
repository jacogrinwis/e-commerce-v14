<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

/**
 * Seeder voor productcategorieën
 * Vult de database met voorgedefinieerde categorieën
 */
class CategorySeeder extends Seeder
{
    /**
     * Voert de database seeding uit
     * Maakt standaard categorieën aan voor de webshop
     */
    public function run(): void
    {
        $categories = [
            'Kransen',
            'Armbanden',
            'Potjes',
            'Vazen',
            'Sierkussens',
            'Kaarsen',
            'Schilderijen',
            'Fotolijsten',
            'Hangdecoraties',
            'Tafeldecoraties',
            'Bloemstukken',
            'Wanddecoraties',
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category,              // Categorienaam
                'slug' => Str::slug($category),   // URL-vriendelijke naam
            ]);
        }
    }
}
