<?php

// src/routes/web.php

use Ekstremedia\MemoryApp\Http\Controllers\MemoryController;
use Ekstremedia\MemoryApp\Http\Controllers\MemoryVehicleController;
use Ekstremedia\MemoryApp\Http\Controllers\MemoryVehicleFuelController;
use Ekstremedia\MemoryApp\Http\Controllers\YourController;
use Illuminate\Support\Facades\Route;

Route::prefix('memory')->middleware(['web', 'auth'])->group(function () {
    Route::get('/', [MemoryController::class, 'index'])->name('memory.index');
    Route::get('/example', [YourController::class, 'index'])->name('memory.example');
    Route::resource('vehicles', MemoryVehicleController::class)->names('memory.vehicles');

    // Fuel
    Route::resource('vehicles/{vehicle_uuid}/fuel', MemoryVehicleFuelController::class)->names('memory.vehicles.fuel');

});
