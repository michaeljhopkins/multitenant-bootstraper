<?php namespace Multi\Models;
/**
 * Multi\Models\User
 *
 * @property integer $id
 * @property integer $client_id
 * @property integer $tenant_id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Multi\Models\Client $client
 * @property-read \Multi\Models\Tenant $tenant
 * @property-read \Illuminate\Database\Eloquent\Collection|\Multi\Models\Order[] $orders
 * @property-read \Illuminate\Database\Eloquent\Collection|\Multi\Models\Permission[] $permissions
 * @property-read \Illuminate\Database\Eloquent\Collection|\Multi\Models\Role[] $roles
 * @method static \Illuminate\Database\Query\Builder|\Multi\Models\User whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Multi\Models\User whereClientId($value)
 * @method static \Illuminate\Database\Query\Builder|\Multi\Models\User whereTenantId($value)
 * @method static \Illuminate\Database\Query\Builder|\Multi\Models\User whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\Multi\Models\User whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\Multi\Models\User wherePassword($value)
 * @method static \Illuminate\Database\Query\Builder|\Multi\Models\User whereRememberToken($value)
 * @method static \Illuminate\Database\Query\Builder|\Multi\Models\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Multi\Models\User whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property integer $created_by
 * @property integer $updated_by
 * @property string $deleted_at
 * @property integer $deleted_by
 * @property-read \Multi\Models\User $createdBy
 * @property-read \Multi\Models\User $updatedBy
 * @property-read \Multi\Models\User $deletedBy
 * @method static \Illuminate\Database\Query\Builder|\Multi\Models\User whereCreatedBy($value)
 * @method static \Illuminate\Database\Query\Builder|\Multi\Models\User whereUpdatedBy($value)
 * @method static \Illuminate\Database\Query\Builder|\Multi\Models\User whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Multi\Models\User whereDeletedBy($value)
 */
class User extends BaseModel
{
    
    /**
     * The database table used by the model.
     *
     * @var string
     */
    public $table = "users";
    
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
		'email' => 'string',
		'password' => 'string'
    ];

    /**
     * The rules that is used to validate.
     *
     * @var array
     */
    public static $rules = [
        'client_id' => 'required|integer|exists:clients,id',
		'tenant_id' => 'required|integer|exists:tenants,id',
		'email' => 'required|string',
		'password' => 'string'
    ];
	
	public function orders()
	{
		return $this->hasMany(Order::class, 'user_id', 'id');
	}
	
	public function permissions() {
		return $this->belongsToMany(Permission::class, 'permission_user', 'user_id', 'permission_id');
	}
	
	public function roles() {
		return $this->belongsToMany(Role::class, 'role_user', 'user_id', 'role_id');
	}
}
