<?php namespace Multistarter\Models;

use Illuminate\Database\Eloquent\Model as Model;

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
		return $this->belongsTo('Multistarter\Models\Client', 'client_id', 'id');
	}
public function orders() {
		return $this->hasMany('Multistarter\Models\Order', 'tenant_id', 'id');
	}
public function permissions() {
		return $this->hasMany('Multistarter\Models\Permission', 'tenant_id', 'id');
	}
public function products() {
		return $this->hasMany('Multistarter\Models\Product', 'tenant_id', 'id');
	}
public function roles() {
		return $this->hasMany('Multistarter\Models\Role', 'tenant_id', 'id');
	}
public function users() {
		return $this->hasMany('Multistarter\Models\User', 'tenant_id', 'id');
	}
}
