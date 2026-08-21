<?php
require_once 'auth.php';
require_once '../db.php';

$successMsg = '';
$errorMsg = '';

// Handle Status Update & Admin Notes
if (($_SERVER['REQUEST_METHOD'] ?? '') === 'POST' && isset($_POST['action'])) {
    if ($_POST['action'] === 'update_status') {
        $appId = intval($_POST['app_id'] ?? 0);
        $newStatus = trim($_POST['status'] ?? 'new');
        $adminNotes = trim($_POST['admin_notes'] ?? '');

        if ($appId > 0 && in_array($newStatus, ['new', 'contacted', 'admitted', 'rejected'])) {
            $stmt = $pdo->prepare("UPDATE admission_applications SET status = ?, admin_notes = ? WHERE id = ?");
            $stmt->execute([$newStatus, $adminNotes, $appId]);
            $successMsg = "Application status & counseling notes updated successfully!";
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
    fputcsv($output, ['ID', 'Application No', 'Full Name', 'Email', 'Mobile No', 'Gender', 'DOB', 'State', 'City', 'Course Name', 'Program Level', 'Qualification', 'Institute Name', 'Board / University', 'Passing Year', 'Percentage', 'Stream / Subjects', 'Entrance Exam', 'Entrance Score', 'Message', 'Status', 'Admin Notes', 'Applied Date']);

    $exportRows = $pdo->query("SELECT * FROM admission_applications ORDER BY id DESC")->fetchAll(PDO::FETCH_ASSOC);
    foreach ($exportRows as $row) {
        fputcsv($output, [
            $row['id'], $row['application_no'], $row['full_name'], $row['email'], $row['mobile_no'],
            $row['gender'], $row['dob'], $row['state'], $row['city'], $row['course_name'],
            $row['program_type'], $row['highest_qualification'], $row['institute_name'] ?? '',
            $row['board_university'] ?? '', $row['passing_year'] ?? '', $row['percentage'],
            $row['stream_subject'] ?? '', $row['entrance_exam'] ?? '', $row['entrance_score'] ?? '',
            $row['message'], $row['status'], $row['admin_notes'], $row['created_at']
        ]);
    }
    fclose($output);
    exit;
}

// Counts for KPI Stats
$totalCount = (int)$pdo->query("SELECT COUNT(*) FROM admission_applications")->fetchColumn();
$newCount = (int)$pdo->query("SELECT COUNT(*) FROM admission_applications WHERE status = 'new'")->fetchColumn();
$contactedCount = (int)$pdo->query("SELECT COUNT(*) FROM admission_applications WHERE status = 'contacted'")->fetchColumn();
$admittedCount = (int)$pdo->query("SELECT COUNT(*) FROM admission_applications WHERE status = 'admitted'")->fetchColumn();

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

<!-- Page Header -->
<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4 pb-2">
    <div>
        <div class="d-flex align-items-center gap-2 mb-1">
            <span class="badge rounded-pill" style="background: rgba(88,8,19,0.08); color: var(--admin-maroon); font-size: 0.75rem; padding: 4px 10px;">
                <i class="fa-solid fa-graduation-cap text-gold me-1"></i> Admissions CRM
            </span>
            <?php if ($newCount > 0): ?>
            <span class="badge bg-danger rounded-pill" style="font-size: 0.7rem;">
                <?php echo $newCount; ?> New Leads
            </span>
            <?php endif; ?>
        </div>
        <h2 class="h3 font-serif fw-bold text-primary mb-0">Admission Applications &amp; Inquiries</h2>
        <p class="text-muted small mb-0 mt-0.5">Track candidate registrations, verify academic eligibility, and manage counseling workflows.</p>
    </div>
    
    <div class="d-flex flex-wrap gap-2">
        <a href="admissions_manager.php?export=csv" class="btn btn-sm btn-outline-primary rounded-pill px-3.5 py-1.5 fw-semibold d-inline-flex align-items-center gap-1.5">
            <i class="fa-solid fa-file-csv"></i> Export CSV
        </a>
        <a href="../apply-now.php" target="_blank" class="btn btn-sm btn-gold rounded-pill px-3.5 py-1.5 d-inline-flex align-items-center gap-1.5">
            <i class="fa-solid fa-arrow-up-right-from-square"></i> View Live Form
        </a>
    </div>
</div>

<?php if (!empty($successMsg)): ?>
<div class="alert alert-success alert-dismissible fade show rounded-3 shadow-xs small fw-medium mb-4" role="alert">
    <i class="fa-solid fa-circle-check text-success me-1.5"></i> <?php echo htmlspecialchars($successMsg); ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php endif; ?>

<!-- 4 Executive KPI Stat Cards -->
<div class="row g-3 mb-4">
    <div class="col-sm-6 col-xl-3">
        <div class="admin-stat-card">
            <div class="d-flex justify-content-between align-items-start mb-2">
                <div>
                    <div class="stat-value"><?php echo number_format($totalCount); ?></div>
                    <p class="stat-label">Total Applications</p>
                </div>
                <div class="icon-circle-badge">
                    <i class="fa-solid fa-users"></i>
                </div>
            </div>
            <div class="d-flex align-items-center justify-content-between small pt-2 border-top">
                <span class="text-muted">All-Time Registered</span>
                <span class="text-primary fw-bold">100% Leads</span>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-xl-3">
        <div class="admin-stat-card maroon-border">
            <div class="d-flex justify-content-between align-items-start mb-2">
                <div>
                    <div class="stat-value text-primary"><?php echo number_format($newCount); ?></div>
                    <p class="stat-label">New Inquiries</p>
                </div>
                <div class="icon-circle-badge">
                    <i class="fa-solid fa-bell"></i>
                </div>
            </div>
            <div class="d-flex align-items-center justify-content-between small pt-2 border-top">
                <span class="text-muted">Pending Review</span>
                <a href="admissions_manager.php?status=new" class="text-decoration-none text-primary fw-bold">View New &rarr;</a>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-xl-3">
        <div class="admin-stat-card gold-border">
            <div class="d-flex justify-content-between align-items-start mb-2">
                <div>
                    <div class="stat-value text-gold"><?php echo number_format($contactedCount); ?></div>
                    <p class="stat-label">Under Counseling</p>
                </div>
                <div class="icon-circle-gold">
                    <i class="fa-solid fa-headset"></i>
                </div>
            </div>
            <div class="d-flex align-items-center justify-content-between small pt-2 border-top">
                <span class="text-muted">Follow-up In Progress</span>
                <a href="admissions_manager.php?status=contacted" class="text-decoration-none text-gold fw-bold">View Active &rarr;</a>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-xl-3">
        <div class="admin-stat-card dark-border">
            <div class="d-flex justify-content-between align-items-start mb-2">
                <div>
                    <div class="stat-value text-success"><?php echo number_format($admittedCount); ?></div>
                    <p class="stat-label">Admissions Confirmed</p>
                </div>
                <div class="icon-circle-badge" style="border-color: #198754 !important; background: rgba(25,135,84,0.08) !important; color: #198754 !important;">
                    <i class="fa-solid fa-certificate"></i>
                </div>
            </div>
            <div class="d-flex align-items-center justify-content-between small pt-2 border-top">
                <span class="text-muted">Enrollment Completed</span>
                <a href="admissions_manager.php?status=admitted" class="text-decoration-none text-success fw-bold">Enrolled &rarr;</a>
            </div>
        </div>
    </div>
</div>

<!-- Search & Filter Card -->
<div class="card shadow-sm border-0 rounded-4 mb-4">
    <div class="card-body p-3.5">
        <form method="GET" action="admissions_manager.php" class="row g-2.5 align-items-center">
            <div class="col-lg-6">
                <div class="input-group">
                    <span class="input-group-text bg-light border-end-0 text-muted px-3">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </span>
                    <input type="text" class="form-control bg-light border-start-0 ps-0" name="q" placeholder="Search by Candidate Name, Mobile, Email, App No, or Course..." value="<?php echo htmlspecialchars($searchQuery); ?>">
                </div>
            </div>
            
            <div class="col-md-6 col-lg-3">
                <select name="status" class="form-select bg-light">
                    <option value="">-- All Statuses (<?php echo $totalCount; ?>) --</option>
                    <option value="new" <?php echo ($statusFilter === 'new') ? 'selected' : ''; ?>>🔥 New Inquiries (<?php echo $newCount; ?>)</option>
                    <option value="contacted" <?php echo ($statusFilter === 'contacted') ? 'selected' : ''; ?>>📞 Under Counseling (<?php echo $contactedCount; ?>)</option>
                    <option value="admitted" <?php echo ($statusFilter === 'admitted') ? 'selected' : ''; ?>>🎓 Confirmed Admitted (<?php echo $admittedCount; ?>)</option>
                    <option value="rejected" <?php echo ($statusFilter === 'rejected') ? 'selected' : ''; ?>>❌ Closed / Rejected</option>
                </select>
            </div>
            
            <div class="col-md-6 col-lg-3 d-flex gap-2">
                <button type="submit" class="btn btn-primary rounded-pill px-3.5 flex-grow-1">
                    <i class="fa-solid fa-filter me-1"></i> Filter Leads
                </button>
                <?php if (!empty($searchQuery) || !empty($statusFilter)): ?>
                <a href="admissions_manager.php" class="btn btn-outline-secondary rounded-pill px-3" title="Clear Filters">
                    <i class="fa-solid fa-rotate-left"></i>
                </a>
                <?php endif; ?>
            </div>
        </form>
    </div>
</div>

<!-- Registered Applicants Table Card -->
<div class="card shadow-sm border-0 rounded-4 overflow-hidden mb-4">
    <div class="card-header bg-white py-3 px-4 d-flex justify-content-between align-items-center border-bottom">
        <div class="d-flex align-items-center gap-2">
            <span class="icon-circle-badge" style="width: 32px; height: 32px; font-size: 0.85rem;">
                <i class="fa-solid fa-address-book"></i>
            </span>
            <span class="font-serif fw-bold text-primary fs-5">Registered Applicants</span>
            <span class="badge rounded-pill bg-light text-muted border ms-1 px-2.5 py-1 small">
                <?php echo count($applications); ?> Records Found
            </span>
        </div>
        
        <?php if (!empty($searchQuery) || !empty($statusFilter)): ?>
        <div class="small text-muted">
            Filtered view &middot; <a href="admissions_manager.php" class="text-primary fw-semibold text-decoration-underline">Show all records</a>
        </div>
        <?php endif; ?>
    </div>

    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light small text-uppercase" style="letter-spacing: 0.05em; font-size: 0.72rem;">
                    <tr>
                        <th class="ps-4 py-3" style="width: 140px; white-space: nowrap;">App No.</th>
                        <th class="py-3">Candidate Details</th>
                        <th class="py-3">Applied Program</th>
                        <th class="py-3">City / State</th>
                        <th class="py-3">Academic Score</th>
                        <th class="py-3 text-center">Status</th>
                        <th class="py-3">Applied Date</th>
                        <th class="text-end pe-4 py-3" style="min-width: 120px;">Actions</th>
                    </tr>
                </thead>
                <tbody class="small">
                    <?php if (empty($applications)): ?>
                    <tr>
                        <td colspan="8" class="text-center py-5">
                            <div class="my-3">
                                <div class="icon-circle-badge mx-auto mb-3" style="width: 54px; height: 54px; font-size: 1.5rem;">
                                    <i class="fa-solid fa-folder-open"></i>
                                </div>
                                <h6 class="font-serif fw-bold text-muted mb-1">No Admission Applications Found</h6>
                                <p class="small text-muted mb-3">No student leads match the selected filter criteria.</p>
                                <a href="admissions_manager.php" class="btn btn-sm btn-primary rounded-pill px-3">
                                    Reset Filters
                                </a>
                            </div>
                        </td>
                    </tr>
                    <?php else: ?>
                    <?php foreach ($applications as $app): 
                        $statusBadgeClass = 'badge-status-new';
                        $statusLabel = 'New Lead';
                        if ($app['status'] === 'new') {
                            $statusBadgeClass = 'badge bg-danger rounded-pill px-2.5 py-1 text-white';
                            $statusLabel = 'NEW';
                        } elseif ($app['status'] === 'contacted') {
                            $statusBadgeClass = 'badge rounded-pill px-2.5 py-1 text-dark border';
                            $statusLabel = 'COUNSELING';
                        } elseif ($app['status'] === 'admitted') {
                            $statusBadgeClass = 'badge bg-success rounded-pill px-2.5 py-1 text-white';
                            $statusLabel = 'ADMITTED';
                        } elseif ($app['status'] === 'rejected') {
                            $statusBadgeClass = 'badge bg-secondary rounded-pill px-2.5 py-1 text-white';
                            $statusLabel = 'CLOSED';
                        }

                        $cleanPhone = preg_replace('/[^0-9]/', '', $app['mobile_no']);
                    ?>
                    <tr>
                        <!-- App No (Strictly No-wrap) -->
                        <td class="ps-4">
                            <span class="badge font-monospace fw-bold rounded-pill px-2.5 py-1" style="background: rgba(88,8,19,0.08); color: var(--admin-maroon); font-size: 0.78rem; white-space: nowrap;">
                                <?php echo htmlspecialchars($app['application_no']); ?>
                            </span>
                        </td>

                        <!-- Student Details -->
                        <td>
                            <div class="fw-bold font-serif fs-6 text-dark mb-0.5"><?php echo htmlspecialchars($app['full_name']); ?></div>
                            <div class="d-flex align-items-center gap-2 small">
                                <a href="tel:<?php echo htmlspecialchars($app['mobile_no']); ?>" class="text-decoration-none text-muted" title="Call Candidate">
                                    <i class="fa-solid fa-phone text-primary me-1" style="font-size: 0.72rem;"></i><?php echo htmlspecialchars($app['mobile_no']); ?>
                                </a>
                                <a href="https://wa.me/91<?php echo $cleanPhone; ?>?text=Hello%20<?php echo urlencode($app['full_name']); ?>,%20regarding%20your%20admission%20inquiry%20at%20AKU%20Indore" target="_blank" class="badge rounded-circle p-1 text-success border border-success border-opacity-25 text-decoration-none" style="background: rgba(25,135,84,0.1);" title="Message on WhatsApp">
                                    <i class="fa-brands fa-whatsapp"></i>
                                </a>
                            </div>
                            <div class="text-muted" style="font-size: 0.76rem;">
                                <a href="mailto:<?php echo htmlspecialchars($app['email']); ?>" class="text-muted text-decoration-none">
                                    <i class="fa-regular fa-envelope me-1"></i><?php echo htmlspecialchars($app['email']); ?>
                                </a>
                            </div>
                        </td>

                        <!-- Course & Level -->
                        <td>
                            <div class="fw-semibold text-primary"><?php echo htmlspecialchars($app['course_name']); ?></div>
                            <?php if (!empty($app['program_type'])): ?>
                            <span class="badge bg-light text-muted border rounded-pill px-2 py-0.5 mt-0.5" style="font-size: 0.68rem;">
                                <?php echo htmlspecialchars($app['program_type']); ?>
                            </span>
                            <?php endif; ?>
                        </td>

                        <!-- Location -->
                        <td>
                            <div class="text-dark fw-medium"><?php echo htmlspecialchars($app['city'] ?: 'Indore'); ?></div>
                            <div class="text-muted" style="font-size: 0.75rem;"><?php echo htmlspecialchars($app['state'] ?: 'Madhya Pradesh'); ?></div>
                        </td>

                        <!-- Qualification & Academic Snapshot -->
                        <td>
                            <div class="text-dark fw-semibold" style="font-size: 0.84rem;"><?php echo htmlspecialchars($app['highest_qualification'] ?: '12th Standard'); ?></div>
                            <div class="d-flex flex-wrap gap-1 mt-1">
                                <?php if (!empty($app['percentage'])): ?>
                                <span class="badge rounded-pill border px-2 py-0.5" style="background: rgba(212,175,55,0.12); color: #8a680a; font-size: 0.72rem; font-weight: 600;">
                                    <?php echo htmlspecialchars($app['percentage']); ?>
                                </span>
                                <?php endif; ?>
                                <?php if (!empty($app['passing_year'])): ?>
                                <span class="badge bg-light text-muted border rounded-pill px-1.5 py-0.5" style="font-size: 0.68rem;">
                                    <?php echo htmlspecialchars($app['passing_year']); ?>
                                </span>
                                <?php endif; ?>
                                <?php if (!empty($app['entrance_exam']) && $app['entrance_exam'] !== 'None / Direct Admission'): ?>
                                <span class="badge bg-primary bg-opacity-10 text-primary border rounded-pill px-1.5 py-0.5" style="font-size: 0.68rem;">
                                    <?php echo htmlspecialchars($app['entrance_exam']); ?>
                                </span>
                                <?php endif; ?>
                            </div>
                        </td>

                        <!-- Status Badge -->
                        <td class="text-center">
                            <span class="<?php echo $statusBadgeClass; ?>" style="font-size: 0.68rem; letter-spacing: 0.04em;">
                                <?php echo $statusLabel; ?>
                            </span>
                        </td>

                        <!-- Date -->
                        <td class="text-muted" style="font-size: 0.8rem; white-space: nowrap;">
                            <i class="fa-regular fa-calendar text-muted me-1"></i><?php echo date('d M Y', strtotime($app['created_at'])); ?>
                            <div style="font-size: 0.72rem;"><?php echo date('h:i A', strtotime($app['created_at'])); ?></div>
                        </td>

                        <!-- Actions -->
                        <td class="text-end pe-4">
                            <div class="d-inline-flex align-items-center gap-1.5">
                                <button type="button" class="btn btn-sm btn-outline-primary rounded-pill px-3 py-1 fw-semibold d-inline-flex align-items-center gap-1" data-bs-toggle="modal" data-bs-target="#appModal<?php echo $app['id']; ?>">
                                    <i class="fa-solid fa-eye text-xs"></i> Details
                                </button>
                                
                                <form method="POST" action="admissions_manager.php" class="d-inline" onsubmit="return confirm('Are you sure you want to permanently delete this application?');">
                                    <input type="hidden" name="action" value="delete">
                                    <input type="hidden" name="app_id" value="<?php echo $app['id']; ?>">
                                    <button type="submit" class="btn btn-sm btn-outline-danger rounded-circle p-0 d-inline-flex align-items-center justify-content-center" style="width: 30px; height: 30px;" title="Delete Record">
                                        <i class="fa-solid fa-trash text-xs"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>

                    <!-- Details & Counseling Modal -->
                    <div class="modal fade" id="appModal<?php echo $app['id']; ?>" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
                                <!-- Modal Header -->
                                <div class="modal-header py-3 px-4" style="background: linear-gradient(135deg, var(--admin-maroon-dark) 0%, var(--admin-maroon) 100%); color: white;">
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="icon-circle-gold" style="width: 36px; height: 36px; font-size: 0.95rem; background: rgba(212,175,55,0.2) !important;">
                                            <i class="fa-solid fa-id-card text-gold"></i>
                                        </div>
                                        <div>
                                            <h5 class="modal-title font-serif fw-bold mb-0 text-white">Application Details</h5>
                                            <span class="badge rounded-pill" style="background: rgba(255,255,255,0.15); font-size: 0.72rem; font-family: monospace;">
                                                #<?php echo htmlspecialchars($app['application_no']); ?>
                                            </span>
                                        </div>
                                    </div>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                
                                <form method="POST" action="admissions_manager.php">
                                    <input type="hidden" name="action" value="update_status">
                                    <input type="hidden" name="app_id" value="<?php echo $app['id']; ?>">

                                    <div class="modal-body p-4">
                                        <!-- Candidate Info Grid -->
                                        <div class="row g-3 mb-3">
                                            <div class="col-md-6">
                                                <div class="p-3 bg-light rounded-3 border">
                                                    <div class="text-muted small text-uppercase fw-bold" style="font-size: 0.7rem; letter-spacing: 0.05em;">Candidate Name</div>
                                                    <div class="fs-5 font-serif fw-bold text-dark mt-0.5"><?php echo htmlspecialchars($app['full_name']); ?></div>
                                                    <div class="small text-muted mt-0.5">Applied: <?php echo date('d M Y, h:i A', strtotime($app['created_at'])); ?></div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="p-3 bg-light rounded-3 border">
                                                    <div class="text-muted small text-uppercase fw-bold" style="font-size: 0.7rem; letter-spacing: 0.05em;">Selected Degree Program</div>
                                                    <div class="fs-6 fw-bold text-primary mt-0.5"><?php echo htmlspecialchars($app['course_name']); ?></div>
                                                    <span class="badge bg-white text-muted border rounded-pill px-2 py-0.5 mt-1" style="font-size: 0.7rem;">
                                                        <?php echo htmlspecialchars($app['program_type'] ?: 'Undergraduate'); ?>
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="p-3 bg-light rounded-3 border h-100">
                                                    <div class="text-muted small" style="font-size: 0.72rem;">Mobile Number</div>
                                                    <div class="fw-bold text-dark mt-0.5"><?php echo htmlspecialchars($app['mobile_no']); ?></div>
                                                    <div class="d-flex gap-1.5 mt-2">
                                                        <a href="tel:<?php echo htmlspecialchars($app['mobile_no']); ?>" class="btn btn-xs btn-outline-primary rounded-pill px-2.5 py-1 small flex-grow-1" style="font-size: 0.72rem;">
                                                            <i class="fa-solid fa-phone me-1"></i> Call
                                                        </a>
                                                        <a href="https://wa.me/91<?php echo $cleanPhone; ?>?text=Hello%20<?php echo urlencode($app['full_name']); ?>,%20regarding%20your%20admission%20inquiry%20at%20AKU%20Indore" target="_blank" class="btn btn-xs btn-success rounded-pill px-2.5 py-1 small flex-grow-1" style="font-size: 0.72rem;">
                                                            <i class="fa-brands fa-whatsapp me-1"></i> Chat
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="p-3 bg-light rounded-3 border h-100">
                                                    <div class="text-muted small" style="font-size: 0.72rem;">Email Address</div>
                                                    <div class="fw-bold text-dark small text-truncate mt-0.5" title="<?php echo htmlspecialchars($app['email']); ?>"><?php echo htmlspecialchars($app['email']); ?></div>
                                                    <div class="text-muted small mt-2" style="font-size: 0.75rem;">
                                                        DOB: <strong><?php echo htmlspecialchars($app['dob'] ?: 'Not Specified'); ?></strong> | Gender: <strong><?php echo htmlspecialchars($app['gender'] ?: 'N/A'); ?></strong>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="p-3 bg-light rounded-3 border h-100">
                                                    <div class="text-muted small" style="font-size: 0.72rem;">Location / Residence</div>
                                                    <div class="fw-bold text-dark mt-0.5"><?php echo htmlspecialchars($app['city'] ?: 'Indore'); ?></div>
                                                    <div class="text-muted small" style="font-size: 0.75rem;"><?php echo htmlspecialchars($app['state'] ?: 'Madhya Pradesh'); ?></div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Candidate Academic Background & Scores (Full Dossier) -->
                                        <div class="card border rounded-3 p-3.5 bg-white mb-3 shadow-xs" style="border-color: #ebdcd4 !important;">
                                            <div class="d-flex align-items-center justify-content-between mb-2.5 pb-2 border-bottom">
                                                <div class="d-flex align-items-center gap-2">
                                                    <i class="fa-solid fa-graduation-cap text-primary"></i>
                                                    <span class="fw-bold text-dark small text-uppercase" style="letter-spacing: 0.05em; font-size: 0.75rem;">Academic Background &amp; Eligibility</span>
                                                </div>
                                                <span class="badge bg-gold text-dark fw-bold rounded-pill px-2.5 py-1" style="font-size: 0.7rem;">
                                                    Passing: <?php echo htmlspecialchars($app['passing_year'] ?: 'N/A'); ?>
                                                </span>
                                            </div>

                                            <div class="row g-2.5">
                                                <div class="col-md-6">
                                                    <div class="p-2.5 bg-light rounded-2 border">
                                                        <div class="text-muted" style="font-size: 0.7rem;">Qualifying Exam Passed</div>
                                                        <div class="fw-bold text-dark small mt-0.5"><?php echo htmlspecialchars($app['highest_qualification'] ?: '12th Standard'); ?></div>
                                                        <?php if (!empty($app['stream_subject'])): ?>
                                                        <div class="text-muted small" style="font-size: 0.72rem;">Stream: <strong><?php echo htmlspecialchars($app['stream_subject']); ?></strong></div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="p-2.5 bg-light rounded-2 border">
                                                        <div class="text-muted" style="font-size: 0.7rem;">Aggregate Marks / CGPA</div>
                                                        <div class="fw-bold text-primary fs-6 mt-0.5"><?php echo htmlspecialchars($app['percentage'] ?: 'Awaited / Not Provided'); ?></div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="p-2.5 bg-light rounded-2 border">
                                                        <div class="text-muted" style="font-size: 0.7rem;">School / College Attended</div>
                                                        <div class="fw-semibold text-dark small mt-0.5"><?php echo htmlspecialchars($app['institute_name'] ?: 'Not Provided'); ?></div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="p-2.5 bg-light rounded-2 border">
                                                        <div class="text-muted" style="font-size: 0.7rem;">Board / University</div>
                                                        <div class="fw-semibold text-dark small mt-0.5"><?php echo htmlspecialchars($app['board_university'] ?: 'Not Provided'); ?></div>
                                                    </div>
                                                </div>

                                                <?php if (!empty($app['entrance_exam']) && $app['entrance_exam'] !== 'None / Direct Admission'): ?>
                                                <div class="col-12">
                                                    <div class="p-2.5 rounded-2 border d-flex align-items-center justify-content-between" style="background: rgba(112, 0, 24, 0.04); border-color: rgba(112, 0, 24, 0.15) !important;">
                                                        <div>
                                                            <span class="text-muted small" style="font-size: 0.72rem;">Competitive Entrance Exam:</span>
                                                            <strong class="text-primary small ms-1"><?php echo htmlspecialchars($app['entrance_exam']); ?></strong>
                                                        </div>
                                                        <?php if (!empty($app['entrance_score'])): ?>
                                                        <div>
                                                            <span class="text-muted small" style="font-size: 0.72rem;">Score / Rank:</span>
                                                            <strong class="text-dark small ms-1"><?php echo htmlspecialchars($app['entrance_score']); ?></strong>
                                                        </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                        <?php if (!empty($app['message'])): ?>
                                        <div class="p-3 rounded-3 border mb-3" style="background: rgba(212,175,55,0.06); border-color: rgba(212,175,55,0.3) !important;">
                                            <div class="text-gold small text-uppercase fw-bold" style="font-size: 0.7rem; letter-spacing: 0.05em;">
                                                <i class="fa-regular fa-comment-dots me-1"></i> Student Query / Facilities Requested
                                            </div>
                                            <div class="small text-dark mt-1" style="line-height: 1.6;"><?php echo nl2br(htmlspecialchars($app['message'])); ?></div>
                                        </div>
                                        <?php endif; ?>

                                        <hr class="my-3">

                                        <!-- Counselor Status & Admin Notes -->
                                        <div class="row g-3">
                                            <div class="col-md-5">
                                                <label class="form-label small fw-bold text-dark">
                                                    <i class="fa-solid fa-sliders text-primary me-1"></i> Update Admission Status
                                                </label>
                                                <select name="status" class="form-select">
                                                    <option value="new" <?php echo ($app['status'] === 'new') ? 'selected' : ''; ?>>🔥 New Lead / Inquiry</option>
                                                    <option value="contacted" <?php echo ($app['status'] === 'contacted') ? 'selected' : ''; ?>>📞 Counseling In Progress</option>
                                                    <option value="admitted" <?php echo ($app['status'] === 'admitted') ? 'selected' : ''; ?>>🎓 Admission Confirmed / Enrolled</option>
                                                    <option value="rejected" <?php echo ($app['status'] === 'rejected') ? 'selected' : ''; ?>>❌ Closed / Not Interested</option>
                                                </select>
                                            </div>
                                            
                                            <div class="col-md-7">
                                                <label class="form-label small fw-bold text-dark">
                                                    <i class="fa-solid fa-pen-to-square text-primary me-1"></i> Counselor Notes &amp; Remarks
                                                </label>
                                                <textarea name="admin_notes" class="form-control" rows="3" placeholder="Enter counseling feedback, scholarship discussion, follow-up dates, etc..."><?php echo htmlspecialchars($app['admin_notes'] ?? ''); ?></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer bg-light p-3 px-4">
                                        <button type="button" class="btn btn-sm btn-secondary rounded-pill px-3.5" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-sm btn-primary rounded-pill px-4">
                                            <i class="fa-solid fa-save me-1.5"></i> Save &amp; Update Record
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
