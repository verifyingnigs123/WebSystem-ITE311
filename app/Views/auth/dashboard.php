<?= $this->extend('design/template') ?>

<?= $this->section('title') ?>Dashboard<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container py-5">

  <!-- Welcome Message -->
  <div class="text-center mb-5">
    <h2 class="fw-bold text-primary">Welcome, <?= esc($userName) ?>!</h2>
    <p class="text-muted">You are logged in as <strong><?= esc($userRole) ?></strong>.</p>
    <p class="text-muted">Email: <?= esc($userEmail) ?></p>
  </div>

  <!-- Role-based Conditional Content -->
  <div class="row">
    <?php if ($userRole === 'admin'): ?>
      <!-- Admin Dashboard -->
      <div class="col-12">
        <div class="row mb-4">
          <div class="col-md-6">
            <div class="card bg-primary text-white">
              <div class="card-body">
                <h5 class="card-title">Total Users</h5>
                <h2 class="card-text"><?= $totalUsers ?? 0 ?></h2>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card bg-success text-white">
              <div class="card-body">
                <h5 class="card-title">Total Courses</h5>
                <h2 class="card-text"><?= $courseCount ?? 0 ?></h2>
              </div>
            </div>
          </div>
        </div>

        <!-- Recent Activities -->
        <div class="card shadow">
          <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Recent Activities</h5>
          </div>
          <div class="card-body">
            <?php if (!empty($recentActivities)): ?>
              <div class="list-group list-group-flush">
                <?php foreach ($recentActivities as $activity): ?>
                  <div class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                      <strong><?= esc($activity['name']) ?></strong> (<?= esc($activity['role']) ?>) 
                      <?= esc($activity['action']) ?> <?= esc($activity['target']) ?>
                    </div>
                    <small class="text-muted"><?= esc($activity['created_at']) ?></small>
                  </div>
                <?php endforeach; ?>
              </div>
            <?php else: ?>
              <p class="text-muted">No recent activities.</p>
            <?php endif; ?>
          </div>
        </div>
      </div>

    <?php elseif ($userRole === 'teacher'): ?>
      <!-- Teacher Dashboard -->
      <div class="col-12">
        <div class="row mb-4">
          <div class="col-md-6">
            <div class="card bg-success text-white">
              <div class="card-body">
                <h5 class="card-title">My Courses</h5>
                <h2 class="card-text"><?= count($teacherCourses ?? []) ?></h2>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card bg-info text-white">
              <div class="card-body">
                <h5 class="card-title">Total Students</h5>
                <h2 class="card-text"><?= array_sum(array_column($teacherCourses ?? [], 'students')) ?></h2>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="card shadow">
              <div class="card-header bg-success text-white">
                <h5 class="mb-0">My Courses</h5>
              </div>
              <div class="card-body">
                <?php if (!empty($teacherCourses)): ?>
                  <div class="list-group list-group-flush">
                    <?php foreach ($teacherCourses as $course): ?>
                      <div class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                          <strong><?= esc($course['name']) ?></strong><br>
                          <small class="text-muted"><?= esc($course['students']) ?> students</small>
                        </div>
                        <span class="badge bg-success"><?= esc($course['status']) ?></span>
                      </div>
                    <?php endforeach; ?>
                  </div>
                <?php else: ?>
                  <p class="text-muted">No courses assigned.</p>
                <?php endif; ?>
              </div>
            </div>
          </div>
          
          <div class="col-md-6">
            <div class="card shadow">
              <div class="card-header bg-warning text-dark">
                <h5 class="mb-0">Notifications</h5>
              </div>
              <div class="card-body">
                <?php if (!empty($notifications)): ?>
                  <div class="list-group list-group-flush">
                    <?php foreach ($notifications as $notification): ?>
                      <div class="list-group-item">
                        <div class="d-flex w-100 justify-content-between">
                          <h6 class="mb-1"><?= esc($notification['message']) ?></h6>
                          <small><?= esc($notification['time']) ?></small>
                        </div>
                        <small class="text-muted">Type: <?= esc($notification['type']) ?></small>
                      </div>
                    <?php endforeach; ?>
                  </div>
                <?php else: ?>
                  <p class="text-muted">No notifications.</p>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
      </div>

    <?php elseif ($userRole === 'student'): ?>
      <!-- Student Dashboard -->
      <div class="col-12">
        <div class="row mb-4">
          <div class="col-md-4">
            <div class="card bg-info text-white">
              <div class="card-body">
                <h5 class="card-title">Enrolled Courses</h5>
                <h2 class="card-text"><?= count($enrolledCourses ?? []) ?></h2>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card bg-warning text-dark">
              <div class="card-body">
                <h5 class="card-title">Pending Assignments</h5>
                <h2 class="card-text"><?= count($upcomingDeadlines ?? []) ?></h2>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card bg-success text-white">
              <div class="card-body">
                <h5 class="card-title">Average Grade</h5>
                <h2 class="card-text">
                  <?php 
                  if (!empty($recentGrades)) {
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
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="card shadow">
              <div class="card-header bg-info text-white">
                <h5 class="mb-0">My Courses</h5>
              </div>
              <div class="card-body">
                <?php if (!empty($enrolledCourses)): ?>
                  <div class="list-group list-group-flush">
                    <?php foreach ($enrolledCourses as $course): ?>
                      <div class="list-group-item">
                        <div class="d-flex justify-content-between align-items-center">
                          <div>
                            <strong><?= esc($course['name']) ?></strong><br>
                            <small class="text-muted">Instructor: <?= esc($course['instructor']) ?></small>
                          </div>
                          <div class="text-end">
                            <div class="progress" style="width: 60px; height: 20px;">
                              <div class="progress-bar" role="progressbar" style="width: <?= $course['progress'] ?>%" 
                                   aria-valuenow="<?= $course['progress'] ?>" aria-valuemin="0" aria-valuemax="100">
                                <?= $course['progress'] ?>%
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    <?php endforeach; ?>
                  </div>
                <?php else: ?>
                  <p class="text-muted">No enrolled courses.</p>
                <?php endif; ?>
              </div>
            </div>
          </div>
          
          <div class="col-md-6">
            <div class="card shadow">
              <div class="card-header bg-warning text-dark">
                <h5 class="mb-0">Upcoming Deadlines</h5>
              </div>
              <div class="card-body">
                <?php if (!empty($upcomingDeadlines)): ?>
                  <div class="list-group list-group-flush">
                    <?php foreach ($upcomingDeadlines as $deadline): ?>
                      <div class="list-group-item">
                        <div class="d-flex w-100 justify-content-between">
                          <h6 class="mb-1"><?= esc($deadline['assignment']) ?></h6>
                          <small class="text-muted"><?= esc($deadline['due_date']) ?></small>
                        </div>
                        <p class="mb-1">Course: <?= esc($deadline['course']) ?></p>
                        <small>Status: <span class="badge bg-warning"><?= esc($deadline['status']) ?></span></small>
                      </div>
                    <?php endforeach; ?>
                  </div>
                <?php else: ?>
                  <p class="text-muted">No upcoming deadlines.</p>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>

        <!-- Recent Grades -->
        <?php if (!empty($recentGrades)): ?>
        <div class="row mt-4">
          <div class="col-12">
            <div class="card shadow">
              <div class="card-header bg-success text-white">
                <h5 class="mb-0">Recent Grades</h5>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Course</th>
                        <th>Assignment</th>
                        <th>Grade</th>
                        <th>Date</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($recentGrades as $grade): ?>
                        <tr>
                          <td><?= esc($grade['course']) ?></td>
                          <td><?= esc($grade['assignment']) ?></td>
                          <td>
                            <span class="badge <?= $grade['grade'] >= 90 ? 'bg-success' : ($grade['grade'] >= 70 ? 'bg-warning' : 'bg-danger') ?>">
                              <?= esc($grade['grade']) ?>
                            </span>
                          </td>
                          <td><?= esc($grade['date']) ?></td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php endif; ?>
      </div>

    <?php else: ?>
      <!-- Unknown Role -->
      <div class="col-12">
        <div class="alert alert-warning text-center shadow">
          <h4>Role not recognized</h4>
          <p>Please contact the administrator to resolve this issue.</p>
        </div>
      </div>
    <?php endif; ?>
  </div>
</div>
<?= $this->endSection() ?>
