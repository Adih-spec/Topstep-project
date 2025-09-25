@extends('layouts.app')

@section('content')
<div class="container my-4">
    <h1 class="mb-5 text-center fw-bold display-5 text-primary">Guardian Details</h1>
    
    <!-- Profile Info -->
    <div class="card shadow border-0 rounded-3 mb-4 text-center">
        <div class="card-body">
            <div class="mb-3">
                <img src="https://ui-avatars.com/api/?name={{ urlencode($guardian->first_name . ' ' . $guardian->last_name) }}&background=random&color=fff&size=150" 
                     alt="Guardian Avatar" 
                     class="rounded-circle shadow-sm">
            </div>
            <p class="fs-5"><strong>{{ $guardian->first_name }} {{ $guardian->last_name }}</strong></p>
            <p class="text-muted fs-5">{{ $guardian->occupation }}</p>
            <p class="fs-5"><strong>Username:</strong> {{ $guardian->username }}</p>
        </div>
    </div>

    <div class="container my-5">
        <div class="row g-4">
            <!-- Contact Info -->
            <div class="col-lg-6">
                <div class="card shadow-sm border-0 rounded-3 h-100">
                    <div class="card-header text-center">
                        <h5 class="mb-0">Contact Information</h5>
                    </div>
                    <div class="card-body fs-6">
                        <p><strong>Phone:</strong> {{ $guardian->phone }}</p>
                        <p><strong>Email:</strong> {{ $guardian->email }}</p>
                        <p><strong>Residential Address:</strong> {{ $guardian->residential_address }}</p>
                    </div>
                </div>
            </div>

            <!-- Background Info -->
            <div class="col-lg-6">
                <div class="card shadow-sm border-0 rounded-3 h-100">
                    <div class="card-header text-center">
                        <h5 class="mb-0">Background Information</h5>
                    </div>
                    <div class="card-body fs-6">
                        <p><strong>Religion:</strong> {{ $guardian->religion }}</p>
                        <p><strong>Country:</strong> {{ $guardian->country }}</p>
                        <p><strong>State of Origin:</strong> {{ $guardian->state_of_origin }}</p>
                        <p><strong>LGA:</strong> {{ $guardian->lga }}</p>
                    </div>
                </div>
            </div>

            <!-- Family Info -->
            <div class="col-lg-4">
                <div class="card shadow-sm border-0 rounded-3 h-100">
                    <div class="card-header text-center">
                        <h5 class="mb-0">Family Information</h5>
                    </div>
                    <div class="card-body fs-6">
                        <p><strong>Other Names:</strong> {{ $guardian->other_names }}</p>
                        <p><strong>Relationship:</strong> {{ $guardian->relationship_with_student }}</p>
                        <p><strong>Children in School:</strong> {{ $guardian->number_of_children }}</p>
                    </div>
                </div>
            </div>

            <!-- System Info -->
            <div class="col-lg-8">
                <div class="card shadow-sm border-0 rounded-3 h-100">
                    <div class="card-header text-center">
                        <h5 class="mb-0">System Information</h5>
                    </div>
                    <div class="card-body fs-6">
                        <p><strong>Created At:</strong> {{ $guardian->created_at->format('d M Y, h:i A') }}</p>
                        <p><strong>Updated At:</strong> {{ $guardian->updated_at->format('d M Y, h:i A') }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Assigned Students -->
        <div class="row mt-5">
            <div class="col-lg-12">
                <div class="card shadow-sm border-0 rounded-3">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Assigned Students</h5>
                        <!-- Button to open modal -->
                        <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#assignModal">Assign Students</button>
                    </div>
                    <div class="card-body">
                        @if($guardian->students->count() > 0)
                            <ul class="list-group">
                                @foreach($guardian->students as $student)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        {{ $student->first_name }} {{ $student->last_name }}
                                        <span class="badge bg-primary">{{ $student->class }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p class="text-muted">No students assigned yet.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Assign Modal -->
        <div class="modal fade" id="assignModal" tabindex="-1" aria-labelledby="assignModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="{{ route('guardians.assign.store', $guardian->id) }}" method="POST">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="assignModalLabel">Assign Students to {{ $guardian->first_name }} {{ $guardian->last_name }} {{ $guardian->other_names }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <label for="students">Select Students:</label>
                            <select name="students[]" id="students" class="form-control" multiple>
                                @foreach($students as $student)
                                    <option value="{{ $student->id }}"
                                        {{ $guardian->students->contains($student->id) ? 'selected' : '' }}>
                                        {{ $student->first_name }} {{ $student->last_name }} ({{ $student->class }})
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Assign</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Back Button -->
        <div class="text-center mt-5">
            <a href="{{ route('guardians.index') }}" class="btn btn-lg btn-primary">
                Back to List
            </a>
        </div>
    </div>
</div>
@endsection