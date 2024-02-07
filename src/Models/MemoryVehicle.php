<?php
namespace Ekstremedia\MemoryApp\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MemoryVehicle extends Model
{
    use SoftDeletes;

    protected $table = 'memory_vehicle_vehicles';

    protected $fillable = [
        // List all fillable columns from your migration
    ];

    public function services()
    {
        return $this->hasMany(MemoryVehicleService::class, 'vehicle_id');
    }

    public function fuels()
    {
        return $this->hasMany(MemoryVehicleFuel::class, 'vehicle_id');
    }

    public function mileages()
    {
        return $this->hasMany(MemoryVehicleMileage::class, 'vehicle_id');
    }
}
