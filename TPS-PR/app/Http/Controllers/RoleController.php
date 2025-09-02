<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $data['roles'] = Role::all();
        return view('components.roles.index', $data);
    }

    public function create()
    {
        return view('components.roles.create');
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
}
