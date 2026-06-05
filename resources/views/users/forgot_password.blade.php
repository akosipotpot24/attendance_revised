<x-index>

    <div class="login-wrap">

        {{-- Brand --}}
        <div class="brand">
            <p class="brand-name">4th's Attendance System</p>
            <p class="brand-sub">Library Management</p>
        </div>

        <div class="login-card">

            <p class="card-heading">Forgot password</p>
            <p class="card-sub">Enter your email and we'll send you a reset link.</p>

            {{-- Success --}}
            @if (session()->has('success'))
                <div class="alert-minimal alert-success-minimal">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Failed (session or validation error) --}}
            @if (session()->has('failed') || $errors->any())
                <div class="alert-minimal alert-danger-minimal">
                    {{ session('failed') ?? $errors->first('email') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="field-group">
                    <label class="field-label" for="email">Enter your email address</label>
                    <input
                        class="field-input {{ $errors->has('email') ? 'is-invalid' : '' }}"
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder=""
                        autofocus
                    >
                </div>

                <button type="submit" class="btn-login w-100 mt-3">
                    Send Reset Link
                </button>

            </form>

            <hr class="divider">

            <p class="register-link">
                Remembered your password? <a href="{{ route('login') }}">Login</a>
            </p>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</x-index>