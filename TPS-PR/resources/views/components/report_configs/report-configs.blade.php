@extends('components.layouts.app')
@section('pageTitle', 'Report Card Configurations')
@section('pageContent')

<div class="container mt-4">
    <h2>Report Card Configurations</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Template Style</th>
                <th>Logo</th>
                <th>Attendance</th>
                <th>Comments</th>
                <th>Created By</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($configs as $config)
            <tr>
                <td>{{ $config->config_id }}</td>
                <td>{{ $config->template_style }}</td>
                <td><img src="{{ $config->logo_url }}" alt="Logo" width="50"></td>
                <td>{{ $config->show_attendance ? 'Yes' : 'No' }}</td>
                <td>{{ $config->show_comments ? 'Yes' : 'No' }}</td>
                <td>{{ $config->creator ? $config->creator->name : 'N/A' }}</td>
                <td>{{ $config->created_at->format('Y-m-d') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
