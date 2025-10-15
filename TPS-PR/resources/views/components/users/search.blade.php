@extends('components.layouts.app')

@section('pageTitle', 'Search Users')

@section('pageContent')
<div class="container mt-5">
    <h2 class="mb-4">Search Users</h2>

    <!-- Search Form -->
    <form action="{{ route('users.search') }}" method="GET" class="mb-4 row g-2">
        <div class="col-md-10">
            <input type="text" name="query" value="{{ request('query') }}" 
                class="form-control" placeholder="Enter name or email...">
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary w-100">Search</button>
        </div>
    </form>

    <!-- Results -->
    @if(isset($users) && $users->count())
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Roles</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @foreach($user->roles as $role)
                            <span class="badge bg-info text-dark">{{ $role->name }}</span>
                        @endforeach
                    </td>
                    <td>
                        <a href="{{ route('users.show', $user->id) }}" 
                           class="btn btn-sm btn-outline-primary">View</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @elseif(request('query'))
        <div class="alert alert-warning">No users found for "{{ request('query') }}".</div>
    @endif
</div>
@endsection
