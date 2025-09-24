@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Pages</h1>
    <a href="{{ route('pages.create') }}" class="btn btn-primary">Create Page</a>
    <ul>
        @foreach($pages as $page)
            <li>{{ $page->title }} - {{ $page->status }}</li>
        @endforeach
    </ul>
    {{ $pages->links() }}
</div>
@endsection
