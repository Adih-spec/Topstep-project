@extends('layouts.app')

@section('content')
<div class="container my-4">
    <div class="card shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Employees</h4>
            <a href="{{ route('employees.create') }}" class="btn btn-primary">
                <i class="bi bi-person-plus"></i> Add Employee
            </a>
        </div>

        <div class="card-body">
            {{-- Flash Messages --}}
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if($employees->count() > 0)
                <div class="table-responsive">
                    <table class="table table-striped table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Department</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($employees as $employee)
                            <tr>
                                <td>{{ $employee->FirstName }} {{ $employee->LastName }}</td>
                                <td>{{ $employee->Email }}</td>
                                <td>
                                    <span class="badge {{ $employee->role === 'teacher' ? 'bg-success' : 'bg-info' }}">
                                        {{ ucfirst($employee->role) }}
                                    </span>
                                </td>
                                <td>                    
                                    @if($employee->department)
                        {{ $employee->department->DepartmentName }} ({{ $employee->department->Type }})
                    @else
                        <span class="text-muted">No Department</span>
                    @endif</td>
                                <td class="text-center">
                                    <a href="{{ route('employees.edit', $employee->EmployeeID) }}" class="btn btn-sm btn-warning me-1">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>
                                    <form action="{{ route('employees.destroy', $employee->EmployeeID) }}" method="POST" class="d-inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this employee?')">
                                            <i class="bi bi-trash"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mt-3">
                    {{ $employees->links() }}
                </div>
            @else
                <div class="alert alert-info">No employees found.</div>
            @endif
        </div>
    </div>
</div>
@endsection
