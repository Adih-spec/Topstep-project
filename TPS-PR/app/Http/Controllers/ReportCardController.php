<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Term;
use App\Models\Subject;
use App\Models\ReportCard;

class ReportCardController extends Controller
{
    public function create()
    {
        // Fetch necessary data
        $students = Student::all();
        $terms = Term::all();
        $subjects = Subject::all();

        return view('components.report-cards.create', compact('students', 'terms', 'subjects'));
    }

    public function store(Request $request)
    {
        // Validate form input
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'term_id' => 'required|exists:terms,id',
            'grades' => 'required|array',
        ]);

        // Create a new report card entry
        foreach ($request->grades as $subjectId => $grade) {
            ReportCard::create([
                'student_id' => $request->student_id,
                'term_id' => $request->term_id,
                'subject_id' => $subjectId,
                'grade' => $grade,
            ]);
        }

        return redirect()->route('report-card.show', [
            'student' => $request->student_id,
            'term' => $request->term_id
        ])->with('success', 'Report card created successfully!');
    }
}

