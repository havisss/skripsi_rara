<?= $this->extend('dashboard/sidebaradmin') ?>
<?= $this->section('content') ?>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="main-content">
    <div class="dashboard-content">
        <h1 class="page-title">Dashboard Overview</h1>

        <div class="stats-row">
            <div class="stat-card primary">
                <div class="stat-icon"><i class="fas fa-clock"></i></div>
                <div class="stat-details">
                    <h3><?= $count_pending; ?></h3>
                    <p>Pending Orders</p>
                    <small>Menunggu review</small>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon" style="background: #f7ba03; color: #fff;"><i class="fas fa-spinner"></i></div>
                <div class="stat-details">
                    <h3><?= $count_process; ?></h3>
                    <p>In Process</p>
                    <small>Sedang diproses</small>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon" style="background: #22c55e; color: #fff;"><i class="fas fa-check-circle"></i>
                </div>
                <div class="stat-details">
                    <h3><?= $count_completed; ?></h3>
                    <p>Completed</p>
                    <small>Total disetujui</small>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon" style="background: #ef4444; color: #fff;"><i class="fas fa-times-circle"></i>
                </div>
                <div class="stat-details">
                    <h3><?= $count_rejected; ?></h3>
                    <p>Rejected</p>
                    <small>Ditolak/Batal</small>
                </div>
            </div>
        </div>

        <div class="dashboard-grid">
            <div class="card urgent-card">
                <div class="card-header">
                    <h3><i class="fas fa-exclamation-triangle"></i> Urgent Actions (Terbaru)</h3>
                </div>
                <div class="urgent-list">
                    <?php if (empty($urgent_actions)): ?>
                        <p style="padding:20px; text-align:center; color:#888;">Tidak ada data masuk.</p>
                    <?php else: ?>
                        <?php foreach ($urgent_actions as $urgent): ?>
                            <div class="urgent-item">
                                <div class="urgent-icon"><i class="fas fa-file-import"></i></div>
                                <div class="urgent-content">
                                    <h4><?= esc($urgent['full_name']); ?></h4>
                                    <p><?= esc($urgent['visa_name']); ?></p>
                                    <small><i class="fas fa-clock"></i>
                                        <?= date('d M H:i', strtotime($urgent['created_at'])); ?></small>
                                </div>
                                <button class="btn-action btn-primary" onclick="openPreviewModal(
                                    '<?= $urgent['id'] ?>', 
                                    '<?= $urgent['invoice_number'] ?>',
                                    '<?= esc($urgent['full_name']) ?>', 
                                    '<?= esc($urgent['visa_name']) ?>',
                                    '<?= $urgent['status'] ?>',
                                    '<?= date('d F Y', strtotime($urgent['created_at'])) ?>'
                                )">
                                    <i class="fas fa-eye"></i> Preview
                                </button>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>

            <div class="card activity-card">
                <div class="card-header">
                    <h3><i class="fas fa-history"></i> Recent Activity</h3>
                </div>
                <div class="activity-timeline">
                    <?php if (empty($recent_activities)): ?>
                        <p style="padding:20px; text-align:center; color:#888;">Belum ada aktivitas.</p>
                    <?php else: ?>
                        <?php foreach ($recent_activities as $act): ?>
                            <div class="activity-item">
                                <?php
                                // Logic warna dot
                                $dotClass = 'bg-primary';
                                if ($act['status'] == 'approved') $dotClass = 'bg-success';
                                if ($act['status'] == 'rejected') $dotClass = 'bg-danger';
                                ?>
                                <div class="activity-dot <?= $dotClass ?>"></div>
                                <div class="activity-content">
                                    <p>Permohonan baru masuk dari <strong><?= esc($act['full_name']) ?></strong></p>
                                    <small><i class="fas fa-clock"></i>
                                        <?= date('d M Y, H:i', strtotime($act['created_at'])) ?></small>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="chart-section" style="margin-top: 30px; display: grid; grid-template-columns: 2fr 1fr; gap: 20px;">
            <div class="card">
                <div class="card-header">
                    <h3>Order Statistics (Bulan Ini)</h3>
                </div>
                <div style="padding: 20px;">
                    <canvas id="orderChart" style="height: 300px; width: 100%;"></canvas>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h3>Visa Type Distribution</h3>
                </div>
                <ul class="traffic-list" style="padding: 20px;">
                    <?php if (empty($visa_dist)): ?>
                        <p style="text-align: center; color: #888;">Belum ada data visa.</p>
                    <?php else: ?>
                        <?php foreach ($visa_dist as $v):
                            $percent = round(($v['total'] / $total_apps) * 100);
                        ?>
                            <li class="traffic-item" style="margin-bottom: 15px;">
                                <div style="display: flex; justify-content: space-between; margin-bottom: 5px;">
                                    <span class="traffic-source" style="font-weight: 600;"><?= $v['name'] ?></span>
                                    <span class="traffic-percent"><?= $percent ?>%</span>
                                </div>
                                <div class="traffic-bar"
                                    style="background: #eee; height: 8px; border-radius: 4px; overflow: hidden;">
                                    <div class="traffic-progress"
                                        style="width: <?= $percent ?>%; background: #0d6efd; height: 100%;"></div>
                                </div>
                                <small style="color: #888;"><?= $v['total'] ?> Aplikasi</small>
                            </li>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
