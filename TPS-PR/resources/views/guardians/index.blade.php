@extends('layouts.app') <!-- Assuming you have a main layout -->

@section('title', 'Guardians')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Guardians</h1>

    <a href="{{ route('guardian.create') }}" class="btn btn-primary mb-3">Add New Guardian</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Relationship</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($guardians as $guardian)
            <tr>
                <td>{{ $guardian->id }}</td>
                <td>{{ $guardian->fullname }}</td>
                <td>{{ $guardian->email }}</td>
                <td>{{ $guardian->phone }}</td>
                <td>{{ $guardian->relationship }}</td>
                <td>
                    <a href="{{ route('guardians.edit', $guardian->id) }}" class="btn btn-sm btn-warning">Edit</a>

                    <form action="{{ route('guardians.destroy', $guardian->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger"
                                onclick="return confirm('Are you sure you want to delete this guardian?')">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center">No guardians found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
