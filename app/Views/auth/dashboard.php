<?= $this->extend('design/template') ?>

<?= $this->section('title') ?>Dashboard<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container py-5">

  <!-- Welcome Message -->
  <div class="text-center mb-5">
    <h2 class="fw-bold text-primary">
      Welcome, <?= esc($userName ?? 'User') ?>!
    </h2>
    <p class="text-muted">
      You are logged in as <strong><?= esc($userRole ?? 'Guest') ?></strong>.
    </p>
    <p class="text-muted">
      Email: <?= esc($userEmail ?? 'N/A') ?>
    </p>
  </div>

  <!-- Role-based Conditional Content -->
  <div class="row">
    <?php if (($userRole ?? '') === 'admin'): ?>
      <!-- Admin Dashboard -->
      <div class="col-12">
        <div class="row mb-4">
          <div class="col-md-6">
            <div class="card bg-primary text-white">
              <div class="card-body">
                <h5 class="card-title">Total Users</h5>
                <h2 class="card-text"><?= esc($totalUsers ?? 0) ?></h2>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card bg-success text-white">
              <div class="card-body">
                <h5 class="card-title">Total Courses</h5>
                <h2 class="card-text"><?= esc($courseCount ?? 0) ?></h2>
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
            <?php if (!empty($recentActivities ?? [])): ?>
              <div class="list-group list-group-flush">
                <?php foreach ($recentActivities as $activity): ?>
                  <div class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                      <strong><?= esc($activity['name'] ?? '') ?></strong>
                      (<?= esc($activity['role'] ?? '') ?>)
                      <?= esc($activity['action'] ?? '') ?>
                      <?= esc($activity['target'] ?? '') ?>
                    </div>
                    <small class="text-muted"><?= esc($activity['created_at'] ?? '') ?></small>
                  </div>
                <?php endforeach; ?>
              </div>
            <?php else: ?>
              <p class="text-muted">No recent activities.</p>
            <?php endif; ?>
          </div>
        </div>
      </div>

    <?php elseif (($userRole ?? '') === 'teacher'): ?>
      <!-- Teacher Dashboard -->
      <div class="col-12">
        <!-- Add Course Button -->
        <div class="row mb-4">
          <div class="col-12">
            <button class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#addCourseModal">
              <i class="fas fa-plus"></i> Add New Course
            </button>
          </div>
        </div>

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

        <!-- Teacher Details -->
        <div class="row">
          <div class="col-md-8">
            <div class="card shadow">
              <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0">My Courses</h5>
                <button class="btn btn-light btn-sm" onclick="refreshCourses()">
                  <i class="fas fa-sync-alt"></i> Refresh
                </button>
              </div>
              <div class="card-body">
                <div id="teacher-courses-list">
                  <?php if (!empty($teacherCourses ?? [])): ?>
                    <div class="list-group list-group-flush">
                      <?php foreach ($teacherCourses as $course): ?>
                        <div class="list-group-item">
                          <div class="d-flex justify-content-between align-items-start">
                            <div class="flex-grow-1">
                              <h6 class="mb-1"><?= esc($course['course_name'] ?? '') ?></h6>
                              <p class="mb-1 text-muted">Code: <?= esc($course['course_code'] ?? '') ?></p>
                              <p class="mb-1"><?= esc($course['description'] ?? 'No description') ?></p>
                              <small class="text-muted">
                                Units: <?= esc($course['units'] ?? 3) ?> | 
                                Students: <?= esc($course['students'] ?? 0) ?> | 
                                Created: <?= esc($course['created_at'] ?? 'N/A') ?>
                              </small>
                            </div>
                            <div class="text-end">
                              <span class="badge bg-success"><?= esc($course['status'] ?? 'Active') ?></span>
                            </div>
                          </div>
                        </div>
                      <?php endforeach; ?>
                    </div>
                  <?php else: ?>
                    <div class="text-center py-4">
                      <i class="fas fa-book fa-3x text-muted mb-3"></i>
                      <p class="text-muted">No courses created yet.</p>
                      <p class="text-muted">Click "Add New Course" to create your first course!</p>
                    </div>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="card shadow">
              <div class="card-header bg-warning text-dark">
                <h5 class="mb-0">Notifications</h5>
              </div>
              <div class="card-body">
                <?php if (!empty($notifications ?? [])): ?>
                  <div class="list-group list-group-flush">
                    <?php foreach ($notifications as $note): ?>
                      <div class="list-group-item">
                        <div class="d-flex w-100 justify-content-between">
                          <h6 class="mb-1"><?= esc($note['message'] ?? '') ?></h6>
                          <small><?= esc($note['time'] ?? '') ?></small>
                        </div>
                        <small class="text-muted">Type: <?= esc($note['type'] ?? '') ?></small>
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

        <!-- Add Course Modal -->
        <div class="modal fade" id="addCourseModal" tabindex="-1" aria-labelledby="addCourseModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="addCourseModalLabel">Add New Course</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form id="addCourseForm">
                <div class="modal-body">
                  <div class="mb-3">
                    <label for="course_code" class="form-label">Course Code *</label>
                    <input type="text" class="form-control" id="course_code" name="course_code" required>
                    <div class="form-text">e.g., CS101, MATH201</div>
                  </div>
                  <div class="mb-3">
                    <label for="course_name" class="form-label">Course Name *</label>
                    <input type="text" class="form-control" id="course_name" name="course_name" required>
                  </div>
                  <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                  </div>
                  <div class="mb-3">
                    <label for="units" class="form-label">Units</label>
                    <input type="number" class="form-control" id="units" name="units" min="1" max="6" value="3">
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                  <button type="submit" class="btn btn-primary" id="saveCourseBtn">Create Course</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

    <?php elseif (($userRole ?? '') === 'student'): ?>
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
        </div>

        <!-- Enrolled Courses and Available Courses -->
        <div class="row">
          <div class="col-md-6">
            <div class="card shadow">
              <div class="card-header bg-info text-white">
                <h5 class="mb-0">My Enrolled Courses</h5>
              </div>
              <div class="card-body">
                <div id="enrolled-courses-list">
                  <?php if (!empty($enrolledCourses ?? [])): ?>
                    <div class="list-group list-group-flush">
                      <?php foreach ($enrolledCourses as $course): ?>
                        <div class="list-group-item">
                          <div class="d-flex justify-content-between align-items-center">
                            <div>
                              <strong><?= esc($course['course_name'] ?? '') ?></strong><br>
                              <small class="text-muted">Code: <?= esc($course['course_code'] ?? '') ?></small><br>
                              <small class="text-muted">Teacher: <?= esc($course['teacher_name'] ?? 'Unknown') ?></small><br>
                              <small class="text-muted">Units: <?= esc($course['units'] ?? 3) ?></small><br>
                              <small class="text-muted">Enrolled: <?= esc($course['enrollment_date'] ?? '') ?></small>
                            </div>
                            <div class="text-end">
                              <span class="badge bg-success"><?= esc($course['status'] ?? 'Enrolled') ?></span>
                            </div>
                          </div>
                        </div>
                      <?php endforeach; ?>
                    </div>
                  <?php else: ?>
                    <div class="text-center py-4">
                      <i class="fas fa-book fa-3x text-muted mb-3"></i>
                      <p class="text-muted">No enrolled courses yet.</p>
                      <p class="text-muted">Browse available courses below to get started!</p>
                    </div>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="card shadow">
              <div class="card-header bg-success text-white">
                <h5 class="mb-0">Available Courses</h5>
              </div>
              <div class="card-body">
                <div id="available-courses-list">
                  <?php if (!empty($availableCourses ?? [])): ?>
                    <div class="list-group list-group-flush">
                      <?php foreach ($availableCourses as $course): ?>
                        <div class="list-group-item">
                          <div class="d-flex justify-content-between align-items-center">
                            <div class="flex-grow-1">
                              <strong><?= esc($course['course_name'] ?? '') ?></strong><br>
                              <small class="text-muted">Code: <?= esc($course['course_code'] ?? '') ?></small><br>
                              <small class="text-muted">Teacher: <?= esc($course['teacher_name'] ?? 'Unknown') ?></small><br>
                              <small class="text-muted">Units: <?= esc($course['units'] ?? 3) ?></small><br>
                              <small class="text-muted"><?= esc($course['description'] ?? 'No description available') ?></small>
                            </div>
                            <div class="ms-3">
                              <button class="btn btn-primary btn-sm enroll-btn" 
                                      data-course-id="<?= esc($course['course_id'] ?? '') ?>"
                                      data-course-name="<?= esc($course['course_name'] ?? '') ?>">
                                <i class="fas fa-plus"></i> Enroll
                              </button>
                            </div>
                          </div>
                        </div>
                      <?php endforeach; ?>
                    </div>
                  <?php else: ?>
                    <div class="text-center py-4">
                      <i class="fas fa-graduation-cap fa-3x text-muted mb-3"></i>
                      <p class="text-muted">No available courses at the moment.</p>
                      <p class="text-muted">Check back later for new courses!</p>
                    </div>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Alert Messages -->
        <div id="alert-container" class="mt-3"></div>
        
        <!-- Teacher Alert Messages -->
        <div id="teacher-alert-container" class="mt-3"></div>

        <!-- Deadlines and Grades -->
        <div class="row mt-4">
          <div class="col-md-6">
            <div class="card shadow">
              <div class="card-header bg-warning text-dark">
                <h5 class="mb-0">Upcoming Deadlines</h5>
              </div>
              <div class="card-body">
                <?php if (!empty($upcomingDeadlines ?? [])): ?>
                  <div class="list-group list-group-flush">
                    <?php foreach ($upcomingDeadlines as $deadline): ?>
                      <div class="list-group-item">
                        <div class="d-flex w-100 justify-content-between">
                          <h6 class="mb-1"><?= esc($deadline['assignment'] ?? '') ?></h6>
                          <small class="text-muted"><?= esc($deadline['due_date'] ?? '') ?></small>
                        </div>
                        <p class="mb-1">Course: <?= esc($deadline['course'] ?? '') ?></p>
                        <small>Status: <span class="badge bg-warning"><?= esc($deadline['status'] ?? 'Pending') ?></span></small>
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

        <?php if (!empty($recentGrades ?? [])): ?>
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
                          <td><?= esc($grade['course'] ?? '') ?></td>
                          <td><?= esc($grade['assignment'] ?? '') ?></td>
                          <td>
                            <span class="badge <?= ($grade['grade'] ?? 0) >= 90 ? 'bg-success' : (($grade['grade'] ?? 0) >= 70 ? 'bg-warning' : 'bg-danger') ?>">
                              <?= esc($grade['grade'] ?? 'N/A') ?>
                            </span>
                          </td>
                          <td><?= esc($grade['date'] ?? '') ?></td>
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

        <!-- AJAX Enrollment Script -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
        $(document).ready(function() {
            // Handle enrollment button clicks
            $(document).on('click', '.enroll-btn', function(e) {
                e.preventDefault();
                
                var button = $(this);
                var courseId = button.data('course-id');
                var courseName = button.data('course-name');
                
                // Disable button and show loading state
                button.prop('disabled', true).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Enrolling...');
                
                // Send AJAX request
                $.post('<?= base_url('course/enroll') ?>', {
                    course_id: courseId
                })
                .done(function(response) {
                    if (response.success) {
                        // Show success message
                        showAlert('success', response.message);
                        
                        // Hide the button and course from available courses
                        button.closest('.list-group-item').fadeOut(300, function() {
                            $(this).remove();
                        });
                        
                        // Add course to enrolled courses list
                        addToEnrolledCourses(courseId, courseName);
                        
                        // Update enrolled courses count
                        updateEnrolledCount();
                    } else {
                        // Show error message
                        showAlert('danger', response.message);
                        
                        // Re-enable button
                        button.prop('disabled', false).html('<i class="fas fa-plus"></i> Enroll');
                    }
                })
                .fail(function() {
                    // Show error message
                    showAlert('danger', 'An error occurred. Please try again.');
                    
                    // Re-enable button
                    button.prop('disabled', false).html('<i class="fas fa-plus"></i> Enroll');
                });
            });
            
            function showAlert(type, message) {
                var alertHtml = '<div class="alert alert-' + type + ' alert-dismissible fade show" role="alert">' +
                    message +
                    '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>' +
                    '</div>';
                
                $('#alert-container').html(alertHtml);
                
                // Auto-hide after 5 seconds
                setTimeout(function() {
                    $('.alert').fadeOut();
                }, 5000);
            }
            
            function addToEnrolledCourses(courseId, courseName) {
                var enrolledList = $('#enrolled-courses-list .list-group');
                
                // Check if list is empty
                if (enrolledList.find('.list-group-item').length === 0) {
                    enrolledList.html('');
                }
                
                var courseHtml = '<div class="list-group-item">' +
                    '<div class="d-flex justify-content-between align-items-center">' +
                    '<div>' +
                    '<strong>' + courseName + '</strong><br>' +
                    '<small class="text-muted">Enrolled: ' + new Date().toLocaleDateString() + '</small>' +
                    '</div>' +
                    '<div class="text-end">' +
                    '<span class="badge bg-success">Enrolled</span>' +
                    '</div>' +
                    '</div>' +
                    '</div>';
                
                enrolledList.prepend(courseHtml);
            }
            
            function updateEnrolledCount() {
                var count = $('#enrolled-courses-list .list-group-item').length;
                $('.card.bg-info .card-text').text(count);
            }
        });
        </script>

        <!-- Teacher Course Management Script -->
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
                
                // Disable submit button and show loading state
                var submitBtn = $('#saveCourseBtn');
                var originalText = submitBtn.html();
                submitBtn.prop('disabled', true).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Creating...');
                
                // Send AJAX request
                $.post('<?= base_url('course/create') ?>', formData)
                .done(function(response) {
                    if (response.success) {
                        // Show success message
                        showTeacherAlert('success', response.message);
                        
                        // Close modal and reset form
                        $('#addCourseModal').modal('hide');
                        $('#addCourseForm')[0].reset();
                        
                        // Refresh courses list
                        refreshCourses();
                        
                        // Update course count
                        updateCourseCount();
                    } else {
                        // Show error message
                        showTeacherAlert('danger', response.message);
                    }
                })
                .fail(function() {
                    // Show error message
                    showTeacherAlert('danger', 'An error occurred. Please try again.');
                })
                .always(function() {
                    // Re-enable submit button
                    submitBtn.prop('disabled', false).html(originalText);
                });
            });
            
            function showTeacherAlert(type, message) {
                var alertHtml = '<div class="alert alert-' + type + ' alert-dismissible fade show" role="alert">' +
                    message +
                    '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>' +
                    '</div>';
                
                // Clear existing alerts and show new one
                $('#teacher-alert-container').html(alertHtml);
                
                // Auto-hide after 5 seconds
                setTimeout(function() {
                    $('#teacher-alert-container .alert').fadeOut();
                }, 5000);
            }
            
            function refreshCourses() {
                $.get('<?= base_url('course/getTeacherCourses') ?>')
                .done(function(response) {
                    if (response.success) {
                        updateCoursesList(response.courses);
                        updateCourseCount();
                    }
                })
                .fail(function() {
                    showTeacherAlert('danger', 'Failed to refresh courses.');
                });
            }
            
            function updateCoursesList(courses) {
                var coursesList = $('#teacher-courses-list');
                
                if (courses.length === 0) {
                    coursesList.html('<div class="text-center py-4">' +
                        '<i class="fas fa-book fa-3x text-muted mb-3"></i>' +
                        '<p class="text-muted">No courses created yet.</p>' +
                        '<p class="text-muted">Click "Add New Course" to create your first course!</p>' +
                        '</div>');
                } else {
                    var coursesHtml = '<div class="list-group list-group-flush">';
                    
                    courses.forEach(function(course) {
                        coursesHtml += '<div class="list-group-item">' +
                            '<div class="d-flex justify-content-between align-items-start">' +
                            '<div class="flex-grow-1">' +
                            '<h6 class="mb-1">' + course.course_name + '</h6>' +
                            '<p class="mb-1 text-muted">Code: ' + course.course_code + '</p>' +
                            '<p class="mb-1">' + (course.description || 'No description') + '</p>' +
                            '<small class="text-muted">' +
                            'Units: ' + (course.units || 3) + ' | ' +
                            'Students: ' + (course.students || 0) + ' | ' +
                            'Created: ' + (course.created_at || 'N/A') +
                            '</small>' +
                            '</div>' +
                            '<div class="text-end">' +
                            '<span class="badge bg-success">' + (course.status || 'Active') + '</span>' +
                            '</div>' +
                            '</div>' +
                            '</div>';
                    });
                    
                    coursesHtml += '</div>';
                    coursesList.html(coursesHtml);
                }
            }
            
            function updateCourseCount() {
                var courseCount = $('#teacher-courses-list .list-group-item').length;
                $('.card.bg-success .card-text').text(courseCount);
            }
        });
        </script>
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
