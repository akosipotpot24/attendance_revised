<x-layout>

    <div class="container mt-4" style="min-height: 400px;">

        {{-- Login History --}}
        <div class="card border-0 shadow-sm rounded-3 mb-4">
            <div class="card-body p-4">

                <div class="mb-4">
                    <h5 class="mb-0 fw-500">Login History</h5>
                    <small class="text-muted">Track user login activity</small>
                </div>

                <table id="table4" class="table table-hover align-middle mb-0">
                    <thead>
                        <tr class="text-uppercase text-muted" style="font-size: 11px; letter-spacing: 0.06em;">
                            <th class="border-0 pb-2">User</th>
                            <th class="border-0 pb-2">Action</th>
                            <th class="border-0 pb-2">Module</th>
                            <th class="border-0 pb-2">Description</th>
                            <th class="border-0 pb-2">Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($auditTrails as $auditTrail)
                        <tr style="font-size: 14px;">
                            <td class="fw-500">{{ $auditTrail->user }}</td>
                            <td>
                                <span class="badge rounded-pill bg-light text-dark border" style="font-size: 11px;">
                                    {{ $auditTrail->action }}
                                </span>
                            </td>
                            <td class="text-muted">{{ $auditTrail->module }}</td>
                            <td class="text-muted">{{ $auditTrail->description }}</td>
                            <td class="text-muted" style="font-size: 13px;">{{ $auditTrail->created_at }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>

        {{-- Audit Trails --}}
        <div class="card border-0 shadow-sm rounded-3">
            <div class="card-body p-4">

                <div class="mb-4">
                    <h5 class="mb-0 fw-500">Audit Trails</h5>
                    <small class="text-muted">System activity records</small>
                </div>

                <table id="table2" class="table table-hover align-middle mb-0">
                    <thead>
                        <tr class="text-uppercase text-muted" style="font-size: 11px; letter-spacing: 0.06em;">
                            <th class="border-0 pb-2">ID</th>
                            <th class="border-0 pb-2">Action</th>
                            <th class="border-0 pb-2">Details</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($records as $record)
                        <tr style="font-size: 14px;">
                            <td class="text-muted">{{ $record->user_id }}</td>
                            <td>
                                <span class="badge rounded-pill bg-light text-dark border" style="font-size: 11px;">
                                    {{ $record->action }}
                                </span>
                            </td>
                            <td class="text-muted">{{ $record->details }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>

    </div>

</x-layout>