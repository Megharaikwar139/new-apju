<?php
require_once 'auth.php';

// Handle Delete
if (isset($_GET['delete_id'])) {
    $id = (int)$_GET['delete_id'];
    $pdo->prepare("DELETE FROM announcements WHERE id = ?")->execute([$id]);
    header("Location: announcements.php");
    exit;
}

// Handle Add
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_announcement'])) {
    $title = $_POST['title'];
    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $title)));
    
    $stmt = $pdo->prepare("INSERT INTO announcements (title, slug) VALUES (?, ?)");
    $stmt->execute([$title, $slug]);
    header("Location: announcements.php");
    exit;
}

$announcements = $pdo->query("SELECT * FROM announcements ORDER BY created_at DESC")->fetchAll();

require_once 'header.php';
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Manage Announcements</h2>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addAnnModal" >+ Add New Announcement</button>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Date Posted</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($announcements as $ann): ?>
                <tr>
                    <td><?php echo htmlspecialchars($ann['title']); ?></td>
                    <td><?php echo htmlspecialchars($ann['created_at']); ?></td>
                    <td>
                        <a href="announcements.php?delete_id=<?php echo $ann['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this announcement?');"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Add Modal -->
<div class="modal fade" id="addAnnModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST">
      <div class="modal-header">
        <h5 class="modal-title">Add New Announcement</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
            <label>Announcement Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" name="add_announcement" class="btn btn-primary" >Save Announcement</button>
      </div>
      </form>
    </div>
  </div>
</div>

<?php require_once 'footer.php'; ?>
