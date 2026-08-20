<?php 
$pageTitle = "Dignitary & Visitor Testimonials - Dr. APJ Abdul Kalam University, Indore";
include 'header.php'; 

$visitors = [
    [
        'name' => 'Smt. Sumitra Mahajan (Tai)',
        'desig' => 'Former Speaker of Lok Sabha & Padma Bhushan Honoree',
        'org' => 'Parliament of India',
        'image' => 'uploads/2025/04/Sumitra_Mahajan-1.jpg',
        'quote' => 'Dr. A.P.J. Abdul Kalam University is rendering commendable service to higher education in Madhya Pradesh. The infrastructure, disciplined academic environment, and student-centric focus are truly inspiring.',
        'topic' => 'University Convocation & Campus Visit'
    ],
    [
        'name' => 'Shri Pushyamitra Bhargava',
        'desig' => 'Hon\'ble Mayor of Indore',
        'org' => 'Indore Municipal Corporation (IMC)',
        'image' => 'uploads/2025/04/voe3.jpg',
        'quote' => 'Visited Dr. A.P.J. Abdul Kalam University campus and participated in the Swachh Bharat Abhiyan and massive Green Campus tree plantation program. The enthusiasm of the youth and faculty towards civic cleanliness is exemplary.',
        'topic' => 'Swachh Bharat & Green Campus Campaign'
    ],
    [
        'name' => 'Dr. Rajeev Dixit',
        'desig' => 'Director, College Development Council (DCDC)',
        'org' => 'Devi Ahilya Vishwavidyalaya (DAVV), Indore',
        'image' => 'uploads/2025/04/voe4-e1768971569851.jpg',
        'quote' => 'Conducted workshop under Indian Knowledge System on \'Role of Scientists in Nation Building\' for university faculty and scholars. The academic vision and research appetite of students here is commendable.',
        'topic' => 'National Science Workshop & Keynote'
    ],
    [
        'name' => 'Dr. Pawan Kumar Basniwal',
        'desig' => 'Professor & Principal',
        'org' => 'Shri Balaji College of Pharmacy, Jaipur',
        'image' => 'uploads/2025/03/voe1-e1768971492131.jpg',
        'quote' => 'Addressed pharmacy students on medicinal chemistry and drug-receptor mechanics. The sophisticated laboratory apparatus and research equipment at AKU are at par with top research institutions.',
        'topic' => 'Advanced Pharmaceutical Chemistry Lecture'
    ],
    [
        'name' => 'Dr. Vaidehi V. Raole',
        'desig' => 'Professor, Dept. of Kriya Sharir',
        'org' => 'Parul Institute of Ayurveda, Parul University',
        'image' => 'uploads/2025/04/voe5-e1768971533256.jpg',
        'quote' => 'Organized an extensive guest lecture series for BAMS Ayurvedic scholars. The clinical exposure and herbal medicinal garden at R.N. Kapoor Memorial Ayurvedic Hospital are exemplary.',
        'topic' => 'Ayurvedic Medical Education & Clinical Studies'
    ]
];
?>

<!-- Hero Banner -->
<section class="inner-page-hero">
    <div class="container-custom position-relative" style="z-index: 2;">
        <div class="inner-breadcrumb-pill">
            <a href="index.php"><i class="fa-solid fa-house me-1"></i> Home</a>
            <span>&raquo;</span>
            <a href="gallery.php">Campus Life</a>
            <span>&raquo;</span>
            <span class="text-gold fw-medium">Visitor Testimonials</span>
        </div>
        
        <div class="eyebrow-label gold-eyebrow mb-2" style="color: var(--gold-color) !important;">
            <span style="background: var(--gold-color); width: 1.5rem; height: 1px; display: inline-block;"></span> WORDS FROM EMINENT DIGNITARIES
        </div>
        <h1 class="font-serif display-5 fw-medium text-white mb-2" style="max-width: 950px; line-height: 1.15;">
            Dignitary &amp; Visitor Testimonials
        </h1>
        <p class="text-white text-opacity-80 small mb-0" style="letter-spacing: 0.12em; text-transform: uppercase;">
            Dr. A.P.J. Abdul Kalam University · Reflections from National Leaders, Mayors &amp; Academicians
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
                                <i class="fa-solid fa-quote-left"></i>
                            </div>
                            <div>
                                <h3 class="font-serif text-primary fs-4 fw-bold mb-1">Voice of Experience &amp; Eminent Impressions</h3>
                                <p class="mb-0 text-muted-custom" style="font-size: 0.95rem; line-height: 1.75;">
                                    Distinguished statesmen, ministers, vice-chancellors, industrial CEOs, and medical scientists visit Dr. A.P.J. Abdul Kalam University, sharing their appreciation for our world-class infrastructure and pedagogical standards.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Visitors Cards Grid -->
                    <div class="d-flex flex-column gap-4 mb-5">
                        <?php foreach ($visitors as $v): ?>
                        <div class="feature-info-card p-4 p-md-4.5">
                            <div class="row g-4 align-items-center">
                                <div class="col-md-3 text-center">
                                    <div class="rounded-circle overflow-hidden d-inline-block border border-custom shadow-xs mb-2.5" style="width: 110px; height: 110px;">
                                        <img src="<?php echo htmlspecialchars($v['image']); ?>" alt="<?php echo htmlspecialchars($v['name']); ?>" class="img-fluid w-100 h-100" style="object-fit: cover;">
                                    </div>
                                    <h5 class="font-serif text-primary fw-bold fs-6 mb-1"><?php echo htmlspecialchars($v['name']); ?></h5>
                                    <span class="small text-gold fw-semibold text-uppercase d-block" style="font-size: 0.72rem;"><?php echo htmlspecialchars($v['desig']); ?></span>
                                    <span class="small text-muted-custom d-block" style="font-size: 0.75rem;"><?php echo htmlspecialchars($v['org']); ?></span>
                                </div>
                                <div class="col-md-9 border-start-md border-custom">
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <span class="badge bg-light text-primary border" style="font-size: 0.75rem;">
                                            <i class="fa-solid fa-calendar-check text-gold me-1"></i> <?php echo htmlspecialchars($v['topic']); ?>
                                        </span>
                                        <i class="fa-solid fa-quote-right text-gold fs-3 opacity-35"></i>
                                    </div>
                                    <p class="font-serif fst-italic text-dark fs-6 mb-0" style="line-height: 1.75;">
                                        "<?php echo htmlspecialchars($v['quote']); ?>"
                                    </p>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>

                </article>
            </div>

            <!-- Right Sidebar -->
            <div class="col-lg-4 col-xl-3">
                <?php include "campus-sidebar.php"; ?>
            </div>

        </div>
    </div>
</main>

<?php include 'footer.php'; ?>
