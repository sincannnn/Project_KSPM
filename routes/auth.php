<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| AUTHENTICATION ROUTES
|--------------------------------------------------------------------------
| URL autentikasi menggunakan prefix /auth.
| Registrasi publik tidak disediakan.
|--------------------------------------------------------------------------
*/

// Login, lupa password, dan reset password.
Route::middleware('guest')->prefix('auth')->group(function () {

    // Halaman login
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    // Proses login
    Route::post('/login', [AuthenticatedSessionController::class, 'store'])
        ->name('login.store');

    // Form lupa password
    Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    // Kirim tautan reset password
    Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    // Form reset password
    Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    // Simpan password baru
    Route::post('/reset-password', [NewPasswordController::class, 'store'])
        ->name('password.store');
});

// Fitur untuk pengguna yang sudah login.
Route::middleware('auth')->prefix('auth')->group(function () {

    // Logout
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');

    // Konfirmasi password
    Route::get('/confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('/confirm-password', [ConfirmablePasswordController::class, 'store']);

    // Verifikasi email
    Route::get('/verify-email', [EmailVerificationPromptController::class, '__invoke'])
        ->name('verification.notice');

    Route::get('/verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
        ->middleware('signed')
        ->name('verification.verify');

    Route::post('/email/verification-notification', [
        EmailVerificationNotificationController::class,
        'store',
    ])->middleware('throttle:6,1')
      ->name('verification.send');

    // Ubah password
    Route::put('/password', [PasswordController::class, 'update'])
        ->name('password.update');
});