<x-layout>

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


</x-layout>