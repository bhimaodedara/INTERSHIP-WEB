<?php
// Include database connection
require_once 'config/db_connect.php';

$successMsg = "";
$errorMsg = "";

if (isset($_POST['submit'])) {
    // Clean data and escape for database security
    $firstName = mysqli_real_escape_string($conn, trim($_POST['firstName']));
    $lastName  = mysqli_real_escape_string($conn, trim($_POST['lastName']));
    $email     = mysqli_real_escape_string($conn, trim($_POST['email']));
    $phone     = mysqli_real_escape_string($conn, trim($_POST['phone']));
    $subject   = mysqli_real_escape_string($conn, trim($_POST['subject']));
    $message   = mysqli_real_escape_string($conn, trim($_POST['message']));

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorMsg = "Please enter a valid email address.";
    } else {
        // INSERT into database
        $sql = "INSERT INTO contact_messages (first_name, last_name, email, phone, subject, message) 
                VALUES ('$firstName', '$lastName', '$email', '$phone', '$subject', '$message')";
        
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
</head>

<body class="pt-5">
    <header class="bg-white shadow-sm fixed-top">
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
                        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="lab.php">Labs</a></li>
                        <li class="nav-item"><a class="nav-link" href="admission.php">Admissions</a></li>
                        <li class="nav-item"><a class="nav-link" href="faculty.php">Faculty</a></li>
                        <li class="nav-item"><a class="nav-link" href="gallery.php">Gallery</a></li>
                        <li class="nav-item"><a class="nav-link active fw-bold" href="contact.php">Contact</a></li>
                        <li class="nav-item"><a class="nav-link" href="classroom.php">classrooms</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <section class="text-white py-5" style="
        background: linear-gradient(rgba(44, 62, 80, 0.8), rgba(44, 62, 80, 0.9)), 
                    url('https://images.unsplash.com/photo-1560472354-b33ff0c44a43?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
        background-size: cover;
        background-position: center;
    ">
        <div class="container text-center">
            <h1 class="display-4 fw-bold">Contact Us</h1>
            <p class="lead">Get in Touch with Computer Engineering Department</p>
            <p>We're here to answer your questions and provide information about our programs, facilities, and
                admissions process.</p>
        </div>
    </section>

    <section class="py-5" style="background-color: #ecf0f1;">
        <div class="container">
            <h2 class="text-center mb-5"
                style="color: #2c3e50; border-bottom: 2px solid #3498db; display: inline-block; padding-bottom: 15px;">
                Contact Information</h2>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card h-100 border-0 shadow text-center p-4" style="border-radius: 10px;">
                        <div class="mb-3" style="font-size: 3rem; color: #3498db;">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <h4>Visit Our Campus</h4>
                        <p>Computer Engineering Department<br>
                            Govt. Polytechnic Porbandar<br>
                            Dut Sai Nagar, Porbandar<br>
                            Gujarat 360575</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 border-0 shadow text-center p-4" style="border-radius: 10px;">
                        <div class="mb-3" style="font-size: 3rem; color: #3498db;">
                            <i class="fas fa-phone"></i>
                        </div>
                        <h4>Call Us</h4>
                        <p>Main Office: (0286) 224-1234<br>
                            Admissions: (0286) 224-1235<br>
                            Fax: (0286) 224-1236</p>
                        <p><strong>Office Hours:</strong><br>
                            Mon-Fri: 9:00 AM - 5:00 PM</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 border-0 shadow text-center p-4" style="border-radius: 10px;">
                        <div class="mb-3" style="font-size: 3rem; color: #3498db;">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <h4>Email Us</h4>
                        <p>General Inquiries: info@gpporbandar.ac.in<br>
                            Admissions: admissions@gpporbandar.ac.in<br>
                            Department: cs-dept@gpporbandar.ac.in<br>
                            Support: support@gpporbandar.ac.in</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <h2 class="text-center mb-5"
                style="color: #2c3e50; border-bottom: 2px solid #3498db; display: inline-block; padding-bottom: 15px;">
                Send Us a Message</h2>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <?php if (isset($_GET['success']) && $_GET['success'] === '1') { ?>
                        <div class="alert alert-success">Message sent successfully.</div>
                    <?php } ?>
                    <?php if (isset($_GET['error']) && $_GET['error'] === '1') { ?>
                        <div class="alert alert-danger">Could not send message. Please try again.</div>
                    <?php } ?>
                    <?php if (!empty($_GET['msg'])) { ?>
                        <div class="alert alert-warning"><?php echo htmlspecialchars($_GET['msg']); ?></div>
                    <?php } ?>
                <form method="POST" action="includes/contact_process.php">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="firstName" class="form-label">First Name *</label>
                                <input type="text" name="fname" class="form-control" id="firstName" required
                                    style="border-radius: 8px; padding: 12px 15px;">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="lastName" class="form-label">Last Name *</label>
                                <input type="text" name="lname" class="form-control" id="lastName" required
                                    style="border-radius: 8px; padding: 12px 15px;">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">Email Address *</label>
                                <input type="email" name="email" class="form-control" id="email" required
                                    style="border-radius: 8px; padding: 12px 15px;">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="tel" name="phone" class="form-control" id="phone"
                                    style="border-radius: 8px; padding: 12px 15px;">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="subject" class="form-label">Subject *</label>
                            <select name="subject" class="form-select" id="subject" required
                                style="border-radius: 8px; padding: 12px 15px;">
                                <option value="" selected disabled>Select a subject</option>
                                <option value="admissions">Admissions Inquiry</option>
                                <option value="programs">Program Information</option>
                                <option value="facilities">Facilities Tour</option>
                                <option value="research">Research Opportunities</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Message *</label>
                            <textarea name="message" class="form-control" id="message" rows="5" required
                                style="border-radius: 8px; padding: 12px 15px;"></textarea>
                        </div>
                        <div class="text-center">
                            <button type="submit" name="submit" class="btn text-white"
                                style="background-color: #7f1587; padding: 12px 30px; border-radius: 8px;">Send
                                Message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <h2 class="text-center mb-5"
                style="color: #2c3e50; border-bottom: 2px solid #3498db; display: inline-block; padding-bottom: 15px;">
                Department Contacts</h2>
            <div class="row">
                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="card h-100 border-0 shadow text-center p-4" style="border-radius: 10px;">
                        <h4>Department Head</h4>
                        <p>Dr. Robert Johnson</p>
                        <p>Email: r.johnson@gpporbandar.ac.in</p>
                        <p>Phone: (0286) 224-1237</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="card h-100 border-0 shadow text-center p-4" style="border-radius: 10px;">
                        <h4>Admissions Coordinator</h4>
                        <p>Ms. Sarah Williams</p>
                        <p>Email: s.williams@gpporbandar.ac.in</p>
                        <p>Phone: (0286) 224-1238</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="card h-100 border-0 shadow text-center p-4" style="border-radius: 10px;">
                        <h4>Student Affairs</h4>
                        <p>Mr. Michael Brown</p>
                        <p>Email: m.brown@gpporbandar.ac.in</p>
                        <p>Phone: (0286) 224-1239</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="card h-100 border-0 shadow text-center p-4" style="border-radius: 10px;">
                        <h4>Lab Coordinator</h4>
                        <p>Dr. Emily Davis</p>
                        <p>Email: e.davis@gpporbandar.ac.in</p>
                        <p>Phone: (0286) 224-1240</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5" style="background-color: #ecf0f1;">
        <div class="container">
            <h2 class="text-center mb-3"
                style="color: #2c3e50; border-bottom: 2px solid #3498db; display: inline-block; padding-bottom: 15px;">
                Student Portfolio</h2>
            <p class="text-center mb-5">Explore innovative projects created by our students using our state-of-the-art
                facilities</p>

            <div class="row">
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card h-100 border-0 shadow" style="border-radius: 10px;">
                        <div
                            style="height: 200px; background-image: url('https://images.unsplash.com/photo-1555949963-aa79dcee981c?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80'); background-size: cover; background-position: center;">
                        </div>
                        <div class="card-body p-4">
                            <h4>AI-Powered Healthcare System</h4>
                            <p>A machine learning system that analyzes medical data to assist in early disease detection
                                and diagnosis.</p>
                            <div class="mt-3">
                                <span class="badge bg-light text-dark me-1 mb-1">AI/ML</span>
                                <span class="badge bg-light text-dark me-1 mb-1">Healthcare</span>
                                <span class="badge bg-light text-dark me-1 mb-1">Python</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card h-100 border-0 shadow" style="border-radius: 10px;">
                        <div
                            style="height: 200px; background-image: url('https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80'); background-size: cover; background-position: center;">
                        </div>
                        <div class="card-body p-4">
                            <h4>Smart Campus Navigation</h4>
                            <p>A mobile application that provides indoor and outdoor navigation across the university
                                campus with AR features.</p>
                            <div class="mt-3">
                                <span class="badge bg-light text-dark me-1 mb-1">Mobile App</span>
                                <span class="badge bg-light text-dark me-1 mb-1">AR</span>
                                <span class="badge bg-light text-dark me-1 mb-1">React Native</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card h-100 border-0 shadow" style="border-radius: 10px;">
                        <div
                            style="height: 200px; background-image: url('https://images.unsplash.com/photo-1558494949-ef010cbdcc31?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80'); background-size: cover; background-position: center;">
                        </div>
                        <div class="card-body p-4">
                            <h4>Cybersecurity Threat Detection</h4>
                            <p>A network monitoring system that uses AI to detect and prevent cybersecurity threats in
                                real-time.</p>
                            <div class="mt-3">
                                <span class="badge bg-light text-dark me-1 mb-1">Cybersecurity</span>
                                <span class="badge bg-light text-dark me-1 mb-1">Networking</span>
                                <span class="badge bg-light text-dark me-1 mb-1">Python</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-4">
                <a href="#" class="btn text-white"
                    style="background-color: #3498db; padding: 12px 30px; border-radius: 8px;">View Full Portfolio</a>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <h2 class="text-center mb-5"
                style="color: #2c3e50; border-bottom: 2px solid #3498db; display: inline-block; padding-bottom: 15px;">
                Find Our Campus</h2>
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="border-0 shadow" style="border-radius: 10px; overflow: hidden;">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1854.2503717247348!2d69.65369580674593!3d21.644369909796612!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395634c4e4d01da5%3A0xd7c395f74e89053d!2sGovt.%20Polytechnic%20Porbandar%2C%20Dut%20Sai%20Nagar%2C%20Porbandar%2C%20Gujarat%20360575!5e0!3m2!1sgu!2sin!4v1762327345828!5m2!1sgu!2sin"
                            width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="py-4 text-white" style="background-color: #2c3e50;">
        <div class="container text-center">
            <div class="d-flex justify-content-center gap-3 mb-3">
                <a href="#"
                    class="d-flex align-items-center justify-content-center rounded-circle text-white text-decoration-none"
                    style="width: 40px; height: 40px; background-color: #3498db;">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#"
                    class="d-flex align-items-center justify-content-center rounded-circle text-white text-decoration-none"
                    style="width: 40px; height: 40px; background-color: #3498db;">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="#"
                    class="d-flex align-items-center justify-content-center rounded-circle text-white text-decoration-none"
                    style="width: 40px; height: 40px; background-color: #3498db;">
                    <i class="fab fa-linkedin-in"></i>
                </a>
                <a href="#"
                    class="d-flex align-items-center justify-content-center rounded-circle text-white text-decoration-none"
                    style="width: 40px; height: 40px; background-color: #3498db;">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="#"
                    class="d-flex align-items-center justify-content-center rounded-circle text-white text-decoration-none"
                    style="width: 40px; height: 40px; background-color: #3498db;">
                    <i class="fab fa-youtube"></i>
                </a>
            </div>
            <p class="mt-3">© 2023 Computer Engineering Department, Govt. Polytechnic Porbandar. All rights
                reserved.</p>
            <p>Contact: cs-dept@gpporbandar.ac.in | Phone: (0286) 224-1234</p>
            <div class="mt-3">
                <a href="bcontact.php" class="btn btn-outline-light me-2">Contact Us</a>
                <a href="#" class="btn btn-outline-light">View Portfolio</a>
            </div>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const cards = document.querySelectorAll('.card');
            cards.forEach(card => {
                card.addEventListener('mouseenter', function () {
                    this.style.transform = 'translateY(-10px)';
                    this.style.transition = 'transform 0.3s ease';
                });
                card.addEventListener('mouseleave', function () {
                    this.style.transform = 'translateY(0)';
                });
            });
        });
    </script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/dark-mode.js"></script>
</body>

</html>