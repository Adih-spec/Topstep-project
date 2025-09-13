@extends('components.layouts.app')

@section('pageTitle', 'Students Dashboard')

@section('pageContent')
<div class="container mt-5">
    <h2 class="mb-4">Student Management Dashboard</h2>

    <!-- Dashboard Summary Cards -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card text-white bg-primary shadow rounded-4">
                <div class="card-body text-center">
                    <h4>{{ $totalStudents }}</h4>
                    <p>Total Students</p>
                </div>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="card text-white bg-info shadow rounded-4">
                <div class="card-body text-center">
                    <h4>{{ $maleStudents }}</h4>
                    <p>Male Students</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-danger shadow rounded-4">
                <div class="card-body text-center">
                    <h4>{{ $femaleStudents }}</h4>
                    <p>Female Students</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Students Table -->
    <div class="card shadow-lg rounded-4 border-0">
        <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
            <span>Students List</span>
            <a href="{{ route('students.create') }}" class="btn btn-sm btn-light">
                <i class="bi bi-person-plus"></i> Add Student
            </a>
        </div>
        <div class="card-body p-4">
            @if($students->count() > 0)
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-secondary">
                        <tr>
                            <th>#</th>
                            <th>Admission No.</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Gender</th>
                            <th>Date of Birth</th>
                            <th>Country</th>
                            <th>State of Origin</th>
                            <th>Address</th>
                            <th>Class</th>
                            <th>Phone</th>
                            <th>Parent Contact</th>
                            <th>Enrollment Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                            <tr @if($student->trashed()) class="table-danger" @endif>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $student->admission_number ?? 'N/A' }}</td>
                                <td>{{ $student->first_name }} {{ $student->last_name }}</td>
                                <td>{{ $student->email }}</td>
                                <td>{{ ucfirst($student->gender) }}</td>
                                <td>
                                    {{ $student->dob ? $student->dob->format('d M Y') : 'N/A' }}
                                    @if($student->dob)
                                        <small class="text-muted">({{ \Carbon\Carbon::parse($student->dob)->age }} yrs)</small>
                                    @endif
                                </td>
                                <td>{{ $student->country ?? 'N/A' }}</td>
                                <td>{{ $student->state_of_origin ?? 'N/A' }}</td>
                                <td>{{ $student->address ?? 'N/A' }}</td>
                                <td>{{ $student->class ?? 'N/A' }}</td>
                                <td>{{ $student->phone }}</td>
                                <td>{{ $student->guardian_phone ?? 'N/A' }}</td>
                                <td>{{ $student->enrollment_date ? $student->enrollment_date->format('d M Y') : 'N/A' }}</td>
                                <td>
                                    <span class="badge 
                                        {{ $student->status == 'active' ? 'bg-success' : ($student->status == 'suspended' ? 'bg-warning' : 'bg-secondary') }}">
                                        {{ ucfirst($student->status ?? 'N/A') }}
                                    </span>
                                </td>
                                <td>
                                    @if(!$student->trashed())
                                        <a href="{{ route('students.edit', $student->id) }}" class="btn btn-sm btn-warning">
                                            <i class="bi bi-pencil"></i> Edit
                                        </a>
                                        <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this student?');">
                                                <i class="bi bi-trash"></i> Delete
                                            </button>
                                        </form>
                                    @else
                                        <form action="{{ route('students.restore', $student->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-success">
                                                <i class="bi bi-arrow-clockwise"></i> Restore
                                            </button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Pagination -->
                <div class="d-flex justify-content-center">
                    {{ $students->links() }}
                </div>
            @else
                <p class="text-center">No students found.</p>
            @endif
        </div>
    </div>
</div>
@endsection
