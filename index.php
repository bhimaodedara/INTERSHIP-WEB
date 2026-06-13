<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Computer Engineering Department</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        /* Minimal CSS for logo sizing only */
        .logo-img img {
            height: 60px;
            width: auto;
            object-fit: contain;
        }
    </style>
</head>
<body>
   

    <!-- Header Main -->
    <header class="bg-white shadow-sm sticky-top">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <div class="d-flex align-items-center">
                    <div class="me-3">
                        
                        <img src="assets/images/main logo.jpeg" alt="University Logo" height="60">
                    </div>
                    <div class="d-flex flex-column">
                        <h1 class="fs-4 mb-0" style="color: #2c3e50;">Computer Engineering Department</h1>
                        <span class="fs-6" style="color: #3498db;">Excellence in Education Since 1960</span>
                    </div>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link active fw-bold" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="lab.php">Labs</a></li>
                        <li class="nav-item"><a class="nav-link" href="admission.php">Admissions</a></li>
                        <li class="nav-item"><a class="nav-link" href="faculty.php">Faculty</a></li>
                        <li class="nav-item"><a class="nav-link" href="gallery.php">Gallery</a></li>
                        <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                        <li class="nav-item"><a class="nav-link" href="classroom.php">classrooms</a></li>
                        <a href="admin/admin.php" class="btn text-white fw-bold shadow-sm ms-lg-3 mt-2 mt-lg-0 admin-btn" style="background-color: #e9b949; border-radius: 8px; border: 1px solid #d4a73b;">
    <i class="fas fa-user-shield me-1"></i> Admin Login
