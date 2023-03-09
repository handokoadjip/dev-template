<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ChangePasswordController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::get('/reload-captcha', [AuthenticatedSessionController::class, 'reload_captcha']);

Route::get('/daftar', [RegisteredUserController::class, 'create'])
    ->middleware(['guest', 'prevent-back-history'])
    ->name('register');

Route::post('/daftar', [RegisteredUserController::class, 'store'])
    ->middleware(['guest', 'prevent-back-history']);

Route::get('/backoffice/masuk', [AuthenticatedSessionController::class, 'create'])
    ->middleware(['guest', 'prevent-back-history'])
    ->name('login');

Route::post('/backoffice/masuk', [AuthenticatedSessionController::class, 'store'])
    ->middleware(['guest', 'prevent-back-history']);

Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])
    ->middleware(['guest', 'prevent-back-history'])
    ->name('password.request');

Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
    ->middleware(['guest', 'prevent-back-history'])
    ->name('password.email');

Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])
    ->middleware(['guest', 'prevent-back-history'])
    ->name('password.reset');

Route::post('/reset-password', [NewPasswordController::class, 'store'])
    ->middleware(['guest', 'prevent-back-history'])
    ->name('password.update');

Route::get('/verify-email', [EmailVerificationPromptController::class, '__invoke'])
    ->middleware(['auth', 'prevent-back-history'])
    ->name('verification.notice');

Route::get('/verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
    ->middleware(['auth', 'signed', 'throttle:6,1', 'prevent-back-history'])
    ->name('verification.verify');

Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
    ->middleware(['auth', 'throttle:6,1', 'prevent-back-history'])
    ->name('verification.send');

Route::get('/confirm-password', [ConfirmablePasswordController::class, 'show'])
    ->middleware(['auth', 'prevent-back-history'])
    ->name('password.confirm');

Route::post('/confirm-password', [ConfirmablePasswordController::class, 'store'])
    ->middleware(['auth', 'prevent-back-history']);

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware(['auth', 'prevent-back-history'])
    ->name('logout');

Route::get('/backoffice/data-diri', [ProfileController::class, 'edit'])
    ->middleware(['auth', 'prevent-back-history'])
    ->name('profile.edit');

Route::put('/backoffice/data-diri/{profile}/edit', [ProfileController::class, 'update'])
    ->middleware(['auth', 'prevent-back-history'])
    ->name('profile.update');

Route::get('/change-password', [ChangePasswordController::class, 'edit'])
    ->middleware(['auth', 'prevent-back-history'])
    ->name('change-password.edit');

Route::put('/change-password', [ChangePasswordController::class, 'update'])
    ->middleware(['auth', 'prevent-back-history'])
    ->name('change-password.update');
