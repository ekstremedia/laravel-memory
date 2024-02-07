<?php

namespace Ekstremedia\MemoryApp\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MemoryVehicleMileage extends Model
{
    use SoftDeletes;

    protected $table = 'memory_vehicle_mileages';

    protected $fillable = [
        // List all fillable columns from your migration
    ];

    public function vehicle()
    {
        return $this->belongsTo(MemoryVehicle::class, 'vehicle_id');
    }
}
