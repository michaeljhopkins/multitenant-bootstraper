<?php namespace Multi\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Multi\Packages\MultiTenant\Traits\TenantScopedModelTrait;

/**
 * Multi\Models\Order
 *
 * @property integer $id
 * @property integer $client_id
 * @property integer $tenant_id
 * @property float $total
 * @property integer $user_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 * @property string $deleted_at
 * @property integer $deleted_by
 * @property-read \Multi\Models\User $user
 * @property-read \Illuminate\Database\Eloquent\Collection|\Multi\Models\Product[] $products
 * @property-read \Multi\Models\User $deletedBy
 * @property-read \Multi\Models\Client $client
 * @property-read \Multi\Models\Tenant $tenant
 * @method static \Illuminate\Database\Query\Builder|\Multi\Models\Order whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Multi\Models\Order whereClientId($value)
 * @method static \Illuminate\Database\Query\Builder|\Multi\Models\Order whereTenantId($value)
 * @method static \Illuminate\Database\Query\Builder|\Multi\Models\Order whereTotal($value)
 * @method static \Illuminate\Database\Query\Builder|\Multi\Models\Order whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\Multi\Models\Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Multi\Models\Order whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Multi\Models\Order whereCreatedBy($value)
 * @method static \Illuminate\Database\Query\Builder|\Multi\Models\Order whereUpdatedBy($value)
 * @method static \Illuminate\Database\Query\Builder|\Multi\Models\Order whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Multi\Models\Order whereDeletedBy($value)
 * @mixin \Eloquent
 * @property-read \Multi\Models\User $createdBy
 * @property-read \Multi\Models\User $updatedBy
 */
class Order extends BaseModel
{
	use SoftDeletes, TenantScopedModelTrait;

	protected $casts = [
        'client_id' => 'integer',
		'tenant_id' => 'integer',
		'user_id' => 'integer'
    ];

    public static $rules = [
        'client_id' => 'required|integer|exists:clients,id',
		'tenant_id' => 'required|integer|exists:tenants,id',
		'user_id' => 'required|integer|exists:users,id'
    ];
	
	public function user() {
		return $this->belongsTo(User::class);
	}
	
	public function products() {
		return $this->belongsToMany(Product::class, 'line_items', 'order_id', 'product_id');
	}
}