</a>
</a>
                    </ul>
                </div>
            </div>
        </nav>
    </header>


    <!-- Hero Section -->
    <section class="bg-primary text-white py-5" style="background: linear-gradient(rgba(26, 54, 93, 0.8), rgba(26, 54, 93, 0.8)), url('https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-4.0.3') center/cover no-repeat;">
        <div class="container py-5 text-center">
            <h2 class="display-4 mb-4">Shape Your Future With Quality Education</h2>
            <p class="lead mb-4">Join a vibrant community of learners and innovators at one of the world's leading institutions for higher education and research.</p>
            <div class="d-flex justify-content-center gap-3 flex-wrap">
                <a href="gallery.php" class="btn btn-light btn-lg">Explore Programs</a>
                <a href="admission.php" class="btn btn-warning btn-lg">Apply Now</a>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-5 mb-3">Why Choose Our Department</h2>
                <p class="lead">We provide world-class education with state-of-the-art facilities and experienced faculty</p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 text-center border-0 shadow-sm">
                        <div class="card-body p-4">
                            <div class="text-primary mb-3">
                                <i class="fas fa-graduation-cap fa-3x"></i>
                            </div>
                            <h3 class="h5 mb-3">Academic Excellence</h3>
                            <p class="card-text">Our programs are consistently ranked among the top in the nation for quality and innovation.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 text-center border-0 shadow-sm">
                        <div class="card-body p-4">
                            <div class="text-primary mb-3">
                                <i class="fas fa-flask fa-3x"></i>
                            </div>
                            <h3 class="h5 mb-3">Research Opportunities</h3>
                            <p class="card-text">Work alongside renowned faculty on cutting-edge research projects across disciplines.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 text-center border-0 shadow-sm">
                        <div class="card-body p-4">
                            <div class="text-primary mb-3">
                                <i class="fas fa-globe-americas fa-3x"></i>
                            </div>
                            <h3 class="h5 mb-3">Global Community</h3>
                            <p class="card-text">Join a diverse community of students and scholars from over 100 countries worldwide.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 text-center border-0 shadow-sm">
                        <div class="card-body p-4">
                            <div class="text-primary mb-3">
                                <i class="fas fa-briefcase fa-3x"></i>
                            </div>
                            <h3 class="h5 mb-3">Career Development</h3>
                            <p class="card-text">Our career services help students secure internships and employment with top companies.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Programs Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-5 mb-3">Academic Programs</h2>
                <p class="lead">Explore our diverse range of undergraduate and graduate programs</p>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="bg-primary text-white text-center py-5">
                            <h3 class="mb-0">Engineering</h3>
                        </div>
                        <div class="card-body p-4">
                            <h3 class="h5 mb-3">School of Engineering</h3>
                            <p class="card-text mb-3">Our engineering programs combine theoretical knowledge with practical application in state-of-the-art labs.</p>
                            <a href="#" class="btn btn-primary">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="bg-primary text-white text-center py-5">
                            <h3 class="mb-0">Business</h3>
                        </div>
                        <div class="card-body p-4">
                            <h3 class="h5 mb-3">Business School</h3>
                            <p class="card-text mb-3">Develop leadership skills and business acumen through our AACSB-accredited programs.</p>
                            <a href="#" class="btn btn-primary">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="bg-primary text-white text-center py-5">
                            <h3 class="mb-0">Arts &amp; Sciences</h3>
                        </div>
                        <div class="card-body p-4">
                            <h3 class="h5 mb-3">Arts &amp; Sciences</h3>
                            <p class="card-text mb-3">Explore the liberal arts and sciences through our interdisciplinary programs and research opportunities.</p>
                            <a href="#" class="btn btn-primary">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- News Section -->
    <section class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-5 mb-3">Campus News &amp; Events</h2>
                <p class="lead">Stay updated with the latest happenings in our university community</p>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="bg-primary text-white text-center py-5">
                            <h3 class="mb-0">Research Symposium</h3>
                        </div>
                        <div class="card-body p-4">
                            <div class="text-primary mb-2">October 15, 2023</div>
                            <h3 class="h5 mb-3">Annual Research Symposium Showcases Student Innovation</h3>
                            <p class="card-text mb-3">Students from across disciplines presented their research findings to faculty and industry experts.</p>
                            <a href="#" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="bg-primary text-white text-center py-5">
                            <h3 class="mb-0">New Facility</h3>
                        </div>
                        <div class="card-body p-4">
                            <div class="text-primary mb-2">September 28, 2023</div>
                            <h3 class="h5 mb-3">Department Opens New Sustainable Science Building</h3>
                            <p class="card-text mb-3">The state-of-the-art facility features labs, collaborative spaces, and green technology.</p>
                            <a href="#" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="bg-primary text-white text-center py-5">
                            <h3 class="mb-0">Sports Achievement</h3>
                        </div>
                        <div class="card-body p-4">
                            <div class="text-primary mb-2">September 10, 2023</div>
                            <h3 class="h5 mb-3">Department Team Wins National Championship</h3>
                            <p class="card-text mb-3">Our athletes brought home the national title after an undefeated season.</p>
                            <a href="#" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-5 bg-primary text-white" style="background: linear-gradient(rgba(43, 108, 176, 0.9), rgba(43, 108, 176, 0.9)), url('https://images.unsplash.com/photo-1576495199011-eb94736d05d6?ixlib=rb-4.0.3') center/cover no-repeat;">
        <div class="container text-center py-5">
            <h2 class="display-5 mb-4">Begin Your Educational Journey Today</h2>
            <p class="lead mb-4">Applications for the next academic year are now being accepted. Don't miss your chance to join our vibrant learning community.</p>
            <a href="admission.php" class="btn btn-warning btn-lg">Apply Now</a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white pt-5">
        <div class="container">
            <div class="row g-4 mb-4">
                <div class="col-md-4">
                    <h3 class="h5 mb-3">About Computer Engineering Department</h3>
                    <p class="mb-3">The Computer Engineering Department is dedicated to excellence in teaching, research, and public service.</p>
                    
                </div>
                
                <div class="col-md-4">
                    <h3 class="h5 mb-3">Quick Links</h3>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="index.php" class="text-white text-decoration-none">Home</a></li>
                        <li class="mb-2"><a href="about.php" class="text-white text-decoration-none">About Us</a></li>
                        <li class="mb-2"><a href="lab.php" class="text-white text-decoration-none">Labs</a></li>
                        <li class="mb-2"><a href="admission.php" class="text-white text-decoration-none">Admissions</a></li>
                        <li class="mb-2"><a href="faculty.php" class="text-white text-decoration-none">Faculty</a></li>
                        <li class="mb-2"><a href="gallery.php" class="text-white text-decoration-none">Gallery</a></li>
                        <li class="mb-2"><a contact.php" class="text-white text-decoration-none">Contact us</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h3 class="h5 mb-3">Contact Info</h3>
                    <ul class="list-unstyled">
                        <li class="mb-2"><i class="fas fa-map-marker-alt me-2"></i> 123 University Avenue, City, State 12345</li>
                        <li class="mb-2"><i class="fas fa-phone me-2"></i> (123) 456-7890</li>
                        <li class="mb-2"><i class="fas fa-envelope me-2"></i> info@university.edu</li>
                        <li class="mb-2"><i class="fas fa-clock me-2"></i> Mon-Fri: 8:00 AM - 6:00 PM</li>
                    </ul>
                </div>
            </div>
            <div class="text-center py-3 border-top border-secondary">
                <p class="mb-0">&copy; 2023 Computer Engineering Department GPP. All Rights Reserved.</p>
            </div>
        </div>
    </footer>

    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/dark-mode.js"></script>
</body>
</html>