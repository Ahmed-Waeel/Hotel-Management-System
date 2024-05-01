<x-layouts::dashboard.auth title="Login to your account">
    <x-components::status />

    <form class="card card-md" action="{{ route('dashboard.login.store') }}" method="POST">
        @csrf

        <div class="card-body">
            <div class="text-center mb-4">
                <h2 class="h2 mb-2">
                    Login to your account
                </h2>

                <p class="text-muted">
                    Forgot your password?
                    <a href="{{ route('dashboard.password.request') }}">Reset password</a>
                </p>
            </div>

            <div class="mb-3">
                <label class="form-label">Email address</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="your@email.com" required />

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <div class="input-group input-group-flat password-toggler">
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required />

                    <button type="button" class="input-group-text" tabindex="-1">
                        <i class="fas fa-eye"></i>
                    </button>
                </div>

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-2">
                <label class="form-check">
                    <input type="checkbox" class="form-check-input" name="remember">
                    <span class="form-check-label">Remember me on this device</span>
                </label>
            </div>

            <div class="form-footer">
                <button type="submit" class="btn btn-primary w-100">Sign in</button>
            </div>
        </div>
    </form>
</x-layouts::dashboard.auth>
