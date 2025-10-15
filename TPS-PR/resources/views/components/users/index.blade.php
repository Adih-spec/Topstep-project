@extends('components.layouts.app')

@section('pageTitle', 'Search Users')
@section('pageContent')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <!-- Search Card -->
            <div class="card shadow-sm border-0 rounded">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Search for a User</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('users.search') }}" method="GET" class="row g-3">
                        <div class="col-md-9">
                            <input 
                                type="text" 
                                name="query" 
                                class="form-control" 
                                placeholder="Enter name, email, or username..." 
                                required
                            >
                        </div>
                        <div class="col-md-3 d-grid">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-search"></i> Search
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Search Results -->
            @isset($users)
                <div class="card mt-4 shadow-sm border-0 rounded">
                    <div class="card-header bg-light">
                        <h6 class="mb-0">Search Results</h6>
                    </div>
                    <div class="card-body">
                        @if($users->isEmpty())
                            <p class="text-muted">No users found.</p>
                        @else
                            <ul class="list-group">
                                @foreach($users as $user)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <div>
                                            <strong>{{ $user->name }}</strong> <br>
                                            <small class="text-muted">{{ $user->email }}</small>
                                        </div>
                                        <a href="{{ route('users.show', $user->id) }}" class="btn btn-sm btn-outline-primary">
                                            View
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            @endisset

        </div>
    </div>
</div>

@endsection
