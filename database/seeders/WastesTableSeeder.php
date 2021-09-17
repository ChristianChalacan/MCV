<?php

namespace Database\Seeders;

use App\Models\Entry;
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
        $entries = Entry::all();
        foreach ($entries as $entry){
            Waste::create([
                'quantity' => $faker->numberBetween(10,1000),
                'entry_id' => $entry->id,
            ]);
        }
    }
}
