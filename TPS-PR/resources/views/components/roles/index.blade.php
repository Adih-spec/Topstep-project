@extends('components.layouts.app')

@section('pageTitle', 'Roles Management')
@section('pageContent')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <!-- Card -->
            <div class="card shadow-lg border-0 rounded-3">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Roles Management</h4>
                    <div>
                        <a href="{{ url()->previous() }}" class="btn btn-light btn-sm me-2">
                            <i class="bi bi-arrow-left"></i> Back
                        </a>
                        <a href="{{ route('roles.create') }}" class="btn btn-light btn-sm">
                            <i class="bi bi-plus-circle"></i> Add Role
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
                                    <th>Role Name</th>
                                    <th>Guard</th>
                                    <th>Created At</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($roles as $index => $role)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>
                                            <span class="badge bg-secondary">{{ $role->name }}</span>
                                        </td>
                                        <td>{{ $role->guard_name }}</td>
                                        <td>{{ $role->created_at->format('d M Y') }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-sm btn-outline-primary">
                                                <i class="bi bi-pencil-square"></i> Edit
                                            </a>
                                            <form action="{{ route('roles.destroy', $role->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure?')">
                                                    <i class="bi bi-trash"></i> Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center text-muted">No roles found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            <!-- End Card -->
        </div>
    </div>
</div>
@endsection
