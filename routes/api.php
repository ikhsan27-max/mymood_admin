<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Http\Controllers\MoodController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;

// Route untuk mendapatkan user yang sedang login (menggunakan Sanctum)
Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

// Group route yang memerlukan autentikasi
Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('moods', MoodController::class);
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy']);
    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store']);
});

// Route bebas autentikasi
Route::apiResource('quotes', QuoteController::class);
Route::post('register', [RegisteredUserController::class, 'store']);
Route::post('forgot-password', [PasswordResetLinkController::class, 'store']);
Route::post('reset-password', [NewPasswordController::class, 'store']);

// Verifikasi email (setelah register)
Route::get('email/verify/{id}/{hash}', [VerifyEmailController::class, '__invoke'])->name('verification.verify');

// Custom login route (jika tidak pakai controller default)
Route::post('/login', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $user = User::where('email', $request->email)->first();

    if (! $user || ! Hash::check($request->password, $user->password)) {
        return response()->json(['message' => 'Invalid credentials'], 401);
    }

    $token = $user->createToken('api-token')->plainTextToken;

    return response()->json([
        'access_token' => $token,
        'token_type' => 'Bearer',
        'user' => $user,
    ]);
});
