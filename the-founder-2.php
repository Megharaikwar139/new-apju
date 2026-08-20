<?php 
require_once 'db.php';
include 'header.php'; 

// Fetch dynamic content from about_pages_config
$page_data = [];
try {
    $stmt = $pdo->prepare("SELECT * FROM about_pages_config WHERE page_slug = 'the-founder-2'");
    $stmt->execute();
    $page_data = $stmt->fetch(PDO::FETCH_ASSOC) ?: [];
} catch (Exception $e) {}

$hero_eyebrow = !empty($page_data['hero_eyebrow']) ? $page_data['hero_eyebrow'] : 'LEGACY OF VISION & EXCELLENCE';
$page_title = !empty($page_data['page_title']) ? $page_data['page_title'] : 'Late Shri Ram Nath Kapoor';
$hero_subtitle = !empty($page_data['hero_subtitle']) ? $page_data['hero_subtitle'] : 'Founder Chairman · RKDF Group & Dr. A.P.J. Abdul Kalam University';
$leader_name = !empty($page_data['leader_name']) ? $page_data['leader_name'] : 'Late Shri R.N. Kapoor';
$leader_designation = !empty($page_data['leader_designation']) ? $page_data['leader_designation'] : 'Pioneer of Technical & Higher Education in Central India';
$badge_text = !empty($page_data['badge_text']) ? $page_data['badge_text'] : '17.09.1926 — 31.10.2014';
$quote = !empty($page_data['quote']) ? $page_data['quote'] : 'Powerful vision of Late Shri Ram Nath Kapoor galvanizes education in Central India and benchmarked the foundation of Technical Education in 1995. His ethics and principles embolden confidence and value-based education among youth, which will always remain deeply and firmly embedded in our roots.';
$image_path = !empty($page_data['image_path']) ? $page_data['image_path'] : 'uploads/2025/08/rnkapoor1.png';
$main_content = !empty($page_data['main_content']) ? $page_data['main_content'] : '<p class="text-muted-custom small lh-base mb-0">A great visionary, philanthropist, and educator who dedicated his life to transforming Central India into an educational powerhouse, laying the foundation of technical education since 1995.</p>';
?>

<!-- Inner Page Hero Banner -->
<section class="inner-page-hero">
    <div class="container-custom position-relative" style="z-index: 2;">
        <div class="inner-breadcrumb-pill">
            <a href="index.php"><i class="fa-solid fa-house me-1"></i> Home</a>
            <span>&raquo;</span>
            <a href="why-aku.php">About</a>
            <span>&raquo;</span>
            <span class="text-gold fw-medium">The Founder</span>
        </div>
        
        <div class="eyebrow-label gold-eyebrow mb-2" style="color: var(--gold-color) !important;">
            <span style="background: var(--gold-color); width: 1.5rem; height: 1px; display: inline-block;"></span> <?php echo htmlspecialchars($hero_eyebrow); ?>
        </div>
        <h1 class="font-serif display-5 fw-medium text-white mb-2" style="max-width: 900px; line-height: 1.15;">
            <?php echo htmlspecialchars($page_title); ?>
        </h1>
        <p class="text-white text-opacity-80 small mb-0" style="letter-spacing: 0.12em; text-transform: uppercase;">
            <?php echo htmlspecialchars($hero_subtitle); ?>
        </p>
    </div>
</section>

<main class="py-5" style="background-color: var(--bg-ivory);">
    <div class="container-custom">
        <div class="row g-4 g-xl-5">
            
            <!-- Left Main Content Area -->
            <div class="col-lg-8 col-xl-9">
                <article class="inner-main-card">
                    
                    <!-- Founder Tribute Header Card -->
                    <div class="row g-4 align-items-center mb-5 pb-4 border-bottom border-custom">
                        <div class="col-md-5">
                            <div class="leader-portrait-frame text-center p-3">
                                <img src="<?php echo htmlspecialchars($image_path); ?>" alt="<?php echo htmlspecialchars($leader_name); ?>" class="rounded-3 shadow-sm" style="max-height: 340px; width: auto; margin: 0 auto;" />
                                <div class="badge-pill-blur mt-3 d-inline-block px-3 py-1 text-primary fw-bold" style="background: #f0eae1; font-size: 0.78rem;">
                                    <?php echo htmlspecialchars($badge_text); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="eyebrow-label text-primary mb-1" style="font-size: 0.72rem; letter-spacing: 0.14em;">SPIRIT OF THE SKIES</div>
                            <h2 class="font-serif text-primary display-6 fw-bold mb-2"><?php echo htmlspecialchars($leader_name); ?></h2>
                            <div class="text-gold fw-semibold mb-3" style="font-size: 0.95rem;"><?php echo htmlspecialchars($leader_designation); ?></div>
                            <div class="inner-page-body-text">
                                <?php echo $main_content; ?>
                            </div>
                        </div>
                    </div>

                    <!-- Founder Quote -->
                    <?php if ($quote): ?>
                    <div class="leader-quote-box">
                        "<?php echo htmlspecialchars($quote); ?>"
                    </div>
                    <?php endif; ?>

                    <!-- Mission & Vision Cards -->
                    <h3 class="font-serif text-primary fs-3 fw-bold mt-5 mb-4">Core Principles & Pillars</h3>
                    
                    <div class="row g-4">
                        <!-- Mission -->
                        <div class="col-md-6">
                            <div class="p-4 rounded-4 border border-custom h-100" style="background: #fcfbf9;">
                                <div class="d-flex align-items-center gap-3 mb-3">
                                    <div class="mission-vision-icon-circle">
                                        <i class="fa-solid fa-bullseye"></i>
                                    </div>
                                    <h4 class="font-serif text-primary fs-5 fw-bold m-0">Our Mission</h4>
                                </div>
                                <p class="small text-muted-custom lh-base m-0">
                                    Knowledge creation by engaging in cutting-edge research and promoting academic growth based on an informed perception of regional, Indian and global needs to develop human potential with skills to its fullest extent so that intellectually capable future leaders emerge across all professions.
                                </p>
                            </div>
                        </div>

                        <!-- Vision -->
                        <div class="col-md-6">
                            <div class="p-4 rounded-4 border border-custom h-100" style="background: #fcfbf9;">
                                <div class="d-flex align-items-center gap-3 mb-3">
                                    <div class="mission-vision-icon-circle">
                                        <i class="fa-solid fa-compass"></i>
                                    </div>
                                    <h4 class="font-serif text-primary fs-5 fw-bold m-0">Our Vision</h4>
                                </div>
                                <p class="small text-muted-custom lh-base m-0">
                                    Ensure the footprints of global leaders, elevate the prosperity of the nation in holistic education, research, innovation and economy embedded with traditional values, inseminating knowledge globally in pursuit of sustainable national growth with excellence at its core.
                                </p>
                            </div>
                        </div>
                    </div>

                </article>
            </div>

            <!-- Right Sidebar Area -->
            <div class="col-lg-4 col-xl-3">
                <?php include 'about-sidebar.php'; ?>
            </div>

        </div>
    </div>
</main>

<?php include 'footer.php'; ?>
