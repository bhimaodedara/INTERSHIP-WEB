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
                    <ul class="navbar-nav ms-auto align-items-center">
                        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="lab.php">Labs</a></li>
                        <li class="nav-item"><a class="nav-link" href="admission.php">Admissions</a></li>
                        <li class="nav-item"><a class="nav-link" href="faculty.php">Faculty</a></li>
                        <li class="nav-item"><a class="nav-link active fw-bold" href="gallery.php">Gallery</a></li>
                        <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                        <li class="nav-item"><a class="nav-link" href="classroom.php">Classrooms</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <section class="text-white py-5" style="
        background: linear-gradient(rgba(26, 54, 93, 0.8), rgba(26, 54, 93, 0.9)), 
                    url('https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
        background-size: cover; background-position: center;">
        <div class="container text-center">
            <h1 class="display-4 fw-bold mb-4">Campus Gallery</h1>
            <p class="lead mb-4">Welcome to the Computer Engineering Department Gallery!</p>
        </div>
    </section>

 <!-- 
    ==================
    SEARCH UI FOR AJAX 
    ==================
  -->
<br>
<div class="row justify-content-center mb-4">
    <div class="col-md-6">
        <div class="input-group shadow-sm rounded">
            <span class="input-group-text bg-white border-end-0"><i class="fas fa-search text-muted"></i></span>
            <input type="text" class="form-control border-start-0" placeholder="Search gallery by title or description..." onkeyup="showGallerySuggestion(this.value)" autocomplete="off">
        </div>
    </div>
</div>


    <div class="container mt-5">
        <div class="d-flex justify-content-center flex-wrap mb-4" id="galleryNav">
            <button class="btn btn-outline-primary rounded-pill mx-1 my-1 active" onclick="filterGallery('all')">All Photos</button>
            <button class="btn btn-outline-primary rounded-pill mx-1 my-1" onclick="filterGallery('campus-life')">Campus Life</button>
            <button class="btn btn-outline-primary rounded-pill mx-1 my-1" onclick="filterGallery('academic')">Academic Excellence</button>
            <button class="btn btn-outline-primary rounded-pill mx-1 my-1" onclick="filterGallery('cultural')">Cultural Events</button>
            <button class="btn btn-outline-primary rounded-pill mx-1 my-1" onclick="filterGallery('sports')">Sports</button>
            <button class="btn btn-outline-primary rounded-pill mx-1 my-1" onclick="filterGallery('workshops')">Workshops & Seminars</button>
            <button class="btn btn-outline-primary rounded-pill mx-1 my-1" onclick="filterGallery('graduation')">Graduation Moments</button>
        </div>
    </div>

    <section class="py-5">
        <div class="container">
            <div class="row" id="galleryContainer">
                <?php
                $query = "SELECT * FROM gallery ORDER BY id DESC";
                $res = mysqli_query($conn, $query);
                if ($res && mysqli_num_rows($res) > 0) {
                    while ($photo = mysqli_fetch_assoc($res)) {
                        $cat_slug = strtolower(str_replace(' ', '-', $photo['category']));
                ?>
                        <div class="col-md-4 col-sm-6 mb-4 gallery-item <?php echo $cat_slug; ?>">
                            <div class="card border-0 shadow h-100" style="border-radius: 8px;">
                                <img src="<?php echo htmlspecialchars($photo['img_path']); ?>" alt="<?php echo htmlspecialchars($photo['title']); ?>" class="card-img-top" style="height: 250px; object-fit: cover;" onerror="this.src='https://via.placeholder.com/500x250'">
                                <div class="card-body">
                                    <h5 class="card-title fw-bold"><?php echo htmlspecialchars($photo['title']); ?></h5>
                                    <p class="card-text text-muted small"><?php echo htmlspecialchars($photo['description']); ?></p>
                                    <span class="badge bg-secondary text-capitalize"><?php echo htmlspecialchars($photo['category']); ?></span>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                } else {
                    echo "<div class='col-12 text-center'><p class='text-muted'>No photos uploaded to the gallery yet.</p></div>";
                }
                ?>
            </div>
        </div>
    </section>

    <footer class="py-5 text-white" style="background-color: #1a365d;">
        <div class="container text-center">
            <p>&copy; <?php echo date('Y'); ?> Computer Engineering Department. All Rights Reserved.</p>
        </div>
    </footer>

    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/dark-mode.js"></script>
    <script>
        function filterGallery(category) {
            const buttons = document.querySelectorAll('#galleryNav .btn');
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
    </script>
    <script>
    function showGallerySuggestion(str) {
    let displayArea = document.getElementById("galleryContainer");
    
    // Asynchronous communication using XMLHttpRequest object
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {
        // Look for completed transaction state (4) and success status (200)
        if (xhr.readyState == 4 && xhr.status == 200) {
            // Update the display grid context area smoothly without a screen reload
            displayArea.innerHTML = xhr.responseText;
        }
    };

    // Point the GET transaction directly toward your modular layout destination
    xhr.open("GET", "modules/search/gallery_search.php?q=" + encodeURIComponent(str), true);
    xhr.send();
}
    </script>
</body>
</html>