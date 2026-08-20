<?php
require_once 'auth.php';

$msg = '';

// Handle Delete
if (isset($_GET['delete_id'])) {
    $id = (int)$_GET['delete_id'];
    $pdo->prepare("DELETE FROM events WHERE id = ?")->execute([$id]);
    header("Location: events.php?msg=deleted");
    exit;
}

// Handle Add
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_event'])) {
    $title = trim($_POST['title']);
    $event_date = $_POST['event_date'] ?: null;
    $venue = trim($_POST['venue'] ?? 'Indore Campus');
    $content = trim($_POST['content'] ?? '');
    $image_path = '2025/03/events.jpg';
    
    // Handle image upload if provided
    if (isset($_FILES['event_image']) && $_FILES['event_image']['error'] == UPLOAD_ERR_OK) {
        $uploadDir = "../uploads/2026/events/";
        if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);
        $fileName = time() . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '', $_FILES['event_image']['name']);
        if (move_uploaded_file($_FILES['event_image']['tmp_name'], $uploadDir . $fileName)) {
            $image_path = "2026/events/" . $fileName;
        }
    }

    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $title)));
    
    $stmt = $pdo->prepare("INSERT INTO events (title, slug, event_date, venue, content, image_path) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([$title, $slug, $event_date, $venue, $content, $image_path]);
    header("Location: events.php?msg=added");
    exit;
}

// Handle Edit
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['edit_event'])) {
    $id = (int)$_POST['event_id'];
    $title = trim($_POST['title']);
    $event_date = $_POST['event_date'] ?: null;
    $venue = trim($_POST['venue'] ?? 'Indore Campus');
    $content = trim($_POST['content'] ?? '');
    
    // Check if new image uploaded
    if (isset($_FILES['event_image']) && $_FILES['event_image']['error'] == UPLOAD_ERR_OK) {
        $uploadDir = "../uploads/2026/events/";
        if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);
        $fileName = time() . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '', $_FILES['event_image']['name']);
        if (move_uploaded_file($_FILES['event_image']['tmp_name'], $uploadDir . $fileName)) {
            $image_path = "2026/events/" . $fileName;
            $stmt = $pdo->prepare("UPDATE events SET title = ?, event_date = ?, venue = ?, content = ?, image_path = ? WHERE id = ?");
            $stmt->execute([$title, $event_date, $venue, $content, $image_path, $id]);
        }
    } else {
        $stmt = $pdo->prepare("UPDATE events SET title = ?, event_date = ?, venue = ?, content = ? WHERE id = ?");
        $stmt->execute([$title, $event_date, $venue, $content, $id]);
    }
    
    header("Location: events.php?msg=updated");
    exit;
}

$events = $pdo->query("SELECT * FROM events ORDER BY event_date DESC")->fetchAll(PDO::FETCH_ASSOC);

require_once 'header.php';
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="m-0"><i class="fas fa-calendar-alt text-primary me-2"></i> Manage University Events</h2>
        <p class="text-muted small m-0">Add, edit, delete, and upload event circulars and banners.</p>
    </div>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addEventModal">
        <i class="fas fa-plus-circle me-1"></i> + Add New Event
    </button>
</div>

<?php if (isset($_GET['msg'])): ?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong> Event has been <?php echo htmlspecialchars($_GET['msg']); ?> successfully.
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
<?php endif; ?>

