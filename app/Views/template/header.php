<style>
  /* Modern Sidebar Navigation */
  :root {
    --sidebar-width: 280px;
    --sidebar-collapsed-width: 80px;
    --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    --sidebar-bg: #1e293b;
    --sidebar-text: #cbd5e1;
    --sidebar-hover: #334155;
    --sidebar-active: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  }

  body {
    margin: 0;
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
  }

  /* Sidebar Container */
  .sidebar-wrapper {
    position: fixed;
    left: 0;
    top: 0;
    bottom: 0;
    width: var(--sidebar-width);
    background: var(--sidebar-bg);
    box-shadow: 4px 0 20px rgba(0, 0, 0, 0.1);
    z-index: 1000;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    overflow: hidden;
  }

  .sidebar-wrapper.collapsed {
    width: var(--sidebar-collapsed-width);
  }

  /* Sidebar Header */
  .sidebar-header {
    padding: 1.5rem;
    display: flex;
    align-items: center;
    justify-content: space-between;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    background: var(--primary-gradient);
  }

  .sidebar-brand {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    color: #fff;
    text-decoration: none;
    font-weight: 700;
    font-size: 1.25rem;
    white-space: nowrap;
    transition: opacity 0.3s ease;
  }

  .sidebar-brand i {
    font-size: 1.5rem;
    animation: float 3s ease-in-out infinite;
  }

  @keyframes float {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-5px); }
  }

  .sidebar-wrapper.collapsed .sidebar-brand span {
    opacity: 0;
    width: 0;
  }

  .sidebar-toggle {
    background: rgba(255, 255, 255, 0.2);
    border: none;
    color: #fff;
    width: 36px;
    height: 36px;
    border-radius: 8px;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
  }

  .sidebar-toggle:hover {
    background: rgba(255, 255, 255, 0.3);
    transform: scale(1.1);
  }

  /* User Profile Section */
  .sidebar-user {
    padding: 1.5rem;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
  }

  .user-profile {
    display: flex;
    align-items: center;
    gap: 1rem;
  }

  .user-avatar-sidebar {
    width: 48px;
    height: 48px;
    background: var(--primary-gradient);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    color: #fff;
    font-size: 1.25rem;
    box-shadow: 0 4px 12px rgba(102, 126, 234, 0.4);
    flex-shrink: 0;
  }

  .user-info-sidebar {
    flex: 1;
    min-width: 0;
    opacity: 1;
    transition: opacity 0.3s ease;
  }

  .sidebar-wrapper.collapsed .user-info-sidebar {
    opacity: 0;
    width: 0;
  }

  .user-name-sidebar {
    color: #fff;
    font-weight: 700;
    font-size: 1rem;
    margin-bottom: 0.25rem;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
  }

  .user-email-sidebar {
    color: var(--sidebar-text);
    font-size: 0.75rem;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
  }

  .user-role-badge {
    display: inline-block;
    background: rgba(102, 126, 234, 0.2);
    color: #8b9dff;
    padding: 0.25rem 0.75rem;
    border-radius: 20px;
    font-size: 0.65rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin-top: 0.5rem;
  }

  .user-role-badge.admin {
    background: rgba(239, 68, 68, 0.2);
    color: #fca5a5;
  }

  .user-role-badge.teacher {
    background: rgba(59, 130, 246, 0.2);
    color: #93c5fd;
  }

  .user-role-badge.student {
    background: rgba(16, 185, 129, 0.2);
    color: #6ee7b7;
  }

  /* Navigation Menu */
  .sidebar-nav {
    padding: 1rem 0;
    overflow-y: auto;
    height: calc(100vh - 280px);
  }

  .sidebar-nav::-webkit-scrollbar {
    width: 6px;
  }

  .sidebar-nav::-webkit-scrollbar-thumb {
    background: rgba(255, 255, 255, 0.2);
    border-radius: 3px;
  }

  .nav-section-title {
    color: var(--sidebar-text);
    font-size: 0.7rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 1px;
    padding: 1rem 1.5rem 0.5rem;
    opacity: 1;
    transition: opacity 0.3s ease;
  }

  .sidebar-wrapper.collapsed .nav-section-title {
    opacity: 0;
    height: 0;
    padding: 0;
  }

  .nav-item-sidebar {
    list-style: none;
    margin: 0.25rem 0.75rem;
  }

  .nav-link-sidebar {
    display: flex;
    align-items: center;
    gap: 1rem;
    padding: 0.875rem 1rem;
    color: var(--sidebar-text);
    text-decoration: none;
    border-radius: 12px;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
  }

  .nav-link-sidebar::before {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    bottom: 0;
    width: 4px;
    background: var(--primary-gradient);
    transform: scaleY(0);
    transition: transform 0.3s ease;
  }

  .nav-link-sidebar:hover {
    background: var(--sidebar-hover);
    color: #fff;
    transform: translateX(5px);
  }

  .nav-link-sidebar.active {
    background: var(--primary-gradient);
    color: #fff;
    box-shadow: 0 4px 12px rgba(102, 126, 234, 0.4);
  }

  .nav-link-sidebar.active::before {
    transform: scaleY(1);
  }

  .nav-icon {
    width: 24px;
    height: 24px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.25rem;
    flex-shrink: 0;
  }

  .nav-text {
    font-weight: 600;
    font-size: 0.9rem;
    white-space: nowrap;
    opacity: 1;
    transition: opacity 0.3s ease;
  }

  .sidebar-wrapper.collapsed .nav-text {
    opacity: 0;
    width: 0;
  }

  /* Notification Badge in Sidebar */
  .nav-badge {
    margin-left: auto;
    background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
    color: #fff;
    font-size: 0.65rem;
    font-weight: 700;
    padding: 0.25rem 0.5rem;
    border-radius: 10px;
    min-width: 20px;
    text-align: center;
    animation: pulseBadge 2s ease-in-out infinite;
  }

  @keyframes pulseBadge {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.1); }
  }

  .sidebar-wrapper.collapsed .nav-badge {
    position: absolute;
    top: 8px;
    right: 8px;
    min-width: 8px;
    height: 8px;
    padding: 0;
    border-radius: 50%;
  }

  /* Sidebar Footer */
  .sidebar-footer {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    padding: 1rem;
    border-top: 1px solid rgba(255, 255, 255, 0.1);
    background: rgba(0, 0, 0, 0.2);
  }

  .logout-btn-sidebar {
    display: flex;
    align-items: center;
    gap: 1rem;
    padding: 0.875rem 1rem;
    background: rgba(239, 68, 68, 0.1);
    border: 2px solid rgba(239, 68, 68, 0.3);
    color: #fca5a5;
    text-decoration: none;
    border-radius: 12px;
    font-weight: 600;
    font-size: 0.9rem;
    transition: all 0.3s ease;
    width: 100%;
    cursor: pointer;
  }

  .logout-btn-sidebar:hover {
    background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
    border-color: transparent;
    color: #fff;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(239, 68, 68, 0.4);
  }

  .logout-btn-sidebar .nav-text {
    flex: 1;
  }

  /* Main Content Area */
  .main-content {
    margin-left: var(--sidebar-width);
    transition: margin-left 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    min-height: 100vh;
  }

  .main-content.expanded {
    margin-left: var(--sidebar-collapsed-width);
  }

  /* Top Bar */
  .top-bar {
    background: #fff;
    padding: 1rem 2rem;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
    display: flex;
    align-items: center;
    justify-content: space-between;
    position: sticky;
    top: 0;
    z-index: 100;
  }

  .top-bar h1 {
    font-size: 1.5rem;
    font-weight: 700;
    color: #1e293b;
    margin: 0;
  }

  .top-bar-actions {
    display: flex;
    align-items: center;
    gap: 1rem;
  }

  /* Notification Bell in Top Bar */
  .notification-bell-topbar {
    position: relative;
    background: #f8fafc;
    border: 2px solid #e2e8f0;
    border-radius: 12px;
    width: 44px;
    height: 44px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s ease;
    color: #64748b;
  }

  .notification-bell-topbar:hover {
    background: var(--primary-gradient);
    color: #fff;
    border-color: transparent;
    transform: scale(1.1);
  }

  .notification-bell-topbar i {
    font-size: 1.25rem;
  }

  .notification-badge-topbar {
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
    border: 2px solid #fff;
    animation: pulseBadge 2s ease-in-out infinite;
  }

  /* Mobile Responsive */
  @media (max-width: 768px) {
    .sidebar-wrapper {
      transform: translateX(-100%);
    }

    .sidebar-wrapper.mobile-open {
      transform: translateX(0);
    }

    .main-content {
      margin-left: 0;
    }

    .mobile-toggle {
      display: flex;
      align-items: center;
      justify-content: center;
      width: 44px;
      height: 44px;
      background: var(--primary-gradient);
      border: none;
      border-radius: 12px;
      color: #fff;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .mobile-toggle:hover {
      transform: scale(1.1);
    }

    .sidebar-overlay {
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: rgba(0, 0, 0, 0.5);
      z-index: 999;
      display: none;
    }

    .sidebar-overlay.active {
      display: block;
    }
  }

  /* Notification Dropdown Styles */
  .notification-dropdown-menu {
    width: 400px;
    max-height: 500px;
    border: none;
    border-radius: 16px;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.25);
    padding: 0;
    margin-top: 0.5rem;
    overflow: hidden;
    background: #fff;
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
  }

  .notification-action-btn:hover {
    background: rgba(255, 255, 255, 0.3);
    transform: scale(1.05);
  }

  .notification-body {
    max-height: 400px;
    overflow-y: auto;
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

  /* Individual Notification Items */
  .notification-item {
    display: flex;
    align-items: flex-start;
    gap: 1rem;
    padding: 1.25rem 1.5rem;
    border-bottom: 1px solid #e2e8f0;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
    background: #fff;
    cursor: pointer;
  }

  .notification-item:hover {
    background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
    transform: translateX(4px);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
  }

  .notification-item.unread {
    background: linear-gradient(135deg, #eff6ff 0%, #dbeafe 100%);
    border-left: 4px solid #3b82f6;
  }

  .notification-item.unread::before {
    content: '';
    position: absolute;
    left: 0;
    top: 50%;
    transform: translateY(-50%);
    width: 8px;
    height: 8px;
    background: #3b82f6;
    border-radius: 50%;
    box-shadow: 0 0 8px rgba(59, 130, 246, 0.5);
  }

  .notification-item.unread:hover {
    background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%);
  }

  .notification-icon {
    width: 48px;
    height: 48px;
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.25rem;
    flex-shrink: 0;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
  }

  .notification-icon.info {
    background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%);
    color: #1e40af;
  }

  .notification-icon.success {
    background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%);
    color: #065f46;
  }

  .notification-icon.warning {
    background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);
    color: #92400e;
  }

  .notification-icon.error {
    background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%);
    color: #991b1b;
  }

  .notification-item:hover .notification-icon {
    transform: scale(1.1);
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
  }

  .notification-content {
    flex: 1;
    min-width: 0;
  }

  .notification-content-message {
    margin: 0 0 0.5rem 0;
    font-size: 0.9rem;
    line-height: 1.5;
    color: #1e293b;
    font-weight: 500;
  }

  .notification-time {
    display: flex;
    align-items: center;
    gap: 0.375rem;
    font-size: 0.75rem;
    color: #64748b;
    font-weight: 500;
  }

  .notification-time i {
    font-size: 0.7rem;
  }

  .notification-mark-read {
    background: linear-gradient(135deg, #10b981 0%, #059669 100%);
    color: #fff;
    border: none;
    padding: 0.5rem 1rem;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    display: flex;
    align-items: center;
    gap: 0.375rem;
    box-shadow: 0 2px 8px rgba(16, 185, 129, 0.3);
    flex-shrink: 0;
  }

  .notification-mark-read:hover {
    background: linear-gradient(135deg, #059669 0%, #047857 100%);
    transform: translateY(-2px);
    box-shadow: 0 4px 16px rgba(16, 185, 129, 0.4);
  }

  .notification-mark-read:active {
    transform: translateY(0);
  }

  .notification-mark-read i {
    font-size: 0.75rem;
  }
</style>

<!-- Sidebar Overlay for Mobile -->
<div class="sidebar-overlay" id="sidebarOverlay"></div>

<!-- Sidebar -->
<div class="sidebar-wrapper" id="sidebar">
  <!-- Sidebar Header -->
  <div class="sidebar-header">
    <a href="<?= base_url('/dashboard') ?>" class="sidebar-brand">
      <i class="fas fa-rocket"></i>
      <span>ITE311-VISAYAS</span>
    </a>
    <button class="sidebar-toggle" id="sidebarToggle">
      <i class="fas fa-bars"></i>
    </button>
  </div>

  <!-- User Profile -->
  <?php if (session()->get('isLoggedIn')): ?>
  <div class="sidebar-user">
    <div class="user-profile">
      <div class="user-avatar-sidebar">
        <?= strtoupper(substr(session()->get('userEmail'), 0, 1)) ?>
      </div>
      <div class="user-info-sidebar">
        <div class="user-name-sidebar"><?= session()->get('userName') ?? 'User' ?></div>
        <div class="user-email-sidebar"><?= session()->get('userEmail') ?></div>
        <span class="user-role-badge <?= session()->get('userRole') ?>">
          <?= ucfirst(session()->get('userRole')) ?>
        </span>
      </div>
    </div>
  </div>
  <?php endif; ?>

  <!-- Navigation -->
  <nav class="sidebar-nav">
    <ul style="list-style: none; padding: 0; margin: 0;">
      <!-- Main Navigation -->
      <div class="nav-section-title">Main</div>
      
      <li class="nav-item-sidebar">
        <a href="<?= base_url('/dashboard') ?>" 
           class="nav-link-sidebar <?= uri_string() === 'dashboard' ? 'active' : '' ?>">
          <span class="nav-icon"><i class="fas fa-th-large"></i></span>
          <span class="nav-text">Dashboard</span>
        </a>
      </li>

      <!-- Role-based Navigation: ADMIN -->
      <?php if (session()->get('userRole') === 'admin'): ?>
        <div class="nav-section-title">Administration</div>
        
        <li class="nav-item-sidebar">
          <a href="<?= base_url('/manage-users') ?>" 
             class="nav-link-sidebar <?= uri_string() === 'manage-users' ? 'active' : '' ?>">
            <span class="nav-icon"><i class="fas fa-users-cog"></i></span>
            <span class="nav-text">Manage Users</span>
          </a>
        </li>

        <li class="nav-item-sidebar">
          <a href="<?= base_url('/reports') ?>" 
             class="nav-link-sidebar <?= uri_string() === 'reports' ? 'active' : '' ?>">
            <span class="nav-icon"><i class="fas fa-chart-line"></i></span>
            <span class="nav-text">Reports</span>
          </a>
        </li>

        <li class="nav-item-sidebar">
          <a href="<?= base_url('/announcements') ?>" 
             class="nav-link-sidebar <?= uri_string() === 'announcements' ? 'active' : '' ?>">
            <span class="nav-icon"><i class="fas fa-bullhorn"></i></span>
            <span class="nav-text">Announcements</span>
          </a>
        </li>

      <!-- Role-based Navigation: TEACHER -->
      <?php elseif (session()->get('userRole') === 'teacher'): ?>
        <div class="nav-section-title">Teaching</div>
        
        <li class="nav-item-sidebar">
          <a href="<?= base_url('/teacher/classes') ?>" 
             class="nav-link-sidebar <?= strpos(uri_string(), 'teacher/classes') !== false ? 'active' : '' ?>">
            <span class="nav-icon"><i class="fas fa-chalkboard-teacher"></i></span>
            <span class="nav-text">My Classes</span>
          </a>
        </li>

        <li class="nav-item-sidebar">
          <a href="<?= base_url('/teacher/materials') ?>" 
             class="nav-link-sidebar <?= strpos(uri_string(), 'teacher/materials') !== false ? 'active' : '' ?>">
            <span class="nav-icon"><i class="fas fa-book"></i></span>
            <span class="nav-text">Materials</span>
          </a>
        </li>

        <li class="nav-item-sidebar">
          <a href="<?= base_url('/announcements') ?>" 
             class="nav-link-sidebar <?= uri_string() === 'announcements' ? 'active' : '' ?>">
            <span class="nav-icon"><i class="fas fa-bullhorn"></i></span>
            <span class="nav-text">Announcements</span>
            <span class="nav-badge" id="announcementBadge" style="display:none;">0</span>
          </a>
        </li>

      <!-- Role-based Navigation: STUDENT -->
      <?php elseif (session()->get('userRole') === 'student'): ?>
        <div class="nav-section-title">Learning</div>
        
        <li class="nav-item-sidebar">
          <a href="<?= base_url('/student/courses') ?>" 
             class="nav-link-sidebar <?= strpos(uri_string(), 'student/courses') !== false ? 'active' : '' ?>">
            <span class="nav-icon"><i class="fas fa-graduation-cap"></i></span>
            <span class="nav-text">My Courses</span>
          </a>
        </li>

        <li class="nav-item-sidebar">
          <a href="<?= base_url('/student/grades') ?>" 
             class="nav-link-sidebar <?= strpos(uri_string(), 'student/grades') !== false ? 'active' : '' ?>">
            <span class="nav-icon"><i class="fas fa-star"></i></span>
            <span class="nav-text">Grades</span>
          </a>
        </li>

        <li class="nav-item-sidebar">
          <a href="<?= base_url('/announcements') ?>" 
             class="nav-link-sidebar <?= uri_string() === 'announcements' ? 'active' : '' ?>">
            <span class="nav-icon"><i class="fas fa-bullhorn"></i></span>
            <span class="nav-text">Announcements</span>
          </a>
        </li>
      <?php endif; ?>
    </ul>
  </nav>

  <!-- Sidebar Footer -->
  <?php if (session()->get('isLoggedIn')): ?>
  <div class="sidebar-footer">
    <a href="<?= base_url('/logout') ?>" class="logout-btn-sidebar">
      <span class="nav-icon"><i class="fas fa-sign-out-alt"></i></span>
      <span class="nav-text">Logout</span>
    </a>
  </div>
  <?php endif; ?>
</div>

<!-- Main Content Area -->
<div class="main-content" id="mainContent">
  <!-- Top Bar -->
  <div class="top-bar">
    <div style="display: flex; align-items: center; gap: 1rem;">
      <button class="mobile-toggle" id="mobileToggle" style="display: none;">
        <i class="fas fa-bars"></i>
      </button>
      <h1>Dashboard</h1>
    </div>
    
    <div class="top-bar-actions">
      <!-- Notification Bell -->
      <?php if (session()->get('isLoggedIn')): ?>
      <div class="dropdown">
        <button class="notification-bell-topbar" id="notificationDropdown" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="fas fa-bell"></i>
          <span id="notificationBadge" class="notification-badge-topbar" style="display:none;">0</span>
        </button>
        
        <ul class="dropdown-menu dropdown-menu-end notification-dropdown-menu" aria-labelledby="notificationDropdown">
          <li class="notification-dropdown-header">
            <h6>
              <i class="fas fa-bell"></i>
              Notifications
            </h6>
            <button class="notification-action-btn" id="refreshNotifications">
              <i class="fas fa-sync-alt"></i>
            </button>
          </li>
          
          <div class="notification-body" id="notificationBody">
            <div class="notification-empty">
              <i class="fas fa-bell-slash"></i>
              <p><strong>No notifications</strong></p>
              <p class="small">You're all caught up!</p>
            </div>
          </div>
        </ul>
      </div>
      <?php endif; ?>
    </div>
  </div>

  <!-- Your Dashboard Content Goes Here -->
  <div style="padding: 2rem;">
    <?= $this->renderSection('content') ?>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
// Sidebar Toggle
document.getElementById('sidebarToggle').addEventListener('click', function() {
  document.getElementById('sidebar').classList.toggle('collapsed');
  document.getElementById('mainContent').classList.toggle('expanded');
});

// Mobile Toggle
const mobileToggle = document.getElementById('mobileToggle');
const sidebar = document.getElementById('sidebar');
const overlay = document.getElementById('sidebarOverlay');

if (window.innerWidth <= 768) {
  mobileToggle.style.display = 'flex';
}

mobileToggle.addEventListener('click', function() {
  sidebar.classList.toggle('mobile-open');
  overlay.classList.toggle('active');
});

overlay.addEventListener('click', function() {
  sidebar.classList.remove('mobile-open');
  overlay.classList.remove('active');
});

window.addEventListener('resize', function() {
  if (window.innerWidth <= 768) {
    mobileToggle.style.display = 'flex';
  } else {
    mobileToggle.style.display = 'none';
    sidebar.classList.remove('mobile-open');
    overlay.classList.remove('active');
  }
});

// Notification System
$(document).ready(function() {
  // Load notifications on page load
  loadNotifications();

  // Refresh notifications every 60 seconds
  setInterval(loadNotifications, 60000);

  // Prevent dropdown from closing when clicking read buttons
  $('#notificationDropdown').on('hide.bs.dropdown', function(e) {
    if ($(e.clickEvent && e.clickEvent.target).closest('.notification-mark-read').length > 0) {
      e.preventDefault();
    }
  });

  // Refresh button
  $('#refreshNotifications').on('click', function(e) {
    e.preventDefault();
    e.stopPropagation();

    const btn = $(this);
    const icon = btn.find('i');

    icon.addClass('fa-spin');
    loadNotifications();

    setTimeout(function() {
      icon.removeClass('fa-spin');
    }, 1000);
  });

  // Mark notification as read
  $(document).on('click', '.notification-mark-read', function(e) {
    e.preventDefault();
    e.stopPropagation();
    e.stopImmediatePropagation();

    const btn = $(this);
    const notificationId = btn.data('id');
    const notificationItem = btn.closest('.notification-item');

    // Immediately update UI to show as read (no loading state)
    notificationItem.removeClass('unread');
    btn.remove();

    // Send AJAX request in background
    $.ajax({
      url: "<?= base_url('/notifications/mark_read/') ?>" + notificationId,
      type: 'POST',
      dataType: 'json',
      success: function(res) {
        if (res.success) {
          // Update badge count
          updateNotificationBadge(res.unread_count || 0);
        } else {
          console.error('Failed to mark notification as read');
          // Revert UI changes on failure
          notificationItem.addClass('unread');
          notificationItem.append('<button class="notification-mark-read" data-id="' + notificationId + '"><i class="fas fa-check"></i> Read</button>');
        }
      },
      error: function() {
        console.error('Error marking notification as read');
        // Revert UI changes on error
        notificationItem.addClass('unread');
        notificationItem.append('<button class="notification-mark-read" data-id="' + notificationId + '"><i class="fas fa-check"></i> Read</button>');
      }
    });
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
</script>