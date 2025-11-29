<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pengajuan Visa - Bali Fantastic</title>
    <link rel="stylesheet" href="assets/css/landing/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>

<body>

    <div class="booking-container">
        <a href="/" class="back-link"><i class="fa-solid fa-arrow-left"></i> Kembali ke Home</a>
        <h2>Formulir Pengajuan Visa</h2>

        <form action="/booking/submit" method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label>Nama Lengkap (Sesuai Paspor)</label>
                <input type="text" name="fullname" value="<?= $user['full_name'] ?? '' ?>" readonly
                    style="background-color: #e9ecef;">
            </div>
            <div class="form-group">
                <label>Email Aktif</label>
                <input type="email" name="email" value="<?= $user['email'] ?? '' ?>" readonly
                    style="background-color: #e9ecef;">
            </div>
            <div class="form-group">
                <label>Nomor WhatsApp</label>
                <input type="text" name="phone" value="<?= $user['phone_number'] ?? '' ?>" readonly
                    style="background-color: #e9ecef;">
            </div>
            <div class="form-group">
                <label>Jenis Layanan Visa</label>
                <select name="service_type"
                    onchange="window.location.href='<?= base_url('booking?service=') ?>'+this.value">
                    <?php foreach ($all_visas as $visa) : ?>
                    <option value="<?= $visa['code']; ?>"
                        <?= ($visa['id'] == $selected_visa['id']) ? 'selected' : ''; ?>>
                        <?= $visa['name']; ?> - Rp <?= number_format($visa['price'], 0, ',', '.'); ?>
                    </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label>Upload Scan Paspor (Halaman Biodata)</label>
                <div class="file-input-wrapper">
                    <input type="file" name="passport_file" required accept=".jpg,.jpeg,.pdf">
                    <span class="hint" id="passportHint">Format: JPG/PDF, Max 2MB. Masa berlaku min 6 bulan.</span>
                </div>
            </div>

            <div class="dynamic-section active" style="display:block;">
                <h4><i class="fa-solid fa-file-import"></i> Dokumen Syarat: <?= $selected_visa['name']; ?></h4>
                <p class="hint"><?= $selected_visa['description']; ?></p>

                <?php foreach ($requirements as $req) : ?>
                <div class="form-group">
                    <label>
                        <?= $req['document_name']; ?>
                        <?= ($req['is_mandatory']) ? '<span style="color:red">*</span>' : '(Opsional)'; ?>
                    </label>
                    <div class="file-input-wrapper">
                        <input type="file" name="doc_<?= $req['id']; ?>"
                            accept=".<?= str_replace(',', ',.', $req['file_type']); ?>"
                            <?= ($req['is_mandatory']) ? 'required' : ''; ?>>
                        <span class="hint">Format: <?= strtoupper($req['file_type']); ?></span>
                    </div>
                </div>
                <?php endforeach; ?>
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
            <input type="hidden" name="visa_type_id" value="<?= $selected_visa['id']; ?>">
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