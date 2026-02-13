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
          <form action="/register_crud" method="POST">
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
              <div class="col-lg-3">
                <label for="age" class="form-label">School Role:</label>
                <select name="school_role"  id="school_role" class="form-select" id="">
                  <option value="" disabled selected>Select Role</option>
                  <option value="faculty">Faculty</option>
                  <option value="student">Student</option>
                  <option value="non-teaching">Non - Teaching</option>
                  
                </select>
              </div>
              <div class="col-lg-3">
               <label for="library_branch" class="form-label">Library Location:</label>
                  <select name="library_branch" id="library_branch" class="form-select" required>
                    <option value="" disabled selected>Select a branch</option>
                    <option value="pslrc">Pre-School</option>
                    <option value="gslrc">Grade School</option>
                    <option value="hslrc">High School</option>
                    <option value="cllrc">College</option>
                  </select>

              </div>
               
              <div class="col-lg-3">
                <label for="year" class="form-label">Section:</label>
                <select name="section" id="section" class="form-select" required>
                    <option value="" disabled selected>Select Section</option>
                    <option value="makabansa">Makabansa</option>
                    <option value="makabayan">Makabayan</option>
                    <option value="makadiyos">Makadiyos</option>
                    <option value="makakalikasan">Makakalikasan</option>
                  </select>
              </div>
              <div class="col-lg-3">
                <label for="year" class="form-label">Student Number:</label>
                <select name="student_number" id="student_number" class="form-select" required>
                    <option value="" disabled selected>Select a branch</option>
                    <option value="pslrc">Pre-School</option>
                    <option value="gslrc">Grade School</option>
                    <option value="hslrc">High School</option>
                    <option value="cllrc">College</option>
                  </select>
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