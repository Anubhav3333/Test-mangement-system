@extends('layouts.ragisterCss')


<div class="page">
    <div class="background-shape shape-1"></div>
    <div class="background-shape shape-2"></div>

    <div class="login-card">
        <div class="card-header">
            <span class="card-badge">Welcome</span>
            <h1>Register</h1>
            <p>Create your account to continue to your dashboard.</p>
        </div>

        <form action="{{ route('register.store') }}" method="POST">
            @csrf

            <div class="input-group">
                <label for="name">Name</label>
                <div class="input-wrapper">
                    <span class="input-icon">👤</span>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        placeholder="Enter your name"
                        value="{{ old('name') }}"
                        autocomplete="name"
                        required>
                </div>
                @error('name')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <div class="input-group">
                <label for="email">Email Address</label>
                <div class="input-wrapper">
                    <span class="input-icon">✉</span>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        placeholder="you@example.com"
                        value="{{ old('email') }}"
                        autocomplete="email"
                        required>
                </div>
                @error('email')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <div class="input-group">
                <label for="password">Password</label>
                <div class="input-wrapper">
                    <span class="input-icon">🔒</span>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Enter your password"
                        autocomplete="new-password"
                        required>
                    <button
                        class="toggle-password"
                        id="togglePassword"
                        type="button"
                        aria-label="Show or hide password">
                        Show
                    </button>
                </div>
                @error('password')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <div class="input-group">
                <label for="password_confirmation">Confirm Password</label>
                <div class="input-wrapper">
                    <span class="input-icon">🔒</span>
                    <input
                        type="password"
                        id="password_confirmation"
                        name="password_confirmation"
                        placeholder="Confirm your password"
                        autocomplete="new-password"
                        required>
                    <button
                        class="toggle-password"
                        id="toggleConfirmPassword"
                        type="button"
                        aria-label="Show or hide password">
                        Show
                    </button>
                </div>
            </div>

            <div class="input-group">
                <label for="role">Role</label>
                <select id="role" name="role" required>
                    <option value="student" {{ old('role') == 'student' ? 'selected' : '' }}>Student</option>
                    <option value="teacher" {{ old('role') == 'teacher' ? 'selected' : '' }}>Teacher</option>
                </select>
                @error('role')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <button class="submit-btn" type="submit">Register</button>
        </form>

        <div class="card-footer">
            <p>
                Have an account?
                <a href="{{ route('login') }}">Login now</a>
            </p>
        </div>
    </div>
</div>

