<?php
require_once 'auth.php';

// Handle Delete
if (isset($_GET['delete_id'])) {
    $id = (int)$_GET['delete_id'];
    $pdo->prepare("DELETE FROM notices WHERE id = ?")->execute([$id]);
    header("Location: notices.php?msg=deleted");
    exit;
}

// Handle Add
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_notice'])) {
    $title = trim($_POST['title']);
    $notice_date = $_POST['notice_date'] ?: date('Y-m-d');
    $description = trim($_POST['description'] ?? '');
    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $title)));
    $file_path = '';

    if (isset($_FILES['notice_pdf']) && $_FILES['notice_pdf']['error'] == UPLOAD_ERR_OK) {
        $uploadDir = "../uploads/2026/notices/";
        if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);
        $fileName = time() . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '', $_FILES['notice_pdf']['name']);
        if (move_uploaded_file($_FILES['notice_pdf']['tmp_name'], $uploadDir . $fileName)) {
            $file_path = "uploads/2026/notices/" . $fileName;
        }
    }
    
    $stmt = $pdo->prepare("INSERT INTO notices (title, slug, notice_date, description, file_path) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$title, $slug, $notice_date, $description, $file_path]);
    header("Location: notices.php?msg=added");
    exit;
}

// Handle Edit
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['edit_notice'])) {
    $id = (int)$_POST['notice_id'];
    $title = trim($_POST['title']);
    $notice_date = $_POST['notice_date'] ?: date('Y-m-d');
    $description = trim($_POST['description'] ?? '');

    if (isset($_FILES['notice_pdf']) && $_FILES['notice_pdf']['error'] == UPLOAD_ERR_OK) {
        $uploadDir = "../uploads/2026/notices/";
        if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);
        $fileName = time() . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '', $_FILES['notice_pdf']['name']);
        if (move_uploaded_file($_FILES['notice_pdf']['tmp_name'], $uploadDir . $fileName)) {
            $file_path = "uploads/2026/notices/" . $fileName;
            $stmt = $pdo->prepare("UPDATE notices SET title = ?, notice_date = ?, description = ?, file_path = ? WHERE id = ?");
            $stmt->execute([$title, $notice_date, $description, $file_path, $id]);
        }
    } else {
        $stmt = $pdo->prepare("UPDATE notices SET title = ?, notice_date = ?, description = ? WHERE id = ?");
        $stmt->execute([$title, $notice_date, $description, $id]);
    }
    
    header("Location: notices.php?msg=updated");
    exit;
}

$notices = $pdo->query("SELECT * FROM notices ORDER BY notice_date DESC")->fetchAll(PDO::FETCH_ASSOC);

require_once 'header.php';
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="m-0 font-serif fw-bold" style="color: var(--admin-maroon-dark);"><i class="fa-solid fa-bell text-gold me-2"></i> Manage Official Notice Board</h2>
        <p class="text-muted small m-0">Publish circulars, academic notices, holiday declarations, and downloadable PDF orders.</p>
    </div>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addNoticeModal">
        <i class="fa-solid fa-plus-circle me-1"></i> + Publish New Notice
    </button>
</div>

<?php if (isset($_GET['msg'])): ?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong> Notice has been <?php echo htmlspecialchars($_GET['msg']); ?> successfully.
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
<?php endif; ?>

