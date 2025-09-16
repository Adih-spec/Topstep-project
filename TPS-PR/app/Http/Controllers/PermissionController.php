<?php
namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Guard;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function create()
    {
        $guards = Guard::all();
        return view('components.permissions.create', compact('guards'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:permissions,name',
            'guard_id' => 'required|exists:guards,id',
        ]);

        Permission::create([
            'name' => $request->name,
            'guard_id' => $request->guard_id,
        ]);

        return redirect()->route('permissions.index')->with('success', 'Permission created successfully.');
    }

    public function index()
    {
        $permissions = Permission::with('guard')->paginate(10);
        return view('components.permissions.index', compact('permissions'));
    }
}
