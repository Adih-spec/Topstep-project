<x-app-layout>
    <x-slot name="title">Dashboard</x-slot>

    <div class="container-fluid">
        <div class="row g-3 mb-4">
            <!-- Students -->
            <div class="col-md-3">
                <div class="card shadow-sm text-center">
                    <div class="card-body">
                        <h5 class="card-title">Students</h5>
                        <h2 class="fw-bold text-primary">1,245</h2>
                        <p class="text-muted">Enrolled</p>
                    </div>
                </div>
            </div>

            <!-- Teachers -->
            <div class="col-md-3">
                <div class="card shadow-sm text-center">
                    <div class="card-body">
                        <h5 class="card-title">Teachers</h5>
                        <h2 class="fw-bold text-success">82</h2>
                        <p class="text-muted">Active</p>
                    </div>
                </div>
            </div>

            <!-- Courses -->
            <div class="col-md-3">
                <div class="card shadow-sm text-center">
                    <div class="card-body">
                        <h5 class="card-title">Courses</h5>
                        <h2 class="fw-bold text-warning">56</h2>
                        <p class="text-muted">Available</p>
                    </div>
                </div>
            </div>

            <!-- Departments -->
            <div class="col-md-3">
                <div class="card shadow-sm text-center">
                    <div class="card-body">
                        <h5 class="card-title">Departments</h5>
                        <h2 class="fw-bold text-danger">12</h2>
                        <p class="text-muted">Faculties</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Activity & Quick Links -->
        <div class="row g-3">
            <!-- Recent Activity -->
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-light">
                        <h5 class="mb-0">Recent Activity</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">📌 New Student Registered: <strong>Mary Johnson</strong></li>
                            <li class="list-group-item">📌 Exam Scheduled: <strong>Mathematics 101</strong></li>
                            <li class="list-group-item">📌 Fee Payment: <strong>James Doe</strong> paid ₦50,000</li>
                            <li class="list-group-item">📌 Teacher Assigned: <strong>Prof. Smith</strong> to Physics</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-header bg-light">
                        <h5 class="mb-0">Quick Links</h5>
                    </div>
                    <div class="card-body d-grid gap-2">
                        <a href="" class="btn btn-primary">➕ Add Student</a>
                        <a href="" class="btn btn-success">👩‍🏫 Add Teacher</a>
                        <a href="" class="btn btn-warning">🏫 Manage Classes</a>
                        <a href="" class="btn btn-danger">📊 View Reports</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
