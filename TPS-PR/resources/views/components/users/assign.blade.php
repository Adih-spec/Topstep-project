@extends('components.layouts.app')

@section('pageTitle', 'Assign Roles & Permissions')

@section('pageContent')
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-dark text-white">
            <h4 class="mb-0">Assign Roles & Permissions to {{ $user->name }}</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('users.assign.update', $user->id) }}" method="POST">
                @csrf

                <!-- Roles -->
                <div class="mb-4">
                    <h5 class="mb-2">Roles</h5>
                    <div class="row">
                        @foreach($roles as $role)
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input type="checkbox" 
                                           name="roles[]" 
                                           value="{{ $role->name }}" 
                                           id="role_{{ $role->id }}"
                                           class="form-check-input"
                                           {{ $user->roles->contains('name', $role->name) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="role_{{ $role->id }}">
                                        {{ ucfirst($role->name) }}
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Permissions -->
                <div class="mb-4">
                    <h5 class="mb-2">Permissions</h5>
                    <div class="row">
                        @foreach($permissions as $permission)
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input type="checkbox" 
                                           name="permissions[]" 
                                           value="{{ $permission->name }}" 
                                           id="perm_{{ $permission->id }}"
                                           class="form-check-input"
                                           {{ $user->permissions->contains('name', $permission->name) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="perm_{{ $permission->id }}">
                                        {{ ucfirst($permission->name) }}
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Actions -->
                <div class="text-end">
                    <a href="{{ route('users.show', $user->id) }}" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
