<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',[DashboardController::class,'index']);
Route::resource('quotes', QuoteController::class);

Route::resource('users', UserController::class);



