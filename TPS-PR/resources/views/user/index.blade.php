@extends('components.layouts.app')

@section('PageTitle', 'User Management')

@section('pageContent')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <!-- Card -->
            <div class="card shadow-lg border-0 rounded-3">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">User Management</h4>
                    <div>
                        <a href="{{ url()->previous() }}" class="btn btn-light btn-sm me-2">
                            <i class="bi bi-arrow-left"></i> Back
                        </a>
                        <a href="{{ route('admin.users.create') }}" class="btn btn-light btn-sm">
                            <i class="bi bi-plus-circle"></i> Add User
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

                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-primary">
                                <tr>
                                    <th>#</th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="d-flex justify-content-center mt-3">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
