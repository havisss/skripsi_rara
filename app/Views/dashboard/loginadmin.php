<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - VisaEase</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/css/login-admin.css') ?>">
</head>

<body>
    <div class="login-container">
        <!-- LEFT SIDE - LOGIN FORM -->
        <div class="login-left">
            <div class="login-content">
                <!-- Header Text -->
                <div class="login-header">
                    <span class="login-subtitle">ADMIN ACCESS</span>
                    <h1 class="login-title">Welcome Back<span class="title-dot">.</span></h1>
                    <p class="login-description">Login to manage visa applications</p>
                </div>

                <!-- Login Form -->
                <form action="<?= base_url('admin/auth') ?>" method="POST" class="login-form" id="loginForm">
                    <!-- CSRF Token (CI4) -->
                    <?= csrf_field() ?>

                    <!-- Email Input -->
                    <div class="form-group">
                        <label for="email" class="form-label">Email Address</label>
                        <div class="input-wrapper">
                            <i class="fas fa-envelope input-icon"></i>
                            <input type="email" id="email" name="email" class="form-input"
                                placeholder="admin@visaease.com" required autocomplete="email">
                        </div>
                        <span class="input-error" id="emailError"></span>
                    </div>

                    <!-- Password Input -->
                    <div class="form-group">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-wrapper">
                            <i class="fas fa-lock input-icon"></i>
                            <input type="password" id="password" name="password" class="form-input"
                                placeholder="Enter your password" required autocomplete="current-password">
                            <button type="button" class="toggle-password" id="togglePassword">
                                <i class="fas fa-eye" id="eyeIcon"></i>
                            </button>
                        </div>
                        <span class="input-error" id="passwordError"></span>
                    </div>

                    <!-- Remember Me & Forgot Password -->
                    <div class="form-options">
                        <label class="remember-checkbox">
                            <input type="checkbox" name="remember" id="remember">
                            <span class="checkbox-custom"></span>
                            <span class="checkbox-label">Remember me</span>
                        </label>
                        <a href="<?= base_url('admin/forgot-password') ?>" class="forgot-link">
                            Forgot Password?
                        </a>
                    </div>

                    <!-- Error Message (from backend) -->
                    <?php if (session()->getFlashdata('error')): ?>
                        <div class="alert alert-error">
                            <i class="fas fa-exclamation-circle"></i>
                            <span><?= session()->getFlashdata('error') ?></span>
                        </div>
                    <?php endif; ?>

                    <!-- Success Message (from backend) -->
                    <?php if (session()->getFlashdata('success')): ?>
                        <div class="alert alert-success">
                            <i class="fas fa-check-circle"></i>
                            <span><?= session()->getFlashdata('success') ?></span>
                        </div>
                    <?php endif; ?>

                    <!-- Submit Button -->
                    <button type="submit" class="btn-login" id="btnLogin">
                        <span class="btn-text">Login to Dashboard</span>
                        <i class="fas fa-arrow-right btn-icon"></i>
                    </button>
                </form>

                <!-- Footer -->
                <div class="login-footer">
                    <p class="footer-text">
                        <i class="fas fa-shield-alt"></i>
                        Secured by VisaEase Admin System
                    </p>
                </div>
            </div>
        </div>

        <!-- RIGHT SIDE - BACKGROUND IMAGE -->
        <div class="login-right">
            <!-- 
                GANTI IMAGE DI SINI:
                Taruh file image di: assets/img/login-bg.jpg
                Atau ganti path sesuai kebutuhan
            -->
            <div class="login-bg-overlay"></div>
            <div class="login-bg-content">
                <div class="bg-pattern">
                    <i class="fas fa-passport"></i>
                    <i class="fas fa-plane"></i>
                    <i class="fas fa-globe-asia"></i>
                </div>
                <h2 class="bg-title">Manage Visa Applications</h2>
                <p class="bg-description">Professional immigration services for Indonesia</p>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        // Toggle Password Visibility
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');
        const eyeIcon = document.getElementById('eyeIcon');

        togglePassword.addEventListener('click', function() {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);

            // Toggle eye icon
            if (type === 'password') {
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            } else {
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
            }
        });

        // Form Validation
        const loginForm = document.getElementById('loginForm');
        const emailInput = document.getElementById('email');
        const emailError = document.getElementById('emailError');
        const passwordError = document.getElementById('passwordError');
        const btnLogin = document.getElementById('btnLogin');

        loginForm.addEventListener('submit', function(e) {
            let isValid = true;

            // Reset errors
            emailError.textContent = '';
            passwordError.textContent = '';
            emailInput.classList.remove('input-invalid');
            passwordInput.classList.remove('input-invalid');

            // Validate email
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(emailInput.value)) {
                emailError.textContent = 'Please enter a valid email address';
                emailInput.classList.add('input-invalid');
                isValid = false;
            }

            // Validate password
            if (passwordInput.value.length < 6) {
                passwordError.textContent = 'Password must be at least 6 characters';
                passwordInput.classList.add('input-invalid');
                isValid = false;
            }

            if (!isValid) {
                e.preventDefault();
                return false;
            }

            // Show loading state
            btnLogin.disabled = true;
            btnLogin.innerHTML =
                '<span class="btn-text">Loading...</span><i class="fas fa-spinner fa-spin btn-icon"></i>';
        });

        // Clear error on input
        emailInput.addEventListener('input', function() {
            emailError.textContent = '';
            emailInput.classList.remove('input-invalid');
        });

        passwordInput.addEventListener('input', function() {
            passwordError.textContent = '';
            passwordInput.classList.remove('input-invalid');
        });

        // Auto-hide alerts after 5 seconds
        const alerts = document.querySelectorAll('.alert');
        alerts.forEach(alert => {
            setTimeout(() => {
                alert.style.opacity = '0';
                setTimeout(() => alert.remove(), 300);
            }, 5000);
        });
    </script>
</body>

</html>