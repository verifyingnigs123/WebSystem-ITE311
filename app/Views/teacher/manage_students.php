<?= $this->extend('design/template') ?>

<?= $this->section('title') ?>Manage Students<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container py-5">
    <!-- Header -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <h2 class="fw-bold text-primary">
                    <i class="fas fa-users me-2"></i>Student Management
                </h2>
                <div>
                    <a href="<?= base_url('dashboard') ?>" class="btn btn-outline-secondary me-2">
                        <i class="fas fa-arrow-left me-1"></i>Back to Dashboard
                    </a>
                    <button class="btn btn-outline-primary" onclick="refreshStudents()">
                        <i class="fas fa-sync-alt me-1"></i>Refresh
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Course Filter -->
    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <label for="courseFilter" class="form-label">Filter by Course</label>
                    <select class="form-select" id="courseFilter" onchange="filterStudents()">
                        <option value="">All Courses</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <label for="searchStudent" class="form-label">Search Students</label>
                    <input type="text" class="form-control" id="searchStudent" placeholder="Search by name or email..." onkeyup="searchStudents()">
                </div>
            </div>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <h5 class="card-title">Total Students</h5>
                    <h2 class="card-text" id="total-students">0</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <h5 class="card-title">Active Enrollments</h5>
                    <h2 class="card-text" id="active-enrollments">0</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-info text-white">
                <div class="card-body">
                    <h5 class="card-title">Courses Taught</h5>
                    <h2 class="card-text" id="courses-taught">0</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-warning text-dark">
                <div class="card-body">
                    <h5 class="card-title">Pending Requests</h5>
                    <h2 class="card-text" id="pending-requests">0</h2>
                </div>
            </div>
        </div>
    </div>

    <!-- Students List -->
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header bg-light">
                    <h5 class="mb-0">Enrolled Students</h5>
                </div>
                <div class="card-body">
                    <div id="students-list">
                        <div class="text-center py-4">
                            <div class="spinner-border text-primary" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                            <p class="mt-2 text-muted">Loading students...</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Alert Messages -->
<div id="alert-container" class="container mt-3"></div>

