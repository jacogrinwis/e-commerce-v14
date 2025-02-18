<?php

namespace Database\Seeders;

use App\Models\Material;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

/**
 * Seeder voor materialen
 * Vult de database met voorgedefinieerde materiaalsoorten
 */
class MaterialSeeder extends Seeder
{
    /**
     * Voert de database seeding uit
     * Maakt standaard materialen aan voor de webshop
     */
    public function run(): void
    {
        $materials = [
            'Katoen',
            'Polyester',
            'Wol',
            'Zijde',
            'Linnen',
            'Leer',
            'Denim',
            'Fleece',
            'Nylon',
            'Spandex',
        ];

        foreach ($materials as $material) {
            Material::create([
                'name' => $material,              // Materiaalnaam
                'slug' => Str::slug($material),   // URL-vriendelijke naam
            ]);
        }
    }
}
