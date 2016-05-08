<?php

namespace Multi\Packages\MultiTenant\Facades;

use Illuminate\Support\Facades\Facade;

class TenantScopeFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'Multi\Packages\MultiTenant\TenantScope';
    }
}
