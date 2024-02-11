<?php

namespace Ekstremedia\MemoryApp\Http\Controllers;

use Illuminate\Routing\Controller;
use Ekstremedia\MemoryApp\Models\MemoryVehicle;
use Illuminate\Http\Request;

class MemoryController extends Controller
{
    public function index()
    {

        return view('memoryapp::main.index');
    }
}
