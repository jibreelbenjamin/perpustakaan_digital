<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class WebMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!Auth::check() && !session('token')) {
            return redirect()->route('login')->withErrors([
                'message' => 'Login terlebih dahulu.'
            ]);
        }

        $userRole = Auth::user()->role;

        if (!in_array($userRole, $roles)) {
            return redirect()->route('home')->withErrors([
                'message' => 'Tidak memiliki izin.'
            ]);
        }

        return $next($request);
    }
}
