<?= $this->extend('dashboard/sidebaradmin') ?>
<?= $this->section('content') ?>

<!-- MAIN CONTENT -->
<div class="main-content">
    <!-- NAVBAR sudah ada di sidebaradmin.php -->

    <!-- DASHBOARD CONTENT -->
    <div class="dashboard-content">
        <h1 class="page-title">Dashboard Overview</h1>

        <!-- STATS ROW -->
        <div class="stats-row">
            <div class="stat-card primary">
                <div class="stat-icon">
                    <i class="fas fa-clock"></i>
                </div>
                <div class="stat-details">
                    <h3>12</h3>
                    <p>Pending Orders</p>
                    <small>Menunggu review</small>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon" style="background: #f7ba03ff; color: #fff;">
                    <i class="fas fa-spinner"></i>
                </div>
                <div class="stat-details">
                    <h3>8</h3>
                    <p>In Process</p>
                    <small>Sedang diproses</small>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon" style="background: #00c12dff; color: #fff;">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div class="stat-details">
                    <h3>45</h3>
                    <p>Completed</p>
                    <small>Bulan ini</small>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon" style="background: #d00217ff; color: #fff;">
                    <i class="fas fa-times-circle"></i>
                </div>
                <div class="stat-details">
                    <h3>3</h3>
                    <p>Rejected</p>
                    <small>Perlu perbaikan</small>
                </div>
            </div>
        </div>

        <!-- URGENT ACTION & RECENT ACTIVITY -->
        <div class="dashboard-grid">
            <!-- URGENT ACTIONS -->
            <div class="card urgent-card">
                <div class="card-header">
                    <h3><i class="fas fa-exclamation-triangle"></i> Urgent Actions</h3>
                    <span class="badge badge-danger">5 Items</span>
                </div>
                <div class="urgent-list">
                    <div class="urgent-item high-priority">
                        <div class="urgent-icon">
                            <i class="fas fa-passport"></i>
                        </div>
                        <div class="urgent-content">
                            <h4>Visa Akan Kadaluarsa</h4>
                            <p>John Smith - KITAS #VIS-2024-089</p>
                            <small><i class="fas fa-calendar-alt"></i> Kadaluarsa dalam 5 hari</small>
                        </div>
                        <button class="btn-action btn-warning">
                            <i class="fas fa-envelope"></i> Kirim Reminder
                        </button>
                    </div>

                    <div class="urgent-item medium-priority">
                        <div class="urgent-icon">
                            <i class="fas fa-file-upload"></i>
                        </div>
                        <div class="urgent-content">
                            <h4>Order Baru Belum Disentuh</h4>
                            <p>Maria Garcia - B211A Extension</p>
                            <small><i class="fas fa-clock"></i> 28 jam yang lalu</small>
                        </div>
                        <button class="btn-action btn-primary">
                            <i class="fas fa-eye"></i> Review
                        </button>
                    </div>

                    <div class="urgent-item high-priority">
                        <div class="urgent-icon">
                            <i class="fas fa-redo"></i>
                        </div>
                        <div class="urgent-content">
                            <h4>Dokumen Revisi Diupload</h4>
                            <p>David Lee - VOA On Arrival</p>
                            <small><i class="fas fa-clock"></i> 3 jam yang lalu</small>
                        </div>
                        <button class="btn-action btn-primary">
                            <i class="fas fa-check"></i> Verifikasi
                        </button>
                    </div>

                    <div class="urgent-item low-priority">
                        <div class="urgent-icon">
                            <i class="fas fa-credit-card"></i>
                        </div>
                        <div class="urgent-content">
                            <h4>Pembayaran Menunggu Konfirmasi</h4>
                            <p>Sarah Johnson - KITAS 317</p>
                            <small><i class="fas fa-clock"></i> 6 jam yang lalu</small>
                        </div>
                        <button class="btn-action btn-success">
                            <i class="fas fa-check-double"></i> Konfirmasi
                        </button>
                    </div>
                </div>
            </div>

            <!-- RECENT ACTIVITY -->
            <div class="card activity-card">
                <div class="card-header">
                    <h3><i class="fas fa-history"></i> Recent Activity</h3>
                    <a href="#" class="view-all">View All</a>
                </div>
                <div class="activity-timeline">
                    <div class="activity-item">
                        <div class="activity-dot bg-success"></div>
                        <div class="activity-content">
                            <p><strong>Budi Santoso</strong> mengunggah dokumen paspor</p>
                            <small><i class="fas fa-clock"></i> 15 menit yang lalu</small>
                        </div>
                    </div>

                    <div class="activity-item">
                        <div class="activity-dot bg-primary"></div>
                        <div class="activity-content">
                            <p><strong>Admin</strong> menyetujui visa untuk <strong>Alice Wong</strong></p>
                            <small><i class="fas fa-clock"></i> 1 jam yang lalu</small>
                        </div>
                    </div>

                    <div class="activity-item">
                        <div class="activity-dot bg-warning"></div>
                        <div class="activity-content">
                            <p><strong>Muhammad Ali</strong> melakukan pembayaran</p>
                            <small><i class="fas fa-clock"></i> 2 jam yang lalu</small>
                        </div>
                    </div>

                    <div class="activity-item">
                        <div class="activity-dot bg-danger"></div>
                        <div class="activity-content">
                            <p>Dokumen <strong>Kevin Brown</strong> ditolak - Foto buram</p>
                            <small><i class="fas fa-clock"></i> 3 jam yang lalu</small>
                        </div>
                    </div>

                    <div class="activity-item">
                        <div class="activity-dot bg-info"></div>
                        <div class="activity-content">
                            <p><strong>Emma Wilson</strong> mendaftar akun baru</p>
                            <small><i class="fas fa-clock"></i> 4 jam yang lalu</small>
                        </div>
                    </div>

                    <div class="activity-item">
                        <div class="activity-dot bg-success"></div>
                        <div class="activity-content">
                            <p>Visa <strong>Robert Chen</strong> berhasil diterbitkan</p>
                            <small><i class="fas fa-clock"></i> 5 jam yang lalu</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- CHART SECTION -->
        <div class="chart-section">
            <div class="card">
                <h3>Order Statistics (Last 6 Months)</h3>
                <div class="chart-placeholder">
                    <canvas id="orderChart" style="height: 300px;"></canvas>
                    <!-- Placeholder untuk Chart.js nanti -->
                    <div class="chart-mock">
                        <div class="chart-bar" style="height: 60%;"></div>
                        <div class="chart-bar" style="height: 75%;"></div>
                        <div class="chart-bar" style="height: 45%;"></div>
                        <div class="chart-bar" style="height: 85%;"></div>
                        <div class="chart-bar" style="height: 70%;"></div>
                        <div class="chart-bar" style="height: 90%;"></div>
                    </div>
                </div>
            </div>

            <div class="card">
                <h3>Visa Type Distribution</h3>
                <ul class="traffic-list">
                    <li class="traffic-item">
                        <span class="traffic-source">VOA on Arrival</span>
                        <div class="traffic-bar">
                            <div class="traffic-progress" style="width: 45%;"></div>
                        </div>
                        <span class="traffic-percent">45%</span>
                    </li>
                    <li class="traffic-item">
                        <span class="traffic-source">B211A Extension</span>
                        <div class="traffic-bar">
                            <div class="traffic-progress" style="width: 30%;"></div>
                        </div>
                        <span class="traffic-percent">30%</span>
                    </li>
                    <li class="traffic-item">
                        <span class="traffic-source">KITAS 317</span>
                        <div class="traffic-bar">
                            <div class="traffic-progress" style="width: 15%;"></div>
                        </div>
                        <span class="traffic-percent">15%</span>
                    </li>
                    <li class="traffic-item">
                        <span class="traffic-source">KITAP</span>
                        <div class="traffic-bar">
                            <div class="traffic-progress" style="width: 10%;"></div>
                        </div>
                        <span class="traffic-percent">10%</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>