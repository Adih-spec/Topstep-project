<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Guardian Registration Form</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f8f9fa;
      margin: 20px;
    }
    .card {
      border-radius: 10px;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
      margin-bottom: 20px;
    }
    label {
      font-weight: bold;
    }
    input, select {
      border-radius: 6px;
    }
  </style>
</head>
<body>

<div class="container">
  <h2 class="text-center mb-4 fw-bold">Parent/Guardian Registration Form</h2>

  <!-- Card 1: Personal & Contact Info -->
  <div class="card p-4 mx-auto" style="max-width: 700px;">
    <form action="{{ url('/guardians/register') }}" method="POST">
        @csrf
      <!-- Name Row -->
      <div class="row mb-3">
        <div class="col-md-4">
          <label for="firstName" class="form-label">First Name</label>
          <input type="text" id="firstName" name="firstName" class="form-control" required>
        </div>
        <div class="col-md-4">
          <label for="lastName" class="form-label">Last Name</label>
          <input type="text" id="lastName" name="lastName" class="form-control" required>
        </div>
        <div class="col-md-4">
          <label for="otherName" class="form-label">Other Name</label>
          <input type="text" id="otherName" name="otherName" class="form-control">
        </div>
      </div>

      <!-- Contact Info Row -->
      <div class="row mb-3">
        <div class="col-md-4">
          <label for="phone" class="form-label">Phone Number</label>
          <input 
            type="tel" 
            id="phone" 
            name="phone" 
            class="form-control" 
            required
          >
        </div>
        <div class="col-md-4">
          <label for="email" class="form-label">Email Address</label>
          <input type="email" id="email" name="email" class="form-control" required>
        </div>
        <div class="col-md-4">
          <label for="religion" class="form-label">Religion</label>
          <select id="religion" name="religion" class="form-select" required>
            <option value="">--Select--</option>
            <option>Christianity </option>
            <option>Islam</option>
            <option>Other</option>
          </select>
        </div>
      </div>

      <!-- Address Row -->
      <div class="mb-3">
        <label for="address" class="form-label">Residential Address</label>
        <input type="text" id="address" name="address" class="form-control" required>
      </div>

      <!-- City / State / Country Row -->
      <div class="row mb-3">
      <div class="col-md-4">
          <label for="country" class="form-label">Country</label>
          <input type="text" id="country" name="country" class="form-control" required>
        </div>
        <div class="col-md-4">
          <label for="state" class="form-label">State</label>
          <input type="text" id="state" name="state" class="form-control" required>
        </div>
        <div class="col-md-4">
          <label for="LGA" class="form-label">LGA</label>
          <input type="text" id="LGA" name="LGA" class="form-control" required>
        </div>
      </div>
    </form>
  </div>

  <!-- Card 2: Relationship & Login Credentials -->
  <div class="card p-4 mx-auto" style="max-width: 700px;">
    <form>
      <!-- Relationship & Occupation Row -->
      <div class="row mb-3">
      <div class="mb-3">
        <label for="number_of_children" class="form-label">Number of children in school</label>
        <input type="number" id="number_of_children" name="number_of_children" class="form-control" required>
      </div>
        <div class="col-md-6">
          <label for="relationship" class="form-label">Relationship to Student</label>
          <select id="relationship" name="relationship" class="form-select" required>
            <option value="">--Select--</option>
            <option>Mother</option>
            <option>Father</option>
            <option>Guardian</option>
            <option>Other</option>
          </select>
        </div>
        <div class="col-md-6">
          <label for="occupation" class="form-label">Occupation</label>
          <input type="text" id="occupation" name="occupation" class="form-control">
        </div>
      </div>

      <!-- Login Credentials Row -->
      <div class="row mb-4">
        <div class="col-md-4">
          <label for="username" class="form-label">Username</label>
          <input type="text" id="username" name="username" class="form-control" required>
        </div>
        <div class="col-md-4">
          <label for="password" class="form-label">Password</label>
          <input type="password" id="password" name="password" class="form-control" required>
        </div>
        <div class="col-md-4">
          <label for="confirmPassword" class="form-label">Confirm Password</label>
          <input type="password" id="confirmPassword" name="confirmPassword" class="form-control" required>
        </div>
      </div>

      <!-- Submit Button -->
      <div class="d-grid">
        <button type="submit" class="btn btn-primary btn-lg">Register</button>
      </div>
    </form>
  </div>

</div>


</body>
</html>
