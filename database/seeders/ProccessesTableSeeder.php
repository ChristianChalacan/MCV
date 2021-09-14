<?php

namespace Database\Seeders;

use App\Models\Process;
use Illuminate\Database\Seeder;

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
        for ($i = 0; $i < 50; $i++) {
            Process::create([
                'process' => $faker->date('Y-m-d','now'),
                'hour' => $faker->time('H:i:s','now'),
                'turn' => $faker->numberBetween('0','3'),
                'initial' => $faker->numberBetween('10','1000'),
                'jabas' => $faker->numberBetween('10','100'),
                'unit' => $faker->numberBetween('10','100'),
                'packing' => $faker->numberBetween('10','100'),
                'net' => $faker->numberBetween('10','100'),
                'product' => $faker->name,
                'lot' => $faker->name,
                'final' => $faker->numberBetween('10','100'),
                'guia' => $faker->name,
                'observation' => $faker->text,
            ]);
        }
    }
}
