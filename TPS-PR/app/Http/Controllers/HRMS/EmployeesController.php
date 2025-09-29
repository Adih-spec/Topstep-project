<?php

namespace App\Http\Controllers\HRMS;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

// models
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\HRMS\Employee;
use App\Models\HRMS\Department;
use App\Models\HRMS\EmployeesAttendance;
use App\Models\Guard;

class EmployeesController extends Controller
{
    /**
     * Display a listing of employees.
     */
    public function index()
    {
        $employees = Employee::latest()->with(['department'])->paginate(10);
        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new employee.
     */
    public function create()
    {
        $data['departments'] = Department::all();
        $data['roles'] = Role::where('guard_name', 'staff')->get();
        return view('employees.create', $data);
    }

    /**
     * Store a newly created employee.
     */
    public function store(Request $request)
    {
        $request->validate([
            'DepartmentID'     => 'nullable|exists:departments,DepartmentID',
            'FirstName'        => 'required|string|max:100',
            'LastName'         => 'required|string|max:100',
            'Email'            => 'required|email|unique:employees,Email',
            'PhoneNumber'      => 'required|string|max:20',
            'DateOfBirth'      => 'required|date',
            'Gender'           => 'required|in:Male,Female',
            'Role'             => 'required|in:teacher,non-teacher',
            'JobTitle'         => 'required|string|max:100',
            'HireDate'         => 'required|date',
            'Status'           => 'required|in:Active,Inactive',
            'Address'          => 'required|string|max:255',
            'City'             => 'nullable|string|max:100',
            'State'            => 'required|string|max:100',
            'Country'          => 'required|string|max:100',
            'EmergencyContact' => 'required|string|max:100',
            'ProfilePicture'   => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'EmployeeNumber'   => 'nullable|string|max:30|unique:employees,EmployeeNumber',
        ]);

        $randomPassword = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 8);
        $request->merge(['Password' => Hash::make($randomPassword)]);

        // Handle profile picture upload
        $profilePath = null;
        if ($request->hasFile('ProfilePicture')) {
            $file = $request->file('ProfilePicture');
            $filename = time() . '_' . $file->getClientOriginalName();
            $profilePath = $file->storeAs('uploads/profile_pictures', $filename, 'public');
        }

        Employee::create([
            'DepartmentID'     => $request->DepartmentID,
            'FirstName'        => $request->FirstName,
            'LastName'         => $request->LastName,
            'Email'            => $request->Email,
            'PhoneNumber'      => $request->PhoneNumber,
            'DateOfBirth'      => $request->DateOfBirth,
            'Gender'           => $request->Gender,
            'Role'             => $request->Role,
            'JobTitle'         => $request->JobTitle,
            'HireDate'         => $request->HireDate,
            'Status'           => $request->Status,
            'Address'          => $request->Address,
            'City'             => $request->City,
            'State'            => $request->State,
            'Country'          => $request->Country,
            'EmergencyContact' => $request->EmergencyContact,
            'ProfilePicture'   => $profilePath,
            'EmployeeNumber'   => $request->EmployeeNumber,
            'Password'         => $request->Password
        ]);

        return redirect()->route('employees.index')->with('success', 'Employee created successfully.');
    }

    /**
     * Show the form for editing an employee.
     */
    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        $departments = Department::all();
        return view('employees.edit', compact('employee', 'departments'));
    }

    public function show()  {
        
    }
    /**
     * Update the specified employee.
     */
    public function update(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);

        $request->validate([
            'DepartmentID'     => 'nullable|exists:departments,DepartmentID',
            'FirstName'        => 'required|string|max:100',
            'LastName'         => 'required|string|max:100',
            'Email'            => 'required|email|unique:employees,Email,' . $employee->EmployeeID . ',EmployeeID',
            'PhoneNumber'      => 'required|string|max:20',
            'DateOfBirth'      => 'required|date',
            'Gender'           => 'required|in:Male,Female',
            'Role'             => 'required|in:teacher,non-teacher',
            'JobTitle'         => 'required|string|max:100',
            'HireDate'         => 'required|date',
            'Status'           => 'required|in:Active,Inactive',
            'Address'          => 'required|string|max:255',
            'City'             => 'nullable|string|max:100',
            'State'            => 'required|string|max:100',
            'Country'          => 'required|string|max:100',
            'EmergencyContact' => 'required|string|max:100',
            'ProfilePicture'   => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'EmployeeNumber'   => 'nullable|string|max:30|unique:employees,EmployeeNumber,' . $employee->EmployeeID . ',EmployeeID',
            'Password'         => 'nullable|string|min:6|confirmed',
        ]);

        $data = $request->except('Password');

        // Handle profile picture update
        if ($request->hasFile('ProfilePicture')) {
            $file = $request->file('ProfilePicture');
            $filename = time() . '_' . $file->getClientOriginalName();
            $data['ProfilePicture'] = $file->storeAs('uploads/profile_pictures', $filename, 'public');
        }

        // Handle password update
        if ($request->filled('Password')) {
            $data['Password'] = Hash::make($request->Password);
        } else {
            $data['Password'] = $employee->Password; // keep old one
        }

        $employee->update($data);

        return redirect()->route('employees.index')->with('success', 'Employee updated successfully.');
    }

    /**
     * Remove the specified employee.
     */
    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully.');
    }

    // Additional methods for employee-specific actions can be added here
     /**
     * Show login page
     */
    public function showLoginForm()
    {
        return view('components.Auth.login', ['guard' => 'staff']); // Jetstream default login
    }

    /**
     * Handle login request
     */
    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        if (Auth::attempt(['Email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->route('dashboard')->with('success', 'Login successful!');
        }

        return back()->withErrors(['email' => 'Invalid credentials provided']);
    }

    /**
     * Logout user
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->with('success', 'You have been logged out.');
    }

    /**
     * Dashboard after login
     */
    public function dashboard()
    {
        $employeesCount = Employee::count();
        $departmentsCount = Department::count();
        return view('dashboard', compact('employeesCount', 'departmentsCount'));
    }

    /**
     * Show profile page
     */
    public function profile()
    {
        $employee = Auth::user();
        return view('profile.show', compact('employee'));
    }

    /**
     * Update profile info
     */
    public function updateProfile(Request $request)
    {
        $employee = Auth::user();

        $request->validate([
            'FirstName' => 'required|string|max:100',
            'LastName'  => 'required|string|max:100',
            'Email'     => [
                'required',
                'email',
                Rule::unique('employees', 'Email')->ignore($employee->EmployeeID, 'EmployeeID')
            ],
            'PhoneNumber' => 'nullable|string|max:20',
            'ProfilePicture' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->only(['FirstName', 'LastName', 'Email', 'PhoneNumber']);

        // Handle profile picture upload
        if ($request->hasFile('ProfilePicture')) {
            if ($employee->ProfilePicture && \Storage::disk('public')->exists($employee->ProfilePicture)) {
                \Storage::disk('public')->delete($employee->ProfilePicture);
            }
            $file = $request->file('ProfilePicture');
            $filename = time().'_'.$file->getClientOriginalName();
            $data['ProfilePicture'] = $file->storeAs('uploads/profile_pictures', $filename, 'public');
        }

        $employee->update($data);

        return back()->with('success', 'Profile updated successfully.');
    }

    /**
     * Update password
     */
    public function updatePassword(Request $request)
    {
        $employee = Auth::user();

        $request->validate([
            'current_password' => 'required|string',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if (!Hash::check($request->current_password, $employee->Password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect']);
        }

        $employee->update([
            'Password' => Hash::make($request->password),
        ]);

        return back()->with('success', 'Password updated successfully.');
    }
}
