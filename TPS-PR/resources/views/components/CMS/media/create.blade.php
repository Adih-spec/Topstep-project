@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Upload Media</h1>

    <form action="{{ route('media.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label">Choose File</label>
            <input type="file" name="file" class="form-control" required>
        </div>
        <button class="btn btn-success">Upload</button>
    </form>
</div>

<div class="mb-3">
    <label class="form-label">Choose File</label>
    <input type="file" name="file" id="fileInput" class="form-control" required>
    <img id="previewImage" src="#" style="display:none; max-width:150px; margin-top:10px;">
</div>

<script>
document.getElementById('fileInput').onchange = evt => {
    const [file] = evt.target.files
    if (file) {
        document.getElementById('previewImage').style.display = 'block';
        document.getElementById('previewImage').src = URL.createObjectURL(file)
    }
}
</script>

@endsection
