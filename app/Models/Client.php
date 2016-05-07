<?php namespace Multistarter\Models;

use Illuminate\Database\Eloquent\Model as Model;

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
    public $fillable = [
        'name'
    ];

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
		return $this->hasMany('Multistarter\Models\Order', 'client_id', 'id');
	}
	public function permissions() {
		return $this->hasMany('Multistarter\Models\Permission', 'client_id', 'id');
	}
	public function products() {
		return $this->hasMany('Multistarter\Models\Product', 'client_id', 'id');
	}
	public function roles() {
		return $this->hasMany('Multistarter\Models\Role', 'client_id', 'id');
	}
	public function tenants() {
		return $this->hasMany('Multistarter\Models\Tenant', 'client_id', 'id');
	}
	public function users() {
		return $this->hasMany('Multistarter\Models\User', 'client_id', 'id');
	}
}
