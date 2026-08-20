<?php
require_once 'auth.php';

$message = '';
$error = '';

// Handle Actions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    $id = $_POST['id'] ?? null;
    $title = trim($_POST['title'] ?? '');
    $slug = trim($_POST['slug'] ?? '');
    $degree_type = trim($_POST['degree_type'] ?? 'UG');
    $duration = trim($_POST['duration'] ?? '4 Years');
    $approvals = trim($_POST['approvals'] ?? 'Recognized by UGC | AICTE Approved');
    $eligibility = trim($_POST['eligibility'] ?? '');
    $key_features = trim($_POST['key_features'] ?? '');
    $career_opportunities = trim($_POST['career_opportunities'] ?? '');
    $syllabus_content = trim($_POST['syllabus_content'] ?? '');
    $content = trim($_POST['content'] ?? '');
    $status = isset($_POST['status']) ? 1 : 0;
    
    if (empty($slug)) {
        $slug = strtolower(preg_replace('/[^a-zA-Z0-9]+/', '-', $title));
        $slug = trim($slug, '-');
    }
    
    if ($action === 'save') {
        if ($id) {
            $stmt = $pdo->prepare("
                UPDATE courses 
                SET title = ?, slug = ?, degree_type = ?, duration = ?, approvals = ?, eligibility = ?, key_features = ?, career_opportunities = ?, syllabus_content = ?, content = ?, status = ?
                WHERE id = ?
            ");
            $stmt->execute([$title, $slug, $degree_type, $duration, $approvals, $eligibility, $key_features, $career_opportunities, $syllabus_content, $content, $status, $id]);
            $message = 'Academic course program updated successfully!';
        } else {
            $stmt = $pdo->prepare("
                INSERT INTO courses (title, slug, degree_type, duration, approvals, eligibility, key_features, career_opportunities, syllabus_content, content, status)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
            ");
            $stmt->execute([$title, $slug, $degree_type, $duration, $approvals, $eligibility, $key_features, $career_opportunities, $syllabus_content, $content, $status]);
            $message = 'New academic course program created successfully!';
        }
    } elseif ($action === 'delete' && $id) {
        $stmt = $pdo->prepare("DELETE FROM courses WHERE id = ?");
        $stmt->execute([$id]);
        $message = 'Course program deleted successfully!';
    } elseif ($action === 'toggle_status' && $id) {
        $stmt = $pdo->prepare("UPDATE courses SET status = 1 - status WHERE id = ?");
        $stmt->execute([$id]);
        $message = 'Course status toggled successfully!';
    }
}

// Filters
$filter_level = $_GET['level'] ?? '';
$search_q = trim($_GET['q'] ?? '');

$sql = "SELECT * FROM courses WHERE 1=1";
$params = [];

if (!empty($filter_level)) {
    $sql .= " AND degree_type = ?";
    $params[] = $filter_level;
}

if (!empty($search_q)) {
    $sql .= " AND (title LIKE ? OR slug LIKE ? OR content LIKE ? OR eligibility LIKE ?)";
    $params[] = "%$search_q%";
    $params[] = "%$search_q%";
    $params[] = "%$search_q%";
    $params[] = "%$search_q%";
}

$sql .= " ORDER BY degree_type ASC, title ASC";
$stmt = $pdo->prepare($sql);
$stmt->execute($params);
$coursesList = $stmt->fetchAll();

// Counts for Stats
$totalCount = $pdo->query("SELECT COUNT(*) FROM courses")->fetchColumn();
$ugCount = $pdo->query("SELECT COUNT(*) FROM courses WHERE degree_type LIKE '%UG%' OR degree_type LIKE '%Undergraduate%'")->fetchColumn();
$pgCount = $pdo->query("SELECT COUNT(*) FROM courses WHERE degree_type LIKE '%PG%' OR degree_type LIKE '%Postgraduate%'")->fetchColumn();
$diplomaCount = $pdo->query("SELECT COUNT(*) FROM courses WHERE degree_type LIKE '%Diploma%'")->fetchColumn();

require_once 'header.php';
?>

<!-- Page Header Bar -->
<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4 pb-2">
    <div>
        <div class="d-flex align-items-center gap-2 mb-1">
            <span class="badge rounded-pill" style="background: rgba(88,8,19,0.08); color: var(--admin-maroon); font-size: 0.75rem; padding: 4px 10px;">
                <i class="fa-solid fa-graduation-cap text-gold me-1"></i> Academic Curriculum CMS
            </span>
            <span class="badge bg-light text-dark border rounded-pill" style="font-size: 0.7rem;">
                <?php echo $totalCount; ?> Active Programs
            </span>
        </div>
        <h2 class="h3 font-serif fw-bold text-primary mb-0">Academic Courses &amp; Programs Manager</h2>
        <p class="text-muted small mb-0 mt-0.5">Manage degree curriculums, eligibility criteria, career opportunities, syllabuses, and program snapshots dynamically.</p>
    </div>
    
    <div class="d-flex flex-wrap gap-2">
        <a href="../programs.php" target="_blank" class="btn btn-sm btn-outline-primary rounded-pill px-3.5 py-1.5 fw-semibold d-inline-flex align-items-center gap-1.5">
            <i class="fa-solid fa-arrow-up-right-from-square"></i> Live Directory
        </a>
        <button class="btn btn-sm btn-primary rounded-pill px-4 py-1.5 d-inline-flex align-items-center gap-1.5 fw-semibold" data-bs-toggle="modal" data-bs-target="#courseModal" onclick="openAddModal()">
            <i class="fa-solid fa-plus text-gold"></i> Add New Course
        </button>
    </div>
</div>

<?php if ($message): ?>
<div class="alert alert-success alert-dismissible fade show rounded-3 shadow-xs small fw-medium mb-4" role="alert">
    <i class="fa-solid fa-circle-check text-success me-1.5"></i> <?php echo htmlspecialchars($message); ?>
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
                    <p class="stat-label">Total Programs</p>
                </div>
                <div class="icon-circle-badge">
                    <i class="fa-solid fa-book-bookmark"></i>
                </div>
            </div>
            <div class="d-flex align-items-center justify-content-between small pt-2 border-top">
                <span class="text-muted">Database Active</span>
                <span class="text-primary fw-bold">100% Published</span>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-xl-3">
        <div class="admin-stat-card maroon-border">
            <div class="d-flex justify-content-between align-items-start mb-2">
                <div>
                    <div class="stat-value"><?php echo number_format($ugCount); ?></div>
                    <p class="stat-label">Undergraduate (UG)</p>
                </div>
                <div class="icon-circle-badge">
                    <i class="fa-solid fa-user-graduate"></i>
                </div>
            </div>
            <div class="d-flex align-items-center justify-content-between small pt-2 border-top">
                <span class="text-muted">B.E, B.Tech, BBA, BCA</span>
                <span class="text-primary fw-bold">UG Degrees</span>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-xl-3">
        <div class="admin-stat-card gold-border">
            <div class="d-flex justify-content-between align-items-start mb-2">
                <div>
                    <div class="stat-value"><?php echo number_format($pgCount); ?></div>
                    <p class="stat-label">Postgraduate (PG)</p>
                </div>
                <div class="icon-circle-gold">
                    <i class="fa-solid fa-award"></i>
                </div>
            </div>
            <div class="d-flex align-items-center justify-content-between small pt-2 border-top">
                <span class="text-muted">M.Tech, MBA, MCA</span>
                <span class="text-warning fw-bold" style="color: #b8860b !important;">Master Degrees</span>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-xl-3">
        <div class="admin-stat-card dark-border">
            <div class="d-flex justify-content-between align-items-start mb-2">
                <div>
                    <div class="stat-value"><?php echo number_format($diplomaCount); ?></div>
                    <p class="stat-label">Diploma Programs</p>
                </div>
                <div class="icon-circle-badge">
                    <i class="fa-solid fa-certificate"></i>
                </div>
            </div>
            <div class="d-flex align-items-center justify-content-between small pt-2 border-top">
                <span class="text-muted">Polytechnic &amp; DCA</span>
                <span class="text-dark fw-bold">Diploma / Cert</span>
            </div>
        </div>
    </div>
</div>

<!-- Filter & Search Card -->
<div class="card border-0 rounded-4 shadow-sm mb-4" style="background: #ffffff;">
    <div class="card-body p-3.5">
        <form method="GET" class="row g-2 align-items-center">
            <div class="col-md-3">
                <select name="level" class="form-select form-select-sm rounded-pill px-3 py-2 border-custom" onchange="this.form.submit()">
                    <option value="">-- All Degree Levels (<?php echo $totalCount; ?>) --</option>
                    <option value="UG" <?php echo ($filter_level === 'UG') ? 'selected' : ''; ?>>Undergraduate (UG)</option>
                    <option value="UG (Lateral Entry)" <?php echo ($filter_level === 'UG (Lateral Entry)') ? 'selected' : ''; ?>>UG (Lateral Entry)</option>
                    <option value="PG" <?php echo ($filter_level === 'PG') ? 'selected' : ''; ?>>Postgraduate (PG)</option>
                    <option value="Diploma" <?php echo ($filter_level === 'Diploma') ? 'selected' : ''; ?>>Diploma</option>
                    <option value="Doctorate" <?php echo ($filter_level === 'Doctorate') ? 'selected' : ''; ?>>Doctorate / Ph.D.</option>
                </select>
            </div>
            <div class="col-md-6">
                <div class="position-relative">
                    <i class="fa-solid fa-search position-absolute top-50 start-0 translate-middle-y ms-3 text-muted"></i>
                    <input type="text" name="q" class="form-control form-control-sm rounded-pill ps-5 py-2 border-custom" placeholder="Search by course title, slug, keywords..." value="<?php echo htmlspecialchars($search_q); ?>">
                </div>
            </div>
            <div class="col-md-3 d-flex gap-2">
                <button type="submit" class="btn btn-sm btn-primary rounded-pill px-4 py-2 w-100 fw-semibold">
                    <i class="fa-solid fa-filter me-1 text-gold"></i> Filter
                </button>
                <?php if ($filter_level || $search_q): ?>
                <a href="courses_manager.php" class="btn btn-sm btn-outline-secondary rounded-pill px-3 py-2 flex-shrink-0" title="Reset Filters">
                    <i class="fa-solid fa-rotate-left"></i>
                </a>
                <?php endif; ?>
            </div>
        </form>
    </div>
</div>

<!-- Courses Table Card -->
<div class="card border-0 rounded-4 shadow-sm overflow-hidden" style="background: #ffffff;">
    <div class="card-header bg-white border-bottom p-3.5 d-flex justify-content-between align-items-center flex-wrap gap-2">
        <div class="d-flex align-items-center gap-2">
            <div class="icon-circle-badge" style="width: 34px; height: 34px; font-size: 0.95rem;">
                <i class="fa-solid fa-layer-group"></i>
            </div>
            <div>
                <span class="font-serif fw-bold text-primary fs-6">Academic Courses Repository</span>
                <span class="badge rounded-pill bg-light text-primary border ms-2 small" style="font-size: 0.72rem;"><?php echo count($coursesList); ?> Records Found</span>
            </div>
        </div>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light small text-uppercase" style="border-bottom: 2px solid #580813; font-size: 0.74rem; letter-spacing: 0.06em; color: #580813;">
                    <tr>
                        <th class="ps-4 py-3" style="width: 100px;">Level</th>
                        <th class="py-3">Program / Course Name</th>
                        <th class="py-3">URL Slug &amp; Approvals</th>
                        <th class="py-3" style="width: 110px;">Duration</th>
                        <th class="py-3">Eligibility Summary</th>
                        <th class="py-3 text-center" style="width: 90px;">Status</th>
                        <th class="text-end pe-4 py-3" style="width: 170px;">Actions</th>
                    </tr>
                </thead>
                <tbody class="small">
                    <?php if (empty($coursesList)): ?>
                    <tr>
                        <td colspan="7" class="text-center py-5 text-muted">
                            <div class="icon-circle-badge mx-auto mb-2" style="width: 50px; height: 50px; font-size: 1.25rem;">
                                <i class="fa-solid fa-book-open"></i>
                            </div>
                            <strong class="d-block font-serif text-primary fs-6">No Academic Courses Found</strong>
                            <span class="small text-muted">Try clearing your search query or add a new course program.</span>
                        </td>
                    </tr>
                    <?php else: ?>
                    <?php foreach ($coursesList as $c): 
                        $dt = strtoupper($c['degree_type'] ?? 'UG');
                        $badgeStyle = 'background: rgba(88,8,19,0.08); color: #580813; border: 1px solid rgba(88,8,19,0.25);';
                        if (strpos($dt, 'PG') !== false || strpos($dt, 'POSTGRADUATE') !== false) {
                            $badgeStyle = 'background: rgba(212,175,55,0.15); color: #8a6d00; border: 1px solid rgba(212,175,55,0.4);';
                        } elseif (strpos($dt, 'DIPLOMA') !== false) {
                            $badgeStyle = 'background: rgba(30,30,30,0.08); color: #333333; border: 1px solid rgba(30,30,30,0.2);';
                        }
                    ?>
                    <tr>
                        <td class="ps-4">
                            <span class="badge rounded-pill px-2.5 py-1 fw-bold" style="<?php echo $badgeStyle; ?> font-size: 0.72rem;">
                                <?php echo htmlspecialchars($c['degree_type']); ?>
                            </span>
                        </td>
                        <td>
                            <a href="../course/<?php echo htmlspecialchars($c['slug']); ?>.php" target="_blank" class="font-serif fw-bold text-primary fs-6 text-decoration-none hover-gold d-block">
                                <?php echo htmlspecialchars($c['title']); ?>
                            </a>
                            <span class="small text-muted" style="font-size: 0.72rem;">ID: #<?php echo $c['id']; ?></span>
                        </td>
                        <td>
                            <code class="d-block mb-1 text-primary" style="font-size: 0.75rem; background: rgba(88,8,19,0.04); padding: 2px 6px; border-radius: 4px; display: inline-block;">course/<?php echo htmlspecialchars($c['slug']); ?>.php</code>
                            <div class="small text-muted-custom" style="font-size: 0.74rem;">
                                <i class="fa-solid fa-certificate text-gold me-1"></i> <?php echo htmlspecialchars($c['approvals'] ?? 'UGC Recognized'); ?>
                            </div>
                        </td>
                        <td>
                            <span class="badge bg-light text-dark border rounded-pill px-2.5 py-1 small">
                                <i class="fa-regular fa-clock text-gold me-1"></i> <?php echo htmlspecialchars($c['duration']); ?>
                            </span>
                        </td>
                        <td>
                            <div class="text-muted small" style="max-width: 280px; line-height: 1.45; font-size: 0.78rem;">
                                <?php echo htmlspecialchars(mb_strimwidth(strip_tags($c['eligibility']), 0, 75, '...')); ?>
                            </div>
                        </td>
                        <td class="text-center">
                            <form method="POST" class="d-inline">
                                <input type="hidden" name="action" value="toggle_status">
                                <input type="hidden" name="id" value="<?php echo $c['id']; ?>">
                                <?php if ($c['status'] == 1): ?>
                                <button type="submit" class="btn btn-xs rounded-pill badge text-white border-0 px-2.5 py-1" style="background: #16a34a; font-size: 0.72rem; cursor: pointer;">
                                    <i class="fa-solid fa-check me-1"></i> Active
                                </button>
                                <?php else: ?>
                                <button type="submit" class="btn btn-xs rounded-pill badge text-white border-0 px-2.5 py-1" style="background: #64748b; font-size: 0.72rem; cursor: pointer;">
                                    <i class="fa-solid fa-pause me-1"></i> Draft
                                </button>
                                <?php endif; ?>
                            </form>
                        </td>
                        <td class="text-end pe-4">
                            <div class="d-flex align-items-center justify-content-end gap-1.5">
                                <a href="../course/<?php echo htmlspecialchars($c['slug']); ?>.php" target="_blank" class="btn btn-xs btn-outline-secondary rounded-pill px-2.5 py-1 small d-inline-flex align-items-center gap-1" title="View Live Page">
                                    <i class="fa-solid fa-arrow-up-right-from-square"></i>
                                </a>
                                <button class="btn btn-xs btn-outline-primary rounded-pill px-2.5 py-1 small d-inline-flex align-items-center gap-1" onclick='openEditModal(<?php echo json_encode($c, JSON_HEX_APOS | JSON_HEX_QUOT); ?>)' title="Edit Course">
                                    <i class="fa-solid fa-pen"></i> Edit
                                </button>
                                <form method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to permanently delete this academic course program?');">
                                    <input type="hidden" name="action" value="delete">
                                    <input type="hidden" name="id" value="<?php echo $c['id']; ?>">
                                    <button type="submit" class="btn btn-xs btn-outline-danger rounded-pill px-2 py-1 small" title="Delete Course">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </div>
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
<div class="modal fade" id="courseModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
            <form method="POST">
                <input type="hidden" name="action" value="save">
                <input type="hidden" name="id" id="modal_id" value="">
                
                <div class="modal-header border-bottom">
                    <h5 class="modal-title font-serif fw-bold text-white" id="modalTitle">
                        <i class="fa-solid fa-graduation-cap text-gold me-2"></i> Add New Academic Course
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                
                <div class="modal-body p-4">
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label small fw-bold">Course Program Title <span class="text-danger">*</span></label>
                            <input type="text" name="title" id="modal_title" class="form-control rounded-3" placeholder="e.g. B.E. (Computer Science Engineering)" required>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label small fw-bold">Degree Level <span class="text-danger">*</span></label>
                            <select name="degree_type" id="modal_degree_type" class="form-select rounded-3" required>
                                <option value="UG">Undergraduate (UG)</option>
                                <option value="UG (Lateral Entry)">UG (Lateral Entry)</option>
                                <option value="PG">Postgraduate (PG)</option>
                                <option value="Diploma">Diploma</option>
                                <option value="Doctorate">Doctorate / Ph.D.</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label small fw-bold">Duration</label>
                            <input type="text" name="duration" id="modal_duration" class="form-control rounded-3" placeholder="e.g. 4 Years / 2 Years / 3 Years">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-bold">URL Slug (Auto-generated if empty)</label>
                            <input type="text" name="slug" id="modal_slug" class="form-control rounded-3" placeholder="e.g. b-e-computer-science-engineering">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-bold">Statutory Approvals &amp; Recognition</label>
                            <input type="text" name="approvals" id="modal_approvals" class="form-control rounded-3" placeholder="e.g. Recognized by UGC | AICTE Approved">
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Eligibility Criteria Summary</label>
                        <input type="text" name="eligibility" id="modal_eligibility" class="form-control rounded-3" placeholder="e.g. 10+2 with Physics, Chemistry & Mathematics (Min 45% marks)">
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-bold">Detailed Course Overview &amp; Description (Rich HTML)</label>
                        <textarea name="content" id="modal_content" class="form-control" rows="6" placeholder="Course overview, curriculum pillars, research laboratories..."></textarea>
                    </div>
                    
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label small fw-bold">Key Course Highlights (Bullet Points)</label>
                            <textarea name="key_features" id="modal_key_features" class="form-control font-monospace small rounded-3" rows="4" placeholder="<li>Industry certified labs</li>&#10;<li>Hands-on practical projects</li>"></textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-bold">Career Opportunities &amp; Job Roles (Bullet Points)</label>
                            <textarea name="career_opportunities" id="modal_career_opportunities" class="form-control font-monospace small rounded-3" rows="4" placeholder="<li>Software Engineer / Full Stack Developer</li>&#10;<li>Data Analyst / AI Specialist</li>"></textarea>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Syllabus Curriculum (HTML / Subject Table)</label>
                        <textarea name="syllabus_content" id="modal_syllabus_content" class="form-control" rows="4" placeholder="Syllabus links, scheme table or semester subject lists..."></textarea>
                    </div>
                    
                    <div class="form-check form-switch p-3 rounded-3 bg-light border">
                        <input class="form-check-input ms-0 me-2" type="checkbox" name="status" id="modal_status" value="1" checked>
                        <label class="form-check-label small fw-bold" for="modal_status">Active Program (Instantly visible to students on website &amp; directory)</label>
                    </div>
                </div>
                
                <div class="modal-footer border-top bg-light">
                    <button type="button" class="btn btn-sm btn-outline-secondary rounded-pill px-3.5" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-sm btn-primary rounded-pill px-4 fw-semibold">
                        <i class="fa-solid fa-save me-1 text-gold"></i> Save Program Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function openAddModal() {
    document.getElementById('modalTitle').innerHTML = '<i class="fa-solid fa-graduation-cap text-gold me-2"></i> Add New Academic Course';
    document.getElementById('modal_id').value = '';
    document.getElementById('modal_title').value = '';
    document.getElementById('modal_slug').value = '';
    document.getElementById('modal_degree_type').value = 'UG';
    document.getElementById('modal_duration').value = '4 Years';
    document.getElementById('modal_approvals').value = 'Recognized by UGC | AICTE Approved';
    document.getElementById('modal_eligibility').value = '';
    window.setEditorData('modal_content', '');
    document.getElementById('modal_key_features').value = '';
    document.getElementById('modal_career_opportunities').value = '';
    window.setEditorData('modal_syllabus_content', '');
    document.getElementById('modal_status').checked = true;
}

function openEditModal(c) {
    document.getElementById('modalTitle').innerHTML = '<i class="fa-solid fa-pen-to-square text-gold me-2"></i> Edit Course: ' + c.title;
    document.getElementById('modal_id').value = c.id;
    document.getElementById('modal_title').value = c.title;
    document.getElementById('modal_slug').value = c.slug;
    document.getElementById('modal_degree_type').value = c.degree_type;
    document.getElementById('modal_duration').value = c.duration;
    document.getElementById('modal_approvals').value = c.approvals || 'Recognized by UGC | AICTE Approved';
    document.getElementById('modal_eligibility').value = c.eligibility || '';
    window.setEditorData('modal_content', c.content || '');
    document.getElementById('modal_key_features').value = c.key_features || '';
    document.getElementById('modal_career_opportunities').value = c.career_opportunities || '';
    window.setEditorData('modal_syllabus_content', c.syllabus_content || '');
    document.getElementById('modal_status').checked = (c.status == 1);
    
    const modal = new bootstrap.Modal(document.getElementById('courseModal'));
    modal.show();
}
</script>

<?php require_once 'footer.php'; ?>
