<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Notification;
use App\Notifications\VerifyEmailNotification;

class TenantController extends Controller
{
    public function showRegisterForm()
    {
        return view('tenant.register');
    }

    public function register(Request $request)
    {
      
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:8',
            'contact_number' => 'required|string|max:11',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'contact_number' => $validated['contact_number'],
            'role' => 'tenant',
        ]);

        event(new Registered($user));

        $user->sendEmailVerificationNotification();

        return redirect()->route('login')->with('success', 'Registration successful. Please check your email to activate your Tenant account.');
    }
}
