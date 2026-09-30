<?php 
$pageTitle = "MoUs & Industry Alliances - Dr. APJ Abdul Kalam University, Indore";
require_once "db.php";
include "header.php"; 

$mouPartners = [
    [
        'name' => 'Infosys Springboard',
        'type' => 'Digital Learning & Industry Readiness',
        'scope' => 'Access to digital learning platforms, emerging technology pathways, industry curriculum, and faculty enablement programs.',
        'target' => 'Faculty of Engineering, BCA, MCA, Management',
        'status' => 'Active & Ongoing'
    ],
    [
        'name' => 'Coursera for Campus (USA)',
        'type' => 'Global Online Academic Partner',
        'scope' => 'Unlimited access to 5,000+ world-class courses, guided projects, and accredited credentials from top international universities.',
        'target' => 'All University Departments & Faculty',
        'status' => 'Active & Ongoing'
    ],
    [
        'name' => 'EC-Council Academia Partner',
        'type' => 'Cybersecurity & Ethical Hacking Alliance',
        'scope' => 'Global certifications including Certified Ethical Hacker (CEH), Certified Network Defender (CND), and cybersecurity lab simulations.',
        'target' => 'Computer Science & Information Technology',
        'status' => 'Active & Ongoing'
    ],
    [
        'name' => 'IBM Academic Initiative',
        'type' => 'Global Technology Enterprise Partner',
        'scope' => 'Access to IBM Cloud, enterprise software, AI, Data Science, and Quantum Computing developer toolkits for students and faculty.',
        'target' => 'Faculty of Engineering & Technology',
        'status' => 'Active & Ongoing'
    ],
    [
        'name' => 'Research For Resurgence Foundation (RFRF)',
        'type' => 'National Research & Innovation Body',
        'scope' => 'Joint multidisciplinary research, indigenous technology incubation, research methodology workshops, and scholarly publications.',
        'target' => 'University Research Council & Ph.D Scholars',
        'status' => 'Active & Ongoing'
    ],
    [
        'name' => 'TCS iON Learning Hub',
        'type' => 'Corporate Assessment & Digital Pedagogy',
        'scope' => 'Industry-aligned digital courses, National Qualifier Test (NQT) readiness, corporate communication training, and placement support.',
        'target' => 'Engineering, Pharmacy, Commerce, Management',
        'status' => 'Active & Ongoing'
    ],
    [
        'name' => 'edX Campus Essential (USA)',
        'type' => 'Premier International MOOC Alliance',
        'scope' => 'Curated university courses from Harvard, MIT, Berkeley, and leading worldwide institutions with credit transfer framework.',
        'target' => 'Multidisciplinary Academic Programs',
        'status' => 'Active & Ongoing'
    ],
    [
        'name' => 'IT-ITeS SSC NASSCOM',
        'type' => 'National Skill Standards & Sector Skill Council',
        'scope' => 'National Occupational Standards (NOS) assessments, FutureSkills Prime certifications, and qualification packs for IT workforce.',
        'target' => 'Department of Computer Science & IT',
        'status' => 'Active & Ongoing'
    ],
    [
        'name' => 'UiPath Academic Alliance',
        'type' => 'Robotic Process Automation (RPA)',
        'scope' => 'Curriculum integration in RPA, bot design, artificial intelligence orchestration, and global developer certifications.',
        'target' => 'Computer Science & Engineering',
        'status' => 'Active & Ongoing'
    ],
    [
        'name' => 'CuriosIT India',
        'type' => 'Full-Stack Software Development & IT Services',
        'scope' => 'Live commercial software projects, industrial internships, product engineering workshops, and campus recruitments.',
        'target' => 'B.Tech, BCA, MCA Students',
        'status' => 'Active & Ongoing'
    ],
    [
        'name' => 'AICTE - The Urban Learning Internship Program (TULIP)',
        'type' => 'Ministry of Housing & Urban Affairs / AICTE',
        'scope' => 'Experiential learning with Urban Local Bodies (ULBs) and Smart Cities, public infrastructure projects, and urban governance.',
        'target' => 'Engineering, Management & Planning Students',
        'status' => 'Active & Ongoing'
    ],
    [
        'name' => 'Virtual Labs - IIT Delhi (MHRD / MoE Govt. of India)',
        'type' => 'National Remote Laboratory Nodal Center',
        'scope' => 'Simulation-based online laboratory experiments across 9 engineering disciplines with 24/7 remote lab access.',
        'target' => 'School & College of Engineering',
        'status' => 'Active & Ongoing'
    ],
    [
        'name' => 'Enhancement in Learning with Improvement in Skills (ELIS - AICTE)',
        'type' => 'AICTE Digital Learning Portal',
        'scope' => 'Free access to cutting-edge technical education e-learning courses developed by top EdTech companies globally.',
        'target' => 'All Engineering & Technical Students',
        'status' => 'Active & Ongoing'
    ],
    [
        'name' => 'SWAYAM - Ministry of Education Govt. of India',
        'type' => 'National MOOCs & NPTEL Portal',
        'scope' => 'Credit mobility courses by premier IITs & IISc with proctored national certification and credit integration into university transcripts.',
        'target' => 'All Undergraduate & Postgraduate Programs',
        'status' => 'Active & Ongoing'
    ],
    [
        'name' => 'Smart City Indore (Indore Smart City Development Ltd.)',
        'type' => 'Municipal Corporation & Urban Innovation Partner',
        'scope' => 'Live projects in smart waste management, intelligent transport, environmental IoT monitoring, and urban sustainability hackathons.',
        'target' => 'Engineering, Science & Management',
        'status' => 'Active & Ongoing'
    ],
    [
        'name' => 'Spoken Tutorial - IIT Bombay (MHRD Govt. of India)',
        'type' => 'National FOSS Open Source Training Initiative',
        'scope' => 'Hands-on IT software training (Python, Linux, C++, Java, Scilab, LibreOffice) with online tests and IIT Bombay certificates.',
        'target' => 'All University Students & Faculty',
        'status' => 'Active & Ongoing'
    ],
    [
        'name' => 'KAPILA - Kalam Program for IP Literacy and Awareness',
        'type' => 'Ministry of Education Innovation Cell (MIC)',
        'scope' => 'Intellectual Property Rights (IPR) education, patent drafting, financial assistance for patent filing, and IP literacy workshops.',
        'target' => 'University Research Cell, Faculty & Innovators',
        'status' => 'Active & Ongoing'
    ],
    [
        'name' => 'Institution\'s Innovation Council (IIC - MoE)',
        'type' => 'Ministry of Education Innovation Cell (MIC)',
        'scope' => 'Systematic promotion of innovation, startup pre-incubation, ideation challenges, Smart India Hackathon participation, and mentoring.',
        'target' => 'Kalam Incubation Center & All Departments',
        'status' => 'Active & Ongoing'
    ],
    [
        'name' => 'Unnat Bharat Abhiyan (UBA) - Govt. of India',
        'type' => 'Flagship Rural Development Mission (IIT Delhi)',
        'scope' => 'Adoption of 5 surrounding rural villages, participatory development, rural technology deployment, and community health interventions.',
        'target' => 'NSS, Agriculture, Social Work (MSW) & Engineering',
        'status' => 'Active & Ongoing'
    ],
    [
        'name' => 'Ministry of Micro, Small and Medium Enterprises (MSME)',
        'type' => 'Govt. of India Enterprise Development',
        'scope' => 'Entrepreneurship Skill Development Programs (ESDP), MSME business incubator grant support, and student startup acceleration.',
        'target' => 'All University Departments & Budding Entrepreneurs',
        'status' => 'Active & Ongoing'
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
            <span class="text-gold fw-medium">MoUs &amp; Alliances</span>
        </div>
        
        <div class="eyebrow-label gold-eyebrow mb-2" style="color: var(--gold-color) !important;">
            <span style="background: var(--gold-color); width: 1.5rem; height: 1px; display: inline-block;"></span> INDUSTRY-ACADEMIA COLLABORATIONS
        </div>
        <h1 class="font-serif display-5 fw-medium text-white mb-2" style="max-width: 950px; line-height: 1.15;">
            Memorandums of Understanding (MoUs) &amp; Corporate Alliances
        </h1>
        <p class="text-white text-opacity-80 small mb-0" style="letter-spacing: 0.12em; text-transform: uppercase;">
            Dr. A.P.J. Abdul Kalam University · Bridging Classroom Pedagogy with Real-World Corporate Excellence
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
                                <i class="fa-solid fa-handshake"></i>
                            </div>
                            <div>
                                <h3 class="font-serif text-primary fs-4 fw-bold mb-1">Strategic Industrial Partnerships</h3>
                                <p class="mb-0 text-muted-custom" style="font-size: 0.95rem; line-height: 1.75;">
                                    At Dr. A.P.J. Abdul Kalam University, education is seamlessly integrated with corporate exposure. Through bilateral <strong>Memorandums of Understanding (MoUs)</strong> signed with Fortune 500 corporations, pharmaceutical conglomerates, and premier IT tech leaders, our students gain direct access to industry certifications, paid internships, state-of-the-art lab modules, and priority placement drives.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Partnership Impact Counters -->
                    <div class="row g-3 mb-5">
                        <div class="col-6 col-md-3">
                            <div class="p-3.5 rounded-4 border border-custom bg-white text-center shadow-xs">
                                <div class="font-serif text-primary display-6 fw-bold mb-0.5">20+</div>
                                <div class="small text-muted-custom fw-medium">Active Major MoUs</div>
                            </div>
                        </div>
                        <div class="col-6 col-md-3">
                            <div class="p-3.5 rounded-4 border border-custom bg-white text-center shadow-xs">
                                <div class="font-serif text-primary display-6 fw-bold mb-0.5">1,200+</div>
                                <div class="small text-muted-custom fw-medium">Internships Enabled</div>
                            </div>
                        </div>
                        <div class="col-6 col-md-3">
                            <div class="p-3.5 rounded-4 border border-custom bg-white text-center shadow-xs">
                                <div class="font-serif text-primary display-6 fw-bold mb-0.5">65+</div>
                                <div class="small text-muted-custom fw-medium">Joint Conclaves</div>
                            </div>
                        </div>
                        <div class="col-6 col-md-3">
                            <div class="p-3.5 rounded-4 border border-custom bg-white text-center shadow-xs">
                                <div class="font-serif text-primary display-6 fw-bold mb-0.5">15+</div>
                                <div class="small text-muted-custom fw-medium">Sponsored Projects</div>
                            </div>
                        </div>
                    </div>

                    <!-- MoUs Directory Table -->
                    <div class="mb-5">
                        <div class="tab-section-header mb-4 pb-2.5 border-bottom border-custom d-flex align-items-center justify-content-between flex-wrap gap-2">
                            <div class="d-flex align-items-center gap-2.5">
                                <span class="section-icon-pill"><i class="fa-solid fa-file-contract"></i></span>
                                <h3 class="font-serif text-primary fs-4 fw-bold m-0">Corporate &amp; Institutional MoUs Repository</h3>
                            </div>
                            <span class="custom-badge-pill">
                                <i class="fa-solid fa-building-circle-check text-gold me-1.5"></i> <?php echo count($mouPartners); ?> Strategic Alliances
                            </span>
                        </div>

                        <div class="table-responsive rounded-4 border border-custom overflow-hidden shadow-xs bg-white">
                            <table class="luxury-table table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th style="width: 55px;" class="text-center">#</th>
                                        <th>Organization &amp; Classification</th>
                                        <th>Scope of Collaboration &amp; Department</th>
                                        <th style="width: 140px;" class="text-end">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($mouPartners as $idx => $m): ?>
                                    <tr>
                                        <td class="text-center font-monospace fw-bold text-primary"><?php echo sprintf('%02d', $idx + 1); ?></td>
                                        <td>
                                            <div class="fw-bold text-primary" style="font-size: 0.93rem;">
                                                <?php echo htmlspecialchars($m['name']); ?>
                                            </div>
                                            <span class="small text-gold fw-semibold"><?php echo htmlspecialchars($m['type']); ?></span>
                                        </td>
                                        <td>
                                            <p class="mb-1 text-muted-custom small" style="line-height: 1.5; font-size: 0.85rem;">
                                                <?php echo htmlspecialchars($m['scope']); ?>
                                            </p>
                                            <span class="badge bg-light text-primary border small px-2 py-0.5 font-monospace">
                                                <i class="fa-solid fa-graduation-cap me-1"></i> <?php echo htmlspecialchars($m['target']); ?>
                                            </span>
                                        </td>
                                        <td class="text-end">
                                            <span class="badge bg-success bg-opacity-15 text-success border border-success border-opacity-25 px-2.5 py-1.5 rounded-pill small fw-semibold">
                                                <i class="fa-solid fa-circle-check me-1"></i> <?php echo htmlspecialchars($m['status']); ?>
                                            </span>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Industry Collaboration Proposal Banner -->
                    <div class="p-4 rounded-4 text-white mb-4 d-flex align-items-center justify-content-between flex-wrap gap-3" style="background: linear-gradient(135deg, #700018 0%, #4a0010 100%);">
                        <div>
                            <span class="badge bg-gold text-dark fw-bold mb-2">Corporate Relations</span>
                            <h4 class="font-serif fs-4 fw-bold text-white mb-1">Partner with Dr. APJ Abdul Kalam University</h4>
                            <p class="small text-white text-opacity-80 mb-0" style="max-width: 650px;">
                                Organizations interested in signing an MoU for campus recruitment, sponsored R&amp;D projects, employee upskilling, or joint labs can contact our Training &amp; Placement Cell.
                            </p>
                        </div>
                        <a href="contact-us.php" class="btn btn-gold-pill px-4 py-2.5 fw-bold text-decoration-none">
                            Initiate MoU Dialogue <i class="fa-solid fa-arrow-right ms-1"></i>
                        </a>
                    </div>

                    <!-- Contact Inquiries Footer Box -->
                    <div class="p-4 rounded-4 border border-custom bg-white d-flex align-items-center justify-content-between flex-wrap gap-3 shadow-xs mt-5">
                        <div>
                            <h5 class="font-serif text-primary fw-bold fs-6 mb-0.5">Need More Information?</h5>
                            <p class="small text-muted-custom mb-0">For statutory documentation or academic queries regarding MoUs, reach out to the Registrar Office.</p>
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
