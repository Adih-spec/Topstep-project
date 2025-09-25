@extends('components.layouts.app')

@section('pageTitle', 'Add Student')

@section('pageContent')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- Card -->
            <div class="card shadow-lg rounded-4 border-0">
                <div class="card-header bg-primary text-white text-center fs-4 fw-bold">
                    Add New Student
                </div>
                <div class="card-body p-4">

                    <!-- Validation Errors -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Form -->
<form action="{{ route('students.store') }}" method="POST">
    @csrf

    <div class="row g-3">
        <!-- Admission Number -->
        <div class="col-md-6">
            <label class="form-label">Admission Number</label>
            <input type="text" name="admission_number" class="form-control" value="{{ old('admission_number') }}" required>
        </div>

        <!-- First Name -->
        <div class="col-md-6">
            <label class="form-label">First Name</label>
            <input type="text" name="first_name" class="form-control" value="{{ old('first_name') }}" required>
        </div>

        <!-- Middle Name -->
        <div class="col-md-6">
            <label class="form-label">Middle Name</label>
            <input type="text" name="middle_name" class="form-control" value="{{ old('middle_name') }}">
        </div>

        <!-- Last Name -->
        <div class="col-md-6">
            <label class="form-label">Last Name</label>
            <input type="text" name="last_name" class="form-control" value="{{ old('last_name') }}" required>
        </div>

        <!-- Email -->
        <div class="col-md-6">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
        </div>

        <!-- Phone -->
        <div class="col-md-6">
            <label class="form-label">Phone</label>
            <input type="text" name="phone" class="form-control" value="{{ old('phone') }}">
        </div>

        <!-- Date of Birth -->
        <div class="col-md-6">
            <label class="form-label">Date of Birth</label>
            <input type="date" name="dob" class="form-control" value="{{ old('dob') }}">
        </div>

        <!-- Gender -->
        <div class="col-md-6">
            <label class="form-label">Gender</label>
            <select name="gender" class="form-select">
                <option value="">-- Select --</option>
                <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Other</option>
            </select>
        </div>

        <!-- Class -->
        <div class="col-md-6">
            <label class="form-label">Class</label>
            <input type="text" name="class" class="form-control" value="{{ old('class') }}">
        </div>

<div class="row">
    <!-- Country -->
    <div class="col-md-6 mb-3">
        <label class="form-label">Country</label>
        <select id="country" name="country" class="form-control">
            <option value="">-- Select Country --</option>
        </select>
    </div>

    <!-- State -->
    <div class="col-md-6 mb-3">
        <label class="form-label">State</label>
        <select id="state" name="state" class="form-control">
            <option value="">-- Select State --</option>
        </select>
    </div>
</div>

        <!-- Religion -->
        <div class="col-md-6">
            <label class="form-label">Religion</label>
            <select name="religion" class="form-select">
                <option value="">-- Select Religion --</option>
                <option value="Christianity" {{ old('religion')=='Christianity' ? 'selected' : '' }}>Christianity</option>
                <option value="Islam" {{ old('religion')=='Islam' ? 'selected' : '' }}>Islam</option>
                <option value="Traditional" {{ old('religion')=='Traditional' ? 'selected' : '' }}>Traditional</option>
                <option value="Other" {{ old('religion')=='Other' ? 'selected' : '' }}>Other</option>
            </select>
        </div>

        <!-- Address -->
        <div class="col-12">
            <label class="form-label">Address</label>
            <textarea name="address" class="form-control" rows="3">{{ old('address') }}</textarea>
        </div>

        <!-- Admission Date -->
        <div class="col-md-6">
            <label class="form-label">Admission Date</label>
            <input type="date" name="admission_date" class="form-control" value="{{ old('admission_date') }}">
        </div>

        <!-- Status -->
        <div class="col-md-6">
            <label class="form-label">Status</label>
            <select name="status" class="form-select">
                <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>
       
    

    <!-- Buttons -->
    <div class="d-flex justify-content-between mt-4">
        <a href="{{ route('students.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Back
        </a>
        <button type="submit" class="btn btn-success px-4">
            <i class="bi bi-save"></i> Save Student
        </button>
    </div>
</form>


                </div>
            </div>
            <!-- End Card -->
        </div>
    </div>
</div>
@endsection
