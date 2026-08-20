<?php
require_once 'auth.php';

$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    $id = $_POST['id'] ?? null;
    $title = $_POST['title'] ?? '';
    $subtitle = $_POST['subtitle'] ?? '';
    $icon = $_POST['icon'] ?? 'fa-solid fa-graduation-cap';
    $url = $_POST['url'] ?? '';
    $sort_order = $_POST['sort_order'] ?? 0;

    if ($action === 'save') {
        if ($id) {
            $stmt = $pdo->prepare("UPDATE homepage_portals SET title = ?, subtitle = ?, icon = ?, url = ?, sort_order = ? WHERE id = ?");
            $stmt->execute([$title, $subtitle, $icon, $url, $sort_order, $id]);
            $message = 'Portal card updated successfully!';
        } else {
            $stmt = $pdo->prepare("INSERT INTO homepage_portals (title, subtitle, icon, url, sort_order) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$title, $subtitle, $icon, $url, $sort_order]);
            $message = 'New portal shortcut added successfully!';
        }
    } elseif ($action === 'delete' && $id) {
        $stmt = $pdo->prepare("DELETE FROM homepage_portals WHERE id = ?");
        $stmt->execute([$id]);
        $message = 'Portal shortcut deleted successfully!';
    }
}

$portals = $pdo->query("SELECT * FROM homepage_portals ORDER BY sort_order ASC, id ASC")->fetchAll();
require_once 'header.php';
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h3 class="font-serif fw-bold text-primary mb-1">Portals & Quick Services Manager</h3>
        <p class="text-muted small mb-0">Manage the 8 quick shortcut cards (Admissions, Calendar, Results, Library, Student Portal, etc.) on the homepage.</p>
    </div>
    <button class="btn btn-primary rounded-pill btn-sm px-3" data-bs-toggle="modal" data-bs-target="#portalModal" onclick="openAddPortalModal()">
        <i class="fa-solid fa-plus me-1"></i> Add Portal Card
    </button>
</div>

<?php if ($message): ?>
<div class="alert alert-success alert-dismissible fade show rounded-3 small fw-medium" role="alert">
    <i class="fa-solid fa-check-circle me-1"></i> <?php echo $message; ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php endif; ?>

<div class="row g-3">
    <?php foreach ($portals as $p): ?>
    <div class="col-md-3">
        <div class="card shadow-sm border-0 p-3 h-100 d-flex flex-column justify-content-between">
            <div class="d-flex align-items-center gap-3 mb-3">
                <div class="p-2 rounded-circle bg-primary text-white d-grid place-items-center flex-shrink-0" style="width: 40px; height: 40px;">
                    <i class="<?php echo htmlspecialchars($p['icon']); ?> fs-6"></i>
                </div>
                <div class="min-w-0 flex-grow-1">
                    <h6 class="font-serif text-primary fw-bold mb-0 text-truncate"><?php echo htmlspecialchars($p['title']); ?></h6>
                    <small class="text-muted text-truncate d-block"><?php echo htmlspecialchars($p['subtitle']); ?></small>
                </div>
            </div>
            <div>
                <code class="small d-block mb-3 text-truncate"><?php echo htmlspecialchars($p['url']); ?></code>
                <div class="d-flex gap-2 pt-2 border-top">
                    <button class="btn btn-sm btn-outline-primary rounded-pill flex-grow-1" onclick='openEditPortalModal(<?php echo json_encode($p); ?>)'>
                        <i class="fa-solid fa-pen me-1"></i> Edit
                    </button>
                    <form method="POST" onsubmit="return confirm('Are you sure you want to delete this portal card?');">
                        <input type="hidden" name="action" value="delete">
                        <input type="hidden" name="id" value="<?php echo $p['id']; ?>">
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

<!-- Modal -->
<div class="modal fade" id="portalModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form method="POST" class="modal-content border-0 shadow-lg rounded-4">
            <div class="modal-header border-bottom">
                <h5 class="modal-title font-serif text-primary fw-bold" id="portalModalTitle">Add Portal Card</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <input type="hidden" name="action" value="save">
                <input type="hidden" name="id" id="portalId" value="">
                
                <div class="mb-3">
                    <label class="form-label fw-semibold small">Portal Title</label>
                    <input type="text" name="title" id="portalTitle" class="form-control" required placeholder="e.g. Admissions">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold small">Subtitle / Tagline</label>
                    <input type="text" name="subtitle" id="portalSubtitle" class="form-control" required placeholder="e.g. Apply for 2026">
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold small">FontAwesome Icon</label>
                        <input type="text" name="icon" id="portalIcon" class="form-control" required placeholder="fa-solid fa-graduation-cap">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold small">Sort Order</label>
                        <input type="number" name="sort_order" id="portalSort" class="form-control" value="0">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold small">Target Link / URL</label>
                    <input type="text" name="url" id="portalUrl" class="form-control" required placeholder="admission-procedure.php">
                </div>

            </div>
            <div class="modal-footer border-top bg-light">
                <button type="button" class="btn btn-sm btn-outline-secondary rounded-pill px-3" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-sm btn-primary rounded-pill px-4 fw-semibold">Save Portal</button>
            </div>
        </form>
    </div>
</div>

<script>
function openAddPortalModal() {
    document.getElementById('portalModalTitle').innerText = 'Add Portal Card';
    document.getElementById('portalId').value = '';
    document.getElementById('portalTitle').value = '';
    document.getElementById('portalSubtitle').value = '';
    document.getElementById('portalIcon').value = 'fa-solid fa-graduation-cap';
    document.getElementById('portalUrl').value = '';
    document.getElementById('portalSort').value = '0';
}

function openEditPortalModal(p) {
    document.getElementById('portalModalTitle').innerText = 'Edit Portal Card';
    document.getElementById('portalId').value = p.id;
    document.getElementById('portalTitle').value = p.title;
    document.getElementById('portalSubtitle').value = p.subtitle;
    document.getElementById('portalIcon').value = p.icon;
    document.getElementById('portalUrl').value = p.url;
    document.getElementById('portalSort').value = p.sort_order;
    new bootstrap.Modal(document.getElementById('portalModal')).show();
}
</script>

<?php require_once 'footer.php'; ?>
