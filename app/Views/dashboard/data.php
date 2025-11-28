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
                    <h3>247</h3>
                    <p>Total Klien</p>
                    <small class="text-success"><i class="fas fa-arrow-up"></i> +12% bulan ini</small>
                </div>
            </div>

            <div class="crm-stat-card">
                <div class="crm-stat-icon" style="background: #e8f5e9;">
                    <i class="fas fa-user-check" style="color: #28a745;"></i>
                </div>
                <div class="crm-stat-details">
                    <h3>189</h3>
                    <p>Klien Aktif</p>
                    <small class="text-muted">Memiliki visa aktif</small>
                </div>
            </div>

            <div class="crm-stat-card">
                <div class="crm-stat-icon" style="background: #fff3e0;">
                    <i class="fas fa-sync-alt" style="color: #ff9800;"></i>
                </div>
                <div class="crm-stat-details">
                    <h3>34</h3>
                    <p>Returning Customer</p>
                    <small class="text-muted">Lebih dari 1 aplikasi</small>
                </div>
            </div>

            <div class="crm-stat-card">
                <div class="crm-stat-icon" style="background: #ffebee;">
                    <i class="fas fa-clock" style="color: #dc3545;"></i>
                </div>
                <div class="crm-stat-details">
                    <h3>23</h3>
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
            <!-- CLIENT 1 - VIP -->
            <div class="client-card vip-client">
                <div class="client-card-header">
                    <div class="client-avatar-wrapper">
                        <img src="https://ui-avatars.com/api/?name=John+Smith&background=0d6efd&color=fff" alt="Client">
                        <span class="client-status online"></span>
                    </div>
                    <div class="client-badge vip-badge">
                        <i class="fas fa-crown"></i> VIP
                    </div>
                </div>

                <div class="client-card-body">
                    <h3 class="client-name">John Smith</h3>
                    <p class="client-email">john.smith@email.com</p>

                    <div class="client-details">
                        <div class="client-detail-item">
                            <i class="fas fa-flag"></i>
                            <span>Australia</span>
                        </div>
                        <div class="client-detail-item">
                            <i class="fas fa-phone"></i>
                            <span>+62 812-3456-7890</span>
                        </div>
                        <div class="client-detail-item">
                            <i class="fas fa-passport"></i>
                            <span>A12345678</span>
                        </div>
                    </div>

                    <div class="client-visa-info">
                        <div class="visa-info-item">
                            <span class="visa-label">Visa Aktif</span>
                            <span class="visa-value">KITAS 317</span>
                        </div>
                        <div class="visa-info-item">
                            <span class="visa-label">Total Aplikasi</span>
                            <span class="visa-value">5 kali</span>
                        </div>
                    </div>

                    <div class="client-expiry">
                        <i class="fas fa-calendar-alt"></i>
                        <span>Visa expires: <strong>25 Dec 2025</strong></span>
                    </div>
                </div>

                <div class="client-card-footer">
                    <button class="btn-client-action btn-view-history">
                        <i class="fas fa-history"></i> Riwayat
                    </button>
                    <button class="btn-client-action btn-send-message">
                        <i class="fas fa-envelope"></i> Kirim Pesan
                    </button>
                    <button class="btn-client-action btn-more">
                        <i class="fas fa-ellipsis-h"></i>
                    </button>
                </div>
            </div>

            <!-- CLIENT 2 - EXPIRING SOON -->
            <div class="client-card expiring-client">
                <div class="client-card-header">
                    <div class="client-avatar-wrapper">
                        <img src="https://ui-avatars.com/api/?name=Maria+Garcia&background=6c757d&color=fff"
                            alt="Client">
                        <span class="client-status away"></span>
                    </div>
                    <div class="client-badge warning-badge">
                        <i class="fas fa-exclamation-triangle"></i> Expires Soon
                    </div>
                </div>

                <div class="client-card-body">
                    <h3 class="client-name">Maria Garcia</h3>
                    <p class="client-email">maria.garcia@email.com</p>

                    <div class="client-details">
                        <div class="client-detail-item">
                            <i class="fas fa-flag"></i>
                            <span>Spain</span>
                        </div>
                        <div class="client-detail-item">
                            <i class="fas fa-phone"></i>
                            <span>+62 813-9876-5432</span>
                        </div>
                        <div class="client-detail-item">
                            <i class="fas fa-passport"></i>
                            <span>B98765432</span>
                        </div>
                    </div>

                    <div class="client-visa-info">
                        <div class="visa-info-item">
                            <span class="visa-label">Visa Aktif</span>
                            <span class="visa-value">B211A</span>
                        </div>
                        <div class="visa-info-item">
                            <span class="visa-label">Total Aplikasi</span>
                            <span class="visa-value">2 kali</span>
                        </div>
                    </div>

                    <div class="client-expiry warning">
                        <i class="fas fa-exclamation-circle"></i>
                        <span>Visa expires: <strong class="text-danger">05 Dec 2025</strong> (12 days)</span>
                    </div>
                </div>

                <div class="client-card-footer">
                    <button class="btn-client-action btn-view-history">
                        <i class="fas fa-history"></i> Riwayat
                    </button>
                    <button class="btn-client-action btn-send-message">
                        <i class="fas fa-envelope"></i> Kirim Pesan
                    </button>
                    <button class="btn-client-action btn-more">
                        <i class="fas fa-ellipsis-h"></i>
                    </button>
                </div>
            </div>

            <!-- CLIENT 3 - REGULAR -->
            <div class="client-card">
                <div class="client-card-header">
                    <div class="client-avatar-wrapper">
                        <img src="https://ui-avatars.com/api/?name=David+Lee&background=28a745&color=fff" alt="Client">
                        <span class="client-status online"></span>
                    </div>
                    <div class="client-badge active-badge">
                        <i class="fas fa-check-circle"></i> Active
                    </div>
                </div>

                <div class="client-card-body">
                    <h3 class="client-name">David Lee</h3>
                    <p class="client-email">david.lee@email.com</p>

                    <div class="client-details">
                        <div class="client-detail-item">
                            <i class="fas fa-flag"></i>
                            <span>Singapore</span>
                        </div>
                        <div class="client-detail-item">
                            <i class="fas fa-phone"></i>
                            <span>+62 815-1234-5678</span>
                        </div>
                        <div class="client-detail-item">
                            <i class="fas fa-passport"></i>
                            <span>C11223344</span>
                        </div>
                    </div>

                    <div class="client-visa-info">
                        <div class="visa-info-item">
                            <span class="visa-label">Visa Aktif</span>
                            <span class="visa-value">VOA</span>
                        </div>
                        <div class="visa-info-item">
                            <span class="visa-label">Total Aplikasi</span>
                            <span class="visa-value">1 kali</span>
                        </div>
                    </div>

                    <div class="client-expiry">
                        <i class="fas fa-calendar-alt"></i>
                        <span>Visa expires: <strong>15 Jan 2026</strong></span>
                    </div>
                </div>

                <div class="client-card-footer">
                    <button class="btn-client-action btn-view-history">
                        <i class="fas fa-history"></i> Riwayat
                    </button>
                    <button class="btn-client-action btn-send-message">
                        <i class="fas fa-envelope"></i> Kirim Pesan
                    </button>
                    <button class="btn-client-action btn-more">
                        <i class="fas fa-ellipsis-h"></i>
                    </button>
                </div>
            </div>

            <!-- CLIENT 4 - NEW -->
            <div class="client-card new-client">
                <div class="client-card-header">
                    <div class="client-avatar-wrapper">
                        <img src="https://ui-avatars.com/api/?name=Sarah+Johnson&background=ffc107&color=000"
                            alt="Client">
                        <span class="client-status offline"></span>
                    </div>
                    <div class="client-badge new-badge">
                        <i class="fas fa-star"></i> New
                    </div>
                </div>

                <div class="client-card-body">
                    <h3 class="client-name">Sarah Johnson</h3>
                    <p class="client-email">sarah.j@email.com</p>

                    <div class="client-details">
                        <div class="client-detail-item">
                            <i class="fas fa-flag"></i>
                            <span>United States</span>
                        </div>
                        <div class="client-detail-item">
                            <i class="fas fa-phone"></i>
                            <span>+62 816-5555-1234</span>
                        </div>
                        <div class="client-detail-item">
                            <i class="fas fa-passport"></i>
                            <span>D55667788</span>
                        </div>
                    </div>

                    <div class="client-visa-info">
                        <div class="visa-info-item">
                            <span class="visa-label">Visa Aktif</span>
                            <span class="visa-value text-muted">-</span>
                        </div>
                        <div class="visa-info-item">
                            <span class="visa-label">Total Aplikasi</span>
                            <span class="visa-value">Pending</span>
                        </div>
                    </div>

                    <div class="client-expiry pending">
                        <i class="fas fa-hourglass-half"></i>
                        <span>Aplikasi sedang diproses</span>
                    </div>
                </div>

                <div class="client-card-footer">
                    <button class="btn-client-action btn-view-history">
                        <i class="fas fa-history"></i> Riwayat
                    </button>
                    <button class="btn-client-action btn-send-message">
                        <i class="fas fa-envelope"></i> Kirim Pesan
                    </button>
                    <button class="btn-client-action btn-more">
                        <i class="fas fa-ellipsis-h"></i>
                    </button>
                </div>
            </div>

            <!-- CLIENT 5 - EXPIRED -->
            <div class="client-card expired-client">
                <div class="client-card-header">
                    <div class="client-avatar-wrapper">
                        <img src="https://ui-avatars.com/api/?name=Robert+Chen&background=dc3545&color=fff"
                            alt="Client">
                        <span class="client-status offline"></span>
                    </div>
                    <div class="client-badge expired-badge">
                        <i class="fas fa-times-circle"></i> Expired
                    </div>
                </div>

                <div class="client-card-body">
                    <h3 class="client-name">Robert Chen</h3>
                    <p class="client-email">robert.chen@email.com</p>

                    <div class="client-details">
                        <div class="client-detail-item">
                            <i class="fas fa-flag"></i>
                            <span>China</span>
                        </div>
                        <div class="client-detail-item">
                            <i class="fas fa-phone"></i>
                            <span>+62 817-9999-8888</span>
                        </div>
                        <div class="client-detail-item">
                            <i class="fas fa-passport"></i>
                            <span>E99887766</span>
                        </div>
                    </div>

                    <div class="client-visa-info">
                        <div class="visa-info-item">
                            <span class="visa-label">Visa Terakhir</span>
                            <span class="visa-value">KITAS 317</span>
                        </div>
                        <div class="visa-info-item">
                            <span class="visa-label">Total Aplikasi</span>
                            <span class="visa-value">3 kali</span>
                        </div>
                    </div>

                    <div class="client-expiry expired">
                        <i class="fas fa-ban"></i>
                        <span>Visa expired: <strong class="text-danger">10 Oct 2025</strong></span>
                    </div>
                </div>

                <div class="client-card-footer">
                    <button class="btn-client-action btn-view-history">
                        <i class="fas fa-history"></i> Riwayat
                    </button>
                    <button class="btn-client-action btn-offer-renewal">
                        <i class="fas fa-redo"></i> Tawarkan Renewal
                    </button>
                    <button class="btn-client-action btn-more">
                        <i class="fas fa-ellipsis-h"></i>
                    </button>
                </div>
            </div>

            <!-- CLIENT 6 -->
            <div class="client-card">
                <div class="client-card-header">
                    <div class="client-avatar-wrapper">
                        <img src="https://ui-avatars.com/api/?name=Emma+Wilson&background=9c27b0&color=fff"
                            alt="Client">
                        <span class="client-status online"></span>
                    </div>
                    <div class="client-badge active-badge">
                        <i class="fas fa-check-circle"></i> Active
                    </div>
                </div>

                <div class="client-card-body">
                    <h3 class="client-name">Emma Wilson</h3>
                    <p class="client-email">emma.wilson@email.com</p>

                    <div class="client-details">
                        <div class="client-detail-item">
                            <i class="fas fa-flag"></i>
                            <span>United Kingdom</span>
                        </div>
                        <div class="client-detail-item">
                            <i class="fas fa-phone"></i>
                            <span>+62 818-7777-6666</span>
                        </div>
                        <div class="client-detail-item">
                            <i class="fas fa-passport"></i>
                            <span>F44556677</span>
                        </div>
                    </div>

                    <div class="client-visa-info">
                        <div class="visa-info-item">
                            <span class="visa-label">Visa Aktif</span>
                            <span class="visa-value">B211A</span>
                        </div>
                        <div class="visa-info-item">
                            <span class="visa-label">Total Aplikasi</span>
                            <span class="visa-value">4 kali</span>
                        </div>
                    </div>

                    <div class="client-expiry">
                        <i class="fas fa-calendar-alt"></i>
                        <span>Visa expires: <strong>20 Feb 2026</strong></span>
                    </div>
                </div>

                <div class="client-card-footer">
                    <button class="btn-client-action btn-view-history">
                        <i class="fas fa-history"></i> Riwayat
                    </button>
                    <button class="btn-client-action btn-send-message">
                        <i class="fas fa-envelope"></i> Kirim Pesan
                    </button>
                    <button class="btn-client-action btn-more">
                        <i class="fas fa-ellipsis-h"></i>
                    </button>
                </div>
            </div>
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