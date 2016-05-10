<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call('ClientsTableSeeder');
        $this->call('TenantsTableSeeder');
        $this->call('ProductsTableSeeder');
        $this->call('UsersTableSeeder');
    }
}
