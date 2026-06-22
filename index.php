<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Computer Engineering Department</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/design-system.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body>

<!-- Header -->
<header class="navbar-modern sticky-top">
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center gap-3" href="index.php">
                <img src="assets/images/main logo.jpeg" alt="University Logo" height="52" class="rounded-2" style="object-fit:cover;">
                <div class="d-flex flex-column">
                    <span class="fw-bold fs-5" style="color: var(--text); line-height:1.2;">Computer Engineering</span>
                    <span class="small" style="color: var(--secondary); font-size: 0.75rem; letter-spacing: 0.05em;">GOVT. POLYTECHNIC PORBANDAR</span>
                </div>
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <i class="fas fa-bars" style="color: var(--text);"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center gap-1">
                    <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="lab.php">Labs</a></li>
                    <li class="nav-item"><a class="nav-link" href="admission.php">Admissions</a></li>
                    <li class="nav-item"><a class="nav-link" href="faculty.php">Faculty</a></li>
                    <li class="nav-item"><a class="nav-link" href="gallery.php">Gallery</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                    <li class="nav-item"><a class="nav-link" href="classroom.php">Classrooms</a></li>
                    <li class="nav-item ms-lg-2">
                        <a href="admin/admin.php" class="btn btn-sm fw-bold" style="background: var(--accent); color: #0f172a; border-radius: 8px;">
                            <i class="fas fa-user-shield me-1"></i> Admin
                        </a>
                    </li>
                    <li class="nav-item ms-lg-2">
                        <button id="theme-toggle-btn" class="theme-toggle" title="Toggle Dark Mode">
                            <i class="fas fa-moon"></i>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<!-- Hero Section -->
