<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\DashboardController;
use App\Http\Controllers\Auth\PostController;



Route::get('/', function () {
    // auth()->logout();
    return view('welcome');
});

Auth::routes([
    'register' => false
]);


Route::get('dashboard', [DashboardController::class,'dashboard'])->name('dashboard')->middleware('auth');

Route::resource('auth/posts', PostController::class)->middleware('auth');
