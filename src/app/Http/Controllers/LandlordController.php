<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use App\Models\BusinessPermit;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class LandlordController extends Controller
{
    public function showRegisterForm()
    {
        return view('landlord.register');
    }
public function register(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|confirmed|min:6',
        'contact_number' => 'required|digits:11', 
        'business_permit' => 'required|file|mimes:pdf|max:2048',
    ]);

    
    $user = User::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'password' => bcrypt($validated['password']),
        'contact_number' => $validated['contact_number'],
        'role' => 'landlord', 
    ]);

    $permitPath = $request->file('business_permit')->store('business_permits', 'public');

    
    BusinessPermit::create([
        'user_id' => $user->id,
        'permit_path' => $permitPath,
        'is_approved' => 0, 
    ]);

    $user->sendEmailVerificationNotification();

    return back()->with('success', 'Registration successful. Please check your email for verification.');
}

}