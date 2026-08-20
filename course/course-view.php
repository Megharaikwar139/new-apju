<?php
require_once "../db.php";

$slug = basename($_SERVER['PHP_SELF'], '.php');
if (isset($_GET['slug'])) {
    $slug = trim($_GET['slug']);
}

// Fetch Course from DB
$stmt = $pdo->prepare("SELECT * FROM courses WHERE slug = ? AND status = 1 LIMIT 1");
$stmt->execute([$slug]);
$course = $stmt->fetch();

if (!$course) {
    $stmt = $pdo->prepare("SELECT * FROM courses WHERE slug LIKE ? AND status = 1 LIMIT 1");
    $stmt->execute(['%' . $slug . '%']);
    $course = $stmt->fetch();
}

$courseTitle = $course['title'] ?? ucwords(str_replace(['-', 'engg', 'cse', 'it', 'ec', 'ex'], [' ', 'Engineering', 'Computer Science', 'Information Technology', 'Electronics', 'Electrical'], $slug));
$degreeType = $course['degree_type'] ?? 'UG';
$duration = $course['duration'] ?? '4 Years';
$approvals = $course['approvals'] ?? 'UGC Recognized | AICTE / PCI Approved';
$overview = $course['content'] ?? "The {$courseTitle} program at Dr. A.P.J. Abdul Kalam University is designed to equip students with solid theoretical foundations, advanced hands-on technical skills, and industry-oriented problem-solving competence.";
$eligibility = $course['eligibility'] ?? "Passed qualifying 10+2 / Diploma / Graduation examination with required minimum aggregate marks from a recognized Board/University.";
$keyFeatures = $course['key_features'] ?? '';
$careerOpportunities = $course['career_opportunities'] ?? '';
$syllabusContent = $course['syllabus_content'] ?? '';

// Format key features list items
$keyFeaturesHtml = '';
if (!empty($keyFeatures)) {
    if (strpos($keyFeatures, '<li>') !== false) {
        $keyFeaturesHtml = $keyFeatures;
    } else {
        $lines = preg_split('/\r\n|\r|\n/', trim($keyFeatures));
        foreach ($lines as $line) {
            $line = trim($line, " \t\n\r\0\x0B-•*");
            if (!empty($line)) {
                $keyFeaturesHtml .= '<li class="d-flex align-items-start gap-2.5"><i class="fa-solid fa-circle-check text-gold mt-1 flex-shrink-0"></i> <span>' . htmlspecialchars($line) . '</span></li>';
            }
        }
    }
}

// Format career opportunities list items
$careerOpportunitiesHtml = '';
if (!empty($careerOpportunities)) {
    if (strpos($careerOpportunities, '<li>') !== false) {
        $careerOpportunitiesHtml = $careerOpportunities;
    } else {
        $items = preg_split('/,|\r\n|\r|\n/', trim($careerOpportunities));
        foreach ($items as $item) {
            $item = trim($item, " \t\n\r\0\x0B-•*");
            if (!empty($item)) {
                $careerOpportunitiesHtml .= '<li class="d-flex align-items-start gap-2.5"><i class="fa-solid fa-arrow-trend-up text-gold mt-1 flex-shrink-0"></i> <span>' . htmlspecialchars($item) . '</span></li>';
            }
        }
    }
}

$pageTitle = htmlspecialchars($courseTitle) . " - Dr. APJ Abdul Kalam University, Indore";
include "../header.php";
?>

<!-- Inner Page Hero Banner -->
<section class="inner-page-hero">
    <div class="container-custom position-relative" style="z-index: 2;">
        <div class="inner-breadcrumb-pill">
            <a href="../index.php"><i class="fa-solid fa-house me-1"></i> Home</a>
            <span>&raquo;</span>
            <a href="../index.php#programs">Courses</a>
            <span>&raquo;</span>
            <span class="text-gold fw-medium"><?php echo htmlspecialchars($courseTitle); ?></span>
        </div>
        
        <div class="eyebrow-label gold-eyebrow mb-2" style="color: var(--gold-color) !important;">
            <span style="background: var(--gold-color); width: 1.5rem; height: 1px; display: inline-block;"></span> 
            <?php echo htmlspecialchars($degreeType); ?> DEGREE PROGRAM
        </div>
        <h1 class="font-serif display-5 fw-medium text-white mb-2" style="max-width: 950px; line-height: 1.15;">
            <?php echo htmlspecialchars($courseTitle); ?>
        </h1>
        <p class="text-white text-opacity-80 small mb-0" style="letter-spacing: 0.12em; text-transform: uppercase;">
            Dr. A.P.J. Abdul Kalam University · Indore, Madhya Pradesh
        </p>
    </div>
