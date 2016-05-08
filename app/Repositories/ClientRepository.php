<?php namespace Multi\Repositories;

use Multi\Models\Client;
use Multi\Repositories\Repository;

class ClientRepository extends Repository
{

    /**
    * Configure the Model
    *
    **/
    public function model()
    {
        return Client::class;
    }
}
