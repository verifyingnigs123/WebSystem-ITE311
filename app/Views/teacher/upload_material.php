<?= $this->extend('design/template') ?>

<?= $this->section('title') ?>Upload Materials - <?= esc($course['course_name']) ?><?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <!-- Course Info -->
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">
                        <i class="fas fa-book me-2"></i>Course: <?= esc($course['course_name']) ?> (<?= esc($course['course_code']) ?>)
                    </h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Description:</strong> <?= esc($course['description'] ?? 'No description') ?></p>
                            <p><strong>Units:</strong> <?= esc($course['units']) ?></p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Created:</strong> <?= esc($course['created_at']) ?></p>
                            <p><strong>Materials:</strong> <?= count($materials) ?> files</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Upload Form -->
            <div class="card mb-4">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0">
                        <i class="fas fa-upload me-2"></i>Upload New Material
                    </h5>
                </div>
                <div class="card-body">
                    <!-- Alert Messages -->
                    <?php if (session()->getFlashdata('success')): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fas fa-check-circle me-2"></i>
                            <?= session()->getFlashdata('success') ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    <?php endif; ?>

                    <?php if (session()->getFlashdata('error')): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fas fa-exclamation-triangle me-2"></i>
                            <?= session()->getFlashdata('error') ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    <?php endif; ?>

                    <form action="<?= base_url('admin/course/' . $course['course_id'] . '/upload') ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field() ?>

                        <div class="mb-3">
                            <label for="material_file" class="form-label">
                                <strong>Select File to Upload</strong>
                                <span class="text-danger">*</span>
                            </label>
                            <input type="file" class="form-control" id="material_file" name="material_file" required
                                   accept=".pdf,.doc,.docx,.ppt,.pptx,.txt,.jpg,.jpeg,.png">
                            <div class="form-text">
                                Allowed file types: PDF, DOC, DOCX, PPT, PPTX, TXT, JPG, JPEG, PNG<br>
                                Maximum file size: 10MB
                            </div>
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="<?= base_url('dashboard') ?>" class="btn btn-secondary me-md-2">
                                <i class="fas fa-arrow-left me-1"></i>Back to Dashboard
                            </a>
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-upload me-1"></i>Upload Material
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Existing Materials -->
            <div class="card">
                <div class="card-header bg-info text-white">
                    <h5 class="mb-0">
                        <i class="fas fa-file-alt me-2"></i>Uploaded Materials (<?= count($materials) ?>)
                    </h5>
                </div>
                <div class="card-body">
                    <?php if (!empty($materials)): ?>
                        <div class="list-group list-group-flush">
                            <?php foreach ($materials as $material): ?>
                                <div class="list-group-item">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="flex-grow-1">
                                            <h6 class="mb-1">
                                                <i class="fas fa-file me-2"></i>
                                                <?= esc($material['file_name']) ?>
                                            </h6>
                                            <small class="text-muted">
                                                Uploaded: <?= esc($material['created_at']) ?> |
                                                Size: <?php
                                                    $filePath = FCPATH . $material['file_path'];
                                                    if (file_exists($filePath)) {
                                                        $size = filesize($filePath);
                                                        if ($size < 1024) {
                                                            echo $size . ' bytes';
                                                        } elseif ($size < 1048576) {
                                                            echo round($size / 1024, 1) . ' KB';
                                                        } else {
                                                            echo round($size / 1048576, 1) . ' MB';
                                                        }
                                                    } else {
                                                        echo 'File not found';
                                                    }
                                                ?>
                                            </small>
                                        </div>
                                        <div class="ms-3">
                                            <a href="<?= base_url('materials/download/' . $material['id']) ?>"
                                               class="btn btn-primary btn-sm me-2"
                                               title="Download">
                                                <i class="fas fa-download"></i>
                                            </a>
                                            <a href="<?= base_url('materials/delete/' . $material['id']) ?>"
                                               class="btn btn-danger btn-sm"
                                               onclick="return confirm('Are you sure you want to delete this material?')"
                                               title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php else: ?>
                        <div class="text-center py-4">
                            <i class="fas fa-file-alt fa-3x text-muted mb-3"></i>
                            <p class="text-muted">No materials uploaded yet.</p>
                            <p class="text-muted">Use the form above to upload your first material!</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
