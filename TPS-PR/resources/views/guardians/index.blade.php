@extends('layouts.app')

@section('title', 'Guardians')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-primary">Guardians Management</h1>

    <a href="{{ route('guardian.register') }}" class="btn btn-success mb-3">
         Add New Guardian
    </a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="card shadow">
        <div class="card-body table-responsive">
            <table class="table table-hover table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Other Names</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Relationship with Student</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($guardians as $guardian)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $guardian->first_name }}</td>
                        <td>{{ $guardian->last_name }}</td>
                        <td>{{ $guardian->other_names }}</td>
                        <td>{{ $guardian->email }}</td>
                        <td>{{ $guardian->phone }}</td>
                        <td>{{ $guardian->relationship_with_student }}</td>
                        <td class="text-center">
                            <!-- Dropdown -->
                            <div class="dropdown">
                                <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" id="actionsDropdown{{ $guardian->id }}" data-bs-toggle="dropdown" aria-expanded="false">
                                    Actions
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="actionsDropdown{{ $guardian->id }}">
                                    <li>
                                        <a href="{{ route('guardians.show', $guardian->id) }}" class="dropdown-item">View</a>
                                    </li>
                                    <li>
                                        <button class="dropdown-item text-warning" data-bs-toggle="modal" data-bs-target="#editGuardianModal{{ $guardian->id }}">Edit</button>
                                    </li>
                                    <li>
                                        <form action="{{ route('guardians.destroy', $guardian->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="dropdown-item text-danger" onclick="return confirm('Are you sure you want to delete this guardian?')">Delete</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>

                    <!-- Include Edit Modal for this Guardian -->
                    @include('guardians.edit-modal', ['guardian' => $guardian])

                    @empty
                    <tr>
                        <td colspan="8" class="text-center text-muted">No guardians found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection