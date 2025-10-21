<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Instructor;
use Illuminate\Support\Facades\Storage;

class InstructorController extends Controller
{
    public function create()
    {
        return view('admin.instructors.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'fio' => 'required|string|max:255',
            'experience' => 'required|string',
            'skills' => 'required|string',
            'drone_types' => 'required|string',
            'achievements' => 'required|string',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $photoPath = $request->file('photo')->store('instructors', 'public');

        Instructor::create([
            'fio' => $validated['fio'],
            'experience' => $validated['experience'],
            'skills' => $validated['skills'],
            'drone_types' => $validated['drone_types'],
            'achievements' => $validated['achievements'],
            'photo' => $photoPath,
            'rating' => 0.00
        ]);
        return redirect()->route('instructors')->with('success', 'Инструктор добавлен');
    }

    public function destroy($id)
    {
        $instructor = Instructor::findOrFail($id);

        if($instructor->photo && Storage::disk('public')->exists($instructor->photo)){
            Storage::disk('public')->delete($instructor->photo);
        }
        $instructor->delete();

        return redirect()->route('instructors')->with('success', 'Инструктор удален');
    }
}
