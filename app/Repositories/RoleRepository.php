<?php namespace Multistarter\Repositories;

use Multistarter\Models\Role;
use Multistarter\Repositories\Repository;

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
