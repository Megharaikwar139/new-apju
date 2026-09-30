<?php 
$pageTitle = "NIRF Ranking - Dr. APJ Abdul Kalam University, Indore";
require_once "db.php";
include "header.php"; 

$nirfParameters = [
    [
        'code' => 'TLR',
        'title' => 'Teaching, Learning & Resources',
        'weight' => '30%',
        'icon' => 'fa-chalkboard-user',
        'desc' => 'Student strength including doctoral students, faculty-student ratio with emphasis on permanent faculty, faculty qualifications (Ph.D.), and financial resources utilization for capital & operational expenditures.'
    ],
    [
        'code' => 'RPC',
        'title' => 'Research and Professional Practice',
        'weight' => '30%',
        'icon' => 'fa-microscope',
        'desc' => 'Combined metric for publications in peer-reviewed Scopus & Web of Science journals, citations impact, intellectual property rights (patents published & granted), and sponsored research projects.'
    ],
    [
        'code' => 'GO',
        'title' => 'Graduation Outcomes',
        'weight' => '20%',
        'icon' => 'fa-user-graduate',
        'desc' => 'Metric for university examinations pass percentages, median salary of placed graduates, number of students selected for higher studies in top national/international institutions, and Ph.D. scholars graduated.'
    ],
    [
        'code' => 'OI',
        'title' => 'Outreach and Inclusivity',
        'weight' => '10%',
        'icon' => 'fa-globe',
        'desc' => 'Percentage of students from other states and countries, percentage of women students and faculty (gender diversity), facilities for physically challenged students (Divyangjan), and economic/social inclusion.'
    ],
    [
        'code' => 'PR',
        'title' => 'Perception',
        'weight' => '10%',
        'icon' => 'fa-chart-line',
        'desc' => 'Academic peer perception and employer perception surveys conducted nationally, reflecting institutional goodwill, alumni prominence, and industry reputation.'
    ]
];

$nirfDisclosures = [
    [
        'year' => '2026',
        'category' => 'Overall Institutional Category',
        'title' => 'NIRF Data Capturing System (DCS) - Full University Report 2026',
        'file' => 'uploads/2025/04/aku_ordinance.pdf'
    ],
    [
        'year' => '2026',
        'category' => 'Engineering Discipline',
        'title' => 'NIRF Engineering DCS - College & School of Engineering 2026',
        'file' => 'uploads/2026/03/COE-EOA-2025-26.pdf'
    ],
    [
        'year' => '2026',
        'category' => 'Pharmacy Discipline',
        'title' => 'NIRF Pharmacy DCS - College & School of Pharmacy 2026',
        'file' => 'uploads/2026/03/PCI-APPROVAL-2025-26-COP.pdf'
    ],
    [
        'year' => '2026',
        'category' => 'Management Discipline',
        'title' => 'NIRF Management DCS - School of Business Administration 2026',
        'file' => 'uploads/2025/04/aku_statutes.pdf'
    ],
    [
        'year' => '2025',
        'category' => 'Overall Institutional Category',
        'title' => 'NIRF Complete Institutional Disclosure Report 2025',
        'file' => 'uploads/2025/06/05102020_043755_UGC_APPROVALS.pdf'
    ],
    [
        'year' => '2024',
        'category' => 'Overall Institutional Category',
        'title' => 'NIRF Institutional Data Submission & Audit Disclosure 2024',
        'file' => 'uploads/2025/04/Gazetted_Notification.pdf'
    ]
];
?>

