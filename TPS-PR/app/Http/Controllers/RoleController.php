<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use App\Models\Guard;

class RoleController extends Controller
{
    public function index()
    {
        $data['roles'] = Role::all();
        return view('components.roles.index', $data);
    }
         
    public function create()
    {
        // Get unique guard types you’ve already created
        $guards = Guard::select('guard_type')->distinct()->pluck('guard_type');

        return view('components.roles.create', compact('guards'));
    }
        

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles,name,NULL,id,guard_name,' . $request->guard_name,
            'guard_name' => 'required'
        ]);

        Role::create($request->only('name', 'guard_name'));

        return back()->with('success', 'Role created successfully.');
    }
    public function edit(Role $role)
    {
        return view('components.roles.edit', compact('role'));
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|unique:roles,name,' . $role->id . ',id,guard_name,' . $request->guard_name,
            'guard_name' => 'required'
        ]);

        $role->update($request->only('name', 'guard_name'));

        return back()->with('success', 'Role updated successfully.');
    }
}
