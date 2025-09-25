<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Staff Management System</title>
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

  <div class="container my-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
      <h3 class="fw-bold">Staff Directory</h3>
      <!-- Button trigger modal -->
    <a href="{{ route('teachers.create') }}" class="btn btn-primary">+ Add Staff</a>
    </div>

    <!-- Staff Table -->
    <div class="card shadow-sm">
      <div class="card-body">
        <table class="table table-hover">
          <thead class="table-dark">
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Position</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>Jane Doe</td>
              <td>Teacher</td>
              <td>jane.doe@example.com</td>
              <td>+234 800 123 4567</td>
              <td>
                <button class="btn btn-sm btn-warning">Edit</button>
                <button class="btn btn-sm btn-danger">Delete</button>
              </td>
            </tr>
            <tr>
              <td>2</td>
              <td>John Smith</td>
              <td>Admin</td>
              <td>john.smith@example.com</td>
              <td>+234 800 987 6543</td>
              <td>
                <button class="btn btn-sm btn-warning">Edit</button>
                <button class="btn btn-sm btn-danger">Delete</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
