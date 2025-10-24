<?= $this->extend('design/template') ?>

<?= $this->section('title') ?>Dashboard<?= $this->endSection() ?>

<?= $this->section('content') ?>

<style>
  /* Modern Dashboard Styling */
  .dashboard-container {
    background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
    min-height: 100vh;
    padding: 2rem 0;
  }
  
  .welcome-section {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border-radius: 20px;
    padding: 3rem;
    margin-bottom: 2rem;
    box-shadow: 0 20px 60px rgba(102, 126, 234, 0.3);
    position: relative;
    overflow: hidden;
  }
  
  .welcome-section::before {
    content: '';
    position: absolute;
    top: -50%;
    right: -50%;
    width: 200%;
    height: 200%;
    background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
    animation: pulse 15s ease-in-out infinite;
  }
  
  @keyframes pulse {
    0%, 100% { transform: scale(1); opacity: 0.5; }
    50% { transform: scale(1.1); opacity: 0.8; }
  }
  
  .welcome-content {
    position: relative;
    z-index: 1;
  }
  
  .welcome-section h2 {
    color: #fff;
    font-size: 2.5rem;
    font-weight: 700;
    margin-bottom: 0.5rem;
    text-shadow: 0 2px 10px rgba(0,0,0,0.2);
  }
  
  .welcome-section p {
    color: rgba(255,255,255,0.95);
    font-size: 1.1rem;
    margin-bottom: 0.25rem;
  }
  
  .stats-card {
    background: #fff;
    border-radius: 16px;
    padding: 1.5rem;
    height: 100%;
    box-shadow: 0 4px 20px rgba(0,0,0,0.08);
    transition: all 0.3s ease;
    border: 1px solid rgba(102, 126, 234, 0.1);
    position: relative;
    overflow: hidden;
  }
  
  .stats-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, #667eea 0%, #764ba2 100%);
  }
  
  .stats-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 30px rgba(0,0,0,0.15);
  }
  
  .stats-icon {
    width: 60px;
    height: 60px;
    border-radius: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.8rem;
    margin-bottom: 1rem;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: #fff;
    box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
  }
  
  .stats-card h5 {
    color: #64748b;
    font-size: 0.9rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin-bottom: 0.5rem;
  }
  
  .stats-card h2 {
    color: #1e293b;
    font-size: 2.5rem;
    font-weight: 700;
    margin: 0;
  }
  
  .content-card {
    background: #fff;
    border-radius: 16px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.08);
    overflow: hidden;
    margin-bottom: 2rem;
    border: 1px solid rgba(102, 126, 234, 0.1);
  }
  
  .card-header-custom {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: #fff;
    padding: 1.5rem;
    border: none;
  }
  
  .card-header-custom h5 {
    margin: 0;
    font-weight: 600;
    font-size: 1.2rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
  }
  
  .action-buttons {
    display: flex;
    gap: 1rem;
    flex-wrap: wrap;
    margin-bottom: 2rem;
  }
  
  .btn-action {
    background: #fff;
    color: #667eea;
    border: 2px solid #667eea;
    padding: 0.75rem 1.5rem;
    border-radius: 12px;
    font-weight: 600;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(102, 126, 234, 0.2);
  }
  
  .btn-action:hover {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: #fff;
    transform: translateY(-2px);
    box-shadow: 0 6px 25px rgba(102, 126, 234, 0.4);
  }
  
  .btn-action i {
    margin-right: 0.5rem;
  }
  
  .list-item-custom {
    padding: 1.25rem;
    border: none;
    border-bottom: 1px solid #f1f5f9;
    transition: all 0.3s ease;
  }
  
  .list-item-custom:hover {
    background: #f8fafc;
    transform: translateX(5px);
  }
  
  .list-item-custom:last-child {
    border-bottom: none;
  }
  
  .badge-custom {
    padding: 0.5rem 1rem;
    border-radius: 8px;
    font-weight: 600;
    font-size: 0.75rem;
  }
  
  .empty-state {
    text-align: center;
    padding: 3rem;
    color: #94a3b8;
  }
  
  .empty-state i {
    font-size: 4rem;
    margin-bottom: 1rem;
    opacity: 0.5;
  }
  
  .refresh-btn {
    background: rgba(255,255,255,0.2);
    border: 1px solid rgba(255,255,255,0.3);
    color: #fff;
    padding: 0.5rem 1rem;
    border-radius: 8px;
    transition: all 0.3s ease;
  }
  
  .refresh-btn:hover {
    background: rgba(255,255,255,0.3);
    color: #fff;
  }
  
  .enroll-btn-custom {
    background: linear-gradient(135deg, #10b981 0%, #059669 100%);
    color: #fff;
    border: none;
    padding: 0.5rem 1rem;
    border-radius: 8px;
    font-weight: 600;
    transition: all 0.3s ease;
  }
  
  .enroll-btn-custom:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(16, 185, 129, 0.4);
  }
  
  .material-item {
    background: #f8fafc;
    border-radius: 8px;
    padding: 1rem;
    margin-bottom: 0.75rem;
    transition: all 0.3s ease;
  }
  
  .material-item:hover {
    background: #f1f5f9;
    transform: translateX(5px);
  }
  
  .download-btn {
    background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
    color: #fff;
    border: none;
    padding: 0.5rem 1rem;
    border-radius: 8px;
    font-weight: 600;
    transition: all 0.3s ease;
  }
  
  .download-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(59, 130, 246, 0.4);
  }
