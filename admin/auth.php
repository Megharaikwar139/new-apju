<?php
if (session_status() === PHP_SESSION_NONE && !headers_sent()) {
    @session_start();
}

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login.php");
    exit;
}

require_once __DIR__ . '/../db.php';

// Verify active status in database
if (isset($_SESSION['admin_id'])) {
    try {
        $statusCheckStmt = $pdo->prepare("SELECT id, name, role, status FROM admins WHERE id = ? LIMIT 1");
        $statusCheckStmt->execute([$_SESSION['admin_id']]);
        $currentAdmin = $statusCheckStmt->fetch(PDO::FETCH_ASSOC);

        if (!$currentAdmin || (int)$currentAdmin['status'] !== 1) {
            // Account deactivated or deleted
            session_unset();
            session_destroy();
            header("Location: login.php?error=inactive");
            exit;
        }

        // Keep session synced
        $_SESSION['admin_role'] = $currentAdmin['role'];
        if (!empty($currentAdmin['name'])) {
            $_SESSION['admin_name'] = $currentAdmin['name'];
        }

        // Cache permissions if not already cached
        if (!isset($_SESSION['admin_permissions']) || !is_array($_SESSION['admin_permissions'])) {
            if ($currentAdmin['role'] === 'superadmin') {
                $_SESSION['admin_permissions'] = ['*'];
            } else {
                $permStmt = $pdo->prepare("SELECT module_key FROM admin_permissions WHERE admin_id = ?");
                $permStmt->execute([$currentAdmin['id']]);
                $_SESSION['admin_permissions'] = $permStmt->fetchAll(PDO::FETCH_COLUMN) ?: [];
            }
        }
    } catch (Exception $e) {
        // Fallback gracefully if database error
    }
}

/**
 * Check if the currently logged-in user is Super Administrator
 */
function is_superadmin() {
    return isset($_SESSION['admin_role']) && $_SESSION['admin_role'] === 'superadmin';
}

/**
 * Check if the current user has permission to access a specific module
 */
function has_permission($moduleKey) {
    if (is_superadmin()) {
        return true;
    }
    
    // Normalize module key (e.g. "gallery_manager.php" or "gallery_manager")
    $baseKey = basename($moduleKey);
    $perms = $_SESSION['admin_permissions'] ?? [];
    
    if (in_array('*', $perms, true)) {
        return true;
    }
    
    if (in_array($baseKey, $perms, true)) {
        return true;
    }
    
    // Check without extension
    $noExt = pathinfo($baseKey, PATHINFO_FILENAME);
    if (in_array($noExt, $perms, true) || in_array($noExt . '.php', $perms, true)) {
        return true;
    }
    
    return false;
}

/**
 * Enforce permission on a page. Displays 403 Access Denied if unauthorized.
 */
function require_permission($moduleKey) {
    if (!has_permission($moduleKey)) {
        render_access_denied($moduleKey);
        exit;
    }
}

/**
 * Render luxury Access Denied error page
 */
function render_access_denied($moduleKey = '') {
    http_response_code(403);
    $pageTitle = "Access Restricted";
    require_once __DIR__ . '/header.php';
    ?>
    <div class="container-fluid py-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 text-center">
                <div class="card border-0 shadow-sm p-4 p-md-5 rounded-4 bg-white" style="border: 1px solid var(--admin-border) !important;">
                    <div class="mb-4">
                        <div class="d-inline-flex align-items-center justify-content-center rounded-circle" style="width: 80px; height: 80px; background: rgba(88, 8, 19, 0.08); border: 2px solid var(--admin-maroon);">
                            <i class="fa-solid fa-shield-halved text-primary fs-1"></i>
                        </div>
                    </div>
                    <span class="badge bg-danger text-white px-3 py-1.5 rounded-pill mb-2 fw-semibold" style="font-size: 0.75rem; letter-spacing: 0.05em;">ACCESS RESTRICTED (403)</span>
                    <h3 class="font-serif fw-bold text-primary mb-2" style="font-size: 1.65rem;">Permission Denied</h3>
                    <p class="text-muted small mb-4" style="line-height: 1.7;">
                        Your user account does not have permission to view or edit this module (<code><?php echo htmlspecialchars($moduleKey); ?></code>). 
                        If you require access to this section, please contact the <strong>Super Administrator</strong>.
                    </p>
                    <div class="d-flex justify-content-center gap-2">
                        <a href="index.php" class="btn btn-gold px-4 py-2">
                            <i class="fa-solid fa-gauge-high me-1.5"></i> Back to Dashboard
                        </a>
                        <a href="logout.php" class="btn btn-outline-primary px-3 py-2">
                            <i class="fa-solid fa-arrow-right-from-bracket me-1"></i> Switch Account
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    require_once __DIR__ . '/footer.php';
    exit;
}

/**
 * Module registry helper for User Management & Permissions
 */
