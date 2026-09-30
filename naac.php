<?php 
$pageTitle = "NAAC Accreditation & Quality Assurance - Dr. APJ Abdul Kalam University, Indore";
require_once "db.php";
include "header.php"; 

$naacCriteria = [
    [
        'no' => '01',
        'title' => 'Curricular Aspects',
        'desc' => 'Curriculum design and development aligned with National Education Policy (NEP 2020), Choice Based Credit System (CBCS), academic flexibility, value-added skill courses, and regular feedback mechanisms from industries, alumni, and students.'
    ],
    [
        'no' => '02',
        'title' => 'Teaching-Learning and Evaluation',
        'desc' => 'Student-centric pedagogical methods, experiential and participatory learning, state-of-the-art ICT-enabled smart classrooms, highly qualified faculty mentors, transparent continuous internal assessments, and automated COE examination workflows.'
    ],
    [
        'no' => '03',
        'title' => 'Research, Innovations and Extension',
        'desc' => 'Promoting vibrant research through the Kalam Incubation & Innovation Centre (KIIC), dedicated IPR and patent facilitation cell (45+ patents filed), funded research projects, consultancy services, and active NSS/NCC community extension programs.'
    ],
    [
        'no' => '04',
        'title' => 'Infrastructure and Learning Resources',
        'desc' => 'Sprawling 30+ acre green campus with advanced departmental laboratories, central digital library with DELNET, IEEE, and Shodhganga subscriptions, sports complex, high-speed Wi-Fi network, and modern residential student hostels.'
    ],
    [
        'no' => '05',
        'title' => 'Student Support and Progression',
        'desc' => 'Comprehensive scholarships for deserving and underprivileged students, capability enhancement workshops, competitive exam coaching, dedicated Training & Placement Cell with 150+ recruiters, and proactive Student Grievance Redressal Cells.'
    ],
    [
        'no' => '06',
        'title' => 'Governance, Leadership and Management',
        'desc' => 'Visionary academic leadership headed by the Governing Body, Board of Management, and Academic Council; participatory decentralization, ERP-driven digital administration, transparent financial audits, and faculty development incentives.'
    ],
    [
        'no' => '07',
        'title' => 'Institutional Values and Best Practices',
        'desc' => 'Eco-friendly sustainable campus with solar energy harnessing, rainwater harvesting, sewage water recycling, gender equity initiatives, waste management, code of professional ethics, and green audit certifications.'
    ]
];

