<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $this->renderSection('title') ?> - MyCI</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex flex-column min-vh-100 bg-light">
  
 <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="<?= base_url('/') ?>">MySite</a>
      <div class="ms-auto"> <!-- pushes buttons to the right -->
        <a class="btn btn-outline-light me-2" href="<?= base_url('/') ?>">Home</a>
        <a class="btn btn-outline-light me-2" href="<?= base_url('/about') ?>">About</a>
        <a class="btn btn-outline-light me-2" href="<?= base_url('/contact') ?>">Contact</a>
        <a class="btn btn-success" href="<?= base_url('/login') ?>">Login</a> <!-- 👈 Login button -->
      </div>
    </div>
  </nav>

  <!-- Centered Page Content -->
  <div class="container text-center my-auto py-5">
    <?= $this->renderSection('content') ?>
  </div>

  <!-- Footer -->
  <footer class="bg-dark text-white text-center py-2 mt-auto">
    <small>&copy; <?= date('Y') ?> MyCI Project</small>
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
