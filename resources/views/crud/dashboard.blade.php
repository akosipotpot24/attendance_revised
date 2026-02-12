<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.7/css/dataTables.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
    </head>
        <body>
        
            <div class="container mt-5">
                <table id="mytable" class="table table-bordered table-striped ">
                    <thead>
                        <tr>
                            <th>name</th>
                            <th>lastname</th>
                            <th>age</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Hermogenes</td>
                            <td>Tongco</td>
                            <td>25</td>
                        </tr>
                        <tr>
                            <td>Laurence</td>
                            <td>Flores</td>
                            <td>26</td>
                        </tr>
                         <tr>
                            <td>Pocholo</td>
                            <td>Lapuz</td>
                            <td>23</td>
                        </tr>
                         <tr>
                            <td>Enrico</td>
                            <td>Catolico</td>
                            <td>22</td>
                        </tr>
                         <tr>
                            <td>Justin</td>
                            <td>Garcia</td>
                            <td>22</td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>


<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/2.3.7/js/dataTables.min.js"></script>
<script>
    $(document).ready(function () {
        $('#mytable').DataTable({
            pageLength: 2,
            lengthMenu: [2, 4, 6]
        });
    });
</script>

        </body>
</html>