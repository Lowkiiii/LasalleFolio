<?php

use App\Http\Controllers\Auth\AuthenticationController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserProjectController;

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
    Route::post('logout', [AuthenticationController::class, 'destroy'])->name('logout');
});

Route::middleware('auth')->group(function () {
    Route::get('studentDashboard', function () {
        return view('student.studentDashboard');
    });
    Route::get('/studentProf', [UserController::class, 'studentProfile'])->name('student.studentProf');

    Route::post('/projects', [UserProjectController::class, 'store'])->name('projects.store');

    Route::middleware('auth')->group(function () {
        // ...
        Route::get('/projects', [UserProjectController::class, 'index'])->name('projects.index');
        Route::get('/studentProf', [UserProjectController::class, 'index'])->name('student.studentProf');
    });

});