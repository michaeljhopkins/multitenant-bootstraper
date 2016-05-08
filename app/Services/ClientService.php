<?php namespace Multi\Services;

use Multi\Repositories\ClientRepository;

class ClientService
{
	/**
	 * Repository variable
	 *
	 * @var ClientRepository
	 */
    private $clientRepository;

    public function __construct(ClientRepository $clientRepository)
    {
        $this->clientRepository = $clientRepository;
    }

    /**
     * call the function of repository
     */
    public function __call($method, $args)
    {
        return call_user_func_array([$this->clientRepository, $method], $args);
    }
}
