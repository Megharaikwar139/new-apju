<?php 
$pageTitle = "Program Outcomes (PO) & Course Outcomes (CO) - Dr. APJ Abdul Kalam University, Indore";
require_once "db.php";
include "header.php"; 

$programOutcomes = [
    [
        'code' => 'PO1',
        'title' => 'Engineering / Professional Knowledge',
        'desc' => 'Apply the knowledge of mathematics, science, engineering fundamentals, and specialized principles to the solution of complex technical and societal problems.'
    ],
    [
        'code' => 'PO2',
        'title' => 'Problem Analysis',
        'desc' => 'Identify, formulate, review research literature, and analyze complex problems reaching substantiated conclusions using first principles of mathematics, natural sciences, and engineering sciences.'
    ],
    [
        'code' => 'PO3',
        'title' => 'Design/Development of Solutions',
        'desc' => 'Design solutions for complex problems and design system components or processes that meet the specified needs with appropriate consideration for public health, safety, cultural, societal, and environmental considerations.'
    ],
    [
        'code' => 'PO4',
        'title' => 'Conduct Investigations of Complex Problems',
        'desc' => 'Use research-based knowledge and research methods including design of experiments, analysis and interpretation of data, and synthesis of information to provide valid conclusions.'
    ],
    [
        'code' => 'PO5',
        'title' => 'Modern Tool Usage',
        'desc' => 'Create, select, and apply appropriate techniques, resources, and modern engineering and IT tools including prediction and modeling to complex engineering activities with an understanding of limitations.'
    ],
    [
        'code' => 'PO6',
        'title' => 'The Professional and Society',
        'desc' => 'Apply reasoning informed by contextual knowledge to assess societal, health, safety, legal, and cultural issues and the consequent responsibilities relevant to professional practice.'
    ],
    [
        'code' => 'PO7',
        'title' => 'Environment and Sustainability',
        'desc' => 'Understand the impact of professional solutions in societal and environmental contexts, and demonstrate the knowledge of, and need for sustainable development.'
    ],
    [
        'code' => 'PO8',
        'title' => 'Ethics & Professional Integrity',
        'desc' => 'Apply ethical principles and commit to professional ethics, responsibilities, and norms of engineering and healthcare practices.'
    ],
    [
        'code' => 'PO9',
        'title' => 'Individual and Team Work',
        'desc' => 'Function effectively as an individual, and as a member or leader in diverse teams, and in multidisciplinary settings.'
    ],
    [
        'code' => 'PO10',
        'title' => 'Communication Skills',
        'desc' => 'Communicate effectively on complex activities with the engineering community and with society at large, such as being able to comprehend and write effective reports, design documentation, and make effective presentations.'
    ],
    [
        'code' => 'PO11',
        'title' => 'Project Management and Finance',
        'desc' => 'Demonstrate knowledge and understanding of engineering and management principles and apply these to one’s own work, as a member and leader in a team, to manage projects in multidisciplinary environments.'
    ],
    [
        'code' => 'PO12',
        'title' => 'Life-long Learning',
        'desc' => 'Recognize the need for, and have the preparation and ability to engage in independent and life-long learning in the broadest context of technological and social changes.'
    ]
];

