<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.7/css/dataTables.dataTables.min.css">
    
    <title>Create Section</title>

    <style>
                .custom-input {
        border: 2px solid grey; /* Bootstrap primary color */
        border-radius: 8px;
        padding: 10px 12px;
        transition: all 0.3s ease;
        }

        .custom-input:focus {
        border-color: black; /* Bootstrap purple */
        box-shadow: 0 0 8px rgba(102, 16, 242, 0.3);
        }

    </style>
</head>
<body>
    {{ $slot }}


    
</body>
</html>