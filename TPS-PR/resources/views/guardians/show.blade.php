@extends('layouts.app')

@section('content')
<div class="container my-4">
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

    <h1 class="mb-5 text-center fw-bold display-5 text-primary">Guardian Details</h1>
    
    <!-- Profile Info -->
    <div class="card shadow border-0 rounded-3 mb-4 text-center">
        <div class="card-body">
            <div class="mb-3">
            @if($guardian->photo)
            <img src="{{ asset($guardian->photo) }}" 
                 alt="Guardian Photo" 
                 class="rounded-circle shadow-sm" width="150" height="150">
        @else
            <img src="https://ui-avatars.com/api/?name={{ urlencode($guardian->first_name . ' ' . $guardian->last_name) }}&background=random&color=fff&size=150" 
                 alt="Guardian Avatar" 
                 class="rounded-circle shadow-sm">
        @endif
            </div>
            <p class="fs-5"><strong>{{ $guardian->first_name }} {{ $guardian->last_name }}</strong></p>
            <p class="text-muted fs-5">{{ $guardian->occupation }}</p>

            <!--  Change Password button -->
            <button class="btn btn-warning btn-sm mt-3" data-bs-toggle="modal" data-bs-target="#changePasswordModal">
                Change Password
            </button>
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
                        <p><strong>LGA/City:</strong> {{ $guardian->city }}</p>
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

<!-- Assign / Unassign Modal -->
<div class="modal fade" id="assignModal" tabindex="-1" aria-labelledby="assignModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{ route('guardians.assign.store', $guardian->id) }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="assignModalLabel">
                        Manage Students for {{ $guardian->first_name }} {{ $guardian->last_name }} {{ $guardian->other_names }}
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                
                <div class="modal-body">
                    <p class="fw-semibold">Select students to assign / unassign:</p>
                    
                    <div class="row">
                        @foreach($students as $student)
                            <div class="col-md-6 mb-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" 
                                           name="students[]" 
                                           value="{{ $student->id }}"
                                           id="student{{ $student->id }}"
                                           {{ $guardian->students->contains($student->id) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="student{{ $student->id }}">
                                        {{ $student->first_name }} {{ $student->last_name }} 
                                        <span class="badge bg-primary">{{ $student->class }}</span>
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!--  Change Password Modal -->
<div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content shadow-lg rounded-3">
            <div class="modal-header bg-warning text-dark">
                <h5 class="modal-title" id="changePasswordModalLabel">Change Password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('guardians.change-password') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="current_password" class="form-label">Current Password</label>
                        <input id="current_password" type="password"
                               class="form-control @error('current_password') is-invalid @enderror"
                               name="current_password" required>
                        @error('current_password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="new_password" class="form-label">New Password</label>
                        <input id="new_password" type="password"
                               class="form-control @error('new_password') is-invalid @enderror"
                               name="new_password" required>
                        @error('new_password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="new_password_confirmation" class="form-label">Confirm New Password</label>
                        <input id="new_password_confirmation" type="password"
                               class="form-control"
                               name="new_password_confirmation" required>
                    </div>

                    <button type="submit" class="btn btn-warning w-100">Update Password</button>
                </form>
            </div>
        </div>
    </div>
</div>

        <!-- Back Button -->
        <div class="text-center mt-5">
            <a href="{{ route('guardians.index') }}" class="btn btn-lg" style="background-color: #001f3f; color: white;">
                Back to List
            </a>
        </div>
    </div>
</div>
@endsection