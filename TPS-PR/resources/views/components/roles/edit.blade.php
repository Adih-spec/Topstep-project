@extends('components.layouts.app')
@section('pageTitle', 'Edit Role')
@section('pageContent')
<div class="container">
    <h2>Edit Role</h2>
    <form action="{{ route('roles.update', $role->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Role Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $role->name) }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control">{{ old('description', $role->description) }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update Role</button>
        <a href="{{ route('roles.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection