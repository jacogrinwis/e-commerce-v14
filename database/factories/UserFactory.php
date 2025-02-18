<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * Factory voor het genereren van testgebruikers
 * 
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Het huidige wachtwoord dat door de factory wordt gebruikt
     */
    protected static ?string $password;

    /**
     * Definieert de standaard waarden voor een nieuwe gebruiker
     * Genereert realistische testdata voor gebruikersaccounts
     * 
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),                    // Willekeurige naam
            'email' => fake()->unique()->safeEmail(),    // Uniek e-mailadres
            'email_verified_at' => now(),                // E-mail direct geverifieerd
            'password' => static::$password ??= Hash::make('password'), // Standaard wachtwoord
            'remember_token' => Str::random(10),         // Remember me token
            'role' => 'USER',                           // Standaard gebruikersrol
        ];
    }

    /**
     * Markeert het e-mailadres als niet-geverifieerd
     */
    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
