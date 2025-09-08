<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    public function index()
    {
        $users = User::get();
        $roles = Role::all();
        $permissions = Permission::all();

        return view('components.users.index', compact('users', 'roles', 'permissions'));
    }

    public function assignRole(Request $request, User $user)
    {
        $request->validate(['role' => 'required']);
        $user->syncRoles([$request->role]); // Replace all roles with selected
        return back()->with('success', 'Role assigned successfully!');
    }

    public function assignPermission(Request $request, User $user)
    {
        $request->validate(['permission' => 'required']);
        $user->givePermissionTo($request->permission);
        return back()->with('success', 'Permission assigned successfully!');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $users = User::where('name', 'LIKE', "%{$query}%")
                     ->orWhere('email', 'LIKE', "%{$query}%")
                     ->get();

        $roles = Role::all();
        $permissions = Permission::all();

        return view('components.users.index', compact('users', 'roles', 'permissions'));
    }
public function show($id)
{
    $user = User::findOrFail($id);
    return view('components.users.show', compact('user'));
}


}
