<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Product;
use App\Models\Shipping;
use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Order::truncate();
        $faker = \Faker\Factory::create();
        // Crear artículos ficticios en la tabla

        $shippings = Shipping::all();
        $products = Product::all();
        foreach ($shippings as $shipping){
            foreach ($products as $product){
                Order::create([
                    'quantity' => $faker->numberBetween('10','1000'),
                    'shipping_id' => $shipping->id,
                    'product_id' => $product->id,
                ]);
            }
        }
    }
}
