<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Contact</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex flex-column min-vh-100 bg-light">

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="<?= base_url('/') ?>">MySite</a>
      <div>
        <a class="btn btn-outline-light me-2" href="<?= base_url('/') ?>">Home</a>
        <a class="btn btn-outline-light me-2" href="<?= base_url('/about') ?>">About</a>
        <a class="btn btn-outline-light active" href="<?= base_url('/contact') ?>">Contact</a>
      </div>
    </div>
  </nav>

  <!-- Contact Section -->
  <div class="container my-5">
    <div class="text-center mb-4">
      <h1 class="display-4 fw-bold text-primary">Contact Us</h1>
      <p class="lead">We’d love to hear from you! Send us a message below.</p>
    </div>

    

  <!-- Footer -->
 
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
