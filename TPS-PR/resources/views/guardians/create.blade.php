@extends('layouts.app')

@section('title', 'Guardian Registration')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg p-5 rounded-4 border-0">
                <h2 class="text-center mb-4 fw-bold">Parent / Guardian Registration</h2>

                <!-- Error Messages -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('guardians.create') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                    @csrf

                    <!-- Personal Info -->
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <label for="first_name" class="form-label fw-semibold text-dark">First Name</label>
                            <input type="text" id="first_name" name="first_name" class="form-control rounded-3" required>
                        </div>
                        <div class="col-md-4">
                            <label for="last_name" class="form-label fw-semibold text-dark">Last Name</label>
                            <input type="text" id="last_name" name="last_name" class="form-control rounded-3" required>
                        </div>
                        <div class="col-md-4">
                            <label for="other_names" class="form-label fw-semibold text-dark">Other Name(s)</label>
                            <input type="text" id="other_names" name="other_names" class="form-control rounded-3">
                        </div>
                    </div>

                    <!-- Contact Info -->
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <label for="phone" class="form-label fw-semibold text-dark">Phone Number</label>
                            <input type="tel" id="phone" name="phone" class="form-control rounded-3" required>
                        </div>
                        <div class="col-md-4">
                            <label for="email" class="form-label fw-semibold text-dark">Email Address</label>
                            <input type="email" id="email" name="email" class="form-control rounded-3" required>
                        </div>
                        <div class="col-md-4">
                            <label for="religion" class="form-label fw-semibold text-dark">Religion</label>
                            <select id="religion" name="religion" class="form-select rounded-3" required>
                                <option value="">--Select--</option>
                                <option>Christianity</option>
                                <option>Islam</option>
                                <option>Other</option>
                            </select>
                        </div>
                    </div>

                    <!-- Address -->
                    <div class="row mb-4">
                    <div class="col-md-6">
                        <label for="residential_address" class="form-label fw-semibold text-dark">Residential Address</label>
                        <input type="text" id="residential_address" name="residential_address" class="form-control rounded-3" required>
                    </div>

                    <!-- Occupation / Children / Relationship -->
                    <div class="col-md-6">
                            <label for="occupation" class="form-label fw-semibold text-dark">Occupation</label>
                            <input type="text" id="occupation" name="occupation" class="form-control rounded-3">
                        </div>
                    </div>

                    <!-- Country, State, City -->
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <label for="country" class="form-label fw-semibold text-dark">Country</label>
                            <select id="country" name="country" class="form-select rounded-3 country-select" required>
                                <option value="">-- Select Country --</option>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label for="state_of_origin" class="form-label fw-semibold text-dark">State</label>
                            <select id="state_of_origin" name="state_of_origin" class="form-select rounded-3 state-select">
                                <option value="">-- Select State --</option>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label for="city" class="form-label fw-semibold text-dark">LGA / City</label>
                            <select id="city" name="city" class="form-select rounded-3 city-select">
                                <option value="">-- Select City --</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
        <label for="photo" class="form-label fw-semibold">Upload Photo</label>
        <input type="file" id="photo" name="photo" class="form-control" accept="image/*">
    </div>
                    <!-- Submit -->
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary fw-bold py-2">Register</button>
                    </div>

                    <p class="text-center mt-3">
                        Already have an account? <a href="{{ route('guardian.login') }}">Login here</a>.
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection