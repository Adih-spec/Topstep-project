@extends('components.layouts.app')

@section('pageTitle', 'Create Role')
@section('pageContent')
<div class="container">
    <a href="{{ route('roles.index') }}" class="btn btn-secondary mb-3">Back</a>
    <h2>Create New Role</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('roles.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name">Role Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="guard_name">Guard Name</label>
            <select name="guard_name" class="form-control" required>
                @foreach($guards as $guard)
                    <option value="{{ $guard }}">{{ ucfirst($guard) }}</option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-success" type="submit">Create Role</button>
    </form>
</div>
@endsection
