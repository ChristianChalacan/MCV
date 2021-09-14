<?php

namespace Database\Seeders;

use App\Models\Waste;
use Illuminate\Database\Seeder;

class WastesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Waste::truncate();
        $faker = \Faker\Factory::create();
        // Crear artículos ficticios en la tabla
        for ($i = 0; $i < 50; $i++) {
            Waste::create([
                'quantity' => $faker->numberBetween(10,1000),
            ]);
        }
    }
}
