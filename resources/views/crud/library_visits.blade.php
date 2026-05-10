<x-layout>

    <div class="container mt-4" style="min-height: 400px;">

        <div class="card border-0 shadow-sm rounded-3">
            <div class="card-body p-4">

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h5 class="mb-0 fw-500">Library Visits</h5>
                        <small class="text-muted">Manage library visits</small>
                    </div>
                    
                </div>

                <table id="visitTable" class="table table-hover align-middle mb-0" style="display:none;">
                    <thead>
                        <tr class="text-uppercase text-muted" style="font-size: 11px; letter-spacing: 0.06em;">
                            <th class="border-0 pb-2">Student Name</th>
                            <th class="border-0 pb-2">Student Number</th>
                            <th class="border-0 pb-2">Library Location</th>
                            <th class="border-0 pb-2">Status</th>
                            <th class="border-0 pb-2">Section</th>
                            <th class="border-0 pb-2">Date</th>
                           
                              
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($visits as $visit)
                        <tr style="font-size: 14px;">
                            <td class="text-muted">{{ $visit->student_name }}</td>
                            <td>{{ $visit->student_number }}</td>
                            <td>{{ $visit->library_location }}</td>
                            <td>
                               <span class="badge rounded-pill border {{ $visit->status === 'in' ? 'text-success bg-white' : 'text-danger bg-white' }}" 
                                style="font-size: 11px;">
                                {{ $visit->status }}
                            </span>
                            </td>
                            <td class="text-muted">{{ $visit->grade_level}}</td>
                            <td class="text-muted">{{ \Carbon\Carbon::parse($visit->attendance_date)->format('M d, Y h:i A') }}</td>
                            

                            
                           
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>

    </div>

</x-layout>