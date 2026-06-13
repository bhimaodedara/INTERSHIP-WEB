<?php

require_once '../../config/db_connect.php';

$q = trim($_GET['q'] ?? '');


$q = mysqli_real_escape_string($conn, $q);

// If the search bar is empty, pull all gallery entries normally
if ($q == '') {
    $sql = "SELECT * FROM gallery ORDER BY id DESC";
} else {
    // Wildcard query searches both matching titles AND matching descriptions
    $sql = "SELECT * FROM gallery 
            WHERE title LIKE '%$q%' OR description LIKE '%$q%' 
            ORDER BY id DESC";
}

$res = mysqli_query($conn, $sql);

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
    echo "
    <div class='col-12 text-center py-4'>
        <p class='text-muted'>No matching gallery items found.</p>
    </div>";
}
mysqli_close($conn);
?>