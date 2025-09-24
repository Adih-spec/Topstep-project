@extends('layouts.app')

@section('content')
<div class="container my-4">
    <div class="card shadow-lg border-0">
        <div class="card-header bg-warning text-dark d-flex justify-content-between align-items-center">
            <h4 class="mb-0">
                <i class="bi bi-pencil-square"></i> Edit Employee
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

            <form action="{{ route('employees.update', $employee->EmployeeID) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row g-3">
                    {{-- First & Last Name --}}
                    <div class="col-md-6">
                        <label class="form-label fw-bold">First Name</label>
                        <input type="text" name="FirstName" class="form-control" 
                            value="{{ old('FirstName', $employee->FirstName) }}" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Last Name</label>
                        <input type="text" name="LastName" class="form-control" 
                            value="{{ old('LastName', $employee->LastName) }}" required>
                    </div>

                    {{-- Email & Phone --}}
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Email</label>
                        <input type="email" name="Email" class="form-control" 
                            value="{{ old('Email', $employee->Email) }}" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Phone Number</label>
                        <input type="text" name="PhoneNumber" class="form-control" 
                            value="{{ old('PhoneNumber', $employee->PhoneNumber) }}">
                    </div>

                    {{-- Role & Department --}}
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Role</label>
                        <select name="role" class="form-select" required>
                            <option value="">-- Select Role --</option>
                            <option value="teacher" {{ old('role', $employee->role) == 'teacher' ? 'selected' : '' }}>Teacher</option>
                            <option value="non-teacher" {{ old('role', $employee->role) == 'non-teacher' ? 'selected' : '' }}>Non-Teacher</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Department</label>
                        <select name="departmentID" id="departmentID" class="form-select" required>
                            <option value="">-- Select Department --</option>
                            @foreach($departments as $department)
                                <option value="{{ $department->DepartmentID }}" 
                                    {{ old('departmentID', $employee->departmentID) == $department->DepartmentID ? 'selected' : '' }}>
                                    {{ $department->DepartmentName }} ({{ $department->Type }})
                                </option>
                            @endforeach
                        </select>
                        @error('departmentID')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- Job Title & Hire Date --}}
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Job Title</label>
                        <input type="text" name="JobTitle" class="form-control" 
                            value="{{ old('JobTitle', $employee->JobTitle) }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Hire Date</label>
                        <input type="date" name="HireDate" class="form-control" 
                            value="{{ old('HireDate', $employee->HireDate) }}">
                    </div>

                    {{-- Date of Birth & Gender --}}
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Date of Birth</label>
                        <input type="date" name="DateOfBirth" class="form-control" 
                            value="{{ old('DateOfBirth', $employee->DateOfBirth) }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Gender</label>
                        <select name="Gender" class="form-select">
                            <option value="">-- Select Gender --</option>
                            <option value="Male" {{ old('Gender', $employee->Gender) == 'Male' ? 'selected' : '' }}>Male</option>
                            <option value="Female" {{ old('Gender', $employee->Gender) == 'Female' ? 'selected' : '' }}>Female</option>
                        </select>
                    </div>

                    {{-- Address --}}
                    <div class="col-md-12">
                        <label class="form-label fw-bold">Address</label>
                        <input type="text" name="Address" class="form-control" 
                            value="{{ old('Address', $employee->Address) }}">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-bold">City</label>
                        <input type="text" name="City" class="form-control" 
                            value="{{ old('City', $employee->City) }}">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-bold">State</label>
                        <input type="text" name="State" class="form-control" 
                            value="{{ old('State', $employee->State) }}">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-bold">Country</label>
                        <input type="text" name="Country" class="form-control" 
                            value="{{ old('Country', $employee->Country) }}">
                    </div>

                    {{-- Emergency Contact --}}
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Emergency Contact</label>
                        <input type="text" name="EmergencyContact" class="form-control" 
                            value="{{ old('EmergencyContact', $employee->EmergencyContact) }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Emergency Phone</label>
                        <input type="text" name="EmergencyPhone" class="form-control" 
                            value="{{ old('EmergencyPhone', $employee->EmergencyPhone) }}">
                    </div>

                    {{-- Profile Picture --}}
                    <div class="col-md-12">
                        <label class="form-label fw-bold">Profile Picture</label>
                        <input type="file" name="ProfilePicture" class="form-control">
                        @if($employee->ProfilePicture)
                            <div class="mt-2">
                                <img src="{{ asset('storage/'.$employee->ProfilePicture) }}" 
                                    alt="Profile Picture" class="img-thumbnail" width="120">
                            </div>
                        @endif
                    </div>

                    {{-- Status --}}
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Status</label>
                        <select name="Status" class="form-select">
                            <option value="">-- Status --</option>
                            <option value="Active" {{ old('Status', $employee->Status) == 'Active' ? 'selected' : '' }}>Active</option>
                            <option value="Inactive" {{ old('Status', $employee->Status) == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>

                    {{-- 🔑 Password fields removed (not safe to edit here) --}}
                </div>

                {{-- Submit --}}
                <div class="mt-4 text-end">
                    <button type="submit" class="btn btn-warning">
                        <i class="bi bi-check-circle"></i> Update Employee
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
