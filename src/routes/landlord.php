<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandlordController;

// ========== LANDLORD ROUTES ==========

Route::get('/register/landlord', [LandlordController::class, 'showRegisterForm'])->name('landlord.register');
Route::post('/register/landlord', [LandlordController::class, 'register']);
