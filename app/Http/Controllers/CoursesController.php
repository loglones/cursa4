<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CoursesController extends Controller
{
    public function index()
    {
        $courses = Course::with('instructor')->get();
        return view('courses', compact('courses'));
    }
}
