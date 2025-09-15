<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        // Fetch both active and soft deleted students
        $data['students'] = Student::withTrashed()->get();
        // Dashboard stats
        $data['totalStudents'] = \App\Models\Student::count();
        $data['maleStudents']= \App\Models\Student::where('gender', 'male')->count();
        $data['femaleStudents'] = \App\Models\Student::where('gender', 'female')->count();
    
        // Get paginated student list
        $students = \App\Models\Student::paginate(10);
        return view('components.students.index',$data);
    }

    public function create()
    {
        return view('components.students.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'first_name'        => 'required|string|max:100',
        'middle_name'       => 'nullable|string|max:100',
        'last_name'         => 'required|string|max:100',
        'email'             => 'required|email|unique:students,email',
        'phone'             => 'nullable|string|max:20',
        'dob'               => 'nullable|date',
        'gender'            => 'nullable|string',
        'address'           => 'nullable|string',
        'class'             => 'nullable|string|max:50',
        'admission_number'  => 'nullable|string|max:50|unique:students,admission_number',
        'admission_date'    => 'nullable|date',
        'country'           => 'nullable|string|max:100',
        'state_of_origin'   => 'nullable|string|max:100',
        'religion'          => 'nullable|string|max:100',
        'photo'             => 'nullable|string',
        // ❌ removed 'status' from validation
    ]);

    // ✅ Set default status
    $data = $request->all();
    $data['status'] = 'active';

    Student::create($data);

    return redirect()->route('students.index')->with('success', 'Student created successfully.');
}


    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
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

