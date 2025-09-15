<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Illuminate\Validation\Rule;

class PermissionController extends Controller
{
    public function index()
{
    $permissions = Permission::all();
    return view('components.permissions.index', compact('permissions'));
}

   
    public function create()
    {
        return view('components.permissions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => [
                'required',
                Rule::unique('permissions')->where(function ($query) use ($request) {
                    return $query->where('guard_name', $request->guard_name);
                }),
            ],
            'guard_name' => 'required|string',
        ]);

        return redirect()->route('permissions.index')
                        ->with('success', 'Permission created successfully.');
    }

    public function edit(Permission $permission)
    {
        return view('components.permissions.edit', compact('permission'));
    }

    public function update(Request $request, Permission $permission)
    {
        $request->validate([
            'name' => 'required|unique:permissions,name,' . $permission->id,
        ]);

        $permission->update(['name' => $request->name]);

        return redirect()->route('permissions.index')
                         ->with('success', 'Permission updated successfully.');
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();

        return redirect()->route('permissions.index')
                         ->with('success', 'Permission deleted successfully.');
    }
}
