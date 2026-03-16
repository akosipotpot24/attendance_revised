<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.7/css/dataTables.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <title>Dashboard</title>
</head>


<body class="d-flex flex-column min-vh-100">


<div class="d-flex flex-grow-1">


    <div class="bg-dark text-white p-3 vh-150" style="width:250px;">
        <h4 class="text-center">Dashboard</h4>
        <hr>

        <ul class="nav flex-column">

            <li class="nav-item mb-2">
                <a href="#" class="nav-link text-white">
                    <i class="bi bi-speedometer2"></i> Dashboard
                </a>
            </li>

            <li class="nav-item mb-2">
                <a href="/register-crud" class="nav-link text-white">
                    <i class="bi bi-people"></i> NEW STUDENT
                </a>
            </li>

            <li class="nav-item mb-2">
                <a href="#" class="nav-link text-white">
                    <i class="bi bi-book"></i> Library
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

    <!-- ✅ MAIN CONTENT -->
    <div class="flex-grow-1 p-4">
        <div class="container mt-3">

            <table id="mytable" class="table table-bordered table-striped">
                <thead>
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
                            <a href="/crud/edit/{{ $student->student_number }}" class="btn">
                                <img src="/storage/avatars/{{ $student->avatar ?? 'default.png' }}"
                                class="rounded-circle img-thumbnail"
                                width="60"
                                height="60"
                                alt="Profile">
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

<!-- ✅ FOOTER (ALWAYS AT BOTTOM) -->
<footer class="text-center py-3 mt-auto">
    &copy; 2024 Attendance System. All rights reserved.
</footer>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/2.3.7/js/dataTables.min.js"></script>

<script>
$(document).ready(function () {
    $('#mytable').DataTable({
        pageLength: 10
    });
});
</script>

</body>
</html>
