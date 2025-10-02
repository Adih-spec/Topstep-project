<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
                <img src="https://preskool.dreamstechnologies.com/html/template/assets/img/authentication/authentication-01.jpg"
                class="img-fluid" alt="Logo">
        </x-slot>


        @if (session('status'))
            <div class="mb-4 alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <form action="{{ route($guard.'.login') }}" method="POST" class="needs-validation" novalidate>
            @csrf
            <div class="text-center mb-4">
                <!-- <img src="https://preskool.dreamstechnologies.com/html/template/assets/img/authentication/authentication-logo.svg"
                     class="img-fluid mb-3" alt="Logo" style="max-width:150px;"> -->
                <h2 class="mb-2">Admin</h2>
                <p class="text-muted">Please enter your details to sign in</p>
            </div>

            <!-- Social Login Buttons -->
            <div class="d-flex justify-content-center gap-2 mb-3">
                <x-social-login provider="facebook" />
                <x-social-login provider="google" />
                <x-social-login provider="apple" />
            </div>

            <div class="text-center my-3 position-relative">
                <span class="bg-white px-3 position-relative z-1">Or</span>
                <hr class="position-absolute top-50 start-0 end-0 z-0">
            </div>

            <x-validation-errors class="mb-4" />

            <!-- Email Field -->
            <div class="mb-3">
                <x-label for="email" :value="__('Email Address')" />
                <!-- Email Field -->
                <x-input
                    name="email"
                    type="email"
                    icon="ti ti-mail"
                    placeholder="Enter your email"
                    required
                    autocomplete="username"
                />
            </div>

            <!-- Password Field -->
            <div class="mb-3">
                <x-label for="password" :value="__('Password')" />
                <!-- Password Field -->
                <x-input
                    name="password"
                    type="password"
                    placeholder="Enter password"
                    required
                />
            </div>

            <!-- Remember Me & Forgot Password -->
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember_me">
                    <label class="form-check-label" for="remember_me">{{ __('Remember Me') }}</label>
                </div>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-danger">{{ __('Forgot your password?') }}</a>
                @endif
            </div>

            <!-- Sign In Button -->
            <div class="d-grid mb-3">
                <button type="submit" class="btn btn-primary">
                    {{ __('Sign in') }}
                </button>
            </div>

            <!-- Register Link -->
            <!-- <div class="text-center">
                <p class="mb-0">Don’t have an account?
                    <a href="{{ route('register') }}" class="text-decoration-none">Create Account</a>
                </p>
            </div> -->
            <!-- Register Link -->
            <div class="text-center">
                <p class="mb-0">Don’t have an account?
                    <a href="#" class="text-decoration-none">Create Account</a>
                </p>
            </div>

            <!-- Footer -->
            <div class="text-center mt-4 text-muted">
                <small>&copy; 2025 - {{ config('app.name') }}</small>
            </div>
        </form>
    </x-authentication-card>
    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.toggle-password').forEach(function(toggle) {
                toggle.addEventListener('click', function() {
                    const input = this.closest('.position-relative').querySelector('input');
                    const icon = this.querySelector('i');
                    if (input.type === 'password') {
                        input.type = 'text';
                        icon.classList.replace('ti-eye-off', 'ti-eye');
                    } else {
                        input.type = 'password';
                        icon.classList.replace('ti-eye', 'ti-eye-off');
                    }
                });
            });
        });
    </script>
    @endpush
</x-guest-layout>
