<?php
require_once 'auth.php';

$message = '';
$error = '';

// Handle Delete
if (isset($_GET['delete_id'])) {
    $id = (int)$_GET['delete_id'];
    $stmt = $pdo->prepare("DELETE FROM photo_gallery WHERE id = ?");
    $stmt->execute([$id]);
    header("Location: gallery_manager.php?msg=deleted");
    exit;
}

// Handle Add
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_album'])) {
    $title = trim($_POST['title'] ?? '');
    $category = trim($_POST['category'] ?? 'campus');
    $description = trim($_POST['description'] ?? '');
    $slug = trim($_POST['slug'] ?? '');
    $image_path = trim($_POST['image_path'] ?? '');
    
    if (empty($slug)) {
        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $title)));
    }
    
    if (isset($_FILES['cover_image']) && $_FILES['cover_image']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = "../uploads/2026/gallery/";
        if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);
        $fileName = time() . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '', $_FILES['cover_image']['name']);
        if (move_uploaded_file($_FILES['cover_image']['tmp_name'], $uploadDir . $fileName)) {
            $image_path = "2026/gallery/" . $fileName;
        }
    }

    if (empty($image_path)) {
        $image_path = '2025/06/campus.jpg';
    }

    if (!empty($title)) {
        $stmt = $pdo->prepare("INSERT INTO photo_gallery (title, slug, category, image_path, description, created_at) VALUES (?, ?, ?, ?, ?, NOW())");
        $stmt->execute([$title, $slug, $category, $image_path, $description]);
        header("Location: gallery_manager.php?msg=added");
        exit;
    }
}

// Handle Edit
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_album'])) {
    $id = (int)($_POST['album_id'] ?? 0);
    $title = trim($_POST['title'] ?? '');
    $category = trim($_POST['category'] ?? 'campus');
    $description = trim($_POST['description'] ?? '');
    $slug = trim($_POST['slug'] ?? '');
    $image_path = trim($_POST['image_path'] ?? '');
    
    if (empty($slug)) {
        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $title)));
    }
    
    if (isset($_FILES['cover_image']) && $_FILES['cover_image']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = "../uploads/2026/gallery/";
        if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);
        $fileName = time() . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '', $_FILES['cover_image']['name']);
        if (move_uploaded_file($_FILES['cover_image']['tmp_name'], $uploadDir . $fileName)) {
            $image_path = "2026/gallery/" . $fileName;
        }
    }

    if ($id > 0 && !empty($title)) {
        if (!empty($image_path)) {
            $stmt = $pdo->prepare("UPDATE photo_gallery SET title = ?, slug = ?, category = ?, description = ?, image_path = ? WHERE id = ?");
            $stmt->execute([$title, $slug, $category, $description, $image_path, $id]);
        } else {
            $stmt = $pdo->prepare("UPDATE photo_gallery SET title = ?, slug = ?, category = ?, description = ? WHERE id = ?");
            $stmt->execute([$title, $slug, $category, $description, $id]);
        }
        header("Location: gallery_manager.php?msg=updated");
        exit;
    }
}

// Search & Filter
$filter_cat = trim($_GET['category'] ?? '');
$searchQuery = trim($_GET['q'] ?? '');

$sql = "SELECT * FROM photo_gallery WHERE 1=1";
$params = [];

if (!empty($filter_cat)) {
    $sql .= " AND category = ?";
    $params[] = $filter_cat;
}

if (!empty($searchQuery)) {
    $sql .= " AND (title LIKE ? OR slug LIKE ? OR description LIKE ?)";
    $params[] = "%{$searchQuery}%";
    $params[] = "%{$searchQuery}%";
    $params[] = "%{$searchQuery}%";
}

