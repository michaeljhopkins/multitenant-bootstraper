<?php

use Illuminate\Database\Seeder;
use Multistarter\Models\Client;
use Multistarter\Models\Tenant;
use Multistarter\Models\User;

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Client::class,10)->create()->each(function(Client $c){
            $c->tenants()->save(factory(Tenant::class)->make());
        });

        $clients = Client::with(['tenants'])->get();
        
        foreach($clients as $client){
            foreach($client->tenants as $tenant){
                /** @var Tenant $t */
                $t = $tenant;
                foreach (range(1,50) as $index){
                    $t->users()->save(factory(User::class)->make());
                }
            }
        }
    }
}
