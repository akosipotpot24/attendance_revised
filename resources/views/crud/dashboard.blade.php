<x-layout>

<div class="d-flex flex-grow-1">

    <!-- Sidebar -->
    <div class="sidebar bg-dark text-white p-3 sticky-top">
        <h3 class="text-center mb-3">Dashboard </h3>
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
        <div class="container mt-3">
            <table id="mytable" class="table table-bordered table-striped table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Student Number</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>School Role</th>
                        <th>Library Branch</th>
                        <th>Section</th>
                        <th>Avatar</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                    <tr>
                        <td>{{ $student->student_number }}</td>
                        <td>{{ $student->firstname }}</td>
                        <td>{{ $student->lastname }}</td>
                        <td>{{ $student->school_role }}</td>
                        <td>{{ $student->library_branch }}</td>
                        <td>{{ $student->section }}</td>
                        <td class="text-center">
                            <a href="/crud/edit/{{ $student->student_number }}">
                                <img src="/storage/avatars/{{ $student->avatar ?? 'default.png' }}"
                                     class="rounded-circle img-thumbnail avatar-img"
                                     width="60" height="60" alt="Profile">
                            </a>
                        </td>
                        <td class="text-center">
                            <div class="d-inline-flex gap-2">
                                <a href="/crud/edit/{{ $student->student_number }}" class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil-fill"></i>
                                </a>
                                <form action="/crud/delete/{{ $student->student_number }}" method="POST" onsubmit="return confirm('Delete this student?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</x-layout>