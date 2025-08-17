<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>About</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex flex-column min-vh-100 bg-light">

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="<?= base_url('/') ?>">MySite</a>
      <div>
        <a class="btn btn-outline-light me-2" href="<?= base_url('/') ?>">Home</a>
        <a class="btn btn-outline-light me-2 active" href="<?= base_url('/about') ?>">About</a>
        <a class="btn btn-outline-light" href="<?= base_url('/contact') ?>">Contact</a>
      </div>
    </div>
  </nav>

  <!-- Centered Content -->
  <div class="container text-center my-auto py-5">
    <h1 class="display-3 fw-bold text-success">About Us</h1>
    <p class="lead">This is the About page of MySite. Here you can learn more about what we do 🚀</p>
    <p class="text-muted">Our mission is to build modern web apps with simplicity and elegance.</p>
  </div>

  <!-- Footer -->
  <footer class="bg-dark text-white text-center py-2 mt-auto">
    <small>&copy; 2025 MySite</small>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
