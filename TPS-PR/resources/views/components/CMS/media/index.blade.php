@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Media Library</h1>

    <a href="{{ route('media.create') }}" class="btn btn-primary mb-3">Upload New</a>

    <div class="row">
        @forelse($media as $file)
            <div class="col-md-3 mb-4">
                <div class="card shadow-sm">
                    @if(Str::startsWith($file->mime_type, 'image'))
                        <img src="{{ $file->url() }}" class="card-img-top" alt="{{ $file->file_name }}">
                    @else
                        <div class="p-5 text-center">
                            <i class="bi bi-file-earmark" style="font-size: 40px;"></i>
                        </div>
                    @endif
                    <div class="card-body">
                        <p class="card-text text-truncate">{{ $file->file_name }}</p>
                        <form action="{{ route('media.destroy', $file->id) }}" method="POST">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger">Recycle</button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <p>No media uploaded yet.</p>
        @endforelse
    </div>

    {{ $media->links() }}
</div>
@endsection
