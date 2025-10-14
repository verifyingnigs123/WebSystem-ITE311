<?= $this->extend('design/template') ?>

<?= $this->section('title') ?>Contact<?= $this->endSection() ?>

<?= $this->section('content') ?>

<!-- Contact Header -->
<div class="contact-header text-center mb-5">
    <div class="contact-badge mb-3">
        <span class="badge-text">
            <i class="fas fa-comments me-2"></i>Get In Touch
        </span>
    </div>
    <h1 class="contact-title mb-3">
        Let's Start a <span class="gradient-text">Conversation</span>
    </h1>
    <p class="contact-subtitle">
        We'd really love to hear from you! Whether you've got a question, want to share your thoughts, 
        or just feel like saying hello, don't hesitate to reach out.
    </p>
</div>

<div class="row g-4">
    <!-- Contact Form -->
    <div class="col-lg-7">
        <div class="contact-form-card">
            <div class="form-header mb-4">
                <h2 class="form-title">
                    <i class="fas fa-paper-plane me-2"></i>Send us a Message
                </h2>
                <p class="form-subtitle">Fill out the form below and we'll get back to you as soon as possible</p>
            </div>
            
            <form id="contactForm">
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="form-group-custom">
                            <label for="firstName" class="form-label-custom">
                                <i class="fas fa-user me-2"></i>First Name
                            </label>
                            <input 
                                type="text" 
                                class="form-control-custom" 
                                id="firstName" 
                                placeholder="John"
                                required
                            >
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group-custom">
                            <label for="lastName" class="form-label-custom">
                                <i class="fas fa-user me-2"></i>Last Name
                            </label>
                            <input 
                                type="text" 
                                class="form-control-custom" 
                                id="lastName" 
                                placeholder="Doe"
                                required
                            >
                        </div>
                    </div>
                    
                    <div class="col-12">
                        <div class="form-group-custom">
                            <label for="email" class="form-label-custom">
                                <i class="fas fa-envelope me-2"></i>Email Address
                            </label>
                            <input 
                                type="email" 
                                class="form-control-custom" 
                                id="email" 
                                placeholder="john.doe@example.com"
                                required
                            >
                        </div>
                    </div>
                    
                    <div class="col-12">
                        <div class="form-group-custom">
                            <label for="subject" class="form-label-custom">
                                <i class="fas fa-tag me-2"></i>Subject
                            </label>
                            <select class="form-control-custom" id="subject" required>
                                <option value="">Select a subject...</option>
                                <option value="general">General Inquiry</option>
                                <option value="support">Technical Support</option>
                                <option value="feedback">Feedback</option>
                                <option value="partnership">Partnership</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="col-12">
                        <div class="form-group-custom">
                            <label for="message" class="form-label-custom">
                                <i class="fas fa-comment-dots me-2"></i>Message
                            </label>
                            <textarea 
                                class="form-control-custom" 
                                id="message" 
                                rows="5" 
                                placeholder="Tell us what's on your mind..."
                                required
                            ></textarea>
                        </div>
                    </div>
                    
                    <div class="col-12">
                        <button type="submit" class="btn btn-submit-custom w-100">
                            <i class="fas fa-paper-plane me-2"></i>Send Message
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
    <!-- Contact Info Sidebar -->
    <div class="col-lg-5">
        <!-- Contact Cards -->
        <div class="contact-info-card mb-4">
            <div class="info-icon bg-primary-gradient">
                <i class="fas fa-map-marker-alt"></i>
            </div>
            <div class="info-content">
                <h3 class="info-title">Visit Us</h3>
                <p class="info-text">
                    123 Business Street<br>
                    Tech City, TC 12345<br>
                    Philippines
                </p>
            </div>
        </div>
        
        <div class="contact-info-card mb-4">
            <div class="info-icon bg-success-gradient">
                <i class="fas fa-phone-alt"></i>
            </div>
            <div class="info-content">
                <h3 class="info-title">Call Us</h3>
                <p class="info-text">
                    <a href="tel:+1234567890">+1 (234) 567-890</a><br>
                    Mon - Fri, 9AM - 6PM
                </p>
            </div>
        </div>
        
        <div class="contact-info-card mb-4">
            <div class="info-icon bg-info-gradient">
                <i class="fas fa-envelope"></i>
            </div>
            <div class="info-content">
                <h3 class="info-title">Email Us</h3>
                <p class="info-text">
                    <a href="mailto:info@myci.com">info@myci.com</a><br>
                    <a href="mailto:support@myci.com">support@myci.com</a>
                </p>
            </div>
        </div>
        
        <!-- Social Media -->
        <div class="social-card">
            <h3 class="social-title mb-3">
                <i class="fas fa-share-alt me-2"></i>Follow Us
            </h3>
            <div class="social-buttons">
                <a href="#" class="social-btn facebook">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#" class="social-btn twitter">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="#" class="social-btn instagram">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="#" class="social-btn linkedin">
                    <i class="fab fa-linkedin-in"></i>
                </a>
                <a href="#" class="social-btn github">
                    <i class="fab fa-github"></i>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- FAQ Section -->
