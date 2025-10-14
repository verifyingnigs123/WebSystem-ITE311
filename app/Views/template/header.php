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
        <a class="navbar-brand" href="<?= base_url('/') ?>">
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
                            <span>My Classes</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= strpos(uri_string(), 'teacher/materials') !== false ? 'active-page' : '' ?>" 
                           href="<?= base_url('/teacher/materials') ?>">
                            <i class="fas fa-book"></i>
                            <span>Materials</span>
                        </a>
                    </li>

                <!-- Role-based links: STUDENT -->
                <?php elseif (session()->get('userRole') === 'student'): ?>
                    <li class="nav-item">
                        <a class="nav-link <?= strpos(uri_string(), 'student/courses') !== false ? 'active-page' : '' ?>" 
                           href="<?= base_url('/student/courses') ?>">
                            <i class="fas fa-graduation-cap"></i>
                            <span>My Courses</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= strpos(uri_string(), 'student/grades') !== false ? 'active-page' : '' ?>" 
                           href="<?= base_url('/student/grades') ?>">
                            <i class="fas fa-star"></i>
                            <span>My Grades</span>
                        </a>
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