@extends('components.layouts.app')

@section('pageTitle', 'Students Dashboard')

@section('pageContent')
<div class="container mt-5">
    <h2 class="fw-bold mb-4">📊 Student Dashboard</h2>

    <!-- Stats Cards -->
    <div class="row g-4 mb-5">
        <div class="col-md-3">
            <div class="card shadow-sm border-0 text-center p-3 bg-primary text-white rounded-3">
                <h5>Total Students</h5>
                <p class="fs-2 fw-bold">{{ $totalStudents }}</p>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm border-0 text-center p-3 bg-success text-white rounded-3">
                <h5>Active Students</h5>
                <p class="fs-2 fw-bold">{{ $activeStudents }}</p>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm border-0 text-center p-3 bg-info text-white rounded-3">
                <h5>Male</h5>
                <p class="fs-2 fw-bold">{{ $maleStudents }}</p>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm border-0 text-center p-3 bg-warning text-dark rounded-3">
                <h5>Female</h5>
                <p class="fs-2 fw-bold">{{ $femaleStudents }}</p>
            </div>
        </div>
    </div>

    <!-- Student Table -->
    <div class="card shadow-sm border-0 rounded-4">
        <div class="card-header bg-dark text-white fw-bold">
            👩‍🎓 Student List
            <a href="{{ route('students.create') }}" class="btn btn-success btn-sm float-end">
                ➕ Add Student
            </a>
        </div>
        <div class="card-body">
            <table class="table table-hover table-striped align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Gender</th>
                        <th>Class</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                @forelse($students as $student)
                    <tr>
                        <td>{{ $student->id }}</td>
                        <td>{{ $student->first_name }} {{ $student->last_name }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ ucfirst($student->gender) }}</td>
                        <td>{{ $student->class_id }}</td>
                        <td>
                            @if($student->is_active)
                                <span class="badge bg-success">Active</span>
                            @else
                                <span class="badge bg-secondary">Inactive</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('students.edit', $student->id) }}" class="btn btn-sm btn-primary">✏️ Edit</a>
                            <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this student?')">🗑️ Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted">No students found.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>

            <!-- Pagination -->
            <div class="mt-3">
                {{ $students->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
