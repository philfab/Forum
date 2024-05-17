<div class="container">
    <div class="register-box">
        <h2>Login</h2>
        <form action="index.php?ctrl=security&action=login" method="POST">
            <div class="form-group">
                <label for="userName">User name</label>
                <input type="text" id="userName" name="userName" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <button type="submit">Login</button>
            </div>
        </form>
        <p>Not yet registered ? <a href="index.php?ctrl=security&action=register">Register</a></p>
    </div>
</div>