@extends('layouts.app')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card shadow-lg p-5 rounded-4 border-0">
                <h2 class="text-center mb-4 fw-bold">Edit Guardian</h2>

                {{-- Success & Error Messages --}}
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
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

                <form action="{{ route('guardians.update', $guardian->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    {{-- Names --}}
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <label for="first_name" class="form-label fw-semibold">First Name</label>
                            <input type="text" id="first_name" name="first_name"
                                   class="form-control rounded-3"
                                   value="{{ old('first_name', $guardian->first_name) }}" required>
                        </div>
                        <div class="col-md-4">
                            <label for="last_name" class="form-label fw-semibold">Last Name</label>
                            <input type="text" id="last_name" name="last_name"
                                   class="form-control rounded-3"
                                   value="{{ old('last_name', $guardian->last_name) }}" required>
                        </div>
                        <div class="col-md-4">
                            <label for="other_names" class="form-label fw-semibold">Other Names</label>
                            <input type="text" id="other_names" name="other_names"
                                   class="form-control rounded-3"
                                   value="{{ old('other_names', $guardian->other_names) }}">
                        </div>
                    </div>

                    {{-- Contact Info --}}
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <label for="phone" class="form-label fw-semibold">Phone</label>
                            <input type="tel" id="phone" name="phone"
                                   class="form-control rounded-3"
                                   value="{{ old('phone', $guardian->phone) }}" required>
                        </div>
                        <div class="col-md-4">
                            <label for="email" class="form-label fw-semibold">Email</label>
                            <input type="email" id="email" name="email"
                                   class="form-control rounded-3"
                                   value="{{ old('email', $guardian->email) }}" required>
                        </div>
                        <div class="col-md-4">
                            <label for="religion" class="form-label fw-semibold">Religion</label>
                            <select id="religion" name="religion" class="form-select rounded-3" required>
                                <option value="">--Select--</option>
                                <option value="Christianity" {{ old('religion', $guardian->religion) == 'Christianity' ? 'selected' : '' }}>Christianity</option>
                                <option value="Islam" {{ old('religion', $guardian->religion) == 'Islam' ? 'selected' : '' }}>Islam</option>
                                <option value="Other" {{ old('religion', $guardian->religion) == 'Other' ? 'selected' : '' }}>Other</option>
                            </select>
                        </div>
                    </div>

                    {{-- Other Info --}}
                    <div class="row md-4">
                        <div class="mb-4">
                            <label for="residential_address" class="form-label fw-semibold">Residential Address</label>
                            <input type="text" id="residential_address" name="residential_address"
                                   class="form-control rounded-3"
                                   value="{{ old('residential_address', $guardian->residential_address) }}" required>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <label for="occupation" class="form-label fw-semibold">Occupation</label>
                            <input type="text" id="occupation" name="occupation"
                                   class="form-control rounded-3"
                                   value="{{ old('occupation', $guardian->occupation) }}">
                        </div>
                        <div class="col-md-4">
                            <label for="number_of_children" class="form-label fw-semibold">Children in School</label>
                            <input type="number" id="number_of_children" name="number_of_children"
                                   class="form-control rounded-3"
                                   value="{{ old('number_of_children', $guardian->number_of_children) }}" required>
                        </div>
                        <div class="col-md-4">
                            <label for="relationship_with_student" class="form-label fw-semibold">Relationship</label>
                            <select id="relationship_with_student" name="relationship_with_student" class="form-select rounded-3" required>
                                <option value="">--Select--</option>
                                <option value="Mother" {{ old('relationship_with_student', $guardian->relationship_with_student) == 'Mother' ? 'selected' : '' }}>Mother</option>
                                <option value="Father" {{ old('relationship_with_student', $guardian->relationship_with_student) == 'Father' ? 'selected' : '' }}>Father</option>
                                <option value="Guardian" {{ old('relationship_with_student', $guardian->relationship_with_student) == 'Guardian' ? 'selected' : '' }}>Guardian</option>
                                <option value="Other" {{ old('relationship_with_student', $guardian->relationship_with_student) == 'Other' ? 'selected' : '' }}>Other</option>
                            </select>
                        </div>
                    </div>

                    {{-- Location --}}
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <label for="country" class="form-label fw-semibold">Country</label>
                            <input type="text" id="country" name="country"
                                   class="form-control rounded-3"
                                   value="{{ old('country', $guardian->country) }}" required>
                        </div>
                        <div class="col-md-4">
                            <label for="state_of_origin" class="form-label fw-semibold">State</label>
                            <input type="text" id="state_of_origin" name="state_of_origin"
                                   class="form-control rounded-3"
                                   value="{{ old('state_of_origin', $guardian->state_of_origin) }}" required>
                        </div>
                        <div class="col-md-4">
                            <label for="lga" class="form-label fw-semibold">LGA</label>
                            <input type="text" id="lga" name="lga"
                                   class="form-control rounded-3"
                                   value="{{ old('lga', $guardian->lga) }}" required>
                        </div>
                    </div>

                    {{-- Relationship & Account --}}
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <label for="username" class="form-label fw-semibold">Username</label>
                            <input type="text" id="username" name="username"
                                   class="form-control rounded-3"
                                   value="{{ old('username', $guardian->username) }}" required>
                        </div>
                        <div class="col-md-4">
                            <label for="password" class="form-label fw-semibold">Password</label>
                            <input type="password" id="password" name="password" class="form-control rounded-3">
                            <small class="text-muted">Leave blank if unchanged</small>
                        </div>
                        <div class="col-md-4">
                            <label for="password_confirmation" class="form-label fw-semibold">Confirm Password</label>
                            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control rounded-3">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Update Guardian</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
