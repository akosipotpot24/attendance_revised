<x-index>

    <div class="login-wrap">

        {{-- Brand --}}
        <div class="brand">
            <p class="brand-name">4th's Attendance System</p>
            <p class="brand-sub">Library Management</p>
        </div>

        <div class="login-card">

            <p class="card-heading">Reset Password</p>
            <p class="card-sub">Enter your new password below.</p>

            {{-- Failed --}}
            @if (session()->has('failed') || $errors->any())
                <div class="alert-minimal alert-danger-minimal">
                    {{ session('failed') ?? $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.update') }}">
                @csrf

                {{-- These two are invisible but required --}}
                <input type="hidden" name="token" value="{{ $token }}">
                <input type="hidden" name="email" value="{{ $email }}">

                <div class="field-group">
                    <label class="field-label" for="password">New Password</label>
                    <div class="password-wrapper">
                        <input class="field-input" type="password" id="password" name="password" required>
                        <button type="button" class="toggle-password" onclick="togglePassword('password', this)">
                            <i class="fa-regular fa-eye"></i>
                        </button>
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="password_confirmation">Confirm Password</label>
                    <div class="password-wrapper">
                        <input class="field-input" type="password" id="password_confirmation" name="password_confirmation" required>
                        <button type="button" class="toggle-password" onclick="togglePassword('password_confirmation', this)">
                            <i class="fa-regular fa-eye"></i>
                        </button>
                    </div>
                </div>

                <button type="submit" class="btn-login w-100 mt-3">
                    Reset Password
                </button>

            </form>

            <hr class="divider">

            <p class="register-link">
                Remembered your password? <a href="{{ route('attendance') }}">Login</a>
            </p>

        </div>

    </div>

    <script>
        function togglePassword(fieldId, btn) {
            const input = document.getElementById(fieldId);
            if (input.type === 'password') {
                input.type = 'text';
                btn.innerHTML = '<i class="fa-regular fa-eye-slash"></i>';
            } else {
                input.type = 'password';
                btn.innerHTML = '<i class="fa-regular fa-eye"></i>';
            }
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</x-index>