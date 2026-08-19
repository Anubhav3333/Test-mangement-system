<form method="POST" action="/login">
    @csrf
    <input type="email" name="email" value="{{ old('email') }}" required>
    <input type="password" name="password" required>
    <input type="checkbox" name="remember"> Remember Me
    <button type="submit">Log In</button>
</form>
