<?php
require_once 'auth.php';

$message = '';
$error = '';

// Handle Actions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    
    if ($action === 'save_tab') {
        $tab_id = $_POST['tab_id'] ?? null;
        $dept_slug = trim($_POST['department_slug'] ?? '');
        $tab_slug = trim($_POST['tab_slug'] ?? '');
        $tab_title = trim($_POST['tab_title'] ?? '');
        $tab_icon = trim($_POST['tab_icon'] ?? 'fa-solid fa-layer-group');
        $tab_content = $_POST['tab_content'] ?? '';
        $sort_order = intval($_POST['sort_order'] ?? 0);
        $status = isset($_POST['status']) ? 1 : 0;
        
        if ($tab_id) {
            $stmt = $pdo->prepare("
                UPDATE department_tabs 
                SET tab_title = ?, tab_icon = ?, tab_content = ?, sort_order = ?, status = ?
                WHERE id = ?
            ");
            $stmt->execute([$tab_title, $tab_icon, $tab_content, $sort_order, $status, $tab_id]);
            $message = 'Department tab updated successfully!';
        } else {
            if (empty($tab_slug)) {
                $tab_slug = 'tab-' . strtolower(preg_replace('/[^a-zA-Z0-9]+/', '-', $tab_title));
            }
            $stmt = $pdo->prepare("
                INSERT INTO department_tabs (department_slug, tab_slug, tab_title, tab_icon, tab_content, sort_order, status)
                VALUES (?, ?, ?, ?, ?, ?, ?)
            ");
            $stmt->execute([$dept_slug, $tab_slug, $tab_title, $tab_icon, $tab_content, $sort_order, $status]);
            $message = 'New department tab added successfully!';
        }
    } elseif ($action === 'delete_tab') {
        $tab_id = $_POST['tab_id'] ?? null;
        if ($tab_id) {
            $stmt = $pdo->prepare("DELETE FROM department_tabs WHERE id = ?");
            $stmt->execute([$tab_id]);
            $message = 'Tab deleted successfully!';
        }
    } elseif ($action === 'toggle_tab_status') {
        $tab_id = $_POST['tab_id'] ?? null;
        if ($tab_id) {
            $stmt = $pdo->prepare("UPDATE department_tabs SET status = 1 - status WHERE id = ?");
            $stmt->execute([$tab_id]);
            $message = 'Tab status updated!';
        }
    } elseif ($action === 'update_dept') {
        $dept_id = $_POST['dept_id'] ?? null;
        $name = trim($_POST['name'] ?? '');
        $faculty_group = trim($_POST['faculty_group'] ?? '');
        $hero_subtitle = trim($_POST['hero_subtitle'] ?? '');
        if ($dept_id) {
            $stmt = $pdo->prepare("UPDATE departments SET name = ?, faculty_group = ?, hero_subtitle = ? WHERE id = ?");
            $stmt->execute([$name, $faculty_group, $hero_subtitle, $dept_id]);
            $message = 'Department metadata updated successfully!';
        }
    }
}

// Fetch all departments
$departments = $pdo->query("SELECT * FROM departments ORDER BY name ASC")->fetchAll();

// Selected Department for Editing
$selected_slug = $_GET['dept'] ?? ($departments[0]['slug'] ?? '');
$currentDept = null;
foreach ($departments as $d) {
    if ($d['slug'] === $selected_slug) {
        $currentDept = $d;
        break;
    }
}
if (!$currentDept && !empty($departments)) {
    $currentDept = $departments[0];
    $selected_slug = $currentDept['slug'];
}

// Fetch tabs for the selected department
$tabs = [];
if ($selected_slug) {
    $stmt = $pdo->prepare("SELECT * FROM department_tabs WHERE department_slug = ? ORDER BY sort_order ASC, id ASC");
    $stmt->execute([$selected_slug]);
    $tabs = $stmt->fetchAll();
}

// Faculty count for this department
$facultyCountStmt = $pdo->prepare("SELECT COUNT(*) FROM department_faculty WHERE department_slug = ?");
$facultyCountStmt->execute([$selected_slug]);
$deptFacultyCount = $facultyCountStmt->fetchColumn();

// Courses belonging to this department
$deptCoursesStmt = $pdo->prepare("SELECT * FROM courses WHERE department_slug = ? ORDER BY degree_type ASC, title ASC");
$deptCoursesStmt->execute([$selected_slug]);
$deptCourses = $deptCoursesStmt->fetchAll();
$deptCoursesCount = count($deptCourses);

require_once 'header.php';
?>

<div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-4">
    <div>
        <h3 class="font-serif fw-bold text-primary mb-1">Academic Departments &amp; Tabs Manager</h3>
        <p class="text-muted small mb-0">Manage and edit the full contents of all 27 academic department pages, sections, tabs, and leadership desks dynamically.</p>
    </div>
    <div class="d-flex gap-2">
        <a href="../<?php echo htmlspecialchars($selected_slug); ?>.php" target="_blank" class="btn btn-outline-dark rounded-pill btn-sm px-3 shadow-xs">
            <i class="fa-solid fa-arrow-up-right-from-square me-1"></i> View Live Page
        </a>
        <a href="courses_manager.php?action=new&dept=<?php echo urlencode($selected_slug); ?>" class="btn btn-outline-primary rounded-pill btn-sm px-3 shadow-xs">
            <i class="fa-solid fa-graduation-cap text-gold me-1"></i> Add Course
        </a>
        <button class="btn btn-primary rounded-pill btn-sm px-3 shadow-sm" data-bs-toggle="modal" data-bs-target="#tabModal" onclick="openAddTabModal()">
            <i class="fa-solid fa-plus me-1.5"></i> Add New Tab
        </button>
    </div>
</div>

<?php if ($message): ?>
<div class="alert alert-success alert-dismissible fade show rounded-3 small fw-medium" role="alert">
    <i class="fa-solid fa-check-circle me-1.5"></i> <?php echo $message; ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php endif; ?>

<!-- Department Selector & Quick Stats Card -->
<div class="card shadow-sm border-0 mb-4">
    <div class="card-body p-4">
        <form method="GET" class="row g-3 align-items-end">
            <div class="col-md-6">
                <label class="form-label small fw-bold text-uppercase text-muted" style="font-size: 0.75rem; letter-spacing: 0.08em;">
                    <i class="fa-solid fa-building-columns text-gold me-1"></i> Select Department To Manage
                </label>
                <select name="dept" class="form-select" onchange="this.form.submit()">
                    <?php foreach ($departments as $dept): ?>
                    <option value="<?php echo $dept['slug']; ?>" <?php echo ($selected_slug === $dept['slug']) ? 'selected' : ''; ?>>
                        <?php echo htmlspecialchars($dept['name']); ?> (<?php echo htmlspecialchars($dept['faculty_group']); ?>)
                    </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-6 d-flex align-items-center justify-content-md-end gap-2 pt-2 flex-wrap">
                <span class="badge bg-light text-primary border px-3 py-2 fs-6">
                    <i class="fa-solid fa-layer-group text-gold me-1"></i> <?php echo count($tabs); ?> Active Tabs
                </span>
                <a href="courses_manager.php?dept=<?php echo urlencode($selected_slug); ?>" class="badge bg-light text-primary border px-3 py-2 fs-6 text-decoration-none" title="Manage Courses for this Department">
                    <i class="fa-solid fa-graduation-cap text-gold me-1"></i> <?php echo $deptCoursesCount; ?> Courses Offered
                </a>
                <a href="faculty_manager.php?dept=<?php echo urlencode($selected_slug); ?>" class="badge bg-light text-dark border px-3 py-2 fs-6 text-decoration-none" title="Manage Faculty for this Department">
                    <i class="fa-solid fa-user-graduate text-primary me-1"></i> <?php echo $deptFacultyCount; ?> Faculty Members
                </a>
            </div>
        </form>
    </div>
</div>

<!-- 1. Department Tabs Table -->
<div class="card shadow-sm border-0 mb-4">
    <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
        <div class="d-flex align-items-center gap-2">
            <i class="fa-solid fa-folder-tree text-gold fs-5"></i>
            <span class="fw-bold fs-6 font-serif text-primary"><?php echo htmlspecialchars($currentDept['name'] ?? ''); ?> — Page Tabs &amp; Sections</span>
        </div>
        <span class="badge bg-primary bg-opacity-10 text-primary border border-primary border-opacity-25 px-2.5 py-1.5 small">
            <?php echo htmlspecialchars($currentDept['faculty_group'] ?? ''); ?>
        </span>
    </div>
    
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light small text-uppercase">
                    <tr>
                        <th class="ps-4" style="width: 70px;">Sort</th>
                        <th style="width: 60px;">Icon</th>
                        <th>Tab Title</th>
                        <th>Tab Slug ID</th>
                        <th>Content Summary</th>
                        <th style="width: 90px;">Status</th>
                        <th class="text-end pe-4" style="width: 130px;">Actions</th>
                    </tr>
                </thead>
                <tbody class="small">
                    <?php if (empty($tabs)): ?>
                    <tr>
                        <td colspan="7" class="text-center py-5 text-muted">
                            <i class="fa-solid fa-folder-open fs-1 d-block mb-2 opacity-50"></i>
                            No tabs configured for this department. Click "Add New Tab" to create one.
                        </td>
                    </tr>
                    <?php else: ?>
                    <?php foreach ($tabs as $t): ?>
                    <tr>
                        <td class="ps-4">
                            <span class="badge bg-light text-muted border"><?php echo $t['sort_order']; ?></span>
                        </td>
                        <td>
                            <div class="icon-circle-badge" style="width: 36px; height: 36px;">
                                <i class="<?php echo htmlspecialchars($t['tab_icon']); ?>"></i>
                            </div>
                        </td>
                        <td>
                            <strong class="font-serif fs-6 text-primary"><?php echo htmlspecialchars($t['tab_title']); ?></strong>
                        </td>
                        <td>
                            <code><?php echo htmlspecialchars($t['tab_slug']); ?></code>
                        </td>
                        <td>
                            <small class="text-muted d-inline-block text-truncate" style="max-width: 320px;">
                                <?php 
                                if (stripos($t['tab_title'], 'Faculty') !== false) {
                                    echo '<i class="fa-solid fa-database text-success me-1"></i> Dynamically fetched from Faculty Manager (' . $deptFacultyCount . ' members)';
                                } else {
                                    echo htmlspecialchars(mb_strimwidth(strip_tags($t['tab_content']), 0, 80, '...'));
                                }
                                ?>
                            </small>
                        </td>
                        <td>
                            <form method="POST" class="d-inline">
                                <input type="hidden" name="action" value="toggle_tab_status">
                                <input type="hidden" name="tab_id" value="<?php echo $t['id']; ?>">
                                <?php if ($t['status'] == 1): ?>
                                <button type="submit" class="btn btn-xs badge bg-success text-white border-0 px-2 py-1" style="font-size: 0.72rem; cursor: pointer;">Active</button>
                                <?php else: ?>
                                <button type="submit" class="btn btn-xs badge bg-secondary text-white border-0 px-2 py-1" style="font-size: 0.72rem; cursor: pointer;">Inactive</button>
                                <?php endif; ?>
                            </form>
                        </td>
                        <td class="text-end pe-4">
                            <button class="btn btn-sm btn-outline-primary rounded-circle p-0" style="width: 32px; height: 32px;" onclick='openEditTabModal(<?php echo json_encode($t, JSON_HEX_APOS | JSON_HEX_QUOT); ?>)' title="Edit Tab Content">
                                <i class="fa-solid fa-pen text-xs"></i>
                            </button>
                            <form method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this tab?');">
                                <input type="hidden" name="action" value="delete_tab">
                                <input type="hidden" name="tab_id" value="<?php echo $t['id']; ?>">
                                <button type="submit" class="btn btn-sm btn-outline-danger rounded-circle p-0 ms-1" style="width: 32px; height: 32px;" title="Delete Tab">
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

<!-- 2. Department Courses & Academic Programs Section -->
<div class="card shadow-sm border-0 mb-4">
    <div class="card-header bg-white d-flex justify-content-between align-items-center py-3 flex-wrap gap-2">
        <div class="d-flex align-items-center gap-2">
            <i class="fa-solid fa-graduation-cap text-gold fs-5"></i>
            <div>
                <span class="fw-bold fs-6 font-serif text-primary">Offered Academic Courses &amp; Programs</span>
                <span class="badge rounded-pill bg-light text-primary border ms-2 small"><?php echo $deptCoursesCount; ?> Programs Connected</span>
            </div>
        </div>
        <a href="courses_manager.php?action=new&dept=<?php echo urlencode($selected_slug); ?>" class="btn btn-sm btn-primary rounded-pill px-3 shadow-xs">
            <i class="fa-solid fa-plus me-1 text-gold"></i> Add Course to this Department
        </a>
    </div>
    
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light small text-uppercase">
                    <tr>
                        <th class="ps-4" style="width: 90px;">Level</th>
                        <th>Program / Course Name</th>
                        <th>Duration</th>
                        <th>Eligibility Criteria</th>
                        <th style="width: 90px;" class="text-center">Status</th>
                        <th class="text-end pe-4" style="width: 140px;">Actions</th>
                    </tr>
                </thead>
                <tbody class="small">
                    <?php if (empty($deptCourses)): ?>
                    <tr>
                        <td colspan="6" class="text-center py-5 text-muted">
                            <div class="icon-circle-badge mx-auto mb-2" style="width: 45px; height: 45px; font-size: 1.1rem;">
                                <i class="fa-solid fa-book-open"></i>
                            </div>
                            <strong class="d-block font-serif text-primary fs-6 mb-1">No Academic Courses Linked to this Department</strong>
                            <p class="small text-muted mb-3" style="max-width: 420px; margin: 0 auto;">Click below to add a new degree or diploma program under <strong><?php echo htmlspecialchars($currentDept['name'] ?? ''); ?></strong>.</p>
                            <a href="courses_manager.php?action=new&dept=<?php echo urlencode($selected_slug); ?>" class="btn btn-sm btn-outline-primary rounded-pill px-3.5">
                                <i class="fa-solid fa-plus me-1 text-gold"></i> Add First Course
                            </a>
                        </td>
                    </tr>
                    <?php else: ?>
                    <?php foreach ($deptCourses as $dc): 
                        $dt = strtoupper($dc['degree_type'] ?? 'UG');
                        $badgeStyle = 'background: rgba(88,8,19,0.08); color: #580813; border: 1px solid rgba(88,8,19,0.25);';
                        if (strpos($dt, 'PG') !== false) {
                            $badgeStyle = 'background: rgba(212,175,55,0.15); color: #8a6d00; border: 1px solid rgba(212,175,55,0.4);';
                        } elseif (strpos($dt, 'DIPLOMA') !== false) {
                            $badgeStyle = 'background: rgba(30,30,30,0.08); color: #333333; border: 1px solid rgba(30,30,30,0.2);';
                        }
                    ?>
                    <tr>
                        <td class="ps-4">
                            <span class="badge rounded-pill px-2.5 py-1 fw-bold" style="<?php echo $badgeStyle; ?> font-size: 0.72rem;">
                                <?php echo htmlspecialchars($dc['degree_type']); ?>
                            </span>
                        </td>
                        <td>
                            <a href="../course/<?php echo htmlspecialchars($dc['slug']); ?>.php" target="_blank" class="font-serif fw-bold text-primary fs-6 text-decoration-none hover-gold d-block">
                                <?php echo htmlspecialchars($dc['title']); ?>
                            </a>
                            <code class="small text-muted" style="font-size: 0.7rem;">course/<?php echo htmlspecialchars($dc['slug']); ?>.php</code>
                        </td>
                        <td>
                            <span class="badge bg-light text-dark border rounded-pill px-2.5 py-1 small">
                                <i class="fa-regular fa-clock text-gold me-1"></i> <?php echo htmlspecialchars($dc['duration']); ?>
                            </span>
                        </td>
                        <td>
                            <div class="text-muted small" style="max-width: 280px; line-height: 1.45; font-size: 0.78rem;">
                                <?php echo htmlspecialchars(mb_strimwidth(strip_tags($dc['eligibility']), 0, 75, '...')); ?>
                            </div>
                        </td>
                        <td class="text-center">
                            <?php if ($dc['status'] == 1): ?>
                            <span class="badge bg-success text-white rounded-pill px-2.5 py-1" style="font-size: 0.7rem;">Active</span>
                            <?php else: ?>
                            <span class="badge bg-secondary text-white rounded-pill px-2.5 py-1" style="font-size: 0.7rem;">Draft</span>
                            <?php endif; ?>
                        </td>
                        <td class="text-end pe-4">
                            <a href="../course/<?php echo htmlspecialchars($dc['slug']); ?>.php" target="_blank" class="btn btn-xs btn-outline-secondary rounded-circle p-0" style="width: 30px; height: 30px; line-height: 30px; text-align: center; display: inline-block;" title="View Live Page">
                                <i class="fa-solid fa-arrow-up-right-from-square text-xs"></i>
                            </a>
                            <a href="courses_manager.php?dept=<?php echo urlencode($selected_slug); ?>&q=<?php echo urlencode($dc['title']); ?>" class="btn btn-xs btn-outline-primary rounded-circle p-0 ms-1" style="width: 30px; height: 30px; line-height: 30px; text-align: center; display: inline-block;" title="Edit in Courses Manager">
                                <i class="fa-solid fa-pen text-xs"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Add / Edit Tab Modal -->
<div class="modal fade" id="tabModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content border-0 shadow">
            <form method="POST">
                <input type="hidden" name="action" value="save_tab">
                <input type="hidden" name="tab_id" id="modal_tab_id" value="">
                <input type="hidden" name="department_slug" value="<?php echo htmlspecialchars($selected_slug); ?>">
                
                <div class="modal-header border-bottom">
                    <h5 class="modal-title font-serif fw-bold text-primary" id="modalTabTitle">Edit Department Tab</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                
                <div class="modal-body p-4">
                    <div class="row g-3 mb-3">
                        <div class="col-md-5">
                            <label class="form-label small fw-bold">Tab Title <span class="text-danger">*</span></label>
                            <input type="text" name="tab_title" id="modal_tab_title_input" class="form-control" placeholder="e.g. Vision & Mission / Infrastructure" required>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label small fw-bold">Tab Slug ID</label>
                            <input type="text" name="tab_slug" id="modal_tab_slug_input" class="form-control" placeholder="e.g. tab-vision-mission">
                        </div>
                        <div class="col-md-2">
                            <label class="form-label small fw-bold">Tab Icon (FontAwesome)</label>
                            <input type="text" name="tab_icon" id="modal_tab_icon_input" class="form-control" placeholder="fa-solid fa-bullseye">
                        </div>
                        <div class="col-md-2">
                            <label class="form-label small fw-bold">Sort Order</label>
                            <input type="number" name="sort_order" id="modal_sort_order_input" class="form-control" value="0">
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <label class="form-label small fw-bold m-0">Tab Rich HTML Content</label>
                            <small class="text-muted">Supports HTML, headings, paragraphs, lists, and tables.</small>
                        </div>
                        <textarea name="tab_content" id="modal_tab_content_input" class="form-control font-monospace small" rows="14" placeholder="Enter HTML/text content for this tab section..."></textarea>
                    </div>
                    
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="status" id="modal_status_input" value="1" checked>
                        <label class="form-check-label small fw-bold" for="modal_status_input">Active &amp; Visible on Department Page</label>
                    </div>
                </div>
                
                <div class="modal-footer border-top bg-light">
                    <button type="button" class="btn btn-sm btn-outline-secondary rounded-pill px-3" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-sm btn-primary rounded-pill px-4">Save Tab Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function openAddTabModal() {
    document.getElementById('modalTabTitle').innerText = 'Add New Department Tab';
    document.getElementById('modal_tab_id').value = '';
    document.getElementById('modal_tab_title_input').value = '';
    document.getElementById('modal_tab_slug_input').value = '';
    document.getElementById('modal_tab_icon_input').value = 'fa-solid fa-layer-group';
    document.getElementById('modal_sort_order_input').value = '<?php echo count($tabs) + 1; ?>';
    window.setEditorData('modal_tab_content_input', '');
    document.getElementById('modal_status_input').checked = true;
}

function openEditTabModal(tab) {
    document.getElementById('modalTabTitle').innerText = 'Edit Tab: ' + tab.tab_title;
    document.getElementById('modal_tab_id').value = tab.id;
    document.getElementById('modal_tab_title_input').value = tab.tab_title;
    document.getElementById('modal_tab_slug_input').value = tab.tab_slug;
    document.getElementById('modal_tab_icon_input').value = tab.tab_icon;
    document.getElementById('modal_sort_order_input').value = tab.sort_order;
    window.setEditorData('modal_tab_content_input', tab.tab_content || '');
    document.getElementById('modal_status_input').checked = (tab.status == 1);
    
    const modal = new bootstrap.Modal(document.getElementById('tabModal'));
    modal.show();
}
</script>

<?php require_once 'footer.php'; ?>
