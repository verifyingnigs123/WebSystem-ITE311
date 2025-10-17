<?= $this->extend('design/template') ?>

<?= $this->section('title') ?>
Announcements
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 mb-0">
                <i class="fas fa-bullhorn text-primary me-2"></i>
                Announcements
            </h1>
            <?php if (session()->get('isLoggedIn')): ?>
                <div class="text-muted">
                    Welcome, <?= session()->get('userRole') ?>!
                </div>
            <?php endif; ?>
        </div>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-triangle me-2"></i>
                <?= session()->getFlashdata('error') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <?php if (empty($announcements)): ?>
            <div class="card border-0 shadow-sm">
                <div class="card-body text-center py-5">
                    <i class="fas fa-bullhorn fa-3x text-muted mb-3"></i>
                    <h5 class="text-muted">No announcements yet</h5>
                    <p class="text-muted">Check back later for important updates and news.</p>
                </div>
            </div>
        <?php else: ?>
            <div class="row">
                <?php foreach ($announcements as $announcement): ?>
                    <div class="col-12 mb-4">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-header bg-primary text-white">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="card-title mb-0">
                                        <i class="fas fa-bullhorn me-2"></i>
                                        <?= esc($announcement['title']) ?>
                                    </h5>
                                    <small class="opacity-75">
                                        <i class="fas fa-calendar-alt me-1"></i>
                                        <?= date('M d, Y', strtotime($announcement['created_at'])) ?>
                                    </small>
                                </div>
                            </div>
                            <div class="card-body">
                                <p class="card-text">
                                    <?= nl2br(esc($announcement['content'])) ?>
                                </p>
                            </div>
                            <div class="card-footer bg-light">
                                <small class="text-muted">
                                    <i class="fas fa-clock me-1"></i>
                                    Posted on <?= date('F j, Y \a\t g:i A', strtotime($announcement['created_at'])) ?>
                                </small>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</div>
<?= $this->endSection() ?>
