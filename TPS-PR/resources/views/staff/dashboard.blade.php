@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Welcome Staff!</h1>
        <p>You are logged in as <strong>{{ Auth::user()->name }}</strong></p>
    </div>
@endsection

