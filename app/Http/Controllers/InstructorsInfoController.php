<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InstructorsInfoController extends Controller
{
    public function index()
    {
        return view('instructorsInfo');
    }
}
