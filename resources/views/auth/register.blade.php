<!-- resources/views/auth/register.blade.php -->
<form method="POST" action="{{ route('register') }}">
    @csrf
    <div>
        <label for="username">Username</label>
        <input type="text" name="username" id="username" required autofocus>
    </div>
    <div>
        <label for="password">Password</label>
        <input type="password" name="password" id="password" required>
    </div>
    <button type="submit">Sign Up</button>
</form>
