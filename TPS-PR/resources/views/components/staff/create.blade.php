<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create Staff</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand fw-bold" href="#">Staff Management</a>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container my-5">
    <div class="row justify-content-center">
      <div class="col-lg-6 col-md-8">
        <div class="card shadow-lg">
          <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Create New Staff</h4>
          </div>
          <div class="card-body">
            <form>
              <!-- Full Name -->
              <div class="mb-3">
                <label class="form-label">Full Name</label>
                <input type="text" class="form-control" placeholder="Enter full name" required>
              </div>

              <!-- Position -->
              <div class="mb-3">
                <label class="form-label">Position</label>
                <input type="text" class="form-control" placeholder="Enter staff position" required>
              </div>

              <!-- Department -->
              <div class="mb-3">
                <label class="form-label">Department</label>
                <select class="form-select" required>
                  <option value="">-- Select Department --</option>
                  <option>Administration</option>
                  <option>Teaching</option>
                  <option>Finance</option>
                  <option>IT Support</option>
                  <option>Library</option>
                </select>
              </div>

              <!-- Email -->
              <div class="mb-3">
                <label class="form-label">Email Address</label>
                <input type="email" class="form-control" placeholder="Enter email" required>
              </div>

              <!-- Phone -->
              <div class="mb-3">
                <label class="form-label">Phone Number</label>
                <input type="text" class="form-control" placeholder="Enter phone number" required>
              </div>

              <!-- Address -->
              <div class="mb-3">
                <label class="form-label">Address</label>
                <textarea class="form-control" rows="2" placeholder="Enter staff address"></textarea>
              </div>

              <!-- Buttons -->
              <div class="d-flex justify-content-between">
                <a href="staff-list.html" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-primary">Save Staff</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
