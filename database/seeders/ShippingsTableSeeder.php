<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Shipping;
use App\Models\User;
use Illuminate\Database\Seeder;
use Tymon\JWTAuth\Facades\JWTAuth;

class ShippingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Shipping::truncate();
        $faker = \Faker\Factory::create();
        // Crear artículos ficticios en la tabla
        $users = User::all();
        $clients = Client::all();
        foreach ($users as $user){
            JWTAuth::attempt(['email' => $user->email, 'password' => '123123']);
            foreach ($clients as $client){
                Shipping::create([
                    'date' => $faker->date('Y-m-d','now'),
                    'confirmed' => $faker->boolean,
                    'client_id' => $client->id,
                ]);
            }
        }
    }
}
