@extends('layouts.app')

@section('title', 'Guardians')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-primary">Guardians Management</h1>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="{{ route('guardian.register') }}" class="btn btn-success">
            Add New Guardian
        </a>

        <!-- Trigger Recycle Bin Modal -->
        <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#recycleBinModal">
            🗑️ Recycle Bin
        </button>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="card shadow">
        <div class="card-body table-responsive">
            <table class="table table-hover table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Other Names</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Status</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($guardians as $guardian)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $guardian->first_name }}</td>
                        <td>{{ $guardian->last_name }}</td>
                        <td>{{ $guardian->other_names }}</td>
                        <td>{{ $guardian->email }}</td>
                        <td>{{ $guardian->phone }}</td>
                        <td>
                            <span class="badge {{ $guardian->deleted_at ? 'bg-danger' : 'bg-success' }}">
                                {{ $guardian->deleted_at ? 'Inactive' : 'Active' }}
                            </span>
                        </td>
                        <td class="text-center">
                            <!-- Dropdown -->
                            <div class="dropdown">
                                <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" id="actionsDropdown{{ $guardian->id }}" data-bs-toggle="dropdown" aria-expanded="false">
                                    Actions
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="actionsDropdown{{ $guardian->id }}">
                                    <li>
                                        <a href="{{ route('guardians.show', $guardian->id) }}" class="dropdown-item">View</a>
                                    </li>
                                    <li>
                                        <!-- Trigger Edit Modal -->
                                        <button class="dropdown-item text-warning" data-bs-toggle="modal" data-bs-target="#editGuardianModal{{ $guardian->id }}">
                                            Edit
                                        </button>
                                    </li>
                                    <li>
                                        <form action="{{ route('guardians.destroy', $guardian->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="dropdown-item text-danger" onclick="return confirm('Are you sure you want to delete this guardian?')">Delete</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>

                    <!-- Edit Guardian Modal -->
                    <div class="modal fade" id="editGuardianModal{{ $guardian->id }}" tabindex="-1" aria-labelledby="editGuardianModalLabel{{ $guardian->id }}" aria-hidden="true">
                      <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                          <div class="modal-header bg-warning text-dark">
                            <h5 class="modal-title fw-bold" id="editGuardianModalLabel{{ $guardian->id }}">
                              Edit Guardian - {{ $guardian->first_name }} {{ $guardian->last_name }}
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                          </div>

                          <div class="modal-body">
                            <form action="{{ route('guardians.update', $guardian->id) }}" method="POST" enctype="multipart/form-data">
                              @csrf
                              @method('PUT')

                              <!-- Names -->
                              <div class="row mb-4">
                                <div class="col-md-4">
                                  <label for="first_name{{ $guardian->id }}" class="form-label fw-semibold">First Name</label>
                                  <input type="text" id="first_name{{ $guardian->id }}" name="first_name"
                                         class="form-control rounded-3"
                                         value="{{ old('first_name', $guardian->first_name) }}" required>
                                </div>
                                <div class="col-md-4">
                                  <label for="last_name{{ $guardian->id }}" class="form-label fw-semibold">Last Name</label>
                                  <input type="text" id="last_name{{ $guardian->id }}" name="last_name"
                                         class="form-control rounded-3"
                                         value="{{ old('last_name', $guardian->last_name) }}" required>
                                </div>
                                <div class="col-md-4">
                                  <label for="other_names{{ $guardian->id }}" class="form-label fw-semibold">Other Names</label>
                                  <input type="text" id="other_names{{ $guardian->id }}" name="other_names"
                                         class="form-control rounded-3"
                                         value="{{ old('other_names', $guardian->other_names) }}">
                                </div>
                              </div>

                              <!-- Contact Info -->
                              <div class="row mb-4">
                                <div class="col-md-4">
                                  <label for="phone{{ $guardian->id }}" class="form-label fw-semibold">Phone</label>
                                  <input type="tel" id="phone{{ $guardian->id }}" name="phone"
                                         class="form-control rounded-3"
                                         value="{{ old('phone', $guardian->phone) }}" required>
                                </div>
                                <div class="col-md-4">
                                  <label for="email{{ $guardian->id }}" class="form-label fw-semibold">Email</label>
                                  <input type="email" id="email{{ $guardian->id }}" name="email"
                                         class="form-control rounded-3"
                                         value="{{ old('email', $guardian->email) }}" required>
                                </div>
                                <div class="col-md-4">
                                  <label for="religion{{ $guardian->id }}" class="form-label fw-semibold">Religion</label>
                                  <select id="religion{{ $guardian->id }}" name="religion" class="form-select rounded-3" required>
                                    <option value="">--Select--</option>
                                    <option value="Christianity" {{ old('religion', $guardian->religion) == 'Christianity' ? 'selected' : '' }}>Christianity</option>
                                    <option value="Islam" {{ old('religion', $guardian->religion) == 'Islam' ? 'selected' : '' }}>Islam</option>
                                    <option value="Other" {{ old('religion', $guardian->religion) == 'Other' ? 'selected' : '' }}>Other</option>
                                  </select>
                                </div>
                              </div>

                              <!-- Other Info -->
                              <div class="row mb-4">
                                <div class="col-md-6">
                                  <label for="residential_address{{ $guardian->id }}" class="form-label fw-semibold">Residential Address</label>
                                  <input type="text" id="residential_address{{ $guardian->id }}" name="residential_address"
                                         class="form-control rounded-3"
                                         value="{{ old('residential_address', $guardian->residential_address) }}" required>
                                </div>
                                <div class="col-md-6">
                                  <label for="occupation{{ $guardian->id }}" class="form-label fw-semibold">Occupation</label>
                                  <input type="text" id="occupation{{ $guardian->id }}" name="occupation"
                                         class="form-control rounded-3"
                                         value="{{ old('occupation', $guardian->occupation) }}">
                                </div>
                              </div>

                              <!-- Location -->
                              <div class="row mb-4">
                                <div class="col-md-4">
                                    <label class="form-label fw-semibold text-dark">Country</label>
                                    <select name="country" class="form-control rounded-3 country-select"
                                            data-selected="{{ old('country', $guardian->country ?? '') }}" required>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-semibold text-dark">State</label>
                                    <select name="state_of_origin" class="form-control rounded-3 state-select"
                                            data-selected="{{ old('state_of_origin', $guardian->state_of_origin ?? '') }}" required>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-semibold text-dark">LGA / City</label>
                                    <select name="city" class="form-control rounded-3 city-select"
                                            data-selected="{{ old('city', $guardian->city ?? '') }}" required>
                                    </select>
                                </div>
                              </div>

                              {{-- Profile Photo --}}
