<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>OLOPSC</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" />
    <script defer src="https://use.fontawesome.com/releases/v5.5.0/js/all.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="icon" type="image/png" href="{{ asset('olopsc_logo.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="main.css" />
</head>
<body class="d-flex flex-column min-vh-100"> <!-- Ensures full height for proper footer placement -->

<header class="header-bar mb-3" style="background-color:#0a095f;">
    <div class="container d-flex flex-column flex-md-row align-items-center p-3">
        <h4 class="my-0 mr-md-auto font-weight-normal">
            <a href="/" style="color: #ffd230; font-family: 'Montserrat', sans-serif;"><b>OLOPSC</b></a>
        </h4>

        @auth
            <form action="/logout" method="POST">
                @csrf
                <button class="btn btn-danger mr-3 float-end">Logout</button>
            </form>
        @else
        @endauth
    </div>
</header>

<!-- Main Content Wrapper (pushes footer down) -->
<main class="flex-grow-1">
    {{$slot}}
</main>

<!-- Footer (Always at Bottom) -->
<footer class="border-top text-center small text-muted py-3 mt-auto">
        <p class="m-0">
            &copy; {{ now()->format('Y') }}
            <a href="/" class="text-muted text-decoration-none">
                <b>Attendance System by 4th</b>
            </a>
        </p>
    </footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#mytable').DataTable();
    });
</script>

<script>
    function updateTime() {
        const now = new Date();
        const dateOptions = { month: 'long', day: 'numeric', year: 'numeric' };
        const timeOptions = { hour: '2-digit', minute: '2-digit', second: '2-digit', hour12: true };
        document.getElementById('current-date').textContent = now.toLocaleDateString('en-US', dateOptions);
        document.getElementById('current-time').textContent = now.toLocaleTimeString('en-US', timeOptions);
    }
    setInterval(updateTime, 1000);
</script>

<!-- Include SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    // Check if there's an error session message and show SweetAlert
    @if(session('error'))
        Swal.fire({
            icon: 'error',
            title: 'Login Failed',
            text: '{{ session("error") }}',
            confirmButtonColor: '#d33'
        });
    @endif
</script>

</body>
</html>
