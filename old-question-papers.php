<?php 
$pageTitle = "Previous Years Question Papers Archive - Dr. APJ Abdul Kalam University, Indore";
include 'header.php'; 

$paperArchive = [
    ['title' => 'B.E. III Semester All Branches (Common Question Paper)', 'session' => 'Dec 2025 / Dec 2020', 'dept' => 'Engineering', 'file' => 'uploads/2025/05/06062021_114811_CE.pdf'],
    ['title' => 'B.E. Mechanical Engineering VIII Semester Final Year', 'session' => 'June 2025 / June 2020', 'dept' => 'Mechanical Engineering', 'file' => 'uploads/2025/05/18062021_013853_BE-ME-VIII-SEM-JUNE20.pdf'],
    ['title' => 'B.E. Computer Science & Engineering IV Semester', 'session' => 'June 2025', 'dept' => 'Computer Science', 'file' => 'uploads/2026/08/BE-II-SEM-REG-JUNE-2026-BATCH-2025.pdf'],
    ['title' => 'Diploma Polytechnic Engineering II Semester All Branches', 'session' => 'Dec 2025', 'dept' => 'Polytechnic Diploma', 'file' => 'uploads/2026/08/POLY-II-SEM-REG-JUNE-BATCH-2025.pdf'],
    ['title' => 'B.Pharm II Semester Pharmaceutical Organic Chemistry', 'session' => 'June 2025', 'dept' => 'Pharmacy', 'file' => 'uploads/2026/08/B-PH-II-SEM-REG-AND-EX-JUNE-2026.pdf'],
    ['title' => 'M.Tech Computer Science Engineering I Semester Advanced Algorithms', 'session' => 'Dec 2025', 'dept' => 'Postgraduate (PG)', 'file' => 'uploads/2026/08/M-TECH-I-SEM-EX-JUNE-2026-BATCH-2025.pdf'],
    ['title' => 'B.Sc. Agriculture II Semester Agronomy & Soil Science', 'session' => 'June 2025', 'dept' => 'Agricultural Sciences', 'file' => 'uploads/2026/08/B-SC-AGRI-II-SEM-REG-AND-EX-JUNE-2026.pdf']
];
?>

