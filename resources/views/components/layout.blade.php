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
    
    
    #loader {
  border: 8px solid #f3f3f3;
  border-top: 8px solid #3498db;
  border-radius: 50%;
  width: 60px;
  height: 60px;
  animation: spin 1s linear infinite;
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}

.spinner-wrapper{
    background-color: white;
    position: fixed;
    top: 0;
    left: 0;
    width:100%;
    height:100%;
    z-index: 9999;
    display:flex;
    justify-content: center;
    align-items:center;
    transition: opacity 0.2s;

}
.spinner-border{
     width:60px;
    height:60px;
}


@keyframes spin {
  0% { transform: translate(-50%, -50%) rotate(0deg); }
  100% { transform: translate(-50%, -50%) rotate(360deg); }
}


.fade-in{
    animation: fadeIn .5s forwards;
}

@keyframes fadeIn{
    from{
        opacity:0;
    }
    to{
        opacity:1;
    }
    
}

    
    
    </style>



</head>
   
<body>
 <div id="loader">
        </div> 
 <div id="content" style="display:none;">

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

<script>

 window.onload = function(){

     setTimeout(function(){

         document.getElementById("loader").style.display = "none";

         const content = document.getElementById("content");
         content.style.display = "block";
         content.classList.add("fade-in");

     },2000);

 }
</script>
<script>
    window.addEventListener('load', function () {
    const spinner = document.querySelector('.spinner-wrapper');
    const content = document.getElementById('content');

    // fade out spinner
    spinner.style.transition = 'opacity 0.5s';
    spinner.style.opacity = '0';

    // after transition, hide it completely
    setTimeout(() => {
        spinner.style.display = 'none';
        content.style.display = 'block';
        content.classList.add('fade-in');
    }, 500); // match transition duration
});

</body>
</html>