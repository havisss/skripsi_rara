<style>
/* CSS Scoping */
.profile-sidebar * {
    box-sizing: border-box;
}

/* LAYOUT UTAMA */
.profile-sidebar .sidebar-header {
    flex: 0 0 auto;
    padding: 20px;
    background: #fff;
    border-bottom: 1px solid #e2e8f0;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.profile-sidebar .sidebar-header h3 {
    margin: 0;
    font-size: 1.2rem;
    color: #1e293b;
    font-weight: 700;
}

.profile-sidebar .close-btn {
    background: none;
    border: none;
    font-size: 1.5rem;
    color: #64748b;
    cursor: pointer;
}

/* TABS */
.profile-sidebar .sidebar-tabs {
    display: flex;
    background: #f1f5f9;
    padding: 5px;
    border-bottom: 1px solid #e2e8f0;
    flex: 0 0 auto;
}

.profile-sidebar .tab-btn {
    flex: 1;
    text-align: center;
    padding: 10px;
    font-size: 0.9rem;
    font-weight: 600;
    color: #64748b;
    background: transparent;
    border: none;
    cursor: pointer;
    border-radius: 6px;
    transition: 0.2s;
}

.profile-sidebar .tab-btn.active {
    background: #fff;
    color: #2563eb;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
}

/* BODY & CONTENT */
.profile-sidebar .sidebar-body {
    flex: 1 1 auto;
    padding: 20px;
    overflow-y: auto;
    background: #f8fafc;
}

.profile-sidebar .tab-content {
    display: none;
    animation: fadeIn 0.3s;
}

.profile-sidebar .tab-content.active {
    display: block;
}

.profile-sidebar .sidebar-footer {
    flex: 0 0 auto;
    padding: 20px;
    border-top: 1px solid #e2e8f0;
    background: #fff;
}

/* COMPONENTS */
.profile-sidebar .visa-status-card {
    background: #fff;
    border: 1px solid #cbd5e1;
    border-radius: 12px;
    padding: 20px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.03);
    margin-bottom: 20px;
}

.profile-sidebar .visa-header {
    display: flex;
    justify-content: space-between;
    margin-bottom: 12px;
    font-size: 0.8rem;
    color: #64748b;
    border-bottom: 1px dashed #e2e8f0;
    padding-bottom: 8px;
}

.profile-sidebar .visa-title {
    font-weight: 800;
    font-size: 1.1rem;
    color: #0f172a;
    margin-bottom: 15px;
}

.profile-sidebar .status-badge {
    display: block;
    width: 100%;
    text-align: center;
    padding: 10px;
    border-radius: 8px;
    font-size: 0.8rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin-bottom: 20px;
}

.status-pending {
    background: #fff7ed;
    color: #ea580c;
    border: 1px solid #fed7aa;
}

.status-process {
    background: #eff6ff;
    color: #2563eb;
    border: 1px solid #bfdbfe;
}

.status-approved {
    background: #f0fdf4;
    color: #16a34a;
    border: 1px solid #bbf7d0;
}

.status-rejected {
    background: #fef2f2;
    color: #dc2626;
    border: 1px solid #fecaca;
}

/* TIMELINE */
.profile-sidebar .timeline {
    margin-top: 20px;
    padding-left: 10px;
    border-left: 2px solid #e2e8f0;
}

.profile-sidebar .timeline-item {
    position: relative;
    padding-left: 25px;
    margin-bottom: 25px;
}

.profile-sidebar .timeline-item::before {
    content: '';
    position: absolute;
    left: -6px;
    top: 5px;
    width: 10px;
    height: 10px;
    border-radius: 50%;
    background: #cbd5e1;
}

.profile-sidebar .timeline-item.active::before {
    background: #2563eb;
    box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.2);
}

.profile-sidebar .timeline-item.done::before {
    background: #16a34a;
}

.profile-sidebar .timeline-title {
    font-weight: 600;
    font-size: 0.95rem;
    color: #334155;
}

.profile-sidebar .timeline-desc {
    font-size: 0.8rem;
    color: #64748b;
}

