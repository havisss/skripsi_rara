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
                <button class="btn btn-primary" onclick="document.getElementById('addModal').style.display='flex'">
                    <i class="fas fa-plus"></i> Tambah Jenis Visa
                </button>
            </div>

            <div class="visa-types-grid">

                <?php foreach ($visas as $visa): ?>
                    <div class="visa-type-card active-service">
                        <div class="visa-type-header">
                            <div class="visa-type-badge">
                                <?php if (str_contains(strtolower($visa['name']), 'voa')): ?>
                                    <i class="fas fa-plane-arrival"></i>
                                <?php elseif (str_contains(strtolower($visa['name']), 'kitas')): ?>
                                    <i class="fas fa-id-card"></i>
                                <?php else: ?>
                                    <i class="fas fa-passport"></i>
                                <?php endif; ?>
                            </div>
                            <div class="visa-type-status">
                                <span class="status-indicator <?= ($visa['is_active']) ? 'active' : 'inactive'; ?>"></span>
                                <span class="status-text"><?= ($visa['is_active']) ? 'Active' : 'Inactive'; ?></span>
                            </div>
                        </div>

                        <div class="visa-type-body">
                            <h3 class="visa-type-name"><?= esc($visa['name']); ?></h3>
                            <p class="visa-type-code">Code: <?= esc($visa['code']); ?></p>

                            <div class="visa-type-info">
                                <div class="info-item">
                                    <span class="info-label">Harga</span>
                                    <span class="info-value price">Rp
                                        <?= number_format($visa['price'], 0, ',', '.'); ?></span>
                                </div>
                                <div class="info-item">
                                    <span class="info-label">Durasi</span>
                                    <span class="info-value"><?= $visa['duration_days']; ?> hari</span>
                                </div>
                            </div>

                            <div class="visa-type-description">
                                <p><?= esc($visa['description']); ?></p>
                            </div>
                        </div>

                        <div class="visa-type-footer">
                            <button type="button" class="btn-action btn-edit" onclick="openEditModal(
        '<?= $visa['id'] ?>', 
        '<?= esc($visa['name']) ?>', 
        '<?= $visa['price'] ?>', 
        '<?= $visa['duration_days'] ?>', 
        '<?= esc($visa['description']) ?>', 
        '<?= esc($visa['image_url']) ?>', 
        `<?= $visa['regulation_content'] ?>`, 
        <?= $visa['is_active'] ?>
    )">
                                <i class="fas fa-edit"></i> Edit
                            </button>
                            <a href="<?= base_url('dashboard/managementservice/delete/' . $visa['id']) ?>"
                                class="btn-action"
                                onclick="return confirm('Yakin ingin menghapus layanan visa ini? Data order terkait mungkin akan error.')"
                                style="background-color: #dc3545; color: white;">
                                <i class="fas fa-trash"></i>
                            </a>
                            <?php if ($visa['is_active']): ?>
                                <button class="btn-action btn-toggle">
                                    <i class="fas fa-toggle-on"></i>
                                </button>
                            <?php else: ?>
                                <button class="btn-action btn-toggle-off">
                                    <i class="fas fa-toggle-off"></i>
                                </button>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>

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
                    <button class="btn btn-primary"
                        onclick="document.getElementById('addReqModal').style.display='flex'">
                        <i class="fas fa-plus"></i> Tambah Persyaratan
                    </button>
                </div>
            </div>

            <div class="requirements-container">
                <?php if (empty($requirements)): ?>
                    <p class="text-center p-3">Belum ada persyaratan dokumen.</p>
                <?php else: ?>
                    <?php foreach ($requirements as $req): ?>
                        <div class="requirement-item <?= ($req['is_mandatory']) ? '' : 'optional'; ?>">
                            <div class="requirement-header">
                                <div class="requirement-drag">
                                    <i class="fas fa-grip-vertical"></i>
                                </div>
                                <div class="requirement-info">
                                    <h4><?= esc($req['document_name']); ?></h4>
                                    <small class="text-muted">Untuk: <?= esc($req['visa_name']); ?></small>

                                    <?php if ($req['is_mandatory']): ?>
                                        <span class="requirement-mandatory">
                                            <i class="fas fa-asterisk"></i> Mandatory
                                        </span>
                                    <?php else: ?>
                                        <span class="requirement-optional">
                                            <i class="fas fa-circle"></i> Optional
                                        </span>
                                    <?php endif; ?>
                                </div>
                                <div class="requirement-actions">
                                    <button class="btn-req-action edit" onclick="openEditReqModal(
        '<?= $req['id'] ?>',
        '<?= $req['visa_type_id'] ?>',
        '<?= esc($req['document_name']) ?>',
        '<?= $req['file_type'] ?>',
        <?= $req['is_mandatory'] ?>
    )">
                                        <i class="fas fa-edit"></i>
                                    </button>

                                    <a href="<?= base_url('dashboard/managementservice/req/delete/' . $req['id']) ?>"
                                        class="btn-req-action delete" onclick="return confirm('Hapus persyaratan ini?')"
                                        style="display:inline-flex; text-decoration:none; align-items:center; justify-content:center;">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="requirement-details">
                                <div class="detail-item">
                                    <span class="detail-label">File Type:</span>
                                    <span class="detail-value"><?= strtoupper($req['file_type']); ?></span>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
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



<div id="editModal"
    style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.5); z-index:9999; align-items:center; justify-content:center;">

    <div
        style="background:white; width:500px; padding:30px; border-radius:10px; box-shadow:0 5px 20px rgba(0,0,0,0.2); position:relative; animation: slideDown 0.3s ease; max-height: 90vh; overflow-y: auto;">

        <h2 style="margin-top:0; margin-bottom:20px; color:#333;">Edit Layanan Visa</h2>

        <form action="<?= base_url('dashboard/managementservice/update') ?>" method="post"
            enctype="multipart/form-data">
            <input type="hidden" name="id" id="edit_id">

            <div style="margin-bottom:15px;">
                <label style="display:block; margin-bottom:5px; font-weight:bold;">Nama Visa</label>
                <input type="text" id="edit_name" disabled
                    style="width:100%; padding:10px; border:1px solid #ddd; background:#f9f9f9; border-radius:5px;">
            </div>

            <div style="display:flex; gap:15px; margin-bottom:15px;">
                <div style="flex:1;">
                    <label style="display:block; margin-bottom:5px; font-weight:bold;">Harga (Rp)</label>
                    <input type="number" name="price" id="edit_price" required
                        style="width:100%; padding:10px; border:1px solid #ddd; border-radius:5px;">
                </div>
                <div style="flex:1;">
                    <label style="display:block; margin-bottom:5px; font-weight:bold;">Durasi (Hari)</label>
                    <input type="number" name="duration" id="edit_duration" required
                        style="width:100%; padding:10px; border:1px solid #ddd; border-radius:5px;">
                </div>
            </div>

            <div style="margin-bottom:15px;">
                <label style="display:block; margin-bottom:5px; font-weight:bold;">Deskripsi Singkat</label>
                <textarea name="description" id="edit_description" rows="2"
                    style="width:100%; padding:10px; border:1px solid #ddd; border-radius:5px;"></textarea>
            </div>

            <div style="margin-bottom:15px;">
                <label style="display:block; margin-bottom:5px; font-weight:bold;">Gambar Sampul</label>
                <div style="display:flex; align-items:center; gap:10px;">
                    <img id="preview_edit_image" src=""
                        style="width:50px; height:50px; object-fit:cover; border-radius:5px; border:1px solid #ddd; background:#eee;">
                    <input type="file" name="image" accept="image/*"
                        style="flex:1; padding:10px; border:1px solid #ddd; border-radius:5px;">
                </div>
                <small style="color:#888;">Biarkan kosong jika tidak ingin mengubah gambar.</small>
            </div>

            <div style="margin-bottom:15px;">
                <label style="display:block; margin-bottom:5px; font-weight:bold;">Artikel & Regulasi</label>
                <textarea name="regulation_content" id="edit_regulation" rows="6"
                    placeholder="Tulis regulasi lengkap di sini..."
                    style="width:100%; padding:10px; border:1px solid #ddd; border-radius:5px; font-family:inherit;"></textarea>
            </div>

            <div style="margin-bottom:20px;">
                <label style="display:flex; align-items:center; gap:10px; cursor:pointer;">
                    <input type="checkbox" name="is_active" id="edit_active" value="1">
                    <span>Aktifkan Layanan ini?</span>
                </label>
            </div>

            <div style="text-align:right; border-top:1px solid #eee; padding-top:20px;">
                <button type="button" onclick="document.getElementById('editModal').style.display='none'"
                    style="padding:10px 20px; background:transparent; border:1px solid #ccc; border-radius:5px; cursor:pointer; margin-right:10px;">Batal</button>
                <button type="submit"
                    style="padding:10px 20px; background:#0d6efd; color:white; border:none; border-radius:5px; cursor:pointer;">Simpan
                    Perubahan</button>
            </div>
        </form>
    </div>
