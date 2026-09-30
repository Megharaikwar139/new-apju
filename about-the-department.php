<?php 
require_once "db.php";

// If a specific department is requested, hand over to department-view.php
if (!empty($_GET['dept'])) {
    require_once __DIR__ . '/department-view.php';
    exit;
}

$pageTitle = "Academic Departments & Schools - Dr. APJ Abdul Kalam University, Indore";
include "header.php"; 

// Fetch all active departments grouped by faculty group
$departmentsByGroup = [];
try {
    $stmt = $pdo->query("SELECT * FROM departments WHERE status = 1 ORDER BY faculty_group ASC, name ASC");
    $allDepts = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($allDepts as $d) {
        $grp = $d['faculty_group'] ?: 'General Academic Departments';
        $departmentsByGroup[$grp][] = $d;
    }
} catch (Exception $e) {}
?>

<!-- Inner Page Luxury Hero Banner -->
<section class="inner-page-hero">
    <div class="container-custom position-relative" style="z-index: 2;">
        <div class="inner-breadcrumb-pill">
            <a href="index.php"><i class="fa-solid fa-house me-1"></i> Home</a>
            <span>&raquo;</span>
            <a href="programs.php">Academics</a>
            <span>&raquo;</span>
            <span class="text-gold fw-medium">Academic Departments</span>
        </div>
        
        <div class="eyebrow-label gold-eyebrow mb-2" style="color: var(--gold-color) !important;">
            <span style="background: var(--gold-color); width: 1.5rem; height: 1px; display: inline-block;"></span> FACULTIES &amp; DEPARTMENTS
        </div>
        <h1 class="font-serif display-5 fw-medium text-white mb-2" style="max-width: 950px; line-height: 1.15;">
            Academic Departments &amp; Constituent Schools
        </h1>
        <p class="text-white text-opacity-80 small mb-0" style="letter-spacing: 0.12em; text-transform: uppercase;">
            Dr. A.P.J. Abdul Kalam University · Multidisciplinary Centers of Excellence &amp; Professional Education
        </p>
    </div>
</section>

<!-- Main Body -->
<main class="py-5" style="background-color: var(--bg-ivory);">
    <div class="container-custom">
        <div class="row g-4 g-xl-5">
            
            <!-- Left Main Content -->
            <div class="col-lg-8 col-xl-9">
                <article class="inner-main-card">
                    
                    <!-- Intro Highlight Card -->
                    <div class="intro-highlight-card mb-5">
                        <div class="d-flex align-items-center gap-3.5">
                            <div class="intro-highlight-badge">
                                <i class="fa-solid fa-building-columns"></i>
                            </div>
                            <div>
                                <h3 class="font-serif text-primary fs-4 fw-bold mb-1">Academic Governance &amp; Disciplines</h3>
                                <p class="mb-0 text-muted-custom" style="font-size: 0.95rem; line-height: 1.75;">
                                    Dr. A.P.J. Abdul Kalam University hosts <strong>27 specialized academic departments</strong> organized across 4 major faculties: Engineering &amp; Technology, Health Sciences &amp; Pharmacy, Management &amp; Commerce, and Professional Studies (Law, Agriculture, Science, Arts &amp; Education). Each department offers AICTE/PCI/UGC approved programs backed by modern research laboratories.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Faculties & Departments Section -->
                    <?php foreach ($departmentsByGroup as $groupName => $deptList): ?>
                    <div class="mb-5">
                        <div class="tab-section-header mb-4 pb-2.5 border-bottom border-custom d-flex align-items-center justify-content-between flex-wrap gap-2">
                            <div class="d-flex align-items-center gap-2.5">
                                <span class="section-icon-pill"><i class="fa-solid fa-graduation-cap"></i></span>
                                <h3 class="font-serif text-primary fs-4 fw-bold m-0"><?php echo htmlspecialchars($groupName); ?></h3>
                            </div>
                            <span class="custom-badge-pill">
                                <i class="fa-solid fa-layer-group text-gold me-1.5"></i> <?php echo count($deptList); ?> Departments
                            </span>
                        </div>

                        <div class="row g-3.5">
                            <?php foreach ($deptList as $dept): 
                                $deptUrl = file_exists($dept['slug'] . '.php') ? ($dept['slug'] . '.php') : ('department-view.php?dept=' . urlencode($dept['slug']));
                            ?>
                            <div class="col-md-6">
                                <div class="p-4 rounded-4 border border-custom bg-white shadow-xs h-100 d-flex flex-column justify-content-between hover-shadow transition-all" style="transition: all 0.25s ease;">
                                    <div>
                                        <div class="d-flex align-items-center justify-content-between mb-2">
                                            <span class="badge bg-light text-primary border small px-2.5 py-1 fw-bold">Department</span>
                                            <i class="fa-solid fa-arrow-right text-gold" style="font-size: 0.8rem;"></i>
                                        </div>
                                        <h4 class="font-serif text-primary fs-5 fw-bold mb-2" style="line-height: 1.35;">
                                            <a href="<?php echo htmlspecialchars($deptUrl); ?>" class="text-primary text-decoration-none hover-gold">
                                                <?php echo htmlspecialchars($dept['name']); ?>
                                            </a>
                                        </h4>
                                        <p class="text-muted-custom small mb-3" style="font-size: 0.85rem; line-height: 1.55;">
                                            <?php echo htmlspecialchars($dept['hero_subtitle'] ?? 'Dedicated center of academic excellence and experiential learning.'); ?>
                                        </p>
                                    </div>
                                    <div class="pt-2 border-top border-custom d-flex align-items-center justify-content-between">
                                        <span class="small text-muted" style="font-size: 0.78rem;">Degree Programs &amp; Faculty</span>
                                        <a href="<?php echo htmlspecialchars($deptUrl); ?>" class="btn btn-sm btn-outline-primary rounded-pill px-3 py-1 font-monospace fw-semibold" style="font-size: 0.78rem;">
                                            Explore <i class="fa-solid fa-chevron-right ms-1" style="font-size: 0.68rem;"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php endforeach; ?>

                    <!-- Contact Inquiries Footer Box -->
                    <div class="p-4 rounded-4 border border-custom bg-white d-flex align-items-center justify-content-between flex-wrap gap-3 shadow-xs mt-5">
                        <div>
                            <h5 class="font-serif text-primary fw-bold fs-6 mb-0.5">Need More Information?</h5>
                            <p class="small text-muted-custom mb-0">For statutory documentation or academic queries regarding Academic Departments, reach out to the Registrar Office.</p>
                        </div>
                        <a href="contact-us.php" class="btn btn-sm btn-gold-pill px-3.5 py-2 fw-bold">
                            <i class="fa-solid fa-headset me-1"></i> Contact Registrar
                        </a>
                    </div>

                </article>
            </div>

            <!-- Right Sidebar -->
            <div class="col-lg-4 col-xl-3">
                <?php include "faculty-sidebar.php"; ?>
            </div>

        </div>
    </div>
</main>

<?php include "footer.php"; ?>
