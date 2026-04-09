<x-layout>
<style>
/* Wrapper that covers ONLY the table area */
#loader-wrapper {
    position: absolute;
    inset: 0; /* shorthand for top/left/right/bottom */

    display: flex;
    justify-content: center;
    align-items: center;

    background: rgba(255,255,255,0.7);
    z-index: 10;
}

/* Spinner */
#loader {
  border: 8px solid #f3f3f3;
  border-top: 8px solid #3498db;
  border-radius: 50%;
  width: 60px;
  height: 60px;
  animation: spin 1s linear infinite;
}

/* FIXED animation (NO translate!) */
@keyframes spin {
  from { transform: rotate(0deg); }
  to { transform: rotate(360deg); }
}

/* Fade in table */
.fade-in{
    animation: fadeIn .5s forwards;
}

@keyframes fadeIn{
    from { opacity:0; }
    to { opacity:1; }
}
</style>

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
        
        <!-- IMPORTANT: height + relative -->
        <div class="container mt-3 position-relative" style="min-height: 400px;">

            <!-- Loader -->
            <div id="loader-wrapper">
                <div id="loader"></div>
            </div>

            <!-- Table -->
            <table id="mytable" class="table table-bordered table-striped table-hover align-middle" style="display:none;">
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
                                     class="rounded-circle img-thumbnail"
                                     width="60" height="60">
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

<script>
window.onload = function() {
    setTimeout(function() {

        // hide loader overlay
        document.getElementById("loader-wrapper").style.display = "none";

        // show table
        const table = document.getElementById("mytable");
        table.style.display = "table";
        table.classList.add("fade-in");

    }, 1000);
}
</script>

</x-layout>