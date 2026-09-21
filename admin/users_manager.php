<?php
require_once 'auth.php';

// Only Super Admin can access this user manager
if (!is_superadmin()) {
    render_access_denied('users_manager.php');
    exit;
}

$message = '';
$error = '';
$allModules = get_available_cms_modules();

// Handle POST actions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    
    // --- 1. ADD NEW USER ---
    if ($action === 'add_user') {
        $name = trim($_POST['name'] ?? '');
        $username = trim(strtolower($_POST['username'] ?? ''));
        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';
        $role = in_array($_POST['role'] ?? '', ['superadmin', 'editor']) ? $_POST['role'] : 'editor';
        $status = isset($_POST['status']) ? 1 : 0;
        $selectedPerms = $_POST['permissions'] ?? [];

        if (empty($username) || empty($password)) {
            $error = 'Username and Password are required.';
        } elseif (strlen($password) < 6) {
            $error = 'Password must be at least 6 characters long.';
        } else {
            // Check if username already exists
            $checkStmt = $pdo->prepare("SELECT id FROM admins WHERE username = ? LIMIT 1");
            $checkStmt->execute([$username]);
            if ($checkStmt->fetch()) {
                $error = "Username '{$username}' is already taken. Please choose another.";
            } else {
                try {
                    $pdo->beginTransaction();

                    $passHash = password_hash($password, PASSWORD_DEFAULT);
                    $insStmt = $pdo->prepare("INSERT INTO admins (name, username, email, password_hash, role, status) VALUES (?, ?, ?, ?, ?, ?)");
                    $insStmt->execute([$name, $username, $email, $passHash, $role, $status]);
                    $newUserId = (int)$pdo->lastInsertId();

                    // Insert permissions if role is editor
                    if ($role === 'editor' && !empty($selectedPerms)) {
                        $pInsStmt = $pdo->prepare("INSERT INTO admin_permissions (admin_id, module_key) VALUES (?, ?)");
                        foreach ($selectedPerms as $modKey) {
                            $modKey = trim($modKey);
                            if (!empty($modKey)) {
                                $pInsStmt->execute([$newUserId, $modKey]);
                            }
                        }
                    }

                    $pdo->commit();
                    $message = "User account '{$username}' created successfully!";
                } catch (Exception $e) {
                    $pdo->rollBack();
                    $error = "Error creating user: " . $e->getMessage();
                }
            }
        }
    }

    // --- 2. EDIT USER & PERMISSIONS ---
    elseif ($action === 'edit_user') {
        $userId = (int)($_POST['user_id'] ?? 0);
        $name = trim($_POST['name'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';
        $role = in_array($_POST['role'] ?? '', ['superadmin', 'editor']) ? $_POST['role'] : 'editor';
        $status = isset($_POST['status']) ? 1 : 0;
        $selectedPerms = $_POST['permissions'] ?? [];

        // Check user existence
        $uStmt = $pdo->prepare("SELECT * FROM admins WHERE id = ? LIMIT 1");
        $uStmt->execute([$userId]);
        $targetUser = $uStmt->fetch();

        if (!$targetUser) {
            $error = "User not found.";
        } else {
            // Protect primary admin from losing superadmin or being deactivated
            if ((int)$targetUser['id'] === 1) {
                $role = 'superadmin';
                $status = 1;
            }

            try {
                $pdo->beginTransaction();

                if (!empty($password)) {
                    if (strlen($password) < 6) {
                        throw new Exception("New password must be at least 6 characters.");
                    }
                    $passHash = password_hash($password, PASSWORD_DEFAULT);
                    $updStmt = $pdo->prepare("UPDATE admins SET name = ?, email = ?, password_hash = ?, role = ?, status = ? WHERE id = ?");
                    $updStmt->execute([$name, $email, $passHash, $role, $status, $userId]);
                } else {
                    $updStmt = $pdo->prepare("UPDATE admins SET name = ?, email = ?, role = ?, status = ? WHERE id = ?");
                    $updStmt->execute([$name, $email, $role, $status, $userId]);
                }

                // Update permissions
                $pdo->prepare("DELETE FROM admin_permissions WHERE admin_id = ?")->execute([$userId]);

                if ($role === 'editor' && !empty($selectedPerms)) {
                    $pInsStmt = $pdo->prepare("INSERT INTO admin_permissions (admin_id, module_key) VALUES (?, ?)");
                    foreach ($selectedPerms as $modKey) {
                        $modKey = trim($modKey);
                        if (!empty($modKey)) {
                            $pInsStmt->execute([$userId, $modKey]);
                        }
                    }
                }

                $pdo->commit();
                $message = "User '{$targetUser['username']}' updated successfully!";
            } catch (Exception $e) {
                $pdo->rollBack();
                $error = "Error updating user: " . $e->getMessage();
            }
        }
    }

    // --- 3. TOGGLE STATUS ---
    elseif ($action === 'toggle_status') {
        $userId = (int)($_POST['user_id'] ?? 0);
        if ($userId === 1 || $userId === (int)$_SESSION['admin_id']) {
            $error = "You cannot deactivate your own account or the master Super Admin.";
        } else {
            $currStatus = (int)($_POST['current_status'] ?? 1);
            $newStatus = ($currStatus === 1) ? 0 : 1;
            $pdo->prepare("UPDATE admins SET status = ? WHERE id = ?")->execute([$newStatus, $userId]);
            $message = "User status changed successfully.";
        }
    }

    // --- 4. DELETE USER ---
    elseif ($action === 'delete_user') {
        $userId = (int)($_POST['user_id'] ?? 0);
        if ($userId === 1) {
            $error = "Master Super Administrator account cannot be deleted.";
        } elseif ($userId === (int)$_SESSION['admin_id']) {
            $error = "You cannot delete your currently logged-in account.";
        } else {
            $pdo->prepare("DELETE FROM admins WHERE id = ?")->execute([$userId]);
            $message = "User deleted successfully.";
        }
    }
}

// Fetch all users with permission count
$users = $pdo->query("
    SELECT a.*, 
           (SELECT COUNT(*) FROM admin_permissions WHERE admin_id = a.id) AS perm_count
    FROM admins a 
    ORDER BY a.id ASC
")->fetchAll(PDO::FETCH_ASSOC);

// Pre-fetch all user permissions mapped by admin_id
$userPermsMap = [];
$permRows = $pdo->query("SELECT admin_id, module_key FROM admin_permissions")->fetchAll(PDO::FETCH_ASSOC);
foreach ($permRows as $pr) {
    $userPermsMap[$pr['admin_id']][] = $pr['module_key'];
}

$pageTitle = "Admin Users & Permissions Management";
require_once 'header.php';
?>

<style>
/* Fix Modal Scroll: Keep header & footer fixed, body independently scrollable */
.modal-dialog-scrollable .modal-content {
    max-height: 90vh !important;
    display: flex !important;
    flex-direction: column !important;
    overflow: hidden !important;
}
.modal-dialog-scrollable .modal-header,
.modal-dialog-scrollable .modal-footer {
    flex-shrink: 0 !important;
}
.modal-dialog-scrollable .modal-body {
    flex-grow: 1 !important;
    overflow-y: auto !important;
    max-height: calc(90vh - 145px) !important;
}
</style>

<div class="container-fluid px-0">
    
    <!-- Top Header Banner -->
    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">
        <div>
            <div class="d-flex align-items-center gap-2 mb-1">
                <span class="badge bg-gold text-dark fw-bold px-2.5 py-1 rounded-pill" style="font-size: 0.72rem;">SYSTEM SECURITY & RBAC</span>
                <span class="text-muted small"><i class="fa-solid fa-users-gear me-1"></i> Access Control</span>
            </div>
            <h2 class="font-serif fw-bold text-primary display-6 mb-0" style="color: var(--admin-maroon-dark) !important;">
                Admin Users &amp; Page Permissions
            </h2>
            <p class="text-muted small mb-0">Create sub-users and grant individual module/page edit permissions with zero unauthorized access.</p>
        </div>
        
        <div class="d-flex align-items-center gap-2">
            <button type="button" class="btn btn-gold px-3 py-2 shadow-xs" data-bs-toggle="modal" data-bs-target="#addUserModal">
                <i class="fa-solid fa-user-plus me-1.5"></i> Add New Sub-Admin
            </button>
        </div>
    </div>

    <!-- Alerts -->
    <?php if (!empty($message)): ?>
        <div class="alert alert-success alert-dismissible fade show rounded-3 shadow-xs mb-4" role="alert">
            <i class="fa-solid fa-circle-check me-2"></i> <?php echo htmlspecialchars($message); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <?php if (!empty($error)): ?>
        <div class="alert alert-danger alert-dismissible fade show rounded-3 shadow-xs mb-4" role="alert">
            <i class="fa-solid fa-triangle-exclamation me-2"></i> <?php echo htmlspecialchars($error); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <!-- 4 Stats Cards -->
    <div class="row g-3 mb-4">
        <div class="col-6 col-md-3">
            <div class="card border-0 shadow-xs p-3 rounded-4 bg-white" style="border: 1px solid var(--admin-border) !important;">
                <div class="d-flex align-items-center gap-3">
                    <div class="icon-circle-badge"><i class="fa-solid fa-users"></i></div>
                    <div>
                        <div class="fs-4 fw-bold font-serif text-primary lh-1"><?php echo count($users); ?></div>
                        <div class="text-muted small" style="font-size: 0.78rem;">Total Accounts</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card border-0 shadow-xs p-3 rounded-4 bg-white" style="border: 1px solid var(--admin-border) !important;">
                <div class="d-flex align-items-center gap-3">
                    <div class="icon-circle-badge" style="background: rgba(212,175,55,0.15) !important; border-color: var(--admin-gold) !important; color: #82600c !important;">
                        <i class="fa-solid fa-crown" style="color: #82600c !important;"></i>
                    </div>
                    <div>
                        <div class="fs-4 fw-bold font-serif text-primary lh-1">
                            <?php echo count(array_filter($users, fn($u) => $u['role'] === 'superadmin')); ?>
                        </div>
                        <div class="text-muted small" style="font-size: 0.78rem;">Super Admins</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card border-0 shadow-xs p-3 rounded-4 bg-white" style="border: 1px solid var(--admin-border) !important;">
                <div class="d-flex align-items-center gap-3">
                    <div class="icon-circle-badge"><i class="fa-solid fa-user-pen"></i></div>
                    <div>
                        <div class="fs-4 fw-bold font-serif text-primary lh-1">
                            <?php echo count(array_filter($users, fn($u) => $u['role'] === 'editor')); ?>
                        </div>
                        <div class="text-muted small" style="font-size: 0.78rem;">Sub-Admins / Editors</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card border-0 shadow-xs p-3 rounded-4 bg-white" style="border: 1px solid var(--admin-border) !important;">
                <div class="d-flex align-items-center gap-3">
                    <div class="icon-circle-badge" style="background: rgba(25,135,84,0.1) !important; border-color: #198754 !important; color: #198754 !important;">
                        <i class="fa-solid fa-user-check" style="color: #198754 !important;"></i>
                    </div>
                    <div>
                        <div class="fs-4 fw-bold font-serif text-primary lh-1">
                            <?php echo count(array_filter($users, fn($u) => (int)$u['status'] === 1)); ?>
                        </div>
                        <div class="text-muted small" style="font-size: 0.78rem;">Active Accounts</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Users Table Card -->
    <div class="card border-0 shadow-xs rounded-4 bg-white mb-4" style="border: 1px solid var(--admin-border) !important; overflow: hidden;">
        <div class="card-header bg-white py-3 px-4 d-flex justify-content-between align-items-center border-bottom border-custom">
            <h5 class="font-serif fw-bold text-primary mb-0 fs-5">
                <i class="fa-solid fa-shield-halved text-gold me-2"></i> All Administrator Accounts
            </h5>
            <span class="badge bg-light text-dark border px-3 py-1.5 rounded-pill small">
                <?php echo count($users); ?> Users Registered
            </span>
        </div>
        
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead>
                    <tr>
                        <th style="width: 50px;">#</th>
                        <th>User Profile</th>
                        <th>Username</th>
                        <th>Role</th>
                        <th>Access Scope</th>
                        <th>Status</th>
                        <th>Created</th>
                        <th class="text-end" style="min-width: 140px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($users)): ?>
                        <tr>
                            <td colspan="8" class="text-center py-5 text-muted">No users found.</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($users as $idx => $u): 
                            $isMaster = ((int)$u['id'] === 1);
                            $isSelf = ((int)$u['id'] === (int)$_SESSION['admin_id']);
                            $userPerms = $userPermsMap[$u['id']] ?? [];
                        ?>
                        <tr>
                            <td class="text-muted small"><?php echo $idx + 1; ?></td>
                            <td>
                                <div class="d-flex align-items-center gap-2.5">
                                    <div class="rounded-circle bg-primary bg-opacity-10 d-inline-flex align-items-center justify-content-center border border-custom fw-bold text-primary" style="width: 38px; height: 38px; font-size: 0.85rem;">
                                        <?php 
                                            $initials = !empty($u['name']) ? strtoupper(substr($u['name'], 0, 1)) : strtoupper(substr($u['username'], 0, 1));
                                            echo $initials;
                                        ?>
                                    </div>
                                    <div>
                                        <div class="fw-semibold text-dark" style="font-size: 0.9rem;">
                                            <?php echo htmlspecialchars($u['name'] ?: $u['username']); ?>
                                            <?php if ($isSelf): ?>
                                                <span class="badge bg-secondary rounded-pill px-2 py-0.5 ms-1" style="font-size: 0.65rem;">You</span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="text-muted small" style="font-size: 0.78rem;">
                                            <?php echo htmlspecialchars($u['email'] ?: 'No email configured'); ?>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <code class="px-2 py-1 bg-light rounded text-primary fw-semibold" style="font-size: 0.82rem;">
                                    <?php echo htmlspecialchars($u['username']); ?>
                                </code>
                            </td>
                            <td>
                                <?php if ($u['role'] === 'superadmin'): ?>
                                    <span class="badge badge-gold px-2.5 py-1 rounded-pill" style="font-size: 0.75rem;">
                                        <i class="fa-solid fa-crown me-1 text-gold"></i> Super Admin
                                    </span>
                                <?php else: ?>
                                    <span class="badge badge-maroon px-2.5 py-1 rounded-pill" style="font-size: 0.75rem;">
                                        <i class="fa-solid fa-user-pen me-1"></i> Sub-Admin
                                    </span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if ($u['role'] === 'superadmin'): ?>
                                    <span class="text-success small fw-semibold">
                                        <i class="fa-solid fa-unlock-keyhole me-1"></i> Full Access (All 24 Modules)
                                    </span>
                                <?php else: ?>
                                    <?php if (!empty($userPerms)): ?>
                                        <button type="button" class="btn btn-sm btn-outline-secondary rounded-pill px-2.5 py-0.5" style="font-size: 0.78rem;" data-bs-toggle="tooltip" title="<?php echo htmlspecialchars(implode(', ', $userPerms)); ?>">
                                            <i class="fa-solid fa-list-check me-1 text-primary"></i> <?php echo count($userPerms); ?> Pages Allowed
                                        </button>
                                    <?php else: ?>
                                        <span class="badge bg-warning text-dark rounded-pill px-2 py-1" style="font-size: 0.72rem;">
                                            <i class="fa-solid fa-lock me-1"></i> No Pages Assigned
                                        </span>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if ((int)$u['status'] === 1): ?>
                                    <span class="badge bg-success bg-opacity-10 text-success border border-success border-opacity-25 rounded-pill px-2.5 py-1" style="font-size: 0.75rem;">
                                        <i class="fa-solid fa-circle-check me-1"></i> Active
                                    </span>
                                <?php else: ?>
                                    <span class="badge bg-danger bg-opacity-10 text-danger border border-danger border-opacity-25 rounded-pill px-2.5 py-1" style="font-size: 0.75rem;">
                                        <i class="fa-solid fa-circle-xmark me-1"></i> Deactivated
                                    </span>
                                <?php endif; ?>
                            </td>
                            <td class="text-muted small" style="font-size: 0.8rem;">
                                <?php echo date('d M Y', strtotime($u['created_at'])); ?>
                            </td>
                            <td class="text-end">
                                <div class="d-inline-flex gap-1.5 align-items-center">
                                    <!-- Edit User & Perms -->
                                    <button type="button" class="btn btn-sm btn-outline-primary rounded-circle" style="width: 32px; height: 32px; padding: 0;" title="Edit User & Permissions"
                                            onclick="openEditUserModal(<?php echo htmlspecialchars(json_encode($u)); ?>, <?php echo htmlspecialchars(json_encode($userPerms)); ?>)">
                                        <i class="fa-solid fa-pen" style="font-size: 0.78rem;"></i>
                                    </button>

                                    <!-- Status Toggle -->
                                    <?php if (!$isMaster && !$isSelf): ?>
                                        <form method="POST" class="d-inline" onsubmit="return confirm('Change status for user <?php echo htmlspecialchars($u['username']); ?>?');">
                                            <input type="hidden" name="action" value="toggle_status">
                                            <input type="hidden" name="user_id" value="<?php echo $u['id']; ?>">
                                            <input type="hidden" name="current_status" value="<?php echo $u['status']; ?>">
                                            <button type="submit" class="btn btn-sm <?php echo ((int)$u['status'] === 1) ? 'btn-outline-warning' : 'btn-outline-success'; ?> rounded-circle" style="width: 32px; height: 32px; padding: 0;" title="<?php echo ((int)$u['status'] === 1) ? 'Deactivate User' : 'Activate User'; ?>">
                                                <i class="fa-solid <?php echo ((int)$u['status'] === 1) ? 'fa-ban' : 'fa-check'; ?>" style="font-size: 0.78rem;"></i>
                                            </button>
                                        </form>

                                        <!-- Delete User -->
                                        <form method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to permanently delete user <?php echo htmlspecialchars($u['username']); ?>? All their permission assignments will also be deleted.');">
                                            <input type="hidden" name="action" value="delete_user">
                                            <input type="hidden" name="user_id" value="<?php echo $u['id']; ?>">
                                            <button type="submit" class="btn btn-sm btn-outline-danger rounded-circle" style="width: 32px; height: 32px; padding: 0;" title="Delete User">
                                                <i class="fa-solid fa-trash" style="font-size: 0.78rem;"></i>
                                            </button>
                                        </form>
                                    <?php endif; ?>
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

<!-- ==================== MODAL 1: ADD NEW USER ==================== -->
<div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
        <form method="POST" action="users_manager.php" class="modal-content border-0 shadow-lg rounded-4">
            <input type="hidden" name="action" value="add_user">
            
            <div class="modal-header bg-primary text-white border-bottom border-custom py-3 px-4">
                <div class="d-flex align-items-center gap-2.5">
                    <div class="icon-circle-badge" style="background: rgba(255,255,255,0.15) !important; border-color: rgba(255,255,255,0.4) !important;">
                        <i class="fa-solid fa-user-plus text-white"></i>
                    </div>
                    <div>
                        <h5 class="modal-title font-serif fw-bold text-white mb-0" id="addUserModalLabel">Create New Sub-Admin Account</h5>
                        <p class="text-white text-opacity-80 small mb-0" style="font-size: 0.8rem;">Define user credentials and choose exact page-by-page editing access.</p>
                    </div>
                </div>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                
                <div class="modal-body p-4 bg-light">
                    
                    <!-- Basic Credentials Card -->
                    <div class="card border-0 shadow-xs p-3.5 rounded-4 bg-white mb-4" style="border: 1px solid var(--admin-border) !important;">
                        <h6 class="font-serif fw-bold text-primary border-bottom border-custom pb-2 mb-3 fs-6">
                            <i class="fa-solid fa-id-card text-gold me-1.5"></i> User Account Details
                        </h6>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label small fw-semibold">Full Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control" placeholder="e.g. Dr. Rajesh Sharma" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-semibold">Username (Login ID) <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light text-muted"><i class="fa-solid fa-user"></i></span>
                                    <input type="text" name="username" class="form-control" placeholder="e.g. rajesh_sharma" required pattern="[a-zA-Z0-9_.-]+" title="Only alphanumeric, underscores, dots or hyphens">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-semibold">Email Address</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light text-muted"><i class="fa-solid fa-envelope"></i></span>
                                    <input type="email" name="email" class="form-control" placeholder="e.g. rajesh@aku.ac.in">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-semibold">Password <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light text-muted"><i class="fa-solid fa-key"></i></span>
                                    <input type="password" name="password" class="form-control" placeholder="Minimum 6 characters" required minlength="6">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-semibold">Account Role</label>
                                <select name="role" class="form-select" id="addRoleSelect" onchange="togglePermissionsArea('addRoleSelect', 'addPermissionsCard')">
                                    <option value="editor" selected>Sub-Admin / Editor (Custom Page Access)</option>
                                    <option value="superadmin">Super Administrator (Full Master Access)</option>
                                </select>
                            </div>
                            <div class="col-md-6 d-flex align-items-center pt-md-4">
                                <div class="form-check form-switch mt-2">
                                    <input class="form-check-input" type="checkbox" name="status" value="1" id="addStatusCheck" checked>
                                    <label class="form-check-label fw-semibold small" for="addStatusCheck">Account Active (Can log in)</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Module Permissions Matrix Card -->
                    <div class="card border-0 shadow-xs p-3.5 rounded-4 bg-white" id="addPermissionsCard" style="border: 1px solid var(--admin-border) !important;">
                        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 border-bottom border-custom pb-2 mb-3">
                            <div>
                                <h6 class="font-serif fw-bold text-primary mb-0 fs-6">
                                    <i class="fa-solid fa-list-check text-gold me-1.5"></i> Assign Page &amp; Module Edit Permissions
                                </h6>
                                <p class="text-muted small mb-0" style="font-size: 0.78rem;">
                                    Tick the exact pages this user is allowed to view and edit. All unchecked pages will be completely blocked and hidden from their view.
                                </p>
                            </div>
                            <div class="d-flex gap-2">
                                <button type="button" class="btn btn-sm btn-outline-primary py-1 px-2.5" style="font-size: 0.75rem;" onclick="toggleAllCheckboxes('#addPermissionsCard', true)">
                                    <i class="fa-solid fa-check-double me-1"></i> Select All
                                </button>
                                <button type="button" class="btn btn-sm btn-outline-secondary py-1 px-2.5" style="font-size: 0.75rem;" onclick="toggleAllCheckboxes('#addPermissionsCard', false)">
                                    <i class="fa-solid fa-xmark me-1"></i> Deselect All
                                </button>
                            </div>
                        </div>

                        <!-- Categorized Checkbox Grid -->
                        <div class="row g-3">
                            <?php foreach ($allModules as $catName => $modGroup): ?>
                                <div class="col-lg-6">
                                    <div class="p-3 rounded-3 bg-light border border-custom h-100">
                                        <div class="d-flex justify-content-between align-items-center mb-2 pb-1 border-bottom border-custom">
                                            <strong class="font-serif text-primary" style="font-size: 0.88rem;">
                                                <?php echo htmlspecialchars($catName); ?>
                                            </strong>
                                            <button type="button" class="btn btn-link btn-sm text-decoration-none p-0 text-gold" style="font-size: 0.72rem;" onclick="toggleGroupCheckboxes(this, true)">
                                                Select Group
                                            </button>
                                        </div>
                                        <div class="d-flex flex-column gap-2">
                                            <?php foreach ($modGroup as $mKey => $mInfo): ?>
                                                <div class="form-check">
                                                    <input class="form-check-input perm-checkbox" type="checkbox" name="permissions[]" value="<?php echo htmlspecialchars($mKey); ?>" id="add_perm_<?php echo md5($mKey); ?>">
                                                    <label class="form-check-label d-block" for="add_perm_<?php echo md5($mKey); ?>" style="cursor: pointer;">
                                                        <span class="fw-semibold text-dark small">
                                                            <i class="fa-solid <?php echo $mInfo['icon']; ?> text-gold me-1.5" style="width: 16px;"></i>
                                                            <?php echo htmlspecialchars($mInfo['title']); ?>
                                                        </span>
                                                        <span class="d-block text-muted" style="font-size: 0.74rem; line-height: 1.3;">
                                                            <?php echo htmlspecialchars($mInfo['desc']); ?>
                                                        </span>
                                                    </label>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>

                    </div>

                </div>

                <div class="modal-footer bg-white border-top border-custom py-3 px-4">
                    <button type="button" class="btn btn-outline-secondary px-3" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-gold px-4 py-2">
                        <i class="fa-solid fa-user-plus me-1.5"></i> Create Sub-Admin Account
                    </button>
                </div>

        </form>
    </div>
</div>


<!-- ==================== MODAL 2: EDIT USER & PERMISSIONS ==================== -->
<div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
        <form method="POST" action="users_manager.php" class="modal-content border-0 shadow-lg rounded-4">
            <input type="hidden" name="action" value="edit_user">
            <input type="hidden" name="user_id" id="editUserId" value="">
            
            <div class="modal-header bg-primary text-white border-bottom border-custom py-3 px-4">
                <div class="d-flex align-items-center gap-2.5">
                    <div class="icon-circle-badge" style="background: rgba(255,255,255,0.15) !important; border-color: rgba(255,255,255,0.4) !important;">
                        <i class="fa-solid fa-user-pen text-white"></i>
                    </div>
                    <div>
                        <h5 class="modal-title font-serif fw-bold text-white mb-0" id="editUserModalLabel">Edit User &amp; Page Permissions</h5>
                        <p class="text-white text-opacity-80 small mb-0" style="font-size: 0.8rem;">Modify account credentials, active status or edit assigned modules.</p>
                    </div>
                </div>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                
                <div class="modal-body p-4 bg-light">
                    
                    <!-- Basic Credentials Card -->
                    <div class="card border-0 shadow-xs p-3.5 rounded-4 bg-white mb-4" style="border: 1px solid var(--admin-border) !important;">
                        <h6 class="font-serif fw-bold text-primary border-bottom border-custom pb-2 mb-3 fs-6">
                            <i class="fa-solid fa-id-card text-gold me-1.5"></i> User Account Details
                        </h6>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label small fw-semibold">Full Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" id="editName" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-semibold">Username (Read Only)</label>
                                <input type="text" id="editUsername" class="form-control bg-light" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-semibold">Email Address</label>
                                <input type="email" name="email" id="editEmail" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-semibold">New Password (Leave blank to keep current password)</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light text-muted"><i class="fa-solid fa-key"></i></span>
                                    <input type="password" name="password" class="form-control" placeholder="Only enter if resetting password" minlength="6">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-semibold">Account Role</label>
                                <select name="role" id="editRoleSelect" class="form-select" onchange="togglePermissionsArea('editRoleSelect', 'editPermissionsCard')">
                                    <option value="editor">Sub-Admin / Editor (Custom Page Access)</option>
                                    <option value="superadmin">Super Administrator (Full Master Access)</option>
                                </select>
                            </div>
                            <div class="col-md-6 d-flex align-items-center pt-md-4">
                                <div class="form-check form-switch mt-2">
                                    <input class="form-check-input" type="checkbox" name="status" value="1" id="editStatusCheck">
                                    <label class="form-check-label fw-semibold small" for="editStatusCheck">Account Active (Can log in)</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Module Permissions Matrix Card -->
                    <div class="card border-0 shadow-xs p-3.5 rounded-4 bg-white" id="editPermissionsCard" style="border: 1px solid var(--admin-border) !important;">
                        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 border-bottom border-custom pb-2 mb-3">
                            <div>
                                <h6 class="font-serif fw-bold text-primary mb-0 fs-6">
                                    <i class="fa-solid fa-list-check text-gold me-1.5"></i> Update Page &amp; Module Edit Permissions
                                </h6>
                                <p class="text-muted small mb-0" style="font-size: 0.78rem;">
                                    Tick the exact pages this user is allowed to view and edit. All unchecked pages will be completely blocked.
                                </p>
                            </div>
                            <div class="d-flex gap-2">
                                <button type="button" class="btn btn-sm btn-outline-primary py-1 px-2.5" style="font-size: 0.75rem;" onclick="toggleAllCheckboxes('#editPermissionsCard', true)">
                                    <i class="fa-solid fa-check-double me-1"></i> Select All
                                </button>
                                <button type="button" class="btn btn-sm btn-outline-secondary py-1 px-2.5" style="font-size: 0.75rem;" onclick="toggleAllCheckboxes('#editPermissionsCard', false)">
                                    <i class="fa-solid fa-xmark me-1"></i> Deselect All
                                </button>
                            </div>
                        </div>

                        <!-- Categorized Checkbox Grid -->
                        <div class="row g-3">
                            <?php foreach ($allModules as $catName => $modGroup): ?>
                                <div class="col-lg-6">
                                    <div class="p-3 rounded-3 bg-light border border-custom h-100">
                                        <div class="d-flex justify-content-between align-items-center mb-2 pb-1 border-bottom border-custom">
                                            <strong class="font-serif text-primary" style="font-size: 0.88rem;">
                                                <?php echo htmlspecialchars($catName); ?>
                                            </strong>
                                            <button type="button" class="btn btn-link btn-sm text-decoration-none p-0 text-gold" style="font-size: 0.72rem;" onclick="toggleGroupCheckboxes(this, true)">
                                                Select Group
                                            </button>
                                        </div>
                                        <div class="d-flex flex-column gap-2">
                                            <?php foreach ($modGroup as $mKey => $mInfo): ?>
                                                <div class="form-check">
                                                    <input class="form-check-input edit-perm-checkbox" type="checkbox" name="permissions[]" value="<?php echo htmlspecialchars($mKey); ?>" id="edit_perm_<?php echo md5($mKey); ?>" data-mod="<?php echo htmlspecialchars($mKey); ?>">
                                                    <label class="form-check-label d-block" for="edit_perm_<?php echo md5($mKey); ?>" style="cursor: pointer;">
                                                        <span class="fw-semibold text-dark small">
                                                            <i class="fa-solid <?php echo $mInfo['icon']; ?> text-gold me-1.5" style="width: 16px;"></i>
                                                            <?php echo htmlspecialchars($mInfo['title']); ?>
                                                        </span>
                                                        <span class="d-block text-muted" style="font-size: 0.74rem; line-height: 1.3;">
                                                            <?php echo htmlspecialchars($mInfo['desc']); ?>
                                                        </span>
                                                    </label>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>

                    </div>

                </div>

                <div class="modal-footer bg-white border-top border-custom py-3 px-4">
                    <button type="button" class="btn btn-outline-secondary px-3" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-gold px-4 py-2">
                        <i class="fa-solid fa-floppy-disk me-1.5"></i> Save Changes &amp; Permissions
                    </button>
                </div>

        </form>
    </div>
</div>

<script>
function togglePermissionsArea(roleSelectId, permCardId) {
    const roleSelect = document.getElementById(roleSelectId);
    const permCard = document.getElementById(permCardId);
    if (!roleSelect || !permCard) return;
    if (roleSelect.value === 'superadmin') {
        permCard.style.opacity = '0.4';
        permCard.style.pointerEvents = 'none';
    } else {
        permCard.style.opacity = '1';
        permCard.style.pointerEvents = 'auto';
    }
}

function toggleAllCheckboxes(containerSelector, check) {
    const container = document.querySelector(containerSelector);
    if (!container) return;
    container.querySelectorAll('input[type="checkbox"][name="permissions[]"]').forEach(cb => {
        cb.checked = check;
    });
}

function toggleGroupCheckboxes(btn, check) {
    const group = btn.closest('.p-3');
    if (!group) return;
    const checkboxes = group.querySelectorAll('input[type="checkbox"][name="permissions[]"]');
    // If all are already checked, uncheck all; otherwise check all
    const allChecked = Array.from(checkboxes).every(cb => cb.checked);
    checkboxes.forEach(cb => cb.checked = !allChecked);
    btn.textContent = allChecked ? 'Select Group' : 'Deselect Group';
}

function openEditUserModal(user, perms) {
    document.getElementById('editUserId').value = user.id;
    document.getElementById('editName').value = user.name || '';
    document.getElementById('editUsername').value = user.username || '';
    document.getElementById('editEmail').value = user.email || '';
    document.getElementById('editRoleSelect').value = user.role || 'editor';
    document.getElementById('editStatusCheck').checked = (parseInt(user.status) === 1);

    // Lock role/status for Master Super Admin (ID: 1)
    const isMaster = (parseInt(user.id) === 1);
    document.getElementById('editRoleSelect').disabled = isMaster;
    document.getElementById('editStatusCheck').disabled = isMaster;

    // Reset all permission checkboxes
    const permCbs = document.querySelectorAll('.edit-perm-checkbox');
    permCbs.forEach(cb => {
        cb.checked = false;
    });

    // Check assigned permissions
    if (Array.isArray(perms)) {
        perms.forEach(modKey => {
            const match = document.querySelector(`.edit-perm-checkbox[data-mod="${modKey}"]`);
            if (match) {
                match.checked = true;
            }
        });
    }

    togglePermissionsArea('editRoleSelect', 'editPermissionsCard');

    const modalEl = document.getElementById('editUserModal');
    const modal = bootstrap.Modal.getOrCreateInstance(modalEl);
    modal.show();
}
</script>

<?php require_once 'footer.php'; ?>
