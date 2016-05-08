<?php

namespace Multi\Http\Middleware;

use Closure;

class MultiTenantScope
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $clientId = 1;
        $tenantId = 1;
        \Landlord::addTenant('client_id',$clientId);
        \Landlord::addTenant('tenant_id',$tenantId);
        return $next($request);
    }
}
