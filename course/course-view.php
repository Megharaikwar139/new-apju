<?php
require_once __DIR__ . "/../db.php";

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
    if (stripos($keyFeatures, '<li') !== false) {
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
    if (stripos($careerOpportunities, '<li') !== false) {
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
include __DIR__ . "/../header.php";
?>

<!-- Inner Page Hero Banner -->
<section class="inner-page-hero">
    <div class="container-custom position-relative" style="z-index: 2;">
        <div class="inner-breadcrumb-pill">
            <a href="../index.php"><i class="fa-solid fa-house me-1"></i> Home</a>
            <span>&raquo;</span>
            <a href="../programs.php">Courses</a>
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

                    <!-- Course Overview Section -->
                    <div class="mb-5">
                        <div class="d-flex align-items-center gap-2 mb-3 pb-2 border-bottom border-custom">
                            <i class="fa-solid fa-book-open-reader text-gold fs-4"></i>
                            <h3 class="font-serif text-primary fs-4 fw-bold m-0">Program Overview</h3>
                        </div>
                        <div class="inner-page-body-text" style="line-height: 1.8; color: #3d3233; font-size: 0.95rem;">
                            <?php echo $overview; ?>
                        </div>
                    </div>

                    <!-- Key Features & Highlights -->
                    <?php if (!empty($keyFeaturesHtml)): ?>
                    <div class="mb-5">
                        <div class="d-flex align-items-center gap-2 mb-3 pb-2 border-bottom border-custom">
                            <i class="fa-solid fa-star text-gold fs-4"></i>
                            <h3 class="font-serif text-primary fs-4 fw-bold m-0">Program Highlights &amp; Pillars</h3>
                        </div>
                        <ul class="list-unstyled d-flex flex-column gap-2.5 mb-0" style="color: #4a3c3d; font-size: 0.92rem;">
                            <?php echo $keyFeaturesHtml; ?>
                        </ul>
                    </div>
                    <?php endif; ?>

                    <!-- Career Scope & Industry Opportunities -->
                    <?php if (!empty($careerOpportunitiesHtml)): ?>
                    <div class="mb-5 p-4 rounded-4" style="background: linear-gradient(135deg, #ffffff 0%, #faf6f0 100%); border: 1px solid var(--border-color);">
                        <div class="d-flex align-items-center gap-2 mb-3 pb-2 border-bottom border-custom">
                            <i class="fa-solid fa-briefcase text-gold fs-4"></i>
                            <h3 class="font-serif text-primary fs-4 fw-bold m-0">Career Horizons &amp; Industry Roles</h3>
                        </div>
                        <ul class="list-unstyled d-flex flex-column gap-2.5 mb-0" style="color: #4a3c3d; font-size: 0.92rem;">
                            <?php echo $careerOpportunitiesHtml; ?>
                        </ul>
                    </div>
                    <?php endif; ?>

                    <!-- Syllabus / Scheme Table -->
                    <?php if (!empty($syllabusContent)): ?>
                    <div class="mb-5">
                        <div class="d-flex align-items-center gap-2 mb-3 pb-2 border-bottom border-custom">
                            <i class="fa-solid fa-table-list text-gold fs-4"></i>
                            <h3 class="font-serif text-primary fs-4 fw-bold m-0">Curriculum &amp; Semester Scheme</h3>
                        </div>
                        <div class="inner-page-body-text table-responsive">
                            <?php echo $syllabusContent; ?>
                        </div>
                    </div>
                    <?php endif; ?>

                    <!-- Eligibility Criteria Card -->
                    <div class="p-4 rounded-4 mb-4" style="background: #ffffff; border-left: 4px solid var(--primary-color); border-top: 1px solid var(--border-color); border-right: 1px solid var(--border-color); border-bottom: 1px solid var(--border-color); box-shadow: 0 4px 14px rgba(0,0,0,0.03);">
                        <div class="d-flex align-items-start gap-3">
                            <div class="icon-circle-badge flex-shrink-0" style="width: 44px; height: 44px; font-size: 1.15rem;">
                                <i class="fa-solid fa-user-check"></i>
                            </div>
                            <div>
                                <h4 class="font-serif text-primary fs-5 fw-bold mb-1.5">Eligibility Criteria &amp; Admission Norms</h4>
                                <p class="text-muted-custom mb-0 small" style="line-height: 1.6; font-size: 0.88rem;">
                                    <?php echo htmlspecialchars($eligibility); ?>
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Bottom Statutory Approvals Strip -->
                    <div class="p-4 rounded-4 mt-5 border border-custom d-flex align-items-center justify-content-between flex-wrap gap-3" style="background: #ffffff; box-shadow: 0 4px 15px rgba(0,0,0,0.02);">
                        <div class="d-flex align-items-center gap-3">
                            <i class="fa-solid fa-graduation-cap text-gold fs-3"></i>
                            <div>
                                <div class="font-serif text-primary fw-bold fs-6">Official UGC Recognized Degree</div>
                                <div class="text-muted-custom small" style="font-size: 0.78rem;">Approved by apex statutory councils: AICTE, PCI, UGC &amp; MP Govt.</div>
                            </div>
                        </div>
                        <a href="../apply-now.php?course=<?php echo urlencode($slug); ?>" class="btn btn-sm btn-gold-pill px-3.5 py-2 fw-bold">
                            <i class="fa-solid fa-paper-plane me-1"></i> Apply for 2026-27
                        </a>
                    </div>

                </article>
            </div>

            <!-- Right Sidebar Area -->
            <div class="col-lg-4 col-xl-3">
                <div class="sidebar-sticky-wrapper">
                    
                    <!-- Quick Apply Card -->
                    <div class="about-sidebar-card text-center p-4 mb-4">
                        <div class="rounded-circle d-inline-flex align-items-center justify-content-center mb-3 shadow-sm" style="width: 72px; height: 72px; background: linear-gradient(135deg, #700018 0%, #4a0010 100%); border: 2px solid var(--gold-color);">
                            <i class="fa-solid fa-paper-plane text-gold fs-3"></i>
                        </div>
                        <h4 class="font-serif text-primary fs-5 fw-bold mb-2">Apply Online</h4>
                        <p class="text-muted-custom small mb-3">Begin your application for <?php echo htmlspecialchars($degreeType); ?> degree admissions.</p>
                        <a href="../apply-now.php?course=<?php echo urlencode($course['slug'] ?? $slug); ?>" class="btn-gold-pill w-100 text-center py-2 text-decoration-none d-block mb-2 font-weight-bold" style="font-size: 0.85rem;">
                            <i class="fa-solid fa-arrow-right me-1"></i> Apply Now
                        </a>
                        <a href="../admission-assistance.php" class="btn btn-sm btn-outline-dark rounded-pill w-100 py-1.5 small">
                            <i class="fa-solid fa-headset me-1"></i> Admission Helpline
                        </a>
                    </div>

                    <!-- Department Sidebar Navigation -->
                    <?php include __DIR__ . "/../faculty-sidebar.php"; ?>

                </div>
            </div>

        </div>
    </div>
</main>

<?php include __DIR__ . "/../footer.php"; ?>
