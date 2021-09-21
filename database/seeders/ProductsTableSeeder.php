<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Provider;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::truncate();
        $faker = \Faker\Factory::create();
        // Crear artículos ficticios en la tabla
        for ($i = 0; $i < 2; $i++) {
            $product = Product::create([
                'name' => $faker->name,
            ]);

            $product->providers()->saveMany(
                $faker->randomElements(
                    array(
                        Provider::find(1),
                        Provider::find(2)
                    ), $faker->numberBetween(1, 2), false
                )
            );
        }
    }
}
