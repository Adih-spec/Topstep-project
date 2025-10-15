```php
@extends('components.layouts.app')

@section('PageTitle', 'Create Admin')

@section('pageContent')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-lg border-0 rounded-3">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Add New Admin</h4>
                    <div>
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-light btn-sm me-2">
                            <i class="bi bi-house"></i> Dashboard
                        </a>
                        <a href="{{ route('admin.classes.index') }}" class="btn btn-light btn-sm me-2">
                            <i class="bi bi-book"></i> View Classes
                        </a>
                        <a href="{{ route('admin.subjects.index') }}" class="btn btn-light btn-sm me-2">
                            <i class="bi bi-journal-text"></i> Manage Subjects
                        </a>
                        <a href="{{ route('admin.students.recycle') }}" class="btn btn-light btn-sm me-2">
                            <i class="bi bi-recycle"></i> Recycle Bin
                        </a>
                        <a href="{{ route('admins.index') }}" class="btn btn-light btn-sm">
                            <i class="bi bi-arrow-left"></i> Back
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admins.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="is_admin" value="1">

                        <!-- Names -->
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label">First Name</label>
                                <input type="text" name="first_name" class="form-control" value="{{ old('first_name') }}" required>
                                @error('first_name')
                                    <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Last Name</label>
                                <input type="text" name="last_name" class="form-control" value="{{ old('last_name') }}" required>
                                @error('last_name')
                                    <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Other Name</label>
                                <input type="text" name="middle_name" class="form-control" value="{{ old('middle_name') }}">
                                @error('middle_name')
                                    <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Contact -->
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                            @error('email')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Phone</label>
                            <input type="text" name="phone" class="form-control" value="{{ old('phone') }}">
                            @error('phone')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Address</label>
                            <input type="text" name="address" class="form-control" value="{{ old('address') }}">
                            @error('address')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Personal Info -->
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Gender</label>
                                <select name="gender" class="form-select">
                                    <option value="">-- Select --</option>
                                    <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                                    <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                                    <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Other</option>
                                </select>
                                @error('gender')
                                    <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Marital Status</label>
                                <select name="marital_status" class="form-select">
                                    <option value="">-- Select --</option>
                                    <option value="single" {{ old('marital_status') == 'single' ? 'selected' : '' }}>Single</option>
                                    <option value="married" {{ old('marital_status') == 'married' ? 'selected' : '' }}>Married</option>
                                    <option value="divorced" {{ old('marital_status') == 'divorced' ? 'selected' : '' }}>Divorced</option>
                                </select>
                                @error('marital_status')
                                    <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Avatar</label>
                                <input type="file" name="photo" class="form-control">
                                @error('photo')
                                    <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- ID Info -->
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">ID Type</label>
                                <select name="id_type" class="form-select">
                                    <option value="">-- Select --</option>
                                    <option value="staff_id" {{ old('id_type') == 'staff_id' ? 'selected' : '' }}>Staff ID</option>
                                    <option value="national_id" {{ old('id_type') == 'national_id' ? 'selected' : '' }}>National ID</option>
                                    <option value="passport" {{ old('id_type') == 'passport' ? 'selected' : '' }}>Passport</option>
                                    <option value="drivers_license" {{ old('id_type') == 'drivers_license' ? 'selected' : '' }}>Driver’s License</option>
                                    <option value="voters_card" {{ old('id_type') == 'voters_card' ? 'selected' : '' }}>Voter’s Card</option>
                                </select>
                                @error('id_type')
                                    <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">ID Number</label>
                                <input type="text" name="id_number" class="form-control" value="{{ old('id_number') }}">
                                @error('id_number')
                                    <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Upload ID Document</label>
                            <input type="file" name="id_document" class="form-control">
                            @error('id_document')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Role -->
                        <div class="mb-3">
                            <label class="form-label">Role</label>
                            <select name="role" class="form-select">
                                <option value="super_admin" {{ old('role') == 'super_admin' ? 'selected' : '' }}>Super Admin</option>
                                <option value="principal" {{ old('role') == 'principal' ? 'selected' : '' }}>Principal</option>
                                <option value="vice_principal" {{ old('role') == 'vice_principal' ? 'selected' : '' }}>Vice Principal</option>
                                <option value="exam_officer" {{ old('role') == 'exam_officer' ? 'selected' : '' }}>Exam Officer</option>
                                <option value="finance_officer" {{ old('role') == 'finance_officer' ? 'selected' : '' }}>Finance Officer</option>
                                <option value="staff_admin" {{ old('role', 'staff_admin') == 'staff_admin' ? 'selected' : '' }}>Staff Admin</option>
                            </select>
                            @error('role')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save"></i> Create Admin
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection