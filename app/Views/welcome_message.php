<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VisaEase - Indonesia Immigration & Visa Company</title>
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        line-height: 1.6;
        color: #ffffff;
    }

    /* Top Bar */
    .top-bar {
        background: #1a1f3a;
        padding: 0.75rem 0;
        font-size: 0.85rem;
        border-bottom: 1px solid #2a3150;
    }

    .top-bar-content {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 2rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .top-left {
        display: flex;
        gap: 2rem;
        color: #a0aec0;
    }

    .top-left span {
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .top-right {
        display: flex;
        align-items: center;
        gap: 2rem;
    }

    .social-links {
        display: flex;
        gap: 1rem;
    }

    .social-links a {
        color: #a0aec0;
        text-decoration: none;
        transition: color 0.3s;
    }

    .social-links a:hover {
        color: #4c6fff;
    }

    .phone-number {
        background: #4c6fff;
        padding: 0.5rem 1.5rem;
        border-radius: 5px;
        color: white;
        text-decoration: none;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    /* Header */
    header {
        background: #232947;
        padding: 1rem 0;
        position: sticky;
        top: 0;
        z-index: 100;
    }

    nav {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 2rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .logo {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-size: 1.8rem;
        font-weight: 700;
        color: #ffffff;
        text-decoration: none;
    }

    .logo-icon {
        width: 35px;
        height: 35px;
        background: #4c6fff;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
    }

    .nav-menu {
        display: flex;
        gap: 2.5rem;
        list-style: none;
        align-items: center;
    }

    .nav-menu a {
        color: #ffffff;
        text-decoration: none;
        font-weight: 500;
        font-size: 0.95rem;
        transition: color 0.3s;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .nav-menu a:hover {
        color: #4c6fff;
    }

    .nav-cta {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .btn-consultation {
        background: transparent;
        color: white;
        padding: 0.7rem 1.8rem;
        border: 2px solid #4c6fff;
        border-radius: 25px;
        text-decoration: none;
        font-weight: 600;
        font-size: 0.9rem;
        transition: all 0.3s;
    }

    .btn-consultation:hover {
        background: #4c6fff;
    }

    .search-icon {
        color: white;
        font-size: 1.2rem;
        cursor: pointer;
    }

    /* Hero Section */
    .hero {
        background: linear-gradient(135deg, #1e2a4a 0%, #2d3e5f 100%);
        position: relative;
        min-height: 600px;
        display: flex;
        align-items: center;
        overflow: hidden;
    }

    .hero::before {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        width: 60%;
        height: 100%;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 800 600"><rect fill="%232d3e5f" width="800" height="600"/></svg>');
        opacity: 0.3;
    }

    .hero-content {
        max-width: 1200px;
        margin: 0 auto;
        padding: 4rem 2rem;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 3rem;
        align-items: center;
        position: relative;
        z-index: 2;
    }

    .hero-text {
        padding-right: 2rem;
    }

    .hero-label {
        color: #4c6fff;
        font-size: 0.9rem;
        font-weight: 600;
        margin-bottom: 1rem;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .hero h1 {
        font-size: 3.5rem;
        line-height: 1.2;
        margin-bottom: 1.5rem;
        font-weight: 700;
    }

    .hero h1 span {
        color: #4c6fff;
    }

    .hero-cta {
        margin-top: 2rem;
    }

    .btn-primary {
        display: inline-block;
        background: #4c6fff;
        color: white;
        padding: 1rem 2.5rem;
        border-radius: 30px;
        text-decoration: none;
        font-weight: 600;
        font-size: 1rem;
        transition: all 0.3s;
        box-shadow: 0 10px 30px rgba(76, 111, 255, 0.3);
    }

    .btn-primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 40px rgba(76, 111, 255, 0.4);
    }

    .hero-image {
        position: relative;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
    }

    .hero-image img {
        width: 100%;
        height: auto;
        display: block;
    }

    .carousel-dots {
        position: absolute;
        bottom: 20px;
        left: 50%;
        transform: translateX(-50%);
        display: flex;
        gap: 10px;
    }

    .dot {
        width: 10px;
        height: 10px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.5);
        cursor: pointer;
        transition: all 0.3s;
    }

    .dot.active {
        background: #4c6fff;
        width: 30px;
        border-radius: 5px;
    }

    /* Welcome Section */
    .welcome-section {
        padding: 5rem 2rem;
        background: white;
    }

    .welcome-content {
        max-width: 1200px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 4rem;
        align-items: center;
    }

    .welcome-image {
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
    }

    .welcome-image img {
        width: 100%;
        height: auto;
        display: block;
    }

    .welcome-text {
        color: #2d3748;
    }

    .section-label {
        color: #4c6fff;
        font-size: 0.9rem;
        font-weight: 600;
        margin-bottom: 1rem;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .welcome-text h2 {
        font-size: 2.5rem;
        color: #1a202c;
        margin-bottom: 1rem;
        line-height: 1.3;
    }

    .welcome-text h2 span {
        color: #4c6fff;
        font-weight: 700;
    }

    .welcome-text p {
        color: #718096;
        line-height: 1.8;
        margin-bottom: 2rem;
    }

    .features-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 2rem;
        margin-bottom: 2rem;
    }

    .feature-item {
        display: flex;
        gap: 1rem;
    }

    .feature-icon {
        width: 50px;
        height: 50px;
        background: #ebf4ff;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .feature-icon img {
        width: 24px;
        height: 24px;
    }

    .feature-text h4 {
        color: #1a202c;
        font-size: 1.1rem;
        margin-bottom: 0.3rem;
    }

    .feature-text p {
        color: #718096;
        font-size: 0.9rem;
        line-height: 1.6;
        margin: 0;
    }

    .signature {
        display: flex;
        align-items: center;
        gap: 1.5rem;
        margin-top: 2rem;
    }

    .signature img {
        height: 50px;
    }

    .signature-text {
        color: #2d3748;
    }

    .signature-text strong {
        display: block;
        color: #1a202c;
        font-size: 1.1rem;
    }

    .signature-text span {
        color: #718096;
        font-size: 0.9rem;
    }

    /* Consultation Services Section */
    .consultation-services {
        background: #f7fafc;
        padding: 5rem 2rem;
    }

    .services-header {
        text-align: center;
        max-width: 800px;
        margin: 0 auto 4rem;
    }

    .services-grid {
        max-width: 1200px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 2rem;
    }

    .service-card {
        background: white;
        padding: 2.5rem 2rem;
        border-radius: 15px;
        text-align: center;
        transition: all 0.3s;
        border: 1px solid #e2e8f0;
    }

    .service-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
    }

    .service-icon {
        width: 70px;
        height: 70px;
        background: #ebf4ff;
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.5rem;
        font-size: 2rem;
    }

    .service-card h3 {
        color: #1a202c;
        font-size: 1.4rem;
        margin-bottom: 1rem;
    }

    .service-card p {
        color: #718096;
        line-height: 1.7;
        margin-bottom: 1.5rem;
    }

    .view-more {
        color: #4c6fff;
        text-decoration: none;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        transition: gap 0.3s;
    }

    .view-more:hover {
        gap: 1rem;
    }

    /* Responsive */
    @media (max-width: 968px) {

        .hero-content,
        .welcome-content {
            grid-template-columns: 1fr;
        }

        .services-grid {
            grid-template-columns: 1fr;
        }

        .hero h1 {
            font-size: 2.5rem;
        }

        .top-bar-content {
            flex-direction: column;
            gap: 1rem;
        }

        .nav-menu {
            gap: 1rem;
            flex-wrap: wrap;
        }

        .features-grid {
            grid-template-columns: 1fr;
        }
    }
    </style>
</head>




<body>
    <!-- Top Bar -->
    <div class="top-bar">
        <div class="top-bar-content">
            <div class="top-left">
                <span>📅 Saturday - Sat 9.00 - 18.00</span>
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

    <!-- Header -->
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

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <div class="hero-text">
                <div class="hero-label">— VISA ASSISTANCE | IMMIGRATION</div>
                <h1>World Brilliant<br><span>Immigration</span> & Visa Company</h1>
                <div class="hero-cta">
                    <a href="#" class="btn-primary">Book A Consultation!</a>
                </div>
            </div>
            <div class="hero-image">
                <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 600 400'%3E%3Crect fill='%232d3e5f' width='600' height='400'/%3E%3Ctext x='50%25' y='50%25' font-size='24' fill='white' text-anchor='middle' dy='.3em'%3EProfessional Consultation Image%3C/text%3E%3C/svg%3E"
                    alt="Hero">
                <div class="carousel-dots">
                    <span class="dot active"></span>
                    <span class="dot"></span>
                    <span class="dot"></span>
                </div>
            </div>
        </div>
    </section>

    <!-- Welcome Section -->
    <section class="welcome-section">
        <div class="welcome-content">
            <div class="welcome-image">
                <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 500 600'%3E%3Crect fill='%23f0f4f8' width='500' height='600'/%3E%3Ctext x='50%25' y='50%25' font-size='20' fill='%234a5568' text-anchor='middle' dy='.3em'%3EConsultation Meeting%3C/text%3E%3C/svg%3E"
                    alt="Consultation">
            </div>
            <div class="welcome-text">
                <div class="section-label">WELCOME TO VISAEASE</div>
                <h2>Welcome To Immigration<br><span>Advisory Services</span></h2>
                <p>Foundation was established with a small idea that was incepted in the minds of its promoters in the
                    year 1989! We skillfully guide the applicants for their immigration process to any country they
                    aspire to settle.</p>

                <div class="features-grid">
                    <div class="feature-item">
                        <div class="feature-icon">📋</div>
                        <div class="feature-text">
                            <h4>Visa Consultation</h4>
                            <p>Knowledge of immigration rules better than anyone</p>
                        </div>
                    </div>
                    <div class="feature-item">
                        <div class="feature-icon">👥</div>
                        <div class="feature-text">
                            <h4>Professional Agents</h4>
                            <p>Skilled professional are available to the help</p>
                        </div>
                    </div>
                </div>

                <div class="signature">
                    <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 150 50'%3E%3Ctext x='10' y='30' font-size='24' fill='%234c6fff' font-family='cursive'%3ESignature%3C/text%3E%3C/svg%3E"
                        alt="Signature">
                    <div class="signature-text">
                        <strong>— Jhon Martin</strong>
                        <span>Chairman and Founder</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Consultation Services Section -->
    <section class="consultation-services">
        <div class="services-header">
            <div class="section-label">OUR CATEGORIES</div>
            <h2 style="font-size: 2.5rem; color: #1a202c; margin-bottom: 1rem;">Visa Immigration <span
                    style="color: #4c6fff; font-weight: 700;">Consultation Services</span></h2>
        </div>

        <div class="services-grid">
            <div class="service-card">
                <div class="service-icon">✈</div>
                <h3>e-VOA</h3>
                <p>For the persons whose jobs require a minimum work experience that are not necessary or available.</p>
                <a href="#" class="view-more">View More Info →</a>
            </div>

            <div class="service-card">
                <div class="service-icon">🌏</div>
                <h3>Tourist Visa</h3>
                <p>For the independent residents visas documents issued to immigrants under the Immigration and
                    Nationality Act.</p>
                <a href="#" class="view-more">View More Info →</a>
            </div>

            <div class="service-card">
                <div class="service-icon">💼</div>
                <h3>Business Visa</h3>
                <p>Permit To Work is one of the engagement and arrangement systems used to ensure that work is done
                    safely & efficiently.</p>
                <a href="#" class="view-more">View More Info →</a>
            </div>

            <div class="service-card">
                <div class="service-icon">🏢</div>
                <h3>Work Permit</h3>
                <p>For the persons whose jobs require a minimum work experience that are not necessary or available.</p>
                <a href="#" class="view-more">View More Info →</a>
            </div>

            <div class="service-card">
                <div class="service-icon">🔄</div>
                <h3>Multiple Entry Visa</h3>
                <p>For the independent residents visas documents issued to immigrants under the Immigration and
                    Nationality Act.</p>
                <a href="#" class="view-more">View More Info →</a>
            </div>

            <div class="service-card">
                <div class="service-icon">❤</div>
                <h3>Family Visa</h3>
                <p>Permit To Work is one of the engagement and arrangement systems used to ensure that work is done
                    safely & efficiently.</p>
                <a href="#" class="view-more">View More Info →</a>
            </div>
        </div>
    </section>

</body>

</html>