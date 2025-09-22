<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Support\Facades\Hash;
use App\Notifications\AdminCredentialsNotification;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
{
    // Fetch students with pagination
    $students = \App\Models\Student::withTrashed()->paginate(10);

    // Dashboard stats
    $totalStudents = \App\Models\Student::count();
    $maleStudents = \App\Models\Student::where('gender', 'male')->count();
    $femaleStudents = \App\Models\Student::where('gender', 'female')->count();

    return view('components.students.index', compact('students', 'totalStudents', 'maleStudents', 'femaleStudents'));
}


    public function create()
    {
        return view('components.students.create');
    }

 public function store(Request $request)
{
    $request->validate([
        'first_name'        => 'required|string|max:100',
        'last_name'         => 'required|string|max:100',
        'middle_name'       => 'nullable|string|max:100',
        'email'             => 'required|email|unique:students,email',
        'phone'             => 'nullable|string|max:20',
        'dob'               => 'nullable|date',
        'gender'            => 'nullable|string',
        'class'             => 'nullable|string|max:50',
        'country'           => 'nullable|string|max:100',
        'state_of_origin'   => 'nullable|string|max:100',
        'religion'          => 'nullable|string|max:100',
        'address'           => 'nullable|string|max:255',
        'admission_number'  => 'nullable|string|max:50|unique:students,admission_number',
        'admission_date'    => 'nullable|date',
        'photo'             => 'nullable|mimes:jpg,jpeg,png,gif|max:2048',
    ]);

    // ✅ Handle photo upload
    $photoPath = null;
    if ($request->hasFile('photo')) {
        $photoPath = $request->file('photo')->store('students/photos', 'public');
    }

    // ✅ Auto-generate password
    $autoPassword = \Str::random(10);

    // ✅ Create Student
    $student = Student::create([
        'first_name'        => $request->first_name,
        'middle_name'       => $request->middle_name,
        'last_name'         => $request->last_name,
        'email'             => $request->email,
        'password'          => Hash::make($autoPassword),
        'phone'             => $request->phone,
        'dob'               => $request->dob,
        'gender'            => $request->gender,
        'class'             => $request->class,
        'country'           => $request->country,
        'state_of_origin'   => $request->state_of_origin,
        'religion'          => $request->religion,
        'address'           => $request->address,
        'admission_number'  => $request->admission_number,
        'admission_date'    => $request->admission_date,
        'photo'             => $photoPath,
        'status'            => 'active',
    ]);

    // ✅ Notify Student with credentials
    $student->notify(new AdminCredentialsNotification(
        $student,
        $autoPassword
    ));

    return redirect()->route('students.index')
        ->with('success', 'Student created successfully and login credentials sent to email.');
}



    public function edit(Student $student)
    {
        return view('components.students.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'first_name'        => 'required|string|max:100',
            'middle_name'       => 'nullable|string|max:100',
            'last_name'         => 'required|string|max:100',
            'email'             => 'required|email|unique:students,email,' . $student->id,
            'phone'             => 'nullable|string|max:20',
            'dob'               => 'nullable|date',
            'gender'            => 'nullable|string',
            'address'           => 'nullable|string',
            'class'             => 'nullable|string|max:50',
            'admission_number'  => 'nullable|string|max:50|unique:students,admission_number,' . $student->id,
            'admission_date'    => 'nullable|date',
            'country'           => 'nullable|string|max:100',
            'state_of_origin'   => 'nullable|string|max:100',
            'religion'          => 'nullable|string|max:100',
            'guardian_name'     => 'nullable|string|max:150',
            'guardian_phone'    => 'nullable|string|max:20',
            'photo'             => 'nullable|string',
            'status'            => 'required|in:active,inactive', // ✅ status added
        ]);

        $student->update($request->all());

        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }

    public function destroy(Student $student)
    {
        // Soft delete instead of permanent delete
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Student deleted (soft delete) successfully.');
    }

    public function restore($id)
    {
        $student = Student::withTrashed()->findOrFail($id);
        $student->restore();

        return redirect()->route('students.index')->with('success', 'Student restored successfully.');
    }
}

