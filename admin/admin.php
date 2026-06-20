<?php
session_start();
require_once '../config/db_connect.php';

function logActivity($conn, $action, $details) {
    $user = 'Geo Admin';
    $action = mysqli_real_escape_string($conn, $action);
    $details = mysqli_real_escape_string($conn, $details);
    mysqli_query($conn, "INSERT INTO activity_logs (user, action, details) VALUES ('$user', '$action', '$details')");
}

if (isset($_GET['logout'])) {
    logActivity($conn, 'Logout', 'Geo Admin logged out');
    session_destroy();
    header("Location: admin.php");
    exit;
}

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
    if (isset($_POST['add_faculty'])) {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $role = mysqli_real_escape_string($conn, $_POST['role']);
        $qual = mysqli_real_escape_string($conn, $_POST['qual']);
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

    if (isset($_GET['delete_msg'])) {
        $id = (int)$_GET['delete_msg'];
        mysqli_query($conn, "DELETE FROM contact_messages WHERE id = $id");
        logActivity($conn, 'Delete', "Deleted message ID: $id");
        header("Location: admin.php?page=messages");
        exit;
    }

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
    <link href="../assets/css/design-system.css" rel="stylesheet">
    <style>
        body { background-color: #f4f6f9; font-family: 'Inter', sans-serif; }
        .admin-sidebar { width: 280px; height: 100vh; position: fixed; background: linear-gradient(180deg, #0f172a, #1e293b); border-right: 1px solid var(--border); top: 0; left: 0; z-index: 1000; overflow-y: auto; }
        .main-content { margin-left: 280px; padding: 30px; min-height: 100vh; }
        .admin-sidebar .nav-link { color: #94a3b8 !important; padding: 14px 24px !important; border-left: 3px solid transparent; transition: all 0.3s ease; display: flex; align-items: center; }
        .admin-sidebar .nav-link:hover, .admin-sidebar .nav-link.active { color: white !important; background: rgba(6,182,212,0.1); border-left-color: var(--secondary); }
        .admin-sidebar .nav-link.active { background: rgba(6,182,212,0.15); }
        .stat-card-admin { background: white; border-radius: 12px; padding: 24px; border: 1px solid var(--border); box-shadow: var(--shadow); transition: var(--transition); }
        [data-theme="dark"] .stat-card-admin { background: var(--card-bg); }
        .stat-card-admin:hover { transform: translateY(-4px); box-shadow: var(--shadow-lg); }
        .table-modern { background: var(--card-bg); border-radius: 12px; overflow: hidden; border: 1px solid var(--border); }
        .table-modern th { background: linear-gradient(135deg, #f8fafc, #f1f5f9); padding: 16px; font-weight: 600; color: var(--text); }
        [data-theme="dark"] .table-modern th { background: linear-gradient(135deg, #1e293b, #0f172a); }
        .table-modern td { padding: 16px; vertical-align: middle; color: var(--text); border-color: var(--border); }
        .btn-action { width: 36px; height: 36px; border-radius: 8px; display: inline-flex; align-items: center; justify-content: center; transition: all 0.2s; border: none; }
        .modal-content { background: var(--card-bg); border: 1px solid var(--border); border-radius: var(--radius); }
        .modal-header, .modal-footer { border-color: var(--border); }
        .form-control, .form-select { background: var(--card-bg); border: 2px solid var(--border); color: var(--text); border-radius: 8px; padding: 10px 14px; }
        .form-control:focus, .form-select:focus { border-color: var(--secondary); box-shadow: 0 0 0 4px rgba(6,182,212,0.15); background: var(--card-bg); color: var(--text); }
        .message-card { background: var(--card-bg); border: 1px solid var(--border); border-radius: 12px; transition: var(--transition); }
        .message-card:hover { box-shadow: var(--shadow-lg); }
    </style>
</head>
<body>
    <?php if (!isset($_SESSION['admin_logged_in'])): ?>
    <div class="d-flex align-items-center justify-content-center" style="height:100vh; background: linear-gradient(135deg, #0f172a, #1e3a5f);">
        <div class="card p-5 shadow-lg" style="width: 420px; border-radius: 16px; border: 1px solid var(--border); background: var(--card-bg);">
            <div class="text-center mb-4">
                <div class="d-inline-flex align-items-center justify-content-center rounded-circle mb-3" style="width: 64px; height: 64px; background: linear-gradient(135deg, var(--secondary), #0891b2);">
                    <i class="fas fa-user-shield fa-2x text-white"></i>
                </div>
                <h3 class="fw-bold" style="color: var(--text);">Admin Portal</h3>
                <p class="text-muted small">Secure access for authorized personnel only</p>
            </div>
            <?php if($loginError) echo "<div class='alert alert-danger d-flex align-items-center gap-2'><i class='fas fa-exclamation-circle'></i>$loginError</div>"; ?>
            <form method="POST">
                <div class="mb-3">
                    <label class="form-label fw-semibold" style="color: var(--text);">Username</label>
                    <div class="input-group">
                        <span class="input-group-text border-end-0" style="background: var(--card-bg); border-color: var(--border);"><i class="fas fa-user text-muted"></i></span>
                        <input type="text" name="username" class="form-control border-start-0" required style="background: var(--card-bg);">
                    </div>
                </div>
                <div class="mb-4">
                    <label class="form-label fw-semibold" style="color: var(--text);">Password</label>
                    <div class="input-group">
                        <span class="input-group-text border-end-0" style="background: var(--card-bg); border-color: var(--border);"><i class="fas fa-lock text-muted"></i></span>
                        <input type="password" name="password" class="form-control border-start-0" required style="background: var(--card-bg);">
                    </div>
                </div>
                <button type="submit" name="login" class="btn-primary-custom w-100 py-2 fw-bold">Login to Dashboard</button>
            </form>
        </div>
    </div>
    <?php else: $page = $_GET['page'] ?? 'dashboard'; ?>

    <div class="admin-sidebar">
        <div class="p-4 border-bottom" style="border-color: rgba(255,255,255,0.1) !important;">
            <div class="d-flex align-items-center gap-3">
                <div class="d-flex align-items-center justify-content-center rounded-3" style="width: 40px; height: 40px; background: linear-gradient(135deg, var(--secondary), #0891b2);">
                    <i class="fas fa-shield-alt text-white"></i>
                </div>
                <div>
                    <h5 class="text-white mb-0 fw-bold">Admin Portal</h5>
                    <small style="color: #94a3b8;">GPP Management</small>
                </div>
            </div>
        </div>

        <a href="../index.php" class="nav-link text-primary fw-bold border-bottom" style="border-color: rgba(255,255,255,0.1) !important;"><i class="fas fa-external-link-alt me-2"></i>Go to Public Site</a>
        <a href="manage_applications.php" class="nav-link text-success fw-bold"><i class="fas fa-file-signature me-2"></i>Applications Desk <span class="badge bg-success text-white rounded-pill ms-auto">Portal</span></a>
        <a href="admin.php?page=dashboard" class="nav-link <?php echo $page=='dashboard'?'active':''; ?> mt-2"><i class="fas fa-home me-2"></i>Dashboard</a>
        <a href="admin.php?page=faculty" class="nav-link <?php echo $page=='faculty'?'active':''; ?>"><i class="fas fa-users me-2"></i>Faculty <span class="badge bg-secondary rounded-pill ms-auto"><?php echo $facCount; ?></span></a>
        <a href="admin.php?page=gallery" class="nav-link <?php echo $page=='gallery'?'active':''; ?>"><i class="fas fa-images me-2"></i>Gallery <span class="badge bg-secondary rounded-pill ms-auto"><?php echo $galCount; ?></span></a>
        <a href="admin.php?page=classrooms" class="nav-link <?php echo $page=='classrooms'?'active':''; ?>"><i class="fas fa-school me-2"></i>Classrooms <span class="badge bg-secondary rounded-pill ms-auto"><?php echo $clsCount; ?></span></a>
        <a href="admin.php?page=messages" class="nav-link <?php echo $page=='messages'?'active':''; ?>"><i class="fas fa-envelope me-2"></i>Messages <span class="badge bg-danger rounded-pill ms-auto"><?php echo $msgCount; ?></span></a>

        <a href="admin.php?logout=true" class="nav-link text-danger mt-5"><i class="fas fa-sign-out-alt me-2"></i>Logout</a>
    </div>

    <div class="main-content">
        <?php if ($page == 'dashboard'): ?>
            <h4 class="fw-bold mb-2" style="color: var(--text);">Welcome, Administrator</h4>
            <p class="text-muted mb-4">Select a section from the sidebar to manage website content.</p>
            <div class="row g-4">
                <div class="col-md-3">
                    <div class="stat-card-admin text-center">
                        <div class="d-inline-flex align-items-center justify-content-center rounded-3 mb-3" style="width: 48px; height: 48px; background: rgba(6,182,212,0.1); color: var(--secondary);"><i class="fas fa-users fa-lg"></i></div>
                        <h3 class="fw-bold mb-1" style="color: var(--text);"><?php echo $facCount; ?></h3>
                        <p class="text-muted small mb-0">Faculty Members</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-card-admin text-center">
                        <div class="d-inline-flex align-items-center justify-content-center rounded-3 mb-3" style="width: 48px; height: 48px; background: rgba(245,158,11,0.1); color: var(--accent);"><i class="fas fa-images fa-lg"></i></div>
                        <h3 class="fw-bold mb-1" style="color: var(--text);"><?php echo $galCount; ?></h3>
                        <p class="text-muted small mb-0">Gallery Photos</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-card-admin text-center">
                        <div class="d-inline-flex align-items-center justify-content-center rounded-3 mb-3" style="width: 48px; height: 48px; background: rgba(16,185,129,0.1); color: #10b981;"><i class="fas fa-school fa-lg"></i></div>
                        <h3 class="fw-bold mb-1" style="color: var(--text);"><?php echo $clsCount; ?></h3>
                        <p class="text-muted small mb-0">Classrooms</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-card-admin text-center">
                        <div class="d-inline-flex align-items-center justify-content-center rounded-3 mb-3" style="width: 48px; height: 48px; background: rgba(239,68,68,0.1); color: #ef4444;"><i class="fas fa-envelope fa-lg"></i></div>
                        <h3 class="fw-bold mb-1" style="color: var(--text);"><?php echo $msgCount; ?></h3>
                        <p class="text-muted small mb-0">Messages</p>
                    </div>
                </div>
            </div>

        <?php elseif ($page == 'faculty'): ?>
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div><h4 class="fw-bold mb-0" style="color: var(--text);">Manage Faculty Members</h4><p class="text-muted small mb-0">Add, view, or remove faculty profiles</p></div>
                <button class="btn-primary-custom" data-bs-toggle="modal" data-bs-target="#addFacultyModal"><i class="fas fa-plus me-2"></i>Add Faculty</button>
            </div>
            <div class="table-modern">
                <table class="table table-hover mb-0">
                    <thead><tr><th>Image</th><th>Name</th><th>Role</th><th>Qualifications</th><th>Actions</th></tr></thead>
                    <tbody>
                        <?php
                        $res = mysqli_query($conn, "SELECT * FROM faculty ORDER BY id DESC");
                        while($row = mysqli_fetch_assoc($res)) {
                            echo "<tr>
                                <td><img src='../{$row['img']}' width='50' height='50' class='rounded-circle' style='object-fit:cover;' onerror=\"this.src='https://via.placeholder.com/50'\"></td>
                                <td><b style='color: var(--text);'>{$row['name']}</b></td>
                                <td><span style='color: var(--secondary);'>{$row['role']}</span></td>
                                <td style='color: var(--text-muted);'>{$row['qual']}</td>
                                <td><a href='admin.php?page=faculty&delete_faculty={$row['id']}' class='btn-action' style='background: rgba(239,68,68,0.1); color: #ef4444;' onclick='return confirm(\"Remove faculty member?\")'><i class='fas fa-trash'></i></a></td>
                            </tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <div class="modal fade" id="addFacultyModal" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header"><h5 class="modal-title fw-bold" style="color: var(--text);">Add New Faculty Member</h5><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div>
                        <form method="POST" action="admin.php?page=faculty" enctype="multipart/form-data" class="modal-body">
                            <div class="mb-3"><label class="form-label fw-semibold">Full Name</label><input type="text" name="name" class="form-control" required></div>
                            <div class="mb-3"><label class="form-label fw-semibold">Role</label><input type="text" name="role" class="form-control" required></div>
                            <div class="mb-3"><label class="form-label fw-semibold">Qualifications</label><input type="text" name="qual" class="form-control" required></div>
                            <div class="mb-4"><label class="form-label fw-semibold">Profile Photo</label><input type="file" name="faculty_image" class="form-control" accept="image/*" required></div>
                            <button type="submit" name="add_faculty" class="btn-primary-custom w-100">Upload & Save Profile</button>
                        </form>
                    </div>
                </div>
            </div>

        <?php elseif ($page == 'gallery'): ?>
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div><h4 class="fw-bold mb-0" style="color: var(--text);">Manage Gallery Photos</h4><p class="text-muted small mb-0">Upload and organize gallery images</p></div>
                <button class="btn-primary-custom" data-bs-toggle="modal" data-bs-target="#addGalleryModal"><i class="fas fa-upload me-2"></i>Upload Image</button>
            </div>
            <div class="table-modern">
                <table class="table table-hover mb-0">
                    <thead><tr><th>Image</th><th>Title</th><th>Category</th><th>Description</th><th>Actions</th></tr></thead>
                    <tbody>
                        <?php
                        $res = mysqli_query($conn, "SELECT * FROM gallery ORDER BY id DESC");
                        while($row = mysqli_fetch_assoc($res)) {
                            echo "<tr>
                                <td><img src='../{$row['img_path']}' width='60' height='40' style='object-fit:cover; border-radius:6px;' onerror=\"this.src='https://via.placeholder.com/60x40'\"></td>
                                <td><b style='color: var(--text);'>{$row['title']}</b></td>
                                <td><span class='badge' style='background: rgba(6,182,212,0.1); color: var(--secondary); text-transform: capitalize;'>{$row['category']}</span></td>
                                <td style='color: var(--text-muted);'>{$row['description']}</td>
                                <td><a href='admin.php?page=gallery&delete_gallery={$row['id']}' class='btn-action' style='background: rgba(239,68,68,0.1); color: #ef4444;' onclick='return confirm(\"Remove image?\")'><i class='fas fa-trash'></i></a></td>
                            </tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <div class="modal fade" id="addGalleryModal" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header"><h5 class="modal-title fw-bold" style="color: var(--text);">Upload Gallery Image</h5><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div>
                        <form method="POST" action="admin.php?page=gallery" enctype="multipart/form-data" class="modal-body">
                            <div class="mb-3"><label class="form-label fw-semibold">Photo Title</label><input type="text" name="title" class="form-control" required></div>
                            <div class="mb-3"><label class="form-label fw-semibold">Category</label>
                                <select name="category" class="form-select">
                                    <option value="campus-life">Campus Life</option>
                                    <option value="academic">Academic Excellence</option>
                                    <option value="cultural">Cultural Events</option>
                                    <option value="sports">Sports</option>
                                    <option value="workshops">Workshops & Seminars</option>
                                    <option value="graduation">Graduation Moments</option>
                                </select>
                            </div>
                            <div class="mb-3"><label class="form-label fw-semibold">Select Image File</label><input type="file" name="gallery_image" class="form-control" accept="image/*" required></div>
                            <div class="mb-3"><label class="form-label fw-semibold">Short Description</label><textarea name="description" class="form-control" rows="3"></textarea></div>
                            <button type="submit" name="add_gallery" class="btn-primary-custom w-100">Upload to Gallery</button>
                        </form>
                    </div>
                </div>
            </div>

        <?php elseif ($page == 'classrooms'): ?>
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div><h4 class="fw-bold mb-0" style="color: var(--text);">Manage Classrooms & Labs</h4><p class="text-muted small mb-0">Configure room details and facilities</p></div>
                <button class="btn-primary-custom" data-bs-toggle="modal" data-bs-target="#addClassroomModal"><i class="fas fa-plus me-2"></i>Add Classroom</button>
            </div>
            <div class="table-modern">
                <table class="table table-hover mb-0">
                    <thead><tr><th>Image</th><th>Room Number</th><th>Capacity</th><th>Facilities</th><th>Actions</th></tr></thead>
                    <tbody>
                        <?php
                        $res = mysqli_query($conn, "SELECT * FROM classrooms ORDER BY id DESC");
                        while($row = mysqli_fetch_assoc($res)) {
                            echo "<tr>
                                <td><img src='../{$row['img_path']}' width='75' height='50' style='object-fit:cover; border-radius:6px;' onerror=\"this.src='https://via.placeholder.com/75x50'\"></td>
                                <td><b style='color: var(--text);'>{$row['room_no']}</b></td>
                                <td>{$row['capacity']} Seats</td>
                                <td style='color: var(--text-muted);'>{$row['facilities']}</td>
                                <td><a href='admin.php?page=classrooms&delete_classroom={$row['id']}' class='btn-action' style='background: rgba(239,68,68,0.1); color: #ef4444;' onclick='return confirm(\"Remove classroom configuration?\")'><i class='fas fa-trash'></i></a></td>
                            </tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <div class="modal fade" id="addClassroomModal" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header"><h5 class="modal-title fw-bold" style="color: var(--text);">Add New Classroom / Lab</h5><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div>
                        <form method="POST" action="admin.php?page=classrooms" enctype="multipart/form-data" class="modal-body">
                            <div class="mb-3"><label class="form-label fw-semibold">Room Designation</label><input type="text" name="room_no" class="form-control" placeholder="e.g. Room 102, Hardware Lab" required></div>
                            <div class="mb-3"><label class="form-label fw-semibold">Seating Capacity</label><input type="number" name="capacity" class="form-control" required></div>
                            <div class="mb-3"><label class="form-label fw-semibold">Key Facilities (comma separated)</label><input type="text" name="facilities" class="form-control" placeholder="Projector, Smart Board, 40 PCs" required></div>
                            <div class="mb-4"><label class="form-label fw-semibold">Classroom Photo</label><input type="file" name="classroom_image" class="form-control" accept="image/*" required></div>
                            <button type="submit" name="add_classroom" class="btn-primary-custom w-100">Upload & Save Room</button>
                        </form>
                    </div>
                </div>
            </div>

        <?php elseif ($page == 'messages'): ?>
            <div class="mb-4">
                <h4 class="fw-bold mb-1" style="color: var(--text);">User Contact Messages</h4>
                <p class="text-muted small mb-0">Queries submitted via the public Contact page</p>
            </div>

            <div class="row g-3">
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
                        <div class="col-12">
                            <div class="message-card">
                                <div class="p-4 d-flex justify-content-between align-items-start flex-wrap gap-3">
                                    <div>
                                        <h5 class="fw-bold mb-1" style="color: var(--secondary); text-transform: capitalize;"><?php echo $subject; ?></h5>
                                        <p class="text-muted small mb-0">From: <b style="color: var(--text);"><?php echo $fullname; ?></b> (<?php echo $email; ?>) | Phone: <?php echo $phone; ?></p>
                                    </div>
                                    <div class="text-end">
                                        <span class="badge bg-secondary mb-2 d-block"><?php echo $date; ?></span>
                                        <a href="admin.php?page=messages&delete_msg=<?php echo $row['id']; ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Remove this message?')"><i class="fas fa-trash me-1"></i>Delete</a>
                                    </div>
                                </div>
                                <div class="px-4 pb-4">
                                    <div class="p-3 rounded-3" style="background: rgba(6,182,212,0.03); border-left: 3px solid var(--secondary);">
                                        <p class="mb-0" style="color: var(--text); font-size: 0.95rem; line-height: 1.6;"><?php echo $msg; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                } else {
                    echo "<div class='col-12 text-center py-5'><i class='fas fa-folder-open fa-3x mb-3' style='color: var(--text-muted);'></i><p class='text-muted'>No user inquiries logged yet.</p></div>";
                }
                ?>
            </div>
        <?php endif; ?>
    </div>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/dark-mode.js"></script>
    <?php endif; ?>
</body>
</html>