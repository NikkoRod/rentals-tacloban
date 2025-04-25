<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TenantController;

//Tenant

Route::get('/register/tenant', [TenantController::class, 'showRegisterForm'])->name('tenant.register');
Route::post('/register/tenant', [TenantController::class, 'register']);

Route::post('/logout', function () {
    Auth::logout();
    return redirect()->route('home'); 
})->name('logout');