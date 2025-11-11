<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VisaEase - Indonesia Immigration & Visa Company</title>

    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
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

</body>

</html>