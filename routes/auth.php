<?php
use App\Http\Controllers\Auth\AuthenticationController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\TransactionFeeController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('login', [AuthenticationController::class, 'index']);
    Route::post('login', [AuthenticationController::class, 'login'])->name('login');
    Route::get('register', [RegisterController::class, 'index']);
    Route::post('register', [RegisterController::class, 'register'])->name('register.account');
});



Route::middleware('auth')->group(function () {
    Route::get('/admin', function () {
        return view('admin/index');
    });
    Route::get('/admin', [UserController::class, 'index'])->name('admin.index');
    

    Route::post('logout', [AuthenticationController::class, 'destroy'])
                ->name('logout');    
});

Route::middleware('auth')->group(function () {
    Route::get('/student', function () {
        return view('student/studentProfile');
    });
    Route::get('/student', [UserController::class, 'index'])->name('student.studentdashboard');

    Route::get('studentprofile', function () {
        return view('student.studentprofile');
    });
    
    Route::get('studentdashboard', function () {
        return view('student.studentdashboard');
    });

    Route::get('/studentprofile', [UserController::class, 'studentProfile'])->name('student.studentprofile');
});


