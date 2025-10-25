<style>
  .navbar-dashboard {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    backdrop-filter: blur(10px);
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
    padding: 0.75rem 0;
    transition: all 0.3s ease;
    position: sticky;
    top: 0;
    z-index: 1000;
  }
  
  .navbar-dashboard::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    height: 2px;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.5), transparent);
  }
  
  .navbar-dashboard .navbar-brand {
    font-size: 1.5rem;
    font-weight: 700;
    letter-spacing: -0.5px;
    color: #fff !important;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 0.5rem;
  }
  
  .navbar-dashboard .navbar-brand i {
    font-size: 1.75rem;
    animation: float 3s ease-in-out infinite;
  }
  
  @keyframes float {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-5px); }
  }
  
  .navbar-dashboard .navbar-brand:hover {
    transform: scale(1.05);
  }
  
  .navbar-dashboard .nav-link {
    color: rgba(255, 255, 255, 0.9) !important;
    font-weight: 500;
    margin: 0 0.25rem;
    padding: 0.5rem 1rem !important;
    border-radius: 8px;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    position: relative;
    overflow: hidden;
  }
  
  .navbar-dashboard .nav-link::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: rgba(255, 255, 255, 0.15);
    transition: left 0.3s ease;
  }
  
  .navbar-dashboard .nav-link:hover::before {
    left: 0;
  }
  
  .navbar-dashboard .nav-link:hover {
    color: #fff !important;
    transform: translateY(-2px);
  }
  
  .navbar-dashboard .nav-link.active {
    background: rgba(255, 255, 255, 0.2);
    color: #fff !important;
  }
  
  .user-info-pill {
    background: rgba(255, 255, 255, 0.15);
    backdrop-filter: blur(10px);
    border-radius: 50px;
    padding: 0.5rem 1.25rem;
    margin-right: 1rem;
    border: 1px solid rgba(255, 255, 255, 0.2);
    display: flex;
    align-items: center;
    gap: 0.75rem;
    transition: all 0.3s ease;
  }
  
  .user-info-pill:hover {
    background: rgba(255, 255, 255, 0.25);
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
  }
  
  .user-avatar {
    width: 32px;
    height: 32px;
    background: linear-gradient(135deg, #fff 0%, #e2e8f0 100%);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    color: #667eea;
    font-size: 0.875rem;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
  }
  
  .user-details {
    display: flex;
    flex-direction: column;
    line-height: 1.2;
  }
  
  .user-email {
    color: #fff;
    font-weight: 600;
    font-size: 0.875rem;
  }
  
  .user-role {
    color: rgba(255, 255, 255, 0.8);
    font-size: 0.75rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
  }
  
  .role-badge {
    background: rgba(255, 255, 255, 0.2);
    padding: 0.25rem 0.75rem;
    border-radius: 50px;
    font-size: 0.75rem;
    font-weight: 600;
    color: #fff;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    border: 1px solid rgba(255, 255, 255, 0.3);
  }
  
  .role-badge.admin {
    background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
    box-shadow: 0 2px 8px rgba(239, 68, 68, 0.3);
  }
  
  .role-badge.teacher {
    background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
    box-shadow: 0 2px 8px rgba(59, 130, 246, 0.3);
  }
  
  .role-badge.student {
    background: linear-gradient(135deg, #10b981 0%, #059669 100%);
    box-shadow: 0 2px 8px rgba(16, 185, 129, 0.3);
  }
  
  .btn-logout {
    background: rgba(239, 68, 68, 0.15);
    color: #fff !important;
    font-weight: 600;
    padding: 0.5rem 1.25rem !important;
    border-radius: 50px;
    border: 2px solid rgba(239, 68, 68, 0.4);
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 0.5rem;
  }
  
  .btn-logout:hover {
    background: #ef4444;
    border-color: #ef4444;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(239, 68, 68, 0.4);
  }
  
  .navbar-toggler {
    border: 2px solid rgba(255, 255, 255, 0.3);
    border-radius: 8px;
    padding: 0.5rem;
    transition: all 0.3s ease;
  }
  
  .navbar-toggler:hover {
    background: rgba(255, 255, 255, 0.1);
    border-color: rgba(255, 255, 255, 0.5);
  }
  
  .navbar-toggler-icon {
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%28255, 255, 255, 1%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
  }
  
  /* Dropdown styling if needed */
  .dropdown-menu-custom {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(10px);
    border: none;
    border-radius: 12px;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
    padding: 0.5rem;
    margin-top: 0.5rem;
  }
  
  .dropdown-menu-custom .dropdown-item {
    border-radius: 8px;
    padding: 0.75rem 1rem;
    transition: all 0.3s ease;
    color: #1e293b;
  }
  
  .dropdown-menu-custom .dropdown-item:hover {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: #fff;
    transform: translateX(5px);
  }
  
  /* Responsive adjustments */
  @media (max-width: 991px) {
    .navbar-dashboard .nav-link {
      margin: 0.25rem 0;
    }
    
    .user-info-pill {
      margin: 0.5rem 0;
      width: 100%;
    }
    
    .btn-logout {
      margin-top: 0.5rem;
      width: 100%;
      justify-content: center;
    }
    
    .navbar-collapse {
      margin-top: 1rem;
    }
  }
  
  /* Active page indicator */
  .nav-link.active-page {
    background: rgba(255, 255, 255, 0.25);
    box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.1);
  }
  
  .nav-link.active-page::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 40px;
    height: 3px;
    background: #fff;
    border-radius: 2px 2px 0 0;
  }
