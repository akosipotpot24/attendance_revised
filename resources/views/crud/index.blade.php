<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>4th's project</title>

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
            padding: 1rem;
        }

        .login-wrap {
            width: 100%;
            max-width: 400px;
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

        .login-card {
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

        .field-input {
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

        .field-input:focus {
            border-color: #aaa;
            background: #fff;
        }

        .field-group { margin-bottom: 1rem; }

        .alert-minimal {
            font-size: 13px;
            padding: 10px 14px;
            border-radius: 8px;
            margin-bottom: 1rem;
        }

        .alert-success-minimal {
            background: #e8f5e9;
            color: #2e7d32;
            border: 1px solid #c8e6c9;
        }

        .alert-danger-minimal {
            background: #fdecea;
            color: #c62828;
            border: 1px solid #f5c6c6;
        }

        .btn-login {
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
            margin-top: 0.5rem;
            transition: background 0.15s;
        }

        .btn-login:hover { background: #333; }

        .divider {
            border: none;
            border-top: 1px solid #e8e8e6;
            margin: 1.5rem 0;
        }

        .register-link {
            text-align: center;
            font-size: 13px;
            color: #aaa;
        }

        .register-link a {
            color: #1a1a1a;
            text-decoration: none;
            font-weight: 500;
        }

        .register-link a:hover { text-decoration: underline; }
    </style>
</head>
<body>

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
                    <input class="field-input" type="password" id="password" name="password" placeholder="Enter password">
                </div>

                <button type="submit" class="btn-login">Sign in</button>
            </form>

            <hr class="divider">

            <p class="register-link">
                Don't have an account? <a href="userRegister">Register</a>
            </p>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>