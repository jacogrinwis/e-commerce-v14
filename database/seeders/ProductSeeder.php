<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

/**
 * Seeder voor producten
 * Genereert een complete set testproducten met alle relaties
 */
class ProductSeeder extends Seeder
{
    /**
     * Voert de database seeding uit
     * Maakt producten aan met gekoppelde kleuren, materialen, tags en categorieën
     */
    public function run(): void
    {
        \App\Models\Product::factory(50)
            ->create()
            ->each(function ($product) {
                // Koppel 1-3 willekeurige kleuren
                $product->colors()->attach(
                    \App\Models\Color::inRandomOrder()->take(rand(1, 3))->pluck('id')
                );

                // Koppel 1-3 willekeurige materialen
                $product->materials()->attach(
                    \App\Models\Material::inRandomOrder()->take(rand(1, 3))->pluck('id')
                );

                // Koppel 1-3 willekeurige tags
                $tags = \Spatie\Tags\Tag::all();
                $product->attachTags($tags->random(rand(1, 3)));

                // Koppel een willekeurige categorie
                $product->category()->associate(
                    \App\Models\Category::inRandomOrder()->first()
                )->save();
            });
    }
}
