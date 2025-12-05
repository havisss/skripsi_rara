<?= $this->extend('dashboard/sidebaradmin') ?>
<?= $this->section('content') ?>

<div class="main-content">
    <div class="dashboard-content">

        <div class="page-header">
            <div>
                <a href="javascript:void(0);" onclick="history.back()" class="btn-back"
                    style="text-decoration:none; color:#666; font-size:14px; margin-bottom:10px; display:inline-block;">
                    <i class="fas fa-arrow-left"></i> Kembali ke List
                </a>

                <h1 class="page-title">Detail Order #<?= $order['invoice_number'] ?></h1>
            </div>

            <?php 
                $badges = [
                    'approved' => ['bg' => '#d1e7dd', 'color' => '#0f5132', 'text' => 'APPROVED'],
                    'payment_pending' => ['bg' => '#fff3cd', 'color' => '#856404', 'text' => 'WAITING PAYMENT'],
                    'revision_needed' => ['bg' => '#f8d7da', 'color' => '#842029', 'text' => 'REVISION NEEDED'],
                    'verification_process' => ['bg' => '#cff4fc', 'color' => '#055160', 'text' => 'VERIFICATION'],
                    'rejected' => ['bg' => '#f8d7da', 'color' => '#842029', 'text' => 'REJECTED'],
                ];
                $currentStatus = $badges[$order['status']] ?? ['bg' => '#e2e3e5', 'color' => '#41464b', 'text' => strtoupper(str_replace('_', ' ', $order['status']))];
            ?>
            <span
                style="background: <?= $currentStatus['bg'] ?>; color: <?= $currentStatus['color'] ?>; padding: 10px 20px; border-radius: 30px; font-weight: bold; font-size: 14px;">
                <?= $currentStatus['text'] ?>
            </span>
        </div>

        <?php if (session()->getFlashdata('success')) : ?>
        <div style="background: #d1e7dd; color: #0f5132; padding: 15px; border-radius: 10px; margin-bottom: 20px;">
            <i class="fas fa-check-circle"></i> <?= session()->getFlashdata('success') ?>
        </div>
        <?php endif; ?>

        <div class="dashboard-grid" style="grid-template-columns: 1fr 2fr; gap: 20px;">

            <div class="card" style="height: fit-content;">
                <div class="card-header">
                    <h3><i class="fas fa-user"></i> Informasi Pemohon</h3>
                </div>
                <div style="padding: 20px;">
                    <div style="text-align: center; margin-bottom: 20px;">
                        <img src="https://ui-avatars.com/api/?name=<?= urlencode($order['full_name']) ?>&background=0d6efd&color=fff&size=100"
                            style="border-radius: 50%;">
                        <h3 style="margin-top: 10px; font-size: 18px;"><?= esc($order['full_name']) ?></h3>
                        <p style="color: #666; font-size: 14px;">
                            <?= esc($order['nationality'] ?? 'Nationality Unknown') ?></p>
                    </div>

                    <div style="border-top: 1px solid #eee; padding-top: 15px;">
                        <p style="margin-bottom: 8px;"><strong>Email:</strong> <br> <?= esc($order['email']) ?></p>
                        <p style="margin-bottom: 8px;"><strong>Layanan:</strong> <br> <?= esc($order['visa_name']) ?>
                        </p>
                        <p style="margin-bottom: 8px;"><strong>Harga:</strong> <br> Rp
                            <?= number_format($order['price'], 0, ',', '.') ?></p>
                    </div>

                    <?php
                        $hp = $order['phone_number'];
                        // Ubah format 08xxx atau +62xxx menjadi 62xxx agar API WA jalan
                        $hp = preg_replace('/^0/', '62', $hp);
                        $hp = preg_replace('/^\+/', '', $hp);

                        // Template Pesan WA
                        $pesan = "Halo kak {$order['full_name']}, kami dari Bali Fantastic Visas ingin mengonfirmasi permohonan visa #{$order['invoice_number']} Anda.";
                        $waLink = "https://wa.me/{$hp}?text=" . urlencode($pesan);
                    ?>

                    <a href="<?= $waLink ?>" target="_blank" class="btn btn-success"
                        style="width: 100%; margin-top: 20px; display: flex; align-items: center; justify-content: center; background: #25D366; border: none; color: white; padding: 10px; border-radius: 5px; text-decoration: none;">
                        <i class="fab fa-whatsapp" style="margin-right: 8px;"></i> Chat WhatsApp
                    </a>
                </div>
            </div>

            <div style="display: flex; flex-direction: column; gap: 20px;">

                <div class="card">
                    <div class="card-header">
                        <h3><i class="fas fa-file-alt"></i> Kelengkapan Dokumen</h3>
                    </div>
                    <div style="padding: 20px;">
                        <?php if(empty($documents)): ?>
                        <div
                            style="text-align: center; padding: 20px; color: #999; border: 2px dashed #eee; border-radius: 10px;">
                            <i class="fas fa-folder-open" style="font-size: 30px; margin-bottom: 10px;"></i>
                            <p>User belum mengupload dokumen apapun.</p>
                        </div>
                        <?php else: ?>
                        <table style="width: 100%; border-collapse: collapse;">
                            <?php foreach($documents as $doc): ?>
                            <tr style="border-bottom: 1px solid #eee;">
                                <td style="padding: 15px 0;">
                                    <strong><?= $doc['document_name'] ?></strong>
                                    <br>
                                    <small style="color: #999;">Diupload:
                                        <?= date('d M Y H:i', strtotime($doc['uploaded_at'])) ?></small>
                                </td>
                                <td style="text-align: right;">
                                    <a href="<?= base_url($doc['file_path']) ?>" target="_blank" class="btn btn-outline"
                                        style="padding: 5px 15px; font-size: 12px; border: 1px solid #ccc; border-radius: 5px; text-decoration: none; color: #333;">
                                        <i class="fas fa-eye"></i> Lihat
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </table>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h3><i class="fas fa-gavel"></i> Keputusan Admin</h3>
                    </div>
                    <div style="padding: 20px;">
                        <p style="margin-bottom: 15px; color: #666;">Silakan periksa dokumen di atas sebelum mengambil
                            keputusan.</p>

                        <div style="display: flex; gap: 10px;">
                            <form action="<?= base_url('dashboard/managementorder/process') ?>" method="post"
                                style="flex: 1;">
                                <input type="hidden" name="id" value="<?= $order['id'] ?>">
                                <input type="hidden" name="action" value="approve">
                                <button type="submit" class="btn btn-primary"
                                    style="width: 100%; background: #28a745; border-color: #28a745; color: white; padding: 10px; border-radius: 5px; border: none; cursor: pointer;"
                                    onclick="return confirm('Yakin setujui visa ini?')">
                                    <i class="fas fa-check"></i> Setujui (Approve)
                                </button>
                            </form>

                            <button type="button" class="btn btn-warning"
                                style="flex: 1; color: #000; background: #ffc107; border: none; padding: 10px; border-radius: 5px; cursor: pointer;"
                                onclick="document.getElementById('revisionModal').style.display='flex'">
                                <i class="fas fa-edit"></i> Minta Revisi
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<div id="revisionModal"
    style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.5); z-index:9999; align-items:center; justify-content:center;">
    <div
        style="background:white; width:500px; padding:30px; border-radius:10px; box-shadow: 0 5px 15px rgba(0,0,0,0.3); animation: slideDown 0.3s ease;">
        <h3 style="margin-top: 0;">Alasan Revisi / Penolakan</h3>
        <p style="color: #666; font-size: 13px; margin-bottom: 15px;">Pesan ini akan muncul di dashboard user (Sidebar).
        </p>

        <form action="<?= base_url('dashboard/managementorder/process') ?>" method="post">
            <input type="hidden" name="id" value="<?= $order['id'] ?>">
            <input type="hidden" name="action" value="revision">

            <textarea name="admin_note" rows="4" required placeholder="Contoh: Foto paspor buram, mohon upload ulang..."
                style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; margin-bottom: 20px; font-family: inherit;"></textarea>

            <div style="text-align: right; display: flex; gap: 10px; justify-content: flex-end;">
                <button type="button" onclick="document.getElementById('revisionModal').style.display='none'"
                    style="padding: 10px 20px; background: transparent; border: 1px solid #ccc; border-radius: 5px; cursor: pointer;">Batal</button>
                <button type="submit"
                    style="padding: 10px 20px; background: #dc3545; color: white; border: none; border-radius: 5px; cursor: pointer;">Kirim
                    Revisi</button>
            </div>
        </form>
    </div>
</div>

<script>
// Script Tutup Modal kalau klik di luar area putih
window.onclick = function(event) {
    let modal = document.getElementById('revisionModal');
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

/* Responsive Layout */
@media (max-width: 768px) {
    .dashboard-grid {
        grid-template-columns: 1fr !important;
    }
}
</style>
<?= $this->endSection() ?>