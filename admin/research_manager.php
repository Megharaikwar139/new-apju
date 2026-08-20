<?php
require_once 'auth.php';

$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'] ?? '';
    $description = $_POST['description'] ?? '';
    $image_path = $_POST['image_path'] ?? 'assets/lovable/apj8.jpeg';
    $stat1_val = $_POST['stat1_value'] ?? '14';
    $stat1_lbl = $_POST['stat1_label'] ?? 'Research Centers';
    $stat2_val = $_POST['stat2_value'] ?? '342';
    $stat2_lbl = $_POST['stat2_label'] ?? 'Publications';
    $stat3_val = $_POST['stat3_value'] ?? '42';
    $stat3_lbl = $_POST['stat3_label'] ?? 'Startups Incubated';
    
    $p1_num = $_POST['paper1_num'] ?? '01';
    $p1_tag = $_POST['paper1_tag'] ?? 'Materials Science';
    $p1_title = $_POST['paper1_title'] ?? '';
    $p1_author = $_POST['paper1_author'] ?? '';

    $p2_num = $_POST['paper2_num'] ?? '02';
    $p2_tag = $_POST['paper2_tag'] ?? 'AI · Health';
    $p2_title = $_POST['paper2_title'] ?? '';
    $p2_author = $_POST['paper2_author'] ?? '';

    $p3_num = $_POST['paper3_num'] ?? '03';
    $p3_tag = $_POST['paper3_tag'] ?? 'Pharmacy';
    $p3_title = $_POST['paper3_title'] ?? '';
    $p3_author = $_POST['paper3_author'] ?? '';
    $report_link = $_POST['report_link'] ?? 'faculty-publications.php';

    if (isset($_FILES['research_file']) && $_FILES['research_file']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = '../uploads/';
        if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);
        $fileName = time() . '_' . basename($_FILES['research_file']['name']);
        if (move_uploaded_file($_FILES['research_file']['tmp_name'], $uploadDir . $fileName)) {
            $image_path = 'uploads/' . $fileName;
        }
    }

    $stmt = $pdo->prepare("UPDATE homepage_research SET 
        title = ?, description = ?, image_path = ?,
        stat1_value = ?, stat1_label = ?,
        stat2_value = ?, stat2_label = ?,
        stat3_value = ?, stat3_label = ?,
        paper1_num = ?, paper1_tag = ?, paper1_title = ?, paper1_author = ?,
        paper2_num = ?, paper2_tag = ?, paper2_title = ?, paper2_author = ?,
        paper3_num = ?, paper3_tag = ?, paper3_title = ?, paper3_author = ?,
        report_link = ?
        WHERE id = 1");
    $stmt->execute([
        $title, $description, $image_path,
        $stat1_val, $stat1_lbl,
        $stat2_val, $stat2_lbl,
        $stat3_val, $stat3_lbl,
        $p1_num, $p1_tag, $p1_title, $p1_author,
        $p2_num, $p2_tag, $p2_title, $p2_author,
        $p3_num, $p3_tag, $p3_title, $p3_author,
        $report_link
    ]);
    $message = 'Research & Kalam Innovation Center section updated!';
}

