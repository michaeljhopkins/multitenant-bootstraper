<?php

namespace Multi\Packages\Acl\Models;

use Illuminate\Foundation\Auth\User;
use Multi\Models\BaseModel;
use Multi\Packages\Acl\Exceptions\RoleDoesNotExist;
use Multi\Packages\Acl\Traits\HasPermissions;
use Multi\Packages\Acl\Traits\RefreshesPermissionCache;

/**
 * Multi\Packages\Acl\Models\Role
 *
 * @property integer $id
 * @property string $name
 * @property string $display_name
 * @property string $description
 * @property integer $client_id
 * @property integer $domain_id
 * @property integer $created_by
 * @property \Carbon\Carbon $created_at
 * @property integer $updated_by
 * @property \Carbon\Carbon $updated_at
 * @property integer $deleted_by
 * @property string $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Multi\Packages\Acl\Models\Permission[] $permissions
 * @property-read \Illuminate\Database\Eloquent\Collection|\Hello\Users\User[] $users
 * @method static \Illuminate\Database\Query\Builder|\Multi\Packages\Acl\Models\Role whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Multi\Packages\Acl\Models\Role whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\Multi\Packages\Acl\Models\Role whereDisplayName($value)
 * @method static \Illuminate\Database\Query\Builder|\Multi\Packages\Acl\Models\Role whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\Multi\Packages\Acl\Models\Role whereClientId($value)
 * @method static \Illuminate\Database\Query\Builder|\Multi\Packages\Acl\Models\Role whereDomainId($value)
 * @method static \Illuminate\Database\Query\Builder|\Multi\Packages\Acl\Models\Role whereCreatedBy($value)
 * @method static \Illuminate\Database\Query\Builder|\Multi\Packages\Acl\Models\Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Multi\Packages\Acl\Models\Role whereUpdatedBy($value)
 * @method static \Illuminate\Database\Query\Builder|\Multi\Packages\Acl\Models\Role whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Multi\Packages\Acl\Models\Role whereDeletedBy($value)
 * @method static \Illuminate\Database\Query\Builder|\Multi\Packages\Acl\Models\Role whereDeletedAt($value)
 * @mixin \Eloquent
 * @property integer $tenant_id
 * @property string $slug
 * @property-read \Multi\Models\User $createdBy
 * @property-read \Multi\Models\User $updatedBy
 * @property-read \Multi\Models\User $deletedBy
 * @property-read \Multi\Models\Client $client
 * @property-read \Multi\Models\Tenant $tenant
 * @method static \Illuminate\Database\Query\Builder|\Multi\Packages\Acl\Models\Role whereTenantId($value)
 * @method static \Illuminate\Database\Query\Builder|\Multi\Packages\Acl\Models\Role whereSlug($value)
 */
class Role extends BaseModel
{
    use HasPermissions;
    use RefreshesPermissionCache;

    public $guarded = ['id'];


    /**
     * A role may be given various permissions.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'permission_role');
    }

    /**
     * Find a role by its name.
     *
     * @param string $name
     *
     * @throws RoleDoesNotExist
     */
    public static function findByName($name)
    {
        $role = static::where('name', $name)->first();

        if (!$role) throw new RoleDoesNotExist();

        return $role;
    }

    public static $rules = [
        'name' => 'required|unique:roles,name',
    ];
    public static function rules($id = null)
    {
        $rules = self::$rules;
        if (!is_null($id)) {
            $rules = self::$rules;
            $rules['name'] = $rules['name'] . ',' . $id;
        }

        return $rules;
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'assigned_roles');
    }
}
