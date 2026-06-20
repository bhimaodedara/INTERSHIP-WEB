<?php
require_once 'config/db_connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery - Computer Engineering Department</title>
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
                    <li class="nav-item"><a class="nav-link active" href="gallery.php">Gallery</a></li>
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

<section class="hero-gradient py-5" style="padding-top: 100px !important; padding-bottom: 80px !important;">
    <div class="container text-center">
        <span class="badge px-3 py-2 mb-3" style="background: rgba(139,92,246,0.15); color: #c4b5fd; border: 1px solid rgba(139,92,246,0.3);">
            <i class="fas fa-images me-1"></i> Memories
        </span>
        <h1 class="display-4 fw-bold mb-3" style="color: white;">Campus Gallery</h1>
        <p class="lead mx-auto" style="color: rgba(255,255,255,0.8); max-width: 700px;">
            Welcome to the Computer Engineering Department Gallery! Explore moments from campus life, academics, and events.
        </p>
    </div>
</section>

<section class="py-5" style="padding: 80px 0 !important; background: linear-gradient(180deg, var(--bg) 0%, rgba(6,182,212,0.03) 100%);">
    <div class="container">
        <div class="section-header">
            <h2>Photo Gallery</h2>
            <p>Capturing the spirit of our institution</p>
        </div>

        <div class="row justify-content-center mb-5">
            <div class="col-md-6">
                <div class="input-group shadow-sm rounded-3 overflow-hidden" style="border: 1px solid var(--border);">
                    <span class="input-group-text border-0 ps-4" style="background: var(--card-bg); color: var(--text-muted);">
                        <i class="fas fa-search"></i>
                    </span>
                    <input type="text" class="form-control border-0 py-3" style="background: var(--card-bg); color: var(--text);" 
                           placeholder="Search gallery by title or description..." onkeyup="showGallerySuggestion(this.value)" autocomplete="off">
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-center flex-wrap mb-5 gap-2" id="galleryNav">
            <button class="filter-btn active" onclick="filterGallery('all')">All Photos</button>
            <button class="filter-btn" onclick="filterGallery('campus-life')">Campus Life</button>
            <button class="filter-btn" onclick="filterGallery('academic')">Academic</button>
            <button class="filter-btn" onclick="filterGallery('cultural')">Cultural</button>
            <button class="filter-btn" onclick="filterGallery('sports')">Sports</button>
            <button class="filter-btn" onclick="filterGallery('workshops')">Workshops</button>
            <button class="filter-btn" onclick="filterGallery('graduation')">Graduation</button>
        </div>

        <div class="row g-4" id="galleryContainer">
            <?php
            $query = "SELECT * FROM gallery ORDER BY id DESC";
            $res = mysqli_query($conn, $query);
            if ($res && mysqli_num_rows($res) > 0) {
                while ($photo = mysqli_fetch_assoc($res)) {
                    $cat_slug = strtolower(str_replace(' ', '-', $photo['category']));
            ?>
                    <div class="col-md-4 col-sm-6 gallery-item <?php echo $cat_slug; ?>">
                        <div class="card-modern h-100" style="overflow: hidden;">
                            <div style="height: 250px; overflow: hidden;">
                                <img src="<?php echo htmlspecialchars($photo['img_path']); ?>" alt="<?php echo htmlspecialchars($photo['title']); ?>" 
                                     class="w-100 h-100" style="object-fit: cover; transition: transform 0.5s ease;" onerror="this.src='https://via.placeholder.com/500x250'">
                            </div>
                            <div class="card-body p-4">
                                <h5 class="fw-bold mb-2" style="color: var(--text);"><?php echo htmlspecialchars($photo['title']); ?></h5>
                                <p class="text-muted small mb-3"><?php echo htmlspecialchars($photo['description']); ?></p>
                                <span class="badge" style="background: rgba(6,182,212,0.1); color: var(--secondary); text-transform: capitalize;"><?php echo htmlspecialchars($photo['category']); ?></span>
                            </div>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo "<div class='col-12 text-center py-5'><i class='fas fa-images fa-3x mb-3' style='color: var(--text-muted);'></i><h5>No photos uploaded yet.</h5><p class='text-muted'>Check back later for updates.</p></div>";
            }
            ?>
        </div>
    </div>
</section>

<footer class="footer-modern pt-5 pb-4">
    <div class="container text-center">
        <p class="mb-0 small">&copy; <?php echo date('Y'); ?> Computer Engineering Department. All Rights Reserved.</p>
    </div>
</footer>

<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/dark-mode.js"></script>
<script>
    function filterGallery(category) {
        const buttons = document.querySelectorAll('#galleryNav .filter-btn');
        buttons.forEach(btn => btn.classList.remove('active'));
        event.target.classList.add('active');
        const galleryItems = document.querySelectorAll('.gallery-item');
        galleryItems.forEach(item => {
            if (category === 'all' || item.classList.contains(category)) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });
    }
    function showGallerySuggestion(str) {
        let displayArea = document.getElementById("galleryContainer");
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                displayArea.innerHTML = xhr.responseText;
            }
        };
        xhr.open("GET", "modules/search/gallery_search.php?q=" + encodeURIComponent(str), true);
        xhr.send();
    }
</script>
</body>
</html>