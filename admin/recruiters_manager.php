<?php
require_once 'auth.php';

$message = '';
$error = '';

// Handle Delete
if (isset($_GET['delete_id'])) {
    $id = (int)$_GET['delete_id'];
    $stmt = $pdo->prepare("DELETE FROM recruiters WHERE id = ?");
    $stmt->execute([$id]);
    header("Location: recruiters_manager.php?msg=deleted");
    exit;
}

// Handle Add
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_recruiter'])) {
    $title = trim($_POST['title'] ?? '');
    $slug = trim($_POST['slug'] ?? '');
    $image_path = trim($_POST['image_path'] ?? '2025/06/default_logo.png');
    
    if (empty($slug)) {
        $slug = strtolower(preg_replace('/[^a-zA-Z0-9]+/', '-', $title));
        $slug = trim($slug, '-');
    }
    
    if (isset($_FILES['logo']) && $_FILES['logo']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = "../uploads/2026/recruiters/";
        if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);
        $fileName = time() . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '', $_FILES['logo']['name']);
        if (move_uploaded_file($_FILES['logo']['tmp_name'], $uploadDir . $fileName)) {
            $image_path = "2026/recruiters/" . $fileName;
        }
    }

    if (!empty($title)) {
        $stmt = $pdo->prepare("INSERT INTO recruiters (title, slug, image_path, created_at) VALUES (?, ?, ?, NOW())");
        $stmt->execute([$title, $slug, $image_path]);
        header("Location: recruiters_manager.php?msg=added");
        exit;
    }
}

// Handle Edit
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_recruiter'])) {
    $id = (int)($_POST['recruiter_id'] ?? 0);
    $title = trim($_POST['title'] ?? '');
    $slug = trim($_POST['slug'] ?? '');
    $image_path = trim($_POST['image_path'] ?? '');
    
    if (empty($slug)) {
        $slug = strtolower(preg_replace('/[^a-zA-Z0-9]+/', '-', $title));
        $slug = trim($slug, '-');
    }
    
    if (isset($_FILES['logo']) && $_FILES['logo']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = "../uploads/2026/recruiters/";
        if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);
        $fileName = time() . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '', $_FILES['logo']['name']);
        if (move_uploaded_file($_FILES['logo']['tmp_name'], $uploadDir . $fileName)) {
            $image_path = "2026/recruiters/" . $fileName;
        }
    }

    if ($id > 0 && !empty($title)) {
        if (!empty($image_path)) {
            $stmt = $pdo->prepare("UPDATE recruiters SET title = ?, slug = ?, image_path = ? WHERE id = ?");
            $stmt->execute([$title, $slug, $image_path, $id]);
        } else {
            $stmt = $pdo->prepare("UPDATE recruiters SET title = ?, slug = ? WHERE id = ?");
            $stmt->execute([$title, $slug, $id]);
        }
        header("Location: recruiters_manager.php?msg=updated");
        exit;
    }
}

// Search Filter
$searchQuery = trim($_GET['q'] ?? '');
$sql = "SELECT * FROM recruiters WHERE 1=1";
$params = [];

if (!empty($searchQuery)) {
    $sql .= " AND (title LIKE ? OR slug LIKE ?)";
    $params[] = "%{$searchQuery}%";
    $params[] = "%{$searchQuery}%";
}

$sql .= " ORDER BY id ASC";
$stmt = $pdo->prepare($sql);
$stmt->execute($params);
$recruiters = $stmt->fetchAll(PDO::FETCH_ASSOC);

$totalRecruiters = (int)$pdo->query("SELECT COUNT(*) FROM recruiters")->fetchColumn();

require_once 'header.php';
?>

