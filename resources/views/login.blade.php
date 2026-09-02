@extends('layouts.style')

<form method="POST" action="/login">
    @csrf

    <h1>Login Page</h1>

    <input type="email" name="email" value="{{ old('email') }}" placeholder="Email" required>
    @error('email')
        <p class="error">{{ $message }}</p>
    @enderror

    <input type="password" name="password" placeholder="Password" required>
    @error('password')
        <p class="error">{{ $message }}</p>
    @enderror

    <label style="display: flex; align-items: center; gap: 8px; margin: 8px 0 16px; cursor: pointer;">
        <input type="checkbox" name="remember">
        Remember Me
    </label>

    <button type="submit">Log In</button>
</form>

<style>
    .error {
    color: #dc2626;
    font-size: 13px;
    margin: -10px 0 12px;
}
</style>