<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
    crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <form action="userRegister" method="POST">
        @csrf
         <div class="container mt-5">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">REGISTER</div>

        <!-- Add card-body for inner margins -->
        <div class="card-body">
          <form action="/register" method="POST">
            @csrf
            <div class="row mb-3">
              <div class="col-lg-4">
                <label for="username" class="form-label">UserName:</label>
                <input type="text" class="form-control" id="username" name="username">
                @error('username')
                    <p class="m-0 small alert alert-danger shadow-sm">{{ $message }}</p>
                @enderror
              </div>
              <div class="col-lg-4">
                <label for="fullname" class="form-label">Full Name:</label>
                <input type="text" class="form-control" id="fullname" name="fullname">
                @error('fullname')
                    <p class="m-0 small alert alert-danger shadow-sm">{{ $message }}</p>
                    @enderror
              </div>
              <div class="col-lg-4">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" name="email">
                @error('email')
                    <p class="m-0 small alert alert-danger shadow-sm">{{ $message }}</p>
                @enderror
              </div>

            </div>

            <div class="row mb-3">
              <div class="col-lg-3">
                <label for="user_type" class="form-label">User Type:</label>
                <select name="user_type"  id="user_type" class="form-select" id="">
                  <option value="" disabled selected>Select Role</option>
                  <option value="admin">Admin</option>
                  <option value="hslrc">HSLRC</option>
                  <option value="gslrc">GSLRC</option>
                  <option value="pslrc">PSLRC</option>
                  <option value="cllrc">CLLRC</option>
                </select>
                @error('user_type')
                    <p class="m-0 small alert alert-danger shadow-sm">{{ $message }}</p>
                    @enderror
              </div>

              <div class="col-lg-4">
                <label for="password" class="form-label">Password:</label>
                <input type="password" class="form-control" id="password" name="password">
                @error('password')
                    <p class="m-0 small alert alert-danger shadow-sm">{{ $message }}</p>
                    @enderror
              </div>


              <div class="col-lg-4">
                <label for="password_confirmation" class="form-label">Confirm Password:</label>
                <input type="password" class="form-control" id="confirm_password" name="password_confirmation">
                @error('password_confirmation')
                    <p class="m-0 small alert alert-danger shadow-sm">{{ $message }}</p>
                    @enderror
              </div>





            </div>

            <button type="submit" class="btn btn-primary">Register</button>
          </form>
        </div>
      </div> <!-- card -->
    </div>
  </div>
    </form>
</body>
</html>
