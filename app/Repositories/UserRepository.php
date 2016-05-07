<?php namespace Multistarter\Repositories;

use Multistarter\Models\User;
use Multistarter\Repositories\Repository;

class UserRepository extends Repository
{

    /**
    * Configure the Model
    *
    **/
    public function model()
    {
        return User::class;
    }
}
