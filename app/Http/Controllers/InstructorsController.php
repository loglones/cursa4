<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InstructorsController extends Controller
{
    public function index()
    {
        return view('instructors');
    }
}
