<?= $this->extend('template/header') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title mb-0">
                        <i class="fas fa-bell me-2"></i>Notification History
                    </h4>
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-outline-primary" id="markAllReadBtn">
                            <i class="fas fa-check-double me-1"></i>Mark All Read
                        </button>
                        <button type="button" class="btn btn-outline-secondary" id="refreshNotifications">
                            <i class="fas fa-sync-alt me-1"></i>Refresh
                        </button>
                        <button type="button" class="btn btn-outline-danger" id="clearOldNotifications">
                            <i class="fas fa-trash me-1"></i>Clear Old
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Filter Section -->
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="typeFilter" class="form-label">Filter by Type:</label>
                            <select class="form-select" id="typeFilter">
                                <option value="">All Types</option>
                                <option value="info">Info</option>
                                <option value="success">Success</option>
                                <option value="warning">Warning</option>
                                <option value="error">Error</option>
                                <option value="course">Course</option>
                                <option value="announcement">Announcement</option>
                                <option value="material">Material</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="statusFilter" class="form-label">Filter by Status:</label>
                            <select class="form-select" id="statusFilter">
                                <option value="">All Status</option>
                                <option value="unread">Unread</option>
                                <option value="read">Read</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="searchInput" class="form-label">Search:</label>
                            <input type="text" class="form-control" id="searchInput" placeholder="Search notifications...">
                        </div>
                    </div>

                    <!-- Notifications List -->
                    <div id="notificationsContainer">
                        <div class="text-center py-4">
                            <div class="spinner-border text-primary" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                            <p class="mt-2">Loading notifications...</p>
                        </div>
                    </div>

                    <!-- Pagination -->
                    <nav aria-label="Notification pagination" class="mt-4">
                        <ul class="pagination justify-content-center" id="paginationContainer">
                            <!-- Pagination will be loaded here -->
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Notification Detail Modal -->
<div class="modal fade" id="notificationModal" tabindex="-1" aria-labelledby="notificationModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="notificationModalLabel">Notification Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="notificationModalBody">
                <!-- Notification details will be loaded here -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="markAsReadModalBtn">Mark as Read</button>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    let currentPage = 1;
    let currentFilters = {
        type: '',
        status: '',
        search: ''
    };

    // Load notifications on page load
    loadNotifications();

    // Load notifications with current filters and page
    function loadNotifications() {
        const params = new URLSearchParams({
            page: currentPage,
            limit: 10,
            ...currentFilters
        });

        $.get('<?= base_url('/notifications/history') ?>?' + params.toString())
            .done(function(data) {
                if (data.success) {
                    displayNotifications(data.notifications);
                    displayPagination(data.pagination);
                } else {
                    showError('Failed to load notifications');
                }
            })
            .fail(function() {
                showError('Error loading notifications');
            });
    }

    // Display notifications
    function displayNotifications(notifications) {
        const container = $('#notificationsContainer');
        
        if (notifications.length === 0) {
            container.html(`
                <div class="text-center py-5">
                    <i class="fas fa-bell-slash fa-3x text-muted mb-3"></i>
                    <h5 class="text-muted">No notifications found</h5>
                    <p class="text-muted">Try adjusting your filters or check back later.</p>
                </div>
            `);
            return;
        }

        let html = '';
        notifications.forEach(function(notification) {
            const typeIcon = getNotificationTypeIcon(notification.type);
            const statusClass = notification.is_read == 0 ? 'border-start border-4 border-primary' : '';
            const readStatus = notification.is_read == 0 ? 'Unread' : 'Read';
            const readClass = notification.is_read == 0 ? 'text-primary' : 'text-muted';
            
            html += `
                <div class="card mb-3 notification-item ${statusClass}" data-id="${notification.id}">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start">
                            <div class="flex-grow-1">
                                <div class="d-flex align-items-center mb-2">
                                    <i class="${typeIcon} me-2"></i>
                                    <h6 class="card-title mb-0">${notification.message}</h6>
                                    <span class="badge bg-${notification.is_read == 0 ? 'primary' : 'secondary'} ms-2">${readStatus}</span>
                                </div>
                                <p class="card-text text-muted mb-2">
                                    <small>
                                        <i class="fas fa-clock me-1"></i>
                                        ${formatNotificationTime(notification.created_at)}
                                    </small>
                                </p>
                            </div>
                            <div class="btn-group" role="group">
                                ${notification.is_read == 0 ? 
                                    `<button class="btn btn-sm btn-outline-primary mark-read-btn" data-id="${notification.id}">
                                        <i class="fas fa-check"></i>
                                    </button>` : ''
                                }
                                <button class="btn btn-sm btn-outline-info view-details-btn" data-id="${notification.id}">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            `;
        });

        container.html(html);
    }

    // Display pagination
    function displayPagination(pagination) {
        const container = $('#paginationContainer');
        
        if (pagination.total_pages <= 1) {
            container.empty();
            return;
        }

        let html = '';
        
        // Previous button
        html += `
            <li class="page-item ${pagination.current_page == 1 ? 'disabled' : ''}">
                <a class="page-link" href="#" data-page="${pagination.current_page - 1}">Previous</a>
            </li>
        `;

        // Page numbers
        for (let i = 1; i <= pagination.total_pages; i++) {
            if (i == pagination.current_page) {
                html += `<li class="page-item active"><span class="page-link">${i}</span></li>`;
            } else {
                html += `<li class="page-item"><a class="page-link" href="#" data-page="${i}">${i}</a></li>`;
            }
        }

        // Next button
        html += `
            <li class="page-item ${pagination.current_page == pagination.total_pages ? 'disabled' : ''}">
                <a class="page-link" href="#" data-page="${pagination.current_page + 1}">Next</a>
            </li>
        `;

        container.html(html);
    }

    // Get icon for notification type
    function getNotificationTypeIcon(type) {
        const icons = {
            'info': 'fas fa-info-circle text-info',
            'success': 'fas fa-check-circle text-success',
            'warning': 'fas fa-exclamation-triangle text-warning',
            'error': 'fas fa-exclamation-circle text-danger',
            'course': 'fas fa-book text-primary',
            'announcement': 'fas fa-bullhorn text-info',
            'material': 'fas fa-file-alt text-secondary'
        };
        return icons[type] || icons['info'];
    }

    // Format notification time
    function formatNotificationTime(timestamp) {
        const date = new Date(timestamp);
        const now = new Date();
        const diff = now - date;
        
        if (diff < 60000) { // Less than 1 minute
            return 'Just now';
        } else if (diff < 3600000) { // Less than 1 hour
            return Math.floor(diff / 60000) + ' minutes ago';
        } else if (diff < 86400000) { // Less than 1 day
            return Math.floor(diff / 3600000) + ' hours ago';
        } else {
            return date.toLocaleDateString() + ' ' + date.toLocaleTimeString();
        }
    }

    // Show error message
    function showError(message) {
        $('#notificationsContainer').html(`
            <div class="alert alert-danger" role="alert">
                <i class="fas fa-exclamation-circle me-2"></i>${message}
            </div>
        `);
    }

    // Event handlers
    $(document).on('click', '.mark-read-btn', function(e) {
        e.preventDefault();
        const notificationId = $(this).data('id');
        const button = $(this);

        $.post('<?= base_url('/notifications/mark_read/') ?>' + notificationId)
            .done(function(data) {
                if (data.success) {
                    // Update UI
                    button.closest('.notification-item').removeClass('border-primary').addClass('border-secondary');
                    button.closest('.notification-item').find('.badge').removeClass('bg-primary').addClass('bg-secondary').text('Read');
                    button.remove();
                } else {
                    alert('Failed to mark notification as read');
                }
            })
            .fail(function() {
                alert('Error marking notification as read');
            });
    });

    $(document).on('click', '.view-details-btn', function(e) {
        e.preventDefault();
        const notificationId = $(this).data('id');
        
        // Find notification data
        const notificationItem = $(this).closest('.notification-item');
        const message = notificationItem.find('.card-title').text();
        const time = notificationItem.find('.text-muted small').text();
        const type = notificationItem.find('i').first().attr('class');
        
        // Show modal
        $('#notificationModalBody').html(`
            <div class="mb-3">
                <strong>Message:</strong>
                <p class="mt-1">${message}</p>
            </div>
            <div class="mb-3">
                <strong>Type:</strong>
                <span class="ms-2"><i class="${type}"></i> ${type.split(' ')[2] || 'Info'}</span>
            </div>
            <div class="mb-3">
                <strong>Time:</strong>
                <span class="ms-2">${time}</span>
            </div>
        `);
        
        $('#markAsReadModalBtn').data('id', notificationId);
        $('#notificationModal').modal('show');
    });

    $(document).on('click', '#markAsReadModalBtn', function() {
        const notificationId = $(this).data('id');
        // Trigger mark as read
        $(`.mark-read-btn[data-id="${notificationId}"]`).click();
        $('#notificationModal').modal('hide');
    });

    $(document).on('click', '#markAllReadBtn', function(e) {
        e.preventDefault();
        
        $.post('<?= base_url('/notifications/mark_all_read') ?>')
            .done(function(data) {
                if (data.success) {
                    loadNotifications();
                    alert('All notifications marked as read');
                } else {
                    alert('Failed to mark all notifications as read');
                }
            })
            .fail(function() {
                alert('Error marking all notifications as read');
            });
    });

    $(document).on('click', '#refreshNotifications', function(e) {
        e.preventDefault();
        loadNotifications();
    });

    $(document).on('click', '#clearOldNotifications', function(e) {
        e.preventDefault();
        
        if (confirm('Are you sure you want to clear old notifications? This action cannot be undone.')) {
            // This would need to be implemented in the controller
            alert('Feature coming soon!');
        }
    });

    // Filter handlers
    $('#typeFilter, #statusFilter').on('change', function() {
        currentFilters.type = $('#typeFilter').val();
        currentFilters.status = $('#statusFilter').val();
        currentPage = 1;
        loadNotifications();
    });

    $('#searchInput').on('input', function() {
        currentFilters.search = $(this).val();
        currentPage = 1;
        loadNotifications();
    });

    // Pagination handlers
    $(document).on('click', '.page-link', function(e) {
        e.preventDefault();
        const page = $(this).data('page');
        if (page && page !== currentPage) {
            currentPage = page;
            loadNotifications();
        }
    });
});
</script>

<style>
.notification-item {
    transition: all 0.3s ease;
}

.notification-item:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
}

.border-primary {
    border-left-color: #0d6efd !important;
}

.border-secondary {
    border-left-color: #6c757d !important;
}

.page-link {
    cursor: pointer;
}
</style>

<?= $this->endSection() ?>
