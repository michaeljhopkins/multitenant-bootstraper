<?php namespace Multistarter\Models;

/**
 * Multistarter\Models\Role
 *
 * @property integer $id
 * @property integer $client_id
 * @property integer $tenant_id
 * @property string $name
 * @property string $slug
 * @property-read \Multistarter\Models\Client $client
 * @property-read \Multistarter\Models\Tenant $tenant
 * @property-read \Illuminate\Database\Eloquent\Collection|\Multistarter\Models\Permission[] $permissions
 * @property-read \Illuminate\Database\Eloquent\Collection|\Multistarter\Models\User[] $users
 * @method static \Illuminate\Database\Query\Builder|\Multistarter\Models\Role whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Multistarter\Models\Role whereClientId($value)
 * @method static \Illuminate\Database\Query\Builder|\Multistarter\Models\Role whereTenantId($value)
 * @method static \Illuminate\Database\Query\Builder|\Multistarter\Models\Role whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\Multistarter\Models\Role whereSlug($value)
 * @mixin \Eloquent
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 * @property string $deleted_at
 * @property integer $deleted_by
 * @property-read \Multistarter\Models\User $createdBy
 * @property-read \Multistarter\Models\User $updatedBy
 * @property-read \Multistarter\Models\User $deletedBy
 * @method static \Illuminate\Database\Query\Builder|\Multistarter\Models\Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Multistarter\Models\Role whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Multistarter\Models\Role whereCreatedBy($value)
 * @method static \Illuminate\Database\Query\Builder|\Multistarter\Models\Role whereUpdatedBy($value)
 * @method static \Illuminate\Database\Query\Builder|\Multistarter\Models\Role whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Multistarter\Models\Role whereDeletedBy($value)
 */
class Role extends BaseModel
{
    
    /**
     * The database table used by the model.
     *
     * @var string
     */
    public $table = "roles";
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'client_id' => 'integer',
		'tenant_id' => 'integer',
		'name' => 'string',
		'slug' => 'string'
    ];

    /**
     * The rules that is used to validate.
     *
     * @var array
     */
    public static $rules = [
        'client_id' => 'required|integer|exists:clients,id',
		'tenant_id' => 'required|integer|exists:tenants,id',
		'name' => 'required|string',
		'slug' => 'required|string'
    ];
	
	public function permissions() {
		return $this->belongsToMany(Permission::class, 'permission_role', 'role_id', 'permission_id');
	}
	
	public function users() {
		return $this->belongsToMany(User::class, 'role_user', 'role_id', 'user_id');
	}
}