</div>

<div id="previewModal"
    style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.5); z-index:9999; align-items:center; justify-content:center;">
    <div
        style="background:white; width:450px; padding:0; border-radius:15px; box-shadow:0 10px 30px rgba(0,0,0,0.2); overflow: hidden; animation: slideUp 0.3s ease;">
        <div style="background: #0d6efd; padding: 20px; color: white;">
            <h3 style="margin:0;">Quick Preview</h3>
            <p style="margin:5px 0 0; opacity: 0.8;" id="modalInvoice">#INV-000</p>
        </div>
        <div style="padding: 25px;">
            <div style="margin-bottom: 15px;">
                <label style="color:#888; font-size:12px;">NAMA PEMOHON</label>
                <div id="modalName" style="font-weight:bold; font-size:16px;">-</div>
            </div>
            <div style="margin-bottom: 15px;">
                <label style="color:#888; font-size:12px;">JENIS VISA</label>
                <div id="modalVisa" style="font-weight:bold; font-size:16px;">-</div>
            </div>
            <div style="display: flex; gap: 20px; margin-bottom: 20px;">
                <div>
                    <label style="color:#888; font-size:12px;">STATUS</label>
                    <div id="modalStatus" style="font-weight:bold;">-</div>
                </div>
                <div>
                    <label style="color:#888; font-size:12px;">TANGGAL</label>
                    <div id="modalDate" style="font-weight:bold;">-</div>
                </div>
            </div>
            <div style="display: flex; gap: 10px;">
                <button onclick="closePreviewModal()"
                    style="flex:1; padding:12px; border:1px solid #ddd; background:white; border-radius:8px; cursor:pointer;">Tutup</button>
                <a id="modalLink" href="#"
                    style="flex:1; padding:12px; border:none; background:#0d6efd; color:white; border-radius:8px; cursor:pointer; text-decoration:none; text-align:center;">Lihat
                    Detail Full</a>
            </div>
        </div>
    </div>
</div>

<script>
    // 1. CHART JS CONFIGURATION
    const ctx = document.getElementById('orderChart').getContext('2d');
    new Chart(ctx, {
        type: 'line', // Grafik Garis yang cantik
        data: {
            labels: <?= $chart_labels; ?>, // Data dari Controller
            datasets: [{
                label: 'Jumlah Permohonan',
                data: <?= $chart_values; ?>, // Data dari Controller
                borderColor: '#0d6efd',
                backgroundColor: 'rgba(13, 110, 253, 0.1)',
                borderWidth: 2,
                tension: 0.4, // Membuat garis melengkung halus
                fill: true,
                pointBackgroundColor: '#fff',
                pointBorderColor: '#0d6efd',
                pointRadius: 5
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        borderDash: [2, 4]
                    }
                },
                x: {
                    grid: {
                        display: false
                    }
                }
            }
        }
    });

    // 2. MODAL FUNCTIONS
    function openPreviewModal(id, invoice, name, visa, status, date) {
        document.getElementById('modalInvoice').innerText = '#' + invoice;
        document.getElementById('modalName').innerText = name;
        document.getElementById('modalVisa').innerText = visa;
        document.getElementById('modalStatus').innerText = status.toUpperCase().replace('_', ' ');
        document.getElementById('modalDate').innerText = date;

        // Update link tombol "Lihat Detail Full"
        document.getElementById('modalLink').href = "<?= base_url('dashboard/managementorder/detail/') ?>" + id;

        document.getElementById('previewModal').style.display = 'flex';
    }

    function closePreviewModal() {
        document.getElementById('previewModal').style.display = 'none';
    }

    // Close modal on click outside
    window.onclick = function(event) {
        let modal = document.getElementById('previewModal');
        if (event.target == modal) {
            closePreviewModal();
        }
    }
</script>

<style>
    @keyframes slideUp {
        from {
            transform: translateY(20px);
            opacity: 0;
        }

        to {
            transform: translateY(0);
            opacity: 1;
        }
    }

    /* Responsive Chart Grid */
    @media (max-width: 992px) {
        .chart-section {
            grid-template-columns: 1fr !important;
        }
    }
</style>

<?= $this->endSection() ?>