
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>@yield('PageTitle') – TOPSTEPS ACADEMY</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  <style>
    body { background: #f5f6fa; }
    .sidebar { min-height: 100vh; background: #2c3e50; color: #fff; }
    .sidebar a { color: #ecf0f1; display: block; padding: 10px; text-decoration: none; }
    .sidebar a:hover { background: #34495e; }
    .content { padding: 20px; }
  </style>
</head>
<body>
<div class="d-flex">
    <div class="sidebar p-3">
        <h4>RBAC</h4>
        <a href="{{ route('dashboard') }}">Dashboard</a>
        <a href="{{ route('roles.index') }}">Manage Roles</a>
        <a href="{{ route('permissions.index') }}">Manage Permissions</a>
        <a href="{{ route('users.index') }}">Users</a>
    </div>
    <div class="content flex-fill">
        @yield('pageContent')
    </div>
</div>
</body>
</html>
