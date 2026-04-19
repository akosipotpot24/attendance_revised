<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://cdn.datatables.net/2.3.7/css/dataTables.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <title>Document</title>
    
    <style>
        /* Sidebar styling */
        .sidebar {
            width: 250px;
            height: 100vh;
        }
        .sidebar .nav-link {
            transition: background 0.3s, color 0.3s;
        }
        .sidebar .nav-link:hover {
            background: rgba(255,255,255,0.1);
            color: #f8f9fa;
        }
        /* Avatar styling */
        .avatar-img {
            box-shadow: 0 2px 6px rgba(0,0,0,0.2);
        }
        /* Footer styling */
        footer {
            background: #f8f9fa;
            border-top: 1px solid #ddd;
        }
                .pic{
                height: 50px;
                width: 50px;
            }
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
</head>
   
<body>
    


{{-- <div class="spinner-wrapper">
    <div class="spinner-border" role="status">
  <span class="visually-hidden">Loading...</span>
</div>
</div> --}}



<div class="d-flex flex-grow-1">

    

    <div class="sidebar bg-dark text-white p-3 sticky-top d-flex flex-column">
    <h3 class="text-center mb-3">Dashboard</h3>
    <hr>

    <ul class="nav flex-column flex-grow-1">
        <li class="nav-item mb-2">
            <a href="/viewStudents" class="nav-link text-white">
                <i class="bi bi-people"></i> Students
            </a>
        </li>
        <li class="nav-item mb-2">
            <a href="/register-crud" class="nav-link text-white">
                <i class="bi bi-person-add"></i> New Student
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
        <li class="nav-item mb-2">
            <a href="/sections" class="nav-link text-white">
                <i class="bi bi-list-task"></i> Section
            </a>
        </li>
      

        <li class="nav-item mt-auto pt-3">
            <a href="/users" class="nav-link text-white">
                <i class="bi bi-person-fill-exclamation"></i> Approvals
            </a>
            @if (session()->has('error'))
                        <div class="container container--narrow">
                          <div class="alert alert-danger text-center">
                            {{ session('error') }}
                          </div>
                        </div>
                        @endif
        </li>


        <li class="nav-item mt-auto pt-3">
            <hr>
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

      {{ $slot }}

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

<footer class="text-center py-3 mt-auto">
    &copy; 2024 Attendance System. All rights reserved.
</footer>
</div>

    


   


<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/2.3.7/js/dataTables.min.js"></script>
<script>
$(document).ready(function () {
    $('#table2, #table3,#table4').DataTable({
        pageLength: 10,
        responsive: true,
        language: {
            searchPlaceholder: "Search..."
        },
        order:[[4,'asc']]
    });


    $('#table1').DataTable({
        pageLength: 10,
        responsive: true,
        language: {
            searchPlaceholder: "Search..."
        },
        order:[[0,'asc'],[1,'asc']]
    });
});


</script>


</body>
</html>