<div class="faq-section mt-5">
    <div class="text-center mb-4">
        <h2 class="faq-title">
            <i class="fas fa-question-circle me-2"></i>Frequently Asked Questions
        </h2>
    </div>
    
    <div class="row g-4">
        <div class="col-md-6">
            <div class="faq-card">
                <h4 class="faq-question">
                    <i class="fas fa-clock me-2"></i>What are your business hours?
                </h4>
                <p class="faq-answer">
                    We're available Monday through Friday, 9:00 AM to 6:00 PM (PST). 
                    We typically respond to all inquiries within 24 hours.
                </p>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="faq-card">
                <h4 class="faq-question">
                    <i class="fas fa-reply me-2"></i>How quickly will I get a response?
                </h4>
                <p class="faq-answer">
                    Most inquiries receive a response within 24 hours during business days. 
                    Urgent matters are prioritized and handled even faster.
                </p>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="faq-card">
                <h4 class="faq-question">
                    <i class="fas fa-headset me-2"></i>Do you offer phone support?
                </h4>
                <p class="faq-answer">
                    Yes! You can reach our support team by phone during business hours. 
                    We also offer email support for non-urgent matters.
                </p>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="faq-card">
                <h4 class="faq-question">
                    <i class="fas fa-globe me-2"></i>Do you support international clients?
                </h4>
                <p class="faq-answer">
                    Absolutely! We work with clients worldwide and are happy to accommodate 
                    different time zones and communication preferences.
                </p>
            </div>
        </div>
    </div>
</div>

