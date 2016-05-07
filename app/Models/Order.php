<?php namespace Multistarter\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Multistarter\Models\Order
 *
 * @property integer $id
 * @property integer $client_id
 * @property integer $tenant_id
 * @property float $total
 * @property integer $user_id
 * @property-read \Multistarter\Models\Client $client
 * @property-read \Multistarter\Models\Tenant $tenant
 * @property-read \Multistarter\Models\User $user
 * @property-read \Illuminate\Database\Eloquent\Collection|\Multistarter\Models\Product[] $products
 * @method static \Illuminate\Database\Query\Builder|\Multistarter\Models\Order whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Multistarter\Models\Order whereClientId($value)
 * @method static \Illuminate\Database\Query\Builder|\Multistarter\Models\Order whereTenantId($value)
 * @method static \Illuminate\Database\Query\Builder|\Multistarter\Models\Order whereTotal($value)
 * @method static \Illuminate\Database\Query\Builder|\Multistarter\Models\Order whereUserId($value)
 * @mixin \Eloquent
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 * @property string $deleted_at
 * @property integer $deleted_by
 * @method static \Illuminate\Database\Query\Builder|\Multistarter\Models\Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Multistarter\Models\Order whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Multistarter\Models\Order whereCreatedBy($value)
 * @method static \Illuminate\Database\Query\Builder|\Multistarter\Models\Order whereUpdatedBy($value)
 * @method static \Illuminate\Database\Query\Builder|\Multistarter\Models\Order whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Multistarter\Models\Order whereDeletedBy($value)
 * @property-read \Multistarter\Models\User $createdBy
 * @property-read \Multistarter\Models\User $updatedBy
 * @property-read \Multistarter\Models\User $deletedBy
 */
class Order extends BaseModel
{
    
    /**
     * The database table used by the model.
     *
     * @var string
     */
    public $table = "orders";
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [
        'client_id',
		'tenant_id',
		'total',
		'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'client_id' => 'integer',
		'tenant_id' => 'integer',
		'user_id' => 'integer'
    ];

    /**
     * The rules that is used to validate.
     *
     * @var array
     */
    public static $rules = [
        'client_id' => 'required|integer|exists:clients,id',
		'tenant_id' => 'required|integer|exists:tenants,id',
		'user_id' => 'required|integer|exists:users,id'
    ];
    public function client() {
		return $this->belongsTo('Multistarter\Models\Client', 'client_id', 'id');
	}
	public function tenant() {
		return $this->belongsTo('Multistarter\Models\Tenant', 'tenant_id', 'id');
	}
	public function user() {
		return $this->belongsTo('Multistarter\Models\User', 'user_id', 'id');
	}
	public function products() {
		return $this->belongsToMany('Multistarter\Models\Product', 'line_items', 'order_id', 'product_id');
	}
}
