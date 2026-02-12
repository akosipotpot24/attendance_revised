<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link 
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
    crossorigin="anonymous">
  <title>Document</title>
</head>
<body>
  <div class="container mt-5">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">REGISTER</div>
        
        <!-- Add card-body for inner margins -->
        <div class="card-body">
          <form>
            <div class="row mb-3">
              <div class="col-lg-4">
                <label for="firstname" class="form-label">First Name:</label>
                <input type="text" class="form-control" id="firstname" name="firstname">
              </div>
              <div class="col-lg-4">
                <label for="middlename" class="form-label">Middle Name:</label>
                <input type="text" class="form-control" id="middlename" name="middlename">
              </div>
              <div class="col-lg-4">
                <label for="lastname" class="form-label">Last Name:</label>
                <input type="text" class="form-control" id="lastname" name="lastname">
              </div>
              
            </div>

            <div class="row mb-3">
              <div class="col-lg-4">
                <label for="age" class="form-label">Age:</label>
                <input type="number" class="form-control" id="age" name="age">
              </div>
              <div class="col-lg-4">
                <label for="course" class="form-label">Course:</label>
                <input type="text" class="form-control" id="course" name="course">
              </div>
              <div class="col-lg-4">
                <label for="year" class="form-label">Year Level:</label>
                <input type="text" class="form-control" id="year" name="year">
              </div>
            </div>

            <button type="submit" class="btn btn-primary">Register</button>
          </form>
        </div>
      </div> <!-- card -->
    </div>
  </div>
</body>
</html>