$disciplinePSOs = [
    [
        'discipline' => 'Computer Science & Engineering',
        'pso1' => 'PSO 1: Ability to design, implement, and validate scalable software algorithms, cloud architecture, and secure enterprise systems using cutting-edge programming frameworks.',
        'pso2' => 'PSO 2: Competence in applying Artificial Intelligence, Machine Learning, and Big Data technologies to solve real-world industry challenges.'
    ],
    [
        'discipline' => 'Pharmacy & Healthcare',
        'pso1' => 'PSO 1: Proficiency in pharmaceutical formulations, novel drug delivery systems, industrial manufacturing under cGMP, and pharmacological evaluations.',
        'pso2' => 'PSO 2: Mastery of analytical instrumentation, clinical pharmacy practice, regulatory drug filings, and patient-centric healthcare ethics.'
    ],
    [
        'discipline' => 'Mechanical & Civil Engineering',
        'pso1' => 'PSO 1: Expertise in thermal systems, machine design, CAD/CAM robotics, and sustainable structural infrastructure adhering to Indian and international building codes.',
        'pso2' => 'PSO 2: Capability to manage heavy construction, materials testing, and environmental impact assessments with modern computational software.'
    ],
    [
        'discipline' => 'Management & Business Administration',
        'pso1' => 'PSO 1: Strategic analytical decision-making capabilities across marketing, corporate finance, human resources, and business analytics.',
        'pso2' => 'PSO 2: Entrepreneurial competence to formulate viable business models, navigate capital markets, and lead cross-cultural corporate operations.'
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
            <span class="text-gold fw-medium">Program Outcomes (SO / PO)</span>
        </div>
        
        <div class="eyebrow-label gold-eyebrow mb-2" style="color: var(--gold-color) !important;">
            <span style="background: var(--gold-color); width: 1.5rem; height: 1px; display: inline-block;"></span> OUTCOME-BASED EDUCATION (OBE)
        </div>
        <h1 class="font-serif display-5 fw-medium text-white mb-2" style="max-width: 950px; line-height: 1.15;">
            Program Outcomes (PO) &amp; Student Outcomes (SO)
        </h1>
        <p class="text-white text-opacity-80 small mb-0" style="letter-spacing: 0.12em; text-transform: uppercase;">
            Dr. A.P.J. Abdul Kalam University · Outcome-Based Education Framework &amp; Graduate Attributes
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
                                <i class="fa-solid fa-graduation-cap"></i>
                            </div>
                            <div>
                                <h3 class="font-serif text-primary fs-4 fw-bold mb-1">Outcome-Based Education (OBE) Paradigm</h3>
                                <p class="mb-0 text-muted-custom" style="font-size: 0.95rem; line-height: 1.75;">
                                    In alignment with the <strong>National Board of Accreditation (NBA)</strong>, the Washington Accord, and UGC quality benchmarks, Dr. A.P.J. Abdul Kalam University implements an Outcome-Based Education (OBE) model. Every academic program defines clear Program Educational Objectives (PEOs), Program Outcomes (POs), Program Specific Outcomes (PSOs), and Course Outcomes (COs) mapped to Bloom’s Taxonomy levels.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- 12 Standard Program Outcomes Grid -->
                    <div class="mb-5">
                        <div class="tab-section-header mb-4 pb-2.5 border-bottom border-custom d-flex align-items-center justify-content-between flex-wrap gap-2">
                            <div class="d-flex align-items-center gap-2.5">
                                <span class="section-icon-pill"><i class="fa-solid fa-list-ol"></i></span>
                                <h3 class="font-serif text-primary fs-4 fw-bold m-0">Twelve Core Program Outcomes (PO1 to PO12)</h3>
                            </div>
                            <span class="custom-badge-pill">
                                <i class="fa-solid fa-award text-gold me-1.5"></i> Graduate Attributes
                            </span>
                        </div>

                        <div class="row g-3.5">
                            <?php foreach ($programOutcomes as $po): ?>
                            <div class="col-md-6">
                                <div class="p-3.5 rounded-4 border border-custom bg-white shadow-xs h-100 d-flex align-items-start gap-3 hover-shadow transition-all">
                                    <div class="badge-pill-blur text-primary fw-bold font-monospace px-2.5 py-1.5 rounded-3 text-center flex-shrink-0" style="background: rgba(112, 0, 24, 0.08); font-size: 0.88rem; min-width: 48px;">
                                        <?php echo $po['code']; ?>
                                    </div>
                                    <div>
                                        <h4 class="font-serif text-primary fs-6 fw-bold mb-1"><?php echo htmlspecialchars($po['title']); ?></h4>
                                        <p class="text-muted-custom small mb-0" style="font-size: 0.84rem; line-height: 1.55;">
                                            <?php echo htmlspecialchars($po['desc']); ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- Program Specific Outcomes (PSOs) -->
                    <div class="mb-5">
                        <div class="tab-section-header mb-4 pb-2.5 border-bottom border-custom d-flex align-items-center justify-content-between flex-wrap gap-2">
                            <div class="d-flex align-items-center gap-2.5">
                                <span class="section-icon-pill"><i class="fa-solid fa-crosshairs"></i></span>
                                <h3 class="font-serif text-primary fs-4 fw-bold m-0">Discipline-Specific Program Outcomes (PSOs)</h3>
                            </div>
                            <span class="custom-badge-pill">
                                <i class="fa-solid fa-layer-group text-primary me-1.5"></i> Specialized Competencies
                            </span>
                        </div>

                        <div class="row g-4">
                            <?php foreach ($disciplinePSOs as $pso): ?>
                            <div class="col-12">
                                <div class="p-4 rounded-4 border border-custom bg-white shadow-xs">
                                    <h4 class="font-serif text-primary fs-5 fw-bold mb-2.5 d-flex align-items-center gap-2">
                                        <i class="fa-solid fa-bookmark text-gold fs-6"></i>
                                        <?php echo htmlspecialchars($pso['discipline']); ?>
                                    </h4>
                                    <div class="p-3 rounded-3 bg-light border border-custom mb-2 small text-dark" style="line-height: 1.6;">
                                        <strong><?php echo htmlspecialchars($pso['pso1']); ?></strong>
                                    </div>
                                    <div class="p-3 rounded-3 bg-light border border-custom small text-dark" style="line-height: 1.6;">
                                        <strong><?php echo htmlspecialchars($pso['pso2']); ?></strong>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- Attainment Assessment Matrix Callout -->
                    <div class="p-4 rounded-4 border border-custom bg-white shadow-xs mb-4">
                        <h4 class="font-serif text-primary fs-5 fw-bold mb-2 d-flex align-items-center gap-2">
                            <i class="fa-solid fa-chart-pie text-gold"></i>
                            Outcome Attainment &amp; Assessment Methodology
                        </h4>
                        <p class="text-muted-custom small mb-3" style="font-size: 0.9rem; line-height: 1.7;">
                            Attainment of Course Outcomes (COs) and Program Outcomes (POs) is assessed through a robust two-fold framework:
                        </p>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="p-3 rounded-3 bg-light border border-custom h-100">
                                    <div class="fw-bold text-primary mb-1"><i class="fa-solid fa-pen-ruler me-1.5 text-gold"></i> Direct Assessment (80% Weightage)</div>
                                    <p class="small text-muted-custom mb-0" style="font-size: 0.82rem; line-height: 1.5;">
                                        Mid-semester tests, end-semester examinations, laboratory practical records, mini projects, assignments, and oral viva-voce evaluations.
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="p-3 rounded-3 bg-light border border-custom h-100">
                                    <div class="fw-bold text-primary mb-1"><i class="fa-solid fa-comments me-1.5 text-gold"></i> Indirect Assessment (20% Weightage)</div>
                                    <p class="small text-muted-custom mb-0" style="font-size: 0.82rem; line-height: 1.5;">
                                        Course exit surveys, graduate exit feedback, alumni surveys, and employer satisfaction ratings collected annually.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Contact Inquiries Footer Box -->
                    <div class="p-4 rounded-4 border border-custom bg-white d-flex align-items-center justify-content-between flex-wrap gap-3 shadow-xs mt-5">
                        <div>
                            <h5 class="font-serif text-primary fw-bold fs-6 mb-0.5">Need More Information?</h5>
                            <p class="small text-muted-custom mb-0">For statutory documentation or academic queries regarding Program Outcomes, reach out to the Registrar Office.</p>
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
