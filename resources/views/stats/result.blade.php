<x-layout> {{-- match your component name --}}

<div style="max-width:1400px; margin:0 auto;">

    {{-- Page Title --}}
    <div class="mb-4">
        <p style="font-size:12px; color:#aaa; text-transform:uppercase; letter-spacing:.06em; margin:0 0 2px;">Admin</p>
        <h5 style="font-size:15px; font-weight:500; color:#1a1a1a; margin:0;">
            Statistics
            @if ($from && $to)
                &nbsp;<span style="font-weight:400; color:#aaa; font-size:13px;">
                    {{ $from->format('M d, Y') }} — {{ $to->format('M d, Y') }}
                </span>
            @endif
        </h5>
    </div>

    @if ($records->isNotEmpty())
    <div class="row g-4">

        {{-- ══════════════════════════
             LEFT — Attendees List
        ══════════════════════════ --}}
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm">
                <div class="card-header" style="background:#fff; border-bottom:1px solid #f0f0ee; padding:.85rem 1rem; display:flex; justify-content:space-between; align-items:center;">
                    <span style="font-size:13px; font-weight:500; color:#1a1a1a;">
                        <i class="fa-solid fa-users" style="color:#aaa; font-size:11px; margin-right:6px;"></i>Attendees
                    </span>
                    <span style="font-size:11px; color:#aaa;">{{ $records->count() }} record(s)</span>
                </div>
                <div class="card-body p-0 px-3 pb-3">
                    <table id="statsTable" class="table" style="width:100%;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>ID Number</th>
                                <th>Student Name</th>
                                <th>Library Location</th>
                                <th>Attendance Date</th>
                                <th>Grade Level</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($records as $index => $row)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $row->id_number }}</td>
                                    <td>{{ $row->student_name }}</td>
                                    <td>{{ $row->library_location }}</td>
                                    <td>{{ \Carbon\Carbon::parse($row->attendance_date)->format('M d, Y') }}</td>
                                    <td>{{ $row->grade_level }}</td>
                                    <td>{{ $row->status }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- ══════════════════════════
             RIGHT — Total per Date
        ══════════════════════════ --}}
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm">
                <div class="card-header" style="background:#fff; border-bottom:1px solid #f0f0ee; padding:.85rem 1rem; display:flex; justify-content:space-between; align-items:center;">
                    <span style="font-size:13px; font-weight:500; color:#1a1a1a;">
                        <i class="fa-solid fa-calendar-check" style="color:#aaa; font-size:11px; margin-right:6px;"></i>Total per Date
                    </span>
                    <span style="font-size:11px; color:#aaa;">{{ $summary->count() }} day(s)</span>
                </div>
                <div class="card-body p-0 px-3 pb-3">
                    <table id="summaryTable" class="table" style="width:100%;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Date</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($summary as $date => $count)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ \Carbon\Carbon::parse($date)->format('M d, Y') }}</td>
                                    <td>{{ $count }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="2" style="text-align:right; font-weight:500; font-size:13px;">Grand Total:</td>
                                <td style="font-weight:500;">{{ $records->count() }}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

    </div>

    @else

    {{-- Empty State --}}
    <div class="text-center py-5" style="color:#bbb;">
        <i class="fa-solid fa-chart-bar fa-2x" style="display:block; margin-bottom:12px;"></i>
        <p style="font-size:13px; margin:0;">No records found for the selected date range.</p>
    </div>

    @endif

</div>

</x-layout>