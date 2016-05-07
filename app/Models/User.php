<?php namespace Multistarter\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Multistarter\Models\User
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
 * @property-read \Multistarter\Models\Client $client
 * @property-read \Multistarter\Models\Tenant $tenant
 * @property-read \Illuminate\Database\Eloquent\Collection|\Multistarter\Models\Order[] $orders
 * @property-read \Illuminate\Database\Eloquent\Collection|\Multistarter\Models\Permission[] $permissions
 * @property-read \Illuminate\Database\Eloquent\Collection|\Multistarter\Models\Role[] $roles
 * @method static \Illuminate\Database\Query\Builder|\Multistarter\Models\User whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Multistarter\Models\User whereClientId($value)
 * @method static \Illuminate\Database\Query\Builder|\Multistarter\Models\User whereTenantId($value)
 * @method static \Illuminate\Database\Query\Builder|\Multistarter\Models\User whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\Multistarter\Models\User whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\Multistarter\Models\User wherePassword($value)
 * @method static \Illuminate\Database\Query\Builder|\Multistarter\Models\User whereRememberToken($value)
 * @method static \Illuminate\Database\Query\Builder|\Multistarter\Models\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Multistarter\Models\User whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property integer $created_by
 * @property integer $updated_by
 * @property string $deleted_at
 * @property integer $deleted_by
 * @property-read \Multistarter\Models\User $createdBy
 * @property-read \Multistarter\Models\User $updatedBy
 * @property-read \Multistarter\Models\User $deletedBy
 * @method static \Illuminate\Database\Query\Builder|\Multistarter\Models\User whereCreatedBy($value)
 * @method static \Illuminate\Database\Query\Builder|\Multistarter\Models\User whereUpdatedBy($value)
 * @method static \Illuminate\Database\Query\Builder|\Multistarter\Models\User whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Multistarter\Models\User whereDeletedBy($value)
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
    public $fillable = [
        'client_id',
		'tenant_id',
		'email',
		'password'
    ];

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
    public function client() {
		return $this->belongsTo('Multistarter\Models\Client', 'client_id', 'id');
	}
	public function tenant() {
		return $this->belongsTo('Multistarter\Models\Tenant', 'tenant_id', 'id');
	}
	public function orders()
	{
		return $this->hasMany('Multistarter\Models\Order', 'user_id', 'id');
	}
	public function permissions() {
		return $this->belongsToMany('Multistarter\Models\Permission', 'permission_user', 'user_id', 'permission_id');
	}
	public function roles() {
		return $this->belongsToMany('Multistarter\Models\Role', 'role_user', 'user_id', 'role_id');
	}
}
