<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Computer Science Labs - Computer Engineering Department</title>
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
                    <li class="nav-item"><a class="nav-link active" href="lab.php">Labs</a></li>
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
        <span class="badge px-3 py-2 mb-3" style="background: rgba(6,182,212,0.15); color: var(--secondary-light); border: 1px solid rgba(6,182,212,0.3);">
            <i class="fas fa-flask me-1"></i> Hands-On Learning
        </span>
        <h1 class="display-4 fw-bold mb-3" style="color: white;">Computer Science Labs</h1>
        <p class="lead mx-auto" style="color: rgba(255,255,255,0.8); max-width: 700px;">
            State-of-the-Art Facilities for Hands-On Learning. Our labs are equipped with the latest technology, software, and resources to ensure students get the best practical exposure.
        </p>
    </div>
</section>

<!-- Labs Grid -->
<section class="py-5" style="padding: 80px 0 !important; background: linear-gradient(180deg, var(--bg) 0%, rgba(6,182,212,0.03) 100%);">
    <div class="container">
        <div class="section-header">
            <h2>Available Labs</h2>
            <p>Specialized environments designed for technical training and innovation</p>
        </div>
        <div class="row g-4">
            <!-- Lab 1 -->
            <div class="col-md-6 col-lg-4">
                <div class="card-modern h-100">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center gap-3 mb-4">
                            <div class="d-flex align-items-center justify-content-center rounded-3" style="width: 56px; height: 56px; background: linear-gradient(135deg, var(--secondary), #0891b2); color: white; font-size: 1.4rem; font-weight: 700;">1</div>
                            <h5 class="fw-bold mb-0" style="color: var(--text);">Programming Lab</h5>
                        </div>
                        <p class="text-muted mb-3"><strong style="color: var(--text);">Purpose:</strong> Dedicated space for learning programming languages, coding techniques, and software development methodologies.</p>
                        <p class="text-muted mb-3"><strong style="color: var(--text);">Tools:</strong> Visual Studio, Eclipse, PyCharm, IntelliJ IDEA, Git</p>
                        <p class="text-muted mb-3"><strong style="color: var(--text);">Languages:</strong> Python, Java, C++, JavaScript</p>
                        <div class="d-flex flex-wrap gap-2 mt-3">
                            <span class="badge" style="background: rgba(6,182,212,0.1); color: var(--secondary);">OOP</span>
                            <span class="badge" style="background: rgba(6,182,212,0.1); color: var(--secondary);">Data Structures</span>
                            <span class="badge" style="background: rgba(6,182,212,0.1); color: var(--secondary);">Algorithms</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Lab 2 -->
            <div class="col-md-6 col-lg-4">
                <div class="card-modern h-100">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center gap-3 mb-4">
                            <div class="d-flex align-items-center justify-content-center rounded-3" style="width: 56px; height: 56px; background: linear-gradient(135deg, #ef4444, #dc2626); color: white; font-size: 1.4rem; font-weight: 700;">2</div>
                            <h5 class="fw-bold mb-0" style="color: var(--text);">Network & Cybersecurity</h5>
                        </div>
                        <p class="text-muted mb-3"><strong style="color: var(--text);">Purpose:</strong> Specialized lab for exploring network infrastructure, cybersecurity protocols, and ethical hacking.</p>
                        <p class="text-muted mb-3"><strong style="color: var(--text);">Tools:</strong> Wireshark, Kali Linux, Metasploit, Cisco Packet Tracer</p>
                        <p class="text-muted mb-3"><strong style="color: var(--text);">Focus:</strong> Security analysis, penetration testing, ethical hacking</p>
                        <div class="d-flex flex-wrap gap-2 mt-3">
                            <span class="badge" style="background: rgba(239,68,68,0.1); color: #ef4444;">Security</span>
                            <span class="badge" style="background: rgba(239,68,68,0.1); color: #ef4444;">Networking</span>
                            <span class="badge" style="background: rgba(239,68,68,0.1); color: #ef4444;">Ethical Hacking</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Lab 3 -->
            <div class="col-md-6 col-lg-4">
                <div class="card-modern h-100">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center gap-3 mb-4">
                            <div class="d-flex align-items-center justify-content-center rounded-3" style="width: 56px; height: 56px; background: linear-gradient(135deg, #8b5cf6, #7c3aed); color: white; font-size: 1.4rem; font-weight: 700;">3</div>
                            <h5 class="fw-bold mb-0" style="color: var(--text);">Database & Data Science</h5>
                        </div>
                        <p class="text-muted mb-3"><strong style="color: var(--text);">Purpose:</strong> Environment for designing databases, analyzing datasets, and implementing ML algorithms.</p>
                        <p class="text-muted mb-3"><strong style="color: var(--text);">Tools:</strong> MySQL, PostgreSQL, MongoDB, Hadoop, TensorFlow</p>
                        <p class="text-muted mb-3"><strong style="color: var(--text);">Focus:</strong> Data mining, machine learning, big data</p>
                        <div class="d-flex flex-wrap gap-2 mt-3">
                            <span class="badge" style="background: rgba(139,92,246,0.1); color: #8b5cf6;">SQL</span>
                            <span class="badge" style="background: rgba(139,92,246,0.1); color: #8b5cf6;">NoSQL</span>
                            <span class="badge" style="background: rgba(139,92,246,0.1); color: #8b5cf6;">ML</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Lab 4 -->
            <div class="col-md-6 col-lg-4">
                <div class="card-modern h-100">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center gap-3 mb-4">
                            <div class="d-flex align-items-center justify-content-center rounded-3" style="width: 56px; height: 56px; background: linear-gradient(135deg, var(--accent), #d97706); color: white; font-size: 1.4rem; font-weight: 700;">4</div>
                            <h5 class="fw-bold mb-0" style="color: var(--text);">Web Development & UI/UX</h5>
                        </div>
                        <p class="text-muted mb-3"><strong style="color: var(--text);">Purpose:</strong> Creative space for designing, developing, and testing websites and applications.</p>
                        <p class="text-muted mb-3"><strong style="color: var(--text);">Tools:</strong> HTML, CSS, JS, React, Angular, Node.js, Firebase</p>
                        <p class="text-muted mb-3"><strong style="color: var(--text);">Focus:</strong> UI/UX design, responsive design, full-stack dev</p>
                        <div class="d-flex flex-wrap gap-2 mt-3">
                            <span class="badge" style="background: rgba(245,158,11,0.1); color: var(--accent);">Frontend</span>
                            <span class="badge" style="background: rgba(245,158,11,0.1); color: var(--accent);">Backend</span>
                            <span class="badge" style="background: rgba(245,158,11,0.1); color: var(--accent);">UI/UX</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Lab 5 -->
            <div class="col-md-6 col-lg-4">
                <div class="card-modern h-100">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center gap-3 mb-4">
                            <div class="d-flex align-items-center justify-content-center rounded-3" style="width: 56px; height: 56px; background: linear-gradient(135deg, #ec4899, #db2777); color: white; font-size: 1.4rem; font-weight: 700;">5</div>
                            <h5 class="fw-bold mb-0" style="color: var(--text);">Cloud Computing Lab</h5>
                        </div>
                        <p class="text-muted mb-3"><strong style="color: var(--text);">Purpose:</strong> High-performance lab for exploring cloud services, virtualization, and distributed computing.</p>
                        <p class="text-muted mb-3"><strong style="color: var(--text);">Tools:</strong> AWS, Azure, Google Cloud, Docker, Kubernetes</p>
                        <p class="text-muted mb-3"><strong style="color: var(--text);">Focus:</strong> Cloud deployment, containerization, scalability</p>
                        <div class="d-flex flex-wrap gap-2 mt-3">
                            <span class="badge" style="background: rgba(236,72,153,0.1); color: #ec4899;">Cloud</span>
                            <span class="badge" style="background: rgba(236,72,153,0.1); color: #ec4899;">DevOps</span>
                            <span class="badge" style="background: rgba(236,72,153,0.1); color: #ec4899;">Containers</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Lab Features -->
