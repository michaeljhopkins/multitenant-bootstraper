<?php namespace Multistarter\Repositories;

use Multistarter\Models\Permission;
use Multistarter\Repositories\Repository;

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
