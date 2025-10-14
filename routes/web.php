<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DroneTypesController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\InstructorsController;
use App\Http\Controllers\InstructorsInfoController;
use App\Http\Controllers\ReviewsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SignInController;
use App\Http\Controllers\SignUpController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

//Доступны всем
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/drone-types', [DroneTypesController::class, 'index'])->name('droneTypes');
Route::get('/courses', [CoursesController::class, 'index'])->name('courses');
Route::get('/instructors', [InstructorsController::class, 'index'])->name('instructors');
Route::get('/instructors-info', [InstructorsInfoController::class, 'index'])->name('instructorsInfo');
Route::get('/reviews', [ReviewsController::class, 'index'])->name('reviews');
//это для авторизированных
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile/update-photo', [ProfileController::class, 'updatePhoto'])->name('profile.updatePhoto');
});
//это для авторизации
Route::get('/sign-in', [SignInController::class, 'index'])->name('signIn');
Route::post('/sign-in', [AuthController::class, 'login']);
Route::get('/sign-up', [SignUpController::class, 'index'])->name('signUp');
Route::post('/sign-up', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
//это для подтверждения
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    $request->user()->update(['active' => true]);

    return redirect()->route('home')->with('success', 'Email успешно подтвержден!');
})->middleware(['auth', 'signed'])->name('verification.verify');
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Ссылка для подтверждения отправлена повторно!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');


