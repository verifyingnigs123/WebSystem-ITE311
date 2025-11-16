<?= $this->extend('design/template') ?>

<?= $this->section('title') ?>Dashboard<?= $this->endSection() ?>

<?= $this->section('content') ?>

<style>
  /* Modern Professional Dashboard Styling - Optimized for Sidebar */
  :root {
    --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    --success-gradient: linear-gradient(135deg, #10b981 0%, #059669 100%);
    --warning-gradient: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
    --info-gradient: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
    --danger-gradient: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
    --card-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    --card-shadow-hover: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
  }

  /* Dashboard Container - Adjusted for Sidebar */
  .dashboard-content {
    background: linear-gradient(135deg, #f5f7fa 0%, #e2e8f5 100%);
    min-height: calc(100vh - 80px);
    padding: 2rem;
  }

  /* Welcome Card */
  .welcome-card {
    background: var(--primary-gradient);
    border-radius: 20px;
    padding: 2rem;
    margin-bottom: 2rem;
    box-shadow: 0 10px 40px rgba(102, 126, 234, 0.3);
    position: relative;
    overflow: hidden;
  }

  .welcome-card::before {
    content: '';
    position: absolute;
    top: -50%;
    right: -20%;
    width: 120%;
    height: 120%;
    background: radial-gradient(circle, rgba(255,255,255,0.15) 0%, transparent 70%);
    animation: pulseWave 15s ease-in-out infinite;
  }

  @keyframes pulseWave {
    0%, 100% { transform: scale(1) rotate(0deg); opacity: 0.5; }
    50% { transform: scale(1.1) rotate(90deg); opacity: 0.8; }
  }

  .welcome-content {
    position: relative;
    z-index: 2;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 1.5rem;
  }

  .welcome-text h2 {
    color: #fff;
    font-size: 1.75rem;
    font-weight: 800;
    margin-bottom: 0.5rem;
    text-shadow: 0 2px 8px rgba(0,0,0,0.1);
  }

  .welcome-text p {
    color: rgba(255,255,255,0.95);
    font-size: 0.95rem;
    margin: 0;
  }

  .welcome-avatar {
    width: 70px;
    height: 70px;
    background: rgba(255,255,255,0.25);
    backdrop-filter: blur(10px);
    border-radius: 18px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.75rem;
    color: #fff;
    font-weight: 700;
    border: 3px solid rgba(255,255,255,0.4);
    box-shadow: 0 8px 24px rgba(0,0,0,0.15);
    flex-shrink: 0;
  }

  /* Stats Grid */
  .stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 1.5rem;
    margin-bottom: 2rem;
  }

  .stat-card {
    background: #fff;
    border-radius: 18px;
    padding: 1.5rem;
    box-shadow: var(--card-shadow);
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
    overflow: hidden;
    border: 1px solid rgba(0,0,0,0.05);
  }

  .stat-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 3px;
    background: var(--primary-gradient);
    transform: scaleX(0);
    transform-origin: left;
    transition: transform 0.4s ease;
  }

  .stat-card:hover {
    transform: translateY(-6px);
    box-shadow: var(--card-shadow-hover);
  }

  .stat-card:hover::before {
    transform: scaleX(1);
  }

  .stat-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 1rem;
  }

  .stat-icon-wrapper {
    width: 50px;
    height: 50px;
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.4rem;
    background: var(--primary-gradient);
    color: #fff;
    box-shadow: 0 6px 14px rgba(102, 126, 234, 0.35);
  }

  .stat-icon-wrapper.success {
    background: var(--success-gradient);
    box-shadow: 0 6px 14px rgba(16, 185, 129, 0.35);
  }

  .stat-icon-wrapper.warning {
    background: var(--warning-gradient);
    box-shadow: 0 6px 14px rgba(245, 158, 11, 0.35);
  }

  .stat-icon-wrapper.info {
    background: var(--info-gradient);
    box-shadow: 0 6px 14px rgba(59, 130, 246, 0.35);
  }

  .stat-body h3 {
    color: #1e293b;
    font-size: 1.875rem;
    font-weight: 700;
    margin: 0 0 0.25rem 0;
    line-height: 1;
  }

  .stat-body p {
    color: #64748b;
    font-size: 0.8rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin: 0;
  }

  /* Content Cards */
  .content-card-modern {
    background: #fff;
    border-radius: 18px;
    box-shadow: var(--card-shadow);
    overflow: hidden;
    margin-bottom: 2rem;
    border: 1px solid rgba(0,0,0,0.05);
    transition: all 0.3s ease;
  }

  .content-card-modern:hover {
    box-shadow: var(--card-shadow-hover);
  }

  .card-header-modern {
    background: var(--primary-gradient);
    padding: 1.25rem 1.75rem;
    display: flex;
    justify-content: space-between;
    align-items: center;
    border: none;
  }

  .card-header-modern h5 {
    color: #fff;
    font-weight: 700;
    font-size: 1.15rem;
    margin: 0;
    display: flex;
    align-items: center;
    gap: 0.75rem;
  }

  .card-header-modern .btn-modern {
    background: rgba(255,255,255,0.2);
    border: 1px solid rgba(255,255,255,0.3);
    color: #fff;
    padding: 0.5rem 1rem;
    border-radius: 10px;
    font-weight: 600;
    font-size: 0.85rem;
    transition: all 0.3s ease;
    cursor: pointer;
  }

  .card-header-modern .btn-modern:hover {
    background: rgba(255,255,255,0.35);
    transform: scale(1.05);
  }

  /* Modern Table Styling */
  .table-modern {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0;
  }

  .table-modern thead {
    background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
  }

  .table-modern thead th {
    padding: 1rem 1.25rem;
    font-weight: 700;
    font-size: 0.8rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    color: #475569;
    border-bottom: 2px solid #e2e8f0;
    white-space: nowrap;
  }

  .table-modern tbody tr {
    transition: all 0.2s ease;
    border-bottom: 1px solid #f1f5f9;
  }

  .table-modern tbody tr:hover {
    background: #f8fafc;
  }

  .table-modern tbody td {
    padding: 1.1rem 1.25rem;
    color: #334155;
    vertical-align: middle;
    font-size: 0.9rem;
  }

  /* Action Buttons */
  .btn-action-modern {
    padding: 0.5rem 1rem;
    border-radius: 10px;
    font-weight: 600;
    font-size: 0.85rem;
    border: none;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    cursor: pointer;
    white-space: nowrap;
  }

  .btn-action-modern.primary {
    background: var(--primary-gradient);
    color: #fff;
    box-shadow: 0 4px 10px rgba(102, 126, 234, 0.3);
  }

  .btn-action-modern.primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 16px rgba(102, 126, 234, 0.4);
  }

  .btn-action-modern.success {
    background: var(--success-gradient);
    color: #fff;
    box-shadow: 0 4px 10px rgba(16, 185, 129, 0.3);
  }

  .btn-action-modern.success:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 16px rgba(16, 185, 129, 0.4);
  }

  .btn-action-modern.outline {
    background: transparent;
    color: #667eea;
    border: 2px solid #667eea;
  }

  .btn-action-modern.outline:hover {
    background: var(--primary-gradient);
    color: #fff;
    border-color: transparent;
  }

  /* Badge Styling */
  .badge-modern {
    padding: 0.4rem 0.85rem;
    border-radius: 50px;
    font-weight: 700;
    font-size: 0.7rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
  }

  .badge-modern.success {
    background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%);
    color: #065f46;
  }

  .badge-modern.primary {
    background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%);
    color: #1e40af;
  }

  /* Empty State */
  .empty-state-modern {
    text-align: center;
    padding: 3.5rem 2rem;
    color: #94a3b8;
  }

  .empty-state-modern i {
    font-size: 3.5rem;
    margin-bottom: 1.25rem;
    opacity: 0.3;
    display: block;
  }

  .empty-state-modern h6 {
    font-weight: 700;
    color: #64748b;
    margin-bottom: 0.5rem;
    font-size: 1rem;
  }

  .empty-state-modern p {
    font-size: 0.875rem;
    margin: 0;
  }

  /* Admin Center */
  .admin-center {
    text-align: center;
    padding: 3.5rem 2rem;
  }

  .admin-icon-lg {
    width: 110px;
    height: 110px;
    margin: 0 auto 1.75rem;
    background: var(--primary-gradient);
    border-radius: 28px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 3.25rem;
    color: #fff;
    box-shadow: 0 16px 36px rgba(102, 126, 234, 0.4);
    animation: float 3s ease-in-out infinite;
  }

  @keyframes float {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-10px); }
  }

  .admin-center h1 {
    font-size: 2.25rem;
    font-weight: 800;
    background: var(--primary-gradient);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    margin-bottom: 0.875rem;
  }

  .admin-center .lead {
    color: #64748b;
    font-size: 1.05rem;
    margin-bottom: 1.75rem;
  }

  .alert-modern {
    background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%);
    border: none;
    border-radius: 14px;
    padding: 1.1rem 1.4rem;
    color: #065f46;
    font-weight: 600;
    display: inline-flex;
    align-items: center;
    gap: 0.65rem;
    margin-bottom: 1.75rem;
  }

  /* Responsive Grid Layout */
  .dashboard-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(450px, 1fr));
    gap: 1.75rem;
  }

  /* Material Row Styles */
  .materials-row-modern {
    background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
  }

  .materials-container {
    padding: 1.75rem;
  }

  .materials-container h6 {
    font-size: 1.05rem;
    margin-bottom: 1.25rem;
  }

  .material-item-modern {
    background: #fff;
    border-radius: 12px;
    padding: 1.15rem;
    margin-bottom: 0.875rem;
    box-shadow: 0 2px 6px rgba(0,0,0,0.06);
    transition: all 0.3s ease;
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 1rem;
  }

  .material-item-modern:hover {
    transform: translateX(6px);
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
  }

  .material-info {
    display: flex;
    align-items: center;
    gap: 1rem;
    flex: 1;
    min-width: 0;
  }

  .material-icon {
    width: 44px;
    height: 44px;
    background: var(--info-gradient);
    border-radius: 11px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #fff;
    font-size: 1.15rem;
    flex-shrink: 0;
  }

  .material-info > div {
    flex: 1;
    min-width: 0;
  }

  .material-info p {
    margin: 0;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
  }

  /* Responsive Design */
  @media (max-width: 992px) {
    .dashboard-content {
      padding: 1.5rem;
    }

    .welcome-content {
      flex-direction: column;
      text-align: center;
    }

    .welcome-text h2 {
      font-size: 1.5rem;
    }

    .stats-grid {
      grid-template-columns: 1fr;
    }

    .dashboard-grid {
      grid-template-columns: 1fr;
    }
  }

  @media (max-width: 768px) {
    .dashboard-content {
      padding: 1rem;
    }

    .welcome-card {
      padding: 1.5rem;
    }

    .table-modern {
      font-size: 0.85rem;
    }

    .table-modern thead th,
    .table-modern tbody td {
      padding: 0.75rem 0.875rem;
    }

    .btn-action-modern {
      font-size: 0.8rem;
      padding: 0.4rem 0.85rem;
    }
  }
