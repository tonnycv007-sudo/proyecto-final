<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Crear un usuario de prueba cada vez que se ejecuten migraciones

        User::factory()->create([
            'name' => 'Tony',
            'email' => 'tonnycv007@gmail.com',
            'password' => bcrypt('12345678'),
            'id_number' => '34',
            'phone' => '8888888888',
            'address' => 'Calle 42, Lindavista',
        ])->assignRole('Doctor');
    }
}