$sql .= " ORDER BY id DESC";
$stmt = $pdo->prepare($sql);
$stmt->execute($params);
$albums = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Counts for KPI Stats
$totalPhotos = (int)$pdo->query("SELECT COUNT(*) FROM photo_gallery")->fetchColumn();
$dikshantCount = (int)$pdo->query("SELECT COUNT(*) FROM photo_gallery WHERE category = 'dikshant-samaroh'")->fetchColumn();
$annualCount = (int)$pdo->query("SELECT COUNT(*) FROM photo_gallery WHERE category = 'annual-function'")->fetchColumn();
$campusSportsCount = (int)$pdo->query("SELECT COUNT(*) FROM photo_gallery WHERE category IN ('campus', 'sports', 'agriculture-lab', 'extra')")->fetchColumn();

require_once 'header.php';
?>

<!-- Page Header Bar -->
<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4 pb-2">
    <div>
        <div class="d-flex align-items-center gap-2 mb-1">
            <span class="badge rounded-pill" style="background: rgba(88,8,19,0.08); color: var(--admin-maroon); font-size: 0.75rem; padding: 4px 10px;">
                <i class="fa-solid fa-camera-retro text-gold me-1"></i> Media &amp; Visual Archives
            </span>
            <span class="badge bg-light text-dark border rounded-pill" style="font-size: 0.7rem;">
                <?php echo $totalPhotos; ?> Photos in Gallery
            </span>
        </div>
        <h2 class="h3 font-serif fw-bold text-primary mb-0">Manage Photo Gallery &amp; Albums</h2>
        <p class="text-muted small mb-0 mt-0.5">Upload event photography, campus milestones, convocations, and lab galleries dynamically.</p>
    </div>
    
    <div class="d-flex flex-wrap gap-2">
        <a href="../gallery.php" target="_blank" class="btn btn-sm btn-outline-primary rounded-pill px-3.5 py-1.5 fw-semibold d-inline-flex align-items-center gap-1.5">
            <i class="fa-solid fa-arrow-up-right-from-square"></i> View Live Gallery
        </a>
        <button class="btn btn-sm btn-primary rounded-pill px-4 py-1.5 d-inline-flex align-items-center gap-1.5 fw-semibold" data-bs-toggle="modal" data-bs-target="#addAlbumModal">
            <i class="fa-solid fa-plus text-gold"></i> + Create New Album / Photo
        </button>
    </div>
</div>

<?php if (isset($_GET['msg'])): ?>
<div class="alert alert-success alert-dismissible fade show rounded-3 shadow-xs small fw-medium mb-4" role="alert">
    <i class="fa-solid fa-circle-check text-success me-1.5"></i> Gallery item has been <strong><?php echo htmlspecialchars($_GET['msg']); ?></strong> successfully!
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php endif; ?>

