<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\AdminLoginController;
use App\Http\Controllers\Admin\Auth\AdminPasswordResetController;
use App\Http\Controllers\Admin\AdminController;

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AdminLoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AdminLoginController::class, 'login']);
    Route::post('/logout', [AdminLoginController::class, 'logout'])->name('logout');

    // Forgot Password
    Route::get('/forgot-password', [AdminPasswordResetController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('/forgot-password', [AdminPasswordResetController::class, 'sendResetLinkEmail'])->name('password.email');

    // Reset Password
    Route::get('/reset-password/{token}', [AdminPasswordResetController::class, 'showResetForm'])->name('password.reset');
    Route::post('/reset-password', [AdminPasswordResetController::class, 'reset'])->name('password.update');

    // Manage Pending Accounts
    Route::get('/pending-accounts', [AdminController::class, 'showPendingAccounts'])->name('pending-accounts');
    Route::post('/approve-landlord/{id}', [AdminController::class, 'approveLandlord'])->name('approve-landlord');
    Route::post('/reject-landlord/{id}', [AdminController::class, 'rejectLandlord'])->name('reject-landlord');

    Route::middleware(['auth', 'is_admin'])->group(function () {
        Route::get('/dashboard', fn () => view('admin.dashboard'))->name('dashboard');
    });
});



