<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        // Validate the credentials
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        // Attempt to log the user in
        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();

            // Redirect based on the user's role
            if ($user->role === 'tenant') {
                return redirect()->route('tenant.dashboard'); // Redirect to tenant dashboard
            } elseif ($user->role === 'landlord') {
                return redirect()->route('landlord.dashboard'); // Redirect to landlord dashboard
            }

            // Default redirect (if needed)
            return redirect()->route('home');
        }

        return back()->withErrors(['email' => 'Invalid credentials'])->onlyInput('email');
    }
}

