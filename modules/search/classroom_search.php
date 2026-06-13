<?php
require_once '../../config/db_connect.php';

$q = trim($_GET['q'] ?? '');

$q = mysqli_real_escape_string($conn, $q);

// If the search bar is empty, pull all classrooms normally
if ($q == '') {
    $sql = "SELECT * FROM classrooms ORDER BY id DESC";
} else {
    // query searches both room numbers AND individual facilities
    $sql = "SELECT * FROM classrooms 
            WHERE room_no LIKE '%$q%' OR facilities LIKE '%$q%' 
            ORDER BY id DESC";
}

$query = mysqli_query($conn, $sql);

if (mysqli_num_rows($query) > 0) {
    while ($row = mysqli_fetch_assoc($query)) {
        $roomNo = htmlspecialchars($row['room_no']);
        $capacity = (int)$row['capacity'];
        $img = htmlspecialchars($row['img_path']);
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
                        foreach ($facilities_array as $facility) {
                            $trimmed = trim($facility);
                            if (!empty($trimmed)) {
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
            <i class='fas fa-search fa-3x mb-3 text-secondary'></i>
            <h5>No matching rooms or facilities found.</h5>
            <p class='small text-muted'>Try adjusting your search criteria keywords.</p>
        </div>
    </div>";
}
mysqli_close($conn);
?>