<!-- 4 Executive KPI Stat Cards -->
<div class="row g-3 mb-4">
    <div class="col-sm-6 col-xl-3">
        <div class="admin-stat-card">
            <div class="d-flex justify-content-between align-items-start mb-2">
                <div>
                    <div class="stat-value"><?php echo number_format($totalPhotos); ?></div>
                    <p class="stat-label">Total Gallery Photos</p>
                </div>
                <div class="icon-circle-badge">
                    <i class="fa-solid fa-images"></i>
                </div>
            </div>
            <div class="d-flex align-items-center justify-content-between small pt-2 border-top">
                <span class="text-muted">Live Media Records</span>
                <span class="text-primary fw-bold">100% Published</span>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-xl-3">
        <div class="admin-stat-card maroon-border">
            <div class="d-flex justify-content-between align-items-start mb-2">
                <div>
                    <div class="stat-value"><?php echo number_format($dikshantCount); ?></div>
                    <p class="stat-label">Dikshant Samaroh</p>
                </div>
                <div class="icon-circle-badge">
                    <i class="fa-solid fa-graduation-cap"></i>
                </div>
            </div>
            <div class="d-flex align-items-center justify-content-between small pt-2 border-top">
                <span class="text-muted">Convocations &amp; Degrees</span>
                <span class="text-primary fw-bold">Formal Events</span>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-xl-3">
        <div class="admin-stat-card gold-border">
            <div class="d-flex justify-content-between align-items-start mb-2">
                <div>
                    <div class="stat-value"><?php echo number_format($annualCount); ?></div>
                    <p class="stat-label">Annual Functions</p>
                </div>
                <div class="icon-circle-gold">
                    <i class="fa-solid fa-masks-theater"></i>
                </div>
            </div>
            <div class="d-flex align-items-center justify-content-between small pt-2 border-top">
                <span class="text-muted">Cultural Fests &amp; Aarohan</span>
                <span class="text-warning fw-bold" style="color: #b8860b !important;">Campus Fests</span>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-xl-3">
        <div class="admin-stat-card dark-border">
            <div class="d-flex justify-content-between align-items-start mb-2">
                <div>
                    <div class="stat-value"><?php echo number_format($campusSportsCount); ?></div>
                    <p class="stat-label">Campus &amp; Sports</p>
                </div>
                <div class="icon-circle-badge">
                    <i class="fa-solid fa-futbol"></i>
                </div>
            </div>
            <div class="d-flex align-items-center justify-content-between small pt-2 border-top">
                <span class="text-muted">Labs &amp; Sports Meets</span>
                <span class="text-dark fw-bold">Student Life</span>
            </div>
        </div>
    </div>
</div>

<!-- Search & Filter Card -->
<div class="card border-0 rounded-4 shadow-sm mb-4" style="background: #ffffff;">
    <div class="card-body p-3.5">
        <form method="GET" class="row g-2 align-items-center">
            <div class="col-md-3">
                <select name="category" class="form-select form-select-sm rounded-pill px-3 py-2 border-custom" onchange="this.form.submit()">
                    <option value="">-- All Categories (<?php echo $totalPhotos; ?>) --</option>
                    <option value="dikshant-samaroh" <?php echo ($filter_cat === 'dikshant-samaroh') ? 'selected' : ''; ?>>Dikshant Samaroh</option>
                    <option value="annual-function" <?php echo ($filter_cat === 'annual-function') ? 'selected' : ''; ?>>Annual Function</option>
                    <option value="agriculture-lab" <?php echo ($filter_cat === 'agriculture-lab') ? 'selected' : ''; ?>>Agriculture Lab</option>
                    <option value="sports" <?php echo ($filter_cat === 'sports') ? 'selected' : ''; ?>>Sports</option>
                    <option value="campus" <?php echo ($filter_cat === 'campus') ? 'selected' : ''; ?>>Campus Life</option>
                    <option value="extra" <?php echo ($filter_cat === 'extra') ? 'selected' : ''; ?>>Celebrations &amp; Extra</option>
                </select>
            </div>
            <div class="col-md-6">
                <div class="position-relative">
                    <i class="fa-solid fa-search position-absolute top-50 start-0 translate-middle-y ms-3 text-muted"></i>
                    <input type="text" name="q" class="form-control form-control-sm rounded-pill ps-5 py-2 border-custom" placeholder="Search by photo title, slug, or keywords..." value="<?php echo htmlspecialchars($searchQuery); ?>">
                </div>
            </div>
            <div class="col-md-3 d-flex gap-2">
                <button type="submit" class="btn btn-sm btn-primary rounded-pill px-4 py-2 w-100 fw-semibold">
                    <i class="fa-solid fa-filter me-1 text-gold"></i> Filter
                </button>
                <?php if ($filter_cat || $searchQuery): ?>
                <a href="gallery_manager.php" class="btn btn-sm btn-outline-secondary rounded-pill px-3 py-2 flex-shrink-0" title="Reset Filters">
                    <i class="fa-solid fa-rotate-left"></i>
                </a>
                <?php endif; ?>
            </div>
        </form>
    </div>
</div>

