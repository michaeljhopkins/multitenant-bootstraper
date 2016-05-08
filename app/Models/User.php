<?php namespace Multi\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Multi\Packages\Acl\Traits\HasRoles;
use Multi\Packages\Acl\Traits\HasRolesContract;
use Multi\Packages\MultiTenant\Traits\TenantScopedModelTrait;
/* Authentication and Authorization */
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

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
 * @property integer $created_by
 * @property integer $updated_by
 * @property string $deleted_at
 * @property integer $deleted_by
 * @property-read \Illuminate\Database\Eloquent\Collection|\Multi\Models\Order[] $orders
 * @property-read \Illuminate\Database\Eloquent\Collection|\Multi\Models\Permission[] $permissions
 * @property-read \Illuminate\Database\Eloquent\Collection|\Multi\Models\Role[] $roles
 * @property-read \Multi\Models\User $deletedBy
 * @property-read \Multi\Models\Client $client
 * @property-read \Multi\Models\Tenant $tenant
 * @method static \Illuminate\Database\Query\Builder|\Multi\Models\User whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Multi\Models\User whereClientId($value)
 * @method static \Illuminate\Database\Query\Builder|\Multi\Models\User whereTenantId($value)
 * @method static \Illuminate\Database\Query\Builder|\Multi\Models\User whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\Multi\Models\User whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\Multi\Models\User wherePassword($value)
 * @method static \Illuminate\Database\Query\Builder|\Multi\Models\User whereRememberToken($value)
 * @method static \Illuminate\Database\Query\Builder|\Multi\Models\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Multi\Models\User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Multi\Models\User whereCreatedBy($value)
 * @method static \Illuminate\Database\Query\Builder|\Multi\Models\User whereUpdatedBy($value)
 * @method static \Illuminate\Database\Query\Builder|\Multi\Models\User whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Multi\Models\User whereDeletedBy($value)
 * @mixin \Eloquent
 * @property-read \Multi\Models\User $createdBy
 * @property-read \Multi\Models\User $updatedBy
 */
class User extends BaseModel implements AuthenticatableContract, AuthorizableContract, HasRolesContract
{
    use Authenticatable, CanResetPassword, TenantScopedModelTrait, Authorizable, HasRoles, SoftDeletes;
    public function __construct(array $attributes = []){
        parent::__construct($attributes);
        $addToHidden = ['password','stripe_plan','stripe_subscription','stripe_id','two_factor_options','confirmation_code'];
        $this->hidden = array_merge($this->hidden,$addToHidden);
    }
    protected $casts = [
        'client_id' => 'integer',
		'tenant_id' => 'integer',
		'email' => 'string',
		'password' => 'string'
    ];

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
}
