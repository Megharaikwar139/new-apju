<?php 
require_once "db.php";

// If a specific department is passed, forward to department-view.php
if (!empty($_GET['dept'])) {
    require_once __DIR__ . '/department-view.php';
    exit;
}

$pageTitle = "Dean & Principal Messages - Dr. APJ Abdul Kalam University, Indore";
include "header.php"; 

$deans = [
    [
        'name' => 'Dr. Sandeep Singh Senger',
        'title' => 'Dean & Principal, College of Engineering (COE)',
        'school' => 'Faculty of Engineering & Technology',
        'image' => 'uploads/2025/08/rnkapoor1.png', // fallback or placeholder
        'quote' => 'Engineering at Dr. APJ Abdul Kalam University is about solving real-world challenges through innovation, ethical grounding, and rigorous technological expertise.',
        'msg' => 'Welcome to the Faculty of Engineering & Technology. Our mission is to prepare world-class engineers equipped with cutting-edge domain knowledge, hands-on lab capabilities, and problem-solving aptitude. Through industrial internships and innovative capstone projects, our graduates lead in multinational engineering environments across the globe.'
    ],
    [
        'name' => 'Dr. Revathi A. Gupta',
        'title' => 'Dean & Principal, Institute of Pharmacy (IOP)',
        'school' => 'Faculty of Health Sciences & Pharmacy',
        'image' => 'uploads/2025/08/hruti-Kumari.jpg',
        'quote' => 'Pharmaceutical sciences demand scientific precision coupled with human compassion. We nurture competent pharmacy leaders committed to healthcare excellence.',
        'msg' => 'At Dr. APJ Abdul Kalam University, our pharmacy programs integrate state-of-the-art formulations research, advanced analytical instrumentation, and clinical healthcare rotations. We take pride in our robust industry-academia linkages with leading pharmaceutical conglomerates, empowering our graduates to excel in drug discovery, clinical research, and hospital pharmacy.'
    ],
    [
        'name' => 'Dr. Rakesh Kumar Jatav',
        'title' => 'Principal, School of Pharmacy (SOP)',
        'school' => 'Faculty of Health Sciences & Pharmacy',
        'image' => 'uploads/2026/03/Pro-Chancellor.jpeg',
        'quote' => 'Empowering future healthcare professionals with scientific rigor, research excellence, and unwavering professional ethics.',
        'msg' => 'The School of Pharmacy is committed to delivering quality education aligned with the Pharmacy Council of India (PCI) standards. Our advanced laboratories, dedicated faculty mentors, and industry-oriented syllabus ensure our students develop comprehensive expertise in modern pharmacology, pharmaceutics, and pharmaceutical quality assurance.'
    ],
    [
        'name' => 'Dr. Jagdish Chandra Sharma',
        'title' => 'Principal, Faculty of Education (COPS)',
        'school' => 'College of Professional Studies',
        'image' => 'uploads/2025/04/registrar.jpg',
        'quote' => 'Education is the most powerful tool for societal transformation. We train visionary educators who inspire coming generations.',
        'msg' => 'In accordance with NCTE guidelines and the National Education Policy 2020, our teacher education programs focus on modern pedagogical skills, inclusive classroom management, educational psychology, and technology-driven interactive learning. We prepare dedicated educators ready to transform learning environments.'
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
            <span class="text-gold fw-medium">Dean &amp; Principal Messages</span>
        </div>
        
        <div class="eyebrow-label gold-eyebrow mb-2" style="color: var(--gold-color) !important;">
            <span style="background: var(--gold-color); width: 1.5rem; height: 1px; display: inline-block;"></span> ACADEMIC COUNCIL &amp; LEADERSHIP
        </div>
        <h1 class="font-serif display-5 fw-medium text-white mb-2" style="max-width: 950px; line-height: 1.15;">
            Messages from Deans &amp; Principals
        </h1>
        <p class="text-white text-opacity-80 small mb-0" style="letter-spacing: 0.12em; text-transform: uppercase;">
            Dr. A.P.J. Abdul Kalam University · Visionary Academic Guidance Across Constituent Faculties
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
                                <i class="fa-solid fa-user-tie"></i>
                            </div>
                            <div>
                                <h3 class="font-serif text-primary fs-4 fw-bold mb-1">Guiding Academic Excellence</h3>
                                <p class="mb-0 text-muted-custom" style="font-size: 0.95rem; line-height: 1.75;">
                                    The academic deans and principals of our constituent colleges provide visionary leadership, overseeing curricula enhancement, faculty development, research initiatives, and student mentoring across Engineering, Pharmacy, Management, and Professional Studies.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Dean Cards -->
                    <div class="d-flex flex-column gap-5 mb-5">
                        <?php foreach ($deans as $d): ?>
                        <div class="p-4 rounded-4 border border-custom bg-white shadow-xs">
                            <div class="d-flex align-items-start justify-content-between flex-wrap gap-2 mb-3 pb-3 border-bottom border-custom">
                                <div>
                                    <div class="badge bg-gold text-dark fw-bold mb-1" style="font-size: 0.72rem;"><?php echo htmlspecialchars($d['school']); ?></div>
                                    <h3 class="font-serif text-primary fs-4 fw-bold mb-0.5"><?php echo htmlspecialchars($d['name']); ?></h3>
                                    <span class="text-gold fw-semibold small"><?php echo htmlspecialchars($d['title']); ?></span>
                                </div>
                                <span class="badge bg-light text-primary border small px-3 py-1.5 font-monospace fw-bold">Academic Dean</span>
                            </div>

                            <!-- Quote Pill -->
                            <div class="p-3.5 rounded-3 mb-3" style="background: rgba(112,0,24,0.04); border-left: 3px solid var(--gold-color);">
                                <p class="font-serif fst-italic text-dark mb-0 small" style="line-height: 1.6;">
                                    "<?php echo htmlspecialchars($d['quote']); ?>"
                                </p>
                            </div>

                            <!-- Message Content -->
                            <p class="text-muted-custom small mb-0" style="line-height: 1.75; font-size: 0.92rem;">
                                <?php echo htmlspecialchars($d['msg']); ?>
                            </p>
                        </div>
                        <?php endforeach; ?>
                    </div>

                    <!-- Contact Inquiries Footer Box -->
                    <div class="p-4 rounded-4 border border-custom bg-white d-flex align-items-center justify-content-between flex-wrap gap-3 shadow-xs mt-5">
                        <div>
                            <h5 class="font-serif text-primary fw-bold fs-6 mb-0.5">Need More Information?</h5>
                            <p class="small text-muted-custom mb-0">For statutory documentation or academic queries regarding Dean/Principal messages, reach out to the Registrar Office.</p>
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
