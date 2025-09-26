<?= $this->extend('design/template') ?>

<?= $this->section('title') ?>Dashboard<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container py-5">

  <!-- Welcome Message -->
  <div class="text-center mb-5">
    <h2 class="fw-bold text-primary">Welcome, <?= esc($userName) ?>!</h2>
    <p class="text-muted">You are logged in as <strong><?= esc($role) ?></strong>.</p>
  </div>

  <!-- Role-based Conditional Content -->
  <div class="row justify-content-center">
    <?php if ($role === 'admin'): ?>
      <!-- Admin Card -->
      <div class="col-md-6">
        <div class="card shadow-lg border-0 mb-4">
          <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Admin Dashboard</h4>
          </div>
          <div class="card-body">
            <p class="card-text">Here you can manage users, view reports, and configure system settings.</p>
            <a href="<?= base_url('/manage-users') ?>" class="btn btn-primary">Manage Users</a>
          </div>
        </div>

        <!-- Example: Show list of users -->
        <div class="card shadow-sm border-0">
          <div class="card-header bg-light">
            <h5 class="mb-0">Registered Users</h5>
          </div>
          <div class="card-body">
            <?php if (!empty($users)): ?>
              <ul class="list-group">
                <?php foreach ($users as $u): ?>
                  <li class="list-group-item">
                    <strong><?= esc($u['name']) ?></strong> <br>
                    <small class="text-muted"><?= esc($u['email']) ?></small>
                  </li>
                <?php endforeach; ?>
              </ul>
            <?php else: ?>
              <p class="text-muted">No users found.</p>
            <?php endif; ?>
          </div>
        </div>
      </div>

    <?php elseif ($role === 'teacher'): ?>
      <!-- Teacher Card -->
      <div class="col-md-6">
        <div class="card shadow-lg border-0">
          <div class="card-header bg-success text-white">
            <h4 class="mb-0">Teacher Dashboard</h4>
          </div>
          <div class="card-body">
            <p class="card-text">Here you can manage your classes, upload materials, and track student progress.</p>
            <a href="<?= base_url('/teacher/classes') ?>" class="btn btn-success">My Classes</a>
          </div>
        </div>
      </div>

    <?php elseif ($role === 'student'): ?>
      <!-- Student Card -->
      <div class="col-md-6">
        <div class="card shadow-lg border-0">
          <div class="card-header bg-info text-white">
            <h4 class="mb-0">Student Dashboard</h4>
          </div>
          <div class="card-body">
            <p class="card-text">Here you can view your courses, check your grades, and submit assignments.</p>
            <a href="<?= base_url('/student/courses') ?>" class="btn btn-info">My Courses</a>
          </div>
        </div>
      </div>

    <?php else: ?>
      <!-- Unknown Role -->
      <div class="col-md-6">
        <div class="alert alert-warning text-center shadow-sm">
          Role not recognized. Please contact the administrator.
        </div>
      </div>
    <?php endif; ?>
  </div>
</div>
<?= $this->endSection() ?>
