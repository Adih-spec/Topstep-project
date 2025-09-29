@extends('components.layouts.app')
@section('pageTitle', 'Edit Report Card Configuration')
@section('pageContent')
<div class="container">
    <h2>Edit Report Card Configuration</h2>

    <form action="{{ route('report-configs.update', $reportConfig) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control" value="{{ $reportConfig->title }}" required>
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control">{{ $reportConfig->description }}</textarea>
        </div>

        <div class="mb-3">
            <label>Grading Scale (JSON)</label>
            <textarea name="grading_scale" class="form-control">{{ json_encode($reportConfig->grading_scale) }}</textarea>
        </div>

        <div class="mb-3">
            <label>Weights (JSON)</label>
            <textarea name="weights" class="form-control">{{ json_encode($reportConfig->weights) }}</textarea>
        </div>

        <div class="mb-3">
            <label>Template Style</label>
            <select name="template_style" class="form-control">
                <option value="modern" {{ $reportConfig->template_style == 'modern' ? 'selected' : '' }}>Modern</option>
                <option value="classic" {{ $reportConfig->template_style == 'classic' ? 'selected' : '' }}>Classic</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('report-configs.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
