<?php

namespace Database\Seeders;

use App\Models\Entry;
use App\Models\Research;
use Illuminate\Database\Seeder;

class ResearchesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Research::truncate();
        $faker = \Faker\Factory::create();
        $feature = 'hola';
        // Crear artículos ficticios en la tabla

        $entries = Entry::all();
        foreach ($entries as $entry){
            Research::create([
                'feature' => $feature,
                'quantity' => $faker->numberBetween(1,1000),
                'valueone' => $faker -> numberBetween(1,5),
                'valuetwo' => $faker -> numberBetween(1,5),
                'valuethree' => $faker -> numberBetween(1,5),
                'valuefour' => $faker -> numberBetween(1,5),
                'valuefive' => $faker -> numberBetween(1,5),
                'confirmed' => $faker -> boolean,
                'organoleptic' => $faker -> name,
                'entry_id' => $entry->id,
            ]);
        }
    }
}
