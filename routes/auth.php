<?php

use App\Http\Controllers\Auth\AuthenticationController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserProjectController;
use App\Http\Controllers\UserSkillsController;
use App\Http\Controllers\UserHonorsAndAwardsController;
use App\Http\Controllers\UserAcademicsController;

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
    // Route::get('studentDashboard', function () {
    //     return view('student.studentDashboard');
    // });

    // Handle /studentDashboard route with UserController
    Route::get('studentDashboard', [UserController::class, 'studentDashboard'])->name('student.studentDashboard');
    // Handle /studentProf route with UserController
    Route::get('/studentProf', [UserController::class, 'studentProfile'])->name('student.studentProf');

});

Route::middleware('auth')->group(function () {
    // Projects routes
    Route::post('/projects', [UserProjectController::class, 'store'])->name('projects.store');
    Route::get('/projects', [UserProjectController::class, 'index'])->name('projects.index');
    Route::put('/projects/{id}', [UserProjectController::class, 'update'])->name('projects.update');
    Route::delete('/projects/{id}', [UserProjectController::class, 'destroy'])->name('projects.destroy');
    // Route::get('/projects/{id}/modal', [UserProjectController::class, 'showModal'])->name('projects.show.modal');
});

Route::middleware('auth')->group(function () {
    // Skills routes
    Route::post('/skills', [UserSkillsController::class, 'store'])->name('skills.store');
    Route::get('/skills', [UserSkillsController::class, 'index'])->name('skills.index');
});

Route::middleware('auth')->group(function () {
    // Academics routes
    Route::post('/academics', [UserAcademicsController::class, 'store'])->name('academics.store');
    Route::get('/academics', [UserAcademicsController::class, 'index'])->name('academics.index');
});

Route::middleware('auth')->group(function () {
    // Honors and Awards routes
    Route::post('/honorsandawards', [UserHonorsAndAwardsController::class, 'store'])->name('honorsandawards.store');
    Route::get('/honorsandawards', [UserHonorsAndAwardsController::class, 'index'])->name('honorsandawards.index');
});