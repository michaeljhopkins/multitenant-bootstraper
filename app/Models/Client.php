<?php namespace Multistarter\Models;
use Illuminate\Database\Eloquent\Model;

/**
 * Multistarter\Models\Client
 *
 * @property integer $id
 * @property string $name
 * @property-read \Illuminate\Database\Eloquent\Collection|\Multistarter\Models\Order[] $orders
 * @property-read \Illuminate\Database\Eloquent\Collection|\Multistarter\Models\Permission[] $permissions
 * @property-read \Illuminate\Database\Eloquent\Collection|\Multistarter\Models\Product[] $products
 * @property-read \Illuminate\Database\Eloquent\Collection|\Multistarter\Models\Role[] $roles
 * @property-read \Illuminate\Database\Eloquent\Collection|\Multistarter\Models\Tenant[] $tenants
 * @property-read \Illuminate\Database\Eloquent\Collection|\Multistarter\Models\User[] $users
 * @method static \Illuminate\Database\Query\Builder|\Multistarter\Models\Client whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Multistarter\Models\Client whereName($value)
 * @mixin \Eloquent
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 * @property string $deleted_at
 * @property integer $deleted_by
 * @method static \Illuminate\Database\Query\Builder|\Multistarter\Models\Client whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Multistarter\Models\Client whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Multistarter\Models\Client whereCreatedBy($value)
 * @method static \Illuminate\Database\Query\Builder|\Multistarter\Models\Client whereUpdatedBy($value)
 * @method static \Illuminate\Database\Query\Builder|\Multistarter\Models\Client whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Multistarter\Models\Client whereDeletedBy($value)
 */
class Client extends Model
{
    
    /**
     * The database table used by the model.
     *
     * @var string
     */
    public $table = "clients";
    
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
        'name' => 'string'
    ];

    /**
     * The rules that is used to validate.
     *
     * @var array
     */
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
