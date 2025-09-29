@extends('components.layouts.app')
@section('pageTitle', 'Report Card Configurations')
@section('pageContent')
<div class="container">
    <h2 class="mb-4">Report Card Configurations</h2>

    <a href="{{ route('report-configs.create') }}" class="btn btn-primary mb-3">+ New Configuration</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Template</th>
                <th>Created By</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($configs as $config)
                <tr>
                    <td>{{ $config->title }}</td>
                    <td>{{ $config->description }}</td>
                    <td>{{ ucfirst($config->template_style) }}</td>
                    <td>{{ $config->created_by }}</td>
                    <td>
                        <a href="{{ route('report-configs.show', $config) }}" class="btn btn-sm btn-info">View</a>
                        <a href="{{ route('report-configs.edit', $config) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('report-configs.destroy', $config) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this configuration?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5">No configurations found.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
