<?= $this->extend('design/template') ?>

<?= $this->section('title') ?>Home<?= $this->endSection() ?>

<?= $this->section('content') ?>

<!-- Hero Section -->
<div class="hero-section text-center mb-5">
  <div class="hero-content">
    <div class="hero-badge mb-3">
      <span class="badge-text">
        <i class="fas fa-star me-2"></i>Welcome to the Future
      </span>
    </div>
    <h1 class="hero-title mb-4">
      Build Amazing Things with
      <span class="gradient-text">CodeIgniter 4</span>
    </h1>
    <p class="hero-subtitle mb-4">
      Experience the power of modern web development with our beautifully crafted 
      CodeIgniter platform. Fast, secure, and scalable solutions for your next project.
    </p>
    <div class="hero-buttons">
      <a href="<?= base_url('/login') ?>" class="btn btn-primary-custom btn-lg me-3">
        <i class="fas fa-rocket me-2"></i>Get Started
      </a>
      <a href="<?= base_url('/contact') ?>" class="btn btn-outline-custom btn-lg">
        <i class="fas fa-envelope me-2"></i>Contact Us
      </a>
    </div>
  </div>
</div>

<!-- Features Section -->
<div class="row g-4 mb-5">
  <div class="col-md-6 col-lg-3">
    <div class="feature-card">
      <div class="feature-icon bg-primary-gradient">
        <i class="fas fa-bolt"></i>
      </div>
      <h3 class="feature-title">Lightning Fast</h3>
      <p class="feature-text">
        Built with CodeIgniter 4 for optimal performance and speed
      </p>
    </div>
  </div>
  
  <div class="col-md-6 col-lg-3">
    <div class="feature-card">
      <div class="feature-icon bg-success-gradient">
        <i class="fas fa-shield-alt"></i>
      </div>
      <h3 class="feature-title">Secure</h3>
      <p class="feature-text">
        Enterprise-grade security features built right in
      </p>
    </div>
  </div>
  
  <div class="col-md-6 col-lg-3">
    <div class="feature-card">
      <div class="feature-icon bg-info-gradient">
        <i class="fas fa-palette"></i>
      </div>
      <h3 class="feature-title">Beautiful Design</h3>
      <p class="feature-text">
        Modern Bootstrap styling with custom components
      </p>
    </div>
  </div>
  
  <div class="col-md-6 col-lg-3">
    <div class="feature-card">
      <div class="feature-icon bg-warning-gradient">
        <i class="fas fa-mobile-alt"></i>
      </div>
      <h3 class="feature-title">Responsive</h3>
      <p class="feature-text">
        Perfect experience on all devices and screen sizes
      </p>
    </div>
  </div>
</div>

<!-- Info Cards Section -->
<div class="row g-4 mb-5">
  <div class="col-lg-6">
    <div class="info-card">
      <div class="info-card-header">
        <i class="fas fa-code me-2"></i>
        <h2>Built with Modern Technology</h2>
      </div>
      <div class="info-card-body">
        <ul class="info-list">
          <li>
            <i class="fas fa-check-circle"></i>
            <span>CodeIgniter 4 - Latest PHP Framework</span>
          </li>
          <li>
            <i class="fas fa-check-circle"></i>
            <span>Bootstrap 5 - Modern CSS Framework</span>
          </li>
          <li>
            <i class="fas fa-check-circle"></i>
            <span>Font Awesome Icons - Beautiful Iconography</span>
          </li>
          <li>
            <i class="fas fa-check-circle"></i>
            <span>Responsive Design - Mobile First Approach</span>
          </li>
        </ul>
      </div>
    </div>
  </div>
  
  <div class="col-lg-6">
    <div class="info-card">
      <div class="info-card-header">
        <i class="fas fa-rocket me-2"></i>
        <h2>Why Choose Us?</h2>
      </div>
      <div class="info-card-body">
        <p class="mb-3">
          We combine cutting-edge technology with beautiful design to create 
          exceptional web experiences. Our platform is built on CodeIgniter 4, 
          ensuring your projects are fast, secure, and maintainable.
        </p>
        <div class="stats-grid">
          <div class="stat-item">
            <div class="stat-number">99.9%</div>
            <div class="stat-label">Uptime</div>
          </div>
          <div class="stat-item">
            <div class="stat-number">24/7</div>
            <div class="stat-label">Support</div>
          </div>
          <div class="stat-item">
            <div class="stat-number">1000+</div>
            <div class="stat-label">Projects</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- CTA Section -->
<div class="cta-section text-center">
  <div class="cta-content">
    <h2 class="cta-title mb-3">Ready to Get Started?</h2>
    <p class="cta-text mb-4">
      Join thousands of developers who are building amazing applications with our platform
    </p>
    <a href="<?= base_url('/contact') ?>" class="btn btn-light-custom btn-lg">
      <i class="fas fa-paper-plane me-2"></i>Start Your Journey
    </a>
  </div>
</div>

