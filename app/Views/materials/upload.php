<?= $this->extend('design/template') ?>

<?= $this->section('title') ?>Upload Materials - <?= esc($course['course_name']) ?><?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-md-10">

      <!-- Upload Form -->
      <div class="card mb-4 shadow-sm">
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

      <!-- Uploaded Materials -->
      <div class="card shadow-sm">
        <div class="card-header bg-info text-white">
          <h5 class="mb-0">
            <i class="fas fa-file-alt me-2"></i>Uploaded Materials (<?= count($materials) ?>)
          </h5>
        </div>
        <div class="card-body">
          <?php if (!empty($materials)): ?>
            <div class="table-responsive">
              <table class="table table-striped table-hover align-middle">
                <thead class="table-primary">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">File Name</th>
                    <th scope="col">Uploaded Date</th>
                    <th scope="col">File Size</th>
                    <th scope="col" class="text-center">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; foreach ($materials as $material): ?>
                    <tr>
                      <td><?= $i++ ?></td>
                      <td>
                        <i class="fas fa-file me-2"></i>
                        <?= esc($material['file_name']) ?>
                      </td>
                      <td><?= esc($material['created_at']) ?></td>
                      <td>
                        <?php
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
                      </td>
                      <td class="text-center">
                        <a href="<?= base_url('materials/delete/' . $material['id']) ?>"
                           class="btn btn-danger btn-sm"
                           onclick="return confirm('Are you sure you want to delete this material?')"
                           title="Delete">
                          <i class="fas fa-trash"></i>
                        </a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
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
