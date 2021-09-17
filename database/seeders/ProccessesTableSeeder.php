<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Entry;
use App\Models\Order;
use App\Models\Process;
use App\Models\Shipping;
use App\Models\User;
use Illuminate\Database\Seeder;
use Tymon\JWTAuth\Facades\JWTAuth;

class ProccessesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Process::truncate();
        $faker = \Faker\Factory::create();
        // Crear artículos ficticios en la tabla

        $user = User::find(1);
        $entries = Entry::all();
        $orders = Order::all();
        $client = Client::find(1);
        $shippings = Shipping::all();
            JWTAuth::attempt(['email' => $user->email, 'password' => '123123']);

                foreach ($entries as $entry){
                    foreach ($shippings as $shipping){
                        foreach ($orders as $order){
                            Process::create([
                                'process' => $faker->date('Y-m-d','now'),
                                'hour' => $faker->time('H:i:s','now'),
                                'turn' => $faker->numberBetween('0','3'),
                                'initial' => $faker->numberBetween('10','1000'),
                                'jabas' => $faker->numberBetween('10','100'),
                                'unit' => $faker->numberBetween('10','100'),
                                'packing' => $faker->numberBetween('10','100'),
                                'net' => $faker->numberBetween('10','100'),
                                'product' => $faker->word,
                                'lot' => $faker->word,
                                'final' => $faker->numberBetween('10','100'),
                                'guia' => $faker->word,
                                'observation' => $faker->text,
                                'entry_id' => $entry->id,
                                'order_id' => $order->id,
                                'client_id' => $client->id,
                                'shipping_id' => $shipping->id,
                            ]);
                        }
                    }
                }


    }
}
