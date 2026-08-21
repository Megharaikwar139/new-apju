<?php
require_once 'auth.php';

$message = '';
$error = '';

// Handle Status Update or Notes
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    $inquiry_id = intval($_POST['inquiry_id'] ?? 0);

    if ($action === 'update_status' && $inquiry_id > 0) {
        $status = $_POST['status'] ?? 'unread';
        $admin_notes = trim($_POST['admin_notes'] ?? '');
        $stmt = $pdo->prepare("UPDATE contact_inquiries SET status = ?, admin_notes = ? WHERE id = ?");
        $stmt->execute([$status, $admin_notes, $inquiry_id]);
        $message = "Inquiry #{$inquiry_id} status updated successfully!";
    } elseif ($action === 'delete' && $inquiry_id > 0) {
        $stmt = $pdo->prepare("DELETE FROM contact_inquiries WHERE id = ?");
        $stmt->execute([$inquiry_id]);
        $message = "Inquiry #{$inquiry_id} deleted successfully!";
    } elseif ($action === 'bulk_delete' && !empty($_POST['selected_ids'])) {
        $ids = array_map('intval', $_POST['selected_ids']);
        if (!empty($ids)) {
            $inClause = implode(',', $ids);
            $pdo->query("DELETE FROM contact_inquiries WHERE id IN ($inClause)");
            $message = count($ids) . " inquiries deleted successfully!";
        }
    } elseif ($action === 'bulk_mark_read' && !empty($_POST['selected_ids'])) {
        $ids = array_map('intval', $_POST['selected_ids']);
        if (!empty($ids)) {
            $inClause = implode(',', $ids);
            $pdo->query("UPDATE contact_inquiries SET status = 'read' WHERE id IN ($inClause)");
            $message = count($ids) . " inquiries marked as read!";
        }
    }
}

// Filters & Search
$statusFilter = $_GET['status'] ?? '';
$deptFilter = $_GET['department'] ?? '';
$searchQuery = trim($_GET['search'] ?? '');

$where = [];
$params = [];

if (!empty($statusFilter)) {
    $where[] = "status = ?";
    $params[] = $statusFilter;
}

if (!empty($deptFilter)) {
    $where[] = "department = ?";
    $params[] = $deptFilter;
}

if (!empty($searchQuery)) {
    $where[] = "(name LIKE ? OR email LIKE ? OR phone LIKE ? OR subject LIKE ? OR message LIKE ?)";
    $term = "%{$searchQuery}%";
    $params[] = $term;
    $params[] = $term;
    $params[] = $term;
    $params[] = $term;
    $params[] = $term;
}

$whereSql = !empty($where) ? "WHERE " . implode(" AND ", $where) : "";

// Fetch counts for KPI cards
$totalCount = $pdo->query("SELECT COUNT(*) FROM contact_inquiries")->fetchColumn();
$unreadCount = $pdo->query("SELECT COUNT(*) FROM contact_inquiries WHERE status = 'unread'")->fetchColumn();
$readCount = $pdo->query("SELECT COUNT(*) FROM contact_inquiries WHERE status = 'read'")->fetchColumn();
$repliedCount = $pdo->query("SELECT COUNT(*) FROM contact_inquiries WHERE status = 'replied'")->fetchColumn();
$todayCount = $pdo->query("SELECT COUNT(*) FROM contact_inquiries WHERE DATE(created_at) = CURDATE()")->fetchColumn();

// Fetch Inquiries List
$stmt = $pdo->prepare("SELECT * FROM contact_inquiries {$whereSql} ORDER BY id DESC LIMIT 200");
$stmt->execute($params);
$inquiries = $stmt->fetchAll();

// Fetch distinct departments for filter
$departmentsList = $pdo->query("SELECT DISTINCT department FROM contact_inquiries WHERE department IS NOT NULL AND department != '' ORDER BY department ASC")->fetchAll(PDO::FETCH_COLUMN);

require_once 'header.php';
?>

