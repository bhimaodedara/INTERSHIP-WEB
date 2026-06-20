<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admissions - Computer Engineering Department</title>
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
                    <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="lab.php">Labs</a></li>
                    <li class="nav-item"><a class="nav-link active" href="admission.php">Admissions</a></li>
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
        <span class="badge px-3 py-2 mb-3" style="background: rgba(245,158,11,0.15); color: var(--accent-light); border: 1px solid rgba(245,158,11,0.3);">
            <i class="fas fa-door-open me-1"></i> Now Accepting Applications
        </span>
        <h1 class="display-4 fw-bold mb-3" style="color: white;">Admissions</h1>
        <p class="lead mx-auto" style="color: rgba(255,255,255,0.8); max-width: 700px;">
            Join our community of innovators. Learn about the admission process, eligibility criteria, and key dates for the upcoming academic year.
        </p>
        <a href="apply.php" class="btn-accent-custom btn-lg mt-4" style="padding: 14px 36px;">
            <i class="fas fa-paper-plane"></i> Apply Online
        </a>
    </div>
</section>

<!-- Admission Process -->
<section class="py-5" style="padding: 80px 0 !important; background: linear-gradient(180deg, var(--bg) 0%, rgba(6,182,212,0.03) 100%);">
    <div class="container">
        <div class="section-header">
            <h2>Admission Process</h2>
            <p>Follow these simple steps to apply for programs at Government Polytechnic Porbandar</p>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card-modern h-100 text-center p-4">
                    <div class="d-inline-flex align-items-center justify-content-center rounded-circle mb-4" style="width: 72px; height: 72px; background: linear-gradient(135deg, var(--secondary), #0891b2); color: white; font-size: 1.5rem;">
                        <i class="fas fa-file-alt"></i>
                    </div>
                    <h5 class="fw-bold mb-3">Step 1: Online Application</h5>
                    <p class="text-muted mb-0">Submit your application through our online portal with all required documents and personal details.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-modern h-100 text-center p-4">
                    <div class="d-inline-flex align-items-center justify-content-center rounded-circle mb-4" style="width: 72px; height: 72px; background: linear-gradient(135deg, var(--accent), #d97706); color: white; font-size: 1.5rem;">
                        <i class="fas fa-clipboard-check"></i>
                    </div>
                    <h5 class="fw-bold mb-3">Step 2: Document Verification</h5>
                    <p class="text-muted mb-0">Upload and verify academic certificates, ID proofs, and other required documentation.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-modern h-100 text-center p-4">
                    <div class="d-inline-flex align-items-center justify-content-center rounded-circle mb-4" style="width: 72px; height: 72px; background: linear-gradient(135deg, #10b981, #059669); color: white; font-size: 1.5rem;">
                        <i class="fas fa-user-check"></i>
                    </div>
                    <h5 class="fw-bold mb-3">Step 3: Interview / Test</h5>
                    <p class="text-muted mb-0">Attend an interview or entrance exam based on your selected program requirements.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Eligibility -->
