<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware('guest')->group(function () {
    Route::get('login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('login', [AuthController::class, 'login']);
    Route::get('register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('register', [AuthController::class, 'register']);

    Route::get('forgot-password', [PasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('forgot-password', [PasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('reset-password/{token}', [PasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('reset-password', [PasswordController::class, 'reset'])->name('password.update');

    Route::get('auth/set-password', [AuthController::class, 'showSetPassword'])
        ->name('auth.set-password');
    Route::post('auth/set-password', [AuthController::class, 'storeSetPassword'])
        ->name('auth.set-password.store');

    Route::get('auth/{provider}', [AuthController::class, 'redirectToProvider'])
        ->where('provider', 'google|github')
        ->name('social.redirect');
    Route::get('auth/{provider}/callback', [AuthController::class, 'handleProviderCallback'])
        ->where('provider', 'google|github')
        ->name('social.callback');
});

Route::middleware(['auth'])->group(function () {
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('email/verify', [ProfileController::class, 'verifyNotice'])->middleware('unverified')->name('verification.notice');
    Route::get('email/verify/{id}/{hash}', [ProfileController::class, 'verifyEmail'])->middleware('signed')->name('verification.verify');
    Route::post('email/verification-notification', [ProfileController::class, 'resendVerification'])->middleware('throttle:6,1', 'unverified')->name('verification.send');

    Route::middleware('verified')->group(function () {
        Route::get('dashboard', [ProfileController::class, 'dashboard'])->name('dashboard');
        Route::get('profile', [ProfileController::class, 'edit'])->name('profile');
        Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
});
