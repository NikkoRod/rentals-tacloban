<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use App\Models\User;
use App\Notifications\AdminResetPassword;

class AdminPasswordResetController extends Controller
{
    // Display the password reset link request form
    public function showLinkRequestForm()
    {
        return view('admin.forgot-password');
    }

    // Handle sending the reset password link
    public function sendResetLinkEmail(Request $request)
    {
        // Validate the input email
        $request->validate(['email' => 'required|email']);

        // Try to find the user in the 'users' table with 'is_admin' = 1
        $user = User::where('email', $request->email)->where('is_admin', 1)->first();

        // If user exists, generate and send the reset link via the notification
        if ($user) {
            $token = Password::broker('admins')->createToken($user);
            $user->notify(new AdminResetPassword($token, $user->email)); // Send reset link email

            return back()->with('status', 'Reset link sent to your email!');
        } else {
            // No admin user found with the provided email
            return back()->withErrors(['email' => 'No admin user found with that email address.']);
        }
    }

    // Show the password reset form
    public function showResetForm(Request $request, $token)
    {
        return view('admin.reset-password', [
            'token' => $token,
            'email' => $request->email,
        ]);
    }

    // Handle the password reset
    public function reset(Request $request)
    {
        // Validate the request input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
            'token' => 'required',
        ]);

        // Attempt to reset the password for the admin user
        $status = Password::broker('admins')->reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->password = bcrypt($password);  // Hash the new password
                $user->save();  // Save the updated user model
            }
        );

        // If the password reset was successful, redirect to login
        return $status === Password::PASSWORD_RESET
            ? redirect()->route('admin.login')->with('status', 'Password reset successfully!')
            : back()->withErrors(['email' => __($status)]);
    }
}
