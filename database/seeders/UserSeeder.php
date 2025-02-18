<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

/**
 * Seeder voor gebruikers
 * Maakt de standaard gebruikersaccounts aan met verschillende rollen
 */
class UserSeeder extends Seeder
{
    /**
     * Voert de database seeding uit
     * Creëert admin, editor en standaard gebruiker accounts
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => 'ADMIN',
        ]);

        User::factory()->create([
            'name' => 'Editor',
            'email' => 'editor@example.com',
            'password' => Hash::make('password'),
            'role' => 'EDITOR',
        ]);

        User::factory()->create([
            'name' => 'User',
            'email' => 'user@example.com',
            'password' => Hash::make('password'),
            'role' => 'USER',
        ]);
    }
}
