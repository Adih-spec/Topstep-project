@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Posts</h1>
    <a href="{{ route('posts.create') }}" class="btn btn-primary">Create Post</a>
    <ul>
        @foreach($posts as $post)
            <li>{{ $post->title }} - by {{ $post->author->name }}</li>
        @endforeach
    </ul>
    {{ $posts->links() }}
</div>
@endsection