<section class="py-5" style="padding: 80px 0 !important;">
    <div class="container">
        <div class="section-header">
            <h2>Lab Features</h2>
            <p>Everything you need for a world-class learning experience</p>
        </div>
        <div class="row g-4">
            <div class="col-md-6">
                <div class="d-flex gap-4 p-4 rounded-3" style="background: var(--card-bg); border: 1px solid var(--border);">
                    <div class="flex-shrink-0">
                        <div class="d-flex align-items-center justify-content-center rounded-3" style="width: 56px; height: 56px; background: rgba(6,182,212,0.1); color: var(--secondary);">
                            <i class="fas fa-wifi fa-lg"></i>
                        </div>
                    </div>
                    <div>
                        <h5 class="fw-bold mb-2">High-Speed Internet</h5>
                        <p class="text-muted mb-0">Reliable and fast internet access to support research and project work with dedicated bandwidth.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex gap-4 p-4 rounded-3" style="background: var(--card-bg); border: 1px solid var(--border);">
                    <div class="flex-shrink-0">
                        <div class="d-flex align-items-center justify-content-center rounded-3" style="width: 56px; height: 56px; background: rgba(245,158,11,0.1); color: var(--accent);">
                            <i class="fas fa-clock fa-lg"></i>
                        </div>
                    </div>
                    <div>
                        <h5 class="fw-bold mb-2">24/7 Access</h5>
                        <p class="text-muted mb-0">Many labs are accessible outside regular hours to encourage self-paced learning and collaboration.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex gap-4 p-4 rounded-3" style="background: var(--card-bg); border: 1px solid var(--border);">
                    <div class="flex-shrink-0">
                        <div class="d-flex align-items-center justify-content-center rounded-3" style="width: 56px; height: 56px; background: rgba(16,185,129,0.1); color: #10b981;">
                            <i class="fas fa-tools fa-lg"></i>
                        </div>
                    </div>
                    <div>
                        <h5 class="fw-bold mb-2">Industry-Standard Tools</h5>
                        <p class="text-muted mb-0">Equipped with the latest software and hardware to ensure students are trained on real-world tools.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex gap-4 p-4 rounded-3" style="background: var(--card-bg); border: 1px solid var(--border);">
                    <div class="flex-shrink-0">
                        <div class="d-flex align-items-center justify-content-center rounded-3" style="width: 56px; height: 56px; background: rgba(139,92,246,0.1); color: #8b5cf6;">
                            <i class="fas fa-users fa-lg"></i>
                        </div>
                    </div>
                    <div>
                        <h5 class="fw-bold mb-2">Collaborative Spaces</h5>
                        <p class="text-muted mb-0">Group workstations and collaborative spaces to foster teamwork and idea sharing among peers.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Benefits -->
