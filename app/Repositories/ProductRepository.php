<?php namespace Multistarter\Repositories;

use Multistarter\Models\Product;
use Multistarter\Repositories\Repository;

class ProductRepository extends Repository
{

    /**
    * Configure the Model
    *
    **/
    public function model()
    {
        return Product::class;
    }
}
