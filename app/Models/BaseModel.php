<?php namespace Multi\Models;

use Auth;
use Illuminate\Database\Eloquent\Model;

/**
 * Multi\Models\BaseModel
 *
 * @property-read \Multi\Models\User $createdBy
 * @property-read \Multi\Models\User $updatedBy
 * @property-read \Multi\Models\User $deletedBy
 * @property-read \Multi\Models\Client $client
 * @property-read \Multi\Models\Tenant $tenant
 * @mixin \Eloquent
 */
class BaseModel extends Model
{
    protected $hidden = [
        'created_by',
        'updated_by',
        'deleted_by',
        'deleted_at',
        'created_at',
        'updated_at',
    ];
    
    protected $tenantColumns = ['client_id','tenant_id'];
    
    protected $guarded = ['id'];

    /**
     * Listen for save event.
     */
    public static function boot()
    {
        parent::boot();

        static::creating(function($model){
            if (Auth::check()) {
                $model->created_by = Auth::id();
                $model->updated_by = Auth::id();
            }
        });

        static::updating(function($model)
        {
            if (Auth::check() && $model->logsCreatedAndUpdatedBy) {
                $model->updated_by = Auth::id();
            }
        });
    }
    
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