<!-- Page Header & Action Bar -->
<div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">
    <div>
        <h3 class="font-serif fw-bold text-primary mb-1">
            <i class="fa-solid fa-envelope-open-text text-gold me-2"></i> Contact Inquiries &amp; Messages
        </h3>
        <p class="text-muted small mb-0">Manage incoming inquiries, contact form submissions, and administrative feedback from website visitors.</p>
    </div>
    <div class="d-flex align-items-center gap-2">
        <a href="../contact-us.php" target="_blank" class="btn btn-outline-primary btn-sm rounded-pill px-3 shadow-xs">
            <i class="fa-solid fa-arrow-up-right-from-square me-1"></i> View Live Contact Page
        </a>
        <a href="settings.php" class="btn btn-primary btn-sm rounded-pill px-3 shadow-sm">
            <i class="fa-solid fa-gear me-1"></i> Edit Contact Details &amp; Map
        </a>
    </div>
</div>

<?php if ($message): ?>
<div class="alert alert-success alert-dismissible fade show rounded-3 small fw-medium" role="alert">
    <i class="fa-solid fa-check-circle me-1.5"></i> <?php echo $message; ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php endif; ?>

<!-- Top KPI Summary Cards -->
<div class="row g-3 mb-4">
    <div class="col-sm-6 col-xl-3">
        <div class="card shadow-xs border-0 rounded-3 p-3 bg-white">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <span class="text-muted small text-uppercase fw-bold" style="font-size: 0.72rem; letter-spacing: 0.05em;">Total Inquiries</span>
                    <h3 class="fw-bold text-dark mt-1 mb-0"><?php echo number_format($totalCount); ?></h3>
                </div>
                <div class="icon-circle-badge bg-light text-primary" style="width: 46px; height: 46px; font-size: 1.2rem;">
                    <i class="fa-solid fa-inbox"></i>
                </div>
            </div>
            <div class="small text-muted mt-2 pt-2 border-top" style="font-size: 0.75rem;">
                <span class="text-primary fw-semibold"><?php echo $todayCount; ?> new</span> received today
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-xl-3">
        <div class="card shadow-xs border-0 rounded-3 p-3 bg-white">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <span class="text-muted small text-uppercase fw-bold" style="font-size: 0.72rem; letter-spacing: 0.05em;">Unread / Pending</span>
                    <h3 class="fw-bold text-danger mt-1 mb-0"><?php echo number_format($unreadCount); ?></h3>
                </div>
                <div class="icon-circle-badge" style="width: 46px; height: 46px; font-size: 1.2rem; background: rgba(220, 53, 69, 0.1); color: #dc3545;">
                    <i class="fa-solid fa-envelope"></i>
                </div>
            </div>
            <div class="small text-muted mt-2 pt-2 border-top" style="font-size: 0.75rem;">
                Requires administrative attention
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-xl-3">
        <div class="card shadow-xs border-0 rounded-3 p-3 bg-white">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <span class="text-muted small text-uppercase fw-bold" style="font-size: 0.72rem; letter-spacing: 0.05em;">Reviewed / In Progress</span>
                    <h3 class="fw-bold text-primary mt-1 mb-0"><?php echo number_format($readCount); ?></h3>
                </div>
                <div class="icon-circle-badge" style="width: 46px; height: 46px; font-size: 1.2rem; background: rgba(13, 110, 253, 0.1); color: #0d6efd;">
                    <i class="fa-solid fa-envelope-open"></i>
                </div>
            </div>
            <div class="small text-muted mt-2 pt-2 border-top" style="font-size: 0.75rem;">
                Opened and viewed by staff
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-xl-3">
        <div class="card shadow-xs border-0 rounded-3 p-3 bg-white">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <span class="text-muted small text-uppercase fw-bold" style="font-size: 0.72rem; letter-spacing: 0.05em;">Replied / Resolved</span>
                    <h3 class="fw-bold text-success mt-1 mb-0"><?php echo number_format($repliedCount); ?></h3>
                </div>
                <div class="icon-circle-badge" style="width: 46px; height: 46px; font-size: 1.2rem; background: rgba(25, 135, 84, 0.1); color: #198754;">
                    <i class="fa-solid fa-circle-check"></i>
                </div>
            </div>
            <div class="small text-muted mt-2 pt-2 border-top" style="font-size: 0.75rem;">
                Completed inquiries
            </div>
        </div>
    </div>
</div>

