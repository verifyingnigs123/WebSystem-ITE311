<?= $this->extend('design/template') ?>

<?= $this->section('title') ?>
Admin Dashboard
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-12">
        <div class="card border-0 shadow-sm">
            <div class="card-body text-center py-5">
                <i class="fas fa-user-shield fa-4x text-success mb-4"></i>
                <h1 class="display-4 text-success mb-3">Welcome, Admin!</h1>
                <p class="lead text-muted mb-4">You have successfully logged in to the Admin Dashboard.</p>
                <div class="alert alert-success" role="alert">
                    <i class="fas fa-check-circle me-2"></i>
                    This is a placeholder dashboard. More admin-specific features will be added here.
                </div>
                <div class="mt-4">
                    <a href="<?= base_url('announcements') ?>" class="btn btn-primary me-2">
                        <i class="fas fa-bullhorn me-1"></i> View Announcements
                    </a>
                    <a href="<?= base_url('logout') ?>" class="btn btn-outline-secondary">
                        <i class="fas fa-sign-out-alt me-1"></i> Logout
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
