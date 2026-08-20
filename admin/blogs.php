<?php
require_once 'auth.php';

// Handle Delete
if (isset($_GET['delete_id'])) {
    $id = (int)$_GET['delete_id'];
    $pdo->prepare("DELETE FROM blogs WHERE id = ?")->execute([$id]);
    header("Location: blogs.php");
    exit;
}

// Handle Add
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_blog'])) {
    $title = $_POST['title'];
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
            // Save relative to the new-apju folder
            $image_path = 'assets/images/uploads/' . $file_name;
        }
    }
    
    $stmt = $pdo->prepare("INSERT INTO blogs (title, slug, content, image_path) VALUES (?, ?, ?, ?)");
    $stmt->execute([$title, $slug, $content, $image_path]);
    header("Location: blogs.php");
    exit;
}

$blogs = $pdo->query("SELECT * FROM blogs ORDER BY created_at DESC")->fetchAll();

require_once 'header.php';
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Manage Blogs</h2>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addBlogModal" >+ Add New Blog</button>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Date Posted</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($blogs as $blog): 
                    if (strpos($blog['image_path'], 'assets/') === 0) {
                        $img_src = '../' . $blog['image_path'];
                    } else {
                        $img_src = $blog['image_path'] ? '../uploads/' . $blog['image_path'] : '../assets/images/placeholder.jpg';
                    }
                ?>
                <tr>
                    <td><img src="<?php echo htmlspecialchars($img_src); ?>" alt="Blog Image" style="width: 50px; height: 50px; object-fit: cover; border-radius:4px;"></td>
                    <td><?php echo htmlspecialchars($blog['title']); ?></td>
                    <td><?php echo htmlspecialchars($blog['created_at']); ?></td>
                    <td>
                        <a href="blogs.php?delete_id=<?php echo $blog['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this blog?');"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Add Modal -->
<div class="modal fade" id="addBlogModal" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form method="POST" enctype="multipart/form-data">
      <div class="modal-header">
        <h5 class="modal-title">Add New Blog</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
            <label>Blog Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Featured Image</label>
            <input type="file" name="image" class="form-control" accept="image/*">
        </div>
        <div class="mb-3">
            <label>Content</label>
            <textarea name="content" class="form-control" rows="5" required></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" name="add_blog" class="btn btn-primary" >Save Blog</button>
      </div>
      </form>
    </div>
  </div>
</div>

<?php require_once 'footer.php'; ?>
