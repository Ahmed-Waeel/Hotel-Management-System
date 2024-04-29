<?php

use App\Http\Middleware\Dashboard\RoutePermission;
use Illuminate\Support\Facades\Route;


Route::withoutMiddleware(RoutePermission::class)->group(function () {
    Route::middleware('guest:admins')->group(function () {
        Route::get('/login', [\App\Http\Controllers\Dashboard\Auth\AuthenticatedSessionController::class, 'create'])->name('login');
        Route::post('/login', [\App\Http\Controllers\Dashboard\Auth\AuthenticatedSessionController::class, 'store'])->name('login.store');

        Route::get('forgot-password', [\App\Http\Controllers\Dashboard\Auth\PasswordResetLinkController::class, 'create'])->name('password.request');
        Route::post('forgot-password', [\App\Http\Controllers\Dashboard\Auth\PasswordResetLinkController::class, 'store'])->name('password.email');

        Route::get('reset-password/{token}', [\App\Http\Controllers\Dashboard\Auth\NewPasswordController::class, 'create'])->name('password.reset');
        Route::post('reset-password', [\App\Http\Controllers\Dashboard\Auth\NewPasswordController::class, 'store'])->name('password.store');
    });

    Route::post('/logout', [\App\Http\Controllers\Dashboard\Auth\AuthenticatedSessionController::class, 'destroy'])->name('logout')->middleware('auth:admins');
});
