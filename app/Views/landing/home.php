<?= $this->extend('landing/navbar') ?>

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
        </div>
        <div class="welcome-text">
            <div class="section-label">WELCOME TO VISAEASE</div>
            <h2>Welcome To Immigration<br><span>Advisory Services</span></h2>
            <p>Foundation was established with a small idea that was incepted in the minds of its promoters in the
                year 1989! We skillfully guide the applicants for their immigration process to any country they
                aspire to settle.</p>

            <div class="features-grid">
                <div class="feature-item">
                    <div class="feature-icon"><i class="fa-solid fa-clipboard-list"></i></div>
                    <div class="feature-text">
                        <h4>Visa Consultation</h4>
                        <p>Knowledge of immigration rules better than anyone</p>
                    </div>
                </div>
                <div class="feature-item">
                    <div class="feature-icon"><i class="fa-solid fa-users"></i></div>
                    <div class="feature-text">
                        <h4>Professional Agents</h4>
                        <p>Skilled professional are available to the help</p>
                    </div>
                </div>
            </div>

            <div class="signature">
            </div>
        </div>
    </div>
</section>

<section class="consultation-services">
    <div class="services-header">
    </div>

    <div class="services-grid">
        <div class="service-card">
            <div class="service-icon"><i class="fa-solid fa-plane-departure"></i></div>
            <h3>e-VOA</h3>
            <p>For the persons whose jobs require a minimum work experience that are not necessary or available.</p>
            <a href="#" class="view-more">View More Info →</a>
        </div>

        <div class="service-card">
            <div class="service-icon"><i class="fa-solid fa-earth-asia"></i></div>
            <h3>Tourist Visa</h3>
            <p>For the independent residents visas documents issued to immigrants under the Immigration and
                Nationality Act.</p>
            <a href="#" class="view-more">View More Info →</a>
        </div>

        <div class="service-card">
            <div class="service-icon"><i class="fa-solid fa-briefcase"></i></div>
            <h3>Business Visa</h3>
            <p>Permit To Work is one of the engagement and arrangement systems used to ensure that work is done
                safely & efficiently.</p>
            <a href="#" class="view-more">View More Info →</a>
        </div>

        <div class="service-card">
            <div class="service-icon"><i class="fa-solid fa-building"></i></div>
            <h3>Work Permit</h3>
            <p>For the persons whose jobs require a minimum work experience that are not necessary or available.</p>
            <a href="#" class="view-more">View More Info →</a>
        </div>

        <div class="service-card">
            <div class="service-icon"><i class="fa-solid fa-arrows-rotate"></i></div>
            <h3>Multiple Entry Visa</h3>
            <p>For the independent residents visas documents issued to immigrants under the Immigration and
                Nationality Act.</p>
            <a href="#" class="view-more">View More Info →</a>
        </div>

        <div class="service-card">
            <div class="service-icon"><i class="fa-solid fa-heart"></i></div>
            <h3>Family Visa</h3>
            <p>Permit To Work is one of the engagement and arrangement systems used to ensure that work is done
                safely & efficiently.</p>
            <a href="#" class="view-more">View More Info →</a>
        </div>
    </div>
</section>

<?= $this->endSection() ?>