{{-- resources/views/students/index.blade.php --}}
{{-- Expects: $students (LengthAwarePaginator<Student>), $classes (Collection<ClassModel>) --}}

@extends('components.layouts.app')
@section('PageTitle', 'Students')
@section('pageContent')
<div class="container-fluid py-3">
    {{-- Page header + quick actions --}}
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-3">
        <div>
            <h1 class="h4 mb-0">Students</h1>
            <div class="text-muted small">Manage student records, filters, and quick actions.</div>
        </div>
        <div class="btn-group">
            <a href="{{ route('students.create') }}" class="btn btn-success">Add Student</a>
        </div>
    </div>

    {{-- Flash messages --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- Filters/Search --}}
    <form method="GET" action="{{ route('students.index') }}" class="row g-2 align-items-end mb-3" novalidate>
        <div class="col-md-4">
            <label for="q" class="form-label">Search</label>
            <input type="text" name="q" id="q" value="{{ request('q') }}" class="form-control" placeholder="Name or Email">
        </div>
        <div class="col-md-4">
            <label for="class_id" class="form-label">Class</label>
            <select name="class_id" id="class_id" class="form-select">
                <option value="">All</option>
                @foreach($classes as $class)
                    <option value="{{ $class->id }}" @selected((string)request('class_id') === (string)$class->id)>
                        {{ $class->class_name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-2 d-grid">
            <button type="submit" class="btn btn-primary">Apply</button>
        </div>
    </form>

    {{-- Results summary --}}
    <div class="d-flex justify-content-between align-items-center mb-2">
        <div class="text-muted small">
            @if($students->total() > 0)
                Showing {{ $students->firstItem() }}–{{ $students->lastItem() }} of {{ $students->total() }}
            @else
                No results
            @endif
        </div>
    </div>

    {{-- Data table --}}
    <div class="card">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Date of Birth</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Address</th>
                        <th scope="col">Class</th>
                        <th scope="col" class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                @forelse ($students as $student)
                    <tr>
                        <td class="fw-semibold">{{ $student->first_name }} {{ $student->last_name }}</td>
                        <td>{{ $student->email ?? '—' }}</td>
                        <td>{{ $student->phone ?? '—' }}</td>
                        <td>
                            @if($student->dob)
                                {{ \Carbon\Carbon::parse($student->dob)->format('d M Y') }}
                            @else
                                —
                            @endif
                        </td>
                        <td>{{ $student->gender ?? '—' }}</td>
                        <td>{{ $student->address ?? '—' }}</td>
                        <td>
                            @if(optional($student->klass)->class_name)
                                {{ $student->klass->class_name }}
                            @else
                                <span class="text-muted">—</span>
                            @endif
                        </td>
                        <td class="text-end">
                            <a href="{{ route('students.show', $student) }}" class="btn btn-sm btn-outline-secondary">View</a>
                            <a href="{{ route('students.edit', $student) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('students.destroy', $student) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this student? This cannot be undone.');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center py-4 text-muted">No students found. Try adjusting your filters.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Pagination --}}
    <div class="d-flex justify-content-between align-items-center mt-3">
        <div class="text-muted small">
            @if($students->total() > 0)
                Showing {{ $students->firstItem() }}–{{ $students->lastItem() }} of {{ $students->total() }}
            @endif
        </div>
        <div>
            {{ $students->appends(request()->all())->links() }}
        </div>
    </div>
</div>
@endsection

