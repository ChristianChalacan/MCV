<?php

namespace Database\Seeders;

use App\Models\Kind;
use Illuminate\Database\Seeder;

class KindsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kind::truncate();
        $faker = \Faker\Factory::create();
        // Crear artículos ficticios en la tabla
        for ($i = 0; $i < 50; $i++) {
            Kind::create([
                'name' => $faker->name,
            ]);
        }
    }
}
