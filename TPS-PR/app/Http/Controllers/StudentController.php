<?php
namespace App\Http\Controllers;

use App\Models\students;
use Illuminate\Http\Request;

class StudentController extends Controller{

    public function index()
    {
        $students = students::paginate(10);
        return view('components.students.index', compact('students'));
    }
    
    public function create()
    {
        return view('students.create');
    }
    
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
    
    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }
    
    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }
    
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:students,email,' . $student->id,
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