<section class="hero-gradient py-5" style="padding-top: 120px !important; padding-bottom: 100px !important;">
    <div class="container text-center py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8 animate-fade-up">
                <span class="badge px-3 py-2 mb-3" style="background: rgba(6,182,212,0.15); color: var(--secondary-light); border: 1px solid rgba(6,182,212,0.3); font-weight: 500;">
                    <i class="fas fa-award me-1"></i> Excellence in Technical Education Since 1960
                </span>
                <h1 class="display-3 fw-bold mb-4" style="color: white; text-shadow: 0 2px 10px rgba(0,0,0,0.3);">
                    Shape Your Future With<br><span style="background: linear-gradient(90deg, var(--secondary-light), var(--accent-light)); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Quality Education</span>
                </h1>
                <p class="lead mb-5 mx-auto" style="color: rgba(255,255,255,0.85); max-width: 600px;">
                    Join a vibrant community of learners and innovators at one of Gujarat's leading institutions for diploma engineering and research.
                </p>
                <div class="d-flex justify-content-center gap-3 flex-wrap">
                    <a href="gallery.php" class="btn-outline-custom" style="color: white; border-color: rgba(255,255,255,0.4);">
                        <i class="fas fa-images"></i> Explore Campus
                    </a>
                    <a href="admission.php" class="btn-accent-custom">
                        <i class="fas fa-paper-plane"></i> Apply Now
                    </a>
                </div>
            </div>
        </div>

        <!-- Decorative stats in hero -->
        <div class="row mt-5 pt-5 justify-content-center">
            <div class="col-6 col-md-3 mb-3">
                <div class="stat-card mx-2">
                    <h3>1,500+</h3>
                    <p class="mb-0 small" style="color: rgba(255,255,255,0.7);">Students Enrolled</p>
                </div>
            </div>
            <div class="col-6 col-md-3 mb-3">
                <div class="stat-card mx-2">
                    <h3>10+</h3>
                    <p class="mb-0 small" style="color: rgba(255,255,255,0.7);">Expert Faculty</p>
                </div>
            </div>
            <div class="col-6 col-md-3 mb-3">
                <div class="stat-card mx-2">
                    <h3>90</h3>
                    <p class="mb-0 small" style="color: rgba(255,255,255,0.7);">Annual Intake</p>
                </div>
            </div>
            <div class="col-6 col-md-3 mb-3">
                <div class="stat-card mx-2">
                    <h3>50+</h3>
                    <p class="mb-0 small" style="color: rgba(255,255,255,0.7);">Years of Excellence</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="py-5" style="padding: 80px 0 !important;">
    <div class="container">
        <div class="section-header">
            <h2>Why Choose Our Department</h2>
            <p>We provide world-class education with state-of-the-art facilities and experienced faculty</p>
        </div>
        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="card-modern h-100 text-center p-4">
                    <div class="mb-4 d-inline-flex align-items-center justify-content-center rounded-3" style="width: 64px; height: 64px; background: linear-gradient(135deg, rgba(6,182,212,0.15), rgba(6,182,212,0.05)); color: var(--secondary);">
                        <i class="fas fa-graduation-cap fa-2x"></i>
                    </div>
                    <h3 class="h5 mb-3">Academic Excellence</h3>
                    <p class="text-muted mb-0">Our programs are consistently ranked among the top in Gujarat for quality and innovation.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card-modern h-100 text-center p-4">
                    <div class="mb-4 d-inline-flex align-items-center justify-content-center rounded-3" style="width: 64px; height: 64px; background: linear-gradient(135deg, rgba(245,158,11,0.15), rgba(245,158,11,0.05)); color: var(--accent);">
                        <i class="fas fa-flask fa-2x"></i>
                    </div>
                    <h3 class="h5 mb-3">Research Opportunities</h3>
                    <p class="text-muted mb-0">Work alongside renowned faculty on cutting-edge research projects across disciplines.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card-modern h-100 text-center p-4">
                    <div class="mb-4 d-inline-flex align-items-center justify-content-center rounded-3" style="width: 64px; height: 64px; background: linear-gradient(135deg, rgba(16,185,129,0.15), rgba(16,185,129,0.05)); color: #10b981;">
                        <i class="fas fa-globe-americas fa-2x"></i>
                    </div>
                    <h3 class="h5 mb-3">Global Community</h3>
                    <p class="text-muted mb-0">Join a diverse community of students and scholars from across the nation.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card-modern h-100 text-center p-4">
                    <div class="mb-4 d-inline-flex align-items-center justify-content-center rounded-3" style="width: 64px; height: 64px; background: linear-gradient(135deg, rgba(139,92,246,0.15), rgba(139,92,246,0.05)); color: #8b5cf6;">
                        <i class="fas fa-briefcase fa-2x"></i>
                    </div>
                    <h3 class="h5 mb-3">Career Development</h3>
                    <p class="text-muted mb-0">Our career services help students secure internships and employment with top companies.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Programs Section -->
