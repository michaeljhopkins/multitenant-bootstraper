<?php

use Illuminate\Database\Seeder;

class TenantsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('tenants')->delete();
        
        \DB::table('tenants')->insert(array (
            0 => 
            array (
                'id' => 1,
                'client_id' => 1,
                'name' => 'Static Tenant #1',
                'url' => 'multitenant-bootstraper.dev',
                'created_at' => '2016-05-08 03:48:13',
                'updated_at' => '2016-05-08 03:48:13',
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'client_id' => 1,
                'name' => 'Static Tenant #2',
                'url' => 'subdomain.multitenant-bootstraper.dev',
                'created_at' => '2016-05-08 03:48:33',
                'updated_at' => '2016-05-08 03:48:33',
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
            ),
        ));
        
        
    }
}
