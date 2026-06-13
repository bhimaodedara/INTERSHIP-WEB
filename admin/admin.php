<?php
session_start();
require_once '../config/db_connect.php';

// Helper for Activity Logging
function logActivity($conn, $action, $details) {
    $user = 'Geo Admin';
    $action = mysqli_real_escape_string($conn, $action);
    $details = mysqli_real_escape_string($conn, $details);
    mysqli_query($conn, "INSERT INTO activity_logs (user, action, details) VALUES ('$user', '$action', '$details')");
}

// Handle Logout
if (isset($_GET['logout'])) {
    logActivity($conn, 'Logout', 'Geo Admin logged out');
    session_destroy();
    header("Location: admin.php");
    exit;
}

// Handle Login Form Submission
$loginError = "";
if (isset($_POST['login'])) {
    if ($_POST['username'] === 'admin' && $_POST['password'] === 'admin123') {
        $_SESSION['admin_logged_in'] = true;
        logActivity($conn, 'Login', 'Geo Admin logged in successfully');
        header("Location: admin.php");
        exit;
    } else {
        $loginError = "Invalid credentials!";
    }
}

if (isset($_SESSION['admin_logged_in'])) {
    
    /* =========================================
       ACTION: ADD FACULTY & AUTO-UPLOAD IMAGE
    ========================================= */
    if (isset($_POST['add_faculty'])) {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $role = mysqli_real_escape_string($conn, $_POST['role']);
        $qual = mysqli_real_escape_string($conn, $_POST['qual']);
        
        // Default relative path for front-end visibility
        $img_db_path = "assets/images/default-profile.png"; 
        
        if (isset($_FILES['faculty_image']) && $_FILES['faculty_image']['error'] == 0) {
            $file_name = $_FILES['faculty_image']['name'];
            $file_tmp  = $_FILES['faculty_image']['tmp_name'];
            $file_ext  = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
            
            $allowed_extensions = array('jpg', 'jpeg', 'png', 'gif', 'webp');
            
            if (in_array($file_ext, $allowed_extensions)) {
                $target_folder = '../uploads/';
                if (!is_dir($target_folder)) { mkdir($target_folder, 0755, true); }
                $unique_filename = 'faculty_' . uniqid() . '.' . $file_ext;
                $final_destination = $target_folder . $unique_filename;
                
                if (move_uploaded_file($file_tmp, $final_destination)) { 
                    // Save clean path layout to database without "../"
                    $img_db_path = "uploads/" . $unique_filename; 
                }
            }
        }
        
        mysqli_query($conn, "INSERT INTO faculty (name, role, qual, img) VALUES ('$name', '$role', '$qual', '$img_db_path')");
        logActivity($conn, 'Add', "Added new faculty: $name");
        header("Location: admin.php?page=faculty");
        exit;
    }

    if (isset($_GET['delete_faculty'])) {
        $id = (int)$_GET['delete_faculty'];
        $file_query = mysqli_query($conn, "SELECT img FROM faculty WHERE id = $id");
        if($file_row = mysqli_fetch_assoc($file_query)) {
            // Reconstruct server directory destination to delete file securely
            $server_file_path = "../" . $file_row['img'];
            if(file_exists($server_file_path) && $file_row['img'] != "assets/images/default-profile.png") { 
                unlink($server_file_path); 
            }
        }
        mysqli_query($conn, "DELETE FROM faculty WHERE id = $id");
        logActivity($conn, 'Delete', "Deleted faculty ID: $id");
        header("Location: admin.php?page=faculty");
        exit;
    }

    /* =========================================
       ACTION: ADD GALLERY & AUTO-UPLOAD IMAGE
    ========================================= */
    if (isset($_POST['add_gallery'])) {
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $category = mysqli_real_escape_string($conn, $_POST['category']);
        $desc = mysqli_real_escape_string($conn, $_POST['description']);
        
        $img_db_path = "assets/images/default-gallery.png"; 
        
        if (isset($_FILES['gallery_image']) && $_FILES['gallery_image']['error'] == 0) {
            $file_name = $_FILES['gallery_image']['name'];
            $file_tmp  = $_FILES['gallery_image']['tmp_name'];
            $file_ext  = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
            
            $allowed_extensions = array('jpg', 'jpeg', 'png', 'gif', 'webp');
            
            if (in_array($file_ext, $allowed_extensions)) {
                $target_folder = '../uploads/';
                if (!is_dir($target_folder)) { mkdir($target_folder, 0755, true); }
                $unique_filename = 'gallery_' . uniqid() . '.' . $file_ext;
                $final_destination = $target_folder . $unique_filename;
                
                if (move_uploaded_file($file_tmp, $final_destination)) { 
                    $img_db_path = "uploads/" . $unique_filename; 
                }
            }
        }
        
        mysqli_query($conn, "INSERT INTO gallery (title, category, description, img_path) VALUES ('$title', '$category', '$desc', '$img_db_path')");
        logActivity($conn, 'Add', "Added gallery photo: $title");
        header("Location: admin.php?page=gallery");
        exit;
    }

    if (isset($_GET['delete_gallery'])) {
        $id = (int)$_GET['delete_gallery'];
        $file_query = mysqli_query($conn, "SELECT img_path FROM gallery WHERE id = $id");
        if($file_row = mysqli_fetch_assoc($file_query)) {
            $server_file_path = "../" . $file_row['img_path'];
            if(file_exists($server_file_path) && $file_row['img_path'] != "assets/images/default-gallery.png") { 
                unlink($server_file_path); 
            }
        }
        mysqli_query($conn, "DELETE FROM gallery WHERE id = $id");
        logActivity($conn, 'Delete', "Deleted gallery photo ID: $id");
        header("Location: admin.php?page=gallery");
        exit;
    }

    /* =========================================
       ACTION: ADD CLASSROOM & AUTO-UPLOAD IMAGE
    ========================================= */
    if (isset($_POST['add_classroom'])) {
        $room_no = mysqli_real_escape_string($conn, $_POST['room_no']);
        $capacity = (int)$_POST['capacity'];
        $facilities = mysqli_real_escape_string($conn, $_POST['facilities']);
        
        $img_db_path = "assets/images/default-classroom.png";
        
        if (isset($_FILES['classroom_image']) && $_FILES['classroom_image']['error'] == 0) {
            $file_name = $_FILES['classroom_image']['name'];
            $file_tmp  = $_FILES['classroom_image']['tmp_name'];
            $file_ext  = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
            
            $allowed_extensions = array('jpg', 'jpeg', 'png', 'gif', 'webp');
            
            if (in_array($file_ext, $allowed_extensions)) {
                $target_folder = '../uploads/';
                if (!is_dir($target_folder)) { mkdir($target_folder, 0755, true); }
                $unique_filename = 'classroom_' . uniqid() . '.' . $file_ext;
                $final_destination = $target_folder . $unique_filename;
                
                if (move_uploaded_file($file_tmp, $final_destination)) { 
                    $img_db_path = "uploads/" . $unique_filename; 
                }
            }
        }
        
        mysqli_query($conn, "INSERT INTO classrooms (room_no, capacity, facilities, img_path) VALUES ('$room_no', $capacity, '$facilities', '$img_db_path')");
        logActivity($conn, 'Add', "Added new Classroom/Lab: $room_no");
        header("Location: admin.php?page=classrooms");
        exit;
    }

    if (isset($_GET['delete_classroom'])) {
        $id = (int)$_GET['delete_classroom'];
        $file_query = mysqli_query($conn, "SELECT img_path FROM classrooms WHERE id = $id");
        if($file_row = mysqli_fetch_assoc($file_query)) {
            $server_file_path = "../" . $file_row['img_path'];
            if(file_exists($server_file_path) && $file_row['img_path'] != "assets/images/default-classroom.png") { 
                unlink($server_file_path); 
            }
        }
        mysqli_query($conn, "DELETE FROM classrooms WHERE id = $id");
        logActivity($conn, 'Delete', "Deleted classroom ID: $id");
        header("Location: admin.php?page=classrooms");
        exit;
    }

    /* =========================================
       ACTION: DELETE CONTACT MESSAGES
    ========================================= */
    if (isset($_GET['delete_msg'])) {
        $id = (int)$_GET['delete_msg'];
        mysqli_query($conn, "DELETE FROM contact_messages WHERE id = $id");
        logActivity($conn, 'Delete', "Deleted message ID: $id");
        header("Location: admin.php?page=messages");
        exit;
    }

    // Dynamic Sidebar counters
    $facCount = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM faculty"))['total'] ?? 0;
    $galCount = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM gallery"))['total'] ?? 0;
    $clsCount = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM classrooms"))['total'] ?? 0;
    $msgCount = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM contact_messages"))['total'] ?? 0;
}
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f4f6f9; font-family: sans-serif; }
        .sidebar { width: 260px; height: 100vh; position: fixed; background: #fff; border-right: 1px solid #ddd; top: 0; left: 0; }
        .main-content { margin-left: 260px; padding: 30px; }
        .nav-link { color: #333; padding: 12px 20px; display: block; text-decoration: none; }
        .nav-link.active { background: rgba(52,152,219,0.1); color: #3498db; }
    </style>
</head>
<body>
    <?php if (!isset($_SESSION['admin_logged_in'])): ?>
    <div class="d-flex align-items-center justify-content-center" style="height:100vh;">
        <div class="card p-5 shadow-sm" style="width: 400px;">
            <h3 class="text-center mb-4">Admin Login</h3>
            <?php if($loginError) echo "<div class='alert alert-danger'>$loginError</div>"; ?>
            <form method="POST">
                <div class="mb-3"><label>Username</label><input type="text" name="username" class="form-control" required></div>
                <div class="mb-4"><label>Password</label><input type="password" name="password" class="form-control" required></div>
                <button type="submit" name="login" class="btn btn-primary w-100">Login</button>
            </form>
        </div>
    </div>
    <?php else: $page = $_GET['page'] ?? 'dashboard'; ?>
    
    <div class="sidebar">
        <div class="p-3 border-bottom"><h5>Admin Portal</h5></div>
        
        <a href="../index.php" class="nav-link text-primary fw-bold border-bottom"><i class="fas fa-external-link-alt me-2"></i>Go to Public Site</a>
        <a href="manage_applications.php" class="nav-link text-success fw-bold"><i class="fas fa-file-signature me-2"></i>Applications Desk <span class="badge bg-success text-white rounded-pill float-end mt-1">Portal</span></a>
        <a href="admin.php?page=dashboard" class="nav-link <?php echo $page=='dashboard'?'active':''; ?> mt-2"><i class="fas fa-home me-2"></i>Dashboard</a>
        <a href="admin.php?page=faculty" class="nav-link <?php echo $page=='faculty'?'active':''; ?>"><i class="fas fa-users me-2"></i>Faculty (<?php echo $facCount; ?>)</a>
        <a href="admin.php?page=gallery" class="nav-link <?php echo $page=='gallery'?'active':''; ?>"><i class="fas fa-images me-2"></i>Gallery (<?php echo $galCount; ?>)</a>
        <a href="admin.php?page=classrooms" class="nav-link <?php echo $page=='classrooms'?'active':''; ?>"><i class="fas fa-school me-2"></i>Classrooms (<?php echo $clsCount; ?>)</a>
        <a href="admin.php?page=messages" class="nav-link <?php echo $page=='messages'?'active':''; ?>"><i class="fas fa-envelope me-2"></i>Messages <span class="badge bg-danger rounded-pill float-end mt-1"><?php echo $msgCount; ?></span></a>
        
        <a href="admin.php?logout=true" class="nav-link text-danger mt-5"><i class="fas fa-sign-out-alt me-2"></i>Logout</a>
    </div>

    <div class="main-content">
        <?php if ($page == 'dashboard'): ?>
            <h4>Welcome, Administrator</h4>
            <p>Select a section from the sidebar menu to coordinate website settings instantly.</p>
            
        <?php elseif ($page == 'faculty'): ?>
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4>Manage Faculty Members</h4>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addFacultyModal"><i class="fas fa-plus me-2"></i>Add Faculty Remotely</button>
            </div>
            <table class="table bg-white shadow-sm rounded">
                <thead><tr><th>Image</th><th>Name</th><th>Role</th><th>Qualifications</th><th>Actions</th></tr></thead>
                <tbody>
                    <?php
                    $res = mysqli_query($conn, "SELECT * FROM faculty ORDER BY id DESC");
                    while($row = mysqli_fetch_assoc($res)) {
                        // FIXED: Appended context step-out directory so admin layout previews rows properly
                        echo "<tr>
                            <td><img src='../{$row['img']}' width='50' height='50' class='rounded-circle' style='object-fit:cover;' onerror=\"this.src='https://via.placeholder.com/50'\"></td>
                            <td><b>{$row['name']}</b></td>
                            <td>{$row['role']}</td>
                            <td>{$row['qual']}</td>
                            <td><a href='admin.php?page=faculty&delete_faculty={$row['id']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Remove faculty member?\")'><i class='fas fa-trash'></i></a></td>
                        </tr>";
                    }
                    ?>
                </tbody>
            </table>
            
            <div class="modal fade" id="addFacultyModal" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form method="POST" action="admin.php?page=faculty" enctype="multipart/form-data" class="modal-body">
                            <h5 class="mb-3">Add New Faculty Member</h5>
                            <div class="mb-2"><label>Full Name</label><input type="text" name="name" class="form-control" required></div>
                            <div class="mb-2"><label>Role</label><input type="text" name="role" class="form-control" required></div>
                            <div class="mb-2"><label>Qualifications</label><input type="text" name="qual" class="form-control" required></div>
                            <div class="mb-4"><label>Select Profile Photo Image</label><input type="file" name="faculty_image" class="form-control" accept="image/*" required></div>
                            <button type="submit" name="add_faculty" class="btn btn-success w-100">Upload & Save Profile</button>
                        </form>
                    </div>
                </div>
            </div>

        <?php elseif ($page == 'gallery'): ?>
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4>Manage Gallery Photos</h4>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addGalleryModal"><i class="fas fa-upload me-2"></i>Upload Image</button>
            </div>
            <table class="table bg-white shadow-sm rounded">
                <thead><tr><th>Image</th><th>Title</th><th>Category</th><th>Description</th><th>Actions</th></tr></thead>
                <tbody>
                    <?php
                    $res = mysqli_query($conn, "SELECT * FROM gallery ORDER BY id DESC");
                    while($row = mysqli_fetch_assoc($res)) {
                        echo "<tr>
                            <td><img src='../{$row['img_path']}' width='60' height='40' style='object-fit:cover; border-radius:4px;' onerror=\"this.src='https://via.placeholder.com/60x40'\"></td>
                            <td><b>{$row['title']}</b></td>
                            <td><span class='badge bg-info text-dark text-capitalize'>{$row['category']}</span></td>
                            <td>{$row['description']}</td>
                            <td><a href='admin.php?page=gallery&delete_gallery={$row['id']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Remove image?\")'><i class='fas fa-trash'></i></a></td>
                        </tr>";
                    }
                    ?>
                </tbody>
            </table>

            <div class="modal fade" id="addGalleryModal" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form method="POST" action="admin.php?page=gallery" enctype="multipart/form-data" class="modal-body">
                            <h5 class="mb-3">Upload Gallery Image</h5>
                            <div class="mb-2"><label>Photo Title</label><input type="text" name="title" class="form-control" required></div>
                            <div class="mb-2"><label>Category</label>
                                <select name="category" class="form-select">
                                    <option value="campus-life">Campus Life</option>
                                    <option value="academic">Academic Excellence</option>
                                    <option value="cultural">Cultural Events</option>
                                    <option value="sports">Sports</option>
                                    <option value="workshops">Workshops & Seminars</option>
                                    <option value="graduation">Graduation Moments</option>
                                </select>
                            </div>
                            <div class="mb-2"><label>Select Image File</label><input type="file" name="gallery_image" class="form-control" accept="image/*" required></div>
                            <div class="mb-3"><label>Short Description</label><textarea name="description" class="form-control"></textarea></div>
                            <button type="submit" name="add_gallery" class="btn btn-success w-100">Upload to Gallery</button>
                        </form>
                    </div>
                </div>
            </div>

        <?php elseif ($page == 'classrooms'): ?>
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4>Manage Classrooms & Labs</h4>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addClassroomModal"><i class="fas fa-plus me-2"></i>Add Classroom</button>
            </div>
            <table class="table bg-white shadow-sm rounded">
                <thead><tr><th>Image</th><th>Room Number/Lab</th><th>Seating Capacity</th><th>Facilities Available</th><th>Actions</th></tr></thead>
                <tbody>
                    <?php
                    $res = mysqli_query($conn, "SELECT * FROM classrooms ORDER BY id DESC");
                    while($row = mysqli_fetch_assoc($res)) {
                        echo "<tr>
                            <td><img src='../{$row['img_path']}' width='75' height='50' style='object-fit:cover; border-radius:4px;' onerror=\"this.src='https://via.placeholder.com/75x50'\"></td>
                            <td><b>{$row['room_no']}</b></td>
                            <td>{$row['capacity']} Seats</td>
                            <td><span class='text-muted'>{$row['facilities']}</span></td>
                            <td><a href='admin.php?page=classrooms&delete_classroom={$row['id']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Remove classroom configuration?\")'><i class='fas fa-trash'></i></a></td>
                        </tr>";
                    }
                    ?>
                </tbody>
            </table>

            <div class="modal fade" id="addClassroomModal" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form method="POST" action="admin.php?page=classrooms" enctype="multipart/form-data" class="modal-body">
                            <h5 class="mb-3">Add New Classroom / Lab Info</h5>
                            <div class="mb-2"><label>Room Designation (e.g. Room 102, Hardware Lab)</label><input type="text" name="room_no" class="form-control" required></div>
                            <div class="mb-2"><label>Seating Capacity</label><input type="number" name="capacity" class="form-control" required></div>
                            <div class="mb-2"><label>Key Facilities (Comma separated: Projector, Wi-Fi, ACs)</label><input type="text" name="facilities" class="form-control" placeholder="Projector, Smart Board, 40 PCs" required></div>
                            <div class="mb-4"><label>Select Classroom Photo Image</label><input type="file" name="classroom_image" class="form-control" accept="image/*" required></div>
                            <button type="submit" name="add_classroom" class="btn btn-success w-100">Upload & Save Room</button>
                        </form>
                    </div>
                </div>
            </div>

        <?php elseif ($page == 'messages'): ?>
            <div class="mb-4">
                <h4>User Contact Messages</h4>
                <p class="text-muted">Below are the queries submitted via your website's public Contact page.</p>
            </div>
            
            <div class="row">
                <?php
                $res = mysqli_query($conn, "SELECT * FROM contact_messages ORDER BY id DESC");
                if(mysqli_num_rows($res) > 0) {
                    while($row = mysqli_fetch_assoc($res)) {
                        $fullname = htmlspecialchars($row['first_name'] . ' ' . $row['last_name']);
                        $email = htmlspecialchars($row['email']);
                        $phone = htmlspecialchars($row['phone'] ?? 'N/A');
                        $subject = htmlspecialchars($row['subject']);
                        $msg = nl2br(htmlspecialchars($row['message']));
                        $date = date('M d, Y h:i A', strtotime($row['created_at']));
                ?>
                        <div class="col-12 mb-3">
                            <div class="card shadow-sm border-0">
                                <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
                                    <div>
                                        <h5 class="mb-0 text-primary fw-bold"><?php echo $subject; ?></h5>
                                        <small class="text-muted">From: <b><?php echo $fullname; ?></b> (<?php echo $email; ?>) | Phone: <?php echo $phone; ?></small>
                                    </div>
                                    <div class="text-end">
                                        <span class="badge bg-secondary d-block mb-2"><?php echo $date; ?></span>
                                        <a href="admin.php?page=messages&delete_msg=<?php echo $row['id']; ?>" class="btn btn-outline-danger btn-sm" onclick="return confirm('Remove this message record?')"><i class="fas fa-trash me-1"></i>Delete</a>
                                    </div>
                                </div>
                                <div class="card-body bg-light">
                                    <p class="mb-0 card-text text-dark" style="font-size: 0.95rem; line-height: 1.5;"><?php echo $msg; ?></p>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                } else {
                    echo "<div class='col-12 text-center py-5'><div class='text-muted'><i class='fas fa-folder-open fa-3x mb-3'></i><p>No user inquiries logged yet.</p></div></div>";
                }
                ?>
            </div>
        <?php endif; ?>
    </div>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <?php endif; ?>
</body>
</html>