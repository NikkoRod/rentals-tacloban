<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerificationController extends Controller
{

    public function notice()
    {
        return view('auth.verify');
    }

    // Perform email verification
    public function verify(EmailVerificationRequest $request)
    {
          // Redirect based on user role
          $user = Auth::user();
        
          if ($user->role === 'tenant') {
              return redirect()->route('tenant.dashboard');
          }
  
          if ($user->role === 'landlord') {
              return redirect()->route('landlord.dashboard');
          }
  
          // Default redirection
          return redirect('/home');
    }

    // Resend verification email
    public function resend(Request $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect('/home');
        }

        $request->user()->sendEmailVerificationNotification();

        return back()->with('message', 'Verification link sent!');
    }
}

