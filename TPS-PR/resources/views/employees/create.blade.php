@extends('layouts.app')

@section('content')
<div class="container my-4">
    <div class="card shadow-lg border-0">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">
                <i class="bi bi-person-plus-fill"></i> Register New Employee
            </h4>
            <a href="{{ route('employees.index') }}" class="btn btn-light btn-sm">
                <i class="bi bi-arrow-left-circle"></i> Back
            </a>
        </div>

        <div class="card-body">
            {{-- Validation Errors --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> Please fix the following:
                    <ul class="mb-0 mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row g-3">
                    {{-- First & Last Name --}}
                    <div class="col-md-6">
                        <label class="form-label fw-bold">First Name</label>
                        <input type="text" name="FirstName" class="form-control" value="{{ old('FirstName') }}" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Last Name</label>
                        <input type="text" name="LastName" class="form-control" value="{{ old('LastName') }}" required>
                    </div>

                    {{-- Email & Phone --}}
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Email</label>
                        <input type="email" name="Email" class="form-control" value="{{ old('Email') }}" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Phone Number</label>
                        <input type="text" name="PhoneNumber" class="form-control" value="{{ old('PhoneNumber') }}">
                    </div>

                    {{-- Role & Department --}}
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Role</label>
                        <select name="role" class="form-select" required>
                            <option value="">-- Select Role --</option>
                            <option value="teacher" {{ old('role') == 'teacher' ? 'selected' : '' }}>Teacher</option>
                            <option value="non-teacher" {{ old('role') == 'non-teacher' ? 'selected' : '' }}>Non-Teacher</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Department</label>
                        <select name="department_id" class="form-select" required> 
                            <option value="">-- Select Department --</option>
                            @foreach($departments as $department)
                                <option value="{{ $department->DepartmentID }}" {{ old('department_id') == $department->DepartmentID ? 'selected' : '' }}>
                                    {{ $department->DepartmentName }} ({{ $department->Type }})
                                </option>
                            @endforeach
                        </select>
                        @error('department_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- Job Title & Hire Date --}}
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Job Title</label>
                        <input type="text" name="JobTitle" class="form-control" value="{{ old('JobTitle') }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Hire Date</label>
                        <input type="date" name="HireDate" class="form-control" value="{{ old('HireDate') }}">
                    </div>

                    {{-- Date of Birth & Gender --}}
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Date of Birth</label>
                        <input type="date" name="DateOfBirth" class="form-control" value="{{ old('DateOfBirth') }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Gender</label>
                        <select name="Gender" class="form-select">
                            <option value="">-- Select Gender --</option>
                            <option value="Male" {{ old('Gender') == 'Male' ? 'selected' : '' }}>Male</option>
                            <option value="Female" {{ old('Gender') == 'Female' ? 'selected' : '' }}>Female</option>
                        </select>
                    </div>

                    {{-- Address --}}
                    <div class="col-md-12">
                        <label class="form-label fw-bold">Address</label>
                        <input type="text" name="Address" class="form-control" value="{{ old('Address') }}">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-bold">City</label>
                        <input type="text" name="City" class="form-control" value="{{ old('City') }}">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-bold">State</label>
                        <input type="text" name="State" class="form-control" value="{{ old('State') }}">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-bold">Country</label>
                        <input type="text" name="Country" class="form-control" value="{{ old('Country') }}">
                    </div>

                    {{-- Emergency Contact --}}
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Emergency Contact</label>
                        <input type="text" name="EmergencyContact" class="form-control" value="{{ old('EmergencyContact') }}">
                    </div>

                    {{-- Profile Picture --}}
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Profile Picture</label>
                        <input type="file" name="ProfilePicture" class="form-control">
                    </div>

                    {{-- Status & Password --}}
                    <div class="col-md-4">
                        <label class="form-label fw-bold">Status</label>
                        <select name="Status" class="form-select">
                            <option value="">-- Status --</option>
                            <option value="Active" {{ old('Status') == 'Active' ? 'selected' : '' }}>Active</option>
                            <option value="Inactive" {{ old('Status') == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-bold">Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-bold">Confirm Password</label>
                        <input type="password" name="password_confirmation" class="form-control" required>
                    </div>
                </div>

                {{-- Submit --}}
                <div class="mt-4 text-end">
                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-check-circle"></i> Register Employee
                    </button>
                    <a href="{{ route('employees.index') }}" class="btn btn-secondary">
                        <i class="bi bi-x-circle"></i> Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
