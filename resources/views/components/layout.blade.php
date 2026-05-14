<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>4th's project</title>

    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('php logo.png') }}">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet" />

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" />

    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.7/css/dataTables.dataTables.min.css">

    <!-- Font Awesome -->
    <script defer src="https://kit.fontawesome.com/59a89e2849.js"></script>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('main.css') }}" />

    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'DM Sans', sans-serif;
            background: #f5f5f3;
            color: #1a1a1a;
        }

        /* ── Header ── */
        header {
            background: #ffffff;
            border-bottom: 1px solid #e8e8e6;
            padding: 0 1.5rem;
            height: 56px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .brand {
            font-size: 15px;
            font-weight: 500;
            color: #1a1a1a;
            text-decoration: none;
            margin-right: auto;
            letter-spacing: -0.01em;
        }

        .brand span { color: #aaa; font-weight: 400; }

        /* Nav buttons */
        .nav-btn {
            font-size: 13px;
            font-family: 'DM Sans', sans-serif;
            font-weight: 400;
            color: #555;
            background: transparent;
            border: 1px solid #e8e8e6;
            border-radius: 8px;
            padding: 5px 12px;
            text-decoration: none;
            white-space: nowrap;
            transition: background 0.15s, color 0.15s;
            cursor: pointer;
        }

        .nav-btn:hover { background: #f5f5f3; color: #1a1a1a; }

        .nav-btn.danger { color: #c62828; border-color: #f5c6c6; }
        .nav-btn.danger:hover { background: #fdecea; }

        /* Registration dropdown */
        .reg-select {
            font-size: 13px;
            font-family: 'DM Sans', sans-serif;
            color: #555;
            background: #fff;
            border: 1px solid #e8e8e6;
            border-radius: 8px;
            padding: 5px 12px;
            outline: none;
            cursor: pointer;
            transition: border-color 0.15s;
        }

        .reg-select:hover, .reg-select:focus { border-color: #aaa; }

        /* ── Page wrapper ── */
        .page-content {
            min-height: calc(100vh - 56px - 48px);
            padding: 2rem 1.5rem;
        }

        /* ── Footer ── */
        footer {
            height: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-top: 1px solid #e8e8e6;
            background: #ffffff;
        }

        footer p {
            font-size: 12px;
            color: #bbb;
            margin: 0;
        }

        footer a { color: #bbb; text-decoration: none; }
        footer a:hover { color: #888; }

        /* ── Loader ── */
        #loader-wrapper {
            position: fixed;
            inset: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            background: rgba(255,255,255,0.85);
            z-index: 9999;
        }

        @keyframes spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        .spinner-ring {
            width: 22px;
            height: 22px;
            border: 2px solid #e8e8e6;
            border-top-color: #888;
            border-radius: 50%;
            animation: spin 0.7s linear infinite;
        }

        .fade-in { animation: fadeIn 0.4s forwards; }

        @keyframes fadeIn {
            from { opacity: 0; }
            to   { opacity: 1; }
        }

        /* ── DataTables overrides ── */
        .dataTables_wrapper .dataTables_filter input {
            border: 1px solid #e8e8e6;
            border-radius: 8px;
            padding: 4px 10px;
            font-family: 'DM Sans', sans-serif;
            font-size: 13px;
            outline: none;
        }

        .dataTables_wrapper .dataTables_filter input:focus {
            border-color: #aaa;
        }

        table.dataTable thead th {
            font-size: 12px;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            color: #aaa;
            border-bottom: 1px solid #e8e8e6 !important;
        }

        table.dataTable tbody td {
            font-size: 14px;
            color: #333;
            border-bottom: 1px solid #f0f0ee !important;
        }

        table.dataTable tbody tr:hover td {
            background: #fafafa;
        }


        /* Dropdown nav */
        .dropdown { position: relative; }
        

        .dropdown-menu {
            display: none;
            position: absolute;
            top: calc(100% + 6px);
            left: 0;
            background: #ffffff;
            border: 1px solid #e8e8e6;
            border-radius: 10px;
            padding: 4px;
            min-width: 180px;
            z-index: 100;
            box-shadow: 0 4px 16px rgba(0,0,0,0.07);
        }

        .dropdown-menu.show { display: block; }

        .dropdown-label {
            font-size: 11px;
            color: #bbb;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            padding: 6px 10px 2px;
            display: block;
        }

        .dropdown-item {
            display: block;
            font-size: 13px;
            color: #444;
            padding: 7px 10px;
            border-radius: 6px;
            text-decoration: none;
            transition: background 0.12s, color 0.12s;
        }

        .dropdown-item:hover { background: #f5f5f3; color: #1a1a1a; }

        .dropdown-divider { height: 1px; background: #f0f0ee; margin: 4px 0; }
    </style>
</head>

<body class="d-flex flex-column min-vh-100">

<!-- Loader -->
<div id="loader-wrapper">
    <div class="spinner-ring"></div>
</div>

<!-- Header -->
<header>
    <a href="/welcome" class="brand">
        4th's <span>Attendance System</span>
    </a>

    @auth
        {{-- Registration dropdown --}}
        <div class="dropdown" style="position:relative;">
            <button class="nav-btn" style="display:inline-flex;align-items:center;gap:5px;">
                Registration <span style="font-size:11px;color:#aaa;">▾</span>
            </button>
            <div class="dropdown-menu">
                <span class="dropdown-label">Enroll</span>
                <a class="dropdown-item" href="{{ url('/register-crud') }}">Student Registration</a>
                <div class="dropdown-divider"></div>
                <span class="dropdown-label">By level</span>
                <a class="dropdown-item" href="{{ url('/reg') }}">Grade School</a>
                <a class="dropdown-item" href="{{ url('/reghslrc') }}">High School</a>
                <a class="dropdown-item" href="{{ url('/regcllrc') }}">College</a>
            </div>
        </div>

        <a href="/viewStudents" class="nav-btn">Students</a>

        @if(auth()->user()->user_type >= 2)
        <div class="dropdown" style="position:relative;">
            <button class="nav-btn" style="display:inline-flex;align-items:center;gap:5px;">
                Admin <span style="font-size:11px;color:#aaa;">▾</span>
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="/records">Audit Trails</a>
                <a class="dropdown-item" href="/users/">Users Lists</a>
                <a class="dropdown-item" href="/sections">Section</a>
                <a class="dropdown-item" href="/library-visits">Library Visits</a>
            </div>
        </div>
        @endif

        <form action="/logout" method="POST" class="m-0">
            @csrf
            @method('DELETE')
            <button class="nav-btn danger">Logout</button>
        </form>
    @endauth
</header>

<!-- Page Content -->
<div class="page-content">
    {{ $slot }}
</div>

<!-- Footer -->
<footer>
    <p>&copy; {{ now()->format('Y') }}
        <b>Attendance System by 4th</b>
    </p>
</footer>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/2.3.7/js/dataTables.min.js"></script>

<script>
function updateClock() {
    const now = new Date();
    const el = document.getElementById('liveClock');
    if (el) el.innerHTML = now.toLocaleTimeString('en-US', {
        hour: '2-digit', minute: '2-digit', second: '2-digit', hour12: true
    });
}
setInterval(updateClock, 1000);
updateClock();
</script>

<script>
$(document).ready(function () {
    $('#table2, #table3, #table4').DataTable({
        pageLength: 10,
        responsive: true,
        language: { searchPlaceholder: "Search..." },
        order: [[4, 'asc']]
    });

    $('#table1').DataTable({
        pageLength: 10,
        responsive: true,
        language: { searchPlaceholder: "Search..." },
        order: [[0, 'asc'], [1, 'asc']]
    });

    $('#mytable').DataTable({
        pageLength: 10,
        responsive: true
    });
    $('#visitTable').DataTable({
    pageLength: 10,
    responsive: true,
    language: { searchPlaceholder: "Search..." },
    order: [[5, 'desc']]  // column index 5 = Date, desc = latest first
});
});
</script>

<script>
window.onload = function () {
    setTimeout(function () {
        const loader = document.getElementById("loader-wrapper");
        if (loader) loader.style.display = "none";

        document.querySelectorAll("table").forEach(table => {
            table.style.display = "table";
            table.classList.add("fade-in");
        });
    }, 800);
};
</script>

<script>
document.querySelectorAll('.dropdown > .nav-btn').forEach(btn => {
    btn.addEventListener('click', function (e) {
        e.stopPropagation();
        const menu = this.nextElementSibling;
        const isOpen = menu.classList.contains('show');

        // close all open dropdowns first
        document.querySelectorAll('.dropdown-menu.show')
            .forEach(m => m.classList.remove('show'));

        if (!isOpen) menu.classList.add('show');
    });
});

// close when clicking outside
document.addEventListener('click', function () {
    document.querySelectorAll('.dropdown-menu.show')
        .forEach(m => m.classList.remove('show'));
});
</script>



</body>
</html>