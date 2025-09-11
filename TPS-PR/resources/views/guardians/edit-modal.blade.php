<!-- Edit Guardian Modal -->
<div class="modal fade" id="editGuardianModal{{ $guardian->id }}" tabindex="-1" aria-labelledby="editGuardianModalLabel{{ $guardian->id }}" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-warning text-dark">
        <h5 class="modal-title fw-bold" id="editGuardianModalLabel{{ $guardian->id }}">
          Edit Guardian - {{ $guardian->first_name }} {{ $guardian->last_name }}
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <form action="{{ route('guardians.update', $guardian->id) }}" method="POST">
          @csrf
          @method('PUT')

          {{-- Names --}}
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

          {{-- Contact Info --}}
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

          {{-- Other Info --}}
          <div class="mb-4">
            <label for="residential_address{{ $guardian->id }}" class="form-label fw-semibold">Residential Address</label>
            <input type="text" id="residential_address{{ $guardian->id }}" name="residential_address"
                   class="form-control rounded-3"
                   value="{{ old('residential_address', $guardian->residential_address) }}" required>
          </div>

          <div class="row mb-4">
            <div class="col-md-4">
              <label for="occupation{{ $guardian->id }}" class="form-label fw-semibold">Occupation</label>
              <input type="text" id="occupation{{ $guardian->id }}" name="occupation"
                     class="form-control rounded-3"
                     value="{{ old('occupation', $guardian->occupation) }}">
            </div>
            <div class="col-md-4">
              <label for="number_of_children{{ $guardian->id }}" class="form-label fw-semibold">Number of Children in School</label>
              <input type="number" id="number_of_children{{ $guardian->id }}" name="number_of_children"
                     class="form-control rounded-3"
                     value="{{ old('number_of_children', $guardian->number_of_children) }}" required>
            </div>
            <div class="col-md-4">
              <label for="relationship_with_student{{ $guardian->id }}" class="form-label fw-semibold">Relationship with student</label>
              <select id="relationship_with_student{{ $guardian->id }}" name="relationship_with_student" class="form-select rounded-3" required>
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
        <label for="country" class="form-label fw-semibold text-dark">Country</label>
        <select name="country" class="form-control rounded-3 country-select"
                data-selected="{{ old('country', $guardian->country ?? '') }}" required>
        </select>
    </div>
    <div class="col-md-4">
        <label for="state_of_origin" class="form-label fw-semibold text-dark">State</label>
        <select name="state_of_origin" class="form-control rounded-3 state-select"
                data-selected="{{ old('state_of_origin', $guardian->state_of_origin ?? '') }}" required>
        </select>
    </div>
    <div class="col-md-4">
        <label for="city" class="form-label fw-semibold text-dark">LGA / City</label>
        <select name="city" class="form-control rounded-3 city-select"
                data-selected="{{ old('city', $guardian->city ?? '') }}" required>
        </select>
    </div>
</div>

          {{-- Account Info --}}
          <div class="row mb-4">
            <div class="col-md-4">
              <label for="username{{ $guardian->id }}" class="form-label fw-semibold">Username</label>
              <input type="text" id="username{{ $guardian->id }}" name="username"
                     class="form-control rounded-3"
                     value="{{ old('username', $guardian->username) }}" required>
            </div>
            <div class="col-md-4">
              <label for="password{{ $guardian->id }}" class="form-label fw-semibold">Password</label>
              <input type="password" id="password{{ $guardian->id }}" name="password" class="form-control rounded-3">
              <small class="text-muted">Leave blank if unchanged</small>
            </div>
            <div class="col-md-4">
              <label for="password_confirmation{{ $guardian->id }}" class="form-label fw-semibold">Confirm Password</label>
              <input type="password" id="password_confirmation{{ $guardian->id }}" name="password_confirmation" class="form-control rounded-3">
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