<?php

namespace App\Http\Controllers;

use App\Models\Guard;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class GuardController extends Controller
{
    public function index()
    {
        $guards = Guard::latest()->paginate(10);
        return view('components.guards.index', compact('guards'));
    }

    public function create()
    {
        return view('components.guards.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'guard_name' => 'required|unique:guards,guard_name|max:255',
        ]);

        Guard::create($validated);

        return redirect()->route('guards.index')
            ->with('success', 'Guard created successfully!');
    }

    public function edit(Guard $guard)
    {
        return view('components.guards.edit', compact('guard'));
    }

    public function update(Request $request, Guard $guard)
    {
        $validated = $request->validate([
            'guard_name' => 'required|unique:guards,guard_name,' . $guard->id . '|max:255',
        ]);

        $guard->update($validated);

        return redirect()->route('guards.index')
            ->with('success', 'Guard updated successfully!');
    }

    public function destroy(Guard $guard)
    {
        $guard->delete();

        return redirect()->route('guards.index')
            ->with('success', 'Guard user deleted successfully.');
    }

    public function editPermissions(Guard $guard)
    {
        $permissions = Permission::all();
        return view('components.guards.assign-permissions', compact('guard', 'permissions'));
    }

    public function updatePermissions(Request $request, Guard $guard)
    {
        $guard->syncPermissions($request->input('permissions', []));
        return redirect()->route('guards.index')
            ->with('success', 'Permissions updated successfully!');
    }
}
