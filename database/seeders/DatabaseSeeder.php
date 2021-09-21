<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        $this->call(UsersTableSeeder::class);
        $this->call(ClientsTableSeeder::class);
        $this->call(ProvidersTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(KindsTableSeeder::class);
        $this->call(ChargesTableSeeder::class);
        $this->call(EntriesTableSeeder::class);
        $this->call(ShippingsTableSeeder::class);
        $this->call(OrdersTableSeeder::class);
        $this->call(ProccessesTableSeeder::class);
        $this->call(InvoicedsTableSeeder::class);
        $this->call(ObservationsTableSeeder::class);
        $this->call(PalletsTableSeeder::class);
        $this->call(DispatchesTableSeeder::class);
        $this->call(RefundsTableSeeder::class);
        $this->call(ResearchesTableSeeder::class);
        $this->call(WastesTableSeeder::class);
        Schema::enableForeignKeyConstraints();
    }
}