<div class="mb-4 text-center">
    @if($guardian->photo)
        <img src="{{ asset($guardian->photo) }}" 
             alt="Guardian Photo" 
             class="rounded-circle shadow-sm mb-2" 
             width="120" height="120">
    @else
        <img src="https://ui-avatars.com/api/?name={{ urlencode($guardian->first_name . ' ' . $guardian->last_name) }}&background=random&color=fff&size=120" 
             alt="Guardian Avatar" 
             class="rounded-circle shadow-sm mb-2">
    @endif

    <div class="mt-2">
        <label for="photo{{ $guardian->id }}" class="form-label fw-semibold">Change Photo</label>
        <input type="file" id="photo{{ $guardian->id }}" name="photo" 
               class="form-control" accept="image/*">
    </div>
</div>

                              <div class="text-end">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-warning">Update Guardian</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- End Edit Modal -->

                    @empty
                    <tr>
                        <td colspan="8" class="text-center text-muted">No guardians found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Recycle Bin Modal -->
<div class="modal fade" id="recycleBinModal" tabindex="-1" aria-labelledby="recycleBinModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content shadow-lg border-0 rounded-3">
            <div class="modal-header bg-warning text-dark">
                <h5 class="modal-title" id="recycleBinModalLabel">Recycle Bin - Deleted Guardians</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-hover table-bordered align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Guardian Name</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Deleted At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse(\App\Models\Guardian::onlyTrashed()->get() as $deletedGuardian)
                            <tr>
                                <td>{{ $deletedGuardian->first_name }} {{ $deletedGuardian->last_name }} {{ $deletedGuardian->other_names }}</td>
                                <td>{{ $deletedGuardian->email }}</td>
                                <td><span class="badge bg-danger">Inactive</span></td>
                                <td>{{ $deletedGuardian->deleted_at->format('d M, Y h:i A') }}</td>
                                <td>
                                    <form action="{{ route('guardians.restore', $deletedGuardian->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-success btn-sm">Restore</button>
                                    </form>
                                    <form action="{{ route('guardians.forceDelete', $deletedGuardian->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete Permanently</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted">No deleted guardians found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection
