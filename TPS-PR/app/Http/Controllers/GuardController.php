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
        $guards = Guard::latest()->paginate(10); // or ->all() if no pagination
        return view('components.guards.index', compact('guards'));
    }

    public function create()
{
    return view('components.guards.create');
}

public function store(Request $request)
{
    $request->validate([
        'guard_name' => 'required|unique:guards,guard_name|max:255',
    ]);

    Guard::create([
        'guard_name' => $request->guard_name,
    ]);

    return redirect()->route('guards.index')
        ->with('success', 'Guard created successfully!');
}

        public function destroy(Guard $guard)
{
    $guard->delete();

    return redirect()->route('guards.index')
        ->with('success', 'Guard user deleted successfully.');
}
}
