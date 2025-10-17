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
      ]

       

    <?php elseif (($userRole ?? '') === 'teacher'): ?>
      <!-- Teacher Dashboard -->
      

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

        <!-- Quick Actions -->
        <div class="row mb-4">
          <div class="col-12">
            <div class="card shadow">
              <div class="card-body text-center">
                <h5 class="card-title mb-3">Quick Actions</h5>
                <div class="d-flex justify-content-center gap-3 flex-wrap">
                  <a href="<?= base_url('announcements') ?>" class="btn btn-primary">
                    <i class="fas fa-bullhorn me-2"></i>View Announcements
                  </a>
                  <a href="<?= base_url('student/courses') ?>" class="btn btn-outline-primary">
                    <i class="fas fa-graduation-cap me-2"></i>Browse Courses
                  </a>
                  <a href="<?= base_url('student/grades') ?>" class="btn btn-outline-success">
                    <i class="fas fa-star me-2"></i>View Grades
                  </a>
                </div>
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
        
        // Disable button and show loading state
        button.prop('disabled', true).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Enrolling...');
        
        // Send AJAX request
        console.log('Sending AJAX request to:', '<?= base_url('course/enroll') ?>');
        console.log('POST data:', { course_id: courseId });
        
        $.ajax({
            url: '<?= base_url('course/enroll') ?>',
            type: 'POST',
            data: { course_id: courseId },
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
        var alertHtml = '<div class="alert alert-' + type + ' alert-dismissible fade show" role="alert">' +
            message +
            '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>' +
            '</div>';
        $('#alert-container').html(alertHtml);
        setTimeout(function() { $('.alert').fadeOut(); }, 5000);
    }
    
    function addToEnrolledCourses(courseId, courseName) {
        var enrolledList = $('#enrolled-courses-list .list-group');
        if (enrolledList.find('.list-group-item').length === 0) enrolledList.html('');
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
            if (response && response.success) {
                showTeacherAlert('success', response.message);
                $('#addCourseModal').modal('hide');
                $('#addCourseForm')[0].reset();
                refreshCourses();
                updateCourseCount();
                if (typeof toastr !== 'undefined') toastr.success(response.message);
            } else {
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
        var alertHtml = '<div class="alert alert-' + type + ' alert-dismissible fade show" role="alert">' +
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
<?= $this->endSection() ?>
