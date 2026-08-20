<?php
require_once 'auth.php';

$message = '';
// Handle Add/Edit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    $id = $_POST['id'] ?? null;
    $title = $_POST['title'] ?? '';
    $program_count = $_POST['program_count'] ?? '';
    $icon = $_POST['icon'] ?? 'fa-solid fa-graduation-cap';
    $url = $_POST['url'] ?? '';
    $categories = $_POST['categories'] ?? 'ug pg';
    $sort_order = $_POST['sort_order'] ?? 0;

    if ($action === 'save') {
        if ($id) {
            $stmt = $pdo->prepare("UPDATE homepage_schools SET title = ?, program_count = ?, icon = ?, url = ?, categories = ?, sort_order = ? WHERE id = ?");
            $stmt->execute([$title, $program_count, $icon, $url, $categories, $sort_order, $id]);
            $message = 'School successfully updated!';
        } else {
            $stmt = $pdo->prepare("INSERT INTO homepage_schools (title, program_count, icon, url, categories, sort_order) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->execute([$title, $program_count, $icon, $url, $categories, $sort_order]);
            $message = 'New school successfully added!';
        }
    } elseif ($action === 'delete' && $id) {
        $stmt = $pdo->prepare("DELETE FROM homepage_schools WHERE id = ?");
        $stmt->execute([$id]);
        $message = 'School deleted successfully!';
    }
}

$schools = $pdo->query("SELECT * FROM homepage_schools ORDER BY sort_order ASC, id ASC")->fetchAll();
require_once 'header.php';
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h3 class="font-serif fw-bold text-primary mb-1">Academic Schools Manager</h3>
        <p class="text-muted small mb-0">Manage the 12 academic schools, program counters, icons, and degree filter categories (ug, pg, diploma, phd).</p>
    </div>
    <button class="btn btn-primary rounded-pill btn-sm px-3" data-bs-toggle="modal" data-bs-target="#schoolModal" onclick="openAddModal()">
        <i class="fa-solid fa-plus me-1"></i> Add New School
    </button>
</div>

<?php if ($message): ?>
<div class="alert alert-success alert-dismissible fade show rounded-3 small fw-medium" role="alert">
    <i class="fa-solid fa-check-circle me-1"></i> <?php echo $message; ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php endif; ?>

<div class="card shadow-sm border-0">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light small text-uppercase">
                    <tr>
                        <th class="ps-4">Sort</th>
                        <th>Icon</th>
                        <th>School Name</th>
                        <th>Program Count</th>
                        <th>Filter Categories</th>
                        <th>URL</th>
                        <th class="text-end pe-4">Actions</th>
                    </tr>
                </thead>
                <tbody class="small">
                    <?php foreach ($schools as $s): ?>
                    <tr>
                        <td class="ps-4 fw-bold text-muted"><?php echo $s['sort_order']; ?></td>
                        <td><i class="<?php echo htmlspecialchars($s['icon']); ?> fs-5 text-gold"></i></td>
                        <td class="fw-bold font-serif fs-6 text-primary"><?php echo htmlspecialchars($s['title']); ?></td>
                        <td><span class="badge bg-light text-dark border"><?php echo htmlspecialchars($s['program_count']); ?></span></td>
                        <td><code><?php echo htmlspecialchars($s['categories']); ?></code></td>
                        <td><small class="text-muted"><?php echo htmlspecialchars($s['url']); ?></small></td>
                        <td class="text-end pe-4">
                            <button class="btn btn-sm btn-outline-primary rounded-circle p-0" style="width: 32px; height: 32px;" onclick='openEditModal(<?php echo json_encode($s); ?>)'>
                                <i class="fa-solid fa-pen text-xs"></i>
                            </button>
                            <form method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this school?');">
                                <input type="hidden" name="action" value="delete">
                                <input type="hidden" name="id" value="<?php echo $s['id']; ?>">
                                <button type="submit" class="btn btn-sm btn-outline-danger rounded-circle p-0 ms-1" style="width: 32px; height: 32px;">
                                    <i class="fa-solid fa-trash text-xs"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Add / Edit Modal -->
<div class="modal fade" id="schoolModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form method="POST" class="modal-content border-0 shadow-lg rounded-4">
            <div class="modal-header border-bottom">
                <h5 class="modal-title font-serif text-primary fw-bold" id="modalTitle">Add Academic School</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <input type="hidden" name="action" value="save">
                <input type="hidden" name="id" id="schoolId" value="">
                
                <div class="mb-3">
                    <label class="form-label fw-semibold small">School Name</label>
                    <input type="text" name="title" id="schoolTitle" class="form-control" required placeholder="e.g. Engineering & Technology">
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold small">Program Count Text</label>
                        <input type="text" name="program_count" id="schoolCount" class="form-control" required placeholder="e.g. 24 Programs">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold small">FontAwesome Icon</label>
                        <input type="text" name="icon" id="schoolIcon" class="form-control" required placeholder="e.g. fa-solid fa-microchip">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold small">Target URL / Department Page</label>
                    <input type="text" name="url" id="schoolUrl" class="form-control" required placeholder="e.g. department-of-computer-science-engineering.php">
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-md-8">
                        <label class="form-label fw-semibold small">Filter Categories (space separated: ug, pg, diploma, phd)</label>
                        <input type="text" name="categories" id="schoolCategories" class="form-control" required placeholder="e.g. ug pg phd">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-semibold small">Sort Order</label>
                        <input type="number" name="sort_order" id="schoolSort" class="form-control" value="0">
                    </div>
                </div>

            </div>
            <div class="modal-footer border-top bg-light">
                <button type="button" class="btn btn-sm btn-outline-secondary rounded-pill px-3" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-sm btn-primary rounded-pill px-4 fw-semibold">Save School</button>
            </div>
        </form>
    </div>
</div>

<script>
function openAddModal() {
    document.getElementById('modalTitle').innerText = 'Add Academic School';
    document.getElementById('schoolId').value = '';
    document.getElementById('schoolTitle').value = '';
    document.getElementById('schoolCount').value = '';
    document.getElementById('schoolIcon').value = 'fa-solid fa-graduation-cap';
    document.getElementById('schoolUrl').value = '';
    document.getElementById('schoolCategories').value = 'ug pg';
    document.getElementById('schoolSort').value = '0';
}

function openEditModal(school) {
    document.getElementById('modalTitle').innerText = 'Edit Academic School';
    document.getElementById('schoolId').value = school.id;
    document.getElementById('schoolTitle').value = school.title;
    document.getElementById('schoolCount').value = school.program_count;
    document.getElementById('schoolIcon').value = school.icon;
    document.getElementById('schoolUrl').value = school.url;
    document.getElementById('schoolCategories').value = school.categories;
    document.getElementById('schoolSort').value = school.sort_order;
    new bootstrap.Modal(document.getElementById('schoolModal')).show();
}
</script>

<?php require_once 'footer.php'; ?>
