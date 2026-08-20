<?php
require_once 'auth.php';

// Handle Delete
if (isset($_GET['delete_id'])) {
    $id = (int)$_GET['delete_id'];
    $pdo->prepare("DELETE FROM banners WHERE id = ?")->execute([$id]);
    header("Location: banners.php");
    exit;
}

// Handle Add
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_banner'])) {
    $title = $_POST['title'] ?? '';
    $sort_order = (int)$_POST['sort_order'];
    
    $image_path = '';
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $upload_dir = '../assets/images/uploads/';
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }
        $file_name = time() . '_' . basename($_FILES['image']['name']);
        $target_file = $upload_dir . $file_name;
        
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
            $image_path = 'assets/images/uploads/' . $file_name;
        }
    }
    
    if ($image_path) {
        $stmt = $pdo->prepare("INSERT INTO banners (image_path, title, sort_order) VALUES (?, ?, ?)");
        $stmt->execute([$image_path, $title, $sort_order]);
    }
    header("Location: banners.php");
    exit;
}

$banners = $pdo->query("SELECT * FROM banners ORDER BY sort_order ASC, id DESC")->fetchAll();

require_once 'header.php';
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Manage Main Hero Slider (Banners)</h2>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addBannerModal" >+ Add New Banner</button>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Title (Optional)</th>
                    <th>Sort Order</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($banners as $banner): 
                    if (strpos($banner['image_path'], 'assets/') === 0) {
                        $img_src = '../' . $banner['image_path'];
                    } else {
                        $img_src = $banner['image_path'] ? '../uploads/' . $banner['image_path'] : '../assets/images/placeholder.jpg';
                    }
                ?>
                <tr>
                    <td><img src="<?php echo htmlspecialchars($img_src); ?>" alt="Banner" style="width: 150px; height: 60px; object-fit: cover; border-radius:4px;"></td>
                    <td><?php echo htmlspecialchars($banner['title']); ?></td>
                    <td><?php echo $banner['sort_order']; ?></td>
                    <td>
                        <a href="banners.php?delete_id=<?php echo $banner['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this banner?');"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Add Modal -->
<div class="modal fade" id="addBannerModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" enctype="multipart/form-data">
      <div class="modal-header">
        <h5 class="modal-title">Add New Banner</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
            <label>Banner Image (Recommended size: 1200x600)</label>
            <input type="file" name="image" class="form-control" accept="image/*" required>
        </div>
        <div class="mb-3">
            <label>Title (Optional for screen readers/alt text)</label>
            <input type="text" name="title" class="form-control">
        </div>
        <div class="mb-3">
            <label>Sort Order</label>
            <input type="number" name="sort_order" class="form-control" value="0">
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" name="add_banner" class="btn btn-primary" >Save Banner</button>
      </div>
      </form>
    </div>
  </div>
</div>

<?php require_once 'footer.php'; ?>
