@extends('components.layouts.app')
@section('pageTitle','Create Guard')
@section('pageContent')
<div class="container mt-4">
    <h1 class="mb-4">Create Guard User</h1>

    <form method="POST" action="{{ route('guards.store') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Guard Type</label>
            <select name="guard_type" class="form-select" required>
                <option value="">-- Select Type --</option>
                <option value="admin">Admin</option>
                <option value="teacher">Teacher</option>
                <option value="staff">Staff</option>
                <option value="student">Student</option>
                <option value="guardian">Guardian</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Role</label>
            <select name="role" class="form-select" required>
                @foreach($roles as $role)
                    <option value="{{ $role->name }}">{{ ucfirst($role->name) }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Create Guard</button>
        <a href="{{ route('guards.index') }}" class="btn btn-secondary">Cancel</
    </form>
</div>
@endsection
