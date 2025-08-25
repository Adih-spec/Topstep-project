<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Guardian;
use Illuminate\Support\Facades\Hash;

class GuardianController extends Controller
{
    public function index()
    {
        $data['guardians'] = Guardian::all();
        return view('guardians.index', $data);
    }
    //
    public function showRegister()
    {
        return view('guardians.register');
    }
    // Handle registration
        /**
     * Show the form for creating a new resource.
     */
    public function register(Request $request)
    {
        //
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'other_names' => 'nullable|string|max:255',
            'phone' => 'required|unique:guardians|regex:/^[0-9]{10,15}$/',
            'email' => 'required|email|unique:guardians',
            'religion' => 'required|string|max:255',
            'residential_address' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'state_of_origin' => 'nullable|string|max:255',
            'lga' => 'nullable|string|max:255',
            'relationship_to_student' => 'required|string|max:255',
            'number_of_children' => 'required|integer|min:0',
            'occupation' => 'nullable|string|max:255',
            'username' => 'required|unique:guardians',
            'password' => 'required|min:6|string|confirmed',
        ]);
        $guardian = Guardian::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'other_names' => $request->other_names,
            'phone' => $request->phone,
            'email' => $request->email,
            'religion' => $request->religion,
            'residential_address' => $request->residential_address,
            'country' => $request->country,
            'state_of_origin' => $request->state_of_origin,
            'lga' => $request->lga,
            'relationship_to_student' => $request->relationship_to_student,
            'number_of_children' => $request->number_of_children_in_school,
            'occupation' => $request->occupation,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);
        Auth::login($guardian);
        return redirect()->route('guardian.login')->with('success', 'Registration successful! Please login');
    }

    // Show login form
    public function showLoginForm()
    {
        return view('guardians.login');
    }

    // Handle login
    public function login(Request $request)
    {

        $request->validate([
            'username' => 'required|string',
            'password' => 'required|min:6|string',
        ]);
        // Attempt to log the guardian in
        // Check if the guardian exists and the password is correct

        if (Auth::guard('guardian')->attempt(['username' => $request->username, 'password' => $request->password])) {
            // Authentication passed
            return redirect()->route('guardian.dashboard')->with('success', 'Login successful!');
        }

        return back()->withErrors([
            'error' => 'Invalid username or password.',
        ]);
    }

    // Logout
    public function logout()
    {
        Auth::guard('guardian')->logout();
        return redirect()->route('guardian.login')->with('success', 'Logged out successfully!');
    }

    // Dashboard
    public function dashboard()
    {
        return view('guardians.dashboard');
    }

    
}
