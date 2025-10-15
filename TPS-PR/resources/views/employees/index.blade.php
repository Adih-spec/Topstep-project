@extends('components.layouts.app')

@section('pageContent')
    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content">

            <!-- Page Header -->
            <div class="d-md-flex d-block align-items-center justify-content-between mb-3">
                <div class="my-auto mb-2">
                    <h3 class="page-title mb-1">Staffs</h3>
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="{{ route('dashboard') }}">Admin Dashboard</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="javascript:void(0);">HRM</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Staffs</li>
                        </ol>
                    </nav>
                </div>
                <div class="d-flex my-xl-auto right-content align-items-center flex-wrap">
                    <div class="pe-1 mb-2">
                        <a href="{{ route('employees.index') }}" class="btn btn-outline-light bg-white btn-icon me-1"
                           data-bs-toggle="tooltip" data-bs-placement="top" title="Refresh">
                            <i class="ti ti-refresh"></i>
                        </a>
                    </div>
                    <div class="pe-1 mb-2">
                        <button type="button" class="btn btn-outline-light bg-white btn-icon me-1" title="Print">
                            <i class="ti ti-printer"></i>
                        </button>
                    </div>
                    <div class="dropdown me-2 mb-2">
                        <a href="javascript:void(0);" class="dropdown-toggle btn btn-light fw-medium d-inline-flex align-items-center"
                           data-bs-toggle="dropdown">
                            <i class="ti ti-file-export me-2"></i>Export
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end p-3">
                            <li><a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-file-type-pdf me-1"></i>Export as PDF</a></li>
                            <li><a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-file-type-xls me-1"></i>Export as Excel</a></li>
                        </ul>
                    </div>
                    <div class="mb-2">
                        <a href="{{ route('employees.create') }}" class="btn btn-primary d-flex align-items-center">
                            <i class="ti ti-square-rounded-plus me-2"></i>Add Staff
                        </a>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <!-- Staffs List -->
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between flex-wrap pb-0">
                    <h4 class="mb-3">Staffs List</h4>

                    <div class="d-flex align-items-center flex-wrap">
                        <div class="input-icon-start mb-3 me-2 position-relative">
                            <span class="icon-addon">
                                <i class="ti ti-calendar"></i>
                            </span>
                            <input type="text" class="form-control date-range bookingrange" placeholder="Select"
                            value="Academic Year : 2024 / 2025">
                        </div>
                        <div class="dropdown mb-3 me-2">
                            <a href="javascript:void(0);" class="btn btn-outline-light bg-white dropdown-toggle"
                                data-bs-toggle="dropdown" data-bs-auto-close="outside"><i
                                    class="ti ti-filter me-2"></i>Filter</a>
                            <div class="dropdown-menu drop-width">
                                <form action="teachers.html">
                                    <div class="d-flex align-items-center border-bottom p-3">
                                        <h4>Filter</h4>
                                    </div>
                                    <div class="p-3 border-bottom pb-0">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Name</label>
                                                    <select class="select">
                                                        <option>Select</option>
                                                        <option>Teresa</option>
                                                        <option>Daniel</option>
                                                        <option>Hellana</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Class</label>
                                                    <select class="select">
                                                        <option>Select</option>
                                                        <option>I</option>
                                                        <option>II</option>
                                                        <option>III</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Status</label>
                                                    <select class="select">
                                                        <option>Select</option>
                                                        <option>Active</option>
                                                        <option>Inactive</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-3 d-flex align-items-center justify-content-end">
                                        <a href="teachers.html#" class="btn btn-light me-3">Reset</a>
                                        <button type="submit" class="btn btn-primary">Apply</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- Search Staff -->
                        <form action="{{ route('employees.index') }}" method="GET" class="d-flex mb-3 me-2">
                            <input type="text" name="search" class="form-control me-2" placeholder="Search Staff..." value="{{ request('search') }}">
                            <button class="btn btn-primary">Search</button>
                        </form>

                        <!-- Sort Dropdown -->
                        <div class="dropdown mb-3">
                            <a href="javascript:void(0);" class="btn btn-outline-light bg-white dropdown-toggle"
                               data-bs-toggle="dropdown"><i class="ti ti-sort-ascending-2 me-2"></i>Sort by
                            </a>
                            <ul class="dropdown-menu p-3">
                                <li><a href="{{ route('employees.index', ['sort' => 'asc']) }}" class="dropdown-item rounded-1 {{ request('sort')=='asc' ? 'active' : '' }}">Ascending</a></li>
                                <li><a href="{{ route('employees.index', ['sort' => 'desc']) }}" class="dropdown-item rounded-1 {{ request('sort')=='desc' ? 'active' : '' }}">Descending</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="card-body p-0 py-3">
                    {{-- Flash Messages --}}
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <!-- Staff Table -->
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Department</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Date Joined</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($employees as $staff)
                                    <tr>
                                        <td>{{ $staff?->employeeIDNo }}</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="{{ $staff->ProfilePicture ? asset($staff->ProfilePicture) : asset('default-avatar.png') }}"
                                                     class="img-fluid rounded-circle me-2" width="40" height="40" alt="avatar">
                                                <span>{{ $staff->LastName }} {{ $staff->FirstName }} {{ $staff->OtherName }}</span>
                                            </div>
                                        </td>
                                        <td>{{ $staff->department->name ?? 'N/A' }}</td>
                                        <td>{{ $staff->Email }}</td>
                                        <td>{{ $staff->Phone }}</td>
                                        <td>{{ \Carbon\Carbon::parse($staff->DateOfJoin)->format('d M Y') }}</td>
                                        <td>
                                            <span class="badge {{ $staff->Status == 'Active' ? 'badge-soft-success' : 'badge-soft-danger' }}">
                                                <i class="ti ti-circle-filled fs-5 me-1"></i>{{ $staff->Status }}
                                            </span>
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <a href="#" class="btn btn-white btn-icon btn-sm d-flex align-items-center justify-content-center rounded-circle p-0"
                                                   data-bs-toggle="dropdown"><i class="ti ti-dots-vertical fs-14"></i></a>
                                                <ul class="dropdown-menu p-3">
                                                    <li><a href="{{ route('employees.show', $staff->EmployeeID) }}" class="dropdown-item rounded-1"><i class="ti ti-menu me-2"></i>View Staff</a></li>
                                                    <li><a href="{{ route('employees.edit', $staff->EmployeeID) }}" class="dropdown-item rounded-1"><i class="ti ti-edit-circle me-2"></i>Edit</a></li>
                                                    <li>
                                                        <form action="{{ route('employees.destroy', $staff->EmployeeID) }}" method="POST" onsubmit="return confirm('Delete this staff?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="dropdown-item rounded-1 text-danger"><i class="ti ti-trash-x me-2"></i>Delete</button>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center">No staffs found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="mt-3">
                        {{ $employees->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
            <!-- /Staffs List -->

        </div>
    </div>
@endsection
