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
                    'upload_pending' => ['bg' => '#ffe69c', 'color' => '#856404', 'text' => 'UPLOAD PENDING'],
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

        <?php if (session()->getFlashdata('error')) : ?>
        <div style="background: #f8d7da; color: #842029; padding: 15px; border-radius: 10px; margin-bottom: 20px;">
            <i class="fas fa-exclamation-circle"></i> <?= session()->getFlashdata('error') ?>
        </div>
        <?php endif; ?>

        <div class="dashboard-grid" style="display: grid; grid-template-columns: 1fr 2fr; gap: 20px;">

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
                        // Fix format nomor WA
                        $hp = preg_replace('/^0/', '62', $hp);
                        $hp = preg_replace('/^\+/', '', $hp);

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

                <div class="card" style="border: 2px solid #0d6efd;">
                    <div class="card-header" style="background: #0d6efd; color: white;">
                        <h3 style="color: white; margin: 0;"><i class="fas fa-gavel"></i> Proses & Upload Visa</h3>
                    </div>
                    <div style="padding: 20px;">
                        <p style="margin-bottom: 15px; color: #666; font-size: 13px;">
                            Pilih tindakan "Approve" untuk memunculkan kolom upload Visa. File akan otomatis terkirim ke
                            User.
                        </p>

                        <form action="<?= base_url('dashboard/managementorder/process') ?>" method="post"
                            enctype="multipart/form-data">

                            <input type="hidden" name="id" value="<?= $order['id'] ?>">

                            <div style="margin-bottom: 15px;">
                                <label style="font-weight: bold; display: block; margin-bottom: 5px;">Keputusan
                                    Admin:</label>
                                <select name="action" id="actionSelect" class="form-control"
                                    onchange="toggleUploadInput()"
                                    style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
                                    <option value="" disabled selected>-- Pilih Status --</option>
                                    <option value="revision">Minta Revisi (Dokumen Salah)</option>
                                    <option value="approve">VISA JADI (Approve & Upload)</option>
                                    <option value="reject">Tolak Permohonan (Reject)</option>
                                </select>
                            </div>

                            <div id="uploadArea"
                                style="display:none; background: #e8f5e9; padding: 15px; border: 1px dashed #2e7d32; border-radius: 8px; margin-bottom: 15px;">
                                <label style="color: #198754; font-weight: bold; display: block; margin-bottom: 5px;">
                                    <i class="fas fa-file-upload"></i> Upload File E-Visa (Wajib PDF/JPG)
                                </label>
                                <input type="file" name="visa_file" class="form-control"
                                    style="width: 100%; font-size: 14px;">
                                <small style="color: #666;">File ini akan muncul di dashboard user.</small>
                            </div>

                            <div style="margin-bottom: 15px;">
                                <label style="font-weight: bold; display: block; margin-bottom: 5px;">Catatan
                                    (Opsional):</label>
                                <textarea name="note" rows="3" placeholder="Pesan untuk user..."
                                    style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;"></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary"
                                style="width: 100%; padding: 12px; background: #0d6efd; color: white; border: none; border-radius: 5px; font-weight: bold; cursor: pointer;">
                                <i class="fas fa-save"></i> SIMPAN KEPUTUSAN
                            </button>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<script>
function toggleUploadInput() {
    var action = document.getElementById('actionSelect').value;
    var uploadDiv = document.getElementById('uploadArea');

    // Tampilkan kotak upload hanya jika pilih 'approve'
    if (action === 'approve') {
        uploadDiv.style.display = 'block';
    } else {
        uploadDiv.style.display = 'none';
    }
}
</script>

<style>
/* Responsive Fix */
@media (max-width: 768px) {
    .dashboard-grid {
        grid-template-columns: 1fr !important;
    }
}
</style>

<?= $this->endSection() ?>