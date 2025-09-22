<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans">

    <!-- Navbar -->
    <nav class="bg-blue-700 p-4 text-white flex justify-between items-center shadow">
        <h1 class="text-xl font-bold">School Management System</h1>
        <div>
            <a href="{{ route('admin.logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
               class="bg-red-500 hover:bg-red-600 px-4 py-2 rounded">
                Logout
            </a>
            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="hidden">
                @csrf
            </form>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mx-auto mt-8 px-4">
        <h2 class="text-2xl font-semibold mb-6">Welcome, Admin 👋</h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Example cards -->
            <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
                <h3 class="text-lg font-bold mb-2">Teachers</h3>
                <p class="text-gray-600">Manage teacher accounts and activities.</p>
                <a href="#" class="mt-4 inline-block text-blue-600 hover:underline">Go to Teachers →</a>
            </div>

            <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
                <h3 class="text-lg font-bold mb-2">Students</h3>
                <p class="text-gray-600">View student records, results, and profiles.</p>
                <a href="#" class="mt-4 inline-block text-blue-600 hover:underline">Go to Students →</a>
            </div>

            <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
                <h3 class="text-lg font-bold mb-2">Guardians</h3>
                <p class="text-gray-600">Track guardian accounts and related students.</p>
                <a href="#" class="mt-4 inline-block text-blue-600 hover:underline">Go to Guardians →</a>
            </div>
        </div>
    </div>

</body>
</html>
