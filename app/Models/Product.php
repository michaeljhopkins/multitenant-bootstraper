<?php namespace Multistarter\Models;

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
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 * @property string $deleted_at
 * @property integer $deleted_by
 * @method static \Illuminate\Database\Query\Builder|\Multistarter\Models\Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Multistarter\Models\Product whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Multistarter\Models\Product whereCreatedBy($value)
 * @method static \Illuminate\Database\Query\Builder|\Multistarter\Models\Product whereUpdatedBy($value)
 * @method static \Illuminate\Database\Query\Builder|\Multistarter\Models\Product whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Multistarter\Models\Product whereDeletedBy($value)
 * @property-read \Multistarter\Models\User $createdBy
 * @property-read \Multistarter\Models\User $updatedBy
 * @property-read \Multistarter\Models\User $deletedBy
 */
class Product extends BaseModel
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
	
	public function orders() {
		return $this->belongsToMany(Order::class, 'line_items', 'product_id', 'order_id');
	}
}