<section class="py-5" style="background: linear-gradient(180deg, var(--bg) 0%, rgba(6,182,212,0.05) 100%); padding: 80px 0 !important;">
    <div class="container">
        <div class="section-header">
            <h2>Academic Programs</h2>
            <p>Explore our diverse range of diploma and certificate programs</p>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card-modern h-100">
                    <div class="p-4 text-center" style="background: linear-gradient(135deg, #0f172a, #1e3a5f); border-radius: var(--radius) var(--radius) 0 0;">
                        <i class="fas fa-laptop-code fa-3x mb-3" style="color: var(--secondary);"></i>
                        <h3 class="text-white mb-0">Computer Engineering</h3>
                    </div>
                    <div class="card-body">
                        <p class="text-muted mb-3">Our flagship program combining theoretical knowledge with practical application in state-of-the-art labs.</p>
                        <ul class="list-unstyled text-muted small mb-4">
                            <li class="mb-2"><i class="fas fa-check-circle me-2" style="color: var(--secondary);"></i>Programming & Software Dev</li>
                            <li class="mb-2"><i class="fas fa-check-circle me-2" style="color: var(--secondary);"></i>AI & Machine Learning</li>
                            <li class="mb-2"><i class="fas fa-check-circle me-2" style="color: var(--secondary);"></i>Cloud & Cybersecurity</li>
                        </ul>
                        <a href="admission.php" class="btn-primary-custom w-100">Learn More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-modern h-100">
                    <div class="p-4 text-center" style="background: linear-gradient(135deg, #1e293b, #334155); border-radius: var(--radius) var(--radius) 0 0;">
                        <i class="fas fa-bolt fa-3x mb-3" style="color: var(--accent);"></i>
                        <h3 class="text-white mb-0">Electrical Engineering</h3>
                    </div>
                    <div class="card-body">
                        <p class="text-muted mb-3">Develop expertise in electrical systems, power generation, and renewable energy technologies.</p>
                        <ul class="list-unstyled text-muted small mb-4">
                            <li class="mb-2"><i class="fas fa-check-circle me-2" style="color: var(--accent);"></i>Power Systems</li>
                            <li class="mb-2"><i class="fas fa-check-circle me-2" style="color: var(--accent);"></i>Industrial Automation</li>
                            <li class="mb-2"><i class="fas fa-check-circle me-2" style="color: var(--accent);"></i>Renewable Energy</li>
                        </ul>
                        <a href="admission.php" class="btn-primary-custom w-100">Learn More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-modern h-100">
                    <div class="p-4 text-center" style="background: linear-gradient(135deg, #0f172a, #1e293b); border-radius: var(--radius) var(--radius) 0 0;">
                        <i class="fas fa-cogs fa-3x mb-3" style="color: #8b5cf6;"></i>
                        <h3 class="text-white mb-0">Mechanical Engineering</h3>
                    </div>
                    <div class="card-body">
                        <p class="text-muted mb-3">Master mechanical design, manufacturing processes, and industrial engineering practices.</p>
                        <ul class="list-unstyled text-muted small mb-4">
                            <li class="mb-2"><i class="fas fa-check-circle me-2" style="color: #8b5cf6;"></i>CAD / CAM Design</li>
                            <li class="mb-2"><i class="fas fa-check-circle me-2" style="color: #8b5cf6;"></i>Thermal Engineering</li>
                            <li class="mb-2"><i class="fas fa-check-circle me-2" style="color: #8b5cf6;"></i>Industrial Robotics</li>
                        </ul>
                        <a href="admission.php" class="btn-primary-custom w-100">Learn More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-modern h-100">
                    <div class="p-4 text-center" style="background: linear-gradient(135deg, #0f172a, #1e293b); border-radius: var(--radius) var(--radius) 0 0;">
                        <i class="fas fa-hard-hat fa-3x mb-3" style="color: #d41515;"></i>
                        <h3 class="text-white mb-0">Civil Engineering</h3>
                    </div>
                    <div class="card-body">
                        <p class="text-muted mb-3">Master civil engineering principles, construction methods, and infrastructure development.</p>
                        <ul class="list-unstyled text-muted small mb-4">
                            <li class="mb-2"><i class="fas fa-check-circle me-2" style="color: #d41515;"></i>Civil Structure Design</li>
                            <li class="mb-2"><i class="fas fa-check-circle me-2" style="color: #d41515;"></i>Construction Management</li>
                            <li class="mb-2"><i class="fas fa-check-circle me-2" style="color: #d41515;"></i>Infrastructure Development</li>
                        </ul>
                        <a href="admission.php" class="btn-primary-custom w-100">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- CTA Section -->
<section class="py-5" style="background: linear-gradient(135deg, #0f172a, #1e3a5f, #0f172a); position: relative; overflow: hidden; padding: 100px 0 !important;">
    <div style="position: absolute; inset: 0; opacity: 0.1; background: radial-gradient(circle at 30% 50%, var(--secondary), transparent 50%), radial-gradient(circle at 70% 50%, var(--accent), transparent 50%);"></div>
    <div class="container text-center position-relative">
        <h2 class="display-5 fw-bold mb-4" style="color: white;">Begin Your Educational Journey Today</h2>
        <p class="lead mb-5 mx-auto" style="color: rgba(255,255,255,0.8); max-width: 600px;">
            Applications for the next academic year are now being accepted. Don't miss your chance to join our vibrant learning community.
        </p>
        <a href="admission.php" class="btn-accent-custom btn-lg" style="padding: 16px 40px; font-size: 1.1rem;">
            <i class="fas fa-paper-plane"></i> Apply Now
        </a>
    </div>
