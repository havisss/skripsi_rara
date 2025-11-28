<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pengajuan Visa - Bali Fantastic</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        /* Mengcopy style dasar dari landing page agar senada */
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f0f7ff;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            background: #fff;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #1e293b;
            margin-bottom: 30px;
        }

        /* Form Styling */
        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #475569;
        }

        input[type="text"],
        input[type="email"],
        input[type="date"],
        select,
        textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            font-size: 14px;
            box-sizing: border-box;
        }

        .file-input-wrapper {
            border: 2px dashed #cbd5e1;
            padding: 20px;
            text-align: center;
            border-radius: 8px;
            background: #f8fafc;
            cursor: pointer;
            transition: 0.3s;
        }

        .file-input-wrapper:hover {
            border-color: #2563eb;
            background: #e0eaff;
        }

        .hint {
            font-size: 12px;
            color: #64748b;
            margin-top: 5px;
            display: block;
        }

        .btn-submit {
            background: #fbbf24;
            color: #333;
            border: none;
            padding: 15px 30px;
            border-radius: 30px;
            font-weight: bold;
            width: 100%;
            cursor: pointer;
            font-size: 16px;
            transition: 0.3s;
            margin-top: 20px;
        }

        .btn-submit:hover {
            background: #f59e0b;
            transform: translateY(-2px);
        }

        /* Dynamic Sections - Hidden by default */
        .dynamic-section {
            display: none;
            padding: 20px;
            background: #f1f5f9;
            border-radius: 10px;
            margin-top: 20px;
            border-left: 4px solid #2563eb;
        }

        .dynamic-section.active {
            display: block;
            animation: fadeIn 0.5s;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .back-link {
            display: inline-block;
            margin-bottom: 20px;
            text-decoration: none;
            color: #2563eb;
            font-weight: 600;
        }

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
            background-image: url('assets/bgfooter.PNG');
            background-size: 80px;
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
    </style>
</head>

<body>

    <div class="container">
        <a href="/" class="back-link"><i class="fa-solid fa-arrow-left"></i> Kembali ke Home</a>
        <h2>Formulir Pengajuan Visa</h2>

        <form action="/booking/submit" method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label>Nama Lengkap (Sesuai Paspor)</label>
                <input type="text" name="fullname" required placeholder="Contoh: Budi Santoso">
            </div>
            <div class="form-group">
                <label>Email Aktif</label>
                <input type="email" name="email" required placeholder="email@contoh.com">
            </div>
            <div class="form-group">
                <label>Nomor WhatsApp</label>
                <input type="text" name="phone" required placeholder="+6281...">
            </div>

            <div class="form-group">
                <label>Jenis Layanan Visa</label>
                <select name="service_type" id="serviceType" onchange="updateForm()">
                    <option value="voa" <?= ($selected_service == 'voa') ? 'selected' : '' ?>>Visa On Arrival (VOA)
                    </option>
                    <option value="b211" <?= ($selected_service == 'b211') ? 'selected' : '' ?>>Visa B211
                        (Wisata/Bisnis)</option>
                    <option value="kitas_investor" <?= ($selected_service == 'kitas_investor') ? 'selected' : '' ?>>
                        KITAS Investor</option>
                    <option value="visa_ext" <?= ($selected_service == 'visa_ext') ? 'selected' : '' ?>>Visa Extension
                    </option>
                    <option value="kitas_ext" <?= ($selected_service == 'kitas_ext') ? 'selected' : '' ?>>KITAS
                        Extension</option>
                </select>
            </div>

            <div class="form-group">
                <label>Upload Scan Paspor (Halaman Biodata)</label>
                <div class="file-input-wrapper">
                    <input type="file" name="passport_file" required accept=".jpg,.jpeg,.pdf">
                    <span class="hint" id="passportHint">Format: JPG/PDF, Max 2MB. Masa berlaku min 6 bulan.</span>
                </div>
            </div>

            <div id="sec-voa" class="dynamic-section">
                <h4><i class="fa-solid fa-plane"></i> Dokumen VOA</h4>
                <div class="form-group">
                    <label>Tiket Pesawat Kembali/Terusan</label>
                    <input type="file" name="return_ticket" accept=".pdf,.jpg">
                </div>
                <div class="form-group">
                    <label>Nomor Penerbangan Kedatangan</label>
                    <input type="text" name="flight_number" placeholder="Contoh: GA 890">
                </div>
                <div class="form-group">
                    <label>Tanggal Kedatangan</label>
                    <input type="date" name="arrival_date">
                </div>
            </div>

            <div id="sec-b211" class="dynamic-section">
                <h4><i class="fa-solid fa-passport"></i> Dokumen B211</h4>
                <div class="form-group">
                    <label>Rekening Koran (3 Bulan Terakhir)</label>
                    <input type="file" name="bank_statement" accept=".pdf">
                    <span class="hint">Saldo minimal setara US$ 2000</span>
                </div>
                <div class="form-group">
                    <label>Pasfoto Berwarna</label>
                    <input type="file" name="photo_color" accept=".jpg,.jpeg">
                    <span class="hint">Latar belakang merah/putih</span>
                </div>
                <div class="form-group">
                    <label>Surat Sponsor (Opsional - Jika Bisnis)</label>
                    <input type="file" name="sponsor_letter" accept=".pdf">
                </div>
                <div class="form-group">
                    <label>Sertifikat Vaksin (Opsional)</label>
                    <input type="file" name="vaccine_cert" accept=".pdf,.jpg">
                </div>
            </div>

            <div id="sec-kitas-investor" class="dynamic-section">
                <h4><i class="fa-solid fa-building"></i> Dokumen Perusahaan (PMA)</h4>
                <div class="form-group">
                    <label>Bukti Saham (Akta Perusahaan)</label>
                    <input type="file" name="share_proof" accept=".pdf">
                    <span class="hint">Nilai saham minimal Rp 10 Miliar</span>
                </div>
                <div class="form-group">
                    <label>Dokumen NIB (Nomor Induk Berusaha)</label>
                    <input type="file" name="nib_doc" accept=".pdf">
                </div>
                <div class="form-group">
                    <label>NPWP Perusahaan</label>
                    <input type="file" name="npwp_company" accept=".pdf,.jpg">
                </div>
                <div class="form-group">
                    <label>Rekening Koran Perusahaan</label>
                    <input type="file" name="company_bank" accept=".pdf">
                </div>
            </div>

            <div id="sec-extension" class="dynamic-section">
                <h4><i class="fa-solid fa-clock-rotate-left"></i> Dokumen Perpanjangan</h4>
                <div class="form-group">
                    <label>Scan Visa / KITAS Lama (Aktif)</label>
                    <input type="file" name="old_visa" accept=".pdf,.jpg">
                </div>
                <div class="form-group">
                    <label>Surat Keterangan Tempat Tinggal (SKTT/Domisili)</label>
                    <input type="file" name="sktt_doc" accept=".pdf,.jpg">
                    <span class="hint">Khusus perpanjangan KITAS</span>
                </div>
            </div>

            <button type="submit" class="btn-submit">Kirim Pengajuan</button>
        </form>
    </div>

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
        function updateForm() {
            // 1. Ambil value dropdown
            const type = document.getElementById('serviceType').value;
            const passportHint = document.getElementById('passportHint');

            // 2. Sembunyikan semua section dinamis dulu
            document.querySelectorAll('.dynamic-section').forEach(el => el.classList.remove('active'));

            // 3. Logika Tampilan Berdasarkan Pilihan
            if (type === 'voa') {
                document.getElementById('sec-voa').classList.add('active');
                passportHint.innerText = "Format: JPG/PDF. Masa berlaku paspor min 6 bulan.";
            } else if (type === 'b211') {
                document.getElementById('sec-b211').classList.add('active');
                passportHint.innerText = "Format: JPG/PDF. Masa berlaku min 6 bulan (60 hari) atau 12 bulan (180 hari).";
            } else if (type === 'kitas_investor') {
                document.getElementById('sec-kitas-investor').classList.add('active');
                passportHint.innerText = "Format: JPG/PDF. PENTING: Masa berlaku paspor min 18 bulan.";
            } else if (type === 'visa_ext' || type === 'kitas_ext') {
                document.getElementById('sec-extension').classList.add('active');
                passportHint.innerText = "Format: JPG/PDF. Scan paspor asli halaman depan.";
            }
        }

        // Jalankan fungsi saat halaman dimuat agar sesuai pilihan awal
        document.addEventListener('DOMContentLoaded', updateForm);
    </script>

</body>

</html>