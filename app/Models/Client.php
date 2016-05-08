<?php namespace Multi\Models;

use Illuminate\Database\Eloquent\Model;
use Multi\Packages\Acl\Models\Permission;
use Multi\Packages\Acl\Models\Role;

/**
 * Multi\Models\Client
 *
 * @property integer $id
 * @property string $name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 * @property string $deleted_at
 * @property integer $deleted_by
 * @property-read \Illuminate\Database\Eloquent\Collection|\Multi\Models\Order[] $orders
 * @property-read \Illuminate\Database\Eloquent\Collection|\Multi\Models\Permission[] $permissions
 * @property-read \Illuminate\Database\Eloquent\Collection|\Multi\Models\Product[] $products
 * @property-read \Illuminate\Database\Eloquent\Collection|\Multi\Models\Role[] $roles
 * @property-read \Illuminate\Database\Eloquent\Collection|\Multi\Models\Tenant[] $tenants
 * @property-read \Illuminate\Database\Eloquent\Collection|\Multi\Models\User[] $users
 * @method static \Illuminate\Database\Query\Builder|\Multi\Models\Client whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Multi\Models\Client whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\Multi\Models\Client whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Multi\Models\Client whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Multi\Models\Client whereCreatedBy($value)
 * @method static \Illuminate\Database\Query\Builder|\Multi\Models\Client whereUpdatedBy($value)
 * @method static \Illuminate\Database\Query\Builder|\Multi\Models\Client whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Multi\Models\Client whereDeletedBy($value)
 * @mixin \Eloquent
 */
class Client extends Model
{
	
	protected $guarded = ['id'];
    
    public $table = "clients";
    
    protected $casts = [
        'name' => 'string'
    ];

    public static $rules = [
        'name' => 'required|string'
    ];
	
    public function orders() {
		return $this->hasMany(Order::class);
	}
	
	public function permissions() {
		return $this->hasMany(Permission::class);
	}
	
	public function products() {
		return $this->hasMany(Product::class);
	}
	
	public function roles() {
		return $this->hasMany(Role::class);
	}
	
	public function tenants() {
		return $this->hasMany(Tenant::class);
	}
	
	public function users() {
		return $this->hasMany(User::class);
	}
}