<!-- Search & Filter Bar -->
<div class="card shadow-sm border-0 mb-4">
    <div class="card-body p-3">
        <form method="GET" class="row g-2 align-items-center">
            <div class="col-md-4">
                <div class="input-group input-group-sm">
                    <span class="input-group-text bg-light border-end-0"><i class="fa-solid fa-magnifying-glass text-muted"></i></span>
                    <input type="text" name="search" class="form-control border-start-0" placeholder="Search by name, email, phone, keyword..." value="<?php echo htmlspecialchars($searchQuery); ?>">
                </div>
            </div>

            <div class="col-md-3">
                <select name="status" class="form-select form-select-sm" onchange="this.form.submit()">
                    <option value="">All Statuses (<?php echo $totalCount; ?>)</option>
                    <option value="unread" <?php echo ($statusFilter === 'unread') ? 'selected' : ''; ?>>Unread / New (<?php echo $unreadCount; ?>)</option>
                    <option value="read" <?php echo ($statusFilter === 'read') ? 'selected' : ''; ?>>Reviewed / Read (<?php echo $readCount; ?>)</option>
                    <option value="replied" <?php echo ($statusFilter === 'replied') ? 'selected' : ''; ?>>Replied / Resolved (<?php echo $repliedCount; ?>)</option>
                </select>
            </div>

            <div class="col-md-3">
                <select name="department" class="form-select form-select-sm" onchange="this.form.submit()">
                    <option value="">All Departments / Topics</option>
                    <?php foreach ($departmentsList as $dept): ?>
                        <option value="<?php echo htmlspecialchars($dept); ?>" <?php echo ($deptFilter === $dept) ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars($dept); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="col-md-2 d-flex gap-2">
                <button type="submit" class="btn btn-primary btn-sm rounded-pill w-100 fw-semibold">
                    <i class="fa-solid fa-filter me-1"></i> Filter
                </button>
                <?php if ($statusFilter || $deptFilter || $searchQuery): ?>
                    <a href="contact_manager.php" class="btn btn-outline-secondary btn-sm rounded-pill px-2.5" title="Reset Filters">
                        <i class="fa-solid fa-rotate-left"></i>
                    </a>
                <?php endif; ?>
            </div>
        </form>
    </div>
</div>

