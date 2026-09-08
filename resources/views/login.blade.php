@extends('layouts.style')


<style>
    body {
        background: radial-gradient(circle at top left, rgba(59, 130, 246, 0.22), transparent 30%), radial-gradient(circle at bottom right, rgba(168, 85, 247, 0.22), transparent 28%), linear-gradient(135deg, #0f172a 0%, #111827 45%, #020617 100%);
    }
</style>
<form method="POST" action="/login">
    @csrf

    <h1 style="color: darkblue; ">Login Page</h1>

    <input type="email" name="email" value="{{ old('email') }}" placeholder="Email" required>
    @error('email')
    <p class="error">{{ $message }}</p>
    @enderror

    <input type="password" name="password" placeholder="Password" required>
    @error('password')
    <p class="error">{{ $message }}</p>
    @enderror

    <label class="d-flex align-items-center gap-2 my-2 mb-3"
        style="cursor: pointer;">
        <input type="checkbox" name="remember" class="form-check-input m-0">
        <span>Remember Me</span>
    </label>

    <p class="text-center mt-3 mb-3" style="color: wheat;">
        Don't have an account?
        <a href="{{ route('registration') }}"
            class="text-decoration-none fw-bold">
            Register
        </a>
    </p>

    <button type="submit" class="btn btn-primary w-100">
        Log In
    </button>

</form>

<style>
    .error {
        color: #dc2626;
        background-color: blue;
        font-size: 13px;
        margin: -10px 0 12px;
    }
</style>