<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ScoreController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SignatureController;

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::resource('student', StudentController::class);
    Route::resource('score', ScoreController::class);

    // signature
    Route::get('signature', [SignatureController::class, 'index']);
    Route::post('signature', [SignatureController::class, 'upload'])->name('signaturepad.upload');

    // from user
    Route::get('student-user', [StudentController::class, 'userStudent'])->name('student.user');
    Route::put('student-verify', [StudentController::class, 'isVerified'])->name('student.verify');
});
