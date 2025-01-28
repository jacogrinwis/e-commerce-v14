<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        static $number = 1;
        $name = $this->faker->words($this->faker->numberBetween(3, 20), true);

        return [
            'product_number' => sprintf('#%08d', $number++),
            'name' => ucfirst($name),
            'slug' => Str::slug($name),
            'description' => $this->faker->sentence,
            'cover' => 'storage/products/covers/' . $this->faker->numberBetween(1, 30) . '.jpg',
            'price' => $this->faker->numberBetween(100, 9999),
            'discount' => function () {
                if (mt_rand(1, 100) <= 75) {
                    return null; // 75% kans op null
                } else {
                    return Arr::random([10, 15, 30, 50]); // 25% kans op een van deze waarden
                }
            },
            'dimensions' => $this->faker->numberBetween(10, 100) . ' x ' . $this->faker->numberBetween(10, 100) . ' x ' . $this->faker->numberBetween(10, 100) . ' cm',
            'weight' => $this->faker->randomFloat(2, 0.1, 50),
            'category_id' => Category::inRandomOrder()->first()->id,
            'stock_status' => fake()->randomElement(['in_stock', 'low_stock', 'out_of_stock', 'coming_soon']),
        ];
    }

    public function inStock()
    {
        return $this->state(fn(array $attributes) => [
            'stock_status' => 'in_stock',
        ]);
    }

    public function outOfStock()
    {
        return $this->state(fn(array $attributes) => [
            'stock_status' => 'out_of_stock',
        ]);
    }
}
