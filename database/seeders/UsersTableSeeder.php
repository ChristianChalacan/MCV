<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        $faker = \Faker\Factory::create();
        // Crear la misma clave para todos los usuarios
        // conviene hacerlo antes del for para que el seeder
        // no se vuelva lento.
        $password = Hash::make('123123');
        User::create([
            'name' => 'Super_administrador',
            'email' => 'superadmin@prueba.com',
            'password' => $password,
            'role' => 'ROLE_SUPERADMIN'
        ]);
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@prueba.com',
            'password' => $password,
            'role' => 'ROLE_ADMIN'
        ]);
        User::create([
            'name' => 'Produccion',
            'email' => 'production@prueba.com',
            'password' => $password,
            'role' => 'ROLE_PRODUCTION'
        ]);
        User::create([
            'name' => 'Transporte',
            'email' => 'transportation@prueba.com',
            'password' => $password,
            'role' => 'ROLE_TRANSPORTATION'
        ]);
    }
}
