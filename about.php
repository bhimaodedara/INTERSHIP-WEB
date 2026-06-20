<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Computer Engineering Department</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/design-system.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body>

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
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link active" href="about.php">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="lab.php">Labs</a></li>
                    <li class="nav-item"><a class="nav-link" href="admission.php">Admissions</a></li>
                    <li class="nav-item"><a class="nav-link" href="faculty.php">Faculty</a></li>
                    <li class="nav-item"><a class="nav-link" href="gallery.php">Gallery</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                    <li class="nav-item"><a class="nav-link" href="classroom.php">Classrooms</a></li>
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

<!-- Hero -->
<section class="hero-gradient py-5" style="padding-top: 100px !important; padding-bottom: 80px !important;">
    <div class="container text-center">
        <h1 class="display-4 fw-bold mb-3" style="color: white;">About Our Department</h1>
        <p class="lead mx-auto" style="color: rgba(255,255,255,0.8); max-width: 700px;">
            Diploma in Computer Engineering Program at Government Polytechnic Porbandar started in 2001 with 30 intake. Today, we proudly host 90 students with highly meritorious academic backgrounds.
        </p>
    </div>
</section>

<!-- Mission & Vision -->
<section class="py-5" style="padding: 80px 0 !important;">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <span class="badge px-3 py-2 mb-3" style="background: rgba(6,182,212,0.1); color: var(--secondary); border: 1px solid rgba(6,182,212,0.2);">
                    <i class="fas fa-bullseye me-1"></i> Our Purpose
                </span>
                <h2 class="fw-bold mb-4" style="font-size: 2.2rem; color: var(--text);">Mission & Vision</h2>

                <div class="mb-4">
                    <h5 class="fw-bold mb-2" style="color: var(--secondary);"><i class="fas fa-eye me-2"></i>Vision</h5>
                    <p class="text-muted">To achieve excellence in Computer Engineering by imparting technical and problem-solving skills along with ethical values to meet industrial requirements having social and environmental concern.</p>
                </div>

                <div class="mb-4">
                    <h5 class="fw-bold mb-2" style="color: var(--accent);"><i class="fas fa-rocket me-2"></i>Mission</h5>
                    <p class="text-muted">To provide a learning ambience to enhance discipline knowledge, technical skill and problem-solving ability. To motivate students for lifelong learning to adapt challenges in rapidly changing technology.</p>
                </div>

                <a href="admission.php" class="btn-primary-custom">
                    <i class="fas fa-book-open"></i> Explore Our Programs
                </a>
            </div>
            <div class="col-lg-6">
                <div class="position-relative">
                    <div class="rounded-4 overflow-hidden shadow-lg" style="border: 4px solid var(--border);">
                        <img src="https://images.unsplash.com/photo-1565688534245-05d6b5be184a?ixlib=rb-4.0.3" alt="Campus" class="img-fluid" style="width:100%; object-fit:cover; min-height: 400px;">
                    </div>
                    <div class="position-absolute" style="bottom: -20px; left: -20px; background: linear-gradient(135deg, var(--secondary), #0891b2); color: white; padding: 20px 30px; border-radius: 12px; box-shadow: var(--shadow-lg);">
                        <div class="fw-bold fs-4">23+</div>
                        <div class="small">Years of Excellence</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Stats -->
<section class="py-5" style="background: linear-gradient(135deg, #0f172a, #1e3a5f); padding: 80px 0 !important;">
    <div class="container">
        <div class="row text-center g-4">
            <div class="col-md-3 col-6">
                <div class="stat-card">
                    <h3>1,500+</h3>
                    <p class="mb-0">Students Enrolled</p>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="stat-card">
                    <h3>10+</h3>
                    <p class="mb-0">Faculty Members</p>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="stat-card">
                    <h3>90</h3>
                    <p class="mb-0">Annual Intake</p>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="stat-card">
                    <h3>50+</h3>
                    <p class="mb-0">Years of Institution</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Timeline -->
<section class="py-5" style="padding: 80px 0 !important; background: linear-gradient(180deg, var(--bg) 0%, rgba(6,182,212,0.03) 100%);">
    <div class="container">
        <div class="section-header">
            <h2>Our History</h2>
            <p>Key milestones that have shaped our department over the decades</p>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="timeline-item">
                    <div class="card-modern p-4">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <h4 class="fw-bold mb-0" style="color: var(--text);">Foundation</h4>
                            <span class="badge" style="background: var(--secondary); color: white;">2001</span>
                        </div>
                        <p class="text-muted mb-0">The Computer Engineering Department was established with a focus on engineering and scientific research, starting with an intake of 30 students.</p>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="card-modern p-4">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <h4 class="fw-bold mb-0" style="color: var(--text);">Expansion</h4>
                            <span class="badge" style="background: var(--accent); color: #0f172a;">2010</span>
                        </div>
                        <p class="text-muted mb-0">Added advanced computing programs and modern lab infrastructure. Intake increased to 60 students to meet growing demand.</p>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="card-modern p-4">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <h4 class="fw-bold mb-0" style="color: var(--text);">Global Recognition</h4>
                            <span class="badge" style="background: var(--secondary); color: white;">2015</span>
                        </div>
                        <p class="text-muted mb-0">Achieved state-level acclaim for research in technology and sustainable development. Industry partnerships strengthened.</p>
                    </div>
                </div>
                <div class="timeline-item" style="border-left-color: transparent;">
                    <div class="card-modern p-4">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <h4 class="fw-bold mb-0" style="color: var(--text);">Modern Era</h4>
                            <span class="badge" style="background: var(--accent); color: #0f172a;">2023</span>
                        </div>
                        <p class="text-muted mb-0">Launched AI & ML specializations, expanded to 90 intake, and built cutting-edge Cloud Computing and Cybersecurity labs.</p>
                    </div>
                </div>
            </div>
        </div>
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