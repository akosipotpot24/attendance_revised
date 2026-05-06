<x-layout>
 <div class="container mt-5">
    <div class="col-md-12">
      <div class="card">
         <div class="card-header d-flex justify-content-between align-items-center">
        <h1 class="mb-0">REGISTER</h1>
        <a href="/viewStudents" class="btn btn-danger">BACK</a>
    </div>

        <!-- Add card-body for inner margins -->
        <div class="card-body">
          <form action="/register" method="POST">
            @csrf
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
                  <select name="library_branch" id="library_branch" class="form-select" >
                    <option value="" disabled selected>Select a branch</option>
                    <option value="pslrc">Pre-School</option>
                    <option value="gslrc">Grade School</option>
                    <option value="hslrc">High School</option>
                    <option value="cllrc">College</option>
                  </select>

              </div>

              <div class="col-lg-3">
                <label for="year" class="form-label">Section:</label>
                <select name="section" id="section" class="form-select" >
                     @foreach($sections as $section)
                  <option value="{{ $section->grade_level_code }} - {{ $section->section }}">
                      {{ $section->grade_level_code }} - {{ $section->section }}
                  </option>
              @endforeach
                  </select>
              </div>
              <div class="col-lg-3">
                <label for="year" class="form-label">Student Number:</label>
                <input type="text" name="student_number" class="form-control">
              </div>
            </div>

            <button type="submit" class="btn btn-primary">Register</button>
          </form>
        </div>
      </div> <!-- card -->
    </div>
  </div>  
</x-layout>