/* ACTION BUTTONS & ALERTS */
.profile-sidebar .action-area {
    display: flex;
    flex-direction: column;
    gap: 10px;
    margin-top: 25px;
}

/* Tombol Bayar (Kuning/Emas) */
.profile-sidebar .btn-pay {
    display: block;
    width: 100%;
    padding: 12px;
    background: #fbbf24;
    color: #1e293b;
    border-radius: 8px;
    text-align: center;
    text-decoration: none;
    font-weight: bold;
    border: none;
    transition: 0.2s;
}

.profile-sidebar .btn-pay:hover {
    background: #f59e0b;
    transform: translateY(-2px);
}

/* Tombol Upload (Biru) */
.profile-sidebar .btn-upload {
    display: block;
    width: 100%;
    padding: 12px;
    background: #2563eb;
    color: white;
    border-radius: 8px;
    text-align: center;
    text-decoration: none;
    font-weight: bold;
    border: none;
    transition: 0.2s;
}

.profile-sidebar .btn-upload:hover {
    background: #1d4ed8;
    transform: translateY(-2px);
}

.profile-sidebar .alert-box {
    background: #fff1f2;
    border: 1px solid #fecdd3;
    border-radius: 8px;
    padding: 12px;
}

.profile-sidebar .btn-logout {
    display: block;
    width: 100%;
    padding: 12px;
    background: white;
    border: 2px solid #fee2e2;
    color: #dc2626;
    border-radius: 8px;
    font-weight: 600;
    text-align: center;
    text-decoration: none;
}

/* FORM */
.profile-sidebar .form-group {
    margin-bottom: 15px;
}

.profile-sidebar label {
    display: block;
    font-size: 0.85rem;
    margin-bottom: 5px;
    font-weight: 600;
}

.profile-sidebar input {
    width: 100%;
    padding: 10px;
    border: 1px solid #cbd5e1;
    border-radius: 6px;
}

.profile-sidebar .btn-save {
    width: 100%;
    background: #2563eb;
    color: white;
    border: none;
    padding: 12px;
    border-radius: 6px;
    font-weight: bold;
    cursor: pointer;
}
</style>

<div class="sidebar-header">
    <h3>Halo, <?= explode(' ', $user['full_name'])[0] ?>!</h3>
    <button class="close-btn" onclick="closeProfileSidebar()">&times;</button>
</div>

<div class="sidebar-tabs">
    <button class="tab-btn active" onclick="switchTab('tab-status', this)">Status</button>
    <button class="tab-btn" onclick="switchTab('tab-history', this)">Riwayat</button>
    <button class="tab-btn" onclick="switchTab('tab-profile', this)">Edit Profil</button>
</div>

