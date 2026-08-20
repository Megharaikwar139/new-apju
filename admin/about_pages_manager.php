<?php
require_once 'auth.php';

$message = '';
$selected_slug = $_GET['page'] ?? 'the-chancellor';

// Handle Save
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save_about_page'])) {
    $page_slug = $_POST['page_slug'] ?? '';
    $page_title = $_POST['page_title'] ?? '';
    $hero_eyebrow = $_POST['hero_eyebrow'] ?? '';
    $hero_subtitle = $_POST['hero_subtitle'] ?? '';
    $leader_name = $_POST['leader_name'] ?? '';
    $leader_designation = $_POST['leader_designation'] ?? '';
    $badge_text = $_POST['badge_text'] ?? '';
    $quote = $_POST['quote'] ?? '';
    $main_content = $_POST['main_content'] ?? '';
    $image_path = $_POST['image_path'] ?? '';
    $doc_title_1 = $_POST['doc_title_1'] ?? '';
    $doc_file_1 = $_POST['doc_file_1'] ?? '';
    $doc_title_2 = $_POST['doc_title_2'] ?? '';
    $doc_file_2 = $_POST['doc_file_2'] ?? '';
    $doc_title_3 = $_POST['doc_title_3'] ?? '';
    $doc_file_3 = $_POST['doc_file_3'] ?? '';

    // Handle Image Upload
    if (isset($_FILES['image_file']) && $_FILES['image_file']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = '../uploads/' . date('Y/m/');
        if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);
        $fileName = time() . '_' . basename($_FILES['image_file']['name']);
        if (move_uploaded_file($_FILES['image_file']['tmp_name'], $uploadDir . $fileName)) {
            $image_path = 'uploads/' . date('Y/m/') . $fileName;
        }
    }

    // Handle Doc 1 Upload
    if (isset($_FILES['doc_upload_1']) && $_FILES['doc_upload_1']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = '../uploads/' . date('Y/m/');
        if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);
        $fileName = time() . '_doc1_' . basename($_FILES['doc_upload_1']['name']);
        if (move_uploaded_file($_FILES['doc_upload_1']['tmp_name'], $uploadDir . $fileName)) {
            $doc_file_1 = 'uploads/' . date('Y/m/') . $fileName;
        }
    }

    // Handle Doc 2 Upload
    if (isset($_FILES['doc_upload_2']) && $_FILES['doc_upload_2']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = '../uploads/' . date('Y/m/');
        if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);
        $fileName = time() . '_doc2_' . basename($_FILES['doc_upload_2']['name']);
        if (move_uploaded_file($_FILES['doc_upload_2']['tmp_name'], $uploadDir . $fileName)) {
            $doc_file_2 = 'uploads/' . date('Y/m/') . $fileName;
        }
    }

    $stmt = $pdo->prepare("
        UPDATE about_pages_config SET
        page_title = ?, hero_eyebrow = ?, hero_subtitle = ?, leader_name = ?, leader_designation = ?,
        badge_text = ?, quote = ?, main_content = ?, image_path = ?,
        doc_file_1 = ?, doc_title_1 = ?, doc_file_2 = ?, doc_title_2 = ?, doc_file_3 = ?, doc_title_3 = ?
        WHERE page_slug = ?
    ");
    $stmt->execute([
        $page_title, $hero_eyebrow, $hero_subtitle, $leader_name, $leader_designation,
        $badge_text, $quote, $main_content, $image_path,
        $doc_file_1, $doc_title_1, $doc_file_2, $doc_title_2, $doc_file_3, $doc_title_3,
        $page_slug
    ]);

    $message = "Page '{$page_title}' updated successfully!";
    $selected_slug = $page_slug;
}

// Fetch all about pages
$about_pages = $pdo->query("SELECT * FROM about_pages_config ORDER BY id ASC")->fetchAll(PDO::FETCH_ASSOC);

// Fetch current selected page
$stmt = $pdo->prepare("SELECT * FROM about_pages_config WHERE page_slug = ?");
$stmt->execute([$selected_slug]);
$current_page = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$current_page && !empty($about_pages)) {
    $current_page = $about_pages[0];
    $selected_slug = $current_page['page_slug'];
}

require_once 'header.php';
?>

