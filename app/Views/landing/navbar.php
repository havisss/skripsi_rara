<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VisaEase - Indonesia Immigration & Visa Company</title>

    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">

</head>

<body>
    <div class="top-bar">
        <div class="top-bar-content">
            <div class="top-left">
                <span>📅 Sunday - Sat 9.00 - 18.00</span>
                <span>📍 Visa Consultants, Bali, Indonesia</span>
            </div>
            <div class="top-right">
                <span>✉ youremail@gmail.com</span>
                <div class="social-links">
                    <a href="#">f</a>
                    <a href="#">t</a>
                    <a href="#">in</a>
                </div>
                <a href="tel:+6218002001234" class="phone-number">📞 +62 1800-200-1234</a>
            </div>
        </div>
    </div>

    <header>
        <nav>
            <a href="#" class="logo">
                <div class="logo-icon">🌐</div>
                <span>VisaEase</span>
            </a>
            <ul class="nav-menu">
                <li><a href="#">HOME</a></li>
                <li><a href="#">PAGES</a></li>
                <li><a href="#">COACHING</a></li>
                <li><a href="#">VISA</a></li>
                <li><a href="#">COUNTRY</a></li>
                <li><a href="#">BLOG</a></li>
            </ul>
            <div class="nav-cta">
                <a href="#" class="btn-consultation">Get A Consultation!</a>
                <span class="search-icon">🔍</span>
            </div>
        </nav>
    </header>

    <?= $this->renderSection('content') ?>

</body>

</html>