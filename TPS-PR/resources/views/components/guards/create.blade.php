{{-- resources/views/guards/create.blade.php --}}
@extends('components.layouts.app')

@section('pageTitle', 'Create Guard')

@section('pageContent')
<div class="container mt-4">
    <h1 class="mb-4">Create Guard</h1>

    {{-- Validation errors --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('guards.store') }}">
        @csrf
        <div class="mb-3">
            <label for="guard_name" class="form-label">Guard Name</label>
            <input 
                type="text" 
                name="guard_name" 
                id="guard_name" 
                class="form-control @error('guard_name') is-invalid @enderror" 
                value="{{ old('guard_name') }}" 
                placeholder="Enter guard name" 
                required
            >
            @error('guard_name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Create Guard</button>
        <a href="{{ route('guards.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