<section class="py-5" style="background: linear-gradient(180deg, var(--bg) 0%, rgba(6,182,212,0.03) 100%); padding: 80px 0 !important;">
    <div class="container">
        <div class="section-header">
            <h2>Benefits of Lab Work</h2>
            <p>Practical experience that prepares you for the real world</p>
        </div>
        <div class="row g-4 text-center">
            <div class="col-md-3">
                <div class="card-modern p-4 h-100">
                    <div class="mb-3" style="font-size: 3rem;">💻</div>
                    <h5 class="fw-bold mb-2">Practical Learning</h5>
                    <p class="text-muted small mb-0">Gain hands-on experience and practical skills crucial in the tech industry.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-modern p-4 h-100">
                    <div class="mb-3" style="font-size: 3rem;">🚀</div>
                    <h5 class="fw-bold mb-2">Innovative Projects</h5>
                    <p class="text-muted small mb-0">Work on cutting-edge projects with real-world applications.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-modern p-4 h-100">
                    <div class="mb-3" style="font-size: 3rem;">👥</div>
                    <h5 class="fw-bold mb-2">Collaboration</h5>
                    <p class="text-muted small mb-0">Develop essential teamwork and communication skills with peers.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-modern p-4 h-100">
                    <div class="mb-3" style="font-size: 3rem;">🔬</div>
                    <h5 class="fw-bold mb-2">Research</h5>
                    <p class="text-muted small mb-0">Conduct research in specialized fields like AI, cybersecurity, and cloud.</p>
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
                <p class="mb-4" style="color: #94a3b8;">State-of-the-art labs and facilities for the next generation of engineers.</p>
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
                        <span>cs-labs@gpporbandar.ac.in</span>
                    </li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-4">
                <h5>Lab Hours</h5>
                <ul class="list-unstyled" style="color: #94a3b8;">
                    <li class="mb-2">Mon - Fri: 8:00 AM - 8:00 PM</li>
                    <li class="mb-2">Saturday: 9:00 AM - 5:00 PM</li>
                    <li>Sunday: Closed (24/7 for select labs)</li>
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