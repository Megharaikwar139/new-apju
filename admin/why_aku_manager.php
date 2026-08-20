<?php
require_once 'auth.php';

$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    $id = $_POST['id'] ?? null;
    $title = $_POST['title'] ?? '';
    $description = $_POST['description'] ?? '';
    $link_url = $_POST['link_url'] ?? '';
    $image_path = $_POST['image_path'] ?? '';
    $sort_order = $_POST['sort_order'] ?? 0;

    // Handle upload if present
    if (isset($_FILES['card_image']) && $_FILES['card_image']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = '../uploads/' . date('Y/m/');
        if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);
        $fileName = time() . '_' . basename($_FILES['card_image']['name']);
        if (move_uploaded_file($_FILES['card_image']['tmp_name'], $uploadDir . $fileName)) {
            $image_path = 'uploads/' . date('Y/m/') . $fileName;
        }
    }

    if ($action === 'save') {
        if ($id) {
            $stmt = $pdo->prepare("UPDATE why_aku_features SET title = ?, description = ?, link_url = ?, image_path = ?, sort_order = ? WHERE id = ?");
            $stmt->execute([$title, $description, $link_url, $image_path, $sort_order, $id]);
            $message = 'Feature card updated successfully!';
        } else {
            $stmt = $pdo->prepare("INSERT INTO why_aku_features (title, description, link_url, image_path, sort_order) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$title, $description, $link_url, $image_path, $sort_order]);
            $message = 'New feature card added successfully!';
        }
    } elseif ($action === 'delete' && $id) {
        $stmt = $pdo->prepare("DELETE FROM why_aku_features WHERE id = ?");
        $stmt->execute([$id]);
        $message = 'Feature card deleted successfully!';
    }
}

$features = $pdo->query("SELECT * FROM why_aku_features ORDER BY sort_order ASC, id ASC")->fetchAll();
require_once 'header.php';
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h3 class="font-serif fw-bold text-primary mb-1">Why AKU Features (6 Connected Page Cards)</h3>
        <p class="text-muted small mb-0">Manage the 6 highlight page cards displayed on the homepage with high-res photos, descriptions, and active page links.</p>
    </div>
    <button class="btn btn-primary rounded-pill btn-sm px-3" data-bs-toggle="modal" data-bs-target="#whyModal" onclick="openAddWhyModal()">
        <i class="fa-solid fa-plus me-1"></i> Add Feature Card
    </button>
</div>

<?php if ($message): ?>
<div class="alert alert-success alert-dismissible fade show rounded-3 small fw-medium" role="alert">
    <i class="fa-solid fa-check-circle me-1"></i> <?php echo $message; ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php endif; ?>

<div class="row g-4">
    <?php foreach ($features as $f): ?>
    <div class="col-md-4">
        <div class="card shadow-sm border-0 h-100 overflow-hidden">
            <div style="height: 180px; overflow: hidden; background: #eee;">
                <img src="../<?php echo htmlspecialchars($f['image_path']); ?>" alt="<?php echo htmlspecialchars($f['title']); ?>" class="w-100 h-100 object-fit-cover"/>
            </div>
            <div class="card-body p-4 d-flex flex-column justify-content-between">
                <div>
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span class="badge bg-light text-dark border">Order: <?php echo $f['sort_order']; ?></span>
                        <a href="../<?php echo htmlspecialchars($f['link_url']); ?>" target="_blank" class="small text-decoration-none text-primary fw-semibold">
                            <i class="fa-solid fa-arrow-up-right-from-square me-1"></i> <?php echo htmlspecialchars($f['link_url']); ?>
                        </a>
                    </div>
                    <h5 class="font-serif text-primary fw-bold mb-2"><?php echo htmlspecialchars($f['title']); ?></h5>
                    <p class="text-muted small leading-relaxed mb-3"><?php echo htmlspecialchars($f['description']); ?></p>
                </div>
                <div class="d-flex gap-2 pt-2 border-top">
                    <button class="btn btn-sm btn-outline-primary rounded-pill flex-grow-1" onclick='openEditWhyModal(<?php echo json_encode($f); ?>)'>
                        <i class="fa-solid fa-pen me-1"></i> Edit
                    </button>
                    <form method="POST" onsubmit="return confirm('Are you sure you want to delete this feature card?');">
                        <input type="hidden" name="action" value="delete">
                        <input type="hidden" name="id" value="<?php echo $f['id']; ?>">
                        <button type="submit" class="btn btn-sm btn-outline-danger rounded-pill px-3">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>

<!-- Add / Edit Modal -->
<div class="modal fade" id="whyModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form method="POST" enctype="multipart/form-data" class="modal-content border-0 shadow-lg rounded-4">
            <div class="modal-header border-bottom">
                <h5 class="modal-title font-serif text-primary fw-bold" id="whyModalTitle">Add Feature Card</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <input type="hidden" name="action" value="save">
                <input type="hidden" name="id" id="whyId" value="">
                
                <div class="mb-3">
                    <label class="form-label fw-semibold small">Card Title</label>
                    <input type="text" name="title" id="whyTitle" class="form-control" required placeholder="e.g. Faculty Welfare">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold small">Target Page Link / URL</label>
                    <input type="text" name="link_url" id="whyLink" class="form-control" required placeholder="e.g. single.php?type=page&slug=faculty-welfare">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold small">Description</label>
                    <textarea name="description" id="whyDesc" class="form-control" rows="3" required placeholder="Summary description..."></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold small">Image URL / Path</label>
                    <input type="text" name="image_path" id="whyImagePath" class="form-control mb-2" placeholder="assets/images/facultywa.jpg">
                    <label class="form-label text-muted small">Or Upload New Image</label>
                    <input type="file" name="card_image" class="form-control form-control-sm" accept="image/*">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold small">Sort Order</label>
                    <input type="number" name="sort_order" id="whySort" class="form-control" value="0">
                </div>

            </div>
            <div class="modal-footer border-top bg-light">
                <button type="button" class="btn btn-sm btn-outline-secondary rounded-pill px-3" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-sm btn-primary rounded-pill px-4 fw-semibold">Save Feature</button>
            </div>
        </form>
    </div>
</div>

<script>
function openAddWhyModal() {
    document.getElementById('whyModalTitle').innerText = 'Add Feature Card';
    document.getElementById('whyId').value = '';
    document.getElementById('whyTitle').value = '';
    document.getElementById('whyLink').value = '';
    window.setEditorData('whyDesc', '');
    document.getElementById('whyImagePath').value = '';
    document.getElementById('whySort').value = '0';
}

function openEditWhyModal(data) {
    document.getElementById('whyModalTitle').innerText = 'Edit Feature Card: ' + data.title;
    document.getElementById('whyId').value = data.id;
    document.getElementById('whyTitle').value = data.title;
    document.getElementById('whyLink').value = data.link_url || '';
    window.setEditorData('whyDesc', data.description || '');
    document.getElementById('whyImagePath').value = data.image_path;
    document.getElementById('whySort').value = data.sort_order;
    
    var modal = new bootstrap.Modal(document.getElementById('whyModal'));
    modal.show();
}
</script>

<?php require_once 'footer.php'; ?>
