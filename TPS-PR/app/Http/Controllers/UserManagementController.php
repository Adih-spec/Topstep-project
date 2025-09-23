<?php

namespace App\Http\Controllers;
use App\Models\UserManagement;
use App\Notifications\AdminCredentialsNotification;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class UserManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        
        return view('user.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name'      => 'required|string|max:100',
            'last_name'       => 'required|string|max:100',
            'other_name'      => 'nullable|string|max:100',
            'email'           => 'required|email|unique:users,email',
            'phone'           => 'nullable|string|max:20',
            'address'         => 'nullable|string|max:255',
            'gender'          => 'nullable|in:male,female,other',
            'marital_status'  => 'nullable|in:single,married,divorced',
            'avatar'          => 'nullable|mimes:jpg,jpeg,png,gif|max:2048',
            'id_type'         => 'nullable|in:staff_id,national_id,passport,drivers_license,voters_card',
            'id_number'       => 'nullable|string|max:100',
            'id_document'     => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:4096'
        ]);

        // Handle avatar upload
        $avatarPath = null;
        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
        }

        // Handle ID document upload
        $idDocumentPath = null;
        if ($request->hasFile('id_document')) {
            $idDocumentPath = $request->file('id_document')->store('id_documents', 'public');
        }

        // Auto-generate password
        $autoPassword = \Str::random(10);

        $user = UserManagement::create([
            'first_name'     => $request->first_name,
            'last_name'      => $request->last_name,
            'other_name'     => $request->other_name,
            'email'          => $request->email,
            'password'       => Hash::make($autoPassword),
            'phone'          => $request->phone,
            'address'        => $request->address,
            'gender'         => $request->gender,
            'marital_status' => $request->marital_status,
            'avatar'         => $avatarPath,
            'id_type'        => $request->id_type,
            'id_number'      => $request->id_number,
            'id_document'    => $idDocumentPath,
            'role'           => $request->role,
            'status'         => 'active', // Set status to active by default
        ]);

        // Notify the user with their credentials
        $user->notify(new AdminCredentialsNotification(
            $user->first_name,
            $user->email,
            $autoPassword
        ));

        return redirect()->route('users.index')->with('success', 'User created successfully and login details sent to email.');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