<section class="py-5" style="padding: 80px 0 !important;">
    <div class="container">
        <div class="section-header">
            <h2>Eligibility Criteria</h2>
            <p>Check if you meet the requirements for admission to GPP programs</p>
        </div>
        <div class="row g-4">
            <div class="col-md-6">
                <div class="card-modern h-100 p-4">
                    <div class="d-flex align-items-center gap-3 mb-4">
                        <div class="d-flex align-items-center justify-content-center rounded-3" style="width: 48px; height: 48px; background: rgba(6,182,212,0.1); color: var(--secondary);">
                            <i class="fas fa-user-graduate fa-lg"></i>
                        </div>
                        <h5 class="fw-bold mb-0">Undergraduate (Diploma)</h5>
                    </div>
                    <ul class="list-unstyled text-muted">
                        <li class="mb-3 d-flex align-items-start gap-2">
                            <i class="fas fa-check-circle mt-1" style="color: var(--secondary);"></i>
                            <span>Minimum 50% in 10th Standard (Science/Maths/Social Science)</span>
                        </li>
                        <li class="mb-3 d-flex align-items-start gap-2">
                            <i class="fas fa-check-circle mt-1" style="color: var(--secondary);"></i>
                            <span>Valid GUJCET or CBSE Board scores</span>
                        </li>
                        <li class="d-flex align-items-start gap-2">
                            <i class="fas fa-check-circle mt-1" style="color: var(--secondary);"></i>
                            <span>Age limit: Minimum 16 years</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card-modern h-100 p-4">
                    <div class="d-flex align-items-center gap-3 mb-4">
                        <div class="d-flex align-items-center justify-content-center rounded-3" style="width: 48px; height: 48px; background: rgba(245,158,11,0.1); color: var(--accent);">
                            <i class="fas fa-graduation-cap fa-lg"></i>
                        </div>
                        <h5 class="fw-bold mb-0">Lateral Entry (After 12th)</h5>
                    </div>
                    <ul class="list-unstyled text-muted">
                        <li class="mb-3 d-flex align-items-start gap-2">
                            <i class="fas fa-check-circle mt-1" style="color: var(--accent);"></i>
                            <span>12th Science (PCM) with 55% aggregate</span>
                        </li>
                        <li class="mb-3 d-flex align-items-start gap-2">
                            <i class="fas fa-check-circle mt-1" style="color: var(--accent);"></i>
                            <span>ITI certificate in relevant trade preferred</span>
                        </li>
                        <li class="d-flex align-items-start gap-2">
                            <i class="fas fa-check-circle mt-1" style="color: var(--accent);"></i>
                            <span>Direct admission to 2nd year</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Important Dates -->
<section class="py-5" style="background: linear-gradient(180deg, var(--bg) 0%, rgba(6,182,212,0.03) 100%); padding: 80px 0 !important;">
    <div class="container">
        <div class="section-header">
            <h2>Important Dates</h2>
            <p>Key deadlines for the 2024-2025 academic year at GPP</p>
        </div>
        <div class="row g-4">
            <div class="col-md-6">
                <div class="card-modern h-100 p-4">
                    <h5 class="fw-bold mb-4" style="color: var(--secondary);"><i class="fas fa-calendar-alt me-2"></i>Application Deadlines</h5>
                    <div class="d-flex justify-content-between align-items-center p-3 mb-3 rounded-3" style="background: rgba(6,182,212,0.05); border-left: 4px solid var(--secondary);">
                        <div>
                            <div class="fw-bold">Early Bird Applications</div>
                            <div class="text-muted small">Get priority processing</div>
                        </div>
                        <span class="badge" style="background: var(--secondary); color: white;">Dec 31, 2024</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center p-3 mb-3 rounded-3" style="background: rgba(245,158,11,0.05); border-left: 4px solid var(--accent);">
                        <div>
                            <div class="fw-bold">Regular Applications</div>
                            <div class="text-muted small">Standard admission cycle</div>
                        </div>
                        <span class="badge" style="background: var(--accent); color: #0f172a;">Mar 15, 2025</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center p-3 rounded-3" style="background: rgba(100,116,139,0.05); border-left: 4px solid #64748b;">
                        <div>
                            <div class="fw-bold">Late Applications</div>
                            <div class="text-muted small">Subject to seat availability</div>
                        </div>
                        <span class="badge bg-secondary">Apr 30, 2025</span>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card-modern h-100 p-4">
                    <h5 class="fw-bold mb-4" style="color: var(--accent);"><i class="fas fa-tasks me-2"></i>Exams & Results</h5>
                    <div class="d-flex justify-content-between align-items-center p-3 mb-3 rounded-3" style="background: rgba(6,182,212,0.05); border-left: 4px solid var(--secondary);">
                        <div>
                            <div class="fw-bold">GUJCET Exam</div>
                            <div class="text-muted small">State-level entrance test</div>
                        </div>
                        <span class="badge" style="background: var(--secondary); color: white;">Apr 2025</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center p-3 mb-3 rounded-3" style="background: rgba(245,158,11,0.05); border-left: 4px solid var(--accent);">
                        <div>
                            <div class="fw-bold">Counseling & Interviews</div>
                            <div class="text-muted small">Document verification round</div>
                        </div>
                        <span class="badge" style="background: var(--accent); color: #0f172a;">May-Jun 2025</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center p-3 rounded-3" style="background: rgba(16,185,129,0.05); border-left: 4px solid #10b981;">
                        <div>
                            <div class="fw-bold">Admission Results</div>
                            <div class="text-muted small">Final merit list published</div>
                        </div>
                        <span class="badge" style="background: #10b981; color: white;">Jun 30, 2025</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Apply Online CTA -->
