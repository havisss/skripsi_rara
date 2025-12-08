<?= $this->extend('landing/layout') ?>
<?= $this->section('content') ?>

<section class="page-hero">
    <div class="hero-bg" style="background-image: url('<?= base_url('assets/bg1.jpg') ?>');"></div>
    <div class="hero-overlay"></div>
    <div class="hero-content-wrapper">
        <span class="hero-badge">Visa & Regulasi</span>
        <h1>Pusat Informasi Visa</h1>
        <p>Pelajari persyaratan lengkap, biaya, dan estimasi proses untuk perjalanan Anda selanjutnya.</p>
    </div>
</section>

<section class="visa-section">
    <div class="container">

        <?php if (empty($visas)): ?>
        <div class="empty-state">
            <div class="empty-icon">
                <i class="fas fa-passport"></i>
            </div>
            <h3>Belum Ada Informasi Visa</h3>
            <p>Saat ini belum ada daftar visa yang tersedia. Silakan cek kembali nanti.</p>
        </div>
        <?php else: ?>

        <div class="visa-grid">
            <?php foreach ($visas as $visa): ?>
            <div class="visa-card">
                <div class="card-image">
                    <img src="<?= base_url('uploads/visa/' . ($visa['image_url'] ? $visa['image_url'] : 'default.jpg')) ?>"
                        alt="<?= esc($visa['name']) ?>">
                    <div class="price-tag">
                        <span class="currency">IDR</span>
                        <span class="amount"><?= number_format($visa['price'], 0, ',', '.') ?></span>
                    </div>
                    <div class="image-overlay"></div>
                </div>

                <div class="card-body">
                    <h3 class="card-title"><?= esc($visa['name']) ?></h3>
                    <div class="card-desc">
                        <?= esc($visa['description']) ?>
                    </div>

                    <div class="card-footer">
                        <a href="<?= base_url('persyaratan/detail/' . $visa['id']) ?>" class="btn-detail">
                            Lihat Syarat <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <?php endif; ?>
    </div>
</section>

<style>
/* --- 1. Hero Styling --- */
.page-hero {
    position: relative;
    height: 450px;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    color: #fff;
    overflow: hidden;
    margin-bottom: 50px;
}

.hero-bg {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-size: cover;
    background-position: center;
    z-index: 1;
    transform: scale(1);
    transition: transform 10s ease;
}

.page-hero:hover .hero-bg {
    transform: scale(1.05);
    /* Efek zoom lambat pada background */
}

.hero-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, rgba(30, 41, 59, 0.9) 0%, rgba(37, 99, 235, 0.6) 100%);
    z-index: 2;
}

.hero-content-wrapper {
    position: relative;
    z-index: 3;
    max-width: 800px;
    padding: 0 20px;
    animation: fadeUp 0.8s ease-out;
}

.hero-badge {
    display: inline-block;
    background: rgba(255, 255, 255, 0.15);
    backdrop-filter: blur(5px);
    padding: 8px 16px;
    border-radius: 50px;
    font-size: 14px;
    font-weight: 600;
    margin-bottom: 20px;
    border: 1px solid rgba(255, 255, 255, 0.2);
    color: #fbbf24;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.hero-content-wrapper h1 {
    font-size: 48px;
    font-weight: 800;
    margin-bottom: 15px;
    text-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
}

.hero-content-wrapper p {
    font-size: 18px;
    opacity: 0.9;
    line-height: 1.6;
}

/* --- 2. Grid & Layout --- */
.visa-section {
    padding-bottom: 100px;
    background: #f8fafc;
    min-height: 500px;
    /* Mencegah footer naik jika konten sedikit */
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

.visa-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
    gap: 30px;
    padding-top: -50px;
    /* Overlap effect if needed, but keeping clean for now */
}

/* --- 3. Modern Card Design --- */
.visa-card {
    background: #fff;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    display: flex;
    flex-direction: column;
    border: 1px solid #f1f5f9;
    position: relative;
    opacity: 0;
    animation: fadeUp 0.6s ease-out forwards;
}

/* Staggered Animation Delay loop via CSS nth-child */
.visa-card:nth-child(1) {
    animation-delay: 0.1s;
}

.visa-card:nth-child(2) {
    animation-delay: 0.2s;
}

.visa-card:nth-child(3) {
    animation-delay: 0.3s;
}

.visa-card:nth-child(4) {
    animation-delay: 0.4s;
}

.visa-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(37, 99, 235, 0.15);
}

/* Card Image Area */
.card-image {
    height: 220px;
    position: relative;
    overflow: hidden;
}

.card-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.6s ease;
}

.visa-card:hover .card-image img {
    transform: scale(1.1);
}

.image-overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 50%;
    background: linear-gradient(to top, rgba(0, 0, 0, 0.6), transparent);
    opacity: 0.6;
}

/* Price Tag Badge */
.price-tag {
    position: absolute;
    top: 20px;
    right: 20px;
    background: rgba(255, 255, 255, 0.95);
    padding: 8px 16px;
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    z-index: 2;
    display: flex;
    flex-direction: column;
    align-items: flex-end;
    line-height: 1;
}

.price-tag .currency {
    font-size: 10px;
    text-transform: uppercase;
    color: #64748b;
    font-weight: 700;
    margin-bottom: 2px;
}

.price-tag .amount {
    font-size: 16px;
    color: #2563eb;
    font-weight: 800;
}

/* Card Body */
.card-body {
    padding: 25px;
    flex: 1;
    display: flex;
    flex-direction: column;
}

.card-title {
    font-size: 20px;
    font-weight: 700;
    color: #1e293b;
    margin-bottom: 12px;
    line-height: 1.4;
}

.card-desc {
    font-size: 14px;
    color: #64748b;
    line-height: 1.6;
    margin-bottom: 25px;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    /* Membatasi text 3 baris */
    -webkit-box-orient: vertical;
    overflow: hidden;
    flex-grow: 1;
}

/* Card Footer & Button */
.card-footer {
    border-top: 1px dashed #e2e8f0;
    padding-top: 20px;
}

.btn-detail {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100%;
    padding: 12px;
    background: #f1f5f9;
    color: #334155;
    border-radius: 10px;
    font-weight: 600;
    font-size: 14px;
    text-decoration: none;
    transition: all 0.3s ease;
    gap: 10px;
}

.btn-detail:hover {
    background: #2563eb;
    color: #fff;
}

.btn-detail i {
    transition: transform 0.3s ease;
}

.btn-detail:hover i {
    transform: translateX(5px);
}

/* --- 4. Empty State --- */
.empty-state {
    grid-column: 1 / -1;
    text-align: center;
    padding: 80px 20px;
    background: #fff;
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
}

.empty-icon {
    font-size: 60px;
    color: #cbd5e1;
    margin-bottom: 20px;
}

.empty-state h3 {
    color: #1e293b;
    font-size: 24px;
    margin-bottom: 10px;
}

.empty-state p {
    color: #64748b;
}

/* --- 5. Animations --- */
@keyframes fadeUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }

    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .hero-content-wrapper h1 {
        font-size: 32px;
    }

    .page-hero {
        height: 350px;
    }

    .card-image {
        height: 200px;
    }
}
</style>

<?= $this->endSection() ?>