<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'client_id' => 1,
                'tenant_id' => 1,
                'name' => '',
                'email' => 'mhopkins321@gmail.com',
                'password' => '$2y$10$Wyiu/JCSAyPQpAh3rXeliuEhjDXlNkA27LjOEIwEKfsY7dsPWbcx6',
                'remember_token' => NULL,
                'created_at' => '2016-05-09 04:24:52',
                'updated_at' => '2016-05-09 04:24:52',
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
            ),
        ));
        
        
    }
}
