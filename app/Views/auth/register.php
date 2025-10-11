<?= $this->extend('design/template') ?>

<?= $this->section('title') ?>Register<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card shadow-sm">
        <div class="card-body">
          <h3 class="text-center text-primary mb-4">Create an Account</h3>

          <?php if (session()->getFlashdata('register_error')): ?>
            <div class="alert alert-danger"><?= session()->getFlashdata('register_error') ?></div>
          <?php endif; ?>
          <?php if (session()->getFlashdata('register_success')): ?>
            <div class="alert alert-success"><?= session()->getFlashdata('register_success') ?></div>
          <?php endif; ?>

          <form method="post" action="<?= base_url('/register') ?>">
            <?= csrf_field() ?>
            <div class="mb-3">
              <label class="form-label">Full Name</label>
              <input type="text" name="name" value="<?= old('name') ?>" class="form-control" required>
            </div>

            <div class="mb-3">
              <label class="form-label">Email</label>
              <input type="email" name="email" value="<?= old('email') ?>" class="form-control" required>
            </div>

            <div class="mb-3">
              <label class="form-label">Password</label>
              <input type="password" name="password" class="form-control" required>
            </div>

            <div class="mb-3">
              <label class="form-label">Confirm Password</label>
              <input type="password" name="password_confirm" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">Register</button>
          </form>

          <p class="text-center mt-3">
            Already have an account? <a href="<?= base_url('/login') ?>">Login</a>
          </p>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>