<!-- Gallery Table Card -->
<div class="card border-0 rounded-4 shadow-sm overflow-hidden" style="background: #ffffff;">
    <div class="card-header bg-white border-bottom p-3.5 d-flex justify-content-between align-items-center flex-wrap gap-2">
        <div class="d-flex align-items-center gap-2">
            <div class="icon-circle-badge" style="width: 34px; height: 34px; font-size: 0.95rem;">
                <i class="fa-solid fa-photo-film"></i>
            </div>
            <div>
                <span class="font-serif fw-bold text-primary fs-6">Campus Photo Gallery Archive</span>
                <span class="badge rounded-pill bg-light text-primary border ms-2 small" style="font-size: 0.72rem;"><?php echo count($albums); ?> Photos Displayed</span>
            </div>
        </div>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light small text-uppercase" style="border-bottom: 2px solid #580813; font-size: 0.74rem; letter-spacing: 0.06em; color: #580813;">
                    <tr>
                        <th class="ps-4 py-3" style="width: 120px;">Cover</th>
                        <th class="py-3">Album Title</th>
                        <th class="py-3">Category</th>
                        <th class="py-3">Slug &amp; File Path</th>
                        <th class="py-3" style="width: 140px;">Created Date</th>
                        <th class="text-end pe-4 py-3" style="width: 140px;">Actions</th>
                    </tr>
                </thead>
                <tbody class="small">
                    <?php if (empty($albums)): ?>
                    <tr>
                        <td colspan="6" class="text-center py-5 text-muted">
                            <div class="icon-circle-badge mx-auto mb-2" style="width: 50px; height: 50px; font-size: 1.25rem;">
                                <i class="fa-solid fa-images"></i>
                            </div>
                            <strong class="d-block font-serif text-primary fs-6">No Gallery Photos Found</strong>
                            <span class="small text-muted">Try resetting your search query or upload a new photo.</span>
                        </td>
                    </tr>
                    <?php else: ?>
                    <?php foreach ($albums as $a): 
                        $rawImg = $a['image_path'] ?? '';
                        if (empty($rawImg)) {
                            $displayCover = '../assets/lovable/APJ1.jpg';
                        } elseif (strpos($rawImg, 'assets/') === 0) {
                            $displayCover = '../' . $rawImg;
                        } elseif (strpos($rawImg, 'uploads/') === 0) {
                            $displayCover = '../' . $rawImg;
                        } else {
                            $displayCover = '../uploads/' . $rawImg;
                        }

                        $cat = $a['category'] ?? 'campus';
                        $catBadge = 'badge bg-light text-primary border';
                        if ($cat === 'dikshant-samaroh') $catBadge = 'badge text-white" style="background: #580813;';
                        elseif ($cat === 'annual-function') $catBadge = 'badge text-dark" style="background: #fcd34d;';
                        elseif ($cat === 'sports') $catBadge = 'badge text-white" style="background: #0284c7;';
                        elseif ($cat === 'agriculture-lab') $catBadge = 'badge text-white" style="background: #16a34a;';
                    ?>
                    <tr>
                        <td class="ps-4">
                            <div class="rounded-3 border overflow-hidden shadow-xs position-relative" style="width: 90px; height: 60px; background: #f8fafc;">
                                <img src="<?php echo htmlspecialchars($displayCover); ?>" alt="<?php echo htmlspecialchars($a['title']); ?>" class="w-100 h-100 object-fit-cover" onerror="this.onerror=null;this.src='../assets/lovable/APJ1.jpg';">
                            </div>
                        </td>
                        <td>
                            <strong class="font-serif fw-bold text-primary fs-6 d-block"><?php echo htmlspecialchars($a['title']); ?></strong>
                            <span class="small text-muted" style="font-size: 0.72rem;">ID: #<?php echo $a['id']; ?></span>
                        </td>
                        <td>
                            <span class="<?php echo $catBadge; ?> rounded-pill px-2.5 py-1 fw-semibold small" style="font-size: 0.72rem;">
                                <?php echo htmlspecialchars(ucwords(str_replace('-', ' ', $cat))); ?>
                            </span>
                        </td>
                        <td>
                            <span class="badge bg-light text-dark border font-monospace small px-2 py-0.5 mb-1 d-inline-block">
                                slug: <?php echo htmlspecialchars($a['slug']); ?>
                            </span>
                            <div class="small text-muted" style="font-size: 0.72rem;">
                                <i class="fa-regular fa-image text-gold me-1"></i> <?php echo htmlspecialchars($a['image_path'] ?? ''); ?>
                            </div>
                        </td>
                        <td>
                            <span class="small text-muted">
                                <i class="fa-regular fa-calendar text-gold me-1"></i>
                                <?php echo !empty($a['created_at']) ? date('M d, Y', strtotime($a['created_at'])) : 'Active Photo'; ?>
                            </span>
                        </td>
                        <td class="text-end pe-4">
                            <div class="d-flex align-items-center justify-content-end gap-1.5">
                                <button type="button" class="btn btn-xs btn-outline-primary rounded-pill px-2.5 py-1 small d-inline-flex align-items-center gap-1 btn-edit-album"
                                    data-id="<?php echo $a['id']; ?>"
                                    data-title="<?php echo htmlspecialchars($a['title'], ENT_QUOTES); ?>"
                                    data-slug="<?php echo htmlspecialchars($a['slug'] ?? '', ENT_QUOTES); ?>"
                                    data-category="<?php echo htmlspecialchars($a['category'] ?? 'campus', ENT_QUOTES); ?>"
                                    data-image="<?php echo htmlspecialchars($a['image_path'] ?? '', ENT_QUOTES); ?>"
                                    data-desc="<?php echo htmlspecialchars($a['description'] ?? '', ENT_QUOTES); ?>"
                                    title="Edit Photo">
                                    <i class="fa-solid fa-pen"></i> Edit
                                </button>
                                <a href="gallery_manager.php?delete_id=<?php echo $a['id']; ?>" class="btn btn-xs btn-outline-danger rounded-pill px-2 py-1 small" onclick="return confirm('Are you sure you want to delete this photo from the gallery?');" title="Delete Photo">
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

