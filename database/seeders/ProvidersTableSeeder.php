<?php

namespace Database\Seeders;

use App\Models\Provider;
use Illuminate\Database\Seeder;

class ProvidersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Provider::truncate();
        $faker = \Faker\Factory::create();
        // Crear artículos ficticios en la tabla
        for ($i = 0; $i < 2; $i++) {
            Provider::create([
                'name' => $faker->name,
                'address' => $faker->name,
                'phone' => $faker -> numberBetween(100000000,90000000000),
            ]);
        }
    }
}
