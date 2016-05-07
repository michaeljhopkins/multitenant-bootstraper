<?php namespace Multistarter\Services;

use Multistarter\Repositories\PermissionRepository;

class PermissionService
{
	/**
	 * Repository variable
	 *
	 * @var PermissionRepository
	 */
    private $permissionRepository;

    public function __construct(PermissionRepository $permissionRepository)
    {
        $this->permissionRepository = $permissionRepository;
    }

    /**
     * call the function of repository
     */
    public function __call($method, $args)
    {
        return call_user_func_array([$this->permissionRepository, $method], $args);
    }
}
