@extends('components.layouts.app')

@section('pageTitle', 'Create Permission')

@section('pageContent')
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Create New Permission</h4>
            <a href="{{ route('permissions.index') }}" class="btn btn-secondary btn-sm">
                ← Back
            </a>
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

            <form action="{{ route('permissions.store') }}" method="POST">
                @csrf

                {{-- Permission Name --}}
                <div class="mb-3">
                    <label for="name" class="form-label fw-semibold">
                        Permission Name <span class="text-danger">*</span>
                    </label>
                    <input type="text" 
                           id="name" 
                           name="name" 
                           class="form-control @error('name') is-invalid @enderror" 
                           value="{{ old('name') }}" 
                           placeholder="Enter permission name" 
                           required>
                    <div class="form-text">Example: <code>edit-posts</code></div>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>


                {{-- Submit --}}
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-check-circle me-1"></i> Create Permission
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
