<?php

namespace Database\Seeders;

use App\Models\Observation;
use App\Models\Shipping;
use App\Models\User;
use Illuminate\Database\Seeder;
use Tymon\JWTAuth\Facades\JWTAuth;

class ObservationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Observation::truncate();
        $faker = \Faker\Factory::create();
        // Crear artículos ficticios en la tabla

        $users = User::all();
        $shippings = Shipping::all();
        foreach ($users as $user){
            JWTAuth::attempt(['email' => $user->email, 'password' => '123123']);
            foreach ($shippings as $shipping){
                Observation::create([
                    'observation' => $faker->text,
                    'shipping_id' => $shipping->id,
                ]);
            }
        }
    }
}
