@extends('components.layouts.app')

@section('pageTitle', 'View Student')

@section('pageContent')
<div class="container mt-5">
    <div class="card shadow-lg rounded-4 border-0">
        <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
            <span>Student Details</span>
            <a href="{{ route('students.index') }}" class="btn btn-sm btn-light">
                <i class="bi bi-arrow-left"></i> Back to List
            </a>
        </div>

        <div class="card-body p-4">
            <div class="row">
                <!-- Profile Photo -->
                <div class="col-md-3 text-center">
                    @if($student->photo)
                        <img src="{{ asset('storage/'.$student->photo) }}" alt="Student Photo" class="img-fluid rounded-circle shadow mb-3" width="150">
                    @else
                        <img src="https://via.placeholder.com/150" alt="No Photo" class="img-fluid rounded-circle shadow mb-3" width="150">
                    @endif
                    <h5>{{ $student->first_name }} {{ $student->last_name }}</h5>
                    <span class="badge {{ $student->status == 'active' ? 'bg-success' : 'bg-secondary' }}">
                        {{ ucfirst($student->status) }}
                    </span>
                </div>

                <!-- Student Details -->
                <div class="col-md-9">
                    <table class="table table-bordered">
                        <tr>
                            <th>Admission No.</th>
                            <td>{{ $student->admission_number ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $student->email }}</td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td>{{ $student->phone ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Date of Birth</th>
                            <td>
                                {{ $student->dob ? $student->dob->format('d M Y') : 'N/A' }}
                                @if($student->dob)
                                    <small class="text-muted">({{ \Carbon\Carbon::parse($student->dob)->age }} yrs)</small>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Gender</th>
                            <td>{{ ucfirst($student->gender ?? 'N/A') }}</td>
                        </tr>
                        <tr>
                            <th>Class</th>
                            <td>{{ $student->class ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Country</th>
                            <td>{{ $student->country ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>State of Origin</th>
                            <td>{{ $student->state_of_origin ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Religion</th>
                            <td>{{ $student->religion ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td>{{ $student->address ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Guardian Contact</th>
                            <td>{{ $student->guardian_phone ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Enrollment Date</th>
                            <td>{{ $student->admission_date ? $student->admission_date->format('d M Y') : 'N/A' }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="card-footer d-flex justify-content-end">
            <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning me-2">
                <i class="bi bi-pencil"></i> Edit
            </a>
            <form action="{{ route('students.destroy', $student->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this student?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">
                    <i class="bi bi-trash"></i> Delete
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
