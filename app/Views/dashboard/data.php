<?= $this->extend('dashboard/sidebaradmin') ?>
<?= $this->section('content') ?>

<!-- MAIN CONTENT -->
<div class="main-content">
    <!-- DASHBOARD CONTENT -->
    <div class="dashboard-content">
        <div class="page-header">
            <div>
                <h1 class="page-title">Database Klien (CRM)</h1>
                <p class="page-subtitle">Kelola data pengguna dan riwayat visa mereka</p>
            </div>
            <div class="page-actions">
                <button class="btn btn-outline"
                    onclick="window.location.href='<?= base_url('dashboard/data/export') ?>' + window.location.search">
                    <i class="fas fa-file-export"></i> Export Excel (.xlsx)
                </button>

                <button class="btn btn-primary"
                    onclick="document.getElementById('addClientModal').style.display='flex'">
                    <i class="fas fa-user-plus"></i> Tambah Klien
                </button>
            </div>
        </div>

        <!-- STATS OVERVIEW -->
        <div class="crm-stats">
            <div class="crm-stat-card">
                <div class="crm-stat-icon" style="background: #e3f2fd;">
                    <i class="fas fa-users" style="color: #0d6efd;"></i>
                </div>
                <div class="crm-stat-details">
                    <h3><?= $stat_total; ?></h3>
                    <p>Total Klien</p>
                    <small class="text-success">Terdaftar</small>
                </div>
            </div>

            <div class="crm-stat-card">
                <div class="crm-stat-icon" style="background: #e8f5e9;">
                    <i class="fas fa-user-check" style="color: #28a745;"></i>
                </div>
                <div class="crm-stat-details">
                    <h3><?= $stat_active; ?></h3>
                    <p>Klien Aktif</p>
                    <small class="text-muted">Visa Approved</small>
                </div>
            </div>

            <div class="crm-stat-card">
                <div class="crm-stat-icon" style="background: #fff3e0;">
                    <i class="fas fa-sync-alt" style="color: #ff9800;"></i>
                </div>
                <div class="crm-stat-details">
                    <h3><?= $stat_returning; ?></h3>
                    <p>Returning Customer</p>
                    <small class="text-muted">Loyal Clients</small>
                </div>
            </div>

            <div class="crm-stat-card">
                <div class="crm-stat-icon" style="background: #ffebee;">
                    <i class="fas fa-clock" style="color: #dc3545;"></i>
                </div>
                <div class="crm-stat-details">
                    <h3><?= $stat_expiring; ?></h3>
                    <p>Visa Expiring Soon</p>
                    <small class="text-danger">Dalam 30 hari</small>
                </div>
            </div>
        </div>

        <!-- FILTER & SEARCH -->
        <form method="get" action="<?= base_url('dashboard/data') ?>">
            <div class="crm-filter-section">
                <div class="crm-search-box">
                    <i class="fas fa-search"></i>
                    <input type="text" name="keyword" value="<?= $filters['keyword'] ?>"
                        placeholder="Cari nama, email, passport, atau HP...">
                </div>

                <div class="crm-filter-group">
                    <select class="crm-filter-select" name="nationality">
                        <option value="">Semua Negara</option>
                        <option value="Indonesia" <?= ($filters['nationality'] == 'Indonesia') ? 'selected' : '' ?>>
                            Indonesia</option>
                        <option value="Australia" <?= ($filters['nationality'] == 'Australia') ? 'selected' : '' ?>>
                            Australia</option>
                        <option value="USA" <?= ($filters['nationality'] == 'USA') ? 'selected' : '' ?>>United States
                        </option>
                        <option value="UK" <?= ($filters['nationality'] == 'UK') ? 'selected' : '' ?>>United Kingdom
                        </option>
                    </select>

                    <select class="crm-filter-select" name="status">
                        <option value="">Status Visa</option>
                        <option value="active" <?= ($filters['status'] == 'active') ? 'selected' : '' ?>>Active</option>
                        <option value="pending" <?= ($filters['status'] == 'pending') ? 'selected' : '' ?>>Pending
                        </option>
                    </select>

                    <select class="crm-filter-select" name="sort">
                        <option value="newest" <?= ($filters['sort'] == 'newest') ? 'selected' : '' ?>>Terbaru</option>
                        <option value="oldest" <?= ($filters['sort'] == 'oldest') ? 'selected' : '' ?>>Terlama</option>
                        <option value="name_asc" <?= ($filters['sort'] == 'name_asc') ? 'selected' : '' ?>>Nama A-Z
                        </option>
                        <option value="most_apps" <?= ($filters['sort'] == 'most_apps') ? 'selected' : '' ?>>Paling
                            Banyak Aplikasi</option>
                    </select>

                    <button type="submit" class="btn btn-outline btn-icon-only" title="Terapkan Filter">
                        <i class="fas fa-filter"></i>
                    </button>

                    <a href="<?= base_url('dashboard/data') ?>" class="btn btn-outline btn-icon-only" title="Reset"
                        style="border-color: #dc3545; color: #dc3545;">
                        <i class="fas fa-redo"></i>
                    </a>
                </div>
            </div>
        </form>

        <!-- CLIENT CARDS -->
        <div class="client-grid">

            <?php if (empty($clients)): ?>
            <div style="grid-column: 1/-1; text-align:center; padding:50px; background:white; border-radius:10px;">
                <i class="fas fa-users-slash" style="font-size:50px; color:#ccc; margin-bottom:20px;"></i>
                <h3>Belum ada data klien</h3>
                <p>Data akan muncul setelah ada user yang mendaftar.</p>
            </div>
            <?php else: ?>

            <?php foreach ($clients as $client): ?>
            <div class="client-card">
                <div class="client-card-header">
                    <div class="client-avatar-wrapper">
                        <img src="https://ui-avatars.com/api/?name=<?= urlencode($client['full_name']) ?>&background=random&color=fff"
                            alt="Client">
                        <span class="client-status online"></span>
                    </div>

                    <?php if ($client['last_status'] == 'approved'): ?>
                    <div class="client-badge active-badge"><i class="fas fa-check-circle"></i> Active</div>
                    <?php elseif ($client['last_status'] == 'payment_pending'): ?>
                    <div class="client-badge new-badge"><i class="fas fa-star"></i> New</div>
                    <?php else: ?>
                    <div class="client-badge warning-badge"><i class="fas fa-user"></i> Member</div>
                    <?php endif; ?>
                </div>

                <div class="client-card-body">
                    <h3 class="client-name"><?= esc($client['full_name']); ?></h3>
                    <p class="client-email"><?= esc($client['email']); ?></p>

                    <div class="client-details">
                        <div class="client-detail-item">
                            <i class="fas fa-flag"></i>
                            <span><?= esc($client['nationality'] ?? 'Indonesia'); ?></span>
                        </div>
                        <div class="client-detail-item">
                            <i class="fas fa-phone"></i>
                            <span><?= esc($client['phone_number']); ?></span>
                        </div>
                        <div class="client-detail-item">
                            <i class="fas fa-passport"></i>
                            <span><?= esc($client['passport_number'] ?? '-'); ?></span>
                        </div>
                    </div>

                    <div class="client-visa-info">
                        <div class="visa-info-item">
                            <span class="visa-label">Visa Terakhir</span>
                            <span class="visa-value">
                                <?= $client['last_visa_code'] ? strtoupper($client['last_visa_code']) : 'Belum Ada'; ?>
                            </span>
                        </div>
                        <div class="visa-info-item">
                            <span class="visa-label">Total Aplikasi</span>
                            <span class="visa-value"><?= $client['total_orders']; ?> kali</span>
                        </div>
                    </div>

                    <div class="client-expiry">
                        <i class="fas fa-calendar-alt"></i>
                        <?php if ($client['last_expiry']): ?>
                        <span>Expires: <strong><?= date('d M Y', strtotime($client['last_expiry'])); ?></strong></span>
                        <?php else: ?>
                        <span class="text-muted">Belum ada visa aktif</span>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="client-card-footer">
                    <button class="btn-client-action btn-view-history"
                        onclick="alert('Fitur History ID: <?= $client['id'] ?>')">
                        <i class="fas fa-history"></i> Riwayat
                    </button>
                    <a href="https://wa.me/<?= preg_replace('/[^0-9]/', '', $client['phone_number']); ?>"
                        target="_blank" class="btn-client-action btn-send-message">
                        <i class="fab fa-whatsapp"></i> Chat
                    </a>
                </div>
            </div>
            <?php endforeach; ?>

            <?php endif; ?>
        </div>

        <!-- PAGINATION -->
        <div class="crm-pagination"
            style="margin-top: 30px; display: flex; justify-content: space-between; align-items: center;">
            <div class="pagination-info" style="color: #666; font-size: 14px;">
                Menampilkan halaman <?= $pager->getCurrentPage('clients') ?> dari <?= $pager->getPageCount('clients') ?>
            </div>

            <div class="pagination-wrapper">
                <?= $pager->links('clients', 'default_full') ?>
            </div>
        </div>
    </div>
