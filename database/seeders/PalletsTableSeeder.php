<?php

namespace Database\Seeders;

use App\Models\Entry;
use App\Models\Pallet;
use Illuminate\Database\Seeder;

class PalletsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pallet::truncate();
        $faker = \Faker\Factory::create();
        // Crear artículos ficticios en la tabla
        $entries = Entry::all();
        foreach ($entries as $entry){
            for ($i = 0; $i < 5; $i++) {
                Pallet::create([
                    'gross_weight' => $faker->numberBetween('10','1000'),
                    'pallet_weight' => $faker->numberBetween('10','1000'),
                    'unit' => $faker->numberBetween('10','1000'),
                    'gaveta_weight' => $faker->numberBetween('10','1000'),
                    'net_weight' => $faker->numberBetween('10','1000'),
                    'entry_id' => $entry->id,
                ]);
            }
        }

    }
}
