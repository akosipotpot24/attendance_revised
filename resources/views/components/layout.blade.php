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
            padding: 0 1.25rem;
            height: 56px;
            display: flex;
            align-items: center;
            gap: 2px;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        /* Brand */
        .brand {
            font-size: 15px;
            font-weight: 500;
            color: #1a1a1a;
            text-decoration: none;
            margin-right: auto;
            letter-spacing: -0.01em;
            display: flex;
            align-items: center;
            gap: 9px;
        }

        .brand-icon {
            width: 30px;
            height: 30px;
            background: #1a1a1a;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .brand-icon svg {
            width: 16px;
            height: 16px;
            stroke: #fff;
            fill: none;
            stroke-width: 2;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        .brand span { color: #aaa; font-weight: 400; }

        /* Vertical divider */
        .nav-divider {
            width: 1px;
            height: 20px;
            background: #e8e8e6;
            margin: 0 6px;
            flex-shrink: 0;
        }

        /* Nav button with icon */
        .nav-btn {
            font-size: 13px;
            font-family: 'DM Sans', sans-serif;
            font-weight: 400;
            color: #555;
            background: transparent;
            border: none;
            border-radius: 8px;
            padding: 6px 10px;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            text-decoration: none;
            white-space: nowrap;
            transition: background 0.13s, color 0.13s;
            cursor: pointer;
        }

        .nav-btn:hover { background: #f0f0ee; color: #1a1a1a; }

        .nav-btn svg {
            width: 16px;
            height: 16px;
            stroke: currentColor;
            fill: none;
            stroke-width: 1.7;
            stroke-linecap: round;
            stroke-linejoin: round;
            flex-shrink: 0;
        }

        .nav-btn .chev {
            width: 10px;
            height: 10px;
            opacity: 0.4;
        }

        /* Avatar button */
        .avatar-btn {
            width: 34px;
            height: 34px;
            border-radius: 50%;
            background: #1a1a1a;
            border: none;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 11.5px;
            font-weight: 500;
            color: #fff;
            letter-spacing: 0.04em;
            font-family: 'DM Sans', sans-serif;
            transition: opacity 0.13s;
            flex-shrink: 0;
        }

        .avatar-btn:hover { opacity: 0.75; }

        /* Dropdown */
        .nav-item { position: relative; }

        .dropdown-panel {
            display: none;
            position: absolute;
            top: calc(100% + 8px);
            left: 0;
            background: #ffffff;
            border: 0.5px solid #e8e8e6;
            border-radius: 12px;
            padding: 5px;
            min-width: 195px;
            z-index: 200;
            box-shadow: 0 8px 24px rgba(0,0,0,0.08);
        }

        .dropdown-panel.right { left: auto; right: 0; }
        .dropdown-panel.show { display: block; }

        .dp-label {
            font-size: 10.5px;
            color: #bbb;
            letter-spacing: 0.07em;
            text-transform: uppercase;
            padding: 6px 10px 3px;
            display: block;
        }

        .dp-item {
            display: flex;
            align-items: center;
            gap: 9px;
            font-size: 13px;
            color: #444;
            padding: 7px 10px;
            border-radius: 7px;
            text-decoration: none;
            cursor: pointer;
            transition: background 0.11s, color 0.11s;
            border: none;
            background: none;
            width: 100%;
            text-align: left;
            font-family: 'DM Sans', sans-serif;
        }

        .dp-item:hover { background: #f5f5f3; color: #1a1a1a; }

        .dp-item svg {
            width: 15px;
            height: 15px;
            stroke: currentColor;
            fill: none;
            stroke-width: 1.7;
            stroke-linecap: round;
            stroke-linejoin: round;
            opacity: 0.55;
            flex-shrink: 0;
        }

        .dp-item.danger { color: #c62828; }
        .dp-item.danger:hover { background: #fdecea; }
        .dp-item.danger svg { opacity: 1; }

        .dp-divider {
            height: 0.5px;
            background: #f0f0ee;
            margin: 4px 0;
        }

        /* User header inside settings dropdown */
        .dp-user-header {
            padding: 10px 10px 8px;
            border-bottom: 0.5px solid #f0f0ee;
            margin-bottom: 4px;
        }

        .dp-user-header .dp-name {
            font-size: 13px;
            font-weight: 500;
            color: #1a1a1a;
        }

        .dp-user-header .dp-role {
            font-size: 11.5px;
            color: #aaa;
            margin-top: 1px;
        }

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
            to   { transform: rotate(360deg); }
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
    </style>
</head>

<body class="d-flex flex-column min-vh-100">

<!-- Loader -->
<div id="loader-wrapper">
    <div class="spinner-ring"></div>
</div>

<!-- Header -->
<header>

    <!-- Brand -->
    <a href="/welcome" class="brand">
        <div class="brand-icon">
            <!-- layers icon -->
            <svg viewBox="0 0 24 24"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>
        </div>
        4th's <span>Attendance</span>
    </a>

    @auth
    @if(auth()->user()->user_type = 2)
        {{-- Registration dropdown --}}
        <div class="nav-item">
            <button class="nav-btn" id="btn-reg">
                <!-- user-plus icon -->
                <svg viewBox="0 0 24 24"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><line x1="19" y1="8" x2="19" y2="14"/><line x1="22" y1="11" x2="16" y2="11"/></svg>
                Registration
                <svg class="chev" viewBox="0 0 24 24" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg>
            </button>
            <div class="dropdown-panel" id="reg-menu">
                <span class="dp-label">Enroll</span>
                <a class="dp-item" href="{{ url('/register-crud') }}">
                    <svg viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="12" y1="18" x2="12" y2="12"/><line x1="9" y1="15" x2="15" y2="15"/></svg>
                    Personnel Registration
                </a>
                <div class="dp-divider"></div>
                <span class="dp-label">By level</span>
                {{-- <a class="dp-item" href="{{ url('/reg') }}">
                    <svg viewBox="0 0 24 24"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
                    Grade School
                </a>
                <a class="dp-item" href="{{ url('/reghslrc') }}">
                    <svg viewBox="0 0 24 24"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg>
                    High School
                </a>
                <a class="dp-item" href="{{ url('/regcllrc') }}">
                    <svg viewBox="0 0 24 24"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg>
                    College
                </a> --}}
            </div>
        </div>



        {{-- Students --}}
       

        {{-- Admin dropdown --}}
        <div class="nav-item">
            <button class="nav-btn" id="btn-admin">
                <!-- shield icon -->
                <svg viewBox="0 0 24 24"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                Admin
                <svg class="chev" viewBox="0 0 24 24" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg>
            </button>
            <div class="dropdown-panel" id="admin-menu">
                <a class="dp-item" href="/records">
                    <svg viewBox="0 0 24 24"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
                    Audit Trails
                </a>
                <a class="dp-item" href="/users/">
                    <svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                    User Lists
                </a>
                <a class="dp-item" href="/viewStudents">
                    <svg viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                    Patron List
                </a>
                <a class="dp-item" href="/sections">
                    <svg viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
                    Sections
                </a>
                <a class="dp-item" href="/library-visits">
                    <svg viewBox="0 0 24 24"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/></svg>
                    Library Visits
                </a>
            </div>
        </div>
        @endif

        <div class="nav-divider"></div>

        {{-- Settings / Account dropdown --}}
        <div class="nav-item">
            <button class="avatar-btn" id="btn-settings" title="Account">
                <img src="/storage/userAvatar/{{ auth()->user()->avatar ?? 'default.png' }}"
                             class="rounded-circle"
                             width="35" height="35"
                             style="object-fit:cover; border: 1px solid #e8e8e6;"
                             alt="Profile">
                {{ strtoupper(substr(auth()->user()->name, 0, 2)) }}
            </button>
            <div class="dropdown-panel right" id="settings-menu">
                <div class="dp-user-header">
                    <div class="dp-name">{{ auth()->user()->name }}</div>
                    <div class="dp-role">
                        {{ auth()->user()->user_type >= 2 ? 'Administrator' : 'Staff' }}
                    </div>
                </div>
                <a class="dp-item" href="/users/edit/{{ auth()->user()->id }}">
                    <svg viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                    Edit Profile
                </a>
                <a class="dp-item" href="{{ route('reset_password') }}">
                    <svg viewBox="0 0 24 24"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                    Reset Password
                </a>

              
                {{-- <a class="dp-item" href="{{ url('/settings') }}">
                    <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-4 0v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83-2.83l.06-.06A1.65 1.65 0 0 0 4.68 15a1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1 0-4h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 2.83-2.83l.06.06A1.65 1.65 0 0 0 9 4.68a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 4 0v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 2.83l-.06.06A1.65 1.65 0 0 0 19.4 9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 0 4h-.09a1.65 1.65 0 0 0-1.51 1z"/></svg>
                    Settings
                </a> --}}
                <div class="dp-divider"></div>
                <form action="/logout" method="POST" class="m-0">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="dp-item danger">
                        <svg viewBox="0 0 24 24"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
                        Logout
                    </button>
                </form>
            </div>
        </div>

    @endauth
</header>

<!-- Page Content -->
<div class="page-content flex-grow-1">
    {{ $slot }}
</div>

<!-- Footer -->
<footer>
    <p>&copy; {{ now()->format('Y') }} <b>Attendance System by 4th</b></p>
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

     $('#workers').DataTable({
        pageLength: 10,
        responsive: true
    });

     $('#faculty').DataTable({
        pageLength: 10,
        responsive: true
    });

    $('#visitTable').DataTable({
        pageLength: 10,
        responsive: true,
        language: { searchPlaceholder: "Search..." },
        order: [[5, 'desc']]
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
// Dropdown toggle logic
(function () {
    const pairs = [
        ['btn-reg',      'reg-menu'],
        ['btn-admin',    'admin-menu'],
        ['btn-settings', 'settings-menu'],
    ];

    function closeAll() {
        document.querySelectorAll('.dropdown-panel.show')
            .forEach(m => m.classList.remove('show'));
    }

    pairs.forEach(([btnId, menuId]) => {
        const btn  = document.getElementById(btnId);
        const menu = document.getElementById(menuId);
        if (!btn || !menu) return;

        btn.addEventListener('click', function (e) {
            e.stopPropagation();
            const isOpen = menu.classList.contains('show');
            closeAll();
            if (!isOpen) menu.classList.add('show');
        });
    });

    document.addEventListener('click', closeAll);
})();
</script>

</body>
</html>