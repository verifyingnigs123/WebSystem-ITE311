<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $this->renderSection('title') ?> - MyCI</title>
  
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  
  <style>
    :root {
      --primary-color: #2563eb;
      --primary-dark: #1e40af;
      --primary-light: #3b82f6;
      --secondary-color: #64748b;
      --accent-color: #0ea5e9;
      --bg-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      --shadow-sm: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
      --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
      --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
    }
    
    body {
      font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
      background: #f8fafc;
      color: #1e293b;
    }
    
    /* Navbar Styling */
    .navbar-custom {
      background: var(--bg-gradient);
      backdrop-filter: blur(10px);
      box-shadow: var(--shadow-md);
      padding: 1rem 0;
      transition: all 0.3s ease;
    }
    
    .navbar-custom .navbar-brand {
      font-size: 1.5rem;
      font-weight: 700;
      letter-spacing: -0.5px;
      color: #fff !important;
      transition: transform 0.3s ease;
    }
    
    .navbar-custom .navbar-brand:hover {
      transform: scale(1.05);
    }
    
    .navbar-custom .nav-link {
      color: rgba(255, 255, 255, 0.9) !important;
      font-weight: 500;
      margin: 0 0.5rem;
      padding: 0.5rem 1rem !important;
      border-radius: 8px;
      transition: all 0.3s ease;
    }
    
    .navbar-custom .nav-link:hover {
      background: rgba(255, 255, 255, 0.15);
      color: #fff !important;
      transform: translateY(-2px);
    }
    
    .btn-login {
      background: #fff;
      color: var(--primary-color);
      font-weight: 600;
      padding: 0.5rem 1.5rem;
      border-radius: 50px;
      border: none;
      box-shadow: var(--shadow-sm);
      transition: all 0.3s ease;
    }
    
    .btn-login:hover {
      transform: translateY(-2px);
      box-shadow: var(--shadow-lg);
      color: var(--primary-dark);
    }
    
    /* Main Content */
    main {
      animation: fadeIn 0.5s ease-in;
    }
    
    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
    
    /* Footer Styling */
    .footer-custom {
      background: linear-gradient(135deg, #1e293b 0%, #334155 100%);
      color: #e2e8f0;
      padding: 2rem 0;
      box-shadow: 0 -4px 6px -1px rgba(0, 0, 0, 0.1);
      position: relative;
      overflow: hidden;
    }
    
    .footer-custom::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      height: 3px;
      background: var(--bg-gradient);
    }
    
    .footer-custom small {
      font-size: 0.875rem;
      opacity: 0.9;
    }
    
    .footer-links {
      display: flex;
      gap: 1.5rem;
      justify-content: center;
      margin-top: 0.75rem;
    }
    
    .footer-links a {
      color: #94a3b8;
      text-decoration: none;
      transition: color 0.3s ease;
      font-size: 0.875rem;
    }
    
    .footer-links a:hover {
      color: #fff;
    }
    
    /* Responsive adjustments */
    @media (max-width: 991px) {
      .navbar-custom .nav-link {
        margin: 0.25rem 0;
      }
      
      .btn-login {
        margin-top: 0.5rem;
      }
    }
    
    /* Custom scrollbar */
    ::-webkit-scrollbar {
      width: 10px;
    }
    
    ::-webkit-scrollbar-track {
      background: #f1f5f9;
    }
    
    ::-webkit-scrollbar-thumb {
      background: var(--primary-color);
      border-radius: 5px;
    }
    
    ::-webkit-scrollbar-thumb:hover {
      background: var(--primary-dark);
    }
  </style>
</head>
<body class="d-flex flex-column min-vh-100">

  <?php if (!session()->get('isLoggedIn')): ?>
    <!-- NAVBAR for guests -->
    <nav class="navbar navbar-expand-lg navbar-custom">
      <div class="container">
        <a class="navbar-brand" href="<?= base_url('/') ?>">
          <i class="fas fa-rocket me-2"></i>MySite
        </a>
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto align-items-center">
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('/') ?>">
                <i class="fas fa-home me-1"></i> Home
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('/about') ?>">
                <i class="fas fa-info-circle me-1"></i> About
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('/contact') ?>">
                <i class="fas fa-envelope me-1"></i> Contact
              </a>
            </li>
            <li class="nav-item ms-lg-3">
              <a class="btn btn-login" href="<?= base_url('/login') ?>">
                <i class="fas fa-sign-in-alt me-1"></i> Login
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  <?php else: ?>
    <!-- Role-based header -->
    <?= $this->include('template/header') ?>
  <?php endif; ?>


  <!-- Page Content -->
  <main class="container my-5 flex-grow-1">
    <?= $this->renderSection('content') ?>
  </main>


  <?php
    // Hide footer on login, register, and dashboard pages
    $uri = uri_string();
    $hideFooter = (
      strpos($uri, 'login') !== false ||
      strpos($uri, 'register') !== false ||
      strpos($uri, 'dashboard') !== false
    );
  ?>

  <?php if (!$hideFooter): ?>
    <!-- Footer -->
    <footer class="footer-custom text-center mt-auto">
      <div class="container">
        <div class="mb-2">
          <i class="fas fa-rocket fa-2x mb-2" style="color: #94a3b8;"></i>
        </div>
        <small>&copy; <?= date('Y') ?> MyCI Project. All rights reserved.</small>
        <div class="footer-links">
          <a href="<?= base_url('/privacy') ?>">Privacy Policy</a>
          <a href="<?= base_url('/terms') ?>">Terms of Service</a>
          <a href="<?= base_url('/contact') ?>">Contact Us</a>
        </div>
      </div>
    </footer>
  <?php endif; ?>

  <!-- jQuery (load before Bootstrap) -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <?= $this->renderSection('scripts') ?>
</body>
</html>