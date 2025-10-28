<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Instructor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller{
    public function index(){
        $courses = Course::with('instructor')->orderBy('created_at','desc')->Paginate(4);
//        return view('admin.courses.index',compact('courses'));
        return redirect()->route('courses');
    }
    public function create(){
        $instructors = Instructor::all();
        return view('admin.courses.create',compact('instructors'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'quantity' => 'required|integer|min:1',
            'instructor_id' => 'required|exists:instructors,id',
            'price' => 'required|integer|max:999999',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $photoPath = $request->file('photo')->store('courses','public');

        Course::create([
           'name' => $validated['name'],
           'description' => $validated['description'],
           'quantity' => $validated['quantity'],
           'instructor_id' => $validated['instructor_id'],
           'price' => $validated['price'],
           'photo' => $photoPath,
        ]);
        return redirect()->route('courses')->with('success', 'Курс успешно добавлен');
    }

    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        if($course->photo && Storage::disk('public')->exists($course->photo)){
            Storage::disk('public')->delete($course->photo);
        }
        $course->delete();
        return redirect()->route('courses')->with('success', 'Курс удален');
    }
}