<style>
  /* Hero Section */
  .hero-section {
    padding: 4rem 0 3rem;
  }
  
  .hero-badge {
    display: inline-block;
  }
  
  .badge-text {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    padding: 0.5rem 1.5rem;
    border-radius: 50px;
    font-size: 0.875rem;
    font-weight: 600;
    box-shadow: 0 4px 6px -1px rgba(102, 126, 234, 0.3);
  }
  
  .hero-title {
    font-size: 3.5rem;
    font-weight: 800;
    line-height: 1.2;
    color: #1e293b;
    margin-bottom: 1.5rem;
  }
  
  .gradient-text {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
  }
  
  .hero-subtitle {
    font-size: 1.25rem;
    color: #64748b;
    max-width: 700px;
    margin: 0 auto;
    line-height: 1.8;
  }
  
  .btn-primary-custom {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border: none;
    color: white;
    padding: 0.875rem 2rem;
    border-radius: 50px;
    font-weight: 600;
    box-shadow: 0 10px 15px -3px rgba(102, 126, 234, 0.3);
    transition: all 0.3s ease;
  }
  
  .btn-primary-custom:hover {
    transform: translateY(-2px);
    box-shadow: 0 15px 25px -3px rgba(102, 126, 234, 0.4);
    color: white;
  }
  
  .btn-outline-custom {
    border: 2px solid #667eea;
    color: #667eea;
    padding: 0.875rem 2rem;
    border-radius: 50px;
    font-weight: 600;
    background: transparent;
    transition: all 0.3s ease;
  }
  
  .btn-outline-custom:hover {
    background: #667eea;
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 10px 15px -3px rgba(102, 126, 234, 0.3);
  }
  
  /* Feature Cards */
  .feature-card {
    background: white;
    border-radius: 20px;
    padding: 2rem 1.5rem;
    text-align: center;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    height: 100%;
    border: 1px solid rgba(0, 0, 0, 0.05);
  }
  
  .feature-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
  }
  
  .feature-icon {
    width: 70px;
    height: 70px;
    border-radius: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1.5rem;
    font-size: 1.75rem;
    color: white;
  }
  
  .bg-primary-gradient {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  }
  
  .bg-success-gradient {
    background: linear-gradient(135deg, #10b981 0%, #059669 100%);
  }
  
  .bg-info-gradient {
    background: linear-gradient(135deg, #06b6d4 0%, #0891b2 100%);
  }
  
  .bg-warning-gradient {
    background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
  }
  
  .feature-title {
    font-size: 1.25rem;
    font-weight: 700;
    color: #1e293b;
    margin-bottom: 0.75rem;
  }
  
  .feature-text {
    color: #64748b;
    font-size: 0.938rem;
    margin-bottom: 0;
    line-height: 1.6;
  }
  
  /* Info Cards */
  .info-card {
    background: white;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    border: 1px solid rgba(0, 0, 0, 0.05);
    height: 100%;
  }
  
  .info-card-header {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    padding: 1.5rem;
    display: flex;
    align-items: center;
  }
  
  .info-card-header h2 {
    font-size: 1.5rem;
    font-weight: 700;
    margin: 0;
  }
  
  .info-card-body {
    padding: 2rem;
  }
  
  .info-list {
    list-style: none;
    padding: 0;
    margin: 0;
  }
  
  .info-list li {
    display: flex;
    align-items: center;
    padding: 0.875rem 0;
    border-bottom: 1px solid #f1f5f9;
  }
  
  .info-list li:last-child {
    border-bottom: none;
  }
  
  .info-list i {
    color: #10b981;
    font-size: 1.25rem;
    margin-right: 1rem;
    flex-shrink: 0;
  }
  
  .info-list span {
    color: #475569;
    font-size: 1rem;
  }
  
  .stats-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 1rem;
    margin-top: 1.5rem;
  }
  
  .stat-item {
    text-align: center;
    padding: 1rem;
    background: #f8fafc;
    border-radius: 12px;
  }
  
  .stat-number {
    font-size: 1.75rem;
    font-weight: 800;
    color: #667eea;
    margin-bottom: 0.25rem;
  }
  
  .stat-label {
    font-size: 0.813rem;
    color: #64748b;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
  }
  
  /* CTA Section */
  .cta-section {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border-radius: 24px;
    padding: 4rem 2rem;
    margin: 3rem 0;
  }
  
  .cta-title {
    color: white;
    font-size: 2.5rem;
    font-weight: 800;
  }
  
  .cta-text {
    color: rgba(255, 255, 255, 0.9);
    font-size: 1.125rem;
    max-width: 600px;
    margin: 0 auto;
  }
  
  .btn-light-custom {
    background: white;
    color: #667eea;
    padding: 0.875rem 2.5rem;
    border-radius: 50px;
    font-weight: 600;
    border: none;
    box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.2);
    transition: all 0.3s ease;
  }
  
  .btn-light-custom:hover {
    transform: translateY(-2px);
    box-shadow: 0 15px 25px -3px rgba(0, 0, 0, 0.3);
    color: #667eea;
  }
  
  /* Responsive Design */
  @media (max-width: 768px) {
    .hero-title {
      font-size: 2.5rem;
    }
    
    .hero-subtitle {
      font-size: 1.125rem;
    }
    
    .hero-buttons .btn {
      display: block;
      width: 100%;
      margin: 0.5rem 0 !important;
    }
    
    .stats-grid {
      grid-template-columns: 1fr;
    }
    
    .cta-title {
      font-size: 2rem;
    }
  }
</style>

<?= $this->endSection() ?>