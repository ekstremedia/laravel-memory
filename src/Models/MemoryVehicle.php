<?php

namespace Ekstremedia\MemoryApp\Models;

use Ekstremedia\MemoryApp\Traits\HasUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MemoryVehicle extends Model
{
    use HasUuid;
    use SoftDeletes;

    protected $table = 'memory_vehicle_vehicles';

    protected $guarded = ['id']; // or use $fillable to explicitly define fillable fields

    protected $fillable = [
        // List all fillable columns from your migration
    ];

    /**
     * Laravel's Route Model Binding can be customized to use a column other than the default id. In your MemoryVehicle model, specify that the route model binding should use the uuid field:
     * Get the route key for the model.
     */
    public function getRouteKeyName(): string
    {
        return 'uuid';
    }

    public function services()
    {
        return $this->hasMany(MemoryVehicleService::class, 'vehicle_id');
    }

    public function fuels()
    {
        return $this->hasMany(MemoryVehicleFuel::class, 'vehicle_id');
    }

    // Method to get the latest fuel entry
    public function latestFuel()
    {
        return $this->hasOne(MemoryVehicleFuel::class, 'vehicle_id')->latest();
    }

    public function mileages()
    {
        return $this->hasMany(MemoryVehicleMileage::class, 'vehicle_id');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }

    public function lastEditedBy()
    {
        return $this->belongsTo(User::class, 'last_edited_by_id');
    }
}
