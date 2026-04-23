<x-layout>



    <div class="flex-grow-1 p-4">
        <div class="container mt-3 position-relative" style="min-height: 400px;">
            <div id="loader-wrapper">
                <div id="loader"></div>
            </div>
            <div class="card">
                <div class="card-header">Students</div>
                <div class="card-body">
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