</style>

<nav class="navbar navbar-expand-lg navbar-dashboard">
    <div class="container">
        <!-- Brand -->
        <a class="navbar-brand" href="<?= base_url('/dashboard') ?>">
            <i class="fas fa-rocket"></i>
            ITE311-VISAYAS
        </a>

        <!-- Toggler for mobile -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar links -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-lg-center">
                
                <!-- User info pill -->
                <?php if (session()->get('isLoggedIn')): ?>
                    <li class="nav-item">
                        <div class="user-info-pill">
                            <div class="user-avatar">
                                <?= strtoupper(substr(session()->get('userEmail'), 0, 1)) ?>
                            </div>
                            <div class="user-details">
                                <span class="user-email"><?= session()->get('userEmail') ?></span>
                                <span class="user-role"><?= session()->get('userRole') ?></span>
                            </div>
                            <span class="role-badge <?= session()->get('userRole') ?>">
                                <?= ucfirst(session()->get('userRole')) ?>
                            </span>
                        </div>
                    </li>
                <?php endif; ?>

                <!-- Dashboard -->
                <li class="nav-item">
                    <a class="nav-link <?= uri_string() === 'dashboard' ? 'active-page' : '' ?>" 
                       href="<?= base_url('/dashboard') ?>">
                        <i class="fas fa-th-large"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <!-- Role-based links: ADMIN -->
                <?php if (session()->get('userRole') === 'admin'): ?>
                    <li class="nav-item">
                        <a class="nav-link <?= uri_string() === 'manage-users' ? 'active-page' : '' ?>" 
                           href="<?= base_url('/manage-users') ?>">
                            <i class="fas fa-users-cog"></i>
                            <span>Manage Users</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= uri_string() === 'reports' ? 'active-page' : '' ?>" 
                           href="<?= base_url('/reports') ?>">
                            <i class="fas fa-chart-line"></i>
                            <span>Reports</span>
                        </a>
                    </li>

                <!-- Role-based links: TEACHER -->
                <?php elseif (session()->get('userRole') === 'teacher'): ?>
                    <li class="nav-item">
                        <a class="nav-link <?= strpos(uri_string(), 'teacher/classes') !== false ? 'active-page' : '' ?>" 
                           href="<?= base_url('/teacher/classes') ?>">
                            <i class="fas fa-chalkboard-teacher"></i>
                            <span>Classes</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= strpos(uri_string(), 'teacher/materials') !== false ? 'active-page' : '' ?>" 
                           href="<?= base_url('/teacher/materials') ?>">
                            <i class="fas fa-book"></i>
                            <span>Materials</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= uri_string() === 'announcements' ? 'active-page' : '' ?>" 
                           href="<?= base_url('/announcements') ?>">
                            <i class="fas fa-bullhorn"></i>
                        </a>
                    </li>

                <!-- Role-based links: STUDENT -->
                <?php elseif (session()->get('userRole') === 'student'): ?>
                    <li class="nav-item">
                        <a class="nav-link <?= strpos(uri_string(), 'student/courses') !== false ? 'active-page' : '' ?>" 
                           href="<?= base_url('/student/courses') ?>">
                            <i class="fas fa-graduation-cap"></i>
                            <span>Courses</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= strpos(uri_string(), 'student/grades') !== false ? 'active-page' : '' ?>" 
                           href="<?= base_url('/student/grades') ?>">
                            <i class="fas fa-star"></i>
                            <span>Grades</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= uri_string() === 'announcements' ? 'active-page' : '' ?>" 
                           href="<?= base_url('/announcements') ?>">
                            <i class="fas fa-bullhorn"></i>
                        </a>
                    </li>
                <?php endif; ?>

                <!-- Notifications -->
                <?php if (session()->get('isLoggedIn')): ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle position-relative" href="#" id="notificationDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-bell"></i>
                            <span class="badge bg-danger position-absolute top-0 start-100 translate-middle" id="notificationBadge" style="display: none;">0</span>
                            <span id="connectionIndicator" class="position-absolute top-0 end-0 translate-middle text-success" style="font-size: 8px;">
                                <i class="fas fa-circle"></i>
                            </span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end notification-dropdown" aria-labelledby="notificationDropdown" id="notificationList" style="min-width: 350px; max-height: 400px; overflow-y: auto;">
                            <li class="dropdown-header d-flex justify-content-between align-items-center">
                                <span>Notifications</span>
                                <div>
                                    <button class="btn btn-sm btn-outline-primary me-2" id="markAllReadBtn" title="Mark all as read">
                                        <i class="fas fa-check-double"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-secondary" id="refreshNotifications" title="Refresh">
                                        <i class="fas fa-sync-alt"></i>
                                    </button>
                                </div>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <!-- Notifications will be loaded here via AJAX -->
                            <li><a class="dropdown-item text-center" href="<?= base_url('/notifications/history') ?>" id="viewAllNotifications">
                                <i class="fas fa-list me-2"></i>View All Notifications
                            </a></li>
                        </ul>
                    </li>
                <?php endif; ?>

                <!-- Logout -->
                <?php if (session()->get('isLoggedIn')): ?>
                    <li class="nav-item ms-lg-2">
                        <a class="nav-link btn-logout" href="<?= base_url('/logout') ?>">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Logout</span>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

