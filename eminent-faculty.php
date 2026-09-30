<?php 
$pageTitle = "Eminent Faculty & Academic Mentors - Dr. APJ Abdul Kalam University, Indore";
require_once "db.php";
include "header.php"; 

// Fetch faculty members from database
$facultyList = [];
try {
    $stmt = $pdo->query("
        SELECT f.*, d.name AS dept_name, d.faculty_group 
        FROM department_faculty f 
        LEFT JOIN departments d ON f.department_slug = d.slug 
        WHERE f.status = 1 
        ORDER BY 
            CASE 
                WHEN f.designation LIKE '%Dean%' THEN 1
                WHEN f.designation LIKE '%Principal%' THEN 2
                WHEN f.designation LIKE '%HOD%' OR f.designation LIKE '%Head%' THEN 3
                WHEN f.designation LIKE '%Professor%' AND f.designation NOT LIKE '%Assistant%' AND f.designation NOT LIKE '%Associate%' THEN 4
                WHEN f.designation LIKE '%Associate%' THEN 5
                ELSE 6
            END ASC,
            f.sort_order ASC, 
            f.id ASC
    ");
    $facultyList = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {}

// Extract unique faculty groups for filter
$groups = [];
foreach ($facultyList as $f) {
    $g = trim($f['faculty_group'] ?? 'GENERAL FACULTY');
    if (!empty($g) && !in_array($g, $groups)) {
        $groups[] = $g;
    }
}
?>

<!-- Inner Page Luxury Hero Banner -->
<section class="inner-page-hero">
    <div class="container-custom position-relative" style="z-index: 2;">
        <div class="inner-breadcrumb-pill">
            <a href="index.php"><i class="fa-solid fa-house me-1"></i> Home</a>
            <span>&raquo;</span>
            <a href="programs.php">Academics</a>
            <span>&raquo;</span>
            <span class="text-gold fw-medium">Eminent Faculty</span>
        </div>
        
        <div class="eyebrow-label gold-eyebrow mb-2" style="color: var(--gold-color) !important;">
            <span style="background: var(--gold-color); width: 1.5rem; height: 1px; display: inline-block;"></span> SCHOLARSHIP &amp; ACADEMIC MENTORSHIP
        </div>
        <h1 class="font-serif display-5 fw-medium text-white mb-2" style="max-width: 950px; line-height: 1.15;">
            Eminent Faculty &amp; Academic Mentors
        </h1>
        <p class="text-white text-opacity-80 small mb-0" style="letter-spacing: 0.12em; text-transform: uppercase;">
            Dr. A.P.J. Abdul Kalam University · Distinguished Academicians, Researchers &amp; Industry Practitioners
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
                                <i class="fa-solid fa-chalkboard-user"></i>
                            </div>
                            <div>
                                <h3 class="font-serif text-primary fs-4 fw-bold mb-1">Intellectual Capital of Dr. APJ Abdul Kalam University</h3>
                                <p class="mb-0 text-muted-custom" style="font-size: 0.95rem; line-height: 1.75;">
                                    The academic backbone of Dr. A.P.J. Abdul Kalam University comprises over <strong>100+ distinguished scholars</strong>, doctorates from prestigious institutions (IITs, NITs, Central &amp; State Universities), seasoned industry leaders, and published authors. Our faculty members integrate cutting-edge research with hands-on experiential pedagogy.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Search & Filter Bar -->
                    <div class="p-3.5 rounded-4 border border-custom bg-white shadow-xs mb-4">
                        <div class="row g-2 align-items-center justify-content-between">
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-custom text-muted"><i class="fa-solid fa-magnifying-glass"></i></span>
                                    <input type="text" id="facultySearchInput" class="form-control border-custom small" placeholder="Search professor by name, department, designation..." onkeyup="filterFacultyCards()">
                                </div>
                            </div>
                            <div class="col-md-6 text-md-end">
                                <span class="badge bg-gold text-dark fw-bold px-3 py-2 rounded-pill font-monospace" id="facultyCounterBadge">
                                    <i class="fa-solid fa-user-tie me-1"></i> <?php echo count($facultyList); ?> Faculty Profiles
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Faculty Cards Grid -->
                    <div class="row g-3.5 mb-5" id="facultyCardsGrid">
                        <?php if (!empty($facultyList)): ?>
                            <?php foreach ($facultyList as $f): 
                                $hasImg = (!empty($f['image_path']) && file_exists($f['image_path']));
                                $groupName = $f['faculty_group'] ?? 'GENERAL FACULTY';
                                $detailsArr = [];
                                if (!empty($f['qualification'])) $detailsArr[] = $f['qualification'];
                                if (!empty($f['experience'])) $detailsArr[] = $f['experience'];
                                $detailsStr = implode(" · ", $detailsArr);
                            ?>
                            <div class="col-sm-6 col-md-4 faculty-card-item" 
                                 data-name="<?php echo strtolower(htmlspecialchars($f['faculty_name'])); ?>"
                                 data-dept="<?php echo strtolower(htmlspecialchars($f['dept_name'] ?? '')); ?>"
                                 data-desig="<?php echo strtolower(htmlspecialchars($f['designation'] ?? '')); ?>">
                                <div class="p-3.5 rounded-4 border border-custom bg-white shadow-xs h-100 text-center d-flex flex-column align-items-center justify-content-between hover-shadow transition-all" style="transition: all 0.25s ease;">
                                    
                                    <div class="w-100 text-center mb-2">
                                        <?php if ($hasImg): ?>
                                            <div class="position-relative d-inline-block">
                                                <img src="<?php echo htmlspecialchars($f['image_path']); ?>" alt="<?php echo htmlspecialchars($f['faculty_name']); ?>" class="rounded-circle border border-custom shadow-xs" style="width: 86px; height: 86px; object-fit: cover;" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                                <div class="d-none rounded-circle bg-primary bg-opacity-10 align-items-center justify-content-center border border-custom shadow-xs mx-auto" style="width: 86px; height: 86px;"><i class="fa-solid fa-user-graduate text-primary fs-3"></i></div>
                                            </div>
                                        <?php else: ?>
                                            <div class="rounded-circle bg-primary bg-opacity-10 d-inline-flex align-items-center justify-content-center border border-custom shadow-xs" style="width: 86px; height: 86px;">
                                                <i class="fa-solid fa-user-graduate text-primary fs-3"></i>
                                            </div>
                                        <?php endif; ?>
                                    </div>

                                    <div class="flex-grow-1 w-100">
                                        <h4 class="font-serif text-primary fs-6 fw-bold mb-1" style="line-height: 1.3;">
                                            <?php echo htmlspecialchars($f['faculty_name']); ?>
                                        </h4>
                                        <div class="badge bg-light text-primary border small px-2 py-0.5 mb-1.5 fw-semibold" style="font-size: 0.72rem;">
                                            <?php echo htmlspecialchars($f['designation'] ?? 'Professor'); ?>
                                        </div>
                                        <?php if (!empty($f['dept_name'])): ?>
                                        <div class="text-gold fw-medium small mb-1" style="font-size: 0.78rem;">
                                            <?php echo htmlspecialchars($f['dept_name']); ?>
                                        </div>
                                        <?php endif; ?>
                                        <?php if (!empty($detailsStr)): ?>
                                        <p class="text-muted-custom small mb-0" style="font-size: 0.75rem; line-height: 1.45;">
                                            <?php echo htmlspecialchars($detailsStr); ?>
                                        </p>
                                        <?php endif; ?>
                                    </div>

                                </div>
                            </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="col-12 text-center py-5">
                                <i class="fa-solid fa-users text-muted fs-1 mb-3"></i>
                                <h5 class="text-muted">Faculty profiles are being synchronized.</h5>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- Client-Side Faculty Search Script -->
                    <script>
                    function filterFacultyCards() {
                        var input = document.getElementById('facultySearchInput').value.toLowerCase().trim();
                        var cards = document.querySelectorAll('.faculty-card-item');
                        var visibleCount = 0;
                        cards.forEach(function(card) {
                            var name = card.getAttribute('data-name') || '';
                            var dept = card.getAttribute('data-dept') || '';
                            var desig = card.getAttribute('data-desig') || '';
                            if (name.includes(input) || dept.includes(input) || desig.includes(input)) {
                                card.style.display = '';
                                visibleCount++;
                            } else {
                                card.style.display = 'none';
                            }
                        });
                        var badge = document.getElementById('facultyCounterBadge');
                        if (badge) {
                            badge.innerHTML = '<i class="fa-solid fa-user-tie me-1"></i> ' + visibleCount + ' Faculty Profiles';
                        }
                    }
                    </script>

                    <!-- Contact Inquiries Footer Box -->
                    <div class="p-4 rounded-4 border border-custom bg-white d-flex align-items-center justify-content-between flex-wrap gap-3 shadow-xs mt-5">
                        <div>
                            <h5 class="font-serif text-primary fw-bold fs-6 mb-0.5">Need More Information?</h5>
                            <p class="small text-muted-custom mb-0">For statutory documentation or academic queries regarding Eminent Faculty, reach out to the Registrar Office.</p>
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
