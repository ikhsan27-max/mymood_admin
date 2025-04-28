<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->is_admin) {
            return $next($request);
        }

        // Kalau bukan admin, redirect ke home atau halaman lain
        return redirect()->route('app')->with('error', 'You do not have admin access.');
    }
}

