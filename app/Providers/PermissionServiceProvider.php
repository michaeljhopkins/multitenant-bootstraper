<?php

namespace Multi\Providers;

use Illuminate\Support\ServiceProvider;
use Multi\Packages\Acl\PermissionRegistrar;

class PermissionServiceProvider extends ServiceProvider
{/**
 * Bootstrap the application services.
 *
 * @param PermissionRegistrar $permissionLoader
 */
    public function boot(PermissionRegistrar $permissionLoader)
    {
        $permissionLoader->registerPermissions();
    }

    /**
     * Register the application services.
     */
    public function register()
    {
    }
}
