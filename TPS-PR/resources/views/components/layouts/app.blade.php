
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">


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
