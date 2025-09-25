@extends('components.layouts.app')

@section('PageTitle', 'Edit Admin')

@section('pageContent')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-lg border-0 rounded-3">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Edit Admin</h4>
                    <a href="{{ route('admins.index') }}" class="btn btn-light btn-sm">
                        <i class="bi bi-arrow-left"></i> Back
                    </a>
                </div>
                <div class="card-body">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admins.update', $admin->admin_id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Names -->
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label">First Name</label>
                                <input type="text" name="first_name" class="form-control" value="{{ old('first_name', $admin->first_name) }}" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Last Name</label>
                                <input type="text" name="last_name" class="form-control" value="{{ old('last_name', $admin->last_name) }}" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Other Name</label>
                                <input type="text" name="other_name" class="form-control" value="{{ old('other_name', $admin->other_name) }}">
                            </div>
                        </div>

                        <!-- Contact -->
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email', $admin->email) }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Phone</label>
                            <input type="text" name="phone" class="form-control" value="{{ old('phone', $admin->phone) }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Address</label>
                            <input type="text" name="address" class="form-control" value="{{ old('address', $admin->address) }}">
                        </div>

                        <!-- Personal Info -->
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Gender</label>
                                <select name="gender" class="form-select">
                                    <option value="">-- Select --</option>
                                    <option value="male" {{ old('gender', $admin->gender) == 'male' ? 'selected' : '' }}>Male</option>
                                    <option value="female" {{ old('gender', $admin->gender) == 'female' ? 'selected' : '' }}>Female</option>
                                    <option value="other" {{ old('gender', $admin->gender) == 'other' ? 'selected' : '' }}>Other</option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Marital Status</label>
                                <select name="marital_status" class="form-select">
                                    <option value="">-- Select --</option>
                                    <option value="single" {{ old('marital_status', $admin->marital_status) == 'single' ? 'selected' : '' }}>Single</option>
                                    <option value="married" {{ old('marital_status', $admin->marital_status) == 'married' ? 'selected' : '' }}>Married</option>
                                    <option value="divorced" {{ old('marital_status', $admin->marital_status) == 'divorced' ? 'selected' : '' }}>Divorced</option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Avatar</label>
                                <input type="file" name="avatar" class="form-control">
                                @if($admin->avatar)
                                    <small class="form-text text-muted">Current avatar: <a href="{{ asset('storage/' . $admin->avatar) }}" target="_blank">View</a></small>
                                @endif
                            </div>
                        </div>

                        <!-- ID Info -->
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">ID Type</label>
                                <select name="id_type" class="form-select">
                                    <option value="">-- Select --</option>
                                    <option value="staff_id" {{ old('id_type', $admin->id_type) == 'staff_id' ? 'selected' : '' }}>Staff ID</option>
                                    <option value="national_id" {{ old('id_type', $admin->id_type) == 'national_id' ? 'selected' : '' }}>National ID</option>
                                    <option value="passport" {{ old('id_type', $admin->id_type) == 'passport' ? 'selected' : '' }}>Passport</option>
                                    <option value="drivers_license" {{ old('id_type', $admin->id_type) == 'drivers_license' ? 'selected' : '' }}>Driver’s License</option>
                                    <option value="voters_card" {{ old('id_type', $admin->id_type) == 'voters_card' ? 'selected' : '' }}>Voter’s Card</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">ID Number</label>
                                <input type="text" name="id_number" class="form-control" value="{{ old('id_number', $admin->id_number) }}">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Upload ID Document</label>
                            <input type="file" name="id_document" class="form-control">
                            @if($admin->id_document)
                                <small class="form-text text-muted">Current document: <a href="{{ asset('storage/' . $admin->id_document) }}" target="_blank">View</a></small>
                            @endif
                        </div>

                        <!-- Role -->
                        <div class="mb-3">
                            <label class="form-label">Role</label>
                            <select name="role" class="form-select">
                                <option value="super_admin" {{ old('role', $admin->role) == 'super_admin' ? 'selected' : '' }}>Super Admin</option>
                                <option value="principal" {{ old('role', $admin->role) == 'principal' ? 'selected' : '' }}>Principal</option>
                                <option value="vice_principal" {{ old('role', $admin->role) == 'vice_principal' ? 'selected' : '' }}>Vice Principal</option>
                                <option value="exam_officer" {{ old('role', $admin->role) == 'exam_officer' ? 'selected' : '' }}>Exam Officer</option>
                                <option value="finance_officer" {{ old('role', $admin->role) == 'finance_officer' ? 'selected' : '' }}>Finance Officer</option>
                                <option value="staff_admin" {{ old('role', $admin->role) == 'staff_admin' ? 'selected' : '' }}>Staff Admin</option>
                            </select>
                        </div>

                        <!-- Status -->
                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-select">
                                <option value="1" {{ old('status', $admin->status) ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ old('status', $admin->status) ? '' : 'selected' }}>Inactive</option>
                            </select>
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label class="form-label">Password (leave blank to keep unchanged)</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control">
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save"></i> Update Admin
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection