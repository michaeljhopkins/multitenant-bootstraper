<?php namespace Multistarter\Models;

use HipsterJazzbo\Landlord\BelongsToTenant;
use Illuminate\Database\Eloquent\Model as Model;

/**
 * Multistarter\Models\BaseModel
 *
 * @property-read \Multistarter\Models\User $createdBy
 * @property-read \Multistarter\Models\User $deletedBy
 * @property-read \Multistarter\Models\Client $client
 * @property-read \Multistarter\Models\Tenant $tenant
 * @mixin \Eloquent
 * @property-read \Multistarter\Models\User $updatedBy
 */
class BaseModel extends Model
{
    use BelongsToTenant;
    
    protected $guarded = ['id'];
    
    protected $hidden = [
        'created_by',
        'updated_by',
        'deleted_by',
        'deleted_at',
        'created_at',
        'updated_at',
        'tenant_id',
        ];

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function deletedBy()
    {
        return $this->belongsTo(User::class, 'deleted_by');
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
    
    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }
}
