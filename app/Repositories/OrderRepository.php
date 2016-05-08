<?php namespace Multi\Repositories;

use Multi\Models\Order;
use Multi\Repositories\Repository;

class OrderRepository extends Repository
{

    /**
    * Configure the Model
    *
    **/
    public function model()
    {
        return Order::class;
    }
}
