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
                            <!-- Button to assign students -->
                            <a href="{{ url('/assign/' . $guardian->id) }}" class="btn btn-primary btn-sm">👨‍👩‍👦 Assign</a>
                            <a href="{{ route('guardians.show', $guardian->id) }}" class="btn btn-sm btn-info text-white" >👁View</a>
                            <div class="mt-2">
                                <!-- Edit Button -->
                                <a href="{{ route('guardians.edit', $guardian->id) }}" class="btn btn-sm btn-warning">✏️Edit</a>
                                <!-- Delete Button -->
                                <form action="{{ route('guardians.destroy', $guardian->id) }}" 
                                      method="POST" 
                                      style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="btn btn-sm btn-danger"
                                            onclick="return confirm('Are you sure you want to delete this guardian?')">
                                        🗑Delete
                                    </button>
                                </form>
                            </div>
                            </form>
                        </td>
                    </tr>
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
