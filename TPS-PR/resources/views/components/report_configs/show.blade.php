@extends('components.layouts.app')
@section('pageTitle', 'View Report Card Configuration')
@section('pageContent')
<div class="container">
    <h2>Configuration: {{ $reportConfig->title }}</h2>
    <p>{{ $reportConfig->description }}</p>

    <h5>Grading Scale:</h5>
    <pre>{{ json_encode($reportConfig->grading_scale, JSON_PRETTY_PRINT) }}</pre>

    <h5>Weights:</h5>
    <pre>{{ json_encode($reportConfig->weights, JSON_PRETTY_PRINT) }}</pre>

    <h5>Template Style:</h5>
    <p>{{ ucfirst($reportConfig->template_style) }}</p>

    <a href="{{ route('report-configs.index') }}" class="btn btn-secondary">Back</a>
</div>
@endsection
