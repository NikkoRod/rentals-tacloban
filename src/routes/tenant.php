<?php

use Illuminate\Support\Facades\Route;

// ========== TENANT ROUTES ==========

// Tenant Registration
Route::get('/register/tenant', fn () => view('auth.register-tenant'))->name('register.tenant');

// Add more tenant-specific routes here
