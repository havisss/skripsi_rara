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
                <button class="btn btn-outline">
                    <i class="fas fa-file-export"></i> Export Excel
                </button>
                <button class="btn btn-primary">
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
                    <h3><?= $stats['total'] ?></h3>
                    <p>Total Klien</p>
                    <small class="text-success">Terdaftar di sistem</small>
                </div>
            </div>

            <div class="crm-stat-card">
                <div class="crm-stat-icon" style="background: #e8f5e9;">
                    <i class="fas fa-user-check" style="color: #28a745;"></i>
                </div>
                <div class="crm-stat-details">
                    <h3><?= $stats['active'] ?></h3>
                    <p>Klien Aktif</p>
                    <small class="text-muted">Memiliki visa valid</small>
                </div>
            </div>

            <div class="crm-stat-card">
                <div class="crm-stat-icon" style="background: #fff3e0;">
                    <i class="fas fa-sync-alt" style="color: #ff9800;"></i>
                </div>
                <div class="crm-stat-details">
                    <h3><?= $stats['returning'] ?></h3>
                    <p>Returning Customer</p>
                    <small class="text-muted">> 1x Order</small>
                </div>
            </div>

            <div class="crm-stat-card">
                <div class="crm-stat-icon" style="background: #ffebee;">
                    <i class="fas fa-clock" style="color: #dc3545;"></i>
                </div>
                <div class="crm-stat-details">
                    <h3><?= $stats['expiring'] ?></h3>
                    <p>Visa Expiring Soon</p>
                    <small class="text-danger"><i class="fas fa-exclamation-circle"></i> Dalam 30 hari</small>
                </div>
            </div>
        </div>

        <!-- FILTER & SEARCH -->
        <div class="crm-filter-section">
            <div class="crm-search-box">
                <i class="fas fa-search"></i>
                <input type="text" placeholder="Cari nama, email, passport, atau phone number...">
            </div>

            <div class="crm-filter-group">
                <select class="crm-filter-select">
                    <option value="">Semua Negara</option>
                    <option value="australia">Australia</option>
                    <option value="usa">United States</option>
                    <option value="uk">United Kingdom</option>
                    <option value="japan">Japan</option>
                    <option value="singapore">Singapore</option>
                </select>

                <select class="crm-filter-select">
                    <option value="">Status Visa</option>
                    <option value="active">Active</option>
                    <option value="expired">Expired</option>
                    <option value="pending">Pending</option>
                </select>

                <select class="crm-filter-select">
                    <option value="">Urutkan</option>
                    <option value="newest">Terbaru</option>
                    <option value="oldest">Terlama</option>
                    <option value="name_asc">Nama A-Z</option>
                    <option value="name_desc">Nama Z-A</option>
                    <option value="most_apps">Paling Banyak Aplikasi</option>
                </select>

                <button class="btn btn-outline btn-icon-only">
                    <i class="fas fa-filter"></i>
                </button>
            </div>
        </div>

        <!-- CLIENT CARDS -->
        <div class="client-grid">
            <?php if (empty($clients)): ?>
                <p style="text-align:center; grid-column: 1/-1; padding: 40px; color:#999;">Belum ada data klien.</p>
            <?php else: ?>
                <?php foreach ($clients as $client): ?>

                    <?php
                    // --- LOGIKA STATUS VISUAL ---
                    $cardClass = ''; // Default putih
                    $badgeClass = 'new-badge';
                    $badgeIcon = 'fa-star';
                    $badgeText = 'New';
                    $statusDot = 'offline'; // Titik abu-abu

                    // Siapkan tanggal untuk perhitungan
                    $expiryDate = $client['last_expiry'] ? new DateTime($client['last_expiry']) : null;
                    $today = new DateTime();

                    // 1. Cek User AKTIF (Visa Approved & Belum Expired)
                    if ($client['last_status'] == 'approved' && $expiryDate > $today) {
                        $diff = $today->diff($expiryDate)->days;

                        // Kalau sisa kurang dari 30 hari -> WARNA KUNING (Warning)
                        if ($diff <= 30) {
                            $cardClass = 'expiring-client';
                            $badgeClass = 'warning-badge';
                            $badgeIcon = 'fa-exclamation-triangle';
                            $badgeText = 'Expires Soon';
                            $statusDot = 'away'; // Titik kuning
                        } else {
                            // Masih lama -> WARNA HIJAU (Active)
                            $cardClass = '';
                            $badgeClass = 'active-badge';
                            $badgeIcon = 'fa-check-circle';
                            $badgeText = 'Active';
                            $statusDot = 'online'; // Titik hijau
                        }
                    }
                    // 2. Cek User EXPIRED (Visa Approved tapi Sudah Lewat Tanggal)
                    elseif ($client['last_status'] == 'approved' && $expiryDate < $today) {
                        $cardClass = 'expired-client';
                        $badgeClass = 'expired-badge';
                        $badgeIcon = 'fa-times-circle';
                        $badgeText = 'Expired';
                        $statusDot = 'offline';
                    }
                    // 3. Cek User PENDING (Sedang proses bikin visa)
                    elseif (in_array($client['last_status'], ['verification_process', 'submitted_immigration'])) {
                        $badgeClass = 'new-badge'; // Pakai warna biru
                        $badgeIcon = 'fa-spinner fa-spin';
                        $badgeText = 'Processing';
                        $statusDot = 'away';
                    }
                    ?>

                    <div class="client-card <?= $cardClass ?>">
                        <div class="client-card-header">
                            <div class="client-avatar-wrapper">
                                <img src="https://ui-avatars.com/api/?name=<?= urlencode($client['full_name']) ?>&background=random&color=fff"
                                    alt="Client">
                                <span class="client-status <?= $statusDot ?>"></span>
                            </div>
                            <div class="client-badge <?= $badgeClass ?>">
                                <i class="fas <?= $badgeIcon ?>"></i> <?= $badgeText ?>
                            </div>
                        </div>

                        <div class="client-card-body">
                            <h3 class="client-name"><?= esc($client['full_name']) ?></h3>
                            <p class="client-email"><?= esc($client['email']) ?></p>

                            <div class="client-details">
                                <div class="client-detail-item">
                                    <i class="fas fa-flag"></i>
                                    <span><?= esc($client['nationality'] ?? '-') ?></span>
                                </div>
                                <div class="client-detail-item">
                                    <i class="fas fa-phone"></i>
                                    <span><?= esc($client['phone_number'] ?? '-') ?></span>
                                </div>
                                <div class="client-detail-item">
                                    <i class="fas fa-passport"></i>
                                    <span><?= esc($client['passport_number'] ?? '-') ?></span>
                                </div>
                            </div>

                            <div class="client-visa-info">
                                <div class="visa-info-item">
                                    <span class="visa-label">Visa Terakhir</span>
                                    <span class="visa-value">
                                        <?= $client['last_visa_code'] ?? '-' ?>
                                    </span>
                                </div>
                                <div class="visa-info-item">
                                    <span class="visa-label">Total Aplikasi</span>
                                    <span class="visa-value"><?= $client['total_orders'] ?> kali</span>
                                </div>
                            </div>

                            <?php if ($expiryDate): ?>
                                <?php
                                $expiryTextClass = ($expiryDate < $today) ? 'expired' : (($today->diff($expiryDate)->days <= 30) ? 'warning' : '');
                                ?>
                                <div class="client-expiry <?= $expiryTextClass ?>">
                                    <i class="fas fa-calendar-alt"></i>
                                    <span>Expires: <strong><?= $expiryDate->format('d M Y') ?></strong></span>
                                </div>
                            <?php else: ?>
                                <div class="client-expiry pending">
                                    <i class="fas fa-info-circle"></i>
                                    <span>Belum ada visa aktif</span>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="client-card-footer">
                            <button class="btn-client-action btn-view-history">
                                <i class="fas fa-history"></i> Riwayat
                            </button>
                            <?php if ($badgeText == 'Expired'): ?>
                                <button class="btn-client-action btn-offer-renewal" style="color: #d63384;">
                                    <i class="fas fa-redo"></i> Renewal
                                </button>
                            <?php else: ?>
                                <button class="btn-client-action btn-send-message">
                                    <i class="fas fa-envelope"></i> Pesan
                                </button>
                            <?php endif; ?>

                            <button class="btn-client-action btn-more">
                                <i class="fas fa-ellipsis-h"></i>
                            </button>
                        </div>
                    </div>

                <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <!-- PAGINATION -->
        <div class="crm-pagination">
            <p class="pagination-info">Showing 1-6 of 247 clients</p>
            <div class="pagination">
                <button class="page-btn" disabled>
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button class="page-btn active">1</button>
                <button class="page-btn">2</button>
                <button class="page-btn">3</button>
                <button class="page-btn">...</button>
                <button class="page-btn">42</button>
                <button class="page-btn">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>