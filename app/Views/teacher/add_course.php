<?= $this->extend('design/template') ?>

<?= $this->section('title') ?>Add New Course<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">
                        <i class="fas fa-plus-circle me-2"></i>Add New Course
                    </h4>
                </div>
                <div class="card-body">
                    <!-- Flash Messages -->
                    <?php if (session()->getFlashdata('success')): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fas fa-check-circle me-2"></i>
                            <?= session()->getFlashdata('success') ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>

                    <?php if (session()->getFlashdata('error')): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fas fa-exclamation-triangle me-2"></i>
                            <?= session()->getFlashdata('error') ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>

                    <form method="POST" action="<?= base_url('course/create') ?>">
                        <?= csrf_field() ?>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="course_code" class="form-label">Course Code <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="course_code" name="course_code" required>
                                    <div class="form-text">e.g., CS101, MATH201, ENG101</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="units" class="form-label">Units</label>
                                    <input type="number" class="form-control" id="units" name="units" min="1" max="6" value="3">
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="course_name" class="form-label">Course Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="course_name" name="course_name" required>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="4" placeholder="Enter course description..."></textarea>
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="<?= base_url('dashboard') ?>" class="btn btn-secondary me-md-2">
                                <i class="fas fa-arrow-left me-1"></i>Back to Dashboard
                            </a>
                            <button type="submit" class="btn btn-primary" id="saveCourseBtn">
                                <i class="fas fa-save me-1"></i>Create Course
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection() ?>
