<?= $this->extend('design/template') ?>

<?= $this->section('title') ?>Dashboard<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container py-4">

    <!-- Welcome Message -->
    <div class="mb-4">
        <h2 class="fw-bold text-dark">Welcome, <?= esc($userName) ?>!</h2>
        <p class="text-muted">You are logged in as <strong><?= esc($role) ?></strong>.</p>
    </div>

    <!-- Role-based Conditional Content -->
    <?php if ($role === 'admin'): ?>
        <div class="card shadow-sm mb-3">
            <div class="card-body">
                <h4 class="card-title">Admin Dashboard</h4>
                <p class="card-text">Here you can manage users, view reports, and configure system settings.</p>
                <a href="<?= base_url('/manage-users') ?>" class="btn btn-primary">Manage Users</a>
            </div>
        </div>

        <!-- Example: Show list of users -->
        <div class="card shadow-sm">
            <div class="card-body">
                <h5 class="card-title">Registered Users</h5>
                <?php if (!empty($users)): ?>
                    <ul>
                        <?php foreach ($users as $u): ?>
                            <li><?= esc($u['name']) ?> (<?= esc($u['email']) ?>)</li>
                        <?php endforeach; ?>
                    </ul>
                <?php else: ?>
                    <p class="text-muted">No users found.</p>
                <?php endif; ?>
            </div>
        </div>

    <?php elseif ($role === 'teacher'): ?>
        <div class="card shadow-sm mb-3">
            <div class="card-body">
                <h4 class="card-title">Teacher Dashboard</h4>
                <p class="card-text">Here you can manage your classes, upload materials, and track student progress.</p>
                <a href="<?= base_url('/teacher/classes') ?>" class="btn btn-success">My Classes</a>
            </div>
        </div>

    <?php elseif ($role === 'student'): ?>
        <div class="card shadow-sm mb-3">
            <div class="card-body">
                <h4 class="card-title">Student Dashboard</h4>
                <p class="card-text">Here you can view your courses, check your grades, and submit assignments.</p>
                <a href="<?= base_url('/student/courses') ?>" class="btn btn-info">My Courses</a>
            </div>
        </div>

    <?php else: ?>
        <div class="alert alert-warning">
            Role not recognized. Please contact the administrator.
        </div>
    <?php endif; ?>

</div>
<?= $this->endSection() ?>
