<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Product::factory(50)
            ->create()
            ->each(function ($product) {
                $product->colors()->attach(
                    \App\Models\Color::inRandomOrder()->take(rand(1, 3))->pluck('id')
                );
                $product->materials()->attach(
                    \App\Models\Material::inRandomOrder()->take(rand(1, 3))->pluck('id')
                );
                $tags = \Spatie\Tags\Tag::all();
                $product->attachTags($tags->random(rand(1, 3)));
                $product->category()->associate(
                    \App\Models\Category::inRandomOrder()->first()
                )->save();
            });
    }
}
