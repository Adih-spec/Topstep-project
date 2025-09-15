@extends('components.layouts.app')
@section('pageTitle', 'User Dashboard')
@section('pageContent')
    <div class="container">
        <h1>Welcome User!</h1>
        <p>You are logged in as <strong>{{ Auth::user()->name }}</strong></p>
    </div>
@endsection

