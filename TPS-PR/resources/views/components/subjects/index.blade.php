
@extends('components.layouts.app')

@section('PageTitle', 'Manage Courses')

@section('pageContent')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-lg border-0 rounded-3">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Courses</h4>
                    <div>
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-light btn-sm me-2">
                            <i class="bi bi-house"></i> Dashboard
                        </a>
                        <a href="{{ route('admin.admins.index') }}" class="btn btn-light btn-sm me-2">
                            <i class="bi bi-person"></i> Admins
                        </a>
                        <a href="{{ route('admin.classes.index') }}" class="btn btn-light btn-sm me-2">
                            <i class="bi bi-book"></i> Classes
                        </a>
                        <a href="{{ route('admin.subjects.create') }}" class="btn btn-light btn-sm me-2">
                            <i class="bi bi-plus-circle"></i> Add Course
                        </a>
                        <a href="{{ route('admin.students.recycle') }}" class="btn btn-light btn-sm">
                            <i class="bi bi-recycle"></i> Recycle Bin
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if($subjects->isEmpty())
                        <div class="alert alert-info">
                            No courses found. <a href="{{ route('admin.subjects.create') }}">Add a new course</a>.
                        </div>
                    @else
                        <div class="mb-3">
                            <p><strong>Total Courses:</strong> {{ $totalSubjects }}</p>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover align-middle">
                                <thead class="table-primary">
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Created At</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($subjects as $subject)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $subject->name }}</td>
                                            <td>{{ $subject->description ?? 'N/A' }}</td>
                                            <td>{{ $subject->created_at->format('M d, Y') }}</td>
                                            <td>
                                                <a href="{{ route('admin.subjects.show', $subject->id) }}" class="btn btn-info btn-sm me-1">
                                                    <i class="bi bi-eye"></i> View
                                                </a>
                                                <a href="{{ route('admin.subjects.edit', $subject->id) }}" class="btn btn-warning btn-sm me-1">
                                                    <i class="bi bi-pencil"></i> Edit
                                                </a>
                                                <form action="{{ route('admin.subjects.destroy', $subject->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this course?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        <i class="bi bi-trash"></i> Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{ $subjects->links() }}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
```

**resources/views/admin/subjects/create.blade.php**
<xaiArtifact artifact_id="0a68f681-44a9-4101-b5a0-ed52ede973a4" artifact_version_id="7a40803a-46a9-4a06-a066-6a5a1efd839d" title="admin/subjects/create.blade.php" contentType="text/html">
```php
@extends('components.layouts.app')

@section('PageTitle', 'Create Course')

