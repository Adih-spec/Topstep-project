@extends('components.layouts.app')

@section('pageTitle', 'User Profile')

@section('pageContent')
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">{{ $user->name }}</h4>
        </div>
        <div class="card-body">
            <p><strong>Email:</strong> {{ $user->email }}</p>
            
            <p><strong>Roles:</strong>
                @if($user->roles->count())
                    @foreach($user->roles as $role)
                        <span class="badge bg-info text-dark">{{ $role->name }}</span>
                    @endforeach
                @else
                    <span class="text-muted">No roles assigned</span>
                @endif
            </p>

            <p><strong>Created At:</strong> {{ $user->created_at->format('d M Y, h:i A') }}</p>
            <p><strong>Updated At:</strong> {{ $user->updated_at->format('d M Y, h:i A') }}</p>
        </div>
        <div class="card-footer text-end">
            <a href="{{ route('users.search') }}" class="btn btn-secondary">Back to Search</a>
        </div>
    </div>
</div>
@endsection
