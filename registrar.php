<?php 
require_once 'db.php';
include 'header.php'; 

// Fetch dynamic content from about_pages_config
$page_data = [];
try {
    $stmt = $pdo->prepare("SELECT * FROM about_pages_config WHERE page_slug = 'registrar'");
    $stmt->execute();
    $page_data = $stmt->fetch(PDO::FETCH_ASSOC) ?: [];
} catch (Exception $e) {}

$hero_eyebrow = !empty($page_data['hero_eyebrow']) ? $page_data['hero_eyebrow'] : 'ADMINISTRATIVE LEADERSHIP';
$page_title = !empty($page_data['page_title']) ? $page_data['page_title'] : 'Message from the Registrar';
$hero_subtitle = !empty($page_data['hero_subtitle']) ? $page_data['hero_subtitle'] : 'Mr. Sandeep Gupta · Registrar, Dr. A.P.J. Abdul Kalam University';
$leader_name = !empty($page_data['leader_name']) ? $page_data['leader_name'] : 'Mr. Sandeep Gupta';
$leader_designation = !empty($page_data['leader_designation']) ? $page_data['leader_designation'] : 'Registrar';
$badge_text = !empty($page_data['badge_text']) ? $page_data['badge_text'] : 'Administrative Head';
$quote = !empty($page_data['quote']) ? $page_data['quote'] : 'Education is the most powerful weapon which you can use to change the world. We are committed to transparency, administrative excellence, and a supportive academic environment.';
$image_path = !empty($page_data['image_path']) ? $page_data['image_path'] : 'uploads/2025/04/registrar.jpg';
$main_content = !empty($page_data['main_content']) ? $page_data['main_content'] : '<p>I am delighted to extend my warmest greetings to all of you as the Registrar of Dr. A.P.J. Abdul Kalam University (AKU), Indore (M.P.).</p>';
?>

<!-- Inner Page Hero Banner -->
<section class="inner-page-hero">
    <div class="container-custom position-relative" style="z-index: 2;">
        <div class="inner-breadcrumb-pill">
            <a href="index.php"><i class="fa-solid fa-house me-1"></i> Home</a>
            <span>&raquo;</span>
            <a href="why-aku.php">About</a>
            <span>&raquo;</span>
            <span class="text-gold fw-medium">The Registrar</span>
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
                    
                    <!-- Registrar Profile Card -->
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

                    <!-- Highlight Quote -->
                    <?php if ($quote): ?>
                    <div class="leader-quote-box">
                        "<?php echo htmlspecialchars($quote); ?>"
                    </div>
                    <?php endif; ?>

                    <!-- Message Body -->
                    <h3 class="font-serif text-primary fs-3 fw-bold mt-4 mb-3">Registrar's Address</h3>
                    <div class="inner-page-body-text">
                        <?php echo $main_content; ?>
                    </div>

                    <div class="pt-4 mt-4 border-top border-custom">
                        <div class="font-serif text-primary fw-bold fs-5"><?php echo htmlspecialchars($leader_name); ?></div>
                        <div class="text-muted-custom small"><?php echo htmlspecialchars($leader_designation); ?> · Dr. A.P.J. Abdul Kalam University</div>
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
