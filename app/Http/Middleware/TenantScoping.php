<?php

namespace Multi\Http\Middleware;

use Cache;
use Closure;
use Multi\Models\Tenant;
use Request;
use TenantScope;

class TenantScoping
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        \Log::info('start');
        $tenant = (Cache::has('domain_'. Request::getHost())) ? Cache::get('domain_'. Request::getHost()) : Tenant::getCurrent();
        TenantScope::addTenant('tenant_id', $tenant->id);
        TenantScope::addTenant('client_id',$tenant->id);
        \Log::info($tenant->toJson());
        return $next($request);
    }
}
