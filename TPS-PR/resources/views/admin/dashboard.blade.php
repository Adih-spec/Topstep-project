@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Welcome Admin!</h1>
        <p>You are logged in as <strong>{{ Auth::user()->name }}</strong></p>
    </div>
@endsection
{{-- Only Admins see this --}}
@role('Admin')
  <a href="{{ route('admin.users.index') }}" class="btn btn-primary">Manage Users</a>
@endrole

{{-- Anyone with users.create permission --}}
@can('users.create')
  <button type="button" class="btn btn-success">New User</button>
@endcan

{{-- Any of multiple roles --}}
@hasanyrole('Admin|Teacher')
  <a href="{{ route('posts.editor') }}">Open Post Editor</a>
@endhasanyrole

