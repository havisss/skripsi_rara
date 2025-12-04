<?= $this->extend('landing/layout') ?>
<?= $this->section('content') ?>

<div class="detail-header" style="
    height: 60vh; 
    min-height: 400px;
    background-image: url('<?= base_url('uploads/visa/' . ($visa['image_url'] ? $visa['image_url'] : 'default.jpg')) ?>');
    background-size: cover;
    background-position: center;
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
">
    <div style="position: absolute; top:0; left:0; width:100%; height:100%; background: rgba(0,0,0,0.6);"></div>

    <div class="container" style="position: relative; z-index: 2; text-align: center; color: white;">
        <span
            style="background: #fbbf24; color: #000; padding: 5px 15px; border-radius: 20px; font-weight: bold; font-size: 14px; text-transform: uppercase; letter-spacing: 1px;">
            Informasi Visa
        </span>
        <h1 style="font-size: 48px; margin: 15px 0 10px; font-weight: 800; text-shadow: 0 2px 10px rgba(0,0,0,0.3);">
            <?= esc($visa['name']) ?>
        </h1>
        <p style="font-size: 20px; opacity: 0.95; max-width: 700px; margin: 0 auto; line-height: 1.6;">
            <?= esc($visa['description']) ?>
        </p>
    </div>
</div>

<div class="container" style="max-width: 900px; margin: -60px auto 50px; position: relative; z-index: 3;">
    <div class="card"
        style="background: white; padding: 50px; border-radius: 20px; box-shadow: 0 15px 40px rgba(0,0,0,0.08);">

        <div class="article-meta"
            style="display: flex; flex-wrap: wrap; justify-content: space-between; align-items: center; margin-bottom: 40px; border-bottom: 1px solid #eee; padding-bottom: 25px; gap: 20px;">
            <div style="display: flex; gap: 30px;">
                <span style="font-size: 16px; color: #333;">
                    <i class="fas fa-clock" style="color: #fbbf24; margin-right: 8px;"></i>
                    Durasi: <strong><?= $visa['duration_days'] ?> Hari</strong>
                </span>
                <span style="font-size: 16px; color: #333;">
                    <i class="fas fa-tag" style="color: #fbbf24; margin-right: 8px;"></i>
                    Biaya: <strong style="color: #2563eb;">Rp <?= number_format($visa['price'], 0, ',', '.') ?></strong>
                </span>
            </div>
            <a href="<?= base_url('persyaratan') ?>"
                style="text-decoration: none; color: #64748b; font-weight: 500; font-size: 14px;">
                <i class="fas fa-arrow-left"></i> Kembali ke Daftar
            </a>
        </div>

        <div class="article-content" style="font-size: 16px; line-height: 1.8; color: #333; margin-bottom: 40px;">
            <h3 style="color: #1e293b; margin-bottom: 20px; font-weight: 700;">
                <i class="fas fa-book-open" style="color: #2563eb; margin-right: 10px;"></i>
                Deskripsi & Regulasi
            </h3>

            <?php if (empty($visa['regulation_content'])): ?>
                <div style="padding: 20px; background: #f8fafc; border-radius: 8px; color: #666; font-style: italic;">
                    Detail regulasi lengkap belum ditambahkan oleh admin. Namun, Anda tetap dapat melihat persyaratan
                    dokumen di bawah ini.
                </div>
            <?php else: ?>
                <div style="text-align: justify;">
                    <?= nl2br($visa['regulation_content']) ?>
                </div>
            <?php endif; ?>
        </div>

        <div class="requirements-box" style="margin-bottom: 50px;">
            <h3 style="color: #1e293b; margin-bottom: 20px; font-weight: 700;">
                <i class="fas fa-file-contract" style="color: #2563eb; margin-right: 10px;"></i>
                Dokumen yang Diperlukan
            </h3>

            <?php if (empty($requirements)): ?>
                <p style="color: #666; background: #fff3cd; padding: 15px; border-radius: 8px;">
                    <i class="fas fa-exclamation-circle"></i> Tidak ada dokumen khusus yang tercatat di sistem.
                </p>
            <?php else: ?>
                <div style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 12px; overflow: hidden;">
                    <ul style="list-style: none; padding: 0; margin: 0;">
                        <?php foreach ($requirements as $req): ?>
                            <li style="
                                display: flex; 
                                align-items: center; 
                                padding: 15px 20px; 
                                border-bottom: 1px dashed #e2e8f0;
                                transition: 0.3s;
                            " onmouseover="this.style.background='#f1f5f9'"
                                onmouseout="this.style.background='transparent'">

                                <div style="
                                    width: 35px; height: 35px; 
                                    background: #dcfce7; color: #16a34a; 
                                    border-radius: 50%; display: flex; 
                                    align-items: center; justify-content: center; 
                                    margin-right: 15px; flex-shrink: 0;
                                ">
                                    <i class="fas fa-check"></i>
                                </div>

                                <div style="flex: 1;">
                                    <strong style="display: block; color: #1e293b; font-size: 16px; margin-bottom: 2px;">
                                        <?= esc($req['document_name']) ?>
                                    </strong>
                                    <div style="font-size: 13px; color: #64748b;">
                                        <span
                                            style="background: #e0eaff; color: #2563eb; padding: 2px 8px; border-radius: 4px; margin-right: 5px;">
                                            <?= strtoupper($req['file_type']) ?>
                                        </span>
                                        <?php if ($req['is_mandatory']): ?>
                                            <span style="color: #dc2626; font-weight: 600;">* Wajib</span>
                                        <?php else: ?>
                                            <span style="color: #64748b;">(Opsional)</span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
        </div>

        <div
            style="padding: 40px; background: linear-gradient(135deg, #f0f9ff 0%, #e0eaff 100%); border-radius: 15px; text-align: center;">
            <h3 style="margin-top: 0; color: #1e293b; margin-bottom: 10px;">Siap untuk Mengajukan Visa?</h3>
            <p style="color: #475569; margin-bottom: 25px; max-width: 600px; margin-left: auto; margin-right: auto;">
                Jika dokumen Anda sudah siap, silakan lanjutkan proses pengajuan. Kami akan membantu memeriksa
                kelengkapan berkas Anda.
            </p>

            <a href="<?= base_url('booking?service=' . $visa['code']) ?>" style="
                display: inline-flex;
                align-items: center;
                justify-content: center;
                background: #2563eb; 
                color: white; 
                padding: 15px 40px; 
                border-radius: 50px; 
                font-weight: bold; 
                text-decoration: none;
                font-size: 18px;
                box-shadow: 0 10px 25px rgba(37, 99, 235, 0.3);
                transition: transform 0.2s ease, box-shadow 0.2s ease;
            " onmouseover="this.style.transform='translateY(-3px)'; this.style.boxShadow='0 15px 30px rgba(37, 99, 235, 0.4)'"
                onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 10px 25px rgba(37, 99, 235, 0.3)'">
                Ajukan <?= esc($visa['name']) ?> Sekarang <i class="fas fa-paper-plane" style="margin-left: 10px;"></i>
            </a>
        </div>

    </div>
</div>

<div style="text-align: center; padding-bottom: 40px; color: #94a3b8; font-size: 14px;">
    &copy; <?= date('Y') ?> Bali Fantastic Visas. All Rights Reserved.
</div>

<?= $this->endSection() ?>