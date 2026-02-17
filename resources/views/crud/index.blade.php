<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>crud</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
    }
    .login-container {
      max-width: 400px;
      margin: 80px auto;
      padding: 30px;
      background: #fff;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    .form-control {
      border-radius: 6px;
    }
    .btn-dark {
      width: 100%;
      border-radius: 6px;
    }
  </style>
</head>
<body>
  <div class="login-container">
    <h3 class="text-center mb-4">Login</h3>
       @if (session()->has('success'))
                        <div class="container container--narrow">
                          <div class="alert alert-success text-center">
                            {{ session('success') }}
                          </div>
                        </div>
                        @endif


    <form action="/login" method="POST">
        @csrf
      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="username" class="form-control" id="username" name="username" placeholder="Enter username">
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" id="password" placeholder="Enter password">
      </div>
      @if (session()->has('failed'))
                        <div class="container container--narrow">
                        <div class="alert alert-danger text-center">
                          {{ session('failed') }}
                        </div>
                        </div>
                        @endif
      <button type="submit" class="btn btn-dark">Login</button>
    </form>
    <!-- <p class="text-center mt-3">
      <a href="#">Forgot password?</a>
    </p> -->


    <p class="text-center mt-3">
      <a href="userRegister">Register?</a>
    </p>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
