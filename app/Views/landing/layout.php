<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bali Fantastic - Agency Visa Terpercaya Indonesia</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/landing/main.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
    /* Overlay Gelap */
    .sidebar-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        /* Z-INDEX TINGGI: Harus > 1000 (Navbar main.css pakai 1000) */
        z-index: 2000;
        display: none;
        opacity: 0;
        transition: opacity 0.3s;
    }

    .sidebar-overlay.active {
        display: block;
        opacity: 1;
    }

    /* Sidebar Container */
    .profile-sidebar {
        position: fixed;
        top: 0;
        right: -450px;
        width: 400px;
        height: 100vh;
        background: #ffffff;
        /* Pastikan solid white */
        /* Z-INDEX TINGGI: Di atas overlay */
        z-index: 2001;
        box-shadow: -5px 0 15px rgba(0, 0, 0, 0.1);
        transition: right 0.4s cubic-bezier(0.77, 0, 0.175, 1);

        /* [NEW] Flexbox untuk Layout Header - Body - Footer (Logout) */
        display: flex;
        flex-direction: column;
    }

    .profile-sidebar.active {
        right: 0;
    }

    .sidebar-loader {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100%;
        font-size: 1.2rem;
        color: #666;
    }

    @media (max-width: 480px) {
        .profile-sidebar {
            width: 100%;
            right: -100%;
        }
    }
    </style>
</head>

<body>
    <nav class="navbar" id="navbar">
        <div class="logo">Bali Fantastic</div>
        <ul class="nav-menu" id="navMenu">
            <li><a href="/">Home</a></li>

            <li><a href="/#layanan">Layanan</a></li>

            <li><a href="persyaratan">Persyaratan</a></li>

            <?php if (session()->get('isLoggedIn')): ?>
            <li><a href="javascript:void(0)" onclick="openProfileSidebar()" style="color: #2563eb; font-weight: bold;">
                    <i class="fa-solid fa-user-circle"></i> Profil Saya
                </a></li>
            <?php else: ?>
            <li><a href="<?= base_url('login?tujuan=landing') ?>">Cek Status</a></li>
            <?php endif; ?>

            <li><a href="<?= base_url('booking') ?>" class="cta-button">Apply Visa</a></li>
        </ul>
        <div class="hamburger" id="hamburger">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </nav>

    <?= $this->renderSection('content') ?>

    <section class="cta-section" id="kontak">
        <h2>Siap Urus Visa Anda?</h2>
        <p>Hubungi kami sekarang untuk konsultasi gratis dan dapatkan visa impian Anda!</p>
        <div class="hero-buttons">
            <a href="https://wa.me/6281188090025" class="btn-primary">WhatsApp Kami</a>
            <a href="mailto:hello@balifantastic.id" class="btn-secondary">Email Kami</a>
        </div>
    </section>

    <div class="sidebar-overlay" id="sidebarOverlay" onclick="closeProfileSidebar()"></div>
    <div class="profile-sidebar" id="profileSidebar">
        <div class="sidebar-loader">
            <i class="fa-solid fa-circle-notch fa-spin"></i> &nbsp; Memuat Data Profil...
        </div>
    </div>

    <footer class="footer">
        <div class="footer-bottom">
            <p class="copyright">© 2025 - Bali Fantastic Indonesia. All Rights Reserved.</p>
        </div>
    </footer>

    <script>
    // ... (Script Navbar scroll & Hamburger menu lama Bos tetap disini) ...

    // [JONO ADDITION] SCRIPT LOGIKA SIDEBAR
    const sidebar = document.getElementById('profileSidebar');
    const overlay = document.getElementById('sidebarOverlay');

    function openProfileSidebar() {
        // 1. Tampilkan Sidebar & Overlay
        sidebar.classList.add('active');
        overlay.classList.add('active');

        // 2. Panggil Data via AJAX
        fetch('<?= base_url('myprofile/fetch') ?>')
            .then(response => response.text())
            .then(html => {
                // Masukkan HTML yang didapat dari Controller ke dalam Sidebar
                sidebar.innerHTML = html;
            })
            .catch(error => {
                sidebar.innerHTML =
                    '<div style="padding:20px; text-align:center; color:red;">Gagal memuat data. Periksa koneksi internet.</div>';
                console.error('Error:', error);
            });
    }

    function closeProfileSidebar() {
        sidebar.classList.remove('active');
        overlay.classList.remove('active');
        // Reset loader saat ditutup agar saat buka lagi terlihat loading
        setTimeout(() => {
            sidebar.innerHTML =
                '<div class="sidebar-loader"><i class="fa-solid fa-circle-notch fa-spin"></i> &nbsp; Memuat Data Profil...</div>';
        }, 400);
    }

    // Script Navbar Scroll Effect (Dari file lama Bos)
    window.addEventListener('scroll', function() {
        const navbar = document.getElementById('navbar');
        if (window.scrollY > 50) navbar.classList.add('scrolled');
        else navbar.classList.remove('scrolled');
    });

    // Script Hamburger (Dari file lama Bos)
    const hamburger = document.getElementById('hamburger');
    const navMenu = document.getElementById('navMenu');
    if (hamburger) {
        hamburger.addEventListener('click', function() {
            navMenu.classList.toggle('active');
        });
    }
    </script>
    <script>
    function switchTab(tabId, btnElement) {
        // 1. Ambil konteks sidebar (karena ID mungkin duplikat jika load ulang, kita cari dalam sidebar aktif)
        const sidebar = document.getElementById('profileSidebar');

        // 2. Sembunyikan semua tab content
        sidebar.querySelectorAll('.tab-content').forEach(el => el.classList.remove('active'));

        // 3. Matikan status active di semua tombol
        sidebar.querySelectorAll('.tab-btn').forEach(el => el.classList.remove('active'));

        // 4. Aktifkan tab dan tombol yang diklik
        const targetTab = sidebar.querySelector('#' + tabId);
        if (targetTab) targetTab.classList.add('active');

        if (btnElement) btnElement.classList.add('active');
    }
    </script>
    <script>
    // Script Animasi Scroll untuk Section Process
    document.addEventListener('DOMContentLoaded', function() {
        const steps = document.querySelectorAll('.step');

        // Cek apakah browser mendukung IntersectionObserver (Fitur modern)
        if ('IntersectionObserver' in window) {
            const observer = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                        observer.unobserve(entry.target); // Stop pantau setelah muncul
                    }
                });
            }, {
                threshold: 0.1 // Muncul saat 10% elemen terlihat
            });

            steps.forEach(step => {
                observer.observe(step);
            });
        } else {
            // Fallback untuk browser jadul: Langsung munculkan semua
            steps.forEach(step => {
                step.classList.add('visible');
            });
        }
    });
    </script>