<!-- Page Header Bar -->
<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4 pb-2">
    <div>
        <div class="d-flex align-items-center gap-2 mb-1">
            <span class="badge rounded-pill" style="background: rgba(88,8,19,0.08); color: var(--admin-maroon); font-size: 0.75rem; padding: 4px 10px;">
                <i class="fa-solid fa-briefcase text-gold me-1"></i> Corporate Relations &amp; Placement Cell
            </span>
            <span class="badge bg-light text-dark border rounded-pill" style="font-size: 0.7rem;">
                <?php echo $totalRecruiters; ?> Total Partners
            </span>
        </div>
        <h2 class="h3 font-serif fw-bold text-primary mb-0">Manage Partner Recruiters</h2>
        <p class="text-muted small mb-0 mt-0.5">Add, edit, upload company logos, and organize tier-1 placement partner recruiters dynamically.</p>
    </div>
    
    <div class="d-flex flex-wrap gap-2">
        <a href="../our-recruiters.php" target="_blank" class="btn btn-sm btn-outline-primary rounded-pill px-3.5 py-1.5 fw-semibold d-inline-flex align-items-center gap-1.5">
            <i class="fa-solid fa-arrow-up-right-from-square"></i> View Live Recruiter Grid
        </a>
        <button class="btn btn-sm btn-primary rounded-pill px-4 py-1.5 d-inline-flex align-items-center gap-1.5 fw-semibold" data-bs-toggle="modal" data-bs-target="#addRecruiterModal">
            <i class="fa-solid fa-plus text-gold"></i> Add New Recruiter
        </button>
    </div>
</div>

<?php if (isset($_GET['msg'])): ?>
<div class="alert alert-success alert-dismissible fade show rounded-3 shadow-xs small fw-medium mb-4" role="alert">
    <i class="fa-solid fa-circle-check text-success me-1.5"></i> Recruiter record has been <strong><?php echo htmlspecialchars($_GET['msg']); ?></strong> successfully!
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php endif; ?>

<!-- 4 Executive KPI Stat Cards -->
<div class="row g-3 mb-4">
    <div class="col-sm-6 col-xl-3">
        <div class="admin-stat-card">
            <div class="d-flex justify-content-between align-items-start mb-2">
                <div>
                    <div class="stat-value"><?php echo number_format($totalRecruiters); ?></div>
                    <p class="stat-label">Total Recruiters</p>
                </div>
                <div class="icon-circle-badge">
                    <i class="fa-solid fa-building"></i>
                </div>
            </div>
            <div class="d-flex align-items-center justify-content-between small pt-2 border-top">
                <span class="text-muted">Corporate Partners</span>
                <span class="text-primary fw-bold">100% Verified</span>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-xl-3">
        <div class="admin-stat-card maroon-border">
            <div class="d-flex justify-content-between align-items-start mb-2">
                <div>
                    <div class="stat-value">500+</div>
                    <p class="stat-label">Annual Offers</p>
                </div>
                <div class="icon-circle-badge">
                    <i class="fa-solid fa-briefcase"></i>
                </div>
            </div>
            <div class="d-flex align-items-center justify-content-between small pt-2 border-top">
                <span class="text-muted">Campus Drives</span>
                <span class="text-primary fw-bold">Tier-1 Drives</span>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-xl-3">
        <div class="admin-stat-card gold-border">
            <div class="d-flex justify-content-between align-items-start mb-2">
                <div>
                    <div class="stat-value">96%</div>
                    <p class="stat-label">Placement Rate</p>
                </div>
                <div class="icon-circle-gold">
                    <i class="fa-solid fa-chart-line"></i>
                </div>
            </div>
            <div class="d-flex align-items-center justify-content-between small pt-2 border-top">
                <span class="text-muted">UG &amp; PG Average</span>
                <span class="text-warning fw-bold" style="color: #b8860b !important;">High Success</span>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-xl-3">
        <div class="admin-stat-card dark-border">
            <div class="d-flex justify-content-between align-items-start mb-2">
                <div>
                    <div class="stat-value">32 LPA</div>
                    <p class="stat-label">Highest Package</p>
                </div>
                <div class="icon-circle-badge">
                    <i class="fa-solid fa-trophy"></i>
                </div>
            </div>
            <div class="d-flex align-items-center justify-content-between small pt-2 border-top">
                <span class="text-muted">Top Salary Tier</span>
                <span class="text-dark fw-bold">National Benchmark</span>
            </div>
        </div>
    </div>
</div>

