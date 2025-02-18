<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Support\Str;
use App\Models\ProductImage;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

/**
 * Seeder voor productafbeeldingen
 * Genereert meerdere afbeeldingen voor elk product
 */
class ProductImageSeeder extends Seeder
{
    /**
     * Voert de database seeding uit
     * Koppelt willekeurige afbeeldingen aan producten
     */
    public function run(): void
    {
        $products = Product::all();
        $faker = \Faker\Factory::create();

        foreach ($products as $product) {
            // Genereer 2-10 afbeeldingen per product
            $imageCount = rand(2, 10);

            for ($i = 1; $i <= $imageCount; $i++) {
                $imageNumber = rand(1, 30);
                ProductImage::create([
                    'product_id' => $product->id,
                    'url' => "storage/products/images/{$imageNumber}.jpg", // Pad naar afbeelding
                    'alt_text' => $faker->slug(1),                         // Alt-tekst voor toegankelijkheid
                ]);
            }
        }
    }
}
