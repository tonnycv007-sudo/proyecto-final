<?php

namespace Database\Factories;

use App\Models\Pet;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PetFactory extends Factory
{
    protected $model = Pet::class;

    public function definition(): array
    {
        return [
            'name'       => fake()->firstName(),
            'species'    => fake()->randomElement(['Perro', 'Gato']),
            'breed'      => fake()->randomElement(['Mestizo', 'Chihuahua', 'Siamés', 'Pastor alemán']),
            'sex'        => fake()->randomElement(['Macho', 'Hembra']),
            'birth_date' => fake()->date(),
            'owner_id'   => User::inRandomOrder()->first()->id ?? User::factory()->create()->id,
        ];
    }
}
