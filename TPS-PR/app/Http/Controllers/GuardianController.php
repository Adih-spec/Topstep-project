<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Guardian;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;

class GuardianController extends Controller
{
    public function index()
    {
        $data['guardians'] = Guardian::all();
        return view('guardians.index', $data);
    }
    //
    public function showRegisterForm()
    {
        return view('guardians.register');
    }
    // Handle registration
        /**
     * Show the form for creating a new resource.
     */
    public function register(Request $request)
    {
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
            'relationship_with_student' => 'required|string|max:255',
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
            'relationship_with_student' => $request->relationship_with_student,
            'number_of_children' => $request->number_of_children,
            'occupation' => $request->occupation,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);
    
        // Login the guardian immediately after registration
        Auth::guard('guardian')->login($guardian);
        return redirect()->route('guardian.dashboard')->with('success', 'Registration successful!');
    }
     

    // Show login form
    public function showLoginForm()
    {
        return view('guardians.login');
    }
    
    public function login(Request $request)
    {
        // validate login fields
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
    
        // attempt login
        if (Auth::guard('guardian')->attempt($request->only('username', 'password'))) {
            return redirect()->intended('/dashboard');
        }
    
        return back()->withErrors(['username' => 'Invalid login credentials']);
    }
    

    // Logout
    public function logout()
    {
        Auth::guard('guardian')->logout();
        return redirect()->route('guardian.login')->with('success', 'Logged out successfully!');
    }
    // Edit Guardian
    public function edit($id)
{
    $guardian = Guardian::findOrFail($id); // fetch guardian by id
    return view('guardians.edit', compact('guardian'));
}
    // Update Guardian
    public function update(Request $request, $id)
{
    $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'other_names' => 'nullable|string|max:255',
        'phone' => 'required|regex:/^[0-9]{10,15}$/|unique:guardians,phone,' . $id,
        'email' => 'required|email|unique:guardians,email,' . $id,
        'religion' => 'required|string|max:255',
        'residential_address' => 'required|string|max:255',
        'country' => 'required|string|max:255',
        'state_of_origin' => 'nullable|string|max:255',
        'lga' => 'nullable|string|max:255',
        'relationship_with_student' => 'required|string|max:255',
        'number_of_children' => 'required|integer|min:0',
        'occupation' => 'nullable|string|max:255',
        'username' => 'required|unique:guardians,username,' . $id,
        // Password is optional during update
        'password' => 'nullable|min:6|string|confirmed',
    ]);

    $guardian = Guardian::findOrFail($id);
    $guardian->first_name = $request->first_name;
    $guardian->last_name = $request->last_name;
    $guardian->other_names = $request->other_names;
    $guardian->phone = $request->phone;
    $guardian->email = $request->email;
    $guardian->religion = $request->religion;
    $guardian->residential_address = $request->residential_address;
    $guardian->country = $request->country;
    $guardian->state_of_origin = $request->state_of_origin;
    $guardian->lga = $request->lga;
    $guardian->relationship_with_student = $request->relationship_with_student;
    $guardian->number_of_children = $request->number_of_children;
    $guardian->occupation = $request->occupation;
    $guardian->username = $request->username;

    // Update password only if provided
    if ($request->filled('password')) {
        $guardian->password = Hash::make($request->password);
    }

    $guardian->save();

    return redirect()->route('guardians.index')->with('success', 'Guardian updated successfully.');

}

    // Delete Guardian
    public function destroy(Guardian $guardian)
    {
        $guardian->delete();
        return redirect()->route('guardians.index')->with('success', 'Guardian deleted successfully.');
    }
    // Show Guardian Details
    public function show($id)
    {
        $guardian = Guardian::findOrFail($id);
        $students = Student::all(); 
        return view('guardians.show', compact('guardian', 'students'));
    }
    public function showAssignForm(Guardian $guardian)
    {
        // Fetch all students
        $students = Student::all();
    
        return view('guardians.assign', compact('guardian', 'students'));
    }

public function assignStudent(Request $request, Guardian $guardian)
{
    $request->validate([
        'students' => 'required|array',
    ]);

    // attach or sync students
    $guardian->students()->sync($request->students);

    return redirect()->route('guardians.index')->with('success', 'Students assigned successfully!');
}
}
