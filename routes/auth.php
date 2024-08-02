<?php

use App\Http\Controllers\Admin\AuthenticatedSessionAdminController;
use App\Http\Controllers\Admin\ConfirmablePasswordAdminController;
use App\Http\Controllers\Admin\EmailVerificationNotificationAdminController;
use App\Http\Controllers\Admin\EmailVerificationPromptAdminController;
use App\Http\Controllers\Admin\PasswordAdminController;
use App\Http\Controllers\Admin\PasswordResetLinkAdminController;
use App\Http\Controllers\Admin\RegisteredAdminController;
use App\Http\Controllers\Admin\VerifyEmailAdminController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

//Ruta para usuarios nuevos de visita

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->name('password.store');          
});


//Ruta para usuarios autenticados 

Route::middleware('auth')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
                ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
                ->middleware(['signed', 'throttle:6,1'])
                ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
});



Route::middleware('guest:admin')->group(function () {
    Route::get('admin/register', [RegisteredAdminController::class, 'create'])
                ->name('admin.register');
    
    Route::post('admin/register', [RegisteredAdminController::class, 'store']);

    Route::get('admin/login', [AuthenticatedSessionAdminController::class, 'create'])
                ->name('admin.login');

    Route::post('admin/login', [AuthenticatedSessionAdminController::class, 'store']);

    Route::get('admin/verify-email', [EmailVerificationPromptAdminController::class, 'index'])
                ->name('admin.verification.notice');
});

Route::middleware('auth:admin')->group(function () {
    Route::post('admin/logout', [AuthenticatedSessionAdminController::class, 'destroy'])
                ->name('admin.logout');

    Route::get('admin/verify-email/{id}/{hash}', [EmailVerificationPromptAdminController::class, 'verify'])
                ->middleware(['signed', 'throttle:6,1'])
                ->name('admin.verification.verify');

    Route::post('admin/email/verification-notification', [EmailVerificationNotificationAdminController::class, 'send'])
                ->middleware('throttle:6,1')
                ->name('admin.verification.send');
});