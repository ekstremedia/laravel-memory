<?php
// src/routes/web.php

use Illuminate\Support\Facades\Route;
use Ekstremedia\MemoryApp\Http\Controllers\YourController;

Route::prefix('memory')->group(function () {
    Route::get('/example', [YourController::class, 'index'])->name('memory.example');
});
