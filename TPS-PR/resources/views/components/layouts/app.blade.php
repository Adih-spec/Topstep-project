
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>@yield('PageTitle', config('app.name'))</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

    <!-- Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body { background: #f5f6fa; }
        .sidebar { min-height: 100vh; background: #2c3e50; color: #fff; }
        .sidebar h4 { color: #ecf0f1; }
        .sidebar a { 
            color: #ecf0f1; 
            display: block; 
            padding: 10px; 
            text-decoration: none; 
            border-radius: 5px;
            margin-bottom: 5px;
        }
        .sidebar a:hover, 
        .sidebar a.active { background: #34495e; }
        .content { padding: 20px; flex: 1; }
    </style>

    {{-- Page-specific styles --}}
    @stack('styles')
</head>
<body>
<div class="d-flex">
    <div class="sidebar p-3">
        <h4>RBAC</h4>
        <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">Dashboard</a>
        <a href="{{ route('roles.index') }}" class="{{ request()->routeIs('roles.*') ? 'active' : '' }}">Manage Roles</a>
        <a href="{{ route('permissions.index') }}" class="{{ request()->routeIs('permissions.*') ? 'active' : '' }}">Manage Permissions</a>
        <a href="{{ route('users.index') }}" class="{{ request()->routeIs('users.*') ? 'active' : '' }}">Users</a>
        <a href="{{ route('admins.index') }}"
          class="d-block py-2 px-3 mb-2 rounded {{ request()->routeIs('admins.*') ? 'active' : '' }}">
          Admin Management
        </a>

        <a href="{{ route('admin.users.index') }}" 
          class="d-block py-2 px-3 mb-2 rounded {{ request()->routeIs('users.*') ? 'bg-primary text-white' : '' }}">
          User Management
        </a>
        <a href="{{ route('guards.index') }}" class="{{ request()->routeIs('users.*') ? 'active' : '' }}">Manage guard</a>
    </div>
    <div class="content flex-fill">
        @yield('pageContent')
    </div>
</div>
    {{-- Page-specific scripts --}}
    @stack('scripts')
</body>
</html>
