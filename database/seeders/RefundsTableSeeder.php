<?php

namespace Database\Seeders;

use App\Models\Refund;
use Illuminate\Database\Seeder;

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
        for ($i = 0; $i < 50; $i++) {
            Refund::create([
                'quantity' => $faker->numberBetween(1,1000),
                'confirmed' => $faker->boolean,
                'observation' => $faker -> text,
            ]);
        }
    }
}
