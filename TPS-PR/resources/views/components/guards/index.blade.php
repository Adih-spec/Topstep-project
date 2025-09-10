@extends('components.layouts.app')
@section('pageTitle', 'Guard Management')
@section('pageContent')

<div class="container">
    <h1 class="mb-4">Guard Management</h1>
    <a href="{{ route('guards.create') }}" class="btn btn-primary mb-3">+ Add Guard User</a>

    @foreach ($users as $guard => $group)
        <h3 class="mt-4 text-capitalize">{{ $guard }}</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th><th>Email</th><th>Role</th><th>Created At</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($group as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->getRoleNames()->implode(', ') }}</td>
                        <td>{{ $user->created_at->format('Y-m-d') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endforeach
</div>
@endsection
