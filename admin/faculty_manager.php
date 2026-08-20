<?php
require_once 'auth.php';

// Department List
$deptList = [
    'department-of-civil-engineering' => 'Department of Civil Engineering',
    'department-of-computer-science-engineering' => 'Department of Computer Science & Engineering',
    'department-of-information-technology' => 'Department of Information Technology',
    'department-of-electrical-electronics-engineering' => 'Department of Electrical & Electronics Engineering',
    'department-of-mechanical-engineering' => 'Department of Mechanical Engineering',
    'department-of-management-studies' => 'Department of Management Studies',
    'department-of-management-studies-coe' => 'Department of Management Studies (COE)',
    'department-of-computer-applications-coe' => 'Department of Computer Applications (COE)',
    'department-of-commerce' => 'Department of Commerce',
    'department-of-law' => 'College of Legal Studies (Law)',
    'department-of-agriculture' => 'School of Agricultural Sciences',
    'department-of-science' => 'Department of Science',
    'department-of-education' => 'College of Education',
    'department-of-arts' => 'Department of Arts & Social Sciences',
    'department-of-pharmacy' => 'Department of Pharmacy (COP)',
    'department-of-pharmacy-sop' => 'School of Pharmacy (SOP)',
    'department-of-pharmacy-iop' => 'Department of Pharmacy (IOP)',
    'department-of-civil-engineering-soe' => 'Department of Civil Engineering (SOE)',
    'department-of-computer-science-engineering-soe' => 'Department of Computer Science & Engineering (SOE)',
    'department-of-electrical-electronics-engineering-soe' => 'Department of Electrical & Electronics Engineering (SOE)',
    'department-of-mechanical-engineering-soe' => 'Department of Mechanical Engineering (SOE)',
    'department-of-civil-engineering-polytechnic' => 'Department of Civil Engineering (Polytechnic)',
    'department-of-mechanical-engineering-polytechnic' => 'Department of Mechanical Engineering (Polytechnic)',
    'diploma-in-enginering' => 'Diploma in Engineering',
    'college-of-pharmacy' => 'College of Pharmacy',
    'institute-of-pharmacy' => 'Institute of Pharmacy',
    'school-of-business-administration-management' => 'School of Business Administration & Management'
];

$message = '';
$error = '';

// Handle POST actions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    $id = $_POST['id'] ?? null;
    $dept_slug = trim($_POST['department_slug'] ?? '');
    $name = trim($_POST['faculty_name'] ?? '');
    $designation = trim($_POST['designation'] ?? '');
    $qualification = trim($_POST['qualification'] ?? '');
    $experience = trim($_POST['experience'] ?? '');
    $sort_order = intval($_POST['sort_order'] ?? 0);
    $status = isset($_POST['status']) ? 1 : 0;
    
    // Handle File Upload if provided
    $image_path = $_POST['existing_image'] ?? '';
    if (!empty($_FILES['image_file']['name'])) {
        $file = $_FILES['image_file'];
        $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        $allowed = ['jpg', 'jpeg', 'png', 'webp', 'avif'];
        
        if (in_array($ext, $allowed)) {
            $uploadDir = '../uploads/faculty/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }
            $filename = 'faculty_' . time() . '_' . rand(1000, 9999) . '.' . $ext;
            $destination = $uploadDir . $filename;
            
            if (move_uploaded_file($file['tmp_name'], $destination)) {
                $image_path = 'uploads/faculty/' . $filename;
            } else {
                $error = 'Failed to upload photo.';
            }
        } else {
            $error = 'Invalid image format. Allowed formats: JPG, PNG, WEBP.';
        }
    }
    
    if (empty($error)) {
        if ($action === 'save') {
            if ($id) {
                $stmt = $pdo->prepare("
                    UPDATE department_faculty 
                    SET department_slug = ?, faculty_name = ?, designation = ?, qualification = ?, experience = ?, image_path = ?, sort_order = ?, status = ?
                    WHERE id = ?
                ");
                $stmt->execute([$dept_slug, $name, $designation, $qualification, $experience, $image_path, $sort_order, $status, $id]);
                $message = 'Faculty member updated successfully!';
            } else {
                $stmt = $pdo->prepare("
                    INSERT INTO department_faculty (department_slug, faculty_name, designation, qualification, experience, image_path, sort_order, status)
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?)
                ");
                $stmt->execute([$dept_slug, $name, $designation, $qualification, $experience, $image_path, $sort_order, $status]);
                $message = 'New faculty member added successfully!';
            }
        } elseif ($action === 'delete' && $id) {
            $stmt = $pdo->prepare("DELETE FROM department_faculty WHERE id = ?");
            $stmt->execute([$id]);
            $message = 'Faculty member deleted successfully!';
        } elseif ($action === 'toggle_status' && $id) {
            $stmt = $pdo->prepare("UPDATE department_faculty SET status = 1 - status WHERE id = ?");
            $stmt->execute([$id]);
            $message = 'Status toggled successfully!';
        }
    }
}

