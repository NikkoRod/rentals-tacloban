<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is authenticated and if the 'is_admin' value is 1
        if (Auth::check() && Auth::user()->is_admin == 1) {
            return $next($request);
        }

        // Redirect to admin login if not an admin
        return redirect('/admin/login');
    }
}
