<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    // Show the login form
    public function showLoginForm()
    {
        return view('admin.login');
    }

    // Handle the admin login
    public function login(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

    if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

        $user = Auth::user();
        if ($user->role === 'admin') {
        return redirect()->route('admin.dashboard');
        }
            Auth::logout();
            return back()->withErrors(['email' => 'Invalid admin credentials.']);
        }

        // If authentication fails
        return back()->withErrors(['email' => 'Invalid email or password.']);
    }

    // Handle the admin logout
    public function logout()
    {
        Auth::guard('admin')->logout(); // Make sure to log out using the 'admin' guard
        return redirect()->route('admin.login'); // Redirect to the login page
    }
}
