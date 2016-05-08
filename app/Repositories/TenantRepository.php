<?php namespace Multi\Repositories;

use Multi\Models\Tenant;
use Multi\Repositories\Repository;

class TenantRepository extends Repository
{

    /**
    * Configure the Model
    *
    **/
    public function model()
    {
        return Tenant::class;
    }
}
