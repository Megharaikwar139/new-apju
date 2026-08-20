<?php
require_once 'auth.php';
require_once '../db.php';

$successMsg = '';
$errorMsg = '';

// Handle Status Update & Admin Notes
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    if ($_POST['action'] === 'update_status') {
        $appId = intval($_POST['app_id'] ?? 0);
        $newStatus = trim($_POST['status'] ?? 'new');
        $adminNotes = trim($_POST['admin_notes'] ?? '');

        if ($appId > 0 && in_array($newStatus, ['new', 'contacted', 'admitted', 'rejected'])) {
            $stmt = $pdo->prepare("UPDATE admission_applications SET status = ?, admin_notes = ? WHERE id = ?");
            $stmt->execute([$newStatus, $adminNotes, $appId]);
            $successMsg = "Application status updated successfully!";
        }
    }

    if ($_POST['action'] === 'delete') {
        $appId = intval($_POST['app_id'] ?? 0);
        if ($appId > 0) {
            $stmt = $pdo->prepare("DELETE FROM admission_applications WHERE id = ?");
            $stmt->execute([$appId]);
            $successMsg = "Application record deleted successfully!";
        }
    }
}

// Handle Export to CSV
if (isset($_GET['export']) && $_GET['export'] === 'csv') {
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=AKU_Admission_Applications_' . date('Y-m-d_H-i') . '.csv');
    $output = fopen('php://output', 'w');
    fputcsv($output, ['ID', 'Application No', 'Full Name', 'Email', 'Mobile No', 'Gender', 'DOB', 'State', 'City', 'Course Name', 'Program Level', 'Qualification', 'Percentage', 'Message', 'Status', 'Admin Notes', 'Applied Date']);

    $exportRows = $pdo->query("SELECT * FROM admission_applications ORDER BY id DESC")->fetchAll(PDO::FETCH_ASSOC);
    foreach ($exportRows as $row) {
        fputcsv($output, [
            $row['id'], $row['application_no'], $row['full_name'], $row['email'], $row['mobile_no'],
            $row['gender'], $row['dob'], $row['state'], $row['city'], $row['course_name'],
            $row['program_type'], $row['highest_qualification'], $row['percentage'],
            $row['message'], $row['status'], $row['admin_notes'], $row['created_at']
        ]);
    }
    fclose($output);
    exit;
}

// Counts for Stats
$totalCount = $pdo->query("SELECT COUNT(*) FROM admission_applications")->fetchColumn();
$newCount = $pdo->query("SELECT COUNT(*) FROM admission_applications WHERE status = 'new'")->fetchColumn();
$contactedCount = $pdo->query("SELECT COUNT(*) FROM admission_applications WHERE status = 'contacted'")->fetchColumn();
$admittedCount = $pdo->query("SELECT COUNT(*) FROM admission_applications WHERE status = 'admitted'")->fetchColumn();

// Filter & Search Logic
$statusFilter = trim($_GET['status'] ?? '');
$searchQuery = trim($_GET['q'] ?? '');

$sql = "SELECT * FROM admission_applications WHERE 1=1";
$params = [];

if (!empty($statusFilter) && in_array($statusFilter, ['new', 'contacted', 'admitted', 'rejected'])) {
    $sql .= " AND status = ?";
    $params[] = $statusFilter;
}

if (!empty($searchQuery)) {
    $sql .= " AND (full_name LIKE ? OR email LIKE ? OR mobile_no LIKE ? OR application_no LIKE ? OR course_name LIKE ? OR city LIKE ?)";
    $term = "%{$searchQuery}%";
    $params = array_merge($params, [$term, $term, $term, $term, $term, $term]);
}

$sql .= " ORDER BY id DESC";
$stmt = $pdo->prepare($sql);
$stmt->execute($params);
$applications = $stmt->fetchAll();

include 'header.php';
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="h3 font-serif fw-bold text-dark mb-1">
            <i class="fa-solid fa-user-graduate text-gold me-2"></i>Admission Applications &amp; Inquiries
        </h2>
        <p class="text-muted small mb-0">Manage online registrations, student leads, and admission counseling status.</p>
    </div>
    <div class="d-flex gap-2">
        <a href="admissions_manager.php?export=csv" class="btn btn-sm btn-outline-success rounded-pill px-3 fw-semibold">
            <i class="fa-solid fa-file-excel me-1"></i> Export to CSV
        </a>
        <a href="../apply-now.php" target="_blank" class="btn btn-sm btn-gold rounded-pill px-3">
            <i class="fa-solid fa-arrow-up-right-from-square me-1"></i> View Live Form
        </a>
    </div>