@section('pageContent')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0 rounded-3">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Add New Course</h4>
                    <div>
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-light btn-sm me-2" title="Dashboard">
                            <i class="bi bi-house"></i>
                        </a>
                        <a href="{{ route('admin.admins.index') }}" class="btn btn-light btn-sm me-2" title="Admins">
                            <i class="bi bi-person"></i>
                        </a>
                        <a href="{{ route('admin.classes.index') }}" class="btn btn-light btn-sm me-2" title="Classes">
                            <i class="bi bi-book"></i>
                        </a>
                        <a href="{{ route('admin.subjects.index') }}" class="btn btn-light btn-sm me-2" title="Courses">
                            <i class="bi bi-journal-text"></i>
                        </a>
                        <a href="{{ route('admin.students.recycle') }}" class="btn btn-light btn-sm" title="Recycle Bin">
                            <i class="bi bi-recycle"></i>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('admin.subjects.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Course Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" placeholder="e.g., Mathematics" required>
                            <small class="form-text text-muted">Enter a unique name for the course.</small>
                            @error('name')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" id="description" class="form-control" rows="5" placeholder="Describe the course content">{{ old('description') }}</textarea>
                            <small class="form-text text-muted">Provide a brief overview of the course (optional).</small>
                            @error('description')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.subjects.index') }}" class="btn btn-secondary">
                                <i class="bi bi-arrow-left"></i> Cancel
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save"></i> Create Course
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
```

**resources/views/admin/subjects/edit.blade.php**
<xaiArtifact artifact_id="b8695634-84e1-4270-a892-363e0011a5b7" artifact_version_id="541e8c53-7034-4d31-ab5f-9ac7eed0e176" title="admin/subjects/edit.blade.php" contentType="text/html">
```php
@extends('components.layouts.app')

@section('PageTitle', 'Edit Course')

@section('pageContent')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0 rounded-3">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Edit Course: {{ $subject->name }}</h4>
                    <div>
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-light btn-sm me-2" title="Dashboard">
                            <i class="bi bi-house"></i>
                        </a>
                        <a href="{{ route('admin.admins.index') }}" class="btn btn-light btn-sm me-2" title="Admins">
                            <i class="bi bi-person"></i>
                        </a>
                        <a href="{{ route('admin.classes.index') }}" class="btn btn-light btn-sm me-2" title="Classes">
                            <i class="bi bi-book"></i>
                        </a>
                        <a href="{{ route('admin.subjects.index') }}" class="btn btn-light btn-sm me-2" title="Courses">
                            <i class="bi bi-journal-text"></i>
                        </a>
                        <a href="{{ route('admin.students.recycle') }}" class="btn btn-light btn-sm" title="Recycle Bin">
                            <i class="bi bi-recycle"></i>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('admin.subjects.update', $subject->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name" class="form-label">Course Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $subject->name) }}" placeholder="e.g., Mathematics" required>
                            <small class="form-text text-muted">Enter a unique name for the course.</small>
                            @error('name')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" id="description" class="form-control" rows="5" placeholder="Describe the course content">{{ old('description', $subject->description) }}</textarea>
                            <small class="form-text text-muted">Provide a brief overview of the course (optional).</small>
                            @error('description')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.subjects.index') }}" class="btn btn-secondary">
                                <i class="bi bi-arrow-left"></i> Cancel
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save"></i> Update Course
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
```

**resources/views/admin/subjects/show.blade.php**
<xaiArtifact artifact_id="a69e6005-019f-456d-bc35-b6c987752d68" artifact_version_id="0c87db48-edb0-4307-b537-ddf1f1ee797f" title="admin/subjects/show.blade.php" contentType="text/html">
```php
@extends('components.layouts.app')

@section('PageTitle', 'Course Details')

@section('pageContent')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0 rounded-3">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Course: {{ $subject->name }}</h4>
                    <div>
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-light btn-sm me-2" title="Dashboard">
                            <i class="bi bi-house"></i>
                        </a>
                        <a href="{{ route('admin.admins.index') }}" class="btn btn-light btn-sm me-2" title="Admins">
                            <i class="bi bi-person"></i>
                        </a>
                        <a href="{{ route('admin.classes.index') }}" class="btn btn-light btn-sm me-2" title="Classes">
                            <i class="bi bi-book"></i>
                        </a>
                        <a href="{{ route('admin.subjects.index') }}" class="btn btn-light btn-sm me-2" title="Courses">
                            <i class="bi bi-journal-text"></i>
                        </a>
                        <a href="{{ route('admin.students.recycle') }}" class="btn btn-light btn-sm" title="Recycle Bin">
                            <i class="bi bi-recycle"></i>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif
                    <div class="mb-3">
                        <h5>Course Name</h5>
                        <p>{{ $subject->name }}</p>
                    </div>
                    <div class="mb-3">
                        <h5>Description</h5>
                        <p>{{ $subject->description ?? 'No description provided.' }}</p>
                    </div>
                    <div class="mb-3">
                        <h5>Created At</h5>
                        <p>{{ $subject->created_at->format('M d, Y H:i') }}</p>
                    </div>
                    <div class="mb-3">
                        <h5>Updated At</h5>
                        <p>{{ $subject->updated_at->format('M d, Y H:i') }}</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.subjects.edit', $subject->id) }}" class="btn btn-warning">
                            <i class="bi bi-pencil"></i> Edit Course
                        </a>
                        <a href="{{ route('admin.subjects.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i> Back to Courses
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
