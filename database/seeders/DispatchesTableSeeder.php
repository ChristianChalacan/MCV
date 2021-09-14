<?php

namespace Database\Seeders;

use App\Models\Dispatch;
use Illuminate\Database\Seeder;

class DispatchesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Dispatch::truncate();
        $faker = \Faker\Factory::create();
        // Crear artículos ficticios en la tabla
        for ($i = 0; $i < 50; $i++) {
            Dispatch::create([
                'date' => $faker->date('Y-m-d','now'),
            ]);
        }
    }
}
