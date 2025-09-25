@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add Department</h1>
    <form action="{{ route('departments.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Department Name</label>
            <input type="text" name="DepartmentName" class="form-control" required>
            @error('DepartmentName') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Type</label>
            <select name="Type" class="form-select" required>
                <option value="">-- Select Type --</option>
                <option value="Academic">Academic</option>
                <option value="Administrative">Administrative</option>
            </select>
            @error('Type') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="Description" class="form-control"></textarea>
            @error('Description') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <button type="submit" class="btn btn-success">Save</button>
        <a href="{{ route('departments.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
