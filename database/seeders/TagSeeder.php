<?php

namespace Database\Seeders;

use Spatie\Tags\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = [
            'Bloemen',
            'Decoratie',
            'Handgemaakt',
            'Sieraden',
            'Mode',
            'Tuin',
            'Keramiek',
            'Glas',
            'Textiel',
            'Comfort',
            'Geuren',
            'Ontspanning',
            'Kunst',
            'Uniek',
            'Foto',
            'Herinneringen',
            'Creatief',
            'Eettafel',
            'Feestelijk',
        ];

        foreach ($tags as $tagName) {
            Tag::create(['name' => $tagName]);
        }
    }
}
