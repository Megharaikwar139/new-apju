<?php
require_once 'auth.php';

$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $headline = $_POST['headline'] ?? '';
    $subheadline = $_POST['subheadline'] ?? '';
    $video_url = $_POST['video_url'] ?? '';
    $poster_image = $_POST['poster_image'] ?? '';
    $badge1 = $_POST['badge1'] ?? '';
    $badge2 = $_POST['badge2'] ?? '';
    $badge3 = $_POST['badge3'] ?? '';
    $stat1_val = $_POST['stat1_value'] ?? '';
    $stat1_lbl = $_POST['stat1_label'] ?? '';
    $stat2_val = $_POST['stat2_value'] ?? '';
    $stat2_lbl = $_POST['stat2_label'] ?? '';
    $stat3_val = $_POST['stat3_value'] ?? '';
    $stat3_lbl = $_POST['stat3_label'] ?? '';
    $stat4_val = $_POST['stat4_value'] ?? '';
    $stat4_lbl = $_POST['stat4_label'] ?? '';
    $btn1_text = $_POST['btn1_text'] ?? '';
    $btn1_url = $_POST['btn1_url'] ?? '';
    $btn2_text = $_POST['btn2_text'] ?? '';
    $btn2_url = $_POST['btn2_url'] ?? '';

    // Handle poster image upload if provided
    if (isset($_FILES['poster_file']) && $_FILES['poster_file']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = '../uploads/';
        if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);
        $fileName = time() . '_' . basename($_FILES['poster_file']['name']);
        if (move_uploaded_file($_FILES['poster_file']['tmp_name'], $uploadDir . $fileName)) {
            $poster_image = 'uploads/' . $fileName;
        }
    }

    $stmt = $pdo->prepare("UPDATE homepage_hero SET 
        headline = ?, subheadline = ?, video_url = ?, poster_image = ?,
        badge1 = ?, badge2 = ?, badge3 = ?,
        stat1_value = ?, stat1_label = ?,
        stat2_value = ?, stat2_label = ?,
        stat3_value = ?, stat3_label = ?,
        stat4_value = ?, stat4_label = ?,
        btn1_text = ?, btn1_url = ?,
        btn2_text = ?, btn2_url = ?
        WHERE id = 1");
    $stmt->execute([
        $headline, $subheadline, $video_url, $poster_image,
        $badge1, $badge2, $badge3,
        $stat1_val, $stat1_lbl,
        $stat2_val, $stat2_lbl,
        $stat3_val, $stat3_lbl,
        $stat4_val, $stat4_lbl,
        $btn1_text, $btn1_url,
        $btn2_text, $btn2_url
    ]);
    $message = 'Hero section successfully updated!';
}

