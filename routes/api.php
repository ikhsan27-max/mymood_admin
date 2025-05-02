<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\MoodController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});


use App\Models\User;
use Illuminate\Support\Facades\Hash;




// Route yang butuh autentikasi
Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('moods', MoodController::class);
});

// Route yang bebas tanpa autentikasi
Route::apiResource('quotes', QuoteController::class);



// Register route
Route::post('register', [RegisteredUserController::class, 'store']);

// // Login route
// Route::post('login', [AuthenticatedSessionController::class, 'store']);


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

// Email verification
Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])->middleware('auth:sanctum');

// Password reset link
Route::post('forgot-password', [PasswordResetLinkController::class, 'store']);

// Reset password (using token from email)
Route::post('reset-password', [NewPasswordController::class, 'store']);

// Logout route (protected)
Route::middleware('auth:sanctum')->post('logout', [AuthenticatedSessionController::class, 'destroy']);

// Verify email after registration
Route::get('email/verify/{id}/{hash}', [VerifyEmailController::class, '__invoke'])->name('verification.verify');

