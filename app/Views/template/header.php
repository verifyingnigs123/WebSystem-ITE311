<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
    <div class="container">
        <!-- Brand -->
        <a class="navbar-brand fw-bold" href="<?= base_url('/') ?>">ITE311-VISAYAS</a>

        <!-- Toggler for mobile -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar links -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                
                <!-- User info -->
                <?php if (session()->get('isLoggedIn')): ?>
                    <li class="nav-item">
                        <span class="navbar-text text-light me-3">
                            Welcome, <strong><?= session()->get('userEmail') ?></strong> 
                            (<?= ucfirst(session()->get('userRole')) ?>)
                        </span>
                    </li>
                <?php endif; ?>

                <!-- Always visible -->
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('/dashboard') ?>">Dashboard</a>
                </li>

                <!-- Role-based links -->
                <?php if (session()->get('userRole') === 'admin'): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('/manage-users') ?>">Manage Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('/reports') ?>">Reports</a>
                    </li>

                <?php elseif (session()->get('userRole') === 'teacher'): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('/teacher/classes') ?>">My Classes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('/teacher/materials') ?>">Materials</a>
                    </li>

                <?php elseif (session()->get('userRole') === 'student'): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('/student/courses') ?>">My Courses</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('/student/grades') ?>">My Grades</a>
                    </li>
                <?php endif; ?>

                <!-- Logout -->
                <?php if (session()->get('isLoggedIn')): ?>
                    <li class="nav-item">
                        <a class="nav-link text-danger fw-semibold" href="<?= base_url('/logout') ?>">
                            Logout
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
