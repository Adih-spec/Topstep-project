@extends('components.layouts.app')

@section('PageTitle', 'Create Admin')

@section('pageContent')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-lg border-0 rounded-3">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Add New Admin</h4>
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

                    <form action="{{ route('admins.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Names -->
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label">First Name</label>
                                <input type="text" name="first_name" class="form-control" value="{{ old('first_name') }}" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Last Name</label>
                                <input type="text" name="last_name" class="form-control" value="{{ old('last_name') }}" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Other Name</label>
                                <input type="text" name="other_name" class="form-control" value="{{ old('other_name') }}">
                            </div>
                        </div>

                        <!-- Contact -->
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Phone</label>
                            <input type="text" name="phone" class="form-control" value="{{ old('phone') }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Address</label>
                            <input type="text" name="address" class="form-control" value="{{ old('address') }}">
                        </div>

                        <!-- Personal Info -->
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Gender</label>
                                <select name="gender" class="form-select">
                                    <option value="">-- Select --</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Marital Status</label>
                                <select name="marital_status" class="form-select">
                                    <option value="">-- Select --</option>
                                    <option value="single">Single</option>
                                    <option value="married">Married</option>
                                    <option value="divorced">Divorced</option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Avatar</label>
                                <input type="file" name="avatar" class="form-control">
                            </div>
                        </div>

                        <!-- ID Info -->
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">ID Type</label>
                                <select name="id_type" class="form-select">
                                    <option value="">-- Select --</option>
                                    <option value="staff_id">Staff ID</option>
                                    <option value="national_id">National ID</option>
                                    <option value="passport">Passport</option>
                                    <option value="drivers_license">Driver’s License</option>
                                    <option value="voters_card">Voter’s Card</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">ID Number</label>
                                <input type="text" name="id_number" class="form-control" value="{{ old('id_number') }}">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Upload ID Document</label>
                            <input type="file" name="id_document" class="form-control">
                        </div>

                        <!-- Role -->
                        <div class="mb-3">
                            <label class="form-label">Role</label>
                            <select name="role" class="form-select">
                                <option value="super_admin">Super Admin</option>
                                <option value="principal">Principal</option>
                                <option value="vice_principal">Vice Principal</option>
                                <option value="exam_officer">Exam Officer</option>
                                <option value="finance_officer">Finance Officer</option>
                                <option value="staff_admin" selected>Staff Admin</option>
                            </select>
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
