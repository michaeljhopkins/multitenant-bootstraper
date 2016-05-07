<?php

namespace Multistarter\Providers;

use Illuminate\Support\ServiceProvider;
use Landlord;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

        #Landlord::addTenant($tenantColumn, $tenantId);
    }
}
