<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VisaEase - Indonesia Immigration & Visa Company</title>

    <link rel="stylesheet" href="<?= base_url('assets/css/dashboard.css') ?>">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        xintegrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <!-- NAVBAR -->
    <nav class="navbar">
        <div class="navbar-right">
            <div class="user-profile">
                <span class="user-name"><?= $user_name ?? 'ADMIN' ?></span>
                <img src="<?= base_url('assets/img/' . ($user_image ?? 'default-avatar.png')) ?>" alt="User"
                    onerror="this.src='https://ui-avatars.com/api/?name=<?= urlencode($user_name ?? 'Admin') ?>&background=0d6efd&color=fff'">
                <i class="fas fa-chevron-down"></i>
            </div>
        </div>
    </nav>

    <?= $this->renderSection('content') ?>

    <!-- SIDEBAR -->
    <aside class="sidebar">
        <div class="sidebar-logo">
            BALI FANTASTIC VISAS
        </div>

        <ul class="sidebar-menu">
            <li>
                <a href="<?= base_url('dashboard') ?>"
                    class="<?= (uri_string() == 'dashboard' || uri_string() == '') ? 'active' : '' ?>">
                    <i class="fas fa-th-large"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="<?= base_url('dashboard/managementorder') ?>"
                    class="<?= (uri_string() == 'dashboard/managementorder') ? 'active' : '' ?>">
                    <i class="fas fa-user"></i>
                    <span>Management Order</span>
                </a>
            </li>
            <li>
                <a href="<?= base_url('dashboard/data') ?>"
                    class="<?= (uri_string() == 'dashboard/data') ? 'active' : '' ?>">
                    <i class="fas fa-folder"></i>
                    <span>Data Klien</span>
                </a>
            </li>
            <li>
                <a href="<?= base_url('dashboard/managementservice') ?>"
                    class="<?= (uri_string() == 'dashboard/managementservice') ? 'active' : '' ?>">
                    <i class="fas fa-bell"></i>
                    <span>Management Service</span>
                </a>
            </li>
            <li>
                <a href="<?= base_url('dashboard/transaksi') ?>"
                    class="<?= (uri_string() == 'dashboard/transaksi') ? 'active' : '' ?>">
                    <i class="fas fa-file-invoice-dollar"></i> <span>Transaksi</span>
                </a>
            </li>
            <div class="logout-btn">
                <a href="<?= base_url('admin/logout') ?>">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>LOGOUT</span>
                </a>
            </div>
    </aside>
</body>

</html>