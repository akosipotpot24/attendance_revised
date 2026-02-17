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
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2 class="m-0"><strong>{{ $student->firstname }}'s Profile</strong></h2>

            <a href="/viewStudents" class="btn btn-danger">
                ← Student List
            </a>
        </div>

        <!-- Add card-body for inner margins -->
        <div class="card-body">
          <form action="/crud/update/{{ $student->student_number }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="text-center mb-3">
                <img src="/storage/avatars/{{ $student->avatar ?? 'default.png' }}"
                    class="rounded-circle img-thumbnail"
                    width="150"
                    height="150"
                    alt="Profile">
            </div>


            <div class="row mb-3">
              <div class="col-lg-4">
                <label for="firstname" class="form-label">First Name:</label>
                <input type="text" class="form-control" id="firstname" name="firstname" value="{{ $student->firstname }}">
              </div>
              <div class="col-lg-4">
                <label for="middlename" class="form-label">Middle Name:</label>
                <input type="text" class="form-control" id="middlename" name="middlename" value="{{ $student->middlename }}">
              </div>
              <div class="col-lg-4">
                <label for="lastname" class="form-label">Last Name:</label>
                <input type="text" class="form-control" id="lastname" name="lastname" value="{{ $student->lastname }}">
              </div>

            </div>

            <div class="row mb-3">
              <div class="col-lg-3">
                <label for="age" class="form-label">School Role:</label>
                <select name="school_role"  id="school_role" class="form-select" id="">
                  <option value="" disabled selected>Select Role</option>
                  <option value="faculty" {{ $student->school_role == 'faculty' ? 'selected' : '' }}>Faculty</option>
                  <option value="student" {{ $student->school_role == 'student' ? 'selected' : '' }}>Student</option>
                  <option value="non-teaching" {{ $student->school_role == 'non-teaching' ? 'selected' : '' }}>Non - Teaching</option>

                </select>
              </div>
              <div class="col-lg-3">
               <label for="library_branch" class="form-label">Library Location:</label>
                  <select name="library_branch" id="library_branch" class="form-select" >
                    <option value="" disabled selected>Select a branch</option>
                    <option value="pslrc" {{ $student->library_branch == 'pslrc' ? 'selected' : '' }}>Pre-School</option>
                    <option value="gslrc" {{ $student->library_branch == 'gslrc' ? 'selected' : '' }}>Grade School</option>
                    <option value="hslrc" {{ $student->library_branch == 'hslrc' ? 'selected' : '' }}>High School</option>
                    <option value="cllrc" {{ $student->library_branch == 'cllrc' ? 'selected' : '' }}>College</option>
                  </select>

              </div>

              <div class="col-lg-3">
                <label for="year" class="form-label">Section:</label>
                <select name="section" id="section" class="form-select" >
                    <option value="" disabled selected>Select Section</option>
                    <option value="makabansa"{{ $student->section == 'makabansa' ? 'selected' : '' }}>Makabansa</option>
                    <option value="makabayan"{{ $student->section == 'makabayan' ? 'selected' : '' }}>Makabayan</option>
                    <option value="makadiyos"{{ $student->section == 'makadiyos' ? 'selected' : '' }}>Makadiyos</option>
                    <option value="makakalikasan"{{ $student->section == 'makakalikasan' ? 'selected' : '' }}>Makakalikasan</option>
                  </select>
              </div>
              <div class="col-lg-3">
                <label for="year" class="form-label">Student Number:</label>
                <input type="text" name="student_number" class="form-control" value="{{ $student->student_number }}">
              </div>

                <div class="col-lg-6 mt-3">
                <label for="avatar" class="form-label">Change Avatar:</label>
                <input type="file" name="avatar"  class="form-control"   >
              </div>

            </div>

            <button type="submit" class="btn btn-success">Save Changes</button>
          </form>
        </div>
      </div> <!-- card -->
    </div>
  </div>
</body>
</html>
