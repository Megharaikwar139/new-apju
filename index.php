<?php
require_once 'header.php';

// 1. Fetch Hero Section Data
$hero = $pdo->query("SELECT * FROM homepage_hero LIMIT 1")->fetch() ?: [
    'headline' => 'Where <em class="text-gold fst-italic fw-medium">extraordinary</em> minds are shaped.',
    'subheadline' => 'For over a decade, Dr. A.P.J. Abdul Kalam University has stood at the intersection of research, character and craft — nurturing India\'s next generation of engineers, scientists, entrepreneurs and citizens.',
    'video_url' => 'assets/lovable/campus-hero.mp4',
    'poster_image' => 'assets/lovable/APJ1.jpg',
    'badge1' => 'UGC Recognized',
    'badge2' => 'AICTE · PCI · BCI',
    'badge3' => 'NAAC Accredited',
    'stat1_value' => '18k+', 'stat1_label' => 'Students on Campus',
    'stat2_value' => '12', 'stat2_label' => 'Schools & Faculties',
    'stat3_value' => '120+', 'stat3_label' => 'Programs Offered',
    'stat4_value' => '500+', 'stat4_label' => 'Recruiting Partners',
    'btn1_text' => 'Begin your application', 'btn1_url' => 'admission-procedure.php',
    'btn2_text' => 'Explore programs', 'btn2_url' => '#academics'
];

// 2. Fetch About Section Data
$about = $pdo->query("SELECT * FROM homepage_about LIMIT 1")->fetch() ?: [
    'eyebrow' => 'About the University',
    'title' => 'A university built on Dr. Kalam\'s conviction that character is the true curriculum.',
    'image_path' => 'assets/lovable/apj4.webp',
    'est_badge' => 'Est. 2016',
    'location_text' => 'Indore, Madhya Pradesh',
    'paragraph1' => 'Named after the People\'s President and India\'s Missile Man, our university is dedicated to the ideals Dr. Kalam championed — <em class="text-primary fw-medium">rigorous inquiry, humane values, and the pursuit of national purpose.</em>',
    'paragraph2' => 'Set on a 40-acre residential campus in Indore, AKU brings together twelve schools under a single multidisciplinary vision. From cutting-edge engineering labs to a nationally recognized law school, from a pharmacy program shaping the next generation of researchers to design studios where craft meets code — we build the graduates industry seeks and society needs.',
    'pillar1_title' => 'Research-Led', 'pillar1_desc' => 'Undergraduates published in Q1 journals', 'pillar1_icon' => 'fa-solid fa-bullseye',
    'pillar2_title' => 'Values-First', 'pillar2_desc' => 'Ethics woven into every curriculum', 'pillar2_icon' => 'fa-solid fa-heart',
    'pillar3_title' => 'Industry-Ready', 'pillar3_desc' => 'Co-designed with 500+ recruiters', 'pillar3_icon' => 'fa-solid fa-lightbulb'
];

// 3. Fetch Academic Schools Data
$schools = $pdo->query("SELECT * FROM homepage_schools ORDER BY sort_order ASC, id ASC")->fetchAll();

// 4. Fetch Why AKU Features Data
$why_features = $pdo->query("SELECT * FROM why_aku_features ORDER BY sort_order ASC, id ASC LIMIT 6")->fetchAll();

// 5. Fetch Research Data
$research = $pdo->query("SELECT * FROM homepage_research LIMIT 1")->fetch() ?: [
    'title' => 'The <em class="text-gold fst-italic">Kalam Innovation Center</em> — where curiosity becomes patent.',
    'description' => 'Fourteen research centers. Over 300 publications in the last three years. A student incubator that has funded 42 startups. Research at AKU isn\'t reserved for the corner office — it starts on day one.',
    'image_path' => 'assets/lovable/apj8.jpeg',
    'stat1_value' => '14', 'stat1_label' => 'Research Centers',
    'stat2_value' => '342', 'stat2_label' => 'Publications',
    'stat3_value' => '42', 'stat3_label' => 'Startups Incubated',
    'paper1_num' => '01', 'paper1_tag' => 'Materials Science', 'paper1_title' => 'Low-energy polymer catalysis for medical devices', 'paper1_author' => 'Dr. R. Sharma & team',
    'paper2_num' => '02', 'paper2_tag' => 'AI · Health', 'paper2_title' => 'Explainable deep-learning models for cardiac imaging', 'paper2_author' => 'Prof. A. Verma',
    'paper3_num' => '03', 'paper3_tag' => 'Pharmacy', 'paper3_title' => 'Plant-derived antivirals: three new lead compounds', 'paper3_author' => 'Dr. S. Iyer',
    'report_link' => 'faculty-publications.php'
];

// 6. Fetch Alumni Voices Data
$alumni_voices = $pdo->query("SELECT * FROM homepage_alumni ORDER BY sort_order ASC, id ASC LIMIT 3")->fetchAll();

// 7. Fetch Portals Data
$portals = $pdo->query("SELECT * FROM homepage_portals ORDER BY sort_order ASC, id ASC")->fetchAll();

// 8. Fetch Admissions CTA Data
$admissions_cta = $pdo->query("SELECT * FROM homepage_admissions_cta LIMIT 1")->fetch() ?: [
    'eyebrow' => 'Admissions 2026',
    'headline' => 'Your seat at <em class="text-gold fst-italic">AKU</em> begins with a single form.',
    'description' => 'Applications for the 2026 intake are now open across all undergraduate, postgraduate and doctoral programs. Merit-based scholarships available for eligible candidates.',
    'btn1_text' => 'Start your application', 'btn1_url' => 'admission-procedure.php',
    'btn2_text' => 'Download brochure', 'btn2_url' => 'download-form-student.php',
    'date1_label' => 'Application Deadline', 'date1_value' => '31 May 2026',
    'date2_label' => 'Entrance Test Window', 'date2_value' => 'Jun 08–15, 2026',
    'date3_label' => 'Session Begins', 'date3_value' => 'Jul 22, 2026'
];