</style>

<div class="dashboard-container">
  <div class="container py-4">
    <!-- Welcome Message -->
    <div class="welcome-section">
      <div class="welcome-content text-center">
        <h2 class="fw-bold">
          Welcome back, <?= esc($userName ?? 'User') ?>! 👋
        </h2>
        <p class="mb-1">
          <strong><?= esc($userRole ?? 'Guest') ?></strong> Dashboard
        </p>
        <p>
          <?= esc($userEmail ?? 'N/A') ?>
        </p>
      </div>
    </div>

    <!-- Role-based Conditional Content -->
    <?php if (($userRole ?? '') === 'admin'): ?>
      <!-- Admin Dashboard -->
      <div class="content-card">
        <div class="card-body text-center py-5">
          <div class="stats-icon mx-auto mb-4" style="width: 80px; height: 80px; font-size: 2.5rem;">
            <i class="fas fa-user-shield"></i>
          </div>
          <h1 class="display-5 mb-3" style="color: #667eea;">Admin Control Center</h1>
          <p class="lead text-muted mb-4">Manage your platform with ease</p>
          <div class="alert alert-success border-0" role="alert" style="background: rgba(16, 185, 129, 0.1); color: #059669;">
            <i class="fas fa-check-circle me-2"></i>
            All systems operational. Ready to manage users and content.
          </div>
          <div class="action-buttons justify-content-center mt-4">
            <a href="<?= base_url('announcements') ?>" class="btn-action">
              <i class="fas fa-bullhorn"></i> Announcements
            </a>
            <a href="<?= base_url('logout') ?>" class="btn-action" style="border-color: #ef4444; color: #ef4444;">
              <i class="fas fa-sign-out-alt"></i> Logout
            </a>
          </div>
        </div>
      </div>

    <?php elseif (($userRole ?? '') === 'teacher'): ?>
      <!-- Teacher Dashboard -->
      <div class="row">
        <div class="col-12">
          <!-- Action Buttons -->
          <div class="action-buttons mb-4">
            <a href="<?= base_url('teacher/add-course') ?>" class="btn-action">
              <i class="fas fa-plus"></i> Add New Course
            </a>
            <a href="<?= base_url('teacher/manage-courses') ?>" class="btn-action">
              <i class="fas fa-book"></i> Manage Courses
            </a>
            <a href="<?= base_url('teacher/manage-students') ?>" class="btn-action">
              <i class="fas fa-users"></i> Manage Students
            </a>
            <a href="<?= base_url('admin/course/' . ($teacherCourses[0]['course_id'] ?? '1') . '/upload') ?>" class="btn-action">
              <i class="fas fa-upload"></i> Upload Materials
            </a>
          </div>

          <!-- Stats Cards -->
          <div class="row mb-4">
            <div class="col-md-6 mb-3">
              <div class="stats-card">
                <div class="stats-icon">
                  <i class="fas fa-book"></i>
                </div>
                <h5>My Courses</h5>
                <h2><?= count($teacherCourses ?? []) ?></h2>
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <div class="stats-card">
                <div class="stats-icon">
                  <i class="fas fa-users"></i>
                </div>
                <h5>Total Students</h5>
                <h2><?= array_sum(array_column($teacherCourses ?? [], 'students')) ?></h2>
              </div>
            </div>
          </div>

          <!-- Courses List -->
          <div class="content-card">
            <div class="card-header-custom d-flex justify-content-between align-items-center">
              <h5><i class="fas fa-graduation-cap"></i> My Courses</h5>
              <button class="refresh-btn" onclick="refreshCourses()">
                <i class="fas fa-sync-alt"></i> Refresh
              </button>
            </div>
            <div class="card-body p-0">
              <div id="teacher-courses-list">
                <?php if (!empty($teacherCourses ?? [])): ?>
                  <div class="list-group list-group-flush">
                    <?php foreach ($teacherCourses as $course): ?>
                      <div class="list-group-item list-item-custom">
                        <div class="d-flex justify-content-between align-items-start">
                          <div class="flex-grow-1">
                            <h6 class="mb-2 fw-bold" style="color: #1e293b;"><?= esc($course['course_name'] ?? '') ?></h6>
                            <p class="mb-2 text-muted"><strong>Code:</strong> <?= esc($course['course_code'] ?? '') ?></p>
                            <p class="mb-2"><?= esc($course['description'] ?? 'No description') ?></p>
                            <div class="d-flex gap-3 text-muted small">
                              <span><i class="fas fa-book-open me-1"></i> <?= esc($course['units'] ?? 3) ?> Units</span>
                              <span><i class="fas fa-user-graduate me-1"></i> <?= esc($course['students'] ?? 0) ?> Students</span>
                              <span><i class="fas fa-calendar me-1"></i> <?= esc($course['created_at'] ?? 'N/A') ?></span>
                            </div>
                          </div>
                          <span class="badge-custom bg-success"><?= esc($course['status'] ?? 'Active') ?></span>
                        </div>
                      </div>
                    <?php endforeach; ?>
                  </div>
                <?php else: ?>
                  <div class="empty-state">
                    <i class="fas fa-book"></i>
                    <p class="mb-1 fw-bold">No courses created yet</p>
                    <p class="small">Click "Add New Course" to create your first course!</p>
                  </div>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
      </div>

    <?php elseif (($userRole ?? '') === 'student'): ?>
      <!-- Student Dashboard -->
      <div class="row">
        <div class="col-12">
          <!-- Stats Cards -->
          <div class="row mb-4">
            <div class="col-md-4 mb-3">
              <div class="stats-card">
                <div class="stats-icon">
                  <i class="fas fa-graduation-cap"></i>
                </div>
                <h5>Enrolled Courses</h5>
                <h2><?= count($enrolledCourses ?? []) ?></h2>
              </div>
            </div>
            <div class="col-md-4 mb-3">
              <div class="stats-card">
                <div class="stats-icon" style="background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);">
                  <i class="fas fa-clipboard-list"></i>
                </div>
                <h5>Pending Assignments</h5>
                <h2><?= count($upcomingDeadlines ?? []) ?></h2>
              </div>
            </div>
            <div class="col-md-4 mb-3">
              <div class="stats-card">
                <div class="stats-icon" style="background: linear-gradient(135deg, #10b981 0%, #059669 100%);">
                  <i class="fas fa-star"></i>
                </div>
                <h5>Average Grade</h5>
                <h2>
                  <?php 
                  if (!empty($recentGrades ?? [])) {
                    $avg = array_sum(array_column($recentGrades, 'grade')) / count($recentGrades);
                    echo number_format($avg, 1);
                  } else {
                    echo 'N/A';
                  }
                  ?>
                </h2>
              </div>
            </div>
          </div>

          <!-- Quick Actions -->
          <div class="action-buttons mb-4">
            <a href="<?= base_url('announcements') ?>" class="btn-action">
              <i class="fas fa-bullhorn"></i> Announcements
            </a>
            <a href="<?= base_url('student/courses') ?>" class="btn-action">
              <i class="fas fa-graduation-cap"></i> Browse Courses
            </a>
            <a href="<?= base_url('student/grades') ?>" class="btn-action">
              <i class="fas fa-star"></i> View Grades
            </a>
          </div>

          <!-- Courses Section -->
          <div class="row">
            <!-- Enrolled Courses -->
            <div class="col-lg-6 mb-4">
              <div class="content-card">
                <div class="card-header-custom">
                  <h5><i class="fas fa-book-reader"></i> My Enrolled Courses</h5>
                </div>
                <div class="card-body p-0">
                  <div id="enrolled-courses-list">
                    <?php if (!empty($enrolledCourses ?? [])): ?>
                      <div class="list-group list-group-flush">
                        <?php foreach ($enrolledCourses as $course): ?>
                          <div class="list-group-item list-item-custom">
                            <div class="d-flex justify-content-between align-items-center">
                              <div>
                                <h6 class="mb-1 fw-bold" style="color: #1e293b;"><?= esc($course['course_name'] ?? '') ?></h6>
                                <div class="small text-muted">
                                  <div><strong>Code:</strong> <?= esc($course['course_code'] ?? '') ?></div>
                                  <div><strong>Teacher:</strong> <?= esc($course['teacher_name'] ?? 'Unknown') ?></div>
                                  <div><strong>Units:</strong> <?= esc($course['units'] ?? 3) ?></div>
                                  <div><strong>Enrolled:</strong> <?= esc($course['enrollment_date'] ?? '') ?></div>
                                </div>
                              </div>
                              <span class="badge-custom bg-success"><?= esc($course['status'] ?? 'Enrolled') ?></span>
                            </div>
                          </div>
                        <?php endforeach; ?>
                      </div>
                    <?php else: ?>
                      <div class="empty-state">
                        <i class="fas fa-book"></i>
                        <p class="mb-1 fw-bold">No enrolled courses yet</p>
                        <p class="small">Browse available courses to get started!</p>
                      </div>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            </div>

            <!-- Available Courses -->
            <div class="col-lg-6 mb-4">
              <div class="content-card">
                <div class="card-header-custom">
                  <h5><i class="fas fa-plus-circle"></i> Available Courses</h5>
                </div>
                <div class="card-body p-0">
                  <div id="available-courses-list">
                    <?php if (!empty($availableCourses ?? [])): ?>
                      <div class="list-group list-group-flush">
                        <?php foreach ($availableCourses as $course): ?>
                          <div class="list-group-item list-item-custom">
                            <div class="d-flex justify-content-between align-items-start">
                              <div class="flex-grow-1">
                                <h6 class="mb-1 fw-bold" style="color: #1e293b;"><?= esc($course['course_name'] ?? '') ?></h6>
                                <div class="small text-muted mb-2">
                                  <div><strong>Code:</strong> <?= esc($course['course_code'] ?? '') ?></div>
                                  <div><strong>Teacher:</strong> <?= esc($course['teacher_name'] ?? 'Unknown') ?></div>
                                  <div><strong>Units:</strong> <?= esc($course['units'] ?? 3) ?></div>
                                </div>
                                <p class="small mb-0"><?= esc($course['description'] ?? 'No description available') ?></p>
                              </div>
                              <button class="enroll-btn-custom enroll-btn ms-3" 
                                      data-course-id="<?= esc($course['course_id'] ?? '') ?>"
                                      data-course-name="<?= esc($course['course_name'] ?? '') ?>">
                                <i class="fas fa-plus"></i> Enroll
                              </button>
                            </div>
                          </div>
                        <?php endforeach; ?>
                      </div>
                    <?php else: ?>
                      <div class="empty-state">
                        <i class="fas fa-graduation-cap"></i>
                        <p class="mb-1 fw-bold">No available courses</p>
                        <p class="small">Check back later for new courses!</p>
                      </div>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Course Materials -->
          <div class="content-card">
            <div class="card-header-custom">
              <h5><i class="fas fa-file-alt"></i> Course Materials</h5>
            </div>
            <div class="card-body">
              <?php if (!empty($enrolledCourses ?? [])): ?>
                <?php foreach ($enrolledCourses as $course): ?>
                  <div class="mb-4">
                    <h6 class="fw-bold mb-3" style="color: #667eea;">
                      <?= esc($course['course_name']) ?> 
                      <small class="text-muted">(<?= esc($course['course_code']) ?>)</small>
                    </h6>
                    <?php 
                      $materials = model('App\Models\MaterialModel')->getMaterialsByCourse($course['course_id']);
                    ?>
                    <?php if (!empty($materials)): ?>
                      <?php foreach ($materials as $material): ?>
                        <div class="material-item d-flex justify-content-between align-items-center">
                          <div>
                            <div class="d-flex align-items-center mb-1">
                              <i class="fas fa-file me-2" style="color: #667eea;"></i>
                              <span class="fw-bold"><?= esc($material['file_name']) ?></span>
                            </div>
                            <small class="text-muted">
                              <i class="fas fa-calendar-alt me-1"></i>
                              Uploaded: <?= esc(date('M d, Y', strtotime($material['created_at']))) ?>
                            </small>
                          </div>
                          <a href="<?= base_url('materials/download/' . $material['id']) ?>"
                             class="download-btn"
                             title="Download Material"
                             target="_blank">
                            <i class="fas fa-cloud-download-alt me-1"></i>Download
                          </a>
                        </div>
                      <?php endforeach; ?>
                    <?php else: ?>
                      <p class="text-muted small">No materials uploaded for this course yet.</p>
                    <?php endif; ?>
                  </div>
                <?php endforeach; ?>
              <?php else: ?>
                <div class="empty-state py-4">
                  <i class="fas fa-folder-open"></i>
                  <p class="mb-0 fw-bold">No course materials available</p>
                  <p class="small">Enroll in courses to access materials</p>
                </div>
              <?php endif; ?>
            </div>
          </div>

          <!-- Alert Container -->
          <div id="alert-container" class="mt-3"></div>
          <div id="teacher-alert-container" class="mt-3"></div>
        </div>
      </div>

    <?php else: ?>
      <!-- Unknown Role -->
      <div class="content-card">
        <div class="card-body text-center py-5">
          <i class="fas fa-exclamation-triangle" style="font-size: 4rem; color: #f59e0b; margin-bottom: 1rem;"></i>
          <h4 style="color: #1e293b;">Role Not Recognized</h4>
          <p class="text-muted">Please contact the administrator to resolve this issue.</p>
        </div>
      </div>
    <?php endif; ?>
  </div>
