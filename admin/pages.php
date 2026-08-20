<?php
require_once 'auth.php';

// Handle Delete
if (isset($_GET['delete_id'])) {
    $id = (int)$_GET['delete_id'];
    $pdo->prepare("DELETE FROM pages WHERE id = ?")->execute([$id]);
    header("Location: pages.php");
    exit;
}

// Handle Add
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_page'])) {
    $title = $_POST['title'];
    $slug = $_POST['slug'];
    $content = $_POST['content'];
    
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
    
    $stmt = $pdo->prepare("INSERT INTO pages (title, slug, content, image_path) VALUES (?, ?, ?, ?)");
    $stmt->execute([$title, $slug, $content, $image_path]);
    header("Location: pages.php");
    exit;
}

// Handle Edit
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['edit_page'])) {
    $id = (int)$_POST['id'];
    $title = $_POST['title'];
    $slug = $_POST['slug'];
    $content = $_POST['content'];
    
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $upload_dir = '../assets/images/uploads/';
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }
        $file_name = time() . '_' . basename($_FILES['image']['name']);
        $target_file = $upload_dir . $file_name;
        
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
            $image_path = 'assets/images/uploads/' . $file_name;
            $stmt = $pdo->prepare("UPDATE pages SET title = ?, slug = ?, content = ?, image_path = ? WHERE id = ?");
            $stmt->execute([$title, $slug, $content, $image_path, $id]);
        }
    } else {
        $stmt = $pdo->prepare("UPDATE pages SET title = ?, slug = ?, content = ? WHERE id = ?");
        $stmt->execute([$title, $slug, $content, $id]);
    }
    header("Location: pages.php");
    exit;
}

$pages = $pdo->query("SELECT * FROM pages ORDER BY created_at DESC")->fetchAll();

require_once 'header.php';
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Manage Pages (Quick Links)</h2>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPageModal" >+ Add Page</button>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Slug / URL</th>
                    <th>Date Added</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pages as $page): ?>
                <tr>
                    <td><strong><?php echo htmlspecialchars($page['title']); ?></strong></td>
                    <td><a href="../<?php echo htmlspecialchars($page['slug']); ?>/" target="_blank">/<?php echo htmlspecialchars($page['slug']); ?>/</a></td>
                    <td><?php echo date('d M Y', strtotime($page['created_at'])); ?></td>
                    <td>
                        <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#editPageModal<?php echo $page['id']; ?>"><i class="fas fa-edit"></i></button>
                        <a href="pages.php?delete_id=<?php echo $page['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this page?');"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>

                <!-- Edit Modal -->
                <div class="modal fade" id="editPageModal<?php echo $page['id']; ?>" tabindex="-1">
                  <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                      <form method="POST" enctype="multipart/form-data">
                      <input type="hidden" name="id" value="<?php echo $page['id']; ?>">
                      <div class="modal-header">
                        <h5 class="modal-title">Edit Page: <?php echo htmlspecialchars($page['title']); ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                      </div>
                      <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Page Title</label>
                                <input type="text" name="title" class="form-control" value="<?php echo htmlspecialchars($page['title']); ?>" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Page Slug (URL)</label>
                                <input type="text" name="slug" class="form-control" value="<?php echo htmlspecialchars($page['slug']); ?>" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label>Featured Image (Optional)</label>
                            <input type="file" name="image" class="form-control" accept="image/*">
                        </div>
                        <div class="mb-3">
                            <label>Detailed HTML Content</label>
                            <textarea name="content" class="form-control" rows="15"><?php echo htmlspecialchars($page['content'] ?? ''); ?></textarea>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="submit" name="edit_page" class="btn btn-primary" >Save Changes</button>
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
<div class="modal fade" id="addPageModal" tabindex="-1">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <form method="POST" enctype="multipart/form-data">
      <div class="modal-header">
        <h5 class="modal-title">Add New Page</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-6 mb-3">
                <label>Page Title</label>
                <input type="text" name="title" class="form-control" required>
            </div>
            <div class="col-md-6 mb-3">
                <label>Page Slug (URL)</label>
                <input type="text" name="slug" class="form-control" placeholder="e.g. why-aku" required>
            </div>
        </div>
        <div class="mb-3">
            <label>Featured Image (Optional)</label>
            <input type="file" name="image" class="form-control" accept="image/*">
        </div>
        <div class="mb-3">
            <label>Detailed HTML Content</label>
            <textarea name="content" class="form-control" rows="15"></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" name="add_page" class="btn btn-primary" >Save Page</button>
      </div>
      </form>
    </div>
  </div>
</div>

<?php require_once 'footer.php'; ?>
