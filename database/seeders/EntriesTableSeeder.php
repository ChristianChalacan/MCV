<?php

namespace Database\Seeders;

use App\Models\Entry;
use Illuminate\Database\Seeder;

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
        // Crear artículos ficticios en la tabla
        for ($i = 0; $i < 50; $i++) {
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
            ]);
        }
    }
}
