<?php namespace Multistarter\Models;

 as Model;

/**
 * Multistarter\Models\Tenant
 *
 * @property integer $id
 * @property integer $client_id
 * @property string $name
 * @property string $url
 * @property-read \Multistarter\Models\Client $client
 * @property-read \Illuminate\Database\Eloquent\Collection|\Multistarter\Models\Order[] $orders
 * @property-read \Illuminate\Database\Eloquent\Collection|\Multistarter\Models\Permission[] $permissions
 * @property-read \Illuminate\Database\Eloquent\Collection|\Multistarter\Models\Product[] $products
 * @property-read \Illuminate\Database\Eloquent\Collection|\Multistarter\Models\Role[] $roles
 * @property-read \Illuminate\Database\Eloquent\Collection|\Multistarter\Models\User[] $users
 * @method static \Illuminate\Database\Query\Builder|\Multistarter\Models\Tenant whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Multistarter\Models\Tenant whereClientId($value)
 * @method static \Illuminate\Database\Query\Builder|\Multistarter\Models\Tenant whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\Multistarter\Models\Tenant whereUrl($value)
 * @mixin \Eloquent
 */
class Tenant extends Model
{
    
    /**
     * The database table used by the model.
     *
     * @var string
     */
    public $table = "tenants";
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [
        'client_id',
		'name',
		'url'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'client_id' => 'integer',
		'name' => 'string',
		'url' => 'string'
    ];

    /**
     * The rules that is used to validate.
     *
     * @var array
     */
    public static $rules = [
        'client_id' => 'required|integer|exists:clients,id',
		'name' => 'required|string',
		'url' => 'required|string'
    ];
    
    public function client() {
		return $this->belongsTo(Client::class);
	}
	
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
    
    public function users() {
		return $this->hasMany(User::class);
	}
}
