<?php

namespace App\Http\Controllers;

use App\Models\Guard;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class GuardController extends Controller
{
    public function index()
    {
        $guards = Guard::with('roles')->latest()->paginate(10);
        return view('components.guards.index', compact('guards'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('components.guards.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string|max:255',
            'email'=>'required|email|unique:guards,email',
            'password'=>'required|min:6',
            'guard_type'=>'required|string',
            'role'=>'required|string'
        ]);

        $guard = Guard::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'guard_type'=>$request->guard_type,
        ]);

        $guard->assignRole($request->role);

        return redirect()->route('guards.index')
            ->with('success', 'Guard user created successfully!');
    }
        public function destroy(Guard $guard)
{
    $guard->delete();

    return redirect()->route('guards.index')
        ->with('success', 'Guard user deleted successfully.');
}
}
