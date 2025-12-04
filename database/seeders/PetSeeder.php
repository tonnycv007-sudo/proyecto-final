<?php

namespace Database\Seeders;

use App\Models\Pet;
use Illuminate\Database\Seeder;

class PetSeeder extends Seeder
{
    public function run(): void
    {
        Pet::create([
            'name' => 'Kira',
            'species' => 'Perro',
            'breed' => 'Pastor Alemán',
            'age' => 4,
            'owner' => 'Juan Pérez',
        ]);

        Pet::create([
            'name' => 'Michi',
            'species' => 'Gato',
            'breed' => 'Criollo',
            'age' => 2,
            'owner' => 'Ana López',
        ]);
    }
}
