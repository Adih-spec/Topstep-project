@extends('components.layouts.app')

@section('pageTitle', 'Edit Permission')

@section('pageContent')
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Edit Permission</h4>
            <a href="{{ route('permissions.index') }}" class="btn btn-secondary btn-sm">← Back</a>
        </div>
        <div class="card-body">

            {{-- Show Validation Errors --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Edit Form --}}
            <form action="{{ route('permissions.update', $permission->id) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- Permission Name --}}
                <div class="mb-3">
                    <label for="name" class="form-label fw-semibold">Permission Name</label>
                    <input type="text" 
                           id="name" 
                           name="name" 
                           value="{{ old('name', $permission->name) }}" 
                           class="form-control @error('name') is-invalid @enderror" 
                           required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Guard Name --}}
                <div class="mb-3">
                    <label for="guard_name" class="form-label fw-semibold">Guard Name</label>
                    <select name="guard_name" id="guard_name" class="form-select" required>
                        <option value="web" {{ $permission->guard_name == 'web' ? 'selected' : '' }}>Web</option>
                        <option value="admin" {{ $permission->guard_name == 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="teacher" {{ $permission->guard_name == 'teacher' ? 'selected' : '' }}>Teacher</option>
                        <option value="student" {{ $permission->guard_name == 'student' ? 'selected' : '' }}>Student</option>
                        <option value="guardian" {{ $permission->guard_name == 'guardian' ? 'selected' : '' }}>Guardian</option>
                    </select>
                </div>

                {{-- Submit --}}
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save me-1"></i> Update Permission
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
