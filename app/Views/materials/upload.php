<?= $this->extend('design/template') ?>

<?= $this->section('title') ?>Upload Materials - <?= esc($course['course_name']) ?><?= $this->endSection() ?>

<?= $this->section('content') ?>
<style>
.upload-hero-section {
  background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  border-radius: 20px;
  padding: 3rem 2rem;
  margin-bottom: 2rem;
  color: white;
  position: relative;
  overflow: hidden;
  box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
}

.upload-hero-section::before {
  content: '';
  position: absolute;
  top: -50%;
  right: -20%;
  width: 120%;
  height: 120%;
  background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
  animation: heroGlow 8s ease-in-out infinite;
}

@keyframes heroGlow {
  0%, 100% { transform: scale(1) rotate(0deg); opacity: 0.3; }
  50% { transform: scale(1.2) rotate(180deg); opacity: 0.6; }
}

.upload-hero-content {
  position: relative;
  z-index: 2;
}

.upload-hero-title {
  font-size: 2.5rem;
  font-weight: 800;
  margin-bottom: 1rem;
  text-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
}

.upload-hero-subtitle {
  font-size: 1.1rem;
  opacity: 0.9;
  margin-bottom: 2rem;
  font-weight: 500;
}

.upload-action-btn {
  background: rgba(255, 255, 255, 0.15);
  backdrop-filter: blur(10px);
  border: 2px solid rgba(255, 255, 255, 0.3);
  color: white;
  font-size: 1.1rem;
  padding: 1rem 2rem;
  border-radius: 50px;
  cursor: pointer;
  transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
  font-weight: 600;
  position: relative;
  z-index: 2;
  box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
  display: inline-flex;
  align-items: center;
  gap: 0.75rem;
}

.upload-action-btn:hover {
  background: rgba(255, 255, 255, 0.25);
  transform: translateY(-3px);
  box-shadow: 0 12px 40px rgba(0, 0, 0, 0.3);
  border-color: rgba(255, 255, 255, 0.5);
}

.upload-action-btn:active {
  transform: translateY(-1px);
}

.upload-action-btn i {
  font-size: 1.3rem;
  animation: bounceIn 0.6s ease-out;
}

@keyframes bounceIn {
  0% { transform: scale(0.3); opacity: 0; }
  50% { transform: scale(1.05); }
  70% { transform: scale(0.9); }
  100% { transform: scale(1); opacity: 1; }
}

/* Professional Modal Styling */
.upload-modal .modal-content {
  border: none;
  border-radius: 20px;
  box-shadow: 0 25px 80px rgba(0, 0, 0, 0.15);
  overflow: hidden;
  backdrop-filter: blur(20px);
  background: rgba(255, 255, 255, 0.95);
}

.upload-modal .modal-header {
  background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  color: white;
  padding: 2rem;
  border: none;
  position: relative;
  overflow: hidden;
}

.upload-modal .modal-header::before {
  content: '';
  position: absolute;
  top: -50%;
  right: -20%;
  width: 120%;
  height: 120%;
  background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
  animation: modalGlow 6s ease-in-out infinite;
}

@keyframes modalGlow {
  0%, 100% { transform: scale(1) rotate(0deg); opacity: 0.2; }
  50% { transform: scale(1.1) rotate(90deg); opacity: 0.4; }
}

.upload-modal .modal-title {
  font-size: 1.5rem;
  font-weight: 700;
  position: relative;
  z-index: 2;
  display: flex;
  align-items: center;
  gap: 0.75rem;
}

.upload-modal .modal-title i {
  font-size: 1.8rem;
  animation: float 3s ease-in-out infinite;
}

@keyframes float {
  0%, 100% { transform: translateY(0); }
  50% { transform: translateY(-3px); }
}

