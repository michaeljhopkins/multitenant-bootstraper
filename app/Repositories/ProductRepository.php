<?php namespace Multi\Repositories;

use Multi\Models\Product;
use Multi\Repositories\Repository;

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
