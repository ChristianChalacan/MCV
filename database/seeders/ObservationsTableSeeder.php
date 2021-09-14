<?php

namespace Database\Seeders;

use App\Models\Observation;
use Illuminate\Database\Seeder;

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
        for ($i = 0; $i < 50; $i++) {
            Observation::create([
                'observation' => $faker->text,
            ]);
        }
    }
}