</div>

<!-- Add Course Modal (keeping original functionality) -->
<div class="modal fade" id="addCourseModal" tabindex="-1" aria-labelledby="addCourseModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" style="border-radius: 16px; border: none;">
      <div class="modal-header" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: #fff; border-radius: 16px 16px 0 0;">
        <h5 class="modal-title" id="addCourseModalLabel">Add New Course</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="<?= base_url('course/create') ?>" method="post" id="addCourseForm">
        <?= csrf_field() ?>
        <div class="modal-body">
          <div class="mb-3">
            <label for="course_code" class="form-label fw-bold">Course Code *</label>
            <input type="text" class="form-control" id="course_code" name="course_code" required style="border-radius: 8px;">
            <div class="form-text">e.g., CS101, MATH201</div>
          </div>
          <div class="mb-3">
            <label for="course_name" class="form-label fw-bold">Course Name *</label>
            <input type="text" class="form-control" id="course_name" name="course_name" required style="border-radius: 8px;">
          </div>
          <div class="mb-3">
            <label for="description" class="form-label fw-bold">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" style="border-radius: 8px;"></textarea>
          </div>
          <div class="mb-3">
            <label for="units" class="form-label fw-bold">Units</label>
            <input type="number" class="form-control" id="units" name="units" min="1" max="6" value="3" style="border-radius: 8px;">
          </div>
        </div>
        <div class="modal-footer" style="border-top: 1px solid #f1f5f9;">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="border-radius: 8px;">Cancel</button>
          <button type="submit" class="btn btn-primary" id="saveCourseBtn" style="border-radius: 8px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border: none;">Create Course</button>
        </div>
      </form>
    </div>
  </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
