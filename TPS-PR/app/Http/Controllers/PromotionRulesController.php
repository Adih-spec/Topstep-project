<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\ClassModel; // Adjust to your Class model name
use App\Models\Session;
use App\Models\Promotion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PromotionController extends Controller
{
    public function index(Request $request)
    {
        $classes = ClassModel::all();
        $sessions = Session::all();

        $classId = $request->input('class_id');
        $sessionId = $request->input('session_id');

        $students = Student::when($classId, fn($query) => $query->where('class_id', $classId))
                           ->when($sessionId, fn($query) => $query->where('session_id', $sessionId))
                           ->get();

        $nextSession = Session::where('id', '>', $sessionId)->orderBy('id')->first(); // Assuming sessions are sequential

        return view('promotions.index', compact('students', 'classes', 'sessions', 'classId', 'sessionId', 'nextSession'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_ids' => 'required|array',
            'to_class_id' => 'required|exists:classes,id',
            'to_session_id' => 'required|exists:sessions,id',
            'promotion_date' => 'required|date',
        ]);

        DB::transaction(function () use ($request) {
            foreach ($request->student_ids as $studentId) {
                $student = Student::findOrFail($studentId);

                Promotion::create([
                    'student_id' => $student->id,
                    'from_class_id' => $student->class_id,
                    'to_class_id' => $request->to_class_id,
                    'from_session_id' => $student->session_id,
                    'to_session_id' => $request->to_session_id,
                    'promotion_date' => $request->promotion_date,
                    'status' => 'promoted',
                    'remarks' => $request->input('remarks.' . $student->id),
                ]);

                // Update student's current class and session
                $student->update([
                    'class_id' => $request->to_class_id,
                    'session_id' => $request->to_session_id,
                ]);
            }
        });

        return redirect()->route('promotions.index')->with('success', 'Students promoted successfully.');
    }

    public function history()
    {
        $promotions = Promotion::with(['student', 'fromClass', 'toClass', 'fromSession', 'toSession'])->paginate(20);
        return view('promotions.history', compact('promotions'));
    }
}