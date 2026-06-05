<x-index>

     <div class="login-wrap">

        {{-- Brand --}}
        <div class="brand">
            <p class="brand-name">4th's Attendance System</p>
            <p class="brand-sub">Library Management</p>
        </div>

        <div class="login-card">

            <p class="card-heading">Welcome back</p>
            <p class="card-sub">Sign in to your account</p>

            {{-- Success --}}
            @if (session()->has('success'))
            <div class="alert-minimal alert-success-minimal">
                {{ session('success') }}
            </div>
            @endif

            {{-- Failed --}}
            @if (session()->has('failed'))
            <div class="alert-minimal alert-danger-minimal">
                {{ session('failed') }}
            </div>
            @endif

            <form action="/login" method="POST">
                @csrf

                <div class="field-group">
                    <label class="field-label" for="username">Username</label>
                    <input class="field-input" type="text" id="username" name="username" placeholder="Enter username">
                </div>

                <div class="field-group">
                <label class="field-label" for="password">Password</label>
                <div class="input-wrapper">
                    <input class="field-input" type="password" id="password" name="password" placeholder="Enter password">
                    <button type="button" class="toggle-password" onclick="togglePassword()">
                     <i class="fa-regular fa-eye"></i>
                    </button>
                </div>
                </div>

                <button type="submit" class="btn-login">Sign in</button>
            </form>

            <hr class="divider">

            <p class="register-link">
                Don't have an account? <a href="userRegister">Register</a>
            </p>
            <p class="register-link">
                Don't remember your password? <a href="{{ route('password.request') }}">Forgot Password</a>
            </p>

        </div>

    </div>
    <script>function togglePassword() {
  const input = document.getElementById('password');
  const btn = document.querySelector('.toggle-password');

   if (input.type === 'password') {
    input.type = 'text';
    btn.innerHTML = '<i class="fa-regular fa-eye-slash"></i>';
  } else {
    input.type = 'password';
    btn.innerHTML = '<i class="fa-regular fa-eye"></i>';
  }
}</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</x-index>