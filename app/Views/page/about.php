<?= $this->extend('design/template') ?>

<?= $this->section('title') ?>About<?= $this->endSection() ?>

<?= $this->section('content') ?>

<!-- About Header -->
<div class="about-header text-center mb-5">
    <div class="about-badge mb-3">
        <span class="badge-text">
            <i class="fas fa-info-circle me-2"></i>Who We Are
        </span>
    </div>
    <h1 class="about-title mb-3">
        Welcome to <span class="gradient-text">Our Story</span>
    </h1>
    <p class="about-subtitle">
        Our project is built with <span class="tech-highlight">CodeIgniter 4</span>, 
        combining powerful functionality with elegant design
    </p>
</div>

<!-- Mission & Vision Section -->
<div class="row g-4 mb-5">
    <div class="col-lg-6">
        <div class="mission-card">
            <div class="card-icon-wrapper">
                <div class="card-icon bg-primary-gradient">
                    <i class="fas fa-bullseye"></i>
                </div>
            </div>
            <h2 class="card-title">Our Mission</h2>
            <p class="card-text">
                Our goal is to build a simple, clean, and responsive web application that's easy to use 
                and effortless to learn. We believe in creating solutions that empower users and developers alike.
            </p>
            <ul class="mission-list">
                <li><i class="fas fa-check-circle"></i> User-friendly interfaces</li>
                <li><i class="fas fa-check-circle"></i> Clean and maintainable code</li>
                <li><i class="fas fa-check-circle"></i> Scalable architecture</li>
                <li><i class="fas fa-check-circle"></i> Continuous innovation</li>
            </ul>
        </div>
    </div>
    
    <div class="col-lg-6">
        <div class="mission-card">
            <div class="card-icon-wrapper">
                <div class="card-icon bg-success-gradient">
                    <i class="fas fa-eye"></i>
                </div>
            </div>
            <h2 class="card-title">Our Vision</h2>
            <p class="card-text">
                We envision a world where technology is accessible to everyone. By leveraging modern frameworks 
                and best practices, we create applications that make a difference in people's lives.
            </p>
            <ul class="mission-list">
                <li><i class="fas fa-check-circle"></i> Innovation-driven solutions</li>
                <li><i class="fas fa-check-circle"></i> Excellence in execution</li>
                <li><i class="fas fa-check-circle"></i> Community-focused development</li>
                <li><i class="fas fa-check-circle"></i> Sustainable growth</li>
            </ul>
        </div>
    </div>
</div>

<!-- Values Section -->
<div class="values-section mb-5">
    <div class="text-center mb-4">
        <h2 class="section-title">
            <i class="fas fa-heart me-2"></i>Our Core Values
        </h2>
        <p class="section-subtitle">The principles that guide everything we do</p>
    </div>
    
    <div class="row g-4">
        <div class="col-md-6 col-lg-3">
            <div class="value-card">
                <div class="value-icon">
                    <i class="fas fa-lightbulb"></i>
                </div>
                <h3 class="value-title">Innovation</h3>
                <p class="value-text">
                    Constantly pushing boundaries and exploring new possibilities in web development
                </p>
            </div>
        </div>
        
        <div class="col-md-6 col-lg-3">
            <div class="value-card">
                <div class="value-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3 class="value-title">Quality</h3>
                <p class="value-text">
                    Delivering excellence in every line of code and every user interaction
                </p>
            </div>
        </div>
        
        <div class="col-md-6 col-lg-3">
            <div class="value-card">
                <div class="value-icon">
                    <i class="fas fa-users"></i>
                </div>
                <h3 class="value-title">Collaboration</h3>
                <p class="value-text">
                    Working together to achieve greater results and build lasting relationships
                </p>
            </div>
        </div>
        
        <div class="col-md-6 col-lg-3">
            <div class="value-card">
                <div class="value-icon">
                    <i class="fas fa-rocket"></i>
                </div>
                <h3 class="value-title">Growth</h3>
                <p class="value-text">
                    Continuously learning and evolving to stay ahead in the digital landscape
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Technology Stack -->
<div class="tech-stack-section mb-5">
    <div class="text-center mb-4">
        <h2 class="section-title">
            <i class="fas fa-code me-2"></i>Built With Modern Technology
        </h2>
        <p class="section-subtitle">Powered by industry-leading tools and frameworks</p>
    </div>
    
    <div class="tech-grid">
        <div class="tech-item">
            <div class="tech-logo">
                <i class="fab fa-php"></i>
            </div>
            <h4 class="tech-name">PHP 8+</h4>
            <p class="tech-desc">Modern server-side scripting</p>
        </div>
        
        <div class="tech-item featured">
            <div class="tech-badge">Primary</div>
            <div class="tech-logo featured">
                <i class="fas fa-fire"></i>
            </div>
            <h4 class="tech-name">CodeIgniter 4</h4>
            <p class="tech-desc">Powerful PHP framework</p>
        </div>
        
        <div class="tech-item">
            <div class="tech-logo">
                <i class="fab fa-bootstrap"></i>
            </div>
            <h4 class="tech-name">Bootstrap 5</h4>
            <p class="tech-desc">Responsive CSS framework</p>
        </div>
        
        <div class="tech-item">
            <div class="tech-logo">
                <i class="fab fa-js"></i>
            </div>
            <h4 class="tech-name">JavaScript</h4>
            <p class="tech-desc">Interactive functionality</p>
        </div>
        
        <div class="tech-item">
            <div class="tech-logo">
                <i class="fas fa-database"></i>
            </div>
            <h4 class="tech-name">MySQL</h4>
            <p class="tech-desc">Reliable database system</p>
        </div>
        
        <div class="tech-item">
            <div class="tech-logo">
                <i class="fab fa-font-awesome"></i>
            </div>
            <h4 class="tech-name">Font Awesome</h4>
            <p class="tech-desc">Beautiful icons library</p>
        </div>
    </div>
