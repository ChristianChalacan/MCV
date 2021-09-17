<?php

namespace Database\Seeders;

use App\Models\Invoiced;
use App\Models\Process;
use Illuminate\Database\Seeder;

class InvoicedsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Invoiced::truncate();
        $faker = \Faker\Factory::create();
        // Crear artículos ficticios en la tabla
        $processes = Process::all();

        foreach ($processes as $process){
            Invoiced::create([
                'quantity' => $faker->numberBetween('10','1000'),
                'process_id' => $process->id,
            ]);
        }
    }
}
