<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>OLOPSC</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('olopsc_logo.png') }}">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;700&display=swap" rel="stylesheet" />

    <!-- ✅ Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" />

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.7/css/dataTables.dataTables.min.css">

    <!-- Font Awesome -->
    <script defer src="https://kit.fontawesome.com/59a89e2849.js"></script>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('main.css') }}" />

    <style>
        #loader-wrapper {
            position: absolute;
            inset: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            background: rgba(255,255,255,0.7);
            z-index: 10;
        }

        #loader {
            border: 8px solid #f3f3f3;
            border-top: 8px solid #3498db;
            border-radius: 50%;
            width: 60px;
            height: 60px;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        .fade-in {
            animation: fadeIn .5s forwards;
        }

        @keyframes fadeIn {
            from { opacity:0; }
            to { opacity:1; }
        }
    </style>
</head>

<body>

<!-- Header -->
<header class="mb-3" style="background-color:#0a095f;">
    <div class="container d-flex flex-column flex-md-row align-items-center p-3 gap-2">

        <h4 class="my-0 me-md-auto">
            <a href="/1" class="text-warning text-decoration-none">
                <b>4th's</b> Attendance System
            </a>
        </h4>

        @auth
            <div>
                <select class="form-select form-select-sm"
                        style="background-color: #0a095f; color: #ffd230;"
                        onchange="if(this.value) window.location.href=this.value;">
                    <option value="" disabled selected>Registration</option>
                    <option value="{{ url('/userreg') }}">User Registration</option>
                    <option value="{{ url('/reg') }}">Grade School</option>
                    <option value="{{ url('/reghslrc') }}">High School</option>
                    <option value="{{ url('/regcllrc') }}">College</option>
                </select>
            </div>

            <a href="/records" class="btn btn-success btn-sm">Audit Trails</a>
            <a href="/users" class="btn btn-primary btn-sm">Users Approval</a>
            <a href="/section" class="btn btn-warning btn-sm">Section</a>

            <form action="/logout" method="POST" class="m-0">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm">Logout</button>
            </form>
        @endauth
    </div>
</header>

<!-- Page Content -->
{{ $slot }}

<!-- Footer -->
<footer class="border-top text-center small text-muted py-3">
    <p class="m-0">
        &copy; {{ now()->format('Y') }}
        <a href="/" class="text-muted text-decoration-none">
            <b>Attendance System by 4th</b>
        </a>
    </p>
</footer>

<!-- ✅ jQuery -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<!-- ✅ Bootstrap 5 JS (FIXED) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

<!-- DataTables -->
<script src="https://cdn.datatables.net/2.3.7/js/dataTables.min.js"></script>

<!-- DataTables INIT -->
<script>
$(document).ready(function () {

    $('#table2, #table3, #table4').DataTable({
        pageLength: 10,
        responsive: true,
        language: {
            searchPlaceholder: "Search..."
        },
        order: [[4, 'asc']]
    });

    $('#table1').DataTable({
        pageLength: 10,
        responsive: true,
        language: {
            searchPlaceholder: "Search..."
        },
        order: [[0, 'asc'], [1, 'asc']]
    });

    $('#mytable').DataTable({
        pageLength: 10,
        responsive: true
    });

});
</script>

<!-- Loader -->
<script>
window.onload = function() {
    setTimeout(function() {

        const loader = document.getElementById("loader-wrapper");
        if(loader) loader.style.display = "none";

        document.querySelectorAll("table").forEach(table => {
            table.style.display = "table";
            table.classList.add("fade-in");
        });

    }, 1000);
}
</script>

</body>
</html>