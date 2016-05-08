<?php namespace Multi\Services;

use Multi\Repositories\RoleRepository;

class RoleService
{
	/**
	 * Repository variable
	 *
	 * @var RoleRepository
	 */
    private $roleRepository;

    public function __construct(RoleRepository $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    /**
     * call the function of repository
     */
    public function __call($method, $args)
    {
        return call_user_func_array([$this->roleRepository, $method], $args);
    }
}
