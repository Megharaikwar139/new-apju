<?php
require_once 'auth.php';

$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $eyebrow = $_POST['eyebrow'] ?? 'About the University';
    $title = $_POST['title'] ?? '';
    $est_badge = $_POST['est_badge'] ?? 'Est. 2016';
    $location_text = $_POST['location_text'] ?? 'Indore, Madhya Pradesh';
    $paragraph1 = $_POST['paragraph1'] ?? '';
    $paragraph2 = $_POST['paragraph2'] ?? '';
    $image_path = $_POST['image_path'] ?? 'assets/lovable/apj4.webp';
    $p1_title = $_POST['pillar1_title'] ?? '';
    $p1_desc = $_POST['pillar1_desc'] ?? '';
    $p1_icon = $_POST['pillar1_icon'] ?? 'fa-solid fa-bullseye';
    $p2_title = $_POST['pillar2_title'] ?? '';
    $p2_desc = $_POST['pillar2_desc'] ?? '';
    $p2_icon = $_POST['pillar2_icon'] ?? 'fa-solid fa-heart';
    $p3_title = $_POST['pillar3_title'] ?? '';
    $p3_desc = $_POST['pillar3_desc'] ?? '';
    $p3_icon = $_POST['pillar3_icon'] ?? 'fa-solid fa-lightbulb';

    // Handle image upload
    if (isset($_FILES['about_file']) && $_FILES['about_file']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = '../uploads/';
        if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);
        $fileName = time() . '_' . basename($_FILES['about_file']['name']);
        if (move_uploaded_file($_FILES['about_file']['tmp_name'], $uploadDir . $fileName)) {
            $image_path = 'uploads/' . $fileName;
        }
    }

    $stmt = $pdo->prepare("UPDATE homepage_about SET 
        eyebrow = ?, title = ?, image_path = ?, est_badge = ?, location_text = ?,
        paragraph1 = ?, paragraph2 = ?,
        pillar1_title = ?, pillar1_desc = ?, pillar1_icon = ?,
        pillar2_title = ?, pillar2_desc = ?, pillar2_icon = ?,
        pillar3_title = ?, pillar3_desc = ?, pillar3_icon = ?
        WHERE id = 1");
    $stmt->execute([
        $eyebrow, $title, $image_path, $est_badge, $location_text,
        $paragraph1, $paragraph2,
        $p1_title, $p1_desc, $p1_icon,
        $p2_title, $p2_desc, $p2_icon,
        $p3_title, $p3_desc, $p3_icon
    ]);
    $message = 'About section successfully updated!';
}

$about = $pdo->query("SELECT * FROM homepage_about WHERE id = 1")->fetch();
require_once 'header.php';
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h3 class="font-serif fw-bold text-primary mb-1">About University & 3 Pillars</h3>
        <p class="text-muted small mb-0">Manage the Kalam conviction intro, entrance photo, and the 3 core pillars (Research-Led, Values-First, Industry-Ready).</p>
    </div>
    <a href="../index.php#about" target="_blank" class="btn btn-outline-primary rounded-pill btn-sm px-3">
        <i class="fa-solid fa-eye me-1"></i> View Live
    </a>
</div>

<?php if ($message): ?>
<div class="alert alert-success alert-dismissible fade show rounded-3 small fw-medium" role="alert">
    <i class="fa-solid fa-check-circle me-1"></i> <?php echo $message; ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php endif; ?>

