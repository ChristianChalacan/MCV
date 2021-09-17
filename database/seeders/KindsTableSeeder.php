<?php

namespace Database\Seeders;

use App\Models\Kind;
use App\Models\Product;
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

        $products = Product::all();
        foreach ($products as $product){
            for ($i = 0; $i < 5; $i++){
                Kind::create([
                    'name' => $faker->name,
                    'product_id' => $product->id,
                ]);
            }
        }
    }
}
