<?php

namespace Multi\Providers;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;
use Multi\Packages\MultiTenant\Facades\TenantScopeFacade;
use Multi\Packages\MultiTenant\TenantScope;

class AppServiceProvider extends ServiceProvider
{
    protected $defer = false;

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Register our tenant scope instance
        $this->app->singleton(TenantScope::class, function ($app) {
            return new TenantScope();
        });

        // Define alias 'TenantScope'
        $this->app->booting(function () {
            $loader = AliasLoader::getInstance();
            $loader->alias('TenantScope', TenantScopeFacade::class);
        });
        #Landlord::addTenant($tenantColumn, $tenantId);
    }
    
    public function provides()
    {
        return [];
    }
}