</div>


<div id="addModal"
    style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.5); z-index:9999; align-items:center; justify-content:center;">

    <div
        style="background:white; width:500px; padding:30px; border-radius:10px; box-shadow:0 5px 20px rgba(0,0,0,0.2); position:relative; animation: slideDown 0.3s ease; max-height: 90vh; overflow-y: auto;">

        <h2 style="margin-top:0; margin-bottom:20px; color:#333;">Tambah Layanan Baru</h2>

        <form action="<?= base_url('dashboard/managementservice/save') ?>" method="post" enctype="multipart/form-data">

            <div style="display:flex; gap:15px; margin-bottom:15px;">
                <div style="flex:2;">
                    <label style="display:block; margin-bottom:5px; font-weight:bold;">Nama Visa</label>
                    <input type="text" name="name" required placeholder="Cth: Visa Digital Nomad"
                        style="width:100%; padding:10px; border:1px solid #ddd; border-radius:5px;">
                </div>
                <div style="flex:1;">
                    <label style="display:block; margin-bottom:5px; font-weight:bold;">Kode Unik</label>
                    <input type="text" name="code" required placeholder="Cth: nomad_1"
                        style="width:100%; padding:10px; border:1px solid #ddd; border-radius:5px;">
                </div>
            </div>

            <div style="display:flex; gap:15px; margin-bottom:15px;">
                <div style="flex:1;">
                    <label style="display:block; margin-bottom:5px; font-weight:bold;">Harga (Rp)</label>
                    <input type="number" name="price" required placeholder="0"
                        style="width:100%; padding:10px; border:1px solid #ddd; border-radius:5px;">
                </div>
                <div style="flex:1;">
                    <label style="display:block; margin-bottom:5px; font-weight:bold;">Durasi (Hari)</label>
                    <input type="number" name="duration" required placeholder="30"
                        style="width:100%; padding:10px; border:1px solid #ddd; border-radius:5px;">
                </div>
            </div>

            <div style="margin-bottom:15px;">
                <label style="display:block; margin-bottom:5px; font-weight:bold;">Deskripsi Singkat</label>
                <textarea name="description" rows="2" required placeholder="Jelaskan peruntukan visa ini..."
                    style="width:100%; padding:10px; border:1px solid #ddd; border-radius:5px;"></textarea>
            </div>

            <div style="margin-bottom:15px;">
                <label style="display:block; margin-bottom:5px; font-weight:bold;">Gambar Sampul</label>
                <input type="file" name="image" accept="image/*"
                    style="width:100%; padding:10px; border:1px solid #ddd; border-radius:5px;">
            </div>

            <div style="margin-bottom:15px;">
                <label style="display:block; margin-bottom:5px; font-weight:bold;">Artikel & Regulasi</label>
                <textarea name="regulation_content" rows="6" placeholder="Tulis regulasi lengkap..."
                    style="width:100%; padding:10px; border:1px solid #ddd; border-radius:5px;"></textarea>
            </div>

            <div style="text-align:right; border-top:1px solid #eee; padding-top:20px;">
                <button type="button" onclick="document.getElementById('addModal').style.display='none'"
                    style="padding:10px 20px; background:transparent; border:1px solid #ccc; border-radius:5px; cursor:pointer; margin-right:10px;">Batal</button>
                <button type="submit"
                    style="padding:10px 20px; background:#28a745; color:white; border:none; border-radius:5px; cursor:pointer;">Simpan
                    Data</button>
            </div>
        </form>
    </div>
