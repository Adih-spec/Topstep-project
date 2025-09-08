<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Guardian Dashboard</title>
  <style>
    body { margin:0; font-family:Arial,sans-serif; background:#f3f6fa; }
    .navbar { background:#0066cc; padding:15px 20px; color:#fff; display:flex; justify-content:space-between; }
    .navbar a { color:#fff; margin-left:20px; text-decoration:none; }
    .dashboard { padding:20px; }
    .card {
      background:#fff; padding:15px; margin-bottom:15px;
      border-radius:10px; box-shadow:0 2px 6px rgba(0,0,0,0.1);
    }
  </style>
</head>
<body>
  <div class="navbar">
    <h1>Guardian Dashboard</h1>
    <div>
      <span>Welcome, {{ Auth::guard('guardian')->user()->first_name }}</span>
      <a href="{{ route('guardian.logout') }}">Logout</a>
    </div>
  </div>

  <div class="dashboard">
    <div class="card">
      <h3>Profile Info</h3>
      <p>Email: {{ Auth::guard('guardian')->user()->email }}</p>
      <p>Phone: {{ Auth::guard('guardian')->user()->phone }}</p>
      <p>Relationship: {{ Auth::guard('guardian')->user()->relationship_with_student }}</p>
    </div>
  </div>
</body>
</html>
