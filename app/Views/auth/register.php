<?= $this->extend('design/template') ?>

<?= $this->section('content') ?>
<div class="row justify-content-center my-5">
  <div class="col-md-7 col-lg-6">
    <div class="card shadow-lg border-0">
      <div class="card-header bg-primary text-white text-center">
        <h3 class="mb-0">Create Account</h3>
      </div>
      <div class="card-body p-4">

        <?php if (session()->getFlashdata('register_error')): ?>
          <div class="alert alert-danger"><?= esc(session()->getFlashdata('register_error')) ?></div>
        <?php endif; ?>

        <form action="<?= base_url('register') ?>" method="post">
          <div class="mb-3">
            <label for="name" class="form-label">Full Name</label>
            <input type="text" class="form-control" id="name" name="name" 
                   required value="<?= esc(old('name')) ?>">
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" 
                   required value="<?= esc(old('email')) ?>">
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
          </div>
          <div class="mb-3">
            <label for="password_confirm" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" id="password_confirm" name="password_confirm" required>
          </div>
          <button type="submit" class="btn btn-primary w-100">Create Account</button>
        </form>
      </div>
    </div>
    <p class="text-center mt-3 small">
      Already have an account? 
      <a href="<?= base_url('login') ?>" class="text-primary fw-bold">Login</a>
    </p>
  </div>
</div>
<?= $this->endSection() ?>