</style>

<div class="dashboard-content">
  <!-- Welcome Card -->
  <div class="welcome-card">
    <div class="welcome-content">
      <div class="welcome-text">
        <h2>Welcome back, <?= esc($userName ?? 'User') ?>! 👋</h2>
        <p><strong><?= ucfirst($userRole ?? 'Guest') ?></strong> • <?= esc($userEmail ?? 'N/A') ?></p>
      </div>
      <div class="welcome-avatar">
        <?= strtoupper(substr($userName ?? 'U', 0, 1)) ?>
      </div>
    </div>
  </div>

  <!-- Role-based Content -->
  <?php if (($userRole ?? '') === 'admin'): ?>
    <!-- Admin Dashboard -->
    <div class="content-card-modern">
      <div class="admin-center">
        <div class="admin-icon-lg">
          <i class="fas fa-user-shield"></i>
        </div>
        <h1>Admin Control Center</h1>
        <p class="lead">Manage your platform with powerful administrative tools</p>
        <div class="alert-modern">
          <i class="fas fa-check-circle"></i>
          All systems operational. Ready to manage users and content.
        </div>
        <div class="d-flex gap-3 justify-content-center flex-wrap">
          <a href="<?= base_url('announcements') ?>" class="btn-action-modern primary">
            <i class="fas fa-bullhorn"></i> Manage Announcements
          </a>
          <a href="<?= base_url('manage-users') ?>" class="btn-action-modern outline">
            <i class="fas fa-users-cog"></i> Manage Users
          </a>
        </div>
      </div>
    </div>

  <?php elseif (($userRole ?? '') === 'teacher'): ?>
    <!-- Teacher Dashboard -->
    
    <!-- Stats Cards -->
    <div class="stats-grid">
      <div class="stat-card">
        <div class="stat-header">
          <div class="stat-icon-wrapper">
            <i class="fas fa-book"></i>
          </div>
        </div>
        <div class="stat-body">
          <h3><?= count($teacherCourses ?? []) ?></h3>
          <p>My Courses</p>
        </div>
      </div>

      <div class="stat-card">
        <div class="stat-header">
          <div class="stat-icon-wrapper success">
            <i class="fas fa-users"></i>
          </div>
        </div>
        <div class="stat-body">
          <h3><?= array_sum(array_column($teacherCourses ?? [], 'students')) ?></h3>
          <p>Total Students</p>
        </div>
      </div>

      <div class="stat-card">
        <div class="stat-header">
          <div class="stat-icon-wrapper info">
            <i class="fas fa-file-alt"></i>
          </div>
        </div>
        <div class="stat-body">
          <h3><?= $totalMaterials ?? 0 ?></h3>
          <p>Materials Uploaded</p>
        </div>
      </div>
    </div>

    <!-- Teacher Alert Container -->
    <div id="teacher-alert-container"></div>

    <!-- My Courses Table -->
    <div class="content-card-modern">
      <div class="card-header-modern">
        <h5>
          <i class="fas fa-graduation-cap"></i>
          My Courses
        </h5>
        <button class="btn-modern" onclick="refreshCourses()">
          <i class="fas fa-sync-alt"></i> Refresh
        </button>
      </div>
      <div class="table-responsive">
        <?php if (!empty($teacherCourses ?? [])): ?>
          <table class="table-modern">
            <thead>
              <tr>
                <th>Code</th>
                <th>Course Name</th>
                <th>Description</th>
                <th>Units</th>
                <th>Students</th>
                <th>Created</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($teacherCourses as $course): ?>
                <tr>
                  <td><strong><?= esc($course['course_code'] ?? '') ?></strong></td>
                  <td><?= esc($course['course_name'] ?? '') ?></td>
                  <td><?= esc(substr($course['description'] ?? 'No description', 0, 50)) ?>...</td>
                  <td><?= esc($course['units'] ?? 3) ?></td>
                  <td><?= esc($course['students'] ?? 0) ?></td>
                  <td><?= esc(date('M d, Y', strtotime($course['created_at'] ?? 'now'))) ?></td>
                  <td><span class="badge-modern success"><?= esc($course['status'] ?? 'Active') ?></span></td>
                  <td>
                    <a href="<?= base_url('admin/course/' . ($course['course_id'] ?? '') . '/upload') ?>"
                       class="btn-action-modern primary">
                      <i class="fas fa-eye"></i> View
                    </a>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        <?php else: ?>
          <div class="empty-state-modern">
            <i class="fas fa-book"></i>
            <h6>No Courses Yet</h6>
            <p>Start by creating your first course!</p>
          </div>
        <?php endif; ?>
      </div>
    </div>

  <?php elseif (($userRole ?? '') === 'student'): ?>
    <!-- Student Dashboard -->
    
    <!-- Stats Cards -->
    <div class="stats-grid">
      <div class="stat-card">
        <div class="stat-header">
          <div class="stat-icon-wrapper">
            <i class="fas fa-graduation-cap"></i>
          </div>
        </div>
        <div class="stat-body">
          <h3><?= count($enrolledCourses ?? []) ?></h3>
          <p>Enrolled Courses</p>
        </div>
      </div>

      <div class="stat-card">
        <div class="stat-header">
          <div class="stat-icon-wrapper warning">
            <i class="fas fa-clipboard-list"></i>
          </div>
        </div>
        <div class="stat-body">
          <h3><?= count($upcomingDeadlines ?? []) ?></h3>
          <p>Pending Tasks</p>
        </div>
      </div>

      <div class="stat-card">
        <div class="stat-header">
          <div class="stat-icon-wrapper success">
            <i class="fas fa-star"></i>
          </div>
        </div>
        <div class="stat-body">
          <h3>
            <?php 
            if (!empty($recentGrades ?? [])) {
              $avg = array_sum(array_column($recentGrades, 'grade')) / count($recentGrades);
              echo number_format($avg, 1);
            } else {
              echo 'N/A';
            }
            ?>
          </h3>
          <p>Average Grade</p>
        </div>
      </div>
    </div>

    <!-- Alert Container -->
    <div id="alert-container"></div>

    <!-- Courses Grid -->
    <div class="dashboard-grid">
      <!-- Enrolled Courses -->
      <div class="content-card-modern">
        <div class="card-header-modern">
          <h5>
            <i class="fas fa-book-reader"></i>
            My Enrolled Courses
          </h5>
        </div>
        <div class="table-responsive">
          <?php if (!empty($enrolledCourses ?? [])): ?>
            <table class="table-modern" id="enrolledCoursesTable">
              <thead>
                <tr>
                  <th>Code</th>
                  <th>Course Name</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($enrolledCourses as $course): ?>
                  <tr>
                    <td><strong><?= esc($course['course_code'] ?? '') ?></strong></td>
                    <td><?= esc($course['course_name'] ?? '') ?></td>
                    <td><span class="badge-modern success">Enrolled</span></td>
                    <td>
                      <button class="btn-action-modern primary view-materials-btn"
                              data-course-id="<?= esc($course['course_id'] ?? '') ?>"
                              data-course-name="<?= esc($course['course_name'] ?? '') ?>">
                        <i class="fas fa-eye"></i> View
                      </button>
                    </td>
                  </tr>
                  <!-- Materials Row -->
                  <tr class="materials-row materials-row-modern" id="materials-<?= esc($course['course_id']) ?>" style="display: none;">
                    <td colspan="4">
                      <div class="materials-container text-center text-muted">
                        <i class="fas fa-spinner fa-spin"></i> Loading materials...
                      </div>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          <?php else: ?>
            <div class="empty-state-modern">
              <i class="fas fa-book-reader"></i>
              <h6>No Enrolled Courses</h6>
              <p>Browse available courses to get started!</p>
            </div>
          <?php endif; ?>
        </div>
      </div>

      <!-- Available Courses -->
      <div class="content-card-modern">
        <div class="card-header-modern">
          <h5>
            <i class="fas fa-plus-circle"></i>
            Available Courses
          </h5>
        </div>
        <div class="table-responsive">
          <?php if (!empty($availableCourses ?? [])): ?>
            <table class="table-modern">
              <thead>
                <tr>
                  <th>Code</th>
                  <th>Course Name</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($availableCourses as $course): ?>
                  <tr>
                    <td><strong><?= esc($course['course_code'] ?? '') ?></strong></td>
                    <td><?= esc($course['course_name'] ?? '') ?></td>
                    <td>
                      <button class="btn-action-modern success enroll-btn"
                              data-course-id="<?= esc($course['course_id'] ?? '') ?>"
                              data-course-name="<?= esc($course['course_name'] ?? '') ?>">
                        <i class="fas fa-plus"></i> Enroll
                      </button>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          <?php else: ?>
            <div class="empty-state-modern">
              <i class="fas fa-check-circle"></i>
              <h6>All Courses Enrolled</h6>
              <p>You're enrolled in all available courses!</p>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>

  <?php else: ?>
    <!-- Unknown Role -->
    <div class="content-card-modern">
      <div class="empty-state-modern">
        <i class="fas fa-exclamation-triangle"></i>
        <h6>Role Not Recognized</h6>
        <p>Please contact the administrator to resolve this issue.</p>
      </div>
    </div>
  <?php endif; ?>
