<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Mail;
// use App\Mail\AdminCredentialsMail;
use App\Notifications\AdminCredentialsNotification;

class AdminController extends Controller
{
    /**
     * Show the admin dashboard.
     */
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    /**
     * Show the login form.
     */
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    /**
     * Handle login request.
     */
    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::guard('admin')->attempt(
            $request->only('email', 'password'),
            $request->filled('remember')
        )) {
            // Update last login info
            $admin = Auth::guard('admin')->user();
            $admin->update([
                'last_login_at' => now(),
                'last_login_ip' => $request->ip(),
                'user_agent'    => $request->userAgent(),
            ]);

            return redirect()->route('admin.dashboard')
                             ->with('success', 'Welcome back, '.$admin->first_name.'!');
        }

        return back()->withErrors([
            'email' => 'Invalid credentials provided.',
        ])->withInput();
    }

    /**
     * Handle logout.
     */
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login')->with('success', 'Logged out
successfully.');
    }

    /**
     * Show and update profile (optional).
     */
    public function profile()
    {
        return view('admin.profile', ['admin' => Auth::guard('admin')->user()]);
    }

    public function updateProfile(Request $request)
    {
        $admin = Auth::guard('admin')->user();

        $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name'  => 'required|string|max:100',
            'phone'      => 'nullable|string|max:20',
            'avatar'     => 'nullable|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $data = $request->only(['first_name', 'last_name', 'phone']);

        if ($request->hasFile('avatar')) {
            $data['avatar'] = $request->file('avatar')->store('avatars', 'public');
        }

        $admin->update($data);

        return back()->with('success', 'Profile updated successfully.');
    }

    /**
     * Display a listing of the admins.
     */
    public function index()
    {
        $admins = Admin::paginate(10); // paginate results
        return view('admin.index', compact('admins'));
    }

    /**
     * Show the form for creating a new admin.
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created admin in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name'      => 'required|string|max:100',
            'last_name'       => 'required|string|max:100',
            'other_name'      => 'nullable|string|max:100',
            'email'           => 'required|email|unique:admins,email',
            'phone'           => 'nullable|string|max:20',
            'address'         => 'nullable|string|max:255',
            'gender'          => 'nullable|in:male,female,other',
            'marital_status'  => 'nullable|in:single,married,divorced',
            'avatar'          => 'nullable|mimes:jpg,jpeg,png,gif|max:2048',
            'id_type'         => 'nullable|in:staff_id,national_id,passport,drivers_license,voters_card',
            'id_number'       => 'nullable|string|max:100',
            'id_document'     => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:4096',
            // 'role'            => 'required|string',
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

        $admin = Admin::create([
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
            // 'role'           => $request->role ?? 'staff_admin',
            'status'         => true,
        ]);

        // Notify the admin with their credentials
        $admin->notify(new AdminCredentialsNotification(
            $admin->first_name,
            $admin->email,
            $autoPassword
        ));
        return redirect()->route('admins.index')
                 ->with('success', 'Admin created successfully and login details sent to email.');
    }

    /**
     * Display the specified admin.
     */
    public function show(Admin $admin)
    {
        return view('admin.show', compact('admin'));
    }

    /**
     * Show the form for editing the specified admin.
     */
    public function edit(Admin $admin)
    {
        return view('admin.edit', compact('admin'));
    }

    /**
     * Update the specified admin in storage.
     */
    public function update(Request $request, Admin $admin)
    {
        $request->validate([
            'first_name'      => 'required|string|max:100',
            'last_name'       => 'required|string|max:100',
            'other_name'      => 'nullable|string|max:100',
            'email'           => 'required|email|unique:admins,email,'.$admin->admin_id.',admin_id',
            'phone'           => 'nullable|string|max:20',
            'address'         => 'nullable|string|max:255',
            'gender'          => 'nullable|in:male,female,other',
            'marital_status'  => 'nullable|in:single,married,divorced',
            'avatar'          => 'nullable|mimes:jpg,jpeg,png,gif|max:2048',
            'id_type'         => 'nullable|in:staff_id,national_id,passport,drivers_license,voters_card',
            'id_number'       => 'nullable|string|max:100',
            'id_document'     => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:4096',
            'role'            => 'required|string|in:super_admin,principal,vice_principal,exam_officer,finance_officer,staff_admin',
            'status'          => 'required|boolean',
            'password'        => 'nullable|string|min:6|confirmed',
        ]);

        $data = $request->only([
            'first_name', 'last_name', 'other_name', 'email', 'phone', 'address',
            'gender', 'marital_status', 'id_type', 'id_number', 'role', 'status'
        ]);

        // Handle avatar upload
        if ($request->hasFile('avatar')) {
            $data['avatar'] = $request->file('avatar')->store('avatars', 'public');
        }

        // Handle ID document upload
        if ($request->hasFile('id_document')) {
            $data['id_document'] = $request->file('id_document')->store('id_documents', 'public');
        }

        // Handle password update
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $admin->update($data);

        return redirect()->route('admins.index')
                         ->with('success', 'Admin updated successfully.');
    }

    /**
     * Remove the specified admin from storage.
     */
    public function destroy(Admin $admin)
    {
        $admin->delete();

        return redirect()->route('admins.index')
                         ->with('success', 'Admin deleted successfully.');
    }
}