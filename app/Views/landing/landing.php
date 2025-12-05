<?= $this->extend('landing/layout') ?>
<?= $this->section('content') ?>

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
                <a href="<?= base_url('booking?service=voa'); ?>" class="btn-primary">Ajukan VOA Sekarang</a>
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
                <a href="<?= base_url('booking?service=visa_ext'); ?>" class="btn-primary">Perpanjang Visa Anda</a>
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
                <a href="<?= base_url('booking?service=visa_ext'); ?>" class="btn-primary">Perpanjang Visa Anda</a>
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
                <a href="<?= base_url('booking?service=kitas_ext'); ?>" class="btn-primary">Perpanjang KITAS
                    Sekarang</a>
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
                <a href="<?= base_url('booking?service=b211'); ?>" class="btn-primary">Ajukan Visa B211</a>
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
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Ambil semua elemen tombol menu dan isi konten
    const menuItems = document.querySelectorAll('.menu-item');
    const detailContents = document.querySelectorAll('.detail-content');

    menuItems.forEach(item => {
        item.addEventListener('click', function() {
            // 1. Reset: Hapus class 'active' dari semua tombol & konten lama
            menuItems.forEach(i => i.classList.remove('active'));
            detailContents.forEach(c => c.classList.remove('active'));

            // 2. Set Aktif: Tambahkan class 'active' ke tombol yang baru diklik
            this.classList.add('active');

            // 3. Pindah Konten: Cari konten yang sesuai dengan ID target
            const targetId = this.getAttribute('data-target');
            const targetContent = document.getElementById(targetId);

            if (targetContent) {
                targetContent.classList.add('active');
            }
        });
    });
});
</script>
<?= $this->endSection() ?>