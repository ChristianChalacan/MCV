<?php

namespace Database\Seeders;

use App\Models\Charge;
use App\Models\Entry;
use App\Models\Kind;
use App\Models\Provider;
use App\Models\User;
use Illuminate\Database\Seeder;
use Tymon\JWTAuth\Facades\JWTAuth;

class EntriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Entry::truncate();
        $faker = \Faker\Factory::create();
        $turn =1;
        $batch = 'hola';

        $providers = Provider::all();
        $users = User::all();
        $charges = Charge::all();
        $kinds = Kind::all();

        foreach ($users as $user){
            JWTAuth::attempt(['email' => $user->email, 'password' => '123123']);
            foreach ($providers as $provider){
                foreach ($charges as $charge){
                    foreach ($kinds as $kind){
                        Entry::create([
                            'date' => $faker->date('Y-m-d','now'),
                            'turn' => $turn,
                            'hour' => $faker->time('H:i:s','now'),
                            'batch' => $batch,
                            'vehicle' => $faker->boolean,
                            'hygiene' => $faker->boolean,
                            'weight' => $faker->numberBetween('10','1000'),
                            'rejection' => $faker->numberBetween('10','1000'),
                            'extra' => $faker->numberBetween('10','1000'),
                            'observation' => $faker->text,
                            'availableweight' => $faker->numberBetween('10','1000'),
                            'availablejabas' => $faker->numberBetween('10','1000'),
                            'kind_id' => $kind->id,
                            'charge_id' => $charge->id,
                            'provider_id' => $provider->id,
                        ]);
                    }
                }
            }
        }
    }
}
