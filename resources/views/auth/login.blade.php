@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="card p-4 shadow" style="min-width: 350px; max-width: 400px; width: 100%;">
        <h3 class="text-center mb-4">تسجيل الدخول</h3>

        <form id="login-form" 
              method="POST" 
              action="{{ route('login.post') }}"
              data-recaptcha-key="{{ config('services.recaptcha.key') }}">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label">البريد الإلكتروني</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                       value="{{ old('email') }}" required autofocus>
                @error('email')
                    <span class="text-danger small">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">كلمة المرور</label>
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                       required>
                @error('password')
                    <span class="text-danger small">{{ $message }}</span>
                @enderror
            </div>

            <input type="hidden" name="recaptcha_token" id="recaptcha_token">
            @error('recaptcha_token')
                <span class="text-danger small">{{ $message }}</span>
            @enderror

            <button type="submit" class="btn btn-primary w-100">تسجيل الدخول</button>
        </form>
    </div>
</div>

{{-- Load Google reCAPTCHA v3 --}}
<script src="https://www.google.com/recaptcha/api.js?render={{ config('services.recaptcha.key') }}"></script>

{{-- Load your bundled JavaScript --}}
@vite('resources/js/app.js')
@endsection
