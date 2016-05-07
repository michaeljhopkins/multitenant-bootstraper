<?php

use Faker\Factory;
use Illuminate\Database\Seeder;
use Multistarter\Models\Client;
use Multistarter\Models\Product;
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
        $faker = Factory::create();
        foreach(range(1,2) as $index){
            $client = Client::create(['name' => $faker->company]);
            foreach(range(1,5) as $index){
                $tenant = Tenant::create(['client_id' => $client->id,'name' => $faker->name,'url' => $faker->url]);
                foreach(range(1,10) as $index){
                    User::create(['email' => $faker->email,'password' => \Hash::make('password'),'client_id' => $client->id, 'tenant_id' => $tenant->id]);
                }
                foreach(range(1,10) as $index){
                    Product::create(['name' => $faker->sentence,'price' => $faker->randomFloat(2,0,100),'client_id' => $client->id,'tenant_id' => $tenant->id]);
                }
            }
        }
    }
        /*
        factory(Client::class,10)->create()->each(function(Client $c){
            $c->tenants()->save(factory(Tenant::class)->make());
        });

        $clients = Client::with(['tenants'])->get();
        
        foreach($clients as $client){
            foreach($client->tenants as $tenant){
                $t = $tenant;
                foreach (range(1, 50) as $index) {
                    $t->users()->save(factory(User::class)->make());
                }
            }
        }
    }*/
}
