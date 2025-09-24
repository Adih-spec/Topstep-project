@extends('components.layouts.app')

@section('pageTitle', 'Edit Guard')

@section('pageContent')
<div class="container mt-4">
    <h1 class="mb-4">Edit Guard</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('guards.update', $guard->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Guard Name</label>
            <input 
                type="text" 
                name="guard_name" 
                class="form-control @error('guard_name') is-invalid @enderror"
                value="{{ old('guard_name', $guard->guard_name) }}"
                required
            >
            @error('guard_name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update Guard</button>
        <a href="{{ route('guards.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