</div>

<?php if (!empty($successMsg)): ?>
    <div class="alert alert-success alert-dismissible fade show rounded-3 shadow-xs" role="alert">
        <i class="fa-solid fa-circle-check me-2"></i> <?php echo htmlspecialchars($successMsg); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<!-- Stats Counters -->
<div class="row g-3 mb-4">
    <div class="col-md-3">
        <div class="stat-card" style="border-left-color: #700018;">
            <h3><?php echo number_format($totalCount); ?></h3>
            <p>Total Applications</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card" style="border-left-color: #0d6efd;">
            <h3 class="text-primary"><?php echo number_format($newCount); ?></h3>
            <p>New Inquiries</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card" style="border-left-color: #fd7e14;">
            <h3 class="text-warning"><?php echo number_format($contactedCount); ?></h3>
            <p>Under Counseling</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card" style="border-left-color: #198754;">
            <h3 class="text-success"><?php echo number_format($admittedCount); ?></h3>
            <p>Admissions Confirmed</p>
        </div>
    </div>
</div>

<!-- Search & Filter Controls -->
<div class="card shadow-xs mb-4">
    <div class="card-body p-3">
        <form method="GET" action="admissions_manager.php" class="row g-2 align-items-center">
            <div class="col-md-5">
                <div class="input-group input-group-sm">
                    <span class="input-group-text bg-white"><i class="fa-solid fa-search text-muted"></i></span>
                    <input type="text" class="form-control" name="q" placeholder="Search by Name, Mobile, Email, App No, or Course..." value="<?php echo htmlspecialchars($searchQuery); ?>">
                </div>
            </div>
            <div class="col-md-3">
                <select name="status" class="form-select form-select-sm">
                    <option value="">-- All Statuses --</option>
                    <option value="new" <?php echo ($statusFilter === 'new') ? 'selected' : ''; ?>>New Leads</option>
                    <option value="contacted" <?php echo ($statusFilter === 'contacted') ? 'selected' : ''; ?>>Contacted / In Progress</option>
                    <option value="admitted" <?php echo ($statusFilter === 'admitted') ? 'selected' : ''; ?>>Admitted</option>
                    <option value="rejected" <?php echo ($statusFilter === 'rejected') ? 'selected' : ''; ?>>Rejected / Closed</option>
                </select>
            </div>
            <div class="col-md-4 d-flex gap-2">
                <button type="submit" class="btn btn-sm btn-primary rounded-pill px-3">
                    <i class="fa-solid fa-filter me-1"></i> Filter
                </button>
                <?php if (!empty($searchQuery) || !empty($statusFilter)): ?>
                    <a href="admissions_manager.php" class="btn btn-sm btn-outline-secondary rounded-pill px-3">
                        <i class="fa-solid fa-rotate-left me-1"></i> Reset
                    </a>
                <?php endif; ?>
            </div>
        </form>
    </div>
</div>