$hero = $pdo->query("SELECT * FROM homepage_hero WHERE id = 1")->fetch();
require_once 'header.php';
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h3 class="font-serif fw-bold text-primary mb-1">Hero Section & Video Background</h3>
        <p class="text-muted small mb-0">Configure the main headline, background video, accreditation badges, and 4 glance counters.</p>
    </div>
    <a href="../index.php" target="_blank" class="btn btn-outline-primary rounded-pill btn-sm px-3">
        <i class="fa-solid fa-eye me-1"></i> View Live Hero
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
        
        <h5 class="font-serif text-primary fw-bold mb-3 border-bottom pb-2">1. Headline & Background Video</h5>
        <div class="row g-3 mb-4">
            <div class="col-md-12">
                <label class="form-label fw-semibold small">Hero Headline (HTML allowed, e.g. &lt;em class="text-gold fst-italic"&gt;extraordinary&lt;/em&gt;)</label>
                <input type="text" name="headline" class="form-control" value="<?php echo htmlspecialchars($hero['headline'] ?? ''); ?>" required>
            </div>
            <div class="col-md-12">
                <label class="form-label fw-semibold small">Subheadline Description</label>
                <textarea name="subheadline" class="form-control" rows="3" required><?php echo htmlspecialchars($hero['subheadline'] ?? ''); ?></textarea>
            </div>
            <div class="col-md-6">
                <label class="form-label fw-semibold small">Video URL / Local Path</label>
                <input type="text" name="video_url" class="form-control" value="<?php echo htmlspecialchars($hero['video_url'] ?? ''); ?>">
                <small class="text-muted">Default: <code>assets/lovable/campus-hero.mp4</code></small>
            </div>
            <div class="col-md-6">
                <label class="form-label fw-semibold small">Poster Image URL / Upload</label>
                <input type="text" name="poster_image" class="form-control mb-2" value="<?php echo htmlspecialchars($hero['poster_image'] ?? ''); ?>">
                <input type="file" name="poster_file" class="form-control form-control-sm" accept="image/*">
            </div>
        </div>

        <h5 class="font-serif text-primary fw-bold mb-3 border-bottom pb-2">2. Accreditation Badges</h5>
        <div class="row g-3 mb-4">
            <div class="col-md-4">
                <label class="form-label fw-semibold small">Badge 1</label>
                <input type="text" name="badge1" class="form-control" value="<?php echo htmlspecialchars($hero['badge1'] ?? ''); ?>">
            </div>
            <div class="col-md-4">
                <label class="form-label fw-semibold small">Badge 2</label>
                <input type="text" name="badge2" class="form-control" value="<?php echo htmlspecialchars($hero['badge2'] ?? ''); ?>">
            </div>
            <div class="col-md-4">
                <label class="form-label fw-semibold small">Badge 3</label>
                <input type="text" name="badge3" class="form-control" value="<?php echo htmlspecialchars($hero['badge3'] ?? ''); ?>">
            </div>
        </div>

        <h5 class="font-serif text-primary fw-bold mb-3 border-bottom pb-2">3. Campus at a Glance (4 Floating Counters)</h5>
        <div class="row g-3 mb-4">
            <div class="col-md-3">
                <label class="form-label fw-semibold small">Stat 1 Value</label>
                <input type="text" name="stat1_value" class="form-control" value="<?php echo htmlspecialchars($hero['stat1_value'] ?? ''); ?>">
                <label class="form-label text-muted small mt-1">Stat 1 Label</label>
                <input type="text" name="stat1_label" class="form-control form-control-sm" value="<?php echo htmlspecialchars($hero['stat1_label'] ?? ''); ?>">
            </div>
            <div class="col-md-3">
                <label class="form-label fw-semibold small">Stat 2 Value</label>
                <input type="text" name="stat2_value" class="form-control" value="<?php echo htmlspecialchars($hero['stat2_value'] ?? ''); ?>">
                <label class="form-label text-muted small mt-1">Stat 2 Label</label>
                <input type="text" name="stat2_label" class="form-control form-control-sm" value="<?php echo htmlspecialchars($hero['stat2_label'] ?? ''); ?>">
            </div>
            <div class="col-md-3">
                <label class="form-label fw-semibold small">Stat 3 Value</label>
                <input type="text" name="stat3_value" class="form-control" value="<?php echo htmlspecialchars($hero['stat3_value'] ?? ''); ?>">
                <label class="form-label text-muted small mt-1">Stat 3 Label</label>
                <input type="text" name="stat3_label" class="form-control form-control-sm" value="<?php echo htmlspecialchars($hero['stat3_label'] ?? ''); ?>">
            </div>
            <div class="col-md-3">
                <label class="form-label fw-semibold small">Stat 4 Value</label>
                <input type="text" name="stat4_value" class="form-control" value="<?php echo htmlspecialchars($hero['stat4_value'] ?? ''); ?>">
                <label class="form-label text-muted small mt-1">Stat 4 Label</label>
                <input type="text" name="stat4_label" class="form-control form-control-sm" value="<?php echo htmlspecialchars($hero['stat4_label'] ?? ''); ?>">
            </div>
        </div>

        <h5 class="font-serif text-primary fw-bold mb-3 border-bottom pb-2">4. Call to Action Buttons</h5>
        <div class="row g-3 mb-4">
            <div class="col-md-6">
                <label class="form-label fw-semibold small">Button 1 Text</label>
                <input type="text" name="btn1_text" class="form-control mb-2" value="<?php echo htmlspecialchars($hero['btn1_text'] ?? ''); ?>">
                <label class="form-label text-muted small">Button 1 URL</label>
                <input type="text" name="btn1_url" class="form-control form-control-sm" value="<?php echo htmlspecialchars($hero['btn1_url'] ?? ''); ?>">
            </div>
            <div class="col-md-6">
                <label class="form-label fw-semibold small">Button 2 Text</label>
                <input type="text" name="btn2_text" class="form-control mb-2" value="<?php echo htmlspecialchars($hero['btn2_text'] ?? ''); ?>">
                <label class="form-label text-muted small">Button 2 URL</label>
                <input type="text" name="btn2_url" class="form-control form-control-sm" value="<?php echo htmlspecialchars($hero['btn2_url'] ?? ''); ?>">
            </div>
        </div>

        <button type="submit" class="btn btn-primary rounded-pill px-5 py-2 fw-semibold">
            <i class="fa-solid fa-save me-1"></i> Save Hero Changes
        </button>

    </div>
</form>

<?php require_once 'footer.php'; ?>
