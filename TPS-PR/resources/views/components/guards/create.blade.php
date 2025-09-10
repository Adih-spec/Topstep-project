@extends('components.layouts.app')
@section('pageTitle', 'Create Guard User')
@section('pageContent')
<div class="container">
    <h1 class="mb-4">Create Guard User</h1>

    <form method="POST" action="{{ route('guards.store') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Guard Type</label>
            <select name="guard_type" class="form-control" required>
                <option value="admin">Admin</option>
                <option value="teacher">Teacher</option>
                <option value="staff">Staff</option>
                <option value="student">Student</option>
                <option value="guardian">Guardian</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Role</label>
            <select name="role" class="form-control" required>
                @foreach($roles as $role)
                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-success">Create</button>
    </form>
</div>
@endsection
@endsection