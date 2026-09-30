<?php 
$pageTitle = "AICTE Approvals & EOA - Dr. APJ Abdul Kalam University, Indore";
require_once "db.php";
include "header.php"; 

$aicteApprovals = [
    [
        'no' => 1,
        'institution' => 'College of Engineering (COE)',
        'title' => 'AICTE Extension of Approval (EOA) - College of Engineering 2025-26',
        'session' => 'Session 2025-26 Approved',
        'file' => 'uploads/2026/03/COE-EOA-2025-26.pdf',
        'programs' => 'B.Tech / B.E. & M.Tech (CSE, ME, CE, EEE, IT)'
    ],
    [
        'no' => 2,
        'institution' => 'School of Engineering (SOE)',
        'title' => 'AICTE Extension of Approval (EOA) - School of Engineering 2025-26',
        'session' => 'Session 2025-26 Approved',
        'file' => 'uploads/2026/03/SOE-EOA-2025-26.pdf',
        'programs' => 'B.Tech / B.E. & M.Tech Postgraduate Engineering'
    ],
    [
        'no' => 3,
        'institution' => 'College of Engineering (COE)',
        'title' => 'AICTE Extension of Approval (EOA) Report - Session 2024-25',
        'session' => 'Session 2024-25 Approved',
        'file' => 'uploads/2025/04/13112024_103210_COE-EOA-REPORT-2024-2025.pdf',
        'programs' => 'UG & PG Technical Engineering Degrees'
    ],
    [
        'no' => 4,
        'institution' => 'School of Engineering (SOE)',
        'title' => 'AICTE Extension of Approval (EOA) Report - Session 2024-25',
        'session' => 'Session 2024-25 Approved',
        'file' => 'uploads/2025/04/SOE13112024_103217_SOE-EOA-REPORT-2024-2025.pdf',
        'programs' => 'UG & PG Engineering Programs'
    ],
    [
        'no' => 5,
        'institution' => 'College of Polytechnic Engineering (COPE)',
        'title' => 'AICTE Extension of Approval (EOA) - Polytechnic Engineering 2024-25',
        'session' => 'Session 2024-25 Approved',
        'file' => 'uploads/2025/04/13112024_103221_COPE-EOA-REPORT-2024-2025.pdf',
        'programs' => 'Polytechnic Engineering Diplomas (Mechanical, Civil, Electrical, CS)'
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
            <span class="text-gold fw-medium">AICTE Approvals</span>
        </div>
        
        <div class="eyebrow-label gold-eyebrow mb-2" style="color: var(--gold-color) !important;">
            <span style="background: var(--gold-color); width: 1.5rem; height: 1px; display: inline-block;"></span> STATUTORY TECHNICAL COUNCIL APPROVALS
        </div>
        <h1 class="font-serif display-5 fw-medium text-white mb-2" style="max-width: 950px; line-height: 1.15;">
            AICTE Approvals &amp; Extensions of Approval (EOA)
        </h1>
        <p class="text-white text-opacity-80 small mb-0" style="letter-spacing: 0.12em; text-transform: uppercase;">
            Dr. A.P.J. Abdul Kalam University · Approved by All India Council for Technical Education, New Delhi
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
                                <i class="fa-solid fa-file-shield"></i>
                            </div>
                            <div>
                                <h3 class="font-serif text-primary fs-4 fw-bold mb-1">Apex Statutory Technical Accreditation</h3>
                                <p class="mb-0 text-muted-custom" style="font-size: 0.95rem; line-height: 1.75;">
                                    The Engineering and Polytechnic programs of Dr. A.P.J. Abdul Kalam University are duly approved by the <strong>All India Council for Technical Education (AICTE)</strong>, Ministry of Education, Government of India. The annual Extension of Approvals (EOA) endorse the sanctioned intake, faculty cadre ratios, modern laboratory infrastructure, and state-of-the-art campus amenities.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- AICTE Approvals Table -->
                    <div class="mb-5">
                        <div class="tab-section-header mb-4 pb-2.5 border-bottom border-custom d-flex align-items-center justify-content-between flex-wrap gap-2">
                            <div class="d-flex align-items-center gap-2.5">
                                <span class="section-icon-pill"><i class="fa-solid fa-stamp"></i></span>
                                <h3 class="font-serif text-primary fs-4 fw-bold m-0">Official AICTE EOA Letters Repository</h3>
                            </div>
                            <span class="custom-badge-pill">
                                <i class="fa-solid fa-file-pdf text-danger me-1.5"></i> <?php echo count($aicteApprovals); ?> Official EOA Orders
                            </span>
                        </div>

                        <div class="table-responsive rounded-4 border border-custom overflow-hidden shadow-xs bg-white">
                            <table class="luxury-table table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th style="width: 55px;" class="text-center">#</th>
                                        <th>Constituent Institute &amp; Order Title</th>
                                        <th style="width: 170px;">Session / Intake</th>
                                        <th style="width: 130px;" class="text-end">Document</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($aicteApprovals as $a): ?>
                                    <tr>
                                        <td class="text-center font-monospace fw-bold text-primary"><?php echo sprintf('%02d', $a['no']); ?></td>
                                        <td>
                                            <div class="d-flex align-items-start gap-2.5">
                                                <i class="fa-solid fa-file-pdf text-danger fs-5 mt-1 flex-shrink-0"></i>
                                                <div>
                                                    <a href="<?php echo htmlspecialchars($a['file']); ?>" target="_blank" class="fw-bold text-primary text-decoration-none d-block" style="font-size: 0.93rem;">
                                                        <?php echo htmlspecialchars($a['title']); ?>
                                                    </a>
                                                    <span class="small text-gold fw-semibold"><?php echo htmlspecialchars($a['institution']); ?></span>
                                                    <div class="small text-muted" style="font-size: 0.8rem;"><?php echo htmlspecialchars($a['programs']); ?></div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge bg-light text-dark border small px-2.5 py-1.5"><?php echo htmlspecialchars($a['session']); ?></span>
                                        </td>
                                        <td class="text-end">
                                            <a href="<?php echo htmlspecialchars($a['file']); ?>" target="_blank" class="btn btn-sm btn-outline-dark rounded-pill px-3 py-1.5 small fw-semibold" download>
                                                <i class="fa-solid fa-download me-1 text-gold"></i> PDF
                                            </a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Regulatory Councils Badges Grid -->
                    <div class="row g-3">
                        <div class="col-sm-6 col-md-4">
                            <div class="p-3.5 rounded-4 border border-custom bg-white shadow-xs d-flex align-items-center gap-3">
                                <i class="fa-solid fa-building-columns text-gold fs-3"></i>
                                <div>
                                    <div class="font-serif text-primary fw-bold fs-6">AICTE Approved</div>
                                    <div class="small text-muted-custom" style="font-size: 0.8rem;">Ministry of Education, GoI</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="p-3.5 rounded-4 border border-custom bg-white shadow-xs d-flex align-items-center gap-3">
                                <i class="fa-solid fa-award text-gold fs-3"></i>
                                <div>
                                    <div class="font-serif text-primary fw-bold fs-6">UGC Recognized</div>
                                    <div class="small text-muted-custom" style="font-size: 0.8rem;">Section 2(f) UGC Act 1956</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="p-3.5 rounded-4 border border-custom bg-white shadow-xs d-flex align-items-center gap-3">
                                <i class="fa-solid fa-prescription-bottle-medical text-gold fs-3"></i>
                                <div>
                                    <div class="font-serif text-primary fw-bold fs-6">PCI Approved</div>
                                    <div class="small text-muted-custom" style="font-size: 0.8rem;">Pharmacy Council of India</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Contact Inquiries Footer Box -->
                    <div class="p-4 rounded-4 border border-custom bg-white d-flex align-items-center justify-content-between flex-wrap gap-3 shadow-xs mt-5">
                        <div>
                            <h5 class="font-serif text-primary fw-bold fs-6 mb-0.5">Need More Information?</h5>
                            <p class="small text-muted-custom mb-0">For statutory documentation or academic queries regarding AICTE Approvals, reach out to the Registrar Office.</p>
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
