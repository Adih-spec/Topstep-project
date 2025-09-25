@extends('components.layouts.app')

@section('pageTitle', 'Create Permission')

@section('pageContent')
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header d-flex justify-content-between">
            <h4>Create New Permission</h4>
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

            <form method="POST" action="{{ route('permissions.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label fw-semibold">Permission Name</label>
                    <input type="text" name="name" id="name" class="form-control"
                           placeholder="e.g. view-dashboard" required>
                </div>

                <div class="mb-3">
                    <label for="guard_id" class="form-label fw-semibold">Guard</label>
                    <select name="guard_id" id="guard_id" class="form-control" required>
                        <option value="">-- Select Guard --</option>
                        @foreach($guards as $guard)
                            <option value="{{ $guard->id }}">{{ ucfirst($guard->guard_name) }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Create Permission</button>
            </form>
        </div>
    </div>
</div>
@endsection
