<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Color;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Material;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // Category::factory(20)->create();
        // Color::factory(19)->create();
        // Material::factory(20)->create();

        $this->call([
            CategorySeeder::class,
            ColorSeeder::class,
            MaterialSeeder::class,
            TagSeeder::class,
            ProductSeeder::class,
            ProductImageSeeder::class,
        ]);
    }
}
