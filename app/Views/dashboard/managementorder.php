<?= $this->extend('dashboard/sidebaradmin') ?>
<?= $this->section('content') ?>

<!-- MAIN CONTENT -->
<div class="main-content">
    <!-- DASHBOARD CONTENT -->
    <div class="dashboard-content">
        <div class="page-header">
            <h1 class="page-title">Manajemen Order</h1>
            <div class="page-actions">
                <button class="btn btn-outline">
                    <i class="fas fa-download"></i> Export Data
                </button>
                <button class="btn btn-primary">
                    <i class="fas fa-plus"></i> Tambah Order Manual
                </button>
            </div>
        </div>

        <!-- FILTER SECTION -->
        <div class="filter-section">
            <div class="filter-group">
                <div class="filter-item">
                    <label><i class="fas fa-passport"></i> Jenis Visa</label>
                    <select class="filter-select">
                        <option value="">Semua Visa</option>
                        <option value="voa">VOA on Arrival</option>
                        <option value="b211">B211A Extension</option>
                        <option value="kitas317">KITAS 317</option>
                        <option value="kitap">KITAP</option>
                    </select>
                </div>

                <div class="filter-item">
                    <label><i class="fas fa-clipboard-check"></i> Status Proses</label>
                    <select class="filter-select">
                        <option value="">Semua Status</option>
                        <option value="pending">Pending</option>
                        <option value="verified">Verified</option>
                        <option value="in-process">In Process</option>
                        <option value="completed">Completed</option>
                        <option value="rejected">Rejected</option>
                    </select>
                </div>

                <div class="filter-item">
                    <label><i class="fas fa-file-alt"></i> Status Dokumen</label>
                    <select class="filter-select">
                        <option value="">Semua Dokumen</option>
                        <option value="uploaded">Uploaded</option>
                        <option value="partial">Partial</option>
                        <option value="verified">Verified</option>
                        <option value="revision">Need Revision</option>
                    </select>
                </div>

                <div class="filter-item">
                    <label><i class="fas fa-calendar"></i> Tanggal</label>
                    <input type="date" class="filter-input">
                </div>

                <div class="filter-item">
                    <button class="btn btn-primary btn-filter">
                        <i class="fas fa-search"></i> Filter
                    </button>
                    <button class="btn btn-outline btn-reset">
                        <i class="fas fa-redo"></i> Reset
                    </button>
                </div>
            </div>
        </div>

        <!-- QUICK TABS -->
        <div class="quick-tabs">
            <button class="tab-btn active" data-filter="all">
                <i class="fas fa-list"></i> Semua Permohonan
                <span class="tab-count">68</span>
            </button>
            <button class="tab-btn" data-filter="pending">
                <i class="fas fa-hourglass-half"></i> Menunggu Verifikasi
                <span class="tab-count">12</span>
            </button>
            <button class="tab-btn" data-filter="revision">
                <i class="fas fa-redo"></i> Perlu Tindakan
                <span class="tab-count">5</span>
            </button>
            <button class="tab-btn" data-filter="urgent">
                <i class="fas fa-exclamation-circle"></i> Urgent
                <span class="tab-count">3</span>
            </button>
        </div>

        <!-- ORDERS TABLE -->
        <div class="card table-card">
            <div class="table-header">
                <div class="table-title">
                    <h3>Daftar Permohonan Visa</h3>
                    <p>Menampilkan 1-10 dari 68 orders</p>
                </div>
                <div class="table-search">
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="Cari nama, ID order, atau email...">
                </div>
            </div>

            <div class="table-responsive">
                <table class="order-table">
                    <thead>
                        <tr>
                            <th><input type="checkbox" class="select-all"></th>
                            <th>ID Order</th>
                            <th>Nama Klien</th>
                            <th>Jenis Visa</th>
                            <th>Tanggal Submit</th>
                            <th>Status Dokumen</th>
                            <th>Status Proses</th>
                            <th>Priority</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($orders)) : ?>
                            <tr>
                                <td colspan="9" style="text-align:center; padding: 20px;">Belum ada data permohonan masuk.
                                </td>
                            </tr>
                        <?php else : ?>
                            <?php foreach ($orders as $item) : ?>
                                <tr class="order-row">
                                    <td><input type="checkbox"></td>
                                    <td>
                                        <span class="order-id">#<?= $item['invoice_number']; ?></span>
                                    </td>
                                    <td>
                                        <div class="client-info">
                                            <img src="https://ui-avatars.com/api/?name=<?= urlencode($item['full_name']); ?>&background=random&color=fff"
                                                alt="Client">
                                            <div>
                                                <strong><?= esc($item['full_name']); ?></strong>
                                                <small><?= esc($item['email']); ?></small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <?php
                                        $badgeClass = 'voa'; // default
                                        if (str_contains(strtolower($item['visa_code']), 'kitas')) $badgeClass = 'kitas';
                                        if (str_contains(strtolower($item['visa_code']), 'b211')) $badgeClass = 'b211';
                                        ?>
                                        <span class="badge-visa <?= $badgeClass; ?>"><?= esc($item['visa_name']); ?></span>
                                    </td>
                                    <td>
                                        <span class="date-text"><?= date('d M Y', strtotime($item['created_at'])); ?></span>
                                        <small class="time-ago">
                                            <?= floor((time() - strtotime($item['created_at'])) / (60 * 60 * 24)); ?> hari lalu
                                        </small>
                                    </td>
                                    <td>
                                        <span class="status-badge status-uploaded">
                                            <i class="fas fa-check-circle"></i> Uploaded
                                        </span>
                                    </td>
                                    <td>
                                        <?php
                                        $statusClass = 'status-pending';
                                        $icon = 'fa-clock';
                                        if ($item['status'] == 'approved') {
                                            $statusClass = 'status-completed';
                                            $icon = 'fa-check-circle';
                                        }
                                        if ($item['status'] == 'rejected') {
                                            $statusClass = 'status-rejected';
                                            $icon = 'fa-times-circle';
                                        }
                                        ?>
                                        <span class="status-badge <?= $statusClass; ?>">
                                            <i class="fas <?= $icon; ?>"></i>
                                            <?= ucwords(str_replace('_', ' ', $item['status'])); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <span class="priority-badge medium">
                                            <i class="fas fa-minus-circle"></i> Medium
                                        </span>
                                    </td>
                                    <td>
                                        <div class="action-buttons">
                                            <a href="<?= base_url('dashboard/managementorder/detail/' . $item['id']); ?>"
                                                class="btn-icon btn-view" title="Lihat Detail">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <button class="btn-icon btn-edit" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <!-- PAGINATION -->
            <div class="table-footer">
                <div class="showing-entries">
                    <span>Showing</span>
                    <select class="entries-select">
                        <option>10</option>
                        <option>25</option>
                        <option>50</option>
                        <option>100</option>
                    </select>
                    <span>entries</span>
                </div>

                <div class="pagination">
                    <button class="page-btn" disabled>
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <button class="page-btn active">1</button>
                    <button class="page-btn">2</button>
                    <button class="page-btn">3</button>
                    <button class="page-btn">4</button>
                    <button class="page-btn">5</button>
                    <button class="page-btn">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>