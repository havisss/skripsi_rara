<?= $this->extend('dashboard/sidebaradmin') ?>
<?= $this->section('content') ?>

<!-- MAIN CONTENT -->
<div class="main-content">
    <!-- DASHBOARD CONTENT -->
    <div class="dashboard-content">
        <div class="page-header">
            <h1 class="page-title">Manajemen Order</h1>
            <div class="page-actions">
                <button class="btn btn-outline"
                    onclick="window.location.href='<?= base_url('dashboard/managementorder/export') ?>' + window.location.search">
                    <i class="fas fa-download"></i> Export Data
                </button>

                <button class="btn btn-primary"
                    onclick="document.getElementById('manualOrderModal').style.display='flex'">
                    <i class="fas fa-plus"></i> Tambah Order Manual
                </button>
            </div>
        </div>

        <!-- FILTER SECTION -->
        <form method="get" action="<?= base_url('dashboard/managementorder') ?>">
            <div class="filter-section">
                <div class="filter-group">
                    <div class="filter-item">
                        <label><i class="fas fa-passport"></i> Jenis Visa</label>
                        <select class="filter-select" name="visa">
                            <option value="">Semua Visa</option>
                            <?php foreach ($visa_types as $v): ?>
                            <option value="<?= $v['code'] ?>" <?= ($filters['visa'] == $v['code']) ? 'selected' : '' ?>>
                                <?= $v['name'] ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="filter-item">
                        <label><i class="fas fa-clipboard-check"></i> Status Proses</label>
                        <select class="filter-select" name="status">
                            <option value="">Semua Status</option>
                            <option value="payment_pending"
                                <?= ($filters['status'] == 'payment_pending') ? 'selected' : '' ?>>Payment Pending
                            </option>
                            <option value="upload_pending"
                                <?= ($filters['status'] == 'upload_pending') ? 'selected' : '' ?>>Upload Pending
                            </option>
                            <option value="verification_process"
                                <?= ($filters['status'] == 'verification_process') ? 'selected' : '' ?>>Verification
                            </option>
                            <option value="approved" <?= ($filters['status'] == 'approved') ? 'selected' : '' ?>>
                                Approved</option>
                            <option value="rejected" <?= ($filters['status'] == 'rejected') ? 'selected' : '' ?>>
                                Rejected</option>
                        </select>
                    </div>

                    <div class="filter-item">
                        <label><i class="fas fa-calendar"></i> Tanggal</label>
                        <input type="date" class="filter-input" name="date" value="<?= $filters['date'] ?>">
                    </div>

                    <div class="filter-item">
                        <button type="submit" class="btn btn-primary btn-filter">
                            <i class="fas fa-search"></i> Filter
                        </button>
                        <a href="<?= base_url('dashboard/managementorder') ?>" class="btn btn-outline btn-reset">
                            <i class="fas fa-redo"></i> Reset
                        </a>
                    </div>
                </div>
            </div>

        </form>

        <!-- QUICK TABS -->
        <div class="quick-tabs">
            <a href="?status=all" class="tab-btn <?= ($active_tab == 'all') ? 'active' : '' ?>">
                <i class="fas fa-list"></i> Semua Permohonan
                <span class="tab-count"><?= $count_all ?></span>
            </a>

            <a href="?status=pending_group" class="tab-btn <?= ($active_tab == 'pending_group') ? 'active' : '' ?>">
                <i class="fas fa-hourglass-half"></i> Menunggu Verifikasi
                <span class="tab-count"><?= $count_pending ?></span>
            </a>

            <a href="?status=action_needed" class="tab-btn <?= ($active_tab == 'action_needed') ? 'active' : '' ?>">
                <i class="fas fa-redo"></i> Perlu Tindakan
                <span class="tab-count"><?= $count_action ?></span>
            </a>

            <a href="?status=urgent" class="tab-btn <?= ($active_tab == 'urgent') ? 'active' : '' ?>">
                <i class="fas fa-exclamation-circle"></i> Urgent
                <span class="tab-count"><?= $count_urgent ?></span>
            </a>
        </div>

        <!-- ORDERS TABLE -->
        <div class="card table-card">
            <div class="table-header">
                <div class="table-title">
                    <h3>Daftar Permohonan Visa</h3>
                    <p>Halaman <?= $pager->getCurrentPage('orders') ?> dari <?= $pager->getPageCount('orders') ?></p>
                </div>
                <form method="get" action="<?= base_url('dashboard/managementorder') ?>">
                    <div class="table-search">
                        <i class="fas fa-search"></i>
                        <input type="text" name="keyword" value="<?= $filters['keyword'] ?>"
                            placeholder="Cari nama, ID order...">
                    </div>
                </form>
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
                                        $badgeClass = 'voa';
                                        // Tambahkan pengecekan (?? '') agar tidak error jika visa_code kosong
                                        $code = strtolower($item['visa_code'] ?? '');
                                        if (str_contains($code, 'kitas')) $badgeClass = 'kitas';
                                        if (str_contains($code, 'b211')) $badgeClass = 'b211';
                                        ?>
                                <span class="badge-visa <?= $badgeClass; ?>">
                                    <?= esc($item['visa_name'] ?? 'Visa Tidak Diketahui'); ?>
                                </span>

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
                    <span>Total data: <?= $pager->getTotal('orders') ?> entries</span>
                </div>

                <div class="pagination-wrapper">
                    <?= $pager->links('orders', 'default_full') ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="manualOrderModal"
    style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.5); z-index:9999; align-items:center; justify-content:center;">

    <div
        style="background:white; width:500px; padding:30px; border-radius:10px; box-shadow:0 5px 20px rgba(0,0,0,0.2); position:relative; animation: slideDown 0.3s ease;">

        <h2 style="margin-top:0; margin-bottom:20px; color:#333;">Tambah Order Manual</h2>
        <p style="font-size:13px; color:#666; margin-bottom:20px;">
            Gunakan fitur ini jika user mendaftar lewat WhatsApp atau Offline.
            Jika email sudah terdaftar, order akan otomatis masuk ke akun tersebut.
        </p>

        <form action="<?= base_url('dashboard/managementorder/create') ?>" method="post">

            <div style="margin-bottom:15px;">
                <label style="display:block; margin-bottom:5px; font-weight:bold;">Nama Lengkap</label>
                <input type="text" name="full_name" required placeholder="Nama Klien"
                    style="width:100%; padding:10px; border:1px solid #ddd; border-radius:5px;">
            </div>

            <div style="margin-bottom:15px;">
                <label style="display:block; margin-bottom:5px; font-weight:bold;">Email Klien</label>
                <input type="email" name="email" required placeholder="email@klien.com"
                    style="width:100%; padding:10px; border:1px solid #ddd; border-radius:5px;">
            </div>

            <div style="margin-bottom:15px;">
                <label style="display:block; margin-bottom:5px; font-weight:bold;">Nomor WhatsApp</label>
                <input type="text" name="phone_number" required placeholder="0812..."
                    style="width:100%; padding:10px; border:1px solid #ddd; border-radius:5px;">
            </div>

            <div style="margin-bottom:15px;">
                <label style="display:block; margin-bottom:5px; font-weight:bold;">Pilih Layanan Visa</label>
                <select name="visa_type_id" required
                    style="width:100%; padding:10px; border:1px solid #ddd; border-radius:5px;">
                    <?php foreach($visa_types as $v): ?>
                    <option value="<?= $v['id'] ?>"><?= $v['name'] ?> - Rp
                        <?= number_format($v['price'], 0, ',', '.') ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div style="text-align:right; border-top:1px solid #eee; padding-top:20px;">
                <button type="button" onclick="document.getElementById('manualOrderModal').style.display='none'"
                    style="padding:10px 20px; background:transparent; border:1px solid #ccc; border-radius:5px; cursor:pointer; margin-right:10px;">Batal</button>
                <button type="submit"
                    style="padding:10px 20px; background:#0d6efd; color:white; border:none; border-radius:5px; cursor:pointer;">Buat
                    Order</button>
            </div>
        </form>
    </div>
</div>

<script>
// Tutup modal jika klik di luar
window.onclick = function(event) {
    let modal = document.getElementById('manualOrderModal');
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