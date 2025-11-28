<?= $this->extend('dashboard/sidebaradmin') ?>
<?= $this->section('content') ?>

<!-- MAIN CONTENT -->
<div class="main-content">
    <!-- DASHBOARD CONTENT -->
    <div class="dashboard-content">
        <div class="page-header">
            <div>
                <h1 class="page-title">Management Service</h1>
                <p class="page-subtitle">Kelola jenis visa, harga, dan persyaratan dokumen</p>
            </div>
        </div>

        <!-- TABS NAVIGATION -->
        <div class="service-tabs">
            <button class="service-tab active" data-tab="visa-types">
                <i class="fas fa-passport"></i>
                <span>Jenis Visa & Harga</span>
            </button>
            <button class="service-tab" data-tab="requirements">
                <i class="fas fa-file-alt"></i>
                <span>Persyaratan Dokumen</span>
            </button>
            <button class="service-tab" data-tab="settings">
                <i class="fas fa-cog"></i>
                <span>Pengaturan Umum</span>
            </button>
        </div>

        <!-- TAB CONTENT: JENIS VISA & HARGA -->
        <div class="tab-content active" id="visa-types">
            <div class="content-header">
                <h2>Jenis Visa & Harga</h2>
                <button class="btn btn-primary">
                    <i class="fas fa-plus"></i> Tambah Jenis Visa
                </button>
            </div>

            <div class="visa-types-grid">
                <!-- VISA TYPE 1 - VOA -->
                <div class="visa-type-card active-service">
                    <div class="visa-type-header">
                        <div class="visa-type-badge voa">
                            <i class="fas fa-plane-arrival"></i>
                        </div>
                        <div class="visa-type-status">
                            <span class="status-indicator active"></span>
                            <span class="status-text">Active</span>
                        </div>
                    </div>

                    <div class="visa-type-body">
                        <h3 class="visa-type-name">VOA on Arrival</h3>
                        <p class="visa-type-code">Code: VOA-001</p>

                        <div class="visa-type-info">
                            <div class="info-item">
                                <span class="info-label">Harga</span>
                                <span class="info-value price">Rp 1,500,000</span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">Durasi</span>
                                <span class="info-value">30 hari</span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">Dokumen</span>
                                <span class="info-value">5 items</span>
                            </div>
                        </div>

                        <div class="visa-type-description">
                            <p>Visa on arrival untuk kunjungan singkat, dapat diperpanjang 1x hingga 60 hari.</p>
                        </div>

                        <div class="visa-type-stats">
                            <div class="stat-item">
                                <i class="fas fa-users"></i>
                                <span>234 aplikasi</span>
                            </div>
                            <div class="stat-item">
                                <i class="fas fa-chart-line"></i>
                                <span>+15% bulan ini</span>
                            </div>
                        </div>
                    </div>

                    <div class="visa-type-footer">
                        <button class="btn-action btn-edit">
                            <i class="fas fa-edit"></i> Edit
                        </button>
                        <button class="btn-action btn-view">
                            <i class="fas fa-eye"></i> Detail
                        </button>
                        <button class="btn-action btn-toggle">
                            <i class="fas fa-toggle-on"></i>
                        </button>
                    </div>
                </div>

                <!-- VISA TYPE 2 - B211A -->
                <div class="visa-type-card active-service">
                    <div class="visa-type-header">
                        <div class="visa-type-badge b211">
                            <i class="fas fa-calendar-plus"></i>
                        </div>
                        <div class="visa-type-status">
                            <span class="status-indicator active"></span>
                            <span class="status-text">Active</span>
                        </div>
                    </div>

                    <div class="visa-type-body">
                        <h3 class="visa-type-name">B211A Extension</h3>
                        <p class="visa-type-code">Code: B211-002</p>

                        <div class="visa-type-info">
                            <div class="info-item">
                                <span class="info-label">Harga</span>
                                <span class="info-value price">Rp 4,500,000</span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">Durasi</span>
                                <span class="info-value">60 hari</span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">Dokumen</span>
                                <span class="info-value">8 items</span>
                            </div>
                        </div>

                        <div class="visa-type-description">
                            <p>Visa sosial budaya untuk kunjungan lebih lama, dapat diperpanjang hingga 6 bulan.</p>
                        </div>

                        <div class="visa-type-stats">
                            <div class="stat-item">
                                <i class="fas fa-users"></i>
                                <span>156 aplikasi</span>
                            </div>
                            <div class="stat-item">
                                <i class="fas fa-chart-line"></i>
                                <span>+8% bulan ini</span>
                            </div>
                        </div>
                    </div>

                    <div class="visa-type-footer">
                        <button class="btn-action btn-edit">
                            <i class="fas fa-edit"></i> Edit
                        </button>
                        <button class="btn-action btn-view">
                            <i class="fas fa-eye"></i> Detail
                        </button>
                        <button class="btn-action btn-toggle">
                            <i class="fas fa-toggle-on"></i>
                        </button>
                    </div>
                </div>

                <!-- VISA TYPE 3 - KITAS 317 -->
                <div class="visa-type-card active-service">
                    <div class="visa-type-header">
                        <div class="visa-type-badge kitas">
                            <i class="fas fa-id-card"></i>
                        </div>
                        <div class="visa-type-status">
                            <span class="status-indicator active"></span>
                            <span class="status-text">Active</span>
                        </div>
                    </div>

                    <div class="visa-type-body">
                        <h3 class="visa-type-name">KITAS 317</h3>
                        <p class="visa-type-code">Code: KITAS-003</p>

                        <div class="visa-type-info">
                            <div class="info-item">
                                <span class="info-label">Harga</span>
                                <span class="info-value price">Rp 12,500,000</span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">Durasi</span>
                                <span class="info-value">1 tahun</span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">Dokumen</span>
                                <span class="info-value">12 items</span>
                            </div>
                        </div>

                        <div class="visa-type-description">
                            <p>Kartu izin tinggal terbatas untuk bekerja atau tinggal jangka panjang di Indonesia.</p>
                        </div>

                        <div class="visa-type-stats">
                            <div class="stat-item">
                                <i class="fas fa-users"></i>
                                <span>89 aplikasi</span>
                            </div>
                            <div class="stat-item">
                                <i class="fas fa-chart-line"></i>
                                <span>+12% bulan ini</span>
                            </div>
                        </div>
                    </div>

                    <div class="visa-type-footer">
                        <button class="btn-action btn-edit">
                            <i class="fas fa-edit"></i> Edit
                        </button>
                        <button class="btn-action btn-view">
                            <i class="fas fa-eye"></i> Detail
                        </button>
                        <button class="btn-action btn-toggle">
                            <i class="fas fa-toggle-on"></i>
                        </button>
                    </div>
                </div>

                <!-- VISA TYPE 4 - KITAP -->
                <div class="visa-type-card active-service">
                    <div class="visa-type-header">
                        <div class="visa-type-badge kitap">
                            <i class="fas fa-home"></i>
                        </div>
                        <div class="visa-type-status">
                            <span class="status-indicator active"></span>
                            <span class="status-text">Active</span>
                        </div>
                    </div>

                    <div class="visa-type-body">
                        <h3 class="visa-type-name">KITAP (Permanent Stay)</h3>
                        <p class="visa-type-code">Code: KITAP-004</p>

                        <div class="visa-type-info">
                            <div class="info-item">
                                <span class="info-label">Harga</span>
                                <span class="info-value price">Rp 25,000,000</span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">Durasi</span>
                                <span class="info-value">5 tahun</span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">Dokumen</span>
                                <span class="info-value">15 items</span>
                            </div>
                        </div>

                        <div class="visa-type-description">
                            <p>Kartu izin tinggal tetap untuk warga negara asing yang ingin menetap di Indonesia.</p>
                        </div>

                        <div class="visa-type-stats">
                            <div class="stat-item">
                                <i class="fas fa-users"></i>
                                <span>23 aplikasi</span>
                            </div>
                            <div class="stat-item">
                                <i class="fas fa-chart-line"></i>
                                <span>+5% bulan ini</span>
                            </div>
                        </div>
                    </div>

                    <div class="visa-type-footer">
                        <button class="btn-action btn-edit">
                            <i class="fas fa-edit"></i> Edit
                        </button>
                        <button class="btn-action btn-view">
                            <i class="fas fa-eye"></i> Detail
                        </button>
                        <button class="btn-action btn-toggle">
                            <i class="fas fa-toggle-on"></i>
                        </button>
                    </div>
                </div>

                <!-- VISA TYPE 5 - E-VOA (INACTIVE) -->
                <div class="visa-type-card inactive-service">
                    <div class="visa-type-header">
                        <div class="visa-type-badge evoa">
                            <i class="fas fa-globe"></i>
                        </div>
                        <div class="visa-type-status">
                            <span class="status-indicator inactive"></span>
                            <span class="status-text">Inactive</span>
                        </div>
                    </div>

                    <div class="visa-type-body">
                        <h3 class="visa-type-name">E-VOA (Electronic)</h3>
                        <p class="visa-type-code">Code: EVOA-005</p>

                        <div class="visa-type-info">
                            <div class="info-item">
                                <span class="info-label">Harga</span>
                                <span class="info-value price">Rp 800,000</span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">Durasi</span>
                                <span class="info-value">30 hari</span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">Dokumen</span>
                                <span class="info-value">3 items</span>
                            </div>
                        </div>

                        <div class="visa-type-description">
                            <p>Visa elektronik untuk aplikasi online sebelum kedatangan (sementara tidak aktif).</p>
                        </div>

                        <div class="visa-type-stats">
                            <div class="stat-item">
                                <i class="fas fa-users"></i>
                                <span>0 aplikasi</span>
                            </div>
                            <div class="stat-item">
                                <i class="fas fa-ban"></i>
                                <span>Ditangguhkan</span>
                            </div>
                        </div>
                    </div>

                    <div class="visa-type-footer">
                        <button class="btn-action btn-edit">
                            <i class="fas fa-edit"></i> Edit
                        </button>
                        <button class="btn-action btn-view">
                            <i class="fas fa-eye"></i> Detail
                        </button>
                        <button class="btn-action btn-toggle-off">
                            <i class="fas fa-toggle-off"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- TAB CONTENT: PERSYARATAN DOKUMEN -->
        <div class="tab-content" id="requirements">
            <div class="content-header">
                <h2>Persyaratan Dokumen</h2>
                <div class="header-actions">
                    <select class="visa-selector">
                        <option value="voa">VOA on Arrival</option>
                        <option value="b211">B211A Extension</option>
                        <option value="kitas">KITAS 317</option>
                        <option value="kitap">KITAP</option>
                    </select>
                    <button class="btn btn-primary">
                        <i class="fas fa-plus"></i> Tambah Persyaratan
                    </button>
                </div>
            </div>

            <div class="requirements-container">
                <!-- REQUIREMENT 1 -->
                <div class="requirement-item">
                    <div class="requirement-header">
                        <div class="requirement-drag">
                            <i class="fas fa-grip-vertical"></i>
                        </div>
                        <div class="requirement-info">
                            <h4>Passport Copy</h4>
                            <span class="requirement-mandatory">
                                <i class="fas fa-asterisk"></i> Mandatory
                            </span>
                        </div>
                        <div class="requirement-actions">
                            <button class="btn-req-action edit">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="btn-req-action delete">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </div>
                    <div class="requirement-details">
                        <div class="detail-item">
                            <span class="detail-label">File Type:</span>
                            <span class="detail-value">PDF, JPG, PNG</span>
                        </div>
                        <div class="detail-item">
                            <span class="detail-label">Max Size:</span>
                            <span class="detail-value">5 MB</span>
                        </div>
                        <div class="detail-item">
                            <span class="detail-label">Description:</span>
                            <span class="detail-value">Scan paspor halaman identitas, minimal 6 bulan masa
                                berlaku</span>
                        </div>
                    </div>
                </div>

                <!-- REQUIREMENT 2 -->
                <div class="requirement-item">
                    <div class="requirement-header">
                        <div class="requirement-drag">
                            <i class="fas fa-grip-vertical"></i>
                        </div>
                        <div class="requirement-info">
                            <h4>Passport Photo (4x6)</h4>
                            <span class="requirement-mandatory">
                                <i class="fas fa-asterisk"></i> Mandatory
                            </span>
                        </div>
                        <div class="requirement-actions">
                            <button class="btn-req-action edit">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="btn-req-action delete">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </div>
                    <div class="requirement-details">
                        <div class="detail-item">
                            <span class="detail-label">File Type:</span>
                            <span class="detail-value">JPG, PNG</span>
                        </div>
                        <div class="detail-item">
                            <span class="detail-label">Max Size:</span>
                            <span class="detail-value">2 MB</span>
                        </div>
                        <div class="detail-item">
                            <span class="detail-label">Description:</span>
                            <span class="detail-value">Foto ukuran 4x6 cm, latar belakang putih, foto terbaru (3 bulan
                                terakhir)</span>
                        </div>
                    </div>
                </div>

                <!-- REQUIREMENT 3 -->
                <div class="requirement-item">
                    <div class="requirement-header">
                        <div class="requirement-drag">
                            <i class="fas fa-grip-vertical"></i>
                        </div>
                        <div class="requirement-info">
                            <h4>Flight Ticket</h4>
                            <span class="requirement-mandatory">
                                <i class="fas fa-asterisk"></i> Mandatory
                            </span>
                        </div>
                        <div class="requirement-actions">
                            <button class="btn-req-action edit">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="btn-req-action delete">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </div>
                    <div class="requirement-details">
                        <div class="detail-item">
                            <span class="detail-label">File Type:</span>
                            <span class="detail-value">PDF, JPG, PNG</span>
                        </div>
                        <div class="detail-item">
                            <span class="detail-label">Max Size:</span>
                            <span class="detail-value">3 MB</span>
                        </div>
                        <div class="detail-item">
                            <span class="detail-label">Description:</span>
                            <span class="detail-value">Tiket pesawat pulang-pergi atau tiket keluar dari
                                Indonesia</span>
                        </div>
                    </div>
                </div>

                <!-- REQUIREMENT 4 -->
                <div class="requirement-item">
                    <div class="requirement-header">
                        <div class="requirement-drag">
                            <i class="fas fa-grip-vertical"></i>
                        </div>
                        <div class="requirement-info">
                            <h4>Proof of Accommodation</h4>
                            <span class="requirement-mandatory">
                                <i class="fas fa-asterisk"></i> Mandatory
                            </span>
                        </div>
                        <div class="requirement-actions">
                            <button class="btn-req-action edit">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="btn-req-action delete">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </div>
                    <div class="requirement-details">
                        <div class="detail-item">
                            <span class="detail-label">File Type:</span>
                            <span class="detail-value">PDF, JPG, PNG</span>
                        </div>
                        <div class="detail-item">
                            <span class="detail-label">Max Size:</span>
                            <span class="detail-value">3 MB</span>
                        </div>
                        <div class="detail-item">
                            <span class="detail-label">Description:</span>
                            <span class="detail-value">Bukti booking hotel atau surat keterangan tempat tinggal</span>
                        </div>
                    </div>
                </div>

                <!-- REQUIREMENT 5 - OPTIONAL -->
                <div class="requirement-item optional">
                    <div class="requirement-header">
                        <div class="requirement-drag">
                            <i class="fas fa-grip-vertical"></i>
                        </div>
                        <div class="requirement-info">
                            <h4>Vaccination Certificate</h4>
                            <span class="requirement-optional">
                                <i class="fas fa-circle"></i> Optional
                            </span>
                        </div>
                        <div class="requirement-actions">
                            <button class="btn-req-action edit">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="btn-req-action delete">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </div>
                    <div class="requirement-details">
                        <div class="detail-item">
                            <span class="detail-label">File Type:</span>
                            <span class="detail-value">PDF, JPG</span>
                        </div>
                        <div class="detail-item">
                            <span class="detail-label">Max Size:</span>
                            <span class="detail-value">2 MB</span>
                        </div>
                        <div class="detail-item">
                            <span class="detail-label">Description:</span>
                            <span class="detail-value">Kartu vaksinasi COVID-19 (jika tersedia)</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- TAB CONTENT: PENGATURAN UMUM -->
        <div class="tab-content" id="settings">
            <div class="content-header">
                <h2>Pengaturan Umum</h2>
            </div>

            <div class="settings-container">
                <div class="settings-section">
                    <h3 class="settings-title">Notifikasi & Reminder</h3>

                    <div class="setting-item">
                        <div class="setting-info">
                            <h4>Email Reminder Expiry</h4>
                            <p>Kirim email reminder ke klien saat visa akan habis</p>
                        </div>
                        <div class="setting-control">
                            <label class="toggle-switch">
                                <input type="checkbox" checked>
                                <span class="toggle-slider"></span>
                            </label>
                        </div>
                    </div>

                    <div class="setting-item">
                        <div class="setting-info">
                            <h4>Waktu Reminder (hari sebelum expiry)</h4>
                            <p>Berapa hari sebelum visa habis, kirim reminder pertama</p>
                        </div>
                        <div class="setting-control">
                            <select class="setting-select">
                                <option value="7">7 hari</option>
                                <option value="14">14 hari</option>
                                <option value="30" selected>30 hari</option>
                                <option value="60">60 hari</option>
                            </select>
                        </div>
                    </div>

                    <div class="setting-item">
                        <div class="setting-info">
                            <h4>WhatsApp Notification</h4>
                            <p>Kirim notifikasi via WhatsApp untuk update status</p>
                        </div>
                        <div class="setting-control">
                            <label class="toggle-switch">
                                <input type="checkbox" checked>
                                <span class="toggle-slider"></span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="settings-section">
                    <h3 class="settings-title">Pembayaran</h3>

                    <div class="setting-item">
                        <div class="setting-info">
                            <h4>Auto Konfirmasi Pembayaran</h4>
                            <p>Konfirmasi otomatis untuk payment gateway</p>
                        </div>
                        <div class="setting-control">
                            <label class="toggle-switch">
                                <input type="checkbox" checked>
                                <span class="toggle-slider"></span>
                            </label>
                        </div>
                    </div>

                    <div class="setting-item">
                        <div class="setting-info">
                            <h4>Payment Gateway Active</h4>
                            <p>Pilih payment gateway yang aktif</p>
                        </div>
                        <div class="setting-control">
                            <div class="payment-options">
                                <label class="payment-option">
                                    <input type="checkbox" checked>
                                    <span>Midtrans</span>
                                </label>
                                <label class="payment-option">
                                    <input type="checkbox" checked>
                                    <span>Xendit</span>
                                </label>
                                <label class="payment-option">
                                    <input type="checkbox">
                                    <span>Manual Transfer</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="settings-section">
                    <h3 class="settings-title">System</h3>

                    <div class="setting-item">
                        <div class="setting-info">
                            <h4>Auto Backup Database</h4>
                            <p>Backup database otomatis setiap hari</p>
                        </div>
                        <div class="setting-control">
                            <label class="toggle-switch">
                                <input type="checkbox" checked>
                                <span class="toggle-slider"></span>
                            </label>
                        </div>
                    </div>

                    <div class="setting-item">
                        <div class="setting-info">
                            <h4>Maintenance Mode</h4>
                            <p>Aktifkan mode maintenance untuk website user</p>
                        </div>
                        <div class="setting-control">
                            <label class="toggle-switch">
                                <input type="checkbox">
                                <span class="toggle-slider"></span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="settings-footer">
                    <button class="btn btn-outline">
                        <i class="fas fa-undo"></i> Reset ke Default
                    </button>
                    <button class="btn btn-primary">
                        <i class="fas fa-save"></i> Simpan Perubahan
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>