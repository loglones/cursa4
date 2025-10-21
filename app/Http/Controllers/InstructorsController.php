<?php

namespace App\Http\Controllers;

use App\Models\Instructor;
use Illuminate\Http\Request;

class InstructorsController extends Controller
{
    public function index(Request $request)
    {
        $instructors = Instructor::orderBy('created_at','desc')->paginate(4);

        $selectedInstructorId = $request->get('instructor_id');
        $selectedInstructor = null;

        if ($selectedInstructorId) {
            $selectedInstructor = Instructor::find($selectedInstructorId);
        }
        return view('instructors',compact('instructors','selectedInstructor'));
    }

    public function show($id)
    {
        $instructor = Instructor::findOrFail($id);
        return response()->json($instructor);
    }
}