$(document).ready(function() {
    // Handle enrollment button clicks
    $(document).on('click', '.enroll-btn', function(e) {
        e.preventDefault();
        
        var button = $(this);
        var courseId = button.data('course-id');
        var courseName = button.data('course-name');
        
        console.log('Enrollment button clicked:', {
            courseId: courseId,
            courseName: courseName,
            button: button
        });
        
        button.prop('disabled', true).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Enrolling...');
        
        console.log('Sending AJAX request to:', '<?= base_url('course/enroll') ?>');
        console.log('POST data:', { course_id: courseId });
        
        $.ajax({
            url: '<?= base_url('course/enroll') ?>',
            type: 'POST',
            data: {
                course_id: courseId,
                '<?= csrf_token() ?>': '<?= csrf_hash() ?>'
            },
            dataType: 'json',
            timeout: 10000
        })
        .done(function(response) {
            console.log('AJAX response received:', response);
            if (response && response.success) {
                showAlert('success', response.message);
                button.closest('.list-group-item').fadeOut(300, function() { $(this).remove(); });
                addToEnrolledCourses(courseId, courseName);
                updateEnrolledCount();
            } else {
                showAlert('danger', (response && response.message) ? response.message : 'Failed to enroll in course.');
                button.prop('disabled', false).html('<i class="fas fa-plus"></i> Enroll');
            }
        })
        .fail(function(xhr, status, error) {
            console.error('Enrollment failed:', xhr.responseText, status, error);
            let errorMessage = 'An error occurred. Please try again.';
            if (status === 'timeout') errorMessage = 'Request timed out. Please try again.';
            else if (xhr.status === 0) errorMessage = 'Network error. Please check your connection.';
            else {
                try {
                    const errorResponse = JSON.parse(xhr.responseText);
                    if (errorResponse && errorResponse.message) errorMessage = errorResponse.message;
                } catch (e) {}
            }
            showAlert('danger', errorMessage);
            button.prop('disabled', false).html('<i class="fas fa-plus"></i> Enroll');
        });
    });
    
    function showAlert(type, message) {
        var alertHtml = '<div class="alert alert-' + type + ' alert-dismissible fade show" role="alert" style="border-radius: 12px; border: none;">' +
            '<i class="fas fa-' + (type === 'success' ? 'check-circle' : 'exclamation-triangle') + ' me-2"></i>' +
            message +
            '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>' +
            '</div>';
        $('#alert-container').html(alertHtml);
        setTimeout(function() { $('.alert').fadeOut(); }, 5000);
    }
    
    function addToEnrolledCourses(courseId, courseName) {
        var enrolledList = $('#enrolled-courses-list .list-group');
        if (enrolledList.find('.list-group-item').length === 0) {
            enrolledList.html('');
            $('#enrolled-courses-list .empty-state').remove();
        }
        var courseHtml = '<div class="list-group-item list-item-custom">' +
            '<div class="d-flex justify-content-between align-items-center">' +
            '<div>' +
            '<h6 class="mb-1 fw-bold" style="color: #1e293b;">' + courseName + '</h6>' +
            '<div class="small text-muted">' +
            '<div><strong>Enrolled:</strong> ' + new Date().toLocaleDateString() + '</div>' +
            '</div>' +
            '</div>' +
            '<span class="badge-custom bg-success">Enrolled</span>' +
            '</div>' +
            '</div>';
        enrolledList.prepend(courseHtml);
    }
    
    function updateEnrolledCount() {
        var count = $('#enrolled-courses-list .list-group-item').length;
        $('.stats-card:first h2').text(count);
    }
});
</script>
<script>
$(document).ready(function() {
    // Handle course creation form submission
    $('#addCourseForm').on('submit', function(e) {
        e.preventDefault();
        
        var formData = {
            course_code: $('#course_code').val(),
            course_name: $('#course_name').val(),
            description: $('#description').val(),
            units: $('#units').val()
        };
        
        var submitBtn = $('#saveCourseBtn');
        var originalText = submitBtn.html();
        submitBtn.prop('disabled', true).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Creating...');
        
        $.ajax({
            url: '<?= base_url('course/create') ?>',
            type: 'POST',
            data: formData,
            dataType: 'json',
            timeout: 10000,
            beforeSend: function(xhr) {
                var csrfToken = $('input[name="<?= csrf_token() ?>"]').val();
                if (csrfToken) xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken);
            }
        })
        .done(function(response) {
            console.log('Course creation response:', response);
            if (response && response.success) {
                $('#addCourseModal').modal('hide');
                $('#addCourseForm')[0].reset();

                var successModal = `
                    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content" style="border-radius: 16px; border: none; overflow: hidden;">
                                <div class="modal-header" style="background: linear-gradient(135deg, #10b981 0%, #059669 100%); color: #fff; border: none;">
                                    <h5 class="modal-title" id="successModalLabel">
                                        <i class="fas fa-check-circle me-2"></i>Success!
                                    </h5>
                                </div>
                                <div class="modal-body text-center py-4">
                                    <i class="fas fa-check-circle fa-3x mb-3" style="color: #10b981;"></i>
                                    <p class="mb-0">${response.message}</p>
                                </div>
                                <div class="modal-footer" style="border-top: 1px solid #f1f5f9;">
                                    <button type="button" class="btn" id="successOkBtn" style="background: linear-gradient(135deg, #10b981 0%, #059669 100%); color: #fff; border-radius: 8px; border: none;">OK</button>
                                </div>
                            </div>
                        </div>
                    </div>
                `;

                $('body').append(successModal);
                $('#successModal').modal({
                    backdrop: 'static',
                    keyboard: false
                });
                $('#successModal').modal('show');

                $('#successOkBtn').on('click', function() {
                    $('#successModal').modal('hide');
                });

                $('#successModal').on('hidden.bs.modal', function() {
                    $(this).remove();
                    refreshCourses();
                    updateCourseCount();
                });

                setTimeout(function() {
                    if ($('#successModal').hasClass('show')) {
                        $('#successModal').modal('hide');
                    }
                }, 3000);

            } else {
                console.log('Course creation failed:', response);
                showTeacherAlert('danger', (response && response.message) ? response.message : 'Failed to create course. Please try again.');
            }
        })
        .fail(function(xhr, status, error) {
            let errorMessage = 'An error occurred. Please try again.';
            if (status === 'timeout') errorMessage = 'Request timed out. Please check your connection and try again.';
            else if (xhr.status === 0) errorMessage = 'Network error. Please check your connection.';
            else if (xhr.status >= 500) errorMessage = 'Server error. Please try again later.';
            else if (xhr.status === 404) errorMessage = 'Course creation endpoint not found. Please contact support.';
            else {
                try { const errorResponse = JSON.parse(xhr.responseText); if (errorResponse && errorResponse.message) errorMessage = errorResponse.message; } catch (e) {}
            }
            showTeacherAlert('danger', errorMessage);
        })
        .always(function() {
            submitBtn.prop('disabled', false).html(originalText);
        });
    });
    
    function showTeacherAlert(type, message) {
        var alertHtml = '<div class="alert alert-' + type + ' alert-dismissible fade show" role="alert" style="border-radius: 12px; border: none;">' +
            '<i class="fas fa-' + (type === 'success' ? 'check-circle' : 'exclamation-triangle') + ' me-2"></i>' +
            message +
            '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>' +
            '</div>';
        $('#teacher-alert-container').html(alertHtml);
        var hideDelay = type === 'success' ? 5000 : 8000;
        setTimeout(function() { $('#teacher-alert-container .alert').fadeOut(); }, hideDelay);
    }
    
    function refreshCourses() {
        $.ajax({ url: '<?= base_url('course/getTeacherCourses') ?>', type: 'GET', dataType: 'json', timeout: 5000 })
        .done(function(response) {
            if (response && response.success) {
                updateCoursesList(response.courses || []);
                updateCourseCount();
            } else {
                showTeacherAlert('warning', 'Failed to load courses data.');
            }
        })
        .fail(function(xhr, status, error) {
            showTeacherAlert('danger', 'Failed to refresh courses. Please try again.');
        });
    }
    
    function updateCoursesList(courses) {
        var coursesList = $('#teacher-courses-list');
        if (courses.length === 0) {
            coursesList.html('<div class="empty-state">' +
                '<i class="fas fa-book"></i>' +
                '<p class="mb-1 fw-bold">No courses created yet</p>' +
                '<p class="small">Click "Add New Course" to create your first course!</p>' +
                '</div>');
        } else {
            var coursesHtml = '<div class="list-group list-group-flush">';
            courses.forEach(function(course) {
                coursesHtml += '<div class="list-group-item list-item-custom">' +
                    '<div class="d-flex justify-content-between align-items-start">' +
                    '<div class="flex-grow-1">' +
                    '<h6 class="mb-2 fw-bold" style="color: #1e293b;">' + course.course_name + '</h6>' +
                    '<p class="mb-2 text-muted"><strong>Code:</strong> ' + course.course_code + '</p>' +
                    '<p class="mb-2">' + (course.description || 'No description') + '</p>' +
                    '<div class="d-flex gap-3 text-muted small">' +
                    '<span><i class="fas fa-book-open me-1"></i> ' + (course.units || 3) + ' Units</span>' +
                    '<span><i class="fas fa-user-graduate me-1"></i> ' + (course.students || 0) + ' Students</span>' +
                    '<span><i class="fas fa-calendar me-1"></i> ' + (course.created_at || 'N/A') + '</span>' +
                    '</div>' +
                    '</div>' +
                    '<span class="badge-custom bg-success">' + (course.status || 'Active') + '</span>' +
                    '</div>' +
                    '</div>';
            });
            coursesHtml += '</div>';
            coursesList.html(coursesHtml);
        }
    }
    
    function updateCourseCount() {
        var courseCount = $('#teacher-courses-list .list-group-item').length;
        $('.stats-card:first h2').text(courseCount);
    }
});

