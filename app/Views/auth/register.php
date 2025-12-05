<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun - Bali Fantastic Visas</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <link rel="stylesheet" href="<?= base_url('assets/css/login-admin.css') ?>">

    <style>
    /* Sedikit penyesuaian untuk list error bawaan CI4 agar rapi di dalam alert */
    .alert ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .alert li {
        margin-bottom: 4px;
    }

    .login-left::-webkit-scrollbar {
        display: none;
        /* Hilangkan scrollbar di Chrome/Safari/Edge */
    }

    .login-left {
        -ms-overflow-style: none;
        /* Hilangkan di IE/Edge lama */
        scrollbar-width: none;
        /* Hilangkan di Firefox */
    }
    </style>
</head>

<body>
    <div class="login-container">
        <div class="login-left">
            <div class="login-content">

                <div class="login-header">
                    <span class="login-subtitle">GABUNG BERSAMA KAMI</span>
                    <h1 class="login-title">Buat Akun Baru<span class="title-dot">.</span></h1>
                    <p class="login-description">Isi data diri Anda untuk memulai pengurusan visa dengan mudah.</p>
                </div>

                <form action="<?= base_url('/register/process') ?>" method="POST" class="login-form" id="registerForm">

                    <?= csrf_field() ?>

                    <?php if (isset($validation)): ?>
                    <div class="alert alert-error" style="display: flex; align-items: flex-start;">
                        <i class="fas fa-exclamation-triangle" style="margin-top: 4px;"></i>
                        <div style="margin-left: 10px; flex: 1;">
                            <?= $validation->listErrors() ?>
                        </div>
                    </div>
                    <?php endif; ?>

                    <div class="form-group">
                        <label for="full_name" class="form-label">Nama Lengkap</label>
                        <div class="input-wrapper">
                            <i class="fas fa-user input-icon"></i>
                            <input type="text" id="full_name" name="full_name" class="form-input"
                                placeholder="Sesuai KTP/Paspor" value="<?= set_value('full_name') ?>" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email" class="form-label">Email Address</label>
                        <div class="input-wrapper">
                            <i class="fas fa-envelope input-icon"></i>
                            <input type="email" id="email" name="email" class="form-input" placeholder="nama@email.com"
                                value="<?= set_value('email') ?>" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="phone_number" class="form-label">Nomor WhatsApp</label>
                        <div class="input-wrapper">
                            <i class="fa-brands fa-whatsapp input-icon"></i>
                            <input type="number" id="phone_number" name="phone_number" class="form-input"
                                placeholder="0812xxxx (Wajib aktif)" value="<?= set_value('phone_number') ?>" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-wrapper">
                            <i class="fas fa-lock input-icon"></i>
                            <input type="password" id="password" name="password" class="form-input"
                                placeholder="Minimal 6 karakter" required>
                            <button type="button" class="toggle-password" onclick="togglePass('password', 'eye1')">
                                <i class="fas fa-eye" id="eye1"></i>
                            </button>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="confpassword" class="form-label">Ulangi Password</label>
                        <div class="input-wrapper">
                            <i class="fas fa-shield-halved input-icon"></i>
                            <input type="password" id="confpassword" name="confpassword" class="form-input"
                                placeholder="Ketik ulang password" required>
                            <button type="button" class="toggle-password" onclick="togglePass('confpassword', 'eye2')">
                                <i class="fas fa-eye" id="eye2"></i>
                            </button>
                        </div>
                    </div>

                    <div class="form-options" style="justify-content: center; margin-top: 10px;">
                        <a href="<?= base_url('/login') ?>" class="forgot-link">
                            Sudah punya akun? <b>Login disini</b>
                        </a>
                    </div>

                    <button type="submit" class="btn-login" id="btnRegister">
                        <span class="btn-text">Daftar Sekarang</span>
                        <i class="fas fa-user-plus btn-icon"></i>
                    </button>
                </form>

                <div class="login-footer">
                    <p class="footer-text">© 2025 Bali Fantastic Visas</p>
                </div>
            </div>
        </div>

        <div class="login-right">
            <div class="login-bg-overlay"></div>
            <div class="login-bg-content">
                <div class="bg-pattern">
                    <i class="fas fa-id-card"></i>
                    <i class="fas fa-plane-up"></i>
                    <i class="fas fa-earth-americas"></i>
                </div>
                <h2 class="bg-title">Mulai Perjalanan Anda</h2>
                <p class="bg-description">Daftar sekarang untuk mendapatkan akses ke layanan visa prioritas, monitoring
                    status real-time, dan konsultasi gratis.</p>
            </div>
        </div>
    </div>

    <script>
    // FUNGSI TOGGLE PASSWORD (Bisa dipakai untuk banyak input)
    function togglePass(inputId, iconId) {
        const input = document.getElementById(inputId);
        const icon = document.getElementById(iconId);

        if (input.type === "password") {
            input.type = "text";
            icon.classList.remove("fa-eye");
            icon.classList.add("fa-eye-slash");
        } else {
            input.type = "password";
            icon.classList.remove("fa-eye-slash");
            icon.classList.add("fa-eye");
        }
    }

    // Animasi Loading saat Submit
    const form = document.getElementById('registerForm');
    const btn = document.getElementById('btnRegister');

    form.addEventListener('submit', function() {
        btn.disabled = true;
        btn.innerHTML =
            '<span class="btn-text">Mendaftarkan...</span><i class="fas fa-spinner fa-spin btn-icon"></i>';
    });

    // Hilangkan Alert Error Otomatis setelah 5 detik
    const alerts = document.querySelectorAll('.alert');
    if (alerts.length > 0) {
        setTimeout(() => {
            alerts.forEach(alert => {
                alert.style.transition = 'opacity 0.5s ease';
                alert.style.opacity = '0';
                setTimeout(() => alert.remove(), 500);
            });
        }, 8000); // 8 Detik (Agak lama biar sempat baca errornya)
    }
    </script>
</body>

</html>