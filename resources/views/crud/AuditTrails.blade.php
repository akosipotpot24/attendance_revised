<x-layout>
<div class="d-flex flex-grow-1">

    <!-- Sidebar -->
    <div class="sidebar bg-dark text-white p-3 sticky-top">
        <h3 class="text-center mb-3">Dashboard</h3>
        <hr>
        <ul class="nav flex-column">
            <li class="nav-item mb-2">
                <a href="/viewStudents" class="nav-link text-white">Students</a>
            </li>
            <li class="nav-item mb-2">
                <a href="/register-crud" class="nav-link text-white">
                    <i class="bi bi-people"></i> New Student
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="/scan" class="nav-link text-white">
                    <i class="bi bi-upc-scan"></i> Scan
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="/records" class="nav-link text-white">
                    <i class="bi bi-clock"></i> Audit Trails
                </a>
            </li>
            <hr>
            <li class="nav-item">
                <form action="/logout" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger w-100">
                        <i class="bi bi-box-arrow-right"></i> Logout
                    </button>
                </form>
            </li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="flex-grow-1 p-4">

        <!-- FIRST TABLE -->
        <div class="card mb-4">
            <div class="card-header">
                <h4 class="card-title mb-0">Login History</h4>
            </div>
            <div class="card-body">
                <table id="table1" class="table table-bordered table-striped table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>User</th>
                            <th>Action</th>
                            <th>Module</th>
                            <th>Description</th>
                            <th>Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($auditTrails as $auditTrail)
                        <tr>
                            <td>{{ $auditTrail->user }}</td>
                            <td>{{ $auditTrail->action }}</td>
                            <td>{{ $auditTrail->module }}</td>
                            <td>{{ $auditTrail->description }}</td>
                            <td>{{ $auditTrail->created_at }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- SECOND TABLE -->
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Audit Trails</h4>
            </div>
            <div class="card-body">
                <table id="table2" class="table table-bordered table-striped table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>ACTION</th>
                            <th>DETAILS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($records as $record)
                        <tr>
                            <td>{{ $record->user_id }}</td>
                            <td>{{ $record->action }}</td>
                            <td>{{ $record->details }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>

</div>
</x-layout>