$naacDocuments = [
    [
        'title' => 'Internal Quality Assurance Cell (IQAC) Policy Manual',
        'category' => 'Quality Framework',
        'link' => 'iqac.php',
        'type' => 'Internal Cell'
    ],
    [
        'title' => 'Institutional Information for Quality Assessment (IIQA) Status',
        'category' => 'NAAC Submission',
        'link' => 'uploads/2025/04/aku_statutes.pdf',
        'type' => 'PDF Document'
    ],
    [
        'title' => 'Self Study Report (SSR) - Core Metrics & Institutional Overview',
        'category' => 'Assessment Criteria',
        'link' => 'mandatory-disclosers.php',
        'type' => 'Compliance Report'
    ],
    [
        'title' => 'Annual Quality Assurance Report (AQAR) Benchmarking Document',
        'category' => 'Annual Audit',
        'link' => 'ugc-recognition.php',
        'type' => 'Statutory Portfolio'
    ],
    [
        'title' => 'University Green Campus & Environmental Audit Certification',
        'category' => 'Best Practices',
        'link' => 'world-class-infrastructure.php',
        'type' => 'Audit Certification'
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
            <span class="text-gold fw-medium">NAAC Accreditation</span>
        </div>
        
        <div class="eyebrow-label gold-eyebrow mb-2" style="color: var(--gold-color) !important;">
            <span style="background: var(--gold-color); width: 1.5rem; height: 1px; display: inline-block;"></span> QUALITY ASSURANCE &amp; ACCREDITATION
        </div>
        <h1 class="font-serif display-5 fw-medium text-white mb-2" style="max-width: 950px; line-height: 1.15;">
            National Assessment and Accreditation Council (NAAC)
        </h1>
        <p class="text-white text-opacity-80 small mb-0" style="letter-spacing: 0.12em; text-transform: uppercase;">
            Dr. A.P.J. Abdul Kalam University · Institutional Quality Assurance, Assessment &amp; Benchmarking
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
                                <i class="fa-solid fa-award"></i>
                            </div>
                            <div>
                                <h3 class="font-serif text-primary fs-4 fw-bold mb-1">NAAC Quality Mandate</h3>
                                <p class="mb-0 text-muted-custom" style="font-size: 0.95rem; line-height: 1.75;">
                                    Dr. A.P.J. Abdul Kalam University, Indore is dedicated to fostering academic excellence, high-impact research, and holistic development in compliance with the stringent quality frameworks prescribed by the <strong>National Assessment and Accreditation Council (NAAC)</strong> and UGC Quality Mandates. Through continuous evaluation and our proactive Internal Quality Assurance Cell (IQAC), we ensure world-class educational benchmarks.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Seven Criteria Section -->
                    <div class="mb-5">
                        <div class="tab-section-header mb-4 pb-2.5 border-bottom border-custom d-flex align-items-center justify-content-between flex-wrap gap-2">
                            <div class="d-flex align-items-center gap-2.5">
                                <span class="section-icon-pill"><i class="fa-solid fa-list-check"></i></span>
                                <h3 class="font-serif text-primary fs-4 fw-bold m-0">Seven Assessment Criteria of NAAC</h3>
                            </div>
                            <span class="custom-badge-pill">
                                <i class="fa-solid fa-star text-gold me-1.5"></i> Quality Framework
                            </span>
                        </div>

                        <div class="row g-3.5">
                            <?php foreach ($naacCriteria as $c): ?>
                            <div class="col-12">
                                <div class="p-4 rounded-4 border border-custom bg-white shadow-xs d-flex align-items-start gap-3.5 hover-shadow transition-all">
                                    <div class="badge-pill-blur text-primary fw-bold font-monospace px-3 py-2 rounded-3 text-center flex-shrink-0" style="background: rgba(112, 0, 24, 0.08); font-size: 1.1rem; min-width: 54px;">
                                        C-<?php echo $c['no']; ?>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h4 class="font-serif text-primary fs-5 fw-bold mb-1.5"><?php echo htmlspecialchars($c['title']); ?></h4>
                                        <p class="text-muted-custom small mb-0" style="line-height: 1.65; font-size: 0.9rem;">
                                            <?php echo htmlspecialchars($c['desc']); ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- Quality Documentation Repository -->
                    <div class="mb-5">
                        <div class="tab-section-header mb-4 pb-2.5 border-bottom border-custom d-flex align-items-center justify-content-between flex-wrap gap-2">
                            <div class="d-flex align-items-center gap-2.5">
                                <span class="section-icon-pill"><i class="fa-solid fa-folder-open"></i></span>
                                <h3 class="font-serif text-primary fs-4 fw-bold m-0">Quality Documentation &amp; Statutory Reports</h3>
                            </div>
                            <span class="custom-badge-pill">
                                <i class="fa-solid fa-file-shield text-primary me-1.5"></i> Compliance Portfolio
                            </span>
                        </div>

                        <div class="table-responsive rounded-4 border border-custom overflow-hidden shadow-xs bg-white">
                            <table class="luxury-table table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th style="width: 55px;" class="text-center">#</th>
                                        <th>Document Title &amp; Scope</th>
                                        <th style="width: 180px;">Category</th>
                                        <th style="width: 140px;" class="text-end">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($naacDocuments as $idx => $doc): ?>
                                    <tr>
                                        <td class="text-center font-monospace fw-bold text-primary"><?php echo sprintf('%02d', $idx + 1); ?></td>
                                        <td>
                                            <div class="d-flex align-items-start gap-2.5">
                                                <i class="fa-solid fa-file-pdf text-danger fs-5 mt-1 flex-shrink-0"></i>
                                                <div>
                                                    <span class="fw-bold text-primary d-block" style="font-size: 0.92rem;">
                                                        <?php echo htmlspecialchars($doc['title']); ?>
                                                    </span>
                                                    <span class="small text-gold fw-semibold"><?php echo htmlspecialchars($doc['type']); ?></span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge bg-light text-dark border small px-2.5 py-1.5"><?php echo htmlspecialchars($doc['category']); ?></span>
                                        </td>
                                        <td class="text-end">
                                            <a href="<?php echo htmlspecialchars($doc['link']); ?>" class="btn btn-sm btn-outline-dark rounded-pill px-3 py-1.5 small fw-semibold">
                                                <i class="fa-solid fa-arrow-up-right-from-square me-1 text-gold"></i> View
                                            </a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- IQAC Linkage Banner -->
                    <div class="p-4 rounded-4 text-white mb-4 d-flex align-items-center justify-content-between flex-wrap gap-3" style="background: linear-gradient(135deg, #700018 0%, #4a0010 100%);">
                        <div>
                            <span class="badge bg-gold text-dark fw-bold mb-2">Quality Hub</span>
                            <h4 class="font-serif fs-4 fw-bold text-white mb-1">Internal Quality Assurance Cell (IQAC)</h4>
                            <p class="small text-white text-opacity-80 mb-0" style="max-width: 650px;">
                                Explore the apex institutional IQAC Committee, quality benchmarks, action plans, and monitoring mechanisms guiding NAAC and NIRF processes.
                            </p>
                        </div>
                        <a href="iqac.php" class="btn btn-gold-pill px-4 py-2.5 fw-bold text-decoration-none">
                            Visit IQAC Portal <i class="fa-solid fa-arrow-right ms-1"></i>
                        </a>
                    </div>

                    <!-- Contact Inquiries Footer Box -->
                    <div class="p-4 rounded-4 border border-custom bg-white d-flex align-items-center justify-content-between flex-wrap gap-3 shadow-xs mt-5">
                        <div>
                            <h5 class="font-serif text-primary fw-bold fs-6 mb-0.5">Need More Information?</h5>
                            <p class="small text-muted-custom mb-0">For statutory documentation or academic queries regarding NAAC accreditation, reach out to the Registrar Office.</p>
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