$research = $pdo->query("SELECT * FROM homepage_research WHERE id = 1")->fetch();
require_once 'header.php';
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h3 class="font-serif fw-bold text-primary mb-1">Research & Kalam Innovation Center</h3>
        <p class="text-muted small mb-0">Configure the Kalam Innovation Center highlights, patent statistics, and 3 featured research papers.</p>
    </div>
    <a href="../index.php#research" target="_blank" class="btn btn-outline-primary rounded-pill btn-sm px-3">
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
        
        <h5 class="font-serif text-primary fw-bold mb-3 border-bottom pb-2">1. Kalam Innovation Center Details</h5>
        <div class="row g-3 mb-4">
            <div class="col-md-12">
                <label class="form-label fw-semibold small">Section Title (HTML allowed)</label>
                <input type="text" name="title" class="form-control" value="<?php echo htmlspecialchars($research['title'] ?? ''); ?>" required>
            </div>
            <div class="col-md-12">
                <label class="form-label fw-semibold small">Description</label>
                <textarea name="description" class="form-control" rows="3"><?php echo htmlspecialchars($research['description'] ?? ''); ?></textarea>
            </div>
            <div class="col-md-6">
                <label class="form-label fw-semibold small">Facility Image URL / Upload</label>
                <input type="text" name="image_path" class="form-control mb-2" value="<?php echo htmlspecialchars($research['image_path'] ?? ''); ?>">
                <input type="file" name="research_file" class="form-control form-control-sm" accept="image/*">
            </div>
            <div class="col-md-6">
                <label class="form-label fw-semibold small">Report Link</label>
                <input type="text" name="report_link" class="form-control" value="<?php echo htmlspecialchars($research['report_link'] ?? 'faculty-publications.php'); ?>">
            </div>
        </div>

        <h5 class="font-serif text-primary fw-bold mb-3 border-bottom pb-2">2. Research Stats (3 Counters)</h5>
        <div class="row g-3 mb-4">
            <div class="col-md-4">
                <label class="form-label fw-semibold small">Stat 1 (Centers)</label>
                <input type="text" name="stat1_value" class="form-control mb-1" value="<?php echo htmlspecialchars($research['stat1_value'] ?? ''); ?>">
                <input type="text" name="stat1_label" class="form-control form-control-sm text-muted" value="<?php echo htmlspecialchars($research['stat1_label'] ?? ''); ?>">
            </div>
            <div class="col-md-4">
                <label class="form-label fw-semibold small">Stat 2 (Publications)</label>
                <input type="text" name="stat2_value" class="form-control mb-1" value="<?php echo htmlspecialchars($research['stat2_value'] ?? ''); ?>">
                <input type="text" name="stat2_label" class="form-control form-control-sm text-muted" value="<?php echo htmlspecialchars($research['stat2_label'] ?? ''); ?>">
            </div>
            <div class="col-md-4">
                <label class="form-label fw-semibold small">Stat 3 (Startups)</label>
                <input type="text" name="stat3_value" class="form-control mb-1" value="<?php echo htmlspecialchars($research['stat3_value'] ?? ''); ?>">
                <input type="text" name="stat3_label" class="form-control form-control-sm text-muted" value="<?php echo htmlspecialchars($research['stat3_label'] ?? ''); ?>">
            </div>
        </div>

        <h5 class="font-serif text-primary fw-bold mb-3 border-bottom pb-2">3. Three Featured Research Papers</h5>
        <div class="row g-3 mb-4">
            
            <!-- Paper 1 -->
            <div class="col-md-4">
                <div class="p-3 border rounded-3 bg-light">
                    <div class="d-flex justify-content-between mb-2">
                        <span class="badge bg-primary">Paper 1</span>
                        <input type="text" name="paper1_num" class="form-control form-control-sm w-25 text-center" value="<?php echo htmlspecialchars($research['paper1_num'] ?? '01'); ?>">
                    </div>
                    <label class="form-label text-muted small">Category Tag</label>
                    <input type="text" name="paper1_tag" class="form-control form-control-sm mb-2" value="<?php echo htmlspecialchars($research['paper1_tag'] ?? 'Materials Science'); ?>">
                    <label class="form-label fw-semibold small">Paper Title</label>
                    <textarea name="paper1_title" class="form-control form-control-sm mb-2" rows="2"><?php echo htmlspecialchars($research['paper1_title'] ?? ''); ?></textarea>
                    <label class="form-label text-muted small">Author / Team</label>
                    <input type="text" name="paper1_author" class="form-control form-control-sm" value="<?php echo htmlspecialchars($research['paper1_author'] ?? ''); ?>">
                </div>
            </div>

            <!-- Paper 2 -->
            <div class="col-md-4">
                <div class="p-3 border rounded-3 bg-light">
                    <div class="d-flex justify-content-between mb-2">
                        <span class="badge bg-primary">Paper 2</span>
                        <input type="text" name="paper2_num" class="form-control form-control-sm w-25 text-center" value="<?php echo htmlspecialchars($research['paper2_num'] ?? '02'); ?>">
                    </div>
                    <label class="form-label text-muted small">Category Tag</label>
                    <input type="text" name="paper2_tag" class="form-control form-control-sm mb-2" value="<?php echo htmlspecialchars($research['paper2_tag'] ?? 'AI · Health'); ?>">
                    <label class="form-label fw-semibold small">Paper Title</label>
                    <textarea name="paper2_title" class="form-control form-control-sm mb-2" rows="2"><?php echo htmlspecialchars($research['paper2_title'] ?? ''); ?></textarea>
                    <label class="form-label text-muted small">Author / Team</label>
                    <input type="text" name="paper2_author" class="form-control form-control-sm" value="<?php echo htmlspecialchars($research['paper2_author'] ?? ''); ?>">
                </div>
            </div>

            <!-- Paper 3 -->
            <div class="col-md-4">
                <div class="p-3 border rounded-3 bg-light">
                    <div class="d-flex justify-content-between mb-2">
                        <span class="badge bg-primary">Paper 3</span>
                        <input type="text" name="paper3_num" class="form-control form-control-sm w-25 text-center" value="<?php echo htmlspecialchars($research['paper3_num'] ?? '03'); ?>">
                    </div>
                    <label class="form-label text-muted small">Category Tag</label>
                    <input type="text" name="paper3_tag" class="form-control form-control-sm mb-2" value="<?php echo htmlspecialchars($research['paper3_tag'] ?? 'Pharmacy'); ?>">
                    <label class="form-label fw-semibold small">Paper Title</label>
                    <textarea name="paper3_title" class="form-control form-control-sm mb-2" rows="2"><?php echo htmlspecialchars($research['paper3_title'] ?? ''); ?></textarea>
                    <label class="form-label text-muted small">Author / Team</label>
                    <input type="text" name="paper3_author" class="form-control form-control-sm" value="<?php echo htmlspecialchars($research['paper3_author'] ?? ''); ?>">
                </div>
            </div>

        </div>

        <button type="submit" class="btn btn-primary rounded-pill px-5 py-2 fw-semibold">
            <i class="fa-solid fa-save me-1"></i> Save Research Changes
        </button>

    </div>
</form>

<?php require_once 'footer.php'; ?>