<!-- Inquiries Table Card -->
<form method="POST" id="bulkForm" onsubmit="return confirmBulkAction();">
    <div class="card shadow-sm border-0 mb-5">
        
        <div class="card-header bg-white py-3 d-flex align-items-center justify-content-between flex-wrap gap-2 border-bottom">
            <div class="d-flex align-items-center gap-2">
                <h5 class="font-serif fw-bold text-primary m-0">Inquiry Records</h5>
                <span class="badge bg-light text-dark rounded-pill border px-2.5"><?php echo count($inquiries); ?> Showing</span>
            </div>
            
            <div class="d-flex align-items-center gap-2">
                <input type="hidden" name="action" id="bulkActionInput" value="">
                <button type="button" onclick="submitBulk('bulk_mark_read')" class="btn btn-sm btn-outline-primary rounded-pill px-3">
                    <i class="fa-solid fa-check-double me-1"></i> Mark Selected Read
                </button>
                <button type="button" onclick="submitBulk('bulk_delete')" class="btn btn-sm btn-outline-danger rounded-pill px-3">
                    <i class="fa-solid fa-trash-can me-1"></i> Delete Selected
                </button>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0" style="font-size: 0.88rem;">
                <thead class="table-light">
                    <tr>
                        <th style="width: 40px;" class="text-center">
                            <input type="checkbox" id="selectAll" class="form-check-input" onclick="toggleSelectAll(this)">
                        </th>
                        <th style="width: 70px;">Ref #</th>
                        <th style="width: 220px;">Sender Details</th>
                        <th style="width: 170px;">Department / Topic</th>
                        <th>Subject &amp; Message Snippet</th>
                        <th style="width: 120px;" class="text-center">Status</th>
                        <th style="width: 140px;" class="text-center">Received Date</th>
                        <th style="width: 120px;" class="text-end pe-3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($inquiries)): ?>
                        <tr>
                            <td colspan="8" class="text-center py-5 text-muted">
                                <div class="py-3">
                                    <i class="fa-regular fa-envelope-open fs-1 text-muted opacity-50 mb-3 d-block"></i>
                                    <h6 class="fw-bold text-dark">No Contact Inquiries Found</h6>
                                    <p class="small text-muted mb-0">Try changing your search filters or check back when new inquiries are submitted.</p>
                                </div>
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($inquiries as $inq): 
                            $refId = "AKU-INQ-" . str_pad($inq['id'], 5, "0", STR_PAD_LEFT);
                            $st = $inq['status'] ?? 'unread';
                            
                            $badgeClass = 'bg-danger-subtle text-danger border border-danger-subtle';
                            $statusLabel = 'Unread';
                            if ($st === 'read') {
                                $badgeClass = 'bg-primary-subtle text-primary border border-primary-subtle';
                                $statusLabel = 'Reviewed';
                            } elseif ($st === 'replied') {
                                $badgeClass = 'bg-success-subtle text-success border border-success-subtle';
                                $statusLabel = 'Replied';
                            }

                            $phoneClean = preg_replace('/[^0-9]/', '', $inq['phone'] ?? '');
                        ?>
                        <tr class="<?php echo ($st === 'unread') ? 'table-warning-subtle fw-medium' : ''; ?>">
                            <td class="text-center">
                                <input type="checkbox" name="selected_ids[]" value="<?php echo $inq['id']; ?>" class="form-check-input row-checkbox">
                            </td>
                            <td>
                                <span class="badge bg-light text-dark border font-monospace" style="font-size: 0.72rem;">
                                    <?php echo $refId; ?>
                                </span>
                            </td>
                            <td>
                                <div class="fw-bold text-dark"><?php echo htmlspecialchars($inq['name']); ?></div>
                                <div class="small">
                                    <a href="mailto:<?php echo htmlspecialchars($inq['email']); ?>" class="text-muted text-decoration-none hover-primary">
                                        <i class="fa-solid fa-envelope text-gold me-1"></i> <?php echo htmlspecialchars($inq['email']); ?>
                                    </a>
                                </div>
                                <?php if (!empty($inq['phone'])): ?>
                                <div class="small">
                                    <a href="tel:<?php echo htmlspecialchars($inq['phone']); ?>" class="text-muted text-decoration-none">
                                        <i class="fa-solid fa-phone text-gold me-1"></i> <?php echo htmlspecialchars($inq['phone']); ?>
                                    </a>
                                    <?php if (!empty($phoneClean)): ?>
                                    <a href="https://wa.me/<?php echo (strlen($phoneClean) == 10 ? '91' . $phoneClean : $phoneClean); ?>" target="_blank" class="text-success ms-1" title="Chat on WhatsApp">
                                        <i class="fa-brands fa-whatsapp"></i>
                                    </a>
                                    <?php endif; ?>
                                </div>
                                <?php endif; ?>
                            </td>
                            <td>
                                <span class="badge rounded-pill bg-light text-dark border px-2.5 py-1" style="font-size: 0.75rem;">
                                    <?php echo htmlspecialchars($inq['department'] ?: 'General'); ?>
                                </span>
                            </td>
                            <td>
                                <div class="fw-semibold text-primary mb-1">
                                    <?php echo htmlspecialchars($inq['subject']); ?>
                                </div>
                                <div class="text-muted small text-truncate" style="max-width: 320px; line-height: 1.4;">
                                    <?php echo htmlspecialchars(mb_strimwidth($inq['message'], 0, 110, '...')); ?>
                                </div>
                            </td>
                            <td class="text-center">
                                <span class="badge rounded-pill px-2.5 py-1 small fw-semibold <?php echo $badgeClass; ?>">
                                    <?php echo $statusLabel; ?>
                                </span>
                            </td>
                            <td class="text-center small text-muted" style="font-size: 0.78rem;">
                                <div><?php echo date('d M Y', strtotime($inq['created_at'])); ?></div>
                                <div class="text-muted" style="font-size: 0.72rem;"><?php echo date('h:i A', strtotime($inq['created_at'])); ?></div>
                            </td>
                            <td class="text-end pe-3">
                                <button type="button" class="btn btn-sm btn-outline-primary rounded-pill px-2.5 py-1" onclick="openViewModal(<?php echo htmlspecialchars(json_encode($inq)); ?>)" title="View Full Message">
                                    <i class="fa-solid fa-eye"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-outline-danger rounded-pill px-2.5 py-1 ms-1" onclick="confirmDelete(<?php echo $inq['id']; ?>)" title="Delete Inquiry">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</form>

