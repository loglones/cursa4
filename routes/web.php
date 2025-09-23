<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DroneTypesController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\InstructorsController;
use App\Http\Controllers\InstructorsInfoController;
use App\Http\Controllers\ReviewsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SignInController;
use App\Http\Controllers\SignUpController;

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/drone-types', [DroneTypesController::class, 'index'])->name('droneTypes');
Route::get('/courses', [CoursesController::class, 'index'])->name('courses');
Route::get('/instructors', [InstructorsController::class, 'index'])->name('instructors');
Route::get('/instructors-info', [InstructorsInfoController::class, 'index'])->name('instructorsInfo');
Route::get('/reviews', [ReviewsController::class, 'index'])->name('reviews');
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::get('/sign-in', [SignInController::class, 'index'])->name('signIn');
Route::get('/sign-up', [SignUpController::class, 'index'])->name('signUp');