// 9. Fetch Dynamic Events
$events = $pdo->query("SELECT * FROM events ORDER BY event_date ASC, id DESC LIMIT 4")->fetchAll();

// 10. Fetch Dynamic News / Blogs
$blogs = $pdo->query("SELECT * FROM blogs ORDER BY id DESC LIMIT 3")->fetchAll();
?>

<main>

    <!-- SECTION 1: HERO SECTION WITH FULL BLEED VIDEO & LUXURY OVERLAY -->
    <section class="hero-wrapper">
        <!-- Video Background -->
        <video src="<?php echo htmlspecialchars($hero['video_url'] ?? 'assets/lovable/campus-hero.mp4'); ?>" autoplay muted loop playsinline poster="<?php echo htmlspecialchars($hero['poster_image'] ?? 'assets/lovable/APJ1.jpg'); ?>" class="hero-video-bg"></video>
        <div class="hero-overlay"></div>
        <div class="hero-radial-glow"></div>

        <div class="hero-content-container container-custom">
            <div class="row align-items-center g-5">
                
                <!-- Left Hero Headline & Action Buttons -->
                <div class="col-lg-7 text-white">
                    
                    <!-- Badges -->
                    <div class="d-flex flex-wrap gap-2 mb-4">
                        <?php if (!empty($hero['badge1'])): ?>
                        <span class="badge-pill-blur">
                            <i class="fa-solid fa-certificate text-gold"></i> <?php echo htmlspecialchars($hero['badge1']); ?>
                        </span>
                        <?php endif; ?>
                        <?php if (!empty($hero['badge2'])): ?>
                        <span class="badge-pill-blur">
                            <i class="fa-solid fa-award text-gold"></i> <?php echo htmlspecialchars($hero['badge2']); ?>
                        </span>
                        <?php endif; ?>
                        <?php if (!empty($hero['badge3'])): ?>
                        <span class="badge-pill-blur">
                            <i class="fa-solid fa-star text-gold"></i> <?php echo htmlspecialchars($hero['badge3']); ?>
                        </span>
                        <?php endif; ?>
                    </div>

                    <!-- Headline Title -->
                    <h1 class="hero-title mb-4 font-serif">
                        <?php echo $hero['headline']; ?>
                    </h1>

                    <!-- Subheadline -->
                    <p class="text-white text-opacity-85 mb-4 pb-2" style="max-width: 520px; font-size: 0.95rem; line-height: 1.65; text-shadow: 0 1px 8px rgba(0,0,0,0.45);">
                        <?php echo htmlspecialchars($hero['subheadline']); ?>
                    </p>

                    <!-- Buttons -->
                    <div class="d-flex flex-wrap align-items-center gap-2 pt-3">
                        <a href="<?php echo htmlspecialchars($hero['btn1_url']); ?>" class="btn-primary-pill">
                            <?php echo htmlspecialchars($hero['btn1_text']); ?> <i class="fa-solid fa-arrow-right text-gold fs-6 ms-1"></i>
                        </a>
                        <a href="<?php echo htmlspecialchars($hero['btn2_url']); ?>" class="btn-outline-pill">
                            <span class="play-icon-circle me-1">
                                <span class="play-triangle"></span>
                            </span>
                            <?php echo htmlspecialchars($hero['btn2_text']); ?>
                        </a>
                    </div>

                </div>

                <!-- Right Hero Floating Glass Counter Card -->
                <div class="col-lg-5">
                    <div class="hero-glance-card">
                        <div class="hero-glance-header">
                            Campus at a Glance
                        </div>
                        <div class="row g-4">
                            <div class="col-6">
                                <div class="hero-glance-value"><?php echo htmlspecialchars($hero['stat1_value']); ?></div>
                                <div class="hero-glance-label"><?php echo htmlspecialchars($hero['stat1_label']); ?></div>
                            </div>
                            <div class="col-6">
                                <div class="hero-glance-value"><?php echo htmlspecialchars($hero['stat2_value']); ?></div>
                                <div class="hero-glance-label"><?php echo htmlspecialchars($hero['stat2_label']); ?></div>
                            </div>
                            <div class="col-6">
                                <div class="hero-glance-value"><?php echo htmlspecialchars($hero['stat3_value']); ?></div>
                                <div class="hero-glance-label"><?php echo htmlspecialchars($hero['stat3_label']); ?></div>
                            </div>
                            <div class="col-6">
                                <div class="hero-glance-value"><?php echo htmlspecialchars($hero['stat4_value']); ?></div>
                                <div class="hero-glance-label"><?php echo htmlspecialchars($hero['stat4_label']); ?></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Bottom Animated Scroll Indicator (Exact Lovable Parity) -->
        <a href="#about" class="hero-scroll-indicator" title="Scroll down">
            <span class="hero-scroll-text">Scroll</span>
            <span class="hero-scroll-line"></span>
        </a>

    </section>

    <!-- SECTION 2: ABOUT THE UNIVERSITY -->
    <section id="about" class="py-5 my-md-4">
        <div class="container-custom">
            <div class="eyebrow-label mb-3"><?php echo htmlspecialchars($about['eyebrow'] ?? 'About the University'); ?></div>
            <h2 class="font-serif text-primary fw-medium display-6 mb-5" style="max-width: 850px; line-height: 1.2;">
                <?php echo $about['title']; ?>
            </h2>

            <div class="row align-items-center g-5">
                
                <!-- Left: Entrance Photo with Floating Est Badge -->
                <div class="col-lg-6">
                    <div class="position-relative">
                        <img src="<?php echo htmlspecialchars($about['image_path']); ?>" alt="AKU Indore Campus" class="img-fluid rounded-4 shadow-lg w-100 object-fit-cover" style="height: 420px;"/>
                        <div class="position-absolute bottom-0 start-0 m-4 bg-white bg-opacity-95 p-3 rounded-3 border border-custom shadow-sm" style="backdrop-filter: blur(8px);">
                            <div class="font-serif text-primary fw-bold fs-5"><?php echo htmlspecialchars($about['est_badge']); ?></div>
                            <div class="text-muted-custom small d-flex align-items-center gap-1">
                                <i class="fa-solid fa-location-dot text-primary" style="font-size: 0.75rem;"></i> <?php echo htmlspecialchars($about['location_text']); ?>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right: Kalam Ideals & 3 Feature Pillars -->
                <div class="col-lg-6">
                    <p class="text-dark text-opacity-90 leading-relaxed mb-4 fs-6">
                        <?php echo $about['paragraph1']; ?>
                    </p>
                    <div class="my-4 border-top border-custom"></div>
                    <p class="text-muted-custom leading-relaxed mb-4 small" style="font-size: 0.93rem;">
                        <?php echo $about['paragraph2']; ?>
                    </p>

                    <!-- 3 Feature Cards Grid -->
                    <div class="row g-3 mt-2">
                        <div class="col-sm-4">
                            <div class="bg-white p-3 rounded-3 border border-custom h-100 shadow-2xs">
                                <i class="<?php echo htmlspecialchars($about['pillar1_icon']); ?> text-primary fs-5 mb-2"></i>
                                <div class="font-serif text-primary fw-bold fs-6 mt-1"><?php echo htmlspecialchars($about['pillar1_title']); ?></div>
                                <div class="text-muted-custom mt-1 lh-sm" style="font-size: 0.75rem;"><?php echo htmlspecialchars($about['pillar1_desc']); ?></div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="bg-white p-3 rounded-3 border border-custom h-100 shadow-2xs">
                                <i class="<?php echo htmlspecialchars($about['pillar2_icon']); ?> text-primary fs-5 mb-2"></i>
                                <div class="font-serif text-primary fw-bold fs-6 mt-1"><?php echo htmlspecialchars($about['pillar2_title']); ?></div>
                                <div class="text-muted-custom mt-1 lh-sm" style="font-size: 0.75rem;"><?php echo htmlspecialchars($about['pillar2_desc']); ?></div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="bg-white p-3 rounded-3 border border-custom h-100 shadow-2xs">
                                <i class="<?php echo htmlspecialchars($about['pillar3_icon']); ?> text-primary fs-5 mb-2"></i>
                                <div class="font-serif text-primary fw-bold fs-6 mt-1"><?php echo htmlspecialchars($about['pillar3_title']); ?></div>
                                <div class="text-muted-custom mt-1 lh-sm" style="font-size: 0.75rem;"><?php echo htmlspecialchars($about['pillar3_desc']); ?></div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>

    <!-- SECTION 3: ACADEMICS & SCHOOLS (INTERACTIVE TABS) -->
    <section id="academics" class="py-5 bg-secondary-tint">
        <div class="container-custom py-md-4">
            
            <div class="d-flex flex-column flex-xl-row align-items-xl-end justify-content-between gap-4 mb-5">
                <div>
                    <div class="eyebrow-label mb-2">Academics</div>
                    <h2 class="font-serif text-primary fw-medium display-6 mb-0" style="max-width: 650px;">
                        Twelve schools. One <em class="fst-italic fw-normal">multidisciplinary</em> conversation.
                    </h2>
                </div>
                
                <!-- Category Filter Buttons strictly in ONE ROW -->
                <div class="d-flex flex-nowrap align-items-center gap-2 flex-shrink-0 overflow-x-auto pb-1" id="academicTabsContainer">
                    <button class="academic-filter-btn active-tab" data-filter="all">All</button>
                    <button class="academic-filter-btn" data-filter="ug">Undergraduate</button>
                    <button class="academic-filter-btn" data-filter="pg">Postgraduate</button>
                    <button class="academic-filter-btn" data-filter="diploma">Diploma</button>
                    <button class="academic-filter-btn" data-filter="phd">Doctoral</button>
                </div>
            </div>

            <!-- 8 Glowing Academic School Cards Grid -->
            <div class="row g-4" id="academicSchoolsGrid">
                <?php foreach ($schools as $s): ?>
                <div class="col-sm-6 col-lg-3 academic-item-col" data-categories="<?php echo htmlspecialchars($s['categories']); ?>">
                    <a href="<?php echo htmlspecialchars($s['url']); ?>" class="school-luxury-card">
                        <i class="<?php echo htmlspecialchars($s['icon']); ?> school-icon"></i>
                        <div>
                            <div class="text-uppercase text-white text-opacity-75 fw-semibold" style="font-size: 0.68rem; letter-spacing: 0.1em;"><?php echo htmlspecialchars($s['program_count']); ?></div>
                            <div class="font-serif fs-5 fw-semibold mt-1 lh-sm"><?php echo htmlspecialchars($s['title']); ?></div>
                        </div>
                        <i class="fa-solid fa-arrow-up-right school-arrow"></i>
                    </a>
                </div>
                <?php endforeach; ?>
            </div>

            <div class="text-center mt-5">
                <a href="department-of-computer-science-engineering.php" class="btn btn-outline-dark border-primary text-primary rounded-pill px-4 py-2 small fw-medium">
                    View all 120+ programs <i class="fa-solid fa-arrow-right ms-1 text-primary"></i>
                </a>
            </div>

        </div>
    </section>

    <!-- SECTION 4: WHY AKU (6 EDITORIAL CARDS) -->
    <section class="py-5 my-md-4">
        <div class="container-custom">
            <div class="eyebrow-label mb-2">Why AKU</div>
            <h2 class="font-serif text-primary fw-medium display-6 mb-5" style="max-width: 680px;">
                Six reasons students choose to <em class="fst-italic fw-normal">build here</em>.
            </h2>

            <div class="row g-4">
                <?php foreach ($why_features as $wf): 
                    $card_link = !empty($wf['link_url']) ? $wf['link_url'] : '#';
                ?>
                <div class="col-md-6 col-lg-4 d-flex">
                    <div class="editorial-card w-100 d-flex flex-column justify-content-between">
                        <div>
                            <div class="editorial-img-box position-relative">
                                <img src="<?php echo htmlspecialchars($wf['image_path']); ?>" alt="<?php echo htmlspecialchars($wf['title']); ?>" loading="lazy"/>
                            </div>
                            <div class="p-4 pb-2">
                                <h3 class="font-serif text-primary fw-bold fs-5 mb-2"><?php echo htmlspecialchars($wf['title']); ?></h3>
                                <p class="text-muted-custom small mb-0 leading-relaxed"><?php echo htmlspecialchars($wf['description']); ?></p>
                            </div>
                        </div>
                        <div class="px-4 pb-4 pt-2">
                            <a href="<?php echo htmlspecialchars($card_link); ?>" class="text-primary text-decoration-none small fw-semibold d-inline-flex align-items-center gap-1 hover-gold">
                                Read More <i class="fa-solid fa-arrow-right fs-6 ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- SECTION 5: RESEARCH & INNOVATION (KALAM INNOVATION CENTER) -->
    <section id="research" class="py-5 text-white" style="background-color: var(--primary-color);">
        <div class="container-custom py-md-4">
            <div class="row g-5 align-items-center">
                
                <!-- Left: Kalam Innovation Center Details & Stats -->
                <div class="col-lg-6">
                    <div class="eyebrow-label gold-eyebrow mb-3">
                        Research & Innovation
                    </div>
                    <h2 class="font-serif display-6 fw-medium text-white mb-3" style="line-height: 1.15;">
                        <?php echo $research['title']; ?>
                    </h2>
                    <p class="text-white text-opacity-80 leading-relaxed small mb-4" style="max-width: 520px; font-size: 0.92rem;">
                        <?php echo htmlspecialchars($research['description']); ?>
                    </p>

                    <div class="rounded-4 overflow-hidden mb-4 shadow-sm" style="border-radius: 1.25rem;">
                        <img src="<?php echo htmlspecialchars($research['image_path']); ?>" alt="Kalam Center" class="w-100 object-fit-cover" style="height: 220px;"/>
                    </div>

                    <div class="row g-3 text-start mb-3" style="max-width: 480px;">
                        <div class="col-4">
                            <div class="font-serif text-gold fw-bold display-6 lh-1"><?php echo htmlspecialchars($research['stat1_value']); ?></div>
                            <div class="text-uppercase text-white text-opacity-70 fw-semibold mt-1" style="font-size: 0.65rem; letter-spacing: 0.12em;"><?php echo htmlspecialchars($research['stat1_label']); ?></div>
                        </div>
                        <div class="col-4">
                            <div class="font-serif text-gold fw-bold display-6 lh-1"><?php echo htmlspecialchars($research['stat2_value']); ?></div>
                            <div class="text-uppercase text-white text-opacity-70 fw-semibold mt-1" style="font-size: 0.65rem; letter-spacing: 0.12em;"><?php echo htmlspecialchars($research['stat2_label']); ?></div>
                        </div>
                        <div class="col-4">
                            <div class="font-serif text-gold fw-bold display-6 lh-1"><?php echo htmlspecialchars($research['stat3_value']); ?></div>
                            <div class="text-uppercase text-white text-opacity-70 fw-semibold mt-1" style="font-size: 0.65rem; letter-spacing: 0.12em;"><?php echo htmlspecialchars($research['stat3_label']); ?></div>
                        </div>
                    </div>

                    <a href="<?php echo htmlspecialchars($research['report_link'] ?? 'faculty-publications.php'); ?>" class="text-gold text-decoration-none d-inline-flex align-items-center gap-2 small fw-medium mt-2 pt-1 hover-underline">
                        Read the research report <i class="fa-solid fa-arrow-right" style="font-size: 0.75rem;"></i>
                    </a>
                </div>

                <!-- Right: Research Papers Showcase -->
                <div class="col-lg-6">
                    <div class="rounded-4 overflow-hidden" style="border: 1px solid rgba(255, 255, 255, 0.15); border-radius: 1.25rem;">
                        
                        <!-- Paper 1 -->
                        <div class="p-4 p-md-4 d-flex align-items-start gap-4" style="border-bottom: 1px solid rgba(255, 255, 255, 0.12);">
                            <div class="font-serif text-gold fw-normal fs-2 lh-1 flex-shrink-0" style="width: 32px;"><?php echo htmlspecialchars($research['paper1_num']); ?></div>
                            <div>
                                <div class="text-uppercase text-white text-opacity-70 fw-semibold" style="font-size: 0.65rem; letter-spacing: 0.15em;"><?php echo htmlspecialchars($research['paper1_tag']); ?></div>
                                <h3 class="font-serif fs-5 fw-normal text-white mt-1 mb-1 lh-snug"><?php echo htmlspecialchars($research['paper1_title']); ?></h3>
                                <div class="text-white text-opacity-60 small" style="font-size: 0.8rem;"><?php echo htmlspecialchars($research['paper1_author']); ?></div>
                            </div>
                        </div>

                        <!-- Paper 2 -->
                        <div class="p-4 p-md-4 d-flex align-items-start gap-4" style="border-bottom: 1px solid rgba(255, 255, 255, 0.12);">
                            <div class="font-serif text-gold fw-normal fs-2 lh-1 flex-shrink-0" style="width: 32px;"><?php echo htmlspecialchars($research['paper2_num']); ?></div>
                            <div>
                                <div class="text-uppercase text-white text-opacity-70 fw-semibold" style="font-size: 0.65rem; letter-spacing: 0.15em;"><?php echo htmlspecialchars($research['paper2_tag']); ?></div>
                                <h3 class="font-serif fs-5 fw-normal text-white mt-1 mb-1 lh-snug"><?php echo htmlspecialchars($research['paper2_title']); ?></h3>
                                <div class="text-white text-opacity-60 small" style="font-size: 0.8rem;"><?php echo htmlspecialchars($research['paper2_author']); ?></div>
                            </div>
                        </div>

                        <!-- Paper 3 -->
                        <div class="p-4 p-md-4 d-flex align-items-start gap-4">
                            <div class="font-serif text-gold fw-normal fs-2 lh-1 flex-shrink-0" style="width: 32px;"><?php echo htmlspecialchars($research['paper3_num']); ?></div>
                            <div>
                                <div class="text-uppercase text-white text-opacity-70 fw-semibold" style="font-size: 0.65rem; letter-spacing: 0.15em;"><?php echo htmlspecialchars($research['paper3_tag']); ?></div>
                                <h3 class="font-serif fs-5 fw-normal text-white mt-1 mb-1 lh-snug"><?php echo htmlspecialchars($research['paper3_title']); ?></h3>
                                <div class="text-white text-opacity-60 small" style="font-size: 0.8rem;"><?php echo htmlspecialchars($research['paper3_author']); ?></div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- SECTION 6: PLACEMENTS & RECRUITER TICKER -->
    <section id="placements" class="py-5 my-md-4">
        <div class="container-custom">
            <div class="row align-items-end g-4 mb-4">
                <div class="col-lg-7">
                    <div class="eyebrow-label mb-2">Placements</div>
                    <h2 class="font-serif text-primary fw-medium display-6 mb-0">
                        A <em class="fst-italic fw-normal">96%</em> offer rate. 500+ companies. One outcome.
                    </h2>
                </div>
                <div class="col-lg-5 text-muted-custom small leading-relaxed">
                    Our placement cell partners with the country's most respected employers — and prepares you for interviews from year one.
                </div>
            </div>
        </div>

        <!-- Smooth Infinite Recruiter Marquee -->
        <div class="mt-4 border-top border-bottom border-custom py-4 bg-secondary-tint">
            <div class="marquee-container">
                <div class="marquee-track align-items-center text-primary text-opacity-75">
                    <span class="font-serif fs-3 fw-bold text-nowrap">Microsoft</span>
                    <span class="font-serif fs-3 fw-bold text-nowrap">TCS</span>
                    <span class="font-serif fs-3 fw-bold text-nowrap">Infosys</span>
                    <span class="font-serif fs-3 fw-bold text-nowrap">Wipro</span>
                    <span class="font-serif fs-3 fw-bold text-nowrap">Deloitte</span>
                    <span class="font-serif fs-3 fw-bold text-nowrap">Bosch</span>
                    <span class="font-serif fs-3 fw-bold text-nowrap">Cognizant</span>
                    <span class="font-serif fs-3 fw-bold text-nowrap">Accenture</span>
                    <span class="font-serif fs-3 fw-bold text-nowrap">Sun Pharma</span>
                    <span class="font-serif fs-3 fw-bold text-nowrap">Cipla</span>
                    <span class="font-serif fs-3 fw-bold text-nowrap">HDFC Bank</span>
                    <span class="font-serif fs-3 fw-bold text-nowrap">ICICI Bank</span>
                    <span class="font-serif fs-3 fw-bold text-nowrap">L&T Infotech</span>
                    <span class="font-serif fs-3 fw-bold text-nowrap">Mahindra</span>

                    <!-- Duplicate for infinite seamless loop -->
                    <span class="font-serif fs-3 fw-bold text-nowrap">Microsoft</span>
                    <span class="font-serif fs-3 fw-bold text-nowrap">TCS</span>
                    <span class="font-serif fs-3 fw-bold text-nowrap">Infosys</span>
                    <span class="font-serif fs-3 fw-bold text-nowrap">Wipro</span>
                    <span class="font-serif fs-3 fw-bold text-nowrap">Deloitte</span>
                    <span class="font-serif fs-3 fw-bold text-nowrap">Bosch</span>
                    <span class="font-serif fs-3 fw-bold text-nowrap">Cognizant</span>
                    <span class="font-serif fs-3 fw-bold text-nowrap">Accenture</span>
                    <span class="font-serif fs-3 fw-bold text-nowrap">Sun Pharma</span>
                    <span class="font-serif fs-3 fw-bold text-nowrap">Cipla</span>
                    <span class="font-serif fs-3 fw-bold text-nowrap">HDFC Bank</span>
                    <span class="font-serif fs-3 fw-bold text-nowrap">ICICI Bank</span>
                    <span class="font-serif fs-3 fw-bold text-nowrap">L&T Infotech</span>
                    <span class="font-serif fs-3 fw-bold text-nowrap">Mahindra</span>
                </div>
            </div>
        </div>    <!-- SECTION 7: CAMPUS NEWS & STORIES -->
    <section class="py-5 bg-secondary-tint">
        <div class="container-custom py-md-4">
            
            <div class="d-flex flex-column flex-md-row align-items-md-end justify-content-between gap-3 mb-4 mb-md-5">
                <div>
                    <div class="eyebrow-label mb-2">Latest</div>
                    <h2 class="font-serif text-primary fw-medium display-6 mb-0">
                        News & <em class="fst-italic fw-normal">stories</em> from campus.
                    </h2>
                </div>
                <a href="aku-in-media.php" class="text-primary text-decoration-none fw-semibold small d-inline-flex align-items-center gap-2">
                    View all news <i class="fa-solid fa-arrow-right text-primary" style="font-size: 0.75rem;"></i>
                </a>
            </div>

            <div class="row g-4 align-items-stretch">
                
                <!-- Main Featured News Card (Left) -->
                <div class="col-lg-6">
                    <a href="aku-in-media.php" class="news-featured-card">
                        <img src="assets/lovable/APJ.jpg" alt="Campus News"/>
                        <div class="news-featured-overlay"></div>
                        <div class="news-featured-content">
                            <span class="badge-featured-gold">
                                Featured · Research
                            </span>
                            <h3 class="news-featured-title">
                                AKU researchers publish breakthrough on sustainable polymer catalysis
                            </h3>
                            <p class="news-featured-desc">
                                A team from the School of Sciences has developed a low-energy catalytic process featured in a Q1 journal.
                            </p>
                            <div class="news-featured-date">
                                Mar 12, <?php echo date('Y'); ?>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Side News Cards (Right) -->
                <div class="col-lg-6 d-flex flex-column justify-content-between gap-4">
                    
                    <a href="placement-cell.php" class="news-side-card">
                        <div>
                            <div class="news-meta-header">
                                <span>Placements</span>
                                <span class="news-meta-divider"></span>
                                <span class="news-meta-date">Feb 28, <?php echo date('Y'); ?></span>
                            </div>
                            <h3 class="news-side-title">
                                Record placement season: 96% offer rate across engineering & management
                            </h3>
                            <p class="news-side-desc">
                                Over 500 companies visited campus this year including TCS, Infosys, Wipro, Cognizant, Deloitte and Bosch.
                            </p>
                        </div>
                        <div class="news-read-more">
                            Read more <i class="fa-solid fa-arrow-right" style="font-size: 0.75rem;"></i>
                        </div>
                    </a>

                    <a href="incubation-center.php" class="news-side-card">
                        <div>
                            <div class="news-meta-header">
                                <span>Campus</span>
                                <span class="news-meta-divider"></span>
                                <span class="news-meta-date">Feb 14, <?php echo date('Y'); ?></span>
                            </div>
                            <h3 class="news-side-title">
                                Kalam Innovation Center opens with prototyping labs and startup studio
                            </h3>
                            <p class="news-side-desc">
                                The new facility offers PCB fabrication, 3D printing, and mentoring for student-led ventures.
                            </p>
                        </div>
                        <div class="news-read-more">
                            Read more <i class="fa-solid fa-arrow-right" style="font-size: 0.75rem;"></i>
                        </div>
                    </a>

                </div>

            </div>
        </div>
    </section>

    <!-- SECTION 8: UPCOMING EVENTS -->
    <section class="py-5 my-md-4">
        <div class="container-custom">
            <div class="d-flex flex-column flex-md-row align-items-md-end justify-content-between gap-3 mb-4">
                <div>
                    <div class="eyebrow-label mb-2">Upcoming</div>
                    <h2 class="font-serif text-primary fw-medium display-6 mb-0">
                        Events, talks & <em class="fst-italic fw-normal">gatherings</em>.
                    </h2>
                </div>
                <a href="university-events.php" class="btn btn-sm btn-outline-dark border-custom rounded-pill px-4 py-2 small fw-medium">
                    <i class="fa-regular fa-calendar me-1"></i> Full calendar
                </a>
            </div>

            <!-- Events List Rows -->
            <div class="rounded-4 border border-custom overflow-hidden shadow-2xs">
                
                <?php 
                if (!empty($events)) {
                    foreach ($events as $ev) {
                        $evDate = strtotime($ev['event_date'] ?? 'now');
                        $day = date('d', $evDate);
                        $mon = strtoupper(date('M', $evDate));
                        $title = htmlspecialchars_decode($ev['title']);
                        $slug = $ev['slug'] ?? '';
                ?>
                <a href="single.php?type=event&slug=<?php echo urlencode($slug); ?>" class="event-list-row">
                    <div class="text-center flex-shrink-0" style="width: 55px;">
                        <div class="font-serif fs-2 fw-bold text-primary lh-1"><?php echo $day; ?></div>
                        <div class="text-uppercase text-muted-custom fw-semibold" style="font-size: 0.65rem; letter-spacing: 0.1em;"><?php echo $mon; ?></div>
                    </div>
                    <div class="flex-grow-1 min-w-0">
                        <div class="font-serif fs-5 fw-bold text-primary text-truncate mb-1"><?php echo $title; ?></div>
                        <div class="text-muted-custom small d-flex align-items-center gap-1">
                            <i class="fa-solid fa-location-dot text-primary" style="font-size: 0.75rem;"></i> Kalam Auditorium · Main Campus
                        </div>
                    </div>
                    <i class="fa-solid fa-arrow-up-right text-muted-custom fs-6"></i>
                </a>
                <?php 
                    }
                } else { 
                ?>
                <!-- Fallback Events -->
                <a href="university-events.php" class="event-list-row">
                    <div class="text-center flex-shrink-0" style="width: 55px;">
                        <div class="font-serif fs-2 fw-bold text-primary lh-1">18</div>
                        <div class="text-uppercase text-muted-custom fw-semibold" style="font-size: 0.65rem;">APR</div>
                    </div>
                    <div class="flex-grow-1 min-w-0">
                        <div class="font-serif fs-5 fw-bold text-primary text-truncate mb-1">TEDx AKU: Voices That Shape Tomorrow</div>
                        <div class="text-muted-custom small d-flex align-items-center gap-1">
                            <i class="fa-solid fa-location-dot text-primary" style="font-size: 0.75rem;"></i> Kalam Auditorium · 6:00 PM
                        </div>
                    </div>
                    <i class="fa-solid fa-arrow-up-right text-muted-custom fs-6"></i>
                </a>

                <a href="university-events.php" class="event-list-row">
                    <div class="text-center flex-shrink-0" style="width: 55px;">
                        <div class="font-serif fs-2 fw-bold text-primary lh-1">24</div>
                        <div class="text-uppercase text-muted-custom fw-semibold" style="font-size: 0.65rem;">APR</div>
                    </div>
                    <div class="flex-grow-1 min-w-0">
                        <div class="font-serif fs-5 fw-bold text-primary text-truncate mb-1">National Symposium on AI & Ethics</div>
                        <div class="text-muted-custom small d-flex align-items-center gap-1">
                            <i class="fa-solid fa-location-dot text-primary" style="font-size: 0.75rem;"></i> School of Engineering · 10:00 AM
                        </div>
                    </div>
                    <i class="fa-solid fa-arrow-up-right text-muted-custom fs-6"></i>
                </a>

                <a href="university-events.php" class="event-list-row">
                    <div class="text-center flex-shrink-0" style="width: 55px;">
                        <div class="font-serif fs-2 fw-bold text-primary lh-1">02</div>
                        <div class="text-uppercase text-muted-custom fw-semibold" style="font-size: 0.65rem;">MAY</div>
                    </div>
                    <div class="flex-grow-1 min-w-0">
                        <div class="font-serif fs-5 fw-bold text-primary text-truncate mb-1">Cultural Fest — Utsav 2026</div>
                        <div class="text-muted-custom small d-flex align-items-center gap-1">
                            <i class="fa-solid fa-location-dot text-primary" style="font-size: 0.75rem;"></i> Central Lawns · All Day
                        </div>
                    </div>
                    <i class="fa-solid fa-arrow-up-right text-muted-custom fs-6"></i>
                </a>

                <a href="convocation.php" class="event-list-row">
                    <div class="text-center flex-shrink-0" style="width: 55px;">
                        <div class="font-serif fs-2 fw-bold text-primary lh-1">15</div>
                        <div class="text-uppercase text-muted-custom fw-semibold" style="font-size: 0.65rem;">MAY</div>
                    </div>
                    <div class="flex-grow-1 min-w-0">
                        <div class="font-serif fs-5 fw-bold text-primary text-truncate mb-1">Convocation Ceremony 2026</div>
                        <div class="text-muted-custom small d-flex align-items-center gap-1">
                            <i class="fa-solid fa-location-dot text-primary" style="font-size: 0.75rem;"></i> Kalam Auditorium · 11:00 AM
                        </div>
                    </div>
                    <i class="fa-solid fa-arrow-up-right text-muted-custom fs-6"></i>
                </a>
                <?php } ?>

            </div>
        </div>
    </section>

    <!-- SECTION 9: CAMPUS LIFE GALLERY (8 PHOTOS) -->
    <section id="gallery" class="py-5 bg-secondary-tint">
        <div class="container-custom py-md-4">
            <div class="eyebrow-label mb-2">Life at AKU</div>
            <h2 class="font-serif text-primary fw-medium display-6 mb-3">
                Campus <em class="fst-italic fw-normal">gallery</em>.
            </h2>
            <p class="text-muted-custom mb-5 small leading-relaxed" style="max-width: 600px;">
                A glimpse into everyday life at Dr. A.P.J. Abdul Kalam University — from our sunlit gardens to the classrooms, corridors and grounds where our students learn, play and grow.
            </p>

            <div class="row g-3 g-md-4">
                
                <div class="col-6 col-md-4 col-lg-3">
                    <figure class="gallery-figure shadow-2xs">
                        <img src="assets/lovable/APJ1.jpg" alt="Aerial view of campus" loading="lazy"/>
                        <div class="gallery-overlay">
                            <figcaption class="gallery-caption">Aerial view of campus</figcaption>
                        </div>
                    </figure>
                </div>

                <div class="col-6 col-md-4 col-lg-3">
                    <figure class="gallery-figure shadow-2xs">
                        <img src="assets/lovable/APJ2.jpg" alt="University main gate" loading="lazy"/>
                        <div class="gallery-overlay">
                            <figcaption class="gallery-caption">University main gate</figcaption>
                        </div>
                    </figure>
                </div>

                <div class="col-6 col-md-4 col-lg-3">
                    <figure class="gallery-figure shadow-2xs">
                        <img src="assets/lovable/apj5.jpg" alt="Faculty & students" loading="lazy"/>
                        <div class="gallery-overlay">
                            <figcaption class="gallery-caption">Faculty & students</figcaption>
                        </div>
                    </figure>
                </div>

                <div class="col-6 col-md-4 col-lg-3">
                    <figure class="gallery-figure shadow-2xs">
                        <img src="assets/lovable/apj8.jpeg" alt="Academic block" loading="lazy"/>
                        <div class="gallery-overlay">
                            <figcaption class="gallery-caption">Academic block</figcaption>
                        </div>
                    </figure>
                </div>

                <div class="col-6 col-md-4 col-lg-3">
                    <figure class="gallery-figure shadow-2xs">
                        <img src="assets/lovable/apj6.webp" alt="Cricket ground & sports" loading="lazy"/>
                        <div class="gallery-overlay">
                            <figcaption class="gallery-caption">Cricket ground & sports</figcaption>
                        </div>
                    </figure>
                </div>

                <div class="col-6 col-md-4 col-lg-3">
                    <figure class="gallery-figure shadow-2xs">
                        <img src="assets/lovable/apj4.webp" alt="Block A entrance" loading="lazy"/>
                        <div class="gallery-overlay">
                            <figcaption class="gallery-caption">Block A entrance</figcaption>
                        </div>
                    </figure>
                </div>

                <div class="col-6 col-md-4 col-lg-3">
                    <figure class="gallery-figure shadow-2xs">
                        <img src="assets/lovable/APJ.jpg" alt="Campus & transport" loading="lazy"/>
                        <div class="gallery-overlay">
                            <figcaption class="gallery-caption">Campus & transport</figcaption>
                        </div>
                    </figure>
                </div>

                <div class="col-6 col-md-4 col-lg-3">
                    <figure class="gallery-figure shadow-2xs">
                        <img src="assets/lovable/apj3.jpg" alt="Signage & branding" loading="lazy"/>
                        <div class="gallery-overlay">
                            <figcaption class="gallery-caption">Signage & branding</figcaption>
                        </div>
                    </figure>
                </div>

            </div>
        </div>
    </section>

    <!-- SECTION 10: ALUMNI VOICES -->
    <section class="py-5 my-md-4">
        <div class="container-custom">
            <div class="eyebrow-label mb-2">Voices</div>
            <h2 class="font-serif text-primary fw-medium display-6 mb-5">
                What our <em class="fst-italic fw-normal">alumni</em> say.
            </h2>

            <div class="row g-4">
                <?php foreach ($alumni_voices as $av): ?>
                <div class="col-md-4">
                    <div class="bg-white p-4 p-md-5 rounded-4 border border-custom h-100 d-flex flex-column shadow-2xs">
                        <i class="fa-solid fa-quote-left text-gold fs-3 mb-3"></i>
                        <p class="font-serif text-primary fs-5 leading-snug fw-medium mb-4 flex-grow-1">
                            "<?php echo htmlspecialchars($av['quote']); ?>"
                        </p>
                        <div class="pt-3 border-top border-custom">
                            <div class="font-serif text-primary fw-bold fs-6"><?php echo htmlspecialchars($av['name']); ?></div>
                            <div class="text-muted-custom small" style="font-size: 0.8rem;"><?php echo htmlspecialchars($av['degree_batch']); ?></div>
                            <div class="text-uppercase text-primary fw-semibold mt-2" style="font-size: 0.68rem; letter-spacing: 0.08em;"><?php echo htmlspecialchars($av['company']); ?></div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- SECTION 11: PORTALS & QUICK SERVICES -->
    <section id="portals" class="py-5 bg-secondary-tint">
        <div class="container-custom py-md-4">
            <div class="eyebrow-label mb-2">Portals & Services</div>
            <h2 class="font-serif text-primary fw-medium display-6 mb-5" style="max-width: 650px;">
                Everything you need, <em class="fst-italic fw-normal">one click away</em>.
            </h2>

            <div class="row g-3 g-md-4">
                <?php foreach ($portals as $pt): ?>
                <div class="col-sm-6 col-lg-3">
                    <a href="<?php echo htmlspecialchars($pt['url']); ?>" class="portal-card">
                        <div class="portal-icon-box">
                            <i class="<?php echo htmlspecialchars($pt['icon']); ?>"></i>
                        </div>
                        <div class="flex-grow-1 min-w-0">
                            <div class="font-serif text-primary fw-bold fs-6 text-truncate lh-sm"><?php echo htmlspecialchars($pt['title']); ?></div>
                            <div class="text-muted-custom small mt-0.5" style="font-size: 0.75rem;"><?php echo htmlspecialchars($pt['subtitle']); ?></div>
                        </div>
                        <i class="fa-solid fa-arrow-up-right text-muted-custom small"></i>
                    </a>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- SECTION 12: ADMISSIONS 2026 CTA BANNER -->
    <section id="admissions" class="py-5 my-md-4">
        <div class="container-custom">
            <div class="admissions-cta-box">
                <div class="row g-5 align-items-center position-relative" style="z-index: 2;">
                    
                    <!-- Left Headline & Description -->
                    <div class="col-lg-7">
                        <div class="eyebrow-label gold-eyebrow mb-3" style="color: var(--gold-color) !important;">
                            <span style="background: var(--gold-color); width: 1.5rem; height: 1px; display: inline-block;"></span> <?php echo htmlspecialchars($admissions_cta['eyebrow'] ?? 'Admissions 2026'); ?>
                        </div>
                        <h2 class="font-serif display-6 fw-medium text-white mb-3">
                            <?php echo $admissions_cta['headline']; ?>
                        </h2>
                        <p class="text-white text-opacity-85 small leading-relaxed mb-4" style="max-width: 520px; font-size: 0.95rem;">
                            <?php echo htmlspecialchars($admissions_cta['description']); ?>
                        </p>
                        <div class="d-flex flex-wrap gap-3 pt-2">
                            <a href="<?php echo htmlspecialchars($admissions_cta['btn1_url']); ?>" class="btn-gold-pill">
                                <?php echo htmlspecialchars($admissions_cta['btn1_text']); ?> <i class="fa-solid fa-arrow-right fs-6 ms-1"></i>
                            </a>
                            <a href="<?php echo htmlspecialchars($admissions_cta['btn2_url']); ?>" class="btn-outline-pill">
                                <?php echo htmlspecialchars($admissions_cta['btn2_text']); ?>
                            </a>
                        </div>
                    </div>

                    <!-- Right Key Dates Box -->
                    <div class="col-lg-5">
                        <div class="rounded-4 border border-white border-opacity-15 overflow-hidden p-1 p-sm-2" style="background: rgba(0, 0, 0, 0.12); backdrop-filter: blur(12px);">
                            <div class="px-3 py-3 d-flex align-items-center justify-content-between border-bottom border-white border-opacity-15">
                                <span class="text-uppercase text-white text-opacity-70 fw-semibold" style="font-size: 0.68rem; letter-spacing: 0.14em;"><?php echo htmlspecialchars($admissions_cta['date1_label']); ?></span>
                                <span class="font-serif text-gold fs-5 fw-medium"><?php echo htmlspecialchars($admissions_cta['date1_value']); ?></span>
                            </div>
                            <div class="px-3 py-3 d-flex align-items-center justify-content-between border-bottom border-white border-opacity-15">
                                <span class="text-uppercase text-white text-opacity-70 fw-semibold" style="font-size: 0.68rem; letter-spacing: 0.14em;"><?php echo htmlspecialchars($admissions_cta['date2_label']); ?></span>
                                <span class="font-serif text-gold fs-5 fw-medium"><?php echo htmlspecialchars($admissions_cta['date2_value']); ?></span>
                            </div>
                            <div class="px-3 py-3 d-flex align-items-center justify-content-between">
                                <span class="text-uppercase text-white text-opacity-70 fw-semibold" style="font-size: 0.68rem; letter-spacing: 0.14em;"><?php echo htmlspecialchars($admissions_cta['date3_label']); ?></span>
                                <span class="font-serif text-gold fs-5 fw-medium"><?php echo htmlspecialchars($admissions_cta['date3_value']); ?></span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

</main>

<!-- Interactive Tab Filtering Script -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const filterBtns = document.querySelectorAll('.academic-filter-btn');
        const items = document.querySelectorAll('.academic-item-col');

        filterBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                // Update active tab state
                filterBtns.forEach(b => b.classList.remove('active-tab'));
                this.classList.add('active-tab');

                const filter = this.getAttribute('data-filter');
                items.forEach(item => {
                    if (filter === 'all') {
                        item.style.display = 'block';
                    } else {
                        const categories = item.getAttribute('data-categories') || '';
                        if (categories.includes(filter)) {
                            item.style.display = 'block';
                        } else {
                            item.style.display = 'none';
                        }
                    }
                });
            });
        });
    });
</script>

<?php require_once 'footer.php'; ?>
