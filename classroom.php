<?php
// Include database connection
require_once 'config/db_connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classrooms - Computer Engineering Department</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
                    <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                    <li class="nav-item"><a class="nav-link active" href="classroom.php">Classrooms</a></li>
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
            <i class="fas fa-school me-1"></i> Infrastructure
        </span>
        <h1 class="display-4 fw-bold mb-3" style="color: white;">Classrooms & Facilities</h1>
        <p class="lead mx-auto" style="color: rgba(255,255,255,0.8); max-width: 700px;">
            High-tech learning environments designed for technical training, equipped with specialized computing configurations and modern presentation devices.
        </p>
    </div>
</section>

<!-- Search & Grid -->
<section class="py-5" style="padding: 80px 0 !important; background: linear-gradient(180deg, var(--bg) 0%, rgba(6,182,212,0.03) 100%);">
    <div class="container">
        <div class="section-header">
            <h2>Our Learning Environments</h2>
            <p>Explore state-of-the-art halls and software development workstations</p>
        </div>

        <!-- Search Bar -->
        <div class="row justify-content-center mb-5">
            <div class="col-md-6">
                <div class="input-group shadow-sm rounded-3 overflow-hidden" style="border: 1px solid var(--border);">
                    <span class="input-group-text border-0 ps-4" style="background: var(--card-bg); color: var(--text-muted);">
                        <i class="fas fa-search"></i>
                    </span>
                    <input type="text" class="form-control border-0 py-3" style="background: var(--card-bg); color: var(--text);" 
                           placeholder="Search rooms or facilities (e.g., Wi-Fi, Projector)..." onkeyup="showClassroomSuggestion(this.value)" autocomplete="off">
                </div>
            </div>
        </div>

        <div class="row g-4" id="classroomDisplayArea">
            <?php
            // Fetch dynamically from database
            $query = mysqli_query($conn, "SELECT * FROM classrooms ORDER BY id DESC");
            if(mysqli_num_rows($query) > 0) {
                while($row = mysqli_fetch_assoc($query)) {
                    $roomNo = htmlspecialchars($row['room_no']);
                    $capacity = (int)$row['capacity'];
                    $img = htmlspecialchars($row['img_path']);
                    $facilities_array = explode(',', $row['facilities']);
            ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="card-modern h-100" style="overflow: hidden;">
                            <div style="height: 220px; overflow: hidden; position: relative;">
                                <img src="<?php echo $img; ?>" alt="<?php echo $roomNo; ?>" class="w-100 h-100" style="object-fit: cover; transition: transform 0.5s ease;" 
                                     onerror="this.src='https://via.placeholder.com/500x300?text=Classroom+Image'">
                                <div class="position-absolute top-0 end-0 m-3">
                                    <span class="badge px-3 py-2" style="background: rgba(0,0,0,0.7); color: white; backdrop-filter: blur(10px);">
                                        <i class="fas fa-users me-1"></i> Cap: <?php echo $capacity; ?>
                                    </span>
                                </div>
                            </div>
                            <div class="card-body p-4">
                                <h5 class="fw-bold mb-3" style="color: var(--text);"><?php echo $roomNo; ?></h5>
                                <p class="text-uppercase text-muted fw-bold mb-2" style="font-size: 0.7rem; letter-spacing: 0.1em;">Facilities Provided</p>
                                <div class="d-flex flex-wrap gap-2">
                                    <?php 
                                    foreach($facilities_array as $facility) {
                                        $trimmed = trim($facility);
                                        if(!empty($trimmed)) {
                                            echo "<span class='badge' style='background: rgba(6,182,212,0.1); color: var(--secondary); font-weight: 500;'>" . htmlspecialchars($trimmed) . "</span>";
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo "
                <div class='col-12 text-center py-5'>
                    <div class='text-muted'>
                        <i class='fas fa-school fa-3x mb-3' style='color: var(--text-muted);'></i>
                        <h5>No classrooms or labs configured yet.</h5>
                        <p class='small text-muted'>Please add item configurations inside your administrative panel setup.</p>
                    </div>
                </div>";
            }
            ?>
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
        </div>s``
        <div class="text-center pt-4 border-top" style="border-color: rgba(255,255,255,0.1) !important;">
            <p class="mb-0 small">&copy; 2023 Computer Engineering Department, GPP. All Rights Reserved.</p>
        </div>
    </div>
</footer>

<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/dark-mode.js"></script>
<script>
    // Smooth card hover actions
    document.addEventListener('DOMContentLoaded', function () {
        const cards = document.querySelectorAll('.card-modern');
        cards.forEach(card => {
            card.addEventListener('mouseenter', function () {
                const img = this.querySelector('img');
                if(img) img.style.transform = 'scale(1.08)';
            });
            card.addEventListener('mouseleave', function () {
                const img = this.querySelector('img');
                if(img) img.style.transform = 'scale(1)';
            });
        });
    });

    // AJAX Search Functionality
    function showClassroomSuggestion(str) {
        let displayArea = document.getElementById("classroomDisplayArea");
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                displayArea.innerHTML = xhr.responseText;
            }
        };
        xhr.open("GET", "modules/search/classroom_search.php?q=" + encodeURIComponent(str), true);
        xhr.send();
    }
</script>
</body>
</html>