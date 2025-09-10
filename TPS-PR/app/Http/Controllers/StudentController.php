<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        // Dashboard stats
        $totalStudents = \App\Models\Student::count();
        $activeStudents = \App\Models\Student::where('is_active', 1)->count();
        $maleStudents = \App\Models\Student::where('gender', 'male')->count();
        $femaleStudents = \App\Models\Student::where('gender', 'female')->count();
    
        // Get paginated student list
        $students = \App\Models\Student::paginate(10);
    
        return view('components.students.index', compact(
            'totalStudents',
            'activeStudents',
            'maleStudents',
            'femaleStudents',
            'students'
        ));
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
            'email'             => 'required|email|unique:students,email',
            'phone'             => 'nullable|string|max:20',
            'dob'               => 'nullable|date',
            'gender'            => 'nullable|string',
            'address'           => 'nullable|string',
            'class_id'          => 'nullable|integer',
            'admission_number'  => 'nullable|string|max:50|unique:students,admission_number',
            'admission_date'    => 'nullable|date',
            'guardian_name'     => 'nullable|string|max:150',
            'guardian_phone'    => 'nullable|string|max:20',
            'photo'             => 'nullable|string', // or 'nullable|image' if uploading
            'is_active'         => 'boolean',
        ]);

        Student::create($request->all());

        return redirect()->route('students.index')
            ->with('success', 'Student created successfully.');
    }

    public function show(Student $student)
    {
        return view('components.students.show', compact('student'));
    }

    public function edit(Student $student)
    {
        return view('components.students.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'first_name'        => 'required|string|max:100',
            'last_name'         => 'required|string|max:100',
            'email'             => 'required|email|unique:students,email,' . $student->id,
            'phone'             => 'nullable|string|max:20',
            'dob'               => 'nullable|date',
            'gender'            => 'nullable|string',
            'address'           => 'nullable|string',
            'class_id'          => 'nullable|integer',
            'admission_number'  => 'nullable|string|max:50|unique:students,admission_number,' . $student->id,
            'admission_date'    => 'nullable|date',
            'guardian_name'     => 'nullable|string|max:150',
            'guardian_phone'    => 'nullable|string|max:20',
            'photo'             => 'nullable|string',
            'is_active'         => 'boolean',
        ]);

        $student->update($request->all());

        return redirect()->route('students.index')
            ->with('success', 'Student updated successfully.');
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index')
            ->with('success', 'Student deleted successfully.');
    }
}