// Refresh function for onclick
function refreshCourses() {
    $.ajax({ 
        url: '<?= base_url('course/getTeacherCourses') ?>', 
        type: 'GET', 
        dataType: 'json', 
        timeout: 5000 
    })
    .done(function(response) {
        if (response && response.success) {
            updateCoursesList(response.courses || []);
            updateCourseCount();
        }
    });
    
    function updateCoursesList(courses) {
        var coursesList = $('#teacher-courses-list');
        if (courses.length === 0) {
            coursesList.html('<div class="empty-state">' +
                '<i class="fas fa-book"></i>' +
                '<p class="mb-1 fw-bold">No courses created yet</p>' +
                '<p class="small">Click "Add New Course" to create your first course!</p>' +
                '</div>');
        } else {
            var coursesHtml = '<div class="list-group list-group-flush">';
            courses.forEach(function(course) {
                coursesHtml += '<div class="list-group-item list-item-custom">' +
                    '<div class="d-flex justify-content-between align-items-start">' +
                    '<div class="flex-grow-1">' +
                    '<h6 class="mb-2 fw-bold" style="color: #1e293b;">' + course.course_name + '</h6>' +
                    '<p class="mb-2 text-muted"><strong>Code:</strong> ' + course.course_code + '</p>' +
                    '<p class="mb-2">' + (course.description || 'No description') + '</p>' +
                    '<div class="d-flex gap-3 text-muted small">' +
                    '<span><i class="fas fa-book-open me-1"></i> ' + (course.units || 3) + ' Units</span>' +
                    '<span><i class="fas fa-user-graduate me-1"></i> ' + (course.students || 0) + ' Students</span>' +
                    '<span><i class="fas fa-calendar me-1"></i> ' + (course.created_at || 'N/A') + '</span>' +
                    '</div>' +
                    '</div>' +
                    '<span class="badge-custom bg-success">' + (course.status || 'Active') + '</span>' +
                    '</div>' +
                    '</div>';
            });
            coursesHtml += '</div>';
            coursesList.html(coursesHtml);
        }
    }
    
    function updateCourseCount() {
        var courseCount = $('#teacher-courses-list .list-group-item').length;
        $('.stats-card:first h2').text(courseCount);
    }
}
</script>
<?= $this->endSection() ?>