<!-- Applications Table -->
<div class="card shadow-xs">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span><i class="fa-solid fa-list text-primary me-2"></i>Registered Applicants (<?php echo count($applications); ?>)</span>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0" style="font-size: 0.88rem;">
                <thead class="table-light">
                    <tr>
                        <th>App No.</th>
                        <th>Student Details</th>
                        <th>Course &amp; Level</th>
                        <th>Location</th>
                        <th>Qualification / Marks</th>
                        <th>Status</th>
                        <th>Applied On</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($applications)): ?>
                        <tr>
                            <td colspan="8" class="text-center py-5 text-muted">
                                <i class="fa-solid fa-inbox fs-1 d-block mb-2 text-secondary opacity-50"></i>
                                No admission applications found matching your criteria.
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($applications as $app): ?>
                        <?php 
                        $statusBadge = 'bg-secondary';
                        if ($app['status'] === 'new') $statusBadge = 'bg-primary';
                        if ($app['status'] === 'contacted') $statusBadge = 'bg-warning text-dark';
                        if ($app['status'] === 'admitted') $statusBadge = 'bg-success';
                        if ($app['status'] === 'rejected') $statusBadge = 'bg-danger';
                        
                        $cleanPhone = preg_replace('/[^0-9]/', '', $app['mobile_no']);
                        ?>
                        <tr>
                            <td>
                                <strong class="text-primary font-monospace" style="font-size: 0.82rem;"><?php echo htmlspecialchars($app['application_no']); ?></strong>
                            </td>
                            <td>
                                <div class="fw-bold text-dark"><?php echo htmlspecialchars($app['full_name']); ?></div>
                                <div class="small text-muted d-flex align-items-center gap-2 mt-0.5">
                                    <a href="tel:<?php echo htmlspecialchars($app['mobile_no']); ?>" class="text-decoration-none text-dark">
                                        <i class="fa-solid fa-phone text-muted" style="font-size: 0.72rem;"></i> <?php echo htmlspecialchars($app['mobile_no']); ?>
                                    </a>
                                    <a href="https://wa.me/91<?php echo $cleanPhone; ?>?text=Hello%20<?php echo urlencode($app['full_name']); ?>,%20regarding%20your%20admission%20inquiry%20at%20AKU%20Indore" target="_blank" class="badge bg-success bg-opacity-10 text-success text-decoration-none p-1">
                                        <i class="fa-brands fa-whatsapp"></i>
                                    </a>
                                </div>
                                <div class="small text-muted" style="font-size: 0.78rem;">
                                    <a href="mailto:<?php echo htmlspecialchars($app['email']); ?>" class="text-muted text-decoration-none"><?php echo htmlspecialchars($app['email']); ?></a>
                                </div>
                            </td>
                            <td>
                                <div class="fw-semibold text-dark"><?php echo htmlspecialchars($app['course_name']); ?></div>
                                <?php if (!empty($app['program_type'])): ?>
                                    <span class="badge bg-light text-muted border mt-0.5" style="font-size: 0.7rem;"><?php echo htmlspecialchars($app['program_type']); ?></span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <div class="small text-dark"><?php echo htmlspecialchars($app['city'] ?? '-'); ?></div>
                                <div class="small text-muted" style="font-size: 0.75rem;"><?php echo htmlspecialchars($app['state'] ?? ''); ?></div>
                            </td>
                            <td>
                                <div class="small text-dark"><?php echo htmlspecialchars($app['highest_qualification'] ?? '-'); ?></div>
                                <?php if (!empty($app['percentage'])): ?>
                                    <span class="badge bg-light text-dark border" style="font-size: 0.72rem;"><?php echo htmlspecialchars($app['percentage']); ?></span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <span class="badge <?php echo $statusBadge; ?> rounded-pill px-2.5 py-1 text-uppercase" style="font-size: 0.68rem; letter-spacing: 0.05em;">
                                    <?php echo htmlspecialchars($app['status']); ?>
                                </span>
                            </td>
                            <td class="small text-muted">
                                <?php echo date('d M Y, h:i A', strtotime($app['created_at'])); ?>
                            </td>
                            <td class="text-end">
                                <button type="button" class="btn btn-sm btn-outline-primary rounded-pill px-2.5 py-1" data-bs-toggle="modal" data-bs-target="#appModal<?php echo $app['id']; ?>">
                                    <i class="fa-solid fa-eye me-1"></i> Details
                                </button>
                                <form method="POST" action="admissions_manager.php" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this application record?');">
                                    <input type="hidden" name="action" value="delete">
                                    <input type="hidden" name="app_id" value="<?php echo $app['id']; ?>">
                                    <button type="submit" class="btn btn-sm btn-outline-danger rounded-pill p-1 px-2 ms-1">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>

                        <!-- Details & Update Modal -->
                        <div class="modal fade" id="appModal<?php echo $app['id']; ?>" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content border-0 shadow-lg rounded-4">
                                    <div class="modal-header border-bottom p-3 px-4" style="background-color: oklch(36% .13 25); color: white;">
                                        <h5 class="modal-title font-serif fw-bold">
                                            <i class="fa-solid fa-id-card text-gold me-2"></i> Application #<?php echo htmlspecialchars($app['application_no']); ?>
                                        </h5>
                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    
                                    <form method="POST" action="admissions_manager.php">
                                        <input type="hidden" name="action" value="update_status">
                                        <input type="hidden" name="app_id" value="<?php echo $app['id']; ?>">

                                        <div class="modal-body p-4">
                                            <div class="row g-3 mb-4">
                                                <div class="col-md-6">
                                                    <div class="p-3 bg-light rounded-3 border">
                                                        <div class="text-muted small text-uppercase fw-bold" style="font-size: 0.72rem;">Student Name</div>
                                                        <div class="fs-6 fw-bold text-dark"><?php echo htmlspecialchars($app['full_name']); ?></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="p-3 bg-light rounded-3 border">
                                                        <div class="text-muted small text-uppercase fw-bold" style="font-size: 0.72rem;">Selected Course</div>
                                                        <div class="fs-6 fw-bold text-primary"><?php echo htmlspecialchars($app['course_name']); ?></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="p-2.5 bg-light rounded-3 border">
                                                        <div class="text-muted small" style="font-size: 0.72rem;">Mobile Number</div>
                                                        <a href="tel:<?php echo htmlspecialchars($app['mobile_no']); ?>" class="fw-bold text-dark text-decoration-none">
                                                            <?php echo htmlspecialchars($app['mobile_no']); ?>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="p-2.5 bg-light rounded-3 border">
                                                        <div class="text-muted small" style="font-size: 0.72rem;">Email Address</div>
                                                        <div class="fw-bold text-dark small"><?php echo htmlspecialchars($app['email']); ?></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="p-2.5 bg-light rounded-3 border">
                                                        <div class="text-muted small" style="font-size: 0.72rem;">Gender &amp; DOB</div>
                                                        <div class="fw-bold text-dark small"><?php echo htmlspecialchars($app['gender'] ?? '-'); ?> | <?php echo htmlspecialchars($app['dob'] ?? '-'); ?></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="p-2.5 bg-light rounded-3 border">
                                                        <div class="text-muted small" style="font-size: 0.72rem;">Location</div>
                                                        <div class="fw-bold text-dark small"><?php echo htmlspecialchars($app['city'] ?? '-'); ?>, <?php echo htmlspecialchars($app['state'] ?? '-'); ?></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="p-2.5 bg-light rounded-3 border">
                                                        <div class="text-muted small" style="font-size: 0.72rem;">Qualification &amp; Percentage</div>
                                                        <div class="fw-bold text-dark small"><?php echo htmlspecialchars($app['highest_qualification'] ?? '-'); ?> (<?php echo htmlspecialchars($app['percentage'] ?? 'N/A'); ?>)</div>
                                                    </div>
                                                </div>
                                                <?php if (!empty($app['message'])): ?>
                                                    <div class="col-12">
                                                        <div class="p-3 bg-light rounded-3 border">
                                                            <div class="text-muted small text-uppercase fw-bold" style="font-size: 0.72rem;">Student's Message / Query</div>
                                                            <div class="small text-dark mt-1"><?php echo nl2br(htmlspecialchars($app['message'])); ?></div>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                            </div>

                                            <hr class="my-3">

                                            <!-- Status & Counselor Notes Form -->
                                            <div class="row g-3">
                                                <div class="col-md-6">
                                                    <label class="form-label small fw-bold">Admission Status</label>
                                                    <select name="status" class="form-select">
                                                        <option value="new" <?php echo ($app['status'] === 'new') ? 'selected' : ''; ?>>New Lead / Inquiry</option>
                                                        <option value="contacted" <?php echo ($app['status'] === 'contacted') ? 'selected' : ''; ?>>Contacted &amp; Counseling In Progress</option>
                                                        <option value="admitted" <?php echo ($app['status'] === 'admitted') ? 'selected' : ''; ?>>Admitted / Fee Deposited</option>
                                                        <option value="rejected" <?php echo ($app['status'] === 'rejected') ? 'selected' : ''; ?>>Rejected / Not Interested</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label small fw-bold">Direct Quick Action</label>
                                                    <div class="d-flex gap-2">
                                                        <a href="tel:<?php echo htmlspecialchars($app['mobile_no']); ?>" class="btn btn-outline-primary w-50">
                                                            <i class="fa-solid fa-phone me-1"></i> Call Student
                                                        </a>
                                                        <a href="https://wa.me/91<?php echo $cleanPhone; ?>?text=Hello%20<?php echo urlencode($app['full_name']); ?>,%20regarding%20your%20admission%20inquiry%20at%20AKU%20Indore" target="_blank" class="btn btn-outline-success w-50">
                                                            <i class="fa-brands fa-whatsapp me-1"></i> WhatsApp
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <label class="form-label small fw-bold">Counselor Admin Notes</label>
                                                    <textarea name="admin_notes" class="form-control" rows="3" placeholder="Enter notes from counseling call, scholarship eligibility remarks, or follow-up schedule..."><?php echo htmlspecialchars($app['admin_notes'] ?? ''); ?></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal-footer bg-light p-3">
                                            <button type="button" class="btn btn-sm btn-secondary rounded-pill px-3" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-sm btn-primary rounded-pill px-4">
                                                <i class="fa-solid fa-save me-1"></i> Save Changes
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
