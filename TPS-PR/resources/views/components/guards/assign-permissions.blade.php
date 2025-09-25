@extends('components.layouts.app')
@section('pageTitle', 'Assign Permissions')

@section('pageContent')
<div class="container mt-5">
    <h3 class="mb-4">Assign Permissions to {{ $guard->guard_name }}</h3>

    <form method="POST" action="{{ route('guards.permissions.update', $guard->id) }}">
        @csrf

        <div class="mb-3">
            @foreach($permissions as $permission)
                <div class="form-check">
                    <input class="form-check-input"
                        type="checkbox"
                        name="permissions[]"
                        value="{{ $permission->name }}"
                        id="perm{{ $permission->id }}"
                        {{ $guard->hasPermissionTo($permission->name) ? 'checked' : '' }}>
                    <label class="form-check-label" for="perm{{ $permission->id }}">
                        {{ $permission->name }}
                    </label>
                </div>
            @endforeach
        </div>

        <button class="btn btn-success">Save Permissions</button>
        <a href="{{ route('guards.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
