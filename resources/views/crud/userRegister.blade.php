<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register — Attendance System</title>

    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'DM Sans', sans-serif;
            background: #f5f5f3;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem 1rem;
        }

        .register-wrap {
            width: 100%;
            max-width: 600px;
        }

        .brand {
            text-align: center;
            margin-bottom: 2rem;
        }

        .brand-name {
            font-size: 16px;
            font-weight: 500;
            color: #1a1a1a;
            letter-spacing: -0.01em;
        }

        .brand-sub {
            font-size: 12px;
            color: #aaa;
            margin-top: 2px;
        }

        .register-card {
            background: #ffffff;
            border: 1px solid #e8e8e6;
            border-radius: 16px;
            padding: 2rem;
        }

        .card-heading {
            font-size: 18px;
            font-weight: 500;
            color: #1a1a1a;
            margin-bottom: 4px;
        }

        .card-sub {
            font-size: 13px;
            color: #aaa;
            margin-bottom: 1.75rem;
        }

        .field-label {
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            color: #aaa;
            margin-bottom: 6px;
            display: block;
        }

        .field-input,
        .field-select {
            width: 100%;
            height: 42px;
            padding: 0 12px;
            font-size: 14px;
            font-family: 'DM Sans', sans-serif;
            background: #f5f5f3;
            border: 1px solid #e8e8e6;
            border-radius: 8px;
            color: #1a1a1a;
            outline: none;
            transition: border-color 0.2s, background 0.2s;
        }

        .field-input::placeholder { color: #ccc; }

        .field-input:focus,
        .field-select:focus {
            border-color: #aaa;
            background: #fff;
        }

        .field-group { margin-bottom: 1rem; }

        .error-msg {
            font-size: 12px;
            color: #c62828;
            margin-top: 4px;
            display: block;
        }

        .divider {
            border: none;
            border-top: 1px solid #e8e8e6;
            margin: 1.5rem 0;
        }

        .btn-register {
            width: 100%;
            height: 42px;
            font-size: 14px;
            font-family: 'DM Sans', sans-serif;
            font-weight: 500;
            background: #1a1a1a;
            color: #fff;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background 0.15s;
        }

        .btn-register:hover { background: #333; }

        .login-link {
            text-align: center;
            font-size: 13px;
            color: #aaa;
            margin-top: 1.25rem;
        }

        .login-link a {
            color: #1a1a1a;
            text-decoration: none;
            font-weight: 500;
        }

        .login-link a:hover { text-decoration: underline; }
    </style>
</head>
<body>

    <div class="register-wrap">

        {{-- Brand --}}
        <div class="brand">
            <p class="brand-name">4th's Attendance System</p>
            <p class="brand-sub">Create your account</p>
        </div>

        <div class="register-card">

            <p class="card-heading">Create account</p>
            <p class="card-sub">Fill in your details to register</p>

            <form action="userRegister" method="POST">
                @csrf

                {{-- Name Row --}}
                <div class="row g-3 mb-2">
                    <div class="col-md-6">
                        <div class="field-group">
                            <label class="field-label">Username</label>
                            <input type="text" class="field-input" name="username" value="{{ old('username') }}" placeholder="Enter username">
                            @error('username')
                                <span class="error-msg">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="field-group">
                            <label class="field-label">Full Name</label>
                            <input type="text" class="field-input" name="fullname" value="{{ old('fullname') }}" placeholder="Enter full name">
                            @error('fullname')
                                <span class="error-msg">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row g-3 mb-2">
                    <div class="col-md-6">
                        <div class="field-group">
                            <label class="field-label">Email</label>
                            <input type="email" class="field-input" name="email" value="{{ old('email') }}" placeholder="Enter email">
                            @error('email')
                                <span class="error-msg">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="field-group">
                            <label class="field-label">User Type</label>
                            <select name="user_type" class="field-select">
                                <option value="" disabled selected>Select type</option>
                                <option value="1">User</option>
                                <option value="4">HSLRC</option>
                                <option value="4">GSLRC</option>
                                <option value="4">PSLRC</option>
                                <option value="4">CLLRC</option>
                            </select>
                            @error('user_type')
                                <span class="error-msg">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row g-3 mb-2">
                    <div class="col-md-6">
                        <div class="field-group">
                            <label class="field-label">Password</label>
                            <input type="password" class="field-input" name="password" placeholder="Enter password">
                            @error('password')
                                <span class="error-msg">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="field-group">
                            <label class="field-label">Confirm Password</label>
                            <input type="password" class="field-input" name="password_confirmation" placeholder="Confirm password">
                            @error('password_confirmation')
                                <span class="error-msg">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <hr class="divider">

                <button type="submit" class="btn-register">Create Account</button>

            </form>

            <p class="login-link">
                Already have an account? <a href="/project">Sign in</a>
            </p>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>