<?php namespace Multi\Repositories;

use Multi\Models\User;
use Multi\Repositories\Repository;

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
