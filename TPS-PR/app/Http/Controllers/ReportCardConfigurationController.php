<?php

namespace App\Http\Controllers;

use App\Models\ReportCardConfiguration;
use Illuminate\Http\Request;

class ReportCardConfigurationController extends Controller
{
    /**
     * Display a listing of the configurations.
     */
    public function index()
    {
        $configs = ReportCardConfiguration::all();
        return view('components.report_configs.index', compact('configs'));
    }

    /**
     * Show the form for creating a new configuration.
     */
    public function create()
    {
        return view('components.report_configs.create');
    }

    /**
     * Store a newly created configuration in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|unique:report_card_configurations,title',
            'description' => 'nullable|string',
            'grading_scale' => 'required|array',
            'weights' => 'required|array',
            'student_info_fields' => 'nullable|array',
            'cognitive_domain' => 'nullable|array',
            'affective_domain' => 'nullable|array',
            'psycomotor_domain' => 'nullable|array',
            'behavior_fields' => 'nullable|array',
            'template_style' => 'required|in:modern,classic',
            'logo_url' => 'nullable|string',
            'stamp_url' => 'nullable|string',
            'signature_url' => 'nullable|string',
        ]);

        $data['created_by'] = auth()->id();

        ReportCardConfiguration::create($data);

        return redirect()->route('report-configs.index')->with('success', 'Report card configuration created successfully.');
    }

    /**
     * Display the specified configuration.
     */
    public function show(ReportCardConfiguration $reportConfig)
{
    $student = (object)[
        'name' => 'Jane Doe',
        'class' => 'Primary 5',
        'admission_no' => 'A102'
    ];

    $subjects = [
        ['name' => 'Mathematics', 'first' => 75, 'second' => 80, 'third' => 90, 'teacher' => 'Mr. Adams'],
        ['name' => 'English', 'first' => 65, 'second' => 70, 'third' => 85, 'teacher' => 'Mrs. Brown'],
        ['name' => 'Science', 'first' => 72, 'second' => 78, 'third' => 88, 'teacher' => 'Mr. Lee'],
    ];

    $config = $reportConfig;

    return view('components.report-card.index', compact('student', 'subjects', 'config'));
}


    /**
     * Show the form for editing the specified configuration.
     */
    public function edit(ReportCardConfiguration $reportConfig)
    {
        return view('components.report_configs.edit', compact('reportConfig'));
    }

    /**
     * Update the specified configuration in storage.
     */
    public function update(Request $request, ReportCardConfiguration $reportConfig)
    {
        $data = $request->validate([
            'title' => 'required|unique:report_card_configurations,title,' . $reportConfig->report_config_id . ',report_config_id',
            'description' => 'nullable|string',
            'grading_scale' => 'required|array',
            'weights' => 'required|array',
            'student_info_fields' => 'nullable|array',
            'cognitive_domain' => 'nullable|array',
            'affective_domain' => 'nullable|array',
            'psycomotor_domain' => 'nullable|array',
            'behavior_fields' => 'nullable|array',
            'template_style' => 'required|in:modern,classic',
            'logo_url' => 'nullable|string',
            'stamp_url' => 'nullable|string',
            'signature_url' => 'nullable|string',
        ]);

        $reportConfig->update($data);

        return redirect()->route('report-configs.index')->with('success', 'Report card configuration updated successfully.');
    }

    /**
     * Remove the specified configuration from storage.
     */
    public function destroy(ReportCardConfiguration $reportConfig)
    {
        $reportConfig->delete();

        return redirect()->route('report-configs.index')->with('success', 'Report card configuration deleted successfully.');
    }
}
