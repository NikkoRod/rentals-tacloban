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

        // Attempt to log in with the given credentials and check if the user is an admin
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Check if the authenticated user is an admin
            $user = Auth::user();
            if ($user->is_admin == 1) {
                // Redirect to the admin dashboard if the user is an admin
                return redirect()->route('admin.dashboard');
            }

            // If the user is not an admin, log them out and show an error message
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
