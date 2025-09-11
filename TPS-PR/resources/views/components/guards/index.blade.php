@extends('components.layouts.app')
@section('pageTitle', 'Guard Management')

@section('pageContent')
<div class="container mt-4">
    <h1 class="mb-4">Guard Management</h1>

    {{-- Success Message --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-3">
        <a href="{{ route('guards.create') }}" class="btn btn-primary">+ Add New Guard</a>
    </div>

    <table class="table table-bordered table-striped align-middle">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Guard Type</th>
                <th>Roles</th>
                <th width="150">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($guards as $index => $guard)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $guard->name }}</td>
                    <td>{{ $guard->email }}</td>
                    <td>{{ ucfirst($guard->guard_type) }}</td>
                    <td>
                        @foreach($guard->roles as $role)
                            <span class="badge bg-info text-dark">{{ $role->name }}</span>
                        @endforeach
                    </td>
                    <td>
                        {{-- Delete Button --}}
                        <form action="{{ route('guards.destroy', $guard->id) }}" method="POST" 
                              onsubmit="return confirm('Are you sure you want to delete this guard?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm w-100">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">No guard users found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div>
        {{ $guards->links() }}
    </div>
</div>
@endsection
