<?php 
$pageTitle = "ARIIA & Innovation Ecosystem - Dr. APJ Abdul Kalam University, Indore";
require_once "db.php";
include "header.php"; 

$innovationStats = [
    ['num' => '25+', 'label' => 'Startups Incubated', 'icon' => 'fa-rocket'],
    ['num' => '45+', 'label' => 'Patents Filed / Published', 'icon' => 'fa-lightbulb'],
    ['num' => '₹1.5 Cr+', 'label' => 'Seed Funding Facilitated', 'icon' => 'fa-hand-holding-dollar'],
    ['num' => '10+', 'label' => 'Prototyping Labs', 'icon' => 'fa-flask-vial']
];

$innovationPillars = [
    [
        'title' => 'Kalam Incubation & Innovation Centre (KIIC)',
        'icon' => 'fa-microchip',
        'desc' => 'A dedicated 25,000 sq.ft. incubation ecosystem providing seed-stage support, high-end workstations, cloud computing credits, fab labs, and mentoring by seasoned venture capitalists.'
    ],
    [
        'title' => 'Intellectual Property Rights (IPR) Cell',
        'icon' => 'fa-certificate',
        'desc' => 'Empowering faculty, research scholars, and students with end-to-end patent drafting, prior art search, filing fee assistance, and commercialization pathways under Indian and International Patent Acts.'
    ],
    [
        'title' => 'Institution’s Innovation Council (IIC - MoE)',
        'icon' => 'fa-star',
        'desc' => 'Established under the aegis of the Ministry of Education (MoE) Innovation Cell to conduct round-the-year hackathons, ideation conclaves, design thinking workshops, and start-up pitch fests.'
    ],
    [
        'title' => 'Smart India Hackathon (SIH) & Yukti Portal',
        'icon' => 'fa-laptop-code',
        'desc' => 'University student teams consistently qualify as national finalists in Smart India Hackathons, solving critical problem statements posed by central ministries, state bodies, and Fortune 500 corporations.'
    ]
];

