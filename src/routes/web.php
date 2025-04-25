<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\HomeController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

Auth::routes(['verify' => true]);

// Welcome page
Route::get('/', fn () => view('welcome'))->name('home');

// Custom login page
Route::get('/login', fn () => view('auth.login'))->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

// Logout
Route::post('/logout', function () {
    Auth::logout();
    return redirect()->route('home'); 
})->name('logout');

// Forgot Password
Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])
    ->middleware('guest')
    ->name('password.request');

Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
    ->middleware('guest')
    ->name('password.email');

// Reset Password
Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])
    ->middleware('guest')
    ->name('password.reset');

Route::post('/reset-password', [NewPasswordController::class, 'store'])
    ->middleware('guest')
    ->name('password.update');


    // Show verification notice
Route::get('/email/verify', [VerificationController::class, 'notice'])
    ->middleware('auth')  // Ensure the user is authenticated
    ->name('verification.notice');
    
    Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill(); 
        $user = Auth::user();
        if ($user->role === 'tenant') {
            return redirect()->route('tenant.dashboard');
        } elseif ($user->role === 'landlord') {
            if (!$user->is_approved) {
                Auth::logout();
                return redirect('/login')->with('message', 'Your account is verified, but awaiting admin approval.');
            }
            return redirect()->route('landlord.dashboard');
        }
        // Default fallback
        return redirect('/');
    })->middleware(['auth', 'signed'])->name('verification.verify');
    
    // Resend verification email
Route::post('/email/resend', [VerificationController::class, 'resend'])
    ->middleware('auth')  // Ensure the user is authenticated
    ->name('verification.resend');
    

// Protected routes (only for verified users)
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::middleware('role:tenant')->get('/tenant/dashboard', function () {
        return view('tenant.dashboard');
    })->name('tenant.dashboard');

    Route::middleware('role:landlord')->get('/landlord/dashboard', function () {
        return view('landlord.dashboard');
    })->name('landlord.dashboard');
});
