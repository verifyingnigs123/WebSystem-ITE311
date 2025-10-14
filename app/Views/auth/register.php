<?= $this->extend('design/template') ?>

<?= $this->section('title') ?>Register<?= $this->endSection() ?>

<?= $this->section('content') ?>
<style>
  .register-container {
    animation: slideUp 0.6s ease-out;
  }
  
  @keyframes slideUp {
    from {
      opacity: 0;
      transform: translateY(30px);
    }
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }
  
  .register-card {
    border-radius: 20px;
    overflow: hidden;
    backdrop-filter: blur(10px);
    background: rgba(255, 255, 255, 0.95);
    border: 1px solid rgba(255, 255, 255, 0.3);
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
  }
  
  .register-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 25px 70px rgba(0, 0, 0, 0.2);
  }
  
  .register-header {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    padding: 2.5rem 2rem;
    text-align: center;
    position: relative;
    overflow: hidden;
  }
  
  .register-header::before {
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
    animation: pulse 4s ease-in-out infinite;
  }
  
  @keyframes pulse {
    0%, 100% { transform: scale(1); opacity: 0.5; }
    50% { transform: scale(1.1); opacity: 0.8; }
  }
  
  .register-header h3 {
    margin: 0;
    font-size: 2rem;
    font-weight: 700;
    color: #fff;
    position: relative;
    z-index: 1;
    letter-spacing: -0.5px;
  }
  
  .register-header p {
    margin: 0.5rem 0 0;
    color: rgba(255, 255, 255, 0.9);
    font-size: 0.95rem;
    position: relative;
    z-index: 1;
  }
  
  .register-icon {
    width: 70px;
    height: 70px;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1rem;
    position: relative;
    z-index: 1;
    backdrop-filter: blur(10px);
    border: 2px solid rgba(255, 255, 255, 0.3);
  }
  
  .register-icon i {
    font-size: 2rem;
    color: #fff;
  }
  
  .register-body {
    padding: 2.5rem 2rem;
  }
  
  .form-floating-custom {
    position: relative;
    margin-bottom: 1.5rem;
  }
  
  .form-floating-custom input {
    border: 2px solid #e2e8f0;
    border-radius: 12px;
    padding: 1rem 1rem 1rem 3rem;
    font-size: 0.95rem;
    transition: all 0.3s ease;
    background: #f8fafc;
  }
  
  .form-floating-custom input:focus {
    border-color: #667eea;
    box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
    background: #fff;
    outline: none;
  }
  
  .form-floating-custom .input-icon {
    position: absolute;
    left: 1rem;
    top: 50%;
    transform: translateY(-50%);
    color: #94a3b8;
    z-index: 1;
    transition: color 0.3s ease;
  }
  
  .form-floating-custom input:focus ~ .input-icon {
    color: #667eea;
  }
  
  .form-floating-custom label {
    position: absolute;
    left: 3rem;
    top: 50%;
    transform: translateY(-50%);
    color: #64748b;
    font-size: 0.95rem;
    transition: all 0.3s ease;
    pointer-events: none;
    background: transparent;
  }
  
  .form-floating-custom input:focus ~ label,
  .form-floating-custom input:not(:placeholder-shown) ~ label {
    top: -0.5rem;
    left: 2.5rem;
    font-size: 0.75rem;
    color: #667eea;
    background: #fff;
    padding: 0 0.5rem;
  }
  
  .password-strength {
    margin-top: 0.5rem;
    font-size: 0.8rem;
    color: #64748b;
  }
  
  .strength-bar {
    height: 4px;
    background: #e2e8f0;
    border-radius: 2px;
    overflow: hidden;
    margin-top: 0.5rem;
  }
  
  .strength-bar-fill {
    height: 100%;
    width: 0%;
    transition: all 0.3s ease;
    border-radius: 2px;
  }
  
  .strength-weak { 
    width: 33%; 
    background: linear-gradient(90deg, #ef4444, #f87171);
  }
  
  .strength-medium { 
    width: 66%; 
    background: linear-gradient(90deg, #f59e0b, #fbbf24);
  }
  
  .strength-strong { 
    width: 100%; 
    background: linear-gradient(90deg, #10b981, #34d399);
  }
  
  .btn-register-submit {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border: none;
    border-radius: 12px;
    padding: 1rem;
    font-size: 1rem;
    font-weight: 600;
    color: #fff;
    width: 100%;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
    position: relative;
    overflow: hidden;
    margin-top: 0.5rem;
  }
  
  .btn-register-submit::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
    transition: left 0.5s ease;
  }
  
  .btn-register-submit:hover::before {
    left: 100%;
  }
  
  .btn-register-submit:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(102, 126, 234, 0.5);
  }
  
  .btn-register-submit:active {
    transform: translateY(0);
  }
  
  .divider {
    display: flex;
    align-items: center;
    text-align: center;
    margin: 1.5rem 0;
  }
  
  .divider::before,
  .divider::after {
    content: '';
    flex: 1;
    border-bottom: 1px solid #e2e8f0;
  }
  
  .divider span {
    padding: 0 1rem;
    color: #94a3b8;
    font-size: 0.875rem;
    font-weight: 500;
  }
  
  .login-link {
    text-align: center;
    margin-top: 1.5rem;
    padding: 1.25rem;
    background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
    border-radius: 12px;
    animation: fadeIn 0.8s ease-out 0.3s both;
  }
  
  .login-link p {
    margin: 0;
    color: #475569;
    font-size: 0.95rem;
  }
  
  .login-link a {
    color: #667eea;
    text-decoration: none;
    font-weight: 700;
    transition: color 0.3s ease;
    position: relative;
  }
  
  .login-link a::after {
    content: '';
    position: absolute;
    width: 0;
    height: 2px;
    bottom: -2px;
    left: 0;
    background: #667eea;
    transition: width 0.3s ease;
  }
  
  .login-link a:hover {
    color: #764ba2;
  }
  
  .login-link a:hover::after {
    width: 100%;
  }
  
  .alert-modern {
    border: none;
    border-radius: 12px;
    padding: 1rem 1.25rem;
    margin-bottom: 1.5rem;
    animation: slideDown 0.4s ease-out;
  }
  
  @keyframes slideDown {
    from {
      opacity: 0;
      transform: translateY(-10px);
    }
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }
  
  .alert-success {
    background: linear-gradient(135deg, #d4edda 0%, #c3e6cb 100%);
    color: #155724;
  }
  
  .alert-danger {
    background: linear-gradient(135deg, #f8d7da 0%, #f5c6cb 100%);
    color: #721c24;
  }
  
  .form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1rem;
  }
  
  @media (max-width: 768px) {
    .register-header {
      padding: 2rem 1.5rem;
    }
    
    .register-body {
      padding: 2rem 1.5rem;
    }
    
    .register-header h3 {
      font-size: 1.75rem;
    }
    
    .form-row {
      grid-template-columns: 1fr;
    }
  }
  
  @keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
  }
  
  .input-group-addon {
    position: absolute;
    right: 1rem;
    top: 50%;
    transform: translateY(-50%);
    cursor: pointer;
    color: #94a3b8;
    z-index: 2;
    transition: color 0.3s ease;
  }
  
  .input-group-addon:hover {
    color: #667eea;
  }
</style>

<div class="container py-5 register-container">
  <div class="row justify-content-center">
    <div class="col-md-7 col-lg-6">
      <div class="card register-card border-0">
        <div class="register-header">
          <div class="register-icon">
            <i class="fas fa-user-plus"></i>
          </div>
          <h3>Create Account</h3>
          <p>Join us today and get started!</p>
        </div>
        <div class="register-body">

          <?php if (session()->getFlashdata('register_error')): ?>
            <div class="alert alert-danger alert-modern">
              <i class="fas fa-exclamation-circle me-2"></i><?= session()->getFlashdata('register_error') ?>
            </div>
          <?php endif; ?>
          
          <?php if (session()->getFlashdata('register_success')): ?>
            <div class="alert alert-success alert-modern">
              <i class="fas fa-check-circle me-2"></i><?= session()->getFlashdata('register_success') ?>
            </div>
          <?php endif; ?>

          <form method="post" action="<?= base_url('/register') ?>">
            <?= csrf_field() ?>
            
            <div class="form-floating-custom">
              <i class="fas fa-user input-icon"></i>
              <input type="text" class="form-control" id="name" name="name" 
                     placeholder=" " required value="<?= old('name') ?>">
              <label for="name">Full Name</label>
            </div>

            <div class="form-floating-custom">
              <i class="fas fa-envelope input-icon"></i>
              <input type="email" class="form-control" id="email" name="email" 
                     placeholder=" " required value="<?= old('email') ?>">
              <label for="email">Email Address</label>
            </div>

            <div class="form-floating-custom">
              <i class="fas fa-lock input-icon"></i>
              <input type="password" class="form-control" id="password" name="password" 
                     placeholder=" " required>
              <label for="password">Password</label>
              <span class="input-group-addon" onclick="togglePassword('password', this)">
                <i class="fas fa-eye"></i>
              </span>
              <div class="password-strength">
                <div class="strength-bar">
                  <div class="strength-bar-fill" id="strengthBar"></div>
                </div>
                <small id="strengthText"></small>
              </div>
            </div>

            <div class="form-floating-custom">
              <i class="fas fa-lock input-icon"></i>
              <input type="password" class="form-control" id="password_confirm" name="password_confirm" 
                     placeholder=" " required>
              <label for="password_confirm">Confirm Password</label>
              <span class="input-group-addon" onclick="togglePassword('password_confirm', this)">
                <i class="fas fa-eye"></i>
              </span>
            </div>

            <button type="submit" class="btn btn-register-submit">
              <i class="fas fa-user-plus me-2"></i>Create Account
            </button>
          </form>

          <div class="divider">
            <span>or</span>
          </div>
        </div>
      </div>
      
      <div class="login-link">
        <p>
          Already have an account? 
          <a href="<?= base_url('/login') ?>">
            Sign In <i class="fas fa-arrow-right ms-1"></i>
          </a>
        </p>
      </div>
    </div>
  </div>
</div>

<script>
// Toggle password visibility
function togglePassword(fieldId, icon) {
  const field = document.getElementById(fieldId);
  const iconElement = icon.querySelector('i');
  
  if (field.type === 'password') {
    field.type = 'text';
    iconElement.classList.remove('fa-eye');
    iconElement.classList.add('fa-eye-slash');
  } else {
    field.type = 'password';
    iconElement.classList.remove('fa-eye-slash');
    iconElement.classList.add('fa-eye');
  }
}

// Password strength indicator
document.getElementById('password').addEventListener('input', function(e) {
  const password = e.target.value;
  const strengthBar = document.getElementById('strengthBar');
  const strengthText = document.getElementById('strengthText');
  
  let strength = 0;
  
  if (password.length >= 8) strength++;
  if (password.match(/[a-z]/) && password.match(/[A-Z]/)) strength++;
  if (password.match(/[0-9]/)) strength++;
  if (password.match(/[^a-zA-Z0-9]/)) strength++;
  
  strengthBar.className = 'strength-bar-fill';
  
  if (strength === 0) {
    strengthText.textContent = '';
  } else if (strength <= 2) {
    strengthBar.classList.add('strength-weak');
    strengthText.textContent = 'Weak password';
    strengthText.style.color = '#ef4444';
  } else if (strength === 3) {
    strengthBar.classList.add('strength-medium');
    strengthText.textContent = 'Medium password';
    strengthText.style.color = '#f59e0b';
  } else {
    strengthBar.classList.add('strength-strong');
    strengthText.textContent = 'Strong password';
    strengthText.style.color = '#10b981';
  }
});
</script>
<?= $this->endSection() ?>