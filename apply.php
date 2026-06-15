<?php
require_once 'config/db_connect.php';

$successMsg = "";
$errorMsg = "";

// Initialize sticky form variables and individual error arrays
$full_name = $email = $phone = $course = "";
$nameErr = $emailErr = $phoneErr = $courseErr = $fileErr = "";

if (isset($_POST['submit_application'])) {
    $valid = true;
    
    // 1. Full Name Validation using Regex (Faculty Specification)
    if (empty($_POST["full_name"])) {
        $nameErr = "Full name is required.";
        $valid = false;
    } else {
        $full_name = trim($_POST["full_name"]);
        if (!preg_match("/^[a-zA-Z ]+$/", $full_name)) {
            $nameErr = "Only letters and spaces are allowed.";
            $valid = false;
        }
    }

    // 2. Email Validation using Regex & Unique Check
    if (empty($_POST["email"])) {
        $emailErr = "Email address is required.";
        $valid = false;
    } else {
        $email = trim($_POST["email"]);
        if (!preg_match("/^[\w\.-]+@[\w\.-]+\.\w+$/", $email)) {
            $emailErr = "Invalid email format configuration.";
            $valid = false;
        } else {
            // UNIQUE EMAIL CHECK ENGINE
            $clean_email = mysqli_real_escape_string($conn, $email);
            $check_query = "SELECT id FROM applications WHERE email = '$clean_email' LIMIT 1";
            $check_result = mysqli_query($conn, $check_query);
            
            if (mysqli_num_rows($check_result) > 0) {
                $emailErr = "This email address has already submitted an application.";
                $valid = false;
            }
        }
    }

    // 3. Indian Phone Number Validation using Regex (Faculty Specification)
    if (empty($_POST["phone"])) {
        $phoneErr = "Phone number is required.";
        $valid = false;
    } else {
        $phone = trim($_POST["phone"]);
        if (!preg_match("/^[6-9]\d{9}$/", $phone)) {
            $phoneErr = "Invalid Indian mobile number structure.";
            $valid = false;
        }
    }

    // 4. Dropdown Course Verification
    if (empty($_POST["course"])) {
        $courseErr = "Please choose a program stream.";
        $valid = false;
    } else {
        $course = mysqli_real_escape_string($conn, $_POST['course']);
        $allowed_courses = array('Computer Engineering', 'Electrical Engineering', 'Civil Engineering', 'Mechanical Engineering');
        if (!in_array($course, $allowed_courses)) {
            $courseErr = "Selected course is invalid.";
            $valid = false;
        }
    }
    
    $doc_db_path = "";
    
    // 5. File Processing block runs only if the primary input validations pass
    if ($valid) {
        if (isset($_FILES['student_doc']) && $_FILES['student_doc']['error'] == 0) {
            $file_name = $_FILES['student_doc']['name'];
            $file_tmp  = $_FILES['student_doc']['tmp_name'];
            $file_ext  = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
            
            $allowed_extensions = array('jpg', 'jpeg', 'png', 'pdf', 'docx');
            
            if (in_array($file_ext, $allowed_extensions)) {
                $target_folder = 'uploads/'; 
                if (!is_dir($target_folder)) { mkdir($target_folder, 0755, true); }
                
                $unique_filename = 'app_' . uniqid() . '.' . $file_ext;
                $final_destination = $target_folder . $unique_filename;
                
                if (move_uploaded_file($file_tmp, $final_destination)) { 
                    $doc_db_path = $final_destination;
                }
            } else {
                $fileErr = "Invalid file type! Allowed extensions: JPG, PNG, PDF, DOCX.";
                $valid = false;
            }
        } else {
            $fileErr = "Verification mark sheet document attachment is required.";
            $valid = false;
        }
    }

    // Final Insertion Loop runs exclusively if all validation vectors pass
    if ($valid && !empty($doc_db_path)) {
        $clean_name  = mysqli_real_escape_string($conn, $full_name);
        $clean_phone = mysqli_real_escape_string($conn, $phone);
        
        $sql = "INSERT INTO applications (full_name, email, phone, course, document_path) 
                VALUES ('$clean_name', '$clean_email', '$clean_phone', '$course', '$doc_db_path')";
        
        if (mysqli_query($conn, $sql)) {
            $successMsg = "Application submitted successfully! you will receive a confirmation email shortly.";
            // Reset sticky fields on success
            $full_name = $email = $phone = $course = "";
        } else {
            $errorMsg = "Database transmission error: Processing interrupted.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Admission Application</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-light">

    <header class="bg-white shadow-sm sticky-top">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <div class="d-flex align-items-center">
                    <img src="assets/images/main logo.jpeg" alt="University Logo" height="60">
                    <h1 class="fs-5 mb-0 ms-3" style="color: #2c3e50;">Admission Portal</h1>
                </div>
                <a href="admission.php" class="btn btn-outline-secondary btn-sm ms-auto"><i class="fas fa-arrow-left me-1"></i>Back to Admissions</a>
            </div>
        </nav>
    </header>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card border-0 shadow-sm p-4" style="border-radius: 10px;">
                    <h3 class="text-center mb-4" style="color: #1a365d;">Application for Admission</h3>
                    
                    <?php if(!empty($successMsg)) echo "<div class='alert alert-success'><i class='fas fa-check-circle me-2'></i>$successMsg</div>"; ?>
                    <?php if(!empty($errorMsg)) echo "<div class='alert alert-danger'><i class='fas fa-exclamation-circle me-2'></i>$errorMsg</div>"; ?>

                    <form method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Full Name</label>
                            <input type="text" name="full_name" class="form-control <?php echo !empty($nameErr) ? 'is-invalid' : ''; ?>" value="<?php echo htmlspecialchars($full_name); ?>" placeholder="Enter your full name">
                            <div class="invalid-feedback"><?php echo $nameErr; ?></div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">Email Address</label>
                                <input type="text" name="email" class="form-control <?php echo !empty($emailErr) ? 'is-invalid' : ''; ?>" value="<?php echo htmlspecialchars($email); ?>" placeholder="name@example.com">
                                <div class="invalid-feedback"><?php echo $emailErr; ?></div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">Phone Number</label>
                                <input type="text" name="phone" maxlength="10" class="form-control <?php echo !empty($phoneErr) ? 'is-invalid' : ''; ?>" value="<?php echo htmlspecialchars($phone); ?>" placeholder="10-digit mobile number">
                                <div class="invalid-feedback"><?php echo $phoneErr; ?></div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Select Course Stream</label>
                            <select name="course" class="form-select <?php echo !empty($courseErr) ? 'is-invalid' : ''; ?>">
                                <option value="" selected disabled>Choose your engineering program...</option>
                                <option value="Computer Engineering" <?php echo $course == 'Computer Engineering' ? 'selected' : ''; ?>>Computer Engineering</option>
                                <option value="Electrical Engineering" <?php echo $course == 'Electrical Engineering' ? 'selected' : ''; ?>>Electrical Engineering</option>
                                <option value="Civil Engineering" <?php echo $course == 'Civil Engineering' ? 'selected' : ''; ?>>Civil Engineering</option>
                                <option value="Mechanical Engineering" <?php echo $course == 'Mechanical Engineering' ? 'selected' : ''; ?>>Mechanical Engineering</option>
                            </select>
                            <div class="invalid-feedback"><?php echo $courseErr; ?></div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold">Upload Mark Sheet / Verification Document (PDF/Image)</label>
                            <input type="file" name="student_doc" class="form-control <?php echo !empty($fileErr) ? 'is-invalid' : ''; ?>" accept=".jpg,.jpeg,.png,.pdf,.docx">
                            <div class="text-danger small mt-1"><?php echo $fileErr; ?></div>
                            <small class="text-muted d-block mt-1">Allowed file types: JPG, PNG, PDF, DOCX. Max upload size: 5MB.</small>
                        </div>

                        <button type="submit" name="submit_application" class="btn text-white w-100 py-2 fw-bold shadow-sm" style="background-color: #1a365d;">Submit Clean Application</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
</html>