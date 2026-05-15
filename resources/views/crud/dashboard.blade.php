<x-layout>

    <div class="container mt-4" style="min-height: 400px;">

        <div class="card border-0 shadow-sm rounded-3">
            <div class="card-body p-4">

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h5 class="mb-0 fw-500">Students</h5>
                        <small class="text-muted">Manage registered students</small>
                    </div>
                    <a href="/scan" class="btn btn-sm btn-dark">
                        <i class="fa-solid fa-barcode me-1"></i> Scan ID
                    </a>
                </div>

                <table id="mytable" class="table table-hover align-middle mb-0" style="display:none;">
                    <thead>
                        <tr class="text-uppercase text-muted" style="font-size: 11px; letter-spacing: 0.06em;">
                            <th class="border-0 pb-2">Student No.</th>
                            <th class="border-0 pb-2">First Name</th>
                            <th class="border-0 pb-2">Last Name</th>
                            <th class="border-0 pb-2">Role</th>
                            <th class="border-0 pb-2">Branch</th>
                            <th class="border-0 pb-2">Section</th>
                            <th class="border-0 pb-2 text-center">Avatar</th>
                              @if(auth()->user()->user_type >= 2)
                            <th class="border-0 pb-2 text-center">Action</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                        <tr style="font-size: 14px;">
                            <td class="text-muted">{{ $student->student_number }}</td>
                            <td>{{ $student->firstname }}</td>
                            <td>{{ $student->lastname }}</td>
                            <td>
                                <span class="badge rounded-pill bg-light text-dark border" style="font-size: 11px;">
                                    {{ $student->school_role }}
                                </span>
                            </td>
                            <td class="text-muted">{{ $student->library_branch }}</td>
                            <td class="text-muted">{{ $student->section }}</td>
                            <td class="text-center">
                                <a href="/crud/edit/{{ $student->student_number }}">
                                    <img src="/storage/avatars/{{ $student->avatar ?? 'default.png' }}"
                                         class="rounded-circle"
                                         width="36" height="36"
                                         style="object-fit:cover; border: 1px solid #e8e8e6;">
                                </a>
                            </td>

                              @if(auth()->user()->user_type >= 2)
                            <td class="text-center">
                                <div class="d-inline-flex gap-2">
                                    <a href="/crud/edit/{{ $student->student_number }}"
                                       class="btn btn-sm btn-light border"
                                       title="Edit">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <form action="/crud/delete/{{ $student->student_number }}" method="POST"
                                          onsubmit="return confirm('Delete this student?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-light border text-danger" title="Delete">
                                            <i class="fa-solid fa-xmark"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>

    </div>














    <div class="container mt-4" style="min-height: 400px;">

        <div class="card border-0 shadow-sm rounded-3">
            <div class="card-body p-4">

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h5 class="mb-0 fw-500">Faculty Members</h5>
                        <small class="text-muted">Manage registeres teachers</small>
                    </div>
                    <a href="/scan" class="btn btn-sm btn-dark">
                        <i class="fa-solid fa-barcode me-1"></i> Scan ID
                    </a>
                </div>

                <table id="mytable" class="table table-hover align-middle mb-0" style="display:none;">
                    <thead>
                        <tr class="text-uppercase text-muted" style="font-size: 11px; letter-spacing: 0.06em;">
                            <th class="border-0 pb-2">Student No.</th>
                            <th class="border-0 pb-2">First Name</th>
                            <th class="border-0 pb-2">Last Name</th>
                            <th class="border-0 pb-2">Role</th>
                            <th class="border-0 pb-2">Branch</th>
                            <th class="border-0 pb-2">Section</th>
                            <th class="border-0 pb-2 text-center">Avatar</th>
                              @if(auth()->user()->user_type >= 2)
                            <th class="border-0 pb-2 text-center">Action</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($teachers as $teacher)
                        <tr style="font-size: 14px;">
                            <td class="text-muted">{{ $teacher->student_number }}</td>
                            <td>{{ $teacher->firstname }}</td>
                            <td>{{ $teacher->lastname }}</td>
                            <td>
                                <span class="badge rounded-pill bg-light text-dark border" style="font-size: 11px;">
                                    {{ $teacher->school_role }}
                                </span>
                            </td>
                            <td class="text-muted">{{ $teacher->library_branch }}</td>
                            <td class="text-muted">{{ $teacher->section }}</td>
                            <td class="text-center">
                                <a href="/crud/edit/{{ $teacher->student_number }}">
                                    <img src="/storage/avatars/{{ $teacher->avatar ?? 'default.png' }}"
                                         class="rounded-circle"
                                         width="36" height="36"
                                         style="object-fit:cover; border: 1px solid #e8e8e6;">
                                </a>
                            </td>

                              @if(auth()->user()->user_type >= 2)
                            <td class="text-center">
                                <div class="d-inline-flex gap-2">
                                    <a href="/crud/edit/{{ $teacher->student_number }}"
                                       class="btn btn-sm btn-light border"
                                       title="Edit">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <form action="/crud/delete/{{ $teacher->student_number }}" method="POST"
                                          onsubmit="return confirm('Delete this student?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-light border text-danger" title="Delete">
                                            <i class="fa-solid fa-xmark"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>

    </div>






    <div class="container mt-4" style="min-height: 400px;">

        <div class="card border-0 shadow-sm rounded-3">
            <div class="card-body p-4">

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h5 class="mb-0 fw-500">Non Teaching Personnels</h5>
                        <small class="text-muted">Manage Users</small>
                    </div>
                    <a href="/scan" class="btn btn-sm btn-dark">
                        <i class="fa-solid fa-barcode me-1"></i> Scan ID
                    </a>
                </div>

                <table id="mytable" class="table table-hover align-middle mb-0" style="display:none;">
                    <thead>
                        <tr class="text-uppercase text-muted" style="font-size: 11px; letter-spacing: 0.06em;">
                            <th class="border-0 pb-2">Student No.</th>
                            <th class="border-0 pb-2">First Name</th>
                            <th class="border-0 pb-2">Last Name</th>
                            <th class="border-0 pb-2">Role</th>
                            <th class="border-0 pb-2">Branch</th>
                            <th class="border-0 pb-2">Section</th>
                            <th class="border-0 pb-2 text-center">Avatar</th>
                              @if(auth()->user()->user_type >= 2)
                            <th class="border-0 pb-2 text-center">Action</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($workers as $worker)
                        <tr style="font-size: 14px;">
                            <td class="text-muted">{{ $worker->student_number }}</td>
                            <td>{{ $worker->firstname }}</td>
                            <td>{{ $worker->lastname }}</td>
                            <td>
                                <span class="badge rounded-pill bg-light text-dark border" style="font-size: 11px;">
                                    {{ $worker->school_role }}
                                </span>
                            </td>
                            <td class="text-muted">{{ $worker->library_branch }}</td>
                            <td class="text-muted">{{ $worker->section }}</td>
                            <td class="text-center">
                                <a href="/crud/edit/{{ $worker->student_number }}">
                                    <img src="/storage/avatars/{{ $worker->avatar ?? 'default.png' }}"
                                         class="rounded-circle"
                                         width="36" height="36"
                                         style="object-fit:cover; border: 1px solid #e8e8e6;">
                                </a>
                            </td>

                              @if(auth()->user()->user_type >= 2)
                            <td class="text-center">
                                <div class="d-inline-flex gap-2">
                                    <a href="/crud/edit/{{ $worker->student_number }}"
                                       class="btn btn-sm btn-light border"
                                       title="Edit">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <form action="/crud/delete/{{ $worker->student_number }}" method="POST"
                                          onsubmit="return confirm('Delete this student?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-light border text-danger" title="Delete">
                                            <i class="fa-solid fa-xmark"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>

    </div>

</x-layout>