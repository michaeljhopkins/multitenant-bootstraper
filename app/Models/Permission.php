<?php namespace Multistarter\Models;

 as Model;

/**
 * Multistarter\Models\Permission
 *
 * @property integer $id
 * @property integer $client_id
 * @property integer $tenant_id
 * @property string $name
 * @property string $slug
 * @property-read \Multistarter\Models\Client $client
 * @property-read \Multistarter\Models\Tenant $tenant
 * @property-read \Illuminate\Database\Eloquent\Collection|\Multistarter\Models\Role[] $roles
 * @property-read \Illuminate\Database\Eloquent\Collection|\Multistarter\Models\User[] $users
 * @method static \Illuminate\Database\Query\Builder|\Multistarter\Models\Permission whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Multistarter\Models\Permission whereClientId($value)
 * @method static \Illuminate\Database\Query\Builder|\Multistarter\Models\Permission whereTenantId($value)
 * @method static \Illuminate\Database\Query\Builder|\Multistarter\Models\Permission whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\Multistarter\Models\Permission whereSlug($value)
 * @mixin \Eloquent
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 * @property string $deleted_at
 * @property integer $deleted_by
 * @method static \Illuminate\Database\Query\Builder|\Multistarter\Models\Permission whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Multistarter\Models\Permission whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Multistarter\Models\Permission whereCreatedBy($value)
 * @method static \Illuminate\Database\Query\Builder|\Multistarter\Models\Permission whereUpdatedBy($value)
 * @method static \Illuminate\Database\Query\Builder|\Multistarter\Models\Permission whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Multistarter\Models\Permission whereDeletedBy($value)
 * @property-read \Multistarter\Models\User $createdBy
 * @property-read \Multistarter\Models\User $updatedBy
 * @property-read \Multistarter\Models\User $deletedBy
 */
class Permission extends BaseModel
{
    
    /**
     * The database table used by the model.
     *
     * @var string
     */
    public $table = "permissions";
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [
        'client_id',
		'tenant_id',
		'name',
		'slug'
    ];

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
    
	public function roles() {
		return $this->belongsToMany('Multistarter\Models\Role', 'permission_role', 'permission_id', 'role_id');
	}
	
	public function users() {
		return $this->belongsToMany('Multistarter\Models\User', 'permission_user', 'permission_id', 'user_id');
	}
}