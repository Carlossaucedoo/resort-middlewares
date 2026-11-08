<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Crea los tres usuarios de prueba del resort.
     */
    public function run(): void
    {
        // Administrador mayor de edad: entra en panel, casino y admin
        User::create([
            'name' => 'Director',
            'email' => 'admin@resort.com',
            'password' => Hash::make('password123'),
            'is_admin' => true,
            'age' => 40,
        ]);

        // Usuario normal mayor de edad: entra en panel y casino
        User::create([
            'name' => 'Cliente adulto',
            'email' => 'adulto@resort.com',
            'password' => Hash::make('password123'),
            'is_admin' => false,
            'age' => 25,
        ]);

        // Usuario normal menor de edad: solo entra en panel
        User::create([
            'name' => 'Cliente menor',
            'email' => 'menor@resort.com',
            'password' => Hash::make('password123'),
            'is_admin' => false,
            'age' => 15,
        ]);
    }
}
