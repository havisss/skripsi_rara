<?= $this->extend('landing/layout') ?>
<?= $this->section('content') ?>

<section class="hero-small"
    style="background-image: url('<?= base_url('assets/bg1.jpg') ?>'); padding: 100px 5%; text-align: center; color: white;">
    <div class="hero-content">
        <h1 style="font-size: 42px; margin-bottom: 10px;">Pusat Informasi Visa</h1>
        <p style="font-size: 18px; opacity: 0.9;">Pelajari persyaratan dan regulasi lengkap sebelum mengajukan visa
            Anda.</p>
    </div>
</section>

<section class="services" style="padding: 80px 5%; background: #f8fafc;">
    <div class="container">

        <div class="services-grid"
            style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px;">

            <?php if (empty($visas)): ?>
                <div style="grid-column: 1/-1; text-align: center; padding: 50px;">
                    <p>Belum ada informasi visa yang tersedia saat ini.</p>
                </div>
            <?php else: ?>

                <?php foreach ($visas as $visa): ?>
                    <div class="service-card" style="
                        position: relative; 
                        border-radius: 15px; 
                        overflow: hidden; 
                        height: 350px; 
                        background-size: cover; 
                        background-position: center; 
                        background-image: url('<?= base_url('uploads/visa/' . ($visa['image_url'] ? $visa['image_url'] : 'default.jpg')) ?>');
                        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
                        transition: transform 0.3s ease;
                    ">
                        <div class="card-overlay" style="
                            position: absolute; 
                            top: 0; left: 0; right: 0; bottom: 0;
                            background: linear-gradient(to top, rgba(0,0,0,0.9) 10%, rgba(0,0,0,0.3) 50%, rgba(0,0,0,0) 100%);
                        "></div>

                        <div class="card-content"
                            style="position: absolute; bottom: 0; left: 0; padding: 25px; width: 100%; color: white; z-index: 2;">
                            <h3 style="font-size: 24px; margin-bottom: 10px; font-weight: 700;"><?= esc($visa['name']) ?></h3>

                            <p
                                style="font-size: 14px; margin-bottom: 15px; opacity: 0.9; line-height: 1.5; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                                <?= esc($visa['description']) ?>
                            </p>

                            <div style="display: flex; justify-content: space-between; align-items: center;">
                                <span style="font-weight: bold; color: #fbbf24; font-size: 18px;">
                                    Rp <?= number_format($visa['price'], 0, ',', '.') ?>
                                </span>

                                <a href="<?= base_url('persyaratan/detail/' . $visa['id']) ?>" style="
                                    background: white; 
                                    color: #333; 
                                    padding: 8px 20px; 
                                    border-radius: 20px; 
                                    text-decoration: none; 
                                    font-weight: 600; 
                                    font-size: 14px;
                                    transition: 0.3s;
                                ">
                                    Baca Detail <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

            <?php endif; ?>

        </div>
    </div>
</section>

<style>
    /* Hover Effect untuk Card */
    .service-card:hover {
        transform: translateY(-5px);
    }

    .service-card:hover .card-content a {
        background: #fbbf24;
        color: #000;
    }
</style>

<?= $this->endSection() ?>