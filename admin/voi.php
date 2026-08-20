<?php
require_once 'auth.php';

// Handle Delete
if (isset($_GET['delete_id'])) {
    $id = (int)$_GET['delete_id'];
    $pdo->prepare("DELETE FROM voice_of_experience WHERE id = ?")->execute([$id]);
    header("Location: voi.php");
    exit;
}

// Handle Add
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_voi'])) {
    $title = $_POST['title'];
    $designation = $_POST['designation'];
    $content = $_POST['content'];
    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $title)));
    
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
    
    $stmt = $pdo->prepare("INSERT INTO voice_of_experience (title, slug, designation, content, image_path) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$title, $slug, $designation, $content, $image_path]);
    header("Location: voi.php");
    exit;
}

$vois = $pdo->query("SELECT * FROM voice_of_experience ORDER BY created_at DESC")->fetchAll();

require_once 'header.php';
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Manage Voice of Experience</h2>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addVOEModal" >+ Add New Profile</button>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Designation</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($vois as $voi): 
                    if (strpos($voi['image_path'], 'assets/') === 0) {
                        $img_src = '../' . $voi['image_path'];
                    } else {
                        $img_src = $voi['image_path'] ? '../uploads/' . $voi['image_path'] : '../assets/images/placeholder.jpg';
                    }
                ?>
                <tr>
                    <td><img src="<?php echo htmlspecialchars($img_src); ?>" alt="Profile Image" style="width: 50px; height: 50px; object-fit: cover; border-radius:4px;"></td>
                    <td><?php echo htmlspecialchars($voi['title']); ?></td>
                    <td><?php echo htmlspecialchars($voi['designation']); ?></td>
                    <td>
                        <a href="voi.php?delete_id=<?php echo $voi['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this profile?');"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Add Modal -->
<div class="modal fade" id="addVOEModal" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form method="POST" enctype="multipart/form-data">
      <div class="modal-header">
        <h5 class="modal-title">Add New Voice of Experience</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Designation</label>
            <input type="text" name="designation" class="form-control">
        </div>
        <div class="mb-3">
            <label>Profile Image</label>
            <input type="file" name="image" class="form-control" accept="image/*">
        </div>
        <div class="mb-3">
            <label>Detailed Content</label>
            <textarea name="content" class="form-control" rows="5"></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" name="add_voi" class="btn btn-primary" >Save Profile</button>
      </div>
      </form>
    </div>
  </div>
</div>

<?php require_once 'footer.php'; ?>