// Filters
$filter_dept = $_GET['dept'] ?? '';
$search_q = trim($_GET['q'] ?? '');

$sql = "SELECT * FROM department_faculty WHERE 1=1";
$params = [];

if (!empty($filter_dept)) {
    $sql .= " AND department_slug = ?";
    $params[] = $filter_dept;
}

if (!empty($search_q)) {
    $sql .= " AND (faculty_name LIKE ? OR designation LIKE ? OR qualification LIKE ?)";
    $params[] = "%$search_q%";
    $params[] = "%$search_q%";
    $params[] = "%$search_q%";
}

$sql .= " ORDER BY department_slug ASC, sort_order ASC, id ASC";
$stmt = $pdo->prepare($sql);
$stmt->execute($params);
$facultyList = $stmt->fetchAll();

// Counts for Stats
$totalCount = $pdo->query("SELECT COUNT(*) FROM department_faculty")->fetchColumn();
$activeCount = $pdo->query("SELECT COUNT(*) FROM department_faculty WHERE status = 1")->fetchColumn();
$deptCount = $pdo->query("SELECT COUNT(DISTINCT department_slug) FROM department_faculty")->fetchColumn();

require_once 'header.php';
?>

<div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-4">
    <div>
        <h3 class="font-serif fw-bold text-primary mb-1">Department Faculty & Staff Manager</h3>
        <p class="text-muted small mb-0">Manage professors, lecturers, HODs, qualifications, and profile photos across all 27 academic departments.</p>
    </div>
    <button class="btn btn-primary rounded-pill btn-sm px-3 shadow-sm" data-bs-toggle="modal" data-bs-target="#facultyModal" onclick="openAddModal()">
        <i class="fa-solid fa-user-plus me-1.5"></i> Add New Faculty
    </button>
</div>

<!-- Stats Row -->
<div class="row g-3 mb-4">
    <div class="col-md-4">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <p>Total Faculty Members</p>
                    <h3><?php echo $totalCount; ?></h3>
                </div>
                <i class="fa-solid fa-users text-gold fs-1 opacity-50"></i>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <p>Active Profiles</p>
                    <h3 class="text-success"><?php echo $activeCount; ?></h3>
                </div>
                <i class="fa-solid fa-user-check text-success fs-1 opacity-50"></i>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <p>Departments Covered</p>
                    <h3 class="text-primary"><?php echo $deptCount; ?> / 27</h3>
                </div>
                <i class="fa-solid fa-building-columns text-primary fs-1 opacity-50"></i>
            </div>
        </div>
    </div>
</div>

<?php if ($message): ?>
<div class="alert alert-success alert-dismissible fade show rounded-3 small fw-medium" role="alert">
    <i class="fa-solid fa-check-circle me-1.5"></i> <?php echo $message; ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php endif; ?>

<?php if ($error): ?>
<div class="alert alert-danger alert-dismissible fade show rounded-3 small fw-medium" role="alert">
    <i class="fa-solid fa-circle-exclamation me-1.5"></i> <?php echo $error; ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php endif; ?>

<!-- Filter & Search Bar -->
<div class="card shadow-sm border-0 mb-4">
    <div class="card-body p-3">
        <form method="GET" class="row g-2 align-items-center">
            <div class="col-md-5">
                <select name="dept" class="form-select form-select-sm" onchange="this.form.submit()">
                    <option value="">-- All Academic Departments (<?php echo $totalCount; ?>) --</option>
                    <?php foreach ($deptList as $slug => $label): ?>
                    <option value="<?php echo $slug; ?>" <?php echo ($filter_dept === $slug) ? 'selected' : ''; ?>>
                        <?php echo htmlspecialchars($label); ?>
                    </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-5">
                <div class="input-group input-group-sm">
                    <span class="input-group-text bg-white"><i class="fa-solid fa-search text-muted"></i></span>
                    <input type="text" name="q" class="form-control" placeholder="Search faculty name, designation, qualification..." value="<?php echo htmlspecialchars($search_q); ?>">
                </div>
            </div>
            <div class="col-md-2 d-flex gap-1">
                <button type="submit" class="btn btn-sm btn-primary w-100">Filter</button>
                <?php if ($filter_dept || $search_q): ?>
                <a href="faculty_manager.php" class="btn btn-sm btn-outline-secondary" title="Reset Filters"><i class="fa-solid fa-rotate-left"></i></a>
                <?php endif; ?>
            </div>
        </form>
    </div>