<!-- Single Delete Form (Hidden) -->
<form id="singleDeleteForm" method="POST" style="display:none;">
    <input type="hidden" name="action" value="delete">
    <input type="hidden" name="inquiry_id" id="deleteInquiryId" value="">
</form>

<!-- View & Manage Inquiry Modal -->
<div class="modal fade" id="inquiryModal" tabindex="-1" aria-labelledby="inquiryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content rounded-4 border-0 shadow">
            
            <div class="modal-header">
                <h5 class="modal-title fs-5" id="inquiryModalLabel">
                    <i class="fa-solid fa-envelope-circle-check text-gold me-2"></i> Inquiry Details <span id="modalRefBadge" class="badge bg-gold text-dark fs-6 ms-2"></span>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form method="POST" action="contact_manager.php">
                <input type="hidden" name="action" value="update_status">
                <input type="hidden" name="inquiry_id" id="modalInquiryId" value="">

                <div class="modal-body p-4">
                    
                    <!-- Sender Details Grid -->
                    <div class="row g-3 p-3 rounded-3 bg-light border border-custom mb-4">
                        <div class="col-md-4">
                            <span class="text-muted small text-uppercase fw-bold d-block" style="font-size: 0.72rem;">Sender Name</span>
                            <span id="modalSenderName" class="fw-bold text-dark"></span>
                        </div>
                        <div class="col-md-4">
                            <span class="text-muted small text-uppercase fw-bold d-block" style="font-size: 0.72rem;">Email Address</span>
                            <a id="modalSenderEmailLink" href="" class="text-primary fw-semibold small text-decoration-none">
                                <span id="modalSenderEmail"></span>
                            </a>
                        </div>
                        <div class="col-md-4">
                            <span class="text-muted small text-uppercase fw-bold d-block" style="font-size: 0.72rem;">Phone / Mobile</span>
                            <span id="modalSenderPhone" class="fw-semibold text-dark small"></span>
                        </div>
                        <div class="col-md-4">
                            <span class="text-muted small text-uppercase fw-bold d-block" style="font-size: 0.72rem;">Department / Topic</span>
                            <span id="modalDepartment" class="badge bg-white text-dark border px-2 py-1"></span>
                        </div>
                        <div class="col-md-4">
                            <span class="text-muted small text-uppercase fw-bold d-block" style="font-size: 0.72rem;">Submitted Date &amp; Time</span>
                            <span id="modalCreatedAt" class="small text-dark"></span>
                        </div>
                        <div class="col-md-4">
                            <span class="text-muted small text-uppercase fw-bold d-block" style="font-size: 0.72rem;">IP Address</span>
                            <span id="modalIpAddress" class="small font-monospace text-muted"></span>
                        </div>
                    </div>

                    <!-- Subject & Full Message Body -->
                    <div class="mb-4">
                        <label class="form-label small fw-bold text-uppercase text-muted" style="font-size: 0.75rem; letter-spacing: 0.08em;">
                            Subject
                        </label>
                        <div id="modalSubject" class="p-2.5 rounded-3 bg-light border border-custom fw-bold text-primary"></div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label small fw-bold text-uppercase text-muted" style="font-size: 0.75rem; letter-spacing: 0.08em;">
                            Full Inquirer Message
                        </label>
                        <div id="modalMessage" class="p-3.5 rounded-3 bg-white border border-custom" style="min-height: 120px; line-height: 1.7; white-space: pre-wrap; color: #2b1f20;"></div>
                    </div>

                    <!-- Fast Quick Action Links -->
                    <div class="d-flex align-items-center gap-2 mb-4 pb-3 border-bottom border-custom">
                        <a id="modalReplyMailBtn" href="" class="btn btn-sm btn-outline-primary rounded-pill px-3 fw-semibold">
                            <i class="fa-solid fa-reply me-1"></i> Reply via Email
                        </a>
                        <a id="modalWhatsAppBtn" href="" target="_blank" class="btn btn-sm btn-outline-success rounded-pill px-3 fw-semibold">
                            <i class="fa-brands fa-whatsapp me-1"></i> WhatsApp Message
                        </a>
                    </div>

                    <!-- Admin Status Update & Notes -->
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label small fw-bold text-uppercase text-muted" style="font-size: 0.75rem; letter-spacing: 0.08em;">
                                Status
                            </label>
                            <select name="status" id="modalStatusSelect" class="form-select">
                                <option value="unread">Unread / Pending</option>
                                <option value="read">Reviewed / Read</option>
                                <option value="replied">Replied / Resolved</option>
                            </select>
                        </div>
                        <div class="col-md-8">
                            <label class="form-label small fw-bold text-uppercase text-muted" style="font-size: 0.75rem; letter-spacing: 0.08em;">
                                Internal Administrative Notes
                            </label>
                            <input type="text" name="admin_notes" id="modalAdminNotes" class="form-control" placeholder="e.g. Called candidate on 21 Aug, sent syllabus PDF...">
                        </div>
                    </div>

                </div>

                <div class="modal-footer bg-light px-4 py-3">
                    <button type="button" class="btn btn-outline-secondary rounded-pill px-4" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary rounded-pill px-5 fw-semibold shadow-sm">
                        <i class="fa-solid fa-save me-1"></i> Update Status &amp; Notes
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>

