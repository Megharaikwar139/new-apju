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
                SET title = ?, slug = ?, degree_type = ?, duration = ?, eligibility = ?, key_features = ?, career_opportunities = ?, syllabus_content = ?, content = ?, status = ?
                WHERE id = ?
            ");
            $stmt->execute([$title, $slug, $degree_type, $duration, $eligibility, $key_features, $career_opportunities, $syllabus_content, $content, $status, $id]);
            $message = 'Course program updated successfully!';
        } else {
            $stmt = $pdo->prepare("
                INSERT INTO courses (title, slug, degree_type, duration, eligibility, key_features, career_opportunities, syllabus_content, content, status)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
            ");
            $stmt->execute([$title, $slug, $degree_type, $duration, $eligibility, $key_features, $career_opportunities, $syllabus_content, $content, $status]);
            $message = 'New course program added successfully!';
        }
    } elseif ($action === 'delete' && $id) {
        $stmt = $pdo->prepare("DELETE FROM courses WHERE id = ?");
        $stmt->execute([$id]);
        $message = 'Course deleted successfully!';
    } elseif ($action === 'toggle_status' && $id) {
        $stmt = $pdo->prepare("UPDATE courses SET status = 1 - status WHERE id = ?");
        $stmt->execute([$id]);
        $message = 'Course status updated!';
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
    $sql .= " AND (title LIKE ? OR slug LIKE ? OR content LIKE ?)";
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
$ugCount = $pdo->query("SELECT COUNT(*) FROM courses WHERE degree_type = 'UG'")->fetchColumn();
$pgCount = $pdo->query("SELECT COUNT(*) FROM courses WHERE degree_type = 'PG'")->fetchColumn();
$diplomaCount = $pdo->query("SELECT COUNT(*) FROM courses WHERE degree_type = 'Diploma'")->fetchColumn();

require_once 'header.php';
?>

<div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-4">
    <div>
        <h3 class="font-serif fw-bold text-primary mb-1">Academic Courses &amp; Programs Manager</h3>
        <p class="text-muted small mb-0">Manage degree curriculums, eligibility criteria, career opportunities, syllabuses, and program snapshots dynamically.</p>
    </div>
    <button class="btn btn-primary rounded-pill btn-sm px-3 shadow-sm" data-bs-toggle="modal" data-bs-target="#courseModal" onclick="openAddModal()">
        <i class="fa-solid fa-graduation-cap me-1.5"></i> Add New Course
    </button>
</div>

<!-- Stats Row -->
<div class="row g-3 mb-4">
    <div class="col-md-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <p>Total Programs</p>
                    <h3><?php echo $totalCount; ?></h3>
                </div>
                <i class="fa-solid fa-book-bookmark text-gold fs-1 opacity-50"></i>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <p>Undergraduate (UG)</p>
                    <h3 class="text-primary"><?php echo $ugCount; ?></h3>
                </div>
                <i class="fa-solid fa-user-graduate text-primary fs-1 opacity-50"></i>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <p>Postgraduate (PG)</p>
                    <h3 class="text-success"><?php echo $pgCount; ?></h3>
                </div>
                <i class="fa-solid fa-award text-success fs-1 opacity-50"></i>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <p>Diploma Programs</p>
                    <h3 class="text-warning"><?php echo $diplomaCount; ?></h3>
                </div>
                <i class="fa-solid fa-certificate text-warning fs-1 opacity-50"></i>
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

<!-- Filter & Search Bar -->
<div class="card shadow-sm border-0 mb-4">
    <div class="card-body p-3">
        <form method="GET" class="row g-2 align-items-center">
            <div class="col-md-4">
                <select name="level" class="form-select form-select-sm" onchange="this.form.submit()">
                    <option value="">-- All Degree Levels (<?php echo $totalCount; ?>) --</option>
                    <option value="UG" <?php echo ($filter_level === 'UG') ? 'selected' : ''; ?>>Undergraduate (UG)</option>
                    <option value="PG" <?php echo ($filter_level === 'PG') ? 'selected' : ''; ?>>Postgraduate (PG)</option>
                    <option value="Diploma" <?php echo ($filter_level === 'Diploma') ? 'selected' : ''; ?>>Diploma</option>
                    <option value="Doctorate" <?php echo ($filter_level === 'Doctorate') ? 'selected' : ''; ?>>Doctorate / Ph.D.</option>
                </select>
            </div>
            <div class="col-md-6">
                <div class="input-group input-group-sm">
                    <span class="input-group-text bg-white"><i class="fa-solid fa-search text-muted"></i></span>
                    <input type="text" name="q" class="form-control" placeholder="Search course title, slug, keywords..." value="<?php echo htmlspecialchars($search_q); ?>">
                </div>
            </div>
            <div class="col-md-2 d-flex gap-1">
                <button type="submit" class="btn btn-sm btn-primary w-100">Filter</button>
                <?php if ($filter_level || $search_q): ?>
                <a href="courses_manager.php" class="btn btn-sm btn-outline-secondary" title="Reset Filters"><i class="fa-solid fa-rotate-left"></i></a>
                <?php endif; ?>
            </div>
        </form>
    </div>
</div>

<!-- Courses Table Card -->
<div class="card shadow-sm border-0">
    <div class="card-header bg-white d-flex justify-content-between align-items-center">
        <span class="fw-bold"><i class="fa-solid fa-list me-1.5 text-gold"></i> Academic Courses (<?php echo count($coursesList); ?>)</span>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light small text-uppercase">
                    <tr>
                        <th class="ps-4" style="width: 80px;">Level</th>
                        <th>Program / Course Name</th>
                        <th>URL Slug</th>
                        <th>Duration</th>
                        <th>Eligibility Summary</th>
                        <th style="width: 90px;">Status</th>
                        <th class="text-end pe-4" style="width: 140px;">Actions</th>
                    </tr>
                </thead>
                <tbody class="small">
                    <?php if (empty($coursesList)): ?>
                    <tr>
                        <td colspan="7" class="text-center py-5 text-muted">
                            <i class="fa-solid fa-book-open fs-1 d-block mb-2 opacity-50"></i>
                            No courses found. Click "Add New Course" to add one.
                        </td>
                    </tr>
                    <?php else: ?>
                    <?php foreach ($coursesList as $c): ?>
                    <tr>
                        <td class="ps-4">
                            <span class="badge <?php echo ($c['degree_type'] === 'UG') ? 'bg-primary' : (($c['degree_type'] === 'PG') ? 'bg-success' : 'bg-warning text-dark'); ?> px-2.5 py-1">
                                <?php echo htmlspecialchars($c['degree_type']); ?>
                            </span>
                        </td>
                        <td>
                            <strong class="font-serif fs-6 text-primary"><?php echo htmlspecialchars($c['title']); ?></strong>
                        </td>
                        <td>
                            <code>course/<?php echo htmlspecialchars($c['slug']); ?>.php</code>
                        </td>
                        <td>
                            <span class="badge bg-light text-dark border"><?php echo htmlspecialchars($c['duration']); ?></span>
                        </td>
                        <td>
                            <small class="text-muted d-inline-block text-truncate" style="max-width: 250px;">
                                <?php echo htmlspecialchars(mb_strimwidth(strip_tags($c['eligibility']), 0, 65, '...')); ?>
                            </small>
                        </td>
                        <td>
                            <form method="POST" class="d-inline">
                                <input type="hidden" name="action" value="toggle_status">
                                <input type="hidden" name="id" value="<?php echo $c['id']; ?>">
                                <?php if ($c['status'] == 1): ?>
                                <button type="submit" class="btn btn-xs badge bg-success text-white border-0 px-2 py-1" style="font-size: 0.72rem; cursor: pointer;">Active</button>
                                <?php else: ?>
                                <button type="submit" class="btn btn-xs badge bg-secondary text-white border-0 px-2 py-1" style="font-size: 0.72rem; cursor: pointer;">Inactive</button>
                                <?php endif; ?>
                            </form>
                        </td>
                        <td class="text-end pe-4">
                            <a href="../course/<?php echo htmlspecialchars($c['slug']); ?>.php" target="_blank" class="btn btn-sm btn-outline-secondary rounded-circle p-0" style="width: 32px; height: 32px;" title="View Course Page">
                                <i class="fa-solid fa-arrow-up-right-from-square text-xs"></i>
                            </a>
                            <button class="btn btn-sm btn-outline-primary rounded-circle p-0 ms-1" style="width: 32px; height: 32px;" onclick='openEditModal(<?php echo json_encode($c, JSON_HEX_APOS | JSON_HEX_QUOT); ?>)' title="Edit Course">
                                <i class="fa-solid fa-pen text-xs"></i>
                            </button>
                            <form method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this course program?');">
                                <input type="hidden" name="action" value="delete">
                                <input type="hidden" name="id" value="<?php echo $c['id']; ?>">
                                <button type="submit" class="btn btn-sm btn-outline-danger rounded-circle p-0 ms-1" style="width: 32px; height: 32px;" title="Delete Course">
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
<div class="modal fade" id="courseModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content border-0 shadow">
            <form method="POST">
                <input type="hidden" name="action" value="save">
                <input type="hidden" name="id" id="modal_id" value="">
                
                <div class="modal-header border-bottom">
                    <h5 class="modal-title font-serif fw-bold text-primary" id="modalTitle">Add New Academic Course</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                
                <div class="modal-body p-4">
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label small fw-bold">Course Title <span class="text-danger">*</span></label>
                            <input type="text" name="title" id="modal_title" class="form-control" placeholder="e.g. B.E. (Computer Science Engineering)" required>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label small fw-bold">Degree Level <span class="text-danger">*</span></label>
                            <select name="degree_type" id="modal_degree_type" class="form-select" required>
                                <option value="UG">Undergraduate (UG)</option>
                                <option value="PG">Postgraduate (PG)</option>
                                <option value="Diploma">Diploma</option>
                                <option value="Doctorate">Doctorate / Ph.D.</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label small fw-bold">Duration</label>
                            <input type="text" name="duration" id="modal_duration" class="form-control" placeholder="e.g. 4 Years / 2 Years">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-bold">URL Slug</label>
                            <input type="text" name="slug" id="modal_slug" class="form-control" placeholder="e.g. b-e-computer-science-engineering">
                            <small class="text-muted" style="font-size: 0.75rem;">Leave blank to generate automatically from title.</small>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-bold">Eligibility Criteria</label>
                            <textarea name="eligibility" id="modal_eligibility" class="form-control" rows="2" placeholder="Passed 10+2 with Physics, Mathematics..."></textarea>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Course Overview / Description</label>
                        <textarea name="content" id="modal_content" class="form-control" rows="4" placeholder="Comprehensive description of the degree curriculum, focus areas, and pedagogical highlights..."></textarea>
                    </div>
                    
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label small fw-bold">Key Features &amp; Highlights (List)</label>
                            <textarea name="key_features" id="modal_key_features" class="form-control font-monospace small" rows="5" placeholder="<li><strong>Advanced Specialization:</strong> AI & ML...</li>"></textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-bold">Career Opportunities &amp; Job Roles (List)</label>
                            <textarea name="career_opportunities" id="modal_career_opportunities" class="form-control font-monospace small" rows="5" placeholder="<li>Software Engineer / Developer</li>"></textarea>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Syllabus Curriculum (HTML / Table)</label>
                        <textarea name="syllabus_content" id="modal_syllabus_content" class="form-control font-monospace small" rows="3" placeholder="Syllabus links, scheme table or subject lists..."></textarea>
                    </div>
                    
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="status" id="modal_status" value="1" checked>
                        <label class="form-check-label small fw-bold" for="modal_status">Active Program (Visible to students)</label>
                    </div>
                </div>
                
                <div class="modal-footer border-top bg-light">
                    <button type="button" class="btn btn-sm btn-outline-secondary rounded-pill px-3" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-sm btn-primary rounded-pill px-4">Save Course</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function openAddModal() {
    document.getElementById('modalTitle').innerText = 'Add New Academic Course';
    document.getElementById('modal_id').value = '';
    document.getElementById('modal_title').value = '';
    document.getElementById('modal_slug').value = '';
    document.getElementById('modal_degree_type').value = 'UG';
    document.getElementById('modal_duration').value = '4 Years';
    document.getElementById('modal_eligibility').value = '';
    document.getElementById('modal_content').value = '';
    document.getElementById('modal_key_features').value = '';
    document.getElementById('modal_career_opportunities').value = '';
    document.getElementById('modal_syllabus_content').value = '';
    document.getElementById('modal_status').checked = true;
}

function openEditModal(c) {
    document.getElementById('modalTitle').innerText = 'Edit Course: ' + c.title;
    document.getElementById('modal_id').value = c.id;
    document.getElementById('modal_title').value = c.title;
    document.getElementById('modal_slug').value = c.slug;
    document.getElementById('modal_degree_type').value = c.degree_type;
    document.getElementById('modal_duration').value = c.duration;
    document.getElementById('modal_eligibility').value = c.eligibility || '';
    document.getElementById('modal_content').value = c.content || '';
    document.getElementById('modal_key_features').value = c.key_features || '';
    document.getElementById('modal_career_opportunities').value = c.career_opportunities || '';
    document.getElementById('modal_syllabus_content').value = c.syllabus_content || '';
    document.getElementById('modal_status').checked = (c.status == 1);
    
    const modal = new bootstrap.Modal(document.getElementById('courseModal'));
    modal.show();
}
</script>

<?php require_once 'footer.php'; ?>
