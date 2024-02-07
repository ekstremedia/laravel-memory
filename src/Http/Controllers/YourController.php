<?php
// src/Http/Controllers/YourController.php

namespace Ekstremedia\MemoryApp\Http\Controllers;

use App\Http\Controllers\Controller;

class YourController extends Controller
{
    public function index()
    {

        return view('memoryapp::example');
    }
}

