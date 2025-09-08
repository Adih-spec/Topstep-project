<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $role = Auth::user()->roles->pluck('name')->first();

                switch ($role) {
                    case 'admin':
                        return redirect('/admin/dashboard');
                    case 'teacher':
                        return redirect('/teacher/dashboard');
                    case 'staff':
                        return redirect('/staff/dashboard');
                    case 'guardian':
                        return redirect('/guardian/dashboard');
                    default:
                        return redirect('/dashboard');
                }
            }
        }

        return $next($request);
    }
}
