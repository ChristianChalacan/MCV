<?php

namespace Database\Seeders;

use App\Models\Charge;
use Illuminate\Database\Seeder;

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
        for ($i = 0; $i < 50; $i++) {
            Charge::create([
                'description' => $faker->text,
                'date_delivery' => $faker->date('Y-m-d','now'),
                'order_date'=> $faker->date('Y-m-d','now'),
            ]);
        }
    }
}
