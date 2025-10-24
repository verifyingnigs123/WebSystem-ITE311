<?= $this->extend('template/header') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">
                        <i class="fas fa-flask me-2"></i>Notification Test Center
                    </h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Send Test Notifications</h5>
                            <form id="testNotificationForm">
                                <div class="mb-3">
                                    <label for="testMessage" class="form-label">Message:</label>
                                    <input type="text" class="form-control" id="testMessage" placeholder="Enter notification message" required>
                                </div>
                                <div class="mb-3">
                                    <label for="testType" class="form-label">Type:</label>
                                    <select class="form-select" id="testType" required>
                                        <option value="info">Info</option>
                                        <option value="success">Success</option>
                                        <option value="warning">Warning</option>
                                        <option value="error">Error</option>
                                        <option value="course">Course</option>
                                        <option value="announcement">Announcement</option>
                                        <option value="material">Material</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="testRecipient" class="form-label">Recipient:</label>
                                    <select class="form-select" id="testRecipient" required>
                                        <option value="current">Current User</option>
                                        <option value="all">All Users</option>
                                        <option value="admin">Admins Only</option>
                                        <option value="teacher">Teachers Only</option>
                                        <option value="student">Students Only</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-paper-plane me-1"></i>Send Test Notification
                                </button>
                            </form>
                        </div>
                        <div class="col-md-6">
                            <h5>Quick Test Buttons</h5>
                            <div class="d-grid gap-2">
                                <button class="btn btn-outline-info" id="testInfoBtn">
                                    <i class="fas fa-info-circle me-1"></i>Test Info Notification
                                </button>
                                <button class="btn btn-outline-success" id="testSuccessBtn">
                                    <i class="fas fa-check-circle me-1"></i>Test Success Notification
                                </button>
                                <button class="btn btn-outline-warning" id="testWarningBtn">
                                    <i class="fas fa-exclamation-triangle me-1"></i>Test Warning Notification
                                </button>
                                <button class="btn btn-outline-danger" id="testErrorBtn">
                                    <i class="fas fa-exclamation-circle me-1"></i>Test Error Notification
                                </button>
                                <button class="btn btn-outline-primary" id="testCourseBtn">
                                    <i class="fas fa-book me-1"></i>Test Course Notification
                                </button>
                                <button class="btn btn-outline-secondary" id="testAnnouncementBtn">
                                    <i class="fas fa-bullhorn me-1"></i>Test Announcement
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <hr>
                    
                    <div class="row">
                        <div class="col-12">
                            <h5>Connection Status</h5>
                            <div class="alert alert-info">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span>
                                        <i class="fas fa-wifi me-2"></i>
                                        Real-time Connection Status: 
                                        <span id="connectionStatus" class="badge bg-success">Connected</span>
                                    </span>
                                    <button class="btn btn-sm btn-outline-primary" id="reconnectBtn">
                                        <i class="fas fa-sync-alt me-1"></i>Reconnect
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-12">
                            <h5>Recent Notifications</h5>
                            <div id="recentNotifications" class="list-group">
                                <div class="text-center py-3">
                                    <div class="spinner-border text-primary" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                    <p class="mt-2">Loading recent notifications...</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    let eventSource = null;
    let isConnected = false;

    // Initialize
    loadRecentNotifications();
    startRealTimeConnection();

    // Load recent notifications
    function loadRecentNotifications() {
        $.get('<?= base_url('/notifications') ?>')
            .done(function(data) {
                if (data.success) {
                    displayRecentNotifications(data.notifications);
                }
            })
            .fail(function() {
                $('#recentNotifications').html('<div class="alert alert-danger">Failed to load notifications</div>');
            });
    }

    // Display recent notifications
    function displayRecentNotifications(notifications) {
        const container = $('#recentNotifications');
        
        if (notifications.length === 0) {
            container.html('<div class="text-center py-3 text-muted">No recent notifications</div>');
            return;
        }

        let html = '';
        notifications.forEach(function(notification) {
            const typeIcon = getNotificationTypeIcon(notification.type);
            const statusClass = notification.is_read == 0 ? 'list-group-item-primary' : 'list-group-item-light';
            
            html += `
                <div class="list-group-item ${statusClass}">
                    <div class="d-flex justify-content-between align-items-start">
                        <div class="flex-grow-1">
                            <div class="d-flex align-items-center">
                                <i class="${typeIcon} me-2"></i>
                                <h6 class="mb-1">${notification.message}</h6>
                            </div>
                            <small class="text-muted">
                                ${formatNotificationTime(notification.created_at)}
                            </small>
                        </div>
                        <span class="badge bg-${notification.is_read == 0 ? 'primary' : 'secondary'}">
                            ${notification.is_read == 0 ? 'Unread' : 'Read'}
                        </span>
                    </div>
                </div>
            `;
        });

        container.html(html);
    }

    // Start real-time connection
    function startRealTimeConnection() {
        if (eventSource) {
            eventSource.close();
        }

        eventSource = new EventSource('<?= base_url('/notifications/stream') ?>');
        
        eventSource.onopen = function() {
            isConnected = true;
            updateConnectionStatus(true);
        };

        eventSource.addEventListener('notification', function(e) {
            const notification = JSON.parse(e.data);
            console.log('New notification received:', notification);
            addNotificationToList(notification);
        });

        eventSource.onerror = function(e) {
            isConnected = false;
            updateConnectionStatus(false);
        };
    }

    // Add notification to recent list
    function addNotificationToList(notification) {
        const container = $('#recentNotifications');
        const typeIcon = getNotificationTypeIcon(notification.type);
        
        const html = `
            <div class="list-group-item list-group-item-primary">
                <div class="d-flex justify-content-between align-items-start">
                    <div class="flex-grow-1">
                        <div class="d-flex align-items-center">
                            <i class="${typeIcon} me-2"></i>
                            <h6 class="mb-1">${notification.message}</h6>
                        </div>
                        <small class="text-muted">
                            ${formatNotificationTime(notification.created_at)}
                        </small>
                    </div>
                    <span class="badge bg-primary">New</span>
                </div>
            </div>
        `;
        
        // Add to top of list
        container.prepend(html);
        
        // Keep only last 10 notifications
        container.find('.list-group-item').slice(10).remove();
    }

    // Update connection status
    function updateConnectionStatus(connected) {
        const status = $('#connectionStatus');
        if (connected) {
            status.removeClass('bg-danger').addClass('bg-success').text('Connected');
        } else {
            status.removeClass('bg-success').addClass('bg-danger').text('Disconnected');
        }
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
        
        if (diff < 60000) {
            return 'Just now';
        } else if (diff < 3600000) {
            return Math.floor(diff / 60000) + ' minutes ago';
        } else if (diff < 86400000) {
            return Math.floor(diff / 3600000) + ' hours ago';
        } else {
            return date.toLocaleDateString();
        }
    }

    // Event handlers
    $('#testNotificationForm').on('submit', function(e) {
        e.preventDefault();
        
        const message = $('#testMessage').val();
        const type = $('#testType').val();
        const recipient = $('#testRecipient').val();
        
        sendTestNotification(message, type, recipient);
    });

    $('#testInfoBtn').click(function() {
        sendTestNotification('This is a test info notification', 'info', 'current');
    });

    $('#testSuccessBtn').click(function() {
        sendTestNotification('This is a test success notification', 'success', 'current');
    });

    $('#testWarningBtn').click(function() {
        sendTestNotification('This is a test warning notification', 'warning', 'current');
    });

    $('#testErrorBtn').click(function() {
        sendTestNotification('This is a test error notification', 'error', 'current');
    });

    $('#testCourseBtn').click(function() {
        sendTestNotification('This is a test course notification', 'course', 'current');
    });

    $('#testAnnouncementBtn').click(function() {
        sendTestNotification('This is a test announcement', 'announcement', 'current');
    });

    $('#reconnectBtn').click(function() {
        startRealTimeConnection();
    });

    // Send test notification
    function sendTestNotification(message, type, recipient) {
        $.post('<?= base_url('/notifications/test') ?>', {
            message: message,
            type: type,
            recipient: recipient
        })
        .done(function(data) {
            if (data.success) {
                alert('Test notification sent successfully!');
            } else {
                alert('Failed to send test notification: ' + data.message);
            }
        })
        .fail(function() {
            alert('Error sending test notification');
        });
    }

    // Clean up on page unload
    $(window).on('beforeunload', function() {
        if (eventSource) {
            eventSource.close();
        }
    });
});
</script>

<?= $this->endSection() ?>
