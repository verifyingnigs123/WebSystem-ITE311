<?= $this->extend('design/template') ?>

<?= $this->section('title') ?>Manage Courses<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container py-5">
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

    <!-- Header -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <h2 class="fw-bold text-primary">
                    <i class="fas fa-book me-2"></i>My Courses
                </h2>
                <div>
                    <a href="<?= base_url('dashboard') ?>" class="btn btn-outline-secondary me-2">
                        <i class="fas fa-arrow-left me-1"></i>Back to Dashboard
                    <a href="<?= base_url('teacher/add-course') ?>" class="btn btn-primary me-2">
                        <i class="fas fa-plus me-1"></i>Add New Course
                    </a>
                    <button class="btn btn-outline-secondary" onclick="refreshCourses()">
                        <i class="fas fa-sync-alt me-1"></i>Refresh
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <h5 class="card-title">Total Courses</h5>
                    <h2 class="card-text" id="total-courses">0</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <h5 class="card-title">Total Students</h5>
                    <h2 class="card-text" id="total-students">0</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-info text-white">
                <div class="card-body">
                    <h5 class="card-title">Active Courses</h5>
                    <h2 class="card-text" id="active-courses">0</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-warning text-dark">
                <div class="card-body">
                    <h5 class="card-title">Pending</h5>
                    <h2 class="card-text" id="pending-courses">0</h2>
                </div>
            </div>
        </div>
    </div>

    <!-- Courses List -->
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header bg-light">
                    <h5 class="mb-0">Course Management</h5>
                </div>
                <div class="card-body">
                    <div id="courses-list">
                        <div class="text-center py-4">
                            <div class="spinner-border text-primary" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                            <p class="mt-2 text-muted">Loading courses...</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Alert Messages -->
<div id="alert-container" class="container mt-3"></div>

