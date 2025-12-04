<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bali Fantastic - Agency Visa Terpercaya Indonesia</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/landing/main.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <nav class="navbar" id="navbar">
        <div class="logo">Bali Fantastic</div>
        <ul class="nav-menu" id="navMenu">
            <li><a href="#home">Home</a></li>
            <li><a href="persyaratan">Persyaratan</a></li>
            <li><a href="#proses">Proses</a></li>
            <li><a href="#testimoni">Testimoni</a></li>
            <li><a href="#kontak" class="cta-button">Konsultasi Gratis</a></li>
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
            <a href="https://wa.me/62" class="btn-primary">WhatsApp Kami</a>
            <a href="mailto:info@Bali Fantastic.id" class="btn-secondary">Email Kami</a>
        </div>
    </section>

    <footer class="footer">
        <div class="footer-content">
            <div class="footer-section footer-about">
                <h2 class="footer-logo">Bali Fantastic</h2>
                <p class="footer-tagline">Kamu eksplore dunia, kami yang urus visa</p>
                <p class="footer-details">
                    PT Visa Jaya Abadi (Bali Fantastic) adalah perusahaan penyedia jasa dokumen perjalanan (Kode KBLI
                    73864)
                    yang terdaftar secara resmi di Indonesia dengan Nomor Induk Berusaha (NIB) 12038737478.
                </p>
                <p class="footer-details">
                    Bali Fantastic berlokasi di Menara Caraka Lantai 9, Unit 936, Jl. Mega Kuningan Barat, Kuningan
                    Timur,
                    Setiabudi, Jakarta Selatan, DKI Jakarta 12950
                </p>
            </div>

            <div class="footer-section footer-links">
                <h3>Layanan</h3>
                <a href="#">Katalog</a>
                <a href="#">Asuransi perjalanan</a>
                <a href="#">Legalisir dokumen</a>
                <a href="#">Untuk perusahaan (B2B)</a>
            </div>

            <div class="footer-section footer-links">
                <h3>Perusahaan</h3>
                <a href="#">Tentang kami</a>
                <a href="#">Ketentuan Layanan</a>
            </div>

            <div class="footer-section footer-contact">
                <h3>Kontak</h3>
                <p>PT Visa Trans Benua</p>
                <p>E-mail: hello@balifantastic.id</p>
                <p>Whatsapp: +6281188090025</p>
                <p>Instagram: balifantastic.id</p>
                <p>Tiktok: balifantastic.id</p>
            </div>
        </div>

        <div class="footer-bottom">
            <hr class="footer-hr">
            <div class="social-links">
                <a href="#" class="social-link" title="Instagram">
                    <img src="assets/logo-sosmed/ig.svg" alt="Instagram">
                </a>
                <a href="#" class="social-link" title="WhatsApp">
                    <img src="assets/logo-sosmed/wa.svg" alt="WhatsApp">
                </a>
                <a href="#" class="social-link" title="Facebook">
                    <img src="assets/logo-sosmed/facebook.svg" alt="Facebook">
                </a>
                <a href="#" class="social-link" title="Email">
                    <img src="assets/logo-sosmed/tiktok.svg" alt="Email">
                </a>
                <a href="#" class="social-link" title="TikTok">
                    <img src="assets/logo-sosmed/email.svg" alt="TikTok">
                </a>
            </div>
            <p class="copyright">
                © 2025 - Bali Fantastic Indonesia — PT Visa Trans Benua. All Rights Reserved.
            </p>
        </div>
    </footer>

    <script>
        // JS untuk Katalog Layanan Interaktif
        document.addEventListener('DOMContentLoaded', function() {
            const menuItems = document.querySelectorAll('.menu-item');
            const detailContents = document.querySelectorAll('.detail-content');

            menuItems.forEach(item => {
                item.addEventListener('click', function() {
                    // 1. Hapus kelas 'active' dari semua menu
                    menuItems.forEach(i => i.classList.remove('active'));
                    // 2. Tambahkan kelas 'active' ke menu yang diklik
                    this.classList.add('active');

                    const targetId = this.getAttribute('data-target');

                    // 3. Sembunyikan semua detail konten
                    detailContents.forEach(content => content.classList.remove('active'));

                    // 4. Tampilkan detail konten yang sesuai
                    const targetDetail = document.getElementById(targetId);
                    if (targetDetail) {
                        targetDetail.classList.add('active');
                    }
                });
            });
        });
        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // Hamburger menu
        const hamburger = document.getElementById('hamburger');
        const navMenu = document.getElementById('navMenu');

        hamburger.addEventListener('click', function() {
            navMenu.classList.toggle('active');
        });

        // Close menu when clicking on a link
        document.querySelectorAll('.nav-menu a').forEach(link => {
            link.addEventListener('click', function() {
                navMenu.classList.remove('active');
            });
        });

        // Smooth scrolling
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Animasi "Cara Kerja Kami" saat di-scroll
        const steps = document.querySelectorAll('.process .step');

        const observerOptions = {
            root: null, // Menggunakan viewport sebagai acuan
            threshold: 0.1 // Muncul saat 10% bagian terlihat
        };

        const stepObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                // Saat elemen masuk ke layar
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible'); // Tambahkan class .visible
                    observer.unobserve(entry.target); // Hentikan pengamatan (animasi sekali saja)
                }
            });
        }, observerOptions);

        // Amati setiap elemen .step
        steps.forEach(step => {
            stepObserver.observe(step);

        });
    </script>
</body>

</html>