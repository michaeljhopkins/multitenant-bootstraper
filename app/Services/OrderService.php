<?php namespace Multistarter\Services;

use Multistarter\Repositories\OrderRepository;

class OrderService
{
	/**
	 * Repository variable
	 *
	 * @var OrderRepository
	 */
    private $orderRepository;

    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    /**
     * call the function of repository
     */
    public function __call($method, $args)
    {
        return call_user_func_array([$this->orderRepository, $method], $args);
    }
}
