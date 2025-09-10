<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        // If using a separate guard for admins
        if (Auth::guard('admin')->check()) {
            return $next($request);
        }

        // If not authenticated as admin → redirect
        return redirect()->route('admin.login')->with('error', 'You must be an admin to access this page.');
    }
}