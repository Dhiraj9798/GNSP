<?php require_once 'includes/header.php'; ?>

<section class="student-auth-page" aria-label="Student login and registration">
    <div class="container">
        <div class="auth-container active" id="studentAuthContainer">
            <div class="form-box login">
                <form action="#">
                    <h1>Login</h1>
                    <div class="input-box">
                        <input type="text" placeholder="Username" required>
                        <i class='bx bxs-user'></i>
                    </div>
                    <div class="input-box">
                        <input type="password" placeholder="Password" required>
                        <i class='bx bxs-lock-alt'></i>
                    </div>
                    <div class="forgot-link">
                        <a href="contact.php">Forgot Password?</a>
                    </div>
                    <button type="submit" class="btn">Login</button>

                    <div class="social-icons">
                        <a href="#" class="google" data-tooltip="Google"><i class='bx bxl-google'></i></a>
                        <a href="#" class="facebook" data-tooltip="Facebook"><i class='bx bxl-facebook'></i></a>
                        <a href="#" class="github" data-tooltip="GitHub"><i class='bx bxl-github'></i></a>
                        <a href="#" class="linkedin" data-tooltip="LinkedIn"><i class='bx bxl-linkedin'></i></a>
                    </div>
                </form>
            </div>

            <div class="form-box register">
                <form action="#">
                    <h1>Registration</h1>
                    <div class="input-box">
                        <input type="text" placeholder="Username" required>
                        <i class='bx bxs-user'></i>
                    </div>
                    <div class="input-box">
                        <input type="email" placeholder="Email" required>
                        <i class='bx bxs-envelope'></i>
                    </div>
                    <div class="input-box">
                        <input type="password" placeholder="Password" required>
                        <i class='bx bxs-lock-alt'></i>
                    </div>
                    <button type="submit" class="btn">Register</button>

                    <div class="social-icons">
                        <a href="#" class="google" data-tooltip="Google"><i class='bx bxl-google'></i></a>
                        <a href="#" class="facebook" data-tooltip="Facebook"><i class='bx bxl-facebook'></i></a>
                        <a href="#" class="github" data-tooltip="GitHub"><i class='bx bxl-github'></i></a>
                        <a href="#" class="linkedin" data-tooltip="LinkedIn"><i class='bx bxl-linkedin'></i></a>
                    </div>
                </form>
            </div>

            <div class="toggle-box">
                <div class="toggle-panel toggle-left">
                    <h1>Hello, Welcome!</h1>
                    <p>Don't have an account?</p>
                    <a class="btn register-btn" href="registration.php">Register</a>
                </div>

                <div class="toggle-panel toggle-right">
                    <h1>Welcome Back!</h1>
                    <p>Already have an account?</p>
                    <a class="btn login-btn" href="login.php">Login</a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once 'includes/footer.php'; ?>