$patentDisclosures = [
    [
        'title' => 'IoT-Based Smart Automated Agricultural Irrigation & Soil Health Monitor',
        'inventor' => 'Faculty of Engineering & Agriculture',
        'status' => 'Published & Patent Granted',
        'app_no' => 'IN202321045982'
    ],
    [
        'title' => 'Novel Controlled-Release Nanoparticulate Drug Delivery Formulation',
        'inventor' => 'School of Pharmacy (SOP)',
        'status' => 'Published',
        'app_no' => 'IN202421018934'
    ],
    [
        'title' => 'AI-Driven Predictive Diagnostics System for Cardiac Arrhythmia Detection',
        'inventor' => 'Department of Computer Science & Engineering',
        'status' => 'Published',
        'app_no' => 'IN202421067210'
    ],
    [
        'title' => 'Eco-Friendly Bio-Degradable Composite Material from Agro-Waste Residues',
        'inventor' => 'School of Engineering & Chemistry',
        'status' => 'Published',
        'app_no' => 'IN202321088451'
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
            <span class="text-gold fw-medium">ARIIA &amp; Innovation</span>
        </div>
        
        <div class="eyebrow-label gold-eyebrow mb-2" style="color: var(--gold-color) !important;">
            <span style="background: var(--gold-color); width: 1.5rem; height: 1px; display: inline-block;"></span> INNOVATION &amp; STARTUP RANKINGS
        </div>
        <h1 class="font-serif display-5 fw-medium text-white mb-2" style="max-width: 950px; line-height: 1.15;">
            ARIIA &amp; Innovation Ecosystem
        </h1>
        <p class="text-white text-opacity-80 small mb-0" style="letter-spacing: 0.12em; text-transform: uppercase;">
            Dr. A.P.J. Abdul Kalam University · Atal Ranking of Institutions on Innovation Achievements &amp; IIC
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
                                <i class="fa-solid fa-lightbulb"></i>
                            </div>
                            <div>
                                <h3 class="font-serif text-primary fs-4 fw-bold mb-1">Empowering the Innovators of Tomorrow</h3>
                                <p class="mb-0 text-muted-custom" style="font-size: 0.95rem; line-height: 1.75;">
                                    In tribute to the missile man of India, Dr. A.P.J. Abdul Kalam, our university is built upon the pillars of innovation, entrepreneurship, and applied scientific research. Under the <strong>Atal Ranking of Institutions on Innovation Achievements (ARIIA)</strong> framework initiated by the Ministry of Education (MoE), Government of India, we cultivate an ecosystem where bold ideas transform into viable enterprises.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Innovation Key Metric Counters -->
                    <div class="row g-3 mb-5">
                        <?php foreach ($innovationStats as $s): ?>
                        <div class="col-6 col-md-3">
                            <div class="p-3.5 rounded-4 border border-custom bg-white text-center shadow-xs">
                                <i class="fa-solid <?php echo $s['icon']; ?> text-gold fs-4 mb-2"></i>
                                <div class="font-serif text-primary display-6 fw-bold mb-0.5"><?php echo $s['num']; ?></div>
                                <div class="small text-muted-custom fw-medium" style="font-size: 0.78rem;"><?php echo $s['label']; ?></div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>

                    <!-- Innovation Ecosystem Pillars -->
                    <div class="mb-5">
                        <div class="tab-section-header mb-4 pb-2.5 border-bottom border-custom d-flex align-items-center justify-content-between flex-wrap gap-2">
                            <div class="d-flex align-items-center gap-2.5">
                                <span class="section-icon-pill"><i class="fa-solid fa-network-wired"></i></span>
                                <h3 class="font-serif text-primary fs-4 fw-bold m-0">Core Ecosystem Pillars</h3>
                            </div>
                            <span class="custom-badge-pill">
                                <i class="fa-solid fa-shield-halved text-gold me-1.5"></i> MoE IIC Approved
                            </span>
                        </div>

                        <div class="row g-3.5">
                            <?php foreach ($innovationPillars as $pillar): ?>
                            <div class="col-md-6">
                                <div class="p-4 rounded-4 border border-custom bg-white shadow-xs h-100 hover-shadow transition-all">
                                    <div class="d-flex align-items-center gap-3 mb-2.5">
                                        <div class="rounded-circle p-2.5 text-primary" style="background: rgba(112,0,24,0.06); width: 44px; height: 44px; display: flex; align-items: center; justify-content: center;">
                                            <i class="fa-solid <?php echo $pillar['icon']; ?> fs-5"></i>
                                        </div>
                                        <h4 class="font-serif text-primary fs-6 fw-bold mb-0" style="line-height: 1.35;"><?php echo htmlspecialchars($pillar['title']); ?></h4>
                                    </div>
                                    <p class="text-muted-custom small mb-0" style="line-height: 1.6; font-size: 0.88rem;">
                                        <?php echo htmlspecialchars($pillar['desc']); ?>
                                    </p>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- University Patent Portfolio Table -->
                    <div class="mb-5">
                        <div class="tab-section-header mb-4 pb-2.5 border-bottom border-custom d-flex align-items-center justify-content-between flex-wrap gap-2">
                            <div class="d-flex align-items-center gap-2.5">
                                <span class="section-icon-pill"><i class="fa-solid fa-file-shield"></i></span>
                                <h3 class="font-serif text-primary fs-4 fw-bold m-0">Select Published Patent Disclosures</h3>
                            </div>
                            <span class="custom-badge-pill">
                                <i class="fa-solid fa-stamp text-primary me-1.5"></i> Indian Patent Office
                            </span>
                        </div>

                        <div class="table-responsive rounded-4 border border-custom overflow-hidden shadow-xs bg-white">
                            <table class="luxury-table table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th style="width: 55px;" class="text-center">#</th>
                                        <th>Invention Title</th>
                                        <th style="width: 170px;">Faculty / School</th>
                                        <th style="width: 140px;" class="text-end">Application / Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($patentDisclosures as $idx => $patent): ?>
                                    <tr>
                                        <td class="text-center font-monospace fw-bold text-primary"><?php echo sprintf('%02d', $idx + 1); ?></td>
                                        <td>
                                            <div class="fw-bold text-primary" style="font-size: 0.92rem;">
                                                <?php echo htmlspecialchars($patent['title']); ?>
                                            </div>
                                            <span class="small text-muted font-monospace"><?php echo htmlspecialchars($patent['app_no']); ?></span>
                                        </td>
                                        <td>
                                            <span class="small text-dark fw-medium"><?php echo htmlspecialchars($patent['inventor']); ?></span>
                                        </td>
                                        <td class="text-end">
                                            <span class="badge bg-success bg-opacity-15 text-success border border-success border-opacity-25 px-2.5 py-1.5 rounded-pill small fw-semibold">
                                                <i class="fa-solid fa-check me-1"></i> <?php echo htmlspecialchars($patent['status']); ?>
                                            </span>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Incubation Center Callout -->
                    <div class="p-4 rounded-4 text-white mb-4 d-flex align-items-center justify-content-between flex-wrap gap-3" style="background: linear-gradient(135deg, #700018 0%, #4a0010 100%);">
                        <div>
                            <span class="badge bg-gold text-dark fw-bold mb-2">Startup Ecosystem</span>
                            <h4 class="font-serif fs-4 fw-bold text-white mb-1">Have an Innovative Startup Idea?</h4>
                            <p class="small text-white text-opacity-80 mb-0" style="max-width: 650px;">
                                The Kalam Incubation &amp; Innovation Centre provides student entrepreneurs with mentorship, seed funding, office space, and technical labs.
                            </p>
                        </div>
                        <a href="contact-us.php" class="btn btn-gold-pill px-4 py-2.5 fw-bold text-decoration-none">
                            Connect with KIIC <i class="fa-solid fa-arrow-right ms-1"></i>
                        </a>
                    </div>

                    <!-- Contact Inquiries Footer Box -->
                    <div class="p-4 rounded-4 border border-custom bg-white d-flex align-items-center justify-content-between flex-wrap gap-3 shadow-xs mt-5">
                        <div>
                            <h5 class="font-serif text-primary fw-bold fs-6 mb-0.5">Need More Information?</h5>
                            <p class="small text-muted-custom mb-0">For statutory documentation or academic queries regarding ARIIA and Innovation, reach out to the Registrar Office.</p>
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
