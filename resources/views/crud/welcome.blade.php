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
    </style>

</x-layout>