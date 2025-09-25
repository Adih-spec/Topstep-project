<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Handle post-login redirect based on role.
     */
    protected function authenticated(Request $request, $user)
    {
        if ($user->hasRole('admin')) {
            return redirect('/admin-dashboard');
        } elseif ($user->hasRole('teacher')) {
            return redirect('/teacher-dashboard');
        } elseif ($user->hasRole('staff')) {
            return redirect('/staff-dashboard');
        } elseif ($user->hasRole('guardian')) {
            return redirect('/guardian-dashboard');
        }

        return redirect('/home'); // default redirect
    }
}
