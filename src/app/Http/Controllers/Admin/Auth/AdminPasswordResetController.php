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

        // Try to find the admin user using the 'role' field
        $user = User::where('email', $request->email)
                    ->where('role', 'admin')
                    ->first();

        if ($user) {
            $token = Password::broker('admins')->createToken($user);
            $user->notify(new AdminResetPassword($token, $user->email));

            return back()->with('status', 'Reset link sent to your email!');
        } else {
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
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
            'token' => 'required',
        ]);

        // Use 'admins' broker and ensure user has 'admin' role
        $status = Password::broker('admins')->reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                if ($user->role === 'admin') {
                    $user->password = bcrypt($password);
                    $user->save();
                }
            }
        );

        return $status === Password::PASSWORD_RESET
    ? back()->with('status', 'Password reset successfully!')
    : back()->withErrors(['email' => __($status)]);

    }
}
