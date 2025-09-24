<?= $this->extend('design/template') ?>

<?= $this->section('content') ?>
<div class="container py-4">

    <!-- Welcome -->
    <div class="alert alert-primary shadow-sm border-0">
        👋 Welcome back, <strong><?= esc(session('userEmail')) ?></strong>!
    </div>

    <!-- Dashboard Cards -->
    <div class="row g-4">
        <!-- Card 1 -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body text-center">
                    <h5 class="card-title fw-bold">Profile</h5>
                    <p class="text-muted">View and update your personal information.</p>
                    <a href="#" class="btn btn-sm btn-primary">Go to Profile</a>
                </div>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body text-center">
                    <h5 class="card-title fw-bold">Settings</h5>
                    <p class="text-muted">Manage your account settings and preferences.</p>
                    <a href="#" class="btn btn-sm btn-secondary">Go to Settings</a>
                </div>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body text-center">
                    <h5 class="card-title fw-bold">Reports</h5>
                    <p class="text-muted">Access your activity and performance reports.</p>
                    <a href="#" class="btn btn-sm btn-success">View Reports</a>
                </div>
            </div>
        </div>
    </div>

</div>
<?= $this->endSection() ?>
