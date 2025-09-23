<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DroneTypesController extends Controller
{
    public function index()
    {
        return view('droneTypes');
    }
}
