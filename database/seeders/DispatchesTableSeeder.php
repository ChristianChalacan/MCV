<?php

namespace Database\Seeders;

use App\Models\Dispatch;
use App\Models\Process;
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
        $processes = Process::all();
        foreach ($processes as $process){
            Dispatch::create([
                'date' => $faker->date('Y-m-d','now'),
                'process_id' => $process->id,
            ]);
        }
    }
}
