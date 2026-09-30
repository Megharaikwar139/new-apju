<?php 
require_once 'db.php';
include 'header.php'; 

// Fetch dynamic content from about_pages_config
$page_data = [];
try {
    $stmt = $pdo->prepare("SELECT * FROM about_pages_config WHERE page_slug = 'the-pro-vice-chancellor'");
    $stmt->execute();
    $page_data = $stmt->fetch(PDO::FETCH_ASSOC) ?: [];
} catch (Exception $e) {}

$hero_eyebrow = !empty($page_data['hero_eyebrow']) ? $page_data['hero_eyebrow'] : 'ACADEMIC LEADERSHIP';
$page_title = !empty($page_data['page_title']) ? $page_data['page_title'] : 'Message from the Pro Vice Chancellor';
$hero_subtitle = !empty($page_data['hero_subtitle']) ? $page_data['hero_subtitle'] : 'Dr. Rajeev Vishwakarma · Pro-Vice Chancellor, Dr. A.P.J. Abdul Kalam University';
$leader_name = !empty($page_data['leader_name']) ? $page_data['leader_name'] : 'Dr. Rajeev Vishwakarma';
$leader_designation = !empty($page_data['leader_designation']) ? $page_data['leader_designation'] : 'Pro-Vice Chancellor';
$badge_text = !empty($page_data['badge_text']) ? $page_data['badge_text'] : 'Academic Governance';
$quote = !empty($page_data['quote']) ? $page_data['quote'] : 'Together we provide an all-round personality development with an emphasis on intensive and effective interface between institute and industry.';
$image_path = !empty($page_data['image_path']) ? $page_data['image_path'] : 'uploads/2025/04/PVC.jpg';
$main_content = !empty($page_data['main_content']) ? $page_data['main_content'] : '<p>Here you will discover numerous opportunities offered at our university in areas of Engineering, Pharmacy, Management and Research. Our Group is characterized by its strength in science, engineering, pharmacy and management education. Together it provides an all round personality development with an emphasis on intensive and effective interface between institute and industry.</p><p>The focus on industry integrated research and problem solving pedagogy will help students in direct response to the demands placed on future young professionals. We are committed to fostering an atmosphere of innovative thinking and technical proficiency that prepares graduates for global careers.</p>';
?>

<!-- Inner Page Hero Banner -->
<section class="inner-page-hero">
    <div class="container-custom position-relative" style="z-index: 2;">
        <div class="inner-breadcrumb-pill">
            <a href="index.php"><i class="fa-solid fa-house me-1"></i> Home</a>
            <span>&raquo;</span>
            <a href="why-aku.php">About</a>
            <span>&raquo;</span>
            <span class="text-gold fw-medium">Pro-Vice Chancellor</span>
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
                    
                    <!-- Pro-Vice Chancellor Profile Card -->
                    <div class="row g-4 align-items-center mb-4 pb-4 border-bottom border-custom">
                        <div class="col-md-5">
                            <div class="leader-portrait-frame text-center p-2">
                                <img src="<?php echo htmlspecialchars($image_path); ?>" alt="<?php echo htmlspecialchars($leader_name); ?>" class="rounded-3 shadow-sm w-100" style="max-height: 380px; object-fit: cover;" />
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="badge-pill-blur mb-2 d-inline-block px-3 py-1 text-primary fw-bold" style="background: #f0eae1; font-size: 0.75rem; letter-spacing: 0.1em; text-transform: uppercase;">
                                <?php echo htmlspecialchars($badge_text); ?>
                            </div>
                            <h2 class="font-serif text-primary display-6 fw-bold mb-1"><?php echo htmlspecialchars($leader_name); ?></h2>
                            <div class="text-gold fw-semibold fs-6 mb-3"><?php echo htmlspecialchars($leader_designation); ?></div>
                            <p class="text-muted-custom small lh-base mb-0">
                                Dr. A.P.J. Abdul Kalam University, Indore (M.P.)
                            </p>
                        </div>
                    </div>

                    <!-- Leadership Quote Banner -->
                    <?php if (!empty($quote)): ?>
                    <div class="p-4 rounded-3 mb-4 position-relative overflow-hidden" style="background: linear-gradient(135deg, rgba(112,0,24,0.06) 0%, rgba(212,175,55,0.08) 100%); border-left: 4px solid var(--gold-color);">
                        <i class="fa-solid fa-quote-left text-gold opacity-25 position-absolute" style="font-size: 3.5rem; top: 10px; right: 15px;"></i>
                        <p class="font-serif fs-5 fst-italic text-dark mb-0 position-relative" style="line-height: 1.6; z-index: 1;">
                            "<?php echo htmlspecialchars($quote); ?>"
                        </p>
                    </div>
                    <?php endif; ?>

                    <!-- Message Body -->
                    <div class="inner-page-body-text" style="line-height: 1.85; font-size: 0.98rem; color: #3e3233;">
                        <?php echo $main_content; ?>
                    </div>

                    <!-- Contact / Statutory Help Footer -->
                    <div class="p-4 rounded-4 border border-custom bg-white d-flex align-items-center justify-content-between flex-wrap gap-3 shadow-xs mt-5">
                        <div>
                            <h5 class="font-serif text-primary fw-bold fs-6 mb-0.5">Need More Information?</h5>
                            <p class="small text-muted-custom mb-0">For academic collaborations or inquiries, reach out to the Registrar Office.</p>
                        </div>
                        <a href="contact-us.php" class="btn btn-sm btn-gold-pill px-3.5 py-2 fw-bold">
                            <i class="fa-solid fa-headset me-1"></i> Contact Registrar
                        </a>
                    </div>

                </article>
            </div>

            <!-- Right Sidebar -->
            <div class="col-lg-4 col-xl-3">
                <?php include 'about-sidebar.php'; ?>
            </div>

        </div>
    </div>
</main>

<?php include 'footer.php'; ?>
