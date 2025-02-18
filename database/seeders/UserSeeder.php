<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use App\Mail\NewUserRegisteredMail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewUserNotificationMail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

/**
 * Seeder voor gebruikers
 * Verantwoordelijk voor het aanmaken van de standaard gebruikersaccounts
 * Verstuurt welkomst- en notificatiemails bij registratie
 */
class UserSeeder extends Seeder
{
    /**
     * Voert de database seeding uit voor gebruikers
     * 
     * Maakt drie type accounts aan:
     * - Admin account met volledige rechten
     * - Editor account met beperkte beheerrechten
     * - Standaard gebruikersaccount
     * 
     * Voor elk account wordt:
     * - Een welkomstmail verstuurd naar de gebruiker
     * - Een notificatiemail verstuurd naar de beheerder
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Admin',               // Beheerder met volledige toegang
                'email' => 'admin@example.com',
                'password' => Hash::make('password'),
                'role' => 'ADMIN',
            ],
            [
                'name' => 'Editor',              // Editor met beperkte beheerdersrechten
                'email' => 'editor@example.com',
                'password' => Hash::make('password'),
                'role' => 'EDITOR',
            ],
            [
                'name' => 'User',                // Standaard gebruiker
                'email' => 'user@example.com',
                'password' => Hash::make('password'),
                'role' => 'USER',
            ]
        ];

        foreach ($users as $userData) {
            // Maak nieuwe gebruiker aan via factory
            $user = User::factory()->create($userData);

            // Verstuur welkomstmail naar de nieuwe gebruiker
            Mail::to($user->email)->send(new NewUserRegisteredMail($user));

            // Verstuur notificatie naar beheerder over nieuwe registratie
            Mail::to(config('mail.admin_address'))->send(new NewUserNotificationMail($user));
        }
    }
}
