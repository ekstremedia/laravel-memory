<?php

// src/Http/Controllers/YourController.php

namespace Ekstremedia\MemoryApp\Http\Controllers;

use Illuminate\Routing\Controller;

class YourController extends Controller
{
    public function index()
    {
        return view('memoryapp::memoryvehicle.index');
    }
}
