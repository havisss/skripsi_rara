<?= $this->extend('dashboard/sidebaradmin') ?>
<?= $this->section('content') ?>

<!-- MAIN CONTENT -->
<div class="main-content">
    <!-- DASHBOARD CONTENT -->
    <div class="dashboard-content">
        <div class="page-header">
            <div>
                <h1 class="page-title">Transaksi & Keuangan</h1>
                <p class="page-subtitle">Kelola pembayaran, invoice, dan laporan keuangan</p>
            </div>
            <div class="page-actions">
                <button class="btn btn-outline">
                    <i class="fas fa-file-excel"></i> Export Laporan
                </button>
                <button class="btn btn-primary">
                    <i class="fas fa-file-invoice"></i> Buat Invoice
                </button>
            </div>
        </div>

        <!-- FINANCIAL STATS -->
        <div class="financial-stats">
            <div class="financial-stat-card primary">
                <div class="stat-icon-wrapper">
                    <div class="stat-icon">
                        <i class="fas fa-wallet"></i>
                    </div>
                </div>
                <div class="stat-content">
                    <h3>Rp <?= number_format($stats['revenue'], 0, ',', '.') ?></h3>
                    <p>Total Pemasukan</p>
                    <div class="stat-trend positive">
                        <i class="fas fa-arrow-up"></i>
                        <span>Real-time data</span>
                    </div>
                </div>
            </div>

            <div class="financial-stat-card success">
                <div class="stat-icon-wrapper">
                    <div class="stat-icon">
                        <i class="fas fa-check-circle"></i>
                    </div>
                </div>
                <div class="stat-content">
                    <h3><?= $stats['confirmed_count'] ?> Transaksi</h3>
                    <p>Pembayaran Lunas</p>
                    <div class="stat-detail">
                        <span>Verified</span>
                    </div>
                </div>
            </div>

            <div class="financial-stat-card warning">
                <div class="stat-icon-wrapper">
                    <div class="stat-icon">
                        <i class="fas fa-hourglass-half"></i>
                    </div>
                </div>
                <div class="stat-content">
                    <h3>Rp <?= number_format($stats['pending_revenue'], 0, ',', '.') ?></h3>
                    <p>Potensi Pemasukan</p>
                    <div class="stat-detail">
                        <span><?= $stats['pending_count'] ?> transaksi belum bayar</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- TABS -->
        <div class="transaction-tabs">
            <button class="transaction-tab active" data-tab="pending">
                <i class="fas fa-clock"></i>
                <span>Menunggu Konfirmasi</span>
                <span class="tab-badge">12</span>
            </button>
            <button class="transaction-tab" data-tab="confirmed">
                <i class="fas fa-check-double"></i>
                <span>Terkonfirmasi</span>
                <span class="tab-badge">56</span>
            </button>
            <button class="transaction-tab" data-tab="overdue">
                <i class="fas fa-exclamation-circle"></i>
                <span>Overdue</span>
                <span class="tab-badge">3</span>
            </button>
            <button class="transaction-tab" data-tab="all">
                <i class="fas fa-list"></i>
                <span>Semua Transaksi</span>
            </button>
        </div>

        <!-- FILTER SECTION -->
        <div class="transaction-filter">
            <div class="filter-left">
                <div class="search-box-transaction">
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="Cari invoice, nama klien, atau email...">
                </div>
            </div>
            <div class="filter-right">
                <select class="filter-select-transaction">
                    <option value="">Semua Metode</option>
                    <option value="bank_transfer">Bank Transfer</option>
                    <option value="midtrans">Midtrans</option>
                    <option value="xendit">Xendit</option>
                    <option value="cash">Cash</option>
                </select>
                <input type="date" class="filter-date-transaction">
                <button class="btn btn-outline btn-filter-action">
                    <i class="fas fa-filter"></i> Filter
                </button>
            </div>
        </div>

        <!-- TAB CONTENT: PENDING CONFIRMATION -->
        <div class="tab-pane active" id="pending">
            <div class="transactions-grid">
                <!-- TRANSACTION 1 - PENDING -->
                <div class="transaction-card pending-status">
                    <div class="transaction-header">
                        <div class="transaction-invoice">
                            <span class="invoice-label">Invoice</span>
                            <h4>#INV-2024089</h4>
                        </div>
                        <div class="transaction-status-badge pending">
                            <i class="fas fa-clock"></i>
                            Pending
                        </div>
                    </div>

                    <div class="transaction-body">
                        <div class="transaction-client">
                            <img src="https://ui-avatars.com/api/?name=John+Smith&background=0d6efd&color=fff"
                                alt="Client">
                            <div class="client-details">
                                <h5>John Smith</h5>
                                <p>john.smith@email.com</p>
                            </div>
                        </div>

                        <div class="transaction-info">
                            <div class="info-row">
                                <span class="info-label">Jenis Visa:</span>
                                <span class="info-value">
                                    <span class="visa-badge-small voa">VOA</span>
                                </span>
                            </div>
                            <div class="info-row">
                                <span class="info-label">Metode:</span>
                                <span class="info-value">Bank Transfer - BCA</span>
                            </div>
                            <div class="info-row">
                                <span class="info-label">Tanggal:</span>
                                <span class="info-value">22 Nov 2024, 14:30</span>
                            </div>
                            <div class="info-row">
                                <span class="info-label">Jumlah:</span>
                                <span class="info-value amount">Rp 1,500,000</span>
                            </div>
                        </div>

                        <div class="payment-proof">
                            <div class="proof-header">
                                <i class="fas fa-paperclip"></i>
                                <span>Bukti Transfer</span>
                            </div>
                            <div class="proof-preview">
                                <img src="https://via.placeholder.com/300x200/e3f2fd/0d6efd?text=Payment+Proof"
                                    alt="Proof">
                                <button class="btn-view-proof">
                                    <i class="fas fa-search-plus"></i>
                                </button>
                            </div>
                        </div>

                        <div class="transaction-timer">
                            <i class="fas fa-stopwatch"></i>
                            <span>Upload 3 jam yang lalu</span>
                        </div>
                    </div>

                    <div class="transaction-footer">
                        <button class="btn-transaction reject">
                            <i class="fas fa-times"></i> Tolak
                        </button>
                        <button class="btn-transaction approve">
                            <i class="fas fa-check"></i> Konfirmasi
                        </button>
                    </div>
                </div>

                <!-- TRANSACTION 2 - PENDING -->
                <div class="transaction-card pending-status">
                    <div class="transaction-header">
                        <div class="transaction-invoice">
                            <span class="invoice-label">Invoice</span>
                            <h4>#INV-2024090</h4>
                        </div>
                        <div class="transaction-status-badge pending">
                            <i class="fas fa-clock"></i>
                            Pending
                        </div>
                    </div>

                    <div class="transaction-body">
                        <div class="transaction-client">
                            <img src="https://ui-avatars.com/api/?name=Maria+Garcia&background=6c757d&color=fff"
                                alt="Client">
                            <div class="client-details">
                                <h5>Maria Garcia</h5>
                                <p>maria.garcia@email.com</p>
                            </div>
                        </div>

                        <div class="transaction-info">
                            <div class="info-row">
                                <span class="info-label">Jenis Visa:</span>
                                <span class="info-value">
                                    <span class="visa-badge-small b211">B211A</span>
                                </span>
                            </div>
                            <div class="info-row">
                                <span class="info-label">Metode:</span>
                                <span class="info-value">Midtrans - Virtual Account</span>
                            </div>
                            <div class="info-row">
                                <span class="info-label">Tanggal:</span>
                                <span class="info-value">22 Nov 2024, 10:15</span>
                            </div>
                            <div class="info-row">
                                <span class="info-label">Jumlah:</span>
                                <span class="info-value amount">Rp 4,500,000</span>
                            </div>
                        </div>

                        <div class="payment-proof">
                            <div class="proof-header">
                                <i class="fas fa-paperclip"></i>
                                <span>Bukti Transfer</span>
                            </div>
                            <div class="proof-preview">
                                <img src="https://via.placeholder.com/300x200/f3e5f5/9c27b0?text=Payment+Proof"
                                    alt="Proof">
                                <button class="btn-view-proof">
                                    <i class="fas fa-search-plus"></i>
                                </button>
                            </div>
                        </div>

                        <div class="transaction-timer">
                            <i class="fas fa-stopwatch"></i>
                            <span>Upload 7 jam yang lalu</span>
                        </div>
                    </div>

                    <div class="transaction-footer">
                        <button class="btn-transaction reject">
                            <i class="fas fa-times"></i> Tolak
                        </button>
                        <button class="btn-transaction approve">
                            <i class="fas fa-check"></i> Konfirmasi
                        </button>
                    </div>
                </div>

                <!-- TRANSACTION 3 - URGENT -->
                <div class="transaction-card pending-status urgent">
                    <div class="urgent-badge">
                        <i class="fas fa-bolt"></i> URGENT
                    </div>
                    <div class="transaction-header">
                        <div class="transaction-invoice">
                            <span class="invoice-label">Invoice</span>
                            <h4>#INV-2024087</h4>
                        </div>
                        <div class="transaction-status-badge pending">
                            <i class="fas fa-clock"></i>
                            Pending
                        </div>
                    </div>

                    <div class="transaction-body">
                        <div class="transaction-client">
                            <img src="https://ui-avatars.com/api/?name=David+Lee&background=28a745&color=fff"
                                alt="Client">
                            <div class="client-details">
                                <h5>David Lee</h5>
                                <p>david.lee@email.com</p>
                            </div>
                        </div>

                        <div class="transaction-info">
                            <div class="info-row">
                                <span class="info-label">Jenis Visa:</span>
                                <span class="info-value">
                                    <span class="visa-badge-small kitas">KITAS</span>
                                </span>
                            </div>
                            <div class="info-row">
                                <span class="info-label">Metode:</span>
                                <span class="info-value">Bank Transfer - Mandiri</span>
                            </div>
                            <div class="info-row">
                                <span class="info-label">Tanggal:</span>
                                <span class="info-value">21 Nov 2024, 16:45</span>
                            </div>
                            <div class="info-row">
                                <span class="info-label">Jumlah:</span>
                                <span class="info-value amount">Rp 12,500,000</span>
                            </div>
                        </div>

                        <div class="payment-proof">
                            <div class="proof-header">
                                <i class="fas fa-paperclip"></i>
                                <span>Bukti Transfer</span>
                            </div>
                            <div class="proof-preview">
                                <img src="https://via.placeholder.com/300x200/fff3e0/ff9800?text=Payment+Proof"
                                    alt="Proof">
                                <button class="btn-view-proof">
                                    <i class="fas fa-search-plus"></i>
                                </button>
                            </div>
                        </div>

                        <div class="transaction-timer urgent-timer">
                            <i class="fas fa-exclamation-circle"></i>
                            <span>Upload 26 jam yang lalu - Perlu segera dikonfirmasi!</span>
                        </div>
                    </div>

                    <div class="transaction-footer">
                        <button class="btn-transaction reject">
                            <i class="fas fa-times"></i> Tolak
                        </button>
                        <button class="btn-transaction approve">
                            <i class="fas fa-check"></i> Konfirmasi
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- RECENT CONFIRMED TRANSACTIONS -->
        <div class="confirmed-section">
            <div class="section-header">
                <h3>Riwayat Transaksi Terbaru</h3>
                <a href="#" class="view-all-link">Lihat Semua <i class="fas fa-arrow-right"></i></a>
            </div>

            <div class="confirmed-table-wrapper">
                <table class="confirmed-table">
                    <thead>
                        <tr>
                            <th>Invoice</th>
                            <th>Klien</th>
                            <th>Visa</th>
                            <th>Status Bayar</th>
                            <th>Jumlah</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($orders)) : ?>
                        <tr>
                            <td colspan="7" style="text-align:center;">Belum ada data transaksi.</td>
                        </tr>
                        <?php else : ?>
                        <?php foreach ($orders as $order) : ?>
                        <tr>
                            <td>
                                <span class="table-invoice">#<?= esc($order['invoice_number']) ?></span>
                            </td>

                            <td>
                                <div class="table-client">
                                    <img src="https://ui-avatars.com/api/?name=<?= urlencode($order['full_name']) ?>&background=random&color=fff"
                                        alt="Client">
                                    <div>
                                        <strong><?= esc($order['full_name']) ?></strong>
                                        <small><?= esc($order['email']) ?></small>
                                    </div>
                                </div>
                            </td>

                            <td>
                                <span class="visa-badge-small"><?= esc($order['visa_code']) ?></span>
                            </td>

                            <td>
                                <?php if($order['payment_status'] == 'paid'): ?>
                                <span class="table-status confirmed"><i class="fas fa-check-circle"></i> Lunas</span>
                                <?php else: ?>
                                <span class="table-status pending"><i class="fas fa-clock"></i> Belum Bayar</span>
                                <?php endif; ?>
                            </td>

                            <td class="table-amount">
                                Rp <?= number_format($order['visa_price'], 0, ',', '.') ?>
                            </td>

                            <td><?= date('d M Y', strtotime($order['created_at'])) ?></td>

                            <td>
                                <div class="table-actions">
                                    <button class="btn-table-action" title="Print Invoice">
                                        <i class="fas fa-print"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>