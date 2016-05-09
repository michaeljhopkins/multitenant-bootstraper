<?php

namespace Multi\Providers;

use Illuminate\Support\ServiceProvider;
use Multi\Models\Client;
use Multi\Models\Tenant;
use TenantScope;

class MultiTenantSerivceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        if(!\App::runningInConsole()) {
            $tenant = Tenant::with(['client'])->whereUrl(\Request::getHost())->first();
            TenantScope::addTenant('tenant_id', $tenant->id);
            TenantScope::addTenant('client_id', $tenant->client_id);
            view()->share('tenant',$tenant);
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
    }
}
