<?php 
$pageTitle = "Syllabus & Academic Schemes - Dr. APJ Abdul Kalam University, Indore";
require_once "db.php";
include "header.php"; 

$gradingSystem = [
    ['grade' => 'O', 'title' => 'Outstanding', 'points' => '10', 'range' => '90% - 100%'],
    ['grade' => 'A+', 'title' => 'Excellent', 'points' => '9', 'range' => '80% - 89%'],
    ['grade' => 'A', 'title' => 'Very Good', 'points' => '8', 'range' => '70% - 79%'],
    ['grade' => 'B+', 'title' => 'Good', 'points' => '7', 'range' => '60% - 69%'],
    ['grade' => 'B', 'title' => 'Above Average', 'points' => '6', 'range' => '50% - 59%'],
    ['grade' => 'C', 'title' => 'Average', 'points' => '5', 'range' => '45% - 49%'],
    ['grade' => 'P', 'title' => 'Pass', 'points' => '4', 'range' => '40% - 44%'],
    ['grade' => 'F', 'title' => 'Fail', 'points' => '0', 'range' => 'Below 40%']
];

$schemePrograms = [
    [
        'program' => 'Bachelor of Technology / B.E. (CSE, ME, CE, EEE, IT)',
        'school' => 'Faculty of Engineering & Technology',
        'duration' => '4 Years (8 Semesters)',
        'scheme' => 'AICTE Model Curriculum & NEP-2020 CBCS Scheme',
        'file' => 'uploads/2025/04/aku_ordinance.pdf'
    ],
    [
        'program' => 'Master of Technology / M.Tech (CSE, Structural, Thermal)',
        'school' => 'Faculty of Engineering & Technology',
        'duration' => '2 Years (4 Semesters)',
        'scheme' => 'Postgraduate Advanced Research & Dissertation Scheme',
        'file' => 'uploads/2026/03/SOE-EOA-2025-26.pdf'
    ],
    [
        'program' => 'Bachelor of Pharmacy (B.Pharm)',
        'school' => 'College & School of Pharmacy',
        'duration' => '4 Years (8 Semesters)',
        'scheme' => 'Pharmacy Council of India (PCI) Unified National Syllabus',
        'file' => 'uploads/2026/03/PCI-APPROVAL-2025-26-COP.pdf'
    ],
    [
        'program' => 'Master of Pharmacy (M.Pharm - QA, Pharmaceutics, Pharmacology)',
        'school' => 'Faculty of Pharmacy',
        'duration' => '2 Years (4 Semesters)',
        'scheme' => 'PCI Postgraduate Regulations & Research Methodology',
        'file' => 'uploads/2026/03/PCI-APPROVAL-2025-26-SOP.pdf'
    ],
    [
        'program' => 'Master of Business Administration (MBA)',
        'school' => 'School of Business Administration',
        'duration' => '2 Years (4 Semesters)',
        'scheme' => 'Dual Specialization Curriculum (HR, Finance, Marketing, IT)',
        'file' => 'uploads/2025/04/aku_statutes.pdf'
    ],
    [
        'program' => 'Master of Computer Applications (MCA)',
        'school' => 'Faculty of Science & IT',
        'duration' => '2 Years (4 Semesters)',
        'scheme' => 'Full-Stack, Cloud & AI Industry-Integrated Scheme',
        'file' => 'uploads/2025/06/14052025_042042_MCA-IV-SEM-REG-AND-EX-JUNE-2025.pdf'
    ],
    [
        'program' => 'Bachelor of Computer Applications (BCA)',
        'school' => 'Faculty of Science & IT',
        'duration' => '3 Years (6 Semesters)',
        'scheme' => 'Modern Software Systems & Web Technologies Scheme',
        'file' => 'uploads/2025/06/03052025_124840_BCA-V-SEM-EX-APR-2025.pdf'
    ],
    [
        'program' => 'Bachelor of Education (B.Ed)',
        'school' => 'Faculty of Education (COPS)',
        'duration' => '2 Years (4 Semesters)',
        'scheme' => 'NCTE Standard Teaching Pedagogy Curriculum',
        'file' => 'uploads/2025/06/09082021_121616_B.Ed_.-Approval.pdf'
    ],
    [
        'program' => 'Law Programs (LL.B. 3-Year & BA LL.B. 5-Year Integrated)',
        'school' => 'Faculty of Law',
        'duration' => '3 / 5 Years',
        'scheme' => 'Bar Council of India (BCI) Professional Law Scheme',
        'file' => 'uploads/2025/06/10062025_124828_Approval-Letter-BCI-2025-26.pdf'
    ]
];
?>

