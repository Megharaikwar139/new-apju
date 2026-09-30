<?php 
require_once 'db.php';
include 'header.php'; 

// Fetch dynamic content from about_pages_config
$page_data = [];
try {
    $stmt = $pdo->prepare("SELECT * FROM about_pages_config WHERE page_slug = 'chief-proctor'");
    $stmt->execute();
    $page_data = $stmt->fetch(PDO::FETCH_ASSOC) ?: [];
} catch (Exception $e) {}

$hero_eyebrow = !empty($page_data['hero_eyebrow']) ? $page_data['hero_eyebrow'] : 'CAMPUS GOVERNANCE & DISCIPLINE';
$page_title = !empty($page_data['page_title']) ? $page_data['page_title'] : 'Message from the Chief Proctor';
$hero_subtitle = !empty($page_data['hero_subtitle']) ? $page_data['hero_subtitle'] : 'Dr. Karunakar Shukla · Chief Proctor, Dr. A.P.J. Abdul Kalam University';
$leader_name = !empty($page_data['leader_name']) ? $page_data['leader_name'] : 'Dr. Karunakar Shukla';
$leader_designation = !empty($page_data['leader_designation']) ? $page_data['leader_designation'] : 'Chief Proctor';
$badge_text = !empty($page_data['badge_text']) ? $page_data['badge_text'] : 'Student Welfare & Discipline';
$quote = !empty($page_data['quote']) ? $page_data['quote'] : 'Together, let us continue to build an institution that not only meets the highest standards of academic excellence but also serves as a catalyst for positive transformation in our society and beyond.';
$image_path = !empty($page_data['image_path']) ? $page_data['image_path'] : 'uploads/2026/01/karunakar.jpeg';
$main_content = !empty($page_data['main_content']) ? $page_data['main_content'] : '<p>It gives me immense pleasure to welcome you to the Dr A.P.J. Abdul Kalam University Indore (M.P.), an institution that stands as a beacon of academic excellence and innovation in higher education. Established under the Act of State Legislature, M.P. as notified in the official Gazette of the state government on 4th January 2016, our university has been committed to fostering an environment that nurtures intellectual growth, research excellence, and holistic development.</p><p>Our vision extends beyond conventional education. We are dedicated to creating global citizens who are not only academically accomplished but also socially responsible, environmentally conscious, and culturally aware. Through our interdisciplinary approach and emphasis on research-driven learning, we prepare our students to become leaders in their chosen fields.</p><p>Research is at the heart of our institutional identity. We encourage our faculty and students to engage in cutting-edge research that addresses local and global challenges. Our interdisciplinary research approach allows for innovative solutions and breakthrough discoveries. The university provides robust support for research activities through well-equipped laboratories, research grants, and collaborative partnerships.</p><p>The Proctorial Board ensures a safe, dignified, ragging-free, and inspiring academic environment across all colleges and hostels on campus.</p>';
?>

<!-- Inner Page Hero Banner -->
<section class="inner-page-hero">
    <div class="container-custom position-relative" style="z-index: 2;">
        <div class="inner-breadcrumb-pill">
            <a href="index.php"><i class="fa-solid fa-house me-1"></i> Home</a>
            <span>&raquo;</span>
            <a href="why-aku.php">About</a>
            <span>&raquo;</span>
            <span class="text-gold fw-medium">Chief Proctor</span>
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
                    
                    <!-- Chief Proctor Profile Card -->
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

                    <!-- Campus Welfare Helpline Box -->
                    <div class="p-4 rounded-4 border border-custom bg-white d-flex align-items-center justify-content-between flex-wrap gap-3 shadow-xs mt-5">
                        <div>
                            <h5 class="font-serif text-primary fw-bold fs-6 mb-0.5">Need Student Support or Proctorial Help?</h5>
                            <p class="small text-muted-custom mb-0">For anti-ragging assistance, grievance redressal, or campus discipline queries, reach out directly.</p>
                        </div>
                        <a href="contact-us.php" class="btn btn-sm btn-gold-pill px-3.5 py-2 fw-bold">
                            <i class="fa-solid fa-shield-halved me-1"></i> Contact Proctor Office
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