<section class="py-5" style="background: linear-gradient(135deg, #0f172a, #1e3a5f); padding: 80px 0 !important; position: relative; overflow: hidden;">
    <div style="position: absolute; inset: 0; opacity: 0.1; background: radial-gradient(circle at 50% 50%, var(--accent), transparent 60%);"></div>
    <div class="container text-center position-relative">
        <h2 class="fw-bold mb-3" style="color: white;">Apply Online</h2>
        <p class="mx-auto mb-5" style="color: rgba(255,255,255,0.8); max-width: 500px;">Ready to start your journey? Submit your application now and take the first step toward a successful engineering career.</p>
        <a href="apply.php" class="btn-accent-custom btn-lg" style="padding: 14px 36px;">
            <i class="fas fa-paper-plane"></i> Online Application Form
        </a>
        <p class="mt-4 mb-0" style="color: rgba(255,255,255,0.6);"><i class="fas fa-envelope me-1"></i> For assistance: admissions@gpporbandar.ac.in</p>
    </div>
</section>

<!-- Important Links -->
<section class="py-5" style="padding: 80px 0 !important;">
    <div class="container">
        <div class="section-header">
            <h2>Important Links</h2>
            <p>Access key resources from the official admission portal</p>
        </div>
        <div class="row g-3">
            <div class="col-md-3 col-sm-6">
                <a href="https://sites.google.com/view/gppr-cteguj/admission-form" target="_blank" class="text-decoration-none">
                    <div class="card-modern p-4 text-center h-100" style="transition: var(--transition);">
                        <i class="fas fa-file-pdf fa-2x mb-3" style="color: var(--secondary);"></i>
                        <h6 class="fw-bold mb-1" style="color: var(--text);">Admission Form</h6>
                        <span class="small" style="color: var(--secondary);">Download <i class="fas fa-external-link-alt ms-1 small"></i></span>
                    </div>
                </a>
            </div>
            <div class="col-md-3 col-sm-6">
                <a href="https://sites.google.com/view/gppr-cteguj/fee-structure" target="_blank" class="text-decoration-none">
                    <div class="card-modern p-4 text-center h-100" style="transition: var(--transition);">
                        <i class="fas fa-money-bill fa-2x mb-3" style="color: var(--accent);"></i>
                        <h6 class="fw-bold mb-1" style="color: var(--text);">Fee Structure</h6>
                        <span class="small" style="color: var(--secondary);">View <i class="fas fa-external-link-alt ms-1 small"></i></span>
                    </div>
                </a>
            </div>
            <div class="col-md-3 col-sm-6">
                <a href="https://sites.google.com/view/gppr-cteguj/syllabus" target="_blank" class="text-decoration-none">
                    <div class="card-modern p-4 text-center h-100" style="transition: var(--transition);">
                        <i class="fas fa-book fa-2x mb-3" style="color: #8b5cf6;"></i>
                        <h6 class="fw-bold mb-1" style="color: var(--text);">Syllabus</h6>
                        <span class="small" style="color: var(--secondary);">Download <i class="fas fa-external-link-alt ms-1 small"></i></span>
                    </div>
                </a>
            </div>
            <div class="col-md-3 col-sm-6">
                <a href="https://sites.google.com/view/gppr-cteguj/academic-calendar" target="_blank" class="text-decoration-none">
                    <div class="card-modern p-4 text-center h-100" style="transition: var(--transition);">
                        <i class="fas fa-calendar fa-2x mb-3" style="color: #10b981;"></i>
                        <h6 class="fw-bold mb-1" style="color: var(--text);">Academic Calendar</h6>
                        <span class="small" style="color: var(--secondary);">View <i class="fas fa-external-link-alt ms-1 small"></i></span>
                    </div>
                </a>
            </div>
            <div class="col-md-3 col-sm-6">
                <a href="https://sites.google.com/view/gppr-cteguj/faqs" target="_blank" class="text-decoration-none">
                    <div class="card-modern p-4 text-center h-100" style="transition: var(--transition);">
                        <i class="fas fa-question-circle fa-2x mb-3" style="color: #ec4899;"></i>
                        <h6 class="fw-bold mb-1" style="color: var(--text);">FAQs</h6>
                        <span class="small" style="color: var(--secondary);">Read <i class="fas fa-external-link-alt ms-1 small"></i></span>
                    </div>
                </a>
            </div>
            <div class="col-md-3 col-sm-6">
                <a href="https://sites.google.com/view/gppr-cteguj/scholarships" target="_blank" class="text-decoration-none">
                    <div class="card-modern p-4 text-center h-100" style="transition: var(--transition);">
                        <i class="fas fa-users fa-2x mb-3" style="color: var(--secondary);"></i>
                        <h6 class="fw-bold mb-1" style="color: var(--text);">Scholarships</h6>
                        <span class="small" style="color: var(--secondary);">Apply <i class="fas fa-external-link-alt ms-1 small"></i></span>
                    </div>
                </a>
            </div>
            <div class="col-md-3 col-sm-6">
                <a href="https://sites.google.com/view/gppr-cteguj/facilities" target="_blank" class="text-decoration-none">
                    <div class="card-modern p-4 text-center h-100" style="transition: var(--transition);">
                        <i class="fas fa-building fa-2x mb-3" style="color: var(--accent);"></i>
                        <h6 class="fw-bold mb-1" style="color: var(--text);">Campus Facilities</h6>
                        <span class="small" style="color: var(--secondary);">Explore <i class="fas fa-external-link-alt ms-1 small"></i></span>
                    </div>
                </a>
            </div>
            <div class="col-md-3 col-sm-6">
                <a href="https://sites.google.com/view/gppr-cteguj/contact" target="_blank" class="text-decoration-none">
                    <div class="card-modern p-4 text-center h-100" style="transition: var(--transition);">
                        <i class="fas fa-phone fa-2x mb-3" style="color: #10b981;"></i>
                        <h6 class="fw-bold mb-1" style="color: var(--text);">Contact Us</h6>
                        <span class="small" style="color: var(--secondary);">Get Info <i class="fas fa-external-link-alt ms-1 small"></i></span>
                    </div>
                </a>
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
                <p class="mb-4" style="color: #94a3b8;">Empowering the next generation of engineers through quality technical education.</p>
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
                    <li class="mb-2"><a href="about.php"><i class="fas fa-chevron-right me-1 small"></i> About</a></li>
                    <li class="mb-2"><a href="lab.php"><i class="fas fa-chevron-right me-1 small"></i> Labs</a></li>
                    <li class="mb-2"><a href="admission.php"><i class="fas fa-chevron-right me-1 small"></i> Admissions</a></li>
                    <li class="mb-2"><a href="contact.php"><i class="fas fa-chevron-right me-1 small"></i> Contact</a></li>
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
                    <li class="d-flex align-items-center gap-2">
                        <i class="fas fa-envelope" style="color: var(--secondary);"></i>
                        <span>admissions@gpporbandar.ac.in</span>
                    </li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-4">
                <h5>Office Hours</h5>
                <ul class="list-unstyled" style="color: #94a3b8;">
                    <li class="mb-2">Mon - Fri: 9:00 AM - 5:00 PM</li>
                    <li class="mb-2">Saturday: 10:00 AM - 2:00 PM</li>
                    <li>Sunday: Closed</li>
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