</div>
<script>
    // Fungsi untuk membuka modal dan mengisi data
    // Fungsi untuk membuka modal dan mengisi data
    function openEditModal(id, name, price, duration, description, image, regulation, isActive) {
        document.getElementById('editModal').style.display = 'flex';

        document.getElementById('edit_id').value = id;
        document.getElementById('edit_name').value = name;
        document.getElementById('edit_price').value = price;
        document.getElementById('edit_duration').value = duration;
        document.getElementById('edit_description').value = description;

        // Isi Textarea Regulasi
        document.getElementById('edit_regulation').value = regulation;

        // Tampilkan Preview Gambar
        let imgPath = '<?= base_url("uploads/visa/") ?>' + image;
        document.getElementById('preview_edit_image').src = imgPath;

        document.getElementById('edit_active').checked = (isActive == 1);
    }

    // Menutup modal jika klik di luar area putih
    window.onclick = function(event) {
        let modal = document.getElementById('editModal');
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

    // Menutup modal jika klik di luar area putih
    window.onclick = function(event) {
        let editModal = document.getElementById('editModal');
        let addModal = document.getElementById('addModal'); // Tambahan

        if (event.target == editModal) {
            editModal.style.display = "none";
        }
        if (event.target == addModal) { // Tambahan
            addModal.style.display = "none";
        }
    }

    // Fungsi Buka Modal Edit Requirement
    function openEditReqModal(id, visaId, name, type, mandatory) {
        document.getElementById('editReqModal').style.display = 'flex';

        document.getElementById('req_edit_id').value = id;
        document.getElementById('req_edit_visa').value = visaId;
        document.getElementById('req_edit_name').value = name;
        document.getElementById('req_edit_type').value = type;
        document.getElementById('req_edit_mandatory').checked = (mandatory == 1);
    }

    // Update window.onclick agar menutup modal requirement juga
    window.onclick = function(event) {
        // ... (kode modal edit/add visa yang lama) ...

        // Tambahan untuk modal requirement
        let addReqModal = document.getElementById('addReqModal');
        let editReqModal = document.getElementById('editReqModal');

        if (event.target == addReqModal) addReqModal.style.display = "none";
        if (event.target == editReqModal) editReqModal.style.display = "none";
    }
</script>

<style>
    /* CSS agar Tab Berfungsi */
    .tab-content {
        display: none;
        /* Sembunyikan semua konten secara default */
        animation: fadeIn 0.3s ease;
    }

    .tab-content.active {
        display: block;
        /* Munculkan hanya yang punya class active */
    }

    /* Styling tombol tab saat aktif */
    .service-tab.active {
        border-bottom: 2px solid #0d6efd;
        /* Garis biru di bawah */
        color: #0d6efd;
        font-weight: bold;
        background: #f8f9fa;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Ambil semua tombol tab dan semua konten tab
        const tabs = document.querySelectorAll('.service-tab');
        const contents = document.querySelectorAll('.tab-content');

        tabs.forEach(tab => {
            tab.addEventListener('click', function() {
                // 1. Hapus class 'active' dari semua tab & konten
                tabs.forEach(t => t.classList.remove('active'));
                contents.forEach(c => c.classList.remove('active'));

                // 2. Tambahkan class 'active' ke tab yang diklik
                this.classList.add('active');

                // 3. Ambil target ID dari data-tab (misal: "requirements")
                const targetId = this.getAttribute('data-tab');

                // 4. Munculkan konten yang sesuai ID-nya
                const targetContent = document.getElementById(targetId);
                if (targetContent) {
                    targetContent.classList.add('active');
                }
            });
        });
    });

    // ... (Script Modal Edit/Add biarkan tetap ada di bawah sini) ...
</script>