<!-- Hero Banner -->
<section class="inner-page-hero">
    <div class="container-custom position-relative" style="z-index: 2;">
        <div class="inner-breadcrumb-pill">
            <a href="index.php"><i class="fa-solid fa-house me-1"></i> Home</a>
            <span>&raquo;</span>
            <a href="about-the-section.php">Examinations</a>
            <span>&raquo;</span>
            <span class="text-gold fw-medium">Old Question Papers</span>
        </div>
        
        <div class="eyebrow-label gold-eyebrow mb-2" style="color: var(--gold-color) !important;">
            <span style="background: var(--gold-color); width: 1.5rem; height: 1px; display: inline-block;"></span> UNIVERSITY QUESTION BANK ARCHIVE
        </div>
        <h1 class="font-serif display-5 fw-medium text-white mb-2" style="max-width: 900px; line-height: 1.15;">
            Previous Years Question Papers
        </h1>
        <p class="text-white text-opacity-80 small mb-0" style="letter-spacing: 0.12em; text-transform: uppercase;">
            Dr. A.P.J. Abdul Kalam University · Exam Reference Repository for Students
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
                                <i class="fa-solid fa-file-lines"></i>
                            </div>
                            <div>
                                <h3 class="font-serif text-primary fs-4 fw-bold mb-1">Academic Question Bank Repository</h3>
                                <p class="mb-0 text-muted-custom" style="font-size: 0.95rem; line-height: 1.7;">
                                    Browse and download past semester end-term examination papers across all faculties. Reviewing previous year papers assists students in understanding question patterns, marks distribution, and recurring conceptual themes.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Search Input Box -->
                    <div class="p-3.5 rounded-4 border border-custom bg-white shadow-xs mb-4">
                        <div class="row g-2 align-items-center">
                            <div class="col-md-8">
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-custom"><i class="fa-solid fa-search text-muted-custom"></i></span>
                                    <input type="text" class="form-control border-custom" id="paperSearchInput" placeholder="Quick search paper title, semester, or branch (e.g. Mechanical, Pharmacy, BE)...">
                                </div>
                            </div>
                            <div class="col-md-4 text-md-end">
                                <span class="badge bg-gold text-dark fw-bold px-3 py-2 rounded-pill w-100 w-md-auto">
                                    <i class="fa-solid fa-cloud-arrow-down me-1"></i> Free PDF Access
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Papers Table -->
                    <div class="table-responsive rounded-4 border border-custom overflow-hidden shadow-xs bg-white mb-5">
                        <table class="luxury-table table table-hover mb-0" id="papersTable">
                            <thead>
                                <tr>
                                    <th>Subject Paper Title &amp; Semester</th>
                                    <th style="width: 150px;">Department</th>
                                    <th style="width: 150px;">Exam Session</th>
                                    <th style="width: 120px;" class="text-end">Download</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($paperArchive as $p): ?>
                                <tr class="paper-row">
                                    <td>
                                        <div class="d-flex align-items-center gap-2.5">
                                            <i class="fa-solid fa-file-pdf text-danger fs-5 flex-shrink-0"></i>
                                            <div>
                                                <a href="<?php echo htmlspecialchars($p['file']); ?>" target="_blank" class="fw-bold text-primary text-decoration-none d-block paper-title">
                                                    <?php echo htmlspecialchars($p['title']); ?>
                                                </a>
                                                <span class="small text-muted-custom">University Official Question Script</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge bg-light text-dark border" style="font-size: 0.75rem;"><?php echo htmlspecialchars($p['dept']); ?></span>
                                    </td>
                                    <td>
                                        <span class="small text-primary font-monospace fw-semibold"><?php echo htmlspecialchars($p['session']); ?></span>
                                    </td>
                                    <td class="text-end">
                                        <a href="<?php echo htmlspecialchars($p['file']); ?>" target="_blank" class="btn btn-sm btn-outline-dark rounded-pill px-3 py-1 small" download>
                                            <i class="fa-solid fa-download me-1"></i> PDF
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                    <!-- Preparation Guidelines Card -->
                    <div class="feature-info-card">
                        <div class="d-flex align-items-center gap-3 mb-2.5">
                            <div class="feature-icon-badge">
                                <i class="fa-solid fa-lightbulb"></i>
                            </div>
                            <h4 class="font-serif text-primary fw-bold fs-6 mb-0">Exam Preparation Guidelines for Students</h4>
                        </div>
                        <ul class="d-flex flex-column gap-2 mb-0 ps-3" style="color: #3e3233; line-height: 1.7; font-size: 0.92rem;">
                            <li>Practice time management by solving sample question papers under simulated 3-hour examination conditions.</li>
                            <li>Structure descriptive answers with clear headings, labeled diagrams, equations, and concise step-by-step derivations.</li>
                            <li>Consult course instructors for model answers and syllabus revisions before appearing in end-semester evaluations.</li>
                        </ul>
                    </div>

                </article>
            </div>

            <!-- Right Sidebar -->
            <div class="col-lg-4 col-xl-3">
                <?php include "exam-sidebar.php"; ?>
            </div>

        </div>
    </div>
</main>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('paperSearchInput');
    const paperRows = document.querySelectorAll('.paper-row');

    if (searchInput) {
        searchInput.addEventListener('input', function() {
            const query = this.value.toLowerCase().trim();
            paperRows.forEach(row => {
                const title = row.querySelector('.paper-title').innerText.toLowerCase();
                const dept = row.querySelector('.badge').innerText.toLowerCase();
                if (title.includes(query) || dept.includes(query)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    }
});
</script>

<?php include 'footer.php'; ?>
