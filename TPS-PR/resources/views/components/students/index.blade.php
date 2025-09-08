@extends('components.layouts.app')

@section('pageTitle', 'Students')
@section('pageContent')
    <h1>Students</h1>
    <a href="{{ route('students.create') }}" class="btn btn-primary mb-3">Add New Student</a>
    
   
@endsection
