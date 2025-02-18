<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
use App\Models\Favorite;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

/**
 * Seeder voor favorieten
 * Genereert test-favorieten voor gebruikers
 */
class FavoriteSeeder extends Seeder
{
    /**
     * Voert de database seeding uit
     * Koppelt willekeurige producten als favorieten aan gebruikers
     */
    public function run(): void
    {
        $users = User::all();
        $products = Product::all();

        foreach ($users as $user) {
            // Selecteer willekeurige producten voor elke gebruiker
            $randomProducts = $products->random(rand(1, 5));

            foreach ($randomProducts as $product) {
                Favorite::create([
                    'user_id' => $user->id,
                    'product_id' => $product->id
                ]);
            }
        }
    }
}
