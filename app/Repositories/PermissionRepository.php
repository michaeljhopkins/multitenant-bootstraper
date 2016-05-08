<?php namespace Multi\Repositories;

use Multi\Models\Permission;
use Multi\Repositories\Repository;

class PermissionRepository extends Repository
{

    /**
    * Configure the Model
    *
    **/
    public function model()
    {
        return Permission::class;
    }
}