<!-- Notification JavaScript -->
<?php if (session()->get('isLoggedIn')): ?>
<script>
$(document).ready(function() {
    let eventSource = null;
    let isConnected = false;
    let reconnectAttempts = 0;
    const maxReconnectAttempts = 5;

    // Initialize notification system
    initNotificationSystem();

    function initNotificationSystem() {
        // Load initial notifications
        loadNotifications();
        
        // Start real-time connection
        startRealTimeConnection();
    }

    // Function to load notifications
    function loadNotifications() {
        $.get('<?= base_url('/notifications') ?>')
            .done(function(data) {
                if (data.success) {
                    updateNotificationBadge(data.unread_count);
                    updateNotificationList(data.notifications);
                }
            })
            .fail(function() {
                console.error('Failed to load notifications');
            });
    }

    // Start real-time connection using Server-Sent Events
    function startRealTimeConnection() {
        if (eventSource) {
            eventSource.close();
        }

        eventSource = new EventSource('<?= base_url('/notifications/stream') ?>');
        
        eventSource.onopen = function() {
            console.log('Connected to notification stream');
            isConnected = true;
            reconnectAttempts = 0;
            updateConnectionStatus(true);
        };

        eventSource.addEventListener('connected', function(e) {
            console.log('Notification stream connected:', e.data);
        });

        eventSource.addEventListener('notification', function(e) {
            const notification = JSON.parse(e.data);
            console.log('New notification received:', notification);
            addNewNotification(notification);
        });

        eventSource.addEventListener('heartbeat', function(e) {
            // Heartbeat received, connection is alive
            console.log('Heartbeat received:', e.data);
        });

        eventSource.onerror = function(e) {
            console.error('EventSource failed:', e);
            isConnected = false;
            updateConnectionStatus(false);
            
            // Attempt to reconnect
            if (reconnectAttempts < maxReconnectAttempts) {
                reconnectAttempts++;
                console.log(`Attempting to reconnect... (${reconnectAttempts}/${maxReconnectAttempts})`);
                setTimeout(startRealTimeConnection, 5000 * reconnectAttempts);
            } else {
                console.error('Max reconnection attempts reached. Falling back to polling.');
                fallbackToPolling();
            }
        };
    }

    // Fallback to polling if SSE fails
    function fallbackToPolling() {
        console.log('Falling back to polling mode');
        setInterval(loadNotifications, 30000); // Poll every 30 seconds
    }

    // Update connection status indicator
    function updateConnectionStatus(connected) {
        const indicator = $('#connectionIndicator');
        if (connected) {
            indicator.removeClass('text-danger').addClass('text-success').html('<i class="fas fa-circle"></i>');
        } else {
            indicator.removeClass('text-success').addClass('text-danger').html('<i class="fas fa-circle"></i>');
        }
    }

    // Add new notification to the list
    function addNewNotification(notification) {
        const list = $('#notificationList');
        
        // Remove "No notifications" message if it exists
        list.find('.no-notifications').remove();
        
        // Create notification item
        const notificationClass = notification.is_read == 0 ? 'alert-info' : 'alert-light';
        const typeIcon = getNotificationTypeIcon(notification.type);
        const item = `
            <li class="notification-item">
                <a class="dropdown-item ${notificationClass}" href="#" data-id="${notification.id}">
                    <div class="d-flex justify-content-between align-items-start">
                        <div class="flex-grow-1">
                            <div class="d-flex align-items-center">
                                <i class="${typeIcon} me-2"></i>
                                <small>${notification.message}</small>
                            </div>
                            <br>
                            <small class="text-muted">${formatNotificationTime(notification.created_at)}</small>
                        </div>
                        ${notification.is_read == 0 ? '<button class="btn btn-sm btn-outline-primary ms-2 mark-read-btn" data-id="' + notification.id + '">Mark Read</button>' : ''}
                    </div>
                </a>
            </li>
        `;
        
        // Add to top of list
        list.find('.dropdown-header').after(item);
        
        // Update badge count
        const currentCount = parseInt($('#notificationBadge').text()) || 0;
        updateNotificationBadge(currentCount + 1);
        
        // Show notification toast
        showNotificationToast(notification);
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
            return date.toLocaleDateString();
        }
    }

    // Show notification toast
    function showNotificationToast(notification) {
        const toastHtml = `
            <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <i class="${getNotificationTypeIcon(notification.type)} me-2"></i>
                    <strong class="me-auto">New Notification</strong>
                    <small class="text-muted">${formatNotificationTime(notification.created_at)}</small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    ${notification.message}
                </div>
            </div>
        `;
        
        // Add toast to container
        if (!$('#notificationToastContainer').length) {
            $('body').append('<div id="notificationToastContainer" class="toast-container position-fixed top-0 end-0 p-3"></div>');
        }
        
        const $toast = $(toastHtml);
        $('#notificationToastContainer').append($toast);
        
        // Show toast
        const toast = new bootstrap.Toast($toast[0]);
        toast.show();
        
        // Remove toast element after it's hidden
        $toast.on('hidden.bs.toast', function() {
            $(this).remove();
        });
    }

    // Function to update notification badge
    function updateNotificationBadge(count) {
        const badge = $('#notificationBadge');
        if (count > 0) {
            badge.text(count).show();
        } else {
            badge.hide();
        }
    }

    // Function to update notification list
    function updateNotificationList(notifications) {
        const list = $('#notificationList');
        // Clear existing notifications (keep header and view all link)
        list.find('.notification-item').remove();

        if (notifications.length === 0) {
            list.find('.dropdown-header').after('<li><a class="dropdown-item text-muted no-notifications">No notifications</a></li>');
        } else {
            notifications.forEach(function(notification) {
                const notificationClass = notification.is_read == 0 ? 'alert-info' : 'alert-light';
                const typeIcon = getNotificationTypeIcon(notification.type);
                const item = `
                    <li class="notification-item">
                        <a class="dropdown-item ${notificationClass}" href="#" data-id="${notification.id}">
                            <div class="d-flex justify-content-between align-items-start">
                                <div class="flex-grow-1">
                                    <div class="d-flex align-items-center">
                                        <i class="${typeIcon} me-2"></i>
                                        <small>${notification.message}</small>
                                    </div>
                                    <br>
                                    <small class="text-muted">${formatNotificationTime(notification.created_at)}</small>
                                </div>
                                ${notification.is_read == 0 ? '<button class="btn btn-sm btn-outline-primary ms-2 mark-read-btn" data-id="' + notification.id + '">Mark Read</button>' : ''}
                            </div>
                        </a>
                    </li>
                `;
                list.find('.dropdown-header').after(item);
            });
        }
    }

    // Handle mark as read
    $(document).on('click', '.mark-read-btn', function(e) {
        e.preventDefault();
        e.stopPropagation();

        const notificationId = $(this).data('id');
        const button = $(this);

        $.post('<?= base_url('/notifications/mark_read/') ?>' + notificationId)
            .done(function(data) {
                if (data.success) {
                    // Remove the notification item
                    button.closest('.notification-item').remove();
                    // Update badge
                    const currentCount = parseInt($('#notificationBadge').text()) || 0;
                    updateNotificationBadge(currentCount - 1);
                } else {
                    alert('Failed to mark notification as read');
                }
            })
            .fail(function() {
                alert('Error marking notification as read');
            });
    });

    // Handle mark all as read
    $(document).on('click', '#markAllReadBtn', function(e) {
        e.preventDefault();
        
        $.post('<?= base_url('/notifications/mark_all_read') ?>')
            .done(function(data) {
                if (data.success) {
                    // Reload notifications
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

    // Handle refresh notifications
    $(document).on('click', '#refreshNotifications', function(e) {
        e.preventDefault();
        
        // Add loading state
        const button = $(this);
        const originalIcon = button.html();
        button.html('<i class="fas fa-spinner fa-spin"></i>');
        
        // Reload notifications
        loadNotifications();
        
        // Reset button after a short delay
        setTimeout(function() {
            button.html(originalIcon);
        }, 1000);
    });

    // Clean up on page unload
    $(window).on('beforeunload', function() {
        if (eventSource) {
            eventSource.close();
        }
    });
});
</script>
<?php endif; ?>
