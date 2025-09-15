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

    $guards = Guard::pluck('guard_name');
    return view('components.roles.create', compact('guards'));
}


    public function store(Request $request)
    {
        $request->validate(['name'=>'required', 'guard_id'=>'required']);
        $guard = Guard::findOrFail($request->guard_id);

        $role = Role::create(['name'=>$request->name, 'guard_name'=>$guard->guard_type]);
        $guard->assignRole($role);

        return redirect()->route('roles.index')->with('success','Role created and assigned.');
    }
}