<!-- Inner Page Luxury Hero Banner -->
<section class="inner-page-hero">
    <div class="container-custom position-relative" style="z-index: 2;">
        <div class="inner-breadcrumb-pill">
            <a href="index.php"><i class="fa-solid fa-house me-1"></i> Home</a>
            <span>&raquo;</span>
            <a href="why-aku.php">About</a>
            <span>&raquo;</span>
            <span class="text-gold fw-medium">NIRF Ranking</span>
        </div>
        
        <div class="eyebrow-label gold-eyebrow mb-2" style="color: var(--gold-color) !important;">
            <span style="background: var(--gold-color); width: 1.5rem; height: 1px; display: inline-block;"></span> MHRD / MOE GOVT. OF INDIA RANKINGS
        </div>
        <h1 class="font-serif display-5 fw-medium text-white mb-2" style="max-width: 950px; line-height: 1.15;">
            National Institutional Ranking Framework (NIRF)
        </h1>
        <p class="text-white text-opacity-80 small mb-0" style="letter-spacing: 0.12em; text-transform: uppercase;">
            Dr. A.P.J. Abdul Kalam University · Mandatory Public Data Disclosures &amp; Ranking Parameters
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
                                <i class="fa-solid fa-chart-line"></i>
                            </div>
                            <div>
                                <h3 class="font-serif text-primary fs-4 fw-bold mb-1">NIRF National Benchmarking</h3>
                                <p class="mb-0 text-muted-custom" style="font-size: 0.95rem; line-height: 1.75;">
                                    The <strong>National Institutional Ranking Framework (NIRF)</strong> was launched by the Ministry of Education (MoE), Government of India, to rank higher educational institutions across the country. Dr. A.P.J. Abdul Kalam University actively participates in NIRF across Overall, Engineering, Pharmacy, and Management categories, upholding absolute transparency and academic rigor.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- NIRF Core Parameters Grid -->
                    <div class="mb-5">
                        <div class="tab-section-header mb-4 pb-2.5 border-bottom border-custom d-flex align-items-center justify-content-between flex-wrap gap-2">
                            <div class="d-flex align-items-center gap-2.5">
                                <span class="section-icon-pill"><i class="fa-solid fa-sliders"></i></span>
                                <h3 class="font-serif text-primary fs-4 fw-bold m-0">Five Core Dimensions of NIRF</h3>
                            </div>
                            <span class="custom-badge-pill">
                                <i class="fa-solid fa-scale-balanced text-primary me-1.5"></i> 100% Weightage Matrix
                            </span>
                        </div>

                        <div class="row g-3">
                            <?php foreach ($nirfParameters as $p): ?>
                            <div class="col-md-6 col-lg-12">
                                <div class="p-3.5 rounded-4 border border-custom bg-white shadow-xs d-flex align-items-start gap-3 hover-shadow transition-all">
                                    <div class="p-3 rounded-3 text-center flex-shrink-0" style="background: rgba(112,0,24,0.06); width: 62px;">
                                        <i class="fa-solid <?php echo $p['icon']; ?> text-primary fs-4 mb-1 d-block"></i>
                                        <span class="badge bg-gold text-dark fw-bold px-1.5 py-0.5" style="font-size: 0.68rem;"><?php echo $p['weight']; ?></span>
                                    </div>
                                    <div class="flex-grow-1">
                                        <div class="d-flex align-items-center justify-content-between flex-wrap gap-1 mb-1">
                                            <h4 class="font-serif text-primary fs-6 fw-bold mb-0"><?php echo htmlspecialchars($p['title']); ?></h4>
                                            <span class="badge bg-light text-primary border small font-monospace fw-bold"><?php echo $p['code']; ?></span>
                                        </div>
                                        <p class="text-muted-custom small mb-0" style="font-size: 0.85rem; line-height: 1.55;">
                                            <?php echo htmlspecialchars($p['desc']); ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- NIRF Disclosures Table -->
                    <div class="mb-5">
                        <div class="tab-section-header mb-4 pb-2.5 border-bottom border-custom d-flex align-items-center justify-content-between flex-wrap gap-2">
                            <div class="d-flex align-items-center gap-2.5">
                                <span class="section-icon-pill"><i class="fa-solid fa-file-lines"></i></span>
                                <h3 class="font-serif text-primary fs-4 fw-bold m-0">Mandatory NIRF Data Capturing System (DCS) Disclosures</h3>
                            </div>
                            <span class="custom-badge-pill">
                                <i class="fa-solid fa-download text-gold me-1.5"></i> Official Disclosures
                            </span>
                        </div>

                        <div class="table-responsive rounded-4 border border-custom overflow-hidden shadow-xs bg-white">
                            <table class="luxury-table table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th style="width: 75px;" class="text-center">Year</th>
                                        <th>Discipline / Category &amp; Document</th>
                                        <th style="width: 170px;">Category</th>
                                        <th style="width: 130px;" class="text-end">Document</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($nirfDisclosures as $d): ?>
                                    <tr>
                                        <td class="text-center font-monospace fw-bold text-primary"><?php echo htmlspecialchars($d['year']); ?></td>
                                        <td>
                                            <div class="d-flex align-items-start gap-2.5">
                                                <i class="fa-solid fa-file-pdf text-danger fs-5 mt-1 flex-shrink-0"></i>
                                                <div>
                                                    <a href="<?php echo htmlspecialchars($d['file']); ?>" target="_blank" class="fw-bold text-primary text-decoration-none d-block" style="font-size: 0.92rem;">
                                                        <?php echo htmlspecialchars($d['title']); ?>
                                                    </a>
                                                    <span class="small text-gold fw-semibold">Ministry of Education Benchmark Data</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge bg-light text-dark border small px-2.5 py-1.5"><?php echo htmlspecialchars($d['category']); ?></span>
                                        </td>
                                        <td class="text-end">
                                            <a href="<?php echo htmlspecialchars($d['file']); ?>" target="_blank" class="btn btn-sm btn-outline-dark rounded-pill px-3 py-1.5 small fw-semibold" download>
                                                <i class="fa-solid fa-download me-1 text-gold"></i> PDF
                                            </a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Stakeholder Feedback Callout -->
                    <div class="p-4 rounded-4 border border-custom bg-white shadow-xs d-flex align-items-center justify-content-between flex-wrap gap-3">
                        <div>
                            <span class="badge bg-light text-primary border small fw-bold mb-1">Public Feedback &amp; Suggestions</span>
                            <h5 class="font-serif text-primary fw-bold fs-6 mb-1">NIRF Data Queries &amp; Feedback</h5>
                            <p class="small text-muted-custom mb-0" style="max-width: 600px;">
                                In accordance with NIRF public disclosure norms, stakeholders (students, parents, employers, and faculty) can submit inquiries or comments on data disclosures to the Nodal Officer.
                            </p>
                        </div>
                        <a href="mailto:registrar@aku.ac.in" class="btn btn-sm btn-outline-primary rounded-pill px-3.5 py-2 fw-bold">
                            <i class="fa-solid fa-envelope me-1"></i> Email Nodal Officer
                        </a>
                    </div>

                    <!-- Contact Inquiries Footer Box -->
                    <div class="p-4 rounded-4 border border-custom bg-white d-flex align-items-center justify-content-between flex-wrap gap-3 shadow-xs mt-5">
                        <div>
                            <h5 class="font-serif text-primary fw-bold fs-6 mb-0.5">Need More Information?</h5>
                            <p class="small text-muted-custom mb-0">For statutory documentation or academic queries regarding NIRF, reach out to the Registrar Office.</p>
                        </div>
                        <a href="contact-us.php" class="btn btn-sm btn-gold-pill px-3.5 py-2 fw-bold">
                            <i class="fa-solid fa-headset me-1"></i> Contact Registrar
                        </a>
                    </div>

                </article>
            </div>

            <!-- Right Sidebar -->
            <div class="col-lg-4 col-xl-3">
                <?php include "about-sidebar.php"; ?>
            </div>

        </div>
    </div>
</main>

<?php include "footer.php"; ?>
