<?php namespace Multi\Models;

use Cache;
use Illuminate\Database\Eloquent\SoftDeletes;
use Multi\Packages\Acl\Models\Permission;
use Multi\Packages\Acl\Models\Role;
use Multi\Packages\MultiTenant\Traits\TenantScopedModelTrait;

/**
 * Multi\Models\Tenant
 *
 * @property integer $id
 * @property integer $client_id
 * @property string $name
 * @property string $url
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 * @property string $deleted_at
 * @property integer $deleted_by
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
 * @method static \Illuminate\Database\Query\Builder|\Multi\Models\Tenant whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Multi\Models\Tenant whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Multi\Models\Tenant whereCreatedBy($value)
 * @method static \Illuminate\Database\Query\Builder|\Multi\Models\Tenant whereUpdatedBy($value)
 * @method static \Illuminate\Database\Query\Builder|\Multi\Models\Tenant whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Multi\Models\Tenant whereDeletedBy($value)
 * @mixin \Eloquent
 * @property-read \Multi\Models\User $createdBy
 * @property-read \Multi\Models\User $updatedBy
 * @property-read \Multi\Models\User $deletedBy
 * @property-read \Multi\Models\Tenant $tenant
 */
class Tenant extends BaseModel
{
	use SoftDeletes, TenantScopedModelTrait;

	protected $tenantColumns = ['client_id'];
    
    protected $casts = [
        'client_id' => 'integer',
		'name' => 'string',
		'url' => 'string'
    ];

    public static $rules = [
        'client_id' => 'required|integer|exists:clients,id',
		'name' => 'required|string',
		'url' => 'required|string'
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
    
    public function users() {
		return $this->hasMany(User::class);
	}

	public static function getCurrent($reload = false)
	{
		// Static return
		$staticDomain = new self([
			'domain' => 'http://multitenant-bootstraper.dev',
			'client_id' => 1,
			'created_by' => null,
			'created_at' => '2016-02-15 19:19:19',
			'updated_by' => null,
			'updated_at' => '2016-02-15 19:19:19',
			'deleted_by' => null,
			'deleted_at' => null
		]);

		// Static Client
		$staticClient = new Client([
			'name' => 'Static Client #1',
			'created_by' => null,
			'created_at' => '2016-02-15 19:19:19',
			'updated_by' => null,
			'updated_at' => '2016-02-15 19:19:19',
			'deleted_at' => null
		]);

		// Set ID for Static Client
		$staticClient->id = 1;
		$staticDomain->id = 1;

		$staticDomain->setRelation('client', $staticClient);
		
		return $staticDomain;
		
		$currentDomain = \Request::getHost();

		$cacheKey = 'tenant_' . $currentDomain;

		if ($reload) {
			Cache::forget($cacheKey);
		}

		$domainObject = \Cache::remember($cacheKey, 60 * 24, function () use ($currentDomain) {
			if (\Schema::hasTable('tenants')) {
				return self::whereUrl($currentDomain)->first();
			}
			return;
		});

		if (!$domainObject && !\App::runningInConsole()) {
			throw new \Exception('No domain is configured for the name \'' . $currentDomain . '\'');
		}

		return $domainObject;
	}
}
