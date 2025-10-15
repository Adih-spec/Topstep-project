<?php
namespace App\Http\Controllers;

use App\Models\Guard;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::with('permissions')->paginate(10);
        return view('components.roles.index', compact('roles'));
    }

   public function create()
    {
        // get distinct guard names (strings)
        $guards = Guard::pluck('guard_name')->unique();

        return view('components.roles.create', compact('guards'));
    }

    public function store(Request $request)
{
    // ✅ Validate the input
    $request->validate([
        'name' => 'required|string|max:255',
        'guard_name' => 'required|string'
    ]);

    // ✅ Create the role using the request data
    $role = Role::create([
        'name' => $request->name,
        'guard_name' => $request->guard_name, // use the selected guard_name
    ]);

    // If you need to assign this role to a specific user or model, do it here.
    // Example: Assign to currently authenticated user (optional)
    // auth()->user()->assignRole($role);

    return redirect()
        ->route('roles.index')
        ->with('success', 'Role created successfully.');
}

}