<div class="sidebar-body">

    <div id="tab-status" class="tab-content active">
        <?php if ($latest_app): ?>
        <div class="visa-status-card">
            <div class="visa-header">
                <span>#<?= $latest_app['invoice_number'] ?></span>
                <span><?= date('d M Y', strtotime($latest_app['created_at'])) ?></span>
            </div>
            <div class="visa-title"><?= $latest_app['visa_name'] ?></div>

            <?php
                    $s = $latest_app['status'];
                    $badgeClass = 'status-process'; $statusText = 'Diproses';
                    if (in_array($s, ['payment_pending', 'upload_pending'])) { $badgeClass = 'status-pending'; $statusText = 'MENUNGGU USER'; }
                    elseif ($s == 'approved') { $badgeClass = 'status-approved'; $statusText = 'DISETUJUI'; }
                    elseif ($s == 'rejected') { $badgeClass = 'status-rejected'; $statusText = 'DITOLAK'; }
                ?>
            <span class="status-badge <?= $badgeClass ?>"><?= $statusText ?></span>

            <div class="timeline">
                <div class="timeline-item <?= ($latest_app['payment_status'] == 'paid') ? 'done' : 'active' ?>">
                    <div class="timeline-title">Pembayaran</div>
                    <div class="timeline-desc"><?= ($latest_app['payment_status'] == 'paid') ? 'Lunas' : 'Menunggu' ?>
                    </div>
                </div>
                <div class="timeline-item <?= ($uploaded_docs_count > 0) ? ($missing_docs ? 'active' : 'done') : '' ?>">
                    <div class="timeline-title">Dokumen</div>
                    <div class="timeline-desc"><?= $uploaded_docs_count ?> terupload</div>
                </div>
                <div class="timeline-item <?= ($s == 'verification_process' || $s == 'approved') ? 'active' : '' ?>">
                    <div class="timeline-title">Verifikasi Admin</div>
                </div>
                <div class="timeline-item <?= ($s == 'approved') ? 'done' : '' ?>">
                    <div class="timeline-title">Selesai</div>
                </div>
            </div>

            <div class="action-area">

                <?php if ($latest_app['payment_status'] == 'unpaid'): ?>
                <a href="<?= base_url('booking/success/' . $latest_app['invoice_number']) ?>" class="btn-pay">
                    <i class="fa-solid fa-money-bill-wave"></i> Bayar Tagihan Sekarang
                </a>
                <?php endif; ?>

                <?php if (!empty($missing_docs)): ?>
                <div class="alert-box">
                    <div style="font-weight:bold; color:#be123c; font-size:0.9rem; margin-bottom:5px;">
                        <i class="fa-solid fa-circle-exclamation"></i> Dokumen Kurang:
                    </div>
                    <ul style="margin:0; padding-left:20px; font-size:0.85rem; color:#be123c; margin-bottom: 10px;">
                        <?php foreach ($missing_docs as $doc): ?>
                        <li><?= $doc ?></li>
                        <?php endforeach; ?>
                    </ul>
                    <a href="<?= base_url('booking') ?>" class="btn-upload">
                        <i class="fa-solid fa-upload"></i> Upload Dokumen
                    </a>
                </div>
                <?php endif; ?>

            </div>
        </div>
        <?php else: ?>
        <div style="text-align: center; padding: 40px 0; color: #64748b;">
            <p>Belum ada pengajuan aktif.</p>
            <a href="<?= base_url('booking') ?>" class="btn-upload">Ajukan Visa</a>
        </div>
        <?php endif; ?>
    </div>

    <div id="tab-history" class="tab-content">
        <?php if (!empty($history_apps)): ?>
        <?php foreach($history_apps as $hist): ?>
        <div
            style="background:white; border:1px solid #e2e8f0; padding:15px; border-radius:8px; margin-bottom:10px; display:flex; justify-content:space-between; align-items:center;">
            <div>
                <h4 style="margin:0; font-size:0.9rem;"><?= $hist['visa_name'] ?></h4>
                <span style="font-size:0.75rem; color:#888;">#<?= $hist['invoice_number'] ?> •
                    <?= date('d/m/y', strtotime($hist['created_at'])) ?></span>
            </div>
            <span style="font-size:0.75rem; font-weight:bold; padding:4px 8px; border-radius:4px; background:#f1f5f9;">
                <?= strtoupper($hist['status']) ?>
            </span>
        </div>
        <?php endforeach; ?>
        <?php else: ?>
        <p style="text-align:center; color:#888; margin-top:30px;">Belum ada riwayat order lama.</p>
        <?php endif; ?>
    </div>

    <div id="tab-profile" class="tab-content">
        <form action="<?= base_url('myprofile/update') ?>" method="post">
            <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" name="full_name" value="<?= $user['full_name'] ?>" required>
            </div>
            <div class="form-group">
                <label>Nomor WhatsApp</label>
                <input type="text" name="phone_number" value="<?= $user['phone_number'] ?>" required>
            </div>
            <div class="form-group">
                <label>Password Baru</label>
                <input type="password" name="password" placeholder="Kosongkan jika tidak diganti">
            </div>
            <button type="submit" class="btn-save">Simpan Data</button>
        </form>
    </div>
</div>

<div class="sidebar-footer">
    <a href="<?= base_url('logout') ?>" class="btn-logout">
        <i class="fa-solid fa-right-from-bracket"></i> Keluar Aplikasi
    </a>
</div>