<!-- Course Edit Modal -->
<div class="modal fade" id="editCourseModal" tabindex="-1" aria-labelledby="editCourseModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editCourseModalLabel">Edit Course</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editCourseForm">
                <?= csrf_field() ?>
                <div class="modal-body">
                    <input type="hidden" id="edit_course_id" name="course_id">
                    <div class="mb-3">
                        <label for="edit_course_code" class="form-label">Course Code</label>
                        <input type="text" class="form-control" id="edit_course_code" name="course_code" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_course_name" class="form-label">Course Name</label>
                        <input type="text" class="form-control" id="edit_course_name" name="course_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_description" class="form-label">Description</label>
                        <textarea class="form-control" id="edit_description" name="description" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="edit_units" class="form-label">Units</label>
                        <input type="number" class="form-control" id="edit_units" name="units" min="1" max="6">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    // Load courses on page load
    loadCourses();
    
    // Handle edit course form submission
    $('#editCourseForm').on('submit', function(e) {
        e.preventDefault();
        
        var courseId = $('#edit_course_id').val();
        var formData = {
            course_code: $('#edit_course_code').val(),
            course_name: $('#edit_course_name').val(),
            description: $('#edit_description').val(),
            units: $('#edit_units').val()
        };
        
        // Send AJAX request to update course
        $.ajax({
            url: '<?= base_url('course/update') ?>/' + courseId,
            type: 'POST',
            data: formData,
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    showAlert('success', response.message);
                    $('#editCourseModal').modal('hide');
                    loadCourses();
                } else {
                    showAlert('danger', response.message);
                }
            },
            error: function() {
                showAlert('danger', 'Failed to update course. Please try again.');
            }
        });
    });
    
    function loadCourses() {
        // Show loading state
        $('#courses-list').html('<div class="text-center py-4"><div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div><p class="mt-2 text-muted">Loading courses...</p></div>');

        $.ajax({
            url: '<?= base_url('course/getTeacherCourses') ?>',
            type: 'GET',
            dataType: 'json',
            timeout: 10000, // 10 second timeout
            success: function(response) {
                console.log('AJAX Response:', response); // Debug log
                if (response.success) {
                    displayCourses(response.courses || []);
                    updateStatistics(response.statistics || {});
                } else {
                    showAlert('danger', response.message || 'Failed to load courses.');
                    // Show empty state on failure
                    displayCourses([]);
                    updateStatistics({});
                }
            },
            error: function(xhr, status, error) {
                console.log('AJAX Error:', status, error, xhr.responseText);
                showAlert('danger', 'Failed to load courses. Please check your connection and try again.');
                // Show error state
                $('#courses-list').html('<div class="text-center py-4"><i class="fas fa-exclamation-triangle fa-3x text-danger mb-3"></i><p class="text-danger">Failed to load courses. Please try again.</p><button class="btn btn-primary" onclick="loadCourses()">Retry</button></div>');
                // Reset statistics to 0 on error
                updateStatistics({});
            }
        });
    }
    
    function displayCourses(courses) {
        var coursesList = $('#courses-list');
        
        if (courses.length === 0) {
            coursesList.html('<div class="text-center py-4">' +
                '<i class="fas fa-book fa-3x text-muted mb-3"></i>' +
                '<p class="text-muted">No courses created yet.</p>' +
                '<a href="<?= base_url('teacher/add-course') ?>" class="btn btn-primary">Create Your First Course</a>' +
                '</div>');
        } else {
            var coursesHtml = '<div class="table-responsive"><table class="table table-hover">' +
                '<thead class="table-light">' +
                '<tr>' +
                '<th>Course Code</th>' +
                '<th>Course Name</th>' +
                '<th>Units</th>' +
                '<th>Students</th>' +
                '<th>Status</th>' +
                '<th>Created</th>' +
                '<th>Actions</th>' +
                '</tr>' +
                '</thead>' +
                '<tbody>';
            
            courses.forEach(function(course) {
                coursesHtml += '<tr>' +
                    '<td><strong>' + course.course_code + '</strong></td>' +
                    '<td>' + course.course_name + '</td>' +
                    '<td>' + (course.units || 3) + '</td>' +
                    '<td><span class="badge bg-info">' + (course.total_students || 0) + '</span></td>' +
                    '<td><span class="badge bg-success">' + (course.status || 'Active') + '</span></td>' +
                    '<td>' + formatDate(course.created_at) + '</td>' +
                    '<td>' +
                    '<button class="btn btn-sm btn-outline-primary me-1" onclick="editCourse(' + course.course_id + ')">' +
                    '<i class="fas fa-edit"></i></button>' +
                    '<button class="btn btn-sm btn-outline-danger" onclick="deleteCourse(' + course.course_id + ', \'' + course.course_name + '\')">' +
                    '<i class="fas fa-trash"></i></button>' +
                    '</td>' +
                    '</tr>';
            });
            
            coursesHtml += '</tbody></table></div>';
            coursesList.html(coursesHtml);
        }
    }
    
    function updateStatistics(statistics) {
        $('#total-courses').text(statistics.total_courses || 0);
        $('#total-students').text(statistics.total_students || 0);
        $('#active-courses').text(statistics.active_courses || 0);
        $('#pending-courses').text(statistics.pending_courses || 0);
    }
    
    function formatDate(dateString) {
        if (!dateString) return 'N/A';
        var date = new Date(dateString);
        return date.toLocaleDateString();
    }
    
    function showAlert(type, message) {
        var alertHtml = '<div class="alert alert-' + type + ' alert-dismissible fade show" role="alert">' +
            '<i class="fas fa-' + (type === 'success' ? 'check-circle' : 'exclamation-triangle') + ' me-2"></i>' +
            message +
            '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>' +
            '</div>';
        
        $('#alert-container').html(alertHtml);
        
        setTimeout(function() {
            $('#alert-container .alert').fadeOut();
        }, 5000);
    }
    
    // Global functions for buttons
    window.refreshCourses = function() {
        loadCourses();
    };
    
    window.editCourse = function(courseId) {
        // Find course data and populate modal
        $.ajax({
            url: '<?= base_url('course/get') ?>/' + courseId,
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    var course = response.course;
                    $('#edit_course_id').val(course.course_id);
                    $('#edit_course_code').val(course.course_code);
                    $('#edit_course_name').val(course.course_name);
                    $('#edit_description').val(course.description);
                    $('#edit_units').val(course.units);
                    $('#editCourseModal').modal('show');
                } else {
                    showAlert('danger', 'Failed to load course data.');
                }
            },
            error: function() {
                showAlert('danger', 'Failed to load course data.');
            }
        });
    };
    
    window.deleteCourse = function(courseId, courseName) {
        if (confirm('Are you sure you want to delete "' + courseName + '"? This action cannot be undone.')) {
            $.ajax({
                url: '<?= base_url('course/delete') ?>/' + courseId,
                type: 'POST',
                data: {<?= csrf_token() ?>: $('input[name="<?= csrf_token() ?>"]').val()},
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        showAlert('success', response.message);
                        loadCourses();
                    } else {
                        showAlert('danger', response.message);
                    }
                },
                error: function() {
                    showAlert('danger', 'Failed to delete course. Please try again.');
                }
            });
        }
    };
});
</script>
<?= $this->endSection() ?>
