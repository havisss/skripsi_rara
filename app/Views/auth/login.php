<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login User - Bali Fantastic Visas</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <link rel="stylesheet" href="<?= base_url('assets/css/login-admin.css') ?>">
</head>

<body>
    <div class="login-container">
        <div class="login-left">
            <div class="login-content">
                <div class="login-header">
                    <span class="login-subtitle">BALI FANTASTIC VISAS</span>
                    <h1 class="login-title">Selamat Datang<span class="title-dot">.</span></h1>
                    <p class="login-description">Masuk untuk mengurus visa perjalanan Anda</p>
                </div>

                <form action="<?= base_url('/login/auth') ?>" method="POST" class="login-form" id="loginForm">

                    <?= csrf_field() ?>

                    <div class="form-group">
                        <label for="email" class="form-label">Email Address</label>
                        <div class="input-wrapper">
                            <i class="fas fa-envelope input-icon"></i>
                            <input type="email" id="email" name="email" class="form-input" placeholder="nama@email.com"
                                required autocomplete="email">
                        </div>
                        <span class="input-error" id="emailError"></span>
                    </div>

                    <div class="form-group">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-wrapper">
                            <i class="fas fa-lock input-icon"></i>
                            <input type="password" id="password" name="password" class="form-input"
                                placeholder="Masukkan password Anda" required autocomplete="current-password">
                            <button type="button" class="toggle-password" id="togglePassword">
                                <i class="fas fa-eye" id="eyeIcon"></i>
                            </button>
                        </div>
                        <span class="input-error" id="passwordError"></span>
                    </div>

                    <div class="form-options" style="justify-content: flex-end;">
                        <a href="<?= base_url('/register') ?>" class="forgot-link">
                            Belum punya akun? Daftar disini
                        </a>
                    </div>

                    <?php if (session()->getFlashdata('msg')): ?>
                    <div class="alert alert-error">
                        <i class="fas fa-exclamation-circle"></i>
                        <span><?= session()->getFlashdata('msg') ?></span>
                    </div>
                    <?php endif; ?>

                    <button type="submit" class="btn-login" id="btnLogin">
                        <span class="btn-text">Masuk Sekarang</span>
                        <i class="fas fa-arrow-right btn-icon"></i>
                    </button>
                </form>

                <div class="login-footer">
                    <p class="footer-text">
                        <i class="fas fa-shield-alt"></i>
                        Aman & Terpercaya oleh Bali Fantastic
                    </p>
                </div>
            </div>
        </div>

        <div class="login-right">
            <div class="login-bg-overlay"></div>
            <div class="login-bg-content">
                <h2 class="bg-title">Jelajahi Dunia Tanpa Batas</h2>
                <p class="bg-description">Layanan pengurusan visa profesional, cepat, dan transparan untuk perjalanan
                    impian Anda.</p>
            </div>
        </div>
    </div>

    <script>
    // 1. Fitur Lihat/Sembunyikan Password
    const togglePassword = document.getElementById('togglePassword');
    const passwordInput = document.getElementById('password');
    const eyeIcon = document.getElementById('eyeIcon');

    togglePassword.addEventListener('click', function() {
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);

        // Ubah ikon mata
        if (type === 'password') {
            eyeIcon.classList.remove('fa-eye-slash');
            eyeIcon.classList.add('fa-eye');
        } else {
            eyeIcon.classList.remove('fa-eye');
            eyeIcon.classList.add('fa-eye-slash');
        }
    });

    // 2. Validasi Sederhana di Sisi Klien
    const loginForm = document.getElementById('loginForm');
    const emailInput = document.getElementById('email');
    const emailError = document.getElementById('emailError');
    const passwordError = document.getElementById('passwordError');
    const btnLogin = document.getElementById('btnLogin');

    loginForm.addEventListener('submit', function(e) {
        let isValid = true;

        // Reset tampilan error
        emailError.textContent = '';
        passwordError.textContent = '';
        emailInput.classList.remove('input-invalid');
        passwordInput.classList.remove('input-invalid');

        // Validasi Email
        if (!emailInput.value.includes('@')) {
            emailError.textContent = 'Mohon masukkan email yang valid';
            emailInput.classList.add('input-invalid');
            isValid = false;
        }

        // Validasi Password Kosong
        if (passwordInput.value.length < 1) {
            passwordError.textContent = 'Password tidak boleh kosong';
            passwordInput.classList.add('input-invalid');
            isValid = false;
        }

        if (!isValid) {
            e.preventDefault(); // Batalkan pengiriman jika tidak valid
            return false;
        }

        // Efek Loading pada Tombol
        btnLogin.disabled = true;
        btnLogin.innerHTML =
            '<span class="btn-text">Memproses...</span><i class="fas fa-spinner fa-spin btn-icon"></i>';
    });

    // Hapus error saat mengetik
    emailInput.addEventListener('input', () => {
        emailInput.classList.remove('input-invalid');
        emailError.textContent = '';
    });
    passwordInput.addEventListener('input', () => {
        passwordInput.classList.remove('input-invalid');
        passwordError.textContent = '';
    });

    // Hilangkan alert error otomatis setelah 5 detik
    const alerts = document.querySelectorAll('.alert');
    alerts.forEach(alert => {
        setTimeout(() => {
            alert.style.transition = 'opacity 0.5s ease';
            alert.style.opacity = '0';
            setTimeout(() => alert.remove(), 500);
        }, 5000);
    });
    </script>
</body>

</html>