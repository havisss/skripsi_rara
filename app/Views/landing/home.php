<?= $this->extend('navbar') ?>

<?= $this->section('content') ?>

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

<?= $this->endSection() ?>