<!-- Inner Page Luxury Hero Banner -->
<section class="inner-page-hero">
    <div class="container-custom position-relative" style="z-index: 2;">
        <div class="inner-breadcrumb-pill">
            <a href="index.php"><i class="fa-solid fa-house me-1"></i> Home</a>
            <span>&raquo;</span>
            <a href="programs.php">Academics</a>
            <span>&raquo;</span>
            <span class="text-gold fw-medium">Syllabus Scheme</span>
        </div>
        
        <div class="eyebrow-label gold-eyebrow mb-2" style="color: var(--gold-color) !important;">
            <span style="background: var(--gold-color); width: 1.5rem; height: 1px; display: inline-block;"></span> CURRICULUM &amp; TEACHING SCHEMES
        </div>
        <h1 class="font-serif display-5 fw-medium text-white mb-2" style="max-width: 950px; line-height: 1.15;">
            Academic Syllabus &amp; Examination Schemes
        </h1>
        <p class="text-white text-opacity-80 small mb-0" style="letter-spacing: 0.12em; text-transform: uppercase;">
            Dr. A.P.J. Abdul Kalam University · National Education Policy (NEP 2020) &amp; Choice Based Credit System
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
                                <i class="fa-solid fa-book-open-reader"></i>
                            </div>
                            <div>
                                <h3 class="font-serif text-primary fs-4 fw-bold mb-1">NEP 2020 &amp; Choice Based Credit System</h3>
                                <p class="mb-0 text-muted-custom" style="font-size: 0.95rem; line-height: 1.75;">
                                    The academic curriculum of Dr. A.P.J. Abdul Kalam University adheres to the <strong>National Education Policy (NEP 2020)</strong> and UGC/AICTE guidelines. Our modular Choice Based Credit System (CBCS) provides interdisciplinary flexibility, industry micro-certifications, open electives, and hands-on capstone project credits.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Grading Scale Table -->
                    <div class="mb-5">
                        <div class="tab-section-header mb-4 pb-2.5 border-bottom border-custom d-flex align-items-center justify-content-between flex-wrap gap-2">
                            <div class="d-flex align-items-center gap-2.5">
                                <span class="section-icon-pill"><i class="fa-solid fa-chart-column"></i></span>
                                <h3 class="font-serif text-primary fs-4 fw-bold m-0">10-Point UGC Letter Grading Scale</h3>
                            </div>
                            <span class="custom-badge-pill">
                                <i class="fa-solid fa-scale-balanced text-gold me-1.5"></i> Evaluation Matrix
                            </span>
                        </div>

                        <div class="table-responsive rounded-4 border border-custom overflow-hidden shadow-xs bg-white">
                            <table class="luxury-table table table-hover mb-0 text-center">
                                <thead>
                                    <tr>
                                        <th style="width: 80px;">Letter Grade</th>
                                        <th>Academic Status</th>
                                        <th style="width: 120px;">Grade Point</th>
                                        <th style="width: 160px;">Marks Range</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($gradingSystem as $g): ?>
                                    <tr>
                                        <td>
                                            <span class="badge bg-light text-primary border font-monospace fw-bold px-3 py-1 fs-6">
                                                <?php echo $g['grade']; ?>
                                            </span>
                                        </td>
                                        <td class="text-start fw-semibold text-dark"><?php echo $g['title']; ?></td>
                                        <td class="font-monospace fw-bold text-primary"><?php echo $g['points']; ?></td>
                                        <td class="small text-muted-custom"><?php echo $g['range']; ?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Academic Schemes Directory Table -->
                    <div class="mb-5">
                        <div class="tab-section-header mb-4 pb-2.5 border-bottom border-custom d-flex align-items-center justify-content-between flex-wrap gap-2">
                            <div class="d-flex align-items-center gap-2.5">
                                <span class="section-icon-pill"><i class="fa-solid fa-graduation-cap"></i></span>
                                <h3 class="font-serif text-primary fs-4 fw-bold m-0">Degree Program Teaching Schemes Repository</h3>
                            </div>
                            <span class="custom-badge-pill">
                                <i class="fa-solid fa-file-pdf text-danger me-1.5"></i> <?php echo count($schemePrograms); ?> Curricula Schemes
                            </span>
                        </div>

                        <div class="table-responsive rounded-4 border border-custom overflow-hidden shadow-xs bg-white">
                            <table class="luxury-table table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th style="width: 50px;" class="text-center">#</th>
                                        <th>Program &amp; Curricular Scheme</th>
                                        <th style="width: 170px;">Faculty / School</th>
                                        <th style="width: 140px;">Duration</th>
                                        <th style="width: 120px;" class="text-end">Curriculum</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($schemePrograms as $idx => $s): ?>
                                    <tr>
                                        <td class="text-center font-monospace fw-bold text-primary"><?php echo sprintf('%02d', $idx + 1); ?></td>
                                        <td>
                                            <span class="fw-bold text-primary d-block" style="font-size: 0.92rem;">
                                                <?php echo htmlspecialchars($s['program']); ?>
                                            </span>
                                            <span class="small text-gold fw-semibold"><?php echo htmlspecialchars($s['scheme']); ?></span>
                                        </td>
                                        <td>
                                            <span class="small text-muted-custom fw-medium" style="font-size: 0.8rem;"><?php echo htmlspecialchars($s['school']); ?></span>
                                        </td>
                                        <td>
                                            <span class="badge bg-light text-dark border small px-2 py-1" style="font-size: 0.75rem;"><?php echo htmlspecialchars($s['duration']); ?></span>
                                        </td>
                                        <td class="text-end">
                                            <a href="<?php echo htmlspecialchars($s['file']); ?>" target="_blank" class="btn btn-sm btn-outline-dark rounded-pill px-3 py-1.5 small fw-semibold" download>
                                                <i class="fa-solid fa-download me-1 text-gold"></i> Scheme
                                            </a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Contact Inquiries Footer Box -->
                    <div class="p-4 rounded-4 border border-custom bg-white d-flex align-items-center justify-content-between flex-wrap gap-3 shadow-xs mt-5">
                        <div>
                            <h5 class="font-serif text-primary fw-bold fs-6 mb-0.5">Need More Information?</h5>
                            <p class="small text-muted-custom mb-0">For statutory documentation or academic queries regarding Syllabus Scheme, reach out to the Registrar Office.</p>
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
