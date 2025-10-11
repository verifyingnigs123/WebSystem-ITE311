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
</head>
<body class="d-flex flex-column min-vh-100 bg-light">

  <?php if (!session()->get('isLoggedIn')): ?>
    <!-- NAVBAR for guests -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
      <div class="container">
        <a class="navbar-brand fw-bold" href="<?= base_url('/') ?>">MySite</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item"><a class="nav-link text-white" href="<?= base_url('/') ?>">Home</a></li>
            <li class="nav-item"><a class="nav-link text-white" href="<?= base_url('/about') ?>">About</a></li>
            <li class="nav-item"><a class="nav-link text-white" href="<?= base_url('/contact') ?>">Contact</a></li>
            <li class="nav-item">
              <a class="btn btn-light btn-sm" href="<?= base_url('/login') ?>">Login</a>
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
    <!-- Footer (visible only on non-auth pages) -->
    <footer class="bg-primary text-white text-center py-3 mt-auto">
      <div class="container">
        <small>&copy; <?= date('Y') ?> MyCI Project. All rights reserved.</small>
      </div>
    </footer>
  <?php endif; ?>

  <!-- jQuery (load before Bootstrap) -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
