<?php namespace Multistarter\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Multistarter\Models\Product
 *
 * @property integer $id
 * @property integer $client_id
 * @property integer $tenant_id
 * @property string $name
 * @property float $price
 * @property integer $recurring
 * @property-read \Multistarter\Models\Client $client
 * @property-read \Multistarter\Models\Tenant $tenant
 * @property-read \Illuminate\Database\Eloquent\Collection|\Multistarter\Models\Order[] $orders
 * @method static \Illuminate\Database\Query\Builder|\Multistarter\Models\Product whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Multistarter\Models\Product whereClientId($value)
 * @method static \Illuminate\Database\Query\Builder|\Multistarter\Models\Product whereTenantId($value)
 * @method static \Illuminate\Database\Query\Builder|\Multistarter\Models\Product whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\Multistarter\Models\Product wherePrice($value)
 * @method static \Illuminate\Database\Query\Builder|\Multistarter\Models\Product whereRecurring($value)
 * @mixin \Eloquent
 */
class Product extends Model
{
    
    /**
     * The database table used by the model.
     *
     * @var string
     */
    public $table = "products";
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [
        'client_id',
		'tenant_id',
		'name',
		'price',
		'recurring'
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
		'recurring' => 'integer'
    ];

    /**
     * The rules that is used to validate.
     *
     * @var array
     */
    public static $rules = [
        'client_id' => 'required|integer|exists:clients,id',
		'tenant_id' => 'required|integer|exists:tenants,id',
		'name' => 'string',
		'recurring' => 'integer'
    ];
    public function client() {
		return $this->belongsTo('Multistarter\Models\Client', 'client_id', 'id');
	}
public function tenant() {
		return $this->belongsTo('Multistarter\Models\Tenant', 'tenant_id', 'id');
	}
public function orders() {
		return $this->belongsToMany('Multistarter\Models\Order', 'line_items', 'product_id', 'order_id');
	}
}
