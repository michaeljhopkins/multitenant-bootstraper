<?php namespace Multistarter\Repositories;

use Multistarter\Models\Tenant;
use Multistarter\Repositories\Repository;

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
