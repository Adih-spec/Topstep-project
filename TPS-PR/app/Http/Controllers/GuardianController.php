<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Models\Guardian;
use App\Models\Student;
use App\Mail\GuardianWelcomeMail;

class GuardianController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'email'      => 'required|email|unique:guardians,email',
        ]);

        // Generate random password
        $plainPassword = Str::random(8);

        // Create guardian
        $guardian = Guardian::create([
            'first_name' => $validated['first_name'],
            'last_name'  => $validated['last_name'],
            'email'      => $validated['email'],
            'password'   => Hash::make($plainPassword),
        ]);

        // Send welcome email with login credentials
        Mail::to($guardian->email)->send(new GuardianWelcomeMail($guardian, $plainPassword));

        return redirect()->route('guardians.index')
            ->with('success', "Guardian created successfully, login details sent to email.");
    }

    // List guardians
    public function index()
    {
        $guardians = Guardian::all();
        return view('guardians.index', compact('guardians'));
    }

    // Guardian self-registration form
    public function showRegisterForm()
    {
        return view('guardians.register');
    }

    // Handle guardian self-registration
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
            'city' => 'nullable|string|max:255',
            'occupation' => 'nullable|string|max:255',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',

        ]);

        // Generate random password
        $plainPassword = Str::random(8);    // Prepare guardian data
        $data = $request->except('photo');
        $data['password'] = Hash::make($plainPassword);
    
        // Handle photo upload
        if ($request->hasFile('photo')) {
            $fileName = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('uploads/guardians'), $fileName);
            $data['photo'] = 'uploads/guardians/' . $fileName;
        }


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
            'city' => $request->city,
            'occupation' => $request->occupation,
            'photo' => $data['photo'] ?? null,
            'password' => Hash::make($plainPassword),
        ]);

        // Auto login guardian
        Auth::guard('guardian')->login($guardian);

        return redirect()->route('guardians.index')->with('success', 'Registration successful!');
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
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::guard('guardian')->attempt(
            $request->only('email', 'password'),
            $request->filled('remember')
        )) {
            return redirect()->intended('/dashboard');
        }

        return back()->withErrors(['email' => 'Invalid login credentials']);
    }

    // Logout
    public function logout()
    {
        Auth::guard('guardian')->logout();
        return redirect()->route('guardians.login')->with('success', 'Logged out successfully!');
    }


// Update guardian 
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
        'city' => 'nullable|string|max:255',
        'occupation' => 'nullable|string|max:255',
        'photo' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
    ]);

    $guardian = Guardian::findOrFail($id);

    // Collect all request data except photo
    $data = $request->except('photo');

    // Handle photo upload if exists
    if ($request->hasFile('photo')) {
        $fileName = time() . '.' . $request->photo->extension();
        $request->photo->move(public_path('uploads/guardians'), $fileName);

        // Optional: delete old photo if exists
        if ($guardian->photo && file_exists(public_path($guardian->photo))) {
            unlink(public_path($guardian->photo));
        }

        $data['photo'] = 'uploads/guardians/' . $fileName;
    }

    // Update guardian with new data
    $guardian->update($data);

    return redirect()->route('guardians.index')->with('success', 'Guardian updated successfully.');
}

    // Delete guardian
    public function destroy(Guardian $guardian)
    {
        $guardian->delete();
        return redirect()->route('guardians.index')->with('success', 'Guardian deleted successfully.');
    }

    // Show guardian details
    public function show($id)
    {
        $guardian = Guardian::findOrFail($id);
        $students = Student::all();
        return view('guardians.show', compact('guardian', 'students'));
    }

    // Show student assignment form
    public function showAssignForm(Guardian $guardian)
    {
        $students = Student::all();
        return view('guardians.assign', compact('guardian', 'students'));
    }

    // Assign students to guardian
    public function assignStudents(Request $request, $guardianId)
    {
        $guardian = Guardian::findOrFail($guardianId);
        $guardian->students()->sync($request->input('students', []));
        return redirect()->route('guardians.show', $guardian->id)
            ->with('success', 'Students updated successfully.');
    }

    // Show change password form
    public function showChangePasswordForm()
    {
        return view('guardians.change-password');
    }

    // Handle password change
    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
        ]);

        $guardian = Auth::guard('guardian')->user();

        if (!Hash::check($request->current_password, $guardian->password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect']);
        }

        $guardian->password = Hash::make($request->new_password);
        $guardian->save();

        return redirect()->route('guardians.index')->with('success', 'Password changed successfully!');
    }

    public function restore($id)
    {
        $guardian = Guardian::onlyTrashed()->findOrFail($id);
        $guardian->restore();
    
        return redirect()->route('guardians.index')
            ->with('success', 'Guardian restored successfully.');
    }
    

    public function recycleBin()
    {
        $guardians = Guardian::onlyTrashed()->get();
        return view('guardians.recycle-bin', compact('guardians'));
    }
    public function forceDelete($id)
    {
        $guardian = Guardian::onlyTrashed()->findOrFail($id);
        $guardian->forceDelete();
        return redirect()->route('guardians.index')->with('success', 'Guardian permanently deleted.');
    }

}