</div>

<!-- Stats Section -->
<div class="stats-section">
    <div class="stats-content">
        <h2 class="stats-title mb-4">Our Journey in Numbers</h2>
        <div class="stats-grid">
            <div class="stat-box">
                <div class="stat-number">100+</div>
                <div class="stat-label">Projects Completed</div>
            </div>
            <div class="stat-box">
                <div class="stat-number">50+</div>
                <div class="stat-label">Happy Clients</div>
            </div>
            <div class="stat-box">
                <div class="stat-number">99.9%</div>
                <div class="stat-label">Uptime Record</div>
            </div>
            <div class="stat-box">
                <div class="stat-number">24/7</div>
                <div class="stat-label">Support Available</div>
            </div>
        </div>
    </div>
</div>

<!-- CTA Section -->
<div class="cta-section-about text-center mt-5">
    <div class="cta-content">
        <h2 class="cta-title mb-3">Ready to Work Together?</h2>
        <p class="cta-text mb-4">
            Let's build something amazing together. Get in touch and let's start the conversation.
        </p>
        <div class="cta-buttons">
            <a href="<?= base_url('/contact') ?>" class="btn btn-light-custom btn-lg me-3">
                <i class="fas fa-envelope me-2"></i>Contact Us
            </a>
            <a href="<?= base_url('/') ?>" class="btn btn-outline-light-custom btn-lg">
                <i class="fas fa-home me-2"></i>Back to Home
            </a>
        </div>
    </div>
</div>

