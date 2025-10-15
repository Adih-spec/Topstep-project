```php
@extends('components.layouts.app')

@section('PageTitle', 'Admin Management')

@section('pageContent')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <!-- Card -->
            <div class="card shadow-lg border-0 rounded-3">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Admin Management</h4>
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
                        <a href="{{ route('admins.create') }}" class="btn btn-light btn-sm">
                            <i class="bi bi-plus-circle"></i> Add Admin
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

                    <!-- Student Stats -->
                    <div class="mb-4 p-4 bg-light rounded">
                        <p class="mb-1"><strong>Total Students:</strong> {{ $totalStudents }}</p>
                        <p class="mb-1"><strong>Male Students:</strong> {{ $maleStudents }}</p>
                        <p class="mb-1"><strong>Female Students:</strong> {{ $femaleStudents }}</p>
                    </div>

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
                                @forelse($users as $index => $user)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $user->full_name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->phone ?? 'N/A' }}</td>
                                        <td>
                                            <span class="badge bg-info text-dark">{{ ucfirst($user->role) }}</span>
                                        </td>
                                        <td>
                                            @if($user->trashed())
                                                <span class="badge bg-danger">Deleted</span>
                                            @elseif($user->status)
                                                <span class="badge bg-success">Active</span>
                                            @else
                                                <span class="badge bg-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admins.show', $user->admin_id) }}" class="btn btn-sm btn-secondary">
                                                <i class="bi bi-eye"></i> View
                                            </a>
                                            <a href="{{ route('admins.edit', $user->admin_id) }}" class="btn btn-sm btn-warning">
                                                <i class="bi bi-pencil"></i> Edit
                                            </a>
                                            @if($user->trashed())
                                                <form action="{{ route('admins.restore', $user->admin_id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-primary" onclick="return confirm('Restore this admin?')">
                                                        <i class="bi bi-arrow-counterclockwise"></i> Restore
                                                    </button>
                                                </form>
                                            @else
                                                <form action="{{ route('admins.destroy', $user->admin_id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this admin?')">
                                                        <i class="bi bi-trash"></i> Delete
                                                    </button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center text-muted">No admins found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="d-flex justify-content-center mt-3">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection