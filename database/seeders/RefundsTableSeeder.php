<?php

namespace Database\Seeders;

use App\Models\Entry;
use App\Models\Provider;
use App\Models\Refund;
use App\Models\User;
use Illuminate\Database\Seeder;
use Tymon\JWTAuth\Facades\JWTAuth;

class RefundsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Refund::truncate();
        $faker = \Faker\Factory::create();
        // Crear artículos ficticios en la tabla
        $users = User::all();
        $entries = Entry::all();
        $providers = Provider::all();

        foreach ($users as $user){
            JWTAuth::attempt(['email' => $user->email, 'password' => '123123']);
            foreach ($entries as $entry){
                foreach ($providers as $provider){
                    Refund::create([
                        'quantity' => $faker->numberBetween(1,1000),
                        'confirmed' => $faker->boolean,
                        'observation' => $faker -> text,
                        'entry_id' => $entry->id,
                        'provider_id' => $provider->id,
                    ]);
                }
            }
        }
    }
}
