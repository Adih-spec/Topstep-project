{{-- resources/views/guards/index.blade.php --}}
@extends('components.layouts.app')

@section('pageTitle', 'Guards Management')

@section('pageContent')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Guards</h2>
        <a href="{{ route('guards.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg"></i> Add New Guard
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if($guards->count())
        <table class="table table-hover table-bordered align-middle">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Guard Name</th>
                    <th>Created At</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($guards as $guard)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $guard->guard_name }}</td>
                        <td>{{ $guard->created_at?->format('d M, Y') }}</td>
                        <td class="text-center">
                            <a href="{{ route('guards.edit', $guard->id) }}" class="btn btn-sm btn-warning">
                                Edit
                            </a>
                            <form action="{{ route('guards.destroy', $guard->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Are you sure you want to delete this guard?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{-- Pagination links (if using paginate() in your controller) --}}
        <div class="mt-3">
            {{ $guards->links() }}
        </div>
    @else
        <div class="alert alert-info">No guards found. Start by adding one!</div>
    @endif
</div>
@endsection