<div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
    <div>
        <h3 class="font-serif fw-bold text-primary mb-1">About Section Pages Manager</h3>
        <p class="text-muted small mb-0">Manage leadership profiles, messages, quotes, statutory documents, and notifications for all About pages.</p>
    </div>
    <div class="d-flex gap-2">
        <a href="../<?php echo htmlspecialchars($selected_slug); ?>.php" target="_blank" class="btn btn-outline-primary rounded-pill btn-sm px-3">
            <i class="fa-solid fa-eye me-1"></i> View Live Page
        </a>
    </div>
</div>

<?php if ($message): ?>
<div class="alert alert-success alert-dismissible fade show rounded-3 small fw-medium" role="alert">
    <i class="fa-solid fa-check-circle me-1"></i> <?php echo $message; ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php endif; ?>

<div class="row g-4">
    <!-- Left Navigation: Choose Page -->
    <div class="col-lg-3">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white border-bottom py-3">
                <span class="fw-bold small text-uppercase text-primary" style="letter-spacing: 0.08em;">Select About Page</span>
            </div>
            <div class="list-group list-group-flush p-2">
                <?php foreach ($about_pages as $ap): 
                    $isActive = ($ap['page_slug'] === $selected_slug);
                ?>
                <a href="about_pages_manager.php?page=<?php echo urlencode($ap['page_slug']); ?>" 
                   class="list-group-item list-group-item-action border-0 rounded-2 py-2.5 px-3 mb-1 small fw-semibold <?php echo $isActive ? 'active bg-primary text-white' : 'text-dark'; ?>" 
                   style="<?php echo $isActive ? 'background-color: oklch(36% .13 25) !important;' : ''; ?>">
                    <div class="d-flex align-items-center justify-content-between">
                        <span><?php echo htmlspecialchars($ap['page_title']); ?></span>
                        <i class="fa-solid fa-chevron-right fs-6 opacity-75"></i>
                    </div>
                </a>
                <?php endforeach; ?>
                
                <div class="border-top my-2 pt-2 px-2">
                    <span class="small text-muted text-uppercase fw-bold" style="font-size: 0.68rem;">Direct DB Module Pages</span>
                    <a href="pages.php" class="d-block text-decoration-none small text-primary fw-semibold py-1">
                        <i class="fa-solid fa-star me-1 text-gold"></i> Why AKU / Static Pages
                    </a>
                    <a href="media.php" class="d-block text-decoration-none small text-primary fw-semibold py-1">
                        <i class="fa-solid fa-newspaper me-1 text-gold"></i> AKU in Media Coverage
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Right Edit Form -->
    <div class="col-lg-9">
        <?php if ($current_page): ?>
        <form method="POST" enctype="multipart/form-data" class="card shadow-sm border-0">
            <input type="hidden" name="page_slug" value="<?php echo htmlspecialchars($current_page['page_slug']); ?>">
            
            <div class="card-header bg-white border-bottom py-3 d-flex justify-content-between align-items-center">
                <span class="fw-bold text-primary font-serif fs-5">
                    Editing: <?php echo htmlspecialchars($current_page['page_title']); ?> (<code><?php echo htmlspecialchars($current_page['page_slug']); ?>.php</code>)
                </span>
                <span class="badge bg-light text-primary border">Last Updated: <?php echo date('d M Y, h:i A', strtotime($current_page['updated_at'])); ?></span>
            </div>

            <div class="card-body p-4">
                
                <!-- Section 1: Hero Banner Settings -->
                <h6 class="font-serif text-primary fw-bold mb-3 border-bottom pb-2">1. Hero Header & Subtitles</h6>
                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold small">Hero Eyebrow Label</label>
                        <input type="text" name="hero_eyebrow" class="form-control form-control-sm" value="<?php echo htmlspecialchars($current_page['hero_eyebrow'] ?? ''); ?>">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold small">Page Title (H1)</label>
                        <input type="text" name="page_title" class="form-control form-control-sm" value="<?php echo htmlspecialchars($current_page['page_title'] ?? ''); ?>" required>
                    </div>
                    <div class="col-md-12">
                        <label class="form-label fw-semibold small">Hero Subtitle / Description</label>
                        <input type="text" name="hero_subtitle" class="form-control form-control-sm" value="<?php echo htmlspecialchars($current_page['hero_subtitle'] ?? ''); ?>">
                    </div>
                </div>

                <!-- Section 2: Leadership / Person Details (if applicable) -->
                <?php if (in_array($current_page['page_slug'], ['the-founder-2', 'the-chancellor', 'pro-chancellor', 'the-vice-chancellor', 'registrar'])): ?>
                <h6 class="font-serif text-primary fw-bold mb-3 border-bottom pb-2">2. Leadership Profile & Portrait</h6>
                <div class="row g-3 mb-4">
                    <div class="col-md-5">
                        <label class="form-label fw-semibold small">Full Name</label>
                        <input type="text" name="leader_name" class="form-control form-control-sm" value="<?php echo htmlspecialchars($current_page['leader_name'] ?? ''); ?>">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-semibold small">Designation / Role</label>
                        <input type="text" name="leader_designation" class="form-control form-control-sm" value="<?php echo htmlspecialchars($current_page['leader_designation'] ?? ''); ?>">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label fw-semibold small">Badge Text / Dates</label>
                        <input type="text" name="badge_text" class="form-control form-control-sm" value="<?php echo htmlspecialchars($current_page['badge_text'] ?? ''); ?>">
                    </div>
                    <div class="col-md-7">
                        <label class="form-label fw-semibold small">Portrait Photo Path / Upload</label>
                        <input type="text" name="image_path" class="form-control form-control-sm mb-1" value="<?php echo htmlspecialchars($current_page['image_path'] ?? ''); ?>">
                        <input type="file" name="image_file" class="form-control form-control-sm" accept="image/*">
                    </div>
                    <div class="col-md-5">
                        <?php if (!empty($current_page['image_path'])): ?>
                        <div class="p-2 border rounded text-center bg-light">
                            <img src="../<?php echo htmlspecialchars($current_page['image_path']); ?>" alt="Portrait" style="max-height: 80px; width: auto; object-fit: contain;">
                            <div class="small text-muted mt-1" style="font-size: 0.7rem;">Current Photo Preview</div>
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-12">
                        <label class="form-label fw-semibold small">Highlight Quote Box</label>
                        <textarea name="quote" class="form-control form-control-sm" rows="3"><?php echo htmlspecialchars($current_page['quote'] ?? ''); ?></textarea>
                    </div>
                </div>
                <?php endif; ?>

                <!-- Section 3: Main Page Content / Narrative -->
                <h6 class="font-serif text-primary fw-bold mb-3 border-bottom pb-2">3. Main Page Narrative & Content</h6>
                <div class="mb-4">
                    <label class="form-label fw-semibold small">Main Content (HTML Supported)</label>
                    <textarea name="main_content" class="form-control font-monospace" rows="8" style="font-size: 0.85rem;"><?php echo htmlspecialchars($current_page['main_content'] ?? ''); ?></textarea>
                </div>

                <!-- Section 4: Attached PDF / Official Documents (if applicable) -->
                <?php if (in_array($current_page['page_slug'], ['governing-body', 'board-of-management', 'finance-committee', 'mandatory-disclosers', 'ugc-recognition'])): ?>
                <h6 class="font-serif text-primary fw-bold mb-3 border-bottom pb-2">4. Official Attached Documents & PDFs</h6>
                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold small">Document 1 Title</label>
                        <input type="text" name="doc_title_1" class="form-control form-control-sm" value="<?php echo htmlspecialchars($current_page['doc_title_1'] ?? ''); ?>">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold small">Document 1 File / Upload</label>
                        <input type="text" name="doc_file_1" class="form-control form-control-sm mb-1" value="<?php echo htmlspecialchars($current_page['doc_file_1'] ?? ''); ?>">
                        <input type="file" name="doc_upload_1" class="form-control form-control-sm" accept=".pdf,image/*">
                    </div>

                    <?php if (in_array($current_page['page_slug'], ['mandatory-disclosers', 'ugc-recognition'])): ?>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold small">Document 2 Title</label>
                        <input type="text" name="doc_title_2" class="form-control form-control-sm" value="<?php echo htmlspecialchars($current_page['doc_title_2'] ?? ''); ?>">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold small">Document 2 File / Upload</label>
                        <input type="text" name="doc_file_2" class="form-control form-control-sm mb-1" value="<?php echo htmlspecialchars($current_page['doc_file_2'] ?? ''); ?>">
                        <input type="file" name="doc_upload_2" class="form-control form-control-sm" accept=".pdf,image/*">
                    </div>
                    <?php endif; ?>
                </div>
                <?php endif; ?>

                <div class="text-end pt-3 border-top">
                    <button type="submit" name="save_about_page" class="btn btn-primary rounded-pill px-4" style="background-color: oklch(36% .13 25); border: none;">
                        <i class="fa-solid fa-floppy-disk me-1.5"></i> Save Changes Live
                    </button>
                </div>

            </div>
        </form>
        <?php endif; ?>
    </div>
</div>

<?php require_once 'footer.php'; ?>