<!-- Add Modal -->
<div class="modal fade" id="addAlbumModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
      <form method="POST" enctype="multipart/form-data">
          <div class="modal-header border-bottom">
            <h5 class="modal-title font-serif fw-bold text-white">
                <i class="fa-solid fa-images text-gold me-2"></i> Create New Album / Upload Photo
            </h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body p-4">
            <div class="mb-3">
                <label class="form-label small fw-bold">Photo / Album Title <span class="text-danger">*</span></label>
                <input type="text" name="title" class="form-control rounded-3" placeholder="e.g. Welcome Ganesha 2026" required>
            </div>
            <div class="mb-3">
                <label class="form-label small fw-bold">URL Slug</label>
                <input type="text" name="slug" class="form-control rounded-3" placeholder="e.g. welcome-ganesha-2026">
            </div>
            <div class="mb-3">
                <label class="form-label small fw-bold">Category <span class="text-danger">*</span></label>
                <select name="category" class="form-select rounded-3" required>
                    <option value="dikshant-samaroh">Dikshant Samaroh (Convocation)</option>
                    <option value="annual-function">Annual Function (Cultural &amp; Fests)</option>
                    <option value="agriculture-lab">Agriculture &amp; Research Labs</option>
                    <option value="sports">Sports &amp; Athletics</option>
                    <option value="campus" selected>Campus Life &amp; Infrastructure</option>
                    <option value="extra">Celebrations &amp; Extra Events</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label small fw-bold">Upload Photo File (JPG / PNG / WebP)</label>
                <input type="file" name="cover_image" class="form-control rounded-3" accept="image/*">
            </div>
            <div class="mb-3">
                <label class="form-label small fw-bold">Or Existing Image Path</label>
                <input type="text" name="image_path" class="form-control rounded-3" placeholder="2025/08/sample.jpeg">
            </div>
            <div class="mb-3">
                <label class="form-label small fw-bold">Description / Caption (Optional)</label>
                <textarea name="description" class="form-control rounded-3" rows="3" placeholder="Event details, dignitaries present, venue highlights..."></textarea>
            </div>
          </div>
          <div class="modal-footer border-top bg-light">
            <button type="button" class="btn btn-sm btn-outline-secondary rounded-pill px-3.5" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" name="add_album" class="btn btn-sm btn-primary rounded-pill px-4 fw-semibold">
                <i class="fa-solid fa-save me-1 text-gold"></i> Save to Gallery
            </button>
          </div>
      </form>
    </div>
  </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editAlbumModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
      <form method="POST" enctype="multipart/form-data">
          <input type="hidden" name="album_id" id="edit_album_id">
          <div class="modal-header border-bottom">
            <h5 class="modal-title font-serif fw-bold text-white">
                <i class="fa-solid fa-pen-to-square text-gold me-2"></i> Edit Photo / Album
            </h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body p-4">
            <div class="mb-3">
                <label class="form-label small fw-bold">Photo / Album Title <span class="text-danger">*</span></label>
                <input type="text" name="title" id="edit_title" class="form-control rounded-3" required>
            </div>
            <div class="mb-3">
                <label class="form-label small fw-bold">URL Slug</label>
                <input type="text" name="slug" id="edit_slug" class="form-control rounded-3">
            </div>
            <div class="mb-3">
                <label class="form-label small fw-bold">Category <span class="text-danger">*</span></label>
                <select name="category" id="edit_category" class="form-select rounded-3" required>
                    <option value="dikshant-samaroh">Dikshant Samaroh (Convocation)</option>
                    <option value="annual-function">Annual Function (Cultural &amp; Fests)</option>
                    <option value="agriculture-lab">Agriculture &amp; Research Labs</option>
                    <option value="sports">Sports &amp; Athletics</option>
                    <option value="campus">Campus Life &amp; Infrastructure</option>
                    <option value="extra">Celebrations &amp; Extra Events</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label small fw-bold">Upload New Photo (Optional)</label>
                <input type="file" name="cover_image" class="form-control rounded-3" accept="image/*">
            </div>
            <div class="mb-3">
                <label class="form-label small fw-bold">Current Image Path</label>
                <input type="text" name="image_path" id="edit_image_path" class="form-control rounded-3">
            </div>
            <div class="mb-3">
                <label class="form-label small fw-bold">Description / Caption</label>
                <textarea name="description" id="edit_description" class="form-control rounded-3" rows="3"></textarea>
            </div>
          </div>
          <div class="modal-footer border-top bg-light">
            <button type="button" class="btn btn-sm btn-outline-secondary rounded-pill px-3.5" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" name="edit_album" class="btn btn-sm btn-primary rounded-pill px-4 fw-semibold">
                <i class="fa-solid fa-check me-1 text-gold"></i> Update Gallery Item
            </button>
          </div>
      </form>
    </div>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const editModal = new bootstrap.Modal(document.getElementById('editAlbumModal'));
    document.querySelectorAll('.btn-edit-album').forEach(btn => {
        btn.addEventListener('click', function() {
            document.getElementById('edit_album_id').value = this.dataset.id;
            document.getElementById('edit_title').value = this.dataset.title;
            document.getElementById('edit_slug').value = this.dataset.slug;
            document.getElementById('edit_category').value = this.dataset.category;
            document.getElementById('edit_image_path').value = this.dataset.image;
            document.getElementById('edit_description').value = this.dataset.desc;
            editModal.show();
        });
    });
});
</script>

<?php require_once 'footer.php'; ?>