</div>

<script>
document.querySelectorAll('.view-materials-btn').forEach(button => {
  button.addEventListener('click', function() {
    const courseId = this.dataset.courseId;
    const courseName = this.dataset.courseName;
    const materialsRow = document.getElementById('materials-' + courseId);
    const materialsCell = materialsRow.querySelector('td');

    if (materialsRow.style.display === 'table-row') {
      materialsRow.style.display = 'none';
      return;
    }

    document.querySelectorAll('.materials-row').forEach(row => row.style.display = 'none');
    materialsRow.style.display = 'table-row';
    materialsCell.innerHTML = `
      <div class="materials-container text-center text-muted">
        <i class="fas fa-spinner fa-spin"></i> Loading materials for <strong>${courseName}</strong>...
      </div>
    `;

    fetch(`<?= base_url('admin/course/') ?>${courseId}/upload`, {
      headers: { 'X-Requested-With': 'XMLHttpRequest' }
    })
      .then(res => res.json())
      .then(data => {
        if (Array.isArray(data) && data.length > 0) {
          let html = `
            <div class="materials-container">
              <h6 class="fw-bold mb-3" style="color:#667eea;">${courseName} Materials</h6>
              <div class="materials-list">
          `;
          data.forEach(material => {
            html += `
              <div class="material-item-modern">
                <div class="material-info">
                  <div class="material-icon">
                    <i class="fas fa-file"></i>
                  </div>
                  <div>
                    <p class="mb-1 fw-bold" style="color:#1e293b;">${material.file_name}</p>
                    <p class="mb-0 text-muted small">${material.created_at}</p>
                  </div>
                </div>
                <a href="<?= base_url('materials/download/') ?>${material.id}" class="btn-action-modern primary">
                  <i class="fas fa-download"></i> Download
                </a>
              </div>
            `;
          });
          html += `</div></div>`;
          materialsCell.innerHTML = html;
        } else {
          materialsCell.innerHTML = `
            <div class="materials-container">
              <div class="empty-state-modern">
                <i class="fas fa-folder-open"></i>
                <h6>No Materials Yet</h6>
                <p>No materials have been uploaded for this course.</p>
              </div>
            </div>
          `;
        }
      })
      .catch(error => {
        console.error('Error loading materials:', error);
        materialsCell.innerHTML = `
          <div class="materials-container text-center text-danger">
            <i class="fas fa-exclamation-triangle fa-2x mb-2"></i>
            <p class="fw-bold mb-0">Failed to load materials.</p>
          </div>
        `;
      });
  });
});
</script>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    // Handle enrollment button clicks
    $(document).on('click', '.enroll-btn', function(e) {
        e.preventDefault();
        
        var button = $(this);
        var courseId = button.data('course-id');
        var courseName = button.data('course-name');
        
        button.prop('disabled', true).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Enrolling...');
        
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
            if (response && response.success) {
                showAlert('success', response.message);
                setTimeout(function() {
                    location.reload();
                }, 1500);
            } else {
                showAlert('danger', (response && response.message) ? response.message : 'Failed to enroll in course.');
                button.prop('disabled', false).html('<i class="fas fa-plus"></i> Enroll');
            }
        })
        .fail(function(xhr, status, error) {
            let errorMessage = 'An error occurred. Please try again.';
            if (status === 'timeout') errorMessage = 'Request timed out. Please try again.';
            else if (xhr.status === 0) errorMessage = 'Network error. Please check your connection.';
            showAlert('danger', errorMessage);
            button.prop('disabled', false).html('<i class="fas fa-plus"></i> Enroll');
        });
    });
    
    function showAlert(type, message) {
        var alertHtml = `
          <div class="alert alert-${type} alert-dismissible fade show" role="alert" style="border-radius: 16px; border: none; box-shadow: 0 4px 12px rgba(0,0,0,0.1); margin-bottom: 1.5rem;">
            <i class="fas fa-${type === 'success' ? 'check-circle' : 'exclamation-triangle'} me-2"></i>
            ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        `;
        $('#alert-container').html(alertHtml);
        setTimeout(function() { $('.alert').fadeOut(); }, 5000);
    }
});

// Teacher dashboard functions
function refreshCourses() {
    $.ajax({ 
        url: '<?= base_url('course/getTeacherCourses') ?>', 
        type: 'GET', 
        dataType: 'json', 
        timeout: 5000 
    })
    .done(function(response) {
        if (response && response.success) {
            showTeacherAlert('success', 'Courses refreshed successfully!');
            setTimeout(function() {
                location.reload();
            }, 1000);
        }
    })
    .fail(function() {
        showTeacherAlert('danger', 'Failed to refresh courses. Please try again.');
    });
}

function showTeacherAlert(type, message) {
    var alertHtml = `
      <div class="alert alert-${type} alert-dismissible fade show" role="alert" style="border-radius: 16px; border: none; box-shadow: 0 4px 12px rgba(0,0,0,0.1); margin-bottom: 1.5rem;">
        <i class="fas fa-${type === 'success' ? 'check-circle' : 'exclamation-triangle'} me-2"></i>
        ${message}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    `;
    $('#teacher-alert-container').html(alertHtml);
    setTimeout(function() { $('#teacher-alert-container .alert').fadeOut(); }, 5000);
}
</script>
<?= $this->endSection() ?>