</div>

<!-- Table Card -->
<div class="card shadow-sm border-0">
    <div class="card-header bg-white d-flex justify-content-between align-items-center">
        <span class="fw-bold"><i class="fa-solid fa-list me-1.5 text-gold"></i> Faculty Profiles List</span>
        <span class="badge bg-light text-dark border"><?php echo count($facultyList); ?> Profiles Found</span>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light small text-uppercase">
                    <tr>
                        <th class="ps-4" style="width: 70px;">Avatar</th>
                        <th>Faculty Name</th>
                        <th>Designation</th>
                        <th>Qualification &amp; Exp</th>
                        <th>Department</th>
                        <th style="width: 80px;">Sort</th>
                        <th style="width: 90px;">Status</th>
                        <th class="text-end pe-4" style="width: 120px;">Actions</th>
                    </tr>
                </thead>
                <tbody class="small">
                    <?php if (empty($facultyList)): ?>
                    <tr>
                        <td colspan="8" class="text-center py-5 text-muted">
                            <i class="fa-solid fa-user-slash fs-1 d-block mb-2 opacity-50"></i>
                            No faculty members found for the selected criteria.
                        </td>
                    </tr>
                    <?php else: ?>
                    <?php foreach ($facultyList as $f): ?>
                    <tr>
                        <td class="ps-4">
                            <?php if (!empty($f['image_path']) && file_exists('../' . $f['image_path'])): ?>
                                <img src="../<?php echo htmlspecialchars($f['image_path']); ?>" alt="Profile" class="rounded-circle border" style="width: 44px; height: 44px; object-fit: cover;">
                            <?php else: ?>
                                <div class="icon-circle-badge" style="width: 44px; height: 44px;">
                                    <i class="fa-solid fa-user-graduate fs-5"></i>
                                </div>
                            <?php endif; ?>
                        </td>
                        <td>
                            <strong class="font-serif fs-6 text-primary"><?php echo htmlspecialchars($f['faculty_name']); ?></strong>
                        </td>
                        <td>
                            <span class="badge bg-light text-dark border"><?php echo htmlspecialchars($f['designation'] ?: 'Faculty Member'); ?></span>
                        </td>
                        <td>
                            <div class="lh-sm">
                                <div><?php echo htmlspecialchars($f['qualification'] ?: '-'); ?></div>
                                <?php if (!empty($f['experience'])): ?>
                                <small class="text-muted"><i class="fa-regular fa-clock me-1"></i><?php echo htmlspecialchars($f['experience']); ?></small>
                                <?php endif; ?>
                            </div>
                        </td>
                        <td>
                            <small class="text-muted fw-semibold"><?php echo htmlspecialchars($deptList[$f['department_slug']] ?? $f['department_slug']); ?></small>
                        </td>
                        <td>
                            <span class="badge bg-light text-muted border"><?php echo $f['sort_order']; ?></span>
                        </td>
                        <td>
                            <form method="POST" class="d-inline">
                                <input type="hidden" name="action" value="toggle_status">
                                <input type="hidden" name="id" value="<?php echo $f['id']; ?>">
                                <?php if ($f['status'] == 1): ?>
                                <button type="submit" class="btn btn-xs badge bg-success text-white border-0 px-2 py-1" style="font-size: 0.72rem; cursor: pointer;">Active</button>
                                <?php else: ?>
                                <button type="submit" class="btn btn-xs badge bg-secondary text-white border-0 px-2 py-1" style="font-size: 0.72rem; cursor: pointer;">Inactive</button>
                                <?php endif; ?>
                            </form>
                        </td>
                        <td class="text-end pe-4">
                            <button class="btn btn-sm btn-outline-primary rounded-circle p-0" style="width: 32px; height: 32px;" onclick='openEditModal(<?php echo json_encode($f, JSON_HEX_APOS | JSON_HEX_QUOT); ?>)' title="Edit Profile">
                                <i class="fa-solid fa-pen text-xs"></i>
                            </button>
                            <form method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this faculty member?');">
                                <input type="hidden" name="action" value="delete">
                                <input type="hidden" name="id" value="<?php echo $f['id']; ?>">
                                <button type="submit" class="btn btn-sm btn-outline-danger rounded-circle p-0 ms-1" style="width: 32px; height: 32px;" title="Delete Profile">
                                    <i class="fa-solid fa-trash text-xs"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Add / Edit Modal -->