</section>

<!-- Footer -->
<footer class="footer-modern pt-5 pb-4">
    <div class="container">
        <div class="row g-4 mb-5">
            <div class="col-lg-4">
                <div class="d-flex align-items-center gap-3 mb-3">
                    <img src="assets/images/main logo.jpeg" alt="Logo" height="48" class="rounded-2" style="object-fit:cover;">
                    <div>
                        <h5 class="mb-0">Computer Engineering</h5>
                        <small class="text-muted">Govt. Polytechnic Porbandar</small>
                    </div>
                </div>
                <p class="mb-4" style="color: #94a3b8;">The Computer Engineering Department is dedicated to excellence in teaching, research, and public service since 1960.</p>
                <div class="d-flex gap-2">
                    <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
            <div class="col-lg-2 col-md-4">
                <h5>Quick Links</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="index.php"><i class="fas fa-chevron-right me-1 small"></i> Home</a></li>
                    <li class="mb-2"><a href="about.php"><i class="fas fa-chevron-right me-1 small"></i> About Us</a></li>
                    <li class="mb-2"><a href="lab.php"><i class="fas fa-chevron-right me-1 small"></i> Labs</a></li>
                    <li class="mb-2"><a href="admission.php"><i class="fas fa-chevron-right me-1 small"></i> Admissions</a></li>
                    <li class="mb-2"><a href="faculty.php"><i class="fas fa-chevron-right me-1 small"></i> Faculty</a></li>
                    <li class="mb-2"><a href="contact.php"><i class="fas fa-chevron-right me-1 small"></i> Contact</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-4">
                <h5>Programs</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="admission.php"><i class="fas fa-chevron-right me-1 small"></i> Computer Engineering</a></li>
                    <li class="mb-2"><a href="admission.php"><i class="fas fa-chevron-right me-1 small"></i> Electrical Engineering</a></li>
                    <li class="mb-2"><a href="admission.php"><i class="fas fa-chevron-right me-1 small"></i> Civil Engineering</a></li>
                    <li class="mb-2"><a href="admission.php"><i class="fas fa-chevron-right me-1 small"></i> Mechanical Engineering</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-4">
                <h5>Contact Info</h5>
                <ul class="list-unstyled" style="color: #94a3b8;">
                    <li class="mb-3 d-flex align-items-start gap-2">
                        <i class="fas fa-map-marker-alt mt-1" style="color: var(--secondary);"></i>
                        <span>Dut Sai Nagar, Porbandar,<br>Gujarat 360575</span>
                    </li>
                    <li class="mb-3 d-flex align-items-center gap-2">
                        <i class="fas fa-phone" style="color: var(--secondary);"></i>
                        <span>(0286) 224-1234</span>
                    </li>
                    <li class="mb-3 d-flex align-items-center gap-2">
                        <i class="fas fa-envelope" style="color: var(--secondary);"></i>
                        <span>info@gpporbandar.ac.in</span>
                    </li>
                    <li class="d-flex align-items-center gap-2">
                        <i class="fas fa-clock" style="color: var(--secondary);"></i>
                        <span>Mon-Fri: 8:00 AM - 6:00 PM</span>
                    </li>
                </ul>
            </div>
        </div>
        <div class="text-center pt-4 border-top" style="border-color: rgba(255,255,255,0.1) !important;">
            <p class="mb-0 small">&copy; 2023 Computer Engineering Department, GPP. All Rights Reserved.</p>
        </div>
    </div>
</footer>

<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/dark-mode.js"></script>
</body>
</html>