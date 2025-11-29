<?= $this->extend('dashboard/sidebaradmin') ?>
<?= $this->section('content') ?>

<div class="main-content">
    <div class="dashboard-content">

        <div class="page-header">
            <div>
                <a href="<?= base_url('dashboard/managementorder') ?>" class="btn btn-outline btn-sm mb-2"><i
                        class="fas fa-arrow-left"></i> Kembali</a>
                <h1 class="page-title">Verifikasi Dokumen #<?= $app['invoice_number'] ?></h1>
                <p class="page-subtitle"><?= $app['full_name'] ?> - <?= $app['visa_name'] ?></p>
            </div>

            <div class="page-actions">
                <form action="<?= base_url('dashboard/managementorder/process') ?>" method="post"
                    onsubmit="return confirm('Yakin ingin memproses status ini?');">
                    <input type="hidden" name="application_id" value="<?= $app['id'] ?>">

                    <button type="submit" name="action" value="reject" class="btn btn-danger">
                        <i class="fas fa-times"></i> Tolak Permohonan
                    </button>

                    <button type="submit" name="action" value="approve" class="btn btn-success">
                        <i class="fas fa-check"></i> Setujui (Approve)
                    </button>
                </form>
            </div>
        </div>

        <div class="row" style="display: flex; gap: 20px;">

            <div class="col-md-4" style="flex: 1;">
                <div class="card">
                    <h3>Informasi Pemohon</h3>
                    <table class="table" style="width: 100%; margin-top: 10px;">
                        <tr>
                            <td style="padding: 10px; border-bottom: 1px solid #eee; color: #666;">Nama Lengkap</td>
                            <td style="padding: 10px; border-bottom: 1px solid #eee; font-weight: bold;">
                                <?= $app['full_name'] ?></td>
                        </tr>
                        <tr>
                            <td style="padding: 10px; border-bottom: 1px solid #eee; color: #666;">Email</td>
                            <td style="padding: 10px; border-bottom: 1px solid #eee;"><?= $app['email'] ?></td>
                        </tr>
                        <tr>
                            <td style="padding: 10px; border-bottom: 1px solid #eee; color: #666;">WhatsApp</td>
                            <td style="padding: 10px; border-bottom: 1px solid #eee;"><?= $app['phone_number'] ?></td>
                        </tr>
                        <tr>
                            <td style="padding: 10px; border-bottom: 1px solid #eee; color: #666;">Status Saat Ini</td>
                            <td style="padding: 10px; border-bottom: 1px solid #eee;">
                                <span
                                    class="badge bg-<?= ($app['status'] == 'approved') ? 'success' : (($app['status'] == 'rejected') ? 'danger' : 'warning') ?>"
                                    style="padding: 5px 10px; border-radius: 4px; color: white;">
                                    <?= strtoupper($app['status']) ?>
                                </span>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="col-md-8" style="flex: 2;">
                <div class="card">
                    <h3>Dokumen Persyaratan</h3>

                    <?php if (empty($documents)): ?>
                    <p class="text-danger">User belum mengupload dokumen apapun.</p>
                    <?php else: ?>
                    <div class="doc-list"
                        style="display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 15px; margin-top: 15px;">
                        <?php foreach ($documents as $doc): ?>
                        <div class="doc-item"
                            style="border: 1px solid #ddd; padding: 10px; border-radius: 8px; text-align: center;">
                            <div style="font-weight: bold; margin-bottom: 5px; font-size: 14px;">
                                <?= $doc['document_name'] ?></div>

                            <?php
                                    $ext = pathinfo($doc['file_path'], PATHINFO_EXTENSION);
                                    $fileUrl = base_url($doc['file_path']);
                                    ?>

                            <?php if (in_array(strtolower($ext), ['jpg', 'jpeg', 'png'])): ?>
                            <img src="<?= $fileUrl ?>" alt="Doc"
                                style="width: 100%; height: 120px; object-fit: cover; border-radius: 4px; cursor: pointer;"
                                onclick="window.open('<?= $fileUrl ?>')">
                            <?php else: ?>
                            <div
                                style="height: 120px; display: flex; align-items: center; justify-content: center; background: #f8f9fa; color: #dc3545; font-size: 40px;">
                                <i class="fas fa-file-pdf"></i>
                            </div>
                            <?php endif; ?>

                            <a href="<?= $fileUrl ?>" target="_blank" class="btn btn-sm btn-primary mt-2"
                                style="display: block; margin-top: 10px; text-decoration: none; padding: 5px; background: #0d6efd; color: white; border-radius: 4px;">
                                <i class="fas fa-external-link-alt"></i> Buka File
                            </a>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>

        </div>
    </div>
</div>

<?= $this->endSection() ?>