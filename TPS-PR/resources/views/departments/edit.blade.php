@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Department</h1>
    <form action="{{ route('departments.update', $department->DepartmentID) }}" method="POST">
        @csrf @method('PUT')
        
        <div class="mb-3">
            <label class="form-label">Department Name</label>
            <input type="text" name="DepartmentName" class="form-control" value="{{ old('DepartmentName', $department->DepartmentName) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Type</label>
            <select name="Type" class="form-select" required>
                <option value="Academic" {{ $department->Type == 'Academic' ? 'selected' : '' }}>Academic</option>
                <option value="Administrative" {{ $department->Type == 'Administrative' ? 'selected' : '' }}>Administrative</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="Description" class="form-control">{{ old('Description', $department->Description) }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('departments.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
