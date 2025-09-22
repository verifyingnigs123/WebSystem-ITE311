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
