<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // Show list of students
    public function index()
    {
        $students = Student::paginate(10);
        return view('students.index', compact('students'));
    }

    // Show create form
    public function create()
    {
        return view('students.create');
    }

    // Store new student
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:students',
        ]);

        Student::create($request->all());

        return redirect()->route('students.index')
                         ->with('success', 'Student created successfully.');
    }

    // Show student details
    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    // Show edit form
    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    // Update student
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name'  => 'required',
            'email' => 'required|email|unique:students,email,' . $student->id,
        ]);

        $student->update($request->all());

        return redirect()->route('students.index')
                         ->with('success', 'Student updated successfully.');
    }

    // Delete student
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index')
                         ->with('success', 'Student deleted successfully.');
    }
}