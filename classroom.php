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
</head>
<body>
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
                        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="lab.php">Labs</a></li>
                        <li class="nav-item"><a class="nav-link" href="admission.php">Admissions</a></li>
                        <li class="nav-item"><a class="nav-link" href="faculty.php">Faculty</a></li>
                        <li class="nav-item"><a class="nav-link" href="gallery.php">Gallery</a></li>
                        <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                        <li class="nav-item"><a class="nav-link active fw-bold" href="classroom.php">Classrooms</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <section class="text-white py-5" style="
        background: linear-gradient(rgba(26, 54, 93, 0.8), rgba(26, 54, 93, 0.9)), 
                    url('https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
        background-size: cover;
        background-position: center;
    ">
        <div class="container text-center">
            <h1 class="display-4 fw-bold mb-4">Classrooms & Facilities</h1>
            <p class="lead mb-4">Welcome to the Computer Engineering Infrastructure — high-tech learning environments designed for technical training.</p>
            <p>Our department provides premium academic spaces equipped with specialized computing configurations, reliable data streaming, and presentation devices.</p>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="mb-3" style="color: #1a365d;">Our Learning Environments</h2>
                <p class="mx-auto text-muted" style="max-width: 700px;">Explore the state-of-the-art halls and software development workstations built to foster innovative instruction and research.</p>
            </div>

            <!-- Search Bar UI -->

            <div class="container mb-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="input-group shadow-sm rounded">
                <span class="input-group-text bg-white border-end-0"><i class="fas fa-search text-muted"></i></span>
                <input type="text" class="form-control border-start-0" placeholder="Search rooms or facilities (e.g., Wi-Fi, Projector)..." onkeyup="showClassroomSuggestion(this.value)" autocomplete="off">
            </div>
        </div>
    </div>
</div>
            <div class="row" id="classroomDisplayArea">
                <?php
                // Fetch dynamically from database
                $query = mysqli_query($conn, "SELECT * FROM classrooms ORDER BY id DESC");
                if(mysqli_num_rows($query) > 0) {
                    while($row = mysqli_fetch_assoc($query)) {
                        $roomNo = htmlspecialchars($row['room_no']);
                        $capacity = (int)$row['capacity'];
                        $img = htmlspecialchars($row['img_path']);
                        
                        // Break comma separated facilities into structured display strings
                        $facilities_array = explode(',', $row['facilities']);
                ?>
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card h-100 border-0 shadow" style="border-radius: 8px; overflow: hidden;">
                                <img src="<?php echo $img; ?>" alt="<?php echo $roomNo; ?>" class="card-img-top" style="height: 230px; object-fit: cover;" onerror="this.src='https://via.placeholder.com/500x300?text=Classroom+Image'">
                                <div class="card-body p-4">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <h5 class="card-title mb-0" style="color: #1a365d; font-weight: 600;"><?php echo $roomNo; ?></h5>
                                        <span class="badge bg-light text-primary border border-primary rounded-pill px-2 py-1 small">
                                            <i class="fas fa-users me-1"></i> Cap: <?php echo $capacity; ?>
                                        </span>
                                    </div>
                                    <hr class="text-muted my-2">
                                    <p class="card-text text-uppercase text-secondary tracking-wider fw-bold mb-2" style="font-size: 0.75rem;">Facilities Provided:</p>
                                    <div class="d-flex flex-wrap gap-1">
                                        <?php 
                                        foreach($facilities_array as $facility) {
                                            $trimmed = trim($facility);
                                            if(!empty($trimmed)) {
                                                echo "<span class='badge bg-secondary text-capitalize' style='font-size: 0.8rem; font-weight: 500;'>" . htmlspecialchars($trimmed) . "</span>";
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
                            <i class='fas fa-school fa-3x mb-3 text-secondary'></i>
                            <h5>No classrooms or labs configured yet.</h5>
                            <p class='small text-muted'>Please add item configurations inside your administrative panel setup.</p>
                        </div>
                    </div>";
                }
                ?>
            </div>
        </div>
    </section>

    <footer class="text-white pt-5 pb-3 mt-auto" style="background-color: #2c3e50;">
        <div class="container">
            <div class="row g-4 mb-4">
                <div class="col-lg-6">
                    <h5 class="text-uppercase fw-bold mb-3" style="color: #e9b949;">About the Infrastructure</h5>
                    <p class="text-white-50" style="font-size: 0.9rem; line-height: 1.6;">The Computer Engineering Department operates multiple interactive facilities supporting research work, digital presentations, high-speed broadband deployments, and smart collaboration platforms.</p>
                </div>
                <div class="col-lg-6 text-md-end">
                    <h5 class="text-uppercase fw-bold mb-3" style="color: #e9b949;">Department Quicklinks</h5>
                    <ul class="list-unstyled small">
                        <li class="mb-2"><i class="fas fa-map-marker-alt me-2 text-warning"></i> Govt. Polytechnic, Porbandar</li>
                        <li><a href="admin.php" class="text-white-50 text-decoration-none"><i class="fas fa-lock me-1"></i>Portal Management Login</a></li>
                    </ul>
                </div>
            </div>
            <div class="text-center pt-3 border-top" style="border-color: rgba(255, 255, 255, 0.1) !important;">
                <p class="mb-0">&copy; <?php echo date('Y'); ?> Computer Engineering Department GPP. All Rights Reserved.</p>
            </div>
        </div>
    </footer>

    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/dark-mode.js"></script>
    <script>
        // Smooth card hover actions synchronized with the core theme files
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

    <!-- AJAX Search Functionality -->
    <script>
        function showClassroomSuggestion(str) {
            let displayArea = document.getElementById("classroomDisplayArea");
            
            // Asynchronous communication using XMLHttpRequest object
            var xhr = new XMLHttpRequest();

            xhr.onreadystatechange = function() {
                // Confirm transaction state completion (4) and connection success (200)
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // Update display area directly without a page refresh
                    displayArea.innerHTML = xhr.responseText;
                }
            };

            // Point GET transaction securely to your clean module folder path
            xhr.open("GET", "modules/search/classroom_search.php?q=" + encodeURIComponent(str), true);
            xhr.send();
        }
    
    </script>
</body>
</html>