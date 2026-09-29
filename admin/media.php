<?php
require_once 'auth.php';

// Handle Delete
if (isset($_GET['delete_id'])) {
    $id = (int)$_GET['delete_id'];
    $pdo->prepare("DELETE FROM media_coverage WHERE id = ?")->execute([$id]);
    header("Location: media.php");
    exit;
}

// Handle Add
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_media'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $title)));
    
    $image_path = '';
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $uploadRes = secure_upload_file($_FILES['image'], __DIR__ . '/../assets/images/uploads/', ['jpg', 'jpeg', 'png', 'webp']);
        if ($uploadRes['success']) {
            $image_path = 'assets/images/uploads/' . $uploadRes['fileName'];
        }
    }
    
    $stmt = $pdo->prepare("INSERT INTO media_coverage (title, slug, content, image_path) VALUES (?, ?, ?, ?)");
    $stmt->execute([$title, $slug, $content, $image_path]);
    header("Location: media.php");
    exit;
}

// Handle Edit
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['edit_media'])) {
    $id = (int)$_POST['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $uploadRes = secure_upload_file($_FILES['image'], __DIR__ . '/../assets/images/uploads/', ['jpg', 'jpeg', 'png', 'webp']);
        if ($uploadRes['success']) {
            $image_path = 'assets/images/uploads/' . $uploadRes['fileName'];
            $stmt = $pdo->prepare("UPDATE media_coverage SET title = ?, content = ?, image_path = ? WHERE id = ?");
            $stmt->execute([$title, $content, $image_path, $id]);
        }
    } else {
        $stmt = $pdo->prepare("UPDATE media_coverage SET title = ?, content = ? WHERE id = ?");
        $stmt->execute([$title, $content, $id]);
    }
    header("Location: media.php");
    exit;
}

$medias = $pdo->query("SELECT * FROM media_coverage ORDER BY created_at DESC")->fetchAll();

require_once 'header.php';
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Manage Media Coverage</h2>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addMediaModal" >+ Add Media Item</button>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Date Added</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($medias as $media): 
                    if (strpos($media['image_path'], 'assets/') === 0) {
                        $img_src = '../' . $media['image_path'];
                    } else {
                        $img_src = $media['image_path'] ? '../uploads/' . $media['image_path'] : '../assets/images/placeholder.jpg';
                    }
                ?>
                <tr>
                    <td><img src="<?php echo htmlspecialchars($img_src); ?>" alt="Media Image" style="width: 80px; height: 50px; object-fit: cover; border-radius:4px;"></td>
                    <td><?php echo htmlspecialchars($media['title']); ?></td>
                    <td><?php echo date('d M Y', strtotime($media['created_at'])); ?></td>
                    <td>
                        <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#editMediaModal<?php echo $media['id']; ?>"><i class="fas fa-edit"></i></button>
                        <a href="media.php?delete_id=<?php echo $media['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this media item?');"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>

                <!-- Edit Modal -->
                <div class="modal fade" id="editMediaModal<?php echo $media['id']; ?>" tabindex="-1">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <form method="POST" enctype="multipart/form-data">
                      <input type="hidden" name="id" value="<?php echo $media['id']; ?>">
                      <div class="modal-header">
                        <h5 class="modal-title">Edit Media Coverage Item</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                      </div>
                      <div class="modal-body">
                        <div class="mb-3">
                            <label>Title / Headline</label>
                            <input type="text" name="title" class="form-control" value="<?php echo htmlspecialchars($media['title']); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label>Media Image (Clipping)</label>
                            <input type="file" name="image" class="form-control" accept="image/*">
                            <small class="text-muted">Leave blank to keep existing image.</small>
                        </div>
                        <div class="mb-3">
                            <label>Detailed Content / Description</label>
                            <textarea name="content" class="form-control" rows="5"><?php echo htmlspecialchars($media['content'] ?? ''); ?></textarea>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="submit" name="edit_media" class="btn btn-primary" >Save Changes</button>
                      </div>
                      </form>
                    </div>
                  </div>
                </div>

                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Add Modal -->
<div class="modal fade" id="addMediaModal" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form method="POST" enctype="multipart/form-data">
      <div class="modal-header">
        <h5 class="modal-title">Add Media Coverage Item</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
            <label>Title / Headline</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Media Image (Clipping)</label>
            <input type="file" name="image" class="form-control" accept="image/*" required>
        </div>
        <div class="mb-3">
            <label>Detailed Content / Description</label>
            <textarea name="content" class="form-control" rows="5"></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" name="add_media" class="btn btn-primary" >Save Item</button>
      </div>
      </form>
    </div>
  </div>
</div>

<?php require_once 'footer.php'; ?>
