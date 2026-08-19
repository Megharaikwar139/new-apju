<?php
require_once 'auth.php';

// Handle Delete
if (isset($_GET['delete_id'])) {
    $id = (int)$_GET['delete_id'];
    $pdo->prepare("DELETE FROM page_carousel WHERE id = ?")->execute([$id]);
    header("Location: quick_links.php");
    exit;
}

// Handle Add / Edit
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['save_link'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $link_url = $_POST['link_url'];
    $sort_order = (int)$_POST['sort_order'];
    $id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
    
    // Image Handling
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
    
    if ($id > 0) {
        if ($image_path) {
            $stmt = $pdo->prepare("UPDATE page_carousel SET title = ?, content = ?, link_url = ?, sort_order = ?, image_path = ? WHERE id = ?");
            $stmt->execute([$title, $content, $link_url, $sort_order, $image_path, $id]);
        } else {
            $stmt = $pdo->prepare("UPDATE page_carousel SET title = ?, content = ?, link_url = ?, sort_order = ? WHERE id = ?");
            $stmt->execute([$title, $content, $link_url, $sort_order, $id]);
        }
    } else {
        $stmt = $pdo->prepare("INSERT INTO page_carousel (title, content, image_path, link_url, sort_order) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$title, $content, $image_path, $link_url, $sort_order]);
    }
    header("Location: quick_links.php");
    exit;
}

$links = $pdo->query("SELECT * FROM page_carousel ORDER BY sort_order ASC, id ASC")->fetchAll();

require_once 'header.php';
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Manage Page Quick Links Carousel</h2>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#linkModal" onclick="resetModal()" style="background-color: #0b2c4d; border-color: #0b2c4d;">+ Add New Link</button>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Link URL</th>
                    <th>Order</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($links as $link): 
                    if (strpos($link['image_path'], 'assets/') === 0) {
                        $img_src = '../' . $link['image_path'];
                    } else {
                        $img_src = $link['image_path'] ? '../uploads/' . $link['image_path'] : '../assets/images/placeholder.jpg';
                    }
                ?>
                <tr>
                    <td><img src="<?php echo htmlspecialchars($img_src); ?>" alt="Image" style="width: 80px; height: 50px; object-fit: cover; border-radius:4px;"></td>
                    <td><?php echo htmlspecialchars($link['title']); ?></td>
                    <td><code><?php echo htmlspecialchars($link['link_url']); ?></code></td>
                    <td><?php echo $link['sort_order']; ?></td>
                    <td>
                        <button class="btn btn-sm btn-info text-white" onclick="editLink(<?php echo htmlspecialchars(json_encode($link)); ?>)"><i class="fas fa-edit"></i></button>
                        <a href="quick_links.php?delete_id=<?php echo $link['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this link?');"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="linkModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" enctype="multipart/form-data" id="linkForm">
      <input type="hidden" name="id" id="link_id" value="">
      <div class="modal-header">
        <h5 class="modal-title">Quick Link Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
            <label>Title (e.g., Why AKU)</label>
            <input type="text" name="title" id="link_title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Content Description</label>
            <textarea name="content" id="link_content" class="form-control" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label>Link URL (e.g., why-aku/)</label>
            <input type="text" name="link_url" id="link_url" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Image Upload</label>
            <input type="file" name="image" class="form-control" accept="image/*">
            <small class="text-muted">Leave blank to keep existing image when editing.</small>
        </div>
        <div class="mb-3">
            <label>Sort Order</label>
            <input type="number" name="sort_order" id="link_sort_order" class="form-control" value="0">
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" name="save_link" class="btn btn-primary" style="background-color: #0b2c4d;">Save Link</button>
      </div>
      </form>
    </div>
  </div>
</div>

<script>
function resetModal() {
    document.getElementById('link_id').value = '';
    document.getElementById('linkForm').reset();
}
function editLink(data) {
    document.getElementById('link_id').value = data.id;
    document.getElementById('link_title').value = data.title;
    document.getElementById('link_content').value = data.content;
    document.getElementById('link_url').value = data.link_url;
    document.getElementById('link_sort_order').value = data.sort_order;
    
    var myModal = new bootstrap.Modal(document.getElementById('linkModal'));
    myModal.show();
}
</script>

<?php require_once 'footer.php'; ?>
