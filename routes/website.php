<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
*/
Route::middleware('auth:users')->group(function () {
    Route::get('/', \App\Http\Controllers\Website\HomeController::class)->name('index');
});

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/
Route::middleware('guest:users')->group(function () {
    Route::get('login', [\App\Http\Controllers\Website\Auth\AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [\App\Http\Controllers\Website\Auth\AuthenticatedSessionController::class, 'store'])->name('login.store');

    Route::get('register', [\App\Http\Controllers\Website\Auth\RegisteredUserController::class, 'create'])->name('register');
    Route::post('register', [\App\Http\Controllers\Website\Auth\RegisteredUserController::class, 'store'])->name('register.store');

    Route::get('forgot-password', [\App\Http\Controllers\Website\Auth\PasswordResetLinkController::class, 'create'])->name('password.request');
    Route::post('forgot-password', [\App\Http\Controllers\Website\Auth\PasswordResetLinkController::class, 'store'])->name('password.email');

    Route::get('reset-password/{token}', [\App\Http\Controllers\Website\Auth\NewPasswordController::class, 'create'])->name('password.reset');
    Route::post('reset-password', [\App\Http\Controllers\Website\Auth\NewPasswordController::class, 'store'])->name('password.store');
});

Route::middleware('auth:users')->group(function () {
    Route::get('verify-email', \App\Http\Controllers\Website\Auth\EmailVerificationPromptController::class)->name('verification.notice');
    Route::get('verify-email/{id}/{hash}', \App\Http\Controllers\Website\Auth\VerifyEmailController::class)->middleware(['signed', 'throttle:6,1'])->name('verification.verify');
    Route::post('email/verification-notification', [\App\Http\Controllers\Website\Auth\EmailVerificationNotificationController::class, 'store'])->middleware('throttle:6,1')->name('verification.send');

	Route::get('/profile', [\App\Http\Controllers\Website\ProfileController::class, 'edit'])->name('profile.edit');
	Route::put('/profile', [\App\Http\Controllers\Website\ProfileController::class, 'update'])->name('profile.update');

    Route::post('logout', [\App\Http\Controllers\Website\Auth\AuthenticatedSessionController::class, 'destroy'])->name('logout');
});
