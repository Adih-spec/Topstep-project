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
    // ========================
    // Admin Guardian Management
    // ========================

    // List guardians
    public function index()
    {
        $guardians = Guardian::all();
        return view('guardians.index', compact('guardians'));
    }

    // Show form for creating a guardian (admin use only)
    public function create()
    {
        return view('guardians.create');
    }

    // Store guardian in DB (admin use only)
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'email'      => 'required|email|unique:guardians,email',
            'phone'      => 'nullable|unique:guardians|regex:/^[0-9]{10,15}$/',
            'religion'   => 'nullable|string|max:255',
            'residential_address' => 'nullable|string|max:255',
            'country'    => 'nullable|string|max:255',
            'state_of_origin' => 'nullable|string|max:255',
            'city'       => 'nullable|string|max:255',
            'occupation' => 'nullable|string|max:255',
            'photo'      => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        // Generate random password
        $plainPassword = Str::random(8);

        // Handle photo upload
        if ($request->hasFile('photo')) {
            $fileName = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('uploads/guardians'), $fileName);
            $validated['photo'] = 'uploads/guardians/' . $fileName;
        }

        // Save guardian
        $validated['password'] = Hash::make($plainPassword);

        $guardian = Guardian::create($validated);

        // Send welcome email with login credentials
        Mail::to($guardian->email)->send(new GuardianWelcomeMail($guardian, $plainPassword));

        return redirect()->route('guardians.index')
            ->with('success', "Guardian created successfully, login details sent to email.");
    }

    // Show guardian details
    public function show($id)
    {
        $guardian = Guardian::findOrFail($id);
        $students = Student::all();
        return view('guardians.show', compact('guardian', 'students'));
    }

    // Delete guardian
    public function destroy(Guardian $guardian)
    {
        $guardian->delete();
        return redirect()->route('guardians.index')->with('success', 'Guardian deleted successfully.');
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