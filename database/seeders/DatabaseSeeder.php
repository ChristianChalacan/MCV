<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(ChargesTableSeeder::class);
        $this->call(ClientsTableSeeder::class);
        $this->call(DispatchesTableSeeder::class);
        $this->call(EntriesTableSeeder::class);
        $this->call(InvoicedsTableSeeder::class);
        $this->call(KindsTableSeeder::class);
        $this->call(ObservationsTableSeeder::class);
        $this->call(OrdersTableSeeder::class);
        $this->call(PalletsTableSeeder::class);
        $this->call(ProccessesTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(ProvidersTableSeeder::class);
        $this->call(RefundsTableSeeder::class);
        $this->call(ResearchesTableSeeder::class);
        $this->call(ShippingsTableSeeder::class);
        $this->call(WastesTableSeeder::class);
    }
}
