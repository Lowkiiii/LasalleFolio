<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});

Route::get('/dashboard', function () {
    return view('dashboard/content');
});

Route::get('/settings', function () {
    return view('settings/content');
});

Route::get('/contact', function () {
    return view('contact/content'); //path of your view file
});

// Route::get('/adduser', function(){
//     return view('admin/adduser');
// });

/*Route::middleware(['auth', 'role'])->group(function () {
    Route::get('/phonebook', function () {
        return view('phonebook.index'); // Assuming the view file is located at resources/views/phonebook/index.blade.php
    });
});*/


require __DIR__.'/auth.php';