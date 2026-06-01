<x-layout>

    <div class="container mt-4" style="max-width: 680px;">

        {{-- Alerts --}}
        @if (session()->has('success'))
        <div class="alert-minimal alert-success-minimal mb-3">
            {{ session('success') }}
        </div>
        @endif

        @if (session()->has('error'))
        <div class="alert-minimal alert-danger-minimal mb-3">
            {{ session('error') }}
        </div>
        @endif

        {{-- Welcome Card --}}
        <div class="card border-0 shadow-sm rounded-3">
            <div class="card-body p-4">

                {{-- Greeting --}}
                <div class="mb-4">
                    <h5 class="mb-1 fw-500">Welcome back, {{ auth()->user()->fullname ?? 'User' }}</h5>
                    <small class="text-muted">You are successfully logged in.</small>
                </div>

                <hr style="border-color: #e8e8e6;">

                {{-- Date & Time --}}
                <div class="row g-3 mt-1">
                    <div class="col-md-6">
                        <p class="text-muted mb-1" style="font-size: 11px; text-transform: uppercase; letter-spacing: 0.06em;">Current Date</p>
                        <p class="mb-0 fw-500" style="font-size: 15px;">
                            {{ \Carbon\Carbon::now()->format('F d, Y') }}
                        </p>
                    </div>
                    <div class="col-md-6">
                        <p class="text-muted mb-1" style="font-size: 11px; text-transform: uppercase; letter-spacing: 0.06em;">Current Time</p>
                        <p class="mb-0 fw-500" style="font-size: 15px;" id="liveClock">--:--:-- --</p>
                    </div>
                </div>

                <hr style="border-color: #e8e8e6;">

                {{-- Stats --}}
                <div class="row g-3 mt-1">

                    <div class="col-md-4">
                        <a href="{{ route('faculty') }}" class="stat-link">
                        <div class="stat-card">
                            <div class="stat-icon-wrap" style="background: #dbeafe;">
                                <i class="fa-solid fa-chalkboard-user" style="color: #1d4ed8; font-size: 18px;"></i>
                            </div>
                            <p class="stat-label">Faculty</p>
                            <p class="stat-value">{{ $teachers }}</p>
                        </div>
                    </a>
                    </div>

                    <div class="col-md-4">
                        <a href="{{ route('student') }}" class="stat-link">
                        <div class="stat-card">
                            <div class="stat-icon-wrap" style="background: #dcfce7;">
                                <i class="fa-solid fa-user-graduate" style="color: #15803d; font-size: 18px;"></i>
                            </div>
                            <p class="stat-label">Students</p>
                            <p class="stat-value">{{ $students }}</p>
                        </div>
                        </a>
                    </div>

                    <div class="col-md-4">
                        <a href="{{ route('worker') }}" class="stat-link">
                        <div class="stat-card">
                            <div class="stat-icon-wrap" style="background: #fef9c3;">
                                <i class="fa-solid fa-briefcase" style="color: #a16207; font-size: 18px;"></i>
                            </div>
                            <p class="stat-label">Non-Teaching</p>
                            <p class="stat-value">{{ $workers }}</p>
                        </div>
                        </a>
                    </div>

                </div>

            </div>
        </div>

    </div>

    <style>
        .alert-minimal {
            font-size: 13px;
            padding: 10px 14px;
            border-radius: 8px;
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
        .stat-card {
            background: #f9f9f8;
            border: 1px solid #e8e8e6;
            border-radius: 10px;
            padding: 16px;
            text-align: center;
        }
        .stat-icon-wrap {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 10px;
        }
        .stat-label {
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            color: #888;
            margin-bottom: 4px;
        }
        .stat-value {
            font-size: 26px;
            font-weight: 500;
            margin: 0;
            color: #1a1a1a;
        }
        .stat-link {
    text-decoration: none;
    display: block;
}
.stat-link:hover .stat-card {
    border-color: #c8c8c6;
    background: #f0f0ee;
    cursor: pointer;
    transition: background 0.15s, border-color 0.15s;
}
    </style>

</x-layout>