</div>

<div id="addClientModal"
    style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.5); z-index:9999; align-items:center; justify-content:center;">

    <div
        style="background:white; width:500px; padding:30px; border-radius:10px; box-shadow:0 5px 20px rgba(0,0,0,0.2); position:relative; animation: slideDown 0.3s ease;">

        <h2 style="margin-top:0; margin-bottom:20px; color:#333;">Tambah Klien Baru</h2>

        <form action="<?= base_url('dashboard/data/add') ?>" method="post">

            <div style="margin-bottom:15px;">
                <label style="display:block; margin-bottom:5px; font-weight:bold;">Nama Lengkap</label>
                <input type="text" name="full_name" required placeholder="Sesuai Paspor"
                    style="width:100%; padding:10px; border:1px solid #ddd; border-radius:5px;">
            </div>

            <div style="display:flex; gap:15px; margin-bottom:15px;">
                <div style="flex:1;">
                    <label style="display:block; margin-bottom:5px; font-weight:bold;">Email</label>
                    <input type="email" name="email" required placeholder="email@contoh.com"
                        style="width:100%; padding:10px; border:1px solid #ddd; border-radius:5px;">
                </div>
                <div style="flex:1;">
                    <label style="display:block; margin-bottom:5px; font-weight:bold;">WhatsApp</label>
                    <input type="text" name="phone_number" required placeholder="628..."
                        style="width:100%; padding:10px; border:1px solid #ddd; border-radius:5px;">
                </div>
            </div>

            <div style="display:flex; gap:15px; margin-bottom:15px;">
                <div style="flex:1;">
                    <label style="display:block; margin-bottom:5px; font-weight:bold;">Kewarganegaraan</label>
                    <select name="nationality"
                        style="width:100%; padding:10px; border:1px solid #ddd; border-radius:5px;">
                        <option value="Indonesia">Indonesia</option>
                        <option value="Australia">Australia</option>
                        <option value="USA">USA</option>
                        <option value="UK">UK</option>
                        <option value="Russia">Russia</option>
                        <option value="China">China</option>
                        <option value="India">India</option>
                    </select>
                </div>
                <div style="flex:1;">
                    <label style="display:block; margin-bottom:5px; font-weight:bold;">No. Paspor</label>
                    <input type="text" name="passport_number" placeholder="X1234567"
                        style="width:100%; padding:10px; border:1px solid #ddd; border-radius:5px;">
                </div>
            </div>

            <p style="font-size:12px; color:#666; margin-bottom:20px;">
                * Password default untuk akun ini adalah: <strong>123456</strong>
            </p>

            <div style="text-align:right; border-top:1px solid #eee; padding-top:20px;">
                <button type="button" onclick="document.getElementById('addClientModal').style.display='none'"
                    style="padding:10px 20px; background:transparent; border:1px solid #ccc; border-radius:5px; cursor:pointer; margin-right:10px;">Batal</button>
                <button type="submit"
                    style="padding:10px 20px; background:#0d6efd; color:white; border:none; border-radius:5px; cursor:pointer;">Simpan
                    Data</button>
            </div>
        </form>
    </div>
</div>

<script>
// Tutup modal jika klik di luar area putih
window.onclick = function(event) {
    let modal = document.getElementById('addClientModal');
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

<style>
@keyframes slideDown {
    from {
        transform: translateY(-20px);
        opacity: 0;
    }

    to {
        transform: translateY(0);
        opacity: 1;
    }
}
</style>
<?= $this->endSection() ?>