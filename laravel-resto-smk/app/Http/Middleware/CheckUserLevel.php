<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckUserLevel
{
    public function handle($request, Closure $next, $level)
    {
        if (!Auth::check() || Auth::user()->level !== $level) {
            return redirect('/'); // Redirect to home or appropriate page
        }

        return $next($request);
    }
}