function get_available_cms_modules() {
    return [
        'Homepage CMS' => [
            'hero_manager.php' => ['title' => 'Hero Banner & Video', 'icon' => 'fa-film', 'desc' => 'Manage homepage top hero text, video and quick stats'],
            'about_manager.php' => ['title' => 'About University & 3 Pillars', 'icon' => 'fa-landmark', 'desc' => 'Edit university about section, legacy badge and academic pillars'],
            'schools_manager.php' => ['title' => '12 Academic Schools', 'icon' => 'fa-graduation-cap', 'desc' => 'Configure academic faculties and course counters'],
            'why_aku_manager.php' => ['title' => 'Why AKU (6 Highlight Cards)', 'icon' => 'fa-star', 'desc' => 'Update university highlights, campus facilities and features'],
            'research_manager.php' => ['title' => 'Research & Kalam Hub', 'icon' => 'fa-flask-vial', 'desc' => 'Manage research publications, project stats and annual report link'],
            'alumni_manager.php' => ['title' => 'Alumni Voices & Reviews', 'icon' => 'fa-quote-left', 'desc' => 'Add and update alumni testimonials and placements'],
            'portals_manager.php' => ['title' => 'Portals & Quick Services', 'icon' => 'fa-table-cells', 'desc' => 'Configure student/faculty quick portal links on homepage'],
            'admissions_cta_manager.php' => ['title' => 'Admissions CTA Banner', 'icon' => 'fa-bullhorn', 'desc' => 'Update admission session deadlines and action buttons'],
        ],
        'Admissions & Helpdesk' => [
            'admissions_manager.php' => ['title' => 'Admission Leads & Applications', 'icon' => 'fa-user-graduate', 'desc' => 'Review incoming student admission applications and track status'],
            'contact_manager.php' => ['title' => 'Contact Inquiries & Helpdesk', 'icon' => 'fa-envelope-open-text', 'desc' => 'Manage visitor queries and communication inquiries'],
        ],
        'Academics & Departments' => [
            'departments_manager.php' => ['title' => 'Departments & Tabs', 'icon' => 'fa-building-columns', 'desc' => 'Manage all 27 academic departments and dynamic tab contents'],
            'faculty_manager.php' => ['title' => 'Faculty & Staff Profiles', 'icon' => 'fa-chalkboard-user', 'desc' => 'Add/Edit department professors, photos, qualifications and designations'],
            'courses_manager.php' => ['title' => 'Courses & Syllabi', 'icon' => 'fa-book-bookmark', 'desc' => 'Manage 168+ UG, PG and Diploma degree programs, eligibility and syllabus'],
        ],
        'Dynamic News & Events' => [
            'events.php' => ['title' => 'Events Calendar', 'icon' => 'fa-calendar-days', 'desc' => 'Publish and manage university fests, convocations and seminars'],
            'notices.php' => ['title' => 'Official Notices & Circulars', 'icon' => 'fa-bell', 'desc' => 'Issue official academic notices, circulars and student alerts'],
            'blogs.php' => ['title' => 'Blogs & Articles', 'icon' => 'fa-newspaper', 'desc' => 'Publish campus news, research articles and announcements'],
            'media.php' => ['title' => 'Media Coverage & Press', 'icon' => 'fa-photo-film', 'desc' => 'Upload newspaper clippings and press release coverage'],
        ],
        'Placement & Campus Life' => [
            'recruiters_manager.php' => ['title' => '500+ Top Recruiters', 'icon' => 'fa-briefcase', 'desc' => 'Manage corporate recruitment partner logos and industry categories'],
            'gallery_manager.php' => ['title' => 'Campus Photo Gallery', 'icon' => 'fa-images', 'desc' => 'Upload high-res campus life photos with category filters'],
            'voi.php' => ['title' => 'Visitor Testimonials', 'icon' => 'fa-comments', 'desc' => 'Manage quotes from guest dignitaries and industry experts'],
        ],
        'Statutory & About Pages' => [
            'about_pages_manager.php' => ['title' => 'Leadership & Compliance Pages', 'icon' => 'fa-users-gear', 'desc' => 'Edit Chancellor, VC, Registrar messages and Mandatory Disclosure PDFs'],
            'pages.php' => ['title' => 'Custom CMS Pages', 'icon' => 'fa-file-lines', 'desc' => 'Create and edit custom content pages'],
        ]
    ];
}

// Automatic script-level permission enforcement
$currentScript = basename($_SERVER['SCRIPT_NAME'] ?? $_SERVER['PHP_SELF'] ?? '');
if ($currentScript && !in_array($currentScript, ['login.php', 'logout.php', 'index.php', 'auth.php', 'footer.php', 'header.php'])) {
    if (!has_permission($currentScript)) {
        render_access_denied($currentScript);
        exit;
    }
}
?>
