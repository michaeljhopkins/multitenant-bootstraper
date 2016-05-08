<?php namespace Multi\Repositories;

use Multi\Models\Role;
use Multi\Repositories\Repository;

class RoleRepository extends Repository
{

    /**
    * Configure the Model
    *
    **/
    public function model()
    {
        return Role::class;
    }
}