<script>
function toggleSelectAll(master) {
    const checkboxes = document.querySelectorAll('.row-checkbox');
    checkboxes.forEach(cb => cb.checked = master.checked);
}

function submitBulk(actionType) {
    const checked = document.querySelectorAll('.row-checkbox:checked');
    if (checked.length === 0) {
        alert('Please select at least one inquiry first.');
        return;
    }
    
    let msg = 'Are you sure you want to perform this action on ' + checked.length + ' selected items?';
    if (actionType === 'bulk_delete') {
        msg = 'WARNING: Are you sure you want to permanently DELETE ' + checked.length + ' inquiries?';
    }
    
    if (confirm(msg)) {
        document.getElementById('bulkActionInput').value = actionType;
        document.getElementById('bulkForm').submit();
    }
}

function confirmBulkAction() {
    return true;
}

function confirmDelete(id) {
    if (confirm('Are you sure you want to permanently delete inquiry #' + id + '?')) {
        document.getElementById('deleteInquiryId').value = id;
        document.getElementById('singleDeleteForm').submit();
    }
}

function openViewModal(inq) {
    const ref = 'AKU-INQ-' + String(inq.id).padStart(5, '0');
    document.getElementById('modalInquiryId').value = inq.id;
    document.getElementById('modalRefBadge').innerText = ref;
    document.getElementById('modalSenderName').innerText = inq.name || 'N/A';
    document.getElementById('modalSenderEmail').innerText = inq.email || 'N/A';
    document.getElementById('modalSenderEmailLink').href = 'mailto:' + encodeURIComponent(inq.email) + '?subject=' + encodeURIComponent('Re: ' + (inq.subject || 'Your inquiry at Dr. APJ Abdul Kalam University'));
    document.getElementById('modalSenderPhone').innerText = inq.phone || 'N/A';
    document.getElementById('modalDepartment').innerText = inq.department || 'General Inquiry';
    document.getElementById('modalCreatedAt').innerText = inq.created_at || 'N/A';
    document.getElementById('modalIpAddress').innerText = inq.ip_address || 'N/A';
    document.getElementById('modalSubject').innerText = inq.subject || 'No Subject';
    document.getElementById('modalMessage').innerText = inq.message || '';
    document.getElementById('modalStatusSelect').value = inq.status || 'unread';
    document.getElementById('modalAdminNotes').value = inq.admin_notes || '';

    // Reply buttons
    document.getElementById('modalReplyMailBtn').href = 'mailto:' + encodeURIComponent(inq.email) + '?subject=' + encodeURIComponent('Re: ' + (inq.subject || 'Your inquiry at Dr. APJ Abdul Kalam University'));
    
    let rawPhone = (inq.phone || '').replace(/[^0-9]/g, '');
    if (rawPhone) {
        let waNumber = rawPhone.length === 10 ? '91' + rawPhone : rawPhone;
        document.getElementById('modalWhatsAppBtn').href = 'https://wa.me/' + waNumber + '?text=' + encodeURIComponent('Hello ' + inq.name + ', regarding your inquiry at Dr. APJ Abdul Kalam University:');
        document.getElementById('modalWhatsAppBtn').style.display = 'inline-flex';
    } else {
        document.getElementById('modalWhatsAppBtn').style.display = 'none';
    }

    const modal = new bootstrap.Modal(document.getElementById('inquiryModal'));
    modal.show();
}
</script>

<?php require_once 'footer.php'; ?>
