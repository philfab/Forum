<div class="container">
    <div class="register-box">
        <h2>Register</h2>
        <form id="registerForm" action="index.php?ctrl=security&action=register" method="POST">
            <div class="form-group">
                <label for="userName">User name</label>
                <input type="text" id="userName" name="userName" required>
            </div>
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="confirmPassword">Confirm Password</label>
                <input type="password" id="confirmPassword" name="confirmPassword" required>
            </div>
            <div class="form-group">
                <button type="submit">Register</button>
            </div>
        </form>
        <p>Have an account? <a href="index.php?ctrl=security&action=login">Login</a></p>
    </div>
</div>

<!--verification des deux mdp -->
<script>
    document.getElementById("registerForm").addEventListener("submit", function(event) {
        var password = document.getElementById("password").value;
        var confirmPassword = document.getElementById("confirmPassword").value;
        if (password !== confirmPassword) {
            alert("Passwords do not match!");
            event.preventDefault();
        }
    });
</script>