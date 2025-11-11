<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VisaEase - Indonesia Immigration & Visa Company</title>

    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        xintegrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>

    <header>
        <nav>
            <a href="#" class="logo">
                <div class="logo-icon"><i class="fa-solid fa-globe"></i></div>
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
                <span class="search-icon"><i class="fa-solid fa-search"></i></span>
            </div>
        </nav>
    </header>

    <?= $this->renderSection('content') ?>

    <!-- BARU: Menambahkan Footer Section -->
    <footer class="site-footer">
        <div class="footer-content">
            <div class="footer-grid">
                <!-- Kolom 1: About -->
                <div class="footer-column footer-about">
                    <a href="#" class="logo footer-logo">
                        <div class="logo-icon"><i class="fa-solid fa-globe"></i></div>
                        <span>VisaEase</span>
                    </a>
                    <p>Kami adalah konsultan imigrasi dan visa terkemuka di Indonesia, mendedikasikan diri untuk
                        membantu Anda mencapai tujuan Anda.</p>
                    <div class="footer-social">
                        <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="#"><i class="fa-brands fa-twitter"></i></a>
                        <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                        <a href="#"><i class="fa-brands fa-instagram"></i></a>
                    </div>
                </div>

                <!-- Kolom 2: Quick Links -->
                <div class="footer-column footer-links">
                    <h4>Quick Links</h4>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Coaching</a></li>
                        <li><a href="#">Visa Services</a></li>
                        <li><a href="#">Contact Us</a></li>
                    </ul>
                </div>

                <!-- Kolom 3: Our Services -->
                <div class="footer-column footer-links">
                    <h4>Our Services</h4>
                    <ul>
                        <li><a href="#">e-VOA</a></li>
                        <li><a href="#">Tourist Visa</a></li>
                        <li><a href="#">Business Visa</a></li>
                        <li><a href="#">Work Permit</a></li>
                        <li><a href="#">Family Visa</a></li>
                    </ul>
                </div>

                <!-- Kolom 4: Contact Us -->
                <div class="footer-column footer-contact">
                    <h4>Contact Us</h4>
                    <p><i class="fa-solid fa-location-dot"></i> Visa Consultants, Bali, Indonesia</p>
                    <p><i class="fa-solid fa-phone"></i> +62 1800-200-1234</p>
                    <p><i class="fa-solid fa-envelope"></i> youremail@gmail.com</p>
                    <p><i class="fa-solid fa-clock"></i> Sun - Sat: 9.00 - 18.00</p>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; <?= date('Y') ?> VisaEase. All Rights Reserved. Designed with <i class="fa-solid fa-heart"></i> by
                Gemini.</p>
        </div>
    </footer>
    <!-- Akhir Footer Section -->

</body>

</html>