<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MoodController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',[DashboardController::class,'index'])->name('app');
Route::resource('quotes', QuoteController::class);

Route::resource('users', UserController::class);


// Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
// });
Route::resource('moods', MoodController::class);



