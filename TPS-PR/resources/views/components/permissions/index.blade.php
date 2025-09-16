@extends('components.layouts.app')

@section('pageTitle', 'Permissions')

@section('pageContent')
<div class="container mt-5">
    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Permissions</h2>
        <a href="{{ route('permissions.create') }}" class="btn btn-primary btn-sm">
            <i class="bi bi-plus-circle"></i> Add New Permission
        </a>
    </div>

    {{-- Flash Messages --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Table --}}
    <div class="card shadow-sm">
        <div class="card-body p-0">
            <table class="table table-striped table-hover mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Permission Name</th>
                        <th>Guard</th>
                        <th>Created At</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($permissions as $index => $permission)
                        <tr>
                            <td>{{ $permissions->firstItem() + $index }}</td>
                            <td class="fw-semibold">{{ $permission->name }}</td>
                            <td>
                                <span class="badge bg-info text-dark">
                                    {{ $permission->guard->guard_name ?? 'N/A' }}
                                </span>
                            </td>
                            <td>{{ $permission->created_at->format('Y-m-d') }}</td>
                            <td class="text-end">
                                {{-- Edit Button --}}
                                <a href="{{ route('permissions.edit', $permission->id) }}" 
                                   class="btn btn-sm btn-warning me-2">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>

                                {{-- Delete Button --}}
                                <form action="{{ route('permissions.destroy', $permission->id) }}" 
                                      method="POST" 
                                      class="d-inline"
                                      onsubmit="return confirm('Are you sure you want to delete this permission?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="bi bi-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-4">
                                <em>No permissions found.</em>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        @if($permissions->hasPages())
            <div class="card-footer">
                {{ $permissions->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
