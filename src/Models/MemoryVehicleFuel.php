<?php

namespace Ekstremedia\MemoryApp\Models;

use Ekstremedia\MemoryApp\Traits\HasUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MemoryVehicleFuel extends Model
{
    use SoftDeletes, HasUuid;

    protected $table = 'memory_vehicle_fuels';

    protected $fillable = [
        // List all fillable columns from your migration
    ];
    protected $guarded = ['id']; // or use $fillable to explicitly define fillable fields
    public function getRouteKeyName(): string
    {
        return 'uuid';
    }
    public function vehicle()
    {
        return $this->belongsTo(MemoryVehicle::class, 'vehicle_id');
    }
}
