<?php

namespace Multi\Packages\MultiTenant;

use Multi\Packages\MultiTenant\Exceptions\TenantColumnUnknownException;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ScopeInterface;

class TenantScope implements ScopeInterface
{
    private $enabled = true;

    /** @var \Illuminate\Database\Eloquent\Model */
    private $model;

    /** @var array The tenant scopes currently set */
    protected $tenants = [];

    /**
     * return tenants.
     *
     * @return array
     */
    public function getTenants()
    {
        return $this->tenants;
    }

    /**
     * Add $tenantColumn => $tenantId to the current tenants array.
     *
     * @param string $tenantColumn
     * @param mixed  $tenantId
     *
     * @return void
     */
    public function addTenant($tenantColumn, $tenantId)
    {
        $this->enable();

        $this->tenants[$tenantColumn] = $tenantId;
    }

    /**
     * Remove $tenantColumn => $id from the current tenants array.
     *
     * @param string $tenantColumn
     *
     * @return boolean
     */
    public function removeTenant($tenantColumn)
    {
        if ($this->hasTenant($tenantColumn)) {
            unset($this->tenants[$tenantColumn]);

            return true;
        } else {
            return false;
        }
    }

    /**
     * Test whether current tenants include a given tenant.
     *
     * @param string $tenantColumn
     *
     * @return boolean
     */
    public function hasTenant($tenantColumn)
    {
        return isset($this->tenants[$tenantColumn]);
    }

    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param Builder|\Illuminate\Database\Query\Builder $builder
     * @param Model|\Illuminate\Database\Query\Model     $model
     *
     * @return void
     */
    public function apply(Builder $builder, Model $model)
    {
        if (! $this->enabled) {
            return;
        }

        // Use whereRaw instead of where to avoid issues with bindings when removing
        foreach ($this->getModelTenants($model) as $tenantColumn => $tenantId) {
            $builder->whereRaw($model->getTenantWhereClause($tenantColumn, $tenantId));
        }
    }

    /**
     * Remove the scope from the given Eloquent query builder.
     *
     * @param Builder|\Illuminate\Database\Query\Builder $builder
     * @param Model|\Illuminate\Database\Query\Model     $model
     *
     * @return void
     */
    public function remove(Builder $builder, Model $model)
    {
        $query = $builder->getQuery();

        foreach ($this->getModelTenants($model) as $tenantColumn => $tenantId) {
            foreach ((array)$query->wheres as $key => $where) {
                // If the where clause is a tenant constraint, we will remove it from the query
                // and reset the keys on the wheres. This allows this developer to include
                // the tenant model in a relationship result set that is lazy loaded.
                if ($this->isTenantConstraint($model, $where, $tenantColumn, $tenantId)) {
                    unset($query->wheres[$key]);

                    $query->wheres = array_values($query->wheres);

                    // Just bail after this first one in case the user has manually specified
                    // the same where clause for some weird reason or by some nutso coincidence.
                    break;
                }
            }
        }
    }

    public function creating(Model $model)
    {
        // If the model has had the global scope removed, bail
        if (! $model->hasGlobalScope($this)) {
            return;
        }

        // Otherwise, scope the new model
        foreach ($this->getModelTenants($model) as $tenantColumn => $tenantId) {
            $model->{$tenantColumn} = $tenantId;
        }
    }

    /**
     * Return which tenantColumn => tenantId are really in use for this model.
     *
     * @param Model $model
     *
     * @throws TenantColumnUnknownException
     *
     * @return array
     */
    public function getModelTenants(Model $model)
    {
        $modelTenantColumns = (array)$model->getTenantColumns();
        $modelTenants       = [];

        foreach ($modelTenantColumns as $tenantColumn) {
            if ($this->hasTenant($tenantColumn)) {
                $modelTenants[$tenantColumn] = $this->getTenantId($tenantColumn);
            }
        }

        return $modelTenants;
    }

    /**
     * @param $tenantColumn
     *
     * @throws TenantColumnUnknownException
     *
     * @return mixed The id of the tenant
     */
    public function getTenantId($tenantColumn)
    {
        if (! $this->hasTenant($tenantColumn)) {
            throw new TenantColumnUnknownException(
                get_class($this->model) . ': tenant column "' . $tenantColumn . '" NOT found in tenants scope "' . json_encode($this->tenants) . '"'
            );
        }

        return $this->tenants[$tenantColumn];
    }

    /**
     * Determine if the given where clause is a tenant constraint.
     *
     * @param \Illuminate\Database\Eloquent\Model $model
     * @param array                               $where
     * @param string                              $tenantColumn
     * @param mixed                               $tenantId
     *
     * @return bool
     */
    public function isTenantConstraint($model, array $where, $tenantColumn, $tenantId)
    {
        return $where['type'] == 'raw' && $where['sql'] == $model->getTenantWhereClause($tenantColumn, $tenantId);
    }

    public function disable()
    {
        $this->enabled = false;
    }

    public function enable()
    {
        $this->enabled = true;
    }
}
