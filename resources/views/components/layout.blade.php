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
    
    
   

    
    
    </style>



</head>
   
<body>


{{-- <div class="spinner-wrapper">
    <div class="spinner-border" role="status">
  <span class="visually-hidden">Loading...</span>
</div>
</div> --}}


    {{ $slot }}
    

<footer class="text-center py-3 mt-auto">
    &copy; 2024 Attendance System. All rights reserved.
</footer>
</div>

    


   


<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/2.3.7/js/dataTables.min.js"></script>
<script>
$(document).ready(function () {
    $('#table1, #table2').DataTable({
        pageLength: 10,
        responsive: true,
        language: {
            searchPlaceholder: "Search..."
        }
    });
});
</script>


</body>
</html>