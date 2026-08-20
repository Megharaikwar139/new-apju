<?php
require_once "db.php";

$pageTitle = "All Academic Programs & Courses - Dr. APJ Abdul Kalam University, Indore";
$metaDescription = "Explore undergraduate, postgraduate, and diploma programs at Dr. A.P.J. Abdul Kalam University, Indore. Discover courses in engineering, management, pharmacy, law, agriculture, and sciences.";

// Fetch distinct active courses grouped by slug
$courses = $pdo->query("SELECT * FROM courses WHERE status = 1 GROUP BY slug ORDER BY 
    CASE 
        WHEN degree_type LIKE '%UG%' OR degree_type LIKE '%Undergraduate%' THEN 1
        WHEN degree_type LIKE '%PG%' OR degree_type LIKE '%Postgraduate%' THEN 2
        WHEN degree_type LIKE '%Diploma%' THEN 3
        ELSE 4
    END, title ASC")->fetchAll(PDO::FETCH_ASSOC);

// Counts
$totalPrograms = count($courses);
$ugCount = 0;
$pgCount = 0;
$diplomaCount = 0;

foreach ($courses as $c) {
    $dt = strtoupper($c['degree_type'] ?? '');
    if (strpos($dt, 'UG') !== false || strpos($dt, 'UNDERGRADUATE') !== false) {
        $ugCount++;
    } elseif (strpos($dt, 'PG') !== false || strpos($dt, 'POSTGRADUATE') !== false) {
        $pgCount++;
    } elseif (strpos($dt, 'DIPLOMA') !== false) {
        $diplomaCount++;
    }
}

include "header.php";
?>

<!-- Inner Page Luxury Hero Banner -->
<section class="inner-page-hero position-relative overflow-hidden py-5" style="background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary-color) 100%);">
    <div class="container-custom position-relative" style="z-index: 2;">
        
        <div class="row align-items-center g-4 g-lg-5">
            <!-- Left Hero Content -->
            <div class="col-lg-7">
                <div class="inner-breadcrumb-pill mb-3">
                    <a href="index.php"><i class="fa-solid fa-house me-1"></i> Home</a>
                    <span>&raquo;</span>
                    <span class="text-gold fw-medium">Academic Programs</span>
                </div>
                
                <div class="eyebrow-label gold-eyebrow mb-2" style="color: var(--gold-color) !important;">
                    <span style="background: var(--gold-color); width: 1.5rem; height: 1px; display: inline-block;"></span> 
                    ACADEMIC EXCELLENCE &amp; INDUSTRY CURRICULUM
                </div>
                <h1 class="font-serif display-4 fw-medium text-white mb-3" style="line-height: 1.15;">
                    Explore All Academic Programs
                </h1>
                <p class="text-white text-opacity-85 mb-0" style="max-width: 600px; font-size: 1rem; line-height: 1.65;">
                    Discover career-focused degrees designed for innovation, leadership, and professional distinction across 12 academic schools at Dr. A.P.J. Abdul Kalam University, Indore.
                </p>
            </div>

            <!-- Right Hero Luxury Metric Card -->
            <div class="col-lg-5">
                <div class="hero-glance-card p-4 rounded-4" style="background: rgba(0,0,0,0.22); border: 1px solid rgba(212,175,55,0.3); backdrop-filter: blur(12px); box-shadow: 0 12px 36px rgba(0,0,0,0.25);">
                    <div class="d-flex align-items-center justify-content-between pb-3 mb-3 border-bottom border-white border-opacity-15">
                        <div class="d-flex align-items-center gap-2 text-gold fw-semibold small text-uppercase" style="letter-spacing: 0.08em;">
                            <i class="fa-solid fa-graduation-cap fs-5"></i> Programs at a Glance
                        </div>
                        <span class="badge rounded-pill bg-gold text-dark fw-bold px-2.5 py-1" style="font-size: 0.7rem;">2026-27</span>
                    </div>

                    <div class="row g-3 text-start">
                        <div class="col-6">
                            <div class="font-serif text-gold fw-bold display-6 lh-1 mb-1"><?php echo $totalPrograms; ?>+</div>
                            <div class="text-uppercase text-white text-opacity-75 fw-semibold" style="font-size: 0.68rem; letter-spacing: 0.08em;">Total Degree Programs</div>
                        </div>
                        <div class="col-6">
                            <div class="font-serif text-white fw-bold display-6 lh-1 mb-1"><?php echo $ugCount; ?></div>
                            <div class="text-uppercase text-white text-opacity-75 fw-semibold" style="font-size: 0.68rem; letter-spacing: 0.08em;">Undergraduate (UG)</div>
                        </div>
                        <div class="col-6">
                            <div class="font-serif text-white fw-bold display-6 lh-1 mb-1"><?php echo $pgCount; ?></div>
                            <div class="text-uppercase text-white text-opacity-75 fw-semibold" style="font-size: 0.68rem; letter-spacing: 0.08em;">Postgraduate (PG)</div>
                        </div>
                        <div class="col-6">
                            <div class="font-serif text-white fw-bold display-6 lh-1 mb-1"><?php echo $diplomaCount; ?></div>
                            <div class="text-uppercase text-white text-opacity-75 fw-semibold" style="font-size: 0.68rem; letter-spacing: 0.08em;">Diploma Programs</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- Main Programs Directory Section -->
<main class="py-5" style="background-color: var(--bg-ivory);">
    <div class="container-custom">

        <!-- Search & Filter Controls -->
        <div class="bg-white p-3.5 p-md-4 rounded-4 border border-custom shadow-2xs mb-5">
            <div class="row g-3 align-items-center justify-content-between">
                
                <!-- Search Input -->
                <div class="col-lg-5">
                    <div class="position-relative">
                        <i class="fa-solid fa-magnifying-glass position-absolute top-50 start-0 translate-middle-y ms-3 text-muted"></i>
                        <input type="text" id="programSearchInput" class="form-control rounded-pill ps-5 py-2.5 bg-light border-custom" placeholder="Search by degree title, branch, or keywords...">
                    </div>
                </div>

                <!-- Degree Level Filter Tabs -->
                <div class="col-lg-7 d-flex justify-content-lg-end">
                    <div class="d-flex flex-nowrap align-items-center gap-2 overflow-x-auto pb-1" id="programLevelFilters">
                        <button class="academic-filter-btn active-tab" data-level="all">All Programs (<?php echo $totalPrograms; ?>)</button>
                        <button class="academic-filter-btn" data-level="ug">Undergraduate (<?php echo $ugCount; ?>)</button>
                        <button class="academic-filter-btn" data-level="pg">Postgraduate (<?php echo $pgCount; ?>)</button>
                        <button class="academic-filter-btn" data-level="diploma">Diploma (<?php echo $diplomaCount; ?>)</button>
                    </div>
                </div>

            </div>
        </div>

        <!-- Dynamic Programs Card Grid -->
        <div class="row g-4" id="programsGrid">
            <?php foreach ($courses as $c): 
                $dtRaw = strtoupper($c['degree_type'] ?? 'UG');
                $levelCategory = 'ug';
                $levelBadgeClass = 'badge bg-primary text-white';
                $levelTitle = 'Undergraduate';

                if (strpos($dtRaw, 'PG') !== false || strpos($dtRaw, 'POSTGRADUATE') !== false) {
                    $levelCategory = 'pg';
                    $levelBadgeClass = 'badge bg-gold text-dark fw-bold';
                    $levelTitle = 'Postgraduate';
                } elseif (strpos($dtRaw, 'DIPLOMA') !== false) {
                    $levelCategory = 'diploma';
                    $levelBadgeClass = 'badge bg-dark text-white';
                    $levelTitle = 'Diploma';
                }

                $duration = !empty($c['duration']) ? $c['duration'] : 'Full Time';
                $slug = $c['slug'];
                $courseUrl = "course/{$slug}.php";
                $approvals = !empty($c['approvals']) ? $c['approvals'] : 'UGC Recognized · AICTE Approved';
            ?>
            <div class="col-md-6 col-lg-4 program-card-col" data-level="<?php echo $levelCategory; ?>" data-title="<?php echo strtolower(htmlspecialchars($c['title'] . ' ' . $c['degree_type'] . ' ' . $duration)); ?>">
                <div class="feature-info-card p-4 h-100 d-flex flex-column justify-content-between border border-custom rounded-4 shadow-2xs hover-elevate transition-all" style="background: #ffffff;">
                    <div>
                        <!-- Header Badges -->
                        <div class="d-flex align-items-center justify-content-between gap-2 mb-3">
                            <span class="<?php echo $levelBadgeClass; ?> rounded-pill px-3 py-1 small" style="font-size: 0.72rem; letter-spacing: 0.04em;">
                                <?php echo htmlspecialchars($c['degree_type']); ?>
                            </span>
                            <span class="small text-muted-custom d-flex align-items-center gap-1" style="font-size: 0.76rem;">
                                <i class="fa-regular fa-clock text-gold"></i> <?php echo htmlspecialchars($duration); ?>
                            </span>
                        </div>

                        <!-- Program Title -->
                        <h3 class="font-serif text-primary fs-5 fw-bold mb-2.5 lh-snug">
                            <a href="<?php echo htmlspecialchars($courseUrl); ?>" class="text-primary text-decoration-none hover-gold transition-colors">
                                <?php echo htmlspecialchars($c['title']); ?>
                            </a>
                        </h3>

                        <!-- Statutory Approvals -->
                        <div class="small text-muted-custom mb-3" style="font-size: 0.78rem; line-height: 1.45;">
                            <i class="fa-solid fa-certificate text-gold me-1"></i> <?php echo htmlspecialchars($approvals); ?>
                        </div>
                    </div>

                    <!-- Card Footer Action -->
                    <div class="pt-3 border-top border-custom d-flex align-items-center justify-content-between mt-2">
                        <a href="<?php echo htmlspecialchars($courseUrl); ?>" class="text-primary fw-semibold small d-inline-flex align-items-center gap-1.5 hover-gold transition-colors">
                            <span>View Syllabus &amp; Eligibility</span>
                            <i class="fa-solid fa-arrow-right" style="font-size: 0.75rem;"></i>
                        </a>
                        <a href="apply-now.php" class="badge rounded-pill bg-light text-primary border px-2.5 py-1 text-decoration-none hover-gold" style="font-size: 0.7rem;">
                            Apply &rarr;
                        </a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <!-- No Results Found Message (Hidden by default) -->
        <div id="noProgramsFound" class="text-center py-5 d-none">
            <div class="icon-circle-badge mx-auto mb-3" style="width: 60px; height: 60px; font-size: 1.5rem;">
                <i class="fa-solid fa-book-open"></i>
            </div>
            <h4 class="font-serif fw-bold text-primary mb-1">No Academic Programs Found</h4>
            <p class="text-muted-custom small mb-3">Try adjusting your search terms or selecting a different degree level tab.</p>
            <button class="btn btn-sm btn-primary-pill px-4 py-2" onclick="resetProgramFilters()">
                Reset All Filters
            </button>
        </div>

        <!-- Call to Action Banner -->
        <div class="mt-5 p-4 p-md-5 rounded-4 text-white position-relative overflow-hidden shadow-sm" style="background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary-color) 100%);">
            <div class="row align-items-center g-4 position-relative" style="z-index: 2;">
                <div class="col-lg-8">
                    <div class="eyebrow-label gold-eyebrow mb-2">Admissions 2026-27 Open</div>
                    <h3 class="font-serif display-6 fw-medium text-white mb-2">Ready to take the next step in your academic journey?</h3>
                    <p class="text-white text-opacity-80 small mb-0" style="max-width: 620px;">
                        Connect with our dedicated admission counselors for personalized course guidance, scholarship eligibility checks, and seamless online enrollment.
                    </p>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <div class="d-flex flex-wrap gap-2 justify-content-lg-end">
                        <a href="apply-now.php" class="btn-gold-pill py-2 px-4 fw-bold">
                            Apply Online <i class="fa-solid fa-arrow-right ms-1"></i>
                        </a>
                        <a href="contact-us.php" class="btn-outline-pill py-2 px-3.5">
                            <i class="fa-solid fa-phone me-1"></i> Counseling Desk
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('programSearchInput');
    const filterButtons = document.querySelectorAll('#programLevelFilters button');
    const programCols = document.querySelectorAll('.program-card-col');
    const noResultsMsg = document.getElementById('noProgramsFound');
    const grid = document.getElementById('programsGrid');

    let currentLevel = 'all';
    let currentSearch = '';

    function filterPrograms() {
        let visibleCount = 0;

        programCols.forEach(col => {
            const cardLevel = col.getAttribute('data-level');
            const cardText = col.getAttribute('data-title') || '';

            const levelMatch = (currentLevel === 'all') || (cardLevel === currentLevel);
            const searchMatch = !currentSearch || cardText.includes(currentSearch);

            if (levelMatch && searchMatch) {
                col.style.display = '';
                visibleCount++;
            } else {
                col.style.display = 'none';
            }
        });

        if (visibleCount === 0) {
            noResultsMsg.classList.remove('d-none');
            grid.classList.add('d-none');
        } else {
            noResultsMsg.classList.add('d-none');
            grid.classList.remove('d-none');
        }
    }

    if (searchInput) {
        searchInput.addEventListener('input', function(e) {
            currentSearch = e.target.value.toLowerCase().trim();
            filterPrograms();
        });
    }

    filterButtons.forEach(btn => {
        btn.addEventListener('click', function() {
            filterButtons.forEach(b => b.classList.remove('active-tab'));
            this.classList.add('active-tab');
            currentLevel = this.getAttribute('data-level');
            filterPrograms();
        });
    });

    window.resetProgramFilters = function() {
        if (searchInput) searchInput.value = '';
        currentSearch = '';
        currentLevel = 'all';
        filterButtons.forEach(b => {
            if (b.getAttribute('data-level') === 'all') b.classList.add('active-tab');
            else b.classList.remove('active-tab');
        });
        filterPrograms();
    };
});
</script>

<?php include "footer.php"; ?>
