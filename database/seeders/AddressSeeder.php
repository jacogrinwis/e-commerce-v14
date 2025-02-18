<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Address;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();

        foreach ($users as $user) {
            Address::create([
                'user_id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'phone' => '06' . fake()->numerify('########'),
                'street' => fake()->streetName(),
                'house_number' => fake()->buildingNumber(),
                'postal_code' => fake()->numerify('####') . strtoupper(fake()->lexify('??')),
                'city' => fake()->city(),
                'country' => 'Nederland',
                'is_default' => true
            ]);
        }
    }
}
