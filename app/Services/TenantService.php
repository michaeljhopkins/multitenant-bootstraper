<?php namespace Multistarter\Services;

use Multistarter\Repositories\TenantRepository;

class TenantService
{
	/**
	 * Repository variable
	 *
	 * @var TenantRepository
	 */
    private $tenantRepository;

    public function __construct(TenantRepository $tenantRepository)
    {
        $this->tenantRepository = $tenantRepository;
    }

    /**
     * call the function of repository
     */
    public function __call($method, $args)
    {
        return call_user_func_array([$this->tenantRepository, $method], $args);
    }
}
