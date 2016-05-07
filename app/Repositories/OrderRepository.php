<?php namespace Multistarter\Repositories;

use Multistarter\Models\Order;
use Multistarter\Repositories\Repository;

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
