<?php namespace Multi\Services;

use Multi\Repositories\ProductRepository;

class ProductService
{
	/**
	 * Repository variable
	 *
	 * @var ProductRepository
	 */
    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * call the function of repository
     */
    public function __call($method, $args)
    {
        return call_user_func_array([$this->productRepository, $method], $args);
    }
}