<form method="POST" enctype="multipart/form-data" class="card shadow-sm border-0">
    <div class="card-body p-4">
        
        <h5 class="font-serif text-primary fw-bold mb-3 border-bottom pb-2">1. Section Titles & Photo</h5>
        <div class="row g-3 mb-4">
            <div class="col-md-6">
                <label class="form-label fw-semibold small">Eyebrow Label</label>
                <input type="text" name="eyebrow" class="form-control" value="<?php echo htmlspecialchars($about['eyebrow'] ?? 'About the University'); ?>">
            </div>
            <div class="col-md-6">
                <label class="form-label fw-semibold small">Establishment Badge</label>
                <input type="text" name="est_badge" class="form-control" value="<?php echo htmlspecialchars($about['est_badge'] ?? 'Est. 2016'); ?>">
            </div>
            <div class="col-md-12">
                <label class="form-label fw-semibold small">Main Title</label>
                <input type="text" name="title" class="form-control" value="<?php echo htmlspecialchars($about['title'] ?? ''); ?>" required>
            </div>
            <div class="col-md-6">
                <label class="form-label fw-semibold small">Campus Image URL / Upload</label>
                <input type="text" name="image_path" class="form-control mb-2" value="<?php echo htmlspecialchars($about['image_path'] ?? ''); ?>">
                <input type="file" name="about_file" class="form-control form-control-sm" accept="image/*">
            </div>
            <div class="col-md-6">
                <label class="form-label fw-semibold small">Location Text</label>
                <input type="text" name="location_text" class="form-control" value="<?php echo htmlspecialchars($about['location_text'] ?? 'Indore, Madhya Pradesh'); ?>">
            </div>
        </div>

        <h5 class="font-serif text-primary fw-bold mb-3 border-bottom pb-2">2. Narrative Paragraphs</h5>
        <div class="row g-3 mb-4">
            <div class="col-md-12">
                <label class="form-label fw-semibold small">Paragraph 1 (HTML allowed)</label>
                <textarea name="paragraph1" class="form-control" rows="3"><?php echo htmlspecialchars($about['paragraph1'] ?? ''); ?></textarea>
            </div>
            <div class="col-md-12">
                <label class="form-label fw-semibold small">Paragraph 2</label>
                <textarea name="paragraph2" class="form-control" rows="3"><?php echo htmlspecialchars($about['paragraph2'] ?? ''); ?></textarea>
            </div>
        </div>

        <h5 class="font-serif text-primary fw-bold mb-3 border-bottom pb-2">3. Three Feature Pillars</h5>
        <div class="row g-3 mb-4">
            <div class="col-md-4">
                <div class="p-3 border rounded-3 bg-light">
                    <label class="form-label fw-semibold small">Pillar 1 Title</label>
                    <input type="text" name="pillar1_title" class="form-control mb-2" value="<?php echo htmlspecialchars($about['pillar1_title'] ?? ''); ?>">
                    <label class="form-label text-muted small">Pillar 1 Description</label>
                    <input type="text" name="pillar1_desc" class="form-control mb-2" value="<?php echo htmlspecialchars($about['pillar1_desc'] ?? ''); ?>">
                    <label class="form-label text-muted small">Icon (FontAwesome)</label>
                    <input type="text" name="pillar1_icon" class="form-control form-control-sm" value="<?php echo htmlspecialchars($about['pillar1_icon'] ?? 'fa-solid fa-bullseye'); ?>">
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-3 border rounded-3 bg-light">
                    <label class="form-label fw-semibold small">Pillar 2 Title</label>
                    <input type="text" name="pillar2_title" class="form-control mb-2" value="<?php echo htmlspecialchars($about['pillar2_title'] ?? ''); ?>">
                    <label class="form-label text-muted small">Pillar 2 Description</label>
                    <input type="text" name="pillar2_desc" class="form-control mb-2" value="<?php echo htmlspecialchars($about['pillar2_desc'] ?? ''); ?>">
                    <label class="form-label text-muted small">Icon (FontAwesome)</label>
                    <input type="text" name="pillar2_icon" class="form-control form-control-sm" value="<?php echo htmlspecialchars($about['pillar2_icon'] ?? 'fa-solid fa-heart'); ?>">
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-3 border rounded-3 bg-light">
                    <label class="form-label fw-semibold small">Pillar 3 Title</label>
                    <input type="text" name="pillar3_title" class="form-control mb-2" value="<?php echo htmlspecialchars($about['pillar3_title'] ?? ''); ?>">
                    <label class="form-label text-muted small">Pillar 3 Description</label>
                    <input type="text" name="pillar3_desc" class="form-control mb-2" value="<?php echo htmlspecialchars($about['pillar3_desc'] ?? ''); ?>">
                    <label class="form-label text-muted small">Icon (FontAwesome)</label>
                    <input type="text" name="pillar3_icon" class="form-control form-control-sm" value="<?php echo htmlspecialchars($about['pillar3_icon'] ?? 'fa-solid fa-lightbulb'); ?>">
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary rounded-pill px-5 py-2 fw-semibold">
            <i class="fa-solid fa-save me-1"></i> Save About Changes
        </button>

    </div>
</form>

<?php require_once 'footer.php'; ?>
