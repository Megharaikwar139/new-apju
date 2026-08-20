<?php
require_once 'auth.php';

$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    $id = $_POST['id'] ?? null;
    $quote = $_POST['quote'] ?? '';
    $name = $_POST['name'] ?? '';
    $degree = $_POST['degree_batch'] ?? '';
    $company = $_POST['company'] ?? '';
    $sort_order = $_POST['sort_order'] ?? 0;

    if ($action === 'save') {
        if ($id) {
            $stmt = $pdo->prepare("UPDATE homepage_alumni SET quote = ?, name = ?, degree_batch = ?, company = ?, sort_order = ? WHERE id = ?");
            $stmt->execute([$quote, $name, $degree, $company, $sort_order, $id]);
            $message = 'Testimonial updated successfully!';
        } else {
            $stmt = $pdo->prepare("INSERT INTO homepage_alumni (quote, name, degree_batch, company, sort_order) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$quote, $name, $degree, $company, $sort_order]);
            $message = 'New alumni testimonial added successfully!';
        }
    } elseif ($action === 'delete' && $id) {
        $stmt = $pdo->prepare("DELETE FROM homepage_alumni WHERE id = ?");
        $stmt->execute([$id]);
        $message = 'Testimonial deleted successfully!';
    }
}

$alumni = $pdo->query("SELECT * FROM homepage_alumni ORDER BY sort_order ASC, id ASC")->fetchAll();
require_once 'header.php';
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h3 class="font-serif fw-bold text-primary mb-1">Alumni Voices & Testimonials</h3>
        <p class="text-muted small mb-0">Manage the student quote cards, graduation batch, and current hiring companies displayed on the homepage.</p>
    </div>
    <button class="btn btn-primary rounded-pill btn-sm px-3" data-bs-toggle="modal" data-bs-target="#alumniModal" onclick="openAddAlumniModal()">
        <i class="fa-solid fa-plus me-1"></i> Add Testimonial
    </button>
</div>

<?php if ($message): ?>
<div class="alert alert-success alert-dismissible fade show rounded-3 small fw-medium" role="alert">
    <i class="fa-solid fa-check-circle me-1"></i> <?php echo $message; ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php endif; ?>

<div class="row g-4">
    <?php foreach ($alumni as $a): ?>
    <div class="col-md-4">
        <div class="card shadow-sm border-0 h-100 p-4 d-flex flex-column justify-content-between">
            <div>
                <i class="fa-solid fa-quote-left text-gold fs-3 mb-3"></i>
                <p class="font-serif text-primary fs-5 leading-snug fw-medium mb-4">
                    "<?php echo htmlspecialchars($a['quote']); ?>"
                </p>
                <div class="pt-3 border-top">
                    <div class="font-serif text-primary fw-bold fs-6"><?php echo htmlspecialchars($a['name']); ?></div>
                    <div class="text-muted small"><?php echo htmlspecialchars($a['degree_batch']); ?></div>
                    <div class="text-uppercase text-primary fw-semibold mt-2" style="font-size: 0.72rem; letter-spacing: 0.08em;"><?php echo htmlspecialchars($a['company']); ?></div>
                </div>
            </div>
            <div class="d-flex gap-2 pt-3 border-top mt-4">
                <button class="btn btn-sm btn-outline-primary rounded-pill flex-grow-1" onclick='openEditAlumniModal(<?php echo json_encode($a); ?>)'>
                    <i class="fa-solid fa-pen me-1"></i> Edit
                </button>
                <form method="POST" onsubmit="return confirm('Are you sure you want to delete this testimonial?');">
                    <input type="hidden" name="action" value="delete">
                    <input type="hidden" name="id" value="<?php echo $a['id']; ?>">
                    <button type="submit" class="btn btn-sm btn-outline-danger rounded-pill px-3">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>

<!-- Add / Edit Modal -->
<div class="modal fade" id="alumniModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form method="POST" class="modal-content border-0 shadow-lg rounded-4">
            <div class="modal-header border-bottom">
                <h5 class="modal-title font-serif text-primary fw-bold" id="alumniModalTitle">Add Testimonial</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <input type="hidden" name="action" value="save">
                <input type="hidden" name="id" id="alumniId" value="">
                
                <div class="mb-3">
                    <label class="form-label fw-semibold small">Student / Alumni Quote</label>
                    <textarea name="quote" id="alumniQuote" class="form-control" rows="3" required placeholder="Enter student experience quote..."></textarea>
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold small">Alumni Full Name</label>
                        <input type="text" name="name" id="alumniName" class="form-control" required placeholder="e.g. Ananya Kulkarni">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold small">Degree & Batch</label>
                        <input type="text" name="degree_batch" id="alumniDegree" class="form-control" required placeholder="e.g. B.Tech CSE · '25">
                    </div>
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-md-8">
                        <label class="form-label fw-semibold small">Current Company / Position</label>
                        <input type="text" name="company" id="alumniCompany" class="form-control" required placeholder="e.g. Now at Microsoft">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-semibold small">Sort Order</label>
                        <input type="number" name="sort_order" id="alumniSort" class="form-control" value="0">
                    </div>
                </div>

            </div>
            <div class="modal-footer border-top bg-light">
                <button type="button" class="btn btn-sm btn-outline-secondary rounded-pill px-3" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-sm btn-primary rounded-pill px-4 fw-semibold">Save Testimonial</button>
            </div>
        </form>
    </div>
</div>

<script>
function openAddAlumniModal() {
    document.getElementById('alumniModalTitle').innerText = 'Add Testimonial';
    document.getElementById('alumniId').value = '';
    document.getElementById('alumniQuote').value = '';
    document.getElementById('alumniName').value = '';
    document.getElementById('alumniDegree').value = '';
    document.getElementById('alumniCompany').value = '';
    document.getElementById('alumniSort').value = '0';
}

function openEditAlumniModal(a) {
    document.getElementById('alumniModalTitle').innerText = 'Edit Testimonial';
    document.getElementById('alumniId').value = a.id;
    document.getElementById('alumniQuote').value = a.quote;
    document.getElementById('alumniName').value = a.name;
    document.getElementById('alumniDegree').value = a.degree_batch;
    document.getElementById('alumniCompany').value = a.company;
    document.getElementById('alumniSort').value = a.sort_order;
    new bootstrap.Modal(document.getElementById('alumniModal')).show();
}
</script>

<?php require_once 'footer.php'; ?>
