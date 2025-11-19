<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Dashboard Admin - Pengurusan Visa' ?></title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/css/dashboard.css') ?>">
</head>

<body>

    <!-- SIDEBAR -->
    <aside class="sidebar">
        <div class="sidebar-logo">
            VISA
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
                <a href="<?= base_url('dashboard/profile') ?>"
                    class="<?= (uri_string() == 'dashboard/profile') ? 'active' : '' ?>">
                    <i class="fas fa-user"></i>
                    <span>Profile</span>
                </a>
            </li>
            <li>
                <a href="<?= base_url('dashboard/folders') ?>"
                    class="<?= (uri_string() == 'dashboard/folders') ? 'active' : '' ?>">
                    <i class="fas fa-folder"></i>
                    <span>Folders</span>
                </a>
            </li>
            <li>
                <a href="<?= base_url('dashboard/notification') ?>"
                    class="<?= (uri_string() == 'dashboard/notification') ? 'active' : '' ?>">
                    <i class="fas fa-bell"></i>
                    <span>Notification</span>
                </a>
            </li>
            <li>
                <a href="<?= base_url('dashboard/messages') ?>"
                    class="<?= (uri_string() == 'dashboard/messages') ? 'active' : '' ?>">
                    <i class="fas fa-envelope"></i>
                    <span>Messages</span>
                </a>
            </li>
            <li>
                <a href="<?= base_url('dashboard/help') ?>"
                    class="<?= (uri_string() == 'dashboard/help') ? 'active' : '' ?>">
                    <i class="fas fa-question-circle"></i>
                    <span>Help Center</span>
                </a>
            </li>
            <li>
                <a href="<?= base_url('dashboard/settings') ?>"
                    class="<?= (uri_string() == 'dashboard/settings') ? 'active' : '' ?>">
                    <i class="fas fa-cog"></i>
                    <span>Setting</span>
                </a>
            </li>
        </ul>

        <div class="logout-btn">
            <a href="<?= base_url('logout') ?>">
                <i class="fas fa-sign-out-alt"></i>
                <span>LOGOUT</span>
            </a>
        </div>
    </aside>

    <!-- MAIN CONTENT -->
    <main class="main-content">

        <!-- NAVBAR -->
        <nav class="navbar">
            <div class="search-box">
                <i class="fas fa-search"></i>
                <input type="text" placeholder="Search">
            </div>

            <div class="navbar-right">
                <div class="navbar-icons">
                    <a href="#"><i class="fas fa-ellipsis-h"></i></a>
                    <a href="#"><i class="fas fa-comment-dots"></i></a>
                    <a href="#"><i class="fas fa-home"></i></a>
                </div>

                <div class="user-profile">
                    <span class="user-name"><?= $user_name ?? 'ADMIN' ?></span>
                    <img src="<?= base_url('assets/img/' . ($user_image ?? 'default-avatar.png')) ?>" alt="User"
                        onerror="this.src='https://ui-avatars.com/api/?name=<?= urlencode($user_name ?? 'Admin') ?>&background=0d6efd&color=fff'">
                    <i class="fas fa-chevron-down"></i>
                </div>
            </div>
        </nav>

        <!-- DASHBOARD CONTENT -->
        <div class="dashboard-content">

            <!-- STATS CARDS -->
            <div class="stats-row">
                <?php 
                $statClasses = ['', '', 'primary'];
                $i = 0;
                foreach($stats as $key => $stat): 
                ?>
                <div class="stat-card <?= $statClasses[$i] ?>">
                    <div class="stat-icon">
                        <i class="<?= $stat['icon'] ?>"></i>
                    </div>
                    <div class="stat-details">
                        <h3><?= $stat['count'] ?></h3>
                        <p><?= $stat['label'] ?></p>
                        <small><?= $stat['change'] ?></small>
                    </div>
                </div>
                <?php 
                $i++;
                endforeach; 
                ?>
            </div>

            <!-- CHART & TOP PRODUCT -->
            <div class="chart-section">
                <div class="card">
                    <h3>Overview Statistics</h3>
                    <div id="chart"
                        style="height: 300px; display: flex; align-items: center; justify-content: center; background: #f9f9f9; border-radius: 10px;">
                        <p style="color: #999;">Chart akan ditampilkan di sini</p>
                    </div>
                </div>

                <div class="card">
                    <h3>Top Product Sale</h3>
                    <div style="text-align: center; padding: 30px 0;">
                        <!-- Donut Chart -->
                        <div
                            style="width: 150px; height: 150px; margin: 0 auto 20px; background: conic-gradient(#0d6efd 0% 60%, #333 60% 85%, #ddd 85% 100%); border-radius: 50%; position: relative;">
                            <div
                                style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); background: #fff; width: 100px; height: 100px; border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-direction: column;">
                                <small style="font-size: 11px; color: #999;">Total Sale</small>
                                <strong style="font-size: 24px;">95K</strong>
                            </div>
                        </div>
                        <div style="text-align: left;">
                            <div style="margin-bottom: 10px;">
                                <span
                                    style="display: inline-block; width: 12px; height: 12px; background: #0d6efd; margin-right: 8px; border-radius: 2px;"></span>
                                <span style="font-size: 14px;">Vector</span>
                            </div>
                            <div style="margin-bottom: 10px;">
                                <span
                                    style="display: inline-block; width: 12px; height: 12px; background: #333; margin-right: 8px; border-radius: 2px;"></span>
                                <span style="font-size: 14px;">Template</span>
                            </div>
                            <div>
                                <span
                                    style="display: inline-block; width: 12px; height: 12px; background: #ddd; margin-right: 8px; border-radius: 2px;"></span>
                                <span style="font-size: 14px;">Presentation</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CALENDAR & TRAFFIC -->
            <div class="chart-section">
                <div class="calendar">
                    <div class="calendar-header">
                        <h3><?= date('F Y') ?></h3>
                        <div class="calendar-nav">
                            <button><i class="fas fa-chevron-left"></i></button>
                            <button><i class="fas fa-chevron-right"></i></button>
                        </div>
                    </div>
                    <div class="calendar-days">
                        <div class="calendar-day-header">Mon</div>
                        <div class="calendar-day-header">Tue</div>
                        <div class="calendar-day-header">Wed</div>
                        <div class="calendar-day-header">Thu</div>
                        <div class="calendar-day-header">Fri</div>
                        <div class="calendar-day-header">Sat</div>
                        <div class="calendar-day-header">Sun</div>

                        <?php
                        $currentDay = date('j');
                        for($day = 5; $day <= 11; $day++):
                        ?>
                        <div class="calendar-day <?= ($day == $currentDay) ? 'active' : '' ?>">
                            <?= $day ?>
                        </div>
                        <?php endfor; ?>
                    </div>
                </div>

                <div class="card">
                    <h3>Traffic Source</h3>
                    <ul class="traffic-list">
                        <?php foreach($traffic_sources as $traffic): ?>
                        <li class="traffic-item">
                            <span class="traffic-source"><?= $traffic['domain'] ?></span>
                            <div class="traffic-bar">
                                <div class="traffic-progress" style="width: <?= $traffic['percentage'] ?>%;"></div>
                            </div>
                            <span class="traffic-percent"><?= $traffic['percentage'] ?>%</span>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>

        </div>
    </main>

    <!-- Minimal JS for smooth interactions -->
    <script>
    // Mobile menu toggle (optional)
    const userProfile = document.querySelector('.user-profile');
    userProfile?.addEventListener('click', function() {
        // Add dropdown functionality here if needed
        console.log('Profile clicked');
    });
    </script>
</body>

</html>