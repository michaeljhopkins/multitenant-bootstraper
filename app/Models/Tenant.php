<?php namespace Multi\Models;
use HipsterJazzbo\Landlord\BelongsToTenant;
use Illuminate\Database\Eloquent\Model;

/**
 * Multi\Models\Tenant
 *
 * @property integer $id
 * @property integer $client_id
 * @property string $name
 * @property string $url
 * @property-read \Multi\Models\Client $client
 * @property-read \Illuminate\Database\Eloquent\Collection|\Multi\Models\Order[] $orders
 * @property-read \Illuminate\Database\Eloquent\Collection|\Multi\Models\Permission[] $permissions
 * @property-read \Illuminate\Database\Eloquent\Collection|\Multi\Models\Product[] $products
 * @property-read \Illuminate\Database\Eloquent\Collection|\Multi\Models\Role[] $roles
 * @property-read \Illuminate\Database\Eloquent\Collection|\Multi\Models\User[] $users
 * @method static \Illuminate\Database\Query\Builder|\Multi\Models\Tenant whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Multi\Models\Tenant whereClientId($value)
 * @method static \Illuminate\Database\Query\Builder|\Multi\Models\Tenant whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\Multi\Models\Tenant whereUrl($value)
 * @mixin \Eloquent
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 * @property string $deleted_at
 * @property integer $deleted_by
 * @method static \Illuminate\Database\Query\Builder|\Multi\Models\Tenant whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Multi\Models\Tenant whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Multi\Models\Tenant whereCreatedBy($value)
 * @method static \Illuminate\Database\Query\Builder|\Multi\Models\Tenant whereUpdatedBy($value)
 * @method static \Illuminate\Database\Query\Builder|\Multi\Models\Tenant whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Multi\Models\Tenant whereDeletedBy($value)
 */
class Tenant extends Model
{
	use BelongsToTenant;
	
	protected $guarded = ['id'];


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
