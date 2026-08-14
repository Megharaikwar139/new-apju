<?php
require_once 'auth.php';

// Handle Delete
if (isset($_GET['delete_id'])) {
    $id = (int)$_GET['delete_id'];
    $pdo->prepare("DELETE FROM notices WHERE id = ?")->execute([$id]);
    header("Location: notices.php");
    exit;
}

// Handle Add
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_notice'])) {
    $title = $_POST['title'];
    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $title)));
    
    $stmt = $pdo->prepare("INSERT INTO notices (title, slug) VALUES (?, ?)");
    $stmt->execute([$title, $slug]);
    header("Location: notices.php");
    exit;
}

$notices = $pdo->query("SELECT * FROM notices ORDER BY notice_date DESC")->fetchAll();

require_once 'header.php';
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Manage Notice Board</h2>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addNoticeModal" style="background-color: #0b2c4d; border-color: #0b2c4d;">+ Add New Notice</button>
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
                <?php foreach ($notices as $notice): ?>
                <tr>
                    <td><?php echo htmlspecialchars($notice['title']); ?></td>
                    <td><?php echo htmlspecialchars($notice['notice_date']); ?></td>
                    <td>
                        <a href="notices.php?delete_id=<?php echo $notice['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this notice?');"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Add Modal -->
<div class="modal fade" id="addNoticeModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST">
      <div class="modal-header">
        <h5 class="modal-title">Add New Notice</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
            <label>Notice Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" name="add_notice" class="btn btn-primary" style="background-color: #0b2c4d;">Save Notice</button>
      </div>
      </form>
    </div>
  </div>
</div>

<?php require_once 'footer.php'; ?>