<!-- Search & Filter Card -->
<div class="card border-0 rounded-4 shadow-sm mb-4" style="background: #ffffff;">
    <div class="card-body p-3.5">
        <form method="GET" class="row g-2 align-items-center">
            <div class="col-md-9">
                <div class="position-relative">
                    <i class="fa-solid fa-search position-absolute top-50 start-0 translate-middle-y ms-3 text-muted"></i>
                    <input type="text" name="q" class="form-control form-control-sm rounded-pill ps-5 py-2 border-custom" placeholder="Search company name or slug..." value="<?php echo htmlspecialchars($searchQuery); ?>">
                </div>
            </div>
            <div class="col-md-3 d-flex gap-2">
                <button type="submit" class="btn btn-sm btn-primary rounded-pill px-4 py-2 w-100 fw-semibold">
                    <i class="fa-solid fa-filter me-1 text-gold"></i> Search
                </button>
                <?php if ($searchQuery): ?>
                <a href="recruiters_manager.php" class="btn btn-sm btn-outline-secondary rounded-pill px-3 py-2 flex-shrink-0" title="Reset Search">
                    <i class="fa-solid fa-rotate-left"></i>
                </a>
                <?php endif; ?>
            </div>
        </form>
    </div>
</div>

<!-- Recruiters Table Card -->
<div class="card border-0 rounded-4 shadow-sm overflow-hidden" style="background: #ffffff;">
    <div class="card-header bg-white border-bottom p-3.5 d-flex justify-content-between align-items-center flex-wrap gap-2">
        <div class="d-flex align-items-center gap-2">
            <div class="icon-circle-badge" style="width: 34px; height: 34px; font-size: 0.95rem;">
                <i class="fa-solid fa-handshake"></i>
            </div>
            <div>
                <span class="font-serif fw-bold text-primary fs-6">Recruiting Companies Repository</span>
                <span class="badge rounded-pill bg-light text-primary border ms-2 small" style="font-size: 0.72rem;"><?php echo count($recruiters); ?> Companies Listed</span>
            </div>
        </div>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light small text-uppercase" style="border-bottom: 2px solid #580813; font-size: 0.74rem; letter-spacing: 0.06em; color: #580813;">
                    <tr>
                        <th class="ps-4 py-3" style="width: 110px;">Logo</th>
                        <th class="py-3">Company Name</th>
                        <th class="py-3">URL Slug &amp; Image Path</th>
                        <th class="py-3" style="width: 140px;">Registered Date</th>
                        <th class="text-end pe-4 py-3" style="width: 150px;">Actions</th>
                    </tr>
                </thead>
                <tbody class="small">
                    <?php if (empty($recruiters)): ?>
                    <tr>
                        <td colspan="5" class="text-center py-5 text-muted">
                            <div class="icon-circle-badge mx-auto mb-2" style="width: 50px; height: 50px; font-size: 1.25rem;">
                                <i class="fa-solid fa-building"></i>
                            </div>
                            <strong class="d-block font-serif text-primary fs-6">No Recruiters Found</strong>
                            <span class="small text-muted">Try clearing your search query or click "+ Add New Recruiter".</span>
                        </td>
                    </tr>
                    <?php else: ?>
                    <?php foreach ($recruiters as $r): 
                        $rawImg = $r['image_path'] ?? '';
                        if (strpos($rawImg, 'assets/') === 0) {
                            $displayLogo = '../' . $rawImg;
                        } else {
                            $displayLogo = '../uploads/' . $rawImg;
                        }
                    ?>
                    <tr>
                        <td class="ps-4">
                            <div class="p-1 rounded-3 border bg-white d-flex align-items-center justify-content-center shadow-xs" style="width: 80px; height: 50px; background: #ffffff;">
                                <img src="<?php echo htmlspecialchars($displayLogo); ?>" alt="<?php echo htmlspecialchars($r['title']); ?>" style="max-width: 100%; max-height: 100%; object-fit: contain;" onerror="this.onerror=null;this.src='../assets/images/logo.png';">
                            </div>
                        </td>
                        <td>
                            <strong class="font-serif fw-bold text-primary fs-6 d-block"><?php echo htmlspecialchars($r['title']); ?></strong>
                            <span class="small text-muted" style="font-size: 0.72rem;">ID: #<?php echo $r['id']; ?></span>
                        </td>
                        <td>
                            <span class="badge bg-light text-dark border font-monospace small px-2 py-1 mb-1 d-inline-block">
                                slug: <?php echo htmlspecialchars($r['slug'] ?? ''); ?>
                            </span>
                            <div class="small text-muted-custom" style="font-size: 0.72rem;">
                                <i class="fa-regular fa-image text-gold me-1"></i> <?php echo htmlspecialchars($r['image_path'] ?? ''); ?>
                            </div>
                        </td>
                        <td>
                            <span class="small text-muted">
                                <i class="fa-regular fa-calendar text-gold me-1"></i> 
                                <?php echo !empty($r['created_at']) ? date('M d, Y', strtotime($r['created_at'])) : 'Active Partner'; ?>
                            </span>
                        </td>
                        <td class="text-end pe-4">
                            <div class="d-flex align-items-center justify-content-end gap-1.5">
                                <button type="button" class="btn btn-xs btn-outline-primary rounded-pill px-2.5 py-1 small d-inline-flex align-items-center gap-1 btn-edit-recruiter"
                                    data-id="<?php echo $r['id']; ?>"
                                    data-title="<?php echo htmlspecialchars($r['title'], ENT_QUOTES); ?>"
                                    data-slug="<?php echo htmlspecialchars($r['slug'] ?? '', ENT_QUOTES); ?>"
                                    data-image="<?php echo htmlspecialchars($r['image_path'] ?? '', ENT_QUOTES); ?>"
                                    title="Edit Recruiter">
                                    <i class="fa-solid fa-pen"></i> Edit
                                </button>
                                <a href="recruiters_manager.php?delete_id=<?php echo $r['id']; ?>" class="btn btn-xs btn-outline-danger rounded-pill px-2 py-1 small" onclick="return confirm('Are you sure you want to permanently delete this recruiter?');" title="Delete Recruiter">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Add Recruiter Modal -->
