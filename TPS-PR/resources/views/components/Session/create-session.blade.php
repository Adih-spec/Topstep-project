@extends('components.layouts.app')
@section('pageTitle', 'Session Management')
@section('pageContent')
@if(session('success'))
    <div class="alert alert-success mt-3">
        {{ session('success') }}
    </div>
@endif
@if($errors->any())
    <div class="alert alert-danger mt-3">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Create New School Session</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.sessions.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="school_session_title" class="form-label">Session Title</label>
                    <input type="text" class="form-control" id="school_session_title" name="school_session_title" required>
                </div>
                <div class="mb-3">
                    <label for="session_start_date" class="form-label">Start Date</label>
                    <input type="date" class="form-control" id="session_start_date" name="session_start_date">
                </div>
                <div class="mb-3">
                    <label for="session_end_date" class="form-label">End Date</label>
                    <input type="date" class="form-control" id="session_end_date" name="session_end_date">
                </div>
                <button type="submit" class="btn btn-success">Create Session</button>
            </form>
        </div>
    </div>
</div>

<div class="container mt-4">
    <div class="card">
        <div class="card-header bg-secondary text-white">
            <h5 class="mb-0">Existing School Sessions</h5>
        </div>
        <div class="card-body p-0">
            <table class="table table-striped mb-0">
                <thead>
                    <tr>
                        <th>Session Title</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($sessions as $session)
                        <tr>
                            <td>{{ $session->school_session_title }}</td>
                            <td>{{ \Carbon\Carbon::parse($session->session_start_date)->format('Y-m-d') }}</td>
                            <td>{{ \Carbon\Carbon::parse($session->session_end_date)->format('Y-m-d') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center">No sessions found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection