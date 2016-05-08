<?php namespace Multi\Models;

use HipsterJazzbo\Landlord\BelongsToTenant;
use Illuminate\Database\Eloquent\Model;

/**
 * Multi\Models\BaseModel
 *
 * @property-read \Multi\Models\User $createdBy
 * @property-read \Multi\Models\User $deletedBy
 * @property-read \Multi\Models\Client $client
 * @property-read \Multi\Models\Tenant $tenant
 * @mixin \Eloquent
 * @property-read \Multi\Models\User $updatedBy
 */
class BaseModel extends Model
{
    use BelongsToTenant;

    protected $hidden = [
        'created_by',
        'updated_by',
        'deleted_by',
        'deleted_at',
        'created_at',
        'updated_at',
    ];
    
    protected $guarded = ['id'];
    
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
