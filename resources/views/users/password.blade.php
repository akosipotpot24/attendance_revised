<x-layout>

<div class="container mt-4" style="max-width: 480px;">
    <div class="card border-0 shadow-sm rounded-3">
        <div class="card-body p-4">

            {{-- Header --}}
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h5 class="mb-0 fw-500">Reset your password</h5>
                    <small class="text-muted">Enter your current and new password below.</small>
                </div>
                <a href="/welcome" class="btn btn-sm btn-light border">← Back</a>
            </div>

            <form action="/password/reset" method="POST">
                @csrf
                @method('PATCH')

                {{-- Current Password --}}
                <div class="mb-3">
                    <label class="form-label text-muted" style="font-size:11px; text-transform:uppercase; letter-spacing:0.06em;">
                        Current Password
                    </label>
                    <input type="password"
                        class="form-control form-control-sm @error('current_password') is-invalid @enderror"
                        name="current_password" required />
                    @error('current_password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- New Password --}}
                <div class="mb-3">
                    <label class="form-label text-muted" style="font-size:11px; text-transform:uppercase; letter-spacing:0.06em;">
                        New Password
                    </label>
                    <div class="position-relative">
                        <input type="password"
                            class="form-control form-control-sm @error('password') is-invalid @enderror"
                            id="password" name="password" required />
                        {{-- <button type="button"
                            class="btn btn-sm position-absolute top-50 end-0 translate-middle-y me-1 p-0 border-0 bg-transparent text-muted"
                            onclick="togglePassword('password', this)">
                            <i class="fa-regular fa-eye"></i>
                        </button> --}}
                    </div>
                    @error('password')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Confirm Password --}}
                <div class="mb-4">
                    <label class="form-label text-muted" style="font-size:11px; text-transform:uppercase; letter-spacing:0.06em;">
                        Confirm New Password
                    </label>
                    <div class="position-relative">
                        <input type="password"
                            class="form-control form-control-sm @error('password_confirmation') is-invalid @enderror"
                            id="password_confirmation" name="password_confirmation" required />
                        {{-- <button type="button"
                            class="btn btn-sm position-absolute top-50 end-0 translate-middle-y me-1 p-0 border-0 bg-transparent text-muted"
                            onclick="togglePassword('password_confirmation', this)">
                            <i class="fa-regular fa-eye"></i>
                        </button> --}}
                    </div>
                    @error('password_confirmation')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Success --}}
                @if (session('success'))
                    <div class="alert alert-success py-2 mb-3" style="font-size:13px;">
                        {{ session('success') }}
                    </div>
                @endif

                {{-- Error --}}
                @if (session('error'))
                    <div class="alert alert-danger py-2 mb-3" style="font-size:13px;">
                        {{ session('error') }}
                    </div>
                @endif

                <hr style="border-color: #e8e8e6;">

                {{-- Actions --}}
                <div class="d-flex justify-content-end">
                    <a href="/welcome" class="btn btn-sm btn-light border me-2">Cancel</a>
                    <button type="submit" class="btn btn-sm btn-dark">Update Password</button>
                </div>

            </form>
        </div>
    </div>
</div>

<script>
function togglePassword(fieldId, btn) {
    const input = document.getElementById(fieldId);
    const isHidden = input.type === 'password';
    input.type = isHidden ? 'text' : 'password';
    btn.innerHTML = isHidden
        ? '<i class="fa-regular fa-eye-slash"></i>'
        : '<i class="fa-regular fa-eye"></i>';
}
</script>

</x-layout>`