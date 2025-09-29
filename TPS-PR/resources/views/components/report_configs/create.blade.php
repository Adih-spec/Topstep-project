@extends('components.layouts.app')

@section('pageTitle', 'Create Report Card Configuration')

@section('pageContent')
<div class="container py-4">
    <div class="card shadow-lg border-0">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">New Report Card Configuration</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('report-configs.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- General Info --}}
                <h5 class="text-primary">General Information</h5>
                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control"></textarea>
                </div>

                {{-- Academic Settings --}}
                <h5 class="text-primary mt-4">Academic Settings</h5>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Grading Scale (JSON)</label>
                        <textarea name="grading_scale" class="form-control" placeholder='{"A":"90-100","B":"80-89"}'></textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Weights (JSON)</label>
                        <textarea name="weights" class="form-control" placeholder='{"ca":0.4,"exam":0.6}'></textarea>
                    </div>
                </div>
                <div class="form-check">
                    <input type="checkbox" name="show_total_marks" class="form-check-input" checked>
                    <label class="form-check-label">Show Total Marks</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" name="show_mean_marks" class="form-check-input" checked>
                    <label class="form-check-label">Show Mean Marks</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" name="show_position_in_class" class="form-check-input" checked>
                    <label class="form-check-label">Show Position in Class</label>
                </div>

                {{-- Attendance --}}
                <h5 class="text-primary mt-4">Attendance</h5>
                <div class="form-check">
                    <input type="checkbox" name="show_attendance" class="form-check-input" checked>
                    <label class="form-check-label">Show Attendance</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" name="show_days_present" class="form-check-input" checked>
                    <label class="form-check-label">Show Days Present</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" name="show_days_absent" class="form-check-input" checked>
                    <label class="form-check-label">Show Days Absent</label>
                </div>

                {{-- Domains --}}
                <h5 class="text-primary mt-4">Domains</h5>
                <div class="mb-3">
                    <label class="form-label">Cognitive Domain (JSON)</label>
                    <textarea name="cognitive_domain" class="form-control" placeholder='["Knowledge","Comprehension"]'></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Affective Domain (JSON)</label>
                    <textarea name="affective_domain" class="form-control" placeholder='["Attitude","Teamwork"]'></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Psychomotor Domain (JSON)</label>
                    <textarea name="psycomotor_domain" class="form-control" placeholder='["Drawing","Games"]'></textarea>
                </div>

                {{-- Comments --}}
                <h5 class="text-primary mt-4">Comments</h5>
                <div class="form-check">
                    <input type="checkbox" name="show_teachers_comments" class="form-check-input" checked>
                    <label class="form-check-label">Show Teacher’s Comments</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" name="show_headteachers_comments" class="form-check-input" checked>
                    <label class="form-check-label">Show Head Teacher’s Comments</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" name="show_principals_comments" class="form-check-input" checked>
                    <label class="form-check-label">Show Principal’s Comments</label>
                </div>

                {{-- Branding --}}
                <h5 class="text-primary mt-4">Branding</h5>
                <div class="mb-3">
                    <label class="form-label">Logo</label>
                    <input type="file" name="logo_url" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Stamp</label>
                    <input type="file" name="stamp_url" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Signature</label>
                    <input type="file" name="signature_url" class="form-control">
                </div>

                {{-- Template Style --}}
                <h5 class="text-primary mt-4">Template Style</h5>
                <select name="template_style" class="form-select">
                    <option value="modern" selected>Modern</option>
                    <option value="classic">Classic</option>
                </select>

                {{-- Visualization --}}
                <h5 class="text-primary mt-4">Visualization</h5>
                <div class="form-check">
                    <input type="checkbox" name="show_charts" class="form-check-input" checked>
                    <label class="form-check-label">Show Charts</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" name="show_progress_summary" class="form-check-input" checked>
                    <label class="form-check-label">Show Progress Summary</label>
                </div>

                {{-- Submit --}}
                <div class="mt-4">
                    <button type="submit" class="btn btn-success">Save Configuration</button>
                    <a href="{{ route('report-configs.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
