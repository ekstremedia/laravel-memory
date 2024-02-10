<?php
// src/routes/web.php

use Illuminate\Support\Facades\Route;
use Ekstremedia\MemoryApp\Http\Controllers\YourController;
use Ekstremedia\MemoryApp\Http\Controllers\MemoryVehicleController;

Route::prefix('memory')->middleware(['web', 'auth'])->group(function () {
    Route::get('/example', [YourController::class, 'index'])->name('memory.example');
    Route::resource('vehicles', MemoryVehicleController::class)->names('memory.vehicles');
});

