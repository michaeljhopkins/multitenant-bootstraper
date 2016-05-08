<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('products')->delete();
        
        \DB::table('products')->insert(array (
            0 => 
            array (
                'id' => 2,
                'client_id' => 1,
                'tenant_id' => 1,
                'name' => 'static product #1',
                'price' => '10',
                'recurring' => NULL,
                'created_at' => '2016-05-08 03:51:23',
                'updated_at' => '2016-05-08 03:51:23',
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
            ),
            1 => 
            array (
                'id' => 3,
                'client_id' => 1,
                'tenant_id' => 1,
                'name' => 'static product #2',
                'price' => '20',
                'recurring' => 30,
                'created_at' => '2016-05-08 03:51:45',
                'updated_at' => '2016-05-08 03:51:45',
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
            ),
            2 => 
            array (
                'id' => 4,
                'client_id' => 1,
                'tenant_id' => 1,
                'name' => 'static product #3',
                'price' => '240',
                'recurring' => 365,
                'created_at' => '2016-05-08 03:52:02',
                'updated_at' => '2016-05-08 03:52:02',
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
            ),
        ));
        
        
    }
}
