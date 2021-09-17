<?php

namespace Database\Seeders;

use App\Models\Charge;
use App\Models\Provider;
use App\Models\User;
use Illuminate\Database\Seeder;
use Tymon\JWTAuth\Facades\JWTAuth;

class ChargesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Vaciar la tabla.
        Charge::truncate();
        $faker = \Faker\Factory::create();
        // Crear artículos ficticios en la tabla

        $providers = Provider::all();
        $users = User::all();
        foreach ($users as $user){
            JWTAuth::attempt(['email' => $user->email, 'password' => '123123']);
            foreach ($providers as $provider){
                Charge::create([
                    'description' => $faker->text,
                    'date_delivery' => $faker->date('Y-m-d','now'),
                    'order_date'=> $faker->date('Y-m-d','now'),
                    'provider_id' => $provider->id,
                ]);
            }
        }
    }
}