<div class="card shadow-sm border-0 rounded-3">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th style="width: 80px;">Banner</th>
                        <th>Event Title</th>
                        <th style="width: 130px;">Event Date</th>
                        <th style="width: 150px;">Venue</th>
                        <th style="width: 160px;" class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($events)): ?>
                    <tr>
                        <td colspan="5" class="text-center py-4 text-muted">No events found in database. Click "+ Add New Event" above to create one.</td>
                    </tr>
                    <?php else: ?>
                    <?php foreach ($events as $event): 
                        $img = !empty($event['image_path']) ? '../uploads/' . $event['image_path'] : '../uploads/2025/03/events.jpg';
                    ?>
                    <tr>
                        <td>
                            <img src="<?php echo htmlspecialchars($img); ?>" alt="Banner" class="rounded" style="width: 60px; height: 42px; object-fit: cover; border: 1px solid #ddd;">
                        </td>
                        <td>
                            <strong class="text-dark d-block"><?php echo htmlspecialchars($event['title']); ?></strong>
                            <span class="small text-muted font-monospace">/event/<?php echo htmlspecialchars($event['slug']); ?>/</span>
                        </td>
                        <td>
                            <span class="badge bg-light text-dark border">
                                <?php echo !empty($event['event_date']) ? date('d M Y', strtotime($event['event_date'])) : 'TBD'; ?>
                            </span>
                        </td>
                        <td>
                            <span class="small text-muted"><i class="fas fa-map-marker-alt text-danger me-1"></i> <?php echo htmlspecialchars($event['venue'] ?? 'Campus'); ?></span>
                        </td>
                        <td class="text-end">
                            <a href="../event/<?php echo $event['slug']; ?>/" target="_blank" class="btn btn-sm btn-outline-secondary" title="View Live Page"><i class="fas fa-eye"></i></a>
                            <button type="button" class="btn btn-sm btn-outline-primary btn-edit-event" 
                                data-id="<?php echo $event['id']; ?>"
                                data-title="<?php echo htmlspecialchars($event['title'], ENT_QUOTES); ?>"
                                data-date="<?php echo htmlspecialchars($event['event_date'] ?? ''); ?>"
                                data-venue="<?php echo htmlspecialchars($event['venue'] ?? '', ENT_QUOTES); ?>"
                                data-content="<?php echo htmlspecialchars($event['content'] ?? '', ENT_QUOTES); ?>"
                                title="Edit Event"><i class="fas fa-edit"></i></button>
                            <a href="events.php?delete_id=<?php echo $event['id']; ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure you want to delete this event?');" title="Delete Event"><i class="fas fa-trash"></i></a>
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
<div class="modal fade" id="addEventModal" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form method="POST" enctype="multipart/form-data">
          <div class="modal-header bg-light">
            <h5 class="modal-title"><i class="fas fa-plus-circle text-primary me-2"></i> Add New University Event</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
            <div class="row g-3">
                <div class="col-md-8">
                    <label class="form-label fw-bold">Event Title *</label>
                    <input type="text" name="title" class="form-control" placeholder="e.g. National Hackathon 2026" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-bold">Event Date *</label>
                    <input type="date" name="event_date" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Campus Venue</label>
                    <input type="text" name="venue" class="form-control" placeholder="e.g. Central Auditorium / Ground" value="Indore Campus">
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Event Banner Image (Optional)</label>
                    <input type="file" name="event_image" class="form-control" accept="image/*">
                </div>
                <div class="col-12">
                    <label class="form-label fw-bold">Event Circular &amp; Detailed Content (HTML allowed)</label>
                    <textarea name="content" class="form-control" rows="6" placeholder="Describe the event, competitions, guest speakers, schedule, and participation rules..."></textarea>
                </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" name="add_event" class="btn btn-primary"><i class="fas fa-save me-1"></i> Publish Event</button>
          </div>
      </form>
    </div>
  </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editEventModal" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form method="POST" enctype="multipart/form-data">
          <input type="hidden" name="event_id" id="edit_event_id">
          <div class="modal-header bg-light">
            <h5 class="modal-title"><i class="fas fa-edit text-primary me-2"></i> Edit University Event</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
            <div class="row g-3">
                <div class="col-md-8">
                    <label class="form-label fw-bold">Event Title *</label>
                    <input type="text" name="title" id="edit_title" class="form-control" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-bold">Event Date *</label>
                    <input type="date" name="event_date" id="edit_event_date" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Campus Venue</label>
                    <input type="text" name="venue" id="edit_venue" class="form-control">
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Update Banner Image (Optional)</label>
                    <input type="file" name="event_image" class="form-control" accept="image/*">
                </div>
                <div class="col-12">
                    <label class="form-label fw-bold">Event Circular &amp; Detailed Content</label>
                    <textarea name="content" id="edit_content" class="form-control" rows="6"></textarea>
                </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" name="edit_event" class="btn btn-primary"><i class="fas fa-check-circle me-1"></i> Update Event</button>
          </div>
      </form>
    </div>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const editModal = new bootstrap.Modal(document.getElementById('editEventModal'));
    document.querySelectorAll('.btn-edit-event').forEach(btn => {
        btn.addEventListener('click', function() {
            document.getElementById('edit_event_id').value = this.dataset.id;
            document.getElementById('edit_title').value = this.dataset.title;
            document.getElementById('edit_event_date').value = this.dataset.date;
            document.getElementById('edit_venue').value = this.dataset.venue;
            window.setEditorData('edit_content', this.dataset.content);
            editModal.show();
        });
    });
});
</script>

<?php require_once 'footer.php'; ?>
