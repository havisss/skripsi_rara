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
                        <!-- ORDER 1 - URGENT -->
                        <tr class="order-row urgent-row">
                            <td><input type="checkbox"></td>
                            <td>
                                <span class="order-id">#INV-2024001</span>
                            </td>
                            <td>
                                <div class="client-info">
                                    <img src="https://ui-avatars.com/api/?name=John+Smith&background=0d6efd&color=fff"
                                        alt="Client">
                                    <div>
                                        <strong>John Smith</strong>
                                        <small>john.smith@email.com</small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="badge-visa voa">VOA on Arrival</span>
                            </td>
                            <td>
                                <span class="date-text">20 Nov 2024</span>
                                <small class="time-ago">2 hari lalu</small>
                            </td>
                            <td>
                                <span class="status-badge status-uploaded">
                                    <i class="fas fa-check-circle"></i> Uploaded
                                </span>
                            </td>
                            <td>
                                <span class="status-badge status-pending">
                                    <i class="fas fa-clock"></i> Pending Review
                                </span>
                            </td>
                            <td>
                                <span class="priority-badge high">
                                    <i class="fas fa-exclamation-circle"></i> High
                                </span>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <button class="btn-icon btn-view" title="Lihat Detail">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn-icon btn-edit" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn-icon btn-more" title="More">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <!-- ORDER 2 - REVISION NEEDED -->
                        <tr class="order-row revision-row">
                            <td><input type="checkbox"></td>
                            <td>
                                <span class="order-id">#INV-2024002</span>
                            </td>
                            <td>
                                <div class="client-info">
                                    <img src="https://ui-avatars.com/api/?name=Maria+Garcia&background=6c757d&color=fff"
                                        alt="Client">
                                    <div>
                                        <strong>Maria Garcia</strong>
                                        <small>maria.garcia@email.com</small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="badge-visa b211">B211A Extension</span>
                            </td>
                            <td>
                                <span class="date-text">19 Nov 2024</span>
                                <small class="time-ago">3 hari lalu</small>
                            </td>
                            <td>
                                <span class="status-badge status-revision">
                                    <i class="fas fa-redo"></i> Need Revision
                                </span>
                            </td>
                            <td>
                                <span class="status-badge status-rejected">
                                    <i class="fas fa-times-circle"></i> Rejected
                                </span>
                            </td>
                            <td>
                                <span class="priority-badge medium">
                                    <i class="fas fa-minus-circle"></i> Medium
                                </span>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <button class="btn-icon btn-view" title="Lihat Detail">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn-icon btn-edit" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn-icon btn-more" title="More">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <!-- ORDER 3 - IN PROCESS -->
                        <tr class="order-row">
                            <td><input type="checkbox"></td>
                            <td>
                                <span class="order-id">#INV-2024003</span>
                            </td>
                            <td>
                                <div class="client-info">
                                    <img src="https://ui-avatars.com/api/?name=David+Lee&background=28a745&color=fff"
                                        alt="Client">
                                    <div>
                                        <strong>David Lee</strong>
                                        <small>david.lee@email.com</small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="badge-visa kitas">KITAS 317</span>
                            </td>
                            <td>
                                <span class="date-text">18 Nov 2024</span>
                                <small class="time-ago">4 hari lalu</small>
                            </td>
                            <td>
                                <span class="status-badge status-verified">
                                    <i class="fas fa-check-double"></i> Verified
                                </span>
                            </td>
                            <td>
                                <span class="status-badge status-in-process">
                                    <i class="fas fa-spinner"></i> In Process
                                </span>
                            </td>
                            <td>
                                <span class="priority-badge low">
                                    <i class="fas fa-check-circle"></i> Low
                                </span>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <button class="btn-icon btn-view" title="Lihat Detail">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn-icon btn-edit" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn-icon btn-more" title="More">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <!-- ORDER 4 - COMPLETED -->
                        <tr class="order-row">
                            <td><input type="checkbox"></td>
                            <td>
                                <span class="order-id">#INV-2024004</span>
                            </td>
                            <td>
                                <div class="client-info">
                                    <img src="https://ui-avatars.com/api/?name=Sarah+Johnson&background=ffc107&color=000"
                                        alt="Client">
                                    <div>
                                        <strong>Sarah Johnson</strong>
                                        <small>sarah.j@email.com</small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="badge-visa voa">VOA on Arrival</span>
                            </td>
                            <td>
                                <span class="date-text">15 Nov 2024</span>
                                <small class="time-ago">7 hari lalu</small>
                            </td>
                            <td>
                                <span class="status-badge status-verified">
                                    <i class="fas fa-check-double"></i> Verified
                                </span>
                            </td>
                            <td>
                                <span class="status-badge status-completed">
                                    <i class="fas fa-check-circle"></i> Completed
                                </span>
                            </td>
                            <td>
                                <span class="priority-badge low">
                                    <i class="fas fa-check-circle"></i> Low
                                </span>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <button class="btn-icon btn-view" title="Lihat Detail">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn-icon btn-edit" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn-icon btn-more" title="More">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <!-- ORDER 5 - PARTIAL DOCUMENTS -->
                        <tr class="order-row">
                            <td><input type="checkbox"></td>
                            <td>
                                <span class="order-id">#INV-2024005</span>
                            </td>
                            <td>
                                <div class="client-info">
                                    <img src="https://ui-avatars.com/api/?name=Robert+Chen&background=dc3545&color=fff"
                                        alt="Client">
                                    <div>
                                        <strong>Robert Chen</strong>
                                        <small>robert.chen@email.com</small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="badge-visa kitap">KITAP</span>
                            </td>
                            <td>
                                <span class="date-text">22 Nov 2024</span>
                                <small class="time-ago">Hari ini</small>
                            </td>
                            <td>
                                <span class="status-badge status-partial">
                                    <i class="fas fa-exclamation-triangle"></i> Partial
                                </span>
                            </td>
                            <td>
                                <span class="status-badge status-pending">
                                    <i class="fas fa-clock"></i> Pending
                                </span>
                            </td>
                            <td>
                                <span class="priority-badge medium">
                                    <i class="fas fa-minus-circle"></i> Medium
                                </span>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <button class="btn-icon btn-view" title="Lihat Detail">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn-icon btn-edit" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn-icon btn-more" title="More">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
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