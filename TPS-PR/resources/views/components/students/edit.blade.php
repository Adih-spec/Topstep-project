@extends('components.layouts.app')

@section('pageTitle', 'Edit Student')

@section('pageContent')
<div class="container mt-5">
    <h2 class="mb-4">Edit Student</h2>

    <div class="card shadow-lg rounded-4 border-0">
        <div class="card-header bg-dark text-white">
            Update Student Details
        </div>
        <div class="card-body p-4">
            <form action="{{ route('students.update', $student->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="admission_number" class="form-label">Admission Number</label>
                        <input type="text" class="form-control" name="admission_number" 
                               value="{{ old('admission_number', $student->admission_number) }}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="class" class="form-label">Class</label>
                        <input type="text" class="form-control" name="class" 
                               value="{{ old('class', $student->class) }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="first_name" class="form-label">First Name</label>
                        <input type="text" class="form-control" name="first_name" 
                               value="{{ old('first_name', $student->first_name) }}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="last_name" class="form-label">Last Name</label>
                        <input type="text" class="form-control" name="last_name" 
                               value="{{ old('last_name', $student->last_name) }}" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" class="form-control" name="email" 
                           value="{{ old('email', $student->email) }}" required>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="gender" class="form-label">Gender</label>
                        <select class="form-control" name="gender">
                            <option value="male" {{ $student->gender == 'male' ? 'selected' : '' }}>Male</option>
                            <option value="female" {{ $student->gender == 'female' ? 'selected' : '' }}>Female</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="dob" class="form-label">Date of Birth</label>
                        <input type="date" class="form-control" name="dob" 
                               value="{{ old('dob', $student->dob ? $student->dob->format('Y-m-d') : '') }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="country" class="form-label">Country</label>
                        <input type="text" class="form-control" name="country" 
                               value="{{ old('country', $student->country) }}">
                    </div>
                    <div class="col-md-6">
                        <label for="state_of_origin" class="form-label">State of Origin</label>
                        <input type="text" class="form-control" name="state_of_origin" 
                               value="{{ old('state_of_origin', $student->state_of_origin) }}">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">Home Address</label>
                    <textarea class="form-control" name="address">{{ old('address', $student->address) }}</textarea>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control" name="phone" 
                               value="{{ old('phone', $student->phone) }}">
                    </div>
                    <div class="col-md-6">
                        <label for="guardian_phone" class="form-label">Parent / Guardian Phone</label>
                        <input type="text" class="form-control" name="guardian_phone" 
                               value="{{ old('guardian_phone', $student->guardian_phone) }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="enrollment_date" class="form-label">Enrollment Date</label>
                        <input type="date" class="form-control" name="enrollment_date" 
                               value="{{ old('enrollment_date', $student->enrollment_date ? $student->enrollment_date->format('Y-m-d') : '') }}">
                    </div>
                    <div class="col-md-6">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-control" name="status">
                            <option value="active" {{ $student->status == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="suspended" {{ $student->status == 'suspended' ? 'selected' : '' }}>Suspended</option>
                            <option value="inactive" {{ $student->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('students.index') }}" class="btn btn-secondary">Back</a>
                    <button type="submit" class="btn btn-primary">Update Student</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