<div class="modal fade" id="addRecruiterModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
            <form method="POST" enctype="multipart/form-data">
                <div class="modal-header border-bottom">
                    <h5 class="modal-title font-serif fw-bold text-white">
                        <i class="fa-solid fa-briefcase text-gold me-2"></i> Add Recruiter Partner
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Company Name <span class="text-danger">*</span></label>
                        <input type="text" name="title" class="form-control rounded-3" placeholder="e.g. Tata Consultancy Services (TCS)" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Company Slug (URL)</label>
                        <input type="text" name="slug" class="form-control rounded-3" placeholder="e.g. tcs-placement">
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Upload Company Logo (PNG / JPG / SVG)</label>
                        <input type="file" name="logo" class="form-control rounded-3" accept="image/*">
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Or Existing Image Path</label>
                        <input type="text" name="image_path" class="form-control rounded-3" placeholder="2025/06/Logo_Company.png">
                    </div>
                </div>
                <div class="modal-footer border-top bg-light">
                    <button type="button" class="btn btn-sm btn-outline-secondary rounded-pill px-3.5" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" name="add_recruiter" class="btn btn-sm btn-primary rounded-pill px-4 fw-semibold">
                        <i class="fa-solid fa-save me-1 text-gold"></i> Save Recruiter
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Recruiter Modal -->
<div class="modal fade" id="editRecruiterModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
            <form method="POST" enctype="multipart/form-data">
                <input type="hidden" name="recruiter_id" id="edit_recruiter_id">
                <div class="modal-header border-bottom">
                    <h5 class="modal-title font-serif fw-bold text-white">
                        <i class="fa-solid fa-pen-to-square text-gold me-2"></i> Edit Recruiter Partner
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Company Name <span class="text-danger">*</span></label>
                        <input type="text" name="title" id="edit_title" class="form-control rounded-3" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Company Slug</label>
                        <input type="text" name="slug" id="edit_slug" class="form-control rounded-3">
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Upload New Logo (Optional)</label>
                        <input type="file" name="logo" class="form-control rounded-3" accept="image/*">
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Current Image Path</label>
                        <input type="text" name="image_path" id="edit_image_path" class="form-control rounded-3">
                    </div>
                </div>
                <div class="modal-footer border-top bg-light">
                    <button type="button" class="btn btn-sm btn-outline-secondary rounded-pill px-3.5" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" name="edit_recruiter" class="btn btn-sm btn-primary rounded-pill px-4 fw-semibold">
                        <i class="fa-solid fa-check me-1 text-gold"></i> Update Recruiter
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const editModal = new bootstrap.Modal(document.getElementById('editRecruiterModal'));
    document.querySelectorAll('.btn-edit-recruiter').forEach(btn => {
        btn.addEventListener('click', function() {
            document.getElementById('edit_recruiter_id').value = this.dataset.id;
            document.getElementById('edit_title').value = this.dataset.title;
            document.getElementById('edit_slug').value = this.dataset.slug;
            document.getElementById('edit_image_path').value = this.dataset.image;
            editModal.show();
        });
    });
});
</script>

<?php require_once 'footer.php'; ?>
