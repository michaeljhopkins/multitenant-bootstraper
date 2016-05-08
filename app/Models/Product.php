<?php namespace Multi\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Multi\Packages\MultiTenant\Traits\TenantScopedModelTrait;

/**
 * Multi\Models\Product
 *
 * @property integer $id
 * @property integer $client_id
 * @property integer $tenant_id
 * @property string $name
 * @property float $price
 * @property integer $recurring
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 * @property string $deleted_at
 * @property integer $deleted_by
 * @property-read \Illuminate\Database\Eloquent\Collection|\Multi\Models\Order[] $orders
 * @property-read \Multi\Models\User $deletedBy
 * @property-read \Multi\Models\Client $client
 * @property-read \Multi\Models\Tenant $tenant
 * @method static \Illuminate\Database\Query\Builder|\Multi\Models\Product whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Multi\Models\Product whereClientId($value)
 * @method static \Illuminate\Database\Query\Builder|\Multi\Models\Product whereTenantId($value)
 * @method static \Illuminate\Database\Query\Builder|\Multi\Models\Product whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\Multi\Models\Product wherePrice($value)
 * @method static \Illuminate\Database\Query\Builder|\Multi\Models\Product whereRecurring($value)
 * @method static \Illuminate\Database\Query\Builder|\Multi\Models\Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Multi\Models\Product whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Multi\Models\Product whereCreatedBy($value)
 * @method static \Illuminate\Database\Query\Builder|\Multi\Models\Product whereUpdatedBy($value)
 * @method static \Illuminate\Database\Query\Builder|\Multi\Models\Product whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Multi\Models\Product whereDeletedBy($value)
 * @mixin \Eloquent
 * @property-read \Multi\Models\User $createdBy
 * @property-read \Multi\Models\User $updatedBy
 */
class Product extends BaseModel
{
	use SoftDeletes, TenantScopedModelTrait;
	
    protected $casts = [
        'client_id' => 'integer',
		'tenant_id' => 'integer',
		'name' => 'string',
		'recurring' => 'integer'
    ];
	
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
