<?php namespace Multistarter\Repositories;

use Multistarter\Models\Client;
use Multistarter\Repositories\Repository;

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
