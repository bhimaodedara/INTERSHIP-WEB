<?php
require_once 'config/db_connect.php';
$successMsg = "";
$errorMsg = "";
if (isset($_POST['submit'])) {
    $firstName = mysqli_real_escape_string($conn, trim($_POST['firstName']));
    $lastName  = mysqli_real_escape_string($conn, trim($_POST['lastName']));
    $email     = mysqli_real_escape_string($conn, trim($_POST['email']));
    $phone     = mysqli_real_escape_string($conn, trim($_POST['phone']));
    $subject   = mysqli_real_escape_string($conn, trim($_POST['subject']));
    $message   = mysqli_real_escape_string($conn, trim($_POST['message']));
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorMsg = "Please enter a valid email address.";
    } else {
        $sql = "INSERT INTO contact_messages (first_name, last_name, email, phone, subject, message) VALUES ('$firstName', '$lastName', '$email', '$phone', '$subject', '$message')";
        if (mysqli_query($conn, $sql)) {
            $successMsg = "Thank you! Your message has been securely saved to our database.";
        } else {
            $errorMsg = "Database error: Could not save message.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Computer Engineering Department</title>
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
                    <li class="nav-item"><a class="nav-link" href="admission.php">Admissions</a></li>
                    <li class="nav-item"><a class="nav-link" href="faculty.php">Faculty</a></li>
                    <li class="nav-item"><a class="nav-link" href="gallery.php">Gallery</a></li>
                    <li class="nav-item"><a class="nav-link active" href="contact.php">Contact</a></li>
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
        <span class="badge px-3 py-2 mb-3" style="background: rgba(6,182,212,0.15); color: var(--secondary-light); border: 1px solid rgba(6,182,212,0.3);">
            <i class="fas fa-headset me-1"></i> We are here to help
        </span>
        <h1 class="display-4 fw-bold mb-3" style="color: white;">Contact Us</h1>
        <p class="lead mx-auto" style="color: rgba(255,255,255,0.8); max-width: 700px;">
            Get in touch with the Computer Engineering Department. We are here to answer your questions about programs, facilities, and admissions.
        </p>
    </div>
</section>

<!-- Contact Info Cards -->
<section class="py-5" style="padding: 80px 0 !important; background: linear-gradient(180deg, var(--bg) 0%, rgba(6,182,212,0.03) 100%);">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card-modern h-100 text-center p-4">
                    <div class="d-inline-flex align-items-center justify-content-center rounded-3 mb-4" style="width: 64px; height: 64px; background: linear-gradient(135deg, rgba(6,182,212,0.15), rgba(6,182,212,0.05)); color: var(--secondary);">
                        <i class="fas fa-map-marker-alt fa-2x"></i>
                    </div>
                    <h5 class="fw-bold mb-3">Visit Our Campus</h5>
                    <p class="text-muted mb-0">Computer Engineering Department<br>Govt. Polytechnic Porbandar<br>Dut Sai Nagar, Porbandar<br>Gujarat 360575</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-modern h-100 text-center p-4">
                    <div class="d-inline-flex align-items-center justify-content-center rounded-3 mb-4" style="width: 64px; height: 64px; background: linear-gradient(135deg, rgba(245,158,11,0.15), rgba(245,158,11,0.05)); color: var(--accent);">
                        <i class="fas fa-phone fa-2x"></i>
                    </div>
                    <h5 class="fw-bold mb-3">Call Us</h5>
                    <p class="text-muted mb-2">Main Office: (0286) 224-1234<br>Admissions: (0286) 224-1235<br>Fax: (0286) 224-1236</p>
                    <p class="text-muted mb-0"><strong>Office Hours:</strong><br>Mon-Fri: 9:00 AM - 5:00 PM</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-modern h-100 text-center p-4">
                    <div class="d-inline-flex align-items-center justify-content-center rounded-3 mb-4" style="width: 64px; height: 64px; background: linear-gradient(135deg, rgba(16,185,129,0.15), rgba(16,185,129,0.05)); color: #10b981;">
                        <i class="fas fa-envelope fa-2x"></i>
                    </div>
                    <h5 class="fw-bold mb-3">Email Us</h5>
                    <p class="text-muted mb-0">General: info@gpporbandar.ac.in<br>Admissions: admissions@gpporbandar.ac.in<br>Department: cs-dept@gpporbandar.ac.in<br>Support: support@gpporbandar.ac.in</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Form -->
<section class="py-5" style="padding: 80px 0 !important;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="text-center mb-5">
                    <h2 class="fw-bold mb-2" style="color: var(--text);">Send Us a Message</h2>
                    <p class="text-muted">Have a question? Fill out the form below and we will get back to you shortly.</p>
                </div>

                <div class="card-modern p-4 p-md-5">
                    <?php if(!empty($successMsg)): ?>
                        <div class="alert d-flex align-items-center gap-3 mb-4" style="background: rgba(16,185,129,0.1); border: 1px solid rgba(16,185,129,0.3); color: #10b981; border-radius: var(--radius-sm);">
                            <i class="fas fa-check-circle fa-lg"></i>
                            <div class="fw-semibold"><?php echo $successMsg; ?></div>
                        </div>
                    <?php endif; ?>
                    <?php if(!empty($errorMsg)): ?>
                        <div class="alert d-flex align-items-center gap-3 mb-4" style="background: rgba(239,68,68,0.1); border: 1px solid rgba(239,68,68,0.3); color: #ef4444; border-radius: var(--radius-sm);">
                            <i class="fas fa-exclamation-circle fa-lg"></i>
                            <div class="fw-semibold"><?php echo $errorMsg; ?></div>
                        </div>
                    <?php endif; ?>

                    <form method="POST" action="">
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label class="form-label-custom">First Name *</label>
                                <input type="text" name="firstName" class="form-control-modern" required placeholder="John">
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="form-label-custom">Last Name *</label>
                                <input type="text" name="lastName" class="form-control-modern" required placeholder="Doe">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label class="form-label-custom">Email Address *</label>
                                <input type="email" name="email" class="form-control-modern" required placeholder="john@example.com">
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="form-label-custom">Phone Number</label>
                                <input type="tel" name="phone" class="form-control-modern" placeholder="+91 98765 43210">
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="form-label-custom">Subject *</label>
                            <select name="subject" class="form-select-modern" required>
                                <option value="" selected disabled>Select a subject</option>
                                <option value="admissions">Admissions Inquiry</option>
                                <option value="programs">Program Information</option>
                                <option value="facilities">Facilities Tour</option>
                                <option value="research">Research Opportunities</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="form-label-custom">Message *</label>
                            <textarea name="message" class="form-control-modern" rows="5" required placeholder="How can we help you?"></textarea>
                        </div>
                        <div class="text-center">
                            <button type="submit" name="submit" class="btn-primary-custom btn-lg" style="padding: 14px 40px;">
                                <i class="fas fa-paper-plane"></i> Send Message
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Department Contacts -->
<section class="py-5" style="padding: 80px 0 !important; background: linear-gradient(180deg, var(--bg) 0%, rgba(6,182,212,0.03) 100%);">
    <div class="container">
        <div class="section-header">
            <h2>Department Contacts</h2>
            <p>Reach out to specific coordinators for specialized assistance</p>
        </div>
        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="card-modern h-100 text-center p-4">
                    <div class="d-inline-flex align-items-center justify-content-center rounded-circle mb-3" style="width: 64px; height: 64px; background: linear-gradient(135deg, var(--secondary), #0891b2); color: white; font-size: 1.5rem;">
                        <i class="fas fa-user-tie"></i>
                    </div>
                    <h5 class="fw-bold mb-1">Department Head</h5>
                    <p class="text-muted mb-2">Dr. Robert Johnson</p>
                    <p class="small text-muted mb-1"><i class="fas fa-envelope me-1" style="color: var(--secondary);"></i> r.johnson@gpporbandar.ac.in</p>
                    <p class="small text-muted mb-0"><i class="fas fa-phone me-1" style="color: var(--secondary);"></i> (0286) 224-1237</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card-modern h-100 text-center p-4">
                    <div class="d-inline-flex align-items-center justify-content-center rounded-circle mb-3" style="width: 64px; height: 64px; background: linear-gradient(135deg, var(--accent), #d97706); color: white; font-size: 1.5rem;">
                        <i class="fas fa-user-edit"></i>
                    </div>
                    <h5 class="fw-bold mb-1">Admissions Coordinator</h5>
                    <p class="text-muted mb-2">Ms. Sarah Williams</p>
                    <p class="small text-muted mb-1"><i class="fas fa-envelope me-1" style="color: var(--accent);"></i> s.williams@gpporbandar.ac.in</p>
                    <p class="small text-muted mb-0"><i class="fas fa-phone me-1" style="color: var(--accent);"></i> (0286) 224-1238</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card-modern h-100 text-center p-4">
                    <div class="d-inline-flex align-items-center justify-content-center rounded-circle mb-3" style="width: 64px; height: 64px; background: linear-gradient(135deg, #8b5cf6, #7c3aed); color: white; font-size: 1.5rem;">
                        <i class="fas fa-user-friends"></i>
                    </div>
                    <h5 class="fw-bold mb-1">Student Affairs</h5>
                    <p class="text-muted mb-2">Mr. Michael Brown</p>
                    <p class="small text-muted mb-1"><i class="fas fa-envelope me-1" style="color: #8b5cf6;"></i> m.brown@gpporbandar.ac.in</p>
                    <p class="small text-muted mb-0"><i class="fas fa-phone me-1" style="color: #8b5cf6;"></i> (0286) 224-1239</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card-modern h-100 text-center p-4">
                    <div class="d-inline-flex align-items-center justify-content-center rounded-circle mb-3" style="width: 64px; height: 64px; background: linear-gradient(135deg, #10b981, #059669); color: white; font-size: 1.5rem;">
                        <i class="fas fa-flask"></i>
                    </div>
                    <h5 class="fw-bold mb-1">Lab Coordinator</h5>
                    <p class="text-muted mb-2">Dr. Emily Davis</p>
                    <p class="small text-muted mb-1"><i class="fas fa-envelope me-1" style="color: #10b981;"></i> e.davis@gpporbandar.ac.in</p>
                    <p class="small text-muted mb-0"><i class="fas fa-phone me-1" style="color: #10b981;"></i> (0286) 224-1240</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Map -->
<section class="py-5" style="padding: 80px 0 !important;">
    <div class="container">
        <div class="section-header">
            <h2>Find Our Campus</h2>
            <p>Located in the heart of Porbandar, Gujarat</p>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="rounded-4 overflow-hidden shadow-lg" style="border: 1px solid var(--border);">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1854.2503717247348!2d69.65369580674593!3d21.644369909796612!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395634c4e4d01da5%3A0xd7c395f74e89053d!2sGovt.%20Polytechnic%20Porbandar%2C%20Dut%20Sai%20Nagar%2C%20Porbandar%2C%20Gujarat%20360575!5e0!3m2!1sgu!2sin!4v1762327345828!5m2!1sgu!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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
                <p class="mb-4" style="color: #94a3b8;">Excellence in teaching, research, and public service since 1960.</p>
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
                        <span>info@gpporbandar.ac.in</span>
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