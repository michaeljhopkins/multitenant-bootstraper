<?php namespace Multistarter\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Multistarter\Models\Role
 *
 * @property integer $id
 * @property integer $client_id
 * @property integer $tenant_id
 * @property string $name
 * @property string $slug
 * @property-read \Multistarter\Models\Client $client
 * @property-read \Multistarter\Models\Tenant $tenant
 * @property-read \Illuminate\Database\Eloquent\Collection|\Multistarter\Models\Permission[] $permissions
 * @property-read \Illuminate\Database\Eloquent\Collection|\Multistarter\Models\User[] $users
 * @method static \Illuminate\Database\Query\Builder|\Multistarter\Models\Role whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Multistarter\Models\Role whereClientId($value)
 * @method static \Illuminate\Database\Query\Builder|\Multistarter\Models\Role whereTenantId($value)
 * @method static \Illuminate\Database\Query\Builder|\Multistarter\Models\Role whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\Multistarter\Models\Role whereSlug($value)
 * @mixin \Eloquent
 */
class Role extends Model
{
    
    /**
     * The database table used by the model.
     *
     * @var string
     */
    public $table = "roles";
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [
        'client_id',
		'tenant_id',
		'name',
		'slug'
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
		'slug' => 'string'
    ];

    /**
     * The rules that is used to validate.
     *
     * @var array
     */
    public static $rules = [
        'client_id' => 'required|integer|exists:clients,id',
		'tenant_id' => 'required|integer|exists:tenants,id',
		'name' => 'required|string',
		'slug' => 'required|string'
    ];
    public function client() {
		return $this->belongsTo('Multistarter\Models\Client', 'client_id', 'id');
	}
public function tenant() {
		return $this->belongsTo('Multistarter\Models\Tenant', 'tenant_id', 'id');
	}
public function permissions() {
		return $this->belongsToMany('Multistarter\Models\Permission', 'permission_role', 'role_id', 'permission_id');
	}
public function users() {
		return $this->belongsToMany('Multistarter\Models\User', 'role_user', 'role_id', 'user_id');
	}
}
