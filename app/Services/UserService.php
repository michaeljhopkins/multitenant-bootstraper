<?php namespace Multistarter\Services;

use Multistarter\Repositories\UserRepository;

class UserService
{
	/**
	 * Repository variable
	 *
	 * @var UserRepository
	 */
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * call the function of repository
     */
    public function __call($method, $args)
    {
        return call_user_func_array([$this->userRepository, $method], $args);
    }
}
