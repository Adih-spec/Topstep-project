<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\ClassLevel;
use App\Models\Subject;
use Illuminate\Support\Facades\Hash;
use App\Notifications\UserCredentialsNotification;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        // Fetch students with pagination
        $students = Student::withTrashed()->paginate(10);

        // Dashboard stats
        $totalStudents = Student::count();
        $maleStudents = Student::where('gender', 'male')->count();
        $femaleStudents = Student::where('gender', 'female')->count();

        return view('components.students.index', compact('students', 'totalStudents', 'maleStudents', 'femaleStudents'));
    }

    public function create()
    {
        $classLevels = ClassLevel::with('streams')->get();
        return view('components.students.create', compact('classLevels'));
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
            'class_level_id'    => 'required|exists:class_levels,id',
            'stream_id'         => 'nullable|exists:streams,id',
            'country'           => 'nullable|string|max:100',
            'state_of_origin'   => 'nullable|string|max:100',
            'religion'          => 'nullable|string|max:100',
            'address'           => 'nullable|string|max:255',
            'admission_number'  => 'nullable|string|max:50|unique:students,admission_number',
            'admission_date'    => 'nullable|date',
            'photo'             => 'nullable|mimes:jpg,jpeg,png,gif|max:2048',
            'subjects'          => 'array',
            'subjects.*'        => 'exists:subjects,id',
        ]);

        // Handle photo upload
        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('students/photos', 'public');
        }

        $autoPassword = \Str::random(10);

        $student = Student::create([
            'first_name'        => $request->first_name,
            'middle_name'       => $request->middle_name,
            'last_name'         => $request->last_name,
            'email'             => $request->email,
            'password'          => Hash::make($autoPassword),
            'phone'             => $request->phone,
            'dob'               => $request->dob,
            'gender'            => $request->gender,
            'class_level_id'    => $request->class_level_id,
            'stream_id'         => $request->stream_id,
            'country'           => $request->country,
            'state_of_origin'   => $request->state_of_origin,
            'religion'          => $request->religion,
            'address'            => $request->address,
            'admission_number'  => $request->admission_number,
            'admission_date'    => $request->admission_date,
            'photo'             => $photoPath,
            'status'            => 'active',
        ]);

        // Attach selected subjects
        $student->subjects()->attach($request->input('subjects', []));

        // Send notification
        $student->notify(new UserCredentialsNotification(
            $student->first_name . ' ' . $student->last_name,
            $student->email,
            $autoPassword,
            'Student'
        ));

        return redirect()->route('students.index')
            ->with('success', 'Student created successfully and login credentials sent to email.');
    }

    public function edit(Student $student)
    {
        $classLevels = ClassLevel::with('streams')->get();
        $selectedSubjects = $student->subjects->pluck('id')->toArray();
        return view('components.students.edit', compact('student', 'classLevels', 'selectedSubjects'));
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
            'class_level_id'    => 'required|exists:class_levels,id',
            'stream_id'         => 'nullable|exists:streams,id',
            'country'           => 'nullable|string|max:100',
            'state_of_origin'   => 'nullable|string|max:100',
            'religion'          => 'nullable|string|max:100',
            'address'           => 'nullable|string|max:255',
            'admission_number'  => 'nullable|string|max:50|unique:students,admission_number,' . $student->id,
            'admission_date'    => 'nullable|date',
            'photo'             => 'nullable|mimes:jpg,jpeg,png,gif|max:2048',
            'subjects'          => 'array',
            'subjects.*'        => 'exists:subjects,id',
            'status'            => 'required|in:active,inactive',
        ]);

        // Handle photo upload
        $photoPath = $student->photo;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('students/photos', 'public');
        }

        $student->update([
            'first_name'        => $request->first_name,
            'middle_name'       => $request->middle_name,
            'last_name'         => $request->last_name,
            'email'             => $request->email,
            'phone'             => $request->phone,
            'dob'               => $request->dob,
            'gender'            => $request->gender,
            'class_level_id'    => $request->class_level_id,
            'stream_id'         => $request->stream_id,
            'country'           => $request->country,
            'state_of_origin'   => $request->state_of_origin,
            'religion'          => $request->religion,
            'address'           => $request->address,
            'admission_number'  => $request->admission_number,
            'admission_date'    => $request->admission_date,
            'photo'             => $photoPath,
            'status'            => $request->status,
        ]);

        // Sync subjects
        $student->subjects()->sync($request->input('subjects', []));

        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Student deleted (soft delete) successfully.');
    }

    public function restore($id)
    {
        $student = Student::withTrashed()->findOrFail($id);
        $student->restore();
        return redirect()->route('students.index')->with('success', 'Student restored successfully.');
    }

    public function view($id)
    {
        $student = Student::withTrashed()->findOrFail($id);
        return view('components.students.view-students', compact('student'));
    }

    public function recycle()
    {
        $students = Student::onlyTrashed()->paginate(10);
        return view('components.students.recycle', compact('students'));
    }

    public function forceDelete($id)
    {
        $student = Student::onlyTrashed()->findOrFail($id);
        $student->forceDelete();
        return redirect()->route('students.recycle')->with('success', 'Student permanently deleted.');
    }

    public function getSubjects($classLevelId, $streamId = null)
    {
        $subjects = Subject::whereHas('classLevels', function ($query) use ($classLevelId, $streamId) {
            $query->where('class_level_id', $classLevelId)
                  ->where('stream_id', $streamId); // Matches nullable stream
        })->get();

        return response()->json($subjects);
    }
}