<div id="addReqModal"
    style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.5); z-index:9999; align-items:center; justify-content:center;">
    <div
        style="background:white; width:450px; padding:30px; border-radius:10px; box-shadow:0 5px 20px rgba(0,0,0,0.2); animation: slideDown 0.3s ease;">
        <h3 style="margin-top:0;">Tambah Persyaratan</h3>
        <form action="<?= base_url('dashboard/managementservice/req/save') ?>" method="post">

            <div style="margin-bottom:15px;">
                <label style="display:block; margin-bottom:5px; font-weight:bold;">Untuk Jenis Visa</label>
                <select name="visa_type_id" class="form-control"
                    style="width:100%; padding:10px; border:1px solid #ddd; border-radius:5px;">
                    <?php foreach ($visas as $v): ?>
                        <option value="<?= $v['id'] ?>"><?= $v['name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div style="margin-bottom:15px;">
                <label style="display:block; margin-bottom:5px; font-weight:bold;">Nama Dokumen</label>
                <input type="text" name="document_name" required placeholder="Contoh: Scan Paspor"
                    style="width:100%; padding:10px; border:1px solid #ddd; border-radius:5px;">
            </div>

            <div style="margin-bottom:15px;">
                <label style="display:block; margin-bottom:5px; font-weight:bold;">Tipe File</label>
                <select name="file_type" style="width:100%; padding:10px; border:1px solid #ddd; border-radius:5px;">
                    <option value="pdf">PDF Document</option>
                    <option value="jpg">Image (JPG/PNG)</option>
                    <option value="pdf,jpg">Semua (PDF & Gambar)</option>
                </select>
            </div>

            <div style="margin-bottom:20px;">
                <label style="display:flex; align-items:center; gap:10px; cursor:pointer;">
                    <input type="checkbox" name="is_mandatory" value="1" checked>
                    <span>Wajib Diupload (Mandatory)</span>
                </label>
            </div>

            <div style="text-align:right;">
                <button type="button" onclick="document.getElementById('addReqModal').style.display='none'"
                    style="padding:8px 15px; border:1px solid #ccc; background:white; border-radius:5px; cursor:pointer;">Batal</button>
                <button type="submit"
                    style="padding:8px 15px; border:none; background:#0d6efd; color:white; border-radius:5px; cursor:pointer;">Simpan</button>
            </div>
        </form>
    </div>
</div>

<div id="editReqModal"
    style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.5); z-index:9999; align-items:center; justify-content:center;">
    <div
        style="background:white; width:450px; padding:30px; border-radius:10px; box-shadow:0 5px 20px rgba(0,0,0,0.2); animation: slideDown 0.3s ease;">
        <h3 style="margin-top:0;">Edit Persyaratan</h3>
        <form action="<?= base_url('dashboard/managementservice/req/update') ?>" method="post">
            <input type="hidden" name="id" id="req_edit_id">

            <div style="margin-bottom:15px;">
                <label style="display:block; margin-bottom:5px; font-weight:bold;">Untuk Jenis Visa</label>
                <select name="visa_type_id" id="req_edit_visa" class="form-control"
                    style="width:100%; padding:10px; border:1px solid #ddd; border-radius:5px;">
                    <?php foreach ($visas as $v): ?>
                        <option value="<?= $v['id'] ?>"><?= $v['name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div style="margin-bottom:15px;">
                <label style="display:block; margin-bottom:5px; font-weight:bold;">Nama Dokumen</label>
                <input type="text" name="document_name" id="req_edit_name" required
                    style="width:100%; padding:10px; border:1px solid #ddd; border-radius:5px;">
            </div>

            <div style="margin-bottom:15px;">
                <label style="display:block; margin-bottom:5px; font-weight:bold;">Tipe File</label>
                <select name="file_type" id="req_edit_type"
                    style="width:100%; padding:10px; border:1px solid #ddd; border-radius:5px;">
                    <option value="pdf">PDF Document</option>
                    <option value="jpg">Image (JPG/PNG)</option>
                    <option value="pdf,jpg">Semua (PDF & Gambar)</option>
                </select>
            </div>

            <div style="margin-bottom:20px;">
                <label style="display:flex; align-items:center; gap:10px; cursor:pointer;">
                    <input type="checkbox" name="is_mandatory" id="req_edit_mandatory" value="1">
                    <span>Wajib Diupload (Mandatory)</span>
                </label>
            </div>

            <div style="text-align:right;">
                <button type="button" onclick="document.getElementById('editReqModal').style.display='none'"
                    style="padding:8px 15px; border:1px solid #ccc; background:white; border-radius:5px; cursor:pointer;">Batal</button>
                <button type="submit"
                    style="padding:8px 15px; border:none; background:#0d6efd; color:white; border-radius:5px; cursor:pointer;">Update</button>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>