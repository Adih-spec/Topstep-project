<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;

class GuardController extends Controller
{
    /**
     * Show all users grouped by guard_type
     */
    public function index()
    {
        $users = User::all()->groupBy('guard_type');
        return view('guards.index', compact('users'));
    }

    /**
     * Show form to create a new Guard User
     */
    public function create()
    {
        $roles = Role::all();
        return view('guards.create', compact('roles'));
    }

    /**
     * Store new guard user
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'       => 'required|string|max:255',
            'email'      => 'required|email|unique:users',
            'password'   => 'required|min:6',
            'guard_type' => 'required|string',
            'role'       => 'required|string',
        ]);

        $user = User::create([
            'name'       => $request->name,
            'email'      => $request->email,
            'password'   => bcrypt($request->password),
            'guard_type' => $request->guard_type,
        ]);

        $user->assignRole($request->role);

        return redirect()->route('guards.index')->with('success', 'Guard User created successfully!');
    }
}
