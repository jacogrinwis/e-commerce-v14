<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\StockStatus;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * Factory voor het genereren van test producten
 * 
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Definieert de standaard waarden voor een nieuw product
     * Genereert realistische testdata voor alle producteigenschappen
     * 
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        static $number = 1;
        $name = $this->faker->words($this->faker->numberBetween(3, 20), true);

        return [
            'product_number' => sprintf('#%08d', $number++), // Uniek productnummer
            'name' => ucfirst($name),                        // Productnaam
            'slug' => Str::slug($name),                      // URL-vriendelijke naam
            'description' => $this->faker->sentence,         // Productomschrijving
            'cover' => 'storage/products/covers/' . $this->faker->numberBetween(1, 30) . '.jpg', // Productafbeelding
            'price' => $this->faker->numberBetween(100, 9999), // Prijs tussen 1 en 99.99
            'discount' => function () {
                if (mt_rand(1, 100) <= 75) {
                    return null; // 75% kans op geen korting
                } else {
                    return Arr::random([10, 15, 30, 50]); // 25% kans op korting
                }
            },
            'dimensions' => $this->faker->numberBetween(10, 100) . ' x ' .
                $this->faker->numberBetween(10, 100) . ' x ' .
                $this->faker->numberBetween(10, 100) . ' cm', // Productafmetingen
            'weight' => $this->faker->randomFloat(2, 0.1, 50), // Gewicht tussen 0.1 en 50 kg
            'category_id' => Category::inRandomOrder()->first()->id, // Willekeurige categorie
            'stock_status_id' => StockStatus::inRandomOrder()->first()->id, // Willekeurige voorraadstatus
        ];
    }

    /**
     * Markeert het product als op voorraad
     */
    public function inStock()
    {
        return $this->state(fn(array $attributes) => [
            'stock_status' => 'in_stock',
        ]);
    }

    /**
     * Markeert het product als uitverkocht
     */
    public function outOfStock()
    {
        return $this->state(fn(array $attributes) => [
            'stock_status' => 'out_of_stock',
        ]);
    }
}