</body>
<footer class="footer">
    <div class="footer-content">

        <div class="footer-section footer-about">
            <div class="footer-logo">Bali Fantastic</div>
            <p class="footer-tagline">Partner Visa Terpercaya Anda</p>
            <p class="footer-details">
                Solusi pengurusan visa Indonesia yang cepat, transparan, dan profesional. Nikmati perjalanan tanpa
                hambatan birokrasi bersama kami.
            </p>
            <div class="social-links">
                <a href="#" class="social-link"><i class="fa-brands fa-instagram"></i></a>
                <a href="#" class="social-link"><i class="fa-brands fa-facebook-f"></i></a>
                <a href="#" class="social-link"><i class="fa-brands fa-tiktok"></i></a>
                <a href="#" class="social-link"><i class="fa-brands fa-whatsapp"></i></a>
            </div>
        </div>

        <div class="footer-section footer-links">
            <h3>Menu Utama</h3>
            <a href="#home">Beranda</a>
            <a href="#layanan">Katalog Visa</a>
            <a href="#proses">Alur Proses</a>
            <a href="#testimoni">Testimoni Klien</a>
        </div>

        <div class="footer-section footer-links">
            <h3>Akses Member</h3>
            <a href="<?= base_url('login') ?>">Login / Cek Status</a>
            <a href="<?= base_url('register') ?>">Daftar Akun Baru</a>
            <a href="#">Syarat & Ketentuan</a>
            <a href="#">Kebijakan Privasi</a>
        </div>

        <div class="footer-section footer-contact">
            <h3>Hubungi Kami</h3>
            <p><i class="fa-solid fa-location-dot"></i> &nbsp; Jl. Sunset Road No. 88, Kuta, Bali</p>
            <p><i class="fa-solid fa-phone"></i> &nbsp; +62 811-8809-0025</p>
            <p><i class="fa-solid fa-envelope"></i> &nbsp; hello@balifantastic.id</p>
            <p><i class="fa-solid fa-clock"></i> &nbsp; Senin - Jumat, 09:00 - 17:00</p>
        </div>
    </div>

    <hr class="footer-hr">

    <div class="footer-bottom">
        <p class="copyright">© 2025 - Bali Fantastic Visas Indonesia. All Rights Reserved.</p>
    </div>
</footer>

</html>