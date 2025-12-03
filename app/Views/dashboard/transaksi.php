<?= $this->extend('dashboard/sidebaradmin') ?>
<?= $this->section('content') ?>

<div class="main-content">
    <div class="dashboard-content">

        <div class="page-header">
            <div>
                <h1 class="page-title">Riwayat Transaksi</h1>
                <p class="page-subtitle">Monitoring pembayaran masuk dari klien</p>
            </div>
            <div class="revenue-badge"
                style="background: #d1e7dd; color: #0f5132; padding: 10px 20px; border-radius: 8px; font-weight: bold;">
                <i class="fas fa-wallet"></i> Total Pendapatan: Rp <?= number_format($totalRevenue, 0, ',', '.') ?>
            </div>
        </div>

        <div class="card table-card">
            <div class="table-responsive">
                <table class="order-table" style="width: 100%; border-collapse: collapse;">
                    <thead>
                        <tr style="background: #f8f9fa; border-bottom: 2px solid #eee;">
                            <th style="padding: 15px;">Invoice ID</th>
                            <th style="padding: 15px;">Klien</th>
                            <th style="padding: 15px;">Layanan</th>
                            <th style="padding: 15px;">Tagihan</th>
                            <th style="padding: 15px;">Status Bayar</th>
                            <th style="padding: 15px;">Tanggal</th>
                            <th style="padding: 15px; text-align: right;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($transactions)): ?>
                            <tr>
                                <td colspan="7" class="text-center p-4">Belum ada transaksi.</td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($transactions as $trx): ?>
                                <tr style="border-bottom: 1px solid #eee;">
                                    <td style="padding: 15px; font-family: monospace; font-weight: bold;">
                                        #<?= $trx['invoice_number'] ?>
                                    </td>
                                    <td style="padding: 15px;">
                                        <strong><?= esc($trx['full_name']) ?></strong><br>
                                        <small class="text-muted"><?= esc($trx['email']) ?></small>
                                    </td>
                                    <td style="padding: 15px;">
                                        <?= esc($trx['visa_name']) ?>
                                    </td>
                                    <td style="padding: 15px; font-weight: bold; color: #333;">
                                        Rp <?= number_format($trx['price'], 0, ',', '.') ?>
                                    </td>
                                    <td style="padding: 15px;">
                                        <?php if ($trx['payment_status'] == 'paid'): ?>
                                            <span
                                                style="background:#d1e7dd; color:#0f5132; padding:5px 10px; border-radius:15px; font-size:12px; font-weight:bold;">
                                                <i class="fas fa-check"></i> PAID
                                            </span>
                                        <?php else: ?>
                                            <span
                                                style="background:#fff3cd; color:#856404; padding:5px 10px; border-radius:15px; font-size:12px; font-weight:bold;">
                                                <i class="fas fa-clock"></i> UNPAID
                                            </span>
                                        <?php endif; ?>
                                    </td>
                                    <td style="padding: 15px;">
                                        <?= date('d M Y', strtotime($trx['created_at'])) ?><br>
                                        <small class="text-muted"><?= date('H:i', strtotime($trx['created_at'])) ?></small>
                                    </td>
                                    <td style="padding: 15px; text-align: right;">
                                        <?php if ($trx['payment_status'] == 'unpaid'): ?>
                                            <form action="<?= base_url('dashboard/transaksi/confirm') ?>" method="post"
                                                onsubmit="return confirm('Konfirmasi pembayaran ini manual? Pastikan dana sudah masuk rekening.')">
                                                <input type="hidden" name="id" value="<?= $trx['id'] ?>">
                                                <button type="submit" class="btn btn-sm btn-success"
                                                    title="Konfirmasi Pembayaran Manual">
                                                    <i class="fas fa-check-double"></i> Confirm
                                                </button>
                                            </form>
                                        <?php else: ?>
                                            <button class="btn btn-sm btn-secondary" disabled>
                                                <i class="fas fa-lock"></i> Selesai
                                            </button>
                                        <?php endif; ?>
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