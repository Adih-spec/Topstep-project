<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @param  string|null  $guard
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next, ?string $guard = 'admin'): Response
    {
        // Check if the guard exists in config
        if (!array_key_exists($guard, config('auth.guards'))) {
            abort(500, "Guard [$guard] is not defined.");
        }
        // Check if user is authenticated with the given guard
        if (!Auth::guard($guard)->check()) {
            // If not logged in, redirect to the login page for that guard
            return redirect()->route("{$guard}.login");
        }

        // If logged in, continue request
        return $next($request);
    }
}