<style>
    /* Contact Header */
    .contact-header {
        padding: 2rem 0;
    }
    
    .contact-badge .badge-text {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 0.5rem 1.5rem;
        border-radius: 50px;
        font-size: 0.875rem;
        font-weight: 600;
        box-shadow: 0 4px 6px -1px rgba(102, 126, 234, 0.3);
    }
    
    .contact-title {
        font-size: 3rem;
        font-weight: 800;
        color: #1e293b;
    }
    
    .gradient-text {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
    
    .contact-subtitle {
        font-size: 1.125rem;
        color: #64748b;
        max-width: 700px;
        margin: 0 auto;
        line-height: 1.8;
    }
    
    /* Contact Form Card */
    .contact-form-card {
        background: white;
        border-radius: 24px;
        padding: 2.5rem;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        border: 1px solid rgba(0, 0, 0, 0.05);
    }
    
    .form-title {
        font-size: 1.75rem;
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 0.5rem;
    }
    
    .form-subtitle {
        color: #64748b;
        font-size: 1rem;
    }
    
    .form-group-custom {
        margin-bottom: 1.5rem;
    }
    
    .form-label-custom {
        display: block;
        font-weight: 600;
        color: #475569;
        margin-bottom: 0.5rem;
        font-size: 0.938rem;
    }
    
    .form-control-custom {
        width: 100%;
        padding: 0.875rem 1rem;
        border: 2px solid #e2e8f0;
        border-radius: 12px;
        font-size: 1rem;
        transition: all 0.3s ease;
        background: #f8fafc;
    }
    
    .form-control-custom:focus {
        outline: none;
        border-color: #667eea;
        background: white;
        box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
    }
    
    .btn-submit-custom {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 1rem 2rem;
        border: none;
        border-radius: 12px;
        font-weight: 600;
        font-size: 1.063rem;
        box-shadow: 0 10px 15px -3px rgba(102, 126, 234, 0.3);
        transition: all 0.3s ease;
        cursor: pointer;
    }
    
    .btn-submit-custom:hover {
        transform: translateY(-2px);
        box-shadow: 0 15px 25px -3px rgba(102, 126, 234, 0.4);
    }
    
    /* Contact Info Cards */
    .contact-info-card {
        background: white;
        border-radius: 20px;
        padding: 1.75rem;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        border: 1px solid rgba(0, 0, 0, 0.05);
        display: flex;
        align-items: start;
        gap: 1.25rem;
        transition: all 0.3s ease;
    }
    
    .contact-info-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.15);
    }
    
    .info-icon {
        width: 60px;
        height: 60px;
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        color: white;
        flex-shrink: 0;
    }
    
    .bg-primary-gradient {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }
    
    .bg-success-gradient {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
    }
    
    .bg-info-gradient {
        background: linear-gradient(135deg, #06b6d4 0%, #0891b2 100%);
    }
    
    .info-content {
        flex: 1;
    }
    
    .info-title {
        font-size: 1.25rem;
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 0.5rem;
    }
    
    .info-text {
        color: #64748b;
        margin: 0;
        line-height: 1.7;
    }
    
    .info-text a {
        color: #667eea;
        text-decoration: none;
        font-weight: 600;
        transition: color 0.3s ease;
    }
    
    .info-text a:hover {
        color: #764ba2;
    }
    
    /* Social Card */
    .social-card {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 20px;
        padding: 2rem;
        text-align: center;
        color: white;
    }
    
    .social-title {
        font-size: 1.25rem;
        font-weight: 700;
        margin-bottom: 1rem;
    }
    
    .social-buttons {
        display: flex;
        justify-content: center;
        gap: 1rem;
        flex-wrap: wrap;
    }
    
    .social-btn {
        width: 50px;
        height: 50px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        text-decoration: none;
        transition: all 0.3s ease;
        font-size: 1.25rem;
    }
    
    .social-btn:hover {
        transform: translateY(-4px);
        color: white;
    }
    
    .social-btn.facebook {
        background: #1877f2;
    }
    
    .social-btn.twitter {
        background: #1da1f2;
    }
    
    .social-btn.instagram {
        background: linear-gradient(45deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%);
    }
    
    .social-btn.linkedin {
        background: #0077b5;
    }
    
    .social-btn.github {
        background: #333;
    }
    
    /* FAQ Section */
    .faq-section {
        padding: 3rem 0;
    }
    
    .faq-title {
        font-size: 2rem;
        font-weight: 800;
        color: #1e293b;
        margin-bottom: 1rem;
    }
    
    .faq-card {
        background: white;
        border-radius: 16px;
        padding: 2rem;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        border: 1px solid rgba(0, 0, 0, 0.05);
        height: 100%;
        transition: all 0.3s ease;
    }
    
    .faq-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.15);
    }
    
    .faq-question {
        font-size: 1.125rem;
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 0.75rem;
    }
    
    .faq-question i {
        color: #667eea;
    }
    
    .faq-answer {
        color: #64748b;
        margin: 0;
        line-height: 1.7;
    }
    
    /* Responsive Design */
    @media (max-width: 768px) {
        .contact-title {
            font-size: 2rem;
        }
        
        .contact-form-card {
            padding: 1.5rem;
        }
        
        .contact-info-card {
            flex-direction: column;
            text-align: center;
        }
        
        .info-icon {
            margin: 0 auto;
        }
        
        .social-buttons {
            gap: 0.75rem;
        }
    }
</style>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    document.getElementById('contactForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Get form values
        const firstName = document.getElementById('firstName').value;
        const lastName = document.getElementById('lastName').value;
        const email = document.getElementById('email').value;
        const subject = document.getElementById('subject').value;
        const message = document.getElementById('message').value;
        
        // Simple validation
        if (!firstName || !lastName || !email || !subject || !message) {
            alert('Please fill in all fields');
            return;
        }
        
        // Here you would normally send the data to your backend
        // For now, we'll just show a success message
        alert('Thank you for your message! We\'ll get back to you soon.');
        
        // Reset form
        this.reset();
    });
</script>
<?= $this->endSection() ?>