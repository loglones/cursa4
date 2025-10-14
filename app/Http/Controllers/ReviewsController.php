<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class ReviewsController extends Controller
{
    public function index()
    {
        $reviews = Review::with('user')->orderBy('created_at', 'desc')->paginate(5);
        return view('reviews', compact('reviews'));
    }
    public function store(Request $request){
        $validated = $request->validate([
           'text_review' => 'required|string|min:10|max:1000',
           'rating' => 'required|integer|between:1,5',
        ]);

        Review::create([
            'user_id' => Auth::id(),
            'text_review' => $validated['text_review'],
            'rating' => $validated['rating'],
            'course_id' => null,
        ]);
        return redirect()->route('reviews')->with('success', 'Отзыв успешно добавлен!');
    }
}
