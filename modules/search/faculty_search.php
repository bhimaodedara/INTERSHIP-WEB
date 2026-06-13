<?php

require_once '../../config/db_connect.php';

$q = trim($_GET['q'] ?? '');

// Sanitize the input to protect your database
$q = mysqli_real_escape_string($conn, $q);

// If the search bar is empty, pull all faculty members normally
if ($q == '') {
    $sql = "SELECT * FROM faculty";
} else {
    // Search for names that start with the typed letters
    $sql = "SELECT * FROM faculty WHERE name LIKE '$q%' ORDER BY name";
}

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($faculty = mysqli_fetch_assoc($result)) { 
        ?>
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="card border-0 shadow h-100 text-center p-3" style="border-radius: 8px;">
            <img src="<?php echo htmlspecialchars($faculty['img']); ?>" class="card-img-top rounded-circle mx-auto mt-3" style="width: 130px; height: 130px; object-fit: cover;" onerror="this.src='https://via.placeholder.com/130'">                <div class="card-body">
                    <h5 class="card-title fw-bold" style="color: #1a365d;"><?php echo htmlspecialchars($faculty['name']); ?></h5>
                    <p class="card-text text-primary mb-1 fw-semibold"><?php echo htmlspecialchars($faculty['role']); ?></p>
                    <p class="card-text text-muted small"><?php echo htmlspecialchars($faculty['qual']); ?></p>
                </div>
            </div>
        </div>
        <?php 
    }
} else {
    echo "
    <div class='col-12 text-center py-4'>
        <p class='text-muted'>No matching faculty members found.</p>
    </div>";
}
mysqli_close($conn);
?>