<div class="modal fade" id="facultyModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0 shadow">
            <form method="POST" enctype="multipart/form-data">
                <input type="hidden" name="action" value="save">
                <input type="hidden" name="id" id="modal_id" value="">
                <input type="hidden" name="existing_image" id="modal_existing_image" value="">
                
                <div class="modal-header border-bottom">
                    <h5 class="modal-title font-serif fw-bold text-primary" id="modalTitle">Add New Faculty Member</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                
                <div class="modal-body p-4">
                    <div class="row g-3">
                        <div class="col-md-12">
                            <label class="form-label small fw-bold">Department <span class="text-danger">*</span></label>
                            <select name="department_slug" id="modal_dept_slug" class="form-select" required>
                                <option value="">-- Select Department --</option>
                                <?php foreach ($deptList as $slug => $label): ?>
                                <option value="<?php echo $slug; ?>"><?php echo htmlspecialchars($label); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        
                        <div class="col-md-6">
                            <label class="form-label small fw-bold">Faculty Name <span class="text-danger">*</span></label>
                            <input type="text" name="faculty_name" id="modal_name" class="form-control" placeholder="e.g. Dr. Ramesh Sharma / Ms. Priya Jain" required>
                        </div>
                        
                        <div class="col-md-6">
                            <label class="form-label small fw-bold">Designation <span class="text-danger">*</span></label>
                            <input type="text" name="designation" id="modal_designation" class="form-control" placeholder="e.g. Assistant Professor / HOD / Professor" required>
                        </div>
                        
                        <div class="col-md-8">
                            <label class="form-label small fw-bold">Qualifications</label>
                            <input type="text" name="qualification" id="modal_qualification" class="form-control" placeholder="e.g. B.E (Civil), M.Tech (Structural), Ph.D.">
                        </div>
                        
                        <div class="col-md-4">
                            <label class="form-label small fw-bold">Experience (Optional)</label>
                            <input type="text" name="experience" id="modal_experience" class="form-control" placeholder="e.g. 8 Years">
                        </div>
                        
                        <div class="col-md-6">
                            <label class="form-label small fw-bold">Upload Photo (Optional)</label>
                            <input type="file" name="image_file" class="form-control" accept="image/*">
                            <small class="text-muted" style="font-size: 0.75rem;">If no image is uploaded, a professional academic avatar icon will be displayed automatically.</small>
                        </div>
                        
                        <div class="col-md-3">
                            <label class="form-label small fw-bold">Sort Order</label>
                            <input type="number" name="sort_order" id="modal_sort_order" class="form-control" value="0">
                        </div>
                        
                        <div class="col-md-3 d-flex align-items-center pt-3">
                            <div class="form-check form-switch mt-2">
                                <input class="form-check-input" type="checkbox" name="status" id="modal_status" value="1" checked>
                                <label class="form-check-label small fw-bold" for="modal_status">Active Profile</label>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="modal-footer border-top bg-light">
                    <button type="button" class="btn btn-sm btn-outline-secondary rounded-pill px-3" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-sm btn-primary rounded-pill px-4">Save Faculty</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function openAddModal() {
    document.getElementById('modalTitle').innerText = 'Add New Faculty Member';
    document.getElementById('modal_id').value = '';
    document.getElementById('modal_existing_image').value = '';
    document.getElementById('modal_name').value = '';
    document.getElementById('modal_designation').value = '';
    document.getElementById('modal_qualification').value = '';
    document.getElementById('modal_experience').value = '';
    document.getElementById('modal_sort_order').value = '0';
    document.getElementById('modal_status').checked = true;
    
    const currentDeptFilter = "<?php echo addslashes($filter_dept); ?>";
    if (currentDeptFilter) {
        document.getElementById('modal_dept_slug').value = currentDeptFilter;
    } else {
        document.getElementById('modal_dept_slug').value = '';
    }
}

function openEditModal(faculty) {
    document.getElementById('modalTitle').innerText = 'Edit Faculty Member';
    document.getElementById('modal_id').value = faculty.id;
    document.getElementById('modal_dept_slug').value = faculty.department_slug;
    document.getElementById('modal_existing_image').value = faculty.image_path || '';
    document.getElementById('modal_name').value = faculty.faculty_name;
    document.getElementById('modal_designation').value = faculty.designation;
    document.getElementById('modal_qualification').value = faculty.qualification;
    document.getElementById('modal_experience').value = faculty.experience;
    document.getElementById('modal_sort_order').value = faculty.sort_order;
    document.getElementById('modal_status').checked = (faculty.status == 1);
    
    const modal = new bootstrap.Modal(document.getElementById('facultyModal'));
    modal.show();
}
</script>

<?php require_once 'footer.php'; ?>