.upload-modal .btn-close {
  background: none;
  border: none;
  border-radius: 0;
  width: 1rem;
  height: 1rem;
  padding: 0;
  position: relative;
  z-index: 2;
  transition: opacity 0.3s ease;
  opacity: 0.8;
  filter: none;
  background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23fff'%3e%3cpath d='M.293.293a1 1 0 011.414 0L8 6.586 14.293.293a1 1 0 111.414 1.414L9.414 8l6.293 6.293a1 1 0 01-1.414 1.414L8 9.414l-6.293 6.293a1 1 0 01-1.414-1.414L6.586 8 .293 1.707a1 1 0 010-1.414z'/%3e%3c/svg%3e");
}

.upload-modal .btn-close:hover {
  opacity: 1;
}

.upload-modal .modal-body {
  padding: 2.5rem;
  background: linear-gradient(180deg, #fafbfc 0%, #f1f5f9 100%);
}

.upload-modal .form-label {
  font-weight: 600;
  color: #1e293b;
  margin-bottom: 0.75rem;
  font-size: 1rem;
}

.upload-modal .form-control {
  border: 2px solid #e2e8f0;
  border-radius: 12px;
  padding: 1rem 1.25rem;
  font-size: 1rem;
  transition: all 0.3s ease;
  background: rgba(255, 255, 255, 0.8);
  backdrop-filter: blur(10px);
}

.upload-modal .form-control:focus {
  border-color: #667eea;
  box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
  background: white;
  transform: translateY(-1px);
}

.upload-modal .form-text {
  color: #64748b;
  font-size: 0.875rem;
  margin-top: 0.5rem;
  font-weight: 500;
}

.upload-modal .modal-footer {
  padding: 2rem;
  border: none;
  background: white;
  display: flex;
  gap: 1rem;
  justify-content: flex-end;
}

.upload-modal .btn {
  padding: 0.875rem 2rem;
  border-radius: 50px;
  font-weight: 600;
  font-size: 1rem;
  transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
  border: none;
  display: inline-flex;
  align-items: center;
  gap: 0.5rem;
  position: relative;
  overflow: hidden;
}

.upload-modal .btn::before {
  content: '';
  position: absolute;
  top: 50%;
  left: 50%;
  width: 0;
  height: 0;
  background: rgba(255, 255, 255, 0.3);
  border-radius: 50%;
  transform: translate(-50%, -50%);
  transition: width 0.6s ease, height 0.6s ease;
}

.upload-modal .btn:hover::before {
  width: 300px;
  height: 300px;
}

.upload-modal .btn-secondary {
  background: linear-gradient(135deg, #64748b 0%, #475569 100%);
  color: white;
  box-shadow: 0 4px 15px rgba(100, 116, 139, 0.3);
}

.upload-modal .btn-secondary:hover {
  background: linear-gradient(135deg, #475569 0%, #334155 100%);
  transform: translateY(-2px);
  box-shadow: 0 8px 25px rgba(100, 116, 139, 0.4);
}

.upload-modal .btn-success {
  background: linear-gradient(135deg, #10b981 0%, #059669 100%);
  color: white;
  box-shadow: 0 4px 15px rgba(16, 185, 129, 0.3);
}

.upload-modal .btn-success:hover {
  background: linear-gradient(135deg, #059669 0%, #047857 100%);
  transform: translateY(-2px);
  box-shadow: 0 8px 25px rgba(16, 185, 129, 0.4);
}

/* Materials Card Styling */
.materials-card {
  border: none;
  border-radius: 20px;
  box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
  overflow: hidden;
  background: white;
  transition: all 0.3s ease;
}

.materials-card:hover {
  transform: translateY(-2px);
  box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
}

.materials-card-header {
  background: linear-gradient(135deg, #0ea5e9 0%, #0284c7 100%);
  color: white;
  padding: 2rem;
  border: none;
  position: relative;
  overflow: hidden;
}

.materials-card-header::before {
  content: '';
  position: absolute;
  top: -50%;
  right: -20%;
  width: 120%;
  height: 120%;
  background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
  animation: cardGlow 7s ease-in-out infinite;
}

@keyframes cardGlow {
  0%, 100% { transform: scale(1) rotate(0deg); opacity: 0.2; }
  50% { transform: scale(1.1) rotate(120deg); opacity: 0.4; }
}

.materials-card-title {
  font-size: 1.5rem;
  font-weight: 700;
  margin: 0;
  position: relative;
  z-index: 2;
  display: flex;
  align-items: center;
  gap: 0.75rem;
}

.materials-card-title i {
  font-size: 1.8rem;
  animation: float 3s ease-in-out infinite;
}

.materials-card-body {
  padding: 2.5rem;
}

.materials-table {
  border-radius: 12px;
  overflow: hidden;
  box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
}

.materials-table thead th {
  background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
  border: none;
  padding: 1.25rem;
  font-weight: 700;
  color: #1e293b;
  font-size: 0.9rem;
  text-transform: uppercase;
  letter-spacing: 0.5px;
}

.materials-table tbody tr {
  transition: all 0.3s ease;
  border: none;
}

.materials-table tbody tr:hover {
  background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
  transform: scale(1.01);
}

.materials-table tbody td {
  padding: 1.25rem;
  border: none;
  vertical-align: middle;
  color: #374151;
}

.materials-table .file-icon {
  width: 40px;
  height: 40px;
  background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  border-radius: 10px;
  display: flex;
  align-items: center;
  justify-content: center;
  color: white;
  font-size: 1.1rem;
  box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
}

.materials-table .btn-danger {
  background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
  border: none;
  border-radius: 50px;
  width: 40px;
  height: 40px;
  display: flex;
  align-items: center;
  justify-content: center;
  transition: all 0.3s ease;
  box-shadow: 0 4px 12px rgba(239, 68, 68, 0.3);
}

.materials-table .btn-danger:hover {
  background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%);
  transform: scale(1.1);
  box-shadow: 0 6px 20px rgba(239, 68, 68, 0.4);
}

.empty-state {
  padding: 4rem 2rem;
  text-align: center;
  color: #64748b;
}

.empty-state i {
  font-size: 4rem;
  margin-bottom: 1.5rem;
  opacity: 0.4;
  background: linear-gradient(135deg, #cbd5e1 0%, #94a3b8 100%);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
}

.empty-state h5 {
  font-weight: 700;
  color: #475569;
  margin-bottom: 0.5rem;
  font-size: 1.25rem;
}

.empty-state p {
  font-size: 1rem;
  margin: 0;
  opacity: 0.8;
}

/* Alert Styling */
.upload-modal .alert {
  border: none;
  border-radius: 12px;
  padding: 1rem 1.5rem;
  font-weight: 500;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}

.upload-modal .alert-success {
  background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%);
  color: #065f46;
}

.upload-modal .alert-danger {
  background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%);
  color: #991b1b;
}

/* Responsive Design */
@media (max-width: 768px) {
  .upload-hero-section {
    padding: 2rem 1.5rem;
  }

  .upload-hero-title {
    font-size: 2rem;
  }

  .upload-hero-subtitle {
    font-size: 1rem;
  }

  .upload-action-btn {
    padding: 0.875rem 1.5rem;
    font-size: 1rem;
  }

  .upload-modal .modal-header,
  .upload-modal .modal-body,
  .upload-modal .modal-footer {
    padding: 1.5rem;
  }

  .materials-card-header,
  .materials-card-body {
    padding: 1.5rem;
  }

  .materials-table thead th,
  .materials-table tbody td {
    padding: 0.875rem;
  }
}
</style>

<div class="container-fluid py-5">
  <div class="row justify-content-center">
    <div class="col-12 col-xl-10">

      <!-- Hero Section -->
      <div class="upload-hero-section">
        <div class="upload-hero-content text-center">
          <h1 class="upload-hero-title">
            <i class="fas fa-cloud-upload-alt me-3"></i>
            Material Upload Center
          </h1>
          <p class="upload-hero-subtitle">
            Seamlessly upload and manage course materials for <?= esc($course['course_name']) ?>
          </p>
          <button type="button" class="upload-action-btn" data-bs-toggle="modal" data-bs-target="#uploadModal">
            <i class="fas fa-plus"></i>
            Upload New Material
          </button>
        </div>
      </div>

      <!-- Upload Modal -->
      <div class="modal fade upload-modal" id="uploadModal" tabindex="-1" aria-labelledby="uploadModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="uploadModalLabel">
                <i class="fas fa-upload"></i>
                Upload New Material
              </h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
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

              <form id="uploadForm" action="<?= base_url('admin/course/' . $course['course_id'] . '/upload') ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>

                <div class="mb-4">
                  <label for="material_file" class="form-label">
                    <i class="fas fa-file-upload me-2"></i>
                    Select File to Upload
                    <span class="text-danger">*</span>
                  </label>
                  <input type="file" class="form-control" id="material_file" name="material_file" required
                         accept=".pdf,.doc,.docx,.ppt,.pptx,.txt,.jpg,.jpeg,.png">
                  <div class="form-text">
                    <i class="fas fa-info-circle me-1"></i>
                    Allowed file types: PDF, DOC, DOCX, PPT, PPTX, TXT, JPG, JPEG, PNG<br>
                    <i class="fas fa-weight me-1"></i>
                    Maximum file size: 10MB
                  </div>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="submit" form="uploadForm" class="btn btn-success">
                <i class="fas fa-upload"></i>
                Upload Material
              </button>
            </div>
          </div>
        </div>
      </div>

      <!-- Uploaded Materials -->
      <div class="card materials-card">
        <div class="card-header materials-card-header">
          <h5 class="materials-card-title">
            <i class="fas fa-file-alt"></i>
            Uploaded Materials
            <span class="badge bg-white text-primary ms-2 fs-6">
              <?= count($materials) ?>
            </span>
          </h5>
        </div>
        <div class="card-body materials-card-body">
          <?php if (!empty($materials)): ?>
            <div class="table-responsive">
              <table class="table materials-table mb-0">
                <thead>
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
                      <td>
                        <span class="badge bg-primary rounded-pill px-3 py-2">
                          <?= $i++ ?>
                        </span>
                      </td>
                      <td>
                        <div class="d-flex align-items-center">
                          <div class="file-icon me-3">
                            <i class="fas fa-file"></i>
                          </div>
                          <div>
                            <div class="fw-semibold text-dark">
                              <?= esc($material['file_name']) ?>
                            </div>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="text-muted">
                          <i class="fas fa-calendar me-1"></i>
                          <?= esc($material['created_at']) ?>
                        </div>
                      </td>
                      <td>
                        <div class="fw-semibold">
                          <?php
                            $filePath = FCPATH . $material['file_path'];
                            if (file_exists($filePath)) {
                                $size = filesize($filePath);
                                if ($size < 1024) {
                                    echo '<i class="fas fa-weight me-1"></i>' . $size . ' bytes';
                                } elseif ($size < 1048576) {
                                    echo '<i class="fas fa-weight me-1"></i>' . round($size / 1024, 1) . ' KB';
                                } else {
                                    echo '<i class="fas fa-weight me-1"></i>' . round($size / 1048576, 1) . ' MB';
                                }
                            } else {
                                echo '<span class="text-danger"><i class="fas fa-exclamation-triangle me-1"></i>File not found</span>';
                            }
                          ?>
                        </div>
                      </td>
                      <td class="text-center">
                        <a href="<?= base_url('materials/delete/' . $material['id']) ?>"
                           class="btn btn-danger btn-sm"
                           onclick="return confirm('Are you sure you want to delete this material?')"
                           title="Delete Material">
                          <i class="fas fa-trash"></i>
                        </a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          <?php else: ?>
            <div class="empty-state">
              <i class="fas fa-file-alt"></i>
              <h5>No Materials Yet</h5>
              <p>Start by uploading your first course material using the button above.</p>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>
