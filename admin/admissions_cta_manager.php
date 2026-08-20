<?php
require_once 'auth.php';

$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $eyebrow = $_POST['eyebrow'] ?? 'Admissions 2026';
    $headline = $_POST['headline'] ?? '';
    $description = $_POST['description'] ?? '';
    $btn1_text = $_POST['btn1_text'] ?? 'Start your application';
    $btn1_url = $_POST['btn1_url'] ?? 'admission-procedure.php';
    $btn2_text = $_POST['btn2_text'] ?? 'Download brochure';
    $btn2_url = $_POST['btn2_url'] ?? 'download-form-student.php';
    $date1_lbl = $_POST['date1_label'] ?? 'Application Deadline';
    $date1_val = $_POST['date1_value'] ?? '31 May 2026';
    $date2_lbl = $_POST['date2_label'] ?? 'Entrance Test Window';
    $date2_val = $_POST['date2_value'] ?? 'Jun 08–15, 2026';
    $date3_lbl = $_POST['date3_label'] ?? 'Session Begins';
    $date3_val = $_POST['date3_value'] ?? 'Jul 22, 2026';

    $stmt = $pdo->prepare("UPDATE homepage_admissions_cta SET 
        eyebrow = ?, headline = ?, description = ?,
        btn1_text = ?, btn1_url = ?, btn2_text = ?, btn2_url = ?,
        date1_label = ?, date1_value = ?,
        date2_label = ?, date2_value = ?,
        date3_label = ?, date3_value = ?
        WHERE id = 1");
    $stmt->execute([
        $eyebrow, $headline, $description,
        $btn1_text, $btn1_url, $btn2_text, $btn2_url,
        $date1_lbl, $date1_val,
        $date2_lbl, $date2_val,
        $date3_lbl, $date3_val
    ]);
    $message = 'Admissions CTA banner updated successfully!';
}

$cta = $pdo->query("SELECT * FROM homepage_admissions_cta WHERE id = 1")->fetch();
require_once 'header.php';
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h3 class="font-serif fw-bold text-primary mb-1">Admissions 2026 CTA Banner</h3>
        <p class="text-muted small mb-0">Manage the prominent bottom CTA banner, application dates, test window, and session dates.</p>
    </div>
    <a href="../index.php#admissions" target="_blank" class="btn btn-outline-primary rounded-pill btn-sm px-3">
        <i class="fa-solid fa-eye me-1"></i> View Live Banner
    </a>
</div>

<?php if ($message): ?>
<div class="alert alert-success alert-dismissible fade show rounded-3 small fw-medium" role="alert">
    <i class="fa-solid fa-check-circle me-1"></i> <?php echo $message; ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php endif; ?>

<form method="POST" class="card shadow-sm border-0">
    <div class="card-body p-4">
        
        <h5 class="font-serif text-primary fw-bold mb-3 border-bottom pb-2">1. Headline & Narrative</h5>
        <div class="row g-3 mb-4">
            <div class="col-md-6">
                <label class="form-label fw-semibold small">Eyebrow Label</label>
                <input type="text" name="eyebrow" class="form-control" value="<?php echo htmlspecialchars($cta['eyebrow'] ?? 'Admissions 2026'); ?>">
            </div>
            <div class="col-md-12">
                <label class="form-label fw-semibold small">Headline (HTML allowed)</label>
                <input type="text" name="headline" class="form-control" value="<?php echo htmlspecialchars($cta['headline'] ?? ''); ?>" required>
            </div>
            <div class="col-md-12">
                <label class="form-label fw-semibold small">Description</label>
                <textarea name="description" class="form-control" rows="3"><?php echo htmlspecialchars($cta['description'] ?? ''); ?></textarea>
            </div>
        </div>

        <h5 class="font-serif text-primary fw-bold mb-3 border-bottom pb-2">2. Action Buttons</h5>
        <div class="row g-3 mb-4">
            <div class="col-md-6">
                <label class="form-label fw-semibold small">Button 1 (Gold Primary)</label>
                <input type="text" name="btn1_text" class="form-control mb-2" value="<?php echo htmlspecialchars($cta['btn1_text'] ?? 'Start your application'); ?>">
                <input type="text" name="btn1_url" class="form-control form-control-sm text-muted" value="<?php echo htmlspecialchars($cta['btn1_url'] ?? 'admission-procedure.php'); ?>">
            </div>
            <div class="col-md-6">
                <label class="form-label fw-semibold small">Button 2 (Outline Brochure)</label>
                <input type="text" name="btn2_text" class="form-control mb-2" value="<?php echo htmlspecialchars($cta['btn2_text'] ?? 'Download brochure'); ?>">
                <input type="text" name="btn2_url" class="form-control form-control-sm text-muted" value="<?php echo htmlspecialchars($cta['btn2_url'] ?? 'download-form-student.php'); ?>">
            </div>
        </div>

        <h5 class="font-serif text-primary fw-bold mb-3 border-bottom pb-2">3. Three Key Milestone Dates</h5>
        <div class="row g-3 mb-4">
            <div class="col-md-4">
                <div class="p-3 border rounded-3 bg-light">
                    <label class="form-label fw-semibold small">Date 1 Label</label>
                    <input type="text" name="date1_label" class="form-control mb-2" value="<?php echo htmlspecialchars($cta['date1_label'] ?? 'Application Deadline'); ?>">
                    <label class="form-label text-muted small">Date 1 Value</label>
                    <input type="text" name="date1_value" class="form-control" value="<?php echo htmlspecialchars($cta['date1_value'] ?? '31 May 2026'); ?>">
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-3 border rounded-3 bg-light">
                    <label class="form-label fw-semibold small">Date 2 Label</label>
                    <input type="text" name="date2_label" class="form-control mb-2" value="<?php echo htmlspecialchars($cta['date2_label'] ?? 'Entrance Test Window'); ?>">
                    <label class="form-label text-muted small">Date 2 Value</label>
                    <input type="text" name="date2_value" class="form-control" value="<?php echo htmlspecialchars($cta['date2_value'] ?? 'Jun 08–15, 2026'); ?>">
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-3 border rounded-3 bg-light">
                    <label class="form-label fw-semibold small">Date 3 Label</label>
                    <input type="text" name="date3_label" class="form-control mb-2" value="<?php echo htmlspecialchars($cta['date3_label'] ?? 'Session Begins'); ?>">
                    <label class="form-label text-muted small">Date 3 Value</label>
                    <input type="text" name="date3_value" class="form-control" value="<?php echo htmlspecialchars($cta['date3_value'] ?? 'Jul 22, 2026'); ?>">
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary rounded-pill px-5 py-2 fw-semibold">
            <i class="fa-solid fa-save me-1"></i> Save Admissions CTA
        </button>

    </div>
</form>

<?php require_once 'footer.php'; ?>
