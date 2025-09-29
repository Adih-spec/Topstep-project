@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Departments</h1>
    <a href="{{ route('departments.create') }}" class="btn btn-primary mb-3">+ Add Department</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Type</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($departments as $department)
                <tr>
                    <td>{{ $department->DepartmentID }}</td>
                    <td>{{ $department->DepartmentName }}</td>
                    <td>{{ $department->Type }}</td>
                    <td>{{ $department->Description ?? '-' }}</td>
                    <td>
                        <a href="{{ route('departments.edit', $department->DepartmentID) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('departments.destroy', $department->DepartmentID) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Delete this department?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="6">No departments found.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
