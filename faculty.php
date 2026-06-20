<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty - Computer Engineering Department</title>
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
                    <li class="nav-item"><a class="nav-link active" href="faculty.php">Faculty</a></li>
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
            <i class="fas fa-chalkboard-teacher me-1"></i> Our Team
        </span>
        <h1 class="display-4 fw-bold mb-3" style="color: white;">Our Faculty</h1>
        <p class="lead mx-auto" style="color: rgba(255,255,255,0.8); max-width: 700px;">
            Meet the dedicated educators in the Computer Engineering Department at Government Polytechnic Porbandar.
        </p>
    </div>
</section>

<!-- Faculty Grid -->
<section class="py-5" style="padding: 80px 0 !important; background: linear-gradient(180deg, var(--bg) 0%, rgba(6,182,212,0.03) 100%);">
    <div class="container">
        <div class="section-header">
            <h2>Computer Engineering Faculty</h2>
            <p>Experienced professionals committed to shaping the future of technology</p>
        </div>

        <!-- Search -->
        <div class="row justify-content-center mb-5">
            <div class="col-md-6">
                <div class="input-group shadow-sm rounded-3 overflow-hidden" style="border: 1px solid var(--border);">
                    <span class="input-group-text border-0 ps-4" style="background: var(--card-bg); color: var(--text-muted);">
                        <i class="fas fa-search"></i>
                    </span>
                    <input type="text" id="searchBox" class="form-control border-0 py-3" style="background: var(--card-bg); color: var(--text);" 
                           placeholder="Type a faculty name..." onkeyup="showFacultySuggestion(this.value)" autocomplete="off">
                </div>
            </div>
        </div>

        <div class="row g-4" id="facultyContainerArea">
            <?php 
            require_once 'config/db_connect.php';
            $sql = "SELECT * FROM faculty";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($faculty = mysqli_fetch_assoc($result)) { 
            ?>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="card-modern h-100 text-center p-4">
                            <div class="position-relative mx-auto mb-4" style="width: 130px; height: 130px;">
                                <img src="<?php echo htmlspecialchars($faculty['img']); ?>" 
                                     class="rounded-circle w-100 h-100" style="object-fit: cover; border: 4px solid var(--border); padding: 4px; background: var(--card-bg);"
                                     onerror="this.src='https://via.placeholder.com/130'">
                                <div class="position-absolute bottom-0 end-0" style="width: 32px; height: 32px; background: var(--secondary); border-radius: 50%; border: 3px solid var(--card-bg); display: flex; align-items: center; justify-content: center;">
                                    <i class="fas fa-check" style="color: white; font-size: 0.7rem;"></i>
                                </div>
                            </div>
                            <h5 class="fw-bold mb-1" style="color: var(--text);"><?php echo htmlspecialchars($faculty['name']); ?></h5>
                            <p class="fw-semibold mb-2" style="color: var(--secondary); font-size: 0.9rem;"><?php echo htmlspecialchars($faculty['role']); ?></p>
                            <p class="text-muted small mb-0"><?php echo htmlspecialchars($faculty['qual']); ?></p>
                        </div>
                    </div>
            <?php 
                }
            } else {
                echo '<div class="col-12 text-center py-5"><i class="fas fa-users fa-3x mb-3" style="color: var(--text-muted);"></i><h5>No faculty members found.</h5><p class="text-muted">Check back later for updates.</p></div>';
            }
            ?>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="footer-modern pt-5 pb-4">
    <div class="container text-center">
        <p class="mb-0 small">&copy; <?php echo date('Y'); ?> Computer Engineering Department GPP. All Rights Reserved.</p>
    </div>
</footer>

<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/dark-mode.js"></script>
<script>
    function showFacultySuggestion(str) {
        let displayArea = document.getElementById("facultyContainerArea");
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                displayArea.innerHTML = xhr.responseText;
            }
        };
        xhr.open("GET", "modules/search/faculty_search.php?q=" + encodeURIComponent(str), true);
        xhr.send();
    }
</script>
</body>
</html>