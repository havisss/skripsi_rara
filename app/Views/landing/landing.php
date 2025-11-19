<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bali Fantastic - Agency Visa Terpercaya Indonesia</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
        }

        /* Navbar Mengambang */
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            padding: 20px 5%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            z-index: 1000;
            transition: all 0.3s ease;
            background: transparent;
        }

        .navbar.scrolled {
            background: rgba(255, 255, 255, 0.78);
            padding: 15px 5%;
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.1);
        }

        .logo {
            font-size: 28px;
            font-weight: bold;
            color: #fff;
            transition: color 0.3s ease;
        }

        .navbar.scrolled .logo {
            color: #2563eb;
        }

        .nav-menu {
            display: flex;
            list-style: none;
            gap: 35px;
            align-items: center;
        }

        .nav-menu a {
            text-decoration: none;
            color: #fff;
            font-weight: 500;
            transition: all 0.3s ease;
            font-size: 15px;
        }

        .navbar.scrolled .nav-menu a {
            color: #333;
        }

        .nav-menu a:hover {
            color: #fbbf24;
        }

        .cta-button {
            background: #fbbf24;
            color: #333;
            padding: 10px 25px;
            border-radius: 25px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .cta-button:hover {
            background: #f59e0b;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(251, 191, 36, 0.4);
        }

        /* Hero Section */
        .hero {
            background-image: url('assets/bg1.jpg');
            padding: 150px 5% 100px;
            text-align: center;
            color: #fff;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-repeat: no-repeat;
            /* Ini agar gambar tidak berulang */
            background-attachment: fixed;
            /* Ini agar gambar "tetap" di tempat saat scroll */
            background-size: cover;
            /* Ini agar gambar menutupi seluruh area */
            background-position: center;
        }

        .hero-content {
            max-width: 800px;
        }

        .hero h1 {
            font-size: 52px;
            margin-bottom: 20px;
            line-height: 1.2;
        }

        .hero p {
            font-size: 20px;
            margin-bottom: 40px;
            opacity: 0.95;
        }

        .hero-buttons {
            display: flex;
            gap: 20px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn-primary {
            background: #fbbf24;
            color: #333;
            padding: 15px 40px;
            border-radius: 30px;
            text-decoration: none;
            font-weight: 600;
            display: inline-block;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background: #f59e0b;
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(251, 191, 36, 0.4);
        }

        .btn-secondary {
            background: transparent;
            color: #fff;
            padding: 15px 40px;
            border: 2px solid #fff;
            border-radius: 30px;
            text-decoration: none;
            font-weight: 600;
            display: inline-block;
            transition: all 0.3s ease;
        }

        .btn-secondary:hover {
            background: #fff;
            color: #2563eb;
        }

        /* Services Section */
        .services {
            padding: 100px 5%;
            background: #f8fafc;
        }

        .section-title {
            text-align: center;
            margin-bottom: 60px;
        }

        .section-title h2 {
            font-size: 42px;
            color: #1e293b;
            margin-bottom: 15px;
        }

        .section-title p {
            font-size: 18px;
            color: #64748b;
        }

        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .service-card {
            position: relative;
            border-radius: 15px;
            overflow: hidden;
            /* Penting untuk menjaga gambar tetap di dalam border radius */
            background-size: cover;
            background-position: center;
            min-height: 280px;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            color: #fff;
            background-size: cover;
            background-position: center;
            /* Teks default jadi putih */
        }

        .service-card:hover {
            transform: translateY(-5px) scale(1.02);
            /* Efek hover yang lebih modern */
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }

        /* CSS Baru untuk Kartu Destinasi */
        .destination-flag {
            position: absolute;
            top: 20px;
            left: 20px;
            width: 40px;
            /* Sesuaikan ukuran bendera jika perlu */
            height: auto;
            border-radius: 4px;
            border: 1px solid rgba(255, 255, 255, 0.3);
            /* Garis tipis di sekitar bendera */
        }

        .destination-content {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 20px;
            /* Efek gradien hitam di bawafffh agar teks terbaca */
            background: linear-gradient(to top, rgba(0, 0, 0, 0.85) 30%, rgba(0, 0, 0, 0) 100%);
        }

        .destination-content h3 {
            font-size: 18px;
            font-weight: 600;
            color: #fff;
            margin-bottom: 12px;
            line-height: 1.3;
        }

        .destination-button {
            background: #222;
            /* Latar belakang tombol gelap seperti di gambar */
            color: #fff;
            padding: 8px 20px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: 500;
            font-size: 14px;
            display: inline-block;
            transition: all 0.3s ease;
            border: 1px solid #444;
            /* Border tombol */
        }

        .destination-button:hover {
            background: #fff;
            /* Efek hover tombol */
            color: #111;
            transform: translateY(-2px);
        }

        /* Benefits Section */
        /* --- Benefits Section (Layout Baru) --- */

        .benefits {
            background: #f0f7ff;
            /* Latar belakang biru muda untuk seluruh section */
            padding: 100px 5%;
        }

        .benefits-layout-grid {
            max-width: 1200px;
            margin: 0 auto;
            background: #fff;
            /* Latar belakang kartu utama putih */
            border-radius: 20px;
            box-shadow: 0 20px 50px rgba(0, 80, 170, 0.08);
            display: grid;
            grid-template-columns: 1fr 1fr;
            /* 2 kolom */
            gap: 50px;
            /* Jarak antar kolom */
            padding: 50px;
            align-items: center;
        }

        .benefits-list {
            display: grid;
            grid-template-columns: 1fr;
            /* Daftar keunggulan tersusun vertikal */
            gap: 20px;
            /* Jarak antar item */
        }

        /* Kartu item keuntungan baru */
        .benefit-item {
            display: flex;
            /* Ikon di kiri, teks di kanan */
            align-items: flex-start;
            gap: 20px;
            background: #f8fafc;
            /* Latar belakang item sedikit abu-abu */
            border: 1px solid #eef2f7;
            padding: 25px;
            border-radius: 15px;
            transition: all 0.3s ease;
        }

        .benefit-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(37, 99, 235, 0.1);
        }

        /* Ikon Font Awesome */
        .benefit-icon {
            background: #e0eaff;
            /* Latar belakang ikon biru muda */
            color: #2563eb;
            /* Warna ikon biru tua */
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            flex-shrink: 0;
            /* Mencegah ikon mengecil */
            font-size: 22px;
            /* Ukuran ikon */
        }

        /* Konten teks (Judul & Paragraf) */
        .benefit-content h3 {
            font-size: 18px;
            color: #1e293b;
            margin-bottom: 5px;
            font-weight: 600;
        }

        .benefit-content p {
            font-size: 15px;
            color: #64748b;
            line-height: 1.6;
        }

        /* Kolom gambar di kanan */
        .benefits-right-column img {
            width: 100%;
            height: auto;

        }


        /* Responsive untuk Tablet & HP */
        @media (max-width: 992px) {
            .benefits-layout-grid {
                grid-template-columns: 1fr;
                /* Susun jadi 1 kolom */
                gap: 40px;
            }
        }

        @media (max-width: 768px) {
            .benefits-layout-grid {
                padding: 30px 25px;
            }
        }

        /* Process Section */
        /* Process Section (Layout Lurus Baru) */
        .process {
            padding: 100px 5%;
            background: #fff;
            /* Latar belakang putih bersih */
        }

        .process-steps {
            display: grid;
            /* 4 kolom lurus */
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            /* Jarak antar kolom */
            max-width: 1200px;
            margin: 0 auto;
        }

        .step {
            position: relative;
            text-align: center;
            /* Teks dan ikon jadi di tengah */

            /* Animasi (dari JS lama Anda) */
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.6s ease-out, transform 0.6s ease-out;
        }

        /* Ikon bulat merah */
        .step-icon-timeline {
            width: 70px;
            height: 70px;
            background: #e63946;
            /* Warna merah (sesuaikan jika perlu) */
            color: #fff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            font-weight: bold;
            margin: 0 auto 20px;
            /* Otomatis ke tengah dan beri jarak ke bawah */
            box-shadow: 0 5px 15px rgba(230, 57, 70, 0.3);
        }

        /* Garis putus-putus antar langkah */
        .step:not(:last-child)::after {
            content: '';
            position: absolute;
            /* Taruh di tengah-tengah ikon secara vertikal */
            top: 35px;
            transform: translateY(-50%);
            /* Mulai dari ujung kanan elemen, dan lebarnya adalah gap */
            left: calc(100% + 10px);
            /* 100% + setengah gap */
            width: calc(100% - 20px);
            /* Lebar garis (eksperimen) - ini mungkin perlu disesuaikan */

            /* -- Cara lebih mudah untuk garis -- */
            left: 50%;
            width: calc(100% + 20px);
            /* Lebar step + gap */

            height: 2px;
            background-image: linear-gradient(to right, #ccc 50%, transparent 50%);
            background-size: 10px 2px;
            background-repeat: repeat-x;
            z-index: -1;
            /* Di belakang ikon */
        }


        .step-content {
            padding: 0 10px;
            /* Beri sedikit padding agar teks tidak menempel */
        }

        .step h3 {
            font-size: 18px;
            margin-bottom: 10px;
            color: #1e293b;
            font-weight: 600;
            /* Dibuat tebal agar mirip gambar */
        }

        .step p {
            color: #64748b;
            font-size: 14px;
            line-height: 1.6;
        }

        /* Jeda animasi (dari JS lama Anda) */
        .step:nth-child(1) {
            transition-delay: 0.1s;
        }

        .step:nth-child(2) {
            transition-delay: 0.2s;
        }

        .step:nth-child(3) {
            transition-delay: 0.3s;
        }

        .step:nth-child(4) {
            transition-delay: 0.4s;
        }

        /* Status 'visible' (dari JS lama Anda) */
        .step.visible {
            opacity: 1;
            transform: translateY(0);
            /* Kembali ke posisi semula */
        }

        /* Responsive untuk HP */
        @media (max-width: 768px) {
            .process-steps {
                grid-template-columns: 1fr;
                /* Susun vertikal di HP */
                gap: 40px;
                /* Jarak lebih besar saat vertikal */
            }

            /* Sembunyikan garis putus-putus di HP */
            .step:not(:last-child)::after {
                display: none;
            }
        }

        /* Testimonials Section */
        .testimonials {
            padding: 100px 5%;
            background: #fff;
        }

        .testimonial-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .testimonial-card {
            background: #f8fafc;
            padding: 35px;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        .testimonial-rating {
            color: #fbbf24;
            font-size: 20px;
            margin-bottom: 15px;
        }

        .testimonial-text {
            color: #475569;
            margin-bottom: 20px;
            font-style: italic;
            line-height: 1.7;
        }

        .testimonial-author {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .author-avatar {
            width: 50px;
            height: 50px;
            background: #2563eb;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-weight: bold;
            font-size: 20px;
        }

        .author-info h4 {
            font-size: 16px;
            color: #1e293b;
            margin-bottom: 3px;
        }

        .author-info p {
            font-size: 14px;
            color: #64748b;
        }

        /* CTA Section */
        .cta-section {
            padding: 100px 5%;
            background-image: url('assets/logo-sosmed/footer.webp');
            text-align: center;
            color: #fff;
        }

        .cta-section h2 {
            font-size: 42px;
            margin-bottom: 20px;
        }

        .cta-section p {
            font-size: 18px;
            margin-bottom: 40px;
            opacity: 0.95;
        }

        /* Footer Baru (Minimalis) */
        /* Footer Baru (Minimalis) */
        .footer {
            /* Hapus background: #fff; */
            color: #555;
            padding: 80px 5% 40px;
            border-top: 1px solid #eee;
            position: relative;
            /* Penting untuk penempatan overlay */
            overflow: hidden;
            /* Pastikan gambar tidak keluar dari footer */
            z-index: 1;
        }

        /* Tambahkan Overlay Gambar di Footer */
        .footer::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            /* Ganti URL jika gambar berbeda */
            background-image: url('assets/logo-sosmed/footer.webp');
            background-size: cover;
            background-position: center;
            opacity: 0.1;
            /* Transparansi: 0.1 = 10% (sesuaikan sesuai keinginan) */
            z-index: -1;
            /* Pindahkan gambar ke belakang konten */
        }

        .footer-content {
            display: grid;
            /* Grid 4 kolom, kolom pertama lebih besar */
            grid-template-columns: 2fr 1fr 1fr 1fr;
            gap: 40px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .footer-section h3 {
            font-size: 16px;
            margin-bottom: 20px;
            color: #111;
            /* Judul section hitam */
            font-weight: 600;
        }

        /* Kolom 1: Logo & Info */
        .footer-about .footer-logo {
            font-size: 32px;
            font-weight: bold;
            color: #2563eb;
            /* Warna biru untuk logo (sesuaikan jika Anda pakai gambar) */
            margin-bottom: 15px;
        }

        .footer-about .footer-tagline {
            font-size: 18px;
            color: #2563eb;
            /* Warna biru untuk tagline */
            margin-bottom: 20px;
            font-weight: 500;
        }

        .footer-about .footer-details {
            font-size: 13px;
            color: #64748b;
            /* Warna teks abu-abu */
            line-height: 1.6;
            margin-bottom: 15px;
        }

        /* Kolom 2 & 3: Links */
        .footer-links a {
            display: block;
            text-decoration: none;
            color: #64748b;
            margin-bottom: 12px;
            font-size: 15px;
            transition: all 0.3s ease;
        }

        .footer-links a:hover {
            color: #2563eb;
            padding-left: 5px;
        }

        /* Kolom 4: Kontak */
        .footer-contact p {
            color: #64748b;
            margin-bottom: 12px;
            font-size: 15px;
            line-height: 1.6;
        }

        /* Bagian Bawah: Garis, Ikon, Copyright */
        .footer-bottom {
            max-width: 1200px;
            margin: 60px auto 0;
            text-align: center;
        }

        .footer-hr {
            border: 0;
            height: 1px;
            background-color: #e2e8f0;
            /* Warna garis abu-abu muda */
            margin-bottom: 30px;
        }

        .social-links {
            display: flex;
            justify-content: center;
            gap: 15px;
            /* Jarak antar ikon */
            margin-bottom: 30px;
        }

        .social-link {
            width: 40px;
            height: 40px;
            border: 1px solid #e2e8f0;
            /* Border abu-abu muda */
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .social-link img {
            width: 50px;
            height: 50px;

            /* Ikon agak pudar */
            transition: opacity 0.3s ease;
        }

        .social-link:hover {
            border-color: #2563eb;
            /* Border jadi biru saat hover */
            background: #ffffffff;
            /* Latar belakang biru sangat muda */
        }

        .social-link:hover img {
            opacity: 1;
            /* Ikon jadi jelas */
        }

        .copyright {
            color: #94a3b8;
            /* Warna teks copyright */
            font-size: 13px;
        }

        /* Responsive untuk HP */
        @media (max-width: 992px) {
            .footer-content {
                /* Ubah jadi 2 kolom di tablet */
                grid-template-columns: 1fr 1fr;
            }

            .footer-about {
                /* Kolom 'about' akan membentang penuh 2 kolom */
                grid-column: 1 / -1;
            }
        }

        @media (max-width: 768px) {
            .footer-content {
                /* Ubah jadi 1 kolom di HP */
                grid-template-columns: 1fr;
                gap: 30px;
            }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hamburger {
                display: flex;
            }

            .nav-menu {
                position: fixed;
                left: -100%;
                top: 70px;
                flex-direction: column;
                background: rgba(255, 255, 255, 0.98);
                width: 100%;
                text-align: center;
                transition: 0.3s;
                padding: 30px 0;
                gap: 20px;
            }

            .nav-menu.active {
                left: 0;
            }

            .nav-menu a {
                color: #333;
            }

            .hero h1 {
                font-size: 36px;
            }

            .hero p {
                font-size: 16px;
            }

            .section-title h2 {
                font-size: 32px;
            }

            .cta-section h2 {
                font-size: 32px;
            }
        }

        /* --- CSS BARU UNTUK KATALOG LAYANAN (Feature List Style) --- */

        .services-catalog {
            padding: 100px 5%;
            background: #f0f4f8;
            /* Latar belakang abu-abu muda */
        }

        .catalog-container {
            max-width: 1100px;
            margin: 0 auto;
            display: flex;
            gap: 40px;
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 15px 40px rgba(37, 99, 235, 0.08);
            overflow: hidden;
        }

        /* Kolom Kiri: Daftar Layanan */
        .catalog-menu {
            flex: 1;
            padding: 30px 0;
            border-right: 1px solid #eee;
        }

        .menu-item {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 20px 30px;
            cursor: pointer;
            border-left: 5px solid transparent;
            transition: all 0.3s ease;
        }

        /* Efek Hover & Aktif */
        .menu-item:hover {
            background: #f8fafc;
        }

        .menu-item.active {
            /* Class ini akan ditambahkan oleh JS */
            background: #e0eaff;
            border-left-color: #2563eb;
        }

        .menu-icon {
            color: #2563eb;
            font-size: 24px;
            width: 30px;
            text-align: center;
        }

        .menu-item h4 {
            font-size: 16px;
            font-weight: 600;
            color: #1e293b;
            margin: 0;
        }

        /* Kolom Kanan: Detail Layanan */
        .catalog-detail {
            flex: 2;
            padding: 50px;
        }

        .detail-content {
            /* Hanya tampilkan yang aktif (disimulasikan di HTML) */
            display: none;
            animation: fadeIn 0.5s ease-out;
        }

        .detail-content.active {
            display: block;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .detail-content h3 {
            font-size: 32px;
            color: #1e293b;
            margin-bottom: 20px;
        }

        .detail-content p {
            color: #475569;
            line-height: 1.8;
            margin-bottom: 25px;
        }

        .detail-features {
            list-style: none;
            padding-left: 0;
            margin-bottom: 30px;
        }

        .detail-features li {
            background: #fff;
            padding: 10px 0;
            color: #2563eb;
            font-weight: 500;
            border-bottom: 1px dashed #eef2f7;
        }

        .detail-features li i {
            margin-right: 10px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .catalog-container {
                flex-direction: column;
                gap: 0;
                border-radius: 10px;
            }

            .catalog-menu {
                border-right: none;
                border-bottom: 1px solid #eee;
                padding: 10px 0;
            }

            .menu-item {
                padding: 15px 20px;
            }

            .catalog-detail {
                padding: 30px 20px;
            }
        }
    </style>
</head>

<body>
    <!-- Navbar Mengambang -->
    <nav class="navbar" id="navbar">
        <div class="logo">Bali Fantastic</div>
        <ul class="nav-menu" id="navMenu">
            <li><a href="#home">Home</a></li>
            <li><a href="#layanan">Layanan</a></li>
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

    <!-- Hero Section -->
    <section class="hero" id="home">
        <div class="hero-content">
            <h1>Urus Visa Jadi Mudah & Cepat!</h1>
            <p>Agency visa terpercaya di Indonesia. Kami bantu proses visa Anda dari A-Z dengan layanan profesional dan
                terpercaya.</p>
            <div class="hero-buttons">
                <a href="#layanan" class="btn-primary">Cek Layanan Visa</a>
                <a href="#kontak" class="btn-secondary">Hubungi Kami</a>
            </div>
        </div>
    </section>


    <section class="services-catalog" id="layanan">
        <div class="section-title">
            <h2>Katalog Layanan Visa & Dokumen</h2>
            <p>Pilih layanan yang Anda butuhkan untuk melihat persyaratan dan detail lengkap</p>
        </div>

        <div class="catalog-container">
            <div class="catalog-menu">
                <div class="menu-item active" data-target="detail-voa">
                    <div class="menu-icon"><i class="fa-solid fa-plane-arrival"></i></div>
                    <h4>Visa On Arrival (VOA)</h4>
                </div>
                <div class="menu-item" data-target="detail-kitasinves">
                    <div class="menu-icon"><i class="fa-solid fa-building"></i></div>
                    <h4>KITAS Investor</h4>
                </div>
                <div class="menu-item" data-target="detail-visaext">
                    <div class="menu-icon"><i class="fa-solid fa-clock-rotate-left"></i></div>
                    <h4>Visa Extention</h4>
                </div>
                <div class="menu-item" data-target="detail-kitasext">
                    <div class="menu-icon"><i class="fa-solid fa-file-contract"></i></div>
                    <h4>KITAS Extention</h4>
                </div>
                <div class="menu-item" data-target="detail-b211">
                    <div class="menu-icon"><i class="fa-solid fa-passport"></i></div>
                    <h4>Visa B211 (Kunjungan)</h4>
                </div>
            </div>

            <div class="catalog-detail">

                <div class="detail-content active" id="detail-voa">
                    <h3>Visa On Arrival (VOA)</h3>
                    <p>Pengurusan Izin Tinggal Kunjungan saat kedatangan untuk tujuan wisata atau kunjungan singkat
                        lainnya di Indonesia.</p>
                    <ul class="detail-features">
                        <li><i class="fa-solid fa-check-circle"></i> Proses Cepat (Saat Kedatangan)</li>
                        <li><i class="fa-solid fa-check-circle"></i> Berlaku untuk 90+ Negara</li>
                        <li><i class="fa-solid fa-check-circle"></i> Dapat diperpanjang 1 kali</li>
                    </ul>
                    <a href="#kontak" class="btn-primary">Ajukan VOA Sekarang</a>
                </div>

                <div class="detail-content" id="detail-kitasinves">
                    <h3>KITAS Investor</h3>
                    <p>Izin Tinggal Terbatas khusus untuk penanam modal asing yang mendirikan perusahaan di Indonesia.
                        Solusi untuk tinggal dan bekerja sebagai direktur/komisaris.</p>
                    <ul class="detail-features">
                        <li><i class="fa-solid fa-check-circle"></i> Izin Tinggal 1-2 Tahun</li>
                        <li><i class="fa-solid fa-check-circle"></i> Berlaku untuk Izin Kerja</li>
                        <li><i class="fa-solid fa-check-circle"></i> Proses Lengkap dari RPTKA</li>
                    </ul>
                    <a href="#kontak" class="btn-primary">Ajukan KITAS Investor</a>
                </div>

                <div class="detail-content" id="detail-visaext">
                    <h3>Visa Extention</h3>
                    <p>Perpanjangan Visa Kunjungan (seperti VOA atau B211) Anda di Indonesia tanpa harus keluar negeri.
                        Kami urus prosesnya di kantor imigrasi setempat.</p>
                    <ul class="detail-features">
                        <li><i class="fa-solid fa-check-circle"></i> Perpanjangan Hingga 60 Hari</li>
                        <li><i class="fa-solid fa-check-circle"></i> Layanan Penjemputan Dokumen</li>
                        <li><i class="fa-solid fa-check-circle"></i> Tanpa Perlu Keluar Indonesia</li>
                    </ul>
                    <a href="#kontak" class="btn-primary">Perpanjang Visa Anda</a>
                </div>

                <div class="detail-content" id="detail-kitasext">
                    <h3>KITAS Extention</h3>
                    <p>Perpanjangan Izin Tinggal Terbatas (KITAS) Anda untuk memastikan status hukum Anda tetap berlaku
                        di Indonesia. Kami urus semua dokumen perpanjangan.</p>
                    <ul class="detail-features">
                        <li><i class="fa-solid fa-check-circle"></i> Perpanjangan KITAS Tahunan</li>
                        <li><i class="fa-solid fa-check-circle"></i> Monitoring Masa Berlaku</li>
                        <li><i class="fa-solid fa-check-circle"></i> Termasuk Izin Kerja (IMTA)</li>
                    </ul>
                    <a href="#kontak" class="btn-primary">Perpanjang KITAS Sekarang</a>
                </div>

                <div class="detail-content" id="detail-b211">
                    <h3>Visa B211 (Kunjungan Wisata/Bisnis)</h3>
                    <p>Visa elektronik (e-Visa) yang diterbitkan sebelum kedatangan, ideal untuk kunjungan wisata,
                        bisnis, atau tujuan non-kerja lainnya yang lebih lama (hingga 6 bulan).</p>
                    <ul class="detail-features">
                        <li><i class="fa-solid fa-check-circle"></i> Masa Tinggal Awal 60 Hari</li>
                        <li><i class="fa-solid fa-check-circle"></i> Dapat Diperpanjang 2 Kali</li>
                        <li><i class="fa-solid fa-check-circle"></i> Diproses Sepenuhnya Online</li>
                    </ul>
                    <a href="#kontak" class="btn-primary">Ajukan Visa B211</a>
                </div>

            </div>
        </div>
    </section>


    <section class="services" id="layanan">
        <div class="section-title">
            <h2>Destinasi Tujuan Visa Terbaik</h2>
            <p>Pilih negara impian Anda, kami yang urus visanya</p>
        </div>
        <div class="services-grid">

            <div class="service-card" style="background-image: url('assets/monument/bali.jpg');">
                <img src="assets/flag/indonesia.png" alt="Bendera Indonesia" class="destination-flag">
                <div class="destination-content">
                    <h3>Wisata Bali / Pulau Dewata</h3>
                    <a href="#kontak" class="destination-button">Konsultasi Visa Wisata</a>
                </div>
            </div>

            <div class="service-card" style="background-image: url('assets/monument/rajaampat.jpg');">
                <img src="assets/flag/indonesia.png" alt="Bendera Indonesia" class="destination-flag">
                <div class="destination-content">
                    <h3>Wisata Raja Ampat / Papua</h3>
                    <a href="#kontak" class="destination-button">Konsultasi Visa Wisata</a>
                </div>
            </div>

            <div class="service-card" style="background-image: url('assets/monument/komodo.jpg');">
                <img src="assets/flag/indonesia.png" alt="Bendera Indonesia" class="destination-flag">
                <div class="destination-content">
                    <h3>Wisata Komodo / Nusa Tenggara Timur</h3>
                    <a href="#kontak" class="destination-button">Konsultasi Visa Wisata</a>
                </div>
            </div>

            <div class="service-card" style="background-image: url('assets/monument/borobudur.jpg');">
                <img src="assets/flag/indonesia.png" alt="Bendera Indonesia" class="destination-flag">
                <div class="destination-content">
                    <h3>Candi Borobudur / Jawa Tengah</h3>
                    <a href="#kontak" class="destination-button">Konsultasi Visa Wisata</a>
                </div>
            </div>

            <div class="service-card" style="background-image: url('assets/monument/gili.jpg');">
                <img src="assets/flag/indonesia.png" alt="Bendera Indonesia" class="destination-flag">
                <div class="destination-content">
                    <h3>Wisata Gili Trawangan / Lombok</h3>
                    <a href="#kontak" class="destination-button">Konsultasi Visa Wisata</a>
                </div>
            </div>

            <div class="service-card" style="background-image: url('assets/monument/toba.jpg');">
                <img src="assets/flag/indonesia.png" alt="Bendera Indonesia" class="destination-flag">
                <div class="destination-content">
                    <h3>Wisata Danau Toba / Sumatera Utara</h3>
                    <a href="#kontak" class="destination-button">Konsultasi Visa Wisata</a>
                </div>
            </div>

        </div>
    </section>

    <!-- Benefits Section -->
    <section class="benefits">
        <div class="benefits-layout-grid">

            <div class="benefits-left-column">
                <div class="section-title" style="text-align: left; margin-bottom: 40px;">
                    <h2>Mengapa Pilih Bali Fantastic?</h2>
                    <p>Keunggulan layanan kami untuk kemudahan Anda</p>
                </div>

                <div class="benefits-list">
                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <i class="fa-solid fa-bolt-lightning"></i>
                        </div>
                        <div class="benefit-content">
                            <h3>Proses Cepat</h3>
                            <p>Pengurusan visa dengan proses yang efisien dan tepat waktu</p>
                        </div>
                    </div>

                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <i class="fa-solid fa-shield-halved"></i>
                        </div>
                        <div class="benefit-content">
                            <h3>Terpercaya</h3>
                            <p>Berpengalaman bertahun-tahun dengan ribuan visa yang telah diproses</p>
                        </div>
                    </div>

                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <i class="fa-solid fa-tags"></i>
                        </div>
                        <div class="benefit-content">
                            <h3>Harga Transparan</h3>
                            <p>Tidak ada biaya tersembunyi, semua biaya dijelaskan dengan detail</p>
                        </div>
                    </div>

                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <i class="fa-solid fa-bullseye"></i>
                        </div>
                        <div class="benefit-content">
                            <h3>Success Rate Tinggi</h3>
                            <p>Tingkat keberhasilan visa approval mencapai 98%</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="benefits-right-column">
                <img src="assets/right.png" alt="Layanan Profesional Bali Fantastic">
            </div>

        </div>
    </section>

    <section class="process" id="proses">
        <div class="section-title">
            <h2>Cara Kerja Kami</h2>
            <p>Proses mudah dalam 4 langkah sederhana</p>
        </div>

        <div class="process-steps">

            <div class="step">
                <div class="step-icon-timeline">1</div>
                <div class="step-content">
                    <h3>Konsultasi</h3>
                    <p>Hubungi kami untuk konsultasi gratis mengenai kebutuhan visa Anda</p>
                </div>
            </div>

            <div class="step">
                <div class="step-icon-timeline">2</div>
                <div class="step-content">
                    <h3>Persiapan Dokumen</h3>
                    <p>Kami bantu persiapan dan verifikasi kelengkapan dokumen Anda</p>
                </div>
            </div>

            <div class="step">
                <div class="step-icon-timeline">3</div>
                <div class="step-content">
                    <h3>Proses Pengajuan</h3>
                    <p>Tim kami yang mengurus semua proses pengajuan visa ke kedutaan</p>
                </div>
            </div>

            <div class="step">
                <div class="step-icon-timeline">4</div>
                <div class="step-content">
                    <h3>Visa Approved</h3>
                    <p>Visa Anda disetujui dan siap untuk perjalanan Anda</p>
                </div>
            </div>

        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials" id="testimoni">
        <div class="section-title">
            <h2>Apa Kata Mereka?</h2>
            <p>Testimoni dari klien yang puas dengan layanan kami</p>
        </div>
        <div class="testimonial-grid">
            <div class="testimonial-card">
                <div class="testimonial-rating">⭐⭐⭐⭐⭐</div>
                <p class="testimonial-text">"Pelayanan sangat memuaskan! Proses cepat dan tim sangat responsif. Visa
                    turis Jepang saya disetujui dalam waktu 5 hari kerja."</p>
                <div class="testimonial-author">
                    <div class="author-avatar">AS</div>
                    <div class="author-info">
                        <h4>Andi Susanto</h4>
                        <p>Visa Turis Jepang</p>
                    </div>
                </div>
            </div>
            <div class="testimonial-card">
                <div class="testimonial-rating">⭐⭐⭐⭐⭐</div>
                <p class="testimonial-text">"Recommended banget! Tim Bali Fantastic membantu saya dari awal sampai visa
                    approved. Sangat profesional dan terpercaya."</p>
                <div class="testimonial-author">
                    <div class="author-avatar">RP</div>
                    <div class="author-info">
                        <h4>Rina Puspita</h4>
                        <p>Visa Bisnis Singapura</p>
                    </div>
                </div>
            </div>
            <div class="testimonial-card">
                <div class="testimonial-rating">⭐⭐⭐⭐⭐</div>
                <p class="testimonial-text">"Terima kasih Bali Fantastic! Visa pelajar ke Australia saya disetujui. Tim
                    sangat
                    membantu dalam persiapan dokumen."</p>
                <div class="testimonial-author">
                    <div class="author-avatar">BW</div>
                    <div class="author-info">
                        <h4>Budi Wibowo</h4>
                        <p>Visa Pelajar Australia</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section" id="kontak">
        <h2>Siap Urus Visa Anda?</h2>
        <p>Hubungi kami sekarang untuk konsultasi gratis dan dapatkan visa impian Anda!</p>
        <div class="hero-buttons">
            <a href="https://wa.me/62" class="btn-primary">WhatsApp Kami</a>
            <a href="mailto:info@Bali Fantastic.id" class="btn-secondary">Email Kami</a>
        </div>
    </section>

    <!-- Footer -->
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