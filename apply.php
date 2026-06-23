<?php
require_once 'config/db_connect.php';

$successMsg = "";
$errorMsg = "";


$full_name = $email = $phone = $course = "";
$nameErr = $emailErr = $phoneErr = $courseErr = $fileErr = $captchaErr = "";

if (isset($_POST['submit_application'])) {
    $valid = true;

    
    $recaptcha_response = $_POST['g-recaptcha-response'] ?? '';
    
    if (empty($recaptcha_response)) {
        $captchaErr = "Please complete the security checkbox validation.";
        $valid = false;
    } else {
        
        $secret_key = '6Ldq5S4tAAAAAEH3-I3XWrAPx0sM2z9kHzseB6vM';
        
       
        $verify_url = "https://www.google.com/recaptcha/api/siteverify?secret=" . $secret_key . "&response=" . $recaptcha_response;
        
       
        $response_data = file_get_contents($verify_url);
        $response_keys = json_decode($response_data, true);
        
        if (intval($response_keys["success"]) !== 1) {
            $captchaErr = "Security verification failed. Please try again.";
            $valid = false;
        }
    }

    
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

    
    if (empty($_POST["email"])) {
        $emailErr = "Email address is required.";
        $valid = false;
    } else {
        $email = trim($_POST["email"]);
        if (!preg_match("/[\w\.-]+@[\w\.-]+\.\w+$/", $email)) {
            $emailErr = "Invalid email format configuration.";
            $valid = false;
        } else {
           
            $clean_email = mysqli_real_escape_string($conn, $email);
            $check_query = "SELECT id FROM applications WHERE email = '$clean_email' LIMIT 1";
            $check_result = mysqli_query($conn, $check_query);

            if (mysqli_num_rows($check_result) > 0) {
                $emailErr = "This email address has already submitted an application.";
                $valid = false;
            }
        }
    }

   
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

  
    if ($valid && !empty($doc_db_path)) {
        $clean_name  = mysqli_real_escape_string($conn, $full_name);
        $clean_phone = mysqli_real_escape_string($conn, $phone);

        $sql = "INSERT INTO applications (full_name, email, phone, course, document_path) 
                VALUES ('$clean_name', '$clean_email', '$clean_phone', '$course', '$doc_db_path')";

        if (mysqli_query($conn, $sql)) {
            $successMsg = "Application submitted successfully! You will receive a confirmation email shortly.";
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
    <title>Online Admission Application - GPP</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="assets/css/design-system.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    
    <style>
        .form-page-bg {
            min-height: 100vh;
            background: linear-gradient(135deg, var(--bg) 0%, rgba(6,182,212,0.05) 50%, var(--bg) 100%);
        }
        .form-card {
            background: var(--card-bg);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            box-shadow: var(--shadow-lg);
        }
        .form-label-custom {
            font-weight: 600; font-size: 0.9rem; color: var(--text); margin-bottom: 0.5rem;
        }
        .form-control-custom {
            background: var(--card-bg); border: 2px solid var(--border); color: var(--text);
            border-radius: var(--radius-sm); padding: 12px 16px; transition: var(--transition);
        }
        .form-control-custom:focus {
            border-color: var(--secondary); box-shadow: 0 0 0 4px rgba(6,182,212,0.15); background: var(--card-bg); color: var(--text);
        }
        .form-select-custom {
            background: var(--card-bg); border: 2px solid var(--border); color: var(--text);
            border-radius: var(--radius-sm); padding: 12px 16px; transition: var(--transition);
        }
        .form-select-custom:focus {
            border-color: var(--secondary); box-shadow: 0 0 0 4px rgba(6,182,212,0.15); background: var(--card-bg); color: var(--text);
        }
        .invalid-feedback-custom { color: #ef4444; font-size: 0.85rem; margin-top: 0.4rem; }
        .is-invalid-custom { border-color: #ef4444 !important; }
        .is-invalid-custom:focus { box-shadow: 0 0 0 4px rgba(239,68,68,0.15) !important; }
    </style>
</head>
<body class="form-page-bg">

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
            <a href="admission.php" class="btn btn-sm fw-bold" style="background: var(--border); color: var(--text); border-radius: 8px;">
                <i class="fas fa-arrow-left me-1"></i> Back to Admissions
            </a>
        </div>
    </nav>
</header>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-7 col-md-9">

            <div class="text-center mb-5">
                <span class="badge px-3 py-2 mb-3" style="background: rgba(6,182,212,0.1); color: var(--secondary); border: 1px solid rgba(6,182,212,0.2);">
                    <i class="fas fa-file-signature me-1"></i> Admission Portal 2024-25
                </span>
                <h1 class="fw-bold mb-2" style="color: var(--text);">Online Application</h1>
                <p class="text-muted">Fill in your details carefully. All fields marked with * are mandatory.</p>
            </div>

            <div class="form-card p-4 p-md-5">

                <?php if(!empty($successMsg)): ?>
                    <div class="alert d-flex align-items-center gap-3 mb-4" style="background: rgba(16,185,129,0.1); border: 1px solid rgba(16,185,129,0.3); color: #10b981; border-radius: var(--radius-sm);">
                        <i class="fas fa-check-circle fa-lg"></i>
                        <div class="fw-semibold"><?php echo $successMsg; ?></div>
                    </div>
                <?php endif; ?>

                <?php if(!empty($errorMsg)): ?>
                    <div class="alert d-flex align-items-center gap-3 mb-4" style="background: rgba(239,68,68,0.1); border: 1px solid rgba(239,68,68,0.3); color: #ef4444; border-radius: var(--radius-sm);">
                        <i class="fas fa-exclamation-circle fa-lg"></i>
                        <div class="fw-semibold"><?php echo $errorMsg; ?></div>
                    </div>
                <?php endif; ?>

                <form method="POST" enctype="multipart/form-data">

                    <div class="mb-4">
                        <label class="form-label-custom">Full Name *</label>
                        <div class="input-group">
                            <span class="input-group-text border-end-0" style="background: var(--card-bg); border-color: var(--border); color: var(--text-muted);">
                                <i class="fas fa-user"></i>
                            </span>
                            <input type="text" name="full_name" class="form-control-custom <?php echo !empty($nameErr) ? 'is-invalid-custom' : ''; ?>" 
                                   value="<?php echo htmlspecialchars($full_name); ?>" placeholder="Enter your full name" style="border-left: 0;">
                        </div>
                        <?php if(!empty($nameErr)): ?><div class="invalid-feedback-custom"><i class="fas fa-exclamation-triangle me-1"></i><?php echo $nameErr; ?></div><?php endif; ?>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label class="form-label-custom">Email Address *</label>
                            <div class="input-group">
                                <span class="input-group-text border-end-0" style="background: var(--card-bg); border-color: var(--border); color: var(--text-muted);">
                                    <i class="fas fa-envelope"></i>
                                </span>
                                <input type="text" name="email" class="form-control-custom <?php echo !empty($emailErr) ? 'is-invalid-custom' : ''; ?>" 
                                       value="<?php echo htmlspecialchars($email); ?>" placeholder="name@example.com" style="border-left: 0;">
                            </div>
                            <?php if(!empty($emailErr)): ?><div class="invalid-feedback-custom"><i class="fas fa-exclamation-triangle me-1"></i><?php echo $emailErr; ?></div><?php endif; ?>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label-custom">Phone Number *</label>
                            <div class="input-group">
                                <span class="input-group-text border-end-0" style="background: var(--card-bg); border-color: var(--border); color: var(--text-muted);">
                                    <i class="fas fa-phone"></i>
                                </span>
                                <input type="text" name="phone" maxlength="10" class="form-control-custom <?php echo !empty($phoneErr) ? 'is-invalid-custom' : ''; ?>" 
                                       value="<?php echo htmlspecialchars($phone); ?>" placeholder="10-digit mobile number" style="border-left: 0;">
                            </div>
                            <?php if(!empty($phoneErr)): ?><div class="invalid-feedback-custom"><i class="fas fa-exclamation-triangle me-1"></i><?php echo $phoneErr; ?></div><?php endif; ?>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label-custom">Select Course Stream *</label>
                        <div class="input-group">
                            <span class="input-group-text border-end-0" style="background: var(--card-bg); border-color: var(--border); color: var(--text-muted);">
                                <i class="fas fa-graduation-cap"></i>
                            </span>
                            <select name="course" class="form-select-custom <?php echo !empty($courseErr) ? 'is-invalid-custom' : ''; ?>" style="border-left: 0;">
                                <option value="" selected disabled>Choose your engineering program...</option>
                                <option value="Computer Engineering" <?php echo $course == 'Computer Engineering' ? 'selected' : ''; ?>>Computer Engineering</option>
                                <option value="Electrical Engineering" <?php echo $course == 'Electrical Engineering' ? 'selected' : ''; ?>>Electrical Engineering</option>
                                <option value="Civil Engineering" <?php echo $course == 'Civil Engineering' ? 'selected' : ''; ?>>Civil Engineering</option>
                                <option value="Mechanical Engineering" <?php echo $course == 'Mechanical Engineering' ? 'selected' : ''; ?>>Mechanical Engineering</option>
                            </select>
                        </div>
                        <?php if(!empty($courseErr)): ?><div class="invalid-feedback-custom"><i class="fas fa-exclamation-triangle me-1"></i><?php echo $courseErr; ?></div><?php endif; ?>
                    </div>

                    <div class="mb-4">
                        <label class="form-label-custom">Upload Mark Sheet / Verification Document *</label>
                        <div class="p-4 rounded-3 text-center" style="border: 2px dashed var(--border); background: rgba(6,182,212,0.03); transition: var(--transition);" 
                             ondragover="this.style.borderColor='var(--secondary)';" ondragleave="this.style.borderColor='var(--border)';" ondrop="this.style.borderColor='var(--border)';">
                            <i class="fas fa-cloud-upload-alt fa-2x mb-3" style="color: var(--secondary);"></i>
                            <p class="text-muted mb-2">Drag & drop your file here, or click to browse</p>
                            <input type="file" name="student_doc" class="form-control-custom <?php echo !empty($fileErr) ? 'is-invalid-custom' : ''; ?>" 
                                   accept=".jpg,.jpeg,.png,.pdf,.docx" style="max-width: 300px; margin: 0 auto;">
                        </div>
                        <?php if(!empty($fileErr)): ?><div class="invalid-feedback-custom text-center"><i class="fas fa-exclamation-triangle me-1"></i><?php echo $fileErr; ?></div><?php endif; ?>
                        <small class="text-muted d-block mt-2 text-center"><i class="fas fa-info-circle me-1"></i> Allowed: JPG, PNG, PDF, DOCX. Max size: 5MB.</small>
                    </div>

                    <div class="mb-4 d-flex flex-column align-items-center">
                        <div class="g-recaptcha" data-sitekey="6Ldq5S4tAAAAAJDf3qOqCeIG2B6jjxh8KqHasfjik"></div>
                        <?php if(!empty($captchaErr)): ?>
                            <div class="invalid-feedback-custom"><i class="fas fa-exclamation-triangle me-1"></i><?php echo $captchaErr; ?></div>
                        <?php endif; ?>
                    </div>

                    <button type="submit" name="submit_application" class="btn-primary-custom w-100 py-3 fw-bold" style="font-size: 1.05rem;">
                        <i class="fas fa-paper-plane"></i> Submit Application
                    </button>
                </form>
            </div>

            <div class="text-center mt-4">
                <p class="text-muted small">
                    <i class="fas fa-shield-alt me-1"></i> Your data is securely encrypted and stored in compliance with institutional privacy policies.
                </p>
            </div>

        </div>
    </div>
</div>

<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/dark-mode.js"></script>
</body>
</html>