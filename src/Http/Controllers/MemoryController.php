<?php

namespace Ekstremedia\MemoryApp\Http\Controllers;

use Illuminate\Routing\Controller;

class MemoryController extends Controller
{
    public function index()
    {

        return view('memoryapp::main.index');
    }
}
