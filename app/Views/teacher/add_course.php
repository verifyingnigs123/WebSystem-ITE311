<?= $this->extend('design/template') ?>

<?= $this->section('title') ?>Add New Course<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">
                        <i class="fas fa-plus-circle me-2"></i>Add New Course
                    </h4>
                </div>
                <div class="card-body">
                    <form id="addCourseForm" method="POST" action="<?= base_url('course/create') ?>">
                        <?= csrf_field() ?>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="course_code" class="form-label">Course Code <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="course_code" name="course_code" required>
                                    <div class="form-text">e.g., CS101, MATH201, ENG101</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="units" class="form-label">Units</label>
                                    <input type="number" class="form-control" id="units" name="units" min="1" max="6" value="3">
                                </div>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="course_name" class="form-label">Course Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="course_name" name="course_name" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="4" placeholder="Enter course description..."></textarea>
                        </div>
                        
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="<?= base_url('dashboard') ?>" class="btn btn-secondary me-md-2">
                                <i class="fas fa-arrow-left me-1"></i>Back to Dashboard
                            </a>
                            <button type="submit" class="btn btn-primary" id="saveCourseBtn">
                                <i class="fas fa-save me-1"></i>Create Course
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Alert Messages -->
<div id="alert-container" class="container mt-3"></div>

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
        console.log('Sending course creation request:', formData);
        $.ajax({
            url: '<?= base_url('course/create') ?>',
            type: 'POST',
            data: formData,
            dataType: 'json',
            timeout: 10000,
            beforeSend: function(xhr) {
                // Add CSRF token if available
                var csrfToken = $('input[name="<?= csrf_token() ?>"]').val();
                if (csrfToken) {
                    xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken);
                }
            }
        })
        .done(function(response) {
            console.log('Course creation response:', response);
            if (response && response.success) {
                // Show success message
                showAlert('success', response.message);
                
                // Reset form
                $('#addCourseForm')[0].reset();
                
                // Redirect to dashboard after 2 seconds
                setTimeout(function() {
                    window.location.href = '<?= base_url('dashboard') ?>';
                }, 2000);
                
            } else {
                // Show error message
                console.error('Course creation failed:', response);
                showAlert('danger', (response && response.message) ? response.message : 'Failed to create course. Please try again.');
            }
        })
        .fail(function(xhr, status, error) {
            console.error('Course creation failed:', xhr.responseText, status, error);
            
            let errorMessage = 'An error occurred. Please try again.';
            if (status === 'timeout') {
                errorMessage = 'Request timed out. Please check your connection and try again.';
            } else if (xhr.status === 0) {
                errorMessage = 'Network error. Please check your connection.';
            } else if (xhr.status >= 500) {
                errorMessage = 'Server error. Please try again later.';
            } else if (xhr.status === 404) {
                errorMessage = 'Course creation endpoint not found. Please contact support.';
            } else {
                try {
                    const errorResponse = JSON.parse(xhr.responseText);
                    if (errorResponse && errorResponse.message) {
                        errorMessage = errorResponse.message;
                    }
                } catch (e) {
                    console.error('Could not parse error response:', e);
                    if (xhr.responseText) {
                        errorMessage = 'Server returned: ' + xhr.responseText.substring(0, 100);
                    }
                }
            }
            
            showAlert('danger', errorMessage);
        })
        .always(function() {
            // Re-enable submit button
            submitBtn.prop('disabled', false).html(originalText);
        });
    });
    
    function showAlert(type, message) {
        var alertHtml = '<div class="alert alert-' + type + ' alert-dismissible fade show" role="alert">' +
            '<i class="fas fa-' + (type === 'success' ? 'check-circle' : 'exclamation-triangle') + ' me-2"></i>' +
            message +
            '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>' +
            '</div>';
        
        // Clear existing alerts and show new one
        $('#alert-container').html(alertHtml);
        
        // Auto-hide after 5 seconds for success, 8 seconds for errors
        var hideDelay = type === 'success' ? 5000 : 8000;
        setTimeout(function() {
            $('#alert-container .alert').fadeOut();
        }, hideDelay);
    }
});
</script>
<?= $this->endSection() ?>
