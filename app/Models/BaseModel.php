<?php namespace Multistarter\Models;

use HipsterJazzbo\Landlord\BelongsToTenant;
use Illuminate\Database\Eloquent\Model as Model;

class BaseModel extends Model
{
    use BelongsToTenant;
    
    protected $guarded = ['id'];
    
    protected $hidden = ['created_by','updated_by','deleted_by','deleted_at','created_at','updated_at','tenant_id','client_id'];

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