<div class="admin-card">
    <div class="admin-card-header">
        <strong class="font-serif fs-5 text-primary">All Active Circulars (<?php echo count($notices); ?>)</strong>
        <a href="../notice-board.php" target="_blank" class="btn btn-sm btn-outline-primary rounded-pill px-3">
            <i class="fa-solid fa-eye me-1"></i> View Live Notice Board
        </a>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead>
                    <tr>
                        <th style="width: 140px;">Notice Date</th>
                        <th>Notice Title &amp; Details</th>
                        <th>Attached Circular</th>
                        <th class="text-end" style="width: 140px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($notices)): ?>
                    <tr>
                        <td colspan="4" class="text-center py-4 text-muted">No notices published yet. Click "+ Publish New Notice" to create one.</td>
                    </tr>
                    <?php else: ?>
                    <?php foreach ($notices as $n): ?>
                    <tr>
                        <td>
                            <span class="badge bg-light text-dark border fw-bold">
                                <i class="fa-regular fa-calendar text-gold me-1"></i>
                                <?php echo !empty($n['notice_date']) ? date('d M, Y', strtotime($n['notice_date'])) : 'Recent'; ?>
                            </span>
                        </td>
                        <td>
                            <strong class="text-dark d-block"><?php echo htmlspecialchars($n['title']); ?></strong>
                            <span class="small text-muted"><?php echo htmlspecialchars(mb_strimwidth($n['description'] ?? '', 0, 80, '...')); ?></span>
                        </td>
                        <td>
                            <?php if (!empty($n['file_path'])): ?>
                                <a href="../<?php echo htmlspecialchars($n['file_path']); ?>" target="_blank" class="btn btn-sm btn-outline-danger py-0.5 px-2 small">
                                    <i class="fa-solid fa-file-pdf me-1"></i> Download PDF
                                </a>
                            <?php else: ?>
                                <span class="small text-muted">Text Circular</span>
                            <?php endif; ?>
                        </td>
                        <td class="text-end">
                            <button type="button" class="btn btn-sm btn-outline-primary btn-edit-notice"
                                data-id="<?php echo $n['id']; ?>"
                                data-title="<?php echo htmlspecialchars($n['title'], ENT_QUOTES); ?>"
                                data-date="<?php echo htmlspecialchars($n['notice_date'] ?? ''); ?>"
                                data-desc="<?php echo htmlspecialchars($n['description'] ?? '', ENT_QUOTES); ?>"
                                title="Edit Notice"><i class="fa-solid fa-pen-to-square"></i></button>
                            <a href="notices.php?delete_id=<?php echo $n['id']; ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure you want to delete this notice?');" title="Delete Notice"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Add Modal -->
<div class="modal fade" id="addNoticeModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" enctype="multipart/form-data">
          <div class="modal-header">
            <h5 class="modal-title"><i class="fa-solid fa-plus-circle text-gold me-2"></i> Publish Official Notice</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
            <div class="mb-3">
                <label class="form-label fw-bold">Notice Title *</label>
                <input type="text" name="title" class="form-control" placeholder="e.g. Schedule for End Semester Examinations May-June 2026" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Notice Date *</label>
                <input type="date" name="notice_date" class="form-control" value="<?php echo date('Y-m-d'); ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Attach PDF Order / Circular (Optional)</label>
                <input type="file" name="notice_pdf" class="form-control" accept=".pdf,.doc,.docx">
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Notice Description (Optional)</label>
                <textarea name="description" class="form-control" rows="3" placeholder="Brief summary of the circular..."></textarea>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" name="add_notice" class="btn btn-primary"><i class="fa-solid fa-bullhorn me-1"></i> Publish Notice</button>
          </div>
      </form>
    </div>
  </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editNoticeModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" enctype="multipart/form-data">
          <input type="hidden" name="notice_id" id="edit_notice_id">
          <div class="modal-header">
            <h5 class="modal-title"><i class="fa-solid fa-pen-to-square text-gold me-2"></i> Edit Notice</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
            <div class="mb-3">
                <label class="form-label fw-bold">Notice Title *</label>
                <input type="text" name="title" id="edit_title" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Notice Date *</label>
                <input type="date" name="notice_date" id="edit_notice_date" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Update Attached PDF (Optional)</label>
                <input type="file" name="notice_pdf" class="form-control" accept=".pdf,.doc,.docx">
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Notice Description</label>
                <textarea name="description" id="edit_desc" class="form-control" rows="3"></textarea>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" name="edit_notice" class="btn btn-primary"><i class="fa-solid fa-check me-1"></i> Update Notice</button>
          </div>
      </form>
    </div>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const editModal = new bootstrap.Modal(document.getElementById('editNoticeModal'));
    document.querySelectorAll('.btn-edit-notice').forEach(btn => {
        btn.addEventListener('click', function() {
            document.getElementById('edit_notice_id').value = this.dataset.id;
            document.getElementById('edit_title').value = this.dataset.title;
            document.getElementById('edit_notice_date').value = this.dataset.date;
            window.setEditorData('edit_desc', this.dataset.desc);
            editModal.show();
        });
    });
});
</script>

<?php require_once 'footer.php'; ?>
