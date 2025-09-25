@extends('components.layouts.app')

@section('pageTitle', 'Edit Permission')

@section('pageContent')
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4>Edit Permission</h4>
            <a href="{{ route('permissions.index') }}" class="btn btn-secondary btn-sm">← Back</a>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('permissions.update', $permission->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">Permission Name</label>
                    <input type="text" name="name" id="name"
                           class="form-control"
                           value="{{ old('name', $permission->name) }}" required>
                </div>

                <div class="mb-3">
                   <div class="mb-3">
                    <label for="guard_id" class="form-label fw-semibold">Guard</label>
                    <select name="guard_id" id="guard_id" class="form-control" required>
                        <option value="">-- Select Guard --</option>
                        @foreach($guards as $guard)
                            <option value="{{ $guard->id }}">{{ ucfirst($guard->guard_name) }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">
                    Update Permission
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