<style>
    /* About Header */
    .about-header {
        padding: 2rem 0;
    }
    
    .about-badge .badge-text {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 0.5rem 1.5rem;
        border-radius: 50px;
        font-size: 0.875rem;
        font-weight: 600;
        box-shadow: 0 4px 6px -1px rgba(102, 126, 234, 0.3);
    }
    
    .about-title {
        font-size: 3rem;
        font-weight: 800;
        color: #1e293b;
    }
    
    .gradient-text {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
    
    .about-subtitle {
        font-size: 1.125rem;
        color: #64748b;
        max-width: 700px;
        margin: 0 auto;
        line-height: 1.8;
    }
    
    .tech-highlight {
        background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        font-weight: 700;
    }
    
    /* Mission Cards */
    .mission-card {
        background: white;
        border-radius: 24px;
        padding: 2.5rem;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        border: 1px solid rgba(0, 0, 0, 0.05);
        height: 100%;
        transition: all 0.3s ease;
    }
    
    .mission-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.15);
    }
    
    .card-icon-wrapper {
        margin-bottom: 1.5rem;
    }
    
    .card-icon {
        width: 80px;
        height: 80px;
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        color: white;
    }
    
    .bg-primary-gradient {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }
    
    .bg-success-gradient {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
    }
    
    .card-title {
        font-size: 1.75rem;
        font-weight: 800;
        color: #1e293b;
        margin-bottom: 1rem;
    }
    
    .card-text {
        color: #64748b;
        font-size: 1.063rem;
        line-height: 1.8;
        margin-bottom: 1.5rem;
    }
    
    .mission-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    
    .mission-list li {
        padding: 0.75rem 0;
        color: #475569;
        font-size: 1rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }
    
    .mission-list i {
        color: #10b981;
        font-size: 1.125rem;
        flex-shrink: 0;
    }
    
    /* Section Titles */
    .section-title {
        font-size: 2.25rem;
        font-weight: 800;
        color: #1e293b;
        margin-bottom: 0.5rem;
    }
    
    .section-subtitle {
        font-size: 1.125rem;
        color: #64748b;
    }
    
    /* Values Section */
    .value-card {
        background: white;
        border-radius: 20px;
        padding: 2rem;
        text-align: center;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        border: 1px solid rgba(0, 0, 0, 0.05);
        height: 100%;
        transition: all 0.3s ease;
    }
    
    .value-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.15);
    }
    
    .value-icon {
        width: 70px;
        height: 70px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 18px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.25rem;
        font-size: 1.75rem;
        color: white;
    }
    
    .value-title {
        font-size: 1.25rem;
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 0.75rem;
    }
    
    .value-text {
        color: #64748b;
        font-size: 0.938rem;
        line-height: 1.6;
        margin: 0;
    }
    
    /* Tech Stack */
    .tech-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
        gap: 1.5rem;
        max-width: 1000px;
        margin: 0 auto;
    }
    
    .tech-item {
        background: white;
        border-radius: 20px;
        padding: 2rem 1.5rem;
        text-align: center;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        border: 1px solid rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
        position: relative;
    }
    
    .tech-item:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.15);
    }
    
    .tech-item.featured {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border: none;
    }
    
    .tech-item.featured .tech-name,
    .tech-item.featured .tech-desc {
        color: white;
    }
    
    .tech-badge {
        position: absolute;
        top: -12px;
        left: 50%;
        transform: translateX(-50%);
        background: #10b981;
        color: white;
        padding: 0.25rem 0.75rem;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 700;
        text-transform: uppercase;
    }
    
    .tech-logo {
        font-size: 3rem;
        color: #667eea;
        margin-bottom: 1rem;
    }
    
    .tech-logo.featured {
        color: white;
    }
    
    .tech-name {
        font-size: 1.125rem;
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 0.5rem;
    }
    
    .tech-desc {
        font-size: 0.875rem;
        color: #64748b;
        margin: 0;
    }
    
    /* Stats Section */
    .stats-section {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 24px;
        padding: 4rem 2rem;
        text-align: center;
        color: white;
        margin: 3rem 0;
    }
    
    .stats-title {
        font-size: 2rem;
        font-weight: 800;
        margin-bottom: 2rem;
    }
    
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 2rem;
        max-width: 900px;
        margin: 0 auto;
    }
    
    .stat-box {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        border-radius: 16px;
        padding: 2rem 1rem;
        border: 1px solid rgba(255, 255, 255, 0.2);
    }
    
    .stat-number {
        font-size: 2.5rem;
        font-weight: 800;
        margin-bottom: 0.5rem;
    }
    
    .stat-label {
        font-size: 0.938rem;
        opacity: 0.9;
        font-weight: 600;
    }
    
    /* CTA Section */
    .cta-section-about {
        padding: 3rem 0;
    }
    
    .cta-title {
        font-size: 2.5rem;
        font-weight: 800;
        color: #1e293b;
    }
    
    .cta-text {
        font-size: 1.125rem;
        color: #64748b;
        max-width: 600px;
        margin: 0 auto;
    }
    
    .btn-light-custom {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 0.875rem 2.5rem;
        border-radius: 50px;
        font-weight: 600;
        border: none;
        box-shadow: 0 10px 15px -3px rgba(102, 126, 234, 0.3);
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-block;
    }
    
    .btn-light-custom:hover {
        transform: translateY(-2px);
        box-shadow: 0 15px 25px -3px rgba(102, 126, 234, 0.4);
        color: white;
    }
    
    .btn-outline-light-custom {
        border: 2px solid #667eea;
        color: #667eea;
        padding: 0.875rem 2.5rem;
        border-radius: 50px;
        font-weight: 600;
        background: transparent;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-block;
    }
    
    .btn-outline-light-custom:hover {
        background: #667eea;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 10px 15px -3px rgba(102, 126, 234, 0.3);
    }
    
    /* Responsive Design */
    @media (max-width: 768px) {
        .about-title {
            font-size: 2rem;
        }
        
        .section-title {
            font-size: 1.75rem;
        }
        
        .mission-card {
            padding: 2rem;
        }
        
        .tech-grid {
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 1rem;
        }
        
        .stats-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
        }
        
        .cta-title {
            font-size: 2rem;
        }
        
        .cta-buttons .btn {
            display: block;
            width: 100%;
            margin: 0.5rem 0 !important;
        }
    }
</style>

<?= $this->endSection() ?>