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

      .notification-bell-wrapper {
    position: relative;
  }

  .notification-bell-link {
    position: relative;
    background: rgba(255, 255, 255, 0.15);
    border: 2px solid rgba(255, 255, 255, 0.3);
    border-radius: 50%;
    width: 42px;
    height: 42px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s ease;
    color: white !important;
  }

  .notification-bell-link:hover {
    background: rgba(255, 255, 255, 0.25);
    transform: scale(1.1);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
  }

  .notification-bell-link i {
    font-size: 1.2rem;
    animation: bellRing 3s ease-in-out infinite;
  }

  @keyframes bellRing {
    0%, 100% { transform: rotate(0deg); }
    5%, 15% { transform: rotate(-15deg); }
    10%, 20% { transform: rotate(15deg); }
    25% { transform: rotate(0deg); }
  }

  .notification-badge {
    position: absolute;
    top: -5px;
    right: -5px;
    background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
    color: white;
    font-size: 0.65rem;
    font-weight: 700;
    min-width: 20px;
    height: 20px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 2px solid #667eea;
    animation: pulseBadge 2s ease-in-out infinite;
    box-shadow: 0 2px 8px rgba(239, 68, 68, 0.5);
  }

  @keyframes pulseBadge {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.15); }
  }
/* Notification Bell Styles */
  .notification-bell-wrapper {
    position: relative;
  }

  .notification-bell-link {
    position: relative;
    background: rgba(255, 255, 255, 0.15);
    border: 2px solid rgba(255, 255, 255, 0.3);
    border-radius: 50%;
    width: 42px;
    height: 42px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s ease;
    color: white !important;
  }

  .notification-bell-link:hover {
    background: rgba(255, 255, 255, 0.25);
    transform: scale(1.1);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
  }

  .notification-bell-link i {
    font-size: 1.2rem;
    animation: bellRing 3s ease-in-out infinite;
  }

  @keyframes bellRing {
    0%, 100% { transform: rotate(0deg); }
    5%, 15% { transform: rotate(-15deg); }
    10%, 20% { transform: rotate(15deg); }
    25% { transform: rotate(0deg); }
  }

  .notification-badge {
    position: absolute;
    top: -5px;
    right: -5px;
    background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
    color: white;
    font-size: 0.65rem;
    font-weight: 700;
    min-width: 20px;
    height: 20px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 2px solid #667eea;
    animation: pulseBadge 2s ease-in-out infinite;
    box-shadow: 0 2px 8px rgba(239, 68, 68, 0.5);
  }

  @keyframes pulseBadge {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.15); }
  }

  /* Notification Dropdown */
  .notification-dropdown-menu {
    width: 400px;
    max-height: 500px;
    border: none;
    border-radius: 16px;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.25);
    padding: 0;
    margin-top: 0.5rem;
    overflow: hidden;
  }

  .notification-dropdown-header {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    padding: 1.25rem 1.5rem;
    color: white;
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  .notification-dropdown-header h6 {
    margin: 0;
    font-weight: 700;
    font-size: 1.1rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
  }

  .notification-actions {
    display: flex;
    gap: 0.5rem;
  }

  .notification-action-btn {
    background: rgba(255, 255, 255, 0.2);
    border: 1px solid rgba(255, 255, 255, 0.3);
    color: white;
    font-size: 0.75rem;
    padding: 0.375rem 0.75rem;
    border-radius: 20px;
    cursor: pointer;
    transition: all 0.3s ease;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 0.25rem;
  }

  .notification-action-btn:hover {
    background: rgba(255, 255, 255, 0.3);
    transform: scale(1.05);
  }

  .notification-body {
    max-height: 400px;
    overflow-y: auto;
  }

  .notification-body::-webkit-scrollbar {
    width: 6px;
  }

  .notification-body::-webkit-scrollbar-thumb {
    background: #cbd5e1;
    border-radius: 3px;
  }

  .notification-body::-webkit-scrollbar-track {
    background: #f1f5f9;
  }

  .notification-item {
    padding: 1rem 1.5rem;
    border-bottom: 1px solid #e5e7eb;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    gap: 1rem;
    position: relative;
  }

  .notification-item:hover {
    background: #f9fafb;
  }

  .notification-item.unread {
    background: linear-gradient(90deg, #eff6ff 0%, #f0f9ff 100%);
  }

  .notification-item.unread::before {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    bottom: 0;
    width: 4px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  }

  .notification-icon {
    width: 40px;
    height: 40px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    font-size: 1.1rem;
  }

  .notification-icon.info {
    background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
    color: white;
  }

  .notification-icon.success {
    background: linear-gradient(135deg, #10b981 0%, #059669 100%);
    color: white;
  }

  .notification-icon.warning {
    background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
    color: white;
  }

  .notification-icon.error {
    background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
    color: white;
  }

  .notification-content {
    flex: 1;
    min-width: 0;
  }

  .notification-content-message {
    margin: 0 0 0.5rem;
    font-size: 0.875rem;
    color: #1e293b;
    font-weight: 500;
    line-height: 1.4;
  }

  .notification-time {
    font-size: 0.75rem;
    color: #94a3b8;
    display: flex;
    align-items: center;
    gap: 0.25rem;
  }

  .notification-mark-read {
    background: transparent;
    border: 1px solid #e2e8f0;
    color: #667eea;
    font-size: 0.75rem;
    padding: 0.25rem 0.75rem;
    border-radius: 20px;
    cursor: pointer;
    transition: all 0.3s ease;
    font-weight: 600;
    white-space: nowrap;
  }

  .notification-mark-read:hover {
    background: #667eea;
    color: white;
    border-color: #667eea;
    transform: scale(1.05);
  }

  .notification-footer {
    padding: 1rem 1.5rem;
    border-top: 1px solid #e5e7eb;
    text-align: center;
    background: #f9fafb;
  }

  .notification-view-all {
    color: #667eea;
    font-weight: 600;
    font-size: 0.875rem;
    text-decoration: none;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
  }

  .notification-view-all:hover {
    color: #764ba2;
    gap: 0.75rem;
  }

  .notification-empty {
    padding: 3rem 2rem;
    text-align: center;
    color: #94a3b8;
  }

  .notification-empty i {
    font-size: 3rem;
    margin-bottom: 1rem;
    opacity: 0.3;
  }

  .notification-empty p {
    margin: 0;
    font-size: 0.875rem;
  }

  @media (max-width: 576px) {
    .notification-dropdown-menu {
      width: calc(100vw - 2rem);
      max-width: 400px;
    }
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
                       <li class="nav-item dropdown notification-bell-wrapper">
  <a class="nav-link notification-bell-link" href="#" id="notificationDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    <i class="fas fa-bell"></i>
    <span id="notificationBadge" class="notification-badge" style="display:none;">0</span>
  </a>
  
  <ul class="dropdown-menu dropdown-menu-end notification-dropdown-menu" aria-labelledby="notificationDropdown" id="notificationList">
    <!-- Header -->
    <li class="notification-dropdown-header">
      <h6>
        <i class="fas fa-bell"></i>
        Notifications
      </h6>
      <div class="notification-actions">
        <button class="notification-action-btn" id="refreshNotifications" title="Refresh">
          <i class="fas fa-sync-alt"></i>
        </button>
      </div>
    </li>
    
    <!-- Body -->
    <div class="notification-body" id="notificationBody">
      <div class="notification-empty">
        <i class="fas fa-bell-slash"></i>
        <p><strong>No notifications</strong></p>
        <p class="small">You're all caught up!</p>
      </div>
    </div>
    
    <!-- Footer -->
    <li class="notification-footer">
      <a href="<?= base_url('/notifications/history') ?>" class="notification-view-all">
        View all notifications
        <i class="fas fa-arrow-right"></i>
      </a>
    </li>
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
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
// Notification System
$(document).ready(function() {
  // Load notifications on page load
  loadNotifications();
  
  // Refresh notifications every 60 seconds
  setInterval(loadNotifications, 60000);
  
  // Refresh button
  $('#refreshNotifications').on('click', function(e) {
    e.preventDefault();
    e.stopPropagation();
    
    const btn = $(this);
    const icon = btn.find('i');
    
    // Add spinning animation
    icon.addClass('fa-spin');
    
    loadNotifications();
    
    // Remove spinning after 1 second
    setTimeout(function() {
      icon.removeClass('fa-spin');
    }, 1000);
  });
  
  // Handle mark as read for individual notifications
  $(document).on('click', '.notification-mark-read', function(e) {
    e.preventDefault();
    e.stopPropagation();
    
    const notificationId = $(this).data('id');
    markAsRead(notificationId);
  });
  
  // Handle notification item click
  $(document).on('click', '.notification-item', function(e) {
    if (!$(e.target).hasClass('notification-mark-read')) {
      const notificationId = $(this).data('id');
      markAsRead(notificationId);
    }
  });
});

// Load notifications function
function loadNotifications() {
  $.ajax({
    url: "<?= base_url('/notifications') ?>",
    type: 'GET',
    dataType: 'json',
    success: function(res) {
      if (res.success) {
        updateNotificationBadge(res.unread_count);
        updateNotificationList(res.notifications);
      }
    },
    error: function() {
      console.error('Failed to load notifications');
    }
  });
}

// Update notification badge
function updateNotificationBadge(count) {
  const badge = $('#notificationBadge');
  if (count > 0) {
    badge.text(count > 9 ? '9+' : count).show();
  } else {
    badge.hide();
  }
}

// Update notification list
function updateNotificationList(notifications) {
  const body = $('#notificationBody');
  body.empty();
  
  if (notifications.length === 0) {
    body.html(`
      <div class="notification-empty">
        <i class="fas fa-bell-slash"></i>
        <p><strong>No notifications</strong></p>
        <p class="small">You're all caught up!</p>
      </div>
    `);
  } else {
    notifications.forEach(function(notification) {
      const isUnread = notification.is_read == 0;
      const typeIcon = getNotificationIcon(notification.type);
      const typeClass = getNotificationClass(notification.type);
      const timeAgo = formatTimeAgo(notification.created_at);
      
      const notificationHtml = `
        <div class="notification-item ${isUnread ? 'unread' : ''}" data-id="${notification.id}">
          <div class="notification-icon ${typeClass}">
            <i class="${typeIcon}"></i>
          </div>
          <div class="notification-content">
            <p class="notification-content-message">${notification.message}</p>
            <div class="notification-time">
              <i class="far fa-clock"></i>
              <span>${timeAgo}</span>
            </div>
          </div>
          ${isUnread ? `<button class="notification-mark-read" data-id="${notification.id}">
            <i class="fas fa-check"></i> Read
          </button>` : ''}
        </div>
      `;
      
      body.append(notificationHtml);
    });
  }
}

// Get notification icon based on type
function getNotificationIcon(type) {
  const icons = {
    'info': 'fas fa-info-circle',
    'success': 'fas fa-check-circle',
    'warning': 'fas fa-exclamation-triangle',
    'error': 'fas fa-times-circle',
    'course': 'fas fa-book',
    'announcement': 'fas fa-bullhorn',
    'material': 'fas fa-file-alt',
    'assignment': 'fas fa-tasks'
  };
  return icons[type] || icons['info'];
}

// Get notification class based on type
function getNotificationClass(type) {
  const classes = {
    'info': 'info',
    'success': 'success',
    'warning': 'warning',
    'error': 'error',
    'course': 'info',
    'announcement': 'info',
    'material': 'info',
    'assignment': 'warning'
  };
  return classes[type] || 'info';
}

// Format time ago
function formatTimeAgo(timestamp) {
  const date = new Date(timestamp);
  const now = new Date();
  const diff = now - date;
  
  const seconds = Math.floor(diff / 1000);
  const minutes = Math.floor(seconds / 60);
  const hours = Math.floor(minutes / 60);
  const days = Math.floor(hours / 24);
  
  if (seconds < 60) return 'Just now';
  if (minutes < 60) return minutes + ' minute' + (minutes > 1 ? 's' : '') + ' ago';
  if (hours < 24) return hours + ' hour' + (hours > 1 ? 's' : '') + ' ago';
  if (days < 7) return days + ' day' + (days > 1 ? 's' : '') + ' ago';
  
  return date.toLocaleDateString();
}

// Mark single notification as read
function markAsRead(notificationId) {
  $.ajax({
    url: "<?= base_url('/notifications/mark_read/') ?>" + notificationId,
    type: 'POST',
    dataType: 'json',
    success: function(res) {
      if (res.success) {
        // Remove the notification item with animation
        $(`[data-id="${notificationId}"]`).fadeOut(300, function() {
          $(this).remove();
          
          // Check if there are any notifications left
          if ($('.notification-item').length === 0) {
            $('#notificationBody').html(`
              <div class="notification-empty">
                <i class="fas fa-bell-slash"></i>
                <p><strong>No notifications</strong></p>
                <p class="small">You're all caught up!</p>
              </div>
            `);
          }
        });
        
        // Update badge count
        const currentCount = parseInt($('#notificationBadge').text()) || 0;
        updateNotificationBadge(currentCount - 1);
        
        // Show success toast
        showToast('Notification marked as read', 'success');
      }
    },
    error: function() {
      showToast('Failed to mark notification as read', 'error');
    }
  });
}

// Show toast notification
function showToast(message, type) {
  const iconClass = type === 'success' ? 'check-circle' : 'exclamation-circle';
  const bgClass = type === 'success' ? 'success' : 'danger';
  
  const toastHtml = `
    <div class="toast align-items-center text-white bg-${bgClass} border-0" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="d-flex">
        <div class="toast-body">
          <i class="fas fa-${iconClass} me-2"></i>${message}
        </div>
        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
    </div>
  `;
  
  // Create toast container if it doesn't exist
  if (!$('#notificationToastContainer').length) {
    $('body').append('<div id="notificationToastContainer" class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 9999;"></div>');
  }
  
  const $toast = $(toastHtml);
  $('#notificationToastContainer').append($toast);
  
  const toast = new bootstrap.Toast($toast[0]);
  toast.show();
  
  // Remove toast after hidden
  $toast.on('hidden.bs.toast', function() {
    $(this).remove();
  });
}
</script>
    <?php endif; ?>
