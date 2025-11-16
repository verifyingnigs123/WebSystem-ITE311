<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $this->renderSection('title') ?> - ITE311-VISAYAS</title>
  
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  
  <style>
    :root {
      --primary-color: #2563eb;
      --primary-dark: #1e40af;
      --primary-light: #3b82f6;
      --secondary-color: #64748b;
      --accent-color: #0ea5e9;
      --bg-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      --shadow-sm: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
      --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
      --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
      --sidebar-width: 280px;
      --sidebar-collapsed-width: 80px;
    }
    
    body {
      font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
      background: #f8fafc;
      color: #1e293b;
      margin: 0;
      padding: 0;
    }

    /* Layout for logged-in users */
    body.has-sidebar {
      display: flex;
      min-height: 100vh;
    }

    body.has-sidebar main {
      flex: 1;
      margin-left: var(--sidebar-width);
      transition: margin-left 0.3s cubic-bezier(0.4, 0, 0.2, 1);
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }

    body.has-sidebar.sidebar-collapsed main {
      margin-left: var(--sidebar-collapsed-width);
    }

    /* Guest Navbar Styling */
    .navbar-custom {
      background: var(--bg-gradient);
      backdrop-filter: blur(10px);
      box-shadow: var(--shadow-md);
      padding: 1rem 0;
      transition: all 0.3s ease;
    }
    
    .navbar-custom .navbar-brand {
      font-size: 1.5rem;
      font-weight: 700;
      letter-spacing: -0.5px;
      color: #fff !important;
      transition: transform 0.3s ease;
      display: flex;
      align-items: center;
    }
    
    .navbar-custom .navbar-brand:hover {
      transform: scale(1.05);
    }
    
    .navbar-custom .nav-link {
      color: rgba(255, 255, 255, 0.9) !important;
      font-weight: 500;
      margin: 0 0.5rem;
      padding: 0.5rem 1rem !important;
      border-radius: 8px;
      transition: all 0.3s ease;
    }
    
    .navbar-custom .nav-link:hover {
      background: rgba(255, 255, 255, 0.15);
      color: #fff !important;
      transform: translateY(-2px);
    }
    
    .btn-login {
      background: #fff;
      color: var(--primary-color);
      font-weight: 600;
      padding: 0.5rem 1.5rem;
      border-radius: 50px;
      border: none;
      box-shadow: var(--shadow-sm);
      transition: all 0.3s ease;
    }
    
    .btn-login:hover {
      transform: translateY(-2px);
      box-shadow: var(--shadow-lg);
      color: var(--primary-dark);
    }
    
    /* Main Content */
    main.container {
      animation: fadeIn 0.5s ease-in;
      padding: 2rem 1rem;
    }

    main.full-width {
      padding: 0;
      margin: 0;
      max-width: 100%;
    }
    
    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
    
    /* Footer Styling */
    .footer-custom {
      background: linear-gradient(135deg, #1e293b 0%, #334155 100%);
      color: #e2e8f0;
      padding: 2rem 0;
      box-shadow: 0 -4px 6px -1px rgba(0, 0, 0, 0.1);
      position: relative;
      overflow: hidden;
      margin-top: auto;
    }
    
    .footer-custom::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      height: 3px;
      background: var(--bg-gradient);
    }
    
    .footer-custom small {
      font-size: 0.875rem;
      opacity: 0.9;
    }
    
    .footer-links {
      display: flex;
      gap: 1.5rem;
      justify-content: center;
      margin-top: 0.75rem;
    }
    
    .footer-links a {
      color: #94a3b8;
      text-decoration: none;
      transition: color 0.3s ease;
      font-size: 0.875rem;
    }
    
    .footer-links a:hover {
      color: #fff;
    }
    
    /* Responsive adjustments */
    @media (max-width: 991px) {
      .navbar-custom .nav-link {
        margin: 0.25rem 0;
      }
      
      .btn-login {
        margin-top: 0.5rem;
      }
    }

    @media (max-width: 768px) {
      body.has-sidebar main {
        margin-left: 0;
      }

      body.has-sidebar.sidebar-collapsed main {
        margin-left: 0;
      }
    }
    
    /* Custom scrollbar */
    ::-webkit-scrollbar {
      width: 10px;
    }
    
    ::-webkit-scrollbar-track {
      background: #f1f5f9;
    }
    
    ::-webkit-scrollbar-thumb {
      background: var(--primary-color);
      border-radius: 5px;
    }
    
    ::-webkit-scrollbar-thumb:hover {
      background: var(--primary-dark);
    }

    /* Sidebar Styles */
    .sidebar-wrapper {
      position: fixed;
      left: 0;
      top: 0;
      bottom: 0;
      width: var(--sidebar-width);
      background: #1e293b;
      box-shadow: 4px 0 20px rgba(0, 0, 0, 0.1);
      z-index: 1000;
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
      overflow: hidden;
    }

    .sidebar-wrapper.collapsed {
      width: var(--sidebar-collapsed-width);
    }

    .sidebar-header {
      padding: 1.5rem;
      display: flex;
      align-items: center;
      justify-content: space-between;
      border-bottom: 1px solid rgba(255, 255, 255, 0.1);
      background: var(--bg-gradient);
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
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
      position: relative;
      overflow: hidden;
    }

    .sidebar-toggle::before {
      content: '';
      position: absolute;
      top: 50%;
      left: 50%;
      width: 0;
      height: 0;
      background: rgba(255, 255, 255, 0.3);
      border-radius: 50%;
      transform: translate(-50%, -50%);
      transition: width 0.3s ease, height 0.3s ease;
    }

    .sidebar-toggle:hover::before {
      width: 120%;
      height: 120%;
    }

    .sidebar-toggle:hover {
      background: rgba(255, 255, 255, 0.3);
      transform: scale(1.1);
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
    }

    .sidebar-toggle i {
      transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
      font-size: 1.1rem;
    }

    .sidebar-wrapper.collapsed .sidebar-toggle i {
      transform: rotate(180deg);
    }

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
      background: var(--bg-gradient);
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
      color: #cbd5e1;
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
      color: #cbd5e1;
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
      color: #cbd5e1;
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
      background: var(--bg-gradient);
      transform: scaleY(0);
      transition: transform 0.3s ease;
    }

    .nav-link-sidebar:hover {
      background: #334155;
      color: #fff;
      transform: translateX(5px);
    }

    .nav-link-sidebar.active {
      background: var(--bg-gradient);
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

    /* Top Bar for Logged Users */
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
      background: var(--bg-gradient);
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

    .mobile-toggle {
      display: none;
      align-items: center;
      justify-content: center;
      width: 44px;
      height: 44px;
      background: var(--bg-gradient);
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

    @media (max-width: 768px) {
      .sidebar-wrapper {
        transform: translateX(-100%);
      }

      .sidebar-wrapper.mobile-open {
        transform: translateX(0);
      }

      .mobile-toggle {
        display: flex;
      }
    }

    /* Professional Notification Dropdown */
    .notification-dropdown-menu {
      width: 420px;
      max-height: 600px;
      border: none;
      border-radius: 20px;
      box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15), 0 8px 32px rgba(0, 0, 0, 0.1);
      padding: 0;
      margin-top: 0.75rem;
      overflow: hidden;
      background: #fff;
      backdrop-filter: blur(20px);
      border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .notification-dropdown-header {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      padding: 1.5rem 1.75rem;
      color: white;
      display: flex;
      justify-content: space-between;
      align-items: center;
      position: relative;
      overflow: hidden;
    }

    .notification-dropdown-header::before {
      content: '';
      position: absolute;
      top: -50%;
      right: -20%;
      width: 120%;
      height: 120%;
      background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
      animation: headerGlow 8s ease-in-out infinite;
    }

    @keyframes headerGlow {
      0%, 100% { transform: scale(1) rotate(0deg); opacity: 0.3; }
      50% { transform: scale(1.2) rotate(180deg); opacity: 0.6; }
    }

    .notification-dropdown-header h6 {
      margin: 0;
      font-weight: 800;
      font-size: 1.2rem;
      display: flex;
      align-items: center;
      gap: 0.75rem;
      position: relative;
      z-index: 2;
    }

    .notification-action-btn {
      background: rgba(255, 255, 255, 0.15);
      backdrop-filter: blur(10px);
      border: 1px solid rgba(255, 255, 255, 0.2);
      color: white;
      font-size: 0.8rem;
      padding: 0.5rem 1rem;
      border-radius: 25px;
      cursor: pointer;
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
      font-weight: 600;
      position: relative;
      z-index: 2;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }

    .notification-action-btn:hover {
      background: rgba(255, 255, 255, 0.25);
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
    }

    .notification-action-btn:active {
      transform: translateY(0);
    }

    .notification-body {
      max-height: 500px;
      overflow-y: auto;
      background: linear-gradient(180deg, #fafbfc 0%, #f1f5f9 100%);
    }

    .notification-body::-webkit-scrollbar {
      width: 6px;
    }

    .notification-body::-webkit-scrollbar-thumb {
      background: linear-gradient(180deg, #cbd5e1 0%, #94a3b8 100%);
      border-radius: 3px;
    }

    .notification-body::-webkit-scrollbar-track {
      background: #f8fafc;
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

    .notification-empty {
      padding: 3.5rem 2rem;
      text-align: center;
      color: #94a3b8;
      background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
    }

    .notification-empty i {
      font-size: 3.5rem;
      margin-bottom: 1.25rem;
      opacity: 0.4;
      background: linear-gradient(135deg, #cbd5e1 0%, #94a3b8 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }

    .notification-empty h6 {
      font-weight: 700;
      color: #475569;
      margin-bottom: 0.5rem;
      font-size: 1.1rem;
    }

    .notification-empty p {
      font-size: 0.9rem;
      margin: 0;
      opacity: 0.8;
    }

    @media (max-width: 576px) {
      .notification-dropdown-menu {
        width: calc(100vw - 2rem);
        max-width: 400px;
      }
    }
  </style>
</head>
<body class="<?= session()->get('isLoggedIn') ? 'has-sidebar' : 'd-flex flex-column min-vh-100' ?>" id="mainBody">

  <?php if (!session()->get('isLoggedIn')): ?>
    <!-- NAVBAR for guests -->
    <nav class="navbar navbar-expand-lg navbar-custom">
      <div class="container">
        <a class="navbar-brand" href="<?= base_url('/') ?>">
          <i class="fas fa-rocket me-2"></i>ITE311-VISAYAS
        </a>
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto align-items-center">
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('/') ?>">
                <i class="fas fa-home me-1"></i> Home
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('/about') ?>">
                <i class="fas fa-info-circle me-1"></i> About
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('/contact') ?>">
                <i class="fas fa-envelope me-1"></i> Contact
              </a>
            </li>
            <li class="nav-item ms-lg-3">
              <a class="btn btn-login" href="<?= base_url('/login') ?>">
                <i class="fas fa-sign-in-alt me-1"></i> Login
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  <?php else: ?>
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
      <div class="sidebar-footer">
        <a href="<?= base_url('/logout') ?>" class="logout-btn-sidebar">
          <span class="nav-icon"><i class="fas fa-sign-out-alt"></i></span>
          <span class="nav-text">Logout</span>
        </a>
      </div>
    </div>
  <?php endif; ?>


  <!-- Page Content -->
  <main class="<?= session()->get('isLoggedIn') ? 'full-width' : 'container my-5 flex-grow-1' ?>">
    <?php if (session()->get('isLoggedIn')): ?>
      <!-- Top Bar for logged-in users -->
      <div class="top-bar">
        <div style="display: flex; align-items: center; gap: 1rem;">
          <button class="mobile-toggle" id="mobileToggle">
            <i class="fas fa-bars"></i>
          </button>
          <h1><?= $this->renderSection('title') ?></h1>
        </div>
        
        <div class="top-bar-actions">
          <!-- Notification Bell -->
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
        </div>
      </div>
    <?php endif; ?>

    <?= $this->renderSection('content') ?>
  </main>


  <?php
    // Hide footer on login, register, and dashboard pages
    $uri = uri_string();
    $hideFooter = (
      strpos($uri, 'login') !== false ||
      strpos($uri, 'register') !== false ||
      strpos($uri, 'dashboard') !== false ||
      session()->get('isLoggedIn')
    );
  ?>

  <?php if (!$hideFooter): ?>
    <!-- Footer -->
    <footer class="footer-custom text-center mt-auto">
      <div class="container">
        <div class="mb-2">
          <i class="fas fa-rocket fa-2x mb-2" style="color: #94a3b8;"></i>
        </div>
        <small>&copy; <?= date('Y') ?> ITE311-VISAYAS. All rights reserved.</small>
        <div class="footer-links">
          <a href="<?= base_url('/privacy') ?>">Privacy Policy</a>
          <a href="<?= base_url('/terms') ?>">Terms of Service</a>
          <a href="<?= base_url('/contact') ?>">Contact Us</a>
        </div>
      </div>
    </footer>
  <?php endif; ?>

  <!-- jQuery (load before Bootstrap) -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  
  <?php if (session()->get('isLoggedIn')): ?>
  <script>
    // Sidebar Toggle
    const sidebarToggle = document.getElementById('sidebarToggle');
    const sidebar = document.getElementById('sidebar');
    const mainBody = document.getElementById('mainBody');
    const toggleIcon = sidebarToggle.querySelector('i');

    function updateToggleIcon() {
      const isCollapsed = sidebar.classList.contains('collapsed');
      toggleIcon.className = isCollapsed ? 'fas fa-chevron-left' : 'fas fa-bars';
    }

    if (sidebarToggle) {
      sidebarToggle.addEventListener('click', function() {
        sidebar.classList.toggle('collapsed');
        mainBody.classList.toggle('sidebar-collapsed');

        // Update icon immediately
        updateToggleIcon();

        // Save state to localStorage
        const isCollapsed = sidebar.classList.contains('collapsed');
        localStorage.setItem('sidebarCollapsed', isCollapsed);
      });

      // Restore sidebar state on page load
      const savedState = localStorage.getItem('sidebarCollapsed');
      if (savedState === 'true') {
        sidebar.classList.add('collapsed');
        mainBody.classList.add('sidebar-collapsed');
      }

      // Set initial icon state
      updateToggleIcon();
    }

    // Mobile Toggle
    const mobileToggle = document.getElementById('mobileToggle');
    const overlay = document.getElementById('sidebarOverlay');

    if (mobileToggle) {
      mobileToggle.addEventListener('click', function() {
        sidebar.classList.toggle('mobile-open');
        overlay.classList.toggle('active');
      });
    }

    if (overlay) {
      overlay.addEventListener('click', function() {
        sidebar.classList.remove('mobile-open');
        overlay.classList.remove('active');
      });
    }

    // Close sidebar when clicking a link on mobile
    const sidebarLinks = document.querySelectorAll('.nav-link-sidebar');
    sidebarLinks.forEach(link => {
      link.addEventListener('click', function() {
        if (window.innerWidth <= 768) {
          sidebar.classList.remove('mobile-open');
          overlay.classList.remove('active');
        }
      });
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
  <?php endif; ?>

  <?= $this->renderSection('scripts') ?>
