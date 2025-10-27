<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserGrade;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        $users = User::orderBy('created_at', 'desc')->paginate(5);
        return view('admin.users.index', compact('users'));
    }

    public function updateGrade(Request $request, $userId)
    {
        $validated = $request->validate([
            'grade' => 'required|integer|between:0,5',
        ]);
        $user = User::findOrFail($userId);

        UserGrade::updateOrCreate(
            ['user_id' => $userId],
            ['grade' => $validated['grade'],'course_id' => null],
        );

        return redirect()->route('admin.users.index')->with('success','оценка обновлена');
    }
}
