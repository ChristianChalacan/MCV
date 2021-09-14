<?php

namespace Database\Seeders;

use App\Models\Invoiced;
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
        for ($i = 0; $i < 50; $i++) {
            Invoiced::create([
                'quantity' => $faker->numberBetween('10','1000'),
            ]);
        }
    }
}