<!-- Student Details Modal -->
<div class="modal fade" id="studentDetailsModal" tabindex="-1" aria-labelledby="studentDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="studentDetailsModalLabel">Student Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="studentDetailsContent">
                <!-- Student details will be loaded here -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    // Load students, courses, and statistics on page load
    loadStudents();
    loadCourses();
    loadStatistics();
    
    function loadStudents() {
        // Show loading state
        $('#students-list').html('<div class="text-center py-4"><div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div><p class="mt-2 text-muted">Loading students...</p></div>');

        $.ajax({
            url: '<?= base_url('course/getTeacherStudents') ?>',
            type: 'GET',
            dataType: 'json',
            timeout: 10000, // 10 second timeout
            success: function(response) {
                console.log('Students AJAX Response:', response); // Debug log
                if (response.success) {
                    displayStudents(response.students || []);
                    updateStatistics(response.students || []);
                } else {
                    showAlert('danger', response.message || 'Failed to load students.');
                    // Show empty state on failure
                    displayStudents([]);
                    updateStatistics([]);
                }
            },
            error: function(xhr, status, error) {
                console.log('Students AJAX Error:', status, error, xhr.responseText);
                showAlert('danger', 'Failed to load students. Please check your connection and try again.');
                // Show error state
                $('#students-list').html('<div class="text-center py-4"><i class="fas fa-exclamation-triangle fa-3x text-danger mb-3"></i><p class="text-danger">Failed to load students. Please try again.</p><button class="btn btn-primary" onclick="loadStudents()">Retry</button></div>');
                // Reset statistics to 0 on error
                updateStatistics([]);
            }
        });
    }
    
    function loadCourses() {
        $.ajax({
            url: '<?= base_url('course/teacher-courses') ?>',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                console.log('Courses AJAX Response:', response); // Debug log
                if (response.success) {
                    var courseFilter = $('#courseFilter');
                    courseFilter.html('<option value="">All Courses</option>');

                    response.courses.forEach(function(course) {
                        courseFilter.append('<option value="' + course.course_id + '">' + course.course_name + ' (' + course.course_code + ')</option>');
                    });
                }
            },
            error: function(xhr, status, error) {
                console.error('Failed to load courses for filter:', status, error);
            }
        });
    }
    
    function displayStudents(students) {
        var studentsList = $('#students-list');
        
        if (students.length === 0) {
            studentsList.html('<div class="text-center py-4">' +
                '<i class="fas fa-users fa-3x text-muted mb-3"></i>' +
                '<p class="text-muted">No students enrolled in your courses yet.</p>' +
                '</div>');
        } else {
            var studentsHtml = '<div class="table-responsive"><table class="table table-hover">' +
                '<thead class="table-light">' +
                '<tr>' +
                '<th>Student Name</th>' +
                '<th>Email</th>' +
                '<th>Course</th>' +
                '<th>Enrollment Date</th>' +
                '<th>Status</th>' +
                '<th>Actions</th>' +
                '</tr>' +
                '</thead>' +
                '<tbody>';
            
            students.forEach(function(student) {
                studentsHtml += '<tr>' +
                    '<td><strong>' + student.student_name + '</strong></td>' +
                    '<td>' + student.email + '</td>' +
                    '<td><span class="badge bg-primary">' + student.course_name + '</span></td>' +
                    '<td>' + formatDate(student.enrollment_date) + '</td>' +
                    '<td><span class="badge bg-success">' + (student.status || 'Active') + '</span></td>' +
                    '<td>' +
                    '<button class="btn btn-sm btn-outline-info me-1" onclick="viewStudentDetails(' + student.student_id + ')">' +
                    '<i class="fas fa-eye"></i></button>' +
                    '<button class="btn btn-sm btn-outline-warning" onclick="sendMessage(' + student.student_id + ', \'' + student.student_name + '\')">' +
                    '<i class="fas fa-envelope"></i></button>' +
                    '</td>' +
                    '</tr>';
            });
            
            studentsHtml += '</tbody></table></div>';
            studentsList.html(studentsHtml);
        }
    }
    
    function updateStatistics(students) {
        var totalStudents = students.length;
        var activeEnrollments = students.filter(function(student) { return student.status === 'enrolled'; }).length;
        var pendingRequests = students.filter(function(student) { return student.status === 'pending'; }).length;
        var uniqueCourses = [...new Set(students.map(student => student.course_id))].length;

        $('#total-students').text(totalStudents);
        $('#active-enrollments').text(activeEnrollments);
        $('#courses-taught').text(uniqueCourses);
        $('#pending-requests').text(pendingRequests);
    }

    // Load statistics from server
    function loadStatistics() {
        $.ajax({
            url: '<?= base_url('course/getTeacherCourses') ?>',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    var stats = response.statistics;
                    $('#total-students').text(stats.total_students || 0);
                    $('#active-enrollments').text(stats.active_courses || 0);
                    $('#courses-taught').text(stats.total_courses || 0);
                    $('#pending-requests').text(stats.pending_courses || 0);
                }
            },
            error: function() {
                console.error('Failed to load statistics');
            }
        });
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
    
    // Global functions
    window.refreshStudents = function() {
        loadStudents();
    };
    
    window.filterStudents = function() {
        var selectedCourse = $('#courseFilter').val();
        // Implement filtering logic here
        loadStudents(); // For now, just reload
    };
    
    window.searchStudents = function() {
        var searchTerm = $('#searchStudent').val().toLowerCase();
        $('tbody tr').each(function() {
            var studentName = $(this).find('td:first').text().toLowerCase();
            var studentEmail = $(this).find('td:nth-child(2)').text().toLowerCase();
            
            if (studentName.includes(searchTerm) || studentEmail.includes(searchTerm)) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    };
    
    window.viewStudentDetails = function(studentId) {
        // Load student details via AJAX
        $.ajax({
            url: '<?= base_url('course/getStudentDetails') ?>/' + studentId,
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    var student = response.student;
                    var content = '<div class="row">' +
                        '<div class="col-md-6">' +
                        '<h6>Personal Information</h6>' +
                        '<p><strong>Name:</strong> ' + student.name + '</p>' +
                        '<p><strong>Email:</strong> ' + student.email + '</p>' +
                        '<p><strong>Phone:</strong> ' + (student.phone || 'N/A') + '</p>' +
                        '</div>' +
                        '<div class="col-md-6">' +
                        '<h6>Academic Information</h6>' +
                        '<p><strong>Student ID:</strong> ' + student.student_id + '</p>' +
                        '<p><strong>Year Level:</strong> ' + (student.year_level || 'N/A') + '</p>' +
                        '<p><strong>Program:</strong> ' + (student.program || 'N/A') + '</p>' +
                        '</div>' +
                        '</div>';
                    
                    $('#studentDetailsContent').html(content);
                    $('#studentDetailsModal').modal('show');
                } else {
                    showAlert('danger', 'Failed to load student details.');
                }
            },
            error: function() {
                showAlert('danger', 'Failed to load student details.');
            }
        });
    };
    
    window.sendMessage = function(studentId, studentName) {
        var message = prompt('Enter message for ' + studentName + ':');
        if (message) {
            // Implement message sending logic here
            showAlert('info', 'Message feature coming soon!');
        }
    };
});
</script>
<?= $this->endSection() ?>