</section>

<!-- Main Course Content -->
<main class="py-5" style="background-color: var(--bg-ivory);">
    <div class="container-custom">
        <div class="row g-4 g-xl-5">
            
            <!-- Left Main Content Area -->
            <div class="col-lg-8 col-xl-9">
                <article class="inner-main-card">
                    
                    <!-- Program Snapshot Banner -->
                    <div class="intro-highlight-card mb-5">
                        <div class="row g-3 text-center text-md-start align-items-center">
                            <div class="col-6 col-md-3">
                                <div class="text-muted-custom small text-uppercase" style="font-size: 0.72rem; letter-spacing: 0.08em;">Degree Level</div>
                                <div class="font-serif text-primary fw-bold fs-6 mt-0.5"><i class="fa-solid fa-graduation-cap text-gold me-1"></i> <?php echo htmlspecialchars($degreeType); ?> Program</div>
                            </div>
                            <div class="col-6 col-md-3 border-start-md border-custom">
                                <div class="text-muted-custom small text-uppercase" style="font-size: 0.72rem; letter-spacing: 0.08em;">Course Duration</div>
                                <div class="font-serif text-primary fw-bold fs-6 mt-0.5"><i class="fa-regular fa-clock text-gold me-1"></i> <?php echo htmlspecialchars($duration); ?></div>
                            </div>
                            <div class="col-6 col-md-3 border-start-md border-custom">
                                <div class="text-muted-custom small text-uppercase" style="font-size: 0.72rem; letter-spacing: 0.08em;">Study Mode</div>
                                <div class="font-serif text-primary fw-bold fs-6 mt-0.5"><i class="fa-solid fa-chalkboard-user text-gold me-1"></i> Full-Time Campus</div>
                            </div>
                            <div class="col-6 col-md-3 border-start-md border-custom">
                                <div class="text-muted-custom small text-uppercase" style="font-size: 0.72rem; letter-spacing: 0.08em;">Statutory Approvals</div>
                                <div class="font-serif text-primary fw-bold fs-6 mt-0.5"><i class="fa-solid fa-certificate text-gold me-1"></i> <?php echo htmlspecialchars($approvals ?: 'UGC / AICTE / PCI'); ?></div>
                            </div>
                        </div>
                    </div>

                    <!-- Program Overview -->
                    <div class="mb-5">
                        <div class="tab-section-header mb-4 pb-2.5 border-bottom border-custom d-flex align-items-center gap-2.5">
                            <span class="section-icon-pill"><i class="fa-solid fa-book-open-reader"></i></span>
                            <h2 class="font-serif text-primary fs-4 fw-bold m-0">Program Overview</h2>
                        </div>
                        <div class="inner-page-body-text" style="line-height: 1.85; color: #3d3233; font-size: 0.96rem;">
                            <?php echo (strpos($overview, '<p>') !== false) ? $overview : '<p>' . nl2br(htmlspecialchars($overview)) . '</p>'; ?>
                        </div>
                    </div>

                    <!-- Key Features & Highlights -->
                    <?php if (!empty($keyFeaturesHtml)): ?>
                    <div class="mb-5">
                        <div class="tab-section-header mb-4 pb-2.5 border-bottom border-custom d-flex align-items-center gap-2.5">
                            <span class="section-icon-pill"><i class="fa-solid fa-star"></i></span>
                            <h3 class="font-serif text-primary fs-4 fw-bold m-0">Key Highlights of the Program</h3>
                        </div>
                        <div class="feature-info-card">
                            <ul class="d-flex flex-column gap-2.5 mb-0 ps-0 list-unstyled" style="color: #3e3233; line-height: 1.75;">
                                <?php echo $keyFeaturesHtml; ?>
                            </ul>
                        </div>
                    </div>
                    <?php endif; ?>

                    <!-- Career Opportunities & Industry Scope -->
                    <?php if (!empty($careerOpportunitiesHtml)): ?>
                    <div class="mb-5">
                        <div class="tab-section-header mb-4 pb-2.5 border-bottom border-custom d-flex align-items-center gap-2.5">
                            <span class="section-icon-pill"><i class="fa-solid fa-briefcase"></i></span>
                            <h3 class="font-serif text-primary fs-4 fw-bold m-0">Career Opportunities &amp; Job Roles</h3>
                        </div>
                        <div class="feature-info-card">
                            <ul class="d-flex flex-column gap-2.5 mb-0 ps-0 list-unstyled" style="color: #3e3233; line-height: 1.75;">
                                <?php echo $careerOpportunitiesHtml; ?>
                            </ul>
                        </div>
                    </div>
                    <?php endif; ?>

                    <!-- Eligibility & Admission Criteria -->
                    <div class="mb-5">
                        <div class="tab-section-header mb-4 pb-2.5 border-bottom border-custom d-flex align-items-center gap-2.5">
                            <span class="section-icon-pill"><i class="fa-solid fa-id-card-clip"></i></span>
                            <h3 class="font-serif text-primary fs-4 fw-bold m-0">Eligibility &amp; Admission Guidelines</h3>
                        </div>
                        <div class="feature-info-card">
                            <div class="d-flex align-items-center gap-3.5">
                                <div class="feature-icon-badge" style="width: 48px; height: 48px; font-size: 1.25rem;">
                                    <i class="fa-solid fa-graduation-cap"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <h4 class="font-serif text-primary fs-6 fw-bold mb-1">Academic Qualification Requirement</h4>
                                    <p class="mb-0 text-muted-custom" style="font-size: 0.94rem; line-height: 1.65;">
                                        <?php echo htmlspecialchars($eligibility); ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Syllabus Section if available -->
                    <?php if (!empty($syllabusContent) && trim($syllabusContent) !== '<table class="filr-table uk-table uk-table-divider uk-table-small uk-table-hover uk-margin-top"></table>'): ?>
                    <div class="mb-5">
                        <div class="tab-section-header mb-4 pb-2.5 border-bottom border-custom d-flex align-items-center gap-2.5">
                            <span class="section-icon-pill"><i class="fa-solid fa-book-bookmark"></i></span>
                            <h3 class="font-serif text-primary fs-4 fw-bold m-0">Curriculum &amp; Scheme</h3>
                        </div>
                        <div class="table-responsive rounded-4 border border-custom overflow-hidden shadow-sm">
                            <table class="luxury-table table table-hover mb-0">
                                <?php echo $syllabusContent; ?>
                            </table>
                        </div>
                    </div>
                    <?php endif; ?>

                    <!-- Bottom Apply Strip -->
                    <div class="p-4 rounded-4 mt-5 border border-custom d-flex align-items-center justify-content-between flex-wrap gap-3" style="background: #ffffff; box-shadow: 0 4px 15px rgba(0,0,0,0.02);">
                        <div class="d-flex align-items-center gap-3">
                            <i class="fa-solid fa-graduation-cap text-gold fs-3"></i>
                            <div>
                                <div class="font-serif text-primary fw-bold fs-6">Admissions Open for Session 2026-27</div>
                                <div class="text-muted-custom small" style="font-size: 0.78rem;">Take the first step towards a distinguished career at AKU Indore.</div>
                            </div>
                        </div>
                        <a href="../admission-procedure.php" class="btn btn-sm btn-gold-pill px-4 py-2 fw-bold">
                            <i class="fa-solid fa-paper-plane me-1.5"></i> Apply for Admission
                        </a>
                    </div>

                </article>
            </div>

            <!-- Right Sidebar Area -->
            <div class="col-lg-4 col-xl-3">
                <div class="sidebar-sticky-wrapper">
                    
                    <!-- Fast Action Card -->
                    <div class="about-sidebar-card text-center p-4 mb-4">
                        <div class="rounded-circle d-inline-flex align-items-center justify-content-center mb-3 shadow-sm" style="width: 72px; height: 72px; background: linear-gradient(135deg, #700018 0%, #4a0010 100%); border: 2px solid var(--gold-color);">
                            <i class="fa-solid fa-paper-plane text-gold fs-3"></i>
                        </div>
                        <h4 class="font-serif text-primary fs-5 fw-bold mb-2">Apply Online</h4>
                        <p class="text-muted-custom small mb-3">Begin your application for <?php echo htmlspecialchars($degreeType); ?> degree admissions.</p>
                        <a href="apply-now.php?course=<?php echo urlencode($course['slug']); ?>" class="btn-gold-pill w-100 text-center py-2 text-decoration-none d-block mb-2 font-weight-bold" style="font-size: 0.85rem;">
                            <i class="fa-solid fa-arrow-right me-1"></i> Apply Now
                        </a>
                        <a href="admission-assistance.php" class="btn btn-sm btn-outline-dark rounded-pill w-100 py-1.5 small">
                            <i class="fa-solid fa-headset me-1"></i> Admission Helpline
                        </a>
                    </div>

                    <!-- Department Sidebar Navigation -->
                    <?php include "../faculty-sidebar.php"; ?>

                </div>
            </div>

        </div>
    </div>
</main>

<?php include "../footer.php"; ?>
