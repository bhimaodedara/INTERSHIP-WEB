
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty - Computer Engineering Department</title>
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
                <div class="d-flex align-items-center ms-auto">
                   
                       
                    </button>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="lab.php">Labs</a></li>
                        <li class="nav-item"><a class="nav-link" href="admission.php">Admissions</a></li>
                        <li class="nav-item"><a class="nav-link active fw-bold" href="faculty.php">Faculty</a></li>
                        <li class="nav-item"><a class="nav-link" href="gallery.php">Gallery</a></li>
                        <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                        <li class="nav-item"><a class="nav-link" href="classroom.php">Classrooms</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    
    <section class="text-white py-5" style="
        background: linear-gradient(rgba(26, 54, 93, 0.8), rgba(26, 54, 93, 0.8)), 
                    url('https://images.unsplash.com/photo-1517077304055-6e89abbf09b0?ixlib=rb-4.0.3') center/cover no-repeat;
    ">
        <div class="container text-center">
            <h1 class="display-4 fw-bold">Our Faculty</h1>
            <p class="lead">Meet the dedicated educators in the Computer Engineering Department at GPPR CTE Guj.</p>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="mb-3" style="color: #1a365d;">Computer Engineering Faculty</h2>
                <p class="mx-auto text-muted" style="max-width: 700px;">Experienced professionals committed to shaping the future of technology.</p>
            </div>

            <div class="container mb-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="input-group shadow-sm rounded">
                <span class="input-group-text bg-white border-end-0"><i class="fas fa-search text-muted"></i></span>
                <input type="text" id="searchBox" class="form-control border-start-0" placeholder="Type a faculty name..." onkeyup="showFacultySuggestion(this.value)" autocomplete="off">
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row" id="facultyContainerArea">
            
            <div class="row">
                <?php 
                require_once 'config/db_connect.php';
                $sql = "SELECT * FROM faculty";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($faculty = mysqli_fetch_assoc($result)) { 
                ?>
                        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                            <div class="card border-0 shadow h-100 text-center p-3" style="border-radius: 8px;">
                                <img src="<?php echo htmlspecialchars($faculty['img']); ?>" class="card-img-top rounded-circle mx-auto mt-3" style="width: 130px; height: 130px; object-fit: cover;" onerror="this.src='https://via.placeholder.com/130'">
                                <div class="card-body">
                                    <h5 class="card-title fw-bold" style="color: #1a365d;"><?php echo htmlspecialchars($faculty['name']); ?></h5>
                                    <p class="card-text text-primary mb-1 fw-semibold"><?php echo htmlspecialchars($faculty['role']); ?></p>
                                    <p class="card-text text-muted small"><?php echo htmlspecialchars($faculty['qual']); ?></p>
                                </div>
                            </div>
                        </div>
                <?php 
                    }
                } 
                ?>
            </div>
        </div>
    </section>

    <footer class="text-white pt-5 pb-3" style="background-color: #2c3e50;">
        <div class="container text-center">
            <p>&copy; <?php echo date('Y'); ?> Computer Engineering Department GPP. All Rights Reserved.</p>
        </div>
    </footer>

    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/dark-mode.js"></script>


    <script>
        function showFacultySuggestion(str) {
          let displayArea = document.getElementById("facultyContainerArea");
    
    // Create the XMLHttpRequest object for background transmission
         var xhr = new XMLHttpRequest();

         xhr.onreadystatechange = function() {
        // Look for completion state (4) and successful server response (200)
            if (xhr.readyState == 4 && xhr.status == 200) {
            // Update the display area seamlessly without page reloads
                   displayArea.innerHTML = xhr.responseText;
        }
    };

    // Point the URL directly to your newly created module file
    xhr.open("GET", "modules/search/faculty_search.php?q=" + encodeURIComponent(str), true);
    xhr